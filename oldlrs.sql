-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2018 at 12:07 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `aanwezigheid`
--

CREATE TABLE `aanwezigheid` (
  `leerling_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` int(5) NOT NULL,
  `absentiecode` int(11) DEFAULT NULL,
  `klas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aanwezigheid`
--

INSERT INTO `aanwezigheid` (`leerling_id`, `datum`, `tijd`, `absentiecode`, `klas`) VALUES
(1, '2018-01-15', 1158, 4, 1),
(2, '2018-01-15', 1157, 5, 1),
(3, '2018-01-15', 1157, 7, 1),
(19, '2018-01-15', 1157, 8, 1),
(20, '2018-01-15', 1157, 4, 1),
(21, '2018-01-15', 1157, 9, 1),
(24, '2018-01-15', 1157, 10, 1),
(25, '2018-01-15', 1157, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `absentie`
--

CREATE TABLE `absentie` (
  `id` int(11) NOT NULL,
  `signalering` varchar(20) NOT NULL,
  `aantal` int(11) NOT NULL,
  `urgentie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absentie`
--

INSERT INTO `absentie` (`id`, `signalering`, `aantal`, `urgentie`) VALUES
(0, 'Aanwezig', 0, 0),
(1, 'Ziek', 3, 1),
(4, 'Onbekend', 0, 0),
(5, 'ontvoerd', 1, 1),
(6, 'onbekend', 1, 1),
(7, 'vermist', 1, 1),
(8, 'mishandeld', 1, 1),
(9, 'ijsvrij', 1, 1),
(10, 'weeralarm', 1, 1),
(11, 'medische klacht', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `klas`
--

CREATE TABLE `klas` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `omschrijving` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klas`
--

INSERT INTO `klas` (`id`, `naam`, `omschrijving`) VALUES
(1, 'Klas 1a', 'Eerste klas van onderwijzer Van de Valk ');

-- --------------------------------------------------------

--
-- Table structure for table `leerling`
--

CREATE TABLE `leerling` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `telnood` varchar(20) NOT NULL,
  `telouders` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `schermvolgnr` int(11) NOT NULL,
  `klas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leerling`
--

INSERT INTO `leerling` (`id`, `naam`, `adres`, `woonplaats`, `tel`, `telnood`, `telouders`, `foto`, `schermvolgnr`, `klas`) VALUES
(1, 'Bas Gehin', 'Kerkstraat 26', 'Zwolle', '06123456789', '06123456789', '06123456789', './fotoos/bas.jpg', 133, 1),
(2, 'Thomas Jones', 'Dorpstraat 12', 'Hardenberg', '06123456789', '06123456789', '06123456789', './fotoos/thomas.jpg', 2, 1),
(3, 'Khaldoon', 'kerlaan 22', 'amsterdam', '06123456789', '06123456789', '06123456789', 'fotoos/khaldoon.jpg', 3, 1),
(19, 'Derk', 'Kerlaan', 'emmen', '0987654331', '12345678', '56789', 'fotoos/derk.jpg', 9, 1),
(20, 'Jurjen', 'Fietsstraat', 'fiwetsstad', '345678', '45678', '456789', 'fotoos/jurjen.jpg', 10, 1),
(21, 'jeanine', 'janinestraat', 'Gronoinge', '5678', '5678', '5678', 'fotoos/jeanine.jpg', 11, 1),
(24, 'anneMarije', 'berkum', '', '56789', '678', '78', 'fotoos/annem.jpg', 12, 1),
(25, 'g', 'g', 'g', '56789', '', '', 'fotoos/eend9.jpg', 13, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  ADD PRIMARY KEY (`leerling_id`,`datum`,`tijd`);

--
-- Indexes for table `absentie`
--
ALTER TABLE `absentie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leerling`
--
ALTER TABLE `leerling`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  MODIFY `leerling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `absentie`
--
ALTER TABLE `absentie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `klas`
--
ALTER TABLE `klas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leerling`
--
ALTER TABLE `leerling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
