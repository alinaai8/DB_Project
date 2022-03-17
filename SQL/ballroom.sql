-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 11:17 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ballroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `ballroom`
--

CREATE TABLE `ballroom` (
  `idBallroom` int(11) NOT NULL,
  `Nume_Eveniment` varchar(255) NOT NULL,
  `idC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `id` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `telefon` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`id`, `nume`, `prenume`, `telefon`, `email`, `adresa`) VALUES
(17, 'Alina', 'Ioana', 976535, 'alinacustura30@gmail.com', 'Bvd Matei Basarab'),
(21, 'Ionut', 'Mihai', 83739275, 'alinaai@icloud.com', 'Bvd Matei Basarav');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `idC` int(11) NOT NULL,
  `numec` varchar(255) NOT NULL,
  `prenumec` varchar(255) NOT NULL,
  `telefonc` int(11) NOT NULL,
  `emailc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`idC`, `numec`, `prenumec`, `telefonc`, `emailc`) VALUES
(2, 'Alina', 'Ioana', 726106580, 'alinaai@icloud.com'),
(4, 'AlinaI', 'Ioana', 984546763, 'alinaaim@icloud.com');

-- --------------------------------------------------------

--
-- Table structure for table `eveniment`
--

CREATE TABLE `eveniment` (
  `idBallroom` int(11) NOT NULL,
  `Nume_Eveniment` varchar(255) NOT NULL,
  `idC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eveniment`
--

INSERT INTO `eveniment` (`idBallroom`, `Nume_Eveniment`, `idC`) VALUES
(0, 'Alalalda', 4),
(1, 'Botez1', 2),
(2, 'Nunta', 4),
(3, 'Majorat', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mancare`
--

CREATE TABLE `mancare` (
  `idMancare` int(11) NOT NULL,
  `denumire_mancare` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mancare`
--

INSERT INTO `mancare` (`idMancare`, `denumire_mancare`) VALUES
(8, 'Aperitive1'),
(9, 'Aperitive2'),
(10, 'Aperitive3'),
(11, 'Fel principal 1'),
(12, 'Fel principal 2'),
(13, 'Fel principal 3'),
(14, 'Fel secundar 1'),
(15, 'Fel secundar 2'),
(16, 'Fel secundar 3'),
(17, 'Desert 1'),
(18, 'Desert 2'),
(19, 'Desert 3'),
(20, 'Tort 1'),
(21, 'Tort 2'),
(22, 'Tort 3');

-- --------------------------------------------------------

--
-- Table structure for table `meniu`
--

CREATE TABLE `meniu` (
  `idBallroom` int(11) NOT NULL,
  `idMancare` int(11) NOT NULL,
  `denumire_meniu` varchar(255) NOT NULL,
  `pret_meniu` int(11) NOT NULL,
  `idMeniu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meniu`
--

INSERT INTO `meniu` (`idBallroom`, `idMancare`, `denumire_meniu`, `pret_meniu`, `idMeniu`) VALUES
(3, 19, 'Meniu1', 100, 5),
(0, 17, 'Meniu 2', 100, 7),
(2, 11, 'Meniu3', 120, 9),
(1, 11, 'asdada', 120, 13),
(3, 18, 'fdafads', 120, 15);

-- --------------------------------------------------------

--
-- Table structure for table `rezervari`
--

CREATE TABLE `rezervari` (
  `idRezervare` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora` time(6) NOT NULL,
  `nr_pers` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `idMeniu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rezervari`
--

INSERT INTO `rezervari` (`idRezervare`, `data`, `ora`, `nr_pers`, `idSala`, `id`, `idMeniu`) VALUES
(7, '2021-01-06', '12:54:10.000000', 150, 6, 21, 15),
(8, '2021-01-07', '22:30:00.000000', 200, 6, 17, 5),
(9, '2021-01-14', '20:10:56.000000', 200, 6, 21, 7),
(10, '2021-01-22', '21:30:00.000000', 400, 6, 17, 9),
(11, '2021-01-29', '22:04:00.000000', 200, 7, 17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE `sala` (
  `idSala` int(11) NOT NULL,
  `denumire_sala` varchar(255) NOT NULL,
  `marime_sala` int(11) NOT NULL,
  `capacitate_sala` int(11) NOT NULL,
  `pret_inchiriere` int(11) NOT NULL,
  `idBallroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`idSala`, `denumire_sala`, `marime_sala`, `capacitate_sala`, `pret_inchiriere`, `idBallroom`) VALUES
(6, '3', 100, 1000, 5000, 2),
(7, 'Sala1', 600, 1000, 5000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nume` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nume`) VALUES
(7, 'alina', 'ioana', 'Alina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ballroom`
--
ALTER TABLE `ballroom`
  ADD PRIMARY KEY (`idBallroom`),
  ADD UNIQUE KEY `idC` (`idC`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idC`);

--
-- Indexes for table `eveniment`
--
ALTER TABLE `eveniment`
  ADD PRIMARY KEY (`idBallroom`),
  ADD KEY `eveniment_ibfk_1` (`idC`);

--
-- Indexes for table `mancare`
--
ALTER TABLE `mancare`
  ADD PRIMARY KEY (`idMancare`);

--
-- Indexes for table `meniu`
--
ALTER TABLE `meniu`
  ADD PRIMARY KEY (`idMeniu`),
  ADD KEY `meniu_ibfk_1` (`idMancare`),
  ADD KEY `idBallroom_2` (`idBallroom`);

--
-- Indexes for table `rezervari`
--
ALTER TABLE `rezervari`
  ADD PRIMARY KEY (`idRezervare`),
  ADD KEY `rezervari_ibfk_1` (`idSala`),
  ADD KEY `rezervari_ibfk_2` (`id`),
  ADD KEY `idMeniu` (`idMeniu`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`idSala`),
  ADD KEY `idBallroom` (`idBallroom`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ballroom`
--
ALTER TABLE `ballroom`
  MODIFY `idBallroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mancare`
--
ALTER TABLE `mancare`
  MODIFY `idMancare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `meniu`
--
ALTER TABLE `meniu`
  MODIFY `idMeniu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rezervari`
--
ALTER TABLE `rezervari`
  MODIFY `idRezervare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ballroom`
--
ALTER TABLE `ballroom`
  ADD CONSTRAINT `ballroom_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `contact` (`idC`);

--
-- Constraints for table `eveniment`
--
ALTER TABLE `eveniment`
  ADD CONSTRAINT `eveniment_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `contact` (`idC`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `meniu`
--
ALTER TABLE `meniu`
  ADD CONSTRAINT `meniu_ibfk_1` FOREIGN KEY (`idMancare`) REFERENCES `mancare` (`idMancare`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meniu_ibfk_2` FOREIGN KEY (`idBallroom`) REFERENCES `eveniment` (`idBallroom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezervari`
--
ALTER TABLE `rezervari`
  ADD CONSTRAINT `rezervari_ibfk_1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervari_ibfk_2` FOREIGN KEY (`id`) REFERENCES `clienti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervari_ibfk_3` FOREIGN KEY (`idMeniu`) REFERENCES `meniu` (`idMeniu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `sala_ibfk_1` FOREIGN KEY (`idBallroom`) REFERENCES `eveniment` (`idBallroom`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
