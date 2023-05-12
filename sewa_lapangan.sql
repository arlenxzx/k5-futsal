-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2023 at 04:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa_lapangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('Petugas','Pengelola','Pemilik','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `role`) VALUES
(1, 'arlen', '123', 'Petugas'),
(3, 'ivan', '123', 'Petugas'),
(4, 'master shifu', '123', 'Pengelola');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `nama_grup` varchar(50) NOT NULL,
  `nomor_lapangan` int NOT NULL,
  `tgl_main` datetime NOT NULL,
  `lama_main` int NOT NULL,
  `sub_harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `nama_grup`, `nomor_lapangan`, `tgl_main`, `lama_main`, `sub_harga`) VALUES
(1, 4, 'arlen', 1, '2023-05-09 10:00:00', 1, 130000),
(2, 4, 'admin', 2, '2023-05-09 11:42:00', 1, 160000),
(7, 4, 'Garuda Indonesia', 1, '2023-05-11 12:00:00', 3, 390000),
(9, 5, 'Turnamen K5 Event', 2, '2023-05-09 09:00:00', 4, 640000),
(10, 4, 'fc turu', 2, '2023-05-11 10:00:00', 2, 320000),
(11, 6, 'FC Barcelona', 1, '2023-05-12 12:00:00', 2, 260000);

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `nomor_lapangan` int NOT NULL,
  `ukuran_lapangan` enum('Kecil','Besar') NOT NULL,
  `jenis_lapangan` enum('Vinyl','Rumput Sintetis','Outdoor','') NOT NULL,
  `harga` int NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`nomor_lapangan`, `ukuran_lapangan`, `jenis_lapangan`, `harga`, `foto`) VALUES
(1, 'Besar', 'Rumput Sintetis', 240000, 'rumputs.jpeg\r\n'),
(2, 'Besar', 'Vinyl', 220000, '171-vinyl.jpeg'),
(3, 'Kecil', 'Vinyl', 140000, '435-vinyll.jpeg'),
(4, 'Kecil', 'Rumput Sintetis', 160000, '938-sintetiskcil.jpeg'),
(5, 'Besar', 'Outdoor', 200000, '233-outdoor1.jpeg'),
(6, 'Kecil', 'Outdoor', 120000, '580-outdoork.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `nominal_pembayaran` int NOT NULL,
  `id_admin` int NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_transaksi`, `nominal_pembayaran`, `id_admin`, `tanggal_bayar`) VALUES
(1, 4, 250000, 3, '2023-05-12'),
(2, 4, 750000, 1, '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `id_user` int NOT NULL,
  `id_admin` int NOT NULL,
  `total_harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `tanggal_transaksi`, `id_user`, `id_admin`, `total_harga`) VALUES
(4, '6454468957B6B', '2023-05-05 06:58:01', 1, 1, 1000000),
(5, '645880BBEEA22', '2023-05-08 11:55:23', 2, 3, 640000),
(6, '645B0B2432C36', '2023-05-10 10:10:28', 1, 3, 260000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `no_telp`, `no_ktp`, `alamat`) VALUES
(1, 'annaswa', 'awa', '123', '089523591230', '357301123451111', 'Surabaya'),
(2, 'hera dwi', 'herr', '123', '083834627277', '3573051512060002', 'Bugis, Malang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`nomor_lapangan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `nomor_lapangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
