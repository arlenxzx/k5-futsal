<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        //transaksi
        case 'history':
            include("../../history/index.php");
            break;
        
        case 'entry':
            include("../../history/tambah.php");
            break;
        
        case 'cari_transaksi':
            include("../../history/cari.php");
            break;
       
        //pesanan
        case 'bayar':
            include("../../history/bayar.php");
            break;
        
        case 'detail':
            include("../../history/detail.php");
            break;
        
        //pembayaran
        case 'pembayaran':
            include("../../pembayaran/cari.php");
            break;
        
            case 'pembayaran2':
            include("../../pembayaran/tambah.php");
            break;
        
        case 'hisbyr':
            include("../../pembayaran/index.php");
            break;
        
        //lapangan
        case 'lapangan':
            include("../../lapangan/index.php");
            break;
        
        case 'tambah_lap':
            include("../../lapangan/tambah.php");
            break;
        
        case 'edit_lap':
            include("../../lapangan/edit.php");
            break;
        
        //admin
        case 'admin':
            include("../../admin/index.php");
            break;
        
        case 'edit_adm':
            include("../../admin/edit.php");
            break;
        
        case 'tambah_adm':
            include("../../admin/tambah.php");
            break;
        
        case 'hapus_adm':
            include("../../admin/hapus.php");
            break;
        
        //user
        case 'user':
            include("../../user/index.php");
            break;
       
        case 'tambah_user':
            include("../../user/tambah.php");
            break;
        }
    }
    else {
        include("beranda.php");        
    }
?>