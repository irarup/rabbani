-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2020 pada 02.11
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rabbani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anak_karyawan`
--

CREATE TABLE `anak_karyawan` (
  `id` int(11) NOT NULL,
  `nip` char(2) COLLATE latin1_general_ci NOT NULL,
  `nama_anak` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jk` enum('l','p') COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `anak_karyawan`
--

INSERT INTO `anak_karyawan` (`id`, `nip`, `nama_anak`, `jk`) VALUES
(1, 'A1', 'Yani', 'p'),
(2, 'A1', 'Sri', 'p'),
(3, 'A1', 'Jaka', 'l'),
(10, 'A2', 'Rika', 'p'),
(11, 'A2', 'Rifki', 'l');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`) VALUES
(1, 'A', 100000, 20),
(2, 'B', 150000, 15),
(3, 'C', 75000, 19),
(4, 'D', 125000, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_beli`
--

CREATE TABLE `detail_beli` (
  `id_detailbeli` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `detail_beli`
--

INSERT INTO `detail_beli` (`id_detailbeli`, `id_pembelian`, `id_barang`, `jumlah`) VALUES
(5, 2, 1, 1),
(6, 2, 2, 1),
(7, 3, 2, 2),
(8, 3, 3, 9),
(9, 4, 3, 4),
(10, 4, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nip` char(2) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `jk` enum('l','p') COLLATE latin1_general_ci NOT NULL,
  `status` enum('kontrak','tetap') COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nip`, `nama`, `jk`, `status`) VALUES
(1, 'A1', 'Tono', 'l', 'kontrak'),
(2, 'A2', 'Jaka', 'l', 'tetap'),
(3, 'A3', 'Yanti', 'p', 'tetap'),
(4, 'B2', 'Diki', 'l', 'tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ttl` date NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `no_hp` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(300) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `total` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `noncash` int(11) NOT NULL,
  `diskon` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_beli`, `total`, `cash`, `noncash`, `diskon`) VALUES
(2, '2019-06-01', 250000, 100000, 100000, 50000),
(3, '2019-06-01', 975000, 950000, 25000, 0),
(4, '2019-06-05', 425000, 0, 400000, 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `restok`
--

CREATE TABLE `restok` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `restok`
--

INSERT INTO `restok` (`id`, `id_barang`, `tgl`, `jumlah`) VALUES
(2, 1, '2019-06-01', 20),
(3, 2, '2019-06-01', 10),
(4, 2, '2019-06-01', 5),
(5, 3, '2019-06-01', 9),
(6, 3, '2019-06-05', 10),
(7, 4, '2019-08-05', 23);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anak_karyawan`
--
ALTER TABLE `anak_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indeks untuk tabel `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD PRIMARY KEY (`id_detailbeli`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `beli` (`id_pembelian`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`,`nip`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_hp` (`no_hp`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `restok`
--
ALTER TABLE `restok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anak_karyawan`
--
ALTER TABLE `anak_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_beli`
--
ALTER TABLE `detail_beli`
  MODIFY `id_detailbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `restok`
--
ALTER TABLE `restok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD CONSTRAINT `barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `beli` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `restok`
--
ALTER TABLE `restok`
  ADD CONSTRAINT `restok_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
