-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 05:09 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id_detailModal` int(11) NOT NULL,
  `idModal` int(11) NOT NULL,
  `namaBahan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `totalHarga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `detail_preorder`
--

INSERT INTO `detail_preorder` (`id_detailPreorder`, `idPreorder`, `idProduk`, `namaProduk`, `jumlah`, `total`) VALUES
(1, 6, 25, 'Roti Boyo', 2, 20000),
(2, 6, 19, 'Roti Roma', 3, 30000),
(3, 6, 20, 'Roti Malkist', 2, 12000),
(4, 7, 23, 'Roti Donat', 2, 10000),
(5, 7, 19, 'Roti Roma', 2, 20000),
(6, 8, 25, 'Roti Boyo', 1, 10000),
(7, 8, 24, 'Roti Hatari', 1, 5000),
(8, 9, 25, 'Roti Boyo', 1, 10000),
(9, 9, 24, 'Roti Hatari', 1, 5000),
(10, 10, 25, 'Roti Boyo', 1, 10000),
(11, 10, 23, 'Roti Donat', 1, 5000);

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
(79, 37, 20, 'Roti Malkist', 1, 6000);

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
  `id_gambarProduk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_produk`
--

INSERT INTO `gambar_produk` (`id_gambarProduk`, `id_produk`, `gambar`) VALUES
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
-- Table structure for table `midtrans`
--

CREATE TABLE `midtrans` (
  `id_midtrans` int(11) NOT NULL,
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
(8, 10, 17000, 'bank_transfer', '2022-03-07 16:18:28', 201, 'https://app.sandbox.midtrans.com/snap/v1/transactions/16cafc82-4186-45e3-ad1c-745c506d3f20/pdf');

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `idModal` int(11) NOT NULL,
  `totalModal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggalEdit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `idPreorder` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `idPreorder`, `nama`, `email`, `no_hp`, `kota`, `alamat`, `catatan`) VALUES
(16, 9, 'Eko Purwanto', 'dimasafpurn@gmail.com', '089333456777', 'Kota Malang', 'Sawojajar', 'segera dikirim'),
(17, 10, 'djfksghfds', 'dimasafpurn@gmail.com', '089555362723', 'Kota Kediri', 'shagfvasdusabdygsavfvsagdgsa', 'djfasdgafdgaddsad');

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
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preorder`
--

INSERT INTO `preorder` (`idPreorder`, `jumlah`, `metode`, `tanggalPesan`, `tanggalDikirim`, `status`, `ongkir`) VALUES
(6, 62000, 'Offline', '2022-02-15', '2022-02-28', 'Belum Dikirim', 20220215),
(7, 30000, 'Offline', '2022-02-15', '2022-02-19', 'Belum Dikirim', 20220215),
(8, 23000, 'Online', '2022-03-07 15:59:34', '2022-03-10', 'Menunggu Pembayaran', 8000),
(9, 23000, 'Online', '2022-03-07 16:00:07', '2022-03-10', 'Menunggu Pembayaran', 8000),
(10, 17000, 'Online', '2022-03-07 16:09:11', '2022-03-16', 'Menunggu Pembayaran', 2000);

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
  `min_order` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `idJenis`, `namaProduk`, `harga`, `status`, `stok`, `min_order`, `deskripsi`, `created_at`) VALUES
(19, 2, 'Roti Roma', 10000, 'Ready', 20, 5, 'ndfashgfshagfhsagfhgashgfhsagfhsahfshagfhgsfsajfsghfgashfgsha', '2022-02-11'),
(20, 1, 'Roti Malkist', 6000, 'Kosong', 3, 5, 'safhghsacvajvscuasvcsahisavcschavcsscsac', '2022-02-11'),
(21, 2, 'Kue Ulang Tahun', 3000, 'Preorder', 7, 1, 'sahgfsofausfgahbfsjafhoifuegfbdasbnsbsafsahfabf', '2022-02-11'),
(23, 2, 'Roti Donat', 5000, 'Ready', 3, 2, 'sakjgdhasffgoeugfcbheacuebcueacaehbceeabhscvegceceec', '2022-02-14'),
(24, 1, 'Roti Hatari', 5000, 'Ready', 6, 5, 'sakhgfeaofeufebcajsbceyceacucaoeuegabceudeeybeyag', '2022-02-14'),
(25, 1, 'Roti Boyo', 10000, 'Ready', 7, 1, 'shadfagsvcebcruicbrycvechbebeyvcyahayasbgcsyai', '2022-02-14');

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
  `idTransaksi` int(11) NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `total_belanja`, `metode`, `pembayaran`, `status`, `tanggal`) VALUES
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
(37, 8000, 'Online', 'Transfer', 'Menunggu Pembayaran', '2022-03-05 14:15:52');

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
(5, 'Admin', 'admin@gmail.com', '$2y$10$rcqQnQQDFptW5cEXoCDzf.kTOOjYlVydCRSuR0tNYdKOEc4X.s21O', 77),
(6, 'sikujan', 'sijan@gmail.com', '$2y$10$kiQFPwHxT44XW6DkrX3UhOKjoypL/FIM8FuKqXE9rNd7iDwgqRgdm', 24);

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
-- Indexes for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id_gambarProduk`),
  ADD KEY `id_produk` (`id_produk`);

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
-- Indexes for table `midtrans`
--
ALTER TABLE `midtrans`
  ADD PRIMARY KEY (`id_midtrans`),
  ADD KEY `midtrans_ibfk_1` (`id_preorder`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`idModal`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `idPreorder` (`idPreorder`);

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
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

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
-- AUTO_INCREMENT for table `daerah_kirim`
--
ALTER TABLE `daerah_kirim`
  MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_modal`
--
ALTER TABLE `detail_modal`
  MODIFY `id_detailModal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_preorder`
--
ALTER TABLE `detail_preorder`
  MODIFY `id_detailPreorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detailTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  MODIFY `idGaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id_gambarProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `midtrans`
--
ALTER TABLE `midtrans`
  MODIFY `id_midtrans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `idModal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `preorder`
--
ALTER TABLE `preorder`
  MODIFY `idPreorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD CONSTRAINT `gambar_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `midtrans`
--
ALTER TABLE `midtrans`
  ADD CONSTRAINT `midtrans_ibfk_1` FOREIGN KEY (`id_preorder`) REFERENCES `preorder` (`idPreorder`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`idPreorder`) REFERENCES `preorder` (`idPreorder`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `jenis` FOREIGN KEY (`idJenis`) REFERENCES `jenis_produk` (`idJenis`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
