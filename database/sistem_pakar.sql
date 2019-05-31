-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 06:22 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` char(3) NOT NULL,
  `nama_gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
('G01', 'Akar Membusuk dan Berwarna Kecoklatan'),
('G02', 'Bakal Buah dan Bunga Berguguran'),
('G03', 'Batang dan Daun Berwarna Kehitaman'),
('G04', 'Batang Menguning'),
('G05', 'Bercak Berwarna Coklat Abu-Abu pada Daun'),
('G06', 'Bercak Daun Berbentuk Bulat dan Robek'),
('G07', 'Bercak Kuning pada Daun'),
('G08', 'Buah Mengering dan Keriput'),
('G09', 'Buah Terdapat Bercak Hitam dan Membusuk'),
('G10', 'Daun Berguguran'),
('G11', 'Daun Berwarna Belang Hijau Tua dan Hijau Muda'),
('G12', 'Daun Berwarna Hijau Pekat Mengkilat'),
('G13', 'Daun Menggulung ke Atas'),
('G14', 'Daun Menguning'),
('G15', 'Kulit Batang Mudah Terkelupas'),
('G16', 'Tanaman Kerdil'),
('G17', 'Tanaman Tiba Tiba Layu'),
('G18', 'Tanaman Tidak Berbuah'),
('G19', 'Tangkai Buah Berwarna Coklat Kehitaman'),
('G20', 'Tulang Daun Memutih dan Menebal'),
('G21', 'Tulang Daun Menguning'),
('G22', 'Ukuran Daun Lebih Kecil');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `penyakit_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `CF` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` char(3) NOT NULL,
  `nama_penyakit` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `solusi`) VALUES
('P01', 'Antraknosa (Framboesia)', ''),
('P02', 'Cercospora Leaves Patches', ''),
('P03', 'Fusarium Withered', ''),
('P04', 'Gemini Virus / Yellow Virus', ''),
('P05', 'Phytophthora Foul', ''),
('P06', 'Mosaic', '');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(11) NOT NULL,
  `penyakit_id` char(3) NOT NULL,
  `gejala_id` char(3) NOT NULL,
  `CF` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `penyakit_id`, `gejala_id`, `CF`) VALUES
(1, 'P01', 'G09', 0.8),
(2, 'P01', 'G08', 0.6),
(3, 'P01', 'G07', 0.6),
(4, 'P01', 'G14', 0.4),
(5, 'P01', 'G10', 0.2),
(6, 'P02', 'G06', 0.8),
(7, 'P02', 'G07', 0.6),
(8, 'P02', 'G05', 0.4),
(9, 'P02', 'G12', 0.2),
(10, 'P02', 'G10', 0.2),
(11, 'P03', 'G17', 0.8),
(12, 'P03', 'G01', 0.6),
(13, 'P03', 'G14', 0.4),
(14, 'P03', 'G20', 0.2),
(15, 'P04', 'G04', 0.8),
(16, 'P04', 'G13', 0.6),
(17, 'P04', 'G14', 0.4),
(18, 'P04', 'G20', 0.2),
(19, 'P04', 'G16', 0.2),
(20, 'P04', 'G18', 0.2),
(21, 'P05', 'G03', 0.8),
(22, 'P05', 'G15', 0.8),
(23, 'P05', 'G01', 0.6),
(24, 'P05', 'G19', 0.4),
(25, 'P05', 'G02', 0.2),
(26, 'P06', 'G11', 0.8),
(27, 'P06', 'G22', 0.6),
(28, 'P06', 'G21', 0.4),
(29, 'P06', 'G16', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` enum('user','admin') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `level`, `password`) VALUES
(1, 'Alit Indrawan', 'alitindrawan71@gmail.com', 'admin', '$2y$10$0YpIEyHhlRch8A1jX5OfB.DXWdkIaa/ucNd1hRUOGGJaRhyrEk60G'),
(2, 'Panji Palguna', 'panji@gmail.com', 'user', '$2y$10$xsgLGoUTCeKzY5jp9hCWYuVWXb7FjAYG50TKgxN0HsJpuzV.288vG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `gejala` (`gejala_id`),
  ADD KEY `penyakit` (`penyakit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relasi`
--
ALTER TABLE `relasi`
  ADD CONSTRAINT `gejala` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penyakit` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
