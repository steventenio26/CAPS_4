-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 03:09 AM
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
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(174, 'walter', '2022-03-17 18:23:33', 'Add Subject 101'),
(175, 'walter', '2022-03-17 18:25:01', 'Add Student 1'),
(176, 'walter', '2022-03-17 20:25:07', 'Add Student 2'),
(177, 'walter', '2022-03-17 21:15:59', 'Add Student 3'),
(178, 'walter', '2022-03-17 21:35:36', 'Add Student qee'),
(179, 'walter', '2022-03-18 18:23:50', 'Add Student 21-0001'),
(180, 'walter', '2022-03-18 18:57:04', 'Add Student 123'),
(181, 'walter', '2022-03-18 19:17:33', 'Add Student 123');

-- --------------------------------------------------------

--
-- Table structure for table `archive_teacher_class`
--

CREATE TABLE `archive_teacher_class` (
  `archive_teacher_class_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive_teacher_class`
--

INSERT INTO `archive_teacher_class` (`archive_teacher_class_id`, `teacher_class_id`) VALUES
(1, 211),
(2, 210),
(3, 209);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`) VALUES
(35, '../admin/uploads/4155_FILE_March 23, 2022.pdf', '2022-03-24 03:51:16', 'desc', 69, 209, 'bootstrap.zip'),
(36, '../admin/uploads/4310_FILE_teacher_class.sql', '2022-03-24 03:53:32', 'd', 69, 209, 'Global.pptx');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(49, 'Grade1-A'),
(50, 'Grade1-B'),
(51, 'SBIT-4K');

-- --------------------------------------------------------

--
-- Table structure for table `class_exam`
--

CREATE TABLE `class_exam` (
  `class_exam_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `exam_time` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `date_deploy` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_exam`
--

INSERT INTO `class_exam` (`class_exam_id`, `teacher_class_id`, `exam_time`, `exam_id`, `date_deploy`) VALUES
(62, 209, 3600, 22, '2022-03-23 16:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `class_quiz`
--

CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `date_deploy` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_quiz`
--

INSERT INTO `class_quiz` (`class_quiz_id`, `teacher_class_id`, `quiz_time`, `quiz_id`, `date_deploy`) VALUES
(62, 209, 600, 22, '2022-03-20 13:45:16'),
(63, 209, 600, 26, '2022-03-23 20:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_overview`
--

CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `dean` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `dean`, `teacher_id`) VALUES
(9, 'Math', '', 70);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events_demo`
--

CREATE TABLE `events_demo` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `color` varchar(20) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `t_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `exam_title` varchar(50) NOT NULL,
  `exam_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_title`, `exam_description`, `date_added`, `teacher_id`) VALUES
(22, 'Week 1', 'description', '2022-03-18 12:56:07', 69);

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `question_id` int(11) NOT NULL,
  `question_no` varchar(30) NOT NULL,
  `question` varchar(255) NOT NULL,
  `opt1` varchar(50) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `exam_id` int(50) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`question_id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `exam_id`, `points`) VALUES
(1, '1', 'Which animal lays eggs?', 'cat', 'dog', 'bird', 'human', 'cat', 22, 1),
(9, '2', 'What part of the body helps you move?', 'Eyes', 'Lungs', 'Pancreas', 'Muscles', 'Muscles', 22, 2),
(13, '3', 'What is the boiling point of water?', '25Celcius', '50Celcius\r\n\r\n', '75Celcius', '100Celcius', '100Celcius', 22, 1),
(17, '4', '1+1', '0', '3', '1', '5', '2', 22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(11) NOT NULL,
  `student_id` int(255) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `total_question` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `wrong_answer` varchar(255) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `student_id`, `exam_id`, `total_question`, `correct_answer`, `wrong_answer`, `time`) VALUES
(467, 220, 22, '4', '2', '2', '2022-03-23'),
(468, 224, 22, '4', '2', '2', '2022-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `try_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id`, `ip_address`, `try_time`) VALUES
(40, '::1', 1647523262),
(41, '::1', 1647523270);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`, `message_status`) VALUES
(85, 206, 'hi', '2022-03-20 16:04:12', 198, 'Perez Jacqueline', 'Walter Germanes', ''),
(87, 198, 'rgfdszxfc555555555555555555555555555555555555555555555555555555555555555555', '2022-03-20 16:12:40', 206, 'walter Germanes', 'Perez Jacqueline', ''),
(88, 206, 'qwerrewdssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2022-03-20 16:13:17', 198, 'Perez Jacqueline', 'Walter Germanes', ''),
(89, 206, 'o', '2022-03-20 16:42:05', 198, 'Perez Jacqueline', 'Walter Germanes', ''),
(90, 206, 'ðŸ˜‚ðŸ˜‚ðŸ˜‚', '2022-03-20 16:43:06', 198, 'Perez Jacqueline', 'Walter Germanes', ''),
(91, 206, 'hi', '2022-03-20 16:49:42', 198, 'Perez Jacqueline', 'Walter Germanes', ''),
(92, 198, 'y', '2022-03-20 16:59:10', 198, 'walter Germanes', 'Walter Germanes', ''),
(93, 206, 'ok', '2022-03-20 21:40:27', 198, 'Perez Jacqueline', 'Walter Germanes', ''),
(94, 206, 'hi', '2022-03-20 22:09:54', 198, 'Perez Jacqueline', 'Walter Germanes', ''),
(95, 206, 'hii', '2022-03-20 22:15:24', 198, 'Perez Jacqueline', 'Walter Germanes', ''),
(96, 206, 'hii', '2022-03-20 22:18:33', 198, 'Perez Jacqueline', 'Walter Germanes', ''),
(97, 206, 'hii', '2022-03-20 22:19:32', 198, 'Perez Jacqueline', 'Walter Germanes', ''),
(98, 206, 'k', '2022-03-20 22:24:16', 198, 'Perez Jacqueline', 'Walter Germanes', '');

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`message_sent_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`) VALUES
(29, 69, 'hi', '2022-03-20 13:40:28', 198, 'John sunga', 'walter Germanes'),
(30, 69, 'g', '2022-03-20 13:42:55', 198, 'John sunga', 'walter Germanes'),
(31, 69, 'ok', '2022-03-20 13:43:32', 198, 'John sunga', 'walter Germanes'),
(32, 69, 'ooo', '2022-03-20 13:46:06', 198, 'John sunga', 'walter Germanes'),
(33, 70, '44', '2022-03-20 13:57:10', 198, 'ben ten', 'walter Germanes');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`) VALUES
(272, 207, 'Add Annoucements', '2022-03-17 18:26:32', 'announcements_student.php'),
(273, 207, 'Add Annoucements', '2022-03-17 18:26:45', 'announcements_student.php'),
(274, 207, 'Add Practice Quiz file', '2022-03-18 16:50:57', 'student_quiz_list.php'),
(275, 208, 'Add Practice Quiz file', '2022-03-18 16:50:57', 'student_quiz_list.php'),
(276, 207, 'Add Annoucements', '2022-03-19 18:45:02', 'announcements_student.php'),
(277, 209, 'Add Practice Quiz file', '2022-03-20 21:45:16', 'student_quiz_list.php'),
(278, 209, 'Add Practice Exam file', '2022-03-24 00:13:08', 'select_exam.php'),
(279, 209, 'Add Assignment file name <b>bootstrap.zip</b>', '2022-03-24 03:51:16', 'assignment_student.php'),
(280, 209, 'Add Assignment file name <b>Global.pptx</b>', '2022-03-24 03:53:32', 'assignment_student.php'),
(281, 209, 'Add Practice Quiz file', '2022-03-24 04:09:58', 'student_quiz_list.php');

-- --------------------------------------------------------

--
-- Table structure for table `notification_read`
--

CREATE TABLE `notification_read` (
  `notification_read_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification_read_teacher`
--

CREATE TABLE `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question_no` varchar(30) NOT NULL,
  `question` varchar(255) NOT NULL,
  `opt1` varchar(50) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `quiz_id` int(50) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `quiz_id`, `points`) VALUES
(1, '1', 'Which animal lays eggs?', 'cat', 'dog', 'bird', 'human', 'cat', 22, 1),
(6, '2', '1+5 = ?', '2', '6', '3', '5', '2', 22, 0),
(9, '3', 'What part of the body helps you move?', 'Eyes', 'Lungs', 'Pancreas', 'Muscles', 'Muscles', 22, 1),
(10, '4', ' What star shines in the day and provides light?', 'Moon', 'Venus', ' Mars', ' Sun', ' Sun', 22, 1),
(11, '5', 'Which shape is a round?', 'Rectangle', 'Circle', 'Square', ' Triangle', 'Circle', 22, 1),
(12, '6', ' Which is the lightest element in the periodic table?', 'Helium', 'Carbon', 'Hydrogen', 'Nitrogen', 'Hydrogen', 22, 0),
(13, '7', 'What is the boiling point of water?', '25Celcius', '50Celcius\r\n\r\n', '75Celcius', '100Celcius', '100Celcius', 22, 1),
(16, '1', '1+1', '1', '3', '4', '6', '1', 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_description`, `date_added`, `teacher_id`) VALUES
(22, 'Week 1', 'description', '2022-03-18 12:56:07', 69),
(26, 'sample', 'sample', '2022-03-20 21:43:38', 69);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL,
  `student_id` int(255) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `total_question` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `wrong_answer` varchar(255) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `student_id`, `quiz_id`, `total_question`, `correct_answer`, `wrong_answer`, `time`) VALUES
(470, 224, 22, '8', '5', '3', '2022-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`) VALUES
(11, '2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class_id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `default_password` text NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reg_date` varchar(30) NOT NULL,
  `pass_stat` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `class_id`, `email`, `username`, `password`, `default_password`, `location`, `status`, `reg_date`, `pass_stat`) VALUES
(198, 'walter', 'Germanes', 49, 'waltergermanes999@gmail.com', '1', '1', '8e534ffe6092a279f66e2eed43a991e3', 'uploads/direct-download.png', 'Unregistered', '', 'Updated'),
(199, 'student1', 'student1', 49, 'student@gmail.com', '2', '27a96f6bb7451d9f30ad118150867067', '27a96f6bb7451d9f30ad118150867067', 'uploads/user.png', 'Unregistered', '', 'Updated'),
(205, 'Lastname', 'Firstname', 0, 'Email Address', 'Student ID', 'DObnOoBzXuk0', 'dd01f571b53702f709beb9a2a2973f2e', 'uploads/user.png', '', '', 'Default'),
(206, 'Perez', 'Jacqueline', 49, 'jacqueline.suazo.perez@gmail.com', '18-1711', '2ZYWWkzITOJC', '41f7faffe438240c2bb5db1b36979a23', 'uploads/user.png', '', '', 'Default'),
(207, 'Lim', 'Chin-chin Claire', 49, 'chin.chin.claire.subion.lim@gmail.com', '18-1050', 'uIOgaYPgaYhq', 'e9928efbd07c0c4c719d2c81083f846e', 'uploads/user.png', '', '', 'Default'),
(208, 'Berja', 'John Carlo', 49, 'john.carlo.manlangit.berja@gmail.com', '18-1931', 'GJv3FWb7g9BH', 'dcd55989728b104f7490e8408efbb624', 'uploads/user.png', '', '', 'Default'),
(209, 'Gutierrez', 'Cyril', 50, 'cyril.plasencia.gutierrez@gmail.com', '18-1636', 'EOSCIhfKQmL5', '95bd170b7837173e3a318d298687d2ab', 'uploads/user.png', '', '', 'Default'),
(210, 'Dumayo', 'Christian Dave', 50, 'dave.dumayo0425@gmail.com', '18-1632', '55WStSgVLHxf', 'c7fccc3918d4505d5bead2a24e1aa0cb', 'uploads/user.png', '', '', 'Default'),
(211, 'Paquibolan', 'Melissa', 50, 'Melissa.Soriaga.Paquibolan@gmail.com', '18-1756', 'TyhtMaplGrFA', 'a745d01ad6faf455dc936590ef3ff3c2', 'uploads/user.png', '', '', 'Default'),
(212, 'Cerujano', 'Jimuel', 50, 'jimuel.tamayo.cerujano@gmail.com', '18-1398', 'A6WYj8zLlCA0', '935d6933007b3a90caaf72f8684bc9f0', 'uploads/user.png', '', '', 'Default'),
(213, 'Estember', 'John Rey', 0, 'john.rey.gorgonio.estember@gmail.com', '18-1699', '0Gu2NlUVkUZF', '577cb30877eef4b9ead9661c38d79b8d', 'uploads/user.png', '', '', 'Default'),
(214, 'Cariaga', 'Henry', 0, 'henry.cariaga.jr@gmail.com', '18-4438', '9K4Igc3AlsOk', '8477a1c4c3e3dabcf4502c822f5a8443', 'uploads/user.png', '', '', 'Default'),
(215, 'Barbacena', 'Marie Marneille', 0, 'marie.marneille.barbacena@gmail.com', '18-1159', 'k9oaekkjGXiI', '420b5d917dd4f281c1a01a57a53f5819', 'uploads/user.png', '', '', 'Default'),
(216, 'Vargas', 'Joshua', 0, 'joshua.locsin.vargas@gmail.com', '18-4422', 'iSB2ToOXK0Di', 'bb86e6858a7842bd3e75bf35016c2f67', 'uploads/user.png', '', '', 'Default'),
(217, 'Absalon', 'Giziel ', 0, 'giziel.absalo@gmail.com', '18-1732', 'IGWYfYFxAFJP', '14b12bd7d7d4d32e5fab7778ca0e698f', 'uploads/user.png', '', '', 'Default'),
(218, 'Queja', 'John Carlo', 0, 'johncarlo.tangonan.queja@gmail.com', '18-4421', 'GK3wIwlSpthI', 'a0efbd4047c51b189e16a77b221a5e45', 'uploads/user.png', '', '', 'Default'),
(219, 'Carlos', 'Joshua keizer', 0, 'joshua.keizer.goyal.carlos@gmail.com', '18-0833', 'Kaj6NBcocPRW', '545e19e69a59158bf63e9b61dfa2579f', 'uploads/user.png', '', '', 'Default'),
(220, 'Germanes', 'Walter', 49, 'walter.dumduma.germanes@gmail.com', '18-1618', 'E513UgMjluoj', '5f2b7360c72fdfd8e42b31a982d35de7', 'uploads/user.png', '', '', 'Default'),
(221, 'Malonga', 'Jeremy Julian', 49, 'jeremy.julian.malonga@gmail.com', '18-1322', 'mHbUvh6pXOp6', 'd7d26cb09f63625b9e52fe0841073e88', 'uploads/user.png', '', '', 'Default'),
(222, 'Espineda', 'Irene', 49, 'irene.celis.espineda@gmail.com', '18-1757', 'wDx82N3esqHx', 'a6ddc48c0a55fad3ca2d9c12fc1f339b', 'uploads/user.png', '', '', 'Default'),
(223, 'Acuyong', 'Joey Boy', 49, 'joey.boy.acuyong.@gmail.com', '16-2214', 'lJ3V3FPJ6Dex', '59ca2308355d6b7d71cd3545d6340fec', 'uploads/user.png', '', '', 'Default'),
(224, 'Taba', 'Janine Victoria', 49, 'janine.victoria.taba1@gmail.com', '18-1883', 'S2XQCK4kQBiG', '3b76758058915a4c1294d5752959e3b3', 'uploads/user.png', '', '', 'Default'),
(225, 'Tadeo', 'Mark Alex', 50, 'markalex.sotol.tadeo@gmail.com', '18-1712', 'NtpAlPGgMOIa', '260c9a6c0a259f90ab72cba9184e1c9c', 'uploads/user.png', '', '', 'Default'),
(226, 'Ramos', 'Lorraine Ann', 50, 'lorraine.ann.ramos03162000@gmail.com', '18-1719', 'ngSzwZwCwYGj', '25aad64213d607deaf5fa5c699e83d35', 'uploads/user.png', '', '', 'Default'),
(227, 'Ombid', 'Marjorie Elyza', 50, 'marjOmbid@gmail.com', '18-1708', 'Zc0nPfrjrjfv', 'cda4657a252762b476eff7db158fe032', 'uploads/user.png', '', '', 'Default'),
(228, 'Pico', 'Jovelyn', 50, 'jovelynpico.z@gmail.com', '18-1914', 'EAR2mocRgIfq', '8a8578cfd956af5510ef59afa971b254', 'uploads/user.png', '', '', 'Default'),
(231, 'Zapanta', 'Eddeneil', 0, 'eddeneil.evidor.zapanta@gmail.com', '16-1662', 'ZgE51WDU9K7u', 'a2b9e121c4c3b42e337d3996c518df0c', 'uploads/user.png', '', '', 'Default'),
(232, 'Bustamante', 'Greg Rodnie', 0, 'greg.rodnie.bustamant@gmail.com', '18-1943', '9NrH2CJYk6eW', '8d3fca0f575b4d65338b734b0cd73ec8', 'uploads/user.png', '', '', 'Default'),
(233, 'Trias', 'Jimmy', 0, 'trias.jualo.jimmy@gmail.com', '18-1801', 'VvMGCaHc8jEh', 'ac53d2bac8da85524ce072883d58c15d', 'uploads/user.png', '', '', 'Default'),
(234, 'Ong', 'Hans David', 0, 'hanzdavid.marcelo.ong20@gmail.com', '16-1756', 'LVQvODBqIrZF', 'eec94bd551e23e5f517bc9845211bf9d', 'uploads/user.png', '', '', 'Default'),
(235, ' Enardecido', 'John Emil ', 0, 'enardecidojohnemil@gmail.com', '18-1013', 'HearvndqIugq', '35492965f7ac968f08a0767f5ad68d95', 'uploads/user.png', '', '', 'Default'),
(236, 'Reabal', 'Marc Genesis', 0, 'marc.genesis.reabal@gmail.com', '18-1573 ', '8zaJY8bCphY1', '4e74ef39d7c0883be973c2322e3f65d3', 'uploads/user.png', '', '', 'Default'),
(237, 'Dedal', 'Elra Jeane', 0, 'elrajeanesanico13@gmail.com', '18-1657', 'w5pMRd7jBaDL', 'b60f401d4488f10deef64952dc50b45f', 'uploads/user.png', '', '', 'Default'),
(238, 'Bautista', 'James Marionne', 0, 'james.marionne.beltran.bautista@gmail.com', '18-1713', 'tOM5wFYyS4Ih', 'e58b1f9ba7a40af16fc3a8e30f9c7fc5', 'uploads/user.png', '', '', 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `student_answer`
--

CREATE TABLE `student_answer` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_no` varchar(22) NOT NULL,
  `question_id` varchar(50) NOT NULL,
  `selected_answer` varchar(255) NOT NULL DEFAULT 'Unanswered',
  `correct_answer` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_answer`
--

INSERT INTO `student_answer` (`id`, `student_id`, `quiz_id`, `question_no`, `question_id`, `selected_answer`, `correct_answer`, `points`) VALUES
(1139, 224, 22, '1', '1', 'cat', 'cat', 0),
(1140, 224, 22, '2', '6', '6', '2', 0),
(1141, 224, 22, '3', '7', '15', '16', 0),
(1142, 224, 22, '4', '9', 'Muscles', 'Muscles', 0),
(1143, 224, 22, '5', '10', ' Sun', ' Sun', 0),
(1144, 224, 22, '6', '11', 'Circle', 'Circle', 0),
(1145, 224, 22, '7', '12', 'Helium', 'Hydrogen', 0),
(1146, 224, 22, '8', '13', '100Celcius', '100Celcius', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_answer_exam`
--

CREATE TABLE `student_answer_exam` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_no` varchar(22) NOT NULL,
  `question_id` varchar(50) NOT NULL,
  `selected_answer` varchar(255) NOT NULL DEFAULT 'Unanswered',
  `correct_answer` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_answer_exam`
--

INSERT INTO `student_answer_exam` (`id`, `student_id`, `exam_id`, `question_no`, `question_id`, `selected_answer`, `correct_answer`, `points`) VALUES
(1109, 220, 22, '1', '1', 'bird', 'cat', 0),
(1110, 220, 22, '2', '9', 'Muscles', 'Muscles', 0),
(1111, 220, 22, '3', '13', '100Celcius', '100Celcius', 0),
(1112, 220, 22, '4', '17', '3', '2', 0),
(1113, 224, 22, '1', '1', 'cat', 'cat', 0),
(1114, 224, 22, '2', '9', 'Muscles', 'Muscles', 0),
(1115, 224, 22, '3', '13', '50Celcius', '100Celcius', 0),
(1116, 224, 22, '4', '17', '1', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `student_assignment_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `assignment_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_backpack`
--

CREATE TABLE `student_backpack` (
  `file_id` int(11) NOT NULL,
  `upload_file_id` varchar(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `Pre_req` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`, `description`, `unit`, `Pre_req`, `semester`) VALUES
(82, '101', 'math', '', 'no description', 0, '', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `default_password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department_id` int(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(500) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL,
  `pass_stat` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `default_password`, `firstname`, `lastname`, `department_id`, `email`, `location`, `about`, `teacher_stat`, `pass_stat`) VALUES
(69, 'walter', 'FrsOZymj2pgZ', '607c9a446b0ee0958ad933536f72b09d', 'John', 'sunga', 9, 'awit@gmail.com', 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 'Default'),
(70, 'kokey', 'XF2006j9ZlNS', 'cf44b5fb8be2854ac7c1777bf1cae724', 'ben', 'ten', 9, 'awit@gmail.com', 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_backpack`
--

CREATE TABLE `teacher_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(209, 69, 49, 82, 9, 'admin/uploads/thumbnails.jpg', '2021-2022', 0, '2022-03-23 16:07:01'),
(213, 69, 50, 82, 9, 'admin/uploads/thumbnails.jpg', '2021-2022', 0, '2022-03-24 01:00:10'),
(215, 69, 51, 82, 9, 'admin/uploads/thumbnails.jpg', '2021-2022', 1, '2022-03-22 07:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_announcements`
--

CREATE TABLE `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class_announcements`
--

INSERT INTO `teacher_class_announcements` (`teacher_class_announcements_id`, `content`, `teacher_id`, `teacher_class_id`, `date`) VALUES
(228, 'hi', '51', 207, '2022-03-17 18:26:32'),
(229, 'h r u', '51', 207, '2022-03-17 18:26:45'),
(230, 'https://www.w3schools.com/sql/sql_and_or.asp', '51', 207, '2022-03-19 18:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class_student`
--

INSERT INTO `teacher_class_student` (`teacher_class_student_id`, `teacher_class_id`, `student_id`, `teacher_id`) VALUES
(479, 209, 198, 69),
(480, 209, 199, 69),
(481, 209, 206, 69),
(482, 209, 207, 69),
(483, 209, 208, 69),
(484, 209, 220, 69),
(485, 209, 221, 69),
(486, 209, 222, 69),
(487, 209, 223, 69),
(488, 209, 224, 69),
(513, 213, 209, 69),
(514, 213, 210, 69),
(515, 213, 211, 69),
(516, 213, 212, 69),
(517, 213, 225, 69),
(518, 213, 226, 69),
(519, 213, 227, 69),
(520, 213, 228, 69);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notification`
--

CREATE TABLE `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_shared`
--

CREATE TABLE `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `shared_teacher_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(19, 'walter', 'walter', 'walter', 'walter'),
(20, 'jemymalonga', 'jeremy', 'Jeremy Julian', 'Malonga');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(666, 'walter', '2022-03-17 18:20:01', '2022-03-20 14:31:28', 19),
(667, 'walter', '2022-03-17 18:23:01', '2022-03-20 14:31:28', 19),
(668, 'walter', '2022-03-17 18:31:22', '2022-03-20 14:31:28', 19),
(669, 'walter', '2022-03-17 21:24:42', '2022-03-20 14:31:28', 19),
(670, 'walter', '2022-03-17 21:24:54', '2022-03-20 14:31:28', 19),
(671, 'walter', '2022-03-18 09:44:12', '2022-03-20 14:31:28', 19),
(672, 'walter', '2022-03-18 12:46:35', '2022-03-20 14:31:28', 19),
(673, 'walter', '2022-03-18 17:08:41', '2022-03-20 14:31:28', 19),
(674, 'walter', '2022-03-18 18:55:49', '2022-03-20 14:31:28', 19),
(675, 'walter', '2022-03-18 19:49:38', '2022-03-20 14:31:28', 19),
(676, 'walter', '2022-03-19 17:18:58', '2022-03-20 14:31:28', 19),
(677, 'walter', '2022-03-19 21:00:05', '2022-03-20 14:31:28', 19),
(678, 'walter', '2022-03-19 23:08:48', '2022-03-20 14:31:28', 19),
(679, 'walter', '2022-03-19 23:12:04', '2022-03-20 14:31:28', 19),
(680, 'walter', '2022-03-19 23:34:00', '2022-03-20 14:31:28', 19),
(681, 'walter', '2022-03-19 23:56:57', '2022-03-20 14:31:28', 19),
(682, 'walter', '2022-03-20 14:25:32', '2022-03-20 14:31:28', 19),
(683, 'walter', '2022-03-23 21:48:28', '', 19),
(684, 'walter', '2022-03-24 00:03:23', '', 19),
(685, 'walter', '2022-03-24 00:08:54', '', 19),
(686, 'walter', '2022-03-24 02:27:55', '', 19),
(687, 'walter', '2022-03-24 06:37:42', '', 19),
(688, 'walter', '2022-03-24 08:43:49', '', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `archive_teacher_class`
--
ALTER TABLE `archive_teacher_class`
  ADD PRIMARY KEY (`archive_teacher_class_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_exam`
--
ALTER TABLE `class_exam`
  ADD PRIMARY KEY (`class_exam_id`);

--
-- Indexes for table `class_quiz`
--
ALTER TABLE `class_quiz`
  ADD PRIMARY KEY (`class_quiz_id`);

--
-- Indexes for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  ADD PRIMARY KEY (`class_subject_overview_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `events_demo`
--
ALTER TABLE `events_demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_sent`
--
ALTER TABLE `message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notification_read`
--
ALTER TABLE `notification_read`
  ADD PRIMARY KEY (`notification_read_id`);

--
-- Indexes for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  ADD PRIMARY KEY (`notification_read_teacher_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_answer`
--
ALTER TABLE `student_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_answer_exam`
--
ALTER TABLE `student_answer_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`student_assignment_id`);

--
-- Indexes for table `student_backpack`
--
ALTER TABLE `student_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  ADD PRIMARY KEY (`teacher_class_announcements_id`);

--
-- Indexes for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  ADD PRIMARY KEY (`teacher_notification_id`);

--
-- Indexes for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  ADD PRIMARY KEY (`teacher_shared_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `archive_teacher_class`
--
ALTER TABLE `archive_teacher_class`
  MODIFY `archive_teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `class_exam`
--
ALTER TABLE `class_exam`
  MODIFY `class_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `class_quiz`
--
ALTER TABLE `class_quiz`
  MODIFY `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  MODIFY `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `events_demo`
--
ALTER TABLE `events_demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=469;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `message_sent`
--
ALTER TABLE `message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `notification_read`
--
ALTER TABLE `notification_read`
  MODIFY `notification_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  MODIFY `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `student_answer`
--
ALTER TABLE `student_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1147;

--
-- AUTO_INCREMENT for table `student_answer_exam`
--
ALTER TABLE `student_answer_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1117;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `student_assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_backpack`
--
ALTER TABLE `student_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  MODIFY `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=521;

--
-- AUTO_INCREMENT for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  MODIFY `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
