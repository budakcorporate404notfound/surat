-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 10:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_rokap`
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
-- Table structure for table `mailbox`
--

CREATE TABLE `mailbox` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(10) UNSIGNED DEFAULT 0,
  `id_parent_mailbox` bigint(20) UNSIGNED DEFAULT NULL,
  `id_status_mailbox` tinyint(3) UNSIGNED DEFAULT 0 COMMENT 'Status disposisi',
  `id_surat_masuk` bigint(20) UNSIGNED DEFAULT 0 COMMENT 'Surat Masuk',
  `id_konsep_surat` bigint(10) UNSIGNED DEFAULT NULL,
  `id_surat_keluar` bigint(20) UNSIGNED DEFAULT NULL,
  `ceklist_arahan_surat` varchar(20) NOT NULL DEFAULT '',
  `ceklist_disposisi_surat` varchar(20) NOT NULL DEFAULT '' COMMENT 'Ceklist disposisi surat',
  `disposisi_surat` text DEFAULT NULL COMMENT 'Catatan surat',
  `waktu_konsep` timestamp NULL DEFAULT NULL,
  `waktu_terima` timestamp NULL DEFAULT NULL,
  `waktu_baca` timestamp NULL DEFAULT NULL,
  `waktu_proses` timestamp NULL DEFAULT NULL,
  `waktu_kirim` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mailbox`
--

