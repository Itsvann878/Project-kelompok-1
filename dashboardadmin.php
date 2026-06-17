<?php
// 1. Proteksi Keamanan: Hanya role 'admin' yang bisa masuk
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak! Hanya untuk Admin.'); window.location='Main.php?Pages=Home';</script>";
    exit;
}

// 2. Import semua class yang dibutuhkan
require_once('./class/class.User.php');
require_once('./class/class.Produk.php');
require_once('./class/class.Transaction.php');

// 3. Inisialisasi Object
$objUser = new User();
$objProd = new Produk();
$objTrx  = new Transaction();

// 4. Tangkap parameter Sub-Routing (Mendukung 'Action' kapital maupun 'action' kecil dari URL)
$action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_GET['action']) ? $_GET['action'] : '');
?>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white fw-bold">Admin Dashboard</h2>
        <div class="text-secondary small">Login sebagai: <span class="text-info"><?php echo $_SESSION['name']; ?></span></div>
    </div>

    <?php 
    // =========================================================================
    // CASE 1: HALAMAN EDIT PRODUK (Mendukung Kategori, Waktu, dan Upload Poster)
    // =========================================================================
    if ((strtolower($action) === 'editproduk') && isset($_GET['id'])): 
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
            
            // Cek apakah admin mengupload gambar poster baru
            $posterBaru = null;
            if ($_FILES['poster']['name'] != "") {
                $posterBaru = time() . '_' . $_FILES['poster']['name'];
                $tmp = $_FILES['poster']['tmp_name'];
                move_uploaded_file($tmp, './img/' . $posterBaru);
            }

            // Memanggil method dengan 7 parameter baru sesuai cetakan Class
            $update = $objProd->UpdateProduk($id_produk, $nama, $kategori, $desk, $harga, $tgl, $waktu, $posterBaru);
            if ($update) {
                echo "<script>alert('Data pertunjukan berhasil diperbarui!'); window.location='Main.php?Pages=dashboardAdmin';</script>";
            } else {
                echo "<script>alert('Gagal memperbarui data.');</script>";
            }
        }
    ?>
        <div class="card bg-dark text-white p-4 rounded-4 shadow-lg" style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="text-warning fw-bold mb-0"><i class="bi bi-pencil-square"></i> Edit Data Pertunjukan</h5>
                <a href="Main.php?Pages=dashboardAdmin" class="btn btn-sm btn-outline-secondary">Kembali</a>
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
                    <a href="Main.php?Pages=dashboardAdmin" class="btn btn-secondary px-4 me-2">Batal</a>
                    <button type="submit" name="btnSimpanEdit" class="btn btn-warning text-dark fw-bold px-4">Simpan Perubahan</button>
                </div>
            </form>
        </div>

    <?php 
    // =========================================================================
    // CASE 2: HALAMAN TAMBAH PRODUK BARU (Mendukung Kategori, Waktu, dan Upload Poster)
    // =========================================================================
    elseif (strtolower($action) === 'tambahproduk'): 
        
        // Logic Proses Tambah Data
        if (isset($_POST['btnTambah'])) {
            $nama     = $_POST['nama_acara'];
            $kategori = $_POST['kategori'];
            $desk     = $_POST['deskripsi'];
            $harga    = $_POST['harga'];
            $tgl      = $_POST['tanggal'];
            $waktu    = $_POST['waktu'];

            // Penanganan file upload gambar poster ke folder lokal ./img/
            $poster   = time() . '_' . $_FILES['poster']['name'];
            $tmp      = $_FILES['poster']['tmp_name'];
            
            if (move_uploaded_file($tmp, './img/' . $poster)) {
                // Memanggil method dengan melemparkan total 7 argument data (Sesuai database & class)
                $insert = $objProd->AddProduk($nama, $kategori, $desk, $harga, $tgl, $waktu, $poster);
                if ($insert) {
                    echo "<script>alert('Pertunjukan baru berhasil ditambahkan!'); window.location='Main.php?Pages=dashboardAdmin';</script>";
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
                <a href="Main.php?Pages=dashboardAdmin" class="btn btn-sm btn-outline-secondary">Kembali</a>
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
                    <a href="Main.php?Pages=dashboardAdmin" class="btn btn-secondary px-4 me-2">Batal</a>
                    <button type="submit" name="btnTambah" class="btn btn-info text-dark fw-bold px-4">Tambah Produk</button>
                </div>
            </form>
        </div>

    <?php 
    // =========================================================================
    // CASE 3: PROSES HAPUS PRODUK
    // =========================================================================
    elseif (strtolower($action) === 'hapusproduk' && isset($_GET['id'])):
        $id_produk = $_GET['id'];
        $delete = $objProd->DeleteProduk($id_produk);
        if ($delete) {
            echo "<script>alert('Pertunjukan berhasil dihapus!'); window.location='Main.php?Pages=dashboardAdmin';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data.'); window.location='Main.php?Pages=dashboardAdmin';</script>";
        }

    // =========================================================================
    // VIEW DEFAULT: TAMPILAN DASHBOARD UTAMA (TAB RIWAYAT, PRODUK, USER)
    // =========================================================================
    else: 
    ?>
        <ul class="nav nav-pills mb-4 bg-dark p-2 rounded-3" id="pills-tab" role="tablist" style="background: rgba(255,255,255,0.05) !important;">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-white fw-semibold" id="pills-trx-tab" data-bs-toggle="pill" data-bs-target="#pills-trx" type="button">Riwayat Transaksi</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-white fw-semibold" id="pills-produk-tab" data-bs-toggle="pill" data-bs-target="#pills-produk" type="button">Kelola Produk</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-white fw-semibold" id="pills-user-tab" data-bs-toggle="pill" data-bs-target="#pills-user" type="button">Daftar User</button>
            </li>
        </ul>

        <div class="tab-content shadow-lg rounded-4 p-4" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
            
            <div class="tab-pane fade show active" id="pills-trx" role="tabpanel">
                <h5 class="text-info mb-4">Semua Pembelian Tiket</h5>
                <div class="table-responsive">
                    <table class="table table-dark table-hover border-secondary">
                        <thead>
                            <tr>
                                <th>Pembeli</th>
                                <th>Pertunjukan</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Metode</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $trx = $objTrx->ShowAllTransactions();
                            while($row = mysqli_fetch_assoc($trx)): ?>
                            <tr>
                                <td><?php echo $row['nama_pembeli']; ?></td>
                                <td><?php echo $row['nama_acara']; ?></td>
                                <td><?php echo $row['jumlah']; ?> Tiket</td>
                                <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                                <td><span class="badge bg-secondary opacity-75"><?php echo strtoupper($row['metode_bayar']); ?></span></td>
                                <td><?php echo $row['status']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-produk" role="tabpanel">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-info">Manajemen Pertunjukan</h5>
                    <a href="Main.php?Pages=dashboardAdmin&Action=TambahProduk" class="btn btn-sm btn-info px-3 fw-semibold text-dark">+ Tambah Produk Baru</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-hover border-secondary">
                        <thead>
                            <tr>
                                <th>Nama Acara</th>
                                <th>Harga Satuan</th>
                                <th>Jadwal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $prod = $objProd->ShowAllProduk();
                            while($p = mysqli_fetch_assoc($prod)): ?>
                            <tr>
                                <td><?php echo $p['nama_acara']; ?></td>
                                <td>Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?></td>
                                <td><?php echo date('d M Y', strtotime($p['tanggal'])); ?></td>
                                <td>
                                    <a href="Main.php?Pages=dashboardAdmin&Action=EditProduk&id=<?php echo $p['id_produk']; ?>" class="btn btn-sm btn-outline-warning me-1">Edit</a>
                                    <a href="Main.php?Pages=dashboardAdmin&Action=HapusProduk&id=<?php echo $p['id_produk']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pertunjukan ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-user" role="tabpanel">
                <h5 class="text-info mb-4">Database Member & Staff</h5>
                <div class="table-responsive">
                    <table class="table table-dark table-hover border-secondary">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Nama Lengkap</th>
                                <th>Email Akun</th>
                                <th>Hak Akses (Role)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $users = $objUser->ShowAllUsers();
                            while($u = mysqli_fetch_assoc($users)): ?>
                            <tr>
                                <td class="text-secondary small"><?php echo $u['userid']; ?></td>
                                <td><?php echo $u['name']; ?></td>
                                <td><?php echo $u['email']; ?></td>
                                <td>
                                    <?php 
                                        $badgeColor = 'bg-primary';
                                        if($u['role'] == 'admin') $badgeColor = 'bg-danger';
                                        elseif($u['role'] == 'manager') $badgeColor = 'bg-warning text-dark';
                                    ?>
                                    <span class="badge <?php echo $badgeColor; ?>"><?php echo strtoupper($u['role']); ?></span>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    <?php endif; ?>
</div>