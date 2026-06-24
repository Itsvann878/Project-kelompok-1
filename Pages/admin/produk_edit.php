<?php
// Proteksi: Pastikan ID Produk tersedia di URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID Produk tidak ditemukan!'); window.location='dashboardAdmin.php?page=produk';</script>";
    exit;
}

$id_produk = $_GET['id'];
$result = $objProd->GetProdukByID($id_produk);
$data = mysqli_fetch_assoc($result);

// Logic Proses Simpan Edit
if (isset($_POST['btnSimpanEdit'])) {
    $nama     = $_POST['nama_acara'];
    $kategori = $_POST['kategori'];
    $desk     = $_POST['deskripsi'];
    $harga    = $_POST['harga'];
    $tgl      = $_POST['tanggal'];
    $waktu    = $_POST['waktu'];
    
    // Cek upload gambar poster baru
    $posterBaru = null;
    if (isset($_FILES['poster']['name']) && $_FILES['poster']['name'] != "") {
        $posterBaru = time() . '_' . $_FILES['poster']['name'];
        $tmp = $_FILES['poster']['tmp_name'];
        move_uploaded_file($tmp, './img/' . $posterBaru);
    }

    $update = $objProd->UpdateProduk($id_produk, $nama, $kategori, $desk, $harga, $tgl, $waktu, $posterBaru);
    if ($update) {
        echo "<script>alert('Data pertunjukan berhasil diperbarui!'); window.location='dashboardAdmin.php?page=produk';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}
?>

<div class="card bg-dark text-white p-4 rounded-4 shadow-lg" style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="text-warning fw-bold mb-0"><i class="bi bi-pencil-square"></i> Edit Data Pertunjukan</h5>
        <a href="dashboardAdmin.php?page=produk" class="btn btn-sm btn-outline-secondary">Kembali</a>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8 mb-3">
                <label class="form-label text-secondary small">Nama Acara / Pertunjukan</label>
                <input type="text" class="form-control bg-dark text-white border-secondary" name="nama_acara" value="<?php echo $data['nama_acara']; ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small">Kategori</label>
                <select class="form-select bg-dark text-white border-secondary" name="kategori" required>
                    <option value="Teater" <?php echo ($data['kategori'] == 'Teater') ? 'selected' : ''; ?>>Teater</option>
                    <option value="Konser" <?php echo ($data['kategori'] == 'Konser') ? 'selected' : ''; ?>>Konser</option>
                    <option value="Drama" <?php echo ($data['kategori'] == 'Drama') ? 'selected' : ''; ?>>Drama</option>
                    <option value="Musical" <?php echo ($data['kategori'] == 'Musical') ? 'selected' : ''; ?>>Musical</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small">Harga Satuan (Rp)</label>
                <input type="number" class="form-control bg-dark text-white border-secondary" name="harga" value="<?php echo $data['harga']; ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small">Jadwal Tanggal</label>
                <input type="date" class="form-control bg-dark text-white border-secondary" name="tanggal" value="<?php echo $data['tanggal']; ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small">Waktu / Jam Main</label>
                <input type="time" class="form-control bg-dark text-white border-secondary" name="waktu" value="<?php echo $data['waktu']; ?>" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label text-secondary small">Poster Saat Ini: <span class="text-info"><?php echo $data['poster']; ?></span></label>
            <input type="file" class="form-control bg-dark text-white border-secondary" name="poster">
            <div class="form-text text-muted small">Kosongkan berkas jika tidak ingin memperbarui foto poster.</div>
        </div>
        <div class="mb-4">
            <label class="form-label text-secondary small">Deskripsi Acara</label>
            <textarea class="form-control bg-dark text-white border-secondary" name="deskripsi" rows="4" required><?php echo isset($data['deskripsi']) ? $data['deskripsi'] : ''; ?></textarea>
        </div>
        <div class="text-end">
            <a href="dashboardAdmin.php?page=produk" class="btn btn-secondary px-4 me-2">Batal</a>
            <button type="submit" name="btnSimpanEdit" class="btn btn-warning text-dark fw-bold px-4">Simpan Perubahan</button>
        </div>
    </form>
</div>