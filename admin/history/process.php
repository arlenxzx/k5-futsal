<?php
include("../../config/config.php");
// entry transaksi baru
if (isset($_POST['entry'])) {
    $kode = $_POST['kode'];
    $tanggal = $_POST['tanggal'];
    $harga = $_POST['harga'];
    $admin = $_POST['admin'];
    $user = $_POST['user'];

    $query = mysqli_query($con,"INSERT INTO transaksi(kode_transaksi,tanggal_transaksi,id_admin,id_user,total_harga) VALUES ('$kode', '$tanggal', '$admin', '$user', '$harga')");
    if ($query) {
        echo "<script>alert('Data Diinput!');
        window.location = '../ui/dist/index.php?page=history';</script>;";
    }
else {
    echo "<script>alert('Data Galat!');
    window.location = '../ui/dist/index.php?page=history';</script>;";
}}

//entry pencarian
if (isset($_POST['cari'])) {
    $kode = $_POST['kode'];
    $result = mysqli_query($con,"SELECT * FROM transaksi WHERE kode_transaksi = '$kode' LIMIT 1");
    if (mysqli_num_rows($result) > 0) {
        echo "<script>window.location = '../ui/dist/index.php?page=bayar&id=$kode'</script>";
    }else {
        echo "<script>alert('Kode !tidak ditemukan!');
        window.location = '../ui/dist/index.php?page=cari_transaksi';</script>;";
    }
    // $id = $result['id_transaksi'];
    // echo "<script>window.location = '../ui/dist/index.php?page=bayar&id=$id'</script>";
}

//entry pembayaran dalam transaksi yang sudah ditentukan id transaksi nya
if (isset($_POST['bayar'])) {
    $kode   = $_POST['kode'];
    $nama   = $_POST['nama'];
    $tgl    = $_POST['tglmain'];
    $durasi = $_POST['durasi'];
    $lap    = $_POST['lapangan'];

    //mengambil data harga lapangan
    $qhl    = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM lapangan WHERE nomor_lapangan = '$lap'"));
    $harga  = $qhl['harga'];
    //mengambil id_transaksi yang diperlukan
    $qidtr    = mysqli_fetch_array(mysqli_query($con,"SELECT id_transaksi,total_harga FROM transaksi WHERE kode_transaksi = '$kode'"));
    $id = $qidtr['id_transaksi'];
    $hargaAwal = $qidtr['total_harga'];
    
    $total  = $durasi * $harga;
    $tanggal = date('Y-m-d H:i:s', strtotime(str_replace('T', '', $tgl)));
    
    $query = "INSERT INTO detail_transaksi(id_transaksi,nama_grup,nomor_lapangan,tgl_main,lama_main,sub_harga) VALUES ('$id','$nama','$lap','$tanggal','$durasi','$total')";
    $sql1 = mysqli_query($con,$query);

    if ($sql1) {
        $totalHarga = $hargaAwal + $total;
        $query2 = mysqli_query($con,"UPDATE transaksi SET total_harga = $totalHarga WHERE id_transaksi = $id");
        if ($query2) {
            echo "<script>alert('Data Diinput!');
            window.location = '../ui/dist/index.php?page=history';</script>;";
        }
    }else {
        echo "<script>alert('Data Galat!');
        window.location = '../ui/dist/index.php?page=history';</script>;";
    }
 
}
?>