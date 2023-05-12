<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="h3">Daftar Admin</span>
<a href="index.php?page=tambah_adm" class="btn btn-success fw-bold text-white">+ Tambah admin</a>
</div>
<table class="table table-light table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
            $query = mysqli_query($con,"SELECT id_admin,username,role FROM admin ORDER BY username ASC")
        ?>
            <?php while ($fetch = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $fetch['username'] ?></td>
                <td><?= $fetch['role'] ?></td>
                <td><a href="index.php?page=edit_adm" class="btn btn-warning text-white me-2 fw-semibold">Edit</a></td>
            </tr>
            <?php endwhile ?>
            
    </tbody>
</table>