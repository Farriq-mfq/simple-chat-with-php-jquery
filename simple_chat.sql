-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 03:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `uid`, `from_id`, `message`, `time`, `status`) VALUES
(542, 20, 21, 'hallo', '2020-12-05 05:47:56', '1'),
(543, 21, 20, 'hallo', '2020-12-05 05:48:01', '1'),
(544, 20, 24, 'hallo', '2020-12-05 05:50:52', '1'),
(545, 20, 24, 'la', '2020-12-05 05:50:52', '1'),
(546, 20, 24, 'p', '2020-12-05 05:50:52', '1'),
(547, 20, 24, 'p', '2020-12-05 05:50:52', '1'),
(548, 20, 24, 'p', '2020-12-05 05:50:52', '1'),
(549, 24, 20, 'p', '2020-12-05 05:50:58', '1'),
(550, 24, 20, 'p', '2020-12-05 05:50:58', '1'),
(551, 20, 22, 'hallo', '2020-12-05 05:51:46', '1'),
(552, 20, 22, 'p', '2020-12-05 05:51:46', '1'),
(553, 20, 22, 'p', '2020-12-05 05:51:46', '1'),
(554, 20, 22, 'p', '2020-12-05 05:51:46', '1'),
(555, 20, 22, 'p', '2020-12-05 05:51:46', '1'),
(556, 22, 20, 'spam', '2020-12-05 05:51:49', '1'),
(557, 22, 20, 'spam.', '2020-12-05 05:51:51', '1'),
(558, 22, 20, 'spam??', '2020-12-05 05:51:54', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `last_login`) VALUES
(20, 'farriq', 'farriq', '123', '2020-12-05 05:52:29'),
(21, 'lorem', 'lorem', '123', '2020-12-05 05:48:09'),
(22, 'bajang', 'bajang', '123', '2020-12-05 05:52:28'),
(23, 'budi', 'budi', '1223', '2020-12-05 05:49:07'),
(24, 'kod', 'kod', '123', '2020-12-05 05:51:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
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
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=559;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
