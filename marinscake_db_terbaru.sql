-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 08:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `detail_modal`
--

CREATE TABLE `detail_modal` (
  `id_detailModal` int(11) NOT NULL,
  `idModal` int(11) NOT NULL,
  `namaBahan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaSatuan` int(11) NOT NULL,
  `totalHarga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_modal`
--

INSERT INTO `detail_modal` (`id_detailModal`, `idModal`, `namaBahan`, `jumlah`, `hargaSatuan`, `totalHarga`) VALUES
(89, 6, 'A', 20, 10000, 200000),
(90, 6, 'B', 5, 10000, 50000),
(91, 6, 'C', 8, 5000, 40000),
(92, 6, 'D', 10, 10000, 100000),
(93, 6, 'E', 20, 4000, 80000),
(101, 11, 'aa', 10, 5000, 50000),
(102, 11, 'bb', 5, 10000, 50000),
(103, 11, 'cc', 8, 2500, 20000),
(104, 11, 'dd', 3, 15000, 45000),
(107, 2, 'Tepung Tapioka', 10, 10000, 100000),
(108, 2, 'Gula', 10, 15000, 150000),
(109, 2, 'Telur', 50, 2000, 100000),
(110, 2, 'Minyak', 5, 16000, 80000),
(111, 2, 'Tepung Gandum', 3, 8000, 24000),
(115, 12, 'hh', 10, 2000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_preorder`
--

CREATE TABLE `detail_preorder` (
  `id_detailPreorder` int(11) NOT NULL,
  `idPreorder` int(11) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detailTransaksi` int(11) NOT NULL,
  `idTransaksi` int(11) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detailTransaksi`, `idTransaksi`, `idProduk`, `namaProduk`, `jumlah`, `total`) VALUES
(51, 20, 24, 'Roti Hatari', 1, 5000),
(52, 21, 23, 'Roti Donat', 3, 15000),
(53, 21, 20, 'Roti Malkist', 1, 6000),
(54, 21, 19, 'Roti Roma', 2, 20000),
(55, 22, 25, 'Roti Boyo', 5, 50000),
(56, 22, 24, 'Roti Hatari', 5, 25000),
(57, 22, 21, 'Kue Ulang Tahun', 5, 15000),
(58, 22, 23, 'Roti Donat', 1, 5000);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `pembelian` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
	UPDATE produk SET stok = stok-NEW.jumlah
    WHERE idProduk = NEW.idProduk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gaji_karyawan`
--

CREATE TABLE `gaji_karyawan` (
  `idGaji` int(11) NOT NULL,
  `idKaryawan` int(11) NOT NULL,
  `uangGaji` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji_karyawan`
--

INSERT INTO `gaji_karyawan` (`idGaji`, `idKaryawan`, `uangGaji`, `bulan`) VALUES
(56, 2, 500000, '2022-01'),
(57, 5, 500000, '2022-01'),
(58, 9, 500000, '2022-01'),
(61, 3, 500000, '2022-01'),
(62, 6, 500000, '2022-01'),
(169, 5, 1500000, '2022-02'),
(170, 2, 1000000, '2022-02'),
(171, 9, 1200000, '2022-02');

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
  `gaji` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `nama`, `jenisKelamin`, `posisi`, `noHp`, `gaji`, `created_at`) VALUES
(2, 'Reka', 'Laki-Laki', 'Pengirim', '083845253852', 1000000, '0000-00-00'),
(3, 'Nana', 'Perempuan', 'Produksi', '083674527850', 1000000, '2015-02-02'),
(5, 'Roni', 'Laki-Laki', 'Pelayanan', '083678357083', 1500000, '2018-11-20'),
(6, 'Mamad', 'Laki-Laki', 'Tukang Maido', '089636810578', 1000000, '2014-10-24'),
(9, 'Not Not', 'Laki-Laki', 'Tukang Maido', '089636542980', 1200000, '2022-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `idModal` int(11) NOT NULL,
  `totalModal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggalEdit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`idModal`, `totalModal`, `tanggal`, `tanggalEdit`) VALUES
(2, 454000, '2022-01-21', '2022-02-22'),
(6, 470000, '2022-01-22', '2022-02-22'),
(11, 165000, '2022-02-22', NULL),
(12, 20000, '2022-02-22', '2022-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `preorder`
--

CREATE TABLE `preorder` (
  `idPreorder` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `metode` varchar(55) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
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
(19, 2, 'Roti Roma', 10000, 'Ready', 5, '1.png', '2022-02-11'),
(20, 1, 'Roti Malkist', 6000, 'Kosong', 6, '3.png', '2022-02-11'),
(21, 2, 'Kue Ulang Tahun', 3000, 'Preorder', 1, '6.png', '2022-02-11'),
(23, 2, 'Roti Donat', 5000, 'Ready', 0, '4.png', '2022-02-14'),
(24, 1, 'Roti Hatari', 5000, 'Ready', 0, '12.png', '2022-02-14'),
(25, 1, 'Roti Boyo', 10000, 'Ready', 3, '9.png', '2022-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `total_belanja`, `metode`, `pembayaran`, `status`, `tanggal`) VALUES
(20, 5000, 'Online', 'LinkAja', 'Menunggu pengiriman', '2022-02-15'),
(21, 41000, 'Offline', 'Tunai', 'Menunggu pengiriman', '2022-02-16'),
(22, 95000, 'Online', 'Gopay', 'Selesai', '2022-02-14');

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
(5, 'Admin', 'admin@gmail.com', '$2y$10$rcqQnQQDFptW5cEXoCDzf.kTOOjYlVydCRSuR0tNYdKOEc4X.s21O', 77);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_modal`
--
ALTER TABLE `detail_modal`
  ADD PRIMARY KEY (`id_detailModal`),
  ADD KEY `idModal` (`idModal`);

--
-- Indexes for table `detail_preorder`
--
ALTER TABLE `detail_preorder`
  ADD PRIMARY KEY (`id_detailPreorder`),
  ADD KEY `preorder` (`idPreorder`),
  ADD KEY `idProduk` (`idProduk`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detailTransaksi`),
  ADD KEY `detail` (`idTransaksi`),
  ADD KEY `idProduk` (`idProduk`);

--
-- Indexes for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD PRIMARY KEY (`idGaji`),
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
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`idModal`);

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
-- AUTO_INCREMENT for table `detail_modal`
--
ALTER TABLE `detail_modal`
  MODIFY `id_detailModal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `detail_preorder`
--
ALTER TABLE `detail_preorder`
  MODIFY `id_detailPreorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detailTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  MODIFY `idGaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `idJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `idModal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `preorder`
--
ALTER TABLE `preorder`
  MODIFY `idPreorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_modal`
--
ALTER TABLE `detail_modal`
  ADD CONSTRAINT `detail_modal_ibfk_1` FOREIGN KEY (`idModal`) REFERENCES `modal` (`idModal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_preorder`
--
ALTER TABLE `detail_preorder`
  ADD CONSTRAINT `detail_preorder_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preorder` FOREIGN KEY (`idPreorder`) REFERENCES `preorder` (`idPreorder`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD CONSTRAINT `gaji` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawan` (`idKaryawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `jenis` FOREIGN KEY (`idJenis`) REFERENCES `jenis_produk` (`idJenis`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
