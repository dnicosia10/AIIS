-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 06:16 PM
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
(1, 2014104051, 'Nicosia', 'Dinard', 'N', 20, 'Male', 'Tarlca city, san vicente', '1997-04-10', '09111111111', 'Ccs', 'Information technology', 'Fourth year', 'joker-arkham-city-wallpaper-0.jpg', 'Taekwondo', 'Current enrolled', 'D@gmail.com'),
(2, 2014102257, 'Mariano', 'Sandug', 'N', 20, 'Female', 'Tarlca city, san vicente', '2016-11-30', '099999999', 'Ccs', 'Information technology', 'First year', 'fate-stay-night-lancer-wallpapers-anime-wallpaper-arunnath-fate-stay-night-wallpaper-2017.jpg', 'Arnis', 'Graduated', 'a@gmail.com'),
(3, 2014104059, 'Sada', '  Sad', '  S', 15, 'Female', 'Tarlca city, san vicente', '2014-11-30', '0999111112', 'Cass', 'Architech', 'Third year', 'akame ga kill.jpg', 'Billiards', 'Under-graduate', 'aaa@gamail.com');

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
(1, 2014104051, '2017-11-14 23:21:48', '0000-00-00 00:00:00', '2017-11-17', 'OFF', 'TRUE'),
(2, 2014104051, '2017-11-14 23:22:00', '0000-00-00 00:00:00', '2017-11-17', 'OFF', 'FALSE'),
(3, 2014104051, '2017-11-14 23:23:56', '0000-00-00 00:00:00', '2017-11-17', 'OFF', 'FALSE'),
(4, 2014104051, '2017-11-14 23:52:40', '0000-00-00 00:00:00', '2017-11-17', 'OFF', 'FALSE'),
(5, 2014104051, '2017-11-15 00:01:45', '0000-00-00 00:00:00', '2017-11-18', 'OFF', 'FALSE'),
(6, 2014104051, '2017-11-15 00:03:05', '0000-00-00 00:00:00', '2017-11-18', 'OFF', 'FALSE'),
(7, 2014104051, '2017-11-15 00:04:02', '0000-00-00 00:00:00', '2017-11-18', 'OFF', 'FALSE'),
(8, 2014104051, '2017-11-15 00:10:57', '0000-00-00 00:00:00', '2017-11-18', 'OFF', 'FALSE'),
(9, 2014104051, '2017-11-15 00:24:59', '0000-00-00 00:00:00', '2017-11-18', 'OFF', 'TRUE'),
(10, 2014104051, '2017-11-15 00:27:40', '0000-00-00 00:00:00', '2017-11-18', 'OFF', 'TRUE'),
(11, 2014104051, '2017-11-15 00:28:43', '0000-00-00 00:00:00', '2017-11-18', 'OFF', 'TRUE'),
(12, 2014104051, '2017-11-15 00:38:54', '0000-00-00 00:00:00', '2017-11-18', 'OFF', 'FALSE'),
(13, 2014104051, '2017-11-15 00:39:15', '0000-00-00 00:00:00', '2017-11-18', 'OFF', 'FALSE');

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
(2014104051, 'Dinard', 'Nicosia', 'N', 'NONE', 'Tarlac city, San vicente', '2017-11-14 23:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `borrower_equipment_info`
--

CREATE TABLE `borrower_equipment_info` (
  `BARR_EQP_ID` int(11) NOT NULL,
  `BARR_ID` int(11) NOT NULL,
  `EQP_ID` int(11) NOT NULL,
  `BARR_DATE_ID` int(11) NOT NULL,
  `BARR_EQP_RECIEVED` char(50) NOT NULL,
  `BARR_EQP_QUANTITY` int(11) NOT NULL,
  `BARR_EQP_NAME` char(50) NOT NULL,
  `BARR_EQP_TYPE` char(50) NOT NULL,
  `BARR_EQP_STATUS` char(50) NOT NULL,
  `BARR_EQP_DESC` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower_equipment_info`
--

INSERT INTO `borrower_equipment_info` (`BARR_EQP_ID`, `BARR_ID`, `EQP_ID`, `BARR_DATE_ID`, `BARR_EQP_RECIEVED`, `BARR_EQP_QUANTITY`, `BARR_EQP_NAME`, `BARR_EQP_TYPE`, `BARR_EQP_STATUS`, `BARR_EQP_DESC`) VALUES
(2, 2014104051, 4, 2, '', 3, 'Kicking pad', 'Taekwondo', 'RESTORED', '233'),
(3, 2014104051, 3, 2, '', 3, 'Ball', 'Basketball', 'RESTORED', 'ssss'),
(4, 2014104051, 3, 3, '', 11, 'Ball', 'Basketball', 'RESTORED', 'ssss'),
(5, 2014104051, 4, 3, 'dinard', 2, 'Kicking pad', 'Taekwondo', 'RESTORED', 'sssss'),
(6, 2014104051, 3, 4, 'Sao', 2, 'Ball', 'Basketball', 'RESTORED', 'sdsdd'),
(7, 2014104051, 3, 5, 'SSS', 2, 'Ball', 'Basketball', 'RESTORED', 'SSSS'),
(8, 2014104051, 4, 5, 'DDDD', 3, 'Kicking pad', 'Taekwondo', 'RESTORED', 'DDDD'),
(9, 2014104051, 3, 6, 'SSS', 1, 'Ball', 'Basketball', 'RESTORED', ''),
(10, 2014104051, 4, 7, 'SSSS', 1, 'Kicking pad', 'Taekwondo', 'RESTORED', 'DDDDD'),
(11, 2014104051, 3, 8, 'me', 1, 'Ball', 'Basketball', 'RESTORED', 'ssssss'),
(12, 2014104051, 3, 10, 'ssss', 1, 'Ball', 'Basketball', 'RESTORED', '1'),
(13, 2014104051, 3, 11, 'dad', 1, 'Ball', 'Basketball', 'RESTORED', ''),
(14, 2014104051, 3, 13, 'asd', 1, 'Ball', 'Basketball', 'RESTORED', 'ssss');

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
(3, 'Ball', 'Color: brown,red', 'Basketball', 245, 245, 0),
(4, 'Kicking pad', 'Size: small,big,medium', 'Taekwondo', 25, 25, 0);

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
(6, 3, 'Ball', 'Spalding', 55, '2017-11-08'),
(7, 4, 'Kicking pad', 'Sprint', 25, '2017-11-08'),
(8, 3, 'Ball', 'yandex', 45, '2017-11-16'),
(9, 3, 'Ball', 'yandex', 45, '2017-11-16'),
(10, 3, 'Ball', 'yandex', 45, '2017-11-16'),
(11, 3, 'Ball', 'hogwarts', 55, '2017-11-17');

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
(1, 'The admin ADD Equipment', 'ADD', '2017-11-14 22:43:15'),
(2, 'The admin ADD Equipment', 'ADD', '2017-11-14 22:45:16'),
(3, 'The admin ADD Equipment', 'ADD', '2017-11-14 22:46:13'),
(4, 'The admin ADD Equipment', 'ADD', '2017-11-14 22:49:12'),
(5, 'The admin ADD Equipment', 'ADD', '2017-11-14 22:50:48'),
(6, 'The admin ADD Equipment', 'ADD', '2017-11-14 22:52:59'),
(7, 'The admin ADD Equipment', 'ADD', '2017-11-14 22:53:49'),
(8, 'The admin update in Equipment information quantity ID 3', 'UPDATED', '2017-11-14 22:54:51'),
(9, 'The admin update in Equipment information quantity ID 3', 'UPDATED', '2017-11-14 22:54:57'),
(10, 'The admin update in Equipment information quantity ID 3', 'UPDATED', '2017-11-14 22:59:03'),
(11, 'The admin update in Equipment information quantity ID 3', 'UPDATED', '2017-11-14 22:59:49'),
(12, 'The admin add in calendar name SUCIII', 'ADD', '2017-11-14 23:09:00'),
(13, 'The admin ADD in Logs information ID 2014104051', 'ADD', '2017-11-14 23:21:44'),
(14, 'The admin ADD in Borrower ID 2014104051', 'UPDATED', '2017-11-15 00:14:35'),
(15, 'The admin restored in Borrower ID 2014104051', 'RESTORED', '2017-11-15 00:39:36'),
(16, 'The admin restored in Borrower ID 2014104051', 'RESTORED', '2017-11-15 00:39:38'),
(17, 'The admin restored in Borrower ID 2014104051', 'RESTORED', '2017-11-15 00:39:40'),
(18, 'The admin ADD in Athletes information ID 2014104051', 'ADD', '2017-11-15 01:00:56'),
(19, 'The admin ADD in Athletes information ID 2014102257', 'ADD', '2017-11-15 01:03:31'),
(20, 'The admin ADD in Athletes information ID 2014104059', 'ADD', '2017-11-15 01:07:17'),
(21, 'The admin add in Athlete information ID:  2014104059', 'UPDATED', '2017-11-15 01:08:09'),
(22, 'The admin add in Athlete information ID:  2014104059', 'UPDATED', '2017-11-15 01:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `sdmo_calendar`
--

CREATE TABLE `sdmo_calendar` (
  `CAL_NO` int(11) NOT NULL,
  `CAL_TITLE` char(50) NOT NULL,
  `CAL_EVENT_LOCATION` char(50) NOT NULL,
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

INSERT INTO `sdmo_calendar` (`CAL_NO`, `CAL_TITLE`, `CAL_EVENT_LOCATION`, `CAL_EVENT`, `CAL_START`, `CAL_END`, `CAL_STATUS`, `CAL_WARNING`, `CAL_WAR_DATE`) VALUES
(1, 'SUCIII', 'Lucinda Campus', 'participant of the incoming UCIII', '2017-11-15', '2017-11-16', 'ONGOING', 'OFF', '0000-00-00');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_login_db`
--

CREATE TABLE `user_login_db` (
  `login_id` int(20) NOT NULL,
  `login_username` varchar(25) NOT NULL,
  `login_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_db`
--

INSERT INTO `user_login_db` (`login_id`, `login_username`, `login_password`) VALUES
(1, 'Dinard', 'ef791c0d696b97e5e65ba3a08d5c5c67');

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
-- Indexes for table `user_login_db`
--
ALTER TABLE `user_login_db`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athletes_info`
--
ALTER TABLE `athletes_info`
  MODIFY `ATHLE_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `PERF_NO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barrower_date`
--
ALTER TABLE `barrower_date`
  MODIFY `BARR_DATE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `borrower_equipment_info`
--
ALTER TABLE `borrower_equipment_info`
  MODIFY `BARR_EQP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `equipment_info`
--
ALTER TABLE `equipment_info`
  MODIFY `EQP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `equipment_item`
--
ALTER TABLE `equipment_item`
  MODIFY `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sdmo_audit`
--
ALTER TABLE `sdmo_audit`
  MODIFY `AUDIT_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `sdmo_calendar`
--
ALTER TABLE `sdmo_calendar`
  MODIFY `CAL_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sdmo_logs`
--
ALTER TABLE `sdmo_logs`
  MODIFY `LOGS_NUMBER` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_login_db`
--
ALTER TABLE `user_login_db`
  MODIFY `login_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
