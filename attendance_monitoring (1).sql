-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 02:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
  `logout_pm` datetime NOT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_log`
--

INSERT INTO `daily_log` (`logid`, `userid`, `login_am`, `logout_am`, `login_pm`, `logout_pm`, `remarks`) VALUES
(2, 9, '2021-10-17 04:53:13', '2021-10-17 04:53:20', '2021-10-17 04:53:24', '2021-10-17 04:53:29', NULL),
(3, 9, '2020-01-17 04:53:13', '2020-01-17 04:53:20', '2020-01-17 04:53:24', '2020-01-17 04:53:29', NULL),
(4, 9, '2020-02-17 04:53:13', '2020-02-17 04:53:20', '2020-02-17 04:53:24', '2020-02-17 04:53:29', NULL),
(5, 9, '0000-00-00 00:00:00', '2021-11-17 10:04:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'b'),
(6, 9, '2021-11-18 07:31:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 9, '2021-11-01 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'a'),
(8, 9, '2021-11-02 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'b'),
(9, 9, '2021-11-03 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'c');

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
(9, 'lyca@gmail.coma', '$2y$10$UW.iy/aAkXtDaN4rl.Dr3OuioERCK/5tJtX0nqz/pbmuNQgUQVokG', 'lyca', 'mamauag', 'banguilan', '0841682880', '2021-11-17 02:55:09', 1, '2021-11-17 10:12:36', 1, 'Manager', 'Finance', 'http://localhost/rfid2/assets/upload/198652970_503610534202585_4277288681848675400_n.jpg', 2, 0),
(10, 'bryan@localhost.com', '$2y$10$fWdBrhzAA6buUlFdn0GrXuTOfAC0g8Sh8eFE6tiiojCC8wMBbGeIe', 'bryan', 'banguilan', 'mamauag', '0859404274', '2021-11-17 02:57:55', 1, '2021-11-17 10:57:57', NULL, 'Secretary', 'Finance', 'http://localhost/rfid2/assets/upload/sig.png', 2, 0);

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
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
