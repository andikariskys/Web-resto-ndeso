-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2023 at 12:21 PM
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
-- Database: `resto_ndeso`
--

CREATE DATABASE IF NOT EXISTS `resto_ndeso`;
USE `resto_ndeso`;

-- --------------------------------------------------------

--
-- Table structure for table `data_menu`
--
DROP TABLE IF EXISTS `data_menu`;

CREATE TABLE `data_menu` (
  `id_menu` varchar(11) NOT NULL,
  `nama_menu` varchar(65) NOT NULL,
  `kategori` enum('Makanan','Minuman','Snack') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stok` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_menu`
--

INSERT INTO `data_menu` (`id_menu`, `nama_menu`, `kategori`, `stok`, `harga_satuan`, `gambar`, `status`) VALUES
('mn121213', 'Steak Ikan', 'Makanan', 5, 15000, 'steak_ikan.jpg', 'tampil'),
('mn185870', 'Mie Dok Dok', 'Makanan', 12, 13000, 'photo.jpg', 'tampil'),
('mn232425', 'Dim Sum', 'Snack', 4, 10000, 'dim_sum.jpg', 'tampil'),
('mn260651', 'Roti Bakar', 'Snack', 20, 8000, 'Mau-Tahu-Cara-Membuat-Roti-Bakar-Ala-Cafe-Termudah-2.jpg', 'tampil'),
('mn343536', 'Jus Alpukat', 'Minuman', 6, 7000, 'jus_alpukat.jpg', 'tampil'),
('mn373862', 'Coffee Dalgona', 'Minuman', 15, 7000, '5e7eb044aa9a2.jpg', 'tampil'),
('mn391780', 'Pancake', 'Snack', 9, 5000, 'fluffyamericanpancak_74828_16x9.jpg', 'tampil'),
('mn430203', 'Nasi Goreng Gila', 'Makanan', 12, 13000, 'nasi-goreng-sosis-featured.jpg', 'tampil'),
('mn476681', 'Es Buah ', 'Minuman', 15, 7000, 'Daftar-Resep-Es-Buah-yang-Mudah-dan-Enak-1024x683.jpg', 'tampil'),
('mn519727', 'Kentang Goreng', 'Snack', 9, 9000, 'resep-kentang-goreng-crispy-ala-mcd-sederhana.jpg', 'tampil'),
('mn534241', 'Es Cream', 'Minuman', 15, 6000, '1-1-Shiroukuma-Cafe-by-cafe_shirokuma.jpg', 'tampil'),
('mn852780', 'Nasi Lele Bakar', 'Makanan', 13, 10000, 'lele_bakar.jpg', 'tampil'),
('mn952730', 'Risol Mayonaies', 'Snack', 17, 6000, 'risol-mayo.jpg', 'tampil');

-- --------------------------------------------------------

--
-- Table structure for table `data_users`
--

DROP TABLE IF EXISTS `data_users`;

CREATE TABLE `data_users` (
  `id_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `role_id` int NOT NULL,
  `null_password` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_users`
--

INSERT INTO `data_users` (`id_user`, `username`, `password`, `nama`, `role_id`, `null_password`) VALUES
('55d0e0ae-9b8c-11ed-8ef0-f01faf0a685d', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin satu', 1, NULL),
('6d35197e-9b8d-11ed-8ef0-f01faf0a685d', 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager satu', 0, NULL),
('85bd1d7a-92de-11ed-b1ed-f01faf0a685d', 'andika', 'db5ee8e280c13e08523b28ca17db5ffb', 'Andika Risky Septiawan', 2, NULL),
('dddf01c6-9bbf-11ed-8ef0-f01faf0a685d', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir satu', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `tgl_pesan` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `total_pembelian` int NOT NULL,
  `uang_pembeli` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `nama_pembeli`, `tgl_pesan`, `total_pembelian`, `uang_pembeli`) VALUES
('INV-20230123091651', '85bd1d7a-92de-11ed-b1ed-f01faf0a685d', 'Altaa', '2023-01-23 02:23:55', 46000, 50000),
('INV-20230124152527', 'dddf01c6-9bbf-11ed-8ef0-f01faf0a685d', 'Kristin', '2023-01-24 08:25:27', 29000, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

DROP TABLE IF EXISTS `transaksi_detail`;

CREATE TABLE `transaksi_detail` (
  `id_detail` int NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `id_menu` varchar(11) NOT NULL,
  `jml_menu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `id_transaksi`, `id_menu`, `jml_menu`) VALUES
(1, 'INV-20230123091651', 'mn121213', 1),
(2, 'INV-20230123091651', 'mn343536', 3),
(3, 'INV-20230123091651', 'mn232425', 1),
(4, 'INV-20230124152527', 'mn121213', 1),
(5, 'INV-20230124152527', 'mn343536', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_menu`
--
ALTER TABLE `data_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `data_users`
--
ALTER TABLE `data_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
