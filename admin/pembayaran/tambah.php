<?php
$id = $_GET['id'];
$qb = mysqli_query($con,"SELECT id_admin,username FROM admin");
?>
<div class="h3 fw-bold mb-3">Tambah Pembayaran</div>
<form action="../../pembayaran/process.php" method="post">

    <div class="input-group mb-3">
        <span class="input-group-text bg-success fw-semibold text-white col-2">Kode Invoice</span>
        <input type="text" class="form-control" name="kode" value="<?=$id?>" readonly>
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text bg-warning fw-semibold text-white col-2">Nominal</span>
        <input class="form-control" type="number" placeholder="Masukkan Nominal" name="nom">
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text bg-dark fw-semibold col-2">Nama Petugas</span>
        <select name="admin" class="form-select">
            <option value="" selected disabled>-- Pilih Admin --</option>
            <?php while ($admin = mysqli_fetch_array($qb)) { ?>
                <option value="<?= $admin['id_admin'] ?>"><?= $admin['username'] ?></option>
            <?php } ?>
        </select>
    </div>
    <center>
        <input type="submit" value="Simpan" name="tambah" class="btn btn-success text-white"> 
        <input type="reset" value="Reset" class="btn btn-warning text-white">
        <a href="index.php?page=hisbyr" class="btn btn-danger text-white">Kembali</a>
    </center>
</form>