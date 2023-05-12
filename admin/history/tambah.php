<?php
$query = mysqli_query($con,"SELECT id_admin,username FROM admin WHERE role = 'Petugas'");
$query2 = mysqli_query($con,"SELECT id_user,nama FROM user");
?>
<div class="h3 fw-bold mb-3">Input Transaksi</div>
<form method="post" action="../../history/process.php">
    
    <div class="input-group mb-3">
        <span class="input-group-text bg-info fw-semibold text-white col-2">Kode Invoice</span>
        <input type="text" class="form-control" name="kode" value="<?= strtoupper(uniqid()) ?>" readonly>
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text bg-warning fw-semibold text-white col-2">Waktu Transaksi</span>
        <input type="hidden" name="tanggal" value="<?= date("Y-m-d H:i:s") ?>">
        <input type="hidden" name="harga" value="0">
        <input type="text" class="form-control" value="<?= date("d-M-Y H:i:s") ?>" readonly>
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text bg-dark fw-semibold col-2">Nama Petugas</span>
        <select name="admin" class="form-select">
            <option value="" selected disabled>-- Pilih Admin --</option>
            <?php while ($admin = mysqli_fetch_array($query)) { ?>
                <option value="<?= $admin['id_admin'] ?>"><?= $admin['username'] ?></option>
            <?php } ?>
        </select>
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text bg-secondary fw-semibold col-2">Nama Penyewa</span>
        <select name="user" class="form-select">
            <option value="" selected disabled>-- Pilih Member --</option>
            <?php while ($user = mysqli_fetch_array($query2)) { ?>
                <option value="<?= $user['id_user'] ?>"><?= $user['nama'] ?></option>
            <?php } ?>
        </select>
    </div>

    <center>
        <input type="submit" value="Simpan" name="entry" class="btn btn-success text-white"> 
        <input type="reset" value="Reset" class="btn btn-warning text-white">
        <a href="index.php?page=history" class="btn btn-danger text-white">Kembali</a>
    </center>
</form>