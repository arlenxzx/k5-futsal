<?php
include("../../config/config.php");
//entry pencarian
if (isset($_POST['cari'])) {
    $kode = $_POST['kode'];
    $result = mysqli_query($con,"SELECT * FROM transaksi WHERE kode_transaksi = '$kode' LIMIT 1");
    if (mysqli_num_rows($result) > 0) {
        echo "<script>window.location = '../ui/dist/index.php?page=pembayaran2&id=$kode'</script>";
    }else {
        echo "<script>alert('Kode tidak ditemukan!');
        window.location = '../ui/dist/index.php?page=pembayaran';</script>;";
    }}

if (isset($_POST['tambah'])) {
    $kode = $_POST['kode'];
    $nominal = $_POST['nom'];
    $admin = $_POST['admin'];
        $idtr = mysqli_fetch_array(mysqli_query($con,"SELECT id_transaksi FROM transaksi WHERE kode_transaksi = '$kode' LIMIT 1"));
        $id = $idtr['id_transaksi'];
        $tglskrg = date("Y-m-d");
        $query = mysqli_query($con,"INSERT INTO pembayaran(id_transaksi,nominal_pembayaran,id_admin,tanggal_bayar) VALUES ('$id', '$nominal', '$admin', '$tglskrg')");
        if ($query) {
            echo "<script>alert('Data Diinput!');
            window.location = '../ui/dist/index.php?page=hisbyr';</script>;";
        }
    else {
        echo "<script>alert('Data Galat!');
        window.location = '../ui/dist/index.php?page=hisbyr';</script>;";
    }}
?>