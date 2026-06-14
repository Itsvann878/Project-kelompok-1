<?php
require_once('./class/class.User.php');
require_once('./class/class.Mail.php');

if (isset($_POST['btnSubmit'])) {
    $inputemail = $_POST["email"];
    $objUser = new User();
    $objUser->ValidateEmail($inputemail);

    if ($objUser->hasil) {
        echo "<script>alert('Email sudah terdaftar');</script>";
    } else {
        $objUser->email = $_POST["email"];
        $password = $_POST['password'];
        $objUser->password = password_hash($password, PASSWORD_DEFAULT);
        $objUser->name = $_POST["name"];
        $objUser->role = 'employee'; // Role default sesuai kode asli Anda
        
        $objUser->AddUser();

        if ($objUser->hasil) {
            $message = "
                <h2>Registrasi Berhasil</h2>
                <p> Selamat <b>{$objUser->name}</b>, anda telah terdaftar pada Web <b>TEPI WAKTU PRODUCTION</b>.</p>
                <p>Berikut informasi akun Anda:</p>
                <ul>
                    <li>Username: {$objUser->email}</li>
                    <li>Password: {$password}</li>
                </ul>

                <p> Silakan login untuk mengakses sistem.</p>
                ";

                Mail::SendMail($objUser->email, $objUser->name, 'Registrasi berhasil', $message);

            echo "<script>alert('Registrasi berhasil, Silahkan Login');</script>";
            echo "<script>window.location='main.php?Pages=login';</script>";
        }
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card bg-dark text-white border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.1) !important; backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.1) !important;">
            <div class="card-header bg-transparent border-0 pt-4 text-center">
                <h3 class="fw-bold">Daftar Akun</h3>
                <p class="text-secondary small">Lengkapi data untuk bergabung dengan Tepi Waktu</p>
            </div>
            <div class="card-body p-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label small text-secondary">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control bg-dark text-white border-secondary" placeholder="Nama Anda" maxlength="30" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label small text-secondary">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control bg-dark text-white border-secondary" placeholder="nama@email.com" maxlength="30" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label small text-secondary">Password</label>
                        <input type="password" name="password" id="password" class="form-control bg-dark text-white border-secondary" placeholder="********" maxlength="30" required>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-info-tiket py-2" value="Daftar Sekarang" name="btnSubmit">
                        <a href="Main.php?Pages=Home" class="btn btn-outline-light py-2">Batal</a>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-transparent border-0 text-center pb-4">
                <p class="small text-secondary mb-0">Sudah punya akun? <a href="Main.php?Pages=login" class="text-info text-decoration-none">Masuk di sini</a></p>
            </div>
        </div>
    </div>
</div>