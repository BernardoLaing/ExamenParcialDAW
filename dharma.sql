-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 09:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entrada` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `STATUS` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registros`
--

INSERT INTO `registros` (`id`, `datetime`, `entrada`, `STATUS`) VALUES
(3, '2018-03-23 13:43:25', '', 'SYSTEM FAILURE'),
(4, '2018-03-23 13:43:42', '4 8 15 16 23 42', 'SUCCESS'),
(5, '2018-03-23 13:45:43', '4 8 15 16 23 42', 'SUCCESS'),
(6, '2018-03-23 13:45:49', 'asdfasdf', 'SYSTEM FAILURE'),
(7, '2018-03-23 13:46:05', '', 'SYSTEM FAILURE'),
(8, '2018-03-23 14:21:56', '4 8 15 26 23 42', 'SYSTEM FAILURE'),
(9, '2018-03-23 14:24:04', '4 8 15 16 23 42', 'SUCCESS'),
(10, '2018-03-23 14:24:46', '4 8 15 16 23 42', 'SUCCESS'),
(11, '2018-03-23 14:25:32', '4 8 15 16 23 42', 'SUCCESS'),
(12, '2018-03-23 14:27:13', '4 8 15 16 23 42', 'SUCCESS'),
(13, '2018-03-23 14:34:34', '', 'SYSTEM FAILURE'),
(14, '2018-03-23 14:34:39', '', 'SYSTEM FAILURE'),
(15, '2018-03-23 14:35:23', '4 8 15 16 23 42', 'SUCCESS'),
(16, '2018-03-23 14:35:40', '4 8 15 16 23 42', 'SUCCESS'),
(17, '2018-03-23 14:38:29', '4 8 15 16 23 42', 'SUCCESS'),
(18, '2018-03-23 14:38:51', '4 8 15 16 23 42', 'SUCCESS'),
(19, '2018-03-23 14:43:01', '4 8 15 16 23 42', 'SUCCESS'),
(20, '2018-03-23 14:43:42', '4 8 15 16 23 42', 'SUCCESS'),
(21, '2018-03-23 14:44:17', '4 8 15 16 23 42', 'SUCCESS'),
(22, '2018-03-23 14:44:23', 'mal', 'SYSTEM FAILURE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
