<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="h3">Daftar Pembayaran</span>
<a href="index.php?page=pembayaran" class="btn btn-success fw-bold text-white">+ Entry Pembayaran</a>
</div>
<table class="table table-light table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Invoice</th>
            <th scope="col">Tanggal Pembayaran</th>
            <th scope="col">Nominal</th>
            <th scope="col">Petugas</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
            $query = mysqli_query($con,"SELECT id_pembayaran AS id, transaksi.kode_transaksi AS kode, tanggal_bayar AS tanggal, nominal_pembayaran AS harga, admin.username AS admin FROM pembayaran INNER JOIN admin ON pembayaran.id_admin = admin.id_admin INNER JOIN transaksi ON pembayaran.id_transaksi = transaksi.id_transaksi ORDER BY id_pembayaran ASC")
        ?>
            <?php while ($fetch = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $fetch['id'] ?></td>
                <td><a href="index.php?page=detail&kode=<?= $fetch['kode'] ?>"><?= $fetch['kode'] ?></a></td>
                <td><?= date("d M Y", strtotime($fetch['tanggal'])) ?></td>
                <td><?= "Rp. " . number_format($fetch['harga']) . ",-" ?></td>
                <td><?= $fetch['admin'] ?></td>
            </tr>
            <?php endwhile ?>
            
    </tbody>
</table>