-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 04:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `code_kategori` varchar(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`code_kategori`, `nama_kategori`) VALUES
('alatmusik', 'Alat Musik'),
('olahraga', 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `harga_jual` bigint(20) DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL,
  `foto_barang` blob DEFAULT NULL,
  `kategori_produk` enum('olahraga','alatmusik') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `nama_barang`, `harga_beli`, `harga_jual`, `stok_barang`, `foto_barang`, `kategori_produk`, `created_at`, `updated_at`) VALUES
(36, 'Jersey Liverpool merah', 20000, 50000, 20, 0x313731303638383638345f34383032313130653138333832636431643937372e6a7067, 'alatmusik', '2024-03-17 15:18:04', '2024-03-17 15:18:04'),
(37, 'Barbell', 100000, 150000, 30, 0x313731303638383734395f38643764373230623365353463666330653036622e6a7067, 'olahraga', '2024-03-17 15:19:09', '2024-03-17 15:19:09'),
(38, 'Raket', 150000, 200000, 11, 0x313731303638383836355f65613537623037393535326262356234366331352e6a7067, 'olahraga', '2024-03-17 15:21:05', '2024-03-17 15:21:05'),
(39, 'Gitar', 200000, 250000, 40, '', 'alatmusik', '2024-03-17 15:22:09', '2024-03-17 15:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL DEFAULT 'pass',
  `jabatan` varchar(255) NOT NULL,
  `namakandidat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `user_name`, `password`, `jabatan`, `namakandidat`) VALUES
(1, 'mufid', '12345', 'Website Programming', 'Mufid Rahman'),
(2, 'rahman', '12345', 'Software Maintenance', 'Rahman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`code_kategori`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
