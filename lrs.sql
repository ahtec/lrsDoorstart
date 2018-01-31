-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 jan 2018 om 21:49
-- Serverversie: 10.1.30-MariaDB
-- PHP-versie: 7.2.1

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
-- Tabelstructuur voor tabel `aanwezigheid`
--

CREATE TABLE `aanwezigheid` (
  `leerling_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` int(5) NOT NULL,
  `absentiecode` int(11) DEFAULT NULL,
  `klas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `aanwezigheid`
--

INSERT INTO `aanwezigheid` (`leerling_id`, `datum`, `tijd`, `absentiecode`, `klas`) VALUES
(1, '2018-01-15', 1158, 4, 1),
(1, '2018-01-21', 1459, 0, 1),
(2, '2018-01-15', 1157, 5, 1),
(2, '2018-01-21', 1459, 0, 1),
(3, '2018-01-15', 1157, 7, 1),
(3, '2018-01-21', 1459, 0, 1),
(19, '2018-01-15', 1157, 8, 1),
(20, '2018-01-15', 1157, 4, 1),
(21, '2018-01-15', 1157, 9, 1),
(21, '2018-01-21', 1459, 0, 1),
(24, '2018-01-15', 1157, 10, 1),
(24, '2018-01-21', 1500, 5, 1),
(25, '2018-01-15', 1157, 11, 1),
(25, '2018-01-21', 1459, 0, 1),
(26, '2018-01-21', 1500, 9, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `absentie`
--

CREATE TABLE `absentie` (
  `id` int(11) NOT NULL,
  `signalering` varchar(20) NOT NULL,
  `aantal` int(11) NOT NULL,
  `urgentie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `absentie`
--

INSERT INTO `absentie` (`id`, `signalering`, `aantal`, `urgentie`) VALUES
(0, 'Aanwezig', 0, 0),
(1, 'Ziek', 3, 1),
(4, 'Onbekend', 0, 0),
(5, 'LekkeBand', 1, 1),
(9, 'IJsvrij', 1, 1),
(10, 'Weeralarm', 1, 1),
(11, 'Doktersbezoek', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klas`
--

CREATE TABLE `klas` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `omschrijving` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klas`
--

INSERT INTO `klas` (`id`, `naam`, `omschrijving`) VALUES
(1, 'Klas 1a', 'Eerste klas van onderwijzer Van de Valk ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leerling`
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
-- Gegevens worden geëxporteerd voor tabel `leerling`
--

INSERT INTO `leerling` (`id`, `naam`, `adres`, `woonplaats`, `tel`, `telnood`, `telouders`, `foto`, `schermvolgnr`, `klas`) VALUES
(1, 'Bas Gehin', 'Kerkstraat 26', 'Zwolle', '06123456789', '06123456789', '06123456789', './fotoos/bas.jpg', 133, 1),
(2, 'Thomas Jones', 'Dorpstraat 12', 'Hardenberg', '06123456789', '06123456789', '06123456789', './fotoos/thomas.jpg', 2, 1),
(3, 'Khaldoon', 'kerlaan 22', 'amsterdam', '06123456789', '06123456789', '06123456789', 'fotoos/khaldoon.jpg', 3, 1),
(19, 'Derk', 'Kerlaan', 'emmen', '0987654331', '12345678', '56789', 'fotoos/derk.jpg', 9, 1),
(20, 'Jurjen', 'Fietsstraat', 'fiwetsstad', '345678', '45678', '456789', 'fotoos/jurjen.jpg', 10, 1),
(21, 'jeanine', 'janinestraat', 'Gronoinge', '5678', '5678', '5678', 'fotoos/jeanine.jpg', 11, 1),
(24, 'anneMarije', 'berkum', '', '56789', '678', '78', 'fotoos/annem.jpg', 12, 1),
(25, 'g', 'g', 'g', '56789', '', '', 'fotoos/eend9.jpg', 13, 1),
(26, 'gghghgh', '', '', '', '', '', 'fotoos/default.jpg', 1, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  ADD PRIMARY KEY (`leerling_id`,`datum`,`tijd`);

--
-- Indexen voor tabel `absentie`
--
ALTER TABLE `absentie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `leerling`
--
ALTER TABLE `leerling`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  MODIFY `leerling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT voor een tabel `absentie`
--
ALTER TABLE `absentie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `klas`
--
ALTER TABLE `klas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `leerling`
--
ALTER TABLE `leerling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
