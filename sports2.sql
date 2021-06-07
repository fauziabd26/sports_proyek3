-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2021 pada 16.00
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `article_category_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `isactive` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_category`
--

CREATE TABLE `article_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `article_category`
--

INSERT INTO `article_category` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Berita Futsal', '', 1, '2017-02-08 06:52:35', '2017-02-08 06:52:35'),
(2, 'Umum', '', 1, '2017-02-08 06:57:33', '2017-02-08 06:57:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `notrans` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pitch_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_detail`
--

CREATE TABLE `booking_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_number` smallint(6) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `coupon_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cash`
--

CREATE TABLE `cash` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cash`
--

INSERT INTO `cash` (`id`, `date`, `description`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2017-01-31', 'pemabayaran listrik', '500000.00', 1, '2017-02-02 05:01:27', '2017-02-02 05:01:27'),
(2, '2017-01-31', 'pembayran air', '500000.00', 1, '2017-02-02 05:02:00', '2017-02-02 05:02:00'),
(3, '2017-01-31', 'perbaikan lapangan', '450000.00', 1, '2017-02-02 05:02:27', '2017-02-02 05:02:27'),
(4, '2017-01-31', 'penggajian karyawan', '4000000.00', 1, '2017-02-02 05:02:59', '2017-02-02 05:02:59'),
(5, '2017-02-02', 'pemabayaran listrik', '500000.00', 1, '2017-02-02 05:05:05', '2017-02-02 05:05:05'),
(6, '2017-02-02', 'pemabayaran air', '200000.00', 1, '2017-02-02 05:05:26', '2017-02-02 05:13:23'),
(7, '2017-02-12', 'asem', '400000.00', 1, '2017-02-12 06:58:19', '2017-02-12 06:58:19'),
(8, '2017-02-12', 'rokok', '-195000.00', 1, '2017-02-12 07:06:37', '2017-02-12 07:06:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupon`
--

