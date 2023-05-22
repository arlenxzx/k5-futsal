<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="h3">Daftar User</span>
<a href="index.php?page=tambah_user" class="btn btn-success fw-bold text-white">+ Tambah user</a>
</div>
<table class="table table-light table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">No. Tlp</th>
            <th scope="col">No. KTP</th>
            <th scope="col">alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
            $query = mysqli_query($con,"SELECT * FROM user ORDER BY nama ASC")
        ?>
            <?php while ($fetch = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $fetch['nama'] ?></td>
                <td><?= $fetch['username'] ?></td>
                <td><?= $fetch['no_telp'] ?></td>
                <td><?= $fetch['no_ktp'] ?></td>
                <td><?= $fetch['alamat'] ?></td>
            </tr>
            <?php endwhile ?>
            
    </tbody>
</table>