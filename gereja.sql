-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2022 pada 10.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gereja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `babtis`
--

CREATE TABLE `babtis` (
  `no_babtis` int(12) NOT NULL,
  `tglbabtis` text NOT NULL,
  `pendetapembabtis` text NOT NULL,
  `idjemaat` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `babtis`
--

INSERT INTO `babtis` (`no_babtis`, `tglbabtis`, `pendetapembabtis`, `idjemaat`) VALUES
(441, '26 april 2007', 'pdt. jhosua siahaan s.th', 111),
(442, '26 April 2008', 'pdt. jhosua siahaan s.th', 111),
(443, '26 Mei 2022', 'pdt. jhosua siahaan s.th', 113);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datajemaat`
--

CREATE TABLE `datajemaat` (
  `idjemaat` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jeniskelamin` varchar(50) NOT NULL,
  `nohp` bigint(12) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tgllahir` text NOT NULL,
  `tahunbabtis` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datajemaat`
--

INSERT INTO `datajemaat` (`idjemaat`, `nama`, `jeniskelamin`, `nohp`, `tempatlahir`, `tgllahir`, `tahunbabtis`) VALUES
(111, 'Ewil Ginting ', 'Pria', 81164194111, 'Kabanjahe', '26 April 2001', 2022),
(112, 'Anggy Tresia', 'Wanita', 87893445744, 'Kabanjahe', '18 Agustus 2001', 2022),
(113, 'thomy panjaitan', 'Pria', 87893445744, 'medan', '24 Mei 2001', 2022),
(114, 'fransesko ', 'Pria', 87865443544, 'Sibolga', '03 Maret 2001', 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakeuangan`
--

CREATE TABLE `datakeuangan` (
  `No_faktur` int(20) NOT NULL,
  `ibadahutama` int(20) NOT NULL,
  `prspa` int(20) NOT NULL,
  `danasosial` int(20) NOT NULL,
  `pengeluaran` int(20) NOT NULL,
  `totalmingguan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakeuangan`
--

INSERT INTO `datakeuangan` (`No_faktur`, `ibadahutama`, `prspa`, `danasosial`, `pengeluaran`, `totalmingguan`) VALUES
(221, 1000000, 500000, 300000, 300000, 1500000),
(222, 2000000, 150000, 300000, 150000, 2300000),
(223, 3000000, 200000, 500000, 700000, 3000000),
(224, 1000000, 100000, 100000, 200000, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `nojadwal` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `hari` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`nojadwal`, `tanggal`, `hari`, `tempat`, `keterangan`) VALUES
(331, '11 Juni 2022', 'Senin', 'Rumah Kel. Ewil', 'dimulai pukul 18:00 WIB hingga selesai'),
(332, '12 Juli 2022', 'Selasa', 'Gereja', 'Mempersiapkan Penampilan Paduan suara'),
(333, '13 Juli 2022', 'Rabu', 'Sibolangit', 'Ibadah Lapangan '),
(334, '17 Agustus 2022', 'Senin', 'Lapangan Merdeka', 'Perayaan Kemerdekaan Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`idlogin`, `email`, `password`) VALUES
(111, 'ewilginting09@gmail.com', 'ewilginting09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `babtis`
--
ALTER TABLE `babtis`
  ADD PRIMARY KEY (`no_babtis`);

--
-- Indeks untuk tabel `datajemaat`
--
ALTER TABLE `datajemaat`
  ADD PRIMARY KEY (`idjemaat`);

--
-- Indeks untuk tabel `datakeuangan`
--
ALTER TABLE `datakeuangan`
  ADD PRIMARY KEY (`No_faktur`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`nojadwal`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
