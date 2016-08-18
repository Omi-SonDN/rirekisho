-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2016 at 10:20 AM
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
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameCompany` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `map` text COLLATE utf8_unicode_ci NOT NULL,
  `phones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subdomain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
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
  `name_cv` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Photo` text COLLATE utf8_unicode_ci NOT NULL,
  `Request` text COLLATE utf8_unicode_ci NOT NULL,
  `positions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Memo` text COLLATE utf8_unicode_ci NOT NULL,
  `Active` tinyint(4) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '1',
  `old_status` tinyint(4) NOT NULL,
  `version` tinyint(4) NOT NULL,
  `apply_to` tinyint(4) NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `type_cv` tinyint(4) NOT NULL,
  `live` tinyint(4) NOT NULL,
  `attach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `github` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `user_id`, `name_cv`, `email`, `Photo`, `Request`, `positions`, `Memo`, `Active`, `Status`, `old_status`, `version`, `apply_to`, `notes`, `type_cv`, `live`, `attach`, `github`, `linkedin`, `active_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'Est inventore omnis debitis neque voluptas. Ab quo eos a sed eos aut autem.', '', '', '', '', '', 1, 1, 0, 0, 4, '', 1, 1, '', '', '', 0, '2014-06-17 06:55:23', '0000-00-00 00:00:00'),
(2, 5, 'Magni labore consequatur qui ut laborum quis. Iste debitis fugiat nam iure esse.', '', '', '', '', '', 0, 1, 0, 0, 3, '', 1, 1, '', '', '', 0, '2013-08-25 09:33:35', '0000-00-00 00:00:00'),
(3, 6, 'Blanditiis qui a totam quae et sed ullam. Ipsam id perferendis nesciunt veniam cumque doloremque error. Fuga aliquam et sit facilis aliquam. Ducimus ipsam dolorem eveniet quia.', '', '', '', '', '', 1, 1, 0, 0, 4, '', 0, 0, '', '', '', 0, '2016-05-19 18:48:13', '0000-00-00 00:00:00'),
(4, 7, 'Delectus nihil distinctio fugit tenetur numquam sunt. Rerum id exercitationem molestiae porro. Et aliquid ea cum id placeat beatae animi.', '', '', '', '', '', 1, 1, 0, 0, 3, '', 0, 1, '', '', '', 0, '2014-11-23 14:20:52', '0000-00-00 00:00:00'),
(5, 8, 'Laboriosam et expedita sequi quo eos et qui. Dicta qui corporis et aliquam veniam. Laudantium est sunt quam maiores deserunt. Libero ea molestiae est nemo.', '', '', '', '', '', 0, 1, 0, 0, 3, '', 1, 0, '', '', '', 0, '2016-03-27 20:46:52', '0000-00-00 00:00:00'),
(6, 9, 'Id asperiores aut cumque in quasi voluptates in. Et placeat odio non consequuntur. Et consequatur ut placeat voluptate nihil tempore quia.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 0, 1, '', '', '', 0, '2015-04-07 07:36:46', '0000-00-00 00:00:00'),
(7, 10, 'Officiis nam esse molestiae quo. Magnam voluptas reprehenderit numquam enim est dolores ea. Enim sed quia dicta incidunt sit eaque laudantium.', '', '', '', '', '', 1, 1, 0, 0, 1, '', 1, 0, '', '', '', 0, '2014-12-19 17:01:55', '0000-00-00 00:00:00'),
(8, 11, 'Et quo ut nobis assumenda quod. Aut quod suscipit possimus aut id aut. Cupiditate a vel ratione. Quia animi eveniet perferendis.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 1, 1, '', '', '', 0, '2015-07-21 23:06:18', '0000-00-00 00:00:00'),
(9, 12, 'Eos quia reprehenderit tenetur voluptatibus veritatis. Et minima occaecati quia. Quos nulla cumque hic et qui dignissimos molestiae non. Officiis voluptatibus placeat vel enim minus quis.', '', '', '', '', '', 1, 1, 0, 0, 5, '', 1, 1, '', '', '', 0, '2014-06-27 07:52:32', '0000-00-00 00:00:00'),
(10, 13, 'Ut maiores ut debitis ad temporibus at. Sint voluptas quas distinctio architecto. Quas qui maiores enim unde doloribus cupiditate.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 1, 0, '', '', '', 0, '2014-10-06 05:59:40', '0000-00-00 00:00:00'),
(11, 14, 'Aut sed non delectus ducimus modi esse. Id itaque placeat ullam saepe. Accusamus neque asperiores ut et cumque libero eligendi. Eaque vero accusamus omnis aut et.', '', '', '', '', '', 1, 1, 0, 0, 2, '', 1, 1, '', '', '', 0, '2014-05-06 14:58:55', '0000-00-00 00:00:00'),
(12, 15, 'Cum commodi aut blanditiis ut. Voluptates expedita exercitationem architecto aliquam nostrum repudiandae temporibus. Voluptatum consequatur corporis quia natus reiciendis. Quibusdam omnis in qui.', '', '', '', '', '', 0, 1, 0, 0, 5, '', 0, 1, '', '', '', 0, '2014-12-25 02:55:31', '0000-00-00 00:00:00'),
(13, 16, 'Fugiat quasi omnis consequatur nobis. Voluptate aut similique hic quis qui ullam optio soluta. Ut sunt voluptate inventore sint. Ipsam nulla ipsam eum quo molestiae.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 0, 0, '', '', '', 0, '2014-11-03 06:13:14', '0000-00-00 00:00:00'),
(14, 17, 'Sed a suscipit expedita. Delectus et qui ut soluta ut beatae. Fugit maiores ut rem mollitia debitis. Sunt dolorum optio expedita.', '', '', '', '', '', 1, 1, 0, 0, 1, '', 0, 1, '', '', '', 0, '2014-07-24 19:24:34', '0000-00-00 00:00:00'),
(15, 18, 'Pariatur et soluta aut nisi. Et similique earum qui temporibus et occaecati. Sequi voluptatem labore eum non reiciendis quia dolor. Debitis sequi eum et in.', '', '', '', '', '', 0, 1, 0, 0, 4, '', 1, 0, '', '', '', 0, '2015-01-10 15:12:41', '0000-00-00 00:00:00'),
(16, 19, 'Repellendus quae dolore ut nam id et. Amet quibusdam veritatis eum velit nesciunt atque. Placeat id rerum omnis nostrum illo. Iusto ullam ea est ratione illo optio.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 0, 1, '', '', '', 0, '2014-03-12 17:18:49', '0000-00-00 00:00:00'),
(17, 20, 'Dolores expedita vero qui itaque. Ut modi omnis ut. Dignissimos quasi facere eveniet ad.', '', '', '', '', '', 1, 1, 0, 0, 4, '', 1, 1, '', '', '', 0, '2016-05-06 11:55:08', '0000-00-00 00:00:00'),
(18, 21, 'Quis quibusdam possimus nisi tempore et. Voluptas molestiae sit est animi molestiae voluptatem qui. Occaecati modi ullam itaque consequatur mollitia nam voluptatem.', '', '', '', '', '', 0, 1, 0, 0, 4, '', 1, 0, '', '', '', 0, '2016-04-26 05:05:42', '0000-00-00 00:00:00'),
(19, 22, 'Quibusdam dolor sequi atque natus animi non. Reiciendis quos cumque velit quaerat dolore labore ut. Aspernatur deserunt esse vel iste voluptatem et nemo. Quod voluptas pariatur rerum esse nihil.', '', '', '', '', '', 1, 1, 0, 0, 3, '', 0, 0, '', '', '', 0, '2015-03-03 11:14:52', '0000-00-00 00:00:00'),
(20, 23, 'Velit distinctio quis sunt et beatae. Voluptatem earum est expedita doloremque ad qui illo. Iure et sint consequatur molestiae rerum natus. Neque minima ut est neque.', '', '', '', '', '', 1, 1, 0, 0, 4, '', 0, 0, '', '', '', 0, '2013-09-19 16:00:20', '0000-00-00 00:00:00'),
(21, 24, 'Dolores quos est quibusdam iste atque. Quia nostrum deserunt natus tempore atque eius aliquam. Aspernatur fugiat temporibus quasi.', '', '', '', '', '', 0, 1, 0, 0, 1, '', 1, 1, '', '', '', 0, '2014-07-15 13:31:25', '0000-00-00 00:00:00'),
(22, 25, 'Est nihil veritatis possimus quibusdam laboriosam. Non tempore et ipsum ad neque sunt. Doloremque veniam consequuntur repellat a totam. Perspiciatis asperiores aut itaque.', '', '', '', '', '', 0, 1, 0, 0, 3, '', 0, 0, '', '', '', 0, '2014-11-30 04:35:09', '0000-00-00 00:00:00'),
(23, 26, 'Quo eum voluptas voluptates tenetur voluptatibus. Voluptatibus reprehenderit voluptas nam dolores iusto nihil. Consequatur tempora eos dolores deserunt porro provident.', '', '', '', '', '', 1, 1, 0, 0, 5, '', 0, 0, '', '', '', 0, '2014-05-20 05:10:59', '0000-00-00 00:00:00'),
(24, 27, 'Sapiente autem est fuga consequatur nostrum fugit maiores. Facere et ut id quisquam at dolor iusto earum. Reprehenderit ut provident ab omnis ipsam.', '', '', '', '', '', 1, 1, 0, 0, 4, '', 0, 0, '', '', '', 0, '2016-05-28 19:55:43', '0000-00-00 00:00:00'),
(25, 28, 'Aliquid nesciunt sit ducimus officiis fuga error ullam. Eius sed iusto et ex ipsa magni rerum fuga. Qui distinctio nam aut tempore rem provident et. Ad autem ut praesentium praesentium.', '', '', '', '', '', 0, 1, 0, 0, 5, '', 1, 0, '', '', '', 0, '2015-03-26 11:45:39', '0000-00-00 00:00:00'),
(26, 29, 'Sunt voluptatem labore laborum qui et perferendis aut eius. Quibusdam provident repudiandae deserunt soluta vitae nam. Nihil nihil dolorum tenetur dolor illo rem pariatur.', '', '', '', '', '', 1, 1, 0, 0, 4, '', 1, 1, '', '', '', 0, '2015-05-20 21:48:05', '0000-00-00 00:00:00'),
(27, 30, 'Aut voluptatum assumenda explicabo a dolorem vel. Delectus tempora quis dignissimos tenetur velit possimus fugiat. Quia delectus omnis est quidem veritatis dolores. Quia dolores non quo eius animi.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 1, 1, '', '', '', 0, '2014-10-06 06:52:56', '0000-00-00 00:00:00'),
(28, 31, 'Tenetur tempore ut cum totam at. Sit alias et quae nihil.', '', '', '', '', '', 0, 1, 0, 0, 5, '', 0, 0, '', '', '', 0, '2015-04-18 04:49:37', '0000-00-00 00:00:00'),
(29, 32, 'Nesciunt fugiat fugit consequatur illo. Totam dolorem ipsum recusandae qui repellendus.', '', '', '', '', '', 0, 1, 0, 0, 5, '', 1, 1, '', '', '', 0, '2014-11-19 03:00:52', '0000-00-00 00:00:00'),
(30, 33, 'Magni temporibus ea ab molestias error ut aut. Qui ipsum impedit beatae quam et facere quo. Similique itaque placeat cum ea provident. Quia commodi reprehenderit quia sint.', '', '', '', '', '', 1, 1, 0, 0, 5, '', 1, 0, '', '', '', 0, '2015-06-21 10:49:15', '0000-00-00 00:00:00'),
(31, 34, 'Ut fugit alias illo dolor veritatis nesciunt fugiat. Veniam optio quibusdam consectetur ab velit quia sunt. Dicta sint temporibus ratione quis aut enim.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 1, 0, '', '', '', 0, '2015-08-22 14:20:54', '0000-00-00 00:00:00'),
(32, 35, 'Consequatur est eos aperiam hic laudantium. Temporibus eos voluptatum sunt tempora eum voluptatem. Officia reprehenderit nulla tenetur eligendi maxime porro.', '', '', '', '', '', 0, 1, 0, 0, 5, '', 0, 1, '', '', '', 0, '2014-07-21 18:22:36', '0000-00-00 00:00:00'),
(33, 36, 'Non repellat et soluta laborum est. Atque sit qui quia voluptas veniam. Sit ut laborum velit sunt est quia dolores.', '', '', '', '', '', 1, 1, 0, 0, 1, '', 1, 1, '', '', '', 0, '2014-03-09 21:43:28', '0000-00-00 00:00:00'),
(34, 37, 'Nulla recusandae cupiditate consequuntur. Ut aspernatur dolorum hic tenetur quae et. Atque ut autem sit aperiam. Voluptatem aut labore asperiores est.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 1, 0, '', '', '', 0, '2015-07-18 03:53:42', '0000-00-00 00:00:00'),
(35, 38, 'Sit velit autem fugit ex natus corrupti. Quod et dolor odio cum. Aliquam sequi repudiandae dolores eius nihil. Et aut eius nisi.', '', '', '', '', '', 1, 3, 2, 0, 3, '', 1, 1, '', '', '', 0, '2013-12-25 16:48:57', '2016-08-18 01:02:53'),
(36, 39, 'Perspiciatis dolore quia est omnis beatae qui itaque esse. Sint adipisci earum sit ut. Minima qui sequi possimus adipisci impedit. Quibusdam dolor eius cum aliquam distinctio commodi voluptatem ut.', '', '', '', '', '', 0, 2, 1, 0, 1, '', 0, 0, '', '', '', 0, '2016-02-03 18:35:59', '2016-08-18 01:06:53'),
(37, 40, 'Magnam qui similique quo adipisci. Odit officiis aut dolore dolor ut ipsam. Qui atque non doloremque et mollitia et voluptatum.', '', '', '', '', '', 1, 1, 0, 0, 5, '', 0, 0, '', '', '', 0, '2015-10-13 10:45:52', '0000-00-00 00:00:00'),
(38, 41, 'Quia ea consequatur enim cum ab et. Maiores hic repudiandae magnam qui consequuntur voluptatem. Id consectetur blanditiis autem rerum rerum. Quis atque quod consequatur et dolores.', '', '', '', '', '', 1, 1, 0, 0, 5, '', 1, 0, '', '', '', 0, '2016-03-10 21:34:38', '0000-00-00 00:00:00'),
(39, 42, 'Cum ut ea rerum omnis fugiat. Voluptatem eos perspiciatis suscipit blanditiis omnis distinctio. Tenetur est vel accusantium hic vitae maxime.', '', '', '', '', '', 1, 1, 0, 0, 5, '', 1, 1, '', '', '', 0, '2014-09-04 20:24:55', '0000-00-00 00:00:00'),
(40, 43, 'Nemo excepturi nam ad et. Corrupti quibusdam reprehenderit nobis enim consequatur. Maiores cupiditate quod dolores voluptas quia. Ut repellat autem voluptatem.', '', '', '', '', '', 1, 1, 0, 0, 4, '', 0, 0, '', '', '', 0, '2015-03-04 18:35:41', '0000-00-00 00:00:00'),
(41, 44, 'Nulla ea inventore rerum quae illum rem est. Rerum sint tenetur cum nemo sit dolor omnis.', '', '', '', '', '', 0, 1, 0, 0, 5, '', 0, 0, '', '', '', 0, '2014-08-10 00:14:03', '0000-00-00 00:00:00'),
(42, 45, 'A occaecati pariatur expedita sapiente quae. Facere et assumenda dolor et. Vel dignissimos fugit architecto magnam quia architecto aperiam nihil.', '', '', '', '', '', 0, 1, 0, 0, 5, '', 1, 0, '', '', '', 0, '2015-06-14 17:54:36', '0000-00-00 00:00:00'),
(43, 46, 'Et nemo tempore corrupti eaque quasi minus. Ut dolor tempore veritatis. Exercitationem vero repellendus perspiciatis at. Et voluptate facere vero deserunt.', '', '', '', '', '', 0, 1, 0, 0, 3, '', 0, 0, '', '', '', 0, '2016-05-28 19:47:16', '0000-00-00 00:00:00'),
(44, 47, 'Odio expedita quae ex optio est inventore facilis et. Laudantium enim deleniti molestiae eum.\nAut molestiae eos et repudiandae quo assumenda. Perferendis est voluptatem sit illum.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 0, 1, '', '', '', 0, '2014-07-23 11:48:33', '0000-00-00 00:00:00'),
(45, 48, 'Quod quam quia enim dignissimos. Ut laborum et voluptatem qui blanditiis quis sint. Ex et ducimus quas et reiciendis.', '', '', '', '', '', 1, 1, 0, 0, 3, '', 1, 0, '', '', '', 0, '2014-09-24 13:41:26', '0000-00-00 00:00:00'),
(46, 49, 'Impedit temporibus voluptatem asperiores ullam officia. Sapiente est corrupti id mollitia corporis rerum aut. Et excepturi magni ipsum vero tempore sit.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 1, 0, '', '', '', 0, '2014-05-26 15:49:00', '0000-00-00 00:00:00'),
(47, 50, 'Voluptatibus quo dolorem aliquam in. Commodi rerum sapiente dolorum voluptatum iure nam consequatur. Voluptas laboriosam et et dolorum sed sed non.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 0, 0, '', '', '', 0, '2016-05-20 12:14:12', '0000-00-00 00:00:00'),
(48, 51, 'Enim nihil id placeat voluptas laboriosam labore. Debitis iusto debitis nisi est. Mollitia vero mollitia quis eos rerum quasi corporis.', '', '', '', '', '', 0, 1, 0, 0, 2, '', 1, 1, '', '', '', 0, '2014-12-24 23:00:17', '0000-00-00 00:00:00'),
(49, 52, 'Laudantium officiis aut incidunt optio magnam et libero. Sit labore temporibus dolorum molestiae ea ab. Consequuntur eius animi et eos doloremque velit nobis.', '', '', '', '', '', 0, 1, 0, 0, 4, '', 0, 1, '', '', '', 0, '2015-03-20 20:32:24', '0000-00-00 00:00:00'),
(50, 53, 'Hic non voluptas repellat unde nisi qui nisi. Et rerum temporibus nihil. Suscipit suscipit consequatur vel aperiam eius.', '', '', '', '', '', 1, 1, 0, 0, 2, '', 0, 1, '', '', '', 0, '2015-04-11 00:33:04', '0000-00-00 00:00:00'),
(51, 54, 'Minima cum est animi occaecati et eum. Eos sed hic deleniti. Ratione quia laudantium voluptatum magni consectetur.', '', '', '', '', '', 0, 1, 0, 0, 5, '', 0, 0, '', '', '', 0, '2016-01-14 12:45:15', '0000-00-00 00:00:00');

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
(1, 1, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 10, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 11, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 12, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 13, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 14, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 15, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 16, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 17, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 18, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 19, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 20, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 21, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 22, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 23, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 24, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 25, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 26, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 27, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 28, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 29, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 30, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 31, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 32, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 33, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 34, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 35, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 36, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 37, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 38, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 39, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 40, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 41, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 42, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 43, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 44, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 45, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 46, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 47, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 48, 0, 'chinese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 49, 0, 'japanese', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 50, 0, 'french', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 51, 0, 'english', 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 1, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 2, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 3, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 4, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 5, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 6, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 7, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 8, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 9, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 10, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 11, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 12, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 13, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 14, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 15, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 16, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 17, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 18, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 19, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 20, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 21, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 22, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 23, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 24, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 25, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 26, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 27, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 28, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 29, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 30, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 31, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 32, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 33, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 34, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 35, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 36, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 37, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 38, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 39, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 40, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 41, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 42, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 43, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 44, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 45, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 46, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 47, 1, 'Ruby', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 48, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 49, 1, 'C', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 50, 1, 'Java', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 51, 1, 'PHP', 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
('2016_07_18_081800_create_status_table', 1),
('2016_07_27_081630_create_cvs_table', 1),
('2016_07_27_081636_create_records_table', 1),
('2016_07_27_081746_create_positions_table', 1),
('2016_07_27_081818_create_groups_table', 1),
('2016_07_27_081836_create_bookmarks_table', 1),
('2016_07_27_092211_create_it_skill_table', 1),
('2016_08_01_033755_create_pivot_users_groups_tables', 1),
('2016_08_15_055850_create_config_company', 1);

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
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `description`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Vị trí 1', 'Vị trí 1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'Vị trí 2', 'Vị trí 2', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'Vị trí 3', 'Vị trí 3', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'Vị trí 4', 'Vị trí 4', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'Vị trí 5', 'Vị trí 5', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

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
(1, 1, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 'Đại học XXX - Đà Nẵng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 10, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 11, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 12, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 13, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 14, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 15, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 16, 'Đại học XXX - Đà Nẵng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 17, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 18, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 19, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 20, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 21, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 22, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 23, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 24, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 25, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 26, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 27, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 28, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 29, 'Đại học XXX - Đà Nẵng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 30, 'Đại học XXX - Đà Nẵng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 31, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 32, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 33, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 34, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 35, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 36, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 37, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 38, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 39, 'Đại học XXX - Đà Nẵng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 40, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 41, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 42, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 43, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 44, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 45, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 46, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 47, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 48, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 49, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 50, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 51, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 1, 'Công ty Nghiêm Phước - Đà Nẵng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 2, 'Công ty Thương Hùng - Cần Thơ', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 3, 'Công ty Mi Ẩn - Hồ Chí Minh', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 4, 'Công ty Khuyên Trúc - Hải Phòng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 5, 'Công ty Sương Dụng - Đà Nẵng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 6, 'Công ty Hoàn Hà - Hồ Chí Minh', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 7, 'Công ty Nhân Chiêu - Hồ Chí Minh', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 8, 'Công ty Lâm Quyên - Hải Phòng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 9, 'Công ty Diệp Sinh - Hồ Chí Minh', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 10, 'Công ty Cúc An - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 11, 'Công ty Toàn Mỹ - Cần Thơ', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 12, 'Công ty Việt Quế - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 13, 'Công ty Mai Đôn - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 14, 'Công ty Hoan Cương - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 15, 'Công ty Đường Thoại - Hồ Chí Minh', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 16, 'Công ty Trưởng Mỹ - Cần Thơ', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 17, 'Công ty Thống Mẫn - Cần Thơ', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 18, 'Công ty Nhân Diễm - Đà Nẵng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 19, 'Công ty Chính Cầm - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 20, 'Công ty Chương Hạnh - Đà Nẵng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 21, 'Công ty Vu Thuần - Hồ Chí Minh', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 22, 'Công ty Phong Tường - Hải Phòng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 23, 'Công ty Tuyền Hồng - Hải Phòng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 24, 'Công ty Yên Trang - Đà Nẵng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 25, 'Công ty Kha Hỷ - Cần Thơ', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 26, 'Công ty Anh Chi - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 27, 'Công ty Dương Đan - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 28, 'Công ty Thể Khanh - Cần Thơ', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 29, 'Công ty Toại Phong - Hồ Chí Minh', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 30, 'Công ty Khương Bảo - Cần Thơ', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 31, 'Công ty Trúc Trình - Hải Phòng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 32, 'Công ty Canh Đình - Hồ Chí Minh', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 33, 'Công ty Hưng Tiển - Đà Nẵng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 34, 'Công ty Lý Học - Cần Thơ', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 35, 'Công ty Như Bắc - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 36, 'Công ty Hậu Linh - Cần Thơ', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 37, 'Công ty Sương Đạo - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 38, 'Công ty Nhàn Khiếu - Hồ Chí Minh', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 39, 'Công ty Bắc Phượng - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 40, 'Công ty Ly Thiên - Hải Phòng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 41, 'Công ty Ngà Đức - Hải Phòng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 42, 'Công ty Hiền Thục - Hải Phòng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 43, 'Công ty Lâm Chiêu - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 44, 'Công ty Độ San - Đà Nẵng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 45, 'Công ty Ly Linh - Đà Nẵng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 46, 'Công ty Trụ Điền - Hải Phòng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 47, 'Công ty Nhân Tụ - Hải Phòng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 48, 'Công ty Di Tùng - Đà Nẵng', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 49, 'Công ty Thúc Triết - Hồ Chí Minh', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 50, 'Công ty Dụng Hồng - Cần Thơ', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 51, 'Công ty Trình Tùng - Hà Nội', '2012-12-07', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 1, 'Công ty San Khê - Hà Nội', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 2, 'Công ty Lý Khuyên - Hà Nội', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 3, 'Công ty Thiện Bình - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 4, 'Công ty Kim Hợp - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 5, 'Công ty Trưởng Khải - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 6, 'Công ty Diệu Trà - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 7, 'Công ty Ca Vy - Hà Nội', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 8, 'Công ty Trà Sang - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 9, 'Công ty Sa Sinh - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 10, 'Công ty Khánh Bạch - Cần Thơ', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 11, 'Công ty Chấn Tuệ - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 12, 'Công ty Nhân Cúc - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 13, 'Công ty Cương Nương - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 14, 'Công ty Hiển Duyên - Cần Thơ', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 15, 'Công ty Chấn Hoán - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 16, 'Công ty Lực Quân - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 17, 'Công ty Uyên Hương - Hồ Chí Minh', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 18, 'Công ty Lâm Triệu - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 19, 'Công ty Tuyến Hiệp - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 20, 'Công ty Nhật Quỳnh - Hà Nội', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 21, 'Công ty Khuyên Khải - Hà Nội', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 22, 'Công ty Hạnh Vĩnh - Hồ Chí Minh', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 23, 'Công ty Cát Hòa - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 24, 'Công ty Triết Mẫn - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 25, 'Công ty Hợp Khiêm - Hà Nội', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 26, 'Công ty Ngọc Liên - Hà Nội', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 27, 'Công ty Quốc Vân - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 28, 'Công ty Trà Mẫn - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 29, 'Công ty Tuệ Nương - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 30, 'Công ty Quân Nhiên - Hà Nội', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 31, 'Công ty Trác Ân - Hồ Chí Minh', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 32, 'Công ty Nhạn Trâm - Hồ Chí Minh', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 33, 'Công ty Quân Lộc - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 34, 'Công ty Thúc Ánh - Hồ Chí Minh', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 35, 'Công ty Tú Thương - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 36, 'Công ty Bắc Yên - Cần Thơ', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 37, 'Công ty Trà Cát - Hà Nội', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 38, 'Công ty Mỹ Đạt - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 39, 'Công ty Diệp Cúc - Hồ Chí Minh', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 40, 'Công ty Uy Khương - Cần Thơ', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 41, 'Công ty Cơ Tuệ - Hồ Chí Minh', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 42, 'Công ty Dao Võ - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 43, 'Công ty Tín Hạ - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 44, 'Công ty Lam Đình - Hồ Chí Minh', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 45, 'Công ty Hoàng Tuyền - Hà Nội', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 46, 'Công ty Quỳnh Khiếu - Cần Thơ', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 47, 'Công ty Hỷ Thủy - Cần Thơ', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 48, 'Công ty Hiệp Khê - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 49, 'Công ty Bắc Hoa - Đà Nẵng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 50, 'Công ty Duyên Diệu - Hồ Chí Minh', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 51, 'Công ty Thuần Huấn - Hải Phòng', '2014-04-17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 1, 'Đà Nẵng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 2, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 3, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 4, 'Hải Phòng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 5, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 6, 'Đà Nẵng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 7, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 8, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 9, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 10, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 11, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 12, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 13, 'Đà Nẵng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 14, 'Hải Phòng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 15, 'Cần Thơ', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 16, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 17, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 18, 'Cần Thơ', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 19, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 20, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 21, 'Cần Thơ', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 22, 'Hải Phòng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 23, 'Hải Phòng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 24, 'Hải Phòng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 25, 'Đà Nẵng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 26, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 27, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 28, 'Cần Thơ', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 29, 'Hải Phòng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 30, 'Cần Thơ', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 31, 'Cần Thơ', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 32, 'Đà Nẵng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 33, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 34, 'Đà Nẵng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 35, 'Hải Phòng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 36, 'Hải Phòng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 37, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 38, 'Đà Nẵng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 39, 'Đà Nẵng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 40, 'Hải Phòng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 41, 'Hải Phòng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 42, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 43, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 44, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 45, 'Cần Thơ', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 46, 'Hà Nội', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 47, 'Đà Nẵng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 48, 'Đà Nẵng', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 49, 'Hồ Chí Minh', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 50, 'Cần Thơ', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 51, 'Cần Thơ', '2012-12-07', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allow_sendmail` tinyint(4) NOT NULL,
  `prev_status` text COLLATE utf8_unicode_ci NOT NULL,
  `infor` text COLLATE utf8_unicode_ci NOT NULL,
  `email_template` text COLLATE utf8_unicode_ci NOT NULL,
  `role_VisitorStatus` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `allow_sendmail`, `prev_status`, `infor`, `email_template`, `role_VisitorStatus`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Chờ duyệt', 0, '', '', '<p>Ch&agrave;o bạn&nbsp;[First_name]!</p>\r\n<p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i đ&atilde; nhận được hồ sơ của bạn. Hiện tại hồ sơ của bạn đang trong qu&aacute; tr&igrave;nh chờ duyệt.</p>\r\n<p>Ch&uacute;ng t&ocirc;i sẽ xem x&eacute;t v&agrave; phản hồi cho bạn sớm nhất. Cảm ơn bạn đ&atilde; quan t&acirc;m v&agrave; gửi hồ sơ đến cho ch&uacute;ng t&ocirc;i.</p>\r\n<p>Tr&acirc;n trọng!</p>', 1, '0000-00-00 00:00:00', '2016-08-18 00:50:40', NULL),
