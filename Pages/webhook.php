<?php
// Pastikan path autoload dan class benar sesuai struktur foldermu
require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__).'/../inc.koneksi.php';
require_once dirname(__FILE__).'/../Class/class.Produk.php'; 
require_once dirname(__FILE__).'/../Class/class.Mail.php';

// Konfigurasi Midtrans
\Midtrans\Config::$serverKey = 'MASUKAN SEVER KEY MIDTRANS';
\Midtrans\Config::$isProduction = false;

// 1. Terima Notifikasi dari Midtrans
try {
    $notif = new \Midtrans\Notification();
} catch (\Exception $e) {
    exit($e->getMessage());
}

$transaction_status = $notif->transaction_status;
$payment_type = $notif->payment_type;
$order_id = $notif->order_id; // Bentuknya "TKT-15"
$fraud_status = $notif->fraud_status;

// 2. Ambil angka ID Transaksi dari order_id (Hapus kata "TKT-")
// Karena di database kamu nyimpannya angka (contoh: 15), bukan "TKT-15"
$id_transaksi_db = str_replace('TKT-', '', $order_id);

// 3. Tentukan status untuk Database kita
$status_db = 'pending';
if ($transaction_status == 'capture' || $transaction_status == 'settlement') {
    $status_db = 'success'; // LUNAS
} else if ($transaction_status == 'cancel' || $transaction_status == 'deny' || $transaction_status == 'expire') {
    $status_db = 'failed'; // GAGAL/BATAL
} else if ($transaction_status == 'pending') {
    $status_db = 'pending'; // BELUM DIBAYAR
}

// 4. Update Database
$objProduk = new Produk();
$conn = $objProduk->connection;

// Update status dan metode bayar asli (misal: bank_transfer, qris, dll)
$query_update = "UPDATE transaction SET status = '$status_db', metode_bayar = '$payment_type' WHERE transaction_id = '$id_transaksi_db'";
mysqli_query($conn, $query_update);

// 5. Jika LUNAS, Kirim Email Tiket!
if ($status_db == 'success') {
    
    // MEMBUAT SISTEM LOGGING
    // File log.txt akan otomatis terbuat di folder yang sama dengan webhook.php
    $log_file = dirname(__FILE__) . '/log_email_webhook.txt';
    file_put_contents($log_file, "[" . date('Y-m-d H:i:s') . "] Memulai proses kirim email untuk ID: $id_transaksi_db \n", FILE_APPEND);

    // PASTIKAN NAMA TABEL DAN KOLOM SESUAI DENGAN DATABASEMU
    // Cek kembali: apakah benar 'user', 'userid', 'name', 'email'?
    $q_detail = "SELECT t.*, u.name, u.email, p.nama_acara 
                 FROM transaction t 
                 JOIN user u ON t.userid = u.userid 
                 JOIN produk_tiket p ON t.id_produk = p.id_produk 
                 WHERE t.transaction_id = '$id_transaksi_db'";
                 
    $res_detail = mysqli_query($conn, $q_detail);
    
    // Cek jika query error
    if (!$res_detail) {
        file_put_contents($log_file, "ERROR QUERY DB: " . mysqli_error($conn) . "\n", FILE_APPEND);
    }

    if ($res_detail && mysqli_num_rows($res_detail) > 0) {
        $data_pesanan = mysqli_fetch_assoc($res_detail);
        
        $email_pembeli = $data_pesanan['email'];
        $nama_pembeli = $data_pesanan['name'];
        $jumlah = $data_pesanan['jumlah'];
        $total_harga = $data_pesanan['total_harga'];
        $nama_acara = $data_pesanan['nama_acara'];

        file_put_contents($log_file, "Data ditemukan. Mencoba kirim ke email: $email_pembeli \n", FILE_APPEND);

        $message = "
        <html>
        <body>
            <h2>✅ Pembayaran Tiket Berhasil!</h2>
            <p>Halo <b>{$nama_pembeli}</b>,</p>
            <p>Terima kasih, pembayaran tiket acara <b>{$nama_acara}</b> telah kami terima.</p>
            <table border='0' cellpadding='8'>
                <tr><td><b>Nama Acara</b></td><td>: {$nama_acara}</td></tr>
                <tr><td><b>Jumlah Tiket</b></td><td>: {$jumlah}</td></tr>
                <tr><td><b>Total Harga</b></td><td>: Rp " . number_format($total_harga, 0, ',', '.') . "</td></tr>
                <tr><td><b>Metode Bayar</b></td><td>: {$payment_type}</td></tr>
            </table>
            <br>
            <p>Simpan email ini sebagai bukti E-Ticket Anda untuk ditukarkan di loket pementasan.</p>
            <hr>
            <small>Tepi Waktu Teater</small>
        </body>
        </html>
        ";

        // Blok Try-Catch untuk menangkap error dari Class Mail
        try {
            // Pastikan class Mail menggunakan method statis (::) atau object (->) sesuai dengan yang kamu buat
            Mail::SendMail($email_pembeli, $nama_pembeli, 'E-Ticket Teater: Lunas', $message);
            file_put_contents($log_file, "SUKSES: Email berhasil dikirim!\n\n", FILE_APPEND);
        } catch (Exception $e) {
            file_put_contents($log_file, "GAGAL KIRIM EMAIL: " . $e->getMessage() . "\n\n", FILE_APPEND);
        }
        
    } else {
        file_put_contents($log_file, "GAGAL: Data transaksi tidak ditemukan atau kosong saat di-JOIN.\n\n", FILE_APPEND);
    }
}
?>