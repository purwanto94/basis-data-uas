-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Jul 2021 pada 09.44
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `email`, `password`) VALUES
(1, 'Purwanto Sastrowidjoyo', 'purwanto', 'purwanto94@gmail.com', 'bfc13c240d8bf5f3ad43f41d11dca311'),
(2, 'Rafi Mulyana', 'rafi', 'rafi.mulyana@gmail.com', 'b2f0d9e408eccecc0edb74d654d36a72');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_harga_mobil`
--

CREATE TABLE `log_harga_mobil` (
  `log_id` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `harga_lama` int(20) NOT NULL,
  `harga_baru` int(20) NOT NULL,
  `waktu_perubahan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_harga_mobil`
--

INSERT INTO `log_harga_mobil` (`log_id`, `id_mobil`, `harga_lama`, `harga_baru`, `waktu_perubahan`) VALUES
(1, 5004, 300000, 120000, '2021-07-13 20:08:33'),
(2, 5008, 250000, 300000, '2021-07-18 10:28:42'),
(3, 5009, 1500000, 1600000, '2021-07-18 11:25:44'),
(4, 5010, 1500000, 200000, '2021-07-18 14:20:13'),
(5, 5004, 120000, 300000, '2021-07-18 14:31:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(10) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `no_plat`, `jenis`, `merk`, `tahun`, `warna`, `harga`) VALUES
(5001, 'B 1230 AD', 'SUV Sport', 'Pajero Sport', '2019', 'Hitam Biru', 200000),
(5003, 'B 8795 WE', 'Sedan', 'Toyota Camry', '2018', 'Merah', 250000),
(5004, 'B 5845 AD', 'Sedan', 'Mazda', '2019', 'Hitam', 300000),
(5007, 'B 4268 PD', 'Sport car', 'Lamborgini', '2020', 'Ungu', 1000000),
(5008, 'B 7652 RV', 'SUV', 'Honda BRV', '2019', 'Merah', 300000);

--
-- Trigger `mobil`
--
DELIMITER $$
CREATE TRIGGER `before_mobil_update` BEFORE UPDATE ON `mobil` FOR EACH ROW BEGIN
INSERT INTO log_harga_mobil
SET id_mobil = OLD.id_mobil,
harga_baru = new.harga,
harga_lama = old.harga,
waktu_perubahan = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(10) NOT NULL,
  `nama_admin` varchar(40) NOT NULL,
  `pelanggan` varchar(30) DEFAULT NULL,
  `hp` varchar(20) NOT NULL,
  `id_mobil` int(10) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `lama_sewa` int(10) NOT NULL,
  `total_bayar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `nama_admin`, `pelanggan`, `hp`, `id_mobil`, `tgl_pinjam`, `tgl_kembali`, `lama_sewa`, `total_bayar`) VALUES
(2009, 'purwanto', 'Rafi Ahmad', '08190217621', 5007, '2021-07-13', '2021-07-15', 2, '2000000'),
(2010, 'purwanto', 'Eko', '081987321542', 5001, '2021-07-12', '2021-07-14', 2, '400000'),
(2011, 'purwanto', 'Yoga', '081902365123', 5004, '2021-07-06', '2021-07-08', 2, '600000'),
(2012, 'purwanto', 'Ahmad Dhani', '081321765231', 5007, '2021-07-12', '2021-07-14', 2, '2000000'),
(2013, 'rafi', 'Jamaludin', '081324123123', 5008, '2021-07-05', '2021-07-08', 3, '750000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `log_harga_mobil`
--
ALTER TABLE `log_harga_mobil`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `log_harga_mobil`
--
ALTER TABLE `log_harga_mobil`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5011;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2017;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
