-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 09:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailpesanan`
--

CREATE TABLE `detailpesanan` (
  `id` int(11) NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpesanan`
--

INSERT INTO `detailpesanan` (`id`, `pesanan_id`, `menu_id`, `subtotal`, `created_at`, `updated_at`, `jumlah`) VALUES
(2, 35, 2, 20000, '2024-04-26', '2024-04-26', 2),
(3, 36, 3, 10000, '2024-04-26', '2024-04-26', 2),
(4, 36, 2, 20000, '2024-04-26', '2024-04-26', 2),
(5, 37, 3, 10000, '2024-04-26', '2024-04-26', 2),
(6, 37, 2, 20000, '2024-04-26', '2024-04-26', 2),
(7, 38, 3, 10000, '2024-04-26', '2024-04-26', 2),
(8, 38, 2, 20000, '2024-04-26', '2024-04-26', 2),
(9, 39, 3, 10000, '2024-04-26', '2024-04-26', 2),
(10, 39, 2, 30000, '2024-04-26', '2024-04-26', 2),
(11, 40, 3, 10000, '2024-04-26', '2024-04-26', 2),
(12, 40, 2, 30000, '2024-04-26', '2024-04-26', 2),
(13, 41, 3, 10000, '2024-04-26', '2024-04-26', 2),
(14, 41, 2, 30000, '2024-04-26', '2024-04-26', 2),
(15, 42, 3, 15000, '2024-04-26', '2024-04-26', 3),
(16, 42, 2, 30000, '2024-04-26', '2024-04-26', 2),
(17, 43, 3, 15000, '2024-05-15', '2024-05-15', 3),
(18, 43, 2, 30000, '2024-05-15', '2024-05-15', 2),
(19, 44, 3, 15000, '2024-05-21', '2024-05-21', 3),
(20, 44, 2, 30000, '2024-05-21', '2024-05-21', 2),
(21, 45, 3, 15000, '2024-05-21', '2024-05-21', 3),
(22, 45, 2, 30000, '2024-05-21', '2024-05-21', 2),
(23, 46, 3, 15000, '2024-05-27', '2024-05-27', 3),
(24, 46, 2, 30000, '2024-05-27', '2024-05-27', 2),
(26, 48, 2, 45000, '2024-05-27', '2024-05-27', 3),
(27, 53, 2, 45000, '2024-05-27', '2024-05-27', 3),
(28, 54, 2, 45000, '2024-05-27', '2024-05-27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `image`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'makanan ringan', 'image.makanan', 'berbagai macam makanan ringan', '2024-04-04 06:56:44', '2024-04-05 06:56:44'),
(2, 'minuman dingin', 'minuman.jpg', 'segala jenis minuman dingin', '2024-04-22 05:49:21', '2024-04-23 05:49:21'),
(3, 'kopi', 'kopi.jpg', 'segala jenis kopi', '2024-04-22 05:49:21', '2024-04-23 05:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_meja` varchar(255) NOT NULL,
  `kapasitas` varchar(255) NOT NULL,
  `status` enum('kosong','terisi','dipesan') NOT NULL DEFAULT 'kosong',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `nomor_meja`, `kapasitas`, `status`, `created_at`, `updated_at`) VALUES
(1, '12', '4 orang', 'kosong', '2023-07-19 02:50:23', '2024-04-05 06:58:16'),
(2, '2', '2 orang', 'kosong', '2023-07-19 02:50:23', '2024-04-23 05:51:15'),
(3, '3', '5 orang', 'terisi', NULL, NULL),
(4, '4', '2 orang', 'terisi', NULL, NULL),
(5, '5', '5 orang', 'terisi', '2024-05-22 04:06:14', '2024-05-22 04:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` bigint(20) UNSIGNED DEFAULT NULL,
  `harga` decimal(8,2) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `deskripsi`, `kategori`, `harga`, `gambar`, `created_at`, `updated_at`, `stok`) VALUES
(1, 'donat', 'donat lumer coklat', 1, 20000.00, 'donat.lumer', '2024-04-11 06:58:16', '2024-04-05 06:58:16', 3),
(2, 'americano', 'kopi americano', 3, 15000.00, 'americano.jpg', '2024-04-22 05:51:15', '2024-04-23 05:51:15', 2),
(3, 'es kuwut', 'es kuwut segar', 2, 5000.00, 'kuwut.jpg', '2024-04-22 05:49:21', '2024-04-23 05:49:21', 3),
(4, 'mie ayam', 'mie ayam , pangsit ', 1, 15000.00, 'mie.jpg', '2024-05-25 07:08:37', '2024-05-25 07:08:37', 4);

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
(5, '2024_04_03_061431_menu', 1),
(15, '2024_04_03_060340_users', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengunjung` varchar(255) NOT NULL,
  `meja_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `tanggal_pemesanan` timestamp NULL DEFAULT NULL,
  `status` enum('pending','completed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama_pengunjung`, `meja_id`, `menu_id`, `jumlah`, `subtotal`, `tanggal_pemesanan`, `status`, `created_at`, `updated_at`, `keterangan`) VALUES
(1, 'alifia', 1, 2, '1', '15000', '2024-04-23 03:30:20', 'pending', '2023-07-19 02:50:23', '2024-04-05 06:58:16', 'manis'),
(2, 'yoga', 1, 1, '3', '15000', '2024-04-22 03:47:28', 'completed', '2024-04-22 05:51:15', '2024-04-23 05:49:21', 'banyakkk'),
(3, 'diann', 2, 2, '2', '15000', '2024-02-02 17:00:00', 'pending', '2024-04-22 21:05:10', '2024-04-22 21:05:10', 'es nya banyakin'),
(4, 'dwii', 1, 3, '2', '15000', '2024-02-03 17:00:00', 'completed', '2024-04-22 21:11:20', '2024-04-22 21:11:20', 'es nya banyakin'),
(5, 'rahma', 1, 1, '2', '40000', '2024-04-24 17:00:00', 'pending', '2024-04-22 21:50:34', '2024-04-22 21:50:34', 'Pesan tambahan'),
(6, 'rahma', 1, 2, '1', '15000', '2024-04-24 17:00:00', 'pending', '2024-04-22 21:50:34', '2024-04-22 21:50:34', 'Pesan tambahan'),
(7, 'ivan', 1, 3, '2', '10000', '2024-04-11 17:00:00', 'completed', '2024-04-22 21:53:22', '2024-04-22 21:53:22', 'Pesan tambahan'),
(8, 'ivan', 1, 2, '1', '15000', '2024-04-11 17:00:00', 'completed', '2024-04-22 21:53:22', '2024-04-22 21:53:22', 'Pesan tambahan'),
(9, 'dian', 1, NULL, NULL, NULL, '2024-02-11 17:00:00', 'pending', '2024-04-25 00:10:37', '2024-04-25 00:10:37', 'Pesan tambahan'),
(10, 'dian', 1, NULL, NULL, NULL, '2024-02-21 17:00:00', 'pending', '2024-04-25 00:20:35', '2024-04-25 00:20:35', 'Pesan tambahan'),
(11, 'dian', 1, 3, '1', '20000', '2024-02-21 17:00:00', 'pending', '2024-04-25 00:20:35', '2024-04-25 00:20:35', 'Pesan tambahan'),
(12, 'dian', 1, 2, '2', '10000', '2024-02-21 17:00:00', 'pending', '2024-04-25 00:20:35', '2024-04-25 00:20:35', 'Pesan tambahan'),
(13, 'dian', 1, NULL, NULL, NULL, '2024-02-20 17:00:00', 'pending', '2024-04-25 00:27:54', '2024-04-25 00:27:54', ''),
(14, 'dian', 1, NULL, NULL, NULL, '2024-03-20 17:00:00', 'pending', '2024-04-25 00:32:14', '2024-04-25 00:32:14', ''),
(15, 'dian afni', 1, NULL, NULL, NULL, '2024-03-21 17:00:00', 'pending', '2024-04-25 00:36:03', '2024-04-25 00:36:03', ''),
(16, 'dian afni', 1, NULL, NULL, NULL, '2024-03-28 17:00:00', 'pending', '2024-04-25 01:08:58', '2024-04-25 01:08:58', ''),
(17, 'dian afni', 1, NULL, NULL, NULL, '2024-12-28 17:00:00', 'pending', '2024-04-25 01:23:26', '2024-04-25 01:23:26', ''),
(18, 'dian afni', 1, NULL, NULL, NULL, '2024-11-28 17:00:00', 'pending', '2024-04-25 01:31:06', '2024-04-25 01:31:06', ''),
(19, 'dian afni', 1, NULL, NULL, '20000', '2024-11-11 17:00:00', 'pending', '2024-04-25 01:37:01', '2024-04-25 01:37:01', 'Pesan tambahan'),
(20, 'dian afni', 1, NULL, NULL, NULL, '2024-10-11 17:00:00', 'pending', '2024-04-25 01:38:53', '2024-04-25 01:38:53', 'Pesan tambahan'),
(21, 'dian afni', 1, NULL, NULL, NULL, '2024-10-09 17:00:00', 'pending', '2024-04-25 02:11:18', '2024-04-25 02:11:18', 'Pesan tambahan'),
(22, 'dian afni', 1, 3, '1', '20000', '2024-10-09 17:00:00', 'pending', '2024-04-25 02:11:18', '2024-04-25 02:11:18', 'Pesan tambahan'),
(23, 'dian afni', 1, 2, '2', '20000', '2024-10-09 17:00:00', 'pending', '2024-04-25 02:11:18', '2024-04-25 02:11:18', 'Pesan tambahan'),
(24, 'dian afni', 1, NULL, NULL, NULL, '2024-10-09 17:00:00', 'pending', '2024-04-25 02:34:27', '2024-04-25 02:34:27', ''),
(26, 'dian afni', 1, NULL, NULL, NULL, '2024-10-09 17:00:00', 'pending', '2024-04-25 02:38:56', '2024-04-25 02:38:56', ''),
(27, 'dian afni', 1, NULL, '2', '20000', '2024-11-09 17:00:00', 'pending', '2024-04-25 20:10:02', '2024-04-25 20:10:02', 'Pesan tambahan'),
(28, 'dian afni', 1, 3, '2', '20000', '2024-11-09 17:00:00', 'pending', '2024-04-25 20:10:02', '2024-04-25 20:10:02', 'Pesan tambahan'),
(29, 'dian afni', 1, 2, '2', '20000', '2024-11-09 17:00:00', 'pending', '2024-04-25 20:10:02', '2024-04-25 20:10:02', 'Pesan tambahan'),
(30, 'dian afni', 1, NULL, '2', '20000', '2024-01-09 17:00:00', 'pending', '2024-04-25 20:49:03', '2024-04-25 20:49:03', 'Pesan tambahan'),
(31, 'dian afni', 1, 3, '2', '20000', '2024-01-09 17:00:00', 'pending', '2024-04-25 20:49:03', '2024-04-25 20:49:03', 'Pesan tambahan'),
(32, 'dian afni', 1, 2, '2', '20000', '2024-01-09 17:00:00', 'pending', '2024-04-25 20:49:03', '2024-04-25 20:49:03', 'Pesan tambahan'),
(33, 'dian afni', 1, NULL, NULL, NULL, '2024-01-09 17:00:00', 'pending', '2024-04-25 21:28:57', '2024-04-25 21:28:57', 'Pesan tambahan'),
(35, 'dian afni', 1, NULL, NULL, NULL, '2024-01-09 17:00:00', 'pending', '2024-04-25 21:35:03', '2024-04-25 21:35:03', 'Pesan tambahan'),
(36, 'dian afni', 1, NULL, NULL, NULL, '2024-01-09 17:00:00', 'pending', '2024-04-25 21:37:00', '2024-04-25 21:37:00', 'Pesan tambahan'),
(37, 'dian afni', 1, NULL, NULL, NULL, '2024-01-09 17:00:00', 'pending', '2024-04-25 21:38:04', '2024-04-25 21:38:04', 'Pesan tambahan'),
(38, 'alifia', 1, NULL, NULL, NULL, '2024-01-09 17:00:00', 'pending', '2024-04-25 21:43:03', '2024-04-25 21:43:03', 'Pesan tambahan'),
(39, 'alifia', 1, NULL, NULL, NULL, '2024-01-09 17:00:00', 'completed', '2024-04-25 21:47:55', '2024-04-25 21:47:55', 'Pesan tambahan'),
(40, 'alifia', 1, NULL, NULL, NULL, '2024-01-09 17:00:00', 'pending', '2024-04-25 21:48:24', '2024-04-25 21:48:24', 'Pesan tambahan'),
(41, 'alifia', 1, NULL, NULL, NULL, '2024-01-09 17:00:00', 'pending', '2024-04-25 21:49:31', '2024-04-25 21:49:31', 'Pesan tambahan'),
(42, 'sifani', 1, NULL, NULL, NULL, '2024-01-09 17:00:00', 'pending', '2024-04-25 23:47:16', '2024-04-25 23:47:16', 'Pesan tambahan'),
(43, 'sifani', 1, NULL, NULL, NULL, '2024-01-09 17:00:00', 'pending', '2024-05-15 01:58:38', '2024-05-15 01:58:38', 'Pesan tambahan'),
(44, 'pengunjung 1', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-21 02:17:33', '2024-05-21 02:17:33', 'Pesan tambahan'),
(45, 'pengunjung 2', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-21 02:19:03', '2024-05-21 02:19:03', 'Pesan tambahan'),
(46, 'pengunjung 2', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-26 22:12:41', '2024-05-26 22:12:41', 'Pesan tambahan'),
(47, 'pengunjung 2', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-26 23:11:58', '2024-05-26 23:11:58', 'Pesan tambahan'),
(48, 'pengunjung 2', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-26 23:12:37', '2024-05-26 23:12:37', 'Pesan tambahan'),
(49, 'pengunjung 3', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-26 23:17:03', '2024-05-26 23:17:03', 'Pesan tambahan'),
(50, 'pengunjung 3', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-26 23:21:59', '2024-05-26 23:21:59', 'Pesan tambahan'),
(51, 'pengunjung 3', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-26 23:27:08', '2024-05-26 23:27:08', 'Pesan tambahan'),
(52, 'pengunjung 3', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-26 23:31:25', '2024-05-26 23:31:25', 'Pesan tambahan'),
(53, 'pengunjung 3', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-26 23:33:31', '2024-05-26 23:33:31', 'Pesan tambahan'),
(54, 'pengunjung 3', 1, NULL, NULL, NULL, NULL, 'pending', '2024-05-26 23:34:56', '2024-05-26 23:34:56', 'Pesan tambahan');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `menu_id`, `pesanan_id`, `comment`, `rating`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'es yang terlalu dikit', 3, '2024-04-26 00:10:56', '2024-04-26 00:10:56'),
(2, 1, 2, 'Donat nya kurang 1', 2, '2024-04-26 00:18:29', '2024-04-26 00:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan` (`pesanan_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id_kategori_foreign` (`kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_meja_id_foreign` (`meja_id`),
  ADD KEY `pemesanan_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_token_unique` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD CONSTRAINT `detailpesanan_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pemesanan` (`id`),
  ADD CONSTRAINT `detailpesanan_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `pemesanan` (`menu_id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_id_kategori_foreign` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_meja_id_foreign` FOREIGN KEY (`meja_id`) REFERENCES `meja` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pemesanan_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`pesanan_id`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
