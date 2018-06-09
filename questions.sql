-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2018 at 06:44 AM
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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question_name` varchar(255) NOT NULL,
  `question_option_a` varchar(255) NOT NULL,
  `question_option_b` varchar(255) NOT NULL,
  `question_option_c` varchar(255) NOT NULL,
  `question_option_d` varchar(255) NOT NULL,
  `question_correct_ans` varchar(50) NOT NULL,
  `question_created_at` date NOT NULL,
  `question_created_by` varchar(100) NOT NULL,
  `question_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_name`, `question_option_a`, `question_option_b`, `question_option_c`, `question_option_d`, `question_correct_ans`, `question_created_at`, `question_created_by`, `question_status`) VALUES
(1, 'what is your name', 'suraj', 'sandip', 'pawan ', 'akshay', 'pawan', '2018-01-10', 'admin', 1),
(2, 'php is abbreviated for', 'hyper text preprocessor', 'pre hyper texr', 'perl hyper hypertext', 'processor hyper programming', 'hyper text preprocessor', '2018-01-03', 'admin', 1),
(3, 'Who is the father of PHP?', 'Willam Makepiece', ' Rasmus Lerdorf', 'List Barely', 'Drek Kolkevi', ' Rasmus Lerdorf', '2018-01-09', 'admin', 1),
(4, 'PHP files have a default file extension of', '.html', '.php', '.xml', '.exe', '.php', '2018-01-02', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
