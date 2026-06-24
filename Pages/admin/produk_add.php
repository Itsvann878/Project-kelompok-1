<?php
// Logic Proses Tambah Data
if (isset($_POST['btnTambah'])) {
    $nama     = $_POST['nama_acara'];
    $kategori = $_POST['kategori'];
    $desk     = $_POST['deskripsi'];
    $harga    = $_POST['harga'];
    $tgl      = $_POST['tanggal'];
    $waktu    = $_POST['waktu'];

    // Penanganan file upload
    $poster   = time() . '_' . $_FILES['poster']['name'];
    $tmp      = $_FILES['poster']['tmp_name'];
    
    if (move_uploaded_file($tmp, './img/' . $poster)) {
        $insert = $objProd->AddProduk($nama, $kategori, $desk, $harga, $tgl, $waktu, $poster);
        if ($insert) {
            echo "<script>alert('Pertunjukan baru berhasil ditambahkan!'); window.location='dashboardAdmin.php?page=produk';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal menyimpan data ke database.');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengunggah berkas gambar poster ke server.');</script>";
    }
}
?>

<div class="card bg-dark text-white p-4 rounded-4 shadow-lg" style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="text-info fw-bold mb-0">+ Tambah Pertunjukan Baru</h5>
        <a href="dashboardAdmin.php?page=produk" class="btn btn-sm btn-outline-secondary">Kembali</a>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="mb-3 col-md-8">
                <label class="form-label text-secondary small">Nama Acara / Pertunjukan</label>
                <input type="text" class="form-control bg-dark text-white border-secondary" name="nama_acara" placeholder="Masukkan nama acara..." required>
            </div>
            <div class="mb-3 col-md-4">
                <label class="form-label text-secondary small">Kategori Event</label>
                <select class="form-select bg-dark text-white border-secondary" name="kategori" required>
                    <option value="" disabled selected>Pilih Kategori...</option>
                    <option value="Teater">Teater</option>
                    <option value="Konser">Konser</option>
                    <option value="Drama">Drama</option>
                    <option value="Musical">Musical</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small">Harga Satuan (Rp)</label>
                <input type="number" class="form-control bg-dark text-white border-secondary" name="harga" placeholder="Contoh: 150000" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small">Jadwal Tanggal</label>
                <input type="date" class="form-control bg-dark text-white border-secondary" name="tanggal" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small">Waktu / Jam Pertunjukan</label>
                <input type="time" class="form-control bg-dark text-white border-secondary" name="waktu" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label text-secondary small">Upload File Poster Tiket</label>
            <input type="file" class="form-control bg-dark text-white border-secondary" name="poster" required>
        </div>
        <div class="mb-4">
            <label class="form-label text-secondary small">Deskripsi Acara</label>
            <textarea class="form-control bg-dark text-white border-secondary" name="deskripsi" rows="4" placeholder="Tulis deskripsi atau sinopsis pertunjukan di sini..." required></textarea>
        </div>
        <div class="text-end">
            <a href="dashboardAdmin.php?page=produk" class="btn btn-secondary px-4 me-2">Batal</a>
            <button type="submit" name="btnTambah" class="btn btn-info text-dark fw-bold px-4">Tambah Produk</button>
        </div>
    </form>
</div>