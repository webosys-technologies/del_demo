-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 11:39 AM
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
-- Table structure for table `sub_centers`
--

CREATE TABLE `sub_centers` (
  `sub_center_id` int(255) NOT NULL,
  `center_id` int(255) NOT NULL,
  `sub_center_fullname` varchar(255) NOT NULL,
  `sub_center_name` varchar(255) NOT NULL,
  `sub_center_created_at` date NOT NULL,
  `sub_center_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_centers`
--

INSERT INTO `sub_centers` (`sub_center_id`, `center_id`, `sub_center_fullname`, `sub_center_name`, `sub_center_created_at`, `sub_center_status`) VALUES
(1, 2, 'AKSHAY', 'MOHITE', '2018-04-04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_centers`
--
ALTER TABLE `sub_centers`
  ADD PRIMARY KEY (`sub_center_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_centers`
--
ALTER TABLE `sub_centers`
  MODIFY `sub_center_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
