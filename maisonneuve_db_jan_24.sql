-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 02:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maisonneuve`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maisonn_articles`
--

CREATE TABLE `maisonn_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `art_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maisonn_articles`
--

INSERT INTO `maisonn_articles` (`id`, `title`, `art_body`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'dfgdfgsdfg', 'sdfgsdfgfdg', '2024-01-25 03:57:40', '2024-01-25 03:57:40', 17),
(3, 'Art 2', 'asdfsadfsdafsdaf', '2024-01-25 05:01:19', '2024-01-25 05:01:19', 17),
(4, 'dfg', NULL, '2024-01-25 06:01:41', '2024-01-25 06:01:41', 17),
(5, 'asdfg', NULL, '2024-01-25 06:01:50', '2024-01-25 06:01:50', 17),
(6, 'dfgkkk', NULL, '2024-01-25 06:02:55', '2024-01-25 06:02:55', 17),
(7, 'sdfllll', NULL, '2024-01-25 06:03:53', '2024-01-25 06:03:53', 17),
(8, 'zfdg', 'asdfg', '2024-01-25 06:27:01', '2024-01-25 06:27:01', 17);

-- --------------------------------------------------------

--
-- Table structure for table `maisonn_etudiants`
--

CREATE TABLE `maisonn_etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ville_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maisonn_etudiants`
--

INSERT INTO `maisonn_etudiants` (`id`, `name`, `address`, `phone`, `birthday`, `created_at`, `updated_at`, `ville_id`) VALUES
(17, 'Ana Alvarez S', '2225 yeayea', '555 555 5555', '2024-01-19', NULL, NULL, 2),
(18, 'Ben Blasic', 'another address', '444 444 4444', '2024-02-03', NULL, NULL, 6),
(23, 'Deleteme', '222 yeayea', NULL, NULL, NULL, NULL, 3),
(26, 'sadfsadf', NULL, NULL, NULL, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `maisonn_villes`
--

CREATE TABLE `maisonn_villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maisonn_villes`
--

INSERT INTO `maisonn_villes` (`id`, `name`) VALUES
(11, 'Daishamouth'),
(5, 'Diannastad'),
(7, 'East Mohamedtown'),
(4, 'Gregghaven'),
(9, 'Jennieton'),
(1, 'Montreal'),
(8, 'New Elisa'),
(3, 'Port Macieborough'),
(2, 'West Clarkland'),
(6, 'West Ernestinaberg'),
(10, 'West Jamel');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_01_25_040324_create_users_table', 1),
(2, '2024_01_23_040206_create_maisonn_villes_table', 2),
(3, '2024_01_23_040544_create_maisonn_etudiants_table', 3),
(4, '2014_10_12_100000_create_password_resets_table', 4),
(5, '2019_08_19_000000_create_failed_jobs_table', 4),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(7, '2024_01_23_042026_create_maisonn_articles_table', 4),
(8, '2024_01_23_040545_create_maisonn_etudiants_table', 5),
(9, '2024_01_23_042029_create_maisonn_articles_table', 6),
(10, '2024_01_25_040545_create_maisonn_etudiants_table', 7),
(11, '2024_01_26_040545_create_maisonn_etudiants_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `temp_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'user1@me.com', '$2y$10$YzJnQVEANoPiN1p3LyhYXex5ZszwH3GH5z9h.xvMkm5z2lrx1g2fO', NULL, NULL, '2024-01-25 03:51:54', '2024-01-25 04:34:33'),
(18, 'user2@me.com', '$2y$10$eQA6/LJ6JhDTepU86dwlC.HK3g1G.jZmRe0tsYFAYT/vfcdseIrwa', NULL, NULL, '2024-01-25 03:53:29', '2024-01-25 03:53:29'),
(23, 'del@me.com', '$2y$10$8Yjn6eEsCyEJOOOjQ99ObevR81zLjvJKtY.BFrvSXOu8x2Adhs60q', NULL, NULL, '2024-01-25 04:52:17', '2024-01-25 04:52:17'),
(24, 'test2@me.com', '$2y$10$zaiRPlMOMW3e5AFZW.14pOvXvgGweEVjFZFO7qIU14q8cNlr5k1km', NULL, NULL, '2024-01-25 05:32:55', '2024-01-25 05:32:55'),
(25, 'test452@me.com', '$2y$10$LECzp6FEV23A5StoR3L2e.w79UUdcyCpz6lJiAL7k4hnORDD1.Z6i', NULL, NULL, '2024-01-25 05:33:26', '2024-01-25 05:33:26'),
(26, 'test4652@me.com', '$2y$10$hNC6.vHN5K95aqJgi8FyQOtUUZETIDZn5toktf7OGu.Lj/tbGMYke', NULL, NULL, '2024-01-25 05:33:41', '2024-01-25 05:33:41');

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
-- Indexes for table `maisonn_articles`
--
ALTER TABLE `maisonn_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maisonn_articles_user_id_foreign` (`user_id`);

--
-- Indexes for table `maisonn_etudiants`
--
ALTER TABLE `maisonn_etudiants`
  ADD KEY `maisonn_etudiants_id_foreign` (`id`),
  ADD KEY `maisonn_etudiants_ville_id_foreign` (`ville_id`);

--
-- Indexes for table `maisonn_villes`
--
ALTER TABLE `maisonn_villes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maisonn_villes_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `maisonn_articles`
--
ALTER TABLE `maisonn_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `maisonn_villes`
--
ALTER TABLE `maisonn_villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `maisonn_articles`
--
ALTER TABLE `maisonn_articles`
  ADD CONSTRAINT `maisonn_articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `maisonn_etudiants`
--
ALTER TABLE `maisonn_etudiants`
  ADD CONSTRAINT `maisonn_etudiants_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maisonn_etudiants_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `maisonn_villes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;