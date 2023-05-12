<?php
include("../../config/config.php");
if (isset($_POST['tambah'])) {
    $ukuran = $_POST['ukuran'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    
    if (!empty($foto)) {
        $extension = array('png', 'jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1, 999);
        $namafoto = $angka_acak . '-' . $foto;
        if (in_array($ekstensi, $extension) === true) {
            move_uploaded_file($file_tmp, 'gambar_lapangan/' . $namafoto); //memindah file gambar ke folder gambar
            // jalankan query INSERT
            $query = "INSERT INTO lapangan (ukuran_lapangan, jenis_lapangan, harga, foto) VALUES ('$ukuran', '$jenis', '$harga', '$namafoto')";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<script>alert('Data terinput!');
                window.location='../ui/dist/index.php?page=lapangan'</script>";
            }
        } else {
            //jika file ekstensi tidak benar
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg, atau png.');window.location='../ui/dist/index.php?page=lapangan';</script>";
        }
    } else {
        //jika foto tidak dipilih
        echo "<script>alert('Mohon pilih foto terlebih dahulu.');window.location='../ui/dist/index.php?page=lapangan';</script>";
    }
}elseif (isset($_POST['edit'])) {
    $no = $_POST['id'];
    $harga = $_POST['harga'];

    $query = mysqli_query($con,"UPDATE lapangan SET harga = '$harga' WHERE nomor_lapangan = '$no'");
    if ($query) {
        echo "<script>alert('Data terinput!');
        window.location='../ui/dist/index.php?page=lapangan'</script>";
    }
else {
    //jika galat
    echo "<script>alert('Data Galat!');window.location='../ui/dist/index.php?page=lapangan';</script>";}
}
?>
