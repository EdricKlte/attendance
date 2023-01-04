-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 08:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_section`
--

CREATE TABLE `add_section` (
  `section_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_section`
--

INSERT INTO `add_section` (`section_id`, `department`, `course`, `section`, `year_level`) VALUES
(7, 'College of Information Technology Education', 'BS Information Technology', '4-1', '4th'),
(8, 'College of Information Technology Education', 'BS Information Technology', '4-2', '4th'),
(9, 'College of Information Technology Education', 'BS Information Technology', '4-3', '4th');

-- --------------------------------------------------------

--
-- Table structure for table `add_subject`
--

CREATE TABLE `add_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_subject`
--

INSERT INTO `add_subject` (`subject_id`, `subject_name`, `year`, `course`) VALUES
(1, 'Computer Programming 1', '1st', 'BSIT'),
(3, 'Application Development and Emerging Technologies', '3rd', 'BSIT'),
(4, 'Capstone', '3rd', 'BSIT'),
(5, 'Managing IT Resouces', '4th', 'BSIT'),
(6, 'New Ventures', '4th', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(11) NOT NULL,
  `departments` varchar(255) NOT NULL,
  `teachers` varchar(255) NOT NULL,
  `sections` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `departments`, `teachers`, `sections`, `subjects`) VALUES
(12, 'College of Information Technology Education', '1', '4-3', 'Computer Programming 1'),
(13, 'College of Information Technology Education', '1', '4-2', 'Capstone');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `students_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `day` int(255) NOT NULL,
  `month` int(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `sections` varchar(255) NOT NULL,
  `sheetID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `users_id`, `students_id`, `first_name`, `attendance`, `date`, `day`, `month`, `Status`, `teacher`, `subjects`, `sections`, `sheetID`) VALUES
(1822, 1, '321', 'Jerome', '', '2023-01-04', 1, 4, '1', 'Henry', 'Computer Programming 1', '4-3', '935'),
(1823, 1, '54321', 'Stephen', '', '2023-01-04', 1, 4, '1', 'Henry', 'Computer Programming 1', '4-3', '935'),
(1824, 1, '213', 'Edric', '', '2023-01-04', 1, 4, '1', 'Henry', 'Computer Programming 1', '4-3', '935'),
(1825, 1, '41212312eyy', 'Raveniel', '', '2023-01-04', 1, 4, '1', 'Henry', 'Computer Programming 1', '4-3', '935'),
(1826, 1, '12345', 'Ysabelle', '', '2023-01-04', 1, 4, '1', 'Henry', 'Computer Programming 1', '4-3', '935');

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE `class_list` (
  `id` int(11) NOT NULL,
  `students_id` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `users_id` varchar(255) NOT NULL,
  `dateModified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_list`
--

INSERT INTO `class_list` (`id`, `students_id`, `last_name`, `first_name`, `course`, `section`, `subject`, `users_id`, `dateModified`) VALUES
(91, '213', 'Marinas', 'Edric', 'BS Information Technology', '4-3', 'Computer Programming 1', '1', '2023-01-04 15:17:18'),
(92, '321', 'Balabis', 'Jerome', 'BS Information Technology', '4-3', 'Computer Programming 1', '1', '2023-01-04 15:17:18'),
(93, '54321', 'Fortit', 'Stephen', 'BS Nursing', '4-3', 'Computer Programming 1', '1', '2023-01-04 15:17:18'),
(94, '12345', 'Robles', 'Ysabelle', 'BS Nursing', '4-3', 'Computer Programming 1', '1', '2023-01-04 15:17:18'),
(95, '41212312eyy', 'Penetrante', 'Raveniel', 'BS Information Technology', '4-3', 'Computer Programming 1', '1', '2023-01-04 15:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `first_sem` varchar(255) NOT NULL,
  `second_sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `academic_year`, `first_sem`, `second_sem`) VALUES
(49, '2022-2023', '4-2022,5-2022,6-2022,7-2022,8-2022,9-2022,10-2022,', '11-2022,12-2022,1-2023,2-2023,');

-- --------------------------------------------------------

--
-- Table structure for table `sheet_record`
--

CREATE TABLE `sheet_record` (
  `id` int(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `sections` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `users_id` varchar(255) NOT NULL,
  `archive` varchar(255) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sheet_record`
--

INSERT INTO `sheet_record` (`id`, `year`, `month`, `days`, `teacher`, `sections`, `subjects`, `users_id`, `archive`, `school_year`, `semester`) VALUES
(935, '2022', '4', '30', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'first_sem'),
(936, '2022', '5', '31', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'first_sem'),
(937, '2022', '6', '30', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'first_sem'),
(938, '2022', '7', '31', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'first_sem'),
(939, '2022', '8', '31', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'first_sem'),
(940, '2022', '9', '30', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'first_sem'),
(941, '2022', '10', '31', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'first_sem'),
(942, '2022', '11', '30', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'second_sem'),
(943, '2022', '12', '31', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'second_sem'),
(944, '2023', '1', '31', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'second_sem'),
(945, '2023', '2', '28', 'Henry', '4-3', 'Computer Programming 1', '1', 'no', '2022-2023', 'second_sem');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `employee_no`, `password`) VALUES
(1, 'Boado', 'Henry', '06-1920-00925', 'af568fba60edea64dd7c1d7f3c5c1c1d'),
(4, 'Marinas', 'Edric', '987654321', 'Edric123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_section`
--
ALTER TABLE `add_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `add_subject`
--
ALTER TABLE `add_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_list`
--
ALTER TABLE `class_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subjects` (`subject`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sheet_record`
--
ALTER TABLE `sheet_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_section`
--
ALTER TABLE `add_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `add_subject`
--
ALTER TABLE `add_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1827;

--
-- AUTO_INCREMENT for table `class_list`
--
ALTER TABLE `class_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sheet_record`
--
ALTER TABLE `sheet_record`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
