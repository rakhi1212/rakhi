-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 08:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rakhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(50) NOT NULL,
  `No_of_question` int(250) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `No_of_question`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 1, 'ds', 'sdcs', 'hf', 'hfhfdh', 'fhg', '2'),
(2, 23, 'what are u doing', 'n', 'es', 's', 'r', '4'),
(3, 0, '', '', '', '', '', ''),
(4, 21, 'ujop', '1', '2', '3', '4', '3'),
(5, 9, 'wjkkljdtgjklhtjkl', '1', '2', '3', '4', '2');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(250) NOT NULL,
  `Test_name` varchar(255) NOT NULL,
  `Date_of_creation` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `pass_percentage` int(255) NOT NULL,
  `No_of_attempts` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `Test_name`, `Date_of_creation`, `pass_percentage`, `No_of_attempts`) VALUES
(2, 'java', '2021-07-01 17:02:49.000000', 45, 2),
(3, 'python', '2021-07-01 17:03:25.000000', 45, 2),
(4, 'ruby', '2021-07-01 17:12:45.000000', 67, 3),
(5, 'perl', '2021-07-01 18:33:47.000000', 45, 2),
(6, 'php', '2021-07-01 18:34:54.000000', 46, 3),
(7, 'jav', '2021-07-01 18:46:14.000000', 46, 1),
(8, 'rt', '2021-07-01 18:46:43.000000', 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dt` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `contact`, `address`, `dt`, `token`, `status`) VALUES
(3, 'SHREYAPALIWAL1412@GMAIL.COM', 'SHREYA PALIWAL', '827ccb0eea8a706c4c34a16891f84e7b', '1234512345', 'Gorakhpur', '2021-07-01 11:35:45', 'b5e43d9bbb6d29b9327d9f426d1dc5', 'active'),
(4, 'rakhigkp5@gmail.com', 'Ritika Rajput', '827ccb0eea8a706c4c34a16891f84e7b', '1234512345', 'Gorakhpur', '2021-07-01 13:01:39', 'a9abe7d0357ff0f502945d9526a808', 'active'),
(5, 'rakhi.singh@gingerwebs.co.in', 'rakhi singh', '827ccb0eea8a706c4c34a16891f84e7b', '8279987049', 'Delhi', '2021-07-01 15:02:40', 'b5d569087235a986bf07b6eafd9161', 'active'),
(6, 'singhrakhi5010@gmail.com', 'Ritika Singh', '827ccb0eea8a706c4c34a16891f84e7b', '3453451212', 'Gorakhpur', '2021-07-01 15:09:32', 'ec8843d13923c78b4480a7a5c8a3a4', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
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
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
