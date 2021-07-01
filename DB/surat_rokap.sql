-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 05:02 PM
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
(2, 2, 1, 'Kepala Biro Perlengkapan', NULL, NULL, NULL),
(3, 2, 2, 'Kepala Bagian IKN', NULL, NULL, NULL),
(4, 2, 2, 'Kepala Bagian Bimon', NULL, NULL, NULL),
(5, 2, 2, 'Kepala Bagian PB I', NULL, NULL, NULL),
(6, 2, 2, 'Kepala Bagian Penghapusan', NULL, NULL, NULL),
(7, 2, 2, 'Kepala Bagian PB II', NULL, NULL, NULL),
(8, 7, 3, 'Kepala Sub. Bagian Evaluasi Pengadaan Barang II', NULL, NULL, NULL),
(9, 7, 3, 'Kepala Sub. Bagian Analisa Kebutuhan Barang II', NULL, NULL, NULL),
(10, 7, 3, 'Kepala Sub. Bagian Analisa Standarisasi Pengadaan Barang II', NULL, NULL, NULL),
(11, 5, 3, 'Kepala Sub. Bagian Analisa Evaluasi Pengadaan Barang I', NULL, NULL, NULL),
(12, 5, 3, 'Kepala Sub. Bagian Analisa Kebutuhan Barang I', NULL, NULL, NULL),
(13, 5, 3, 'Kepala Sub. Bagian Analisa Standarisasi Pengadaan Barang I', NULL, NULL, NULL),
(14, 4, 3, 'Kepala Sub. Bagian Bimbingan Dan Monitoring A', NULL, NULL, NULL),
(15, 4, 3, 'Kepala Sub. Bagian Bimbingan Dan Monitoring B', NULL, NULL, NULL),
(16, 4, 3, 'Kepala Sub. Bagian Bimbingan Dan Monitoring C', NULL, NULL, NULL),
(17, 3, 3, 'Kepala Sub. Bagian Pendataan', NULL, NULL, NULL),
(18, 3, 3, 'Kepala Sub. Bagian Pembukuan dan Neraca', NULL, NULL, NULL),
(19, 3, 3, 'Kepala Sub. Bagian Statistik dan Pelaporan', NULL, NULL, NULL),
(20, 6, 3, 'Kepala Sub. Bagian Standarisasi Dan Penilaian', NULL, NULL, NULL),
(21, 6, 3, 'Kepala Sub. Bagian Stakap', NULL, NULL, NULL);

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
(3, 'Surat masuk langsung', NULL, NULL, NULL),
(4, 'Email', NULL, NULL, NULL);

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
(3, 'kepala sub bagian', NULL),
(NULL, 'staff', NULL);

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
(2, 'Memo', 'Memorandum', NULL, NULL, NULL),
(3, 'Surat Keterangan', 'Surat Keterangan', NULL, NULL, NULL),
(4, 'Surat Pengantar', 'Surat Pengantar', NULL, NULL, NULL),
(5, 'Undangan', 'Undangan', NULL, NULL, NULL);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telegram_id`, `email_verified_at`, `password`, `remember_token`, `nip`, `jabatan`, `no_hp`, `foto`, `id_unit_kerja`, `id_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '404', NULL, NULL, NULL, NULL, NULL, '2020-12-01 20:21:23', '2020-12-01 20:21:23'),
(4, 'Rosfiana', 'rosfiana@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196406121987032003', NULL, NULL, NULL, 2, 1, NULL, NULL),
(5, 'Fany Widia', 'fany.pria@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197202042002121004', NULL, NULL, NULL, 7, 2, NULL, NULL),
(6, 'Muji Waluyo', 'mujiw@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196410311987031003', NULL, NULL, NULL, 6, 2, NULL, NULL),
(7, 'Irwansyah', 'irwansyah@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196804291988031001', NULL, NULL, NULL, 4, 2, NULL, NULL),
(8, 'Yudi Cahyadi', 'yudirokap@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197707162006041006', NULL, NULL, NULL, 3, 2, NULL, NULL),
(9, 'Supriyadi Gunawan', 'supriyadigunawan@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197009121990031001', NULL, NULL, NULL, 5, 2, NULL, NULL),
(11, 'Marsilah', 'marmarsilah@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', '0YXLLBuvRc3GYtfblwegphwBU57d44TvyC8Bu0CZYrVl9dmbPEAGcmDAWEuk', '196406011987032001', NULL, NULL, NULL, 1, 3, NULL, NULL),
(12, 'Arif Hidayat', 'rifaya75@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197505072009121003', NULL, NULL, NULL, 9, 3, NULL, NULL),
(13, 'Budi Hendrasti', 'bhendrasti@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196708011994032004', NULL, NULL, NULL, 15, 3, NULL, NULL),
(14, 'Adi Mardiansyah', 'adi.mardiansyah@mahkamahagung.go.id', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198803252011011012', NULL, NULL, NULL, 14, 3, NULL, NULL),
(15, 'M. Sam Umar Wiraharja', 'sam.wiraharja@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198303242011011005', NULL, NULL, NULL, 17, 3, NULL, NULL),
(16, 'Eko Prihanto', 'ziogos210905@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198412282005021001', '', NULL, NULL, 13, 3, NULL, NULL),
(17, 'Wahyu Dhimas', 'wahyu_0908@yahoo.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198210062008051001', NULL, NULL, NULL, 20, 3, NULL, NULL),
(18, 'Slamet Riyadi', 'slametriyadi6889@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196801011989031003', '', NULL, NULL, 8, 3, NULL, NULL),
(19, 'Dimas Aryo Putra', 'vand1m454p@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198212292009121005', NULL, NULL, NULL, 18, 3, NULL, NULL),
(20, 'Arif Setiadi', 'asetiadi.yadi@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198008072008051001', NULL, NULL, NULL, 19, 3, NULL, NULL),
(21, 'Fairuz Lazwardi', 'lazwardi2000@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198201182009041001', NULL, NULL, NULL, 12, 3, NULL, NULL),
(22, 'Isrul', 'isrul.sulaeman@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197002141999031002', NULL, NULL, NULL, 10, 3, NULL, NULL),
(23, 'Drajat Prakosa', 'drajatp@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198703082015031002', NULL, NULL, NULL, 19, NULL, NULL, NULL),
(24, 'Ratna Yunita', 'ratna_yunita78@yahoo.co.id', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197802062009042002', NULL, NULL, NULL, 20, NULL, NULL, NULL),
(25, 'Safrudin', 'safasafrudin583@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL),
(26, 'Anisa Dwi Yunianti', 'anisa.dwiyunianti@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '199706192020122009', NULL, NULL, NULL, 14, NULL, NULL, NULL),
(27, 'Lumaksono Sugiharto', 'lumaksono@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198105302006041002', NULL, NULL, NULL, 20, NULL, NULL, NULL),
(28, 'beatrix retta', 'bearttcl@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '199508222020122009', NULL, NULL, NULL, 20, NULL, NULL, NULL),
(29, 'Agus Wiguno', 'Agus Wiguno', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198703162019031004', NULL, NULL, NULL, 20, NULL, NULL, NULL),
(30, 'Ulfah Apriyani', 'ulfaha@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198603222011012000', NULL, NULL, NULL, 15, NULL, NULL, NULL),
(31, 'Eka Andi Mardani', 'ekaandi@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198710242020121003', NULL, NULL, NULL, 20, NULL, NULL, NULL),
(32, 'Fitri Darmayanti', 'fitrid@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198909052015032001', NULL, NULL, NULL, 20, NULL, NULL, NULL),
(33, 'Vera Rosmamalini', 'vera.rosmamalini@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, NULL, NULL, NULL, 20, NULL, NULL, NULL),
(34, 'Silvani Elsa Fitriana', 'silvani.fitriana@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '199007072019032011', NULL, NULL, NULL, 14, NULL, NULL, NULL),
(35, 'Wahyudin', 'wahyudin_wahyu83@yahoo.co.id', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL),
(36, 'Fidyanto Sandi Saputro', 'fidysandi@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198610192008051001', NULL, NULL, NULL, 18, NULL, NULL, NULL),
(37, 'Lian Ariyanto', 'lianariy46@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL),
(38, 'Kukuh Binanto', 'kukuhbinanto@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', 'AE7Vok8ZFjmfEceMTyF5YYyoHTqvNIlk41VzClrgkMKCIkm5UYBW6prokJY6', '199401242019031003', NULL, NULL, NULL, 17, NULL, NULL, NULL),
(39, 'Sukirman', 'jabat8989@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196310281989031004', NULL, NULL, NULL, 20, NULL, NULL, NULL),
(40, 'H. Muhammad Arief', 'fauziemarief@gmail.com', NULL, NULL, '$2y$10$C.psqek419UV3erOsdqXx.64v.1bctQEa/66PYNcwetNpZbXNZoGm', NULL, '196406141991031004', NULL, NULL, NULL, 16, 3, '2021-06-17 02:28:42', '2021-06-17 02:28:42'),
(41, 'Dhonik Boedy Agus', 'dhonikb@gmail.com', NULL, NULL, '$2y$10$Gz/P5a6ijIzmdWFe6KlGSuQkuO6uRdult3d5LTG91C3RFMUwKPeQe', NULL, '196508151989031006', NULL, NULL, NULL, 11, 3, '2021-06-17 02:46:49', '2021-06-17 02:46:49'),
(42, 'David Achmad Wijaya', 'vidski23@me.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198603022008051001', '', NULL, NULL, 13, NULL, NULL, NULL),
(43, 'Falcon Sihombing', 'falcon_sihombing@yahoo.co.id', NULL, NULL, '$2y$10$Gz/P5a6ijIzmdWFe6KlGSuQkuO6uRdult3d5LTG91C3RFMUwKPeQe', NULL, '198003242007041000', NULL, NULL, NULL, 11, NULL, '2021-06-17 02:46:49', '2021-06-17 02:46:49'),
(44, 'Purwanto', 'purwanto.ma1963@gmail.com', NULL, NULL, '$2y$10$Gz/P5a6ijIzmdWFe6KlGSuQkuO6uRdult3d5LTG91C3RFMUwKPeQe', NULL, '196306141986031003', NULL, NULL, NULL, 11, NULL, '2021-06-17 02:46:49', '2021-06-17 02:46:49'),
(45, 'Nur Rahmat Baskara', 'bugs.bagas@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198011022009121004', NULL, NULL, NULL, 10, NULL, NULL, NULL),
(46, 'Heni Lestari', 'henilestari.mari@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197204121999032001', '', NULL, NULL, 8, NULL, NULL, NULL),
(47, 'Devi Amelia', 'deviamelia84@ymail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198406072008052001', NULL, NULL, NULL, 9, NULL, NULL, NULL),
(53, 'Yunita', 'yunita170593@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', NULL, NULL, NULL, 17, NULL, NULL, NULL),
(54, 'Dian Anggraini', 'di4nanggraini10@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197805102006042003', NULL, NULL, NULL, 18, NULL, NULL, NULL),
(55, 'Hendro Prio Sasongko', 'hendrops@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', NULL, NULL, NULL, 18, NULL, NULL, NULL),
(56, 'Redimel Vischo', 'redimelvischo@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', NULL, NULL, NULL, 19, NULL, NULL, NULL),
(57, 'M. Syahnan Irawan', 'syahnanirawan86@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', NULL, NULL, NULL, 14, NULL, NULL, NULL),
(58, 'Andi Nurhasbi', 'andinurhasbi@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198404262009041003', NULL, NULL, NULL, 16, NULL, NULL, NULL),
(59, 'Endang Setyo Hartanti', 'endang0302@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197802032011012007', NULL, NULL, NULL, 17, NULL, NULL, NULL),
(60, 'Rina Lastriana', 'rina.lastriana1@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', NULL, NULL, NULL, 16, NULL, NULL, NULL),
(61, 'Ahmad Fauzi Ibrahim', 'halo.fauzi@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', NULL, NULL, NULL, 15, NULL, NULL, NULL),
(62, 'Antonius Adhi Irianto', 'axeldee7@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198405072011011007', NULL, NULL, NULL, 1, 1, NULL, NULL),
(63, 'A. Adriyanti Akbar', 'hadi_s216@yahoo.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198802052011012013', NULL, NULL, NULL, 1, 1, NULL, NULL),
(64, 'Desy Putriani P', 'putrianidesy@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL);

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
-- Table structure for table `users_backup`
--

CREATE TABLE `users_backup` (
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
-- Dumping data for table `users_backup`
--

INSERT INTO `users_backup` (`id`, `name`, `email`, `telegram_id`, `email_verified_at`, `password`, `remember_token`, `nip`, `jabatan`, `no_hp`, `foto`, `id_unit_kerja`, `id_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-01 20:21:23', '2020-12-01 20:21:23'),
(4, 'Joko Upoyo Pribadi, SH.,MH', 'jokoupoyo@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196903211994031002', 'Kepala Biro Perencanaan dan Organisasi', '085772090909', NULL, 2, 1, NULL, NULL),
(5, 'Drs. H. Arifin Samsurijal, SH.,MH', 'arifinsamsu67@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196610161990021001', 'Kepala Bagian Rencana dan Program  Biro Perencanaan dan Organisasi', '081287814055', NULL, 7, 2, NULL, NULL),
(6, 'Didik Purwanto, S.H., M.M.', 'dikasagita11@yahoo.co.id', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196911231989031001', 'Kepala Bagian Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '081315735007', NULL, 6, 2, NULL, NULL),
(7, 'El Damara,  SE,SH,MM', 'eldamkaray8@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197303242002121006', 'Kepala Bagian Bimbingan dan Monitoring Biro Perencanaan dan Organisasi', '081280808773', NULL, 4, 2, NULL, NULL),
(8, 'Edi Yuniadi, S.Sos, MM', 'ediyuniadi@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197306011994021001', 'Kepala Bagian Organisasi dan Tata Laksana Biro Perencanaan dan Organisasi', '081319042632', NULL, 3, 2, NULL, NULL),
(9, 'Untung Hermawan, ST', 'hermawanuntung@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197702212002121002', 'Kepala Bagian Penyusunan Rencana Anggaran  Biro Perencanaan dan Organisasi', '085811188667', NULL, 5, 2, NULL, NULL),
(10, 'Yus Natin, S.Sos, MM', 'yusnatinn@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196306301983032001', 'Kasubbagian Pelaporan Biro Perencanaan dan Organisasi', '085770920235', NULL, 21, 3, NULL, NULL),
(11, 'Titi Suprapti, SH, MM', 'titisuprapti125@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', 'e4qfoHGf56ndG4ZJGFprMpLK8rFYR2fkrO4wRmdIhIxbkomlhrmtoaBzqTLG', '196805121989032002', 'Kasubbagian Tata Usaha Biro Perencanaan dan Organisasi', '081281999714', NULL, 1, 3, NULL, NULL),
(12, 'Teguh Magzan, SH', 'magzant@yahoo.co.id', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197508042003121001', 'Kasubbagian Rencana Program I Biro Perencanaan dan Organisasi', '082213707775', NULL, 9, 3, NULL, NULL),
(13, 'Syaiful Arif, SH.,M.Si', 'syaiful.poros@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196603101987031001', 'Kasubbagian Bimbingan dan Monitoring Penganggaran Biro Perencanaan dan Organisasi', '085214750481', NULL, 15, 3, NULL, NULL),
(14, 'Emie Yuliati, SE, ME', 'emieyuliati@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197405062006042001', 'Kasubbagian Bimbingan dan Monitoring Penyelenggaraan Program Biro Perencanaan dan Organisasi', '08118603902', NULL, 14, 3, NULL, NULL),
(15, 'Retno Widuri, S.Kom, MH', 'rtnwiduri@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '197710122005022001', 'Kasubbagian Organisasi Biro Perencanaan dan Organisasi', '081218768730', NULL, 17, 3, NULL, NULL),
(16, 'Diana Puri Syawaliah,  SE.Par', 'honeydee6@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198212022008012009', 'Kasubbagian Rencana Anggaran II Biro Perencanaan dan Organisasi', '081296929736', NULL, 13, 3, NULL, NULL),
(17, 'Mila Karima, SE,MM', 'milaakarima@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198110302009042006', 'Kasubbagian Evaluasi Biro Perencanaan dan Organisasi', '081250641307', NULL, 20, 3, NULL, NULL),
(18, 'Grace Maria, S.Ip, M.E', 'gracemariaginting@yahoo.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198208272009042011', 'Kasubbagian Data Biro Perencanaan dan Organisasi', '081382922565', NULL, 8, 3, NULL, NULL),
(19, 'Tiroi Sisruli Siahaan, S.Ip', 'tiroi.siahaan@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198512112011011009', 'Kasubbagian Tata Laksana Biro Perencanaan dan Organisasi', '0811171259', NULL, 18, 3, NULL, NULL),
(20, 'Dhika Hafizh Pratama, S.Sos', 'dhikahafizh@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198609092011012013', 'Kasubbagian Akuntabilitas Biro Perencanaan dan Organisasi', '081280966484', NULL, 19, 3, NULL, NULL),
(21, 'Amanda Abidin, SE.,Mba', 'amandaabidin9@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198707112009121002', 'Kasubbagian Rencana Anggaran I Biro Perencanaan dan Organisasi', '08568801986', NULL, 12, 3, NULL, NULL),
(22, 'Yudi Yudiana, SE,M.Ak', 'yudiana1987@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196606171987031005', 'Kasubbagian Rencana Program II Biro Perencanaan dan Organisasi', '08118809951', NULL, 10, 3, NULL, NULL),
(23, 'Sawiji Suprayitno, SH', 'maswiezie17@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196710191989031001', 'Arsiparis Muda Biro Perencanaan dan Organisasi', '082211861566', NULL, 19, NULL, NULL, NULL),
(24, 'Gunawan, SH', 'gunawanwan571@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196610161987032002', 'Perencana Pertama Biro Perencanaan dan Organisasi', '081221420051', NULL, NULL, NULL, NULL, NULL),
(25, 'Eli Haryani, SH', '', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198211032009041004', 'Analis Perencanaan Anggaran Biro Perencanaan dan Organisasi', '082125821966', NULL, 22, NULL, NULL, NULL),
(26, 'Fiqhi Hanief Al Islamy, S.Kom', 'fiqhihanief@yahoo.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198302042009121005', 'Analis Rencana Program dan Kegiatan Biro Perencanaan dan Organisasi', '081387047608', NULL, 14, NULL, NULL, NULL),
(27, 'Rizqi Widi Feirdani, SE', 'rizqiwidifeirdani@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198309212009122004', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '081297154842', NULL, 21, NULL, NULL, NULL),
(28, 'Yovi Silfani, SE,MM', 'yovisilfani@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198503152011012017', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085263461949', NULL, 20, NULL, NULL, NULL),
(29, 'Andi Hikmawati , S.Sos,MH', 'hikmaneh_hikma@yahoo.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198604122009042008', 'Analis Perencanaan Anggaran Biro Perencanaan dan Organisasi', '081311001572', NULL, 12, NULL, NULL, NULL),
(30, 'Ida Ariani, SE,MH', 'arianipane@yahoo.co.id', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198601242015032003', 'Analis Monitoring dan Evaluasi Pelaksanaan Anggaran Biro Perencanaan dan Organisasi', '085710518505', NULL, 15, NULL, NULL, NULL),
(31, 'Sentosawati Catur Putri, S.Ip', 'sentosaputri24@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198605252009042003', 'Analis Rencana Program dan Kegiatan  Biro Perencanaan dan Organisasi', '087878737221', NULL, 10, NULL, NULL, NULL),
(32, 'Indah Wahyuni, SE,MM', 'indah255@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198701172015032003', 'Penyusun RKA Biro Perencanaan dan Organisasi', '081282869797', NULL, 9, NULL, NULL, NULL),
(33, 'Rina Alprini, S.Pt', 'rina.alprini@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198807292015031002', 'Analis Perencanaan, Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '81806546303', NULL, 21, NULL, NULL, NULL),
(34, 'Purwanto, S.P', 'purwanto.mari@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198908222015031002', 'Analis Rencana Program dan Kegiatan  Biro Perencanaan dan Organisasi', '087875794676', NULL, 14, NULL, NULL, NULL),
(35, 'Muhammad Mahatir, S.Kom', 'mahatir.muhammad22@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '199410032019032007', 'Analis Perencanaan Anggaran  Biro Perencanaan dan Organisasi', '081294771228', NULL, 22, NULL, NULL, NULL),
(36, 'Andrea Arimurti, SH', 'andreaarimurti94@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '196804101989031001', 'Analis Tata Laksana  Biro Perencanaan dan Organisasi', '087785176036', NULL, 18, NULL, NULL, NULL),
(37, 'lian', 'lian@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '198909042019031008', 'Pengadministrasi Persuratan Biro Perencanaan dan Organisasi', '081284202788', NULL, 1, 1, NULL, NULL),
(38, 'Bimo Prakoso, A.Md.', 'bp.bimoprakoso@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', 'AE7Vok8ZFjmfEceMTyF5YYyoHTqvNIlk41VzClrgkMKCIkm5UYBW6prokJY6', '199212072019032010', 'Pengelola Data Biro Perencanaan dan Organisasi', '08111797747', NULL, 17, NULL, NULL, NULL),
(39, 'Debora Putri Tambunan, A.Md', 'debora11008putri@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '199212072019032010', 'Pengelola Sistem dan Jaringan Biro Perencanaan dan Organisasi', '085275055649', NULL, 20, NULL, NULL, NULL),
(53, 'Muktar', 'mukhtar82.ab@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian  Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085692766050', NULL, 21, NULL, NULL, NULL),
(54, 'Atmazuki', 'atmazuki1207@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring Biro Perencanaan dan Organisasi', '089635000520', NULL, 15, NULL, NULL, NULL),
(55, 'Arief Ridwan', 'arief.renog@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring pada Tata Usaha Biro Perencanaan dan Organisasi', '08567991842', NULL, 1, NULL, NULL, NULL),
(56, 'Rahman', 'rachman778@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081387646404', NULL, 13, NULL, NULL, NULL),
(57, 'Astania Dwi Wahyu', 'nhiepocha@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian  Evaluasi dan Pelaporan Biro Perencanaan dan Organisasi', '085746412333', NULL, 20, NULL, NULL, NULL),
(58, 'Fajar Amirulah', 'fajar_yual@yahoo.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '081310010007', NULL, 9, NULL, NULL, NULL),
(59, 'Desfran Subhan', 'desfransubhan20@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Organisasi dan Tata Laksana Biro Perencanaan dan Organisasi', '082110127771', NULL, 17, NULL, NULL, NULL),
(60, 'Savira Rianda Ariani', 'savirarara89@yahoo.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Bimbingan dan Monitoring pada Tata Usaha Biro Perencanaan dan Organisasi', '08113571289', NULL, 1, NULL, NULL, NULL),
(61, 'Muhammad Indra', 'indraflacks92@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '085691486456', NULL, 8, NULL, NULL, NULL),
(62, 'Nursidik', 'siddiqnur81@gmail.com.', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081281800446', NULL, NULL, NULL, NULL, NULL),
(63, 'Hadi Saputro', 'hadi_s216@yahoo.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Anggaran Biro Perencanaan dan Organisasi', '081398594449', NULL, NULL, NULL, NULL, NULL),
(64, 'Wimbo Bramantyo', 'bramantyo.wimbo@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, '', 'PPNPN Bagian Rencana dan Program Biro Perencanaan dan Organisasi', '081333357830', NULL, 10, NULL, NULL, NULL),
(65, 'Kasubag Analisis Renog', 'analisisrenog@gmail.com', '', NULL, '$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S', NULL, NULL, 'Kasubbagian Analisis Biro Perencanaan dan Organisasi', NULL, NULL, 22, 3, NULL, NULL);

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
-- Indexes for table `users_backup`
--
ALTER TABLE `users_backup`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_diskusi_surat`
--
ALTER TABLE `trans_diskusi_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_disposisi_pimpinan`
--
ALTER TABLE `trans_disposisi_pimpinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_disposisi_surat`
--
ALTER TABLE `trans_disposisi_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_dokumen_surat`
--
ALTER TABLE `trans_dokumen_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_file_surat_keluar`
--
ALTER TABLE `trans_file_surat_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_file_tanggapan`
--
ALTER TABLE `trans_file_tanggapan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_surat_masuk`
--
ALTER TABLE `trans_surat_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users_asli`
--
ALTER TABLE `users_asli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users_backup`
--
ALTER TABLE `users_backup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mailbox`
--
ALTER TABLE `mailbox`
  ADD CONSTRAINT `mailbox_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
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
