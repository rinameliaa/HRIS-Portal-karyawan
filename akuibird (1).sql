-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2023 at 01:56 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akuibird`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_karyawan`
--

CREATE TABLE `pengajuan_karyawan` (
  `id` int NOT NULL,
  `karyawan_id` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
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
  `status` varchar(25) NOT NULL,
  `create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengajuan_karyawan`
--

INSERT INTO `pengajuan_karyawan` (`id`, `karyawan_id`, `nama`, `jenis_pengajuan`, `tanggal_start`, `tanggal_end`, `jenis_izin_id`, `jenis_cuti_id`, `jenis_sakit_id`, `keterangan`, `karyawan_id_approval1`, `karyawan_id_approval2`, `approval1_date`, `approval2_date`, `status`, `create`) VALUES
(1699317698, 'JBG-2019-095', 'ANANG SISWANTO', 'Izin', '2023-11-09', '2023-11-13', 9, 0, 0, 'liburan', 'JBG-2021-824', 'JBG-2021-824', '2023-11-07 00:54:06', '2023-11-07 00:55:18', 'Disetujui', '2023-11-07 00:41:38'),
(1699319444, 'JBG-2019-095', 'ANANG SISWANTO', 'Cuti Khusus', '2023-11-08', '2023-11-10', 0, 4, 0, 'menikah', '630', NULL, NULL, NULL, 'Proses', '2023-11-07 01:10:44'),
(1699320056, 'JBG-2019-095', 'ANANG SISWANTO', 'Cuti Khusus', '2023-11-08', '2023-11-10', 0, 4, 0, 'aaaa', '630', NULL, NULL, NULL, 'Proses', '2023-11-07 01:20:56'),
(1699320214, 'JBG-2019-095', 'ANANG SISWANTO', 'Sakit', '2023-11-08', '2023-11-09', 0, 0, 11, 'tiba tiba flu', '630', NULL, NULL, NULL, 'Proses', '2023-11-07 01:23:34');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1699320215;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
