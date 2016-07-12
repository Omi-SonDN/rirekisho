-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2016 at 10:33 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `05-CV-world`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
`id` int(9) NOT NULL,
  `user_id` int(6) NOT NULL,
  `bookmark_user_id` int(6) NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `bookmark_user_id`, `notes`, `created_at`, `updated_at`) VALUES
(41, 3, 13, '', '2016-06-16 01:31:30', '2016-06-16 01:31:30'),
(108, 3, 2, '', '2016-06-16 03:10:47', '2016-06-16 03:10:47'),
(115, 3, 10, '', '2016-06-16 18:27:50', '2016-06-16 18:27:50'),
(125, 3, 11, '', '2016-06-16 23:57:10', '2016-06-16 23:57:10'),
(145, 3, 12, '', '2016-06-17 08:23:27', '2016-06-17 08:23:27'),
(154, 1, 2, '', '2016-06-21 21:14:16', '2016-06-21 21:14:16'),
(157, 1, 12, '', '2016-06-21 23:28:11', '2016-06-21 23:28:11'),
(159, 1, 10, '', '2016-06-21 23:37:02', '2016-06-21 23:37:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=160;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
