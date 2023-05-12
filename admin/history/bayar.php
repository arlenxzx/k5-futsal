<?php
$id = $_GET['id'];
$qlap = mysqli_query($con,"SELECT * FROM lapangan ORDER BY nomor_lapangan ASC");
?>
<div class="h3 fw-bold mb-3">Tambahkan Pembayaran</div>
<form action="../../history/process.php" method="post">

    <div class="input-group mb-3">
        <span class="input-group-text bg-success fw-semibold text-white col-2">Kode Invoice</span>
        <input type="text" class="form-control" name="kode" value="<?=$id?>" readonly>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text bg-primary fw-semibold text-white col-2">Nama Grup</span>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Grup / Pemesan">
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text bg-danger fw-semibold text-white col-2">Tanggal Main</span>
        <input type="datetime-local" name="tglmain" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text bg-secondary fw-semibold col-2">Durasi (Max. 4 Jam)</span>
        <select name="durasi" class="form-select">
            <option value="1">1 Jam</option>
            <option value="2">2 Jam</option>
            <option value="3">3 Jam</option>
            <option value="4">4 Jam</option>
        </select>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text bg-dark fw-semibold col-2">Lapangan Terpilih</span>
        <select name="lapangan" class="form-select">
            <option value="" selected disabled>-- Pilih Jenis Lapangan --</option>
            <?php while ($lapangan = mysqli_fetch_array($qlap)) { ?>
                <option value="<?= $lapangan['nomor_lapangan'] ?>"><?= $lapangan['jenis_lapangan'] . " - Lapangan " . $lapangan['ukuran_lapangan'] . " ( Rp. " . number_format($lapangan['harga'])  . ",- / Jam)"?></option>
            <?php } ?>
        </select>
    </div>

    <center>
        <input type="submit" value="Simpan" name="bayar" class="btn btn-success text-white"> 
        <input type="reset" value="Reset" class="btn btn-warning text-white">
        <a href="index.php?page=history" class="btn btn-danger text-white">Kembali</a>
    </center>
</form>
