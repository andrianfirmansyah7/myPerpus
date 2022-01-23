-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2022 pada 07.32
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myperpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ikhtisar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_halaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `cover_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `nama_buku`, `penulis`, `penerbit`, `tahun_terbit`, `ikhtisar`, `genre`, `jumlah_halaman`, `stok`, `cover_buku`, `nama_file`, `created_at`, `updated_at`) VALUES
('1131414', 'Strategi Xiaomi', 'Kun Aguero', 'PT City Kusmini', '2020', 'Buku tentang City Kusmini', 'pengetahuan', '100', 5, 'book-7.png', '[INDONESIA] MODUL 2 JURNAL (1).pdf', '2022-01-09 10:29:09', '2022-01-09 10:29:09'),
('141414', 'Buku Bobo', 'Farhan Hizbullah', 'PT Baskoro Jaya', '2020', 'Buku Yang Mantap', 'pengetahuan', '50', 1, 'book-8.png', '[ID] M1 APSI Functional Requirement, Use Case Diagram & Activity Diagram.pdf', '2022-01-09 10:24:26', '2022-01-09 10:24:26'),
('5917591591', 'Mencari Cinta Monyet', 'Ahmad Kasimpasa', 'Kasimpasa Racing', '2020', 'Wow MENARIK PARAH', 'pengetahuan', '20', 100, 'book-8.jpg', 'Diary 1_Andrian Firmansyah_1202190183_SI43GABX.pdf', '2022-01-22 11:49:02', '2022-01-22 11:49:02'),
('7941491', 'Larissa Rocepot', 'Windah Basudewa', 'WCU', '1990', 'Pertarungan sengit 2 kesatria handal', 'pengetahuan', '100', 1, 'book-5.png', 'Tugas3-Kelas05-Kelompok1-Final-Data Mining (1).pdf', '2022-01-22 11:54:48', '2022-01-22 11:54:48'),
('7971591', 'Mencari Cinta Sejati', 'Tengku Ferdiansyah', 'PT Baskoro Jaya', '2020', 'Buku Mengenai Mencari Cinta Sejati', 'romance', '26', 10, 'book-1.jpg', '[INDONESIA] MODUL 1 JURNAL.pdf', '2022-01-09 10:19:46', '2022-01-09 10:19:46'),
('797159133', 'Buku Bobo Bobo', 'Fabio Kuartararo', 'PT Jaya Laksana', '2021', 'Buku Bagus, Recomended', 'pengetahuan', '100', 5, 'book-4.png', 'Tugas ERD.pdf', '2022-01-09 10:31:36', '2022-01-09 10:31:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_akun` int(11) NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawans`
--

INSERT INTO `karyawans` (`id`, `nama_karyawan`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_hp`, `id_akun`, `jabatan`, `foto`, `created_at`, `updated_at`) VALUES
('1115044', 'Tengku Ferdiansyah', 'laki-laki', '2001-04-20', 'Bekasi Raya', '08973718718173', 6, 'pustakawan', 'image.png', '2022-01-02 18:24:29', '2022-01-02 18:24:29'),
('246', 'Ron Dennis', 'laki-laki', '2020-11-20', 'Dusun Formula', '087913719182', 2, 'pustakawan', 'image.png', '2022-01-02 11:29:16', '2022-01-02 11:29:16'),
('4928', 'Mattia Binotto', 'laki-laki', '1990-12-10', 'Kp. Kuda Jingkrak', '098373818291', 4, 'pustakawan', 'image.png', '2022-01-02 11:32:06', '2022-01-02 11:32:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_akun` int(11) NOT NULL,
  `jenis_membership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_akun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `nama_member`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_hp`, `id_akun`, `jenis_membership`, `foto`, `status_akun`, `created_at`, `updated_at`) VALUES
