-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 01:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `athreya-tours`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Merupakan salah satu jasa tour & travel di Kabupaten Demak. Kantor ini menyediakan berbagai macam paket liburan, wisata dan trip. Paket sudah termasuk tiket pesawat/kapal, akomodasi, transfortasi, makan, penginapan dan tour guide / pemandu wisata. Tersedia juga penjualan tiket pesawat dan laut.', 'nonaktif', '2023-11-06 02:07:45', '2023-11-06 02:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_09_114352_create_paket_wisatas_table', 1),
(6, '2023_10_10_010350_change_column_type', 1),
(7, '2023_10_10_172345_add_photo_profile_to_users', 1),
(8, '2023_10_11_091942_add_phone_and_address_to_users', 1),
(9, '2023_10_11_123456_create_about_us_table', 1),
(10, '2023_10_11_124856_add_status_to_about_us', 1),
(11, '2023_10_11_174440_create_pesan_users_table', 1),
(12, '2023_10_15_083224_create_pesanans_table', 1),
(13, '2023_10_15_123450_change_total_harga_data_type_in_pesanan_table', 1),
(14, '2023_10_21_190305_ubah_tipe_data_paket_wisata', 1),
(15, '2023_10_24_020813_add_invoice_sent_to_pesanan', 1),
(16, '2023_11_06_093234_add_min_orang_field_to_paket_wisatas', 2),
(17, '2023_11_07_185741_add_popularitas_field_to_paket_wisatas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisatas`
--

CREATE TABLE `paket_wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `lokasi_wisata` varchar(255) NOT NULL,
  `durasi` int(11) NOT NULL,
  `foto_wisata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`foto_wisata`)),
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `popularitas` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `minimum_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket_wisatas`
--

INSERT INTO `paket_wisatas` (`id`, `nama_paket`, `deskripsi`, `harga`, `lokasi_wisata`, `durasi`, `foto_wisata`, `tanggal_mulai`, `tanggal_berakhir`, `popularitas`, `created_at`, `updated_at`, `minimum_peserta`) VALUES
(1, 'Goes To Bali', 'Nikmati Wisata ke Bali', 1000000.00, 'Bali, Indonesia', 4, '\"[\\\"169934560329.jpg\\\",\\\"169934560339.jpg\\\"]\"', '2023-11-16', '2023-11-20', 0, '2023-11-02 10:28:23', '2023-11-07 08:26:43', 30),
(3, 'Liburan ke Lombok', 'Liburan ke Lombok dengan tujuan pantai pink, pantai sengginggi.', 2000000.00, 'Lombok, Indonesia', 6, '\"[\\\"169923640999.jpg\\\",\\\"169923640966.jpg\\\",\\\"169923640974.jpg\\\"]\"', '2023-11-06', '2023-11-12', 1, '2023-11-06 02:06:49', '2023-11-07 12:02:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `paket_wisata_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status_pesanan` enum('pending','ditolak','diterima') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_sent` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `paket_wisata_id`, `jumlah_orang`, `total_harga`, `status_pesanan`, `created_at`, `updated_at`, `invoice_sent`) VALUES
(1, 2, 1, 5, 5000000.00, 'diterima', '2023-11-04 00:35:33', '2023-11-07 07:23:19', 1),
(2, 2, 3, 3, 6000000.00, 'pending', '2023-11-06 02:11:18', '2023-11-07 07:23:03', 1),
(3, 2, 3, 3, 6000000.00, 'pending', '2023-11-07 12:00:11', '2023-11-07 12:00:11', 0),
(4, 2, 3, 3, 6000000.00, 'pending', '2023-11-07 12:01:58', '2023-11-07 12:01:58', 0),
(5, 2, 3, 3, 6000000.00, 'pending', '2023-11-07 12:02:24', '2023-11-07 12:02:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesan_users`
--

CREATE TABLE `pesan_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan_users`
--

INSERT INTO `pesan_users` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Lugas', 'artalugas7@gmail.com', '0895808489955', 'Paket Wisata', 'Kapan Paket Wisata untuk perjalanan ke karimun jawa ada?', '2023-11-06 02:15:39', '2023-11-06 02:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_profile` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo_profile`, `phone`, `address`) VALUES
(1, 'Atherya Tours', 'artalugas6@gmail.com', 'admin', NULL, '$2y$10$GFGDfbYsiFKoOIeq3gaR5Oq4ohgzBUX.9DbLDvVQER8TTMAnZ7FB2', NULL, '2023-11-02 09:17:40', '2023-11-02 09:17:40', NULL, NULL, NULL),
(2, 'Lugas Rofanian Arta Margianto', 'artalugas7@gmail.com', 'user', NULL, '$2y$10$VhJhhQE0Vgp4naMjOo9ZK.LtmuFfQsXW04qCX/psWWrc.q7PYhcZS', NULL, '2023-11-02 09:21:14', '2023-11-02 09:21:14', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `paket_wisatas`
--
ALTER TABLE `paket_wisatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan_users`
--
ALTER TABLE `pesan_users`
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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paket_wisatas`
--
ALTER TABLE `paket_wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesan_users`
--
ALTER TABLE `pesan_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
