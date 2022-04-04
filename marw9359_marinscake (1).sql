-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2022 at 11:36 PM
-- Server version: 10.2.43-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marw9359_marinscake`
--

-- --------------------------------------------------------

--
-- Table structure for table `daerah_kirim`
--

CREATE TABLE `daerah_kirim` (
  `id_daerah` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daerah_kirim`
--

INSERT INTO `daerah_kirim` (`id_daerah`, `nama_kota`, `ongkir`) VALUES
(1, 'Kota Kediri', 2000),
(2, 'Kab. Kediri', 5000),
(3, 'Kota Malang', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_modal`
--

CREATE TABLE `detail_modal` (
  `id_detail_modal` int(11) NOT NULL,
  `id_modal` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_preorder`
--

CREATE TABLE `detail_preorder` (
  `id_detail_preorder` int(11) NOT NULL,
  `id_preorder` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_preorder`
--

INSERT INTO `detail_preorder` (`id_detail_preorder`, `id_preorder`, `id_produk`, `nama_produk`, `jumlah`, `total`) VALUES
(1, 14, 19, 'Roti Roma', 5, 50000),
(2, 14, 24, 'Roti Hatari', 5, 25000),
(3, 15, 19, 'Roti Roma', 5, 50000),
(4, 15, 24, 'Roti Hatari', 5, 25000),
(5, 16, 19, 'Roti Roma', 5, 50000),
(7, 18, 20, 'Roti Malkist', 5, 30000),
(8, 19, 24, 'Roti Hatari', 5, 25000),
(9, 19, 20, 'Roti Malkist', 5, 30000),
(10, 20, 24, 'Roti Hatari', 5, 25000),
(11, 20, 20, 'Roti Malkist', 5, 30000),
(12, 21, 20, 'Roti Malkist', 6, 36000),
(13, 21, 24, 'Roti Hatari', 5, 25000),
(14, 21, 25, 'Roti Boyo', 1, 10000),
(15, 22, 25, 'Roti Boyo', 1, 10000),
(16, 23, 23, 'Roti Donat', 2, 10000),
(17, 24, 25, 'Roti Boyo', 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_produk`, `nama_produk`, `jumlah`, `total`) VALUES
(42, 19, 20, 'Roti Malkist', 2, 12000),
(43, 19, 23, 'Roti Donat', 1, 5000),
(44, 19, 25, 'Roti Boyo', 2, 20000),
(51, 20, 24, 'Roti Hatari', 1, 5000),
(52, 21, 24, 'Roti Hatari', 1, 5000),
(53, 21, 20, 'Roti Malkist', 1, 6000),
(54, 22, 23, 'Roti Donat', 2, 10000),
(55, 23, 19, 'Roti Roma', 1, 10000),
(56, 24, 19, 'Roti Roma', 1, 10000),
(57, 25, 24, 'Roti Hatari', 1, 5000),
(58, 25, 23, 'Roti Donat', 1, 5000),
(59, 26, 21, 'Kue Ulang Tahun', 1, 3000),
(60, 26, 25, 'Roti Boyo', 1, 10000),
(61, 27, 25, 'Roti Boyo', 1, 10000),
(62, 28, 19, 'Roti Roma', 1, 10000),
(63, 29, 24, 'Roti Hatari', 1, 5000),
(64, 30, 23, 'Roti Donat', 2, 10000),
(65, 31, 19, 'Roti Roma', 2, 20000),
(66, 32, 19, 'Roti Roma', 1, 10000),
(67, 32, 20, 'Roti Malkist', 1, 6000),
(68, 33, 19, 'Roti Roma', 1, 10000),
(69, 33, 20, 'Roti Malkist', 1, 6000),
(70, 34, 19, 'Roti Roma', 1, 10000),
(71, 34, 20, 'Roti Malkist', 1, 6000),
(72, 34, 21, 'Kue Ulang Tahun', 1, 3000),
(73, 35, 19, 'Roti Roma', 2, 20000),
(74, 35, 20, 'Roti Malkist', 2, 12000),
(75, 35, 21, 'Kue Ulang Tahun', 1, 3000),
(76, 36, 23, 'Roti Donat', 2, 10000),
(77, 36, 24, 'Roti Hatari', 1, 5000),
(78, 36, 25, 'Roti Boyo', 1, 10000),
(79, 37, 20, 'Roti Malkist', 1, 6000),
(80, 38, 25, 'Roti Boyo', 1, 10000),
(81, 39, 25, 'Roti Boyo', 1, 10000),
(82, 40, 24, 'Roti Hatari', 1, 5000);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `pembelian` BEFORE INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
	UPDATE produk SET stok = stok-NEW.jumlah
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gaji_karyawan`
--

CREATE TABLE `gaji_karyawan` (
  `id_gaji` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `uang_gaji` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji_karyawan`
--

INSERT INTO `gaji_karyawan` (`id_gaji`, `id_karyawan`, `uang_gaji`, `bulan`) VALUES
(53, 2, 0, '2022-02'),
(54, 9, 0, '2022-02'),
(55, 5, 0, '2022-02'),
(56, 2, 0, '2022-01'),
(57, 5, 0, '2022-01'),
(58, 9, 0, '2022-01'),
(59, 3, 0, '2022-02'),
(60, 6, 0, '2022-02'),
(61, 3, 0, '2022-01'),
(62, 6, 0, '2022-01');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id_gambar_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_produk`
--

INSERT INTO `gambar_produk` (`id_gambar_produk`, `id_produk`, `gambar`) VALUES
(1, 19, '1.png'),
(2, 20, '3.png'),
(3, 21, '6.png'),
(4, 23, '4.png'),
(5, 24, '12.png'),
(6, 25, '9.png'),
(7, 19, '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis`, `nama_jenis`, `status`) VALUES
(1, 'Roti Kering', 1),
(2, 'Roti Basah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `gaji` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `jenis_kelamin`, `posisi`, `no_hp`, `gaji`, `created_at`) VALUES
(2, 'Reka', 'Laki-Laki', 'Pengirim', '083845253852', 1000000, '0000-00-00'),
(3, 'Nana', 'Perempuan', 'Produksi', '083674527850', 1000000, '2015-02-02'),
(5, 'Roni', 'Laki-Laki', 'Pelayanan', '083678357083', 1500000, '2018-11-20'),
(6, 'Mamad', 'Laki-Laki', 'Tukang Maido', '089636810578', 1000000, '2014-10-24'),
(9, 'Not Not', 'Laki-Laki', 'Tukang Maido', '089636542980', 1200000, '2022-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `midtrans`
--

CREATE TABLE `midtrans` (
  `id_midtrans` varchar(20) NOT NULL,
  `id_preorder` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `midtrans`
--

INSERT INTO `midtrans` (`id_midtrans`, `id_preorder`, `total_bayar`, `metode`, `waktu`, `status`, `url`) VALUES
('24-36280', 24, 15000, 'bank_transfer', '2022-04-04 17:01:12', 200, 'https://app.sandbox.midtrans.com/snap/v1/transactions/ffa800a0-917d-4bc6-a41b-e3ef07a0a845/pdf');

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `id_modal` int(11) NOT NULL,
  `total_modal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_edit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_preorder` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `id_daerah` int(50) NOT NULL,
  `alamat` text NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_preorder`, `nama`, `email`, `no_hp`, `id_daerah`, `alamat`, `catatan`) VALUES
(5, 20, 'fadel', '', '0895329990656', 1, 'Kediri', ''),
(6, 21, 'weawe', '', '13123123123', 2, 'adaw', ''),
(7, 22, 'Joko Santoso', 'dimasafpurn@gmail.com', '0867546476565', 1, 'Jalan Pahlawan', 'segera kirim ya'),
(8, 23, 'paijo', 'dimasafpurn@gmail.com', '0789867457574', 2, 'Jalan terus jadian enggak', 'Ndnag dikirim cok'),
(9, 24, 'dimas afrilliyan purnama', 'dimasafpurn@gmail.com', '0867483232633', 2, 'Jalan Sudirman no.23', 'segera dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `preorder`
--

CREATE TABLE `preorder` (
  `id_preorder` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `metode` varchar(55) NOT NULL,
  `tanggal_pesan` varchar(255) NOT NULL,
  `tanggal_dikirim` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preorder`
--

INSERT INTO `preorder` (`id_preorder`, `jumlah`, `metode`, `tanggal_pesan`, `tanggal_dikirim`, `status`) VALUES
(14, 80000, 'Online', '2022-03-25 23:28:41', '2022-03-28', 'Menunggu Pembayaran'),
(15, 80000, 'Online', '2022-03-25 23:35:32', '2022-03-28', 'Menunggu Pembayaran'),
(16, 52000, 'Online', '2022-03-25 23:55:30', '2022-03-29', 'Menunggu Pembayaran'),
(18, 30000, 'Offline', '2022-03-28', '2022-03-31', 'Menunggu Pengiriman'),
(19, 55000, 'Offline', '2022-04-02', '2022-04-05', 'Menunggu Pengiriman'),
(20, 55000, 'Offline', '2022-04-02', '2022-04-05', 'Menunggu Pengiriman'),
(21, 71000, 'Offline', '2022-04-02', '2022-04-05', 'Menunggu Pengiriman'),
(22, 0, 'Online', '2022-04-04 00:46:04', '2022-04-07', 'Menunggu Pembayaran'),
(23, 15000, 'Online', '2022-04-04 01:03:25', '2022-05-05', 'Menunggu Pembayaran'),
(24, 15000, 'Online', '2022-04-04 16:30:43', '2022-04-07', 'Menunggu Pengiriman');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `min_order` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_jenis`, `nama_produk`, `harga`, `status`, `stok`, `min_order`, `deskripsi`, `created_at`) VALUES
(19, 2, 'Roti Roma', 10000, 'Ready', 20, 5, 'ndfashgfshagfhsagfhgashgfhsagfhsahfshagfhgsfsajfsghfgashfgsha', '2022-02-11'),
(20, 1, 'Roti Malkist', 6000, 'Kosong', 3, 5, 'safhghsacvajvscuasvcsahisavcschavcsscsac', '2022-02-11'),
(21, 2, 'Kue Ulang Tahun', 3000, 'Preorder', 7, 1, 'sahgfsofausfgahbfsjafhoifuegfbdasbnsbsafsahfabf', '2022-02-11'),
(23, 2, 'Roti Donat', 5000, 'Ready', 3, 2, 'sakjgdhasffgoeugfcbheacuebcueacaehbceeabhscvegceceec', '2022-02-14'),
(24, 1, 'Roti Hatari', 5000, 'Ready', 5, 5, 'sakhgfeaofeufebcajsbceyceacucaoeuegabceudeeybeyag', '2022-02-14'),
(25, 1, 'Roti Boyo', 10000, 'Ready', 5, 1, 'shadfagsvcebcruicbrycvechbebeyvcyahayasbgcsyai', '2022-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `gambar`, `status`) VALUES
(1, '21.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total_belanja`, `metode`, `pembayaran`, `status`, `tanggal`) VALUES
(19, 37000, 'Offline', 'Tunai', 'Selesi', '2022-02-14 00:00:00'),
(20, 5000, 'Offline', 'Tunai', 'Selesai', '2022-02-15 00:00:00'),
(21, 11000, 'Offline', 'Tunai', 'Selesai', '2022-02-20 00:00:00'),
(22, 10000, 'Offline', 'Tunai', 'Selesai', '2022-02-21 00:00:00'),
(23, 12000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-03 02:29:02'),
(24, 21000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-03 04:06:38'),
(25, 12000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-03 04:11:22'),
(26, 15000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-03 04:16:57'),
(27, 12000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-03 04:24:53'),
(28, 12000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-03 04:46:32'),
(29, 7000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-03 04:53:24'),
(30, 12000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-03 17:54:01'),
(31, 22000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-04 02:26:55'),
(32, 18000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-04 02:28:07'),
(33, 18000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-05 12:44:37'),
(34, 21000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-05 12:58:48'),
(35, 37000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-05 13:38:08'),
(36, 27000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-05 13:41:46'),
(37, 8000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-05 14:15:52'),
(38, 10000, 'Offline', '', 'Selesai', '2022-03-19 00:00:00'),
(39, 10000, 'Offline', 'Tunai', 'Selesai', '2022-03-27 00:00:00'),
(40, 5000, 'Offline', 'Tunai', 'Selesai', '2022-03-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `role`) VALUES
(5, 'Admin', 'admin@gmail.com', '$2y$10$rcqQnQQDFptW5cEXoCDzf.kTOOjYlVydCRSuR0tNYdKOEc4X.s21O', 77),
(6, 'kasir', 'kasir@gmail.com', '$2y$10$RWx6Q9Ij2VnboNW5zxRV4.F5Atug2S0LcYSHhoNZ0TRPFP2oJWPqq', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daerah_kirim`
--
ALTER TABLE `daerah_kirim`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `detail_modal`
--
ALTER TABLE `detail_modal`
  ADD PRIMARY KEY (`id_detail_modal`),
  ADD KEY `idModal` (`id_modal`);

--
-- Indexes for table `detail_preorder`
--
ALTER TABLE `detail_preorder`
  ADD PRIMARY KEY (`id_detail_preorder`),
  ADD KEY `preorder` (`id_preorder`),
  ADD KEY `idProduk` (`id_produk`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `detail` (`id_transaksi`),
  ADD KEY `idProduk` (`id_produk`);

--
-- Indexes for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `gaji` (`id_karyawan`);

--
-- Indexes for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id_gambar_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `midtrans`
--
ALTER TABLE `midtrans`
  ADD PRIMARY KEY (`id_midtrans`),
  ADD KEY `midtrans_ibfk_1` (`id_preorder`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id_modal`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `idPreorder` (`id_preorder`);

--
-- Indexes for table `preorder`
--
ALTER TABLE `preorder`
  ADD PRIMARY KEY (`id_preorder`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `jenis` (`id_jenis`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daerah_kirim`
--
ALTER TABLE `daerah_kirim`
  MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_modal`
--
ALTER TABLE `detail_modal`
  MODIFY `id_detail_modal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_preorder`
--
ALTER TABLE `detail_preorder`
  MODIFY `id_detail_preorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id_gambar_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `id_modal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `preorder`
--
ALTER TABLE `preorder`
  MODIFY `id_preorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_modal`
--
ALTER TABLE `detail_modal`
  ADD CONSTRAINT `modalToDetail` FOREIGN KEY (`id_modal`) REFERENCES `modal` (`id_modal`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_preorder`
--
ALTER TABLE `detail_preorder`
  ADD CONSTRAINT `preorderToDetail` FOREIGN KEY (`id_preorder`) REFERENCES `preorder` (`id_preorder`) ON UPDATE CASCADE,
  ADD CONSTRAINT `produkToDetail` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `produkToDetailT` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksiToDetailT` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON UPDATE CASCADE;

--
-- Constraints for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD CONSTRAINT `karyawanToGaji` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE;

--
-- Constraints for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD CONSTRAINT `produkToGambar` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE;

--
-- Constraints for table `midtrans`
--
ALTER TABLE `midtrans`
  ADD CONSTRAINT `preorderToMidtrans` FOREIGN KEY (`id_preorder`) REFERENCES `preorder` (`id_preorder`) ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `preorderToPengiriman` FOREIGN KEY (`id_preorder`) REFERENCES `preorder` (`id_preorder`) ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `jenisToProduk` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_produk` (`id_jenis`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