('356', 'Otmar Szaurnet', 'laki-laki', '2020-12-10', 'Kp.Bandar', '804801140', 10, 'basic', 'image.png', 'aktif', '2022-01-09 08:03:52', '2022-01-09 08:03:52'),
('452', 'Ahsanan', 'laki-laki', '2011-02-10', 'Kp.Cipedes', '11111111', 12, 'basic', 'image.png', 'Aktif', '2022-01-22 11:58:38', '2022-01-22 11:58:38'),
('533', 'Ahmada', 'laki-laki', '2010-02-10', 'KP. CIMENTENG RT 01/RW 16 DESA JAGABAYA KEC. CIMAUNG', '9182910', 15, 'basic', 'image.png', 'Aktif', '2022-01-22 12:00:40', '2022-01-22 12:00:40'),
('967', 'Ahsanan Jr', 'laki-laki', '2011-02-10', 'Kp.Cipedes', '11111111', 13, 'basic', 'image.png', 'Aktif', '2022-01-22 11:59:13', '2022-01-22 11:59:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `membership`
--

CREATE TABLE `membership` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_transfer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `valid` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_29_185703_createbookstable', 1),
(6, '2021_12_29_190540_create_peminjamans_table', 1),
(7, '2021_12_29_191827_create_karyawans_table', 1),
(8, '2021_12_29_192525_create_presensis_table', 1),
(9, '2021_12_29_193239_create_genres_table', 1),
(10, '2022_01_02_164433_create_member_table', 1),
(11, '2022_01_02_164647_create_membership_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjamans`
--

CREATE TABLE `peminjamans` (
  `id` int(11) NOT NULL,
  `peminjam` varchar(15) NOT NULL,
  `buku` varchar(20) NOT NULL,
  `awal_peminjaman` date NOT NULL,
  `akhir_peminjaman` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjamans`
--

INSERT INTO `peminjamans` (`id`, `peminjam`, `buku`, `awal_peminjaman`, `akhir_peminjaman`, `status`) VALUES
(1, '356', '141414', '2022-01-10', '2022-01-19', 'Belum ACC'),
(2, '356', '141414', '2022-01-10', '2022-01-19', 'Belum ACC'),
(3, '356', '141414', '2022-01-10', '2022-01-19', 'Belum ACC'),
(4, '356', '141414', '2022-01-10', '2022-01-31', 'Belum ACC'),
(5, '356', '141414', '2022-01-10', '2022-01-31', 'Belum ACC'),
(6, '356', '7971591', '2022-01-10', '2022-01-14', 'Belum ACC'),
(7, '356', '7971591', '2022-01-10', '2022-01-20', 'Belum ACC'),
(8, '356', '141414', '2022-01-23', '2022-01-27', 'Belum ACC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `presensis`
--

CREATE TABLE `presensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presensi_masuk` timestamp NULL DEFAULT NULL,
  `presensi_keluar` timestamp NULL DEFAULT NULL,
  `status_kehadiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Ron Dennis', 'rondenis@gmail.com', NULL, '$2y$10$lh3MH7qQK3JXKpz7jDF3FeI8KfdKQFCMKinj0CL2MWDWUL6sJvehq', 'pustakawan', NULL, '2022-01-02 11:29:16', '2022-01-02 11:29:16'),
(4, 'Mattia Binotto', 'binotto@gmail.com', NULL, '$2y$10$Uiyw5p/Z5ahgv61jPZX6E.acUj9MaX3dQxMLZxyqIQL765udFPTRm', 'admin', NULL, '2022-01-02 11:32:06', '2022-01-02 11:32:06'),
(5, 'Ahmad Kasim', 'aaa@gmail.com', NULL, '$2y$10$o/fj6L4G3k/AnM8r6OXibeNzqCA9GwyoqdW9mIDS7oUJ/B.kn8b4S', 'member', NULL, '2022-01-02 12:27:40', '2022-01-02 12:27:40'),
(6, 'Tengku Ferdiansyah', 'ferdi@gmail.com', NULL, '$2y$10$j3RjjqPW4w4huCMhHFnj/..E/9ko66SIhwel2PzcuGbN1Fhakty36', 'pustakawan', NULL, '2022-01-02 18:24:28', '2022-01-02 18:24:28'),
(7, 'Andrian Firmansyah', 'andrian@gmail.com', NULL, '$2y$10$quCGp9VfNvCGlScYAkiFFOppaOYKWNr8DUfGYs5XTPjnhqpmvZJHO', 'member', NULL, '2022-01-09 07:44:27', '2022-01-09 07:44:27'),
(9, 'Andrian Firmansyah', 'andrianfir@gmail.com', NULL, '$2y$10$oBWVglYiW3OY3jZGgYGb/.mAbYp4kNbpnh/om38w0NViVnVWCSBQa', 'member', NULL, '2022-01-09 07:45:09', '2022-01-09 07:45:09'),
(11, 'Otmar Szaurnet', 'otmar@gmail.com', NULL, '$2y$10$pClEvgD9Q4DAIf/a0JuQgeESWSoB8gyw33vh9z9/Rl/aCWsc/G2Vy', 'member', NULL, '2022-01-09 08:03:52', '2022-01-09 08:03:52'),
(12, 'Ahsanan', 'ahsanan@gmail.com', NULL, '$2y$10$/Oym549oz8COvUrIwwi06udJmCAZPHH1BxdRJT7nl6KqvFO7viMay', 'member', NULL, '2022-01-22 11:58:38', '2022-01-22 11:58:38'),
(14, 'Ahsanan Jr', 'ahsananjr@gmail.com', NULL, '$2y$10$vV5.g3Ok8n5UOJDBzV7S3.Sssk6z95mcpyhoppD2m/pBMCFu.Q2iO', 'member', NULL, '2022-01-22 11:59:12', '2022-01-22 11:59:12'),
(15, 'Ahmada', 'ahmada@gmail.com', NULL, '$2y$10$FOJF9vsOCtNkK.Fo6RjvFet9Y6BkXts3W3vzXSxsvfSin/SZP0GaW', 'member', NULL, '2022-01-22 12:00:40', '2022-01-22 12:00:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `presensis`
--
ALTER TABLE `presensis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `peminjamans`
--
ALTER TABLE `peminjamans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `presensis`
--
ALTER TABLE `presensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
