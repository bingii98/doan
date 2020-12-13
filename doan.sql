-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 08:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `room` text NOT NULL,
  `subject` text NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `image`, `room`, `subject`, `author`) VALUES
(11, 'sdasdasd', '2.jpg', 'sadas', 'sadasd', 10),
(12, 'asdasd', '2.jpg', 'sd', 'sdasd', 9),
(13, 'dfdf', '2.jpg', 'dfsdf', 'dfsd', 9),
(14, 'images', '2.jpg', 'sdfsdf', 'sdf', 9);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idClass` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `idUser`, `idClass`, `parent`, `content`, `time`) VALUES
(3, 9, 11, 0, 'ghfgh', '2020-12-13 08:21:39'),
(4, 9, 11, 0, 'alo alo\n', '2020-12-13 08:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `join_history`
--

CREATE TABLE `join_history` (
  `idUser` int(11) NOT NULL,
  `idClass` int(11) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `role` text NOT NULL,
  `tel` text NOT NULL,
  `dateofbirth` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `role`, `tel`, `dateofbirth`) VALUES
(9, 'admindoan', 'c93ccd78b2076528346216b3b2f701e6', 'Giang Nguyễn', 'october15th98@gmail.com', 'admin', '0827374414', '2020-12-08'),
(10, 'admindoan1', 'c93ccd78b2076528346216b3b2f701e6', 'Giang Nguyễn', 'october15th98@gmail.com', 'teacher', '0827374414', '2020-05-07'),
(11, 'student1', 'c93ccd78b2076528346216b3b2f701e6', 'Giang Nguyễn', 'october15th98@gmail.com', 'user', '0827374414', '2000-06-17'),
(12, 'student2', 'c93ccd78b2076528346216b3b2f701e6', 'Nguyen Giang 1', 'october15th98@gmail.com', 'user', '0827374414', '2020-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
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
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
