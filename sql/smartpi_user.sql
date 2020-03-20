-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2020 at 11:39 PM
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
-- Table structure for table `smartpi_user`
--

CREATE TABLE `smartpi_user` (
  `UserID` int(11) NOT NULL,
  `FName` varchar(300) NOT NULL,
  `Username` varchar(300) NOT NULL,
  `Pass` varchar(300) NOT NULL,
  `StepID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartpi_user`
--

INSERT INTO `smartpi_user` (`UserID`, `FName`, `Username`, `Pass`, `StepID`) VALUES
(1, 'Niall Forrest', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '7'),
(13, 'Niall', 'niallforrest1', '482c811da5d5b4bc6d497ffa98491e38', '2'),
(14, 'Kerry', 'kerrybeckett', '5f4dcc3b5aa765d61d8327deb882cf99', '1'),
(15, 'Niall Forrest', 'nforrest02', '5f4dcc3b5aa765d61d8327deb882cf99', '1'),
(16, 'Niall Forrest', 'nforrest', '4402a6c4c194abbd616161cff5c17913', '1'),
(17, 'Niall Forrest', 'nforrest', '5f4dcc3b5aa765d61d8327deb882cf99', '1'),
(18, 'Niall Forrest', 'niall', '5f4dcc3b5aa765d61d8327deb882cf99', '4'),
(19, 'Niall Forrest', 'niallforrest', '5f4dcc3b5aa765d61d8327deb882cf99', '7'),
(20, 'Niall Forrest', 'nforrest01', '5f4dcc3b5aa765d61d8327deb882cf99', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smartpi_user`
--
ALTER TABLE `smartpi_user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `step_ID` (`StepID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smartpi_user`
--
ALTER TABLE `smartpi_user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
