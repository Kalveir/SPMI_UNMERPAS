-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2024 at 02:30 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id` int NOT NULL,
  `indikator_id` int DEFAULT NULL,
  `bobot` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id`, `indikator_id`, `bobot`) VALUES
(1, 1, 20),
(2, 2, 20),
(3, 3, 25),
(4, 4, 25),
(5, 5, 10),
(6, 6, 20),
(7, 7, 20),
(8, 8, 30),
(9, 9, 30),
(10, 10, 30),
(11, 11, 15),
(12, 12, 30),
(13, 13, 25);

-- --------------------------------------------------------

--
-- Table structure for table `bookdocs`
--

CREATE TABLE `bookdocs` (
  `id` int NOT NULL,
  `standard_id` int DEFAULT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_file` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookmanual`
--

CREATE TABLE `bookmanual` (
  `id` int NOT NULL,
  `standard_id` int DEFAULT NULL,
  `pegawai_id` int DEFAULT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `visi_misi` text COLLATE utf8mb4_general_ci,
  `tujuan` text COLLATE utf8mb4_general_ci,
  `ruanglingkup` text COLLATE utf8mb4_general_ci,
  `definisi_istilah` text COLLATE utf8mb4_general_ci,
  `tahapan` text COLLATE utf8mb4_general_ci,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookstandard`
--

CREATE TABLE `bookstandard` (
  `id` int NOT NULL,
  `standard_id` int DEFAULT NULL,
  `pegawai_id` int DEFAULT NULL,
  `visi_misi` text COLLATE utf8mb4_general_ci,
  `tujuan` text COLLATE utf8mb4_general_ci,
  `rasional` text COLLATE utf8mb4_general_ci,
  `subjek` text COLLATE utf8mb4_general_ci,
  `definisi_istilah` text COLLATE utf8mb4_general_ci,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`) VALUES
(1, 'Teknologi Informasi'),
(3, 'Ekonomi'),
(4, 'Hukum'),
(5, 'Pertanian');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id` int NOT NULL,
  `standard_id` int DEFAULT NULL,
  `pegawai_id` int DEFAULT NULL,
  `isi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `strategi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `indikator` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `satuan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `target` int DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`id`, `standard_id`, `pegawai_id`, `isi`, `strategi`, `indikator`, `satuan`, `target`, `status`) VALUES
