-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2019 at 02:40 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nik` char(16) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `prodi` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nik`, `nama`, `jenis_kelamin`, `no_telp`, `prodi`) VALUES
('3217061702990009', 'Luthfi Admin', 'L', '087738406127', '14');

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `user_add_admin` AFTER INSERT ON `admin` FOR EACH ROW BEGIN
INSERT INTO USER VALUES(new.nik, new.nik, 'A');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `user_delete_admin` AFTER DELETE ON `admin` FOR EACH ROW BEGIN
DELETE FROM USER WHERE id_user = old.nik;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(24) NOT NULL,
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
  `research_interest` varchar(500) DEFAULT NULL,
  `prodi` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`, `tgl_lahir`, `tempat_lahir`, `alamat`, `judul_jurnal`, `link_jurnal`, `research_interest`, `prodi`) VALUES
('3217061702990001', 'Luthfi 4', '2019-09-24', 'Bandung', 'b', 'Coba', 'google.com', 'Riset Doang', '13'),
('3217061702990004', 'Luthfi', '2019-09-21', 'Bandung', 'bb', 'qwfwq', 'aa.com', 'Cpbaom', '14'),
('3217061702990005', 'Luthfi 2', '2019-09-05', 'Bandung', 'cc', 'Cobain Aja Googl', 'google.com', 'Coba', '14'),
('3217061702990006', 'Luthfi 3', '2019-09-04', 'Bandung', 'AJbfuiqwfwq', 'qfqwwqf', 'abc.com', 'CCC', '14'),
('3217061702990007', 'Luthfi 5', '2019-09-04', 'Bandung', 'AJbfuiqwfwq', 'qfqwwqf', 'abc.com', 'CCC', '14');

--
-- Triggers `dosen`
--
DELIMITER $$
CREATE TRIGGER `user_add_dosen` AFTER INSERT ON `dosen` FOR EACH ROW BEGIN
INSERT INTO USER VALUES(new.nik, new.nik, 'D');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `user_delete_dosen` AFTER DELETE ON `dosen` FOR EACH ROW BEGIN
DELETE FROM USER WHERE id_user = old.nik;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(8) NOT NULL,
  `prodi` char(2) NOT NULL,
  `nama_kegiatan` varchar(40) NOT NULL,
  `jenis_kegiatan` int(2) DEFAULT NULL,
  `id_koordinator` char(16) NOT NULL,
  `status_mulai` int(1) NOT NULL,
  `angkatan` varchar(9) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `semester` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `prodi`, `nama_kegiatan`, `jenis_kegiatan`, `id_koordinator`, `status_mulai`, `angkatan`, `tgl_mulai`, `tgl_selesai`, `semester`) VALUES
(1, '14', 'C', NULL, '3217061702990004', 0, '2017/2018', '2019-09-04', '2019-09-19', '1'),
(2, '14', 'D', NULL, '3217061702990005', 0, '2017/2018', '2019-09-17', '2019-09-24', '1'),
(3, '14', 'E', NULL, '3217061702990006', 0, '2017/2018', '2019-09-26', '2019-09-28', '1'),
(11, '13', 'Proyek 2', NULL, '', 0, '2018/2019', '2019-09-13', '2019-10-04', '1'),
(12, '13', '', NULL, '', 0, '', '0000-00-00', '0000-00-00', '1'),
(13, '13', '', NULL, '', 0, '', '0000-00-00', '0000-00-00', '1');

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
  `tgl_lahir` date DEFAULT NULL,
  `prodi` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `alamat`, `angkatan`, `tempat_lahir`, `tgl_lahir`, `prodi`) VALUES
('1010101', 'Coba Doang Dulu Aja', '', '2017/2018', '', '0000-00-00', 14),
('1152999', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1162000', 'k', NULL, '2017/2018', NULL, NULL, 14),
('1165000', 'Coba', NULL, '2017/2018', NULL, NULL, 14),
('1174001', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1174002', 'Hagan Rowlenstino Alexander S. S.', NULL, '2017/2018', NULL, NULL, 14),
('1174003', 'Kevin Natanael N.', NULL, '2017/2018', NULL, NULL, 14),
('1174004', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1174005', 'Hagan Rowlenstino Alexander S. S.', NULL, '2017/2018', NULL, NULL, 14),
('1174006', 'Kevin Natanael N.', NULL, '2017/2018', NULL, NULL, 14),
('1174007', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1174008', 'Hagan Rowlenstino Alexander S. S.', NULL, '2017/2018', NULL, NULL, 14),
('1174009', 'Kevin Natanael N.', NULL, '2017/2018', NULL, NULL, 14),
('1174010', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1174011', 'Hagan Rowlenstino Alexander S. S.', NULL, '2017/2018', NULL, NULL, 14),
('1174012', 'Kevin Natanael N.', NULL, '2017/2018', NULL, NULL, 14),
('1174013', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1174014', 'Hagan Rowlenstino Alexander S. S.', NULL, '2017/2018', NULL, NULL, 14),
('1174015', 'Kevin Natanael N.', NULL, '2017/2018', NULL, NULL, 14),
('1174016', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1174017', 'Hagan Rowlenstino Alexander S. S.', NULL, '2017/2018', NULL, NULL, 14),
('1174018', 'Kevin Natanael N.', NULL, '2017/2018', NULL, NULL, 14),
('1174019', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1174020', 'Hagan Rowlenstino Alexander S. S.', NULL, '2017/2018', NULL, NULL, 14),
('1174021', 'Kevin Natanael N.', NULL, '2017/2018', NULL, NULL, 14),
('1174022', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1174023', 'Hagan Rowlenstino Alexander S. S.', NULL, '2017/2018', NULL, NULL, 14),
('1174024', 'Kevin Natanael N.', NULL, '2017/2018', NULL, NULL, 14),
('1174025', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1174026', 'Hagan Rowlenstino Alexander S. S.', NULL, '2017/2018', NULL, NULL, 14),
('1174027', 'Kevin Natanael N.', NULL, '2017/2018', NULL, NULL, 14),
('1174028', 'Luthfi Muhammad Nabil', NULL, '2017/2018', NULL, NULL, 14),
('1174029', 'Hagan Rowlenstino Alexander S. S.', NULL, '2017/2018', NULL, NULL, 14),
('1174030', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174031', 'Luthfi Muhammad Nabil', NULL, '2018/2019', NULL, NULL, 14),
('1174032', 'Hagan Rowlenstino Alexander S. S.', NULL, '2018/2019', NULL, NULL, 14),
('1174033', 'Kevin Natanael N.', NULL, '2018/2019', NULL, NULL, 14),
('1174034', 'Luthfi Muhammad Nabil', NULL, '2018/2019', NULL, NULL, 14),
('1174035', 'Hagan Rowlenstino Alexander S. S.', 'a', '2018/2019', '', '0000-00-00', 14),
('1174036', 'Kevin Natanael N.', NULL, '2018/2019', NULL, NULL, 14),
('1174037', 'Luthfi Muhammad Nabil', NULL, '2018/2019', NULL, NULL, 14),
('1174038', 'Hagan Rowlenstino Alexander S. S.', NULL, '2018/2019', NULL, NULL, 14),
('1174039', 'Kevin Natanael N.', NULL, '2018/2019', NULL, NULL, 14),
('1174040', 'Luthfi Muhammad Nabil', 'wfqqwfqw', '2018/2019', '', '0000-00-00', 14),
('1174041', 'Hagan Rowlenstino Alexander S. S.', NULL, '2018/2019', NULL, NULL, 14),
('1174042', 'Kevin Natanael N.', NULL, '2018/2019', NULL, NULL, 14),
('1174043', 'Luthfi Muhammad Nabil', NULL, '2018/2019', NULL, NULL, 14),
('1174044', 'Hagan Rowlenstino Alexander S. S.', NULL, '2018/2019', NULL, NULL, 14),
('1174045', 'Kevin Natanael N.', NULL, '2018/2019', NULL, NULL, 14),
('1174046', 'Luthfi Muhammad Nabil', NULL, '2018/2019', NULL, NULL, 14),
('1174047', 'Hagan Rowlenstino Alexander S. S.', NULL, '2018/2019', NULL, NULL, 14),
('1174048', 'Kevin Natanael N.', NULL, '2018/2019', NULL, NULL, 14),
('1174049', 'Luthfi Muhammad Nabil', NULL, '2018/2019', NULL, NULL, 14),
('1174050', 'Hagan Rowlenstino Alexander S. S.', NULL, '2018/2019', NULL, NULL, 14),
('1174051', 'Kevin Natanael N.', NULL, '2018/2019', NULL, NULL, 14),
('1174052', 'Luthfi Muhammad Nabil', NULL, '2018/2019', NULL, NULL, 14),
('1174053', 'Hagan Rowlenstino Alexander S. S.', NULL, '2018/2019', NULL, NULL, 14),
('1174054', 'Kevin Natanael N.', NULL, '2018/2019', NULL, NULL, 14),
('1174055', 'Luthfi Muhammad Nabil', NULL, '2018/2019', NULL, NULL, 14),
('1174056', 'Hagan Rowlenstino Alexander S. S.', NULL, '2018/2019', NULL, NULL, 14),
('1174057', 'Kevin Natanael N.', NULL, '2018/2019', NULL, NULL, 14),
('1174058', 'Luthfi Muhammad Nabil', NULL, '2018/2019', NULL, NULL, 14),
('1174059', 'Hagan Rowlenstino Alexander S. S.', NULL, '2018/2019', NULL, NULL, 14),
('1174060', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174061', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174062', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174063', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174064', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174065', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174066', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174067', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174068', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174069', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174070', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174071', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174072', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174073', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174074', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174075', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174076', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174077', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174078', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174079', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174080', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174081', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174082', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174083', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174084', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174085', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174086', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174087', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174088', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174089', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174090', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174091', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174092', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174093', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174094', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174095', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174096', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174097', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174098', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174099', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174100', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174101', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174102', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174103', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174104', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174105', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174106', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174107', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174108', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174109', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174110', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174111', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174112', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174113', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174114', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174115', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174116', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174117', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174118', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174119', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174120', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174121', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174122', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174123', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174124', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174125', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174126', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174127', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174128', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174129', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174130', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174131', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174132', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174133', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174134', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174135', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174136', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174137', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174138', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174139', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174140', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174141', 'Kevin Natanael N.', NULL, '2019/2020', NULL, NULL, 14),
('1174142', 'Luthfi Muhammad Nabil', NULL, '2019/2020', NULL, NULL, 14),
('1174143', 'Hagan Rowlenstino Alexander S. S.', NULL, '2019/2020', NULL, NULL, 14),
('1174144', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174145', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174146', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174147', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174148', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174149', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174150', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174151', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174152', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174153', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174154', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174155', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174156', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174157', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174158', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174159', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174160', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174161', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174162', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174163', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174164', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174165', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174166', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174167', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174168', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174169', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174170', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174171', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174172', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174173', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174174', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174175', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174176', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174177', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174178', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174179', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174180', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174181', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174182', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174183', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174184', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174185', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174186', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174187', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174188', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174189', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174190', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174191', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174192', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174193', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174194', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174195', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174196', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174197', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174198', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174199', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174200', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174201', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174202', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174203', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174204', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174205', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174206', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174207', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174208', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174209', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174210', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174211', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174212', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174213', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174214', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174215', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174216', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174217', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174218', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174219', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174220', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174221', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174222', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174223', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174224', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174225', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174226', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174227', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174228', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174229', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174230', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174231', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174232', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174233', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174234', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174235', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174236', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174237', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174238', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174239', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174240', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174241', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174242', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174243', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174244', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174245', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174246', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174247', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174248', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174249', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174250', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174251', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174252', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174253', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174254', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174255', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174256', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174257', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174258', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174259', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174260', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174261', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174262', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174263', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174264', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174265', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174266', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1174267', 'b', NULL, '2019/2020', NULL, NULL, 14),
('1174268', 'Coba', NULL, '2019/2020', NULL, NULL, 14),
('1174269', 'a', NULL, '2019/2020', NULL, NULL, 14),
('1175550', 'qofnqwofqwo', NULL, '2019/2020', NULL, NULL, 14),
('1175551', 'qofnqwofqwo', NULL, '2019/2020', NULL, NULL, 14),
('1412221', 'qfqwfwqfwq', NULL, NULL, NULL, NULL, 14);

--
-- Triggers `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `user_add_mahasiswa` AFTER INSERT ON `mahasiswa` FOR EACH ROW begin
insert into user values(new.npm, new.npm, 'M');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `user_delete_mahasiswa` AFTER DELETE ON `mahasiswa` FOR EACH ROW begin
delete from user where id_user = old.npm;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` char(2) NOT NULL,
  `nama_prodi` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
('13', 'D-III Teknik Informatika'),
('14', 'D-IV Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(16) NOT NULL,
  `judul_proyek` text,
  `abstrak` text,
  `latar_belakang` text,
  `identifikasi_masalah` text,
  `daftar_pustaka` text,
  `id_kegiatan` int(8) NOT NULL,
  `id_dosen_pembimbing` char(16) DEFAULT NULL,
  `id_dosen_penguji` char(16) DEFAULT NULL,
  `tgl_sidang` datetime DEFAULT NULL,
  `tgl_sidang_ulang` datetime DEFAULT NULL,
  `nilai_pembimbing` decimal(5,0) DEFAULT NULL,
  `nilai_penguji` decimal(5,0) DEFAULT NULL,
  `ruangan` varchar(4) DEFAULT NULL,
  `npm` char(7) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `judul_proyek`, `abstrak`, `latar_belakang`, `identifikasi_masalah`, `daftar_pustaka`, `id_kegiatan`, `id_dosen_pembimbing`, `id_dosen_penguji`, `tgl_sidang`, `tgl_sidang_ulang`, `nilai_pembimbing`, `nilai_penguji`, `ruangan`, `npm`, `status`) VALUES
(35, 'qwfwqfqw', 'asfasfaf', 'qwfqwfq', 'qwfqwfw', 'qwfqfwqfwq', 2, '3217061702990007', NULL, NULL, NULL, NULL, NULL, NULL, '1174038', 1);

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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `pass`, `jabatan`) VALUES
('1010101', '1010101', 'M'),
('1152999', '1152999', 'M'),
('1162000', '1162000', 'M'),
('1165000', '1165000', 'M'),
('1174001', '1174001', 'M'),
('1174002', '1174002', 'M'),
('1174003', '1174003', 'M'),
('1174004', '1174004', 'M'),
('1174005', '1174005', 'M'),
('1174006', '1174006', 'M'),
('1174007', '1174007', 'M'),
('1174008', '1174008', 'M'),
('1174009', '1174009', 'M'),
('1174010', '1174010', 'M'),
('1174011', '1174011', 'M'),
('1174012', '1174012', 'M'),
('1174013', '1174013', 'M'),
('1174014', '1174014', 'M'),
('1174015', '1174015', 'M'),
('1174016', '1174016', 'M'),
('1174017', '1174017', 'M'),
('1174018', '1174018', 'M'),
('1174019', '1174019', 'M'),
('1174020', '1174020', 'M'),
('1174021', '1174021', 'M'),
('1174022', '1174022', 'M'),
('1174023', '1174023', 'M'),
('1174024', '1174024', 'M'),
('1174025', '1174025', 'M'),
('1174026', '1174026', 'M'),
('1174027', '1174027', 'M'),
('1174028', '1174028', 'M'),
('1174029', '1174029', 'M'),
('1174030', '1174030', 'M'),
('1174031', '1174031', 'M'),
('1174032', '1174032', 'M'),
('1174033', '1174033', 'M'),
('1174034', '1174034', 'M'),
('1174035', '1174035', 'M'),
('1174036', '1174036', 'M'),
('1174037', '1174037', 'M'),
('1174038', '1174038', 'M'),
('1174039', '1174039', 'M'),
('1174040', '1174040', 'M'),
('1174041', '1174041', 'M'),
('1174042', '1174042', 'M'),
('1174043', '1174043', 'M'),
('1174044', '1174044', 'M'),
('1174045', '1174045', 'M'),
('1174046', '1174046', 'M'),
('1174047', '1174047', 'M'),
('1174048', '1174048', 'M'),
('1174049', '1174049', 'M'),
('1174050', '1174050', 'M'),
('1174051', '1174051', 'M'),
('1174052', '1174052', 'M'),
('1174053', '1174053', 'M'),
('1174054', '1174054', 'M'),
('1174055', '1174055', 'M'),
('1174056', '1174056', 'M'),
('1174057', '1174057', 'M'),
('1174058', '1174058', 'M'),
('1174059', '1174059', 'M'),
('1174060', '1174060', 'M'),
('1174061', '1174061', 'M'),
('1174062', '1174062', 'M'),
('1174063', '1174063', 'M'),
('1174064', '1174064', 'M'),
('1174065', '1174065', 'M'),
('1174066', '1174066', 'M'),
('1174067', '1174067', 'M'),
('1174068', '1174068', 'M'),
('1174069', '1174069', 'M'),
('1174070', '1174070', 'M'),
('1174071', '1174071', 'M'),
('1174072', '1174072', 'M'),
('1174073', '1174073', 'M'),
('1174074', '1174074', 'M'),
('1174075', '1174075', 'M'),
('1174076', '1174076', 'M'),
('1174077', '1174077', 'M'),
('1174078', '1174078', 'M'),
('1174079', '1174079', 'M'),
('1174080', '1174080', 'M'),
('1174081', '1174081', 'M'),
('1174082', '1174082', 'M'),
('1174083', '1174083', 'M'),
('1174084', '1174084', 'M'),
('1174085', '1174085', 'M'),
('1174086', '1174086', 'M'),
('1174087', '1174087', 'M'),
('1174088', '1174088', 'M'),
('1174089', '1174089', 'M'),
('1174090', '1174090', 'M'),
('1174091', '1174091', 'M'),
('1174092', '1174092', 'M'),
('1174093', '1174093', 'M'),
('1174094', '1174094', 'M'),
('1174095', '1174095', 'M'),
('1174096', '1174096', 'M'),
('1174097', '1174097', 'M'),
('1174098', '1174098', 'M'),
('1174099', '1174099', 'M'),
('1174100', '1174100', 'M'),
('1174101', '1174101', 'M'),
('1174102', '1174102', 'M'),
('1174103', '1174103', 'M'),
('1174104', '1174104', 'M'),
('1174105', '1174105', 'M'),
('1174106', '1174106', 'M'),
('1174107', '1174107', 'M'),
('1174108', '1174108', 'M'),
('1174109', '1174109', 'M'),
('1174110', '1174110', 'M'),
('1174111', '1174111', 'M'),
('1174112', '1174112', 'M'),
('1174113', '1174113', 'M'),
('1174114', '1174114', 'M'),
('1174115', '1174115', 'M'),
('1174116', '1174116', 'M'),
('1174117', '1174117', 'M'),
('1174118', '1174118', 'M'),
('1174119', '1174119', 'M'),
('1174120', '1174120', 'M'),
('1174121', '1174121', 'M'),
('1174122', '1174122', 'M'),
('1174123', '1174123', 'M'),
('1174124', '1174124', 'M'),
('1174125', '1174125', 'M'),
('1174126', '1174126', 'M'),
('1174127', '1174127', 'M'),
('1174128', '1174128', 'M'),
('1174129', '1174129', 'M'),
('1174130', '1174130', 'M'),
('1174131', '1174131', 'M'),
('1174132', '1174132', 'M'),
('1174133', '1174133', 'M'),
('1174134', '1174134', 'M'),
('1174135', '1174135', 'M'),
('1174136', '1174136', 'M'),
('1174137', '1174137', 'M'),
('1174138', '1174138', 'M'),
('1174139', '1174139', 'M'),
('1174140', '1174140', 'M'),
('1174141', '1174141', 'M'),
('1174142', '1174142', 'M'),
('1174143', '1174143', 'M'),
('1174144', '1174144', 'M'),
('1174145', '1174145', 'M'),
('1174146', '1174146', 'M'),
('1174147', '1174147', 'M'),
('1174148', '1174148', 'M'),
('1174149', '1174149', 'M'),
('1174150', '1174150', 'M'),
('1174151', '1174151', 'M'),
('1174152', '1174152', 'M'),
('1174153', '1174153', 'M'),
('1174154', '1174154', 'M'),
('1174155', '1174155', 'M'),
('1174156', '1174156', 'M'),
('1174157', '1174157', 'M'),
('1174158', '1174158', 'M'),
('1174159', '1174159', 'M'),
('1174160', '1174160', 'M'),
('1174161', '1174161', 'M'),
('1174162', '1174162', 'M'),
('1174163', '1174163', 'M'),
('1174164', '1174164', 'M'),
('1174165', '1174165', 'M'),
('1174166', '1174166', 'M'),
('1174167', '1174167', 'M'),
('1174168', '1174168', 'M'),
('1174169', '1174169', 'M'),
('1174170', '1174170', 'M'),
('1174171', '1174171', 'M'),
('1174172', '1174172', 'M'),
('1174173', '1174173', 'M'),
('1174174', '1174174', 'M'),
('1174175', '1174175', 'M'),
('1174176', '1174176', 'M'),
('1174177', '1174177', 'M'),
('1174178', '1174178', 'M'),
('1174179', '1174179', 'M'),
('1174180', '1174180', 'M'),
('1174181', '1174181', 'M'),
('1174182', '1174182', 'M'),
('1174183', '1174183', 'M'),
('1174184', '1174184', 'M'),
('1174185', '1174185', 'M'),
('1174186', '1174186', 'M'),
('1174187', '1174187', 'M'),
('1174188', '1174188', 'M'),
('1174189', '1174189', 'M'),
('1174190', '1174190', 'M'),
('1174191', '1174191', 'M'),
('1174192', '1174192', 'M'),
('1174193', '1174193', 'M'),
('1174194', '1174194', 'M'),
('1174195', '1174195', 'M'),
('1174196', '1174196', 'M'),
('1174197', '1174197', 'M'),
('1174198', '1174198', 'M'),
('1174199', '1174199', 'M'),
('1174200', '1174200', 'M'),
('1174201', '1174201', 'M'),
('1174202', '1174202', 'M'),
('1174203', '1174203', 'M'),
('1174204', '1174204', 'M'),
('1174205', '1174205', 'M'),
('1174206', '1174206', 'M'),
('1174207', '1174207', 'M'),
('1174208', '1174208', 'M'),
('1174209', '1174209', 'M'),
('1174210', '1174210', 'M'),
('1174211', '1174211', 'M'),
('1174212', '1174212', 'M'),
('1174213', '1174213', 'M'),
('1174214', '1174214', 'M'),
('1174215', '1174215', 'M'),
('1174216', '1174216', 'M'),
('1174217', '1174217', 'M'),
('1174218', '1174218', 'M'),
('1174219', '1174219', 'M'),
('1174220', '1174220', 'M'),
('1174221', '1174221', 'M'),
('1174222', '1174222', 'M'),
('1174223', '1174223', 'M'),
('1174224', '1174224', 'M'),
('1174225', '1174225', 'M'),
('1174226', '1174226', 'M'),
('1174227', '1174227', 'M'),
('1174228', '1174228', 'M'),
('1174229', '1174229', 'M'),
('1174230', '1174230', 'M'),
('1174231', '1174231', 'M'),
('1174232', '1174232', 'M'),
('1174233', '1174233', 'M'),
('1174234', '1174234', 'M'),
('1174235', '1174235', 'M'),
('1174236', '1174236', 'M'),
('1174237', '1174237', 'M'),
('1174238', '1174238', 'M'),
('1174239', '1174239', 'M'),
('1174240', '1174240', 'M'),
('1174241', '1174241', 'M'),
('1174242', '1174242', 'M'),
('1174243', '1174243', 'M'),
('1174244', '1174244', 'M'),
('1174245', '1174245', 'M'),
('1174246', '1174246', 'M'),
('1174247', '1174247', 'M'),
('1174248', '1174248', 'M'),
('1174249', '1174249', 'M'),
('1174250', '1174250', 'M'),
('1174251', '1174251', 'M'),
('1174252', '1174252', 'M'),
('1174253', '1174253', 'M'),
('1174254', '1174254', 'M'),
('1174255', '1174255', 'M'),
('1174256', '1174256', 'M'),
('1174257', '1174257', 'M'),
('1174258', '1174258', 'M'),
('1174259', '1174259', 'M'),
('1174260', '1174260', 'M'),
('1174261', '1174261', 'M'),
('1174262', '1174262', 'M'),
('1174263', '1174263', 'M'),
('1174264', '1174264', 'M'),
('1174265', '1174265', 'M'),
('1174266', '1174266', 'M'),
('1174267', '1174267', 'M'),
('1174268', '1174268', 'M'),
('1174269', '1174269', 'M'),
('1175550', '1175550', 'M'),
('1175551', '1175551', 'M'),
('1412221', '1412221', 'M'),
('3217061702990001', '3217061702990001', 'D'),
('3217061702990004', '3217061702990004', 'D'),
('3217061702990005', '3217061702990005', 'D'),
('3217061702990006', '3217061702990006', 'D'),
('3217061702990007', '3217061702990007', 'D'),
('3217061702990009', '3217061702990009', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nik`);

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
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

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
  MODIFY `id_kegiatan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