(2, 'Đồng ý phỏng vấn', 1, '1,6', '', '<p>Ch&agrave;o bạn [First_name]!</p>\r\n<p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i đ&atilde; nhận được hồ sơ của bạn, c&ocirc;ng ty ch&uacute;ng t&ocirc;i muốn mời bạn đến tham dự phỏng vấn tại c&ocirc;ng ty.</p>\r\n<p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p>\r\n<p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p>\r\n<p>Tr&acirc;n trọng, k&iacute;nh mời!</p>', 1, '0000-00-00 00:00:00', '2016-08-18 01:00:55', NULL),
(3, 'Đã đặt lịch phỏng vấn', 1, '2', 'Date,Time,Address,Attach', '<p>Ch&agrave;o bạn [First_name]!</p>\r\n<p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i thực sự đ&aacute;nh gi&aacute; cao tr&igrave;nh độ cũng như sự hiểu biết của bạn đối với vị tr&iacute; c&ocirc;ng ty đang tuyển dụng, c&ocirc;ng ty ch&uacute;ng t&ocirc;i muốn mời bạn đến tham dự phỏng vấn tại c&ocirc;ng ty.</p>\r\n<p><strong>- Thời gian: [Time] ph&uacute;t, Ng&agrave;y&nbsp;[Date].</strong></p>\r\n<p><strong>- Địa điểm: [Address].</strong></p>\r\n<p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p>\r\n<p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để th&ocirc;ng b&aacute;o.</p>\r\n<p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p>\r\n<p>Tr&acirc;n trọng, k&iacute;nh mời!</p>', 0, '0000-00-00 00:00:00', '2016-08-18 01:01:15', NULL),
(4, 'Loại', 0, '8,12,17,21,24,25,28,30,31', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'Testing', 0, '11', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 'Đã qua test', 1, '5,10', 'Date,Time,Address,Attach', '<p>Ch&agrave;o bạn [First_name]!</p>\r\n<p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i thực sự đ&aacute;nh gi&aacute; cao tr&igrave;nh độ cũng như sự hiểu biết của bạn đối với vị tr&iacute; c&ocirc;ng ty đang tuyển dụng, c&ocirc;ng ty ch&uacute;ng t&ocirc;i th&ocirc;ng b&aacute;o rằng bạn đ&atilde; vượt qua b&agrave;i test của ch&uacute;ng t&ocirc;i! Ch&uacute;ng t&ocirc;i muốn mời bạn tới c&ocirc;ng ty tham gia buổi phỏng vấn.</p>\r\n<p><strong>- Thời gian: [Time] ph&uacute;t Ng&agrave;y [Date]</strong></p>\r\n<p><strong>- Địa điểm: [Address]</strong></p>\r\n<p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p>\r\n<p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để th&ocirc;ng b&aacute;o.</p>\r\n<p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p>\r\n<p>Tr&acirc;n trọng!</p>', 0, '0000-00-00 00:00:00', '2016-08-18 01:01:44', NULL),
(7, 'Không qua test', 1, '5,10', '', '<p>Ch&agrave;o bạn [First_name]!</p>\r\n<p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i th&ocirc;ng b&aacute;o rằng bạn chưa vượt qua b&agrave;i test của ch&uacute;ng t&ocirc;i!</p>\r\n<p>Cảm ơn bạn đ&atilde; quan t&acirc;m đến th&ocirc;ng tin tuyển dụng của ch&uacute;ng t&ocirc;i!</p>\r\n<p>Tr&acirc;n trọng!</p>', 0, '0000-00-00 00:00:00', '2016-08-18 00:52:25', NULL),
(8, 'Đã phỏng vấn', 0, '3', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 'Đã đồng ý làm bài test', 0, '2,23', '', ' &nbsp; &nbsp; ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 'Đã làm bài Test', 0, '13', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(11, 'Đã gửi bài test', 0, '22', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(12, 'Từ chối làm bài Test', 0, '2,23', '', '', 0, '0000-00-00 00:00:00', '2016-08-18 00:52:59', NULL),
(13, 'Đã nhận bài Test gửi về', 0, '1', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(14, 'Nhận', 1, '8,30', 'Date,Time,Address,Attach', '<p>Ch&agrave;o bạn [First_name]!</p>\r\n<p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i thực sự đ&aacute;nh gi&aacute; cao tr&igrave;nh độ cũng như sự hiểu biết của bạn đối với vị tr&iacute; c&ocirc;ng ty đang tuyển dụng, c&ocirc;ng ty ch&uacute;ng t&ocirc;i muốn mời bạn đến l&agrave;m việc&nbsp;tại c&ocirc;ng ty với vị tr&iacute; <strong>[Positions]</strong>.</p>\r\n<p><strong>- Thời gian bắt đầu: [Time] ph&uacute;t Ng&agrave;y [Date]</strong></p>\r\n<p><strong>- Địa điểm: [Address]</strong></p>\r\n<p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p>\r\n<p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để th&ocirc;ng b&aacute;o.</p>\r\n<p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p>\r\n<p>Tr&acirc;n trọng, k&iacute;nh mời!</p>', 0, '0000-00-00 00:00:00', '2016-08-18 01:02:06', NULL),
(15, 'Đã gửi mail offer', 0, '14', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(16, 'Đã checkin', 0, '19', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(17, 'Đã checkout', 0, '18,26', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(18, 'Đã từ chối offer', 0, '15', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(19, 'Đã xác nhận offer', 0, '15', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(20, 'Lưu Hồ Sơ', 0, '16', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(21, 'Từ chối phỏng vấn', 0, '6', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(22, 'Đã đặt lịch làm Test', 0, '9', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(23, 'Đã gửi mail từ chối', 0, '7,1', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(24, 'Không tới phỏng vấn', 0, '3', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(25, 'Không check in', 0, '19', '', '', 0, '0000-00-00 00:00:00', '2016-08-18 00:53:56', NULL),
(26, 'Đã đặt lịch PV lại lần 2', 0, '29', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(27, 'Từ chối pv lần 2', 0, '27', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(28, 'Phỏng vấn lại', 1, '3', 'Date,Time,Address,Attach', '<p>Ch&agrave;o bạn [First_name]!</p>\r\n<p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i mời bạn đến tham dự <strong>phỏng vấn lần 2</strong> tại c&ocirc;ng ty.</p>\r\n<p><strong>- Thời gian: [Time] ph&uacute;t, Ng&agrave;y&nbsp;[Date]</strong></p>\r\n<p><strong>- Địa điểm: [Address]</strong></p>\r\n<p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p>\r\n<p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại&nbsp;<a href="tel:04.3795.5299">04.3795.5299</a>&nbsp;để th&ocirc;ng b&aacute;o.</p>\r\n<p>Rất mong bạn [First_name] c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p>\r\n<p>Tr&acirc;n trọng, k&iacute;nh mời!</p>', 0, '0000-00-00 00:00:00', '2016-08-18 01:02:22', NULL),
(30, 'Không tới phỏng vấn lần 2', 0, '27', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(39, 'Đã phỏng vấn lần 2', 0, '27', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `First_name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Furigana_name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Birth_date` date NOT NULL,
  `Gender` tinyint(4) NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Contact_information` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Self_intro` text COLLATE utf8_unicode_ci NOT NULL,
  `Marriage` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `email`, `role`, `password`, `remember_token`, `note`, `active`, `image`, `First_name`, `Last_name`, `Furigana_name`, `Birth_date`, `Gender`, `Address`, `Contact_information`, `Phone`, `Self_intro`, `Marriage`, `created_at`, `updated_at`) VALUES
(1, 'BuiNgoc[superadmin]', 'superadmin@123.com', 3, '$2y$10$tPtBhE5Bn9U.XW4jPtZyyutA6vqwPuUfS4sAPc9r0yiZUuiiEhxfq', NULL, '', 0, NULL, 'Bui', 'Ngoc', '', '1994-11-02', 1, 'Hồ Chí Minh', '', '84-95-647-6565', 'Voluptatum labore et repellendus molestias. Voluptatibus aut necessitatibus voluptatibus est dolores magnam. Repudiandae rerum inventore corrupti et vitae.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'LinhDang[admin]', 'admin@123.com', 2, '$2y$10$u4jemekWn40ddfi.eoFUHOiIgu54KH9awkTDEfqSdhbMN9o1Leug.', NULL, '', 0, NULL, 'Bui', 'Admin', '', '1993-11-02', 1, 'Hà Nội', '', '(037)140-0291', 'Ab enim aspernatur ex officia aut nihil. Magni vel aut amet aspernatur. Impedit doloribus velit quas sit non accusantium. Qui perferendis temporibus officia.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Linh Dan[applicant]', 'applicant@123.com', 0, '$2y$10$ri.VkNaeCzAgzWQ4KjGRm.lgiAiEopiXcwwQmgYTO4yUIbHWaJ/4K', NULL, '', 0, NULL, 'Ung', 'Vien', '', '1992-11-02', 1, 'Hồ Chí Minh', '', '+84-123-657-0367', 'Saepe deserunt aut nostrum quis eaque. Qui laudantium consequatur accusantium sint sunt temporibus. Et rerum qui praesentium eum voluptas sapiente dignissimos. Exercitationem minima tempore aut optio adipisci distinctio.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Linh Dang[visitor]', 'visitor@123.com', 1, '$2y$10$MUcY04Tfim7M9ANX2jIj/OoriNXGClYRbP6n8YVtslMbQJsp0PJum', NULL, '', 0, NULL, 'Kiem', 'Duyet', '', '1991-11-02', 1, 'Hà Nội', '', '+84-77-179-4055', 'Nisi rerum sequi enim nesciunt voluptas sed. Qui sequi ullam consequatur nihil maiores. Aliquid qui impedit sapiente doloremque ut repellat. Ut placeat maiores natus soluta nemo et doloribus. Rerum et cumque inventore.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Lý Thực', 'ybe@example.net', 0, '$2y$10$0W1Sw2pFb3l5PBxNj6KtcOBQhHBgKvf/t.tqrO/qUggvu.c87Zh.u', NULL, '', 0, NULL, 'Đại Tài', 'Ân', '', '1987-03-19', 0, 'Hải Phòng', '', '(84)(20)976-1632', 'Animi quia blanditiis sed debitis. Perferendis voluptatum aspernatur illo rerum ut quis aperiam. Omnis suscipit saepe nesciunt ducimus ea eaque.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Chú. Liễu Hạo Kỷ', 'my.ung@example.com', 0, '$2y$10$PAE/HsSx07yQGKjuWLAJVeQvNtizyooTK12FTkFz5rvI/VCM1oSTa', NULL, '', 0, NULL, 'Tuyến Hành', 'Khâu', '', '1988-10-02', 0, 'Đà Nẵng', '', '+84-167-401-1243', 'Sit est blanditiis sint earum minima. Aut consequatur facilis odit consectetur qui. Recusandae id illo blanditiis et aspernatur cum.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Bạc Uyên', 'mhinh@example.com', 0, '$2y$10$pun0GyLlkNG95jjGHkwciu1bVStIdgScROqo9QOqRAPBGxPNStwjC', NULL, '', 0, NULL, 'Di Khánh', 'Tống', '', '1993-11-11', 0, 'Hải Phòng', '', '054 562 5079', 'Velit asperiores maxime quia quasi iusto culpa. Assumenda officia natus quia tempora cum et veniam. Incidunt error quo quia ipsam fugit illum. Error omnis aperiam iusto dolorem nobis.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Chị. Đậu Tú', 'ong.huong@example.net', 0, '$2y$10$0HkFAWdEEqn9hK9uxgEmYu8fsgtIES4cSt.PIqPwDalfqAgkBCdFC', NULL, '', 0, NULL, 'Thịnh Tâm', 'Giáp', '', '1988-03-31', 1, 'Hà Nội', '', '031 620 5914', 'Aut aspernatur numquam ut et atque quasi ut. Illum voluptates nulla expedita et voluptas. Qui ipsa recusandae libero ut laboriosam dolorem voluptatibus.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Chị. An Tố Dương', 'don.bach@example.net', 0, '$2y$10$KNfcQo639V2v5IKqRhX7KuKDLjLgs9afg70gYZ3B96GV5nnYaUeKW', NULL, '', 0, NULL, 'Duệ Đoan', 'Cung', '', '1977-10-04', 1, 'Hồ Chí Minh', '', '0123 571 1734', 'Qui debitis ex eius nulla laborum ducimus minima. Dolore omnis voluptatem molestiae quas quod. Aliquam non et error. Nobis ullam perferendis nostrum dolor.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Sử Đan Du', 'hong.binh@example.com', 0, '$2y$10$6rCNlOLSL4bTnOfiSZE8fO2olKb1zcBvDnGWQuGMpSFfkXYYFrC6W', NULL, '', 0, NULL, 'Lý Uyên', 'Đới', '', '1982-02-24', 0, 'Hà Nội', '', '84-95-196-6021', 'Nulla accusamus sit reiciendis sed doloribus dolor. Velit quam vitae beatae voluptas impedit aut unde deleniti. Temporibus beatae id et.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Phí Học', 'dlai@example.net', 0, '$2y$10$kPS/vA8Tc8qfAMVEI.DoVuyeZKxImb83RuRcMRfL.Uj.YWlXH0HWm', NULL, '', 0, NULL, 'Kính Trưởng', 'Nguyễn', '', '1992-07-19', 1, 'Hải Phòng', '', '0165 363 7971', 'Consectetur nisi sunt molestias ducimus assumenda odit harum. Consequatur dicta in reprehenderit. Omnis aliquid quia hic autem similique praesentium. Amet delectus inventore beatae consequatur et aliquam architecto ipsum.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Hàng Cát', 'nhi.cung@example.org', 0, '$2y$10$oTHRvouN2e.MST9AIR9nWeDCRxqiim4sqYOD3PewUYdmosX/GV2zO', NULL, '', 0, NULL, 'Hân Quý', 'Trà', '', '1979-01-19', 1, 'Hồ Chí Minh', '', '(0218)214-2479', 'Sunt odit est voluptas unde omnis. Quas minus ad et repudiandae quis. Omnis sed dolore quibusdam et fuga odio nobis. Quisquam saepe rem in voluptas neque doloremque animi ipsum.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Giang Tú', 'moc.can@example.org', 0, '$2y$10$hiq5CkG8vsT7MqxWUm2GMOsi2.YvT8Oa3Qt8qDjDvEtpGW.6cIJiK', NULL, '', 0, NULL, 'Tú Sinh', 'Mai', '', '1992-11-24', 1, 'Hà Nội', '', '058 360 6160', 'Consequatur quam et aut non ea itaque earum. Dolore voluptas autem velit distinctio laboriosam iusto quia est. Qui molestiae assumenda voluptatem sunt. Adipisci molestiae odit omnis.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Quản Luật', 'pson@example.com', 0, '$2y$10$pHwlxDWQNbz4tyA2vHFTQeXP8KkP7jBotUhz/dm2g8IOMeCa6Dmrm', NULL, '', 0, NULL, 'Lai Phú', 'Trác', '', '1975-12-03', 0, 'Hà Nội', '', '84-126-356-5226', 'Voluptatem sed eveniet eum rerum aut molestiae. Vel sit quia deleniti. Aliquam quos enim amet vitae est eius repudiandae.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Phan Viên', 'minh.lac@example.org', 0, '$2y$10$Xz376phaA.AaBQVlOi0Vw.wmcAyGdOr1pbx.IPG0w7yl1C8ReAK0m', NULL, '', 0, NULL, 'Tùng Như', 'Lưu', '', '1971-03-04', 1, 'Đà Nẵng', '', '+84-55-774-3020', 'Distinctio vel iste vel recusandae soluta in voluptate. Consectetur voluptate optio quia sint et. Dolores cum quis non suscipit et vero. Qui placeat assumenda ut hic corporis autem laborum.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Chú. Quản Nhân', 'cu.chieu@example.net', 0, '$2y$10$y7n8BkLFYKKG1aC/xPCKN.0j5soVGJJkQzHibuC0jHsk.273k.hAO', NULL, '', 0, NULL, 'Ngôn Tiền', 'Phương', '', '1980-09-05', 0, 'Đà Nẵng', '', '(0281) 531 8465', 'Consequatur fugit iste minima quis. Soluta sit officia sapiente quos. Placeat et dolorum rerum error et in aliquid aliquam. Magnam iure exercitationem est tempora ut illum adipisci.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Em. Bồ Hoài Việt', 'chinh19@example.net', 0, '$2y$10$F27HOj1OFlx3CVv5j4zF2u5YX/lrW.8XUdTPiIc5qf1NcS2MIQTAW', NULL, '', 0, NULL, 'Chi Thiên', 'Trác', '', '1986-05-22', 0, 'Hà Nội', '', '0510-316-8664', 'In facere qui aspernatur. Magnam enim magnam est eum. Maiores dicta iure ut voluptatem dolore ut qui dolorem. Repellat ab et sed mollitia laboriosam. Voluptate laudantium iusto deleniti corrupti esse iusto.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Em. Cấn Huyền Phong', 'dam.anh@example.org', 0, '$2y$10$ZSqVrhGSrYdTaFkGQxPDlerh3QxESUY9ZcovzoybvXnd5nsHuwLEm', NULL, '', 0, NULL, 'Lân Tú', 'Lương', '', '1994-03-07', 0, 'Hồ Chí Minh', '', '(033) 067 6685', 'Nam praesentium impedit commodi fugiat ratione. Delectus laudantium corporis et in. Corrupti optio officiis sed voluptas. Minus maiores et aut fuga.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Dã Giang Khánh', 'flu@example.org', 0, '$2y$10$q4aDTXVwcP2AFg5AOEAsGOME6Md4W0Yue/mpiVCstCCrc2QkHRppC', NULL, '', 0, NULL, 'Lý Tín', 'Trương', '', '1980-10-12', 0, 'Đà Nẵng', '', '+84-126-027-0214', 'Aspernatur quam omnis quas qui excepturi qui laudantium. Ducimus tenetur vel praesentium quod rerum alias ad. Laudantium asperiores fuga ad id voluptas et possimus velit.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Chị. Lý Nguyệt', 'tu.kieu@example.com', 0, '$2y$10$pmSKBQIkygZjeCX3Ecdhm.pXZxcgIMQDfCyFOxpa9IM5rciexzRKy', NULL, '', 0, NULL, 'Thiện Hoàng', 'Nhiệm', '', '1982-03-30', 1, 'Đà Nẵng', '', '(090)993-6048', 'Voluptatem consequuntur provident at dolorem voluptas in quia. Vero consectetur et dolorem. Sed consectetur et natus et possimus sit. Laudantium et dolorum distinctio itaque dolorem et.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Chị. Tòng Bích', 'hoan.thach@example.net', 0, '$2y$10$/lnIQz7ZfPg2oYwObTfRR.TA4RGsRW8h6Dz27LTQ.7NUgayKtMQfm', NULL, '', 0, NULL, 'Khai Diệu', 'Ngô', '', '1973-02-03', 0, 'Hà Nội', '', '84-91-920-4758', 'Provident adipisci quia ab eum et. Corporis rem est qui voluptas explicabo.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Ông. Phan Hoài Chính', 'hoai56@example.net', 0, '$2y$10$hjCw4JZRrKEA6lzD1qETXuqApMNjds0c0B6tufVcvFirB0aGtlUum', NULL, '', 0, NULL, 'Khánh Ẩn', 'Dã', '', '1989-02-19', 0, 'Hải Phòng', '', '(022)371-0347', 'Sit ratione et ea eum nostrum quia qui. Voluptatem vel sit hic iusto. Sunt et molestias vel laudantium voluptates. Voluptas et explicabo delectus itaque. Enim fugiat rerum quibusdam quibusdam est.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Tô Đông Vân', 'qdon@example.org', 0, '$2y$10$MQqqCtGnDqAj8Ag3mlrxw.R9U/ejon3Cb4SHfXWIGviWAbnZxdNJa', NULL, '', 0, NULL, 'Minh Công', 'Ty', '', '1975-12-22', 0, 'Hà Nội', '', '84-30-037-6225', 'Maiores aut exercitationem officia sequi. Dolores et porro adipisci veniam deleniti aut aut. Similique qui et alias accusantium.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Hán Linh', 'hoan.be@example.com', 0, '$2y$10$bDrMOgJ.tCEMKBX0TrAB5.iItCRTNE0pJgoQ.v3KMy8f/iRDhcZNm', NULL, '', 0, NULL, 'Trụ Huỳnh', 'Lều', '', '1988-03-19', 1, 'Đà Nẵng', '', '058 548 3056', 'Aperiam minima vero porro in delectus aut tempora tenetur. Voluptatibus aut qui neque illum aut ex. Sed et ipsa in reprehenderit dolores nisi. Repellendus maxime aspernatur et aut fugit.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Thiều Nhượng', 'trac.quan@example.org', 0, '$2y$10$3NY1cnLwJ75wgCm/6deh0O19iTOTAwcKHUGUFv8dN83e48p3f7Tpq', NULL, '', 0, NULL, 'Đoan Hoán', 'Trà', '', '1971-09-09', 1, 'Cần Thơ', '', '+84-199-664-0648', 'Enim nihil et rem. Incidunt et earum qui sit vitae cumque aut.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Cụ. Trưng Tuyền', 'hma@example.com', 0, '$2y$10$zALElfUpA5xirn7QuV5oKOrHE5c9dmRCHrK7xmUZakGAlDuZDQefa', NULL, '', 0, NULL, 'Trang Thêu', 'Cát', '', '1989-04-05', 1, 'Hà Nội', '', '(093) 718 8813', 'Laudantium id laborum reprehenderit. Sed sapiente quis rem expedita quos. Totam necessitatibus nostrum dolorem et.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Cô. Bá Thủy Cương', 'quyen62@example.net', 0, '$2y$10$mqInSHhSGd9zety7geeGbu45r2TUbOwBkK89TBtPCz76MVusSkjeW', NULL, '', 0, NULL, 'Lâm Uy', 'Quách', '', '1992-01-22', 0, 'Hải Phòng', '', '84-72-663-7379', 'Consequatur nemo delectus maiores corporis. Soluta sit consequatur provident ea deserunt. Ut aspernatur id reiciendis soluta et porro. Quia nulla facilis maiores qui nemo a.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Hoa Tài Tuệ', 'tong.ha@example.com', 0, '$2y$10$WuRaU3upZhHXr2iyEsZAsep50O/zCMr.3566q/fjY6Dq.29MTlmtm', NULL, '', 0, NULL, 'Uyên Khiếu', 'An', '', '1978-10-19', 0, 'Hồ Chí Minh', '', '037 839 2162', 'Culpa ipsum nobis omnis modi unde dicta at. Et voluptatem et commodi suscipit voluptatem asperiores sint facilis. Est incidunt sit saepe voluptatem.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Bác. Bạc Khoát', 'tieu.nam@example.com', 0, '$2y$10$cHM2CcG2e8ktVBnMskxXxe/d25DfqB1/wG8PtXQcebyfDY2ZuKNd6', NULL, '', 0, NULL, 'Tiếp Vân', 'Khổng', '', '1976-09-02', 1, 'Hà Nội', '', '(075) 774 9608', 'Quod magni error nemo et aliquid accusantium. Explicabo dicta voluptatibus qui non. Praesentium dolorum perferendis omnis et.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Mạc Khiêm', 'triet.vu@example.com', 0, '$2y$10$cnedIX.AmurGxZLUvwl94O/3GoFG5g5sxxQ4/2tYGhFXiSt6tSYuy', NULL, '', 0, NULL, 'Đan Thiên', 'Khương', '', '1979-06-17', 0, 'Hà Nội', '', '(097) 601 4168', 'Hic provident harum eum deserunt. Unde velit consequatur molestias optio blanditiis sed. Et accusamus et vel omnis consequatur voluptatem quisquam architecto. Iusto saepe consequatur excepturi.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Ông. Lâm Dương Thực', 'odinh@example.com', 0, '$2y$10$28QG6X8i.LXimLwjlT6sWuaFQfFxAOlu3aiyyEzaap5wnRBr4Jk92', NULL, '', 0, NULL, 'Thoại Ly', 'Lục', '', '1972-01-27', 0, 'Hà Nội', '', '095 985 5057', 'Reprehenderit quia dolor aut vel et. Qui fugiat molestiae quasi porro est repellendus. Expedita est quod qui facere provident recusandae autem. Sed ut quidem incidunt nisi qui quae.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Cụ. Thập Luật', 'le.nhien@example.org', 0, '$2y$10$0iBDYgmknMXiUGB6NaCrgunn0MA3UNOduHOCwBcgpf9id5NAyZTn6', NULL, '', 0, NULL, 'Nghĩa Đại', 'Nghị', '', '1993-11-23', 0, 'Đà Nẵng', '', '84-127-782-0408', 'Est aliquid dolor eum exercitationem dolor expedita. Tempora nihil id aut molestiae quam. Ut nulla placeat tempore sint qui.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Phương Học', 'rcam@example.org', 0, '$2y$10$f7uXZYZ.cP56wxyjs8anIeruOPvxqGo2QJ5f3B3JD0hQWh9C8IDMK', NULL, '', 0, NULL, 'Vượng Thúc', 'Tô', '', '1984-10-21', 0, 'Hà Nội', '', '(0781)257-8684', 'Explicabo quidem consectetur nulla enim. Quia delectus eos ipsa enim voluptate optio et. Nihil tenetur non qui beatae possimus. Dicta numquam eaque quas tempore.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Chị. Hy Nguyên', 'gia.luan@example.net', 0, '$2y$10$H06VAxdzZ.fYxPlqXR7tFOFyeIVlhUaJ9vCQgaVos7W7WR5VUmbGK', NULL, '', 0, NULL, 'Anh Cương', 'Biện', '', '1994-04-08', 1, 'Đà Nẵng', '', '0121-738-8410', 'Est saepe voluptas dolorum hic. Qui tempore quo perferendis ut labore vel dolores. Velit ratione minima molestiae tenetur molestias odit sapiente. Necessitatibus assumenda mollitia culpa rerum natus minus dignissimos.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Bác. Diệp Phong Phong', 'don.trac@example.net', 0, '$2y$10$lkugCC2kyUQNGMzp6p0.T.oPHKLQ5RA1e66WNK.mluiUN9Hpmy.qC', NULL, '', 0, NULL, 'Thuận Chiểu', 'Phương', '', '1971-10-27', 1, 'Cần Thơ', '', '062-059-2976', 'Voluptatem et quo et quia voluptatem veritatis. Dolor harum quis quo aliquam a. Alias facere a dignissimos omnis alias natus voluptatem. At in repellendus eum mollitia aperiam.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Chú. Điền Nghĩa Hải', 'phuong53@example.com', 0, '$2y$10$IHZ8623cFTxq6o4RhHJ7Te3l8B4Wbef1bMDr2f/5GdQqKg0LVgUXW', NULL, '', 0, NULL, 'Quế Phương', 'Thập', '', '1987-12-10', 0, 'Cần Thơ', '', '+84-52-652-3444', 'Quia rerum accusamus odit porro. Repellendus eveniet minus sunt.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Cụ. Thập Chung', 'le.ly@example.net', 0, '$2y$10$r0rSxb2YXCcw5L7ixCnuAOG0cUK2FHW6eVVVpoopyy5wvdGl9KE8G', NULL, '', 0, NULL, 'Đạo Điệp', 'Thiều', '', '1970-01-22', 0, 'Hải Phòng', '', '+84-168-533-2605', 'Ut adipisci aut nesciunt velit. Vel tempore nesciunt qui accusamus fugit dolorum ad. Aut assumenda ad autem consequatur perspiciatis.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Mai Ca', 'thieu.man@example.org', 0, '$2y$10$UMlnSMmWynCsqnKDJ7HswemEY0n8JCCueCbcgGF3GmU/DAQxxQmNK', NULL, '', 0, NULL, 'Diễm Huỳnh', 'Phạm', '', '1988-08-12', 0, 'Cần Thơ', '', '84-120-944-0501', 'Eum numquam vitae animi soluta fugiat consequuntur. Odit beatae vel quo blanditiis culpa aut. Placeat aut fugiat reiciendis quia assumenda. Magni tempore dolorem maxime perferendis.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Yên Nhật Vinh', 'giang.can@example.com', 0, '$2y$10$BQzi3HGyzkqZc.9Vdl6oluKs9mehZJG823Bg8hSAmAnXTeIpOrutq', NULL, '', 0, NULL, 'Lý Giao', 'Mạc', '', '1979-08-27', 0, 'Hồ Chí Minh', '', '(0218) 653 7751', 'Omnis similique est et dicta. Qui accusamus quod iusto. Quod iusto rerum et nihil et quas nihil. Molestiae maiores distinctio quo veritatis libero et. Deserunt labore recusandae laboriosam expedita sunt.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Anh. Sơn Đăng Cường', 'ca.duong@example.org', 0, '$2y$10$Cl./a3C7c..pzA5zfFvYCuBZAbo49k27LLmNGokkqogXetF51nOMG', NULL, '', 0, NULL, 'Lâm Thành', 'Kim', '', '1971-05-08', 1, 'Hải Phòng', '', '0240-316-3204', 'Ut ab rerum nesciunt animi sed facere alias voluptatem. Quod et eos ab. Odit excepturi perferendis qui non totam laborum perferendis.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Khuất Định Thiện', 'dan88@example.org', 0, '$2y$10$3bdNHcOFFZVviXredjAsXORZxUsuUdW1ECnJeAO1KUzfM11bbGp26', NULL, '', 0, NULL, 'Huỳnh Trạch', 'Lưu', '', '1990-10-13', 0, 'Hồ Chí Minh', '', '(0129)028-6257', 'Quod tenetur animi sed. Omnis est soluta excepturi. Laborum beatae veritatis nemo repellendus.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Cụ. Thi Di Thiện', 'dam.ninh@example.net', 0, '$2y$10$dB9BV9ykhLyxAf4sO3ccgeyzuguksB1sb2xohCLto0MiVegBDjsYe', NULL, '', 0, NULL, 'Việt Thảo', 'Hàng', '', '1973-11-23', 0, 'Hà Nội', '', '(038)268-6477', 'Quis ratione explicabo facilis et. Nihil libero velit qui praesentium cumque et. Officia debitis sit fugit optio fugiat veniam unde. Est dolore nemo id ea quos dolore. Commodi temporibus omnis eaque nobis corporis et.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Xa Chiến', 'dai17@example.net', 0, '$2y$10$Pjlp3mqsAj3dPnWtEExINOrIMBBroxvfYiWfU.AluoOAPrhHHD0XG', NULL, '', 0, NULL, 'Bào Chung', 'Đái', '', '1980-11-17', 1, 'Đà Nẵng', '', '074-216-6755', 'Accusantium similique eius omnis. Voluptas cupiditate voluptatem ut atque sunt. Odio laudantium facere consectetur quasi quasi.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Thái Du', 'giang.theu@example.net', 0, '$2y$10$j1M3zVttiY6.xvPDwz6iV.9UeNf3.Qcgd3nM/FfDoQqI3k/eBpo.W', NULL, '', 0, NULL, 'Hào Kim', 'Sơn', '', '1980-06-24', 0, 'Đà Nẵng', '', '84-186-600-1642', 'Nesciunt ullam et in similique ipsa nulla. Voluptatem nostrum architecto ullam quam omnis voluptate est sunt. Aut velit aperiam a dolor. Impedit quia ea similique ea rem dicta.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Trang Từ Thi', 'vy.trieu@example.net', 0, '$2y$10$S2L1vjFq4sBtiogF9GLBxemCj8LJgoQTcQTQwXjtaHN5n2JSes.wu', NULL, '', 0, NULL, 'Đức Xuyến', 'Thập', '', '1971-07-14', 0, 'Cần Thơ', '', '(0165) 944 2848', 'Impedit nihil voluptates molestiae qui magni autem iure vitae. Atque et voluptates vel possimus nulla. Vero quae sequi culpa et quibusdam quia et. Quo dolor est excepturi.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Bác. Chử Tân', 'kthieu@example.org', 0, '$2y$10$nYUxi..H463jpJH1NnXNI.y6ZlRb4m7VQwhxN42Uf2rf2dwdfOlnC', NULL, '', 0, NULL, 'Hoàn Hương', 'Chế', '', '1986-08-25', 1, 'Đà Nẵng', '', '079-568-4224', 'Deleniti deserunt dolorem et aut omnis. Aut quos porro expedita harum facilis. Dolor et omnis architecto sed vel eos.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Đỗ Liên', 'xla@example.org', 0, '$2y$10$.MOjBGGB5z3mGLe19b7lu.pMy99Owt9gYb2dWG0V/8o8tKIkaWPmS', NULL, '', 0, NULL, 'Vi Di', 'Thiều', '', '1986-09-29', 1, 'Đà Nẵng', '', '84-164-923-2014', 'Quos nesciunt eum fugiat vero. Eligendi in minima adipisci veritatis omnis. Ex in nihil qui vero iste maxime incidunt pariatur.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Trà Quyền', 'ha.dan@example.com', 0, '$2y$10$xsfSY9d2oOUGlKkdu0w9gehUYBiqV8heKZ6yzjXPCP1HQhuRtDcs6', NULL, '', 0, NULL, 'Khê Trung', 'Lại', '', '1994-12-18', 1, 'Đà Nẵng', '', '84-97-049-1511', 'Sequi quos repudiandae et temporibus quis quia vitae. Eos corporis beatae dignissimos ut reiciendis quis. Sequi quibusdam ullam quo numquam accusamus voluptatibus harum qui.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Cát Hoàng', 'luc.vi@example.net', 0, '$2y$10$k9slDAEZO67z7XLbxk4k3.x2p7qzDjyOSqHQO7mQo8fPE.U7NMPCG', NULL, '', 0, NULL, 'Trân Chi', 'Bành', '', '1978-03-16', 0, 'Hải Phòng', '', '(84)(25)515-3771', 'Illum quod quo porro minima excepturi dolorem corporis. Cum rerum incidunt culpa maiores reprehenderit dolorum. Quibusdam tenetur temporibus officia quibusdam itaque perferendis. Nihil est consequatur praesentium quidem.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Bạch Tiểu Trang', 'due43@example.com', 0, '$2y$10$eZE3gHBawXhCxX3IgSJju.bBODs56sPNA1DLk/hT01KfgLmruPipC', NULL, '', 0, NULL, 'Linh Phong', 'Ngân', '', '1979-05-10', 0, 'Đà Nẵng', '', '84-163-112-3572', 'Temporibus et est assumenda dolores. Voluptas perspiciatis aut magni sint eius a sint.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Trình Thùy', 'viet27@example.com', 0, '$2y$10$/cWUQLh7HtwtIEkStflpOeYemCYC8SAg7ORtyUhR82k0xUNgJEsGe', NULL, '', 0, NULL, 'Giao Khanh', 'Lý', '', '1977-09-03', 0, 'Hồ Chí Minh', '', '056-640-9118', 'Fugit consequatur et voluptas et vero ut quaerat. Labore quam eum inventore ut tenetur facilis voluptatem. Nisi totam eos eaque quos. Dolores ducimus esse necessitatibus vitae laudantium.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Chị. Tạ Tuệ', 'cu.huynh@example.net', 0, '$2y$10$eULXg1bxKzTJHdRi3Xj8iuBG.8UmroeeaCo.DPG6vdsGbRVLebpWW', NULL, '', 0, NULL, 'Huynh Vân', 'Trịnh', '', '1981-04-24', 1, 'Hà Nội', '', '(0169) 571 6862', 'Sit vel quis natus enim quia ipsum nihil. Sed aut quidem quas minima consectetur labore. Quis ut ipsa vitae qui necessitatibus laborum sunt voluptas.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Bà. Mai Đan', 'quynh08@example.com', 0, '$2y$10$Gj38UjfvQegSQEjc6apM7ejomECniIUr3nYEQWIE7V4qFugiZ7brK', NULL, '', 0, NULL, 'Khôi Tuệ', 'La', '', '1988-11-30', 1, 'Cần Thơ', '', '84-4-3472-1314', 'Sit hic iusto est quaerat dignissimos beatae quod. Quos fuga et est unde ea nisi sed. Ut quidem eum eveniet debitis.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Lỡ Pháp', 'phung.dinh@example.net', 0, '$2y$10$VtPLe6lcqeO8UuhGlC1HsOJ9mE9UFTEKD4940YA4eLM.e2nWNnvmO', NULL, '', 0, NULL, 'Luật Nữ', 'Trình', '', '1973-04-07', 1, 'Hải Phòng', '', '(0350) 868 6937', 'Eligendi cum autem est rerum tempora modi. Vel magni quas maiores explicabo. Minus voluptatem voluptatibus cum ut architecto ut. Laborum cum dolores aut iste. Provident temporibus non suscipit.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Đoàn Thái', 'hoa.ho@example.net', 1, '$2y$10$1rlyvPOcRSz/Ce1L5L.dZO1xo0zyFIl45v8E.RmoOeeTKwo4yO.LG', NULL, '', 0, NULL, 'Hạnh Kỳ', 'Huỳnh', '', '1973-09-27', 0, 'Hà Nội', '', '(0651)127-3485', 'Nisi quidem est voluptatibus perferendis quae voluptatem maxime ea. Ratione quia et non facere autem. In sequi adipisci dolor quibusdam provident. Quisquam explicabo ut ipsum eum.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Lương Hạnh Vũ', 'lac.khuc@example.net', 1, '$2y$10$j4uiXSxkVx8Q3HHGfx3TJuquNCvJh0yU9LLjtH9bTf49EshjZ/If2', NULL, '', 0, NULL, 'Đào Hiệp', 'Khổng', '', '1984-03-13', 1, 'Hải Phòng', '', '(0219) 194 3608', 'Dolores neque mollitia explicabo cupiditate qui enim odio. Culpa nulla quasi illo numquam sint sit.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Kha Huấn', 'tuong85@example.org', 1, '$2y$10$i5gfBNf6NKrDy2Gq6w3jt.5DMsqGnRFhCBMa61YuQWzwAd44ggWI2', NULL, '', 0, NULL, 'Nhi Nghị', 'Phùng', '', '1975-01-20', 1, 'Hải Phòng', '', '(0162)883-1289', 'Sit maiores assumenda numquam nostrum laudantium repudiandae. Impedit nisi asperiores qui quia recusandae aut voluptatum. Voluptates dolores eum iusto quaerat.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Danh Khắc Trung', 'lam47@example.net', 1, '$2y$10$PZXL0/6TNmx8nyxKpQGMtuDciPKOPAVo1xr6dsNLtH1P/LXIemexG', NULL, '', 0, NULL, 'Lam Ca', 'Triệu', '', '1988-05-01', 0, 'Hồ Chí Minh', '', '(84)(321)160-6478', 'Cupiditate quis voluptas sunt ullam temporibus sunt illo excepturi. Et quidem sequi labore tenetur iure non dolor. Corporis sint maiores officia veniam consequatur voluptate.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Quách Dã Thường', 'bach34@example.net', 1, '$2y$10$hN/5aeub3CAPSHj.7tgzrO1Qczmy2zxrwPu/fv4kT3nx8MCYiaxBi', NULL, '', 0, NULL, 'Hữu Băng', 'Đan', '', '1983-04-14', 0, 'Hải Phòng', '', '(0511)888-4384', 'Consequuntur suscipit libero aut laborum. Amet quis aut et pariatur. Rerum occaecati accusamus qui qui earum praesentium.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Kiều Lê Hường', 'han.dao@example.org', 1, '$2y$10$PqKh7V6DyJSYVfgRkuDeKOfyxMpKq2XRn6CfUia3InKV0mQ3fG5ge', NULL, '', 0, NULL, 'Toại Dũng', 'Uông', '', '1970-04-20', 1, 'Hải Phòng', '', '+84-169-410-6888', 'Ipsam inventore qui nobis occaecati quia quia. Dolorem ullam sit molestiae non accusamus.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `pivot_users_groups_user_id_foreign` (`user_id`),
  ADD KEY `pivot_users_groups_group_id_foreign` (`group_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_skill`
--
ALTER TABLE `it_skill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `pivot_users_groups`
--
ALTER TABLE `pivot_users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
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
-- Constraints for table `pivot_users_groups`
--
ALTER TABLE `pivot_users_groups`
  ADD CONSTRAINT `pivot_users_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_users_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_cv_id_foreign` FOREIGN KEY (`cv_id`) REFERENCES `cvs` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
