-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 09:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rapot`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `email`, `password`, `is_active`, `updated`, `id_role`) VALUES
('7b2267c248f16d0c1e1539212f0e8ef225b7851b', 'Indah suryaningsih', 'indahsuryaningsih@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, '2020-11-29 15:07:27', 1),
('37c54260ed3c98ebe8f8c39ac65c93873653013a', 'Siswa', 'siswa@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1, '2020-11-29 15:07:27', 2),
('39c06149119633f8e69cba5f89631e31b7af35c3', 'Guru', 'guru@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1, '2020-12-01 21:03:16', 3),
('', 'Rahman Pambekti', 'rahmanpambekti@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `mapel` int(11) NOT NULL DEFAULT 0,
  `id_role` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `email`, `nip`, `nama`, `jk`, `mapel`, `id_role`) VALUES
('5fc3bb54c015f', 'guru@gmail.com', '123456', 'Indah Suryaningsih', 'P', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` varchar(100) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `id_kelas`, `id_guru`, `id_mapel`, `hari`, `jam`) VALUES
(3, 1, '5fc3bb54c015f', 3, 'senin', '1'),
(4, 2, '5fc3bb54c015f', 3, 'rabu', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nm_kelas` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nm_kelas`) VALUES
(1, 'X AKL 1'),
(2, 'X AKL 2'),
(3, 'X AKL 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `kkm_mapel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`, `kkm_mapel`) VALUES
(1, 'Matematika', 75),
(2, 'Bahasa Indonesia', 76),
(3, 'PBO', 76),
(7, 'Bahasa Inggris', 75);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `menu_id`, `title`, `icon`, `url`, `is_active`) VALUES
(1, 1, 'Dashboard', 'fa fa-th', '/Dashboard', 1),
(2, 2, 'Siswa', 'fa fa-mortar-board', '/Siswa', 1),
(3, 3, 'Guru', 'fa fa-user', '/Guru', 1),
(4, 4, 'Manajemen', 'fa fa-cog', '/Manajemen', 1),
(5, 5, 'Jurnal', 'fa fa-book', '/Jurnal', 1),
(7, 6, 'Nilai', 'fa fa-file-excel-o', '/Nilai', 1),
(8, 7, 'Mapel', 'fa fa-book', '/Mapel', 1),
(9, 8, 'Kelas', 'fa  fa-th-list', '/Kelas', 0),
(10, 9, 'Rapot', 'fa fa-book', '/Rapot', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekap`
--

CREATE TABLE `tb_rekap` (
  `id_rekap` int(11) NOT NULL,
  `jenis_nilai` varchar(100) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` varchar(100) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 3, 5),
(5, 1, 4),
(8, 1, 7),
(7, 3, 6),
(9, 1, 8),
(10, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `kelas` int(11) NOT NULL DEFAULT 0,
  `id_role` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `email`, `nis`, `nama`, `jk`, `kelas`, `id_role`) VALUES
('5fc3b4d896837', 'siswa@gmail.com', '15278', 'Indah Suryaningsih', 'P', 2, 2),
('9379153a1728bb0306de6da4a904d10e0632117b', 'akira@gmail.com', '12432', 'Akira', 'L', 3, 2),
('1e430c08a1b0ee16b0f674fe3066ab003733a457', 'rahma@gmail.com', '15632', 'Rahma Nur Ariska', 'P', 3, 2),
('', 'rhbekti@gmail.com', '1486', 'Rahman Pambekti', 'L', 3, 2),
('60223a83da3cb', '', '15278', 'Indah Suryaningsih', 'P', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rekap`
--
ALTER TABLE `tb_rekap`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_rekap`
--
ALTER TABLE `tb_rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
