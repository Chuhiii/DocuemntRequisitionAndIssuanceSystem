-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 04:04 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangaymanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `account_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_initial` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `income` int(7) NOT NULL,
  `income_proof` varchar(255) DEFAULT NULL,
  `verify_token` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 0 COMMENT '0 =  Visible, 1 = Hidden',
  `eligibility` int(11) NOT NULL DEFAULT 0 COMMENT '0 - AI\r\n0- AI, 1- eligiable for indigency, 2 fore rejected'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`account_id`, `first_name`, `middle_initial`, `last_name`, `gender`, `mobile_number`, `email`, `password`, `address`, `birthday`, `income`, `income_proof`, `verify_token`, `role`, `status`, `eligibility`) VALUES
(1, 'Admin Yarn', 'C', 'Account Sana', 'male', '09756743579', 'admin@gmail.com', '$2y$10$bYBh8vEE2DEV5VWwTdKw5Oum.1YsRANSOHLKLPSA7s4JSsSG.OxjC', 'Carmen-Cabanatuan Road', NULL, 0, '', '', 1, 0, 0),
(19, 'Mark', 'B', 'Abas', 'Male', '09771860423', 'lester.cuevo.lc@gmail.com', '$2y$10$Mw4Z2OTMBKDFa912LiRa7.emrn0.uZyxTaoEmW6PUyxRFdhlIRyw6', 'Narra street, Barangay Pamaldan', '2001-03-07', 12000, '1669296583.pdf', '30eff46f7088839e33c7335303d1a716', 0, 0, 2),
(21, 'Rhenzel', 'A', 'Agbayani', 'Bayani', '09123456789', 'rhenzel@gmail.com', '$2y$10$NpCOjs7KfCCHPWdQ26YTwOnK7fwUlGANyniWgcfkIwP80aBw0UlLG', 'Brgy. Rio', NULL, 0, '', '', 0, 0, 1),
(22, 'Gerald', 'A', 'Bolisay', 'Bolisay', '09771860610', 'gerald@gmail.com', '$2y$10$IN.vdxDy9Z5tMNtn1I59BuoO3MpObvJIf7XW/KAEDE8F50TO/0aWK', 'valdefuente', '2022-11-08', 12000, '', '', 0, 0, 1),
(26, 'Denver', 'A', 'Balmiento', 'Balmiento', '09771823462', 'balmientoGG@gmail.com', '$2y$10$Zw6K.y7inY0JaAQqagEY2u36zxhSS3Pgu2llTb8PGDWCbWzVA7Lcy', 'Narra street, Barangay Pamaldan', NULL, 0, '', NULL, 0, 0, 2),
(27, 'Fish', 'A', 'Oil', 'Oil', '09771860629', 'fish@gmail.com', '$2y$10$0d24cQRFcRBcOqQIpviIyuIkavihlVf3o/mM5LSdNzeFH4pDallB2', 'Narra street, Barangay Pamaldan', NULL, 0, '', NULL, 0, 0, 2),
(29, 'Prince', 'M', 'Nicholas', 'Male', '09771860610', 'prince@gmail.com', '$2y$10$xW.MWdjgSjb3.Wf71uvP1u4YJNr1UnO.vMH5wCBBM8SIzHB.wNhpi', 'Narra street, Barangay Pamaldan', NULL, 0, '', NULL, 0, 0, 0),
(30, 'Sample', 'A', 'Account', 'male', '09771860642', 'sample@gmail.com', '$2y$10$z5toA7p1XWGaFr/MgBCnneAU8aOepbfjRms1xYzA/.NyskkmDFb7C', 'Narra street, Barangay Pamaldan', NULL, 0, '', NULL, 0, 0, 0),
(31, 'MARK LESTER', 'ABAS', 'CUEVO', 'male', '09771860642', 'trykodaw@gmail.com', '$2y$10$XQfCPm/r2bRS9PwJ3cAAbOitnx2e..PVBHwQTN38PJucO.JzlSTg.', 'NARRA STREET', '2022-11-16', 12000, '1668570473.jpg', NULL, 0, 0, 1),
(32, 'Mark Lester', 'A', 'Cuevo', 'Male', '09771860610', 'lester@gmail.com', '$2y$10$JWmqd18XbGT4SmCAXLF/5e.zubFUzFatIwrGFUi.QjzabFIx6TIc2', 'Narra street, Barangay Pamaldan', '2001-03-07', 0, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `cover_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`cover_id`, `title`, `message`, `image`, `status`) VALUES
(1, 'Officially the Municipality of General Tiniooo', 'According to the story passed on from one generation to another, the town got its name because of miscommunication between the natives and the Spanish colonizers. A native settler when asked by a Spanish soldier ', '1665749863.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `doc_id` int(11) NOT NULL,
  `doc_type` varchar(50) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `businessName` varchar(255) DEFAULT NULL,
  `businessType` varchar(255) DEFAULT NULL,
  `businessStarted` date DEFAULT NULL,
  `businessLocation` varchar(255) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `status` int(3) DEFAULT 0 COMMENT '0 - Pending, 1 - Approved,  2 - Diapproved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`doc_id`, `doc_type`, `age`, `address`, `purpose`, `occupation`, `businessName`, `businessType`, `businessStarted`, `businessLocation`, `account_id`, `status`) VALUES
(3, 'Barangay Indigency', 21, 'Narra street, Barangay Pamaldan', 'fadgasgas', 'Student', NULL, NULL, NULL, NULL, 22, 2),
(4, 'Business Permit', NULL, NULL, NULL, NULL, 'Candle', 'Candle Business', '2022-10-24', 'Carmen-Cabanatuan Road', 22, 1),
(6, 'Barangay Certificate', 21, 'Carmen-Cabanatuan Road', 'For Authentication Doc', NULL, NULL, NULL, NULL, NULL, 22, 1),
(7, 'Barangay Clearance', 21, 'Carmen-Cabanatuan Road', 'For QA only', NULL, NULL, NULL, NULL, NULL, 25, 0),
(10, 'Barangay Clearance', 22, 'Narra street, Barangay Pamaldan', 'For QA only', NULL, NULL, NULL, NULL, NULL, 22, 1),
(11, 'Barangay Certificate', 34235, 'Narra street, Barangay Pamaldan', 'For QA only', NULL, NULL, NULL, NULL, NULL, 22, 0),
(12, 'Barangay Clearance', 2135, 'Carmen-Cabanatuan Road', 'For QA only', NULL, NULL, NULL, NULL, NULL, 22, 0),
(13, 'Barangay Certificate', 21, 'Narra street, Barangay Pamaldan', 'For QA only', NULL, NULL, NULL, NULL, NULL, 22, 0),
(14, 'Barangay Clearance', 21, 'NARRA STREET', 'Patapusin mo na kami Capstone', NULL, NULL, NULL, NULL, NULL, 22, 0),
(15, 'Barangay Certificate', 0, 'valdefuente', 'Patapusin mo na kami Capstone', NULL, NULL, NULL, NULL, NULL, 22, 0),
(16, 'Barangay Indigency', 0, 'valdefuente', 'Patapusin mo na kami Capstone', 'Student', NULL, NULL, NULL, NULL, 22, 0),
(17, 'Business Permit', NULL, NULL, NULL, NULL, 'Candle', 'Candle Business', '2022-11-28', 'Narra street, Barangay Pamaldan', 21, 0),
(18, 'Business Permit', NULL, NULL, NULL, NULL, 'Advanced Corp', 'Lending Corporation', '2022-11-28', 'Carmen-Cabanatuan Road', 21, 0),
(19, 'Business Permit', NULL, NULL, NULL, NULL, '', '', '0000-00-00', '', 21, 0),
(20, 'Barangay Clearance', 0, 'Brgy. Rio', '', NULL, NULL, NULL, NULL, NULL, 21, 0),
(21, 'Business Permit', NULL, NULL, NULL, NULL, '', '', '0000-00-00', '', 21, 0),
(22, 'Business Permit', NULL, NULL, NULL, NULL, '', '', '0000-00-00', '', 21, 0),
(23, 'Business Permit', NULL, NULL, NULL, NULL, '', '', '0000-00-00', '', 21, 0),
(24, 'Business Permit', NULL, NULL, NULL, NULL, 'Candle', 'Candle Business', '2022-11-22', 'Narra street, Barangay Pamaldan', 32, 0),
(25, 'Barangay Certificate', 21, 'Narra street, Barangay Pamaldan', 'For QA only', NULL, NULL, NULL, NULL, NULL, 32, 0),
(26, 'Barangay Clearance', 21, 'Narra street, Barangay Pamaldan', 'Patapusin mo na kami Capstone', NULL, NULL, NULL, NULL, NULL, 32, 0),
(27, 'Barangay Indigency', 21, 'Narra street, Barangay Pamaldan', 'For QA only', 'Software Engineer', NULL, NULL, NULL, NULL, 32, 0),
(28, 'Business Permit', NULL, NULL, NULL, NULL, 'Smart C', 'Energy Drink', '2022-11-28', 'Carmen-Cabanatuan Road', 32, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `event_id` int(10) NOT NULL,
  `event_name` varchar(500) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0 - Active, 1- Archieved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`event_id`, `event_name`, `location`, `date_time`, `status`) VALUES
(13, 'Relief Help', 'nueva ecija university of science and technolgy', '2022-10-30T23:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_official`
--

CREATE TABLE `tbl_official` (
  `OFFICIAL_ID` int(5) NOT NULL,
  `POSITION` varchar(20) NOT NULL,
  `OFFICIAL_FNAME` varchar(20) NOT NULL,
  `OFFICIAL_MNAME` varchar(20) NOT NULL,
  `OFFICIAL_LNAME` varchar(20) NOT NULL,
  `OFFICIAL_CONTACT` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_official`
--

INSERT INTO `tbl_official` (`OFFICIAL_ID`, `POSITION`, `OFFICIAL_FNAME`, `OFFICIAL_MNAME`, `OFFICIAL_LNAME`, `OFFICIAL_CONTACT`) VALUES
(11, 'Kagawad', 'Mark Lester', 'Abas', 'Cuevo', '09771860610'),
(12, 'Kagawad', 'Denver', 'M', 'Balmiento', '09771860632');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `REPORT_ID` int(10) NOT NULL,
  `CONCERN` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `STATUS` int(11) DEFAULT 0 COMMENT '0 default, 1 resolved, 2 unresolved',
  `REMARK` varchar(255) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`REPORT_ID`, `CONCERN`, `DESCRIPTION`, `STATUS`, `REMARK`, `account_id`) VALUES
(9, 'For QA only', 'For QA only', 0, '', 15),
(10, 'noise pollution', 'ingay denver', 2, 'Ayaw', 22),
(13, 'Prince', 'Prince', 0, '', 28),
(14, 'Sample', 'Sample Report', 2, 'gvcsg', 30),
(15, 'Sample 2', 'Sample Report 2', 0, '', 22),
(16, 'noise pollution', 'ingay denver', 0, '', 22),
(17, 'noise pollution', 'For QA only', 0, '', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resident`
--

CREATE TABLE `tbl_resident` (
  `resident_id` int(11) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(3) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `voter_status` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_resident`
--

INSERT INTO `tbl_resident` (`resident_id`, `citizenship`, `first_name`, `middle_name`, `last_name`, `birthday`, `age`, `civil_status`, `gender`, `voter_status`, `contact`, `address`, `email`, `status`) VALUES
(2, 'Filipino', 'Gerald ', 'Castillo', 'Bolisay', '2022-11-13', 22, 'Single', 'Male', 'Registered', '09771860661', 'Carmen-Cabanatuan Road', 'gerald@gmail.com', 0),
(3, 'Filipino', 'Rhenzel', 'C', 'Agbayani', '2015-01-06', 21, 'Single', 'Male', 'Registered', '09771860611', 'Narra street, Barangay Pamaldan', 'rhenzel@gmail.com', 0),
(4, 'Filipino', 'Mark Lester', 'Abas', 'Cuevo', '2001-03-07', 21, 'Single', 'Male', 'Registered', '09771860610', 'Narra street, Barangay Pamaldan', 'lester@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`cover_id`);

--
-- Indexes for table `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_official`
--
ALTER TABLE `tbl_official`
  ADD PRIMARY KEY (`OFFICIAL_ID`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`REPORT_ID`);

--
-- Indexes for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  ADD PRIMARY KEY (`resident_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `cover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_official`
--
ALTER TABLE `tbl_official`
  MODIFY `OFFICIAL_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `REPORT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  MODIFY `resident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
