<div class="h3 fw-bold mb-3">Tambah Lapangan</div>
<form action="../../lapangan/process.php" method="post" enctype="multipart/form-data">
    
    <div class="input-group mb-3">
        <span class="input-group-text bg-info fw-semibold text-white">Ukuran</span>
        <select name="ukuran" class="form-select">
            <option value="" selected disabled>-- Pilih Ukuran Lapangan --</option>
            <option value="Besar">Besar</option>
            <option value="Kecil">Kecil</option>
        </select>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text bg-success fw-semibold text-white">Jenis</span>
        <select name="jenis" class="form-select">
            <option value="" selected disabled>-- Pilih jenis Lapangan --</option>
            <option value="Vinyl">Vinyl</option>
            <option value="Rumput Sintetis">Rumput Sintetis</option>
            <option value="Outdoor">Outdoor</option>
        </select>
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text bg-danger fw-semibold text-white">Harga</span>
        <input class="form-control" type="number" placeholder="Masukkan Harga / Jam" name="harga">
    </div>

    <input class="form-control mb-3" type="file" name="foto">
    <center>
        <input type="submit" value="Simpan" name="tambah" class="btn btn-success text-white"> 
        <input type="reset" value="Reset" class="btn btn-warning text-white">
        <a href="index.php?page=lapangan" class="btn btn-danger text-white">Kembali</a>
    </center>
</form>