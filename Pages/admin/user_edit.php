<?php
if (!isset($_GET['id'])) {
    echo "<script>alert('ID User tidak ditemukan!'); window.location='dashboardAdmin.php?page=user';</script>";
    exit;
}

$id_user = $_GET['id'];

// Pastikan method ini ada di class.User.php kamu
$result = $objUser->GetUserByID($id_user); 
$data = mysqli_fetch_assoc($result);

if (isset($_POST['btnSimpanEdit'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $role  = $_POST['role'];
    
    // Pastikan method UpdateUser ada di class.User.php kamu
    $update = $objUser->UpdateUser($id_user, $nama, $email, $role);
    
    if ($update) {
        echo "<script>alert('Data user berhasil diperbarui!'); window.location='dashboardAdmin.php?page=user';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal memperbarui data user.');</script>";
    }
}
?>

<div class="glass-card p-4 p-md-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="text-warning fw-bold mb-0">Edit Data User</h5>
        <a href="dashboardAdmin.php?page=user" class="btn btn-sm btn-outline-secondary">Kembali</a>
    </div>
    
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small">Nama Lengkap</label>
                <input type="text" class="form-control bg-dark text-white border-secondary" name="nama" value="<?php echo $data['name']; ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small">Alamat Email</label>
                <input type="email" class="form-control bg-dark text-white border-secondary" name="email" value="<?php echo $data['email']; ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="form-label text-secondary small">Hak Akses (Role)</label>
                <select class="form-select bg-dark text-white border-secondary" name="role" required>
                    <option value="user" <?php echo ($data['role'] == 'user') ? 'selected' : ''; ?>>User (Customer)</option>
                    <option value="manager" <?php echo ($data['role'] == 'manager') ? 'selected' : ''; ?>>Manager</option>
                    <option value="admin" <?php echo ($data['role'] == 'admin') ? 'selected' : ''; ?>>Admin (Super User)</option>
                </select>
            </div>
        </div>
        
        <div class="text-end mt-2">
            <a href="dashboardAdmin.php?page=user" class="btn btn-secondary px-4 me-2">Batal</a>
            <button type="submit" name="btnSimpanEdit" class="btn btn-warning text-dark fw-bold px-4">Simpan Perubahan</button>
        </div>
    </form>
</div>