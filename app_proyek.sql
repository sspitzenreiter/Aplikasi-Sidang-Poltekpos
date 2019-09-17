-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 11:50 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(24) NOT NULL,
  `judul_bimbingan` varchar(50) NOT NULL,
  `tanggal_bimbingan` date NOT NULL,
  `keterangan` varchar(300) DEFAULT NULL,
  `status_bimbingan` int(1) NOT NULL,
  `id_proyek` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` char(16) NOT NULL,
  `nama` varchar(75) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(35) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `judul_jurnal` varchar(150) DEFAULT NULL,
  `link_jurnal` varchar(150) DEFAULT NULL,
  `research_interest` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`, `tgl_lahir`, `tempat_lahir`, `alamat`, `judul_jurnal`, `link_jurnal`, `research_interest`) VALUES
('3217061702990004', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(8) NOT NULL,
  `id_prodi` char(1) NOT NULL,
  `jenis_kegiatan` int(2) DEFAULT NULL,
  `id_koordinator` char(16) NOT NULL,
  `status` int(1) NOT NULL,
  `angkatan` varchar(9) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` char(7) NOT NULL,
  `nama` varchar(75) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `angkatan` varchar(9) DEFAULT NULL,
  `tempat_lahir` varchar(35) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `alamat`, `angkatan`, `tempat_lahir`, `tgl_lahir`) VALUES
('1174035', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(16) NOT NULL,
  `id_kegiatan` int(8) NOT NULL,
  `id_dosen_pembimbing` char(16) DEFAULT NULL,
  `id_dosen_penguji` char(16) DEFAULT NULL,
  `tgl_sidang` datetime NOT NULL,
  `tgl_sidang_ulang` datetime NOT NULL,
  `nilai_pembimbing` decimal(5,0) NOT NULL,
  `nilai_penguji` decimal(5,0) NOT NULL,
  `ruangan` varchar(4) NOT NULL,
  `npm` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(16) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `jabatan` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `key_proyek` (`id_proyek`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `key_dosen_penguji` (`id_dosen_penguji`),
  ADD KEY `key_dosen_pembimbing` (`id_dosen_pembimbing`),
  ADD KEY `key_kegiatan` (`id_kegiatan`),
  ADD KEY `key_mhs` (`npm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(24) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(16) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `key_proyek` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `key_dosen_pembimbing` FOREIGN KEY (`id_dosen_pembimbing`) REFERENCES `dosen` (`nik`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `key_dosen_penguji` FOREIGN KEY (`id_dosen_penguji`) REFERENCES `dosen` (`nik`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `key_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `key_mhs` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
