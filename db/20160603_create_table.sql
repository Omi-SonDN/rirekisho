-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2016 at 11:19 AM
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
-- Table structure for table `it_skill`
--

CREATE TABLE IF NOT EXISTS `it_skill` (
`id` int(9) NOT NULL,
  `cv_id` int(6) NOT NULL,
  `skill_type` tinyint(9) NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `study_time` int(2) NOT NULL,
  `work_time` int(2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `it_skill`
--

INSERT INTO `it_skill` (`id`, `cv_id`, `skill_type`, `name`, `study_time`, `work_time`, `updated_at`, `created_at`) VALUES
(15, 105, 0, 'Chinese', 6, 3, '2016-06-02 02:04:03', '2016-06-02 09:03:29'),
(16, 106, 0, 'english', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(17, 107, 0, 'french', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(18, 108, 0, 'french', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(19, 109, 0, 'japanese', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(20, 110, 0, 'chinese', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(21, 111, 0, 'japanese', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(22, 105, 1, 'Java', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(23, 106, 1, 'Java', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(24, 107, 1, 'C', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(25, 108, 1, 'Ruby', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(26, 109, 1, 'Ruby', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(27, 110, 1, 'PHP', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(28, 111, 1, 'C', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `it_skill`
--
ALTER TABLE `it_skill`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `it_skill`
--
ALTER TABLE `it_skill`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
