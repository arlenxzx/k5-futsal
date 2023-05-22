<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="h3">Daftar Transaksi</span>
<a href="index.php?page=entry" class="btn btn-success fw-bold text-white">+ Entry Transaksi</a>
</div>
<table class="table table-light table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">(Detail) Transaksi</th>
            <th scope="col">Tanggal transaksi</th>
            <th scope="col">Penyewa</th>
            <th scope="col">Petugas</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
            $query = mysqli_query($con,"SELECT id_transaksi AS id, kode_transaksi AS kode, tanggal_transaksi AS tanggal, total_harga AS harga, admin.username AS admin, user.username AS user FROM transaksi INNER JOIN admin ON transaksi.id_admin = admin.id_admin INNER JOIN user ON transaksi.id_user = user.id_user")
        ?>
            <?php while ($fetch = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><a href="index.php?page=detail&kode=<?= $fetch['kode'] ?>"><?= $fetch['kode'] ?></a></td>
                <td><?= $fetch['tanggal'] ?></td>
                <td><?= $fetch['user'] ?></td>
                <td><?= $fetch['admin'] ?></td>
                <td><?= "Rp. " . number_format($fetch['harga']) . ",-" ?></td>
                <td> <a href="index.php?page=bayar&id=<?=$fetch['kode']?>" class="btn btn-sm btn-success fw-semibold text-white">+ Detail</a> </td>
            </tr>
            <?php endwhile ?>
            
    </tbody>
</table>