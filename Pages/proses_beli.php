<?php
// Pastikan session sudah dimulai jika menggunakan $_SESSION
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once dirname(__FILE__).'/../vendor/autoload.php';

// Konfigurasi Midtrans
// PENTING: Jaga kerahasiaan Server Key ini!
\Midtrans\Config::$serverKey = 'masukan server key midtrans';
\Midtrans\Config::$isProduction = false; // Set true jika sudah live
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

// 1. WAJIB: Panggil file class
require_once('./class/class.Produk.php'); 
require_once('./class/class.Mail.php');
require_once('./class/class.User.php');

// Pastikan tombol beli sudah diklik
if (isset($_POST['btnBeli'])) {
    $userid = $_SESSION['userid']; 
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah_tiket'];
    
    // Metode kita set default karena user akan memilihnya nanti di Pop-up Midtrans
    $metode = "Midtrans Gateway"; 
    // Tambahkan variabel status (pastikan ada kolom 'status' di tabel database)
    $status = "pending"; 

    // Inisialisasi objek
    $objProduk = new Produk();

    // Ambil harga dari database
    $res_price = $objProduk->GetProdukByID($id_produk);
    $data_price = mysqli_fetch_assoc($res_price);
    $total_harga = $data_price['harga'] * $jumlah;

    // Masukkan ke tabel transaction DULU (status pending)
    $sql_ins = "INSERT INTO transaction (userid, id_produk, jumlah, total_harga, metode_bayar, status) 
                VALUES ('$userid', '$id_produk', '$jumlah', '$total_harga', '$metode', '$status')";
    
    $simpan = mysqli_query($objProduk->connection, $sql_ins);

    if ($simpan) {
        // AMBIL TRANSACTION_ID YANG BARU SAJA DISIMPAN
        $transaction_id = mysqli_insert_id($objProduk->connection);

        // Jadikan transaction_id sebagai order_id ke Midtrans (biar unik dan sinkron)
        $order_id_midtrans = "TKT-" . $transaction_id;

        //Siapkan Parameter untuk Midtrans
        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id_midtrans,
                'gross_amount' => $total_harga,
            ),
            'customer_details' => array(
                'first_name' => $_SESSION['name'],
                'email' => $_SESSION['email'], 
            ),
        );

        try {
            //Request Snap Token
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            
            //TAMPILKAN HALAMAN TRANSISI POP-UP MIDTRANS
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Menunggu Pembayaran...</title>
                <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="MASUKAN CLIENKEY MIDTRANS"></script>
                <style>
                    body { font-family: Arial, sans-serif; text-align: center; margin-top: 100px; }
                    .btn-pay { padding: 12px 24px; font-size: 16px; cursor: pointer; background-color: #007bff; color: white; border: none; border-radius: 5px; }
                </style>
            </head>
            <body>
                <h2>Sedang memproses pembayaran...</h2>
                <p>Klik tombol di bawah ini jika Pop-up pembayaran tidak muncul secara otomatis.</p>
                <button id="pay-button" class="btn-pay">Bayar Sekarang</button>

                <script type="text/javascript">
                    // Logika ketika tombol bayar ditekan
                    document.getElementById('pay-button').onclick = function(){
                        snap.pay('<?php echo $snapToken; ?>', {
                            onSuccess: function(result){
                                // Pembeli berhasil bayar di pop-up
                                window.location.href = 'Main.php?Pages=riwayat&status=success';
                            },
                            onPending: function(result){
                                // Pembeli memilih metode (misal Transfer bank) tapi belum transfer uangnya
                                window.location.href = 'Main.php?Pages=riwayat&status=pending';
                            },
                            onError: function(result){
                                // Pembayaran gagal
                                alert("Pembayaran gagal!");
                                window.location.href = 'Main.php?Pages=riwayat';
                            },
                            onClose: function(){
                                // Pembeli menutup popup sebelum bayar
                                alert('Anda menutup popup sebelum menyelesaikan pembayaran.');
                            }
                        });
                    };

                    // Trigger otomatis klik sesaat setelah halaman beres dimuat
                    window.onload = function() {
                        document.getElementById('pay-button').click();
                    }
                </script>
            </body>
            </html>
            <?php
            // Hentikan eksekusi PHP agar tidak berlanjut ke bawah
            exit;

        } catch (Exception $e) {
            echo "<script>alert('Gagal terhubung ke Midtrans: " . $e->getMessage() . "'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('Gagal menyimpan pesanan: " . mysqli_error($objProduk->connection) . "'); window.history.back();</script>";
    }
}
?>