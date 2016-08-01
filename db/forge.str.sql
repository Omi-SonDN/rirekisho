-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2016 at 01:03 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forge`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `bookmark_user_id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bookmarks_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bookmarks`
--

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE IF NOT EXISTS `cvs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `First_name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Furigana_name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Photo` text COLLATE utf8_unicode_ci NOT NULL,
  `Birth_date` date NOT NULL,
  `Gender` tinyint(4) NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Contact_information` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Self_intro` text COLLATE utf8_unicode_ci NOT NULL,
  `Marriage` tinyint(4) NOT NULL,
  `配偶者の扶養義務` tinyint(4) NOT NULL,
  `Request` text COLLATE utf8_unicode_ci NOT NULL,
  `positions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Memo` text COLLATE utf8_unicode_ci NOT NULL,
  `Active` tinyint(4) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `version` tinyint(4) NOT NULL,
  `apply_to` tinyint(4) NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `github` text COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cvs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=189 ;

--
-- Dumping data for table `cvs`
--


-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `groups`
--



-- --------------------------------------------------------

--
-- Table structure for table `it_skill`
--

CREATE TABLE IF NOT EXISTS `it_skill` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cv_id` int(10) unsigned NOT NULL,
  `skill_type` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `study_time` int(11) NOT NULL,
  `work_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `it_skill_cv_id_foreign` (`cv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=192 ;

--
-- Dumping data for table `it_skill`
--


-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_18_090119_add_image_to_users', 2),
('2016_07_27_081630_create_cvs_table', 3),
('2016_07_27_081636_create_records_table', 3),
('2016_07_27_081746_create_positions_table', 3),
('2016_07_27_081818_create_groups_table', 3),
('2016_07_27_081836_create_bookmarks_table', 3),
('2016_07_27_092211_create_it_skill_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_users_groups`
--

CREATE TABLE IF NOT EXISTS `pivot_users_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pivot_users_groups`
--

INSERT INTO `pivot_users_groups` (`id`, `user_id`, `group_id`) VALUES
(19, 14, 5),
(20, 15, 5),
(21, 12, 1),
(22, 7, 1),
(23, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `active`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Vị trí 1', 1, '123456', '0000-00-00 00:00:00', '2016-07-30 09:20:02'),
(2, 'vi tri 2', 0, '', '2016-06-08 06:06:18', '2016-06-08 07:31:53'),
(3, 'vi tri 3', 0, '', '2016-06-08 06:39:52', '2016-06-08 10:29:02'),
(4, 'vi tri 4', 1, '', '2016-06-08 07:14:27', '2016-06-08 07:14:27'),
(5, 'vi tri 5', 1, '', '2016-06-08 07:14:35', '2016-06-08 07:15:46'),
(6, 'vi tri 6 ', 1, '', '2016-06-08 07:16:36', '2016-06-08 10:28:29'),
(24, 'Khong xac dinh', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cv_id` int(10) unsigned NOT NULL,
  `Content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Type` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `records_cv_id_foreign` (`cv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=501 ;

--
-- Dumping data for table `records`
--


-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chờ duyệt', '2016-07-17 03:00:00', '2016-07-17 03:00:00'),
(2, 'Đồng ý phỏng vấn', '2016-07-17 03:00:00', '2016-07-17 03:00:00'),
(3, 'Đã đặt lịch phỏng vấn', '2016-07-17 03:00:00', '2016-07-17 03:00:00'),
(4, 'Loại', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(5, 'Testing', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Đã qua test', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(7, 'Không qua test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Đã phỏng vấn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Đã đồng ý làm bài test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Đã làm bài Test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Đã gửi bài test', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(12, 'Từ chối làm bài Test', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(13, 'Đã nhận bài Test gửi về', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Nhận', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(15, 'Đã gửi mail offer', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(16, 'Đã checkin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Đã checkout', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Đã từ chối offer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Đã xác nhận offer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Lưu Hồ Sơ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Từ chối phỏng vấn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Đã đặt lịch làm Test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Waiting', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(24, 'Đã gửi mail từ chối', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Không tới phỏng vấn', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(26, 'Không check in', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Đã đặt lịch PV lại lần 2', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(28, 'Từ chối pv lần 2', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(29, 'Phỏng vấn lại', '2016-07-17 03:00:00', '0000-00-00 00:00:00'),
(30, 'Đã phỏng vấn lần 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Không tới phỏng vấn lần 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 'Kích hoạt CV', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(3) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;

--
-- Dumping data for table `users`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cvs`
--
ALTER TABLE `cvs`
  ADD CONSTRAINT `cvs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `it_skill`
--
ALTER TABLE `it_skill`
  ADD CONSTRAINT `it_skill_cv_id_foreign` FOREIGN KEY (`cv_id`) REFERENCES `cvs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_cv_id_foreign` FOREIGN KEY (`cv_id`) REFERENCES `cvs` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
