-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 11:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `nomor_rekening` int(16) NOT NULL,
  `nama_acc` varchar(32) NOT NULL,
  `nomor_cif` int(16) NOT NULL,
  `tgl_pembukaan` date NOT NULL,
  `tgl_penutupan` date NOT NULL,
  `saldo_terakhir` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `nomor_rekening`, `nama_acc`, `nomor_cif`, `tgl_pembukaan`, `tgl_penutupan`, `saldo_terakhir`) VALUES
(1, 72496865, 'Ridwan Panji Akbar', 82905460, '2023-09-26', '0000-00-00', 450000),
(2, 1478775, 'Ridwan Panji Akbar', 82905460, '2023-09-20', '0000-00-00', 0),
(3, 90948060, 'test', 52591693, '2023-09-26', '0000-00-00', 255555555);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_debitur` int(11) NOT NULL,
  `nama_debitur` varchar(32) NOT NULL,
  `NIK` bigint(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nomor_telepon` bigint(255) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `nomor_cif` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_debitur`, `nama_debitur`, `NIK`, `tgl_lahir`, `nomor_telepon`, `jenis_kelamin`, `alamat_lengkap`, `nomor_cif`) VALUES
(1, 'Ridwan Panji Akbar', 3731293378730001, '2023-08-31', 310231233, 'Jenis Kelamin', 'Kota Bandung', 82905460),
(2, 'test', 12344515, '2023-09-12', 1234455, 'Jenis Kelamin', 'jl.kucing1', 52591693);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nomor_rekening` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jenis_transaksi` varchar(32) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nomor_rekening`, `nominal`, `jenis_transaksi`, `status`) VALUES
(1, 72496865, 450000, 'Setoran Tunai', 'D'),
(2, 72496865, 90000, 'Setoran Tunai', 'D'),
(3, 72496865, 10000, 'Setoran Tunai', 'D'),
(4, 72496865, 450000, 'Setoran Tunai', 'D'),
(5, 90948060, 255555555, 'Setoran Tunai', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `nomor_telepon` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`,`nomor_rekening`,`nomor_cif`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_debitur`,`NIK`,`nomor_cif`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_debitur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
