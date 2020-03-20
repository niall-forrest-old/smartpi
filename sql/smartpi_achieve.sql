-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2020 at 11:37 PM
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
-- Table structure for table `smartpi_achieve`
--

CREATE TABLE `smartpi_achieve` (
  `AchieveID` int(11) NOT NULL,
  `AchieveName` varchar(300) NOT NULL,
  `AchieveDesc` varchar(300) NOT NULL,
  `achieve_img` varchar(300) NOT NULL,
  `step_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartpi_achieve`
--

INSERT INTO `smartpi_achieve` (`AchieveID`, `AchieveName`, `AchieveDesc`, `achieve_img`, `step_ID`) VALUES
(1, 'Step Complete: Introduction', 'You completed the Introduction step of the lesson!', '../img/achievement1.png', 1),
(2, 'Step Complete: Smart Cities', 'You\'ve learned more about Smart Cities!', '../img/achievement2.png', 2),
(3, 'Air Quality Sensor: Raspberry Pi', 'You have learned about the air quality monitor, and have set up your Raspberry Pi!', '../img/achievement3.png', 3),
(4, 'Air Quality Sensor: First Lines of Code', 'You have written your first lines of code for a Python Script to retrieve air qualiy data!', '../img/achievement4.png', 4),
(5, 'Air Quality Sensor: Complete!', 'You have written the code to retrieve the data from your air quality sensor!', '../img/achievement5.png', 5),
(6, 'Lesson Complete!', 'Congratulations, you have completed the SmartPi lesson!', '../img/achievement6.png', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smartpi_achieve`
--
ALTER TABLE `smartpi_achieve`
  ADD PRIMARY KEY (`AchieveID`),
  ADD UNIQUE KEY `step_ID` (`step_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smartpi_achieve`
--
ALTER TABLE `smartpi_achieve`
  MODIFY `AchieveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `smartpi_achieve`
--
ALTER TABLE `smartpi_achieve`
  ADD CONSTRAINT `step_ID` FOREIGN KEY (`step_ID`) REFERENCES `smartpi_steps` (`StepID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
