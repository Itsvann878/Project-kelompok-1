<h5 class="text-info mb-4">Semua Pembelian Tiket</h5>
<div class="table-responsive">
    <table class="table table-dark table-hover border-secondary">
        <thead>
            <tr>
                <th>Pembeli</th>
                <th>Pertunjukan</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Metode</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $trx = $objTrx->ShowAllTransactions();
            while($row = mysqli_fetch_assoc($trx)): ?>
            <tr>
                <td><?php echo $row['nama_pembeli']; ?></td>
                <td><?php echo $row['nama_acara']; ?></td>
                <td><?php echo $row['jumlah']; ?> Tiket</td>
                <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                <td><span class="badge bg-secondary opacity-75"><?php echo strtoupper($row['metode_bayar']); ?></span></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>