-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 mei 2018 om 13:22
-- Serverversie: 10.1.32-MariaDB
-- PHP-versie: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectse4`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedrijf`
--

CREATE TABLE `bedrijf` (
  `ID` int(4) NOT NULL,
  `naamBedrijf` varchar(100) NOT NULL,
  `websiteUrl` varchar(100) DEFAULT NULL,
  `tel_nummer` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `ID` int(4) NOT NULL,
  `Naam` varchar(150) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `label_vacature`
--

CREATE TABLE `label_vacature` (
  `VID` int(4) NOT NULL,
  `LID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `particulier`
--

CREATE TABLE `particulier` (
  `ID` int(4) NOT NULL,
  `tel_nummer` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reactie`
--

CREATE TABLE `reactie` (
  `gebruikerID` int(4) NOT NULL,
  `vacatureID` int(4) NOT NULL,
  `datum` datetime NOT NULL,
  `bericht` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `student`
--

CREATE TABLE `student` (
  `ID` int(4) NOT NULL,
  `Specialisatie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vacature`
--

CREATE TABLE `vacature` (
  `ID` int(4) NOT NULL,
  `Titel` varchar(255) NOT NULL,
  `Datum` datetime NOT NULL,
  `Beschrijving` text NOT NULL,
  `Functie` varchar(50) NOT NULL,
  `Locatie` varchar(70) NOT NULL,
  `gebruikerID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `v_label`
--

CREATE TABLE `v_label` (
  `ID` int(2) NOT NULL,
  `Trefwoord` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `label_vacature`
--
ALTER TABLE `label_vacature`
  ADD PRIMARY KEY (`VID`,`LID`),
  ADD KEY `LID` (`LID`);

--
-- Indexen voor tabel `particulier`
--
ALTER TABLE `particulier`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `reactie`
--
ALTER TABLE `reactie`
  ADD PRIMARY KEY (`gebruikerID`,`vacatureID`,`datum`),
  ADD KEY `vacatureID` (`vacatureID`);

--
-- Indexen voor tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `vacature`
--
ALTER TABLE `vacature`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `gebruikerID` (`gebruikerID`);

--
-- Indexen voor tabel `v_label`
--
ALTER TABLE `v_label`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `vacature`
--
ALTER TABLE `vacature`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `v_label`
--
ALTER TABLE `v_label`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  ADD CONSTRAINT `bedrijf_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `gebruiker` (`ID`);

--
-- Beperkingen voor tabel `label_vacature`
--
ALTER TABLE `label_vacature`
  ADD CONSTRAINT `label_vacature_ibfk_1` FOREIGN KEY (`VID`) REFERENCES `vacature` (`ID`),
  ADD CONSTRAINT `label_vacature_ibfk_2` FOREIGN KEY (`LID`) REFERENCES `v_label` (`ID`);

--
-- Beperkingen voor tabel `particulier`
--
ALTER TABLE `particulier`
  ADD CONSTRAINT `particulier_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `gebruiker` (`ID`);

--
-- Beperkingen voor tabel `reactie`
--
ALTER TABLE `reactie`
  ADD CONSTRAINT `reactie_ibfk_1` FOREIGN KEY (`gebruikerID`) REFERENCES `gebruiker` (`ID`),
  ADD CONSTRAINT `reactie_ibfk_2` FOREIGN KEY (`vacatureID`) REFERENCES `vacature` (`ID`);

--
-- Beperkingen voor tabel `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `gebruiker` (`ID`);

--
-- Beperkingen voor tabel `vacature`
--
ALTER TABLE `vacature`
  ADD CONSTRAINT `vacature_ibfk_1` FOREIGN KEY (`gebruikerID`) REFERENCES `gebruiker` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
