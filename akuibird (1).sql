-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2023 at 06:28 AM
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

INSERT INTO `pengajuan_karyawan` (`id`, `karyawan_id`, `nama`, `jenis_pengajuan`, `tanggal_start`, `tanggal_end`, `keterangan`, `karyawan_id_approval1`, `karyawan_id_approval2`, `approval1_date`, `approval2_date`, `status`, `create`) VALUES
(2, 'dsjkf55', 'kjdkf', 'izin', '2023-11-01', '2023-11-10', 'gfretfdg', '4352', '222', NULL, NULL, 'Proses', '2023-11-02 04:17:57'),
(1698895348, 'JBG-2019-095', 'ANANG SISWANTO', 'Izin', '2023-11-02', '2023-11-08', 'liburan', '630', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ' Proses', '2023-11-02 03:22:28');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1698895349;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
