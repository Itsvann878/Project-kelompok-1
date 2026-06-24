<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak! Hanya untuk Admin.'); window.location='Main.php';</script>";
    exit;
}

require_once('inc.koneksi.php');
require_once('./class/class.User.php');
require_once('./class/class.Produk.php');
require_once('./class/class.Transaction.php');

$objUser = new User();
$objProd = new Produk();
$objTrx  = new Transaction();

$page = isset($_GET['page']) ? strtolower($_GET['page']) : 'transaksi';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Elegant Soft Dark</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-image: linear-gradient(rgba(5, 10, 18, 0.7), rgba(5, 10, 18, 0.7)), url('Background.jpeg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            color: white; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1.25rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .nav-pills .nav-link {
            color: #94a3b8;
            border-radius: 0.5rem;
            padding: 0.6rem 1.2rem;
            transition: all 0.3s ease;
        }
        .nav-pills .nav-link:hover {
            color: #e2e8f0;
            background: rgba(255, 255, 255, 0.05);
        }
        .nav-pills .nav-link.active {
            background: #3b82f6;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }

        .btn-logout {
            color: #ef4444 !important;
            font-weight: 500;
        }
        .btn-logout:hover {
            background: rgba(239, 68, 68, 0.1);
        }

        .text-accent {
            color: #38bdf8;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0" style="letter-spacing: -0.5px;">Admin Dashboard</h2>
        <div class="text-secondary small">
            Login sebagai: <span class="text-accent"><?php echo $_SESSION['name']; ?></span>
        </div>
    </div>

    <div class="glass-card p-2 mb-4 d-flex justify-content-between align-items-center">
        <ul class="nav nav-pills flex-grow-1">
            <li class="nav-item">
                <a class="nav-link fw-medium <?php echo ($page == 'transaksi') ? 'active' : ''; ?>" 
                   href="dashboardAdmin.php?page=transaksi">Riwayat Transaksi</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link fw-medium <?php echo (strpos($page, 'produk') !== false) ? 'active' : ''; ?>" 
                   href="dashboardAdmin.php?page=produk">Kelola Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-medium <?php echo ($page == 'user') ? 'active' : ''; ?>" 
                   href="dashboardAdmin.php?page=user">Daftar User</a>
            </li>
        </ul>
        <a class="nav-link btn-logout px-3 py-2 rounded" href="Main.php?Pages=logout">Logout</a>
    </div>

    <div class="glass-card p-4 p-md-5">
        <?php
        switch ($page) {
            case 'transaksi':
                include './pages/admin/transaksi.php';
                break;
            case 'produk':
                include './pages/admin/produk.php';
                break;
            case 'tambahproduk':
                include './pages/admin/produk_add.php';
                break;
            case 'editproduk':
                include './pages/admin/produk_edit.php';
                break;
            case 'hapusproduk':
                include './pages/admin/produk_delete.php';
                break;
            case 'user':
                include './pages/admin/user.php';
                break;
            case 'edituser':
                include './pages/admin/user_edit.php';
                break;
            case 'hapususer':
                include './pages/admin/user_delete.php';
                break;
            default:
                include './pages/admin/transaksi.php';
                break;
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>