-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2025 at 07:06 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warteg`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1747564119),
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1747564119;', 1747564119),
('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1748610054),
('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1748610053;', 1748610053);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_03_075506_create_ms_menu_categories_table', 1),
(5, '2025_03_03_075536_create_ms_menus_table', 1),
(6, '2025_03_03_075537_create_ms_users_table', 1),
(7, '2025_03_03_075538_create_transaction_headers_table', 2),
(8, '2025_03_03_075548_create_transaction_details_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ms_menus`
--

CREATE TABLE `ms_menus` (
  `menuid` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuprice` int NOT NULL,
  `menuimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menucategoryid` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_menus`
--

INSERT INTO `ms_menus` (`menuid`, `menuname`, `menuprice`, `menuimage`, `menucategoryid`, `created_at`, `updated_at`) VALUES
('FD001', 'Nasi Putih', 4000, 'msmenus/01JVHDQEZ4KH4H7B64DYVZ68NN.jpeg', 'CAT001', '2025-05-18 03:06:13', '2025-05-18 03:06:13'),
('FD002', 'Nasi Uduk', 5000, 'msmenus/01JVHDRGXHN04J1P20MZ8AYA20.jpg', 'CAT001', '2025-05-18 03:06:48', '2025-05-18 03:06:48'),
('FD003', 'Nasi Goreng Spesial', 20000, 'msmenus/01JVHDS4GMMRFSGV0P70Y457C2.jpg', 'CAT001', '2025-05-18 03:07:08', '2025-05-18 03:07:08'),
('FD004', 'Nasi Kuning', 5000, 'msmenus/01JVHDSX7C580DW5SMAV9KY9XF.jpg', 'CAT001', '2025-05-18 03:07:33', '2025-05-18 03:07:33'),
('FD005', 'Ayam Bakar', 10000, 'msmenus/01JVHE9HEPV7Y11RQCGMKAQ3DK.jpeg', 'CAT002', '2025-05-18 03:16:05', '2025-05-18 03:16:05'),
('FD006', 'Cah Sawi Putih', 2000, 'msmenus/01JVHEJ3HP12HG8TR5ZRM5J9Q0.jpg', 'CAT003', '2025-05-18 03:20:46', '2025-05-18 03:20:46'),
('FD007', 'Capcay', 3000, 'msmenus/01JVHEJYN9SHETSSPVJF2W2B9G.jpeg', 'CAT003', '2025-05-18 03:21:14', '2025-05-18 03:21:14'),
('FD008', 'Es Teh Tawar', 2000, 'msmenus/01JVHEKTV3N4F0DBQDS96GAJMQ.jpg', 'CAT004', '2025-05-18 03:21:43', '2025-05-18 03:21:43'),
('FD009', 'Lele Goreng', 8000, 'msmenus/01JVHEMFF71NAJJA35WYSFS16V.jpeg', 'CAT002', '2025-05-18 03:22:04', '2025-05-18 03:22:04'),
('FD010', 'Otak-otak Balado', 2000, 'msmenus/01JVHEN642TRR84QM5NBWB3D5Z.jpg', 'CAT002', '2025-05-18 03:22:27', '2025-05-18 03:22:27'),
('FD011', 'Perkedel', 2000, 'msmenus/01JVHENVV9PGDFSZ6D7FPS1RAN.jpg', 'CAT002', '2025-05-18 03:22:49', '2025-05-18 03:22:49'),
('FD012', 'Telur Balado', 3000, 'msmenus/01JVHEQ0BBYBMPJPQWRJF5EKVK.jpg', 'CAT002', '2025-05-18 03:23:27', '2025-05-18 03:23:27'),
('FD013', 'Telur Dadar', 3000, 'msmenus/01JVHEQZ52X8A886Y0RGRSZZPV.jpg', 'CAT002', '2025-05-18 03:23:58', '2025-05-18 03:23:58'),
('FD014', 'Tempe Orek Basah', 3000, 'msmenus/01JVHERNVKNQRVGHZACANGEPC3.webp', 'CAT002', '2025-05-18 03:24:21', '2025-05-18 03:24:21'),
('FD015', 'Tempe Orek Kering', 2000, 'msmenus/01JVHESXW401J1VK0R4KDKFZ68.jpg', 'CAT002', '2025-05-18 03:25:02', '2025-05-18 03:25:02'),
('FD016', 'Tumis Caisim Jamur', 3000, 'msmenus/01JVHETZCV0QR9RRNCX7F6FNPD.jpg', 'CAT003', '2025-05-18 03:25:37', '2025-05-18 03:25:37'),
('FD017', 'Tumis Daun Singkong', 2000, 'msmenus/01JVHEW5XVZRBQ1ADW84322ARG.jpeg', 'CAT003', '2025-05-18 03:26:16', '2025-05-18 03:26:16'),
('FD018', 'Tumis Kangkung', 3000, 'msmenus/01JVHEXQ6DJ8MTTGDMHR5X4JFR.avif', 'CAT003', '2025-05-18 03:27:07', '2025-05-18 03:27:07'),
('FD019', 'Tumis Toge', 2000, 'msmenus/01JVHEYBMJZ0HHM26XWGKZR0N4.jpg', 'CAT003', '2025-05-18 03:27:28', '2025-05-18 03:27:28'),
('FD020', 'Usus Ayam', 3000, 'msmenus/01JVHEZTJHRJARCXRWGWYNN31X.jpg', 'CAT002', '2025-05-18 03:28:16', '2025-05-18 03:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `ms_menu_categories`
--

CREATE TABLE `ms_menu_categories` (
  `menucategoryid` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menucategoryname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_menu_categories`
--

INSERT INTO `ms_menu_categories` (`menucategoryid`, `menucategoryname`, `created_at`, `updated_at`) VALUES
('CAT001', 'Nasi', '2025-05-18 03:03:44', '2025-05-18 03:03:44'),
('CAT002', 'Lauk', '2025-05-18 03:04:27', '2025-05-18 03:04:27'),
('CAT003', 'Sayur', '2025-05-18 03:04:32', '2025-05-18 03:04:32'),
('CAT004', 'Minum', '2025-05-18 03:04:37', '2025-05-18 03:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `ms_users`
--

CREATE TABLE `ms_users` (
  `userid` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userphonenumber` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `useremail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_users`
--

INSERT INTO `ms_users` (`userid`, `username`, `userphonenumber`, `useremail`, `created_at`, `updated_at`) VALUES
('US001', 'Adit', '081380712235', 'adit@gmail.com', '2025-05-18 03:59:04', '2025-05-18 03:59:04'),
('US002', 'Jarwo', '08928376201', 'jarwo@gmail.com', '2025-05-18 04:44:53', '2025-05-18 04:44:53'),
('US003', 'Samuel', '083456789012', 'samuel@gmail.com', '2025-05-18 04:46:25', '2025-05-18 04:46:25'),
('US004', 'Yoseffino', '08987421345', 'fino@gmail.com', '2025-05-18 22:47:28', '2025-05-18 22:47:28'),
('US005', 'Pak Eko', '08087654456', 'pakeko@gmail.com', '2025-05-19 00:19:32', '2025-05-19 00:19:32'),
('US006', 'Juan', '081380712235', 'juanpringadi@gmail.com', '2025-05-28 01:50:19', '2025-05-28 01:50:19'),
('US007', 'Eko Purwanto', '08123456789', 'eko@gmail.com', '2025-05-30 07:59:13', '2025-05-30 07:59:13'),
('US008', 'Budi', '081234567890', 'budi@gmail.com', '2025-06-04 02:36:38', '2025-06-04 02:36:38'),
('US009', 'Budi', '081234567890', 'budi@gmail.com', '2025-06-04 02:37:46', '2025-06-04 02:37:46'),
('US010', 'Budi', '081234567890', 'budi@gmail.com', '2025-06-04 02:46:57', '2025-06-04 02:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ciIknldVXvhbhbausTm5USH5SOfjvt5ZpTgYNG3u', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGRocXpxam02QTlIclE3a1ZmdHp1V0NYV005alcxRlJZdkJaRVk3MyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fX0=', 1748617463);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint UNSIGNED NOT NULL,
  `transactionid` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuid` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transactionid`, `menuid`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'TRX001', 'FD001', 1, '2025-05-18 03:59:04', '2025-05-18 03:59:04'),
(2, 'TRX001', 'FD005', 1, '2025-05-18 03:59:04', '2025-05-18 03:59:04'),
(3, 'TRX002', 'FD001', 1, '2025-05-18 04:44:53', '2025-05-18 04:44:53'),
(4, 'TRX002', 'FD003', 1, '2025-05-18 04:44:53', '2025-05-18 04:44:53'),
(5, 'TRX002', 'FD004', 1, '2025-05-18 04:44:53', '2025-05-18 04:44:53'),
(6, 'TRX003', 'FD005', 1, '2025-05-18 04:46:25', '2025-05-18 04:46:25'),
(7, 'TRX003', 'FD009', 1, '2025-05-18 04:46:25', '2025-05-18 04:46:25'),
(8, 'TRX003', 'FD010', 1, '2025-05-18 04:46:25', '2025-05-18 04:46:25'),
(9, 'TRX003', 'FD001', 1, '2025-05-18 04:46:25', '2025-05-18 04:46:25'),
(10, 'TRX004', 'FD005', 2, '2025-05-18 22:47:28', '2025-05-18 22:47:28'),
(11, 'TRX004', 'FD014', 1, '2025-05-18 22:47:28', '2025-05-18 22:47:28'),
(12, 'TRX004', 'FD008', 1, '2025-05-18 22:47:28', '2025-05-18 22:47:28'),
(13, 'TRX005', 'FD002', 2, '2025-05-19 00:19:33', '2025-05-19 00:19:33'),
(14, 'TRX005', 'FD005', 2, '2025-05-19 00:19:33', '2025-05-19 00:19:33'),
(15, 'TRX005', 'FD008', 2, '2025-05-19 00:19:33', '2025-05-19 00:19:33'),
(16, 'TRX005', 'FD018', 2, '2025-05-19 00:19:33', '2025-05-19 00:19:33'),
(17, 'TRX006', 'FD003', 1, '2025-05-28 01:50:20', '2025-05-28 01:50:20'),
(18, 'TRX006', 'FD005', 1, '2025-05-28 01:50:20', '2025-05-28 01:50:20'),
(19, 'TRX007', 'FD001', 1, '2025-05-30 07:59:14', '2025-05-30 07:59:14'),
(20, 'TRX007', 'FD005', 1, '2025-05-30 07:59:14', '2025-05-30 07:59:14'),
(21, 'TRX008', 'FD020', 2, '2025-06-04 02:36:39', '2025-06-04 02:36:39'),
(22, 'TRX009', 'FD020', 2, '2025-06-04 02:37:47', '2025-06-04 02:37:47'),
(23, 'TRX010', 'FD020', 2, '2025-06-04 02:46:58', '2025-06-04 02:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_headers`
--

CREATE TABLE `transaction_headers` (
  `transactionid` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactiondate` date NOT NULL,
  `paymentstatus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_headers`
--

INSERT INTO `transaction_headers` (`transactionid`, `transactiondate`, `paymentstatus`, `userid`, `created_at`, `updated_at`) VALUES
('TRX001', '2025-05-18', 'SUCCESS', 'US001', '2025-05-18 03:59:04', '2025-05-18 03:59:04'),
('TRX002', '2025-05-18', 'SUCCESS', 'US002', '2025-05-18 04:44:53', '2025-05-18 04:44:53'),
('TRX003', '2025-05-18', 'SUCCESS', 'US003', '2025-05-18 04:46:25', '2025-05-18 04:46:25'),
('TRX004', '2025-05-19', 'SUCCESS', 'US004', '2025-05-18 22:47:28', '2025-05-18 22:47:28'),
('TRX005', '2025-05-19', 'SUCCESS', 'US005', '2025-05-19 00:19:33', '2025-05-19 00:19:33'),
('TRX006', '2025-05-28', 'SUCCESS', 'US006', '2025-05-28 01:50:19', '2025-05-28 01:50:19'),
('TRX007', '2025-05-30', 'SUCCESS', 'US007', '2025-05-30 07:59:13', '2025-05-30 07:59:13'),
('TRX008', '2025-06-04', 'SUCCESS', 'US008', '2025-06-04 02:36:39', '2025-06-04 02:36:39'),
('TRX009', '2025-06-04', 'SUCCESS', 'US009', '2025-06-04 02:37:47', '2025-06-04 02:37:47'),
('TRX010', '2025-06-04', 'SUCCESS', 'US010', '2025-06-04 02:46:58', '2025-06-04 02:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$zR.HhUXKQaycJmWijydnletP4TC9psyRxDnj0DCFjSAyJRLkSl5rC', 'pK0Jzf1BOc8rn7fcI9GpKUI7U5MqWP5hgNyt7BRlFqDSZec2p7JgVUCZ4YaJ', '2025-05-18 03:01:17', '2025-05-18 03:01:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_menus`
--
ALTER TABLE `ms_menus`
  ADD PRIMARY KEY (`menuid`),
  ADD KEY `ms_menus_menucategoryid_foreign` (`menucategoryid`);

--
-- Indexes for table `ms_menu_categories`
--
ALTER TABLE `ms_menu_categories`
  ADD PRIMARY KEY (`menucategoryid`);

--
-- Indexes for table `ms_users`
--
ALTER TABLE `ms_users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transactionid_foreign` (`transactionid`),
  ADD KEY `transaction_details_menuid_foreign` (`menuid`);

--
-- Indexes for table `transaction_headers`
--
ALTER TABLE `transaction_headers`
  ADD PRIMARY KEY (`transactionid`),
  ADD KEY `transaction_headers_userid_foreign` (`userid`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ms_menus`
--
ALTER TABLE `ms_menus`
  ADD CONSTRAINT `ms_menus_menucategoryid_foreign` FOREIGN KEY (`menucategoryid`) REFERENCES `ms_menu_categories` (`menucategoryid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_menuid_foreign` FOREIGN KEY (`menuid`) REFERENCES `ms_menus` (`menuid`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_details_transactionid_foreign` FOREIGN KEY (`transactionid`) REFERENCES `transaction_headers` (`transactionid`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_headers`
--
ALTER TABLE `transaction_headers`
  ADD CONSTRAINT `transaction_headers_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `ms_users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
