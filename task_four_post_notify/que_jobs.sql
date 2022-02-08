-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 07:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `que_jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_08_045149_create_posts_table', 2),
(6, '2022_02_08_045746_create_jobs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_name`, `created_at`, `updated_at`) VALUES
(1, 'Test One', '2022-02-07 23:23:49', '2022-02-07 23:23:49'),
(2, 'Test Two', '2022-02-07 23:50:36', '2022-02-07 23:50:36'),
(3, 'Test Two', '2022-02-07 23:53:05', '2022-02-07 23:53:05'),
(4, 'Test Two', '2022-02-07 23:56:04', '2022-02-07 23:56:04'),
(5, 'Test Two', '2022-02-07 23:57:03', '2022-02-07 23:57:03'),
(6, 'Test Two', '2022-02-08 00:06:15', '2022-02-08 00:06:15'),
(7, 'Test Two', '2022-02-08 00:07:26', '2022-02-08 00:07:26'),
(8, 'Test Two', '2022-02-08 00:07:41', '2022-02-08 00:07:41'),
(9, 'Test Two', '2022-02-08 00:08:09', '2022-02-08 00:08:09'),
(10, 'Test Two', '2022-02-08 00:08:39', '2022-02-08 00:08:39'),
(11, 'Test Two', '2022-02-08 00:09:57', '2022-02-08 00:09:57'),
(12, 'Test Two', '2022-02-08 00:10:58', '2022-02-08 00:10:58'),
(13, 'Test Two', '2022-02-08 00:11:33', '2022-02-08 00:11:33'),
(14, 'Test Two', '2022-02-08 00:13:32', '2022-02-08 00:13:32'),
(15, 'Test Two', '2022-02-08 00:14:27', '2022-02-08 00:14:27'),
(16, 'Test Two', '2022-02-08 00:15:34', '2022-02-08 00:15:34'),
(17, 'Test Two', '2022-02-08 00:22:32', '2022-02-08 00:22:32'),
(18, 'Test Two', '2022-02-08 00:24:00', '2022-02-08 00:24:00'),
(19, 'Test Two', '2022-02-08 00:37:10', '2022-02-08 00:37:10'),
(20, 'Test Two', '2022-02-08 00:38:08', '2022-02-08 00:38:08'),
(21, 'Test Two', '2022-02-08 00:38:10', '2022-02-08 00:38:10'),
(22, 'Test Two', '2022-02-08 00:38:28', '2022-02-08 00:38:28'),
(23, 'Test Two', '2022-02-08 00:38:45', '2022-02-08 00:38:45'),
(24, 'Test Two', '2022-02-08 00:39:19', '2022-02-08 00:39:19'),
(25, 'Test Two', '2022-02-08 00:40:06', '2022-02-08 00:40:06'),
(26, 'Test Two', '2022-02-08 00:42:09', '2022-02-08 00:42:09'),
(27, 'Test Two', '2022-02-08 00:42:30', '2022-02-08 00:42:30'),
(28, 'Test Two', '2022-02-08 00:42:55', '2022-02-08 00:42:55'),
(29, 'Test Two', '2022-02-08 00:45:11', '2022-02-08 00:45:11'),
(30, 'Test Two', '2022-02-08 00:45:28', '2022-02-08 00:45:28'),
(31, 'Test Two', '2022-02-08 00:55:26', '2022-02-08 00:55:26'),
(32, 'Test Two', '2022-02-08 00:56:10', '2022-02-08 00:56:10'),
(33, 'Test Two', '2022-02-08 00:56:35', '2022-02-08 00:56:35'),
(34, 'Test Two', '2022-02-08 01:00:19', '2022-02-08 01:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_subscribe` tinyint(4) NOT NULL COMMENT '1 for yes and 0 for no',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_subscribe`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Michelle Rosenbaum', 'cesar.oberbrunner@example.com', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'B3oYaMw6dY', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(2, 'Wilmer Goyette', 'vicky.murray@example.org', 0, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '13Mwk0Om5v', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(3, 'Art Bahringer', 'vella34@example.net', 0, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gJMY0vjQgc', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(4, 'Mr. Cedrick Ziemann', 'katrine.friesen@example.net', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Cy1Om1mLVu', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(5, 'Ms. Betsy Bednar PhD', 'kara.effertz@example.org', 0, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'r8AoMdjvof', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(6, 'Carli Conn', 'mya.lueilwitz@example.com', 0, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pGnmeLX0BY', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(7, 'Henri Boehm', 'smills@example.net', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eoFSoMolBH', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(8, 'Marie Murray', 'robel.angus@example.net', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'n72Ar4qzo8', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(9, 'Reid White', 'orn.deon@example.com', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PhxIgHdP8D', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(10, 'Kristin Gibson', 'charlie.gulgowski@example.net', 0, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VpuEabtQf9', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(11, 'Mossie Boyle', 'treichert@example.com', 0, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gC7HbNyjfQ', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(12, 'Dr. Wyman Muller V', 'gerlach.fredrick@example.org', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UVn966YEou', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(13, 'Marty Considine II', 'rkreiger@example.com', 0, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'szrFBxO03P', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(14, 'Easter Treutel', 'freda93@example.org', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uwCxvqmBXB', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(15, 'Ms. Melyssa Mills II', 'eula.haag@example.com', 0, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jMptyoicN5', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(16, 'Andrew Stiedemann', 'hcummerata@example.org', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IhuCzXXbTb', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(17, 'Elisabeth Weimann', 'sydnee75@example.net', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'H9civKJHfG', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(18, 'Cooper Rutherford', 'heather.kohler@example.net', 0, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AuvCcL02yz', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(19, 'Miss Kathryn Swaniawski', 'chet.cronin@example.org', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 's6zLpZxfr2', '2022-02-07 23:16:13', '2022-02-07 23:16:13'),
(20, 'Dannie Turner', 'toby.marquardt@example.org', 1, '2022-02-07 23:16:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yHQEJoMpDl', '2022-02-07 23:16:13', '2022-02-07 23:16:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