(1, 1, 1, 'Kaprodi menyusun profil lulusan yang menjadi acuan dalam menyusun CP program studi.', 'Dekan dan Ketua Jurusan/Program Studi perlu membina hubungan dengan organisasi profesi, alumni, pemerintah, dan dunia usaha.', 'Profile lulusan yang menjadi acuan dalam menyusun CP program studi', '%', 50, 1),
(2, 1, 1, 'Kaprodi menghasilkan lulusan yang cepat bekerja', 'Menyelenggarakan pelatihan yang berkaitan dengan proses pembelajaran bagi dosen.', 'Masa tunggu lulusan sampai dengan mendapatkan pekerjaan', '%', 50, 1),
(3, 1, 1, 'Kaprodi menghasilkan lulusan yang bekerja dengan gaji yang memadai.', 'Ketua program studi mensosialisasikan pelaksanaan proses belajar mengajar sesuai kurikulum dan silabus masing- masing mata kuliah kepada seluruh komponen yang terlibat dalam proses pembelajaran Dosen, Tenaga Pendidik dan Mahasiswa).', 'Besar gaji yang diterima para lulusan pada awal bekerja', '%', 50, 1),
(4, 1, 1, 'Kaprodi menghasilkan lulusan yang bekerja pada bidang yang sesuai dengan bidang keilmuannya.', 'BAU menjelaskan pada mahasiswa tentang kewajiban keuangan.', 'Kesesuaian bidang kerja lulusan dengan bidang ilmu Pendidikan', '%', 50, 1),
(5, 1, 1, 'Kaprodi menghasilkan lulusan yang bekerja pada pekerjaan yang sesuai dengan tingkat pendidikannya', 'Dosen wali menjelaskan tentang persyaratan nilai minimal untuk kelulusan', 'Keselarasan vertikal antara beban pekerjaan dengan tingkat pendidipan para alumni', '%', 50, 1),
(6, 2, 1, 'Kaprodi menyusun kurikulum perguruan tinggi (KPT) sebagai pedoman pelaksanaan pembelajaran di program studi', 'Perencanaan proses pembelajaran', 'Kurikulum perguruan tinggi (KPT) program studi (20)', '%', 50, 1),
(7, 2, 1, 'Kaprodi menyusun CP lulusan sesuai dengan profil lulusan yang sudah ditetapkan', 'Pelaksanaan proses pembelajaran', 'CP lulusan/CP program studi', '%', 50, 1),
(8, 2, 1, 'Kaprodi menyusun Bahan kajian sebagai tindak lanjut dari CP lulusan yang telah ditetapkan', 'Pengawasan proses pembelajaran', 'Penyusunan bahan kajian', '%', 50, 1),
(9, 2, 1, 'Kaprodi menyusun mata kuliah mengakomodasi bahan kajian yang telah ditetapkan', 'Evaluasi Proses Pembelajaran', 'Penyusunan mata kuliah', '%', 50, 1),
(10, 3, 1, 'Kaprodi menyiapkan dokumen administrasi pembelajaran untuk semester berjalan', 'Pimpinan universitas menyelenggarakan tersedianya sarana dan prasarana pendukung proses pembelajaran yang kondusif ditingkat Universitas', 'Dokumen administrasi pembelajaran', '%', 50, 1),
(11, 3, 1, 'Dosen PA mendampingi mahasiswa memprogram kegiatan kegiatan pembelajaran yang akan ditempuh pada semester berjalan', 'Dekan, ketua program studi menyelenggarakan koordinasi dengan dosen dan perwakilan mahasiswa untuk perencanaan, pelaksanaan dan evaluasi kegiatan pendukung proses pembelajaran yang kondusif\r\nditingkat Fakultas dan program studi', 'Beban pembelajaran mahasiswa pada semester berjalan', '%', 50, 1),
(12, 3, 1, 'Dosen menyiapkan RPS dan kontrak kuliah untuk kegiatan pembelajaran yang akan diampu pada semester berjalan', 'Menyelenggarakan pelatihan yang berkaitan dengan proses pembelajaran bagi dosen', 'Dokumen/instrument persiapan pembelajaran', '%', 50, 1),
(13, 3, 1, 'Dosen melaksanakan proses pembelajaran sesuai dengan yang terprogram dalam RPS dan kontrak kuliah.', 'Ketua program studi mensosialisasikan pelaksanaan proses belajar mengajar sesuai kurikulum dan silabus masing-masing mata kuliah kepada seluruh komponen yang terlibat dalam proses pembelajaran Dosen, Tenaga Pendidik dan Mahasiswa).', 'Proses Pembelajaran', '%', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_jenis`
--

CREATE TABLE `indikator_jenis` (
  `id` int NOT NULL,
  `jenis_id` int DEFAULT NULL,
  `indikator_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_12_26_031641_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int NOT NULL,
  `indikator_id` int DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `nilai` int DEFAULT '0',
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `indikator_id`, `deskripsi`, `nilai`, `status`) VALUES
(1, 1, 'Bila profile disusun mengacu pada visi, misi, dan kebutuhan stake holder', 4, 1),
(2, 1, 'Bila profile disusun mengacu pada visi dan misi atau pada kebutuhan stake holder', 3, 1),
(3, 1, 'Bila profile disusun tanpa acuan yang jelas', 2, 1),
(4, 1, 'Bila tidak ada profile lulusan', 1, 1),
(5, 2, 'Bila masa tunggu lulusan < 3 bulan', 4, 1),
(6, 2, 'Bila masa tunggu lulusan > 3 – 6 bulan', 3, 1),
(7, 2, 'Bila masa tunggu lulusan > 6 – 9 bulan', 2, 1),
(8, 2, 'Bila masa tunggu lulusan > 9 bulan', 1, 1),
(9, 3, 'Bila gaji awal > 2 UMR', 4, 1),
(10, 3, 'Bila gaji awal >1,5-2 UMR', 3, 1),
(11, 3, 'Bila gaji awal > 1-1,5 UMR', 2, 1),
(12, 3, 'Bila gaji awal ≤ UMR', 1, 1),
(13, 4, 'Bila yang erat dan sangat erat >80%', 4, 1),
(14, 4, 'Bila yang erat dan sangat erat > 60 – 80%', 3, 1),
(15, 4, 'Bila yang erat dan sangat erat >40 – 60%', 2, 1),
(16, 4, 'Bila yang erat dan sangat erat >20 – 40%', 1, 1),
(17, 5, 'Bila yang setingkat atau sama >80%', 4, 1),
(18, 5, 'Bila yang setingkat atau sama > 60 – 80%', 3, 1),
(19, 1, 'Bila yang setingkat atau sama >40 – 60%', 2, 1),
(20, 5, 'Bila yang setingkat atau sama >20 – 40%', 1, 1),
(21, 6, 'Bila penyusunan KPT mengacu pada KKNI dan melibatkan stakeholder internal dan eksternal', 4, 1),
(22, 6, 'Bila penyusunan KPT mengacu pada KKNI hanya melibatkan stakeholder internal', 3, 1),
(23, 6, 'Bila penyusunan KPT hanya melibatkan stakeholder internal', 2, 1),
(24, 6, 'Bila penyusunan KPT tidak melibatkan pihak lain', 1, 1),
(25, 7, 'Bila CP lulusan mengacu hasil kesepakatan asosiasi prodi yang sudah disahkan Menteri dan\r\nkarakteristik institusi', 4, 1),
(26, 7, 'Bila CP lulusan mengacu pada kesepakatan prodi sejenis dan karakteristik institusi', 3, 1),
(27, 7, 'Bila CP lulusan menjabarkan sendiri dari kebutuhan pasar dan karakteristik institusi', 2, 1),
(28, 7, 'Bila CP lulusan disusun tanpa acuan yang jelas', 1, 1),
(29, 8, 'Bila semua CP lulusan secara sistematik telah ditentukan bahan kajiannya', 4, 1),
(30, 8, 'Bila semua CP lulusan telah ditentukan bahan kajiannya', 3, 1),
(31, 8, 'Bila baru 75% CP lulusan telah ditentukan bahan kajiannya', 2, 1),
(32, 8, 'Bila baru sebagian CP lulusan telah ditentukan bahan kajiannya', 1, 1),
(33, 9, 'Bila semua BK secara sistematik telah diakomodasi dalam mata kuliah', 4, 1),
(34, 9, 'Bila semua BK lulusan telah diakomodasi dalam mata kuliah', 3, 1),
(35, 9, 'Bila baru 75% BK lulusan telah diakomodasi mata kuliahnya', 2, 1),
(36, 9, 'Bila penyusunan mata kuliah tidak memperhatikan BK', 1, 1),
(37, 10, 'Bila pada awal semester telah disiapkan pedoman akademik, kalender akademik dan jadwal perkuliahan', 4, 1),
(38, 10, 'Bila pada awal semester telah disiapkan dua diantara pedoman akademik, kalender akademik dan jadwal perkuliahan', 3, 1),
(39, 10, 'Bila pada awal semester telah disiapkan satu diantara pedoman akademik, kalender akademik dan jadwal perkuliahan', 2, 1),
(40, 10, 'Bila tidak ada tiga-tiganya', 1, 1),
(41, 11, 'Semua mahasiswa aktif memrogram KRS tepat waktu, dengan beban sks sesuai dengan ketentuan', 4, 1),
(42, 11, 'Bila semua mahasiswa aktif memrogram KRS tidak tepat waktu, dengan beban sks sesuai dengan ketentuan', 3, 1),
(43, 11, 'Bila semua mahasiswa aktif memrogram KRS tidak tepat waktu, dengan beban sks ada maksimum 10% mahasiswa tidak sesuai dengan ketentuan', 2, 1),
(44, 11, 'Bila semua mahasiswa aktif memrogram KRS tidak tepat waktu, dengan beban sks lebih dari 10% mahasiswa tidak sesuai dengan ketentuan', 1, 1),
(45, 12, 'Bila seluruh dosen mengupdate RPS dan kontrak kuliah pada awal semester', 4, 1),
(46, 12, 'Bila seluruh dosen menyiapkan RPS dan kontrak kuliah namun sebagian tidak diupdate\r\npada awal semester', 3, 1),
(47, 12, 'Bila sebagaian dosen (≤ 25%) tidak ada RPS dan kontrak kuliah pada awal semester', 2, 1),
(48, 12, 'Bila sebagian dosen (> 25%) tidak ada RPS dan kontrak kuliah pada awal semester', 1, 1),
(49, 13, 'Bila proses pembelajaran menerapkan semua bentuk pembelajaran (diskusi, praktek kerja,\r\npraktikum, magang, project research, demonstrasi, dan kuliah)', 4, 1),
(50, 13, 'Bila proses pembelajaran menerapkan 5 bentuk pembelajaran (diskusi, praktek kerja,\r\npraktikum, magang, project research, demonstrasi, dan kuliah)', 3, 1),
(51, 13, 'Bila proses pembelajaran menerapkan 3 bentuk pembelajaran (diskusi, praktek kerja, praktikum, magang, project research, demonstrasi, dan kuliah)', 2, 1),
(52, 13, 'Bila proses pembelajaran menerapkan hanya satu bentuk pembelajaran (diskusi, praktek kerja, praktikum, magang, project research, demonstrasi, dan kuliah)', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int NOT NULL,
  `prodi_id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_general_ci,
  `status` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `prodi_id`, `nama`, `email`, `password`, `status`, `created_at`, `remember_token`) VALUES
(1, 1, 'Wijaya', 'wijaya@gmail.com', '$2y$12$DS0DYkp7cp7BJVtjjX2DIOSBwC0EOWzZpOZ5iJq.xA/h1PgyL/Ehy', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengisian`
--

CREATE TABLE `pengisian` (
  `id` int NOT NULL,
  `indikator_id` int DEFAULT NULL,
  `pegawai_id` int DEFAULT NULL,
  `program_studi` int DEFAULT NULL,
  `audhitor` int DEFAULT NULL,
  `nilai` int DEFAULT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `tanggal` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aksi_code` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengisian_berkas`
--

CREATE TABLE `pengisian_berkas` (
  `id` int NOT NULL,
  `indikator_id` int DEFAULT NULL,
  `pengisian_id` int DEFAULT NULL,
  `program_studi_id` int DEFAULT NULL,
  `pegawai_id` int DEFAULT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `nama_file` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'kelola fakultas', 'web', '2023-12-25 20:34:01', '2023-12-25 20:34:01'),
(2, 'kelola prodi', 'web', '2023-12-25 21:53:25', '2023-12-25 21:53:25'),
(3, 'kelola pegawai', 'web', '2023-12-25 21:53:33', '2023-12-25 21:53:33'),
(4, 'kelola jabatan', 'web', '2023-12-25 22:51:53', '2023-12-25 22:51:53'),
(5, 'kelola standard', 'web', '2023-12-26 17:14:06', '2023-12-26 17:14:06'),
(6, 'kelola bookmanual', 'web', '2023-12-26 17:17:14', '2023-12-26 17:17:14'),
(7, 'kelola bookstandard', 'web', '2023-12-26 17:17:30', '2023-12-26 17:17:30'),
(8, 'kelola bookdocs', 'web', '2023-12-26 17:17:49', '2023-12-26 17:17:49'),
(9, 'kelola indikator', 'web', '2023-12-26 17:18:05', '2023-12-26 17:18:05'),
(11, 'kelola nilai', 'web', '2023-12-26 17:18:38', '2023-12-26 17:18:38'),
(12, 'kelola berkas', 'web', '2023-12-26 17:18:58', '2023-12-26 17:18:58'),
(14, 'kelola bobot', 'web', '2024-02-07 06:48:50', '2024-02-07 06:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id` int NOT NULL,
  `fakultas_id` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id`, `fakultas_id`, `nama`) VALUES
(1, 1, 'Teknik Informatika'),
(2, 1, 'Rekayasa Perangkat Lunak'),
(3, 3, 'Manajemen'),
(4, 4, 'Hukum'),
(5, 5, 'Agroteknologi');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-12-25 20:32:45', '2023-12-26 00:58:52'),
(6, 'Auditor Informatika', 'web', '2024-01-06 20:24:49', '2024-01-15 03:27:12'),
(7, 'Auditor RPL', 'web', '2024-01-06 20:24:49', '2024-01-15 03:27:24'),
(8, 'Auditor Manajemen', 'web', '2024-01-06 20:24:50', '2024-01-15 03:27:34'),
(9, 'Auditor Hukum', 'web', '2024-01-06 20:24:50', '2024-01-15 03:27:44'),
(10, 'Auditor Agroteknologi', 'web', '2024-01-06 20:24:50', '2024-01-15 03:27:54'),
(11, 'PPM', 'web', '2024-01-17 07:32:39', '2024-01-17 07:32:39'),
(12, 'Ketua Program Studi', 'web', '2024-01-17 07:33:01', '2024-01-17 07:33:01'),
(13, 'Dosen', 'web', '2024-01-30 21:04:12', '2024-01-30 21:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(11, 1),
(12, 1),
(14, 1),
(5, 11),
(6, 11),
(7, 11),
(8, 11),
(9, 11),
(11, 11),
(14, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `standard`
--

CREATE TABLE `standard` (
  `id` int NOT NULL,
  `pegawai_id` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `standard`
--

INSERT INTO `standard` (`id`, `pegawai_id`, `nama`, `status`) VALUES
(1, 1, 'Standar Kompetensi Lulusan', 1),
(2, 1, 'Standar Isi Pembelajaran', 1),
(3, 1, 'Standar Proses Pembelajaran', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bobot_indikator` (`indikator_id`);

--
-- Indexes for table `bookdocs`
--
ALTER TABLE `bookdocs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_book_standard` (`standard_id`);

--
-- Indexes for table `bookmanual`
--
ALTER TABLE `bookmanual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bookmanual_pegawai` (`pegawai_id`),
  ADD KEY `fk_bookmanual_standard` (`standard_id`);

--
-- Indexes for table `bookstandard`
--
ALTER TABLE `bookstandard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bookstandard_standard` (`standard_id`),
  ADD KEY `fk_bookstandard_pegawai` (`pegawai_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_indikator_standard` (`standard_id`),
  ADD KEY `fk_indikator_pegawai` (`pegawai_id`);

--
-- Indexes for table `indikator_jenis`
--
ALTER TABLE `indikator_jenis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_indikator` (`indikator_id`),
  ADD KEY `fk_jenis` (`jenis_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_indikator` (`indikator_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pegawai_prodi` (`prodi_id`);

--
-- Indexes for table `pengisian`
--
ALTER TABLE `pengisian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengisian_indikator` (`indikator_id`),
  ADD KEY `fk_pengisian_pegawai` (`pegawai_id`),
  ADD KEY `fk_pengisian_audhitor` (`audhitor`),
  ADD KEY `program_studi` (`program_studi`);

--
-- Indexes for table `pengisian_berkas`
--
ALTER TABLE `pengisian_berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengisian_berkas_pegawai` (`pegawai_id`),
  ADD KEY `fk_program_studi_id` (`program_studi_id`),
  ADD KEY `fk_indikator_id` (`indikator_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_program_studi_fakultas` (`fakultas_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `standard`
--
ALTER TABLE `standard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_standard_pegawai` (`pegawai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bookdocs`
--
ALTER TABLE `bookdocs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmanual`
--
ALTER TABLE `bookmanual`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookstandard`
--
ALTER TABLE `bookstandard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `indikator_jenis`
--
ALTER TABLE `indikator_jenis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengisian`
--
ALTER TABLE `pengisian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengisian_berkas`
--
ALTER TABLE `pengisian_berkas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `standard`
--
ALTER TABLE `standard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot`
--
ALTER TABLE `bobot`
  ADD CONSTRAINT `fk_bobot_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`);

--
-- Constraints for table `bookdocs`
--
ALTER TABLE `bookdocs`
  ADD CONSTRAINT `fk_book_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`);

--
-- Constraints for table `bookmanual`
--
ALTER TABLE `bookmanual`
  ADD CONSTRAINT `fk_bookmanual_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `fk_bookmanual_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`);

--
-- Constraints for table `bookstandard`
--
ALTER TABLE `bookstandard`
  ADD CONSTRAINT `fk_bookstandard_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `fk_bookstandard_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`);

--
-- Constraints for table `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `fk_indikator_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `fk_indikator_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`);

--
-- Constraints for table `indikator_jenis`
--
ALTER TABLE `indikator_jenis`
  ADD CONSTRAINT `fk_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`);

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
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_nilai_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_pegawai_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `program_studi` (`id`);

--
-- Constraints for table `pengisian`
--
ALTER TABLE `pengisian`
  ADD CONSTRAINT `fk_pengisian_audhitor` FOREIGN KEY (`audhitor`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `fk_pengisian_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  ADD CONSTRAINT `fk_pengisian_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `pengisian_fk_prodi` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`);

--
-- Constraints for table `pengisian_berkas`
--
ALTER TABLE `pengisian_berkas`
  ADD CONSTRAINT `fk_indikator_id` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  ADD CONSTRAINT `fk_pengisian_berkas_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `fk_program_studi` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studi` (`id`);

--
-- Constraints for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `fk_program_studi_fakultas` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `standard`
--
ALTER TABLE `standard`
  ADD CONSTRAINT `fk_standard_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
