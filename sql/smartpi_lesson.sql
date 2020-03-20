-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2020 at 11:38 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nforrest02`
--

-- --------------------------------------------------------

--
-- Table structure for table `smartpi_lesson`
--

CREATE TABLE `smartpi_lesson` (
  `LessonID` int(11) NOT NULL,
  `LessonName` varchar(300) NOT NULL,
  `NoOfSteps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartpi_lesson`
--

INSERT INTO `smartpi_lesson` (`LessonID`, `LessonName`, `NoOfSteps`) VALUES
(1, 'Create a Smart City Device!', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smartpi_lesson`
--
ALTER TABLE `smartpi_lesson`
  ADD PRIMARY KEY (`LessonID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smartpi_lesson`
--
ALTER TABLE `smartpi_lesson`
  MODIFY `LessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
