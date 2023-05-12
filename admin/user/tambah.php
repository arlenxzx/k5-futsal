<div class="h3 fw-bold mb-3">Tambah User</div>
<form method="post" action="../../user/process.php">
    
        <div class="input-group mb-3">
            <span class="input-group-text bg-warning fw-semibold text-white">Nama</span>
            <input class="form-control" type="text" placeholder="Masukkan nama" name="nama" required>
        </div>
    
        <div class="input-group mb-3">
            <span class="input-group-text bg-warning fw-semibold text-white">Username</span>
            <input class="form-control" type="text" placeholder="Masukkan username" name="username" required>
        </div>
    
        <div class="input-group mb-3">
            <span class="input-group-text bg-warning fw-semibold text-white">Password</span>
            <input class="form-control" type="text" placeholder="Masukkan password" name="password" required>
        </div>
    
        <div class="input-group mb-3">
            <span class="input-group-text bg-primary fw-semibold text-white">No Telp.</span>
            <input class="form-control" type="text" placeholder="Masukkan No Telepon Anda" name="telp" required>
        </div>
    
        <div class="input-group mb-3">
            <span class="input-group-text bg-primary fw-semibold text-white">No KTP</span>
            <input class="form-control" type="text" placeholder="Masukkan No KTP Anda" name="ktp" required>
        </div>
    
        <div class="input-group mb-3">
            <span class="input-group-text bg-success fw-semibold text-white">Alamat</span>
            <input class="form-control" type="text" placeholder="Masukkan Alamat Anda" name="alamat" required>
        </div>
    

  <center>
      <input type="submit" value="Simpan" name="tambah" class="btn btn-success fw-bold text-white"> 
      <input type="reset" value="Reset" class="btn btn-warning fw-bold text-white">
      <a href="index.php?page=user" class="btn btn-danger fw-bold text-white">Kembali</a>
  </center>
</form>
