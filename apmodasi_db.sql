-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2021 pada 14.33
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apmodasi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `foto_admin` varchar(255) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `status_admin` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `foto_admin`, `username_admin`, `password_admin`, `email_admin`, `status_admin`, `created_at`, `update_at`) VALUES
(1, 'Administrasi', 'foto_default.png', 'admin', '$2y$10$dw3996inoENCYr7ppG4V0eEtk9fB3WuSxPtUjEnz7gJm7F65rPa/i', 'admin@gmail.com', 'Active', '2021-06-29 12:00:13', '2021-06-29 12:00:13'),
(4, 'Indah Azhary', 'image_1625004160.PNG', 'hilda', '$2y$10$HnwZfP4qOdDiL66nnEroYOpiZ/14sSyg4uao4HhnD4HuxS.wN8rU2', 'Indah@gamil.com', 'Active', '2021-06-29 22:02:13', '2021-06-29 22:02:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_auth`
--

CREATE TABLE `tb_auth` (
  `id_auth` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_auth`
--

INSERT INTO `tb_auth` (`id_auth`, `user_id`, `username`, `password`, `status`, `role`, `created_at`, `update_at`) VALUES
(1, '1', '098765456789', '$2y$10$jsf0.CdzTztAv.EB9lu4I.T.nKKeT3vAlobkIi419B5T8AY1RfTRy', 'Active', 'Kader', '2021-06-30 13:49:54', '2021-07-12 13:12:17'),
(3, '2', 'bunda2', '$2y$10$jYo6zUHKOFEGAitg/KMWHu7ZJl7G5mIpMT3dX2f.a8GvxFzLD2lJC', 'Active', 'Bunda', '2021-07-12 13:27:25', '2021-07-12 13:27:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayi`
--

CREATE TABLE `tb_bayi` (
  `id_bayi` int(11) NOT NULL,
  `nomor_bayi` varchar(255) NOT NULL,
  `nama_bayi` varchar(255) NOT NULL,
  `tanggal_lahir_bayi` varchar(255) NOT NULL,
  `tahun_bayi` varchar(255) NOT NULL,
  `jenis_kelamin_bayi` varchar(255) NOT NULL,
  `gambar_qr_bayi` varchar(255) NOT NULL,
  `foto_bayi` varchar(255) NOT NULL,
  `status_bayi` varchar(255) NOT NULL,
  `bunda_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bayi`
--

INSERT INTO `tb_bayi` (`id_bayi`, `nomor_bayi`, `nama_bayi`, `tanggal_lahir_bayi`, `tahun_bayi`, `jenis_kelamin_bayi`, `gambar_qr_bayi`, `foto_bayi`, `status_bayi`, `bunda_id`, `created_at`, `update_at`) VALUES
(2, 'wqwqw', 'Akmalul Yaqin', '2021-03-02', '2021', 'Laki - laki', '-', 'bayicoba.jpg', 'Active', '1', '2021-07-03 11:38:02', '2021-07-16 16:29:33'),
(3, '00114042103', 'Alif Yusrika', '2021-04-01', '2021', 'Laki - laki', '-', 'image_1627036972.png', 'Active', '1', '2021-07-06 13:56:44', '2021-07-23 10:42:52'),
(4, '00102022104', 'Aisyah', '2021-02-02', '2021', 'Perempuan', '-', 'img_baby.png', 'Active', '1', '2021-07-06 14:01:14', '2021-07-10 22:25:46'),
(5, '00101062105', 'Iyamisme', '2021-06-01', '2021', 'Laki - laki', '-', 'img_baby.png', 'Menunggu', '1', '2021-07-12 12:47:32', '2021-07-12 12:47:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berat_badan`
--

CREATE TABLE `tb_berat_badan` (
  `id_bb` int(11) NOT NULL,
  `bayi_id` varchar(255) NOT NULL,
  `nilai_bb` varchar(255) NOT NULL,
  `catatan_bb` varchar(255) NOT NULL,
  `kader_id` varchar(255) NOT NULL,
  `tanggal_bb` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berat_badan`
--

INSERT INTO `tb_berat_badan` (`id_bb`, `bayi_id`, `nilai_bb`, `catatan_bb`, `kader_id`, `tanggal_bb`, `created_at`, `update_at`) VALUES
(1, '3', '6', 'aa', '1', '2021-01-05', '2021-07-08 14:45:32', '2021-07-08 14:45:32'),
(4, '3', '8', 'sas', '1', '2021-04-01', '2021-07-08 16:39:37', '2021-07-08 16:39:37'),
(5, '3', '5', 'sas', '1', '2021-05-01', '2021-07-08 16:39:47', '2021-07-08 16:39:47'),
(6, '3', '7', 'sa', '1', '2021-05-14', '2021-07-08 17:16:15', '2021-07-08 17:16:15'),
(7, '3', '4', '', '1', '2021-07-10', '2021-07-10 13:18:24', '2021-07-10 13:18:24'),
(8, '3', '6', '', '1', '2021-07-10', '2021-07-10 13:27:41', '2021-07-10 13:27:41'),
(9, '3', '8', 'Kasi mandi kalau pagi', '1', '2021-07-11', '2021-07-10 16:10:28', '2021-07-10 16:10:28'),
(10, '4', '5', 'Kurangi begadang', '1', '2021-07-11', '2021-07-10 22:29:22', '2021-07-10 22:29:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bunda`
--

CREATE TABLE `tb_bunda` (
  `id_bunda` int(11) NOT NULL,
  `nama_bunda` varchar(255) NOT NULL,
  `kontak_bunda` varchar(255) NOT NULL,
  `alamat_bunda` varchar(255) NOT NULL,
  `foto_bunda` varchar(255) NOT NULL,
  `creatde_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bunda`
--

INSERT INTO `tb_bunda` (`id_bunda`, `nama_bunda`, `kontak_bunda`, `alamat_bunda`, `foto_bunda`, `creatde_at`, `update_at`) VALUES
(2, 'Andi Indah Azhari', '098123456', 'Jalan Samata', 'image_1626096445.png', '2021-07-12 13:27:25', '2021-07-12 13:27:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_imunisasi`
--

CREATE TABLE `tb_imunisasi` (
  `id_imunisasi` int(11) NOT NULL,
  `bayi_id` varchar(255) NOT NULL,
  `no_imunisasi` varchar(255) NOT NULL,
  `nama_imunisasi` varchar(255) NOT NULL,
  `usia_bayi_imunisasi` varchar(255) NOT NULL,
  `kader_id` varchar(255) NOT NULL,
  `status_imunisasi` varchar(255) NOT NULL,
  `catatan_imunisasi` varchar(255) NOT NULL,
  `keterangan_imunisasi` varchar(255) NOT NULL,
  `interval_imunisasi` varchar(255) NOT NULL,
  `tanggal_imunisasi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_imunisasi`
--

INSERT INTO `tb_imunisasi` (`id_imunisasi`, `bayi_id`, `no_imunisasi`, `nama_imunisasi`, `usia_bayi_imunisasi`, `kader_id`, `status_imunisasi`, `catatan_imunisasi`, `keterangan_imunisasi`, `interval_imunisasi`, `tanggal_imunisasi`, `created_at`, `update_at`) VALUES
(1, '3', '1', 'HB', '3 Bulan', '1', 'Sudah', 'Sehat', 'Opsional', '0 - 7 Hari', '2021-07-11', '2021-07-07 13:17:37', '2021-07-10 20:36:11'),
(2, '3', '2', 'BCG', '-', '-', 'Belum', '-', 'Wajib', '0 - 11 Bulan', '-', '2021-07-07 13:17:37', '2021-07-07 13:17:37'),
(3, '3', '3', 'Polio 1', '3 Bulan', '1', 'Sudah', 'Banyaki berjemur', 'Wajib', '0 - 11 Bulan', '2021-07-10', '2021-07-07 13:17:37', '2021-07-10 14:22:38'),
(4, '3', '4', 'DPT-HB-Hib 1', '3 Bulan', '1', 'Sudah', 'Tidur siang', 'Wajib', '2 - 11 Bulan', '2021-07-10', '2021-07-07 13:17:37', '2021-07-10 15:36:37'),
(5, '3', '5', 'Polio 2', '-', '-', 'Belum', '-', 'Wajib', '2 - 11 Bulan', '-', '2021-07-07 13:17:37', '2021-07-07 13:17:37'),
(6, '3', '6', 'DPT-HB-Hib 2', '-', '-', 'Belum', '-', 'Wajib', '3 - 11 Bulan', '-', '2021-07-07 13:17:37', '2021-07-07 13:17:37'),
(7, '3', '7', 'Polio 3', '-', '-', 'Belum', '-', 'Wajib', '3 - 11 Bulan', '-', '2021-07-07 13:17:37', '2021-07-07 13:17:37'),
(8, '3', '8', 'DPT-HB-Hib 3', '-', '-', 'Belum', '-', 'Wajib', '4 - 11 Bulan', '-', '2021-07-07 13:17:37', '2021-07-07 13:17:37'),
(9, '3', '9', 'Polio 4', '-', '-', 'Belum', '-', 'Wajib', '4 - 11 Bulan', '-', '2021-07-07 13:17:37', '2021-07-07 13:17:37'),
(10, '3', '10', 'IPV', '-', '-', 'Belum', '-', 'Wajib', '4 - 11 Bulan', '-', '2021-07-07 13:17:37', '2021-07-07 13:17:37'),
(11, '3', '11', 'CAMPAK', '-', '-', 'Belum', '-', 'Wajib', '9 - 11 Bulan', '-', '2021-07-07 13:17:37', '2021-07-07 13:17:37'),
(12, '2', '1', 'HB', '3', '1', 'Sudah', 'Sehat', 'Opsional', '0 - 7 Hari', '2021-07-16', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(13, '2', '2', 'BCG', '3', '1', 'Sudah', 'Banyak Minum', 'Wajib', '0 - 11 Bulan', '2021-07-16', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(14, '2', '3', 'Polio 1', '4', '1', 'Sudah', '3sa', 'Wajib', '0 - 11 Bulan', '2021-07-07', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(15, '2', '4', 'DPT-HB-Hib 1', '3', '1', 'Sudah', 'dsd', 'Wajib', '2 - 11 Bulan', '2021-07-30', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(16, '2', '5', 'Polio 2', '4', '1', 'Sudah', 'dsd', 'Wajib', '2 - 11 Bulan', '2021-07-15', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(17, '2', '6', 'DPT-HB-Hib 2', '2', '1', 'Sudah', 'dss', 'Wajib', '3 - 11 Bulan', '2021-07-13', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(18, '2', '7', 'Polio 3', '5', '1', 'Sudah', 'fds', 'Wajib', '3 - 11 Bulan', '2021-07-23', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(19, '2', '8', 'DPT-HB-Hib 3', '6', '1', 'Sudah', '43ds', 'Wajib', '4 - 11 Bulan', '2021-07-17', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(20, '2', '9', 'Polio 4', '7', '1', 'Sudah', 'gfhfg', 'Wajib', '4 - 11 Bulan', '2021-07-16', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(21, '2', '10', 'IPV', '7', '1', 'Sudah', 'trge', 'Wajib', '4 - 11 Bulan', '2021-07-14', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(22, '2', '11', 'CAMPAK', '9', '1', 'Sudah', 'hgf', 'Wajib', '9 - 11 Bulan', '2021-07-25', '2021-07-10 22:18:44', '2021-07-26 08:56:49'),
(23, '4', '1', 'HB', '5 Bulan', '1', 'Sudah', 'Dfh', 'Opsional', '0 - 7 Hari', '2021-07-12', '2021-07-10 22:25:46', '2021-07-12 13:19:46'),
(24, '4', '2', 'BCG', '5 Bulan', '1', 'Sudah', 'Tidur siang', 'Wajib', '0 - 11 Bulan', '2021-07-11', '2021-07-10 22:25:46', '2021-07-10 22:31:21'),
(25, '4', '3', 'Polio 1', '3', '1', 'Sudah', 'ds', 'Wajib', '0 - 11 Bulan', '2021-08-03', '2021-07-10 22:25:46', '2021-08-15 13:05:44'),
(26, '4', '4', 'DPT-HB-Hib 1', '-', '-', 'Belum', '-', 'Wajib', '2 - 11 Bulan', '-', '2021-07-10 22:25:46', '2021-07-10 22:25:46'),
(27, '4', '5', 'Polio 2', '21', '1', 'Sudah', 'asa', 'Wajib', '2 - 11 Bulan', '2021-08-10', '2021-07-10 22:25:46', '2021-08-15 13:02:52'),
(28, '4', '6', 'DPT-HB-Hib 2', '-', '-', 'Belum', '-', 'Wajib', '3 - 11 Bulan', '-', '2021-07-10 22:25:46', '2021-07-10 22:25:46'),
(29, '4', '7', 'Polio 3', '212', '1', 'Sudah', 'sas', 'Wajib', '3 - 11 Bulan', '2021-08-19', '2021-07-10 22:25:46', '2021-08-15 13:04:12'),
(30, '4', '8', 'DPT-HB-Hib 3', '-', '-', 'Belum', '-', 'Wajib', '4 - 11 Bulan', '-', '2021-07-10 22:25:46', '2021-07-10 22:25:46'),
(31, '4', '9', 'Polio 4', '-', '-', 'Belum', '-', 'Wajib', '4 - 11 Bulan', '-', '2021-07-10 22:25:46', '2021-07-10 22:25:46'),
(32, '4', '10', 'IPV', '-', '-', 'Belum', '-', 'Wajib', '4 - 11 Bulan', '-', '2021-07-10 22:25:46', '2021-07-10 22:25:46'),
(33, '4', '11', 'CAMPAK', '-', '-', 'Belum', '-', 'Wajib', '9 - 11 Bulan', '-', '2021-07-10 22:25:46', '2021-07-10 22:25:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kader`
--

CREATE TABLE `tb_kader` (
  `id_kader` int(11) NOT NULL,
  `nip_kader` varchar(255) NOT NULL,
  `nama_kader` varchar(255) NOT NULL,
  `jenis_kelamin_kader` varchar(255) NOT NULL,
  `kontak_kader` varchar(255) NOT NULL,
  `alamat_kader` varchar(255) NOT NULL,
  `foto_kader` varchar(255) NOT NULL,
  `status_kader` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kader`
--

INSERT INTO `tb_kader` (`id_kader`, `nip_kader`, `nama_kader`, `jenis_kelamin_kader`, `kontak_kader`, `alamat_kader`, `foto_kader`, `status_kader`, `created_at`, `update_at`) VALUES
(1, '098765456789', 'Awal Fikri', 'Perempuan', '123456789', 'Jalan Sultan Alauddin', 'image_1627069414.png', 'Active', '2021-06-30 13:49:54', '2021-07-23 19:43:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayat_kader`
--

CREATE TABLE `tb_riwayat_kader` (
  `id_riwayat_kader` int(11) NOT NULL,
  `kader_id` varchar(255) NOT NULL,
  `bayi_id` varchar(255) NOT NULL,
  `usia_bayi` varchar(255) NOT NULL,
  `jenis_input` varchar(255) NOT NULL,
  `value_input` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `tanggal_riwayat` varchar(255) NOT NULL,
  `crated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_riwayat_kader`
--

INSERT INTO `tb_riwayat_kader` (`id_riwayat_kader`, `kader_id`, `bayi_id`, `usia_bayi`, `jenis_input`, `value_input`, `catatan`, `tanggal_riwayat`, `crated_at`, `update_at`) VALUES
(1, '1', '3', '-', 'Tinggi', '80', 'Normal', '2021-07-11', '2021-07-10 20:31:06', '2021-07-10 20:31:06'),
(2, '1', '3', '3 Bulan', 'Vaksin', '1', 'Sehat', '2021-07-11', '2021-07-10 20:36:11', '2021-07-10 20:36:11'),
(3, '1', '4', '-', 'Berat', '5', 'Kurangi begadang', '2021-07-11', '2021-07-10 22:29:22', '2021-07-10 22:29:22'),
(4, '1', '4', '5 Bulan', 'Vaksin', '1', 'Tidur siang', '2021-07-11', '2021-07-10 22:31:21', '2021-07-10 22:31:21'),
(5, '1', '4', '5 Bulan', 'Vaksin', '2', 'Dfh', '2021-07-12', '2021-07-12 13:19:46', '2021-07-12 13:19:46'),
(6, '1', '2', '3', '1', 'Sudah', 'Sehat', '2021-07-16', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(7, '1', '2', '3', '2', 'Sudah', 'Banyak Minum', '2021-07-16', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(8, '1', '2', '4', '3', 'Sudah', '3sa', '2021-07-07', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(9, '1', '2', '3', '4', 'Sudah', 'dsd', '2021-07-30', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(10, '1', '2', '4', '5', 'Sudah', 'dsd', '2021-07-15', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(11, '1', '2', '2', '6', 'Sudah', 'dss', '2021-07-13', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(12, '1', '2', '5', '7', 'Sudah', 'fds', '2021-07-23', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(13, '1', '2', '6', '8', 'Sudah', '43ds', '2021-07-17', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(14, '1', '2', '7', '9', 'Sudah', 'gfhfg', '2021-07-16', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(15, '1', '2', '7', '10', 'Sudah', 'trge', '2021-07-14', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(16, '1', '2', '9', '11', 'Sudah', 'hgf', '2021-07-25', '2021-07-26 08:56:49', '2021-07-26 08:56:49'),
(17, '1', '4', '21', '5', 'Sudah', 'asa', '2021-08-10', '2021-08-15 13:02:52', '2021-08-15 13:02:52'),
(18, '1', '4', '212', '7', 'Sudah', 'sas', '2021-08-19', '2021-08-15 13:04:12', '2021-08-15 13:04:12'),
(19, '1', '4', '3', '3', 'Sudah', 'ds', '2021-08-03', '2021-08-15 13:05:44', '2021-08-15 13:05:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tinggi_badan`
--

CREATE TABLE `tb_tinggi_badan` (
  `id_tb` int(11) NOT NULL,
  `bayi_id` varchar(255) NOT NULL,
  `nilai_tb` varchar(255) NOT NULL,
  `catatan_tb` varchar(255) NOT NULL,
  `kader_id` varchar(255) NOT NULL,
  `tanggal_tb` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tinggi_badan`
--

INSERT INTO `tb_tinggi_badan` (`id_tb`, `bayi_id`, `nilai_tb`, `catatan_tb`, `kader_id`, `tanggal_tb`, `created_at`, `update_at`) VALUES
(1, '3', '30', 'aa', '1', '2021-04-01', '2021-07-08 17:33:44', '2021-07-08 17:33:44'),
(2, '3', '50', 'aa', '1', '2021-05-01', '2021-07-08 17:33:54', '2021-07-08 17:33:54'),
(3, '3', '48', 'Banyak minum air putih', '1', '2021-07-10', '2021-07-10 13:42:49', '2021-07-10 13:42:49'),
(4, '3', '70', '', '1', '2021-07-10', '2021-07-10 13:47:49', '2021-07-10 13:47:49'),
(5, '3', '75', '', '1', '2021-07-11', '2021-07-10 16:41:19', '2021-07-10 16:41:19'),
(6, '3', '80', 'Normal', '1', '2021-07-11', '2021-07-10 20:31:06', '2021-07-10 20:31:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_auth`
--
ALTER TABLE `tb_auth`
  ADD PRIMARY KEY (`id_auth`);

--
-- Indeks untuk tabel `tb_bayi`
--
ALTER TABLE `tb_bayi`
  ADD PRIMARY KEY (`id_bayi`);

--
-- Indeks untuk tabel `tb_berat_badan`
--
ALTER TABLE `tb_berat_badan`
  ADD PRIMARY KEY (`id_bb`);

--
-- Indeks untuk tabel `tb_bunda`
--
ALTER TABLE `tb_bunda`
  ADD PRIMARY KEY (`id_bunda`);

--
-- Indeks untuk tabel `tb_imunisasi`
--
ALTER TABLE `tb_imunisasi`
  ADD PRIMARY KEY (`id_imunisasi`);

--
-- Indeks untuk tabel `tb_kader`
--
ALTER TABLE `tb_kader`
  ADD PRIMARY KEY (`id_kader`);

--
-- Indeks untuk tabel `tb_riwayat_kader`
--
ALTER TABLE `tb_riwayat_kader`
  ADD PRIMARY KEY (`id_riwayat_kader`);

--
-- Indeks untuk tabel `tb_tinggi_badan`
--
ALTER TABLE `tb_tinggi_badan`
  ADD PRIMARY KEY (`id_tb`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_auth`
--
ALTER TABLE `tb_auth`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_bayi`
--
ALTER TABLE `tb_bayi`
  MODIFY `id_bayi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_berat_badan`
--
ALTER TABLE `tb_berat_badan`
  MODIFY `id_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_bunda`
--
ALTER TABLE `tb_bunda`
  MODIFY `id_bunda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_imunisasi`
--
ALTER TABLE `tb_imunisasi`
  MODIFY `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_kader`
--
ALTER TABLE `tb_kader`
  MODIFY `id_kader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayat_kader`
--
ALTER TABLE `tb_riwayat_kader`
  MODIFY `id_riwayat_kader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_tinggi_badan`
--
ALTER TABLE `tb_tinggi_badan`
  MODIFY `id_tb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
