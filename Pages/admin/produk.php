<div class="d-flex justify-content-between mb-4">
    <h5 class="text-info">Manajemen Pertunjukan</h5>
    <a href="dashboardAdmin.php?page=tambahproduk" class="btn btn-sm btn-info px-3 fw-semibold text-dark">+ Tambah Produk Baru</a>
</div>

<div class="table-responsive">
    <table class="table table-dark table-hover border-secondary">
        <thead>
            <tr>
                <th>Nama Acara</th>
                <th>Harga Satuan</th>
                <th>Jadwal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $prod = $objProd->ShowAllProduk();
            while($p = mysqli_fetch_assoc($prod)): ?>
            <tr>
                <td><?php echo $p['nama_acara']; ?></td>
                <td>Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?></td>
                <td><?php echo date('d M Y', strtotime($p['tanggal'])); ?></td>
                <td>
                    <a href="dashboardAdmin.php?page=editproduk&id=<?php echo $p['id_produk']; ?>" class="btn btn-sm btn-outline-warning me-1">Edit</a>
                    <a href="dashboardAdmin.php?page=hapusproduk&id=<?php echo $p['id_produk']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>