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
-- Table structure for table `smartpi_achieve_user`
--

CREATE TABLE `smartpi_achieve_user` (
  `Ach_UserID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `AchieveID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartpi_achieve_user`
--

INSERT INTO `smartpi_achieve_user` (`Ach_UserID`, `UserID`, `AchieveID`) VALUES
(1, 13, 1),
(49, 1, 1),
(50, 1, 2),
(51, 1, 3),
(52, 1, 3),
(53, 1, 3),
(54, 1, 1),
(55, 1, 3),
(56, 1, 2),
(57, 1, 2),
(58, 1, 3),
(59, 1, 4),
(60, 1, 5),
(61, 13, 6),
(62, 1, 1),
(63, 1, 6),
(64, 18, 1),
(65, 18, 2),
(66, 18, 3),
(67, 19, 1),
(68, 19, 2),
(69, 19, 3),
(70, 19, 4),
(71, 19, 5),
(72, 19, 6),
(73, 20, 1),
(74, 20, 2),
(75, 20, 3),
(76, 20, 4),
(77, 20, 5),
(78, 20, 6),
(79, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smartpi_achieve_user`
--
ALTER TABLE `smartpi_achieve_user`
  ADD PRIMARY KEY (`Ach_UserID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `AchieveID` (`AchieveID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smartpi_achieve_user`
--
ALTER TABLE `smartpi_achieve_user`
  MODIFY `Ach_UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `smartpi_achieve_user`
--
ALTER TABLE `smartpi_achieve_user`
  ADD CONSTRAINT `achieve_ID` FOREIGN KEY (`AchieveID`) REFERENCES `smartpi_achieve` (`AchieveID`),
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`UserID`) REFERENCES `smartpi_user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
