<?php
include("../../config/config.php");

if (isset($_POST['edit'])) {
    $username = $_POST['username'];
    $role     = $_POST['role'];

    $query = "UPDATE admin SET role = '$role' WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Data berhasil diubah!');
        window.location='../ui/dist/index.php?page=admin'</script>";
    } else {
        echo "<script>alert('Data gagal diubah!');
        window.location='../ui/dist/index.php?page=admin'</script>";
    }
}

if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    $query = "INSERT INTO admin(username,password,role) VALUES ('$username','$password','$role')";
    $result = mysqli_query($con,$query);

    if ($result) {
        echo "<script>alert('Data berhasil ditambah!');
        window.location='../ui/dist/index.php?page=admin'</script>";
    } else {
        echo "<script>alert('Data gagal ditambah!');
        window.location='../ui/dist/index.php?page=admin'</script>";
    }
}
?>
