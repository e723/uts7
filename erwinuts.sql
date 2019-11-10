-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 03:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erwinuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `nip_dosen` varchar(30) DEFAULT NULL,
  `jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `nama_dosen`, `nip_dosen`, `jurusan`) VALUES
(1, 'Harminto Mulyo, S.Kom. M.Kom.', '3 820204 13 096', 1),
(2, 'Akhmad Khanif Zyen, S.Kom., M.Kom', '3 860421 13 092', 1),
(3, 'TEGUH TAMRIN, S.Kom., M.Kom.', '4 761220 17 235', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fak` int(11) NOT NULL,
  `nama_fakultas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`id_fak`, `nama_fakultas`) VALUES
(1, 'Sains dan Teknologi'),
(2, 'Ekonomi dan Bisnis'),
(3, 'Dakwah dan Komunikasi'),
(4, 'Syari''ah dan Hukum'),
(5, 'Tarbiyah dan Ilmu Keguruan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jur` int(11) NOT NULL,
  `nama_jur` varchar(50) DEFAULT NULL,
  `kode_jur` varchar(10) DEFAULT NULL,
  `tingkatan` varchar(10) DEFAULT NULL,
  `fakultas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jur`, `nama_jur`, `kode_jur`, `tingkatan`, `fakultas`) VALUES
(1, 'Teknik Informatika', '01', 'S1', 1),
(2, 'Sistem Informasi', '02', 'S1', 1),
(3, 'Teknik Industri', '03', 'S1', 1),
(6, 'Teknik Sipil', '04', 'S1', 1),
(7, 'Teknik Perairan dan Perikanan', '05', 'S1', 1),
(8, 'Desain Komunikasi Visual', '06', 'S1', 1),
(14, 'Desain Produk', '07', 'S1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(30) DEFAULT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `dosen_wali` int(11) DEFAULT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `fakultas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `kode_kelas`, `dosen_wali`, `jurusan`, `fakultas`) VALUES
(1, 'SI R2', 'SI-R2', 1, 1, 1),
(2, 'SI-R1', 'SI-R1', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(50) DEFAULT NULL,
  `nim_mhs` varchar(12) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_asal` varchar(100) DEFAULT NULL,
  `alamat_sekarang` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `kelas_mhs` int(11) DEFAULT NULL,
  `dosen_wali` int(11) DEFAULT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `fakultas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`id_mhs`, `nama_mhs`, `nim_mhs`, `tempat_lahir`, `tanggal_lahir`, `alamat_asal`, `alamat_sekarang`, `telp`, `email`, `kelas_mhs`, `dosen_wali`, `jurusan`, `fakultas`) VALUES
(3, 'Erwin Apriliawan', '161240000556', 'Jepara', '1997-04-17', 'Bugo Rt 01/02 Welahan Jepara, Welahan Jepara', 'Bugo Rt 01/02 Welahan Jepara, Welahan Jepara', '089606466944', 'erwinapriliawan@gmail.com', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` tinyint(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `FK_jurusan` (`jurusan`);

--
-- Indexes for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fak`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jur`),
  ADD KEY `FK_fakultas` (`fakultas`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `FK_dosen` (`dosen_wali`);

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `FK_tbl_mhs_fak` (`fakultas`),
  ADD KEY `FK_tbl_mhs_jur` (`jurusan`),
  ADD KEY `FK_tbl_mhs_dosen` (`dosen_wali`),
  ADD KEY `FK_tbl_mhs_kelas` (`kelas_mhs`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  MODIFY `id_fak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD CONSTRAINT `FK_jurusan` FOREIGN KEY (`jurusan`) REFERENCES `tbl_jurusan` (`id_jur`);

--
-- Constraints for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD CONSTRAINT `FK_fakultas` FOREIGN KEY (`fakultas`) REFERENCES `tbl_fakultas` (`id_fak`);

--
-- Constraints for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD CONSTRAINT `FK_dosen` FOREIGN KEY (`dosen_wali`) REFERENCES `tbl_dosen` (`id_dosen`);

--
-- Constraints for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD CONSTRAINT `FK_tbl_mhs_dosen` FOREIGN KEY (`dosen_wali`) REFERENCES `tbl_dosen` (`id_dosen`),
  ADD CONSTRAINT `FK_tbl_mhs_fak` FOREIGN KEY (`fakultas`) REFERENCES `tbl_fakultas` (`id_fak`),
  ADD CONSTRAINT `FK_tbl_mhs_jur` FOREIGN KEY (`jurusan`) REFERENCES `tbl_jurusan` (`id_jur`),
  ADD CONSTRAINT `FK_tbl_mhs_kelas` FOREIGN KEY (`kelas_mhs`) REFERENCES `tbl_kelas` (`id_kelas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
