<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamba Sang Maha Cahaya</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        .font-serif {
            font-family: 'Georgia', 'Times New Roman', serif;
        }
        .italic {
            font-style: italic;
        }

        /* Efek Hover (Micro-interactions) */
        .btn-interactive {
            transition: all 0.3s ease-in-out;
        }
        .btn-interactive:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
        }

        .card-interactive {
            transition: all 0.4s ease;
        }
        .card-interactive:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.3) !important;
        }

        .img-interactive {
            transition: transform 0.5s ease;
        }
        .img-interactive:hover {
            transform: scale(1.08);
        }
        
        .img-wrapper {
            overflow: hidden;
            border-radius: 0.375rem; 
            height: 100%;
        }
    </style>
</head>
<body>

    <section class="hero-section text-center py-5" style="background: linear-gradient(rgba(5,10,18,0.7), rgba(5,10,18,0.7)), url('path_to_curtain_bg.jpg'); background-size: cover; min-height: 80vh; display: flex; align-items: center;">
        <div class="container" data-aos="zoom-in" data-aos-duration="1200">
            <h3 class="text-primary fw-bold">Coming Soon</h3>
            <h1 class="display-3 font-serif italic" style="color: white;">"Hamba Sang Maha Cahaya"</h1>
            <p class="lead mx-auto" style="max-width: 700px; color: white;">
                Sebuah Pertunjukan Teater Reflektif Yang Menghadirkan Perjalanan Batin Manusia, 
                <marquee behavior="scroll" direction="left" >
                    Tentang Kehilangan, Pencarian, Dan Keberanian Untuk Kembali Pulang.
                </marquee>
                <marquee behavior="scroll" direction="right">
                    Saksikan Kisah Epik Yang Menggugah Jiwa, Hanya Di Tepi Waktu Teater!
                </marquee>
            </p>
            
            <div class="mt-4">
                <a href="#" class="btn btn-primary btn-lg rounded-pill me-3 btn-interactive">View Trailer</a>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #011B72; color: white;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                    <p class="fw-bold mb-3">Filosofi</p>
                    <h2 class="display-5 font-serif fw-bold mb-4" style="line-height: 1.2;">RUANG DIALOG<br>BUDAYA</h2>
                    
                    <p class="mb-4" style="font-size: 0.95rem; line-height: 1.8;">
                        Dalam Upaya Melebarkan Kiprah Ke Dunia Seni Pertunjukan, <strong>Teater Tepi Waktu</strong> Hadir Sebagai Media Ekspresi Yang Menggabungkan Kreativitas, Refleksi, Dan Pengalaman Manusia. Teater Ini Tidak Sekadar Menjadi Ruang Pementasan, Melainkan Juga <strong>Ruang Dialog Budaya</strong> Tempat Gagasan, Emosi, Dan Nilai-Nilai Kehidupan Saling Berjumpa.
                    </p>
                    
                    <p class="small" style="line-height: 1.6; opacity: 0.85;">
                        "Di Tengah Perkembangan Seni Pertunjukan Yang Menuntut Inovasi Dan Kedekatan Dengan Realitas Sosial, Teater Tepi Waktu Berupaya Menghadirkan Karya Yang <strong>Relevan, Menyentuh, Dan Bermakna</strong>. Setiap Pertunjukan Dirancang Bukan Hanya Untuk Ditonton, Tetapi Untuk <strong>Dipahami Dan Direnungkan</strong>."
                    </p>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="img-wrapper">
                                <img src="img/filo1.jpg" class="img-fluid w-100 img-interactive" style="object-fit: cover; height: 250px;" alt="Scene Teater 1">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="img-wrapper">
                                <img src="img/filo2.jpg" class="img-fluid w-100 img-interactive" style="object-fit: cover; height: 250px;" alt="Scene Teater 2">
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="img-wrapper">
                                <img src="img/filo3.jpg" class="img-fluid w-100 img-interactive" style="object-fit: cover; height: 300px;" alt="Monolog Scene">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #d8dbdf;">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="800">
                <h2 class="font-serif fw-bold" style="color: #1a2a47;">Our History</h2>
            </div>
            
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="card border-0 shadow-sm card-interactive" style="border-radius: 12px; border-top: 6px solid #6f42c1 !important;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="fw-bold mb-3" style="color: #1a2a47;">GRAHA BAKTI BUDAYA<br>MILESTONE</h3>
                            <p class="mb-4 text-muted" style="font-size: 0.95rem;">
                                Sebuah pertunjukan teater reflektif yang menghadirkan perjalanan batin manusia,tentang kehilangan, pencarian, dan keberanian untuk kembali pulang
                            </p>
                            
                            <div class="p-3 mb-4 rounded" style="background-color: #e9ecef; border-left: 4px solid #6f42c1;">
                                <h4 class="fw-bold mb-1" style="color: #1a2a47;">1.8000 + Audience Members</h4>
                                <p class="mb-0 small text-muted fw-bold">A SOLD-OUT PREMIERE</p>
                            </div>
                            
                            <p class="text-center fst-italic text-muted mb-0" style="font-size: 0.9rem;">
                                "Teater ini sangat menyentuh bagi saya pribadi, karena perjuangan anak muda dalam menempuh pendidikan untuk tidak menyerah dalam mimpinya."<br>
                                <span class="d-block mt-2">- Coach Fatwa -</span>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-7">
                    <div class="row g-2 justify-content-center">
                        <div class="col-4 d-flex flex-column gap-2 mt-4" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                            <div class="img-wrapper shadow-sm">
                                <img src="img/his1.jpg" class="img-fluid w-100 img-interactive" style="height: 220px; object-fit: cover;" alt="History">
                            </div>
                        </div>
                        <div class="col-4 d-flex flex-column gap-2" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="400">
                            <div class="img-wrapper shadow-sm">
                                <img src="img/his2.jpg" class="img-fluid w-100 img-interactive" style="height: 140px; object-fit: cover;" alt="History">
                            </div>
                            <div class="img-wrapper shadow-sm">
                                <img src="img/his3.jpg" class="img-fluid w-100 img-interactive" style="height: 260px; object-fit: cover;" alt="History">
                            </div>
                        </div>
                        <div class="col-4 d-flex flex-column gap-2 mt-2" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="600">
                            <div class="img-wrapper shadow-sm">
                                <img src="img/his4.jpg" class="img-fluid w-100 img-interactive" style="height: 160px; object-fit: cover;" alt="History">
                            </div>
                            <div class="img-wrapper shadow-sm">
                                <img src="img/his5.jpg" class="img-fluid w-100 img-interactive" style="height: 160px; object-fit: cover;" alt="History">
                            </div>
                            <div class="img-wrapper shadow-sm">
                                <img src="img/filo3.jpg" class="img-fluid w-100 img-interactive" style="height: 120px; object-fit: cover;" alt="History">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        AOS.init({
            once: true, /* Animasi hanya berjalan satu kali saat pertama kali di-scroll */
            offset: 100, /* Animasi mulai saat elemen berjarak 100px dari bawah layar */
            easing: 'ease-in-out', /* Pergerakan animasi halus */
        });
    </script>
</body>
</html>