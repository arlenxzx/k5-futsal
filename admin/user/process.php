<?php
include "../../config/config.php";

// mengambil nilai input dari form
$nama     = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$no_telp  = $_POST['telp'];
$no_ktp   = $_POST['ktp'];
$alamat   = $_POST['alamat'];

// query untuk menyimpan data user ke dalam tabel user
$query = "INSERT INTO user (nama, username, password, no_telp, no_ktp, alamat) VALUES ('$nama', '$username', '$password', '$no_telp', '$no_ktp', '$alamat')";
$result = mysqli_query($con, $query);

// jika data berhasil disimpan, redirect ke halaman daftar user
if ($result) {
    echo "<script>alert('Data berhasil diinput!');
    window.location='../ui/dist/index.php?page=user'</script>";
} else {
    echo "<script>alert('Data gagal diinput!');
    window.location='../ui/dist/index.php?page=user'</script>";
}
?>
