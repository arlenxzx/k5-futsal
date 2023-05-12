<?php
$id = $_GET['kode'];
$query = mysqli_fetch_array(mysqli_query($con,"SELECT transaksi.id_transaksi,kode_transaksi,tanggal_transaksi,total_harga,admin.username AS admin, user.nama AS user FROM transaksi INNER JOIN admin ON transaksi.id_admin = admin.id_admin INNER JOIN user ON transaksi.id_user = user.id_user WHERE kode_transaksi = '$id'"));
$idt = $query['id_transaksi'];
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="h3">Informasi Transaksi</div>
    <div>
        <a href="index.php?page=print" class="btn btn-primary text-end fw-bold text-white">Cetak</a>
        <a href="index.php?page=history" class="btn btn-danger text-end fw-bold text-white">Kembali</a>
    </div>
</div>
<center>
<div class="card" style="width:60rem;">
    <div class="card-header">
        <div class="card-text h5">K5 Futsal</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4 text-start fw-semibold"><?= date("d-m-Y H:i:s",strtotime($query['tanggal_transaksi'])) ?></div>
            <div class="col-4 fw-semibold"><?= $query['kode_transaksi'] ?></div>
            <div class="col-4 text-end fw-semibold"><?= $query['admin'] ?></div>
            <hr>
            <div class="col-6 text-start fw-semibold">Nama Pemesan</div>
            <div class="col-6 text-end"><?= $query['user'] ?></div>
        </div>
            <hr>
        <div class="row">
            <div class="col-2 text-start fw-semibold">Lapangan</div>
            <div class="col-3 text-center fw-semibold">Nama Grup</div>
            <div class="col-1 text-center fw-semibold">Durasi</div>
            <div class="col-4 text-center fw-semibold">Tgl Main</div>
            <div class="col-2 text-end fw-semibold">Sub Harga</div>
        </div>
            <hr>
            <?php 
            $query2 = mysqli_query($con,"SELECT * FROM detail_transaksi WHERE id_transaksi = '$idt'");
            while ($row = mysqli_fetch_array($query2)): ?>
                <div class="row">
                    <div class="col-2 text-start">Lapangan <?= $row['nomor_lapangan'] ?></div>
                    <div class="col-3 text-center"><?= $row['nama_grup'] ?></div>
                    <div class="col-1 text-center"><?= $row['lama_main'] ?> Jam</div>
                    <div class="col-4 text-center"><?= date("d-m-Y (H:i)",strtotime($row['tgl_main'])) ?></div>
                    <div class="col-2 text-end">Rp. <?= number_format($row['sub_harga']) ?>,-</div>
                </div>
            <?php endwhile ?>
        </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-start fw-semibold">Total Harga</div>
                    <div class="col text-end fw-semibold">Rp. <?= number_format($query['total_harga']) ?>,-</div>
                </div>
            </div>
</div>
</center>