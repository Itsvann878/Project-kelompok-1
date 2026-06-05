<?php
class Transaction extends Connection {
    
    // Admin: Melihat riwayat semua transaksi (JOIN user & produk)
    public function ShowAllTransactions() {
        $sql = "SELECT t.*, p.nama_acara, u.name as nama_pembeli 
                FROM transaction t 
                JOIN produk_tiket p ON t.id_produk = p.id_produk 
                JOIN user u ON t.userid = u.userid 
                ORDER BY t.tanggal_transaksi DESC";
        return mysqli_query($this->connection, $sql);
    }

    // User: Melihat riwayat pribadi
    public function GetUserHistory($userid) {
        $sql = "SELECT t.*, p.nama_acara, p.poster 
                FROM transaction t 
                JOIN produk_tiket p ON t.id_produk = p.id_produk 
                WHERE t.userid = '$userid' 
                ORDER BY t.tanggal_transaksi DESC";
        return mysqli_query($this->connection, $sql);
    }
}
?>