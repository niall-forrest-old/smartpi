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
-- Table structure for table `smartpi_steps`
--

CREATE TABLE `smartpi_steps` (
  `StepID` int(11) NOT NULL,
  `StepNumber` int(11) NOT NULL,
  `StepTitle` varchar(300) NOT NULL,
  `StepDesc` varchar(300) NOT NULL,
  `Progression` int(11) NOT NULL,
  `lesson_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartpi_steps`
--

INSERT INTO `smartpi_steps` (`StepID`, `StepNumber`, `StepTitle`, `StepDesc`, `Progression`, `lesson_ID`) VALUES
(1, 1, 'Air Quality Monitor: Introduction', 'Monitor the air around you using a Raspberry Pi and an Air Quality Sensor!', 0, 1),
(2, 2, 'Air Quality Monitor: What is a Smart City?', 'Learn about Smart Cities and how they use sensors to collect data about the world around us.', 20, 1),
(3, 3, 'Creating an Air Quality Sensor', 'An introduction to air quality and how to set up your Raspberry Pi!', 40, 1),
(4, 4, 'Coding the Air Quality Sensor', 'Using Python 3 to read the air quality data and push it to Adafruit IO!', 60, 1),
(5, 5, 'Coding the Air Quality Sensor 2', 'Continuing to code our Python Script - parsing the data so that it can be read by Adafruit IO', 80, 1),
(6, 6, 'Air Quality Monitor: Conclusion', 'You have coded your air quality monitor and are able to monitor your local air.', 98, 1),
(7, 7, 'Lesson Completed!', 'Lesson Completed, click to begin lesson again!', 100, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smartpi_steps`
--
ALTER TABLE `smartpi_steps`
  ADD PRIMARY KEY (`StepID`),
  ADD KEY `lesson_ID` (`lesson_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smartpi_steps`
--
ALTER TABLE `smartpi_steps`
  MODIFY `StepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `smartpi_steps`
--
ALTER TABLE `smartpi_steps`
  ADD CONSTRAINT `LessonID` FOREIGN KEY (`lesson_ID`) REFERENCES `smartpi_lesson` (`LessonID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
