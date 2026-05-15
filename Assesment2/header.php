<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tepi Waktu Teater</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            /* Modifikasi Background Gambar */
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

        .navbar { 
            background-color: rgba(5, 10, 18, 0.9); 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-link { color: white !important; }
        
        .nav-link:hover { color: #007bff !important; }

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

        /* Container utama agar konten tidak menempel ke background */
        main {
            flex: 1;
            background-color: rgba(0, 0, 0, 0.4); /* Efek kaca transparan */
            backdrop-filter: blur(5px); /* Efek blur halus di belakang konten */
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <!-- Link brand disesuaikan ke Main.php agar tidak error -->
        <a class="navbar-brand text-white fw-bold" href="Main.php?Pages=Home">Tepi Waktu Teater</a>
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Main.php?Pages=Home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="Main.php?Pages=Produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="Main.php?Pages=About">About</a></li>
                <li class="nav-item"><a class="nav-link" href="Main.php?Pages=Contact">Contact</a></li>
            </ul>
        </div>
        <a href="#" class="btn btn-info-tiket px-4">Info Tiket</a>
    </div>
</nav>