<h5 class="text-info mb-4">Database Member & Staff</h5>
<div class="table-responsive">
    <table class="table table-dark table-hover border-secondary">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Nama Lengkap</th>
                <th>Email Akun</th>
                <th>Hak Akses (Role)</th>
                <th width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $users = $objUser->ShowAllUsers();
            while($u = mysqli_fetch_assoc($users)): ?>
            <tr>
                <td class="text-secondary small"><?php echo $u['userid']; ?></td>
                <td><?php echo $u['name']; ?></td>
                <td><?php echo $u['email']; ?></td>
                <td>
                    <?php 
                        $badgeColor = 'bg-primary';
                        if($u['role'] == 'admin') $badgeColor = 'bg-danger';
                        elseif($u['role'] == 'manager') $badgeColor = 'bg-warning text-dark';
                    ?>
                    <span class="badge <?php echo $badgeColor; ?>"><?php echo strtoupper($u['role']); ?></span>
                </td>
                <td>
                    <a href="dashboardAdmin.php?page=edituser&id=<?php echo $u['userid']; ?>" class="btn btn-outline-warning btn-action me-1">Edit</a>
                    <a href="dashboardAdmin.php?page=hapususer&id=<?php echo $u['userid']; ?>" class="btn btn-outline-danger btn-action" onclick="return confirm('Peringatan: Yakin ingin menghapus user ini secara permanen?')">Hapus</a>
                </td>

            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>