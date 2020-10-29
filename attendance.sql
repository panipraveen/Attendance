-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 05:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `attendance_info`
--

CREATE TABLE `attendance_info` (
  `id` int(50) NOT NULL,
  `lecture_id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `lecture_count` int(50) NOT NULL,
  `p_or_a` varchar(50) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_info`
--

INSERT INTO `attendance_info` (`id`, `lecture_id`, `student_id`, `name`, `department`, `subject`, `lecture_count`, `p_or_a`, `date`) VALUES
(1, 1, 3, 'Jackson', 'fybsc(cs)', 'Network_Security', 4, 'Present', '2019-10-29 09:30:46.503717'),
(2, 1, 4, 'Jeberson', 'fybsc(cs)', 'Network_Security', 4, 'Absent', '2019-10-29 09:30:46.522718'),
(3, 2, 5, 'Inbasagar', 'sybsc(cs)', 'Artificial_Intelligence', 7, 'Present', '2019-10-29 09:30:59.432832'),
(4, 2, 6, 'Barathan', 'sybsc(cs)', 'Artificial_Intelligence', 7, 'Absent', '2019-10-29 09:30:59.512836'),
(5, 3, 1, 'Praveen', 'tybsc(cs)', 'Network_Security', 5, 'Present', '2019-10-29 09:31:14.119452'),
(6, 3, 2, 'Enos', 'tybsc(cs)', 'Network_Security', 5, 'Absent', '2019-10-29 09:31:14.149454'),
(7, 4, 1, 'Praveen', 'tybsc(cs)', 'Artificial_Intelligence', 4, 'Present', '2019-10-29 09:32:16.989194'),
(8, 4, 2, 'Enos', 'tybsc(cs)', 'Artificial_Intelligence', 4, 'Present', '2019-10-29 09:32:17.133202'),
(9, 5, 5, 'Inbasagar', 'sybsc(cs)', 'Network_Security', 7, 'Absent', '2019-10-29 09:43:08.382652'),
(10, 5, 6, 'Barathan', 'sybsc(cs)', 'Network_Security', 7, 'Present', '2019-10-29 09:43:08.423654'),
(11, 6, 5, 'Inbasagar', 'sybsc(cs)', 'Network_Security', 7, 'Present', '2019-10-29 09:43:59.423317'),
(12, 6, 6, 'Barathan', 'sybsc(cs)', 'Network_Security', 7, 'Absent', '2019-10-29 09:43:59.524322'),
(13, 7, 5, 'Inbasagar', 'Sybsc(cs)', 'Web Service', 5, 'Absent', '2019-10-30 09:20:50.597159'),
(14, 7, 6, 'Barathan', 'Sybsc(cs)', 'Web Service', 5, 'Present', '2019-10-30 09:20:50.689164'),
(15, 8, 3, 'Jackson', 'Fybsc(cs)', 'Web Service', 10, 'Present', '2019-10-30 11:13:32.269652'),
(16, 8, 4, 'Jeberson', 'Fybsc(cs)', 'Web Service', 10, 'Absent', '2019-10-30 11:13:32.339656'),
(17, 9, 1, 'Praveen', 'Tybsc(cs)', 'Web Service', 2, 'Present', '2019-11-09 10:25:14.978119'),
(18, 9, 2, 'Enos', 'Tybsc(cs)', 'Web Service', 2, 'Present', '2019-11-09 10:25:15.028078'),
(19, 10, 5, 'Inbasagar', 'Sybsc(cs)', 'Web Service', 4, 'Absent', '2019-11-13 13:23:07.935187'),
(20, 10, 6, 'Barathan', 'Sybsc(cs)', 'Web Service', 4, 'Absent', '2019-11-13 13:23:07.975189'),
(21, 11, 5, 'Inbasagar', 'Sybsc(cs)', 'Network Security', 4, 'Present', '2019-11-13 13:23:20.923835'),
(22, 11, 6, 'Barathan', 'Sybsc(cs)', 'Network Security', 4, 'Absent', '2019-11-13 13:23:21.025840'),
(23, 12, 5, 'Inbasagar', 'Sybsc(cs)', 'Web Service', 3, 'Present', '2019-11-22 18:47:44.568996'),
(24, 12, 6, 'Barathan', 'Sybsc(cs)', 'Web Service', 3, 'Present', '2019-11-22 18:47:44.606998'),
(25, 13, 1, 'Praveen', 'Tybsc(cs)', 'Web Service', 6, 'Present', '2019-11-22 18:50:44.211042'),
(26, 13, 2, 'Enos', 'Tybsc(cs)', 'Web Service', 6, 'Present', '2019-11-22 18:50:44.268046'),
(27, 13, 7, 'Renisa', 'Tybsc(cs)', 'Web Service', 6, 'Absent', '2019-11-22 18:50:44.373052'),
(28, 14, 1, 'Praveen', 'Tybsc(cs)', 'Artificial Intelligence', 9, 'Present', '2019-11-22 18:51:30.668700'),
(29, 14, 2, 'Enos', 'Tybsc(cs)', 'Artificial Intelligence', 9, 'Absent', '2019-11-22 18:51:30.736703'),
(30, 14, 7, 'Renisa', 'Tybsc(cs)', 'Artificial Intelligence', 9, 'Present', '2019-11-22 18:51:30.838709'),
(31, 15, 3, 'Jackson', 'Fybsc(cs)', 'Network Security', 4, 'Present', '2019-12-01 16:48:58.982537'),
(32, 15, 4, 'Jeberson', 'Fybsc(cs)', 'Network Security', 4, 'Present', '2019-12-01 16:48:59.019539'),
(33, 16, 3, 'Jackson', 'Fybsc(cs)', 'Network Security', 5, 'Present', '2019-12-01 16:50:16.641334'),
(34, 16, 4, 'Jeberson', 'Fybsc(cs)', 'Network Security', 5, 'Present', '2019-12-01 16:50:16.693337'),
(35, 16, 8, 'Afreen', 'Fybsc(cs)', 'Network Security', 5, 'Absent', '2019-12-01 16:50:16.774342'),
(36, 17, 3, 'Jackson', 'Fybsc(cs)', 'Network Security', 5, 'Absent', '2019-12-01 16:51:16.787445'),
(37, 17, 4, 'Jeberson', 'Fybsc(cs)', 'Network Security', 5, 'Present', '2019-12-01 16:51:16.859449'),
(38, 17, 8, 'Afreen', 'Fybsc(cs)', 'Network Security', 5, 'Present', '2019-12-01 16:51:16.929453'),
(39, 18, 1, 'Praveen', 'Tybsc(cs)', 'Artificial Intelligence', 8, 'Present', '2020-03-06 05:23:23.442723'),
(40, 18, 2, 'Enos', 'Tybsc(cs)', 'Artificial Intelligence', 8, 'Present', '2020-03-06 05:23:23.488726'),
(41, 18, 7, 'Renisa', 'Tybsc(cs)', 'Artificial Intelligence', 8, 'Absent', '2020-03-06 05:23:23.508727'),
(42, 19, 1, 'Praveen', 'Tybsc(cs)', 'Web Service', 3, 'Absent', '2020-08-12 18:23:47.737254'),
(43, 19, 2, 'Enos', 'Tybsc(cs)', 'Web Service', 3, 'Absent', '2020-08-12 18:23:47.802258'),
(44, 19, 7, 'Renisa', 'Tybsc(cs)', 'Web Service', 3, 'Absent', '2020-08-12 18:23:47.826259');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(1, 'Tybsc(cs)'),
(2, 'Sybsc(cs)'),
(3, 'Fybsc(cs)');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` int(50) NOT NULL,
  `lecture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `lecture`) VALUES
