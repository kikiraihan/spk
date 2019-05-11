-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 02 Mei 2019 pada 11.54
-- Versi Server: 10.1.38-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.1.28-1+ubuntu18.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-uts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `criteria_preferences`
--

CREATE TABLE `criteria_preferences` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordo` tinyint(4) NOT NULL,
  `matriks` longtext COLLATE utf8mb4_unicode_ci,
  `matriksNormalised` longtext COLLATE utf8mb4_unicode_ci,
  `kriteria` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `criteria_preferences`
--

INSERT INTO `criteria_preferences` (`id`, `judul`, `ordo`, `matriks`, `matriksNormalised`, `kriteria`, `created_at`, `updated_at`) VALUES
(1, 'Calon menantu idaman', 5, '[[\"1\",\"5\",\"3\",\"5\",\"2\"],[\"1\\/5\",\"1\",\"1\\/4\",\"4\",\"1\\/2\"],[\"1\\/3\",\"4\",\"1\",\"5\",\"1\"],[\"1\\/5\",\"1\\/4\",\"1\\/5\",\"1\",\"1\\/2\"],[\"1\\/2\",\"2\",\"1\",\"2\",\"1\"]]', '[[0.44776119402985076,0.40816326530612246,0.5504587155963303,0.29411764705882354,0.4],[0.08955223880597016,0.08163265306122448,0.04587155963302752,0.23529411764705882,0.1],[0.14925373134328357,0.32653061224489793,0.18348623853211007,0.29411764705882354,0.2],[0.08955223880597016,0.02040816326530612,0.03669724770642202,0.058823529411764705,0.1],[0.22388059701492538,0.16326530612244897,0.18348623853211007,0.11764705882352941,0.2]]', '[{\"title\":\"Agama\",\"jenis\":\"Benefit\",\"bobot\":0.4201001643982254},{\"title\":\"TOEFL\",\"jenis\":\"Benefit\",\"bobot\":0.11047011382945619},{\"title\":\"IPK\",\"jenis\":\"Benefit\",\"bobot\":0.230677645835823},{\"title\":\"Masak\",\"jenis\":\"Benefit\",\"bobot\":0.06109623583789261},{\"title\":\"Kecantikan\",\"jenis\":\"Benefit\",\"bobot\":0.17765584009860275}]', '2019-04-21 23:03:07', '2019-04-21 23:03:07'),
(2, '8 kriteria', 8, '[[\"1\",\"5\",\"3\",\"5\",\"2\",\"5\",\"3\",\"5\"],[\"1\\/5\",\"1\",\"1\\/4\",\"4\",\"1\\/2\",\"1\",\"1\\/4\",\"4\"],[\"1\\/3\",\"4\",\"1\",\"5\",\"1\",\"4\",\"1\",\"5\"],[\"1\\/5\",\"1\\/4\",\"1\\/5\",\"1\",\"1\\/2\",\"1\\/4\",\"1\\/5\",\"1\"],[\"1\\/2\",\"2\",\"1\",\"2\",\"1\",\"2\",\"1\",\"2\"],[\"1\\/5\",\"1\",\"1\\/4\",\"4\",\"1\\/2\",\"1\",\"1\\/4\",\"4\"],[\"1\\/3\",\"4\",\"1\",\"5\",\"1\",\"4\",\"1\",\"5\"],[\"1\\/5\",\"1\\/4\",\"1\\/5\",\"1\",\"1\\/2\",\"1\\/4\",\"1\\/5\",\"1\"]]', '[[0.3370786516853932,0.2857142857142857,0.43478260869565216,0.18518518518518517,0.2857142857142857,0.2857142857142857,0.43478260869565216,0.18518518518518517],[0.06741573033707864,0.05714285714285714,0.036231884057971016,0.14814814814814814,0.07142857142857142,0.05714285714285714,0.036231884057971016,0.14814814814814814],[0.11235955056179772,0.22857142857142856,0.14492753623188406,0.18518518518518517,0.14285714285714285,0.22857142857142856,0.14492753623188406,0.18518518518518517],[0.06741573033707864,0.014285714285714285,0.028985507246376812,0.037037037037037035,0.07142857142857142,0.014285714285714285,0.028985507246376812,0.037037037037037035],[0.1685393258426966,0.11428571428571428,0.14492753623188406,0.07407407407407407,0.14285714285714285,0.11428571428571428,0.14492753623188406,0.07407407407407407],[0.06741573033707864,0.05714285714285714,0.036231884057971016,0.14814814814814814,0.07142857142857142,0.05714285714285714,0.036231884057971016,0.14814814814814814],[0.11235955056179772,0.22857142857142856,0.14492753623188406,0.18518518518518517,0.14285714285714285,0.22857142857142856,0.14492753623188406,0.18518518518518517],[0.06741573033707864,0.014285714285714285,0.028985507246376812,0.037037037037037035,0.07142857142857142,0.014285714285714285,0.028985507246376812,0.037037037037037035]]', '[{\"title\":\"satu\",\"jenis\":\"Benefit\",\"bobot\":0.3042696370737406},{\"title\":\"dua\",\"jenis\":\"Benefit\",\"bobot\":0.07773626005795034},{\"title\":\"tiga\",\"jenis\":\"Benefit\",\"bobot\":0.17157312417449203},{\"title\":\"empat\",\"jenis\":\"Benefit\",\"bobot\":0.037432602362988295},{\"title\":\"lima\",\"jenis\":\"Benefit\",\"bobot\":0.12224638973539804},{\"title\":\"enam\",\"jenis\":\"Benefit\",\"bobot\":0.07773626005795034},{\"title\":\"tujuh\",\"jenis\":\"Benefit\",\"bobot\":0.17157312417449203},{\"title\":\"delapan\",\"jenis\":\"Benefit\",\"bobot\":0.037432602362988295}]', '2019-04-21 23:16:21', '2019-04-21 23:16:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `nama`, `jurusan`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Lisa Torphy DDS', 'Hand Presser', '19171 Kiehn Circles\nKovacekberg, CA 66333-7756', '2019-04-21 23:03:06', '2019-04-21 23:03:06'),
(2, 'Ocie Leuschke', 'Industrial Machinery Mechanic', '15813 Heathcote Trafficway\nWest Alycestad, NC 70216', '2019-04-21 23:03:06', '2019-04-21 23:03:06'),
(3, 'Kristy Weber', 'Shear Machine Set-Up Operator', '31146 Alessia Lakes Suite 703\nWesttown, DE 06758', '2019-04-21 23:03:06', '2019-04-21 23:03:06'),
(4, 'Margarett Funk DVM', 'Title Searcher', '952 Bode Ridges\nSchroederhaven, VT 05029-7015', '2019-04-21 23:03:06', '2019-04-21 23:03:06'),
(5, 'Mr. Gunner Dietrich', 'Secretary', '985 Litzy Junction\nSouth Travon, WA 93853-1649', '2019-04-21 23:03:06', '2019-04-21 23:03:06'),
(6, 'Dr. Marty Stokes', 'Appliance Repairer', '8689 Littel Crossing\nSchulistland, VT 69150', '2019-04-21 23:03:06', '2019-04-21 23:03:06'),
(7, 'Niko Bode', 'Precision Pattern and Die Caster', '4147 Lakin Greens\nZboncakton, TX 42734', '2019-04-21 23:03:06', '2019-04-21 23:03:06'),
(8, 'George Batz Sr.', 'Animal Husbandry Worker', '4128 Yundt Fords Apt. 089\nLaurinebury, MA 88105-7289', '2019-04-21 23:03:06', '2019-04-21 23:03:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_04_04_094723_create_criteria_preferences_table', 1),
(10, '2019_04_04_141330_create_mahasiswas_table', 1),
(11, '2019_04_10_125336_create_penilaian_alternatifs_table', 1),
(12, '2019_04_11_110141_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Model\\User', 2),
(1, 'App\\Model\\User', 3),
(2, 'App\\Model\\User', 1),
(2, 'App\\Model\\User', 4),
(2, 'App\\Model\\User', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_alternatifs`
--

