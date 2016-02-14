-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2016 at 10:03 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID_ADMIN` varchar(20) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `LEVEL_ADMIN` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `PASSWORD`, `LEVEL_ADMIN`) VALUES
('ramafresco', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE IF NOT EXISTS `tabel_user` (
  `ID_USER` varchar(20) NOT NULL,
  `NAMA_USER` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `LEVEL` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`ID_USER`, `NAMA_USER`, `PASSWORD`, `LEVEL`) VALUES
('rama', 'rama ', 'rama', 'member'),
('shovi', 'shafiyah NL ', '12345', 'member'),
('Siro', 'Sir.Abraham ', '12345', 'member'),
('sirogane', 'Sirajuddin Abraham', '12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `ID_TRANSAKSI` varchar(25) NOT NULL,
  `ID_USER` varchar(20) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `JENIS_TIKET` varchar(25) DEFAULT NULL,
  `JUMLAH_TIKET` int(11) DEFAULT NULL,
  `HARGA_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_TRANSAKSI`),
  KEY `FK_RELATIONSHIP_1` (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_USER`) REFERENCES `tabel_user` (`ID_USER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