INSERT INTO `mailbox` (`id`, `id_user`, `id_parent_mailbox`, `id_status_mailbox`, `id_surat_masuk`, `id_konsep_surat`, `id_surat_keluar`, `ceklist_arahan_surat`, `ceklist_disposisi_surat`, `disposisi_surat`, `waktu_konsep`, `waktu_terima`, `waktu_baca`, `waktu_proses`, `waktu_kirim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 37, NULL, 2, 1, NULL, NULL, '11', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-14 03:33:16', NULL, '2021-06-14 03:33:27', NULL, '2021-06-14 03:33:31', '2021-06-14 03:33:16', '2021-06-13 22:33:31', NULL),
(2, 11, 1, 2, 1, NULL, NULL, '11', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-14 03:33:31', '2021-06-14 03:34:17', '2021-06-14 03:34:25', '2021-06-14 03:35:04', '2021-06-14 03:33:31', '2021-06-13 22:35:04', NULL),
(3, 4, 2, 2, 1, NULL, NULL, '11', '1', '1', NULL, '2021-06-14 03:34:25', '2021-06-14 03:35:16', '2021-06-14 03:35:25', '2021-06-14 03:35:29', '2021-06-14 03:34:25', '2021-06-13 22:35:29', NULL),
(4, 11, 2, 3, 1, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-14 03:35:04', '2021-06-15 06:52:45', NULL, NULL, '2021-06-14 03:35:04', '2021-06-15 01:52:45', NULL),
(5, 8, 3, 2, 1, NULL, NULL, '11', '1', '1', NULL, '2021-06-14 03:35:25', '2021-06-14 03:38:32', NULL, '2021-06-14 03:38:23', '2021-06-14 03:35:25', '2021-06-13 22:38:32', NULL),
(6, 11, 3, 3, 1, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-14 03:35:29', '2021-06-15 06:52:41', NULL, NULL, '2021-06-14 03:35:29', '2021-06-15 01:52:41', NULL),
(7, 11, 5, 3, 1, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-14 03:37:48', '2021-06-15 06:52:38', NULL, NULL, '2021-06-14 03:37:48', '2021-06-15 01:52:38', NULL),
(8, 11, 5, 3, 1, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-14 03:38:23', '2021-06-15 06:52:34', NULL, NULL, '2021-06-14 03:38:23', '2021-06-15 01:52:34', NULL),
(9, 15, 0, 2, 1, 1, NULL, '11', '1', '1', '2021-06-14 04:36:03', '2021-06-14 03:41:02', '2021-06-14 06:25:12', NULL, '2021-06-14 05:22:52', '2021-06-14 03:41:02', '2021-06-14 01:25:12', NULL),
(10, 11, 9, 3, 1, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-14 04:36:24', '2021-06-15 06:52:31', NULL, NULL, '2021-06-14 04:36:24', '2021-06-15 01:52:31', NULL),
(11, 11, 9, 3, 1, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-14 04:48:05', '2021-06-15 06:52:27', NULL, NULL, '2021-06-14 04:48:05', '2021-06-15 01:52:27', NULL),
(12, 11, 9, 3, 1, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-14 05:22:52', '2021-06-15 06:52:23', NULL, NULL, '2021-06-14 05:22:52', '2021-06-15 01:52:23', NULL),
(13, 37, NULL, 2, 2, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 06:41:33', NULL, '2021-06-15 06:47:06', NULL, '2021-06-15 06:41:57', '2021-06-15 06:41:33', '2021-06-15 01:47:06', NULL),
(14, 37, NULL, 1, 3, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 06:48:03', NULL, NULL, NULL, NULL, '2021-06-15 06:48:03', NULL, NULL),
(15, 37, NULL, 1, 4, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 06:49:47', NULL, '2021-06-15 07:24:12', NULL, NULL, '2021-06-15 06:49:47', '2021-06-15 02:24:12', NULL),
(16, 37, NULL, 2, 5, NULL, NULL, '11', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 06:51:44', NULL, '2021-06-15 06:51:54', NULL, '2021-06-15 06:51:57', '2021-06-15 06:51:44', '2021-06-15 01:51:57', NULL),
(17, 11, 16, 2, 5, NULL, NULL, '11', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-15 06:51:57', '2021-06-15 06:55:44', '2021-06-15 06:55:56', '2021-06-15 06:56:00', '2021-06-15 06:51:57', '2021-06-15 01:56:00', NULL),
(18, 4, 17, 3, 5, NULL, NULL, '', '1', '5', NULL, '2021-06-15 06:55:56', NULL, NULL, NULL, '2021-06-15 06:55:56', NULL, NULL),
(19, 11, 17, 3, 5, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-15 06:56:00', '2021-06-15 06:56:30', NULL, NULL, '2021-06-15 06:56:00', '2021-06-15 01:56:30', NULL),
(20, 37, NULL, 2, 6, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 06:58:26', NULL, '2021-06-15 06:59:35', '2021-06-15 06:59:45', '2021-06-15 06:59:49', '2021-06-15 06:58:26', '2021-06-15 01:59:49', NULL),
(21, 4, 0, 3, 6, NULL, NULL, '', '1', '1', NULL, '2021-06-15 06:59:22', '2021-06-15 07:00:39', NULL, NULL, '2021-06-15 06:59:22', '2021-06-15 02:00:39', NULL),
(22, 37, NULL, 2, 7, NULL, NULL, '0', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:02:00', NULL, '2021-06-15 07:14:34', '2021-06-15 07:14:44', '2021-06-15 07:14:48', '2021-06-15 07:02:00', '2021-06-15 02:14:48', NULL),
(23, 37, NULL, 2, 8, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:05:26', NULL, '2021-06-15 07:05:55', '2021-06-15 07:06:03', '2021-06-15 07:06:13', '2021-06-15 07:05:26', '2021-06-15 02:06:13', NULL),
(24, 11, 0, 2, 8, NULL, NULL, '', '1', '1', NULL, '2021-06-15 07:05:46', '2021-06-15 07:06:38', '2021-06-15 07:06:50', '2021-06-15 07:06:59', '2021-06-15 07:05:46', '2021-06-15 02:06:59', NULL),
(25, 4, 24, 3, 8, NULL, NULL, '', '1', '1', NULL, '2021-06-15 07:06:50', NULL, NULL, NULL, '2021-06-15 07:06:50', NULL, NULL),
(26, 37, NULL, 2, 9, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:08:35', NULL, '2021-06-15 07:08:59', NULL, '2021-06-15 07:08:54', '2021-06-15 07:08:35', '2021-06-15 02:08:59', NULL),
(27, 37, NULL, 2, 10, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:10:39', NULL, '2021-06-15 07:11:11', '2021-06-15 07:11:20', '2021-06-15 07:11:31', '2021-06-15 07:10:39', '2021-06-15 02:11:31', NULL),
(28, 11, 0, 3, 10, NULL, NULL, '', '1,2', '10', NULL, '2021-06-15 07:11:02', NULL, NULL, NULL, '2021-06-15 07:11:02', NULL, NULL),
(29, 37, NULL, 2, 11, NULL, NULL, 'null', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:13:09', NULL, '2021-06-15 07:14:14', NULL, '2021-06-15 07:14:19', '2021-06-15 07:13:09', '2021-06-15 02:14:19', NULL),
(30, 11, 0, 3, 11, NULL, NULL, '', '1,2', '11', NULL, '2021-06-15 07:13:27', NULL, NULL, NULL, '2021-06-15 07:13:27', NULL, NULL),
(31, 11, 22, 3, 7, NULL, NULL, '', '1', '1', NULL, '2021-06-15 07:14:44', NULL, NULL, NULL, '2021-06-15 07:14:44', NULL, NULL),
(35, 37, NULL, 2, 12, NULL, NULL, '0', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:15:09', NULL, '2021-06-15 07:15:16', '2021-06-15 07:15:23', '2021-06-15 07:15:31', '2021-06-15 07:15:09', '2021-06-15 02:15:31', NULL),
(36, 11, 35, 3, 12, NULL, NULL, '', '1', '12', NULL, '2021-06-15 07:15:23', NULL, NULL, NULL, '2021-06-15 07:15:23', NULL, NULL),
(42, 37, NULL, 2, 13, NULL, NULL, '11', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:16:05', NULL, '2021-06-15 07:16:21', '2021-06-15 07:16:29', '2021-06-15 07:16:31', '2021-06-15 07:16:05', '2021-06-15 02:16:31', NULL),
(43, 11, 0, 3, 13, NULL, NULL, '', '1,2', '13', NULL, '2021-06-15 07:16:13', NULL, NULL, NULL, '2021-06-15 07:16:13', NULL, NULL),
(44, 11, 42, 3, 13, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-15 07:16:31', NULL, NULL, NULL, '2021-06-15 07:16:31', NULL, NULL),
(45, 37, NULL, 2, 14, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:23:38', NULL, '2021-06-15 07:23:44', '2021-06-15 07:23:52', '2021-06-15 07:23:52', '2021-06-15 07:23:38', '2021-06-15 02:23:52', NULL),
(46, 11, 45, 3, 14, NULL, NULL, '', '1', '14', NULL, '2021-06-15 07:23:52', NULL, NULL, NULL, '2021-06-15 07:23:52', NULL, NULL),
(47, 37, NULL, 2, 15, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:29:21', NULL, '2021-06-15 07:29:35', '2021-06-15 07:29:55', '2021-06-15 07:30:04', '2021-06-15 07:29:21', '2021-06-15 02:30:04', NULL),
(48, 11, 0, 3, 15, NULL, NULL, '', '1', '15', NULL, '2021-06-15 07:29:29', NULL, NULL, NULL, '2021-06-15 07:29:29', NULL, NULL),
(49, 37, NULL, 2, 16, NULL, NULL, '99', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:30:27', NULL, '2021-06-15 07:30:31', '2021-06-15 07:30:38', '2021-06-15 07:30:44', '2021-06-15 07:30:27', '2021-06-15 02:30:44', NULL),
(50, 11, 49, 3, 16, NULL, NULL, '', '1', '16', NULL, '2021-06-15 07:30:38', NULL, NULL, NULL, '2021-06-15 07:30:38', NULL, NULL),
(55, 37, NULL, 2, 17, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:31:57', NULL, '2021-06-15 07:32:11', '2021-06-15 07:32:18', '2021-06-15 07:32:20', '2021-06-15 07:31:57', '2021-06-15 02:32:20', NULL),
(56, 11, 0, 2, 17, NULL, NULL, '2', '1', '17', NULL, '2021-06-15 07:32:05', '2021-06-15 07:32:59', '2021-06-15 07:33:08', '2021-06-15 07:33:12', '2021-06-15 07:32:05', '2021-06-15 02:33:12', NULL),
(57, 2, 55, 3, 17, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-15 07:32:20', NULL, NULL, NULL, '2021-06-15 07:32:20', NULL, NULL),
(58, 4, 56, 3, 17, NULL, NULL, '', '1', '2', NULL, '2021-06-15 07:33:08', NULL, NULL, NULL, '2021-06-15 07:33:08', NULL, NULL),
(59, NULL, 56, 3, 17, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-15 07:33:12', NULL, NULL, NULL, '2021-06-15 07:33:12', NULL, NULL),
(60, 37, NULL, 2, 18, NULL, NULL, 'null', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:36:25', NULL, '2021-06-15 07:36:30', '2021-06-15 07:36:39', '2021-06-15 07:36:43', '2021-06-15 07:36:25', '2021-06-15 02:36:43', NULL),
(61, 11, 60, 3, 18, NULL, NULL, '', '1', '18', NULL, '2021-06-15 07:36:39', NULL, NULL, NULL, '2021-06-15 07:36:39', NULL, NULL),
(62, 37, NULL, 2, 19, NULL, NULL, '3', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:38:09', NULL, '2021-06-15 07:38:14', '2021-06-15 07:38:22', '2021-06-15 07:38:22', '2021-06-15 07:38:09', '2021-06-15 02:38:22', NULL),
(63, 11, 62, 3, 19, NULL, NULL, '', '1,2', '20', NULL, '2021-06-15 07:38:22', NULL, NULL, NULL, '2021-06-15 07:38:22', NULL, NULL),
(64, 37, NULL, 2, 20, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:39:53', NULL, '2021-06-15 07:39:58', '2021-06-15 07:40:04', '2021-06-15 07:40:04', '2021-06-15 07:39:53', '2021-06-15 02:40:04', NULL),
(65, 11, 64, 3, 20, NULL, NULL, '', '1,2', '21', NULL, '2021-06-15 07:40:04', NULL, NULL, NULL, '2021-06-15 07:40:04', NULL, NULL),
(66, 37, NULL, 2, 21, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:42:33', NULL, '2021-06-15 07:42:38', '2021-06-15 07:42:46', '2021-06-15 07:42:46', '2021-06-15 07:42:33', '2021-06-15 02:42:46', NULL),
(67, 11, 66, 3, 21, NULL, NULL, '', '1,2', 'qq', NULL, '2021-06-15 07:42:46', NULL, NULL, NULL, '2021-06-15 07:42:46', NULL, NULL),
(68, 37, NULL, 2, 22, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:43:34', NULL, '2021-06-15 07:43:41', '2021-06-15 07:43:47', '2021-06-15 07:43:47', '2021-06-15 07:43:34', '2021-06-15 02:43:47', NULL),
(69, 11, 68, 3, 22, NULL, NULL, '', '1', '23', NULL, '2021-06-15 07:43:47', NULL, NULL, NULL, '2021-06-15 07:43:47', NULL, NULL),
(70, 37, NULL, 2, 23, NULL, NULL, '0', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:44:30', NULL, '2021-06-15 07:44:37', '2021-06-15 07:44:47', '2021-06-15 07:44:50', '2021-06-15 07:44:30', '2021-06-15 02:44:50', NULL),
(71, 11, 70, 3, 23, NULL, NULL, '', '1', '24', NULL, '2021-06-15 07:44:47', NULL, NULL, NULL, '2021-06-15 07:44:47', NULL, NULL),
(76, 37, NULL, 2, 24, NULL, NULL, '40', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 07:46:44', NULL, '2021-06-15 07:46:50', '2021-06-15 07:46:58', '2021-06-15 07:47:00', '2021-06-15 07:46:44', '2021-06-15 02:47:00', NULL),
(77, 11, 76, 3, 24, NULL, NULL, '', '1', '40', NULL, '2021-06-15 07:46:58', NULL, NULL, NULL, '2021-06-15 07:46:58', NULL, NULL),
(78, 40, 76, 3, 24, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-15 07:47:00', NULL, NULL, NULL, '2021-06-15 07:47:00', NULL, NULL),
(79, 37, NULL, 1, 25, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 08:24:08', NULL, NULL, NULL, NULL, '2021-06-15 08:24:08', NULL, NULL),
(80, 37, NULL, 1, 26, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 08:25:02', NULL, NULL, NULL, NULL, '2021-06-15 08:25:02', NULL, NULL),
(81, 37, NULL, 2, 27, NULL, NULL, '40', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 08:26:06', NULL, '2021-06-15 08:26:11', '2021-06-15 08:26:51', '2021-06-15 08:26:53', '2021-06-15 08:26:06', '2021-06-15 03:26:53', NULL),
(82, 11, 81, 3, 27, NULL, NULL, '', '1', '55', NULL, '2021-06-15 08:26:51', '2021-06-15 08:27:08', NULL, NULL, '2021-06-15 08:26:51', '2021-06-15 03:27:08', NULL),
(83, 40, 81, 3, 27, NULL, NULL, '', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', NULL, '2021-06-15 08:26:53', NULL, NULL, NULL, '2021-06-15 08:26:53', NULL, NULL),
(84, 11, NULL, 1, 28, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 08:28:30', NULL, NULL, NULL, NULL, '2021-06-15 08:28:30', NULL, NULL),
(85, 37, NULL, 1, 29, NULL, NULL, '2', '7', 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi', '2021-06-15 08:29:02', NULL, NULL, NULL, NULL, '2021-06-15 08:29:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trans_counter_surat`
--

CREATE TABLE `trans_counter_surat` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `id_jenis_surat` int(10) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `last_number` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_counter_surat`
--

INSERT INTO `trans_counter_surat` (`id`, `id_jenis_surat`, `year`, `last_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2021, 29, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_diskusi_surat`
--

CREATE TABLE `trans_diskusi_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_surat_masuk` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Surat Masuk',
  `id_user` int(10) UNSIGNED DEFAULT 0 COMMENT 'Pengguna',
  `pesan` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT 'Pesan diskusi surat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trans_disposisi_pimpinan`
--

CREATE TABLE `trans_disposisi_pimpinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_surat_masuk` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Surat Masuk',
  `id_unit` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Jabatan',
  `disposisi_pimpinan` text NOT NULL DEFAULT '' COMMENT 'Disposisi pimpinan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_disposisi_pimpinan`
--

INSERT INTO `trans_disposisi_pimpinan` (`id`, `id_surat_masuk`, `id_unit`, `disposisi_pimpinan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29, 1, '1', '2021-06-15 03:29:12', '2021-06-15 03:29:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_disposisi_surat`
--

CREATE TABLE `trans_disposisi_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_surat_masuk` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Surat Masuk',
  `id_arahan_surat_dari` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_arahan_surat` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Arahan surat',
  `id_arahan_surat_iduser` int(10) UNSIGNED DEFAULT 0,
  `id_status_disposisi` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Status disposisi',
  `ceklist_disposisi_surat` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '' COMMENT 'Ceklist disposisi surat',
  `disposisi_surat` text NOT NULL COMMENT 'Catatan surat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_disposisi_surat`
--

INSERT INTO `trans_disposisi_surat` (`id`, `id_surat_masuk`, `id_arahan_surat_dari`, `id_arahan_surat`, `id_arahan_surat_iduser`, `id_status_disposisi`, `ceklist_disposisi_surat`, `disposisi_surat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 0, 7, '1', '1', '2021-06-13 22:34:25', '2021-06-13 22:34:25', NULL),
(2, 1, 2, 3, 0, 3, '1', '1', '2021-06-13 22:35:25', '2021-06-13 22:35:25', NULL),
(3, 1, 3, 17, 0, 5, '1', '1', '2021-06-13 22:41:02', '2021-06-13 22:41:02', NULL),
(4, 5, 1, 2, 0, 7, '1', '5', '2021-06-15 01:55:56', '2021-06-15 01:55:56', NULL),
(5, 6, 1, 2, 0, 3, '1', '1', '2021-06-15 01:59:22', '2021-06-15 01:59:22', NULL),
(6, 8, 1, 1, 0, 3, '1', '1', '2021-06-15 02:05:46', '2021-06-15 02:05:46', NULL),
(7, 8, 1, 2, 0, 7, '1', '1', '2021-06-15 02:06:50', '2021-06-15 02:06:50', NULL),
(8, 10, 1, 1, 0, 3, '1,2', '10', '2021-06-15 02:11:02', '2021-06-15 02:11:02', NULL),
(10, 11, 1, 1, 0, 3, '1,2', '11', '2021-06-15 02:13:27', '2021-06-15 02:13:27', NULL),
(12, 7, 1, 1, 0, 3, '1', '1', '2021-06-15 02:14:44', '2021-06-15 02:14:44', NULL),
(13, 12, 1, 1, 0, 3, '1', '12', '2021-06-15 02:15:23', '2021-06-15 02:15:23', NULL),
(14, 13, 1, 1, 0, 3, '1,2', '13', '2021-06-15 02:16:13', '2021-06-15 02:16:13', NULL),
(16, 14, 1, 1, 0, 3, '1', '14', '2021-06-15 02:23:52', '2021-06-15 02:23:52', NULL),
(17, 15, 1, 1, 0, 3, '1', '15', '2021-06-15 02:29:29', '2021-06-15 02:29:29', NULL),
(18, 16, 1, 1, 0, 3, '1', '16', '2021-06-15 02:30:38', '2021-06-15 02:30:38', NULL),
(19, 17, 1, 1, 0, 3, '1', '17', '2021-06-15 02:32:05', '2021-06-15 02:32:05', NULL),
(20, 17, 1, 2, 0, 7, '1', '2', '2021-06-15 02:33:08', '2021-06-15 02:33:08', NULL),
(21, 18, 1, 1, 0, 3, '1', '18', '2021-06-15 02:36:39', '2021-06-15 02:36:39', NULL),
(22, 19, 1, 1, 0, 3, '1,2', '20', '2021-06-15 02:38:22', '2021-06-15 02:38:22', NULL),
(23, 20, 1, 1, 0, 3, '1,2', '21', '2021-06-15 02:40:04', '2021-06-15 02:40:04', NULL),
(24, 21, 1, 1, 0, 3, '1,2', 'qq', '2021-06-15 02:42:46', '2021-06-15 02:42:46', NULL),
(25, 22, 1, 1, 0, 3, '1', '23', '2021-06-15 02:43:47', '2021-06-15 02:43:47', NULL),
(26, 23, 1, 1, 0, 3, '1', '24', '2021-06-15 02:44:47', '2021-06-15 02:44:47', NULL),
(27, 24, 1, 1, 0, 3, '1', '40', '2021-06-15 02:46:58', '2021-06-15 02:46:58', NULL),
(28, 27, 1, 1, 0, 3, '1', '55', '2021-06-15 03:26:51', '2021-06-15 03:26:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_dokumen_surat`
--

CREATE TABLE `trans_dokumen_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_surat_masuk` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Surat Masuk',
  `dokumen_surat` varchar(250) DEFAULT NULL,
  `nama_file` varchar(250) NOT NULL DEFAULT '' COMMENT 'Nama file',
  `id_jenis_file` tinyint(3) UNSIGNED DEFAULT 0 COMMENT 'Jenis file',
  `ukuran_file` int(10) UNSIGNED DEFAULT 0 COMMENT 'Ukuran File',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_dokumen_surat`
--

INSERT INTO `trans_dokumen_surat` (`id`, `id_surat_masuk`, `dokumen_surat`, `nama_file`, `id_jenis_file`, `ukuran_file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29, 'tutorial disable menu register (1).pdf', '1623745772.pdf', 0, 0, '2021-06-15 03:29:32', '2021-06-15 03:29:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_file_surat_keluar`
--

CREATE TABLE `trans_file_surat_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_surat_keluar` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Surat Keluar',
  `id_jenis_dokumen` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Jenis dokumen',
  `file_surat_keluar` varchar(250) NOT NULL DEFAULT '' COMMENT 'Nama file',
  `storage_file_name` varchar(250) DEFAULT NULL,
  `id_jenis_file` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Jenis file',
  `ukuran_file` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Ukuran File',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trans_file_tanggapan`
--

CREATE TABLE `trans_file_tanggapan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_surat_masuk` bigint(20) UNSIGNED DEFAULT NULL,
  `id_disposisi_surat` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Disposisi surat',
  `perihal` varchar(250) NOT NULL DEFAULT '' COMMENT 'Perihal',
  `keterangan` text NOT NULL DEFAULT '' COMMENT 'Keterangan',
  `id_jenis_dokumen` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Jenis dokumen',
  `file_tanggapan` varchar(250) NOT NULL DEFAULT '' COMMENT 'Nama file',
  `storage_file_name` varchar(250) DEFAULT NULL,
  `id_jenis_file` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Jenis file',
  `ukuran_file` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Ukuran File',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_file_tanggapan`
--

INSERT INTO `trans_file_tanggapan` (`id`, `id_surat_masuk`, `id_disposisi_surat`, `perihal`, `keterangan`, `id_jenis_dokumen`, `file_tanggapan`, `storage_file_name`, `id_jenis_file`, `ukuran_file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '', '', 0, 'tempatdisket.pdf', '1623642175.pdf', 0, 0, '2021-06-13 22:42:55', '2021-06-13 22:43:02', '2021-06-13 22:43:02'),
(2, 1, 0, '', '', 0, 'tutorial disable menu register.pdf', '1623642187.pdf', 0, 0, '2021-06-13 22:43:07', '2021-06-13 23:02:17', '2021-06-13 23:02:17'),
(3, 1, 0, '', '', 0, 'tutorial disable menu register.pdf', '1623642222.pdf', 0, 0, '2021-06-13 22:43:42', '2021-06-13 23:02:20', '2021-06-13 23:02:20'),
(4, 1, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623643346.pdf', 0, 0, '2021-06-13 23:02:26', '2021-06-13 23:02:38', '2021-06-13 23:02:38'),
(5, 1, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623644761.pdf', 0, 0, '2021-06-13 23:26:01', '2021-06-13 23:36:57', '2021-06-13 23:36:57'),
(6, 1, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623645568.pdf', 0, 0, '2021-06-13 23:39:28', '2021-06-13 23:39:36', '2021-06-13 23:39:36'),
(7, 1, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623645948.pdf', 0, 0, '2021-06-13 23:45:48', '2021-06-14 00:01:23', '2021-06-14 00:01:23'),
(8, 1, 0, '', '', 0, 'tutorial disable menu register.pdf', '1623645995.pdf', 0, 0, '2021-06-13 23:46:35', '2021-06-14 00:01:26', '2021-06-14 00:01:26'),
(9, 1, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623646496.pdf', 0, 0, '2021-06-13 23:54:56', '2021-06-14 00:01:28', '2021-06-14 00:01:28'),
(10, 1, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623647134.pdf', 0, 0, '2021-06-14 00:05:34', '2021-06-14 00:21:00', '2021-06-14 00:21:00'),
(11, 1, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623647855.pdf', 0, 0, '2021-06-14 00:17:35', '2021-06-14 00:21:03', '2021-06-14 00:21:03'),
(12, 1, 0, '', '', 0, 'Screenshot (2).png', '1623649444.png', 0, 0, '2021-06-14 00:44:04', '2021-06-14 00:44:14', '2021-06-14 00:44:14'),
(13, 1, 0, '', '', 0, 'Screenshot (1).png', '1623650558.png', 0, 0, '2021-06-14 01:02:38', '2021-06-14 01:06:21', '2021-06-14 01:06:21'),
(14, 1, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623650885.pdf', 0, 0, '2021-06-14 01:08:05', '2021-06-14 01:08:05', NULL),
(15, 1, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623651929.pdf', 0, 0, '2021-06-14 01:25:29', '2021-06-14 01:25:29', NULL),
(16, 1, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623652222.pdf', 0, 0, '2021-06-14 01:30:22', '2021-06-14 01:30:22', NULL),
(17, 1, 0, '', '', 0, 'temp_memo.pdf', '1623652241.pdf', 0, 0, '2021-06-14 01:30:41', '2021-06-14 01:30:41', NULL),
(18, 29, 0, '', '', 0, 'tutorial disable menu register (1).pdf', '1623745899.pdf', 0, 0, '2021-06-15 03:31:39', '2021-06-15 03:31:39', NULL),
(19, 29, 0, '', '', 0, 'temp_memo.pdf', '1623745947.pdf', 0, 0, '2021-06-15 03:32:27', '2021-06-15 03:32:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_memo_disposisi`
--

CREATE TABLE `trans_memo_disposisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_disposisi_surat` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Disposisi surat',
  `memo_disposisi` text NOT NULL COMMENT 'Memo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trans_surat_keluar`
--

CREATE TABLE `trans_surat_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_surat_masuk` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Surat Masuk',
  `id_jenis_dokumen` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Jenis dokumen',
  `nomor_surat` varchar(50) DEFAULT '' COMMENT 'Nomor surat',
  `tanggal_surat` date DEFAULT NULL COMMENT 'Tanggal surat',
  `kepada` varchar(250) NOT NULL DEFAULT '' COMMENT 'Kepada',
  `perihal` varchar(250) NOT NULL DEFAULT '' COMMENT 'Perihal',
  `lampiran` varchar(250) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `kota_penandatangan` varchar(250) DEFAULT NULL,
  `jabatan_penandatangan` varchar(250) DEFAULT NULL,
  `nama_pejabat_penandatangan` varchar(250) DEFAULT NULL,
  `isi_surat` text DEFAULT NULL COMMENT 'Isi atau konten surat',
  `id_sifat_keamanan_surat` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Sifat keamanan surat',
  `id_sifat_penyelesaian_surat` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Sifat penyelesaian surat',
  `tanggal_mulai` date DEFAULT NULL COMMENT 'Tanggal mulai',
  `tanggal_selesai` date DEFAULT NULL COMMENT 'Tanggal selesai',
  `mulai_pukul` time DEFAULT NULL COMMENT 'Mulai pukul',
  `selesai_pukul` time DEFAULT NULL COMMENT 'Selesai pukul',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trans_surat_keluar_konsep`
--

CREATE TABLE `trans_surat_keluar_konsep` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Flag status konsep surat' CHECK (json_valid(`status`)),
  `flag` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_user` bigint(10) UNSIGNED DEFAULT NULL,
  `id_arahan_surat` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_surat_masuk` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Surat Masuk',
  `id_jenis_dokumen` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Jenis dokumen',
  `nomor_surat` varchar(50) DEFAULT '' COMMENT 'Nomor surat',
  `tanggal_surat` date DEFAULT NULL COMMENT 'Tanggal surat',
  `kepada` varchar(250) NOT NULL DEFAULT '' COMMENT 'Kepada',
  `perihal` varchar(250) NOT NULL DEFAULT '' COMMENT 'Perihal',
  `lampiran` varchar(250) DEFAULT NULL COMMENT 'Lampiran',
  `alamat` varchar(250) DEFAULT NULL COMMENT 'Alamat',
  `kota_penandatangan` varchar(250) DEFAULT NULL,
  `jabatan_penandatangan` varchar(250) DEFAULT NULL,
  `nama_pejabat_penandatangan` varchar(250) DEFAULT NULL,
  `isi_surat` text DEFAULT NULL COMMENT 'Isi atau konten surat',
  `tembusan` text DEFAULT NULL COMMENT 'Tembusan surat',
  `id_sifat_keamanan_surat` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Sifat keamanan surat',
  `id_sifat_penyelesaian_surat` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Sifat penyelesaian surat',
  `tanggal_mulai` date DEFAULT NULL COMMENT 'Tanggal mulai',
  `tanggal_selesai` date DEFAULT NULL COMMENT 'Tanggal selesai',
  `mulai_pukul` time DEFAULT NULL COMMENT 'Mulai pukul',
  `selesai_pukul` time DEFAULT NULL COMMENT 'Selesai pukul',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_surat_keluar_konsep`
--

INSERT INTO `trans_surat_keluar_konsep` (`id`, `status`, `flag`, `id_user`, `id_arahan_surat`, `id_surat_masuk`, `id_jenis_dokumen`, `nomor_surat`, `tanggal_surat`, `kepada`, `perihal`, `lampiran`, `alamat`, `kota_penandatangan`, `jabatan_penandatangan`, `nama_pejabat_penandatangan`, `isi_surat`, `tembusan`, `id_sifat_keamanan_surat`, `id_sifat_penyelesaian_surat`, `tanggal_mulai`, `tanggal_selesai`, `mulai_pukul`, `selesai_pukul`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, NULL, 1, 3, '', '2021-06-14', '1', '1', '1', '1', 'Jakarta', 'Kepala Biro Perencanaan dan Organisasi', 'Joko Upoyo', '<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 6pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; text-align: justify; text-indent: 36pt; line-height: 18.4px;\"><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\">Menindaklanjuti</span><span style=\"font-family: Arial, sans-serif;\"> surat </span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\">Direktur Hukum dan Regulasi Bappenas Nomor</span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\"> </span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\">03965/Dt.7.3/04/2020 tanggal 3 April 2020 </span><span lang=\"EN-US\" style=\"font-family: Arial, sans-serif;\">hal</span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\"> Permohonan Data Capaian&nbsp; Prioritas Nasional RKP 2020 Triwulan I</span><span lang=\"EN-US\" style=\"font-family: Arial, sans-serif;\">.</span><span lang=\"EN-US\" style=\"font-family: Arial, sans-serif;\"></span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 6pt; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; text-align: justify; text-indent: 36pt; line-height: 18.4px;\"><span lang=\"EN-US\" style=\"font-family: Arial, sans-serif;\">Berdasarkan hal tersebut </span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\">terlampir disampai</span><span style=\"font-family: Arial, sans-serif;\">k</span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\">an Matrik Capaian Output Prioritas Nasional RKP 20</span><span style=\"font-family: Arial, sans-serif;\">20</span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\"> Triwulan I</span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\"> </span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\">untuk Mahkamah Agung (MA).</span><span lang=\"EN-US\" style=\"font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm; font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; text-align: justify; text-indent: 36pt;\"><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\">Demikian </span><span style=\"font-family: Arial, sans-serif;\">disampaikan, </span><span lang=\"IN\" style=\"font-family: Arial, sans-serif;\">atas perhatian dan kerjasamanya, diucapkan terima kasih.<o:p></o:p></span></p>', '<ol><li>YM. Ketua Mahkamah Agung RI</li><li>YM. Wakil Ketua&nbsp;&nbsp;Mahkamah Agung RI Bidang Yudisial</li></ol>', 1, 1, NULL, NULL, NULL, NULL, '2021-06-13 23:36:02', '2021-06-13 23:36:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_surat_masuk`
--

CREATE TABLE `trans_surat_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asal_surat_masuk` varchar(250) NOT NULL DEFAULT '' COMMENT 'Asal surat masuk',
  `pejabat_pengirim_surat` varchar(250) NOT NULL DEFAULT '' COMMENT 'Pejabat pengirim surat',
  `nomor_surat` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nomor surat',
  `tanggal_surat` date NOT NULL COMMENT 'Tanggal surat',
  `kepada` varchar(250) NOT NULL DEFAULT '' COMMENT 'Kepada',
  `perihal` varchar(250) NOT NULL DEFAULT '' COMMENT 'Perihal',
  `id_sifat_keamanan_surat` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Sifat keamanan surat',
  `id_sifat_penyelesaian_surat` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Sifat penyelesaian surat',
  `tenggat_waktu_tindak_lanjut` date DEFAULT NULL COMMENT 'Tenggat waktu tindak lanjut',
  `mulai_pukul` time DEFAULT NULL COMMENT 'Mulai pukul',
  `selesai_pukul` time DEFAULT NULL,
  `nomor_agenda` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nomor agenda',
  `tanggal_agenda` date NOT NULL COMMENT 'Tanggal agenda',
  `id_asal_ekspedisi_surat_masuk` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Asal ekspedisi surat masuk',
  `email_pengirim` varchar(250) DEFAULT '' COMMENT 'Email pengirim',
  `alamat_pengirim` varchar(250) DEFAULT '' COMMENT 'Alamat pengirim',
  `id_arahan_surat` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_jenis_surat_masuk` tinyint(3) UNSIGNED DEFAULT 0 COMMENT 'Jenis surat masuk',
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_surat_masuk`
--

INSERT INTO `trans_surat_masuk` (`id`, `asal_surat_masuk`, `pejabat_pengirim_surat`, `nomor_surat`, `tanggal_surat`, `kepada`, `perihal`, `id_sifat_keamanan_surat`, `id_sifat_penyelesaian_surat`, `tenggat_waktu_tindak_lanjut`, `mulai_pukul`, `selesai_pukul`, `nomor_agenda`, `tanggal_agenda`, `id_asal_ekspedisi_surat_masuk`, `email_pengirim`, `alamat_pengirim`, `id_arahan_surat`, `id_jenis_surat_masuk`, `meta`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', '1', '2021-06-14', '1', '1', 1, 1, NULL, NULL, NULL, '1/BUA.1/06/2021', '2021-06-14', 1, '', '', 2, 1, NULL, '2021-06-13 22:33:16', '2021-06-13 22:33:16', NULL),
(2, '2', '2', '2', '2021-06-15', '2', '2', 1, 1, NULL, NULL, NULL, '2/BUA.1/06/2021', '2021-06-15', 3, '', '', 1, 7, NULL, '2021-06-15 01:41:33', '2021-06-15 01:41:33', NULL),
(3, '3', '3', '3', '2021-06-15', '3', '3', 1, 1, NULL, NULL, NULL, '3/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 01:48:03', '2021-06-15 01:48:03', NULL),
(4, '4', '4', '4', '2021-06-15', '4', '4', 1, 1, NULL, NULL, NULL, '4/BUA.1/06/2021', '2021-06-15', 3, '', '', 2, 1, NULL, '2021-06-15 01:49:47', '2021-06-15 01:49:47', NULL),
(5, '5', '5', '5', '2021-06-15', '5', '5', 1, 1, NULL, NULL, NULL, '5/BUA.1/06/2021', '2021-06-15', 3, '', '', 2, 7, NULL, '2021-06-15 01:51:44', '2021-06-15 01:51:44', NULL),
(6, '6', '6', '6', '2021-06-15', '6', '6', 1, 1, NULL, NULL, NULL, '6/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 01:58:26', '2021-06-15 01:58:26', NULL),
(7, '7', '7', '7', '2021-06-15', '7', '7', 1, 1, NULL, NULL, NULL, '7/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 02:02:00', '2021-06-15 02:02:00', NULL),
(8, '8', '8', '8', '2021-06-15', '8', '8', 1, 1, NULL, NULL, NULL, '8/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 02:05:26', '2021-06-15 02:05:26', NULL),
(9, '9', '9', '9', '2021-06-15', '9', '9', 1, 1, NULL, NULL, NULL, '9/BUA.1/06/2021', '2021-06-15', 1, '', '', 3, 1, NULL, '2021-06-15 02:08:35', '2021-06-15 02:08:35', NULL),
(10, '10', '10', '10', '2021-06-15', '10', '10', 3, 3, NULL, NULL, NULL, '10/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 02:10:39', '2021-06-15 02:10:39', NULL),
(11, '11', '11', '11', '2021-06-15', '11', '11', 1, 1, NULL, NULL, NULL, '11/BUA.1/06/2021', '2021-06-15', 3, '', '', 3, 7, NULL, '2021-06-15 02:13:09', '2021-06-15 02:13:09', NULL),
(12, '12', '12', '12', '2021-06-15', '12', '12', 1, 1, NULL, NULL, NULL, '12/BUA.1/06/2021', '2021-06-15', 1, '', '', 3, 1, NULL, '2021-06-15 02:15:09', '2021-06-15 02:15:09', NULL),
(13, '13', '13', '13', '2021-06-15', '13', '13', 1, 1, NULL, NULL, NULL, '13/BUA.1/06/2021', '2021-06-15', 1, '', '', 3, 1, NULL, '2021-06-15 02:16:05', '2021-06-15 02:16:05', NULL),
(14, '14', '14', '14', '2021-06-15', '14', '14', 1, 1, NULL, NULL, NULL, '14/BUA.1/06/2021', '2021-06-15', 3, '', '', 2, 7, NULL, '2021-06-15 02:23:37', '2021-06-15 02:23:37', NULL),
(15, '15', '15', '15', '2021-06-15', '15', '15', 1, 1, NULL, NULL, NULL, '15/BUA.1/06/2021', '2021-06-15', 1, '', '', 3, 1, NULL, '2021-06-15 02:29:21', '2021-06-15 02:29:21', NULL),
(16, '16', '16', '16', '2021-06-15', '16', '16', 1, 1, NULL, NULL, NULL, '16/BUA.1/06/2021', '2021-06-15', 1, '', '', 3, 1, NULL, '2021-06-15 02:30:27', '2021-06-15 02:30:27', NULL),
(17, '17', '17', '17', '2021-06-15', '17', '17', 1, 1, NULL, NULL, NULL, '17/BUA.1/06/2021', '2021-06-15', 1, '', '', 3, 1, NULL, '2021-06-15 02:31:57', '2021-06-15 02:31:57', NULL),
(18, '18', '18', '18', '2021-06-15', '18', '18', 1, 1, NULL, NULL, NULL, '18/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 02:36:25', '2021-06-15 02:36:25', NULL),
(19, '20', '20', '20', '2021-06-15', '20', '20', 1, 1, NULL, NULL, NULL, '19/BUA.1/06/2021', '2021-06-15', 1, '', '', 3, 1, NULL, '2021-06-15 02:38:09', '2021-06-15 02:38:09', NULL),
(20, '21', '21', '21', '2021-06-15', '21', '21', 1, 1, NULL, NULL, NULL, '20/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 02:39:53', '2021-06-15 02:39:53', NULL),
(21, '22', '22', '22', '2021-06-15', '22', '22', 1, 1, NULL, NULL, NULL, '21/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 02:42:33', '2021-06-15 02:42:33', NULL),
(22, '23', '23', '23', '2021-06-15', '23', '23', 1, 1, NULL, NULL, NULL, '22/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 02:43:33', '2021-06-15 02:43:33', NULL),
(23, '24', '24', '24', '2021-06-15', '24', '24', 1, 1, NULL, NULL, NULL, '23/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 02:44:30', '2021-06-15 02:44:30', NULL),
(24, '40', '40', '40', '2021-06-15', '40', '40', 1, 1, NULL, NULL, NULL, '24/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 02:46:44', '2021-06-15 02:46:44', NULL),
(25, '44', '44', '44', '2021-06-15', '44', '44', 1, 1, NULL, NULL, NULL, '25/BUA.1/06/2021', '2021-06-15', 3, '', '', 2, 1, NULL, '2021-06-15 03:24:08', '2021-06-15 03:24:08', NULL),
(26, '55', '55', '55', '2021-06-15', '55', '55', 1, 1, NULL, NULL, NULL, '26/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 03:25:02', '2021-06-15 03:25:02', NULL),
(27, '56', '56', '56', '2021-06-15', '56', '56', 1, 1, NULL, NULL, NULL, '27/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 03:26:06', '2021-06-15 03:26:06', NULL),
(28, '57', '57', '57', '2021-06-15', '57', '57', 1, 1, NULL, NULL, NULL, '28/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 03:28:30', '2021-06-15 03:28:30', NULL),
(29, '66', '66', '66', '2021-06-15', '66', '66', 1, 1, NULL, NULL, NULL, '29/BUA.1/06/2021', '2021-06-15', 1, '', '', 2, 1, NULL, '2021-06-15 03:29:02', '2021-06-15 03:29:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_tembusan_surat`
--

CREATE TABLE `trans_tembusan_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_surat_masuk` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Surat Masuk',
  `id_unit` int(10) UNSIGNED DEFAULT 0 COMMENT 'Pejabat',
  `tembusan_surat` varchar(250) DEFAULT '' COMMENT 'Catatan disposisi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tref_arahan_surat`
--

CREATE TABLE `tref_arahan_surat` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `id_arahan_surat_parent` tinyint(3) UNSIGNED DEFAULT NULL,
  `level_unit` tinyint(3) UNSIGNED DEFAULT NULL,
  `arahan_surat` varchar(250) NOT NULL DEFAULT '' COMMENT 'Arahan surat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_arahan_surat`
--

INSERT INTO `tref_arahan_surat` (`id`, `id_arahan_surat_parent`, `level_unit`, `arahan_surat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Tata Usaha/ Arsip', NULL, NULL, NULL),
(2, 2, 1, 'Kepala Biro', NULL, NULL, NULL),
(3, 2, 2, 'Kepala Bagian Ortala', NULL, NULL, NULL),
(4, 2, 2, 'Kepala Bagian Bimon', NULL, NULL, NULL),
(5, 2, 2, 'Kepala Bagian Renang', NULL, NULL, NULL),
(6, 2, 2, 'Kepala Bagian Evlap', NULL, NULL, NULL),
(7, 2, 2, 'Kepala Bagian Renprog', NULL, NULL, NULL),
(8, 7, 3, 'Kepala Sub. Bagian Data', NULL, NULL, NULL),
(9, 7, 3, 'Kepala Sub. Bagian Rencana Dan Program I', NULL, NULL, NULL),
(10, 7, 3, 'Kepala Sub. Bagian Rencana Dan Program II', NULL, NULL, NULL),
(11, 5, 3, 'Kepala Sub. Bagian Analisa Anggaran', NULL, NULL, NULL),
(12, 5, 3, 'Kepala Sub. Bagian Rencana Anggaran I', NULL, NULL, NULL),
(13, 5, 3, 'Kepala Sub. Bagian Rencana Anggaran II', NULL, NULL, NULL),
(14, 4, 3, 'Kepala Sub. Bagian Bimbingan Dan Monitoring Penyelenggaraan Program', NULL, NULL, NULL),
(15, 4, 3, 'Kepala Sub. Bagian Bimbingan Dan Monitoring Penganggaran', NULL, NULL, NULL),
(16, 4, 3, 'Kepala Sub. Bagian Tata Usaha Biro', NULL, NULL, NULL),
(17, 3, 3, 'Kepala Sub. Bagian Organisasi', NULL, NULL, NULL),
(18, 3, 3, 'Kepala Sub. Bagian Tata Laksana', NULL, NULL, NULL),
(19, 3, 3, 'Kepala Sub. Bagian Akuntabilitas', NULL, NULL, NULL),
(20, 6, 3, 'Kepala Sub. Bagian Evaluasi', NULL, NULL, NULL),
(21, 6, 3, 'Kepala Sub. Bagian Pelaporan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_asal_ekspedisi_surat_masuk`
--

CREATE TABLE `tref_asal_ekspedisi_surat_masuk` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `asal_ekspedisi_surat_masuk` varchar(250) NOT NULL DEFAULT '' COMMENT 'Asal ekspedisi surat masuk',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_asal_ekspedisi_surat_masuk`
--

INSERT INTO `tref_asal_ekspedisi_surat_masuk` (`id`, `asal_ekspedisi_surat_masuk`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Biro Umum', NULL, NULL, NULL),
(2, 'Pimpinan', NULL, NULL, NULL),
(3, 'Surat masuk langsung', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_jabatan`
--

CREATE TABLE `tref_jabatan` (
  `id` int(11) DEFAULT NULL,
  `jabatan` varchar(225) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_jabatan`
--

INSERT INTO `tref_jabatan` (`id`, `jabatan`, `deleted_at`) VALUES
(1, 'kepala biro', NULL),
(2, 'kepala bagian', NULL),
(NULL, 'staff', NULL),
(3, 'kepala sub bagian', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_jenis_disposisi`
--

CREATE TABLE `tref_jenis_disposisi` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `jenis_disposisi` varchar(250) NOT NULL DEFAULT '' COMMENT 'Jenis disposisi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_jenis_disposisi`
--

INSERT INTO `tref_jenis_disposisi` (`id`, `jenis_disposisi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Untuk diketahui', NULL, NULL, NULL),
(2, 'Ditelaah', NULL, NULL, NULL),
(3, 'Untuk Pembicaraan', NULL, NULL, NULL),
(4, 'Siapkan Jawaban', NULL, NULL, NULL),
(5, 'Sebarkan/Edarkan', NULL, NULL, NULL),
(6, 'Arsipkan', NULL, NULL, NULL),
(7, 'Dokumen Terlampir', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_jenis_dokumen`
--

CREATE TABLE `tref_jenis_dokumen` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `tipe` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Tipe dokumen 1: in/dokumen masuk, 2: out/dokumen keluar',
  `jenis_dokumen` varchar(250) NOT NULL DEFAULT '' COMMENT 'Jenis dokumen',
  `format_penomoran` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_jenis_dokumen`
--

INSERT INTO `tref_jenis_dokumen` (`id`, `tipe`, `jenis_dokumen`, `format_penomoran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Agenda', '%d/Bua.1/%d/%d', NULL, NULL, NULL),
(2, 2, 'Memo', '%s/Bua.1/Mem/%d/%d', NULL, NULL, NULL),
(3, 2, 'Surat Dinas', '%s/Bua.1/OT.01.1/%d/%d', NULL, NULL, NULL),
(4, 2, 'Surat Tugas', '%s/Bua.1/ST/%d/%d', NULL, NULL, NULL),
(5, 2, 'Keputusan', '%s/Bua.1/SK/%d/%d', NULL, NULL, NULL),
(6, 2, 'Undangan', '%s/Bua.1/OT.01.1/%d/%d', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_jenis_file`
--

CREATE TABLE `tref_jenis_file` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `jenis_file` varchar(250) NOT NULL DEFAULT '' COMMENT 'Jenis file',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_jenis_file`
--

INSERT INTO `tref_jenis_file` (`id`, `jenis_file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PDF', NULL, NULL, NULL),
(2, 'Word', NULL, NULL, NULL),
(3, 'Excel', NULL, NULL, NULL),
(4, 'PPT', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_jenis_surat_masuk`
--

CREATE TABLE `tref_jenis_surat_masuk` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `jenis_surat_masuk` varchar(250) NOT NULL DEFAULT '' COMMENT 'Jenis surat masuk',
  `deskripsi` varchar(250) NOT NULL DEFAULT '' COMMENT 'Deskripsi jenis surat masuk',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_jenis_surat_masuk`
--

INSERT INTO `tref_jenis_surat_masuk` (`id`, `jenis_surat_masuk`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Surat Dinas', 'Surat Dinas', NULL, NULL, NULL),
(2, 'ST', 'Surat Tugas', NULL, NULL, NULL),
(3, 'Memo', 'Memorandum', NULL, NULL, NULL),
(4, 'SK', 'Surat Keputusan', NULL, NULL, NULL),
(5, 'SKet', 'Surat Keterangan', NULL, NULL, NULL),
(6, 'SPeng', 'Surat Pengantar', NULL, NULL, NULL),
(7, 'Und', 'Undangan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_sifat_keamanan_surat`
--

CREATE TABLE `tref_sifat_keamanan_surat` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `sifat_keamanan_surat` varchar(250) NOT NULL DEFAULT '' COMMENT 'Sifat keamanan surat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_sifat_keamanan_surat`
--

INSERT INTO `tref_sifat_keamanan_surat` (`id`, `sifat_keamanan_surat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Biasa', NULL, NULL, NULL),
(2, 'Rahasia', NULL, NULL, NULL),
(3, 'Sangat Rahasia', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_sifat_penyelesaian_surat`
--

CREATE TABLE `tref_sifat_penyelesaian_surat` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `sifat_penyelesaian_surat` varchar(250) NOT NULL DEFAULT '' COMMENT 'Sifat penyelesaian surat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_sifat_penyelesaian_surat`
--

INSERT INTO `tref_sifat_penyelesaian_surat` (`id`, `sifat_penyelesaian_surat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Biasa', NULL, NULL, NULL),
(2, 'Segera', NULL, NULL, NULL),
(3, 'Sangat Segera', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_status_disposisi`
--

CREATE TABLE `tref_status_disposisi` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `status_disposisi` varchar(250) NOT NULL DEFAULT '' COMMENT 'Status disposisi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_status_disposisi`
--

INSERT INTO `tref_status_disposisi` (`id`, `status_disposisi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dikirim ke Kepala Biro', NULL, NULL, NULL),
(2, 'Diterima oleh Kepala Biro', NULL, NULL, NULL),
(3, 'Dikirim ke Kepala Bagian', NULL, NULL, NULL),
(4, 'Diterima oleh Kepala Bagian', NULL, NULL, NULL),
(5, 'Dikirim ke Kepala Sub Bagian', NULL, NULL, NULL),
(6, 'Diterima oleh Kepala Sub Bagian', NULL, NULL, NULL),
(7, 'Dikirim ke Pelaksana', NULL, NULL, NULL),
(8, 'Diterima oleh Pelaksana', NULL, NULL, NULL),
(9, 'Konsep dikirim ke Kasubag', NULL, NULL, NULL),
(10, 'Konsep dicek oleh Kasubag', NULL, NULL, NULL),
(11, 'Dokumen dikembalikan ke Pelaksana', NULL, NULL, NULL),
(12, 'Konsep dikirim ke Kabag', NULL, NULL, NULL),
(13, 'Konsep dicek oleh Kabag', NULL, NULL, NULL),
(14, 'Dokumen dikembalikan ke Kasubag', NULL, NULL, NULL),
(15, 'Konsep dikirim ke Kasubag TU', NULL, NULL, NULL),
(16, 'Konsep dicek oleh Kasubag TU', NULL, NULL, NULL),
(17, 'Dokumen dikembalikan ke Kabag', NULL, NULL, NULL),
(18, 'Konsep dikirim ke Karo', NULL, NULL, NULL),
(19, 'Konsep dicek oleh Karo', NULL, NULL, NULL),
(20, 'Dokumen ditandatangani oleh Karo', NULL, NULL, NULL),
(21, 'Dokumen dikembalikan ke Kasubag TU', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_status_mailbox`
--

CREATE TABLE `tref_status_mailbox` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `status_mailbox` varchar(250) NOT NULL DEFAULT '' COMMENT 'Status disposisi',
  `status_mailbox_idn` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_status_mailbox`
--

INSERT INTO `tref_status_mailbox` (`id`, `status_mailbox`, `status_mailbox_idn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Draft', 'Konsep', NULL, NULL, NULL),
(2, 'Sent', 'Terkirim', NULL, NULL, NULL),
(3, 'Inbox', 'Kotak masuk', NULL, NULL, NULL),
(4, 'Process', 'Terproses', NULL, NULL, NULL),
(5, 'Signed', 'Tertandatangani', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tref_unit`
--

CREATE TABLE `tref_unit` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_unit` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Parent ID',
  `unit` varchar(250) NOT NULL DEFAULT '' COMMENT 'Unit',
  `jabatan` varchar(250) NOT NULL DEFAULT '' COMMENT 'Jabatan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tref_unit`
--

INSERT INTO `tref_unit` (`id`, `id_unit`, `unit`, `jabatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Ketua Mahkamah Agung', 'Ketua Mahkamah Agung', NULL, NULL, NULL),
(2, 0, 'Wakil Ketua Mahkamah Agung Bidang Yudisial', 'Wakil Ketua Mahkamah Agung Bidang Yudisial', NULL, NULL, NULL),
(3, 0, 'Wakil Ketua Mahkamah Agung Bidang Non Yudisial', 'Wakil Ketua Mahkamah Agung Bidang Non Yudisial', NULL, NULL, NULL),
(4, 0, 'Kamar Pembinaan', 'Ketua Kamar Pembinaan', NULL, NULL, NULL),
(5, 0, 'Kamar Tata Usaha Negara', 'Ketua Kamar Tata Usaha Negara', NULL, NULL, NULL),
(6, 0, 'Kamar Agama', 'Ketua Kamar Agama', NULL, NULL, NULL),
(7, 0, 'Kamar Pidana', 'Ketua Kamar Pidana', NULL, NULL, NULL),
(8, 0, 'Kamar Militer', 'Ketua Kamar Militer', NULL, NULL, NULL),
(9, 0, 'Kamar Pengawasan', 'Ketua Kamar Pengawasan', NULL, NULL, NULL),
(10, 0, 'Kamar Perdata', 'Ketua Kamar Perdata', NULL, NULL, NULL),
(11, 0, 'Kepaniteraan Mahkamah Agung', 'Panitera Mahkamah Agung', NULL, NULL, NULL),
(12, 0, 'Sekretariat Mahkamah Agung', 'Sekretaris Mahkamah Agung', NULL, NULL, NULL),
(13, 0, 'Direktorat Jenderal Badan Peradilan Umum', 'Direktur Jenderal Badan Peradilan Umum', NULL, NULL, NULL),
(14, 0, 'Direktorat Jenderal Badan Peradilan Agama', 'Direktur Jenderal Badan Peradilan Agama', NULL, NULL, NULL),
(15, 0, 'Direktorat Jenderal Badan Peradilan Militer Dan Tata Usaha Negara', 'Direktur Jenderal Badan Peradilan Militer Dan Tata Usaha Negara', NULL, NULL, NULL),
(16, 0, 'Badan Pengawasan', 'Kepala Badan Pengawasan', NULL, NULL, NULL),
(17, 0, 'Badan Penelitian Dan Pengembangan Dan Pendidikan Dan Pelatihan Hukum Dan Peradilan', 'Kepala Badan Penelitian Dan Pengembangan Dan Pendidikan Dan Pelatihan Hukum Dan Peradilan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_unit_kerja` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_jabatan` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `nip`, `jabatan`, `no_hp`, `id_unit_kerja`, `id_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-01 20:21:23', '2020-12-01 20:21:23'),
(4, 'Joko Upoyo Pribadi, SH.,MH', 'jokoupoyo@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196903211994031002', 'Kepala Biro Perencanaan dan Organisasi', '085772090909', 2, 1, NULL, NULL),
(5, 'Drs. H. Arifin Samsurijal, SH.,MH', 'arifinsamsu67@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196610161990021001', 'Kepala Bagian Rencana dan Program  Biro Perencanaan dan Organisasi', '081287814055', 7, 2, NULL, NULL),
(6, 'Didik Purwanto, S.H., M.M.', 'dikasagita11@yahoo.co.id', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196911231989031001', 'Kepala Bagian Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '081315735007', 6, 2, NULL, NULL),
(7, 'El Damara,  SE,SH,MM', 'eldamkaray8@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197303242002121006', 'Kepala Bagian Bimbingan dan Monitoring Biro Perencanaan dan Organisasi', '081280808773', 4, 2, NULL, NULL),
(8, 'Edi Yuniadi, S.Sos, MM', 'ediyuniadi@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197306011994021001', 'Kepala Bagian Organisasi dan Tata Laksana Biro Perencanaan dan Organisasi', '081319042632', 3, 2, NULL, NULL),
(9, 'Untung Hermawan, ST', 'hermawanuntung@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197702212002121002', 'Kepala Bagian Penyusunan Rencana Anggaran  Biro Perencanaan dan Organisasi', '085811188667', 5, 2, NULL, NULL),
(10, 'Yus Natin, S.Sos, MM', 'yusnatinn@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196306301983032001', 'Kasubbagian Pelaporan Biro Perencanaan dan Organisasi', '085770920235', 21, 3, NULL, NULL),
(11, 'Titi Suprapti, SH, MM', 'titisuprapti125@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', 'e4qfoHGf56ndG4ZJGFprMpLK8rFYR2fkrO4wRmdIhIxbkomlhrmtoaBzqTLG', '196805121989032002', 'Kasubbagian Tata Usaha Biro Perencanaan dan Organisasi', '081281999714', 1, 3, NULL, NULL),
(12, 'Teguh Magzan, SH', 'magzant@yahoo.co.id', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197508042003121001', 'Kasubbagian Rencana Program I Biro Perencanaan dan Organisasi', '082213707775', 9, 3, NULL, NULL),
(13, 'Syaiful Arif, SH.,M.Si', 'syaiful.poros@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196603101987031001', 'Kasubbagian Bimbingan dan Monitoring Penganggaran Biro Perencanaan dan Organisasi', '085214750481', 15, 3, NULL, NULL),
(14, 'Emie Yuliati, SE, ME', 'emieyuliati@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197405062006042001', 'Kasubbagian Bimbingan dan Monitoring Penyelenggaraan Program Biro Perencanaan dan Organisasi', '08118603902', 14, 3, NULL, NULL),
(15, 'Retno Widuri, S.Kom, MH', 'rtnwiduri@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197710122005022001', 'Kasubbagian Organisasi Biro Perencanaan dan Organisasi', '081218768730', 17, 3, NULL, NULL),
(16, 'Diana Puri Syawaliah,  SE.Par', 'honeydee6@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198212022008012009', 'Kasubbagian Rencana Anggaran II Biro Perencanaan dan Organisasi', '081296929736', 13, 3, NULL, NULL),
(17, 'Mila Karima, SE,MM', 'milaakarima@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198110302009042006', 'Kasubbagian Evaluasi Biro Perencanaan dan Organisasi', '081250641307', 20, 3, NULL, NULL),
(18, 'Grace Maria, S.Ip, M.E', 'gracemariaginting@yahoo.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198208272009042011', 'Kasubbagian Data Biro Perencanaan dan Organisasi', '081382922565', 8, 3, NULL, NULL),
(19, 'Tiroi Sisruli Siahaan, S.Ip', 'tiroi.siahaan@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198512112011011009', 'Kasubbagian Tata Laksana Biro Perencanaan dan Organisasi', '0811171259', 18, 3, NULL, NULL),
(20, 'Dhika Hafizh Pratama, S.Sos', 'dhikahafizh@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198609092011012013', 'Kasubbagian Akuntabilitas Biro Perencanaan dan Organisasi', '081280966484', 19, 3, NULL, NULL),
(21, 'Amanda Abidin, SE.,Mba', 'amandaabidin9@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198707112009121002', 'Kasubbagian Rencana Anggaran I Biro Perencanaan dan Organisasi', '08568801986', 12, 3, NULL, NULL),
(22, 'Yudi Yudiana, SE,M.Ak', 'yudiana1987@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196606171987031005', 'Kasubbagian Rencana Program II Biro Perencanaan dan Organisasi', '08118809951', 10, 3, NULL, NULL),
(23, 'Sawiji Suprayitno, SH', 'maswiezie17@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196710191989031001', 'Arsiparis Muda Biro Perencanaan dan Organisasi', '082211861566', 19, NULL, NULL, NULL),
(24, 'Gunawan, SH', 'gunawanwan571@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196610161987032002', 'Perencana Pertama Biro Perencanaan dan Organisasi', '081221420051', NULL, NULL, NULL, NULL),
(25, 'Eli Haryani, SH', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198211032009041004', 'Analis Perencanaan Anggaran Biro Perencanaan dan Organisasi', '082125821966', 22, NULL, NULL, NULL),
(26, 'Fiqhi Hanief Al Islamy, S.Kom', 'fiqhihanief@yahoo.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198302042009121005', 'Analis Rencana Program dan Kegiatan Biro Perencanaan dan Organisasi', '081387047608', 14, NULL, NULL, NULL),
(27, 'Rizqi Widi Feirdani, SE', 'rizqiwidifeirdani@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198309212009122004', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '081297154842', 21, NULL, NULL, NULL),
(28, 'Yovi Silfani, SE,MM', 'yovisilfani@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198503152011012017', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085263461949', 20, NULL, NULL, NULL),
(29, 'Andi Hikmawati , S.Sos,MH', 'hikmaneh_hikma@yahoo.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198604122009042008', 'Analis Perencanaan Anggaran Biro Perencanaan dan Organisasi', '081311001572', 12, NULL, NULL, NULL),
(30, 'Ida Ariani, SE,MH', 'arianipane@yahoo.co.id', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198601242015032003', 'Analis Monitoring dan Evaluasi Pelaksanaan Anggaran Biro Perencanaan dan Organisasi', '085710518505', 15, NULL, NULL, NULL),
(31, 'Sentosawati Catur Putri, S.Ip', 'sentosaputri24@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198605252009042003', 'Analis Rencana Program dan Kegiatan  Biro Perencanaan dan Organisasi', '087878737221', 10, NULL, NULL, NULL),
(32, 'Indah Wahyuni, SE,MM', 'indah255@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198701172015032003', 'Penyusun RKA Biro Perencanaan dan Organisasi', '081282869797', 9, NULL, NULL, NULL),
(33, 'Rina Alprini, S.Pt', 'rina.alprini@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198807292015031002', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '81806546303', 21, NULL, NULL, NULL),
(34, 'Purwanto, S.P', 'purwanto.mari@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198908222015031002', 'Analis Rencana Program dan Kegiatan  Biro Perencanaan dan Organisasi', '087875794676', 14, NULL, NULL, NULL),
(35, 'Muhammad Mahatir, S.Kom', 'mahatir.muhammad22@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '199410032019032007', 'Analis Perencanaan Anggaran  Biro Perencanaan dan Organisasi', '081294771228', 22, NULL, NULL, NULL),
(36, 'Andrea Arimurti, SH', 'andreaarimurti94@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196804101989031001', 'Analis Tata Laksana  Biro Perencanaan dan Organisasi', '087785176036', 18, NULL, NULL, NULL),
(37, 'Ujang Misnan', 'ujangmisnan@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198909042019031008', 'Pengadministrasi Persuratan Biro Perencanaan dan Organisasi', '081284202788', 1, 1, NULL, NULL),
(38, 'Bimo Prakoso, A.Md.', 'bp.bimoprakoso@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', 'AE7Vok8ZFjmfEceMTyF5YYyoHTqvNIlk41VzClrgkMKCIkm5UYBW6prokJY6', '199212072019032010', 'Pengelola Data Biro Perencanaan dan Organisasi', '08111797747', 17, NULL, NULL, NULL),
(39, 'Debora Putri Tambunan, A.Md', 'debora11008putri@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '199212072019032010', 'Pengelola Sistem dan Jaringan Biro Perencanaan dan Organisasi', '085275055649', 20, NULL, NULL, NULL),
(53, 'Muktar', 'mukhtar82.ab@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian  Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085692766050', 21, NULL, NULL, NULL),
(54, 'Atmazuki', 'atmazuki1207@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring Biro Perencanaan dan Organisasi', '089635000520', 15, NULL, NULL, NULL),
(55, 'Arief Ridwan', 'arief.renog@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring pada Tata Usaha Biro Perencanaan dan Organisasi', '08567991842', 1, NULL, NULL, NULL),
(56, 'Rahman', 'rachman778@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081387646404', 13, NULL, NULL, NULL),
(57, 'Astania Dwi Wahyu', 'nhiepocha@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian  Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085746412333', 20, NULL, NULL, NULL),
(58, 'Fajar Amirulah', 'fajar_yual@yahoo.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '081310010007', 9, NULL, NULL, NULL),
(59, 'Desfran Subhan', 'desfransubhan20@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Organisasi dan Tata Laksana Biro Perencanaan dan Organisasi', '082110127771', 17, NULL, NULL, NULL),
(60, 'Savira Rianda Ariani', 'savirarara89@yahoo.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring pada Tata Usaha Biro Perencanaan dan Organisasi', '08113571289', 1, NULL, NULL, NULL),
(61, 'Muhammad Indra', 'indraflacks92@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '085691486456', 8, NULL, NULL, NULL),
(62, 'Nursidik', 'siddiqnur81@gmail.com.', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081281800446', NULL, NULL, NULL, NULL),
(63, 'Hadi Saputro', 'hadi_s216@yahoo.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081398594449', NULL, NULL, NULL, NULL),
(64, 'Wimbo Bramantyo', 'bramantyo.wimbo@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '081333357830', 10, NULL, NULL, NULL),
(65, 'Kasubag Analisis Renog', 'analisisrenog@gmail.com', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, 'Kasubbagian Analisis Biro Perencanaan dan Organisasi', NULL, 22, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_asli`
--

CREATE TABLE `users_asli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_unit_kerja` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_jabatan` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_asli`
--

INSERT INTO `users_asli` (`id`, `name`, `email`, `telegram_id`, `email_verified_at`, `password`, `remember_token`, `nip`, `jabatan`, `no_hp`, `id_unit_kerja`, `id_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-01 20:21:23', '2020-12-01 20:21:23'),
(4, 'Joko Upoyo Pribadi, SH.,MH', 'jokoupoyo@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196903211994031002', 'Kepala Biro Perencanaan dan Organisasi', '085772090909', 2, 1, NULL, NULL),
(5, 'Drs. H. Arifin Samsurijal, SH.,MH', 'arifinsamsu67@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196610161990021001', 'Kepala Bagian Rencana dan Program  Biro Perencanaan dan Organisasi', '081287814055', 7, 2, NULL, NULL),
(6, 'Didik Purwanto, S.H., M.M.', 'dikasagita11@yahoo.co.id', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196911231989031001', 'Kepala Bagian Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '081315735007', 6, 2, NULL, NULL),
(7, 'El Damara,  SE,SH,MM', 'eldamkaray8@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197303242002121006', 'Kepala Bagian Bimbingan dan Monitoring Biro Perencanaan dan Organisasi', '081280808773', 4, 2, NULL, NULL),
(8, 'Edi Yuniadi, S.Sos, MM', 'ediyuniadi@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197306011994021001', 'Kepala Bagian Organisasi dan Tata Laksana Biro Perencanaan dan Organisasi', '081319042632', 3, 2, NULL, NULL),
(9, 'Untung Hermawan, ST', 'hermawanuntung@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197702212002121002', 'Kepala Bagian Penyusunan Rencana Anggaran  Biro Perencanaan dan Organisasi', '085811188667', 5, 2, NULL, NULL),
(10, 'Yus Natin, S.Sos, MM', 'yusnatinn@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196306301983032001', 'Kasubbagian Pelaporan Biro Perencanaan dan Organisasi', '085770920235', 21, 3, NULL, NULL),
(11, 'Syaiful Arif, SH.,M.Si', 'syaiful.poros@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196603101987031001', 'Kasubbagian Bimbingan dan Monitoring Penganggaran Biro Perencanaan dan Organisasi', '085214750481', 15, 3, NULL, NULL),
(12, 'Teguh Magzan, SH', 'magzant@yahoo.co.id', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197508042003121001', 'Kasubbagian Rencana Program I Biro Perencanaan dan Organisasi', '082213707775', 9, 3, NULL, NULL),
(13, 'Titi Suprapti, SH, MM', 'titisuprapti125@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', 'Vx34122l02K0KFhY2WQskTczaQXalb2qvuz4QqKOQLG3YrtcWFsJXg7fuglr', '196805121989032002', 'Kasubbagian Tata Usaha Biro Perencanaan dan Organisasi', '081281999714', 1, 3, NULL, NULL),
(14, 'Emie Yuliati, SE, ME', 'emieyuliati@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197405062006042001', 'Kasubbagian Bimbingan dan Monitoring Penyelenggaraan Program Biro Perencanaan dan Organisasi', '08118603902', 14, 3, NULL, NULL),
(15, 'Retno Widuri, S.Kom, MH', 'rtnwiduri@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197710122005022001', 'Kasubbagian Organisasi Biro Perencanaan dan Organisasi', '081218768730', 17, 3, NULL, NULL),
(16, 'Diana Puri Syawaliah,  SE.Par', 'honeydee6@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198212022008012009', 'Kasubbagian Rencana Anggaran II Biro Perencanaan dan Organisasi', '081296929736', 13, 3, NULL, NULL),
(17, 'Mila Karima, SE,MM', 'milaakarima@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198110302009042006', 'Kasubbagian Evaluasi Biro Perencanaan dan Organisasi', '081250641307', 20, 3, NULL, NULL),
(18, 'Grace Maria, S.Ip, M.E', 'gracemariaginting@yahoo.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198208272009042011', 'Kasubbagian Data Biro Perencanaan dan Organisasi', '081382922565', 8, 3, NULL, NULL),
(19, 'Tiroi Sisruli Siahaan, S.Ip', 'tiroi.siahaan@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198512112011011009', 'Kasubbagian Tata Laksana Biro Perencanaan dan Organisasi', '0811171259', 18, 3, NULL, NULL),
(20, 'Dhika Hafizh Pratama, S.Sos', 'dhikahafizh@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198609092011012013', 'Kasubbagian Akuntabilitas Biro Perencanaan dan Organisasi', '081280966484', 19, 3, NULL, NULL),
(21, 'Amanda Abidin, SE.,Mba', 'amandaabidin9@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198707112009121002', 'Kasubbagian Rencana Anggaran I Biro Perencanaan dan Organisasi', '08568801986', 12, 3, NULL, NULL),
(22, 'Yudi Yudiana, SE,M.Ak', 'yudiana1987@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196606171987031005', 'Kasubbagian Rencana Program II Biro Perencanaan dan Organisasi', '08118809951', 10, 3, NULL, NULL),
(23, 'Sawiji Suprayitno, SH', 'maswiezie17@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196710191989031001', 'Arsiparis Muda Biro Perencanaan dan Organisasi', '082211861566', 19, NULL, NULL, NULL),
(24, 'Gunawan, SH', 'gunawanwan571@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196610161987032002', 'Perencana Pertama Biro Perencanaan dan Organisasi', '081221420051', NULL, NULL, NULL, NULL),
(25, 'Eli Haryani, SH', '', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198211032009041004', 'Analis Perencanaan Anggaran Biro Perencanaan dan Organisasi', '082125821966', 22, NULL, NULL, NULL),
(26, 'Fiqhi Hanief Al Islamy, S.Kom', 'fiqhihanief@yahoo.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198302042009121005', 'Analis Rencana Program dan Kegiatan Biro Perencanaan dan Organisasi', '081387047608', 14, NULL, NULL, NULL),
(27, 'Rizqi Widi Feirdani, SE', 'rizqiwidifeirdani@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198309212009122004', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '081297154842', 21, NULL, NULL, NULL),
(28, 'Yovi Silfani, SE,MM', 'yovisilfani@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198503152011012017', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085263461949', 20, NULL, NULL, NULL),
(29, 'Andi Hikmawati , S.Sos,MH', 'hikmaneh_hikma@yahoo.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198604122009042008', 'Analis Perencanaan Anggaran Biro Perencanaan dan Organisasi', '081311001572', 12, NULL, NULL, NULL),
(30, 'Ida Ariani, SE,MH', 'arianipane@yahoo.co.id', '1476325825', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198601242015032003', 'Analis Monitoring dan Evaluasi Pelaksanaan Anggaran Biro Perencanaan dan Organisasi', '085710518505', 15, NULL, NULL, NULL),
(31, 'Sentosawati Catur Putri, S.Ip', 'sentosaputri24@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198605252009042003', 'Analis Rencana Program dan Kegiatan  Biro Perencanaan dan Organisasi', '087878737221', 10, NULL, NULL, NULL),
(32, 'Indah Wahyuni, SE,MM', 'indah255@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198701172015032003', 'Penyusun RKA Biro Perencanaan dan Organisasi', '081282869797', 9, NULL, NULL, NULL),
(33, 'Rina Alprini, S.Pt', 'rina.alprini@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198807292015031002', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '81806546303', 21, NULL, NULL, NULL),
(34, 'Purwanto, S.P', 'purwanto.mari@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198908222015031002', 'Analis Rencana Program dan Kegiatan  Biro Perencanaan dan Organisasi', '087875794676', 14, NULL, NULL, NULL),
(35, 'Muhammad Mahatir, S.Kom', 'mahatir.muhammad22@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '199410032019032007', 'Analis Perencanaan Anggaran  Biro Perencanaan dan Organisasi', '081294771228', 22, NULL, NULL, NULL),
(36, 'Andrea Arimurti, SH', 'andreaarimurti94@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196804101989031001', 'Analis Tata Laksana  Biro Perencanaan dan Organisasi', '087785176036', 18, NULL, NULL, NULL),
(37, 'Ujang Misnan', 'ujangmisnan@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198909042019031008', 'Pengadministrasi Persuratan Biro Perencanaan dan Organisasi', '081284202788', 1, NULL, NULL, NULL),
(38, 'Bimo Prakoso, A.Md.', 'bp.bimoprakoso@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', 'AE7Vok8ZFjmfEceMTyF5YYyoHTqvNIlk41VzClrgkMKCIkm5UYBW6prokJY6', '199212072019032010', 'Pengelola Data Biro Perencanaan dan Organisasi', '08111797747', 17, NULL, NULL, NULL),
(39, 'Debora Putri Tambunan, A.Md', 'debora11008putri@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '199212072019032010', 'Pengelola Sistem dan Jaringan Biro Perencanaan dan Organisasi', '085275055649', 20, NULL, NULL, NULL),
(53, 'Muktar', 'mukhtar82.ab@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian  Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085692766050', 21, NULL, NULL, NULL),
(54, 'Atmazuki', 'atmazuki1207@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring Biro Perencanaan dan Organisasi', '089635000520', 15, NULL, NULL, NULL),
(55, 'Arief Ridwan', 'arief.renog@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring pada Tata Usaha Biro Perencanaan dan Organisasi', '08567991842', 1, NULL, NULL, NULL),
(56, 'Rahman', 'rachman778@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081387646404', 13, NULL, NULL, NULL),
(57, 'Astania Dwi Wahyu', 'nhiepocha@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian  Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085746412333', 20, NULL, NULL, NULL),
(58, 'Fajar Amirulah', 'fajar_yual@yahoo.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '081310010007', 9, NULL, NULL, NULL),
(59, 'Desfran Subhan', 'desfransubhan20@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Organisasi dan Tata Laksana Biro Perencanaan dan Organisasi', '082110127771', 17, NULL, NULL, NULL),
(60, 'Savira Rianda Ariani', 'savirarara89@yahoo.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring pada Tata Usaha Biro Perencanaan dan Organisasi', '08113571289', 1, NULL, NULL, NULL),
(61, 'Muhammad Indra', 'indraflacks92@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '085691486456', 8, NULL, NULL, NULL),
(62, 'Nursidik', 'siddiqnur81@gmail.com.', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081281800446', NULL, NULL, NULL, NULL),
(63, 'Hadi Saputro', 'hadi_s216@yahoo.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081398594449', NULL, NULL, NULL, NULL),
(64, 'Wimbo Bramantyo', 'bramantyo.wimbo@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '081333357830', 10, NULL, NULL, NULL),
(65, 'Kasubag Analisis Renog', 'analisisrenog@gmail.com', NULL, NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, 'Kasubbagian Analisis Biro Perencanaan dan Organisasi', NULL, 22, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_salah`
--

CREATE TABLE `users_salah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_unit_kerja` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_jabatan` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_salah`
--

INSERT INTO `users_salah` (`id`, `name`, `email`, `telegram_id`, `email_verified_at`, `password`, `remember_token`, `nip`, `jabatan`, `no_hp`, `foto`, `id_unit_kerja`, `id_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, NULL, '$2y$10$n1QtV3K293qYBtQgu3UqjuUrNzQCoj0Bf.o3dl9rsQuGYTT1zffCC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-01 20:21:23', '2020-12-01 20:21:23'),
(2, 'Joko Upoyo Pribadi, SH.,MH', 'jokoupoyo@gmail.com', NULL, NULL, '$2y$10$LhtHtiTqXlhzpw2seNSNke9xdxNbTUbe7ayiQCz9Kx2cnkT50BEbS', NULL, '196903211994031002', 'Kepala Biro Perencanaan dan Organisasi', '085772090909', '26098.jpeg', 2, 1, NULL, NULL),
(3, 'Drs. H. Arifin Samsurijal, SH.,MH', 'arifinsamsu67@gmail.com', NULL, NULL, '$2y$10$wtQr1MTLuirfatjDPOc/vO.hSeFO3nuwQHwL.Th60N023I5d0y8vy', NULL, '196610161990021001', 'Kepala Bagian Rencana dan Program  Biro Perencanaan dan Organisasi', '081287814055', '24382.jpg', 7, 2, NULL, NULL),
(4, 'Didik Purwanto, S.H., M.M.', 'dikasagita11@yahoo.co.id', NULL, NULL, '$2y$10$gdtA5pc2jXdZDZMz2.HFWu2r6.YRJsxvof4P1w6KdwbliVo0VEWL6', NULL, '196911231989031001', 'Kepala Bagian Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '081315735007', '26528.jpg', 6, 2, NULL, NULL),
(5, 'El Damara,  SE,SH,MM', 'eldamkaray8@gmail.com', NULL, NULL, '$2y$10$HdUGeI.A2ZCUoHZ8kezKFOAq7.aiZTtpXsHbbLLwCtQ03yRjHHRHm', NULL, '197303242002121006', 'Kepala Bagian Bimbingan dan Monitoring Biro Perencanaan dan Organisasi', '081280808773', '5983_5983.jpg', 4, 2, NULL, NULL),
(6, 'Edi Yuniadi, S.Sos, MM', 'ediyuniadi@gmail.com', NULL, NULL, '$2y$10$MD9QgnYsj1eCqeHgm1IcgOYG1wnrHcX8Q34x60dnuI3ewU2lmexCC', 't3MMeURH6a763jzCDGuimqJNIrXn4RS2d6QC5C6RSLhVqVXORA4WdG3ElxSo', '197306011994021001', 'Kepala Bagian Organisasi dan Tata Laksana Biro Perencanaan dan Organisasi', '081319042632', '28126_28126.jpg', 3, 2, NULL, NULL),
(7, 'Untung Hermawan, ST', 'hermawanuntung@gmail.com', NULL, NULL, '$2y$10$Gyzq8aJlnlXgciWuZSnyceWEQwDHlgV15942X/o7d7FnDt2pSdHRS', NULL, '197702212002121002', 'Kepala Bagian Penyusunan Rencana Anggaran  Biro Perencanaan dan Organisasi', '085811188667', '29421.jpg', 5, 2, NULL, NULL),
(8, 'Yus Natin, S.Sos, MM', 'yusnatinn@gmail.com', NULL, NULL, '$2y$10$KtDnBRTUSSSHdtE.3X7Fges2I7157nv7BTLmalbJIdp6TWNzIbCqu', NULL, '196306301983032001', 'Kasubbagian Pelaporan Biro Perencanaan dan Organisasi', '085770920235', '21114.jpg', 21, 3, NULL, NULL),
(9, 'Syaiful Arif, SH.,M.Si', 'syaiful.poros@gmail.com', NULL, NULL, '$2y$10$jh0TUk2ffgibrWh.B/4M9uXzSegXCljeGbOqZcPYIBulIfp1ILWeW', NULL, '196603101987031001', 'Kasubbagian Bimbingan dan Monitoring Penganggaran Biro Perencanaan dan Organisasi', '085214750481', '19116.jpg', 15, 3, NULL, NULL),
(10, 'Teguh Magzan, SH', 'magzant@yahoo.co.id', NULL, NULL, '$2y$10$IuUoreHBFC3K9KWCZGFObeXbhwsZcTzu9aLxRS4NsnMvouzTxunv2', NULL, '197508042003121001', 'Kasubbagian Rencana Program I Biro Perencanaan dan Organisasi', '082213707775', '3725.jpg', 9, 3, NULL, NULL),
(11, 'Titi Suprapti, SH, MM', 'titisuprapti125@gmail.com', NULL, NULL, '$2y$10$Q33MVqJdWNVVDTcQNZnQnesvoSISjax0rVYSdQYQdeynDmcMqEt8G', 'fU7y1J1x6TVn1Vc9oVJcEDEd0qRLnaC6OiTUUyIzK3lAgk6NtyVQ9cORuZ5G', '196805121989032002', 'Kasubbagian Tata Usaha Biro Perencanaan dan Organisasi', '081281999714', '8564.jpg', 1, 3, NULL, NULL),
(12, 'Emie Yuliati, SE, ME', 'emieyuliati@gmail.com', NULL, NULL, '$2y$10$iVT1HHDxPxE9SeSGTXTJUu2R.d6EAyEwm2seRkUqYJE0OKLSC5qaa', NULL, '197405062006042001', 'Kasubbagian Bimbingan dan Monitoring Penyelenggaraan Program Biro Perencanaan dan Organisasi', '08118603902', '10792_10792.jpg', 14, 3, NULL, NULL),
(13, 'Retno Widuri, S.Kom, MH', 'rtnwiduri@gmail.com', NULL, NULL, '$2y$10$/KkUpTG9iwYrWyM4pyRhcud6JK8QSvBPj9VvVDl9UTzyhK6HCHJ5y', 'wym1hdgodjFtozTpm4Gfq6u1TlpRScfCeGUyxFlsCnG25q46tXT6MvBpJGBT', '197710122005022001', 'Kasubbagian Organisasi Biro Perencanaan dan Organisasi', '081218768730', '19907.jpg', 17, 3, NULL, NULL),
(14, 'Diana Puri Syawaliah,  SE.Par', 'honeydee6@gmail.com', NULL, NULL, '$2y$10$FBnfmKuQI4hAJDomiS49euPWeWJPwJa9QEEaxYhnvzyA3lOhwMq4y', NULL, '198212022008012009', 'Kasubbagian Rencana Anggaran II Biro Perencanaan dan Organisasi', '081296929736', '3724.jpg', 13, 3, NULL, NULL),
(15, 'Mila Karima, SE,MM', 'milaakarima@gmail.com', NULL, NULL, '$2y$10$NZ/X30VPxz9Bo6GydrfNxuWBT1BId3YbK5EjK8K.qrli47o/QSFrm', NULL, '198110302009042006', 'Kasubbagian Evaluasi Biro Perencanaan dan Organisasi', '081250641307', '31371.jpg', 20, 3, NULL, NULL),
(16, 'Grace Maria, S.Ip, M.E', 'gracemariaginting@yahoo.com', NULL, NULL, '$2y$10$1Yp86lMRDlByWiVIZbA0ueEjhPds6VM3AB0/EWVu4wkodJR/qIP5G', NULL, '198208272009042011', 'Kasubbagian Data Biro Perencanaan dan Organisasi', '081382922565', '31748.jpg', 8, 3, NULL, NULL),
(17, 'Tiroi Sisruli Siahaan, S.Ip', 'tiroi.siahaan@gmail.com', NULL, NULL, '$2y$10$m8F7MrfR8wewAKNsUube9ObU9GKD5semydwQLlpbJO9mEMtYH59lW', NULL, '198512112011011009', 'Kasubbagian Tata Laksana Biro Perencanaan dan Organisasi', '0811171259', '33347.jpg', 18, 3, NULL, NULL),
(18, 'Dhika Hafizh Pratama, S.Sos', 'dhikahafizh@gmail.com', NULL, NULL, '$2y$10$DzKURDMpUFiGIY294v2GGeth81m5H15UqZZT4j//igS2uSFLBQR72', NULL, '198609092011012013', 'Kasubbagian Akuntabilitas Biro Perencanaan dan Organisasi', '081280966484', '33678.jpg', 19, 3, NULL, NULL),
(19, 'Amanda Abidin, SE.,Mba', 'amandaabidin9@gmail.com', NULL, NULL, '$2y$10$mYmZiWyNHjB8VSVFH19gG.VzW4J1VKEEdmHCiD4r/5p1z2DG0H9EK', NULL, '198707112009121002', 'Kasubbagian Rencana Anggaran I Biro Perencanaan dan Organisasi', '08568801986', '34004.jpg', 12, 3, NULL, NULL),
(20, 'Yudi Yudiana, SE,M.Ak', 'yudiana1987@gmail.com', NULL, NULL, '$2y$10$NOrkHvpN0eH.23LSf8w0DOS9IfVhkOLDWqW/mOsESyiFnT8lCIEq6', NULL, '196606171987031005', 'Kasubbagian Rencana Program II Biro Perencanaan dan Organisasi', '08118809951', '30254.jpg', 10, 3, NULL, NULL),
(21, 'Sawiji Suprayitno, SH', 'maswiezie17@gmail.com', NULL, NULL, '$2y$10$mbw.D.qSv4bkBaTGkFzQFO7a6D/wYWlqv6w.uUQYiVHoUoQXWelJW', NULL, '196710191989031001', 'Arsiparis Muda Biro Perencanaan dan Organisasi', '082211861566', '15603.jpg', 19, NULL, NULL, NULL),
(22, 'Gunawan, SH', 'gunawanwan571@gmail.com', NULL, NULL, '$2y$10$18VbKi7.ksJAh3sNuZflxOGyeXd1/3zsevw2FgD.QV.ujcrVxRQTK', NULL, '196610161987032002', 'Perencana Pertama Biro Perencanaan dan Organisasi', '081221420051', NULL, NULL, NULL, NULL, NULL),
(23, 'Eli Haryani, SH', '', NULL, NULL, '$2y$10$iCDVnHoMQ3YNE5Jdf4q4Neu2nIaDCcKpxxm5nS1F8wMTHANMDOvMO', NULL, '198211032009041004', 'Analis Perencanaan Anggaran Biro Perencanaan dan Organisasi', '082125821966', '31834.jpg', 22, NULL, NULL, NULL),
(24, 'Fiqhi Hanief Al Islamy, S.Kom', 'fiqhihanief@yahoo.com', NULL, NULL, '$2y$10$il5vTyCUicTznKzWgIaWmuMcIUw7uLLITikPNhAg70GEWjigvmfDy', NULL, '198302042009121005', 'Analis Rencana Program dan Kegiatan Biro Perencanaan dan Organisasi', '081387047608', '8537.jpg', 14, NULL, NULL, NULL),
(25, 'Rizqi Widi Feirdani, SE', 'rizqiwidifeirdani@gmail.com', NULL, NULL, '$2y$10$oObwm6enLCcNobUWPnWmBeyms6PGJ7tPZKw/1SpMx3zXYGpLFs3Ii', NULL, '198309212009122004', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '081297154842', '32236_32236.jpg', 21, NULL, NULL, NULL),
(26, 'Yovi Silfani, SE,MM', 'yovisilfani@gmail.com', NULL, NULL, '$2y$10$RhsPm.r6aKCVsW75IxU4d.WaxH4V9fF81nbkAslUrBMkydJHKiYLi', NULL, '198503152011012017', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085263461949', '32972_32972.jpg', 20, NULL, NULL, NULL),
(27, 'Andi Hikmawati , S.Sos,MH', 'hikmaneh_hikma@yahoo.com', NULL, NULL, '$2y$10$90dIAeaYzo.Nq6Zl/VYGo.0LQSzsJsA5VcP0xTjWIuhji0/A3geG6', NULL, '198604122009042008', 'Analis Perencanaan Anggaran Biro Perencanaan dan Organisasi', '081311001572', '2311.jpg', 12, NULL, NULL, NULL),
(28, 'Ida Ariani, SE,MH', 'arianipane@yahoo.co.id', '1476325825', NULL, '$2y$10$.OdujemeYlvf5fgq66ofcuwZ6FP6ceXFyk9mP7S4xcfRCnbexydqC', NULL, '198601242015032003', 'Analis Monitoring dan Evaluasi Pelaksanaan Anggaran Biro Perencanaan dan Organisasi', '085710518505', '12572_12572.jpg', 15, NULL, NULL, NULL),
(29, 'Sentosawati Catur Putri, S.Ip', 'sentosaputri24@gmail.com', NULL, NULL, '$2y$10$C0sHGilGipcVv/swZ.gmC.OdosF/tpE7X8aaPLaUjCr5Upuktm11y', NULL, '198605252009042003', 'Analis Rencana Program dan Kegiatan  Biro Perencanaan dan Organisasi', '087878737221', '33546_33546.jpg', 10, NULL, NULL, NULL),
(30, 'Indah Wahyuni, SE,MM', 'indah255@gmail.com', NULL, NULL, '$2y$10$XBH85F8kSOiiYgVwmcYWVuvcEWbKsL28Hnp3fY0qhV5yyiiKxM3he', NULL, '198701172015032003', 'Penyusun RKA Biro Perencanaan dan Organisasi', '081282869797', '26641_26641.jpg', 9, NULL, NULL, NULL),
(31, 'Rina Alprini, S.Pt', 'rina.alprini@gmail.com', NULL, NULL, '$2y$10$F4qoK7GG4Ti6lKWv//XG5Oja4pG9p2a/NueaZyjQ9T7kudDaPANYi', NULL, '198807292015031002', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '81806546303', '16175.jpg', 21, NULL, NULL, NULL),
(32, 'Purwanto, S.P', 'purwanto.mari@gmail.com', NULL, NULL, '$2y$10$4UyPGdySoHu6bytYVOwFCeLr3EVELyImAUBJjp0lDT/TuRfE5GxW2', NULL, '198908222015031002', 'Analis Rencana Program dan Kegiatan  Biro Perencanaan dan Organisasi', '087875794676', '5836.jpg', 14, NULL, NULL, NULL),
(33, 'Muhammad Mahatir, S.Kom', 'mahatir.muhammad22@gmail.com', NULL, NULL, '$2y$10$YOJk2nPmp0fWUAnkQZNU.edGZ6L8bMp6hzoQe.mZAm6xykZ8lI6A.', NULL, '199410032019032007', 'Analis Perencanaan Anggaran  Biro Perencanaan dan Organisasi', '081294771228', '37526.jpg', 22, NULL, NULL, NULL),
(34, 'Andrea Arimurti, SH', 'andreaarimurti94@gmail.com', NULL, NULL, '$2y$10$gr/2Zd2CLl/kRHvbvnZj0OSSxVh74NQ.9HV3i1c4l.WzfP1CRlZ3q', NULL, '196804101989031001', 'Analis Tata Laksana  Biro Perencanaan dan Organisasi', '087785176036', NULL, 18, NULL, NULL, NULL),
(35, 'Ujang Misnan', 'ujangmisnan@gmail.com', NULL, NULL, '$2y$10$TMRYW3U8pmtiNwERoCU01er.hok.nN.9MeFie4mtizpNjCQw38li6', NULL, '198909042019031008', 'Pengadministrasi Persuratan Biro Perencanaan dan Organisasi', '081284202788', '38110.jpg', 1, NULL, NULL, NULL),
(36, 'Bimo Prakoso, A.Md.', 'bp.bimoprakoso@gmail.com', NULL, NULL, '$2y$10$MtS4K//6erhPjqSarX78L.w/f1/nDyX8CaYRpxY5yj9OIIh.9RhBu', 'AE7Vok8ZFjmfEceMTyF5YYyoHTqvNIlk41VzClrgkMKCIkm5UYBW6prokJY6', '199212072019032010', 'Pengelola Data Biro Perencanaan dan Organisasi', '08111797747', '37323.jpeg', 17, NULL, NULL, NULL),
(37, 'Debora Putri Tambunan, A.Md', 'debora11008putri@gmail.com', NULL, NULL, '$2y$10$5Y7EgrwfITxF2l.rptnmW.8vsE8o9bMaYGQ49YRxq8Gy2Y3l8nwd.', NULL, '199212072019032010', 'Pengelola Sistem dan Jaringan Biro Perencanaan dan Organisasi', '085275055649', '37323.jpeg', 20, NULL, NULL, NULL),
(38, 'Muktar', 'mukhtar82.ab@gmail.com', NULL, NULL, '$2y$10$rOTqyphuxSDtKsxINiEl2ufiKaFAq84vSIaVH2MKETqUr6WCFayka', NULL, '', 'PPNPN Bagian  Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085692766050', NULL, 21, NULL, NULL, NULL),
(39, 'Atmazuki', 'atmazuki1207@gmail.com', NULL, NULL, '$2y$10$Ywps3aemmpFFmyHPzhFfxOyTPQ7D9Rw9chCZUhdKLQ1/a.C03WdFq', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring Biro Perencanaan dan Organisasi', '089635000520', NULL, 15, NULL, NULL, NULL),
(40, 'Arief Ridwan', 'arief.renog@gmail.com', NULL, NULL, '$2y$10$ZJFFDIzSkrywEhbasgYDyelOKyZECRrb55mkW5Ofn0p7LGSFTGXmW', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring pada Tata Usaha Biro Perencanaan dan Organisasi', '08567991842', NULL, 1, NULL, NULL, NULL),
(41, 'Rahman', 'rachman778@gmail.com', NULL, NULL, '$2y$10$7FXxfRsZYOduSR5Fmyt88OfKj2CWFGGCANajTTSransd03xFbN6VK', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081387646404', NULL, 13, NULL, NULL, NULL),
(42, 'Astania Dwi Wahyu', 'nhiepocha@gmail.com', NULL, NULL, '$2y$10$arscdv0FfpaZDy7U/S0vruSRHvrEl9IjKyIfxJlUic5BsW6mi19Ae', NULL, '', 'PPNPN Bagian  Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085746412333', NULL, 20, NULL, NULL, NULL),
(43, 'Fajar Amirulah', 'fajar_yual@yahoo.com', NULL, NULL, '$2y$10$MD.J10IFqgMZUBEHltw4YO.XyZGN/s2xbuF0ChXaKNA26NpspdXWO', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '081310010007', NULL, 9, NULL, NULL, NULL),
(44, 'Desfran Subhan', 'desfransubhan20@gmail.com', NULL, NULL, '$2y$10$aXLBAaUk8MzO3KFggFgQaOly7pBTyaXT5B3KUbFVOhV39ojWXkYWa', NULL, '', 'PPNPN Bagian Organisasi dan Tata Laksana Biro Perencanaan dan Organisasi', '082110127771', NULL, 17, NULL, NULL, NULL),
(45, 'Savira Rianda Ariani', 'savirarara89@yahoo.com', NULL, NULL, '$2y$10$nMJZEaWnlpxLMZ3lrDRO3enK.UwiWJolSZcdw.Vpco9KsLebfB56q', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring pada Tata Usaha Biro Perencanaan dan Organisasi', '08113571289', NULL, 1, NULL, NULL, NULL),
(46, 'Muhammad Indra', 'indraflacks92@gmail.com', NULL, NULL, '$2y$10$iNpNET.rzHmWz9fge5zweuAe4tr8JK2L/AoEJLCCETqEmx4EB8MpC', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '085691486456', NULL, 8, NULL, NULL, NULL),
(47, 'Nursidik', 'siddiqnur81@gmail.com.', NULL, NULL, '$2y$10$Z/g2OCQrpRbZlTHYTVBdiu7ksitG9sV21Hhf0PutFWLaV3YPXQg0K', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081281800446', NULL, NULL, NULL, NULL, NULL),
(48, 'Hadi Saputro', 'hadi_s216@yahoo.com', NULL, NULL, '$2y$10$YbyQzjuUUh8q9ZqCiiUvTOjvFL8l7yrElnptDc2RMKPPQoDtQ8zTe', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081398594449', NULL, NULL, NULL, NULL, NULL),
(49, 'Wimbo Bramantyo', 'bramantyo.wimbo@gmail.com', NULL, NULL, '$2y$10$mPclCPodOZ0dwQXDBUTDG.SPixbM7QJckeBZDDPcmlEisHBl5fQuG', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '081333357830', NULL, 10, NULL, NULL, NULL),
(50, 'Kasubag Analisis Renog', 'analisisrenog@gmail.com', NULL, NULL, '$2y$10$l7R8EQN2ZIgUZo54dmaOLemTd9ndlnfOGyhXKRr44dpm3nVOzEt0K', NULL, NULL, 'Kasubbagian Analisis Biro Perencanaan dan Organisasi', NULL, NULL, 22, 3, NULL, NULL);

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
-- Indexes for table `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_konsep_surat` (`id_konsep_surat`),
  ADD KEY `id_surat_keluar` (`id_surat_keluar`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `trans_counter_surat`
--
ALTER TABLE `trans_counter_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_diskusi_surat`
--
ALTER TABLE `trans_diskusi_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat_masuk` (`id_surat_masuk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `trans_disposisi_pimpinan`
--
ALTER TABLE `trans_disposisi_pimpinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat_masuk` (`id_surat_masuk`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `trans_disposisi_surat`
--
ALTER TABLE `trans_disposisi_surat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trans_disposisi_surat_unique` (`id_surat_masuk`,`id_arahan_surat_dari`,`id_arahan_surat`,`id_arahan_surat_iduser`),
  ADD KEY `id_surat_masuk` (`id_surat_masuk`),
  ADD KEY `id_arahan_surat` (`id_arahan_surat`),
  ADD KEY `id_status_disposisi` (`id_status_disposisi`);

--
-- Indexes for table `trans_dokumen_surat`
--
ALTER TABLE `trans_dokumen_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat_masuk` (`id_surat_masuk`),
  ADD KEY `id_jenis_file` (`id_jenis_file`);

--
-- Indexes for table `trans_file_surat_keluar`
--
ALTER TABLE `trans_file_surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat_keluar` (`id_surat_keluar`),
  ADD KEY `id_jenis_dokumen` (`id_jenis_dokumen`),
  ADD KEY `id_jenis_file` (`id_jenis_file`);

--
-- Indexes for table `trans_file_tanggapan`
--
ALTER TABLE `trans_file_tanggapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_disposisi_surat` (`id_disposisi_surat`),
  ADD KEY `id_jenis_dokumen` (`id_jenis_dokumen`),
  ADD KEY `id_jenis_file` (`id_jenis_file`);

--
-- Indexes for table `trans_memo_disposisi`
--
ALTER TABLE `trans_memo_disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_disposisi_surat` (`id_disposisi_surat`);

--
-- Indexes for table `trans_surat_keluar`
--
ALTER TABLE `trans_surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sifat_keamanan_surat` (`id_sifat_keamanan_surat`),
  ADD KEY `id_sifat_penyelesaian_surat` (`id_sifat_penyelesaian_surat`);

--
-- Indexes for table `trans_surat_keluar_konsep`
--
ALTER TABLE `trans_surat_keluar_konsep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sifat_keamanan_surat` (`id_sifat_keamanan_surat`),
  ADD KEY `id_sifat_penyelesaian_surat` (`id_sifat_penyelesaian_surat`);

--
-- Indexes for table `trans_surat_masuk`
--
ALTER TABLE `trans_surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `surat_masuk_nomor_surat` (`nomor_surat`),
  ADD KEY `id_sifat_keamanan_surat` (`id_sifat_keamanan_surat`),
  ADD KEY `id_sifat_penyelesaian_surat` (`id_sifat_penyelesaian_surat`),
  ADD KEY `id_asal_ekspedisi_surat_masuk` (`id_asal_ekspedisi_surat_masuk`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat_masuk`);

--
-- Indexes for table `trans_tembusan_surat`
--
ALTER TABLE `trans_tembusan_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat_masuk` (`id_surat_masuk`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `tref_arahan_surat`
--
ALTER TABLE `tref_arahan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tref_asal_ekspedisi_surat_masuk`
--
ALTER TABLE `tref_asal_ekspedisi_surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tref_jenis_disposisi`
--
ALTER TABLE `tref_jenis_disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tref_jenis_dokumen`
--
ALTER TABLE `tref_jenis_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tref_jenis_file`
--
ALTER TABLE `tref_jenis_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tref_jenis_surat_masuk`
--
ALTER TABLE `tref_jenis_surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tref_sifat_keamanan_surat`
--
ALTER TABLE `tref_sifat_keamanan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tref_sifat_penyelesaian_surat`
--
ALTER TABLE `tref_sifat_penyelesaian_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tref_status_disposisi`
--
ALTER TABLE `tref_status_disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tref_status_mailbox`
--
ALTER TABLE `tref_status_mailbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tref_unit`
--
ALTER TABLE `tref_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_asli`
--
ALTER TABLE `users_asli`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_salah`
--
ALTER TABLE `users_salah`
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
-- AUTO_INCREMENT for table `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_counter_surat`
--
ALTER TABLE `trans_counter_surat`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trans_diskusi_surat`
--
ALTER TABLE `trans_diskusi_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_disposisi_pimpinan`
--
ALTER TABLE `trans_disposisi_pimpinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trans_disposisi_surat`
--
ALTER TABLE `trans_disposisi_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `trans_dokumen_surat`
--
ALTER TABLE `trans_dokumen_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trans_file_surat_keluar`
--
ALTER TABLE `trans_file_surat_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_file_tanggapan`
--
ALTER TABLE `trans_file_tanggapan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `trans_memo_disposisi`
--
ALTER TABLE `trans_memo_disposisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_surat_keluar`
--
ALTER TABLE `trans_surat_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_surat_keluar_konsep`
--
ALTER TABLE `trans_surat_keluar_konsep`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trans_surat_masuk`
--
ALTER TABLE `trans_surat_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `trans_tembusan_surat`
--
ALTER TABLE `trans_tembusan_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tref_arahan_surat`
--
ALTER TABLE `tref_arahan_surat`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tref_asal_ekspedisi_surat_masuk`
--
ALTER TABLE `tref_asal_ekspedisi_surat_masuk`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tref_jenis_disposisi`
--
ALTER TABLE `tref_jenis_disposisi`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tref_jenis_dokumen`
--
ALTER TABLE `tref_jenis_dokumen`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tref_jenis_file`
--
ALTER TABLE `tref_jenis_file`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tref_jenis_surat_masuk`
--
ALTER TABLE `tref_jenis_surat_masuk`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tref_sifat_keamanan_surat`
--
ALTER TABLE `tref_sifat_keamanan_surat`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tref_sifat_penyelesaian_surat`
--
ALTER TABLE `tref_sifat_penyelesaian_surat`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tref_status_disposisi`
--
ALTER TABLE `tref_status_disposisi`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tref_status_mailbox`
--
ALTER TABLE `tref_status_mailbox`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tref_unit`
--
ALTER TABLE `tref_unit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `users_asli`
--
ALTER TABLE `users_asli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users_salah`
--
ALTER TABLE `users_salah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mailbox`
--
ALTER TABLE `mailbox`
  ADD CONSTRAINT `mailbox_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users_salah` (`id`),
  ADD CONSTRAINT `mailbox_ibfk_4` FOREIGN KEY (`id_konsep_surat`) REFERENCES `trans_surat_keluar_konsep` (`id`),
  ADD CONSTRAINT `mailbox_ibfk_5` FOREIGN KEY (`id_surat_keluar`) REFERENCES `trans_surat_keluar` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
