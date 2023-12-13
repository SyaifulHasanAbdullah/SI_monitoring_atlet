-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2023 pada 05.25
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ooputs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabor`
--

CREATE TABLE `cabor` (
  `id_cabor` int(11) NOT NULL,
  `nama_cabor` varchar(45) NOT NULL,
  `organisasi` varchar(45) NOT NULL,
  `jumlah_club` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabor`
--

INSERT INTO `cabor` (`id_cabor`, `nama_cabor`, `organisasi`, `jumlah_club`) VALUES
(1, 'Karate', 'Olahraga Exstreme', 5),
(2, 'Bulu Tangkis', 'Olahraga Sehat', 17),
(3, 'Karate', 'Olahraga Exstreme', 17),
(2020, 'Sepak Bola', 'Olahraga Sehat', 10),
(2021, 'Taekwondo', 'Olahraga Exstreme', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatih`
--

CREATE TABLE `pelatih` (
  `id_pelatih` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(45) NOT NULL,
  `tgl_lahir` varchar(45) NOT NULL,
  `tpt_lahir` varchar(45) NOT NULL,
  `cabor_id_cabor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelatih`
--

INSERT INTO `pelatih` (`id_pelatih`, `nama`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `tpt_lahir`, `cabor_id_cabor`) VALUES
(1, 'Syaiful Hasan Abdullah', 'Giri', 'L', '12 September 2023', 'Banyuwangi', 'Taekwondo'),
(2, 'Ahmad Fauzan', 'Rogojampi', 'L', '19 Agustus 2023', 'Arab Saudi', 'Taekwondo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_atlet`
--

CREATE TABLE `tb_atlet` (
  `id_atlet` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(45) NOT NULL,
  `tgl_lahir` varchar(45) NOT NULL,
  `tpt_lahir` varchar(45) NOT NULL,
  `cabor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cabor`
--
ALTER TABLE `cabor`
  ADD PRIMARY KEY (`id_cabor`);

--
-- Indeks untuk tabel `pelatih`
--
ALTER TABLE `pelatih`
  ADD PRIMARY KEY (`id_pelatih`);

--
-- Indeks untuk tabel `tb_atlet`
--
ALTER TABLE `tb_atlet`
  ADD PRIMARY KEY (`id_atlet`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cabor`
--
ALTER TABLE `cabor`
  MODIFY `id_cabor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022;

--
-- AUTO_INCREMENT untuk tabel `pelatih`
--
ALTER TABLE `pelatih`
  MODIFY `id_pelatih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2024;

--
-- AUTO_INCREMENT untuk tabel `tb_atlet`
--
ALTER TABLE `tb_atlet`
  MODIFY `id_atlet` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
