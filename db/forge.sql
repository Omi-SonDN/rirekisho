-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2016 at 02:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forge`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bookmark_user_id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
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
  `github` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attach` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `user_id`, `First_name`, `Last_name`, `Furigana_name`, `email`, `Photo`, `Birth_date`, `Gender`, `Address`, `Contact_information`, `Phone`, `Self_intro`, `Marriage`, `配偶者の扶養義務`, `Request`, `positions`, `Memo`, `Active`, `Status`, `version`, `apply_to`, `notes`, `github`, `linkedin`, `attach`, `created_at`, `updated_at`) VALUES
(1, 14, 'Pham112', 'Tuoi', '', '', '', '1992-12-11', 0, 'TN', 'TN', '0986237633', '', 0, 0, ' B', '6', '', 1, 15, 1, 1, 'aaa', 'http://abc.com', 'http://abc.com', 'C:\\xampp\\tmp\\php48BA.tmp', '2016-07-20 00:47:03', '2016-08-01 22:44:11'),
(89, 1, 'Linh', 'Dang', 'ダン・ミー・リン　', 'admin@123.com', '', '1994-11-02', 0, 'Cần Thơ', 'dfgdfgdfg', '075 032 3708', 'dfgdfgdf', 0, 0, ' dfgdfgfd', 'vị trí 1', '', 0, 14, 2, 2, 'fddfg', '', '', '', '2016-04-21 03:28:16', '2016-07-27 02:18:19'),
(90, 2, 'Tú Phúc', 'Mai', '', 'admin1@123.com', '', '1974-01-11', 1, 'Hà Nội', '', '84-94-557-5939', 'So she went on, looking anxiously about as curious as it didn''t sound at all this time. ''I want a clean cup,'' interrupted the Gryphon. ''We can do without lobsters, you know. But do cats eat bats? Do.', 0, 0, '', 'vị trí 2', '', 0, 1, 1, 4, '', '', '', '', '2016-04-21 03:28:16', '2016-08-01 20:16:07'),
(91, 9, 'Giao Cầm', 'Tiếp', '', 'admin2@123.com', '', '1987-10-05', 1, 'Cần Thơ', '', '84-75-772-1532', 'There was certainly English. ''I don''t know what to uglify is, you see, Miss, we''re doing our best, afore she comes, to--'' At this moment Five, who had been broken to pieces. ''Please, then,'' said the.', 0, 0, '', 'vị trí 3', '', 1, 4, 1, 6, '', '', '', '', '2016-04-21 03:28:16', '2016-08-01 20:20:22'),
(92, 10, 'Hậu Cầm', 'Tiếp', '', 'admin3@123.com', '', '1989-01-31', 1, 'Đà Nẵng', '', '+84-98-578-1481', 'I''m sure _I_ shan''t be able! I shall think nothing of the e--e--evening, Beautiful, beauti--FUL SOUP!'' ''Chorus again!'' cried the Gryphon, with a sigh: ''he taught Laughing and Grief, they used to.', 0, 0, '', 'vị trí 4', '', 1, 4, 2, 1, '', '', '', '', '2016-04-21 03:28:16', '2016-08-01 20:11:05'),
(93, 11, 'Thảo Hội', 'Quách', '', '', '', '1987-11-10', 1, 'Hải Phòng', '', '84-281-321-4411', 'Alice. ''Only a thimble,'' said Alice angrily. ''It wasn''t very civil of you to death."'' ''You are old,'' said the Caterpillar decidedly, and he poured a little nervous about this; ''for it might end, you.', 0, 0, '', 'vị trí 4', '', 1, 2, 0, 5, '', '', '', '', '2016-04-21 03:28:16', '2016-08-01 20:17:13'),
(94, 12, 'Ngọc Kim', 'Bình', '', 'admin5@123.com', '', '1973-10-05', 1, 'Hà Nội', '', '(0500) 482 3944', 'I ought to have lessons to learn! Oh, I shouldn''t want YOURS: I don''t want to go through next walking about at the bottom of a book,'' thought Alice to herself, and fanned herself with one finger for.', 0, 0, '', 'vị trí 2', '', 1, 14, 0, 3, '', '', '', '', '2016-04-21 03:28:16', '2016-07-31 20:07:02'),
(95, 13, 'Chiến Ngà', 'Khúc', '', 'admin4@123.com', '', '1973-02-17', 1, 'Đà Nẵng', '', '84-780-917-3589', 'And then, turning to Alice, and looking at them with large round eyes, and half of fright and half of anger, and tried to say to itself ''The Duchess! The Duchess! Oh my dear Dinah! I wonder who will.', 0, 0, '', 'vị trí 6', '', 1, 4, 0, 6, '', '', '', '', '2016-04-21 03:28:16', '2016-08-01 20:16:42'),
(96, 17, '', '', '', '', '', '0000-00-00', 0, '', '', '', '', 0, 0, '', '4', '', 0, 2, 0, 2, '', '', '', '', '0000-00-00 00:00:00', '2016-08-01 21:14:06'),
(98, 19, '', '', '', '', '', '0000-00-00', 0, '', '', '', '', 0, 0, '', '', '', 0, 1, 0, 4, '', '', '', '', '0000-00-00 00:00:00', '2016-08-01 20:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'group 1a', '2016-06-12 05:16:55', '2016-06-12 05:19:16'),
(4, 'group 3a', '2016-06-12 09:54:09', '2016-06-12 10:53:48'),
(5, 'group test', '2016-06-12 10:31:50', '2016-06-12 10:31:50'),
(7, 'group 4', '2016-06-12 11:41:59', '2016-06-12 11:41:59'),
(8, 'group 5', '2016-06-12 11:43:13', '2016-06-12 11:43:13'),
(9, 'group 6', '2016-06-12 11:44:02', '2016-06-12 11:44:02'),
(10, 'group 2', '2016-06-12 12:03:15', '2016-06-12 12:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `it_skill`
--

CREATE TABLE `it_skill` (
  `id` int(10) UNSIGNED NOT NULL,
  `cv_id` int(10) UNSIGNED NOT NULL,
  `skill_type` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `study_time` int(11) NOT NULL,
  `work_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `it_skill`
--

INSERT INTO `it_skill` (`id`, `cv_id`, `skill_type`, `name`, `study_time`, `work_time`, `created_at`, `updated_at`) VALUES
(29, 1, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 89, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 90, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 91, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 92, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 93, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 94, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 95, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 1, 1, 'Cff', 9, 5, '0000-00-00 00:00:00', '2016-07-28 19:52:29'),
(38, 89, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 90, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 91, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 92, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 93, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 94, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 95, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
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

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_users_groups`
--

CREATE TABLE `pivot_users_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `active`, `description`, `created_at`, `updated_at`) VALUES
(1, 'vi tri 1', 1, '', '0000-00-00 00:00:00', '2016-06-08 06:03:03'),
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

CREATE TABLE `records` (
  `id` int(10) UNSIGNED NOT NULL,
  `cv_id` int(10) UNSIGNED NOT NULL,
  `Content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Type` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `cv_id`, `Content`, `Date`, `Type`, `created_at`, `updated_at`) VALUES
(255, 89, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(256, 90, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(257, 91, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(258, 92, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(259, 93, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(260, 94, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(261, 95, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(262, 89, 'Công ty Nghiệp Hiền - Hà Nội', '2012-12-07', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(263, 90, 'Công ty Bắc Tuyền - Hồ Chí Minh', '2012-12-07', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(264, 91, 'Công ty Hiền Đăng - Hồ Chí Minh', '2012-12-07', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(265, 92, 'Công ty Hiệp Nguyệt - Hồ Chí Minh', '2012-12-07', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(266, 93, 'Công ty Yến Nhàn - Cần Thơ', '2012-12-07', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(267, 94, 'Công ty Lương Phụng - Hồ Chí Minh', '2012-12-07', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(268, 95, 'Công ty Huyền Trinh - Hà Nội', '2012-12-07', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(269, 89, 'Công ty Diệu Sa - Hải Phòng', '2014-04-17', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(270, 90, 'Công ty Long Minh - Hà Nội', '2014-04-17', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(271, 91, 'Công ty Phước Khanh - Hồ Chí Minh', '2014-04-17', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(272, 92, 'Công ty Hoàn Giang - Hồ Chí Minh', '2014-04-17', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(273, 93, 'Công ty Đạo Thành - Hải Phòng', '2014-04-17', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(274, 94, 'Công ty Canh Hiền - Hồ Chí Minh', '2014-04-17', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(275, 95, 'Công ty Hà Thương - Đà Nẵng', '2014-04-17', 1, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(276, 89, 'Hồ Chí Minh', '2012-12-07', 2, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(277, 90, 'Đà Nẵng', '2012-12-07', 2, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(278, 91, 'Hồ Chí Minh', '2012-12-07', 2, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(279, 92, 'Cần Thơ', '2012-12-07', 2, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(280, 93, 'Cần Thơ', '2012-12-07', 2, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(281, 94, 'Đà Nẵng', '2012-12-07', 2, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(282, 95, 'Đà Nẵng', '2012-12-07', 2, '2016-04-21 03:28:16', '0000-00-00 00:00:00'),
(283, 89, 'Đại học ABC', '2011-02-01', 0, '2016-04-22 01:36:09', '2016-04-21 18:36:09'),
(284, 1, 'ewrfw', '2007-08-01', 2, '2016-07-28 01:11:29', '2016-07-28 01:11:29'),
(285, 1, 'rfe', '2009-02-01', 1, '2016-07-28 19:53:03', '2016-07-28 19:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chờ duyệt', '2016-07-16 20:00:00', '2016-07-16 20:00:00'),
(2, 'Đồng ý phỏng vấn', '2016-07-16 20:00:00', '2016-07-16 20:00:00'),
(3, 'Đã đặt lịch phỏng vấn', '2016-07-16 20:00:00', '2016-07-16 20:00:00'),
(4, 'Loại', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(5, 'Testing', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Đã qua test', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(7, 'Không qua test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Đã phỏng vấn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Đã đồng ý làm bài test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Đã làm bài Test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Đã gửi bài test', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(12, 'Từ chối làm bài Test', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(13, 'Đã nhận bài Test gửi về', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Nhận', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(15, 'Đã gửi mail offer', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(16, 'Đã checkin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Đã checkout', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Đã từ chối offer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Đã xác nhận offer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Lưu Hồ Sơ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Từ chối phỏng vấn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Đã đặt lịch làm Test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Waiting', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(24, 'Đã gửi mail từ chối', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Không tới phỏng vấn', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(26, 'Không check in', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Đã đặt lịch PV lại lần 2', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(28, 'Từ chối pv lần 2', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(29, 'Phỏng vấn lại', '2016-07-16 20:00:00', '0000-00-00 00:00:00'),
(30, 'Đã phỏng vấn lần 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Không tới phỏng vấn lần 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Kích hoạt CV', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `note`, `active`, `image`) VALUES
(1, 'LinhDang', 'admin@123.com', 2, '$2y$10$bf2/6Lk37VX0ckyEadtYLemcy0rlE.f8hK8F34tOLNoBFGrtUvMgy', 'WGEWBSpdo74mQ7PguxDwQywBnzWM2aABgTiF13LAuFFynBqwG92CbTnkbXSB', '0000-00-00 00:00:00', '2016-07-27 04:40:40', '', 1, NULL),
(2, 'Linh Dan', 'applicant@123.com', 0, '$2y$10$4aD6xaUsuOzhof0pKzxZ7u9XqDvtMhNuIiAClewF2/Vd6D6URTUey', 'QuP0Chi0JDqeYKXYx4aVmUUfgW4ZjORyVjMf5OSVBtL53boOsU9lErOgtLah', '0000-00-00 00:00:00', '2016-07-27 02:13:44', '', 1, NULL),
(3, 'Linh Dang', 'visitor@123.com', 1, '$2y$10$dEdTnifVUJ9O9j4k.puvl.o.CaQCsaqitpX3rv6Tihe7x0Iyhytki', 'uULzbSzv0j2OucU0CTn6a21ckoXmgcf070gQu1LKGalF7Bu3ZmWJiD8X0FmK', '0000-00-00 00:00:00', '2016-04-21 18:20:04', '', 1, NULL),
(4, 'Ned Krajcik', 'hRowe@example.org', 1, '$2y$10$ZL4W9ta6ZthdoWnbhzVkBee6VkoKBoH2DAsB97PKwRicheGfIn0xO', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, NULL),
(5, 'Mr. Alan Frami', 'Treutel.Alia@example.com', 1, '$2y$10$rmltadq.z.57PymYA2XWwONM0VL1TdFYJwthUgILf2QTfDDy16d9y', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, NULL),
(6, 'Bridgette Rosenbaum MD', 'Tyrique75@example.com', 1, '$2y$10$o///veq2hJiiNwWfJML0JuyP/TlN1w3wen6NvWPXQkQ4SAk8RuZF6', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, NULL),
(7, 'Carlee Lynch', 'Sauer.Jacinto@example.net', 1, '$2y$10$iMj6OxpR2HFEmlOmaUA/wuZPrTC6ppeO4Z5YwwPY91bEEIFtk1pHe', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, NULL),
(8, 'Laurie Rutherford', 'Becker.Michele@example.net', 1, '$2y$10$IGbTpZ1mybH7J7pInnwWSef9Whko.XrtBK4eyLeDNwvhos/5LTDOG', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, NULL),
(9, 'Prof. Hailey Runte', 'Runolfsdottir.Harmony@example.net', 0, '$2y$10$o5xNBJ051FX3Rf7L2ViGQumlY.n2AsKCJzufB2S34/j/RBEDaZ/zK', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, NULL),
(10, 'Joel Bruen', 'Thomas.Rice@example.com', 0, '$2y$10$YD/UX6.YT5gek9IlBHEqvuR5AqxZmIYePChP4qbGN7ouHcSdUV0Yy', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, NULL),
(11, 'Angela Brakus', 'Eula.Rogahn@example.net', 0, '$2y$10$toCMrY8iZ.Tg2WCgcfa/CeKqGiNCvkvc8fvrtKV9AmXdAJF9/7zX2', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, NULL),
(12, 'Lizeth Greenfelder V', 'hPagac@example.com', 0, '$2y$10$1sNHXK2z.xh7RQHjbEq12OfHLGY6P0lwL4UpFsldHnoY/MMmDV5g2', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, NULL),
(13, 'Grady Gerlach PhD', 'eGoyette@example.net', 0, '$2y$10$SyanLJNmPjo9kCKWa/DA6u/mNMqQkd6A9bVhALUQ8o8fCABHwV7Yy', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, NULL),
(14, 'Tuoi Pham', 'phamthituoi1112@gmail.com', 2, '$2y$10$/kRSgahd.1d/iqpkI8rp4OfMEIxj2Yn8fZpiXI8BZQT32ITHkqsUG', 'R0Ty8usJvf1hjqfIzBuhJZ4QUni7kdUI1fbDEfs4G1WOT3uTaCb3j6igo4q4', '2016-07-19 17:47:03', '2016-08-01 19:58:53', '', 1, '2016-07-28-12-18-42-10155642_803897279723321_4284063851204796771_n.jpg'),
(15, 'bui ngoc', 'buingoc@123.com', 3, '$2y$10$bf2/6Lk37VX0ckyEadtYLemcy0rlE.f8hK8F34tOLNoBFGrtUvMgy', 'npGcPdubV1Cq1KcmlciIN3zJEQEBNvOkaFCmfMxxjlo3bqQjNJlwXl1q6o4r', '0000-00-00 00:00:00', '2016-07-27 02:15:31', '', 0, NULL),
(16, 'Nguyễn văn A', 'a.b@gmail.com', 0, '$2y$10$8Aj/b.ghkC8igt8aRu0.Ku6NBuQL2VUPLqIJQ8dmA6qOgsKFisVgi', NULL, '2016-07-28 01:32:02', '2016-07-28 01:32:03', '', 0, NULL),
(17, 'Nguyễn văn A', 'a.bcd@gmail.com', 0, '$2y$10$NzcZ4IpieVeJZUkIN3dh/uuonc5/nEx7zujcm58K/fjj/Fe3UmuAC', '997cnS9cFIro9hRJzrvx348IgzRfYPeZZyZu9meoukJLpCmUjuSgzDXFdIir', '2016-07-28 01:33:40', '2016-07-28 02:04:17', '', 0, NULL),
(18, '12345@123.com', '12345@123.com', 0, '$2y$10$/aMu5azIO5.Q0sqjv56U4ey0ybik5IC5UMz0KZ4FQhayZ0dUyGcnu', 'JpOazSm7HXwLcXQvLyjUCMjhAD8nAgzlHDNVIKkLVFJ8WcGo2jMeEqk5P9WI', '2016-07-28 01:47:13', '2016-07-28 02:11:46', '', 0, NULL),
(19, 'ten tai khoan', 'tentaikhoan@gmail.com', 0, '$2y$10$ZIfH2PfqXYn7pLe90H48O.5luX1JmTbBGYxr3FINR7XN3rioF/RYK', 'rwfAPtMiFAUZubUnEpIwA2Ad9qwsMsfRl2jV9KPxUX5ZHOHkMaskpGZqBA7U', '2016-07-28 02:12:19', '2016-07-28 04:07:32', '', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookmarks_user_id_foreign` (`user_id`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cvs_user_id_foreign` (`user_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_skill`
--
ALTER TABLE `it_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `it_skill_cv_id_foreign` (`cv_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pivot_users_groups`
--
ALTER TABLE `pivot_users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_cv_id_foreign` (`cv_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `it_skill`
--
ALTER TABLE `it_skill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `pivot_users_groups`
--
ALTER TABLE `pivot_users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
