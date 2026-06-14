<?php
class Produk extends Connection {
    
    public function ShowAllProduk() {
        $sql = "SELECT * FROM produk_tiket ORDER BY tanggal ASC";
        return mysqli_query($this->connection, $sql);
    }

    public function GetProdukByID($id) {
        $sql = "SELECT * FROM produk_tiket WHERE id_produk = '$id'";
        return mysqli_query($this->connection, $sql);
    }

    // 1. Update Fungsi UpdateProduk agar mendukung Kategori, Waktu, dan Poster opsional
    public function UpdateProduk($id, $nama, $kategori, $deskripsi, $harga, $tanggal, $waktu, $poster = null) {
        if ($poster) {
            // Jika admin mengupload gambar poster baru
            $sql = "UPDATE produk_tiket 
                    SET nama_acara = '$nama', 
                        kategori = '$kategori',
                        deskripsi = '$deskripsi',
                        harga = '$harga', 
                        tanggal = '$tanggal', 
                        waktu = '$waktu',
                        poster = '$poster'
                    WHERE id_produk = '$id'";
        } else {
            // Jika admin mengosongkan input file gambar (pakai poster lama)
            $sql = "UPDATE produk_tiket 
                    SET nama_acara = '$nama', 
                        kategori = '$kategori',
                        deskripsi = '$deskripsi',
                        harga = '$harga', 
                        tanggal = '$tanggal', 
                        waktu = '$waktu'
                    WHERE id_produk = '$id'";
        }
        return mysqli_query($this->connection, $sql);
    }

    // 2. Update Fungsi AddProduk agar semua kolom database terisi dengan lengkap
    public function AddProduk($nama, $kategori, $deskripsi, $harga, $tanggal, $waktu, $poster) {
        $sql = "INSERT INTO produk_tiket (nama_acara, kategori, deskripsi, harga, tanggal, waktu, poster) 
                VALUES ('$nama', '$kategori', '$deskripsi', '$harga', '$tanggal', '$waktu', '$poster')";
        return mysqli_query($this->connection, $sql);
    }

    public function DeleteProduk($id) {
        $sql = "DELETE FROM produk_tiket WHERE id_produk = '$id'";
        return mysqli_query($this->connection, $sql);
    }
}
?>