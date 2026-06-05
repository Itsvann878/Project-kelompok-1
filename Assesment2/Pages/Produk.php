<?php
// Memanggil class Produk
require_once('./class/class.Produk.php');

// Inisialisasi objek Produk
$objProduk = new Produk();

// Mengambil data produk menggunakan method dari class
$result = $objProduk->ShowAllProduk();
?>

<div class="container py-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-white">Jadwal Pertunjukan</h2>
        <p class="text-secondary small">Dikelola langsung dari pusat data Tepi Waktu Teater.</p>
    </div>

    <div class="row g-4">
        <?php 
        // Cek apakah hasil query mengandung data
        if ($result && mysqli_num_rows($result) > 0):
            while($row = mysqli_fetch_assoc($result)): 
        ?>
        <div class="col-12">
            <div class="card bg-dark text-white border-0 shadow-lg overflow-hidden" 
                 style="background: rgba(255, 255, 255, 0.05) !important; backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.1) !important; border-radius: 20px;">
                
                <div class="row g-0 align-items-stretch"> 
                    
                    <div class="col-md-4 position-relative">
                        <img src="./img/<?php echo $row['poster']; ?>" 
                             class="w-100" 
                             style="object-fit: cover; height: 100%; min-height: 280px; max-height: 320px;" 
                             alt="Poster <?php echo $row['nama_acara']; ?>">
                    </div>
                    
                    <div class="col-md-8">
                        <div class="card-body p-4 d-flex flex-column h-100 justify-content-between">
                            
                            <div>
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <span class="badge bg-primary mb-2"><?php echo $row['kategori']; ?></span>
                                        <h3 class="card-title fw-bold mb-0"><?php echo $row['nama_acara']; ?></h3>
                                    </div>
                                    <div class="text-end">
                                        <h4 class="text-info fw-bold mb-0">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></h4>
                                        <small class="text-secondary">Per Tiket</small>
                                    </div>
                                </div>
                                
                                <p class="card-text text-secondary mt-3" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    <?php echo $row['deskripsi']; ?>
                                </p>
                            </div>
                            
                            <div class="mt-4">
                                <hr class="border-secondary opacity-25 mb-3">
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                                    
                                    <div class="d-flex align-items-center gap-4">
                                        <div>
                                            <small class="text-secondary d-block">Tanggal</small>
                                            <span class="fw-semibold"><i class="bi bi-calendar3 me-2 text-info"></i><?php echo date('d M Y', strtotime($row['tanggal'])); ?></span>
                                        </div>
                                        <div class="border-start border-secondary ps-4" style="height: 30px; opacity: 0.3;"></div>
                                        <div>
                                            <small class="text-secondary d-block">Waktu</small>
                                            <span class="fw-semibold"><i class="bi bi-clock me-2 text-info"></i><?php echo date('H:i', strtotime($row['waktu'])); ?> WIB</span>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <a href="Main.php?Pages=ticket&id=<?php echo $row['id_produk']; ?>" class="btn btn-info-tiket px-5 py-2fw-bold">Beli Tiket</a>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div> </div> </div> </div> <?php 
            endwhile; 
        else:
        ?>
            <div class="col-12 text-center py-5 text-white">
                <i class="bi bi-calendar-x fs-1 text-secondary d-block mb-3"></i>
                <p class="text-secondary">Belum ada jadwal pertunjukan tersedia saat ini.</p>
            </div>
        <?php endif; ?>
    </div>
</div>