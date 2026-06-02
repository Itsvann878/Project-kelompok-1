<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses ditolak! Khusus Admin.'); window.location='Main.php?Pages=login';</script>";
    exit();
}

require "inc.koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        /* Custom Navbar */
        .navbar-custom {
            background-color: #212529;
            padding: 10px 0;
            margin-bottom: 30px;
        }

        .navbar-custom .nav-link {
            color: #adb5bd !important;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar-custom .nav-link:hover {
            color: #ffffff !important;
        }

        .navbar-custom .active {
            color: #ffc107 !important;
        }

        /* Content Card */
        .main-content {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            min-height: 500px;
        }

        .logout-btn {
            background-color: #dc3545;
            color: white !important;
            border-radius: 6px;
            padding: 5px 15px !important;
        }

        .logout-btn:hover {
            background-color: #bb2d3b;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="dashboardadmin.php">ADMIN PANEL</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboardadmin.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboardadmin.php?Pages=employeelist">Employee List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboardadmin.php?Pages=departmentlist">Department List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboardadmin.php?Pages=userlist">User List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboardadmin.php?Pages=employeeprojectlist">Project List</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link logout-btn" href="dashboardadmin.php?Pages=logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="main-content">
        <?php
        if (isset($_GET['Pages'])) {
            $page = $_GET['Pages'];

            switch ($page) {
                case 'employeelist':
                    include "Pages/employeelist.php";
                    break;
                case 'departmentlist':
                    include "Pages/departmentlist.php";
                    break;
                case 'userlist':
                    include "Pages/userlist.php";
                    break;
                case 'employeeprojectlist':
                    include "Pages/employeeprojectlist.php";
                    break;
                case 'employee':
                        include "Pages/employee.php";
                        break;
                case 'logout':
                    session_destroy();
                    echo "<script>alert('Log out berhasil'); window.location='Main.php?Pages=login';</script>";
                    break;
                default:
                    echo "<div class='alert alert-danger'>Halaman tidak ditemukan.</div>";
                    break;
            }
        } else {
            echo "<h2>Selamat Datang, " . $_SESSION['name'] . "!</h2>";
            echo "<p class='text-muted'>Anda masuk sebagai <strong>Admin</strong>. Gunakan navigasi di atas untuk mengelola data perusahaan.</p>";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>