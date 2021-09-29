-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 08:18 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aiis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `athletes_info`
--

CREATE TABLE `athletes_info` (
  `ATHLE_NO` int(11) NOT NULL,
  `ATHLE_ID` int(10) NOT NULL,
  `ATHLE_LNAME` char(50) NOT NULL,
  `ATHLE_FNAME` char(50) NOT NULL,
  `ATHLE_MNAME` char(50) NOT NULL,
  `ATHLE_AGE` int(11) NOT NULL,
  `ATHLE_SEX` char(6) NOT NULL,
  `ATHLE_ADDRESS` char(100) NOT NULL,
  `ATHLE_BDATE` date NOT NULL,
  `ATHLE_CONTNUM` varchar(11) NOT NULL,
  `ATHLE_DEPT_NAME` char(50) NOT NULL,
  `ATHLE_COURSE` char(50) NOT NULL,
  `ATHLE_YR_LVL` char(20) NOT NULL,
  `ATHLE_IMAGE` varchar(100) NOT NULL,
  `ATHLE_EVENT_CAT` char(20) NOT NULL,
  `ATHLE_STATUS` char(20) NOT NULL,
  `ATHLE_EMAIL` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `athletes_info`
--

INSERT INTO `athletes_info` (`ATHLE_NO`, `ATHLE_ID`, `ATHLE_LNAME`, `ATHLE_FNAME`, `ATHLE_MNAME`, `ATHLE_AGE`, `ATHLE_SEX`, `ATHLE_ADDRESS`, `ATHLE_BDATE`, `ATHLE_CONTNUM`, `ATHLE_DEPT_NAME`, `ATHLE_COURSE`, `ATHLE_YR_LVL`, `ATHLE_IMAGE`, `ATHLE_EVENT_CAT`, `ATHLE_STATUS`, `ATHLE_EMAIL`) VALUES
(1, 2014104051, 'Mariano', '   Nard', '   D', 20, 'Male', 'Tarlca city, San Vicente', '1997-04-10', '09123456789', 'CCS', 'Information Technology', '4rth', 'fate-stay-night-lancer-wallpapers-anime-wallpaper-arunnath-fate-stay-night-wallpaper-2017.jpg', 'Athletics', 'Student', 'a@gmail.com'),
(2, 2014104052, 'Nicosia', '  Dinard', '  D', 20, 'male', 'Tarlac city, san vicente', '1997-04-10', '09159799999', 'ccs', 'Information System', '4th', '249167.jpg', 'Swimming', 'current Enrolled', 'a@gmail.com'),
(3, 2014104053, 'Nicosia', 'Dinard', 'D', 20, 'male', 'Tarlac city, san vicente', '1997-04-10', '09159799999', 'ccs', 'Infor', '4th', 'sss.jpg', 'Athletics', 'Eurrent Enrolled', 'a@gmail.com'),
(4, 2014104054, 'Nicosia', 'Dinard', 'D', 20, 'male', 'Tarlac city, san vicente', '1997-04-10', '09159799999', 'ccs', 'Infor', '4th', 'sss.jpg', 'Athletics', 'Eurrent Enrolled', 'a@gmail.com'),
(5, 2014104055, 'Nicosia', 'Dinard', 'D', 20, 'male', 'Tarlac city, san vicente', '1997-04-10', '09159799999', 'ccs', 'Infor', '4th', 'sss.jpg', 'Athletics', 'Eurrent Enrolled', 'a@gmail.com'),
(6, 2014104056, 'Nicosia', 'Dinard', 'D', 20, 'male', 'Tarlac city, san vicente', '1997-04-10', '09159799999', 'ccs', 'Infor', '4th', 'sss.jpg', 'Taekwondo', 'Eurrent Enrolled', 'a@gmail.com'),
(7, 2014104057, 'Nicosia', 'Dinard', 'D', 20, 'male', 'Tarlac city, san vicente', '1997-04-10', '09159799999', 'ccs', 'Infor', '4th', 'sss.jpg', 'Swimming', 'Eurrent Enrolled', 'a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `athletes_info_achievements`
--

CREATE TABLE `athletes_info_achievements` (
  `ACHIE_NO` int(11) NOT NULL,
  `ATHLE_ID` int(10) NOT NULL,
  `ACHIE_NAME` char(50) NOT NULL,
  `ACHIE_PLACES` char(50) NOT NULL,
  `ACHIE_EVENT` char(50) NOT NULL,
  `ACHIE_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `athletes_info_injury`
--

CREATE TABLE `athletes_info_injury` (
  `INJ_NO` int(11) NOT NULL,
  `ATHLE_ID` int(10) NOT NULL,
  `INJ_NAME` char(50) NOT NULL,
  `INJ_PLACE` char(50) NOT NULL,
  `INJ_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `athletes_info_performance`
--

CREATE TABLE `athletes_info_performance` (
  `PERF_NO` int(11) NOT NULL,
  `ATHLE_ID` int(11) NOT NULL,
  `PERF_ACTION` char(50) NOT NULL,
  `PERF_EVENTS` char(50) NOT NULL,
  `PERF_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `athletes_info_performance`
--

INSERT INTO `athletes_info_performance` (`PERF_NO`, `ATHLE_ID`, `PERF_ACTION`, `PERF_EVENTS`, `PERF_DATE`) VALUES
(1, 2014104051, '45 cm', 'high jump', '2017-11-01'),
(3, 2014104051, '1 minutes', 'Running', '2017-12-31'),
(9, 2014104051, '1 minutes', 'Running', '2017-12-31'),
(10, 2014104051, '1 minutes', 'Running', '2017-12-31'),
(11, 2014104051, '1 minutes', 'Running', '2016-12-30'),
(12, 2014104051, '1 minutes', 'Running', '2015-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `barrower_date`
--

CREATE TABLE `barrower_date` (
  `BARR_DATE_ID` int(11) NOT NULL,
  `BARR_ID` int(11) NOT NULL,
  `BARR_DATE` datetime NOT NULL,
  `BARR_DATE_RES` datetime NOT NULL,
  `BARR_DATE_DEADL` date NOT NULL,
  `BARR_DATE_WARNING` char(5) NOT NULL,
  `BARR_DATE_STATUS` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barrower_date`
--

INSERT INTO `barrower_date` (`BARR_DATE_ID`, `BARR_ID`, `BARR_DATE`, `BARR_DATE_RES`, `BARR_DATE_DEADL`, `BARR_DATE_WARNING`, `BARR_DATE_STATUS`) VALUES
(16, 2014102257, '2017-11-11 22:58:04', '0000-00-00 00:00:00', '2017-11-14', 'OFF', 'FALSE'),
(17, 2014102257, '2017-11-11 23:59:18', '0000-00-00 00:00:00', '2017-11-14', 'OFF', 'TRUE'),
(18, 111111111, '2017-11-12 00:20:47', '0000-00-00 00:00:00', '2017-11-15', 'OFF', 'TRUE'),
(19, 2014102257, '2017-11-13 02:32:38', '0000-00-00 00:00:00', '2017-11-16', 'OFF', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `barrower_info`
--

CREATE TABLE `barrower_info` (
  `BARR_ID` int(11) NOT NULL,
  `BARR_FNAME` char(50) NOT NULL,
  `BARR_LNAME` char(50) NOT NULL,
  `BARR_MNAME` char(5) NOT NULL,
  `BARR_STATUS` char(50) NOT NULL,
  `BARR_ADDRS` varchar(100) NOT NULL,
  `BARR_REG_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barrower_info`
--

INSERT INTO `barrower_info` (`BARR_ID`, `BARR_FNAME`, `BARR_LNAME`, `BARR_MNAME`, `BARR_STATUS`, `BARR_ADDRS`, `BARR_REG_DATE`) VALUES
(111111111, 'Dinard', 'Nicosia', 'D', 'NONE', 'Tarlac city, San vicente', '2017-11-11 22:02:22'),
(2014102257, 'Dinard', 'Mariano', 'Jr', 'NONE', 'Tarlac city, San vicente', '2017-11-11 22:03:07'),
(2147483647, 'Xander', 'Ford', 'S', 'NONE', 'Tarlac city, San vicente', '2017-11-11 22:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `borrower_equipment_info`
--

CREATE TABLE `borrower_equipment_info` (
  `BARR_EQP_ID` int(11) NOT NULL,
  `BARR_ID` int(11) NOT NULL,
  `EQP_ID` int(11) NOT NULL,
  `BARR_DATE_ID` int(11) NOT NULL,
  `BARR_EQP_QUANTITY` int(11) NOT NULL,
  `BARR_EQP_NAME` char(50) NOT NULL,
  `BARR_EQP_TYPE` char(50) NOT NULL,
  `BARR_EQP_STATUS` char(50) NOT NULL,
  `BARR_EQP_DESC` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower_equipment_info`
--

INSERT INTO `borrower_equipment_info` (`BARR_EQP_ID`, `BARR_ID`, `EQP_ID`, `BARR_DATE_ID`, `BARR_EQP_QUANTITY`, `BARR_EQP_NAME`, `BARR_EQP_TYPE`, `BARR_EQP_STATUS`, `BARR_EQP_DESC`) VALUES
(54, 2014102257, 14, 16, 1, 'Ball', 'Volleyball', 'RESTORED', 'asdasdasd'),
(55, 2014102257, 13, 16, 1, 'Jersey Short', 'Basketball', 'RESTORED', 'adasdadas'),
(56, 2014102257, 12, 16, 1, 'Jersey', 'Basketball', 'RESTORED', 'sdsadsadasd'),
(57, 2014102257, 11, 16, 1, 'Net', 'Basketball', 'RESTORED', 'asdasasdas'),
(58, 2014102257, 6, 16, 12, 'Kicking pad', 'Taekwondo', 'RESTORED', 'dasdasdasd'),
(59, 2014102257, 9, 16, 8, 'Sock', 'Taekwondo', 'RESTORED', 'asdadasdasdas'),
(60, 2014102257, 33, 19, 1, 'Ball', 'Basketball', 'RESTORED', '2213213');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_info`
--

CREATE TABLE `equipment_info` (
  `EQP_ID` int(11) NOT NULL,
  `EQP_NAME` char(50) NOT NULL,
  `EQP_DESC` varchar(100) NOT NULL,
  `EQP_TYPE` char(50) NOT NULL,
  `EQP_QUANTITY` int(11) NOT NULL,
  `EQP_USABLE` int(11) NOT NULL,
  `EQP_BARROWED` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_info`
--

INSERT INTO `equipment_info` (`EQP_ID`, `EQP_NAME`, `EQP_DESC`, `EQP_TYPE`, `EQP_QUANTITY`, `EQP_USABLE`, `EQP_BARROWED`) VALUES
(33, 'Ball', '12', 'Basketball', 200, 200, 0),
(34, 'Ball', '12', 'Volleyball', 35, 35, 0),
(35, 'Ball', '12', 'Soccer', 139, 139, 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_item`
--

CREATE TABLE `equipment_item` (
  `ITEM_ID` int(11) NOT NULL,
  `EQP_ID` int(11) NOT NULL,
  `ITEM_NAME` char(50) NOT NULL,
  `ITEM_BRAND` char(50) NOT NULL,
  `ITEM_QUANTITY` int(11) NOT NULL,
  `ITEM_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_item`
--

INSERT INTO `equipment_item` (`ITEM_ID`, `EQP_ID`, `ITEM_NAME`, `ITEM_BRAND`, `ITEM_QUANTITY`, `ITEM_DATE`) VALUES
(36, 35, 'Ball', 'Asd', 12, '2017-11-23'),
(37, 35, 'Ball', 'asdasd', 23, '2017-11-08'),
(38, 33, 'Ball', '', 102, '0000-00-00'),
(39, 33, 'Ball', '', 146, '0000-00-00'),
(40, 33, 'Ball', '', 146, '0000-00-00'),
(41, 33, 'Ball', '', 178, '0000-00-00'),
(42, 33, 'Ball', '', 201, '0000-00-00'),
(43, 35, 'Ball', 'asdasd', 23, '2017-11-08'),
(44, 35, 'Ball', 'asdasd', 23, '2017-11-08'),
(45, 35, 'Ball', 'asdasd', 23, '2017-11-08'),
(46, 35, 'Ball', 'asdasd', 23, '2017-11-08'),
(47, 34, 'Ball', 'asds', 0, '2017-11-09'),
(48, 35, 'Ball', 'sadasd', 12, '2017-11-15'),
(49, 34, 'Ball', 'dasdasd', 11, '2017-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `sdmo_audit`
--

CREATE TABLE `sdmo_audit` (
  `AUDIT_NO` int(11) NOT NULL,
  `AUDIT_DESC` char(255) NOT NULL,
  `AUDIT_ACTION` char(10) NOT NULL,
  `AUDIT_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdmo_audit`
--

INSERT INTO `sdmo_audit` (`AUDIT_NO`, `AUDIT_DESC`, `AUDIT_ACTION`, `AUDIT_DATE`) VALUES
(1, 'The admin ADD in Equipment ID Ball', 'ADD', '2017-11-04 22:23:01'),
(2, 'The admin ADD BARROWER information ID 3', 'ADD', '2017-11-04 22:50:11'),
(3, 'The admin ADD in Athletes information ID 2014104051', 'ADD', '2017-11-06 08:27:41'),
(4, 'The admin add in Athlete information ID:  2014104051', 'UPDATED', '2017-11-06 08:28:44'),
(5, 'The admin add in Athlete information ID:  2014104051', 'UPDATED', '2017-11-07 11:05:35'),
(6, 'The admin ADD Equipment', 'ADD', '2017-11-07 11:10:52'),
(7, 'The admin ADD Equipment', 'ADD', '2017-11-07 11:11:44'),
(8, 'The admin add in Athlete information ID:  2014104051', 'UPDATED', '2017-11-08 07:05:18'),
(9, 'The admin add in Athlete information ID:  2014104052', 'UPDATED', '2017-11-08 07:05:55'),
(10, 'The admin add in Athlete information ID:  2014104052', 'UPDATED', '2017-11-08 07:06:32'),
(11, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-08 07:24:28'),
(12, 'The admin ADD in Logs information ID 2014104051', 'ADD', '2017-11-08 07:27:09'),
(13, ' 2014104051 logged to system', 'LOGGED-IN', '2017-11-08 07:27:24'),
(14, ' 2014104051 logged to system', 'LOGGED-IN', '2017-11-08 07:32:43'),
(15, ' 2014104051 logged to system', 'LOGGED-IN', '2017-11-08 07:38:33'),
(16, ' 2014104051 logged to system', 'LOGGED-IN', '2017-11-08 07:40:18'),
(17, ' 2014104051 logged to system', 'LOGGED-IN', '2017-11-08 07:40:23'),
(18, 'The admin add in calendar name TSU SUCIII', 'ADD', '2017-11-08 07:45:07'),
(19, 'The admin add in calendar name TSU SUCIII', 'ADD', '2017-11-08 07:45:07'),
(20, 'The admin add in calendar name INTRAMS', 'ADD', '2017-11-08 07:48:42'),
(21, 'The admin Update in calendar name INTRAMS', 'UPDATED', '2017-11-08 07:48:42'),
(22, 'The admin add in calendar name DINARD', 'ADD', '2017-11-09 04:07:19'),
(23, 'The admin add in calendar name TSU SUCIII', 'ADD', '2017-11-13 04:12:59'),
(24, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-20 04:21:44'),
(25, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-20 04:21:50'),
(26, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-20 04:21:56'),
(27, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-20 04:22:04'),
(28, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-20 04:22:09'),
(29, 'The admin add in calendar name INTRAMS', 'ADD', '2017-11-09 04:38:24'),
(30, 'The admin add in calendar name A', 'ADD', '2017-11-09 04:51:52'),
(31, 'The admin add in calendar name B', 'ADD', '2017-11-09 04:52:17'),
(32, 'The admin add in calendar name C', 'ADD', '2017-11-09 04:52:43'),
(33, 'The admin add in calendar name A', 'ADD', '2017-11-09 04:55:11'),
(34, 'The admin add in calendar name B', 'ADD', '2017-11-09 04:55:29'),
(35, 'The admin add in calendar name SUCIII', 'ADD', '2017-11-09 05:45:05'),
(36, 'The admin add in calendar name SUCIII', 'ADD', '2017-11-09 05:46:04'),
(37, 'The admin add in calendar name SUCIII', 'ADD', '2017-11-09 05:47:31'),
(38, 'The admin add in calendar name SUCIII', 'ADD', '2017-11-09 05:49:55'),
(39, 'The admin add in calendar name INTRAMS', 'ADD', '2017-11-09 05:57:12'),
(40, 'The admin add in calendar name INTRAMS', 'ADD', '2017-11-09 05:57:18'),
(41, 'The admin add in calendar name INTRAMS', 'ADD', '2017-11-09 05:57:27'),
(42, 'The admin add in calendar name aa', 'ADD', '2017-11-09 05:57:51'),
(43, 'The admin add in calendar name aa', 'ADD', '2017-11-09 05:57:57'),
(44, 'The admin add in calendar name aa', 'ADD', '2017-11-09 05:58:01'),
(45, 'The admin add in calendar name INTRAMS', 'ADD', '2017-11-09 06:03:41'),
(46, 'The admin add in calendar name INTRAMS', 'ADD', '2017-11-09 06:03:46'),
(47, 'The admin add in calendar name INTRAMS', 'ADD', '2017-11-09 06:03:53'),
(48, 'The admin add in calendar name SUCIII', 'ADD', '2017-11-09 06:05:39'),
(49, 'The admin add in calendar name SUCIII', 'ADD', '2017-11-09 06:12:51'),
(50, 'The admin add in calendar name SUCIII', 'ADD', '2017-11-09 06:12:56'),
(51, 'The admin add in calendar name aaaa', 'ADD', '2017-11-09 06:14:02'),
(52, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-12 06:55:54'),
(53, 'The admin Barrowed Equipment Barrower ID:2014101041', 'ADD', '2017-11-12 06:56:52'),
(54, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-12 06:59:35'),
(55, 'The admin Barrowed Equipment Barrower ID:2014101033', 'ADD', '2017-11-12 07:02:20'),
(56, 'The admin Barrowed Equipment Barrower ID:2014101033', 'ADD', '2017-11-12 07:02:35'),
(57, 'The admin Barrowed Equipment Barrower ID:2014101033', 'ADD', '2017-11-12 07:02:40'),
(58, 'The admin Barrowed Equipment Barrower ID:2014101041', 'ADD', '2017-11-12 07:03:18'),
(59, 'The admin Barrowed Equipment Barrower ID:2014101041', 'ADD', '2017-11-12 07:03:39'),
(60, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-12 08:14:33'),
(61, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-12 08:14:46'),
(62, 'The admin Barrowed Equipment Barrower ID:2014101041', 'ADD', '2017-11-12 08:15:27'),
(63, 'The admin Barrowed Equipment Barrower ID:2014101041', 'ADD', '2017-11-12 08:15:38'),
(64, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-12 08:16:27'),
(65, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-12 08:18:52'),
(66, 'The admin ADD in Logs information ID 2014104051', 'ADD', '2017-11-10 06:48:17'),
(67, 'The admin ADD in Logs information ID 2014104051', 'ADD', '2017-11-10 06:52:53'),
(68, 'The admin ADD in Logs information ID 2014104051', 'ADD', '2017-11-11 06:01:27'),
(69, 'The admin ADD in Logs information ID 2014104052', 'ADD', '2017-11-11 06:34:54'),
(70, 'The admin ADD Equipment', 'ADD', '2017-11-11 08:53:34'),
(71, 'The admin ADD Equipment', 'ADD', '2017-11-11 08:54:06'),
(72, 'The admin ADD Equipment', 'ADD', '2017-11-11 08:55:42'),
(73, 'The admin ADD Equipment', 'ADD', '2017-11-11 08:56:29'),
(74, 'The admin ADD Equipment', 'ADD', '2017-11-11 08:56:50'),
(75, 'The admin ADD Equipment', 'ADD', '2017-11-11 08:57:05'),
(76, 'The admin ADD Equipment', 'ADD', '2017-11-11 08:57:43'),
(77, 'The admin ADD Equipment', 'ADD', '2017-11-11 08:58:05'),
(78, 'The admin ADD Equipment', 'ADD', '2017-11-11 08:58:31'),
(79, 'The admin ADD Equipment', 'ADD', '2017-11-11 08:58:41'),
(80, 'The admin ADD in Logs information ID 2014104051', 'ADD', '2017-11-11 09:00:49'),
(81, 'The admin ADD in Logs information ID 2014102257', 'ADD', '2017-11-11 09:01:00'),
(82, 'The admin Barrowed Equipment Barrower ID:2014101040', 'ADD', '2017-11-11 10:26:19'),
(83, 'The admin ADD in Logs information ID 2014102256', 'ADD', '2017-11-11 19:18:57'),
(84, 'The admin ADD in Logs information ID 2014104051', 'ADD', '2017-11-11 19:46:47'),
(85, 'The admin ADD in Logs information ID 2014102257', 'ADD', '2017-11-11 19:46:55'),
(86, 'The admin ADD in Logs information ID 111111111', 'ADD', '2017-11-11 22:02:22'),
(87, 'The admin ADD in Logs information ID 2222222222', 'ADD', '2017-11-11 22:02:43'),
(88, 'The admin ADD in Logs information ID 2014102257', 'ADD', '2017-11-11 22:03:07'),
(89, 'The admin ADD Equipment', 'ADD', '2017-11-12 01:48:10'),
(90, 'The admin ADD Equipment', 'ADD', '2017-11-12 01:52:26'),
(91, 'The admin ADD Equipment', 'ADD', '2017-11-12 01:53:32'),
(92, 'The admin ADD Equipment', 'ADD', '2017-11-12 01:54:30'),
(93, 'The admin add in calendar name now', 'ADD', '2017-11-12 04:37:50'),
(94, 'The admin ADD Equipment', 'ADD', '2017-11-13 00:55:50'),
(95, 'The admin ADD Equipment', 'ADD', '2017-11-13 00:57:57'),
(96, 'The admin ADD Equipment', 'ADD', '2017-11-13 00:58:02'),
(97, 'The admin ADD Equipment', 'ADD', '2017-11-13 00:59:44'),
(98, 'The admin ADD Equipment', 'ADD', '2017-11-13 00:59:49'),
(99, 'The admin ADD Equipment', 'ADD', '2017-11-13 01:01:18'),
(100, 'The admin ADD Equipment ID:', 'ADD', '2017-11-13 01:07:12'),
(101, 'The admin update in Equipment information quantity ID', 'UPDATED', '2017-11-13 01:12:21'),
(102, 'The admin ADD Equipment', 'ADD', '2017-11-13 01:18:09'),
(103, 'The admin ADD Equipment', 'ADD', '2017-11-13 01:22:38'),
(104, 'The admin ADD Equipment', 'ADD', '2017-11-13 01:22:58'),
(105, 'The admin ADD Equipment', 'ADD', '2017-11-13 01:23:54'),
(106, 'The admin ADD Equipment', 'ADD', '2017-11-13 01:25:28'),
(107, 'The admin ADD Equipment', 'ADD', '2017-11-13 01:25:40'),
(108, 'The admin ADD Equipment', 'ADD', '2017-11-13 01:26:50'),
(109, 'The admin update in Equipment information quantity ID 33', 'UPDATED', '2017-11-13 01:27:17'),
(110, 'The admin update in Equipment information quantity ID 33', 'UPDATED', '2017-11-13 01:27:33'),
(111, 'The admin ADD Equipment', 'ADD', '2017-11-13 01:39:58'),
(112, 'The admin ADD Equipment', 'ADD', '2017-11-13 01:45:48'),
(113, 'The admin update in Equipment information quantity ID 35', 'UPDATED', '2017-11-13 01:57:58'),
(114, 'The admin update in Equipment information quantity ID 33', 'UPDATED', '2017-11-13 02:07:53'),
(115, 'The admin update in Equipment information quantity ID 33', 'UPDATED', '2017-11-13 02:08:36'),
(116, 'The admin update in Equipment information quantity ID 33', 'UPDATED', '2017-11-13 02:08:50'),
(117, 'The admin update in Equipment information quantity ID 33', 'UPDATED', '2017-11-13 02:09:24'),
(118, 'The admin update in Equipment information quantity ID 33', 'UPDATED', '2017-11-13 02:09:34'),
(119, 'The admin update in Equipment information ID 33', 'UPDATED', '2017-11-13 02:10:03'),
(120, 'The admin update in Equipment information quantity ID 35', 'UPDATED', '2017-11-13 02:27:09'),
(121, 'The admin update in Equipment information quantity ID 35', 'UPDATED', '2017-11-13 02:27:13'),
(122, 'The admin update in Equipment information quantity ID 35', 'UPDATED', '2017-11-13 02:27:24'),
(123, 'The admin update in Equipment information quantity ID 35', 'UPDATED', '2017-11-13 02:27:36'),
(124, 'The admin update in Equipment information quantity ID 34', 'UPDATED', '2017-11-13 02:28:40'),
(125, 'The admin update in Equipment information quantity ID 35', 'UPDATED', '2017-11-13 02:30:01'),
(126, 'The admin update in Equipment information quantity ID 34', 'UPDATED', '2017-11-13 02:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `sdmo_calendar`
--

CREATE TABLE `sdmo_calendar` (
  `CAL_NO` int(11) NOT NULL,
  `CAL_TITLE` char(50) NOT NULL,
  `CAL_EVENT` char(100) NOT NULL,
  `CAL_START` date NOT NULL,
  `CAL_END` date NOT NULL,
  `CAL_STATUS` char(50) NOT NULL,
  `CAL_WARNING` char(3) NOT NULL,
  `CAL_WAR_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdmo_calendar`
--

INSERT INTO `sdmo_calendar` (`CAL_NO`, `CAL_TITLE`, `CAL_EVENT`, `CAL_START`, `CAL_END`, `CAL_STATUS`, `CAL_WARNING`, `CAL_WAR_DATE`) VALUES
(8, 'A', 'A', '2017-11-09', '2017-11-11', 'END', 'ON', '2017-11-12'),
(9, 'B', 'B', '2017-11-11', '2017-11-13', 'END', 'OFF', '2017-11-14'),
(10, 'SUCIII', ' need all TSU athletes', '2017-11-12', '2017-11-15', 'ONGOING', '', '0000-00-00'),
(11, 'INTRAMS', 'aaa', '2017-11-16', '2017-11-17', 'PENDING', '', '0000-00-00'),
(12, 'INTRAMS', 'aaa', '2017-11-16', '2017-11-17', 'PENDING', '', '0000-00-00'),
(13, 'INTRAMS', 'aaa', '2017-11-16', '2017-11-17', 'PENDING', '', '0000-00-00'),
(14, 'INTRAMS', 'memos', '2017-11-18', '2017-11-20', 'PENDING', '', '0000-00-00'),
(15, 'INTRAMS', 'memos', '2017-11-18', '2017-11-20', 'PENDING', '', '0000-00-00'),
(16, 'INTRAMS', 'memos', '2017-11-18', '2017-11-20', 'PENDING', '', '0000-00-00'),
(17, 'SUCIII', ' sss', '2017-11-24', '2017-11-25', 'PENDING', '', '0000-00-00'),
(18, 'SUCIII', 'aaaaa', '2017-12-01', '2017-12-01', 'PENDING', '', '0000-00-00'),
(19, 'SUCIII', 'aaaaa', '2017-12-01', '2017-12-01', 'PENDING', '', '0000-00-00'),
(20, 'aaaa', 'sssss', '2017-11-04', '2017-11-06', 'END', '', '0000-00-00'),
(21, 'now', 'now', '2017-11-14', '2017-11-16', 'PENDING', 'OFF', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sdmo_logs`
--

CREATE TABLE `sdmo_logs` (
  `LOGS_NUMBER` int(11) NOT NULL,
  `USER_ID` char(10) NOT NULL,
  `LOGS_NAME` char(100) NOT NULL,
  `LOGS_DATE_IN` datetime NOT NULL,
  `LOGS_DATE_OUT` datetime NOT NULL,
  `LOGS_ADDR` char(100) NOT NULL,
  `LOGS_STATUS` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdmo_logs`
--

INSERT INTO `sdmo_logs` (`LOGS_NUMBER`, `USER_ID`, `LOGS_NAME`, `LOGS_DATE_IN`, `LOGS_DATE_OUT`, `LOGS_ADDR`, `LOGS_STATUS`) VALUES
(1, '2014104051', 'Dinard Mariano', '2017-11-08 07:27:24', '2017-11-08 07:40:11', 'Tarlac city, San vicente', 'OUT'),
(2, '2014104051', 'Dinard Mariano', '2017-11-08 07:38:33', '2017-11-08 07:39:30', 'Tarlac city, San vicente', 'OUT'),
(3, '2014104051', 'Dinard Mariano', '2017-11-08 07:40:17', '2017-11-08 07:40:26', 'Tarlac city, San vicente', 'OUT'),
(4, '2014104051', 'Dinard Mariano', '2017-11-08 07:40:23', '2017-11-08 07:40:28', 'Tarlac city, San vicente', 'OUT'),
(5, '2014104051', 'Dinard Nicosia', '2017-11-10 07:09:44', '0000-00-00 00:00:00', 'Tarlac city, San vicente', ''),
(6, '2014104051', 'Dinard Nicosia', '2017-11-10 07:24:53', '0000-00-00 00:00:00', 'Tarlac city, San vicente', ''),
(7, '2014104051', 'Dinard Nicosia', '2017-11-10 07:25:29', '0000-00-00 00:00:00', 'Tarlac city, San vicente', '');

-- --------------------------------------------------------

--
-- Table structure for table `sdmo_logs_user`
--

CREATE TABLE `sdmo_logs_user` (
  `USER_ID` char(10) NOT NULL,
  `USER_FNAME` char(50) NOT NULL,
  `USER_LNAME` char(50) NOT NULL,
  `USER_MNAME` char(5) NOT NULL,
  `USER_ADDR` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdmo_logs_user`
--

INSERT INTO `sdmo_logs_user` (`USER_ID`, `USER_FNAME`, `USER_LNAME`, `USER_MNAME`, `USER_ADDR`) VALUES
('2014104051', 'Dinard', 'Mariano', 'N', 'Tarlac city, San vicente');

-- --------------------------------------------------------

--
-- Table structure for table `sdmo_user`
--

CREATE TABLE `sdmo_user` (
  `USER_ID` char(10) NOT NULL,
  `USER_PASS` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athletes_info`
--
ALTER TABLE `athletes_info`
  ADD PRIMARY KEY (`ATHLE_NO`),
  ADD UNIQUE KEY `ATHLE_ID` (`ATHLE_ID`);

--
-- Indexes for table `athletes_info_achievements`
--
ALTER TABLE `athletes_info_achievements`
  ADD PRIMARY KEY (`ACHIE_NO`),
  ADD KEY `ATHLE_ID` (`ATHLE_ID`);

--
-- Indexes for table `athletes_info_injury`
--
ALTER TABLE `athletes_info_injury`
  ADD PRIMARY KEY (`INJ_NO`),
  ADD KEY `ATHLE_ID` (`ATHLE_ID`);

--
-- Indexes for table `athletes_info_performance`
--
ALTER TABLE `athletes_info_performance`
  ADD PRIMARY KEY (`PERF_NO`),
  ADD KEY `ATHLE_ID` (`ATHLE_ID`);

--
-- Indexes for table `barrower_date`
--
ALTER TABLE `barrower_date`
  ADD PRIMARY KEY (`BARR_DATE_ID`),
  ADD KEY `BARR_ID` (`BARR_ID`);

--
-- Indexes for table `barrower_info`
--
ALTER TABLE `barrower_info`
  ADD PRIMARY KEY (`BARR_ID`);

--
-- Indexes for table `borrower_equipment_info`
--
ALTER TABLE `borrower_equipment_info`
  ADD PRIMARY KEY (`BARR_EQP_ID`),
  ADD KEY `BARR_ID` (`BARR_ID`),
  ADD KEY `EQP_ID` (`EQP_ID`),
  ADD KEY `BARR_DATE_ID` (`BARR_DATE_ID`);

--
-- Indexes for table `equipment_info`
--
ALTER TABLE `equipment_info`
  ADD PRIMARY KEY (`EQP_ID`);

--
-- Indexes for table `equipment_item`
--
ALTER TABLE `equipment_item`
  ADD PRIMARY KEY (`ITEM_ID`),
  ADD KEY `EQP_ID` (`EQP_ID`);

--
-- Indexes for table `sdmo_audit`
--
ALTER TABLE `sdmo_audit`
  ADD PRIMARY KEY (`AUDIT_NO`);

--
-- Indexes for table `sdmo_calendar`
--
ALTER TABLE `sdmo_calendar`
  ADD PRIMARY KEY (`CAL_NO`);

--
-- Indexes for table `sdmo_logs`
--
ALTER TABLE `sdmo_logs`
  ADD PRIMARY KEY (`LOGS_NUMBER`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `sdmo_logs_user`
--
ALTER TABLE `sdmo_logs_user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `sdmo_user`
--
ALTER TABLE `sdmo_user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athletes_info`
--
ALTER TABLE `athletes_info`
  MODIFY `ATHLE_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `athletes_info_achievements`
--
ALTER TABLE `athletes_info_achievements`
  MODIFY `ACHIE_NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `athletes_info_injury`
--
ALTER TABLE `athletes_info_injury`
  MODIFY `INJ_NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `athletes_info_performance`
--
ALTER TABLE `athletes_info_performance`
  MODIFY `PERF_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `barrower_date`
--
ALTER TABLE `barrower_date`
  MODIFY `BARR_DATE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `borrower_equipment_info`
--
ALTER TABLE `borrower_equipment_info`
  MODIFY `BARR_EQP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `equipment_info`
--
ALTER TABLE `equipment_info`
  MODIFY `EQP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `equipment_item`
--
ALTER TABLE `equipment_item`
  MODIFY `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `sdmo_audit`
--
ALTER TABLE `sdmo_audit`
  MODIFY `AUDIT_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `sdmo_calendar`
--
ALTER TABLE `sdmo_calendar`
  MODIFY `CAL_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `sdmo_logs`
--
ALTER TABLE `sdmo_logs`
  MODIFY `LOGS_NUMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `athletes_info_achievements`
--
ALTER TABLE `athletes_info_achievements`
  ADD CONSTRAINT `athletes_info_achievements_ibfk_1` FOREIGN KEY (`ATHLE_ID`) REFERENCES `athletes_info` (`ATHLE_ID`);

--
-- Constraints for table `athletes_info_injury`
--
ALTER TABLE `athletes_info_injury`
  ADD CONSTRAINT `athletes_info_injury_ibfk_1` FOREIGN KEY (`ATHLE_ID`) REFERENCES `athletes_info` (`ATHLE_ID`);

--
-- Constraints for table `athletes_info_performance`
--
ALTER TABLE `athletes_info_performance`
  ADD CONSTRAINT `athletes_info_performance_ibfk_1` FOREIGN KEY (`ATHLE_ID`) REFERENCES `athletes_info` (`ATHLE_ID`);

--
-- Constraints for table `borrower_equipment_info`
--
ALTER TABLE `borrower_equipment_info`
  ADD CONSTRAINT `borrower_equipment_info_ibfk_1` FOREIGN KEY (`BARR_ID`) REFERENCES `barrower_info` (`BARR_ID`),
  ADD CONSTRAINT `borrower_equipment_info_ibfk_3` FOREIGN KEY (`EQP_ID`) REFERENCES `equipment_info` (`EQP_ID`),
  ADD CONSTRAINT `borrower_equipment_info_ibfk_4` FOREIGN KEY (`BARR_DATE_ID`) REFERENCES `barrower_date` (`BARR_DATE_ID`);

--
-- Constraints for table `equipment_item`
--
ALTER TABLE `equipment_item`
  ADD CONSTRAINT `equipment_item_ibfk_1` FOREIGN KEY (`EQP_ID`) REFERENCES `equipment_info` (`EQP_ID`);

--
-- Constraints for table `sdmo_logs`
--
ALTER TABLE `sdmo_logs`
  ADD CONSTRAINT `sdmo_logs_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `sdmo_logs_user` (`USER_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
