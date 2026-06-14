<?php
// 1. Inisialisasi Session
if (!isset($_SESSION)) {
    session_start();
}

// 2. Proteksi Halaman (Hanya Employee yang bisa akses)
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {
    echo "<script>alert('Akses ditolak! Halaman ini khusus Employee.'); window.location='Main.php?Pages=login';</script>";
    exit();
}

require "inc.koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Employee</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        /* Custom Navbar (Warna biru agar beda dengan Admin) */
        .navbar-custom {
            background-color: #0d6efd; /* Blue primary */
            padding: 10px 0;
            margin-bottom: 30px;
        }

        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.8) !important;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar-custom .nav-link:hover {
            color: #ffffff !important;
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
            background-color: #ffffff;
            color: #dc3545 !important;
            border-radius: 6px;
            padding: 5px 15px !important;
            font-weight: bold;
        }

        .logout-btn:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="dashboardemployee.php">EMPLOYEE PORTAL</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboardemployee.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboardemployee.php?Pages=employeeprojectlist">My Projects</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link logout-btn" href="dashboardemployee.php?Pages=logout">Logout</a>
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
                case 'employeeprojectlist':
                    include "Pages/employeeprojectlist.php";
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
            // Tampilan Awal Employee
            echo "<h2>Halo, " . $_SESSION['name '] . "!</h2>";
            echo "<p class='text-muted'>Selamat datang di dashboard karyawan. Anda masuk dengan email: <strong>" . $_SESSION['email'] . "</strong>.</p>";
            echo "<hr>";
            echo "<h5>Status Pekerjaan:</h5>";
            echo "<p>Gunakan menu <strong>My Projects</strong> untuk melihat daftar proyek yang sedang Anda kerjakan.</p>";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>