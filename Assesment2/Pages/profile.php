<?php
// Proteksi halaman: Jika belum login, tendang ke halaman login
if (!isset($_SESSION['role'])) {
    echo "<script>alert('Silahkan login untuk melihat profil'); window.location='Main.php?Pages=login';</script>";
    exit();
}
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card bg-dark text-white border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.1) !important; backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.1) !important;">
            
            <div class="card-header bg-transparent border-0 pt-5 text-center">
                <div class="user-avatar mx-auto mb-3 shadow" style="width: 100px; height: 100px; font-size: 40px; border: 3px solid #007bff;">
                    <?php echo strtoupper(substr($_SESSION['name'], 0, 1)); ?>
                </div>
                <h3 class="fw-bold"><?php echo $_SESSION['name']; ?></h3>
                <span class="badge bg-primary px-3 rounded-pill"><?php echo strtoupper($_SESSION['role']); ?> MEMBER</span>
            </div>

            <div class="card-body px-5 py-4">
                <div class="row mb-4 align-items-center">
                    <div class="col-sm-4">
                        <label class="text-secondary small text-uppercase fw-bold">Email Address</label>
                    </div>
                    <div class="col-sm-8">
                        <p class="mb-0 fs-5"><?php echo $_SESSION['email']; ?></p>
                    </div>
                </div>

                <div class="row mb-4 align-items-center">
                    <div class="col-sm-4">
                        <label class="text-secondary small text-uppercase fw-bold">Account Status</label>
                    </div>
                    <div class="col-sm-8">
                        <p class="mb-0 text-info"><i class="bi bi-check-circle-fill me-2"></i>Verified Account</p>
                    </div>
                </div>

                <div class="row mb-4 align-items-center">
                    <div class="col-sm-4">
                        <label class="text-secondary small text-uppercase fw-bold">Join Date</label>
                    </div>
                    <div class="col-sm-8">
                        <p class="mb-0"><?php echo date('d F Y'); // Menampilkan tanggal hari ini sebagai simulasi ?></p>
                    </div>
                </div>

                <hr style="border-color: rgba(255,255,255,0.1);">

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="Main.php?Pages=Home" class="btn btn-outline-light px-4 rounded-pill">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                    <a href="Main.php?Pages=riwayat" class="btn btn-info-tiket px-4">
                        Lihat Riwayat Tiket
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>