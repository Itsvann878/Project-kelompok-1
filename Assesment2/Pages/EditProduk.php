<?php
// Proteksi Keamanan: Hanya role 'admin' yang bisa masuk
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak! Hanya untuk Admin.'); window.location='Main.php?Pages=Home';</script>";
    exit;
}

require_once('./class/class.Produk.php');
$objProd = new Produk();

// Tangkap ID produk dari URL
if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];
    
    // Ambil data produk lama berdasarkan ID
    $result = $objProd->GetProdukByID($id_produk);
    
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data produk tidak ditemukan!'); window.location='Main.php?Pages=dashboardAdmin';</script>";
        exit;
    }
} else {
    echo "<script>window.location='Main.php?Pages=dashboardAdmin';</script>";
    exit;
}

// Proses ketika tombol Simpan ditekan
if (isset($_POST['btnSimpan'])) {
    $nama  = $_POST['nama_acara'];
    $harga = $_POST['harga'];
    $tgl   = $_POST['tanggal'];
    $desk  = $_POST['deskripsi'];

    // Jalankan perintah update dari class.Produk.php
    $update = $objProd->UpdateProduk($id_produk, $nama, $harga, $tgl, $desk);

    if ($update) {
        echo "<script>alert('Data produk berhasil diperbarui!'); window.location='Main.php?Pages=dashboardAdmin';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            
            <div class="mb-3">
                <a href="Main.php?Pages=dashboardAdmin" class="btn btn-sm btn-outline-secondary text-white border-0">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
                </a>
            </div>

            <div class="card shadow-lg rounded-4 p-4 border-0" 
                 style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1) !important;">
                
                <h4 class="text-info fw-bold mb-4"><i class="bi bi-pencil-square me-2"></i>Edit Data Pertunjukan</h4>
                
                <form action="" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label text-secondary small fw-semibold">Nama Acara / Pertunjukan</label>
                        <input type="text" class="form-control bg-dark text-white border-secondary" 
                               name="nama_acara" value="<?php echo $data['nama_acara']; ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-secondary small fw-semibold">Harga Tiket (Rp)</label>
                            <input type="number" class="form-control bg-dark text-white border-secondary" 
                                   name="harga" value="<?php echo $data['harga']; ?>" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-secondary small fw-semibold">Tanggal Pelaksanaan</label>
                            <input type="date" class="form-control bg-dark text-white border-secondary" 
                                   name="tanggal" value="<?php echo $data['tanggal']; ?>" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-secondary small fw-semibold">Deskripsi Acara</label>
                        <textarea class="form-control bg-dark text-white border-secondary" 
                                  name="deskripsi" rows="4" required><?php echo $data['deskripsi']; ?></textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="Main.php?Pages=dashboardAdmin" class="btn btn-secondary px-4 me-md-2">Batal</a>
                        <button type="submit" name="btnSimpan" class="btn btn-info px-4 text-dark fw-bold">Simpan Perubahan</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>