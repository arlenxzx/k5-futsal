<?php
$id = $_GET['id'];
$fetch = mysqli_fetch_array(mysqli_query($con,"SELECT* FROM lapangan WHERE nomor_lapangan = $id LIMIT 1"));
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="h3">Edit Harga Lapangan</span>
</div>


<form action="../../lapangan/process.php" method="post">
    <div class="row">
        <div class="col-4">
            <img src="../../lapangan/gambar_lapangan/<?= $fetch['foto']; ?>" class="mb-3" style="width:300px;">
        </div>
        <div class="col-8">
            <div class="input-group mb-3">
                <span class="input-group-text bg-success fw-semibold text-white col-3">Nomor Lapangan</span>
                <input type="text" class="form-control" name="id" value="<?= $id ?>" readonly>
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary fw-semibold text-white col-3">Ukuran Lapangan</span>
                <input type="text" class="form-control" value="<?= $fetch['ukuran_lapangan'] ?>" readonly>
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text bg-secondary fw-semibold text-white col-3">Jenis Lapangan</span>
                <input type="text" class="form-control" value="<?= $fetch['jenis_lapangan'] ?>" readonly>
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text bg-dark fw-semibold col-3">Harga / Jam</span>
                <input type="number" class="form-control" name="harga" value="<?=$fetch['harga'] ?>">
            </div>
        </div>
        <center>
            <input type="submit" value="Simpan" name="edit" class="btn btn-success fw-bold text-white"> 
            <input type="reset" value="Reset" class="btn btn-warning fw-bold text-white">
            <a href="index.php?page=lapangan" class="btn btn-danger fw-bold text-white">Kembali</a>
        </center>
    </div>