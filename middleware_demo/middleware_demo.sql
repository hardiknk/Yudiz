-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 01:58 PM
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
-- Database: `middleware_demo`
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Eladio Lynch', 'annetta41@example.com', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ACPBtzmDCJ', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(3, 'Florine Robel', 'mayer.sarina@example.org', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pNyG05l4Dj', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(4, 'Damion McKenzie', 'brant.spencer@example.com', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2RAdY3p6jf', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(5, 'Sarai Bashirian', 'isabell58@example.org', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NMkVzBc1IH', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(6, 'Diego Kuvalis', 'nedra.wuckert@example.net', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XpGJrdwLhy', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(7, 'Justice Lemke DDS', 'kamryn81@example.net', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qkPSPiyRX9', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(8, 'Liam Friesen', 'kboehm@example.com', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EjBbxgJwnl', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(9, 'Godfrey Sanford', 'stacy.wolff@example.com', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'n5PlDaxlsW', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(10, 'Jovanny Littel II', 'laverne05@example.net', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yIo0TWQF85', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(11, 'Samir Ryan', 'emilia18@example.net', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XbQgXG66sD', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(12, 'Whitney Dickens', 'xlittle@example.org', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BC0iTBTtFY', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(13, 'Dr. Novella Nader II', 'cleo.satterfield@example.net', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QC47PAEQCg', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(14, 'Bridgette Gottlieb', 'arturo69@example.org', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BjtxNrwG7j', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(15, 'Caroline Moen', 'bkuvalis@example.com', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iNLEF84wQn', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(16, 'Darrick O\'Keefe', 'vivianne.effertz@example.com', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NUnpeYbfbD', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(17, 'Oliver Metz', 'ryan.linwood@example.net', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6gl1pHaiIx', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(18, 'Leann Considine', 'leanna66@example.com', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'q1tRNtD1HB', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(19, 'Devon Kihn', 'alexa.zieme@example.net', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qL9CiXVsvR', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(20, 'Oren O\'Keefe', 'qbeatty@example.org', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'L2iZlEgXNi', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(21, 'Jerrold Kautzer', 'gutkowski.rick@example.com', 0, '2022-02-17 06:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'b90TOsl4B6', '2022-02-17 06:20:02', '2022-02-17 06:20:02'),
(22, 'Blythe Bridges', 'hardikk@gmail.com', 0, NULL, '$2y$10$rU5MAY7eBZ/SwQ/I6rAUgOvGQF6zo4Q82jbEaFBZZ9KtjDdmCMb.W', NULL, '2022-02-17 06:55:54', '2022-02-17 06:55:54'),
(23, 'hardik', 'hardik@gmail.com', 0, NULL, '$2y$10$CuFC8yhodlGu7hq.mmyAOuj8hqrrj.BkJenE.GvEK8labSyMtenza', NULL, '2022-02-17 06:56:27', '2022-02-17 06:56:27'),
(24, 'hardik', 'hhhhea@gmail.com', 0, NULL, '$2y$10$NQ8v0ngJMlMprrdQkvhXae0e03DzHc.hFjiowYxxAlvkqjJ7i8pl6', NULL, '2022-02-17 07:11:34', '2022-02-17 07:11:34'),
(25, 'hardik yudiz', 'hardik.kanzariya@yudiz.com', 1, NULL, '$2y$10$IHoUrTD4lG1NPBrYOERO..d/SNiK7.87pFRzJpXBQ2TrVI9Hj0V1e', NULL, '2022-02-17 07:16:39', '2022-02-17 07:16:39');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
