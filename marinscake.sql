-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 10:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marinscake`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_preorder`
--

CREATE TABLE `detail_preorder` (
  `idPreorder` int(11) NOT NULL,
  `namaProduk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `namaProduk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gaji_karyawan`
--

CREATE TABLE `gaji_karyawan` (
  `idKaryawan` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `idJenis` int(11) NOT NULL,
  `namaJenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`idJenis`, `namaJenis`) VALUES
(1, 'Roti Kering'),
(2, 'Roti Basah');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenisKelamin` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `noHp` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `preorder`
--

CREATE TABLE `preorder` (
  `idPreorder` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `metode` varchar(55) NOT NULL,
  `tanggalPesan` varchar(255) NOT NULL,
  `tanggalDikirim` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `idJenis` int(11) NOT NULL,
  `namaProduk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `idJenis`, `namaProduk`, `harga`, `status`, `stok`, `gambar`, `created_at`) VALUES
(19, 1, 'Roti Roma', 10000, 'Ready', 50, 'xcvb1.jpg', '2022-02-11'),
(20, 1, 'Roti Malkist', 6000, 'Kosong', 40, 'Codeigniter-300x3003.png', '2022-02-11'),
(21, 2, 'Kue Ulang Tahun', 30000, 'Preorder', 0, 'facebook.png', '2022-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `nama`, `email`, `password`, `role`) VALUES
(4, 'Ahmad', 'admin@gmail.com', '$2y$10$h0E//Sq0.Yxh4f7KyxmVLetVqd4ZmWWP2YLsb3maXxXQE5yae.baO', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_preorder`
--
ALTER TABLE `detail_preorder`
  ADD KEY `preorder` (`idPreorder`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `detail` (`idTransaksi`);

--
-- Indexes for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD KEY `gaji` (`idKaryawan`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`idJenis`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idKaryawan`);

--
-- Indexes for table `preorder`
--
ALTER TABLE `preorder`
  ADD PRIMARY KEY (`idPreorder`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `jenis` (`idJenis`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `idJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preorder`
--
ALTER TABLE `preorder`
  MODIFY `idPreorder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_preorder`
--
ALTER TABLE `detail_preorder`
  ADD CONSTRAINT `preorder` FOREIGN KEY (`idPreorder`) REFERENCES `preorder` (`idPreorder`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD CONSTRAINT `gaji` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `jenis` FOREIGN KEY (`idJenis`) REFERENCES `jenis_produk` (`idJenis`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
