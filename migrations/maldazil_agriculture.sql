-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2018 at 06:49 PM
-- Server version: 5.7.24
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maldazil_agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `AdminUsers`
--

CREATE TABLE `AdminUsers` (
  `id` bigint(20) NOT NULL,
  `md5_id` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `full_name` tinytext COLLATE latin1_general_ci NOT NULL,
  `user_name` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_email` varchar(220) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_level` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(220) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `blockname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `address` text COLLATE latin1_general_ci NOT NULL,
  `country` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `tel` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `users_ip` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `approved` int(1) NOT NULL DEFAULT '0',
  `activation_code` int(10) NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0',
  `ckey` varchar(220) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ctime` varchar(220) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `AgricultureKCC`
--

CREATE TABLE `AgricultureKCC` (
  `ID` int(11) NOT NULL,
  `IdMD5` varchar(200) DEFAULT NULL,
  `BlockName` varchar(40) NOT NULL,
  `BlockId` int(10) NOT NULL,
  `FormSlNo` varchar(200) DEFAULT NULL,
  `ChqLot` varchar(20) DEFAULT NULL,
  `Amount` varchar(20) DEFAULT NULL,
  `BeneficiaryName` varchar(200) DEFAULT NULL,
  `SBEPIC` varchar(20) DEFAULT NULL,
  `MouGP` varchar(20) DEFAULT NULL,
  `LandDetails` varchar(50) DEFAULT NULL,
  `AreaDecimal` varchar(20) DEFAULT NULL,
  `mobile_no` int(10) NOT NULL,
  `KCCNo` varchar(50) DEFAULT NULL,
  `BnkACNo` varchar(50) DEFAULT NULL,
  `BankName` varchar(200) DEFAULT NULL,
  `BankCode` int(10) NOT NULL,
  `BankBranch` varchar(200) DEFAULT NULL,
  `BranchCode` int(10) NOT NULL,
  `IFSC` varchar(20) DEFAULT NULL,
  `ExistingLoan` varchar(20) DEFAULT NULL,
  `LoanNo` varchar(20) DEFAULT NULL,
  `LoanDate` date DEFAULT NULL,
  `LoanType` varchar(20) DEFAULT NULL,
  `LoanAmount` int(10) NOT NULL,
  `FathersName` varchar(70) NOT NULL,
  `AadharNo` varchar(12) NOT NULL,
  `AccountStatus` varchar(1) DEFAULT NULL,
  `LastRepaymentDate` date DEFAULT NULL,
  `EditDate` date DEFAULT NULL,
  `user_ip` varchar(20) DEFAULT NULL,
  `is_deleted` enum('1','0') NOT NULL DEFAULT '0',
  `paddy` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `BankBranch`
--

CREATE TABLE `BankBranch` (
  `branchcd` char(3) CHARACTER SET utf8 NOT NULL,
  `bank_cd` char(5) CHARACTER SET utf8 NOT NULL,
  `branch_name` text CHARACTER SET utf8 NOT NULL,
  `address` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ifsc_code` varchar(30) DEFAULT NULL,
  `usercode` int(5) NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `BankName`
--

CREATE TABLE `BankName` (
  `bank_cd` char(5) CHARACTER SET utf8 NOT NULL,
  `bank_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `distcd` char(2) NOT NULL,
  `usercode` int(5) NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `BlockMuni`
--

CREATE TABLE `BlockMuni` (
  `blockminicd` char(6) CHARACTER SET utf8 NOT NULL,
  `subdivisioncd` char(4) CHARACTER SET utf8 NOT NULL,
  `blockmuni` varchar(50) CHARACTER SET utf8 NOT NULL,
  `block_or_muni` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `districtcd` char(2) CHARACTER SET utf8 DEFAULT NULL,
  `usercode` int(5) NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kcc_temp`
--

CREATE TABLE `kcc_temp` (
  `BlockName` varchar(40) CHARACTER SET latin1 NOT NULL,
  `FormSlNo` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `Amount` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `BeneficiaryName` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `MouGP` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `LandDetails` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `AreaDecimal` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `mobile_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PMFBYKCC`
--

CREATE TABLE `PMFBYKCC` (
  `ID` int(11) NOT NULL,
  `ApplicationNo` int(15) DEFAULT NULL,
  `CID` int(10) DEFAULT NULL,
  `FID` varchar(200) DEFAULT NULL,
  `Aadhar` varchar(12) DEFAULT NULL,
  `Year` int(4) DEFAULT NULL,
  `Season` varchar(20) DEFAULT NULL,
  `Scheme` varchar(20) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `FatherName` varchar(100) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `UIDName` int(10) DEFAULT NULL,
  `UIDNo` varchar(50) DEFAULT NULL,
  `Age` int(4) DEFAULT NULL,
  `Mobile` varchar(12) DEFAULT NULL,
  `PinCode` int(10) NOT NULL,
  `Caste` varchar(50) DEFAULT NULL,
  `Farmerscategory` varchar(50) NOT NULL,
  `Nature` varchar(20) DEFAULT NULL,
  `Crop` varchar(20) DEFAULT NULL,
  `ShowingDate` varchar(20) DEFAULT NULL,
  `Insuredarea` varchar(20) DEFAULT NULL,
  `State` varchar(20) DEFAULT NULL,
  `District` varchar(70) DEFAULT NULL,
  `Block` varchar(12) DEFAULT NULL,
  `GP` varchar(50) DEFAULT NULL,
  `RevenueVillageName` varchar(200) DEFAULT NULL,
  `RevenueVillageCode` int(10) DEFAULT NULL,
  `BankName` varchar(200) DEFAULT NULL,
  `BankCode` int(10) NOT NULL,
  `BankBranch` varchar(200) DEFAULT NULL,
  `IFSC` varchar(20) DEFAULT NULL,
  `BnkACNo` varchar(50) DEFAULT NULL,
  `FarmersPremium` int(10) DEFAULT NULL,
  `CentralShare` int(20) NOT NULL,
  `StateShare` int(10) NOT NULL,
  `GrossPremium` int(10) DEFAULT NULL,
  `SumInsured` int(10) NOT NULL,
  `PendingStatus` varchar(20) NOT NULL,
  `KCCNo` varchar(50) DEFAULT NULL,
  `ExistingLoan` varchar(20) DEFAULT NULL,
  `LoanAcNo` varchar(20) DEFAULT NULL,
  `LoanDate` date DEFAULT NULL,
  `LoanType` varchar(20) DEFAULT NULL,
  `LoanAmount` int(10) NOT NULL,
  `AccountStatus` varchar(1) DEFAULT NULL,
  `LastRepaymentDate` date DEFAULT NULL,
  `LandDetails` varchar(50) DEFAULT NULL,
  `EditDate` varchar(50) DEFAULT NULL,
  `user_ip` varchar(20) DEFAULT NULL,
  `is_deleted` enum('1','0') NOT NULL DEFAULT '0',
  `paddy` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AdminUsers`
--
ALTER TABLE `AdminUsers`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `AdminUsers` ADD FULLTEXT KEY `idx_search` (`full_name`,`address`,`user_email`,`user_name`);

--
-- Indexes for table `AgricultureKCC`
--
ALTER TABLE `AgricultureKCC`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `BankBranch`
--
ALTER TABLE `BankBranch`
  ADD PRIMARY KEY (`branchcd`,`bank_cd`),
  ADD KEY `fk_bank` (`bank_cd`);

--
-- Indexes for table `BankName`
--
ALTER TABLE `BankName`
  ADD PRIMARY KEY (`bank_cd`),
  ADD KEY `distcd` (`distcd`);

--
-- Indexes for table `BlockMuni`
--
ALTER TABLE `BlockMuni`
  ADD PRIMARY KEY (`blockminicd`),
  ADD KEY `fk_subdiviblock` (`subdivisioncd`);

--
-- Indexes for table `PMFBYKCC`
--
ALTER TABLE `PMFBYKCC`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AdminUsers`
--
ALTER TABLE `AdminUsers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `AgricultureKCC`
--
ALTER TABLE `AgricultureKCC`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PMFBYKCC`
--
ALTER TABLE `PMFBYKCC`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