CREATE TABLE `penilaian_alternatifs` (
  `nilai` longtext COLLATE utf8mb4_unicode_ci,
  `id_penilai` int(10) UNSIGNED NOT NULL,
  `id_preferensi` int(10) UNSIGNED NOT NULL,
  `id_mahasiswa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaian_alternatifs`
--

INSERT INTO `penilaian_alternatifs` (`nilai`, `id_penilai`, `id_preferensi`, `id_mahasiswa`, `created_at`, `updated_at`) VALUES
('{\"Agama\":\"4\",\"TOEFL\":\"5\",\"IPK\":\"4\",\"Masak\":\"4\",\"Kecantikan\":\"4\"}', 1, 1, 1, '2019-04-21 23:35:28', '2019-04-21 23:35:28'),
('{\"Agama\":\"4\",\"TOEFL\":\"5\",\"IPK\":\"5\",\"Masak\":\"5\",\"Kecantikan\":\"5\"}', 1, 1, 2, '2019-04-21 23:35:28', '2019-04-21 23:35:28'),
('{\"Agama\":\"4\",\"TOEFL\":\"3\",\"IPK\":\"3\",\"Masak\":\"3\",\"Kecantikan\":\"3\"}', 1, 1, 3, '2019-04-21 23:35:28', '2019-04-21 23:35:28'),
('{\"Agama\":\"4\",\"TOEFL\":\"5\",\"IPK\":\"4\",\"Masak\":\"3\",\"Kecantikan\":\"4\"}', 1, 1, 4, '2019-04-21 23:35:28', '2019-04-21 23:35:28'),
('{\"Agama\":\"4\",\"TOEFL\":\"4\",\"IPK\":\"4\",\"Masak\":\"4\",\"Kecantikan\":\"4\"}', 1, 1, 5, '2019-04-21 23:35:28', '2019-04-21 23:35:28'),
('{\"Agama\":\"5\",\"TOEFL\":\"3\",\"IPK\":\"5\",\"Masak\":\"4\",\"Kecantikan\":\"4\"}', 1, 1, 6, '2019-04-21 23:35:28', '2019-04-21 23:35:28'),
('{\"Agama\":\"5\",\"TOEFL\":\"5\",\"IPK\":\"5\",\"Masak\":\"5\",\"Kecantikan\":\"5\"}', 1, 1, 7, '2019-04-21 23:35:28', '2019-04-21 23:35:28'),
('{\"Agama\":\"4\",\"TOEFL\":\"4\",\"IPK\":\"3\",\"Masak\":\"3\",\"Kecantikan\":\"2\"}', 1, 1, 8, '2019-04-21 23:35:28', '2019-04-21 23:35:28'),
('{\"satu\":\"3\",\"dua\":\"3\",\"tiga\":\"3\",\"empat\":\"3\",\"lima\":\"3\",\"enam\":\"3\",\"tujuh\":\"3\",\"delapan\":\"3\"}', 1, 2, 1, '2019-04-21 23:20:43', '2019-04-21 23:20:43'),
('{\"satu\":\"4\",\"dua\":\"4\",\"tiga\":\"4\",\"empat\":\"4\",\"lima\":\"4\",\"enam\":\"4\",\"tujuh\":\"4\",\"delapan\":\"4\"}', 1, 2, 2, '2019-04-21 23:20:43', '2019-04-21 23:20:43'),
('{\"satu\":\"5\",\"dua\":\"5\",\"tiga\":\"5\",\"empat\":\"5\",\"lima\":\"5\",\"enam\":\"5\",\"tujuh\":\"5\",\"delapan\":\"5\"}', 1, 2, 3, '2019-04-21 23:20:43', '2019-04-21 23:20:43'),
('{\"satu\":\"5\",\"dua\":\"3\",\"tiga\":\"3\",\"empat\":\"3\",\"lima\":\"3\",\"enam\":\"3\",\"tujuh\":\"3\",\"delapan\":\"3\"}', 1, 2, 4, '2019-04-21 23:20:44', '2019-04-21 23:20:44'),
('{\"satu\":\"2\",\"dua\":\"2\",\"tiga\":\"2\",\"empat\":\"2\",\"lima\":\"2\",\"enam\":\"2\",\"tujuh\":\"3\",\"delapan\":\"2\"}', 1, 2, 5, '2019-04-21 23:20:44', '2019-04-21 23:20:44'),
('{\"satu\":\"4\",\"dua\":\"4\",\"tiga\":\"4\",\"empat\":\"3\",\"lima\":\"2\",\"enam\":\"2\",\"tujuh\":\"1\",\"delapan\":\"2\"}', 1, 2, 6, '2019-04-21 23:20:44', '2019-04-21 23:20:44'),
('{\"satu\":\"5\",\"dua\":\"5\",\"tiga\":\"5\",\"empat\":\"4\",\"lima\":\"4\",\"enam\":\"3\",\"tujuh\":\"2\",\"delapan\":\"2\"}', 1, 2, 7, '2019-04-21 23:20:44', '2019-04-21 23:20:44'),
('{\"satu\":\"2\",\"dua\":\"1\",\"tiga\":\"2\",\"empat\":\"4\",\"lima\":\"4\",\"enam\":\"3\",\"tujuh\":\"1\",\"delapan\":\"3\"}', 1, 2, 8, '2019-04-21 23:20:44', '2019-04-21 23:20:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2019-04-21 23:03:03', '2019-04-21 23:03:03'),
(2, 'Penilai', 'web', '2019-04-21 23:03:03', '2019-04-21 23:03:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `kategori`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Penilai', 'Kiki', 'mohzulkiflikatili@gmail.com', '$2y$10$0pWAFeL/6GDjYKIYVFj5VO2rqD0rCe8DoqC.xDM1EeCzKD9ez.3Xq', 'bLrpUGj3jT', '2019-04-21 23:03:05', '2019-04-21 23:03:06'),
(2, 'Admin', 'Penelope Abernathy', 'admin@gmail.com', '$2y$10$k.qso7AF/28j97H/a0eU1.9QsKxFKNu8mdqAUUbHtbkmDtudx5NZC', 'aXdetbDdDh', '2019-04-21 23:03:05', '2019-04-21 23:03:05'),
(3, 'Admin', 'Miss Elouise Harvey Jr.', 'danika94@example.net', '$2y$10$Umr2wISkTEUfhJfnVUoE4.BgQ3ntYm//6iMbSZJiyuvN4TEG/SgUK', 'f8VcIBBJtv', '2019-04-21 23:03:05', '2019-04-21 23:03:05'),
(4, 'Penilai', 'Mrs. Estel Roob MD', 'karina.kunze@example.com', '$2y$10$SO/4YDxGzUzte4VoSBDUFO.BAf6ubqge0lP.gk/RzrNZAHeEYPfgy', 'DOyaKees6J', '2019-04-21 23:03:05', '2019-04-21 23:03:05'),
(5, 'Penilai', 'Willy Macejkovic', 'hartmann.jessy@example.com', '$2y$10$t6GR0cqFJeqQYP1GjFZoeeQHrhAyjUwwMi.1orkiybypBd6w5Sxeq', 'UWO2Z7KBle', '2019-04-21 23:03:05', '2019-04-21 23:03:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criteria_preferences`
--
ALTER TABLE `criteria_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penilaian_alternatifs`
--
ALTER TABLE `penilaian_alternatifs`
  ADD PRIMARY KEY (`id_penilai`,`id_preferensi`,`id_mahasiswa`),
  ADD KEY `penilaian_alternatifs_id_preferensi_foreign` (`id_preferensi`),
  ADD KEY `penilaian_alternatifs_id_mahasiswa_foreign` (`id_mahasiswa`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `criteria_preferences`
--
ALTER TABLE `criteria_preferences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian_alternatifs`
--
ALTER TABLE `penilaian_alternatifs`
  ADD CONSTRAINT `penilaian_alternatifs_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_alternatifs_id_penilai_foreign` FOREIGN KEY (`id_penilai`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_alternatifs_id_preferensi_foreign` FOREIGN KEY (`id_preferensi`) REFERENCES `criteria_preferences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
