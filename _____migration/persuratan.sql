-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2019 pada 02.14
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persuratan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(191) NOT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_penyelesaian` date DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `asal` varchar(191) DEFAULT NULL,
  `isi` text,
  `instruksi` text,
  `terusan` varchar(191) DEFAULT NULL,
  `sifat` enum('Rahasia','Penting','Biasa','Lainnya') DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id`, `nomor_surat`, `tanggal_surat`, `tanggal_penyelesaian`, `tanggal_masuk`, `asal`, `isi`, `instruksi`, `terusan`, `sifat`, `file`) VALUES
(341, '000001001', '2019-03-21', '2019-03-21', '2019-03-21', 'Romadhan', 'Apa Hayyooo', '<p>Instruksinya yang bener bener aja deh</p>', 'Kabag.Perbendaharaan, Kabag.Pelaksanaan Anggaran, Kabag.Verifikasi', 'Rahasia', 'd686ed1b747219a51543d883c31dc749.png'),
(342, '000001002', '2019-03-21', '2019-03-21', '2019-03-21', 'Biro Hukum', 'awdwa', '<p>awdadwadwa</p>', 'Kabag.Pelaksanaan Anggaran, Kabag.Verifikasi', 'Lainnya', NULL),
(343, '000001003', '2018-03-21', '2019-03-21', '2019-03-21', 'test', 'awdwadw', '<p>awdwadwa</p>', 'Kabag.Pelaksanaan Anggaran, Lainnya', 'Biasa', NULL),
(344, 'wadawdawdwa', '2019-03-21', '2019-03-21', '2019-03-21', 'awdawdaw', 'awdawdawdawd', '<p>awdawdawdawdawdawdawdawdaw<i>dawdawdawdawdawdawdawdawdawdawdawd awdawdawdawd awdawdawdawd awdawdawdawd</i></p><p><i><u>awdawdawdawd</u><br></i></p><p><i>awdawdawdawd</i><br></p>', 'Kabag.Pelaksanaan Anggaran, Kabag.Perbendaharaan, Kabag.Verifikasi', 'Lainnya', 'd64e9ab1c6b0ffa7efa84195e1dfb418.docx'),
(345, 'awdwadwa', '2019-03-21', '2019-03-21', '2018-03-21', 'awdwadwa', 'awdwadw', '<p>awdwadwada</p>', 'Kabag.Perbendaharaan, Kabag.Pelaksanaan Anggaran, Kabag.Verifikasi', 'Lainnya', 'a06af0c2c349cd120c85644af654b6d3.txt'),
(346, 'qedawdwa', '2019-03-22', '2019-03-22', '2019-03-22', 'awdwadwa', 'awdwadaw', '<p style=\"text-align: center; \"><span style=\"font-weight: bolder;\"><u>wkwk land wkwkw land wkwk land</u></span><u style=\"font-weight: bolder;\">wkwk land wkwkw land wkwk landÂ </u><span style=\"font-weight: bolder;\"><u>wkwk land wkwkw land wkwk land</u></span><u style=\"font-weight: bolder;\">wkwk land wkwkw land wkwk landÂ </u><span style=\"font-weight: bolder;\"><u>wkwk land wkwkw land wkwk land</u></span><u style=\"font-weight: bolder;\">wkwk land wkwkw land wkwk landÂ </u><span style=\"font-weight: bolder;\"><u>wkwk land wkwkw land wkwk land</u></span><u style=\"font-weight: bolder;\">wkwk land wkwkw land wkwk landÂ </u><span style=\"font-weight: bolder;\"><u>wkwk land wkwkw land wkwk land</u></span><u style=\"font-weight: bolder;\">wkwk land wkwkw land wkwk landÂ </u><span style=\"font-weight: bolder;\"><u>wkwk land wkwkw land wkwk land</u></span><u style=\"font-weight: bolder;\">wkwk land wkwkw land wkwk landÂ </u><span style=\"font-weight: bolder;\"><u>wkwk land wkwkw land wkwk land</u></span><u style=\"font-weight: bolder;\">wkwk land wkwkw land wkwk landÂ </u><span style=\"font-weight: bolder;\"><u>wkwk land wkwkw land wkwk land</u></span><u style=\"font-weight: bolder;\">wkwk land wkwkw land wkwk landÂ </u><br></p>', 'Kabag.Pelaksanaan Anggaran, Kabag.Perbendaharaan, Kabag.Verifikasi', 'Penting', NULL),
(347, '000001001', '2019-03-22', '2019-03-22', '2019-03-22', 'Test Saja', 'Test Surat Saja', '<p>Test test test lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>', 'Kabag.Pelaksanaan Anggaran, Kabag.Perbendaharaan, Kabag.Verifikasi', 'Biasa', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `terusan`
--

CREATE TABLE `terusan` (
  `id` int(11) NOT NULL,
  `terusan` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `terusan`
--

INSERT INTO `terusan` (`id`, `terusan`) VALUES
(17, 'Kabag.Verifikasi'),
(25, 'Kabag.Perbendaharaan'),
(26, 'Kabag.Pelaksanaan Anggaran'),
(27, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `profile` varchar(191) DEFAULT NULL,
  `nama_lengkap` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `nomor_anggota` varchar(191) DEFAULT NULL,
  `jabatan` varchar(191) DEFAULT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `tanggal_daftar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `profile`, `nama_lengkap`, `email`, `nomor_anggota`, `jabatan`, `username`, `password`, `tanggal_daftar`) VALUES
(73, 'e9c08460d8d14089126f9906f3219dc3.jpg', 'Romadhan', 'romadhanedy@outlook.com', '0000001', 'Intership', 'romadhan', 'c8837b23ff8aaa8a2dde915473ce0991', '19 March 2019'),
(74, '4f318e49595b24817e2f00721fd7164a.png', 'Imad', 'imad@mad.com', '00002', 'Eselon 1', 'mad_qq', 'e10adc3949ba59abbe56e057f20f883e', '20 March 2019');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `terusan`
--
ALTER TABLE `terusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT untuk tabel `terusan`
--
ALTER TABLE `terusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