(1, 'Web Service'),
(2, 'Network Security'),
(3, 'Artificial Intelligence');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_info`
--

CREATE TABLE `lecture_info` (
  `id` int(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `lecture_count` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture_info`
--

INSERT INTO `lecture_info` (`id`, `department`, `subject`, `lecture_count`) VALUES
(1, 'fybsc(cs)', 'Network_Security', 4),
(2, 'sybsc(cs)', 'Artificial_Intelligence', 7),
(3, 'tybsc(cs)', 'Network_Security', 5),
(4, 'tybsc(cs)', 'Artificial_Intelligence', 4),
(5, 'sybsc(cs)', 'Network_Security', 7),
(6, 'sybsc(cs)', 'Network_Security', 7),
(7, 'Sybsc(cs)', 'Web Service', 5),
(8, 'Fybsc(cs)', 'Web Service', 10),
(9, 'Tybsc(cs)', 'Web Service', 2),
(10, 'Sybsc(cs)', 'Web Service', 4),
(11, 'Sybsc(cs)', 'Network Security', 4),
(12, 'Sybsc(cs)', 'Web Service', 3),
(13, 'Tybsc(cs)', 'Web Service', 6),
(14, 'Tybsc(cs)', 'Artificial Intelligence', 9),
(15, 'Fybsc(cs)', 'Network Security', 4),
(16, 'Fybsc(cs)', 'Network Security', 5),
(17, 'Fybsc(cs)', 'Network Security', 5),
(18, 'Tybsc(cs)', 'Artificial Intelligence', 8),
(19, 'Tybsc(cs)', 'Web Service', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `class`) VALUES
(1, 'Praveen', 'Tybsc(cs)'),
(2, 'Enos', 'Tybsc(cs)'),
(3, 'Jackson', 'Fybsc(cs)'),
(4, 'Jeberson', 'Fybsc(cs)'),
(5, 'Inbasagar', 'Sybsc(cs)'),
(6, 'Barathan', 'Sybsc(cs)'),
(7, 'Renisa', 'Tybsc(cs)'),
(8, 'Afreen', 'Fybsc(cs)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_info`
--
ALTER TABLE `attendance_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `student_id_2` (`student_id`),
  ADD KEY `student_id_3` (`student_id`),
  ADD KEY `student_id_4` (`student_id`),
  ADD KEY `student_id_5` (`student_id`),
  ADD KEY `lecture_id` (`lecture_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture_info`
--
ALTER TABLE `lecture_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_info`
--
ALTER TABLE `attendance_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lecture_info`
--
ALTER TABLE `lecture_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_info`
--
ALTER TABLE `attendance_info`
  ADD CONSTRAINT `lecture_id` FOREIGN KEY (`lecture_id`) REFERENCES `lecture_info` (`id`),
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
