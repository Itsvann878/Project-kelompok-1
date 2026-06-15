<?php
// 1. WAJIB: Panggil file class agar sistem mengenali 'new Produk()'
require_once('./class/class.Produk.php'); 
require_once('./class/class.Mail.php');
require_once('./class/class.User.php');

// Pastikan tombol beli sudah diklik
if (isset($_POST['btnBeli'])) {
    $userid = $_SESSION['userid']; 
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah_tiket'];
    $metode = $_POST['metode'];

    // 2. Inisialisasi objek
    $objProduk = new Produk();

    // 3. Gunakan method GetProdukByID yang sudah kita buat di class untuk ambil harga
    $res_price = $objProduk->GetProdukByID($id_produk);
    $data_price = mysqli_fetch_assoc($res_price);
    
    // Hitung total harga
    $total_harga = $data_price['harga'] * $jumlah;

    // 4. Masukkan ke tabel penengah (transaction)
    // Gunakan $objProduk->connection karena class Produk sudah extends Connection
    $sql_ins = "INSERT INTO transaction (userid, id_produk, jumlah, total_harga, metode_bayar) 
                VALUES ('$userid', '$id_produk', '$jumlah', '$total_harga', '$metode')";
    
    $simpan = mysqli_query($objProduk->connection, $sql_ins);

    if ($simpan) {
        $message = "
            <html>
            <body>
                <h2>✅ Pembelian Tiket Berhasil!</h2>
                <p>Halo <b>{$_SESSION['name']}</b>,</p>
                <p>Terima kasih telah membeli tiket untuk acara <b>{$data_price['nama_acara']}</b>. Berikut detail pemesanan Anda:</p>
                <table border='0' cellpadding='8'>
                    <tr><td><b>Nama Acara</b></td><td>: {$data_price['nama_acara']}</td></tr>
                    <tr><td><b>Nama Pembeli</b></td><td>: {$_SESSION['name']}</td></tr>
                    <tr><td><b>Jumlah Tiket</b></td><td>: $jumlah</td></tr>
                    <tr><td><b>Total Harga</b></td><td>: Rp " . number_format($total_harga, 0, ',', '.') . "</td></tr>
                    <tr><td><b>Metode Bayar</b></td><td>: $metode</td></tr>
                </table>
                <br>
                <p>Simpan email ini sebagai bukti pembelian Anda.</p>
                <p>Sampai jumpa di acara! 🎭</p>
                <hr>
                <small>Tepi Waktu Teater</small>
            </body>
            </html>
            ";

                Mail::SendMail($_SESSION['email'], $_SESSION['name'], 'Pembayaran berhasil', $message);

                echo "<script>alert('Transaksi Berhasil! Silahkan cek riwayat.'); window.location='Main.php?Pages=riwayat';</script>";
    } else {
        echo "<script>alert('Gagal memproses transaksi: " . mysqli_error($objProduk->connection) . "'); window.history.back();</script>";
    }
}
?>