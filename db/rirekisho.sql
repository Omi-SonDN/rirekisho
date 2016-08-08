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
-- Database: `rirekisho`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(9) NOT NULL,
  `user_id` int(6) NOT NULL,
  `bookmark_user_id` int(6) NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `First_name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Furigana_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Photo` text COLLATE utf8_unicode_ci NOT NULL,
  `Birth_date` date NOT NULL,
  `Gender` tinyint(1) NOT NULL DEFAULT '1',
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Contact_information` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` char(255) CHARACTER SET latin1 NOT NULL,
  `Self_intro` text COLLATE utf8_unicode_ci NOT NULL,
  `Marriage` tinyint(1) NOT NULL,
  `配偶者の扶養義務` tinyint(1) NOT NULL,
  `Request` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `positions` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Memo` text COLLATE utf8_unicode_ci NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '0',
  `Status` int(11) NOT NULL DEFAULT '0',
  `apply_to` int(11) NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `user_id`, `First_name`, `Last_name`, `Furigana_name`, `email`, `Photo`, `Birth_date`, `Gender`, `Address`, `Contact_information`, `Phone`, `Self_intro`, `Marriage`, `配偶者の扶養義務`, `Request`, `updated_at`, `created_at`, `positions`, `Memo`, `Active`, `Status`, `apply_to`, `notes`) VALUES
(1, 14, 'Pham112', 'Tuoi', '', '', '', '1992-12-11', 0, 'TN', 'TN', '0986237633', '', 0, 0, ' B', '2016-07-25 21:06:45', '2016-07-20 07:47:03', 'A', '', 1, 1, 1, ''),
(89, 1, 'Linh', 'Dang', 'ダン・ミー・リン　', 'admin@123.com', '', '1994-11-02', 0, 'Cần Thơ', 'dfgdfgdfg', '075 032 3708', 'dfgdfgdf', 0, 0, ' dfgdfgfd', '2016-07-20 01:44:54', '2016-04-21 10:28:16', 'vị trí 1', '', 1, 14, 1, 'fddfg'),
(90, 2, 'Tú Phúc', 'Mai', '', 'admin1@123.com', '', '1974-01-11', 1, 'Hà Nội', '', '84-94-557-5939', 'So she went on, looking anxiously about as curious as it didn''t sound at all this time. ''I want a clean cup,'' interrupted the Gryphon. ''We can do without lobsters, you know. But do cats eat bats? Do.', 0, 0, '', '2016-07-15 03:17:05', '2016-04-21 10:28:16', 'vị trí 2', '', 0, 1, 2, ''),
(91, 9, 'Giao Cầm', 'Tiếp', '', 'admin2@123.com', '', '1987-10-05', 1, 'Cần Thơ', '', '84-75-772-1532', 'There was certainly English. ''I don''t know what to uglify is, you see, Miss, we''re doing our best, afore she comes, to--'' At this moment Five, who had been broken to pieces. ''Please, then,'' said the.', 0, 0, '', '2016-07-20 03:12:40', '2016-04-21 10:28:16', 'vị trí 3', '', 1, 4, 4, ''),
(92, 10, 'Hậu Cầm', 'Tiếp', '', 'admin3@123.com', '', '1989-01-31', 1, 'Đà Nẵng', '', '+84-98-578-1481', 'I''m sure _I_ shan''t be able! I shall think nothing of the e--e--evening, Beautiful, beauti--FUL SOUP!'' ''Chorus again!'' cried the Gryphon, with a sigh: ''he taught Laughing and Grief, they used to.', 0, 0, '', '2016-07-20 01:51:29', '2016-04-21 10:28:16', 'vị trí 4', '', 1, 4, 4, ''),
(93, 11, 'Thảo Hội', 'Quách', '', '', '', '1987-11-10', 1, 'Hải Phòng', '', '84-281-321-4411', 'Alice. ''Only a thimble,'' said Alice angrily. ''It wasn''t very civil of you to death."'' ''You are old,'' said the Caterpillar decidedly, and he poured a little nervous about this; ''for it might end, you.', 0, 0, '', '2016-07-20 01:30:02', '2016-04-21 10:28:16', 'vị trí 4', '', 1, 9, 3, ''),
(94, 12, 'Ngọc Kim', 'Bình', '', 'admin5@123.com', '', '1973-10-05', 1, 'Hà Nội', '', '(0500) 482 3944', 'I ought to have lessons to learn! Oh, I shouldn''t want YOURS: I don''t want to go through next walking about at the bottom of a book,'' thought Alice to herself, and fanned herself with one finger for.', 0, 0, '', '2016-07-20 01:30:47', '2016-04-21 10:28:16', 'vị trí 2', '', 1, 8, 2, ''),
(95, 13, 'Chiến Ngà', 'Khúc', '', 'admin4@123.com', '', '1973-02-17', 1, 'Đà Nẵng', '', '84-780-917-3589', 'And then, turning to Alice, and looking at them with large round eyes, and half of fright and half of anger, and tried to say to itself ''The Duchess! The Duchess! Oh my dear Dinah! I wonder who will.', 0, 0, '', '2016-07-20 01:53:00', '2016-04-21 10:28:16', 'vị trí 6', '', 1, 4, 1, '');

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
(1, 'group 1a', '2016-06-12 12:16:55', '2016-06-12 12:19:16'),
(4, 'group 3a', '2016-06-12 16:54:09', '2016-06-12 17:53:48'),
(5, 'group test', '2016-06-12 17:31:50', '2016-06-12 17:31:50'),
(7, 'group 4', '2016-06-12 18:41:59', '2016-06-12 18:41:59'),
(8, 'group 5', '2016-06-12 18:43:13', '2016-06-12 18:43:13'),
(9, 'group 6', '2016-06-12 18:44:02', '2016-06-12 18:44:02'),
(10, 'group 2', '2016-06-12 19:03:15', '2016-06-12 19:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `it_skill`
--

CREATE TABLE `it_skill` (
  `id` int(9) NOT NULL,
  `cv_id` int(6) NOT NULL,
  `skill_type` tinyint(9) NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `study_time` int(2) NOT NULL,
  `work_time` int(2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
('2016_07_18_081800_create_status_table', 2);

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
  `active` tinyint(1) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `active`, `description`, `created_at`, `updated_at`) VALUES
(1, 'vi tri 1', 1, '', '0000-00-00 00:00:00', '2016-06-08 13:03:03'),
(2, 'vi tri 2', 1, '', '2016-06-08 13:06:18', '2016-06-08 14:31:53'),
(3, 'vi tri 3', 1, '', '2016-06-08 13:39:52', '2016-06-08 17:29:02'),
(4, 'vi tri 4', 1, '', '2016-06-08 14:14:27', '2016-06-08 14:14:27'),
(5, 'vi tri 5', 1, '', '2016-06-08 14:14:35', '2016-06-08 14:15:46'),
(6, 'vi tri 6 ', 1, '', '2016-06-08 14:16:36', '2016-06-08 17:28:29'),
(10, '123sfcsadsvcfs', 0, '1', '2016-07-26 03:13:02', '2016-07-27 03:26:42'),
(24, 'Khong xac dinh', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'a111', 1, '1', '2016-07-26 03:42:14', '2016-07-26 03:42:14'),
(36, 'lập trình viên PHP', 0, 'lập trình viên PHP', '2016-07-26 03:46:45', '2016-07-26 03:46:45'),
(37, '123', 0, '1ưewfecre', '2016-07-26 20:30:38', '2016-07-27 03:34:18'),
(38, 'fvxfv', 0, 'svfcd', '2016-07-27 03:09:45', '2016-07-27 03:09:45'),
(41, 'fvxfvdfvd', 0, 'svfcd', '2016-07-27 03:12:09', '2016-07-27 03:12:09'),
(42, 'sdvdxbgfdxbg', 0, 'fgbxfgfbdzfvd', '2016-07-27 03:12:54', '2016-07-27 03:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(9) NOT NULL,
  `cv_id` int(6) NOT NULL,
  `Content` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Type` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `cv_id`, `Content`, `Date`, `Type`, `created_at`, `updated_at`) VALUES
