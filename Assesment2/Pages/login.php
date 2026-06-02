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
            $_SESSION['role'] = $objUser->role;

            echo "<script>alert('Login Berhasil!');</script>";

            if ($objUser->role == 'employee') {
                echo "<script>window.location.href = 'dashboardemployee.php';</script>";
            } else if ($objUser->role == 'admin') {
                echo "<script>window.location.href = 'dashboardadmin.php';</script>";
            } else if ($objUser->role == 'manager') {
                echo "<script>window.location.href = 'Main.php?Pages=manager.php';</script>";
            }
            
        } else {
            echo "<script>alert('Password Salah!');</script>";
        }
        
    } else {
        echo "<script>alert('Email Tidak Ditemukan!');</script>";
    }
}
?>

<h4 class="title"><span class="text"><strong>Login</strong></span></h4>
<form action="" method="post">
    <table class="table" border="0">
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>
                <input type="email" name="email" id="email" class="form-control" maxlength="30" required>
            </td> </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td>
                <input type="password" name="password" id="password" class="form-control" maxlength="30" required>
            </td> </tr>
        <tr> <td></td>
            <td></td>
            <td>
                <input type="submit" class="btn btn-success" value="Login" name="btnLogin">
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </td> </tr>
    </table>
</form>