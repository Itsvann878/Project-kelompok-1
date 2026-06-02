<?php
require_once('./class/class.User.php');

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
        $objUser->role = 'employee';
        
        $objUser->AddUser();

        if ($objUser->hasil) {
            echo "<script>alert('Registrasi berhasil');</script>";
            echo "<script>window.location='main.php?Pages=login';</script>";
        }
    }
}
?>

<h4 class="title"><span class="text"><strong>Register</strong></span></h4>
<form action="" method="post">
    <table class="table" border="0">
        <tr>
            <td width="20%">Email</td>
            <td width="2%">:</td>
            <td>
                <input type="email" name="email" id="email" class="form-control" maxlength="30" required>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td>
                <input type="password" name="password" id="password" class="form-control" maxlength="30" required>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>
                <input type="text" class="form-control" id="name" name="name" maxlength="30" required>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type="submit" class="btn btn-primary" value="Register" name="btnSubmit">
                <a href="main.php" class="btn btn-danger">Cancel</a>
            </td>
        </tr>
    </table>
</form>