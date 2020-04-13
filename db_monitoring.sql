-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2018 at 02:13 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `inspeksi`
--

CREATE TABLE `inspeksi` (
  `Id` int(5) NOT NULL,
  `id_mesin` int(5) NOT NULL,
  `id_user` int(5) UNSIGNED NOT NULL,
  `Tgl_inspeksi` date NOT NULL,
  `Drive_end_OV_H` double NOT NULL,
  `Drive_end_OV_V` double NOT NULL,
  `Drive_end_BV_H` double NOT NULL,
  `Drive_end_BV_V` double NOT NULL,
  `Temperatur_Drive` int(5) NOT NULL,
  `Non_Drive_end_OV_H` double NOT NULL,
  `Non_Drive_end_OV_V` double NOT NULL,
  `Non_Drive_end_BV_H` double NOT NULL,
  `Non_Drive_end_BV_V` double NOT NULL,
  `Temperatur_Non_Drive` int(5) NOT NULL,
  `oil_seil` text NOT NULL,
  `oil_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspeksi`
--

INSERT INTO `inspeksi` (`Id`, `id_mesin`, `id_user`, `Tgl_inspeksi`, `Drive_end_OV_H`, `Drive_end_OV_V`, `Drive_end_BV_H`, `Drive_end_BV_V`, `Temperatur_Drive`, `Non_Drive_end_OV_H`, `Non_Drive_end_OV_V`, `Non_Drive_end_BV_H`, `Non_Drive_end_BV_V`, `Temperatur_Non_Drive`, `oil_seil`, `oil_status`) VALUES
(1, 1, 2, '2018-08-10', 8.7, 5.7, 2.09, 1.89, 46, 9.2, 5.3, 1.54, 1.14, 45, 'images/pikvz6su0p8tx7b03jmj.png', 'baik'),
(2, 3, 2, '2018-08-22', 2, 1.1, 1.52, 1.7, 48, 1.2, 0, 2.5, 2.7, 49, 'images/jshmpkwnjh60acty2czz.png', 'baik'),
(3, 2, 2, '2018-08-29', 7.4, 4.7, 9.04, 6.48, 40, 5.4, 3.6, 6.48, 4.84, 41, 'images/jshmpkwnjh60acty2czz.png', ''),
(4, 1, 2, '2018-08-29', 8.98, 7.2, 2.76, 2.12, 48, 8.1, 4.3, 2.22, 1.89, 42, 'images/pikvz6su0p8tx7b03jmj.png', ''),
(5, 1, 2, '2018-09-14', 9.12, 6.98, 3.25, 2.35, 46, 8.35, 4.48, 2.35, 2.12, 56, 'images/34em1bajxuzy9yfktd4k.png', ''),
(6, 6, 3, '2018-10-04', 2.4, 5.1, 2.77, 2.99, 55, 2.7, 3.2, 10.6, 12.85, 63, 'images/zpc61bpcna024rgqzgqm.png', 'oke');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(5) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `color` varchar(7) CHARACTER SET utf8 NOT NULL DEFAULT '#000000',
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `title`, `description`, `color`, `start`, `end`) VALUES
(5, 'Area Boiler', 'Ahmad', '#FFD700', '2018-08-23', '2018-08-24'),
(7, 'Area Produksi B', 'Ahmad', '#40E0D0', '2018-08-25', '2018-08-25'),
(8, 'Area Produksi', 'Sutrisno', '#008000', '2018-08-25', '2018-08-25'),
(9, 'Area Boiler', '', '#008000', '2018-08-29', '2018-08-30'),
(10, 'AC', 'Ahmad', '#008000', '2018-09-16', '2018-09-16'),
(11, 'Prtoduksi', 'Ahmad', '#FFD700', '2018-09-17', '2018-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `ID` int(5) NOT NULL,
  `No_Mesin` varchar(10) NOT NULL,
  `Nama_Mesin` varchar(50) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `Gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`ID`, `No_Mesin`, `Nama_Mesin`, `Area`, `Gambar`) VALUES
(1, 'PU-110211A', 'Carbonated Liquor Pump', 'Liquor Purification Station', '20181017042925.png'),
(2, 'PU-110202A', 'Carbonator Condensate Pump #1', 'Liquor Purification Station', '20181017043041.png'),
(3, 'PU-110904B', 'Sweet Water Pump #2', 'Liquor Purification Station', '20181017043053.png'),
(4, 'PU-110908B', 'Sweet Water Pump #4', 'Liquor Purification Station', '20181017043105.png'),
(5, 'PU-130908B', 'Sweet Water Pump #45', 'Liquor Purification Station #1', '20181017043116.png'),
(6, 'PU-110232', 'CO2 Pump #2', 'Purification Area', '20181017043132.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emergency`
--

CREATE TABLE `tbl_emergency` (
  `id` int(5) NOT NULL,
  `id_pengirim` int(5) UNSIGNED NOT NULL,
  `pesan` text NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_emergency`
--

INSERT INTO `tbl_emergency` (`id`, `id_pengirim`, `pesan`, `time`) VALUES
(1, 2, 'Ini Test Pesan Pertama', '2018-09-20 10:34:14.188196'),
(2, 1, 'balasan dr pesaanpertama', '2018-09-20 10:36:10.000000'),
(4, 1, 'pesan', '2018-09-20 10:39:17.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) UNSIGNED NOT NULL,
  `NIP` varchar(35) DEFAULT NULL,
  `nama_lengkap` varchar(35) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `Pass` varchar(35) DEFAULT NULL,
  `Jabatan` varchar(35) DEFAULT NULL,
  `Hak_Akses` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `NIP`, `nama_lengkap`, `username`, `Pass`, `Jabatan`, `Hak_Akses`) VALUES
(1, '14045', 'Administrator', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 1),
(2, '140013', 'Syarif Hidayatulloh', 'pegawai', 'e10adc3949ba59abbe56e057f20f883e', 'Pegawai', 2),
(3, '3487', 'Herman', 'herman', 'e10adc3949ba59abbe56e057f20f883e', 'Operator', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inspeksi`
--
ALTER TABLE `inspeksi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Users` (`id_user`),
  ADD KEY `Inspeksi_mesin` (`id_mesin`) USING BTREE;

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `No_Mesin` (`No_Mesin`);

--
-- Indexes for table `tbl_emergency`
--
ALTER TABLE `tbl_emergency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_kirim` (`id_pengirim`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inspeksi`
--
ALTER TABLE `inspeksi`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_emergency`
--
ALTER TABLE `tbl_emergency`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `inspeksi`
--
ALTER TABLE `inspeksi`
  ADD CONSTRAINT `inspeksi_Mesin` FOREIGN KEY (`id_mesin`) REFERENCES `mesin` (`ID`),
  ADD CONSTRAINT `inspeksi_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_emergency`
--
ALTER TABLE `tbl_emergency`
  ADD CONSTRAINT `tbl_emergency_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `tbl_user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
