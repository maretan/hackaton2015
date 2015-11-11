-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2015 at 03:10 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeehondje`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appartments`
--

CREATE TABLE `Appartments` (
  `ID` int(2) NOT NULL,
  `Naam` varchar(25) COLLATE utf8_bin NOT NULL,
  `Kamers` int(2) NOT NULL,
  `Prijs` double NOT NULL,
  `Personen` int(2) NOT NULL,
  `Notes` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Entry`
--

CREATE TABLE `Entry` (
  `ID` int(2) NOT NULL,
  `Appartment` int(2) NOT NULL,
  `Kinderen` int(2) NOT NULL,
  `User` int(2) NOT NULL,
  `Aantal_Personen` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `ID` int(2) NOT NULL,
  `Voornaam` varchar(25) COLLATE utf8_bin NOT NULL,
  `Achternaam` varchar(25) COLLATE utf8_bin NOT NULL,
  `StraatNr` varchar(5) COLLATE utf8_bin NOT NULL,
  `Postcode` varchar(6) COLLATE utf8_bin NOT NULL,
  `Plaats` varchar(25) COLLATE utf8_bin NOT NULL,
  `Telefoon` varchar(11) COLLATE utf8_bin NOT NULL,
  `Type` int(1) NOT NULL,
  `Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `Password` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appartments`
--
ALTER TABLE `Appartments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appartments`
--
ALTER TABLE `Appartments`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
