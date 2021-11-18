-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 02:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_log`
--

CREATE TABLE `daily_log` (
  `logid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `login_am` datetime NOT NULL DEFAULT current_timestamp(),
  `logout_am` datetime NOT NULL,
  `login_pm` datetime NOT NULL,
  `logout_pm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_log`
--

INSERT INTO `daily_log` (`logid`, `userid`, `login_am`, `logout_am`, `login_pm`, `logout_pm`) VALUES
(1, 9, '2021-11-17 04:53:13', '2021-11-17 04:53:20', '2021-11-17 04:53:24', '2021-11-17 04:53:29'),
(2, 9, '2021-10-17 04:53:13', '2021-10-17 04:53:20', '2021-10-17 04:53:24', '2021-10-17 04:53:29'),
(3, 9, '2020-01-17 04:53:13', '2020-01-17 04:53:20', '2020-01-17 04:53:24', '2020-01-17 04:53:29'),
(4, 9, '2020-02-17 04:53:13', '2020-02-17 04:53:20', '2020-02-17 04:53:24', '2020-02-17 04:53:29'),
(5, 10, '2021-11-17 10:04:04', '2021-11-17 10:04:11', '2021-11-17 12:28:49', '2021-11-17 12:29:04'),
(6, 11, '2021-11-17 12:47:13', '2021-11-17 12:47:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 12, '2021-11-17 12:57:52', '2021-11-17 12:58:08', '2021-11-17 12:58:19', '2021-11-17 12:58:29'),
(8, 13, '2021-11-17 14:00:37', '2021-11-17 14:05:33', '2021-11-17 14:06:50', '2021-11-17 18:53:35'),
(9, 14, '2021-11-17 21:25:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 9, '2021-11-18 08:19:55', '2021-11-18 08:19:55', '2021-11-18 08:21:12', '2021-11-18 08:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `rfid` varchar(10) NOT NULL,
  `datecreated` datetime DEFAULT current_timestamp(),
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `modifiedby` int(11) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL,
  `deactivated` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `email`, `password`, `firstname`, `middlename`, `lastname`, `rfid`, `datecreated`, `createdby`, `modifieddate`, `modifiedby`, `position`, `department`, `location`, `usertype`, `deactivated`) VALUES
(1, 'admin@localhost.com', '$2y$10$O2UedSlw2G2RRle16SL2nuV2cW5f3j0PO0xtJ/YninHFtzpkSeZ0K', 'system', 'sa', 'admin', '0', '2021-09-19 16:52:49', 1, '2021-11-17 11:31:12', NULL, NULL, NULL, NULL, 1, 0),
(9, 'lyca@gmail.com', '$2y$10$4lkWGLU48RpnPDNBlmQWo.RF2/ohYTQ3BbN1tj9aQowSsAGHxo30a', 'LYCA', 'MAMAUAG', 'MALSI', '1234567890', '2021-11-17 02:55:09', 1, '2021-11-17 12:53:42', 1, 'Director', 'Finance', 'http://localhost/rfid/assets/upload/248300397_2986122554961143_8879944544104698974_n.jpg', 2, 0),
(10, 'testing@localhost.com', '$2y$10$HEHacLEN1cTLXYEpXJy3BOv/keZ7WADE/.fqdTZjphj5dPVscHyli', 'test', 'test', 'test', '0859404274', '2021-11-17 02:57:55', 1, '2021-11-17 12:54:10', 1, 'Secretary', 'Finance', 'http://localhost/rfid/assets/upload/252749740_1388178311598356_7168460098536972634_n.jpg', 2, 0),
(11, 'test123@gmail.com', '$2y$10$7zUXkAMDjnwxcSXY.oaD4u1P.E0pqZA//BtdOKwfFpUE7R6TGQ62.', 'Bryan', 'Lauagan', 'Banguilan', '1002951234', '2021-11-17 12:46:56', 0, NULL, NULL, 'Director', 'Research', 'http://localhost/rfid/assets/upload/hehe.jpg', 2, 0),
(12, 'lycamalsi@gmail.com', '$2y$10$QbcIclxl2JSklT3mKG5ydeM0ZRx2HCJPQYRPYZyLJkjZfG.uaHQg6', 'Lyca', 'M.', 'Malsi', '1234567891', '2021-11-17 12:57:05', 0, '2021-11-17 12:59:44', 1, 'Secretary', 'Mayors Office', 'http://localhost/rfid/assets/upload/248300397_2986122554961143_8879944544104698974_n1.jpg', 2, 0),
(13, 'time@gmail.com', '$2y$10$FlsQ5ggu/gjpX6KaRroc2.rONWKL7NeqAbYbhWoxNxo5TVQ/srZpK', 'Bryan', 'L.', 'Banguilan', '1234567899', '2021-11-17 14:00:08', 0, NULL, NULL, 'Director', 'Planning', 'http://localhost/rfid/assets/upload/hehe1.jpg', 2, 0),
(14, 'time2@gmail.com', '$2y$10$uxmV27J0Fkob.tDRPImLE.8amHAI8inLNwZPN2KqtoP9sDNE7l4fS', 'time', 'time', 'test', '1234567892', '2021-11-17 21:25:08', 0, '2021-11-18 07:56:52', 1, 'Director', 'Extension', 'http://localhost/rfid/assets/upload/hehe2.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`) VALUES
(1, 'admin'),
(2, 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_log`
--
ALTER TABLE `daily_log`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_log`
--
ALTER TABLE `daily_log`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