(255, 89, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(256, 90, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(257, 91, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(258, 92, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(259, 93, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(260, 94, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(261, 95, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(262, 89, 'Công ty Nghiệp Hiền - Hà Nội', '2012-12-07', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(263, 90, 'Công ty Bắc Tuyền - Hồ Chí Minh', '2012-12-07', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(264, 91, 'Công ty Hiền Đăng - Hồ Chí Minh', '2012-12-07', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(265, 92, 'Công ty Hiệp Nguyệt - Hồ Chí Minh', '2012-12-07', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(266, 93, 'Công ty Yến Nhàn - Cần Thơ', '2012-12-07', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(267, 94, 'Công ty Lương Phụng - Hồ Chí Minh', '2012-12-07', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(268, 95, 'Công ty Huyền Trinh - Hà Nội', '2012-12-07', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(269, 89, 'Công ty Diệu Sa - Hải Phòng', '2014-04-17', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(270, 90, 'Công ty Long Minh - Hà Nội', '2014-04-17', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(271, 91, 'Công ty Phước Khanh - Hồ Chí Minh', '2014-04-17', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(272, 92, 'Công ty Hoàn Giang - Hồ Chí Minh', '2014-04-17', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(273, 93, 'Công ty Đạo Thành - Hải Phòng', '2014-04-17', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(274, 94, 'Công ty Canh Hiền - Hồ Chí Minh', '2014-04-17', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(275, 95, 'Công ty Hà Thương - Đà Nẵng', '2014-04-17', 1, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(276, 89, 'Hồ Chí Minh', '2012-12-07', 2, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(277, 90, 'Đà Nẵng', '2012-12-07', 2, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(278, 91, 'Hồ Chí Minh', '2012-12-07', 2, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(279, 92, 'Cần Thơ', '2012-12-07', 2, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(280, 93, 'Cần Thơ', '2012-12-07', 2, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(281, 94, 'Đà Nẵng', '2012-12-07', 2, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(282, 95, 'Đà Nẵng', '2012-12-07', 2, '2016-04-21 10:28:16', '0000-00-00 00:00:00'),
(283, 89, 'Đại học ABC', '2011-02-01', 0, '2016-04-22 08:36:09', '2016-04-22 01:36:09'),
(284, 96, '1', '2016-01-01', 1, '2016-07-20 00:48:05', '2016-07-20 00:48:05'),
(285, 96, '1', '2016-01-01', 2, '2016-07-20 00:48:14', '2016-07-20 00:48:14');

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
(1, 'Chờ duyệt', '2016-07-17 17:00:00', '2016-07-27 01:59:07'),
(2, 'Đồng ý phỏng vấn', '2016-07-17 17:00:00', '2016-07-17 17:00:00'),
(3, 'Đã đặt lịch phỏng vấn', '2016-07-17 17:00:00', '2016-07-17 17:00:00'),
(4, 'Loại', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(5, 'Testing', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Đã qua test', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(7, 'Không qua test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Đã phỏng vấn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Đã đồng ý làm bài test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Đã làm bài Test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Đã gửi bài test', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(12, 'Từ chối làm bài Test', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(13, 'Đã nhận bài Test gửi về', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Nhận', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(15, 'Đã gửi mail offer', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(16, 'Đã checkin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Đã checkout', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Đã từ chối offer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Đã xác nhận offer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Lưu Hồ Sơ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Từ chối phỏng vấn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Đã đặt lịch làm Test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Waiting', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(24, 'Đã gửi mail từ chối', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Không tới phỏng vấn', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(26, 'Không check in', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Đã đặt lịch PV lại lần 2', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(28, 'Từ chối pv lần 2', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(29, 'Phỏng vấn lại', '2016-07-17 17:00:00', '0000-00-00 00:00:00'),
(30, 'Đã phỏng vấn lần 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Không tới phỏng vấn lần 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Đã nộp CV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'sua trang thai', '2016-07-27 00:34:32', '2016-07-27 02:01:38'),
(37, 'trang thai 1', '2016-07-27 00:50:22', '2016-07-27 00:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `active`, `password`, `remember_token`, `created_at`, `updated_at`, `note`) VALUES
(1, 'LinhDang', 'admin@123.com', 2, 1, '$2y$10$bf2/6Lk37VX0ckyEadtYLemcy0rlE.f8hK8F34tOLNoBFGrtUvMgy', 'ViV1kXRUkKILpGKpx7fjAqHuFbFMtGeY0gHZHmLmaNuMTX4hF3ql3ZWrHF7E', '0000-00-00 00:00:00', '2016-07-25 23:44:31', ''),
(2, 'Linh Dan', 'applicant@123.com', 0, 1, '$2y$10$4aD6xaUsuOzhof0pKzxZ7u9XqDvtMhNuIiAClewF2/Vd6D6URTUey', '6MSrd6jdXFAltrt5SYrUTayax6tzHI3uBTLqv8fBTwWLd1q3tQMBjZvdDv4P', '0000-00-00 00:00:00', '2016-07-27 00:49:58', ''),
(3, 'Linh Dang', 'visitor@123.com', 1, 1, '$2y$10$dEdTnifVUJ9O9j4k.puvl.o.CaQCsaqitpX3rv6Tihe7x0Iyhytki', 'trIOlLVUNKifo91Or0khAj8yV7jiW4z0gn0df6YxKmXGu3l8Ma3QHNUMqTXT', '0000-00-00 00:00:00', '2016-07-27 00:46:45', ''),
(4, 'Ned Krajcik', 'hRowe@example.org', 1, 1, '$2y$10$ZL4W9ta6ZthdoWnbhzVkBee6VkoKBoH2DAsB97PKwRicheGfIn0xO', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(5, 'Mr. Alan Frami', 'Treutel.Alia@example.com', 1, 1, '$2y$10$rmltadq.z.57PymYA2XWwONM0VL1TdFYJwthUgILf2QTfDDy16d9y', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(6, 'Bridgette Rosenbaum MD', 'Tyrique75@example.com', 1, 1, '$2y$10$o///veq2hJiiNwWfJML0JuyP/TlN1w3wen6NvWPXQkQ4SAk8RuZF6', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(7, 'Carlee Lynch', 'Sauer.Jacinto@example.net', 1, 1, '$2y$10$iMj6OxpR2HFEmlOmaUA/wuZPrTC6ppeO4Z5YwwPY91bEEIFtk1pHe', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(8, 'Laurie Rutherford', 'Becker.Michele@example.net', 1, 1, '$2y$10$IGbTpZ1mybH7J7pInnwWSef9Whko.XrtBK4eyLeDNwvhos/5LTDOG', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(9, 'Prof. Hailey Runte', 'Runolfsdottir.Harmony@example.net', 0, 1, '$2y$10$o5xNBJ051FX3Rf7L2ViGQumlY.n2AsKCJzufB2S34/j/RBEDaZ/zK', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(10, 'Joel Bruen', 'Thomas.Rice@example.com', 0, 1, '$2y$10$YD/UX6.YT5gek9IlBHEqvuR5AqxZmIYePChP4qbGN7ouHcSdUV0Yy', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(11, 'Angela Brakus', 'Eula.Rogahn@example.net', 0, 1, '$2y$10$toCMrY8iZ.Tg2WCgcfa/CeKqGiNCvkvc8fvrtKV9AmXdAJF9/7zX2', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(12, 'Lizeth Greenfelder V', 'hPagac@example.com', 0, 1, '$2y$10$1sNHXK2z.xh7RQHjbEq12OfHLGY6P0lwL4UpFsldHnoY/MMmDV5g2', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(13, 'Grady Gerlach PhD', 'eGoyette@example.net', 0, 1, '$2y$10$SyanLJNmPjo9kCKWa/DA6u/mNMqQkd6A9bVhALUQ8o8fCABHwV7Yy', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(14, 'Tuoi Pham', 'phamthituoi1112@gmail.com', 2, 1, '$2y$10$/kRSgahd.1d/iqpkI8rp4OfMEIxj2Yn8fZpiXI8BZQT32ITHkqsUG', 'sHq734cvG01QV64ugPorIj1K4DCrpHJhFvXMSJCmxMyC2MdsebDcIMleL4ma', '2016-07-20 00:47:03', '2016-07-27 02:35:24', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_skill`
--
ALTER TABLE `it_skill`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `positions_positions_unique` (`name`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `it_skill`
--
ALTER TABLE `it_skill`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `pivot_users_groups`
--
ALTER TABLE `pivot_users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
