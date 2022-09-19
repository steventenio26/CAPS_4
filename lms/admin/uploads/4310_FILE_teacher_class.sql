-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 02:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblms`
--

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `archive_status` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `department_id`, `thumbnails`, `school_year`, `archive_status`, `time_stamp`) VALUES
(212, 69, 49, 82, 9, 'admin/uploads/thumbnails.jpg', '2021-2022', 0, '2022-03-22 09:53:51'),
(213, 69, 50, 82, 9, 'admin/uploads/thumbnails.jpg', '2021-2022', 0, '2022-03-22 09:54:37'),
(214, 69, 49, 83, 9, 'admin/uploads/thumbnails.jpg', '2021-2022', 1, '2022-03-22 07:13:52'),
(215, 69, 51, 82, 9, 'admin/uploads/thumbnails.jpg', '2021-2022', 1, '2022-03-22 07:13:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
