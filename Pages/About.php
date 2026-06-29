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
                        <div class="img-wrapper"><img src="img/filo1.jpg" class="img-fluid w-100 img-interactive" style="object-fit: cover; height: 250px;" alt="Scene Teater 1"></div>
                    </div>
                    <div class="col-6">
                        <div class="img-wrapper"><img src="img/filo2.jpg" class="img-fluid w-100 img-interactive" style="object-fit: cover; height: 250px;" alt="Scene Teater 2"></div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="img-wrapper"><img src="img/filo3.jpg" class="img-fluid w-100 img-interactive" style="object-fit: cover; height: 300px;" alt="Monolog Scene"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #06111f; color: white;">
    <div class="container py-5">
        <div class="text-center" data-aos="fade-up" data-aos-duration="800">
            <p class="fw-bold mb-4" style="font-size: 1.1rem; letter-spacing: 1px;">Project Manager</p>
            <h2 class="display-5 font-serif fw-bold mb-4" style="line-height: 1.3;">
                DISELENGGARAKAN OLEH<br>FELLOWSHIP UAG
            </h2>
            <div class="mx-auto text-center mb-5" style="max-width: 800px;">
                <p style="font-size: 1rem; line-height: 1.8; opacity: 0.9;">
                    "Langkah menuju Generasi Emas 2045 keluarga besar <strong>Penerima Beasiswa Fellowship Universitas Ary Ginanjar dan ESQ Busines School</strong>, menciptakan gagasan, kreativitas, inovasi untuk mencetak para generasi emas 2045."
                </p>
            </div>
        </div>
        
        <div class="row g-4 mt-2 justify-content-center">
            <div class="col-12 col-md-6 col-lg-3 d-flex flex-column gap-3" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <div class="img-wrapper shadow-sm"><img src="img/felo1.jpeg" class="img-fluid w-100 img-interactive" style="object-fit: cover; height: 180px;" alt="Dokumentasi 1"></div>
                <div class="img-wrapper shadow-sm"><img src="img/felo2.jpeg" class="img-fluid w-100 img-interactive" style="object-fit: cover; height: 180px;" alt="Dokumentasi 2"></div>
            </div>
            
            <div class="col-12 col-md-6 col-lg-3 d-flex" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="img-wrapper w-100 shadow-sm"><img src="img/felo3.jpeg" class="img-fluid w-100 img-interactive" style="object-fit: cover; height: 100%; min-height: 380px;" alt="Dokumentasi 3"></div>
            </div>
            
            <div class="col-12 col-md-6 col-lg-3 d-flex align-items-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <div class="img-wrapper w-100 shadow-sm"><img src="img/felo4.jpeg" class="img-fluid w-100 img-interactive" style="object-fit: cover; border: 1px solid rgba(255,255,255,0.1);" alt="Poster Fellowship 1"></div>
            </div>
            
            <div class="col-12 col-md-6 col-lg-3 d-flex align-items-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="img-wrapper w-100 shadow-sm"><img src="img/felo5.jpeg" class="img-fluid w-100 img-interactive" style="object-fit: cover; border: 1px solid rgba(255,255,255,0.1);" alt="Poster Fellowship 2"></div>
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