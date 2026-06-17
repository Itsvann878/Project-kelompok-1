<?php
// WAJIB: Panggil file class agar objek Produk bisa dikenali
require_once('./class/class.Produk.php'); 

// 1. Ambil ID dari URL
$id_produk = isset($_GET['id']) ? $_GET['id'] : 0;

// 2. Panggil Class Produk dan ambil datanya
$objProduk = new Produk();
$result = $objProduk->GetProdukByID($id_produk);
$data = mysqli_fetch_assoc($result);

// 3. Jika ID tidak ditemukan di database, kembalikan ke halaman produk
if (!$data) {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='Main.php?Pages=Produk';</script>";
    exit;
}
?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card bg-dark text-white border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.1) !important; backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.1) !important; border-radius: 20px;">
                <div class="card-body p-4 p-md-5">
                    <div class="row">
                        <div class="col-md-5 mb-4 mb-md-0 border-end border-secondary border-opacity-25">
                            <h5 class="text-info fw-bold mb-3">Detail Pesanan</h5>
                            <div class="mb-4">
                                <small class="text-secondary d-block">Pertunjukan</small>
                                <span class="fs-5 fw-bold"><?php echo $data['nama_acara']; ?></span>
                            </div>
                            <div class="mb-4">
                                <small class="text-secondary d-block">Harga per Tiket</small>
                                <span class="fs-5 text-info">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></span>
                            </div>
                            <div class="p-3 rounded-3" style="background: rgba(0, 0, 0, 0.2);">
                                <small class="text-secondary d-block mb-2"><i class="bi bi-info-circle me-1"></i> Informasi</small>
                                <p class="small mb-0 text-secondary">Tiket akan dikirimkan ke email <strong><?php echo $_SESSION['email']; ?></strong>.</p>
                            </div>
                        </div>

                        <div class="col-md-7 ps-md-4">
                            <h5 class="fw-bold mb-4">Formulir Pembelian</h5>
                            <form action="Main.php?Pages=proses_beli" method="POST">
                                <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>">
                                
                                <div class="mb-3">
                                    <label class="form-label small text-secondary">Nama Pemesan</label>
                                    <input type="text" class="form-control bg-dark text-white border-secondary" value="<?php echo $_SESSION['name']; ?>" readonly>
                                </div>

                                <div class="mb-4">
                                    <label for="jumlah_tiket" class="form-label small text-secondary">Jumlah Tiket</label>
                                    <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control bg-dark text-white border-secondary" min="1" max="10" value="1" required>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" name="btnBeli" class="btn btn-info-tiket py-2 fw-bold">Lanjut ke Pembayaran</button>
                                    <a href="Main.php?Pages=Produk" class="btn btn-outline-light py-2">Kembali Pilih Tiket</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>