-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 08:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_emedrec_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dose1`
--

CREATE TABLE `tbl_dose1` (
  `dose1_id` int(11) NOT NULL,
  `dose1_brand` varchar(25) NOT NULL,
  `dose1_date` date NOT NULL,
  `dose1_addr` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dose2`
--

CREATE TABLE `tbl_dose2` (
  `dose2_id` int(11) NOT NULL,
  `dose2_brand` varchar(25) NOT NULL,
  `dose2_date` date NOT NULL,
  `dose2_addr` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(25) NOT NULL,
  `description` varchar(65) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `vaccine_brand` varchar(69) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id`, `medicine_name`, `description`, `qty`, `total`, `vaccine_brand`) VALUES
(34, 'Frederick Von', '20-00051', 1, 0, 'Pfizer'),
(37, 'Glenn Alvarez IV', '20-00056', 4, 0, 'Pfizer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(11) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `m_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `student_number` varchar(8) NOT NULL,
  `year` enum('1','2','3','4','IRREG') NOT NULL,
  `course` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` varchar(65) NOT NULL,
  `contact` int(15) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `userType` varchar(50) NOT NULL DEFAULT 'user',
  `FK_vaccine1_id` int(11) NOT NULL,
  `FK_vaccine2_id` int(11) NOT NULL,
  `FK_dose1_id` int(11) NOT NULL,
  `FK_dose2_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `f_name`, `m_name`, `l_name`, `student_number`, `year`, `course`, `dob`, `gender`, `address`, `contact`, `height`, `weight`, `userType`, `FK_vaccine1_id`, `FK_vaccine2_id`, `FK_dose1_id`, `FK_dose2_id`) VALUES
(10, 'Mon', 'Simom', 'Rafael', '', '1', '', '0000-00-00', 'Male', '', 0, 0, 0, '', 0, 0, 0, 0),
(11, 'Mon', 'Simon', 'Rafael', '', '2', '', '0000-00-00', 'Male', '', 0, 0, 0, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `id_number` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` varchar(30) NOT NULL,
  `contact` char(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `position` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `f_name`, `m_name`, `last_name`, `id_number`, `dob`, `gender`, `address`, `contact`, `username`, `password`, `position`) VALUES
(1, 'Mon Alvin', 'Simon', 'Rafael', '20-00044', '2002-09-15', 'Male', 'Ipil, Echague, Isabela', '09754906702', 'admin', '123456789', 'admin'),
(2, 'Nathaniel', 'Madriaga', 'Andoy', '20-00047', '2000-01-01', 'Male', 'Echague, Isabela', '09750000001', 'admin1', 'admin2023', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccine1`
--

CREATE TABLE `tbl_vaccine1` (
  `vaccine1_id` int(11) NOT NULL,
  `vaccine_brand1` varchar(25) NOT NULL,
  `vaccine_date` date NOT NULL,
  `vaccine_addr` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccine2`
--

CREATE TABLE `tbl_vaccine2` (
  `vaccine2_id` int(11) NOT NULL,
  `vaccine_brand2` varchar(25) NOT NULL,
  `vaccine_date2` date NOT NULL,
  `vaccine_addr2` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dose1`
--
ALTER TABLE `tbl_dose1`
  ADD PRIMARY KEY (`dose1_id`);

--
-- Indexes for table `tbl_dose2`
--
ALTER TABLE `tbl_dose2`
  ADD PRIMARY KEY (`dose2_id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vaccine1`
--
ALTER TABLE `tbl_vaccine1`
  ADD PRIMARY KEY (`vaccine1_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dose1`
--
ALTER TABLE `tbl_dose1`
  MODIFY `dose1_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dose2`
--
ALTER TABLE `tbl_dose2`
  MODIFY `dose2_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_vaccine1`
--
ALTER TABLE `tbl_vaccine1`
  MODIFY `vaccine1_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
