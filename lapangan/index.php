<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="h3">Daftar Lapangan</span>
<a href="index.php?page=tambah_lap" class="btn btn-success fw-bold text-white">+ Tambah lapangan</a>
</div>
<table class="table table-light table-striped">
    <thead >
        <tr>
            <th scope="col">Nomor Lap.</th>
            <th scope="col">Ukuran Lap.</th>
            <th scope="col">Jenis lap.</th>
            <th scope="col">Harga / Jam</th>
            <th scope="col">Foto</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
            $query = mysqli_query($con,"SELECT * FROM lapangan ORDER BY harga DESC")
        ?>
            <?php while ($fetch = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $fetch['nomor_lapangan'] ?></td>
                <td><?= $fetch['ukuran_lapangan'] ?></td>
                <td><?= $fetch['jenis_lapangan'] ?></td>
                <td>Rp. <?= number_format($fetch['harga']) ?>,-</td>
                <td><img src="../../lapangan/gambar_lapangan/<?= $fetch['foto']; ?>" style="width: 100px;"></td>
                <td><a href="index.php?page=edit_lap&id=<?=$fetch['nomor_lapangan']?>" class="btn btn-warning text-white fw-semibold">Edit</a></td>
            </tr>
            <?php endwhile ?>
            
    </tbody>
</table>
