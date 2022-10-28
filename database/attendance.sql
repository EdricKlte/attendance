-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 06:42 AM
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
(1267, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '30'),
(1268, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '38'),
(1269, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '38'),
(1270, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '38'),
(1271, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 3, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '38'),
(1274, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1275, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1276, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1277, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1278, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 3, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1279, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 3, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1280, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 4, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1281, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 4, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1282, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 5, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1283, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 5, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1284, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 6, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1285, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 6, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1286, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 7, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1287, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 8, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1288, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 8, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1289, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 7, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1290, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 9, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1291, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 9, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1292, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 11, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1293, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 11, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1294, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 10, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1295, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 10, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1296, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 12, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1297, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 12, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1298, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 13, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1299, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 13, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1300, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 14, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1301, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 18, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1302, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 14, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1303, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 15, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1304, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 16, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1305, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 15, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1306, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 21, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1307, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 17, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1308, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 16, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1309, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 17, 10, '0', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1310, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 18, 10, '1', 'Schultz Henry', 'Capstone\r\n', 'BSIT', '28'),
(1311, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 2, 11, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '32'),
(1312, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 1, 11, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '32'),
(1313, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 1, 11, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '32'),
(1314, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 3, 11, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '32'),
(1315, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '35'),
(1316, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '35'),
(1324, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '30'),
(1333, 1, '06-1920-022451328', '1328', '', '2022-10-12', 0, 39, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1334, 1, '06-1920-022451328', '1328', '', '2022-10-12', 0, 39, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1341, 1, '06-1920-022451339', '1339', '', '2022-10-12', 0, 39, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1342, 1, '', '1339', '', '2022-10-12', 0, 0, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1343, 1, '', '1339', '', '2022-10-12', 0, 0, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1344, 1, '', '1339', '', '2022-10-12', 0, 0, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1348, 1, '06-1920-022451337', '1337', '', '2022-10-12', 3, 39, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1349, 1, '06-1920-022451336', '1336', '', '2022-10-12', 1, 39, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1351, 1, '06-1920-022491273', '1273', '', '2022-10-12', 1, 39, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1352, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1353, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1354, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1355, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1356, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 4, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1357, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 3, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1358, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 3, 10, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1359, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 4, 10, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1360, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 5, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1361, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 6, 10, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1362, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 6, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1363, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 5, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1365, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 7, 10, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '39'),
(1372, 1, '06-1920-022491369', '1369', '', '2022-10-12', 9, 39, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1373, 1, '06-1920-022451365', '<br />\n<b>Notice</b>:  Undefined index: q in <b>C:xampphtdocsattendance	eachers\newIdData.php</b> on line <b>3</b><br />\n06-1920-02245_10_7_39', '', '2022-10-12', 7, 39, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1374, 1, '06-1920-022451264', '06-1920-02245_10_3_29', '', '2022-10-12', 3, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1375, 1, '06-1920-022451263', '06-1920-02245_10_2_29', '', '2022-10-12', 2, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1377, 1, '06-1920-022451264', '06-1920-02245_10_3_29', '', '2022-10-12', 3, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1378, 1, '06-1920-022451264', '06-1920-02245_10_3_29', '', '2022-10-12', 3, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1379, 1, '06-1920-022451264', '06-1920-02245_10_3_29', '', '2022-10-12', 3, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1380, 1, '06-1920-022451264', '06-1920-02245_10_3_29', '', '2022-10-12', 3, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1381, 1, '06-1920-022491265', '06-1920-02249_10_2_29', '', '2022-10-12', 2, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1382, 1, '06-1920-022451263', '06-1920-02245_10_2_29', '', '2022-10-12', 2, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1383, 1, '06-1920-022491266', '06-1920-02249_10_1_29', '', '2022-10-12', 1, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1384, 1, '06-1920-022451262', '06-1920-02245_10_1_29', '', '2022-10-12', 1, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1396, 1, '06-1920-022451394', '06-1920-02245_10_4_29', '', '2022-10-12', 4, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1397, 1, '06-1920-022451395', '06-1920-02245_10_5_29', '', '2022-10-12', 5, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1398, 1, '06-1920-022491393', '06-1920-02249_10_5_29', '', '2022-10-12', 5, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1399, 1, '06-1920-022491389', '06-1920-02249_10_4_29', '', '2022-10-12', 4, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1400, 1, '06-1920-022451387', '06-1920-02245_10_3_29', '', '2022-10-12', 3, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1401, 1, '06-1920-022491391', '06-1920-02249_10_3_29', '', '2022-10-12', 3, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1404, 1, '06-1920-022491391', '06-1920-02245_10_3_29', '', '2022-10-12', 3, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1405, 1, '06-1920-022451403', '06-1920-02245_10_3_29', '', '2022-10-12', 3, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1406, 1, '06-1920-022491392', '06-1920-02249_10_1_29', '', '2022-10-12', 1, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1413, 1, '06-1920-022451410', '06-1920-02245_10_1_29', '', '2022-10-12', 1, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1414, 1, '06-1920-022451411', '06-1920-02245_10_2_29', '', '2022-10-12', 2, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1415, 1, '06-1920-022451412', '06-1920-02245_10_3_29', '', '2022-10-12', 3, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1420, 1, '06-1920-02245', '06-1920-02245_10_1_29', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '29'),
(1421, 1, '06-1920-02245', '06-1920-02245_10_2_29', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '29'),
(1422, 1, '06-1920-02245', '06-1920-02245_10_3_29', '', '2022-10-12', 3, 10, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '29'),
(1425, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '29'),
(1426, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 2, 10, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '29'),
(1427, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 3, 10, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', '29'),
(1431, 1, '06-1920-022451430', '06-1920-02245_10_5_29', '', '2022-10-12', 5, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1435, 1, '06-1920-022451434', '06-1920-02245_10_4_29', '', '2022-10-12', 4, 29, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1436, 1, '', '', '', '2022-10-12', 4, 0, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1437, 1, '', '', '', '2022-10-12', 8, 0, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1438, 1, '', '', '', '2022-10-12', 4, 0, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1439, 1, '', '', '', '2022-10-12', 4, 0, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1441, 1, 'Elden', '', '', '2022-10-12', 5, 0, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', 'BSIT', ''),
(1450, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '40'),
(1451, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '40'),
(1452, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '40'),
(1453, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '40'),
(1456, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '22'),
(1457, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 1, 10, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '22'),
(1458, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '22'),
(1461, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 3, 10, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '22'),
(1462, 1, '06-1920-02249', 'Edric', '', '2022-10-12', 3, 10, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '22'),
(1463, 1, '06-1920-02245', 'Elden', '', '2022-10-12', 2, 10, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '22'),
(1468, 1, '06-1920-02245', 'Elden', '', '2022-10-13', 7, 12, '1', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '96'),
(1477, 1, '06-1920-02245', 'Elden', '', '2022-10-13', 2, 2, '0', 'Schultz Henry', 'Criminal Justice', 'BSN 3-1', '146'),
(1483, 1, '06-1920-02245', 'Elden', '', '2022-10-14', 1, 2, '1', 'Schultz Henry', 'Platform Technologies', 'BS IT 4-1', '206'),
(1484, 1, '06-1920-02245', 'Elden', '', '2022-10-14', 2, 2, '1', 'Schultz Henry', 'Platform Technologies', 'BS IT 4-1', '206'),
(1485, 1, '06-1920-02245', 'Elden', '', '2022-10-14', 3, 2, '1', 'Schultz Henry', 'Platform Technologies', 'BS IT 4-1', '206'),
(1489, 1, '', 'Edric', '', '2022-10-14', 1, 2, '1', 'Schultz Henry', 'Platform Technologies', 'BS IT 4-1', '206'),
(1490, 1, '', 'Edric', '', '2022-10-14', 1, 1, '1', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '205'),
(1491, 1, '', 'Edric', '', '2022-10-14', 2, 1, '1', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '205'),
(1492, 1, '', 'Edric', '', '2022-10-14', 2, 1, '1', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '217'),
(1493, 1, '', 'Edric', '', '2022-10-14', 1, 1, '1', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '217'),
(1494, 1, '', 'Edric', '', '2022-10-14', 3, 1, '1', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '217'),
(1495, 1, '', 'Edric', '', '2022-10-14', 1, 2, '0', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '218'),
(1496, 1, '', 'Edric', '', '2022-10-14', 2, 2, '0', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '218'),
(1497, 1, '', 'Edric', '', '2022-10-14', 3, 2, '0', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '218'),
(1498, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 1, 1, '1', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '217'),
(1499, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 2, 1, '1', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '217'),
(1500, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 3, 1, '0', 'Schultz Henry', 'New Ventures', 'BSIT 4-1', '217'),
(1506, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 1, 1, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', '4-1', '337'),
(1507, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 2, 1, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', '4-1', '337'),
(1508, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 3, 1, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', '4-1', '337'),
(1509, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 4, 1, '1', 'Schultz Henry', 'Application Development and Emerging Technologies', '4-1', '337'),
(1510, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 1, 2, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', '4-1', '338'),
(1511, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 2, 2, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', '4-1', '338'),
(1512, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 4, 2, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', '4-1', '338'),
(1513, 1, '06-1920-02249', 'Edric', '', '2022-10-14', 3, 2, '0', 'Schultz Henry', 'Application Development and Emerging Technologies', '4-1', '338'),
(1525, 1, '06-1920-02249', 'Edric', '', '2022-10-23', 1, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '289'),
(1526, 1, '06-1920-02249', 'Edric', '', '2022-10-23', 2, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '289'),
(1527, 1, '233123123', 'Learose', '', '2022-10-23', 2, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '289'),
(1528, 1, '233123123', 'Learose', '', '2022-10-23', 1, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '289'),
(1531, 1, '233123123', 'Learose', '', '2022-10-23', 1, 2, '0', 'Schultz Henry', 'Computer Programming 1', '4-1', '290'),
(1532, 1, '233123123', 'Learose', '', '2022-10-23', 2, 2, '0', 'Schultz Henry', 'Computer Programming 1', '4-1', '290'),
(1535, 1, '06-1920-02249', 'Edric', '', '2022-10-23', 1, 2, '0', 'Schultz Henry', 'Computer Programming 1', '4-1', '290'),
(1536, 1, '06-1920-02249', 'Edric', '', '2022-10-23', 2, 2, '0', 'Schultz Henry', 'Computer Programming 1', '4-1', '290'),
(1537, 1, '06-1920-02249', 'Edric', '', '2022-10-23', 1, 3, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '351'),
(1538, 1, '06-1920-02249', 'Edric', '', '2022-10-23', 2, 3, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '351'),
(1539, 1, '06-1920-02249', 'Edric', '', '2022-10-23', 3, 3, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '351'),
(1540, 1, '06-1920-02249', 'Edric', '', '2022-10-23', 4, 3, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '351'),
(1541, 1, '233123123', 'Learose', '', '2022-10-23', 4, 3, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '351'),
(1542, 1, '233123123', 'Learose', '', '2022-10-23', 3, 3, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '351'),
(1543, 1, '233123123', 'Learose', '', '2022-10-23', 2, 3, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '351'),
(1544, 1, '233123123', 'Learose', '', '2022-10-23', 1, 3, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '351'),
(1545, 1, '06-1920-02249', 'Edric', '', '2022-10-24', 1, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '349'),
(1546, 1, '06-1920-02249', 'Edric', '', '2022-10-24', 2, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '349'),
(1547, 1, '233123123', 'Learose', '', '2022-10-24', 2, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '349'),
(1548, 1, '233123123', 'Learose', '', '2022-10-24', 1, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '349'),
(1549, 1, '06-1920-02249', 'Edric', '', '2022-10-24', 3, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-1', '349'),
(1550, 1, '233123123', 'Learose', '', '2022-10-24', 3, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-1', '349'),
(1553, 1, '06-1920-02249', 'Edric', '', '2022-10-24', 4, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '349'),
(1554, 1, '06-1920-02249', 'Edric', '', '2022-10-24', 1, 2, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '350'),
(1555, 1, '06-1920-02249', 'Edric', '', '2022-10-24', 2, 2, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '350'),
(1556, 1, '233123123', 'Learose', '', '2022-10-24', 2, 2, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '350'),
(1557, 1, '233123123', 'Learose', '', '2022-10-24', 1, 2, '1', 'Schultz Henry', 'Computer Programming 1', '4-1', '350'),
(1565, 1, '06-1920-02248', 'Edric', '', '2022-10-26', 1, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '697'),
(1566, 1, '06-1920-02248', 'Edric', '', '2022-10-26', 3, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '697'),
(1567, 1, '06-1920-02248', 'Edric', '', '2022-10-26', 5, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '697'),
(1568, 1, '06-1920-02249', 'Edric', '', '2022-10-26', 2, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-2', '709'),
(1569, 1, '06-1920-02249', 'Edric', '', '2022-10-26', 1, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-2', '709'),
(1573, 1, '06-1920-02249', 'Edric', '', '2022-10-26', 4, 2, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '698'),
(1574, 1, '06-1920-02249', 'Edric', '', '2022-10-26', 3, 2, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '698'),
(1575, 1, '06-1920-02249', 'Edric', '', '2022-10-26', 1, 2, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '698'),
(1576, 1, '06-1920-02249', 'Edric', '', '2022-10-26', 2, 2, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '698'),
(1577, 1, '06-1920-02249', 'Edric', '', '2022-10-26', 1, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '697'),
(1578, 1, '06-1920-02249', 'Edric', '', '2022-10-26', 2, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '697'),
(1579, 1, '06-1920-02249', 'Edric', '', '2022-10-26', 3, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '697'),
(1592, 1, '06-1920-02249', 'Edric', '', '2022-10-27', 1, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1593, 1, '06-1920-02249', 'Edric', '', '2022-10-27', 2, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1597, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 3, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1598, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 4, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1599, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 5, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1600, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 6, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1601, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 13, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1602, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 23, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1603, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 1, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1604, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 2, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1605, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 3, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1606, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 4, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1607, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 5, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1608, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 6, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1609, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 1, 2, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '758'),
(1610, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 7, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1611, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 7, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1612, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 8, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1613, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 8, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1614, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 31, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1615, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 20, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1616, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 17, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1617, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 11, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1618, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 9, 1, '1', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1619, 1, '06-1920-02249', 'Edric', '', '2022-10-28', 10, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1620, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 9, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1621, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 10, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1622, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 11, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '757'),
(1623, 1, '06-1920-02241', 'Ederiku', '', '2022-10-28', 12, 1, '0', 'Schultz Henry', 'Computer Programming 1', '4-3', '757');

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE `class_list` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `students_id` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_list`
--

INSERT INTO `class_list` (`id`, `users_id`, `students_id`, `last_name`, `first_name`, `course`, `section`, `subject`) VALUES
(9, 4, '06-1920-02249', 'Marinas', 'Edric Charles', 'BS Information Technology', '4-3', 'Computer Programming 1'),
(11, 4, '06-1920-02248', 'Marianainas', 'Ederiku', 'BS Information Technology', '4-3', 'Computer Programming 1'),
(13, 1, '06-1920-02249', 'Marinas', 'Edric Charles', 'BS Information Technology', '4-3', 'Computer Programming 1'),
(14, 1, '06-1920-02241', 'Marinases', 'Ederiku', 'BS Information Technology', '4-3', 'Computer Programming 1');

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
  `archive` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sheet_record`
--

INSERT INTO `sheet_record` (`id`, `year`, `month`, `days`, `teacher`, `sections`, `subjects`, `users_id`, `archive`) VALUES
(685, '2022', '1', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(686, '2022', '2', '28', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(687, '2022', '3', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(688, '2022', '4', '30', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(689, '2022', '5', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(690, '2022', '6', '30', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(691, '2022', '7', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(692, '2022', '8', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(693, '2022', '9', '30', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(694, '2022', '10', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(695, '2022', '11', '30', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(696, '2022', '12', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'yes'),
(709, '2022', '1', '31', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(710, '2022', '2', '28', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(711, '2022', '3', '31', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(712, '2022', '4', '30', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(713, '2022', '5', '31', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(714, '2022', '6', '30', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(715, '2022', '7', '31', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(716, '2022', '8', '31', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(717, '2022', '9', '30', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(718, '2022', '10', '31', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(719, '2022', '11', '30', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(720, '2022', '12', '31', 'Schultz Henry', '4-2', 'Computer Programming 1', '1', 'no'),
(721, '2022', '1', '31', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(722, '2022', '2', '28', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(723, '2022', '3', '31', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(724, '2022', '4', '30', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(725, '2022', '5', '31', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(726, '2022', '6', '30', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(727, '2022', '7', '31', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(728, '2022', '8', '31', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(729, '2022', '9', '30', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(730, '2022', '10', '31', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(731, '2022', '11', '30', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(732, '2022', '12', '31', 'Edric Charles', '4-3', 'Computer Programming 1', '4', 'no'),
(757, '2022', '1', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(758, '2022', '2', '28', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(759, '2022', '3', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(760, '2022', '4', '30', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(761, '2022', '5', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(762, '2022', '6', '30', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(763, '2022', '7', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(764, '2022', '8', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(765, '2022', '9', '30', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(766, '2022', '10', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(767, '2022', '11', '30', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no'),
(768, '2022', '12', '31', 'Schultz Henry', '4-3', 'Computer Programming 1', '1', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `fullname`, `email`, `password`) VALUES
(1, 'Schultz Henry', 'Boado', 'Boado, Schultz Henry S.', 'scso.boado.sjc@phinmaed.com', 'henry321'),
(4, 'Edric Charles', 'Marinas', 'Marinas, Edric Charles C.', 'edca.marinas.sjc@phinmaed.com', 'Edric123');

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
  ADD KEY `fk_teachers` (`users_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1624;

--
-- AUTO_INCREMENT for table `class_list`
--
ALTER TABLE `class_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sheet_record`
--
ALTER TABLE `sheet_record`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=769;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_list`
--
ALTER TABLE `class_list`
  ADD CONSTRAINT `fk_teachers` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
