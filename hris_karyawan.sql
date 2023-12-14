-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2023 at 01:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+7:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_karyawan`
--

CREATE TABLE `pengajuan_karyawan` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `karyawan_id` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `jenis_pengajuan` varchar(25) NOT NULL,
  `tanggal_start` date NOT NULL,
  `tanggal_end` date NOT NULL,
  `jenis_izin_id` int NOT NULL,
  `jenis_cuti_id` int NOT NULL,
  `jenis_sakit_id` int NOT NULL,
  `keterangan` text NOT NULL,
  `karyawan_id_approval1` varchar(25) DEFAULT NULL,
  `karyawan_id_approval2` varchar(25) DEFAULT NULL,
  `approval1_date` datetime DEFAULT NULL,
  `approval2_date` datetime DEFAULT NULL,
  `approval_cancel_date` datetime DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `ket_cancel` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengajuan_karyawan`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan_karyawan`
--
ALTER TABLE `pengajuan_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan_karyawan`
--
ALTER TABLE `pengajuan_karyawan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1701391995;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