CREATE TABLE `coupon` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `booking_detail_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_table_user', 1),
(2, '2014_10_12_100000_create_table_password_reset', 1),
(3, '2017_01_05_153001_entrust_setup_tables', 1),
(4, '2017_01_06_160610_create_table_article_category', 1),
(5, '2017_01_06_160913_create_table_article', 1),
(6, '2017_01_06_161126_create_table_setting', 1),
(7, '2017_01_09_134209_create_table_pitch', 1),
(8, '2017_01_09_134747_create_table_pitch_price', 1),
(9, '2017_01_11_234505_create_table_cash', 1),
(10, '2017_01_15_052351_create_table_booking', 1),
(11, '2017_01_15_052852_create_table_booking_detail', 1),
(12, '2017_01_15_052860_create_table_coupon', 1),
(13, '2017_01_23_074120_create_table_payment', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `nama_mitra` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_mitra` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `id_user`, `nama_mitra`, `deskripsi`, `alamat`, `kota`, `phone`, `foto_mitra`, `created_at`, `updated_at`) VALUES
(11, 1, 'Velit dolorum unde o', 'Consequatur quia si', 'Anim ut aut dolor re', 'Dolore in consequatu', '123', '1622265665_6.jpg', '2021-05-28 22:21:05', '2021-05-28 22:21:05'),
(12, 15, 'asdads', ' asdads', ' adsasd', 'asdasd', '123132', '1622435133_1.jpg', '2021-05-30 21:25:33', '2021-05-30 21:25:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset`
--

CREATE TABLE `password_reset` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('cash','transfer','coupon') COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `account_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `coupon_id` int(11) DEFAULT NULL,
  `confirmer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `permission`
--

INSERT INTO `permission` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user-create', 'Tambah User', NULL, '2017-02-02 04:51:16', '2017-02-02 04:51:16'),
(2, 'user-edit', 'Edit User', NULL, '2017-02-02 04:51:16', '2017-02-02 04:51:16'),
(3, 'user-delete', 'Hapus User', NULL, '2017-02-02 04:51:16', '2017-02-02 04:51:16'),
(4, 'category-create', 'Tambah Kategori Artikel', NULL, '2017-02-02 04:51:16', '2017-02-02 04:51:16'),
(5, 'category-edit', 'Edit Kategori Artikel', NULL, '2017-02-02 04:51:16', '2017-02-02 04:51:16'),
(6, 'category-delete', 'Hapus Kategori Artikel', NULL, '2017-02-02 04:51:16', '2017-02-02 04:51:16'),
(7, 'article-create', 'Tambah Artikel', NULL, '2017-02-02 04:51:16', '2017-02-02 04:51:16'),
(8, 'article-edit', 'Edit Artikel', NULL, '2017-02-02 04:51:17', '2017-02-02 04:51:17'),
(9, 'article-delete', 'Hapus Artikel', NULL, '2017-02-02 04:51:17', '2017-02-02 04:51:17'),
(10, 'setting-edit', 'Edit Setting', NULL, '2017-02-02 04:51:17', '2017-02-02 04:51:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pitch`
--

CREATE TABLE `pitch` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_sports` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `isactive` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pitch`
--

INSERT INTO `pitch` (`id`, `name`, `id_sports`, `description`, `image`, `isactive`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 'Brandon Walker', 1, 'Id sequi omnis ad s', '1622453730_2.jpg', '1', 15, '2021-05-31 02:35:30', '2021-05-31 02:35:30'),
(8, 'Elijah Valencia', 1, 'Voluptate nulla assu', '1622454274_6.jpg', '1', 15, '2021-05-31 02:44:34', '2021-05-31 02:44:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pitch_price`
--

CREATE TABLE `pitch_price` (
  `pitch_id` int(10) UNSIGNED NOT NULL,
  `time_number` smallint(6) NOT NULL,
  `price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pitch_price`
--

INSERT INTO `pitch_price` (`pitch_id`, `time_number`, `price`) VALUES
(7, 0, '369.00'),
(7, 1, '627.00'),
(7, 2, '186.00'),
(7, 3, '281.00'),
(7, 4, '341.00'),
(7, 5, '951.00'),
(7, 6, '680.00'),
(7, 7, '246.00'),
(7, 8, '806.00'),
(7, 9, '652.00'),
(7, 10, '575.00'),
(7, 11, '804.00'),
(7, 12, '245.00'),
(7, 13, '579.00'),
(7, 14, '723.00'),
(7, 15, '848.00'),
(7, 16, '818.00'),
(7, 17, '839.00'),
(7, 18, '692.00'),
(7, 19, '104.00'),
(7, 20, '116.00'),
(7, 21, '758.00'),
(7, 22, '708.00'),
(7, 23, '518.00'),
(8, 0, '878.00'),
(8, 1, '745.00'),
(8, 2, '280.00'),
(8, 3, '391.00'),
(8, 4, '919.00'),
(8, 5, '713.00'),
(8, 6, '948.00'),
(8, 7, '316.00'),
(8, 8, '872.00'),
(8, 9, '675.00'),
(8, 10, '436.00'),
(8, 11, '106.00'),
(8, 12, '652.00'),
(8, 13, '39.00'),
(8, 14, '174.00'),
(8, 15, '639.00'),
(8, 16, '910.00'),
(8, 17, '615.00'),
(8, 18, '557.00'),
(8, 19, '405.00'),
(8, 20, '896.00'),
(8, 21, '236.00'),
(8, 22, '859.00'),
(8, 23, '208.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, '2017-02-02 04:51:15', '2017-02-02 04:51:15'),
(2, 'calonadmin', 'calonadmin', NULL, '2017-02-02 04:51:16', '2017-02-02 04:51:16'),
(3, 'member', 'Member', NULL, '2017-02-02 04:51:16', '2017-02-02 04:51:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(7, 3),
(8, 3),
(9, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`code`, `value`) VALUES
('COMP_ADDRESS', 'Jln. sugiono'),
('COMP_CITY', 'sidoarjo'),
('COMP_EMAIL', 'alenafutsal@gmail.com           '),
('COMP_HP', '081-254-256-789'),
('COMP_IMG', '20170212134752_1.jpg'),
('COMP_NAME', 'Alena Futsal'),
('COMP_PHONE', '021-654321'),
('COMP_STATE', 'Jawa Timur'),
('COMP_ZIPCODE', '61353'),
('FTS_HOUR_BONUS', '10'),
('FTS_MINDP', '50'),
('PAGE_ABOUT', '<p>kami penyedia lapangan futsal yang terpercya yang berdiri sejak 2011</p>\r\n'),
('SOC_FACEBOOK', 'https://facebook.com'),
('SOC_INSTAGRAM', 'https://instagram.com'),
('SOC_TWITTER', 'https://twitter.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sports`
--

CREATE TABLE `sports` (
  `id_sports` int(10) UNSIGNED NOT NULL,
  `name_sports` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_sports` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sports`
--

INSERT INTO `sports` (`id_sports`, `name_sports`, `image_sports`, `created_at`, `updated_at`) VALUES
(1, 'Footbal', '1622217146_2.jpg', '2021-05-28 15:52:26', '2021-05-28 08:52:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isactive` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `isdefault` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','calonadmin','member','superadmin') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `phone`, `email`, `password`, `isactive`, `isdefault`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 'superadmin', '085732304321', 'superadmin@gmail.com', '$2y$10$MVyEGAAQQvI8vQo3o5Hx3O5xa9D3SSKee30Ar0TRMK/YEf6IDUfcm', '1', '1', 'superadmin', 'qKokbA0dZURNCgbqzOmlVHlG89nXgSTsvALu2sYPrTFwXaDO1YGbZNWG1OA1', '2017-02-02 04:51:17', '2021-05-31 02:28:03'),
(7, 'rapli', 'rapli', '0812345678', 'raple@gmail.com', '$2y$10$2jwBoqKOpFvX.mBQxmwhquvmAeJTCdB01v5r2bjKzWm0JlHts4eG2', '1', '0', 'member', NULL, '2021-05-27 23:56:27', '2021-05-27 23:56:27'),
(8, 'diki', 'diki', '', 'd@gmail.com', '$2y$10$98XTnpMG3y6NcTLOn9lo7.2CVk8LRuTwQXWCMZ0A.GhYq8hLx/pA2', '1', '0', 'member', 'PohTpBYSM7ow81GfanzD8JAkXa1FODn2pc0BjrDpjrWAydpguqmXamKZ5Vtb', '2021-05-28 02:50:03', '2021-05-28 12:56:11'),
(9, 'alfa', 'alfa', '12345678', 'abc@gmail.com', '$2y$10$sY4xXPj6d9iqcLd2FYYCWuYNFnYSw5PDqhuvUkk6qelc7eHc8Orcy', '1', '0', 'admin', '8suLtb9vX3rDdv4kHH0KuAB5gmwasXyY2E4EOtZNU5LUjSX4Iaahof3Gj4qT', '2021-05-28 22:25:32', '2021-05-31 03:24:45'),
(15, 'Faiz Ahmad Wicaksono', 'faiz', '12345', 'faiz@gmail.com', '$2y$10$5INfR0MzCVAQm0KoyoCfBOpRUFrm.R0QL9o/YQnLeIB.ij7XMO1Yu', '1', '0', 'admin', 'WXbMGSFmnq7pG4hDzvfweKOUcNaDdrxcD0sPrRfEDAw7A0TsHSYDZpa7OcAF', '2021-05-30 21:17:25', '2021-05-31 04:19:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_pitch_id_foreign` (`pitch_id`);

--
-- Indeks untuk tabel `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_detail_booking_id_foreign` (`booking_id`);

--
-- Indeks untuk tabel `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_booking_detail_id_foreign` (`booking_detail_id`),
  ADD KEY `coupon_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`),
  ADD KEY `mitra_id_user_foreign` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `password_reset`
--
ALTER TABLE `password_reset`
  ADD KEY `password_reset_email_index` (`email`),
  ADD KEY `password_reset_token_index` (`token`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_booking_id_foreign` (`booking_id`);

--
-- Indeks untuk tabel `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_name_unique` (`name`);

--
-- Indeks untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `pitch`
--
ALTER TABLE `pitch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_sports` (`id_sports`);

--
-- Indeks untuk tabel `pitch_price`
--
ALTER TABLE `pitch_price`
  ADD PRIMARY KEY (`pitch_id`,`time_number`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name_unique` (`name`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD UNIQUE KEY `setting_code_unique` (`code`);

--
-- Indeks untuk tabel `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id_sports`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username_unique` (`username`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pitch`
--
ALTER TABLE `pitch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sports`
--
ALTER TABLE `sports`
  MODIFY `id_sports` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_pitch_id_foreign` FOREIGN KEY (`pitch_id`) REFERENCES `pitch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD CONSTRAINT `booking_detail_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_booking_detail_id_foreign` FOREIGN KEY (`booking_detail_id`) REFERENCES `booking_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coupon_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `mitra_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pitch`
--
ALTER TABLE `pitch`
  ADD CONSTRAINT `pitch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pitch_ibfk_2` FOREIGN KEY (`id_sports`) REFERENCES `sports` (`id_sports`);

--
-- Ketidakleluasaan untuk tabel `pitch_price`
--
ALTER TABLE `pitch_price`
  ADD CONSTRAINT `pitch_price_pitch_id_foreign` FOREIGN KEY (`pitch_id`) REFERENCES `pitch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
