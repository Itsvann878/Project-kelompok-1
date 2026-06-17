<?php
// 1. Panggil class yang bertanggung jawab atas data transaksi
require_once('./class/class.Transaction.php');
$objTrx = new Transaction();

// 2. Ambil ID user dari session yang aktif
$userid_login = $_SESSION['userid'];

// 3. Panggil method dari class Transaction (Menghilangkan query mentah di sini)
$result = $objTrx->GetUserHistory($userid_login);
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white fw-bold">Riwayat Pesanan Anda</h2>
        <span class="badge bg-info text-dark">User ID: <?php echo $userid_login; ?></span>
    </div>

    <div class="row g-4">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-12 col-md-6">
                    <div class="card bg-dark text-white border-0 shadow-sm" 
                         style="background: rgba(255,255,255,0.05) !important; border: 1px solid rgba(255,255,255,0.1) !important; border-radius: 15px;">
                        <div class="row g-0">
                            <div class="col-4 p-2">
                                <img src="./img/<?php echo $row['poster']; ?>" class="img-fluid rounded h-100 w-100" style="object-fit: cover; min-height: 150px;">
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title fw-bold text-info mb-1"><?php echo $row['nama_acara']; ?></h5>
                                        <small class="text-secondary">#<?php echo $row['transaction_id']; ?></small>
                                    </div>
                                    <p class="card-text small mb-2 text-secondary">
                                        <i class="bi bi-clock me-1"></i> Dipesan: <?php echo date('d M Y', strtotime($row['tanggal_transaksi'])); ?>
                                    </p>
                                    <p class="card-text mb-2">
                                        <span class="badge bg-secondary"><?php echo $row['jumlah']; ?> Tiket</span>
                                        <span class="ms-2 fw-bold text-white">Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></span>
                                    </p>
                                    <div class="pt-2 border-top border-secondary border-opacity-25 mt-2 d-flex justify-content-between align-items-center">
                                        <small class="text-secondary">Metode: <?php echo strtoupper($row['metode_bayar']); ?></small>
                                        <span class="text-success small"><i class="bi bi-check-circle-fill"></i><?php echo $row['status']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <i class="bi bi-receipt-cutoff fs-1 text-secondary opacity-50"></i>
                <p class="text-secondary mt-3">Belum ada riwayat transaksi untuk akun ini.</p>
                <a href="Main.php?Pages=Produk" class="btn btn-info-tiket btn-sm px-4">Beli Tiket Sekarang</a>
            </div>
        <?php endif; ?>
    </div>
</div>