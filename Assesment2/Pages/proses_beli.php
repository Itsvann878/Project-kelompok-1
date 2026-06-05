<?php
// 1. WAJIB: Panggil file class agar sistem mengenali 'new Produk()'
require_once('./class/class.Produk.php'); 

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
        echo "<script>alert('Transaksi Berhasil! Silahkan cek riwayat.'); window.location='Main.php?Pages=riwayat';</script>";
    } else {
        echo "<script>alert('Gagal memproses transaksi: " . mysqli_error($objProduk->connection) . "'); window.history.back();</script>";
    }
}
?>