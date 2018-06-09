-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 05:47 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delto_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `course_id` int(60) NOT NULL,
  `student_fname` varchar(200) NOT NULL,
  `student_lname` varchar(250) NOT NULL,
  `student_email` varchar(200) NOT NULL,
  `student_mobile` varchar(12) NOT NULL,
  `student_gender` varchar(50) NOT NULL,
  `student_dob` date NOT NULL,
  `student_last_education` varchar(255) NOT NULL,
  `student_address` text NOT NULL,
  `student_city` varchar(255) NOT NULL,
  `student_state` varchar(255) NOT NULL,
  `student_pincode` int(11) NOT NULL,
  `student_username` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_exam_passcode` varchar(250) NOT NULL,
  `student_profile_pic` varchar(255) NOT NULL,
  `student_addmission_month` date NOT NULL,
  `student_created_at` date NOT NULL,
  `student_payement_date` date NOT NULL,
  `student_course_end_date` date NOT NULL,
  `student_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `center_id`, `course_id`, `student_fname`, `student_lname`, `student_email`, `student_mobile`, `student_gender`, `student_dob`, `student_last_education`, `student_address`, `student_city`, `student_state`, `student_pincode`, `student_username`, `student_password`, `student_exam_passcode`, `student_profile_pic`, `student_addmission_month`, `student_created_at`, `student_payement_date`, `student_course_end_date`, `student_status`) VALUES
(32, 2, 1, 'Xfnx', 'Fbzx', 'asda@sfjan.dk', '4545847128', '0', '0000-00-00', 'jvjb bh ', ' b j', 'bjjb j', 'hbhjb', 123786, 'Xfnx32', 'Gu3LJUq4', 'GW5Rsp58', 'profile_pic/Xfnx32', '0000-00-00', '2018-01-12', '0000-00-00', '0000-00-00', 1),
(33, 2, 1, 'Suraj', 'Shinde', 'suraj@webosys.com', '9874563210', 'male', '1999-09-29', 'BE', 'wadegavhan,414302', 'pune', 'Maharashtra', 123457, 'Suraj33', '12345678', '123', 'profile_pic/suraj.jpg', '0000-00-00', '2018-01-11', '0000-00-00', '0000-00-00', 1),
(34, 2, 1, 'Aishwarya', 'Jadhav', 'aish@gmail.com', '8975115523', 'female', '1996-04-18', 'BE', 'Omerga', 'omerga', 'maharashtra', 123786, '', '', '', ' ', '0000-00-00', '2018-01-11', '0000-00-00', '0000-00-00', 1),
(37, 1, 1, 'ABC', 'XYZ', 'abc@gmail.com', '', '', '0000-00-00', '', '', '', '', 0, '', '12345678', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1),
(38, 2, 1, 'Tushar', 'Shinde', 'tushar@gmail.com', '9075554309', '0', '0000-00-00', 'BA', 'pune', 'Pune', 'Maharashtra', 414302, '', '12345678', '5Vo2wOCj', 'profile_pic/Tushar528.jpg', '0000-00-00', '2018-01-24', '0000-00-00', '0000-00-00', 1),
(41, 1, 1, 'Anyone', '', '', '', '0', '0000-00-00', '', '', '', '', 0, '', '', '', '', '0000-00-00', '2018-01-28', '0000-00-00', '0000-00-00', 0),
(42, 2, 1, 'SANDIP', 'SHINDE', '', '', '0', '0000-00-00', '', '', 'Warje', 'maharashtra', 0, '', '', '', 'profile_pic/SANDIP414.jpg', '0000-00-00', '2018-02-01', '0000-00-00', '0000-00-00', 0),
(45, 2, 1, 'ANYONE', '', '', '', '0', '0000-00-00', '', '', '', '', 0, '', '', '', '', '0000-00-00', '2018-02-01', '0000-00-00', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
