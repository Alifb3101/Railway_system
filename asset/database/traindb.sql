-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 06:13 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `cancel`
--

CREATE TABLE `cancel` (
  `id` int(20) NOT NULL,
  `ticket_no` int(20) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `message` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'Akshay', 'akshay12@gmail.com', 'Booking tickets by using this site is very good');

-- --------------------------------------------------------

--
-- Table structure for table `passanger`
--

CREATE TABLE `passanger` (
  `pno` int(20) NOT NULL,
  `p_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `p_age` int(3) NOT NULL,
  `p_gender` varchar(3) COLLATE utf8_bin NOT NULL,
  `seat_no` int(10) DEFAULT NULL,
  `ticket_no` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `passanger`
--

INSERT INTO `passanger` (`pno`, `p_name`, `p_age`, `p_gender`, `seat_no`, `ticket_no`) VALUES
(1, 'Ajay Rathod', 21, 'm', 0, 1),
(2, 'Sujil Ahire', 23, 'm', 0, 2),
(3, 'Prax Nande', 7, 'm', 0, 2),
(4, 'Sujil Ahire', 23, 'm', 0, 3),
(5, 'Prax Nande', 9, 'm', 0, 3),
(6, 'Sujil Ahire', 22, 'm', 0, 4),
(7, 'Prax Nande', 9, 'm', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `station_no` int(20) NOT NULL,
  `source` varchar(20) COLLATE utf8_bin NOT NULL,
  `destination` varchar(20) COLLATE utf8_bin NOT NULL,
  `fare` int(10) NOT NULL,
  `arrival_time` varchar(20) COLLATE utf8_bin NOT NULL,
  `depart_time` varchar(20) COLLATE utf8_bin NOT NULL,
  `duration` varchar(20) COLLATE utf8_bin NOT NULL,
  `train_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_no`, `source`, `destination`, `fare`, `arrival_time`, `depart_time`, `duration`, `train_no`) VALUES
(11, 'Mumbai', 'Ahmedabad', 800, '05:55', '23:25', '17.5', 12267),
(12, 'Aurangabad', 'Secunderabad', 350, '06:35', '20:15', '13.7', 22204),
(13, 'Madurai', 'Chennai', 700, '07:20', '22:40', '15.3', 22206),
(14, 'Jammu', 'Delhi', 1200, '05:05', '19:40', '14.6', 12426),
(15, 'NewDelhi', 'Lucknow', 900, '06:40', '20:50', '14.2', 12430),
(16, 'Ludhiana', 'Delhi', 600, '22:10', '16:40', '5.5', 12038),
(17, 'Aurangabad', 'Mumbai', 500, '08:30', '23:30', '15', 12307),
(18, 'Aurangabad', 'Mumbai', 500, '10:00', '1:00', '9', 22206);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_no` int(20) NOT NULL COMMENT '1000',
  `status` varchar(10) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `phno` bigint(10) NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `train_no` int(6) NOT NULL,
  `station_no` int(20) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_no`, `status`, `date`, `phno`, `email`, `train_no`, `station_no`, `username`) VALUES
(1, 'cancelled', '2018-05-26', 9922123833, 'aks123@gmail.com', 12307, 17, 'ak143'),
(2, 'booked', '2019-09-22', 9922032033, 'aks143@gmail.com', 22206, 18, 'ak143'),
(3, 'booked', '2019-09-22', 9922032033, 'aks143@gmail.com', 22206, 18, 'ak143'),
(4, 'booked', '2019-09-22', 9922032033, 'aks143@gmail.com', 22206, 18, 'ak143');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `train_no` int(6) NOT NULL,
  `train_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `seat_avail` int(3) NOT NULL,
  `class` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_no`, `train_name`, `seat_avail`, `class`) VALUES
(12038, 'Shatabdi Express', 80, 'ALL'),
(12267, 'MUMBAI CENTRAL - AHMEDABAD AC Duronto Exp', 45, 'ALL'),
(12307, 'JODHPUR SF Express', 0, 'ALL'),
(12426, 'DELHI Rajdhani Express', 40, 'ALL'),
(12430, ' LUCKNOW SF Express', 45, 'ALL'),
(22204, ' VISAKHAPATNAM Express', 40, 'ALL'),
(22206, ' CHENNAI Express', 34, 'ALL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `middle_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `area` varchar(100) COLLATE utf8_bin NOT NULL,
  `pincode` int(5) NOT NULL,
  `city` varchar(100) COLLATE utf8_bin NOT NULL,
  `state` varchar(100) COLLATE utf8_bin NOT NULL,
  `security_question` varchar(100) COLLATE utf8_bin NOT NULL,
  `security_answare` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `email`, `mobile_number`, `area`, `pincode`, `city`, `state`, `security_question`, `security_answare`) VALUES
('aks143', '1234', 'Akshay', '', 'Rathod', 'M', '2018-06-26', 'aks143@gmail.com', 9922032033, 'akjsdasbd ', 431001, '', '', '1', '13123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cancel`
--
ALTER TABLE `cancel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancel_ibfk_2` (`username`),
  ADD KEY `cancel_ibfk_1` (`ticket_no`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passanger`
--
ALTER TABLE `passanger`
  ADD PRIMARY KEY (`pno`),
  ADD KEY `ticket_fk` (`ticket_no`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_no`),
  ADD KEY `FOREIGN KEY` (`train_no`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_no`),
  ADD KEY `ticket_ibfk_1` (`train_no`),
  ADD KEY `ticket_ibfk_2` (`username`),
  ADD KEY `station_fk` (`station_no`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`train_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passanger`
--
ALTER TABLE `passanger`
  MODIFY `pno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `station_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_no` int(20) NOT NULL AUTO_INCREMENT COMMENT '1000', AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cancel`
--
ALTER TABLE `cancel`
  ADD CONSTRAINT `cancel_ibfk_1` FOREIGN KEY (`ticket_no`) REFERENCES `ticket` (`ticket_no`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cancel_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `passanger`
--
ALTER TABLE `passanger`
  ADD CONSTRAINT `ticket_fk` FOREIGN KEY (`ticket_no`) REFERENCES `ticket` (`ticket_no`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `station`
--
ALTER TABLE `station`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`train_no`) REFERENCES `train` (`train_no`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `station_fk` FOREIGN KEY (`station_no`) REFERENCES `station` (`station_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`train_no`) REFERENCES `train` (`train_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
