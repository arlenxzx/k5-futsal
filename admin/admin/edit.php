<?php
$fetch = mysqli_fetch_array(mysqli_query($con,"SELECT username,role FROM admin ORDER BY username ASC"));
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="h3">Edit Admin</span>
</div>

<form action="../../admin/process.php" method="post">
    <div class="input-group mb-3">
        <span class="input-group-text bg-info fw-semibold text-white">Username</span>
        <input class="form-control" type="text" placeholder="Masukkan username" name="username" value="<?= $fetch['username'] ?>" readonly>
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text bg-danger fw-semibold text-white">Role</span>
        <select name="role" class="form-select">
            <option value="Petugas" <?= $fetch['role'] == 'Petugas' ? 'selected' : '' ?>>Petugas</option>
            <option value="Pengelola" <?= $fetch['role'] == 'Pengelola' ? 'selected' : '' ?>>Pengelola</option>
            <option value="Pemilik" <?= $fetch['role'] == 'Pemilik' ? 'selected' : '' ?>>Pemilik</option>
        </select>
    </div>

    <center>
        <input type="submit" value="Simpan" name="edit" class="btn btn-success fw-bold text-white"> 
        <input type="reset" value="Reset" class="btn btn-warning fw-bold text-white">
        <a href="index.php?page=admin" class="btn btn-danger fw-bold text-white">Kembali</a>
    </center>
</form>
