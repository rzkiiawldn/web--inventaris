-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 11:49 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_deptownerid`
--

CREATE TABLE `tb_deptownerid` (
  `id_dept` int(11) NOT NULL,
  `kode_deptOwner` int(11) NOT NULL,
  `nama_deptOwner` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_deptownerid`
--

INSERT INTO `tb_deptownerid` (`id_dept`, `kode_deptOwner`, `nama_deptOwner`) VALUES
(1, 903, 'EDP'),
(2, 904, 'TEKNIK'),
(3, 905, 'Web Service'),
(4, 906, 'Finance'),
(5, 907, 'Marketing'),
(6, 908, 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisbarang`
--

CREATE TABLE `tb_jenisbarang` (
  `kode_jenisbarang` int(11) NOT NULL,
  `nama_jenisbarang` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenisbarang`
--

INSERT INTO `tb_jenisbarang` (`kode_jenisbarang`, `nama_jenisbarang`) VALUES
(1, 'mobil'),
(2, 'printer'),
(3, 'ups'),
(4, 'monitor'),
(5, 'cpu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_koderadio`
--

CREATE TABLE `tb_koderadio` (
  `id` int(11) NOT NULL,
  `kode_radio` int(11) NOT NULL,
  `nama_radio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_koderadio`
--

INSERT INTO `tb_koderadio` (`id`, `kode_radio`, `nama_radio`) VALUES
(1, 10, 'jakarta'),
(2, 11, 'bandung'),
(3, 12, 'tegal'),
(4, 13, 'semarang'),
(5, 14, 'surabaya'),
(6, 15, 'lampung'),
(7, 16, 'palembang'),
(8, 17, 'medan'),
(9, 20, 'Fit Bandung'),
(10, 21, 'Fit Semarang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statusbarang`
--

CREATE TABLE `tb_statusbarang` (
  `id_status` int(11) NOT NULL,
  `kode_statusbarang` int(100) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_statusbarang`
--

INSERT INTO `tb_statusbarang` (`id_status`, `kode_statusbarang`, `status`) VALUES
(1, 801, 'good'),
(2, 802, 'rusak'),
(3, 803, 'service'),
(4, 804, 'dilelang'),
(5, 805, 'pindah ke daerah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kode_transaksibarang` bigint(20) NOT NULL,
  `kode_radio` int(11) NOT NULL,
  `harga_beli` double NOT NULL,
  `tgl_beli` date NOT NULL,
  `kode_jenisbarang` int(11) NOT NULL,
  `versi_barang` varchar(500) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `kode_vendor` tinyint(4) NOT NULL,
  `masa_garansi` int(11) NOT NULL,
  `path_foto` varchar(1000) NOT NULL,
  `kode_statusbarang` int(11) NOT NULL,
  `user_ga` varchar(500) NOT NULL,
  `tgl_input` date NOT NULL,
  `kode_deptowner` int(11) NOT NULL,
  `user_owner` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kode_transaksibarang`, `kode_radio`, `harga_beli`, `tgl_beli`, `kode_jenisbarang`, `versi_barang`, `serial_number`, `kode_vendor`, `masa_garansi`, `path_foto`, `kode_statusbarang`, `user_ga`, `tgl_input`, `kode_deptowner`, `user_owner`) VALUES
(2, 10, 2, '2021-12-30', 1, 's', 's', 2, 0, 's', 1, 's', '2021-12-31', 1, 's');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_berulang`
--

CREATE TABLE `tb_transaksi_berulang` (
  `kode_transaksi` int(11) NOT NULL,
  `kode_transaksibarang` bigint(20) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `tanggal_input` date NOT NULL,
  `staff_onduty` varchar(500) NOT NULL,
  `status_detail` varchar(500) NOT NULL,
  `kode_vendor` tinyint(4) NOT NULL,
  `biaya_service` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_vendor`
--

CREATE TABLE `tb_vendor` (
  `kode_vendor` int(11) NOT NULL,
  `alamat_vendor` varchar(1000) NOT NULL,
  `kontak_vendor` varchar(300) NOT NULL,
  `nama_vendor` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_vendor`
--

INSERT INTO `tb_vendor` (`kode_vendor`, `alamat_vendor`, `kontak_vendor`, `nama_vendor`) VALUES
(2, 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_level`) VALUES
(1, 'admin', '$2y$10$D57ydtRTqjoJco0IisE9MeLBdTM3k2Rd8aKimg7wCQc1dCyc0thD2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_akses_menu`
--

CREATE TABLE `user_akses_menu` (
  `id_akses` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id_akses`, `id_level`, `id_menu`, `id_sub`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 2, 3),
(4, 1, 2, 6),
(5, 1, 1, 4),
(6, 1, 1, 5),
(9, 2, 2, 2),
(24, 2, 2, 3),
(28, 1, 2, 14),
(29, 1, 2, 15),
(38, 2, 9, 19),
(39, 1, 9, 19),
(40, 2, 9, 17),
(41, 2, 2, 15),
(42, 2, 2, 14),
(43, 1, 10, 21),
(44, 1, 10, 22),
(45, 1, 10, 23),
(46, 1, 10, 24),
(47, 1, 10, 27),
(48, 1, 10, 25),
(49, 1, 10, 26);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_level`, `level`) VALUES
(1, 'Admin'),
(2, 'HRD'),
(3, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL,
  `urutan_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`, `is_active`, `urutan_menu`) VALUES
(1, 'Pengaturan', 1, 4),
(2, 'User', 1, 1),
(10, 'Inventaris', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `submenu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `urutan_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub`, `id_menu`, `submenu`, `url`, `icon`, `is_active`, `urutan_sub`) VALUES
(1, 1, 'Hak Akses', 'pengaturan/hak_akses', 'fas fa-fw fa-cogs', 1, 3),
(2, 2, 'Dashboard', 'user', 'fas fa-fw fa-home', 1, 1),
(3, 2, 'Data User', 'user/data_user', 'fas fa-fw fa-users', 1, 2),
(4, 1, 'Menu', 'pengaturan/menu', 'fas fa-sliders-h', 1, 1),
(5, 1, 'Submenu', 'pengaturan/submenu', 'fas fa-fw fa-tasks', 1, 2),
(6, 2, 'Level', 'user/level', 'fas fa-fw fa-dot-circle', 1, 4),
(11, 2, 'Edit Profile', 'user/edit_profile', 'fas fa-fw fa-user', 1, 3),
(21, 10, 'Vendor', 'inventaris/vendor', 'fas fa-fw fa-users', 1, 1),
(22, 10, 'Transaksi Berulang', 'inventaris/transaksi_berulang', 'fas fa-fw fa-book', 1, 2),
(23, 10, 'Transaksi Barang', 'inventaris/transaksi_barang', 'fas fa-fw fa-book', 1, 3),
(24, 10, 'Status', 'inventaris/status', 'fas fa-fw fa-archway', 1, 4),
(25, 10, 'Kode Radio', 'inventaris/kode_radio', 'fas fa-fw fa-broadcast-tower', 1, 5),
(26, 10, 'Jenis Barang', 'inventaris/jenis_barang', 'fas fa-fw fa-chart-bar', 1, 6),
(27, 10, 'DeptOwner', 'inventaris/deptOwner', 'fas fa-fw fa-users', 1, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_deptownerid`
--
ALTER TABLE `tb_deptownerid`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indexes for table `tb_jenisbarang`
--
ALTER TABLE `tb_jenisbarang`
  ADD PRIMARY KEY (`kode_jenisbarang`);

--
-- Indexes for table `tb_koderadio`
--
ALTER TABLE `tb_koderadio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_statusbarang`
--
ALTER TABLE `tb_statusbarang`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kode_transaksibarang`),
  ADD KEY `kode_radio` (`kode_radio`);

--
-- Indexes for table `tb_transaksi_berulang`
--
ALTER TABLE `tb_transaksi_berulang`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `tb_vendor`
--
ALTER TABLE `tb_vendor`
  ADD PRIMARY KEY (`kode_vendor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_deptownerid`
--
ALTER TABLE `tb_deptownerid`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_jenisbarang`
--
ALTER TABLE `tb_jenisbarang`
  MODIFY `kode_jenisbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_koderadio`
--
ALTER TABLE `tb_koderadio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_statusbarang`
--
ALTER TABLE `tb_statusbarang`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_transaksi_berulang`
--
ALTER TABLE `tb_transaksi_berulang`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_vendor`
--
ALTER TABLE `tb_vendor`
  MODIFY `kode_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
