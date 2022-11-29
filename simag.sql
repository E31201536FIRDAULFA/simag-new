-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2022 at 02:02 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simag`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `datang` time NOT NULL,
  `pulang` time NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `user_id`, `date`, `datang`, `pulang`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(124, 66, '2022-06-20', '10:41:06', '00:00:00', -8.00161, 112.621, '2022-06-20 10:41:06', '2022-06-20 10:41:35'),
(125, 63, '2022-06-20', '10:44:46', '00:00:00', 0, 0, '2022-06-20 10:44:46', '2022-06-20 10:44:46'),
(127, 93, '2022-11-10', '10:23:53', '00:00:00', -7.30071, 112.728, '2022-11-10 10:23:53', '2022-11-10 10:24:14'),
(128, 94, '2022-11-11', '00:00:00', '14:18:47', -8.17331, 113.701, '2022-11-11 14:18:41', '2022-11-11 14:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `Nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `userId`, `date`, `mulai`, `selesai`, `keterangan`, `status`, `created_at`, `updated_at`, `Nilai`) VALUES
(38, 93, '2022-11-10', '10:28:00', '11:28:00', 'tidur', 2, '2022-11-09 21:33:08', '2022-11-09 21:33:32', ''),
(39, 94, '2022-11-11', '14:19:00', '15:19:00', 'lzm', 2, '2022-11-11 01:19:14', '2022-11-11 02:01:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quota` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `name`, `quota`, `created_at`, `updated_at`) VALUES
(4, 'Divisi Cyber Crime', 5, '2022-11-28 10:23:09', '2022-11-28 10:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `info_peserta`
--

CREATE TABLE `info_peserta` (
  `id` int(11) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT '/assets/img/peserta.png',
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `pengantar` varchar(256) NOT NULL,
  `proposal` varchar(256) NOT NULL,
  `ket` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_peserta`
--

INSERT INTO `info_peserta` (`id`, `instansi`, `foto`, `startDate`, `endDate`, `pengantar`, `proposal`, `ket`, `created_at`, `updated_at`, `userId`) VALUES
(33, 'Universitas A', '/assets/img/peserta.png', '2022-06-22', '2022-07-21', '/assets/dokumen pengantar/63/Dokumen (1).pdf', '/assets/dokumen proposal/63/Dokumen (2).pdf', '', '2022-06-19 08:46:44', '2022-06-19 08:46:44', 63),
(34, 'Sekolah Tinggi Ilmu Statistik', '/assets/img/peserta.png', '2022-06-01', '2022-06-30', '/assets/dokumen pengantar/66/Permintaan Data DLH 18 mei 2022.pdf', '/assets/dokumen proposal/66/MATRIKS KEGIATAN TIM HUMAS - aPRIL 2022.pdf', '', '2022-06-19 22:37:40', '2022-11-28 06:08:37', 66),
(59, 'idu', '/assets/fotoprofil/93/1668050751_1b35f8598418756cae65.jpeg', '2022-11-06', '2022-11-21', '/assets/dokumen pengantar/93/LINK PRODUK & DESKRIPSI.pdf', '/assets/dokumen proposal/93/LINK PRODUK & DESKRIPSI.pdf', '', '2022-11-06 09:12:11', '2022-11-28 06:08:42', 93),
(60, 'ssss', '/assets/img/peserta.png', '2022-11-11', '2022-11-21', '/assets/dokumen pengantar/94/LINK PRODUK & DESKRIPSI.pdf', '/assets/dokumen proposal/94/LINK PRODUK & DESKRIPSI.pdf', '', '2022-11-11 01:17:33', '2022-11-28 06:08:48', 94),
(64, 'test', '/assets/fotoprofil/97/1669282161_a25040c366d91e56866a.jpeg', '2022-11-01', '2022-12-31', '/assets/dokumen pengantar/97/22-11-14-05-51-44_hgsg_93.pdf', '/assets/dokumen proposal/97/22-11-14-05-58-25_hgsg_93.pdf', '', '2022-11-21 14:16:12', '2022-11-28 06:08:53', 97),
(65, 'test', '/assets/img/peserta.png', '2022-11-01', '2022-12-31', '/assets/dokumen pengantar/97/22-11-12-10-42-45hgsg.pdf', '/assets/dokumen proposal/97/22-11-14-05-58-25_hgsg_93.pdf', '', '2022-11-24 03:31:43', '2022-11-24 03:31:43', 97),
(66, 'test', '/assets/img/peserta.png', '2022-11-02', '2022-11-30', '/assets/dokumen pengantar/95/22-11-12-10-43-34_hgsg.pdf', '/assets/dokumen proposal/95/22-11-12-10-44-09_hgsg_93.pdf', '', '2022-11-25 00:28:50', '2022-11-28 06:06:30', 95),
(67, 'test 2', '/assets/img/peserta.png', '2022-11-01', '2022-11-30', '/assets/dokumen pengantar/102/22-11-14-05-42-57_hgsg_93.pdf', '/assets/dokumen proposal/102/22-11-14-05-55-51_hgsg_93.pdf', 'test 2', '2022-11-25 00:31:25', '2022-11-28 07:15:12', 102);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `idduser` int(10) NOT NULL,
  `pengetahuan` int(10) NOT NULL,
  `keterampilan` int(10) NOT NULL,
  `kemampuan` int(10) NOT NULL,
  `disiplin` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `idduser`, `pengetahuan`, `keterampilan`, `kemampuan`, `disiplin`, `total`) VALUES
(4, 93, 9, 9, 9, 9, 9),
(5, 94, 10, 8, 9, 8, 8),
(6, 97, 9, 9, 9, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `seksi`
--

CREATE TABLE `seksi` (
  `id` int(10) NOT NULL,
  `d_distribusi` int(10) NOT NULL,
  `d_produksi` int(10) NOT NULL,
  `d_sosial` int(10) NOT NULL,
  `d_neraca` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seksi`
--

INSERT INTO `seksi` (`id`, `d_distribusi`, `d_produksi`, `d_sosial`, `d_neraca`) VALUES
(1, 11, 10, 11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenisKelamin` int(1) NOT NULL,
  `tglLahir` date NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `divisi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `jenisKelamin`, `tglLahir`, `role`, `created_at`, `updated_at`, `status`, `divisi`) VALUES
(33, 'Admin Viona S', 'vionafebriana@gmail.com', 2, '1999-02-20', 1, '2022-02-24 09:09:23', '2022-11-21 12:01:21', 2, NULL),
(63, 'Peserta 1 ', 'peserta1stis@gmail.com', 2, '2002-01-11', 3, '2022-06-19 08:46:44', '2022-11-28 07:43:36', 2, 4),
(64, 'Pembimbing 1', 'pembimbing1stis@gmail.com', 1, '1999-06-10', 2, '2022-06-19 08:55:07', '2022-06-19 08:55:07', 2, NULL),
(66, 'Bima Sakti Krisdianto', 'bimasakti.kr@gmail.com', 1, '1995-11-06', 3, '2022-06-19 22:37:40', '2022-11-28 07:43:45', 2, 4),
(93, 'hgsg', 'firdaunsilah1206@gmail.com', 1, '2022-11-06', 3, '2022-11-06 09:12:11', '2022-11-28 07:43:54', 2, 4),
(94, 'iug', 'e31201536@student.polije.ac.id', 1, '2022-11-11', 3, '2022-11-11 01:17:33', '2022-11-28 07:44:00', 2, 4),
(95, 'test', 'mohammadrafly275@gmail.com', 1, '2022-11-17', 1, '2022-11-12 03:27:22', '2022-11-12 03:27:22', 2, NULL),
(97, 'Bot', 'botguy275@gmail.com', 1, '2000-06-19', 3, '2022-11-21 12:53:52', '2022-11-28 07:44:05', 2, 4),
(98, 'tes 2', 'biitchboy275@gmail.com', 1, '1991-02-12', 2, '2022-11-21 14:51:31', '2022-11-21 14:51:31', 2, NULL),
(102, 'test', 'tekker.id@gmail.com', 1, '2022-11-02', 3, '2022-11-24 23:58:32', '2022-11-24 23:58:32', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_peserta`
--
ALTER TABLE `info_peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user(id)` (`idduser`);

--
-- Indexes for table `seksi`
--
ALTER TABLE `seksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisi` (`divisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `info_peserta`
--
ALTER TABLE `info_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `aktivitas_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info_peserta`
--
ALTER TABLE `info_peserta`
  ADD CONSTRAINT `info_peserta_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
