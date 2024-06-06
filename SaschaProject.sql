-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 06. Jun 2024 um 12:48
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `SaschaProject`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dateien`
--

CREATE TABLE `dateien` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(16) NOT NULL,
  `acsess` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `dateien`
--

INSERT INTO `dateien` (`id`, `name`, `username`, `acsess`) VALUES
(60, '', 'admin', ''),
(61, '', 'admin', ''),
(62, '', 'admin', ''),
(63, '', 'admin', ''),
(64, '', 'admin', ''),
(65, '', 'admin', ''),
(66, '', 'admin', ''),
(67, '', 'admin', ''),
(68, 'hallo.rtf', 'admin', ''),
(69, 'hallo.rtf', 'admin', ''),
(70, 'hallo.rtf', 'admin', ''),
(71, '<b>Hallo.rtf', 'admin', ''),
(72, '<b>Hallo.rtf', 'user', ''),
(73, 'hallo.rtf', 'admin', 'closed'),
(74, 'hallo.rtf', 'admin', 'closed'),
(75, 'hallo.rtf', 'admin', 'closed'),
(76, '<b>Hallo.rtf', 'admin', 'closed'),
(77, 'hallo.rtf', 'admin', 'closed'),
(78, '<b>Hallo.rtf', 'admin', 'closed'),
(79, 'hallo.rtf', 'admin', 'closed'),
(80, 'hallo.rtf', 'admin', 'closed'),
(81, 'hallo.rtf', 'admin', 'closed'),
(82, 'hallo.rtf', 'admin', 'closed'),
(83, 'hallo.rtf', 'admin', 'closed'),
(84, 'hallo.rtf', 'admin', 'open'),
(85, 'hallo.rtf', 'admin', 'open');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin'),
('user', 'test');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `dateien`
--
ALTER TABLE `dateien`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `dateien`
--
ALTER TABLE `dateien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
