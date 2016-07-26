ALTER TABLE `cv` ADD `Status` INT NOT NULL DEFAULT '0' AFTER `Active`;
ALTER TABLE `cv` ADD `apply_to` INT NOT NULL AFTER `Status`;

--
-- Table structure for table 'groups'
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table 'groups'
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'group 1a', '2016-06-12 19:16:55', '2016-06-12 19:19:16'),
(4, 'group 3a', '2016-06-12 23:54:09', '2016-06-13 00:53:48'),
(5, 'group test', '2016-06-13 00:31:50', '2016-06-13 00:31:50'),
(7, 'group 4', '2016-06-13 01:41:59', '2016-06-13 01:41:59'),
(8, 'group 5', '2016-06-13 01:43:13', '2016-06-13 01:43:13'),
(9, 'group 6', '2016-06-13 01:44:02', '2016-06-13 01:44:02'),
(10, 'group 2', '2016-06-13 02:03:15', '2016-06-13 02:03:15');

-- --------------------------------------------------------


-- Table structure for table 'pivot_users_groups'
--

CREATE TABLE `pivot_users_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table 'pivot_users_groups'
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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table 'positions'
--

INSERT INTO `positions` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(0, 'Khong xac dinh', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 'vi tri 1', 1, '0000-00-00 00:00:00', '2016-06-08 20:03:03'),
(2, 'vi tri 2', 0, '2016-06-08 20:06:18', '2016-06-08 21:31:53'),
(3, 'vi tri 3', 0, '2016-06-08 20:39:52', '2016-06-09 00:29:02'),
(4, 'vi tri 4', 1, '2016-06-08 21:14:27', '2016-06-08 21:14:27'),
(5, 'vi tri 5', 1, '2016-06-08 21:14:35', '2016-06-08 21:15:46'),
(23, 'vi tri 6 ', 1, '2016-06-08 21:16:36', '2016-06-09 00:28:29');

-- --------------------------------------------------------

--
-- Indexes for table 'groups'
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pivot_users_groups`
--
ALTER TABLE `pivot_users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;