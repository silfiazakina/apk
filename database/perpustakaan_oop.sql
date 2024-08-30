-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2024 at 05:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_silfi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `tanggal_lahir` DATE NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `nisn`, `Alamat`, `tanggal_lahir`) VALUES
(36, 'gacoan', '100000', 'alamat contoh', '2007-11-11'),
(37, 'ga', '15000', 'alamat ga', '2008-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nama`, `nisn`, `alamat`) VALUES
(1, 'makanan berat', 'nisn1', 'alamat1'),
(2, 'snack', 'nisn2', 'alamat2'),
(3, 'elektronik', 'nisn3', 'alamat3');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(15) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` int(15) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `kota_penerbit` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama`, `kota_penerbit`, `no_tlp`) VALUES
(1, 'daper', 'jl pramuka', '047483647');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pengarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama`, `no_tlp`) VALUES
(1, 'pt. superindo', '089765324'),
(2, 'pt.indonesia', '0984326789');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `tanggal_pengembalian` DATE NOT NULL,
  PRIMARY KEY (`id_pengembalian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `nama`, `nisn`, `tanggal_pengembalian`) VALUES
(1, 'John Doe', '123456789', '2024-07-09');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
-- Already defined in CREATE TABLE

--
-- Indexes for table `pegawai`
--
-- Already defined in CREATE TABLE

--
-- Indexes for table `peminjaman`
--
-- Already defined in CREATE TABLE

--
-- Indexes for table `buku`
--
-- Already defined in CREATE TABLE

--
-- Indexes for table `penerbit`
--
-- Already defined in CREATE TABLE

--
-- Indexes for table `pengarang`
--
-- Already defined in CREATE TABLE

--
-- Indexes for table `pengembalian`
--
-- Already defined in CREATE TABLE

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
