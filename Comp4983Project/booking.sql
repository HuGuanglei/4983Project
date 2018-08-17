-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2017 at 04:55 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinginfo`
--

CREATE TABLE IF NOT EXISTS `bookinginfo` (
  `bookingID` int(20) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookinginfo`
--

INSERT INTO `bookinginfo` (`bookingID`, `name`, `date`, `startTime`, `endTime`, `user`) VALUES
(1, 'CAR212', '2017-03-25', '09:00:00', '10:00:00', '111111a'),
(2, 'CAR212', '2017-03-25', '08:00:00', '09:00:00', '111111a'),
(3, 'CAR212', '2017-03-25', '10:00:00', '11:00:00', '111111a'),
(4, 'CAR212', '2017-03-25', '11:00:00', '12:00:00', '111111a'),
(5, 'CAR212', '2017-03-25', '15:00:00', '16:00:00', '111111a'),
(6, 'CAR212', '2017-03-25', '16:00:00', '17:00:00', '111111a'),
(7, 'CAR212', '2017-03-26', '08:00:00', '09:00:00', '111111a'),
(8, 'CAR212', '2017-03-26', '09:00:00', '10:00:00', '111111a'),
(9, 'CAR212', '2017-03-26', '11:00:00', '12:00:00', '111111a'),
(10, 'CAR212', '2017-03-26', '12:00:00', '13:00:00', '111111a'),
(11, 'CAR212', '2017-03-30', '08:00:00', '09:00:00', '111111a'),
(12, 'CAR212', '2017-03-30', '09:00:00', '10:00:00', '111111a'),
(13, 'CAR212', '2017-03-30', '08:00:00', '09:00:00', '111111a'),
(14, 'CAR212', '2017-03-30', '09:00:00', '10:00:00', '111111a');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `userId` int(11) NOT NULL,
  `username` varchar(10) CHARACTER SET utf16 NOT NULL,
  `password` varchar(20) CHARACTER SET utf16 NOT NULL,
  `roles` varchar(10) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userId`, `username`, `password`, `roles`) VALUES
(1, '111111a', '111111', 'user'),
(2, '123792h', '111111', 'admin'),
(3, '222222a', '222222', 'user'),
(4, '123456', '111111', 'user'),
(5, '111111b', '111111', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(10) NOT NULL,
  `roomUsage` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`name`, `number`, `roomUsage`) VALUES
('CAR212', 2, 'student''s lounge'),
('CAR210', 3, 'lab'),
('CAR211', 4, 'lab'),
('CAR113', 6, 'classroom'),
('CAR410', 7, 'meeting');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinginfo`
--
ALTER TABLE `bookinginfo`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinginfo`
--
ALTER TABLE `bookinginfo`
  MODIFY `bookingID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `number` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
