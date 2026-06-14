<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('./class/class.User.php');

if (isset($_POST['btnLogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $objUser = new User();
    $objUser->ValidateEmail($email);
    if ($objUser->hasil) {
        $ismatch = password_verify($password, $objUser->password);
        if ($ismatch) {
            $_SESSION['userid'] = $objUser->userid;
            $_SESSION['email'] = $objUser->email;
            $_SESSION['name'] = $objUser->name;
            $_SESSION['role'] = $objUser->role; // Mengambil role (admin/employee/manager)

            echo "<script>alert('Login Berhasil! Selamat Datang, " . $_SESSION['name'] . "');</script>";

            // Logika Redirection Berdasarkan Role
            if ($_SESSION['role'] == 'admin') {
                echo "<script>window.location.href = 'Main.php?Pages=dashboardAdmin';</script>";
            } else {
                echo "<script>window.location.href = 'Main.php?Pages=Home';</script>";
            }
            
        } else {
            echo "<script>alert('Password Salah!');</script>";
        }
    } else {
        echo "<script>alert('Email Tidak Ditemukan!');</script>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card bg-dark text-white border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.1) !important; backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.1) !important; border-radius: 20px;">
            <div class="card-header bg-transparent border-0 pt-4 text-center">
                <h3 class="fw-bold">Login Akun</h3>
                <p class="text-secondary small">Masuk untuk memesan tiket pertunjukan</p>
            </div>
            <div class="card-body p-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label small text-secondary">Email</label>
                        <input type="email" name="email" id="email" class="form-control bg-dark text-white border-secondary" style="background: rgba(0,0,0,0.2) !important;" placeholder="nama@email.com" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label small text-secondary">Password</label>
                        <input type="password" name="password" id="password" class="form-control bg-dark text-white border-secondary" style="background: rgba(0,0,0,0.2) !important;" placeholder="********" required>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-info-tiket py-2 fw-bold" value="Login" name="btnLogin">
                        <a href="Main.php?Pages=Home" class="btn btn-outline-light py-2">Batal</a>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-transparent border-0 text-center pb-4">
                <p class="small text-secondary mb-0">Belum punya akun? <a href="Main.php?Pages=register" class="text-info text-decoration-none">Daftar Sekarang</a></p>
            </div>
        </div>
    </div>
</div>