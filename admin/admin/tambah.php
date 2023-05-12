<div class="h3 fw-bold mb-3">Tambah Admin</div>
<form method="post" action="../../admin/process.php">
    
        <div class="input-group mb-3">
            <span class="input-group-text bg-warning fw-semibold text-white">Username</span>
            <input class="form-control" type="text" placeholder="Masukkan username" name="username" required>
        </div>
    
        <div class="input-group mb-3">
            <span class="input-group-text bg-info fw-semibold text-white">Password</span>
            <input class="form-control" type="text" placeholder="Masukkan password" name="password" required>
        </div>
    
        <div class="input-group mb-3">
        <span class="input-group-text bg-success fw-semibold text-white">Role</span>
        <select name="role" class="form-select">
            <option value="" selected disabled>-- Pilih Role Admin --</option>
            <option value="Petugas">Petugas</option>
            <option value="Pengelola">Pengelola</option>
            <option value="Pemilik">Pemilik</option>
        </select>
        </div>

  <center>
      <input type="submit" value="Simpan" name="tambah" class="btn btn-success fw-bold text-white"> 
      <input type="reset" value="Reset" class="btn btn-warning fw-bold text-white">
      <a href="index.php?page=admin" class="btn btn-danger fw-bold text-white">Kembali</a>
  </center>
</form>
