-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 03:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smfk`
--

-- --------------------------------------------------------

--
-- Table structure for table `filmatnekinema_smfk`
--

CREATE TABLE `filmatnekinema_smfk` (
  `ID` int(20) NOT NULL,
  `TitulliFilmit_SMFK` varchar(50) NOT NULL,
  `ZhanriFilmit_SMFK` varchar(50) NOT NULL,
  `VersioniFilmit_SMFK` varchar(50) NOT NULL,
  `SallaFilmit_SMFK` varchar(50) NOT NULL,
  `DataFilmit_SMFK` varchar(50) NOT NULL,
  `OrariFilmit_SMFK` varchar(50) NOT NULL,
  `KohezgjatjaFilmit_SMFK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filmatnekinema_smfk`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmatnekinema_smfk`
--
ALTER TABLE `filmatnekinema_smfk`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmatnekinema_smfk`
--
ALTER TABLE `filmatnekinema_smfk`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
