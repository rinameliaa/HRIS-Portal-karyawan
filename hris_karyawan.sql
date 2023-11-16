-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2023 at 01:19 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


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
  `ket_cancel` varchar(250) NOT NULL,
  `create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengajuan_karyawan`
--

INSERT INTO `pengajuan_karyawan` (`id`, `user_id`, `karyawan_id`, `nama`, `jenis_pengajuan`, `tanggal_start`, `tanggal_end`, `jenis_izin_id`, `jenis_cuti_id`, `jenis_sakit_id`, `keterangan`, `karyawan_id_approval1`, `karyawan_id_approval2`, `approval1_date`, `approval2_date`, `status`, `ket_cancel`, `create`) VALUES
(1699491015, 1, 'JBG-2019-095', 'ANANG SISWANTO', 'Izin', '2023-11-11', '2023-11-13', 9, 0, 0, 'liburan', '630', NULL, NULL, NULL, 'Proses', '', '2023-11-09 07:50:15'),
(1699492005, 1, 'JBG-2019-095', 'ANANG SISWANTO', 'Sakit', '2023-11-18', '2023-11-19', 0, 0, 11, 'banyak minum es', '630', NULL, NULL, NULL, 'Proses', '', '2023-11-09 08:06:45'),
(1699666820, 119, 'JBG-2019-129', 'LULUK MUNZIDAH', 'Izin', '2023-11-16', '2023-11-17', 9, 0, 0, 'izin keperluan mendadak', '46', '26', NULL, NULL, 'Proses', '', '2023-11-11 08:40:20'),
(1699666848, 119, 'JBG-2019-129', 'LULUK MUNZIDAH', 'Sakit', '2023-11-12', '2023-11-12', 0, 0, 9, 'sakit', '1', '1', NULL, NULL, 'Cancel', 'sudah banyak', '2023-11-11 08:40:48');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1699666849;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
