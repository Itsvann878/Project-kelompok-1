<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tepi Waktu Teater</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Konfigurasi Dasar & Latar Belakang Seluruh Halaman */
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

        /* Navigasi Utama */
        .navbar { 
            background-color: rgba(5, 10, 18, 0.9); 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-link { color: white !important; }
        .nav-link:hover { color: #007bff !important; }

        /* Dropdown Akun Pengguna (Konsep Modifikasi ala Shopee) */
        .user-dropdown .dropdown-toggle::after { 
            display: none; /* Menghilangkan ikon panah bawaan Bootstrap */
        } 
        
        .user-avatar {
            width: 35px;
            height: 35px;
            background-color: #007bff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        /* Efek sedikit membesar saat avatar disorot (hover) */
        .user-avatar:hover {
            transform: scale(1.05);
        }

        /* Tombol Info Tiket */
        .btn-info-tiket { 
            border-radius: 20px; 
            background-color: #007bff; 
            color: white; 
            transition: 0.3s;
        }

        .btn-info-tiket:hover {
            background-color: #0056b3;
            color: white;
        }

        /* Pembungkus Konten Dinamis (Efek Kaca / Glassmorphism) */
        main {
            flex: 1;
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            padding: 20px;
            margin: 20px auto;
            width: 90%;
        }
    </style>
</head>
<body>

<!-- Awal Navigasi -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <!-- Brand / Logo Aplikasi -->
        <a class="navbar-brand text-white fw-bold" href="Main.php?Pages=Home">Tepi Waktu Teater</a>
        
        <!-- Menu Navigasi Tengah -->
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Main.php?Pages=Home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="Main.php?Pages=Produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="Main.php?Pages=About">About</a></li>
                <li class="nav-item"><a class="nav-link" href="Main.php?Pages=Contact">Contact</a></li>
            </ul>
        </div>

        <!-- Menu Autentikasi & Profil Kanan -->
        <div class="d-flex align-items-center">
            <?php if(isset($_SESSION['role'])): ?>
                <!-- TAMPILAN JIKA USER SUDAH LOGIN -->
                <div class="dropdown user-dropdown">
                    <!-- Avatar bertindak sebagai tombol pembuka dropdown -->
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar me-2">
                            <?php echo strtoupper(substr($_SESSION['name'], 0, 1)); ?>
                        </div>
                        <span class="d-none d-lg-inline text-white"><?php echo $_SESSION['name']; ?></span>
                    </a>
                    <!-- Isi Menu Dropdown -->
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><a class="dropdown-item" href="Main.php?Pages=profile">Profil Saya</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger fw-bold" href="Main.php?Pages=logout">Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <!-- TAMPILAN JIKA USER BELUM LOGIN -->
                <a href="Main.php?Pages=login" class="nav-link me-3">Login</a>
                <a href="Main.php?Pages=register" class="btn btn-outline-light btn-sm me-3">Daftar</a>
            <?php endif; ?>
            
        </div>
    </div>
</nav>
<!-- Akhir Navigasi -->

<!-- 
    TAG PEMBUKA UTAMA (<main>)
    Menampung seluruh konten halaman dinamis (Home, Profile, Produk, dll) 
    agar tidak merusak layout dasar dan memiliki efek background transparan.
    Tag penutup </main> diletakkan di bagian paling atas file footer.php.
-->
<main>