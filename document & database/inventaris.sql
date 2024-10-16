-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2023 pada 08.50
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `spesifikasi` varchar(100) DEFAULT NULL,
  `lokasi_barang` varchar(100) DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `sumber_dana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `spesifikasi`, `lokasi_barang`, `kategori`, `jml_barang`, `kondisi`, `jenis_barang`, `sumber_dana`) VALUES
('1251', 'susu', 'susu protein wight', 'Semarang', 'baru', 4000, 'tersegel', 'bubuk', 'ovo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar_barang`
--

CREATE TABLE `keluar_barang` (
  `id_brg_keluar` int(11) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `jml_brg_keluar` int(11) NOT NULL,
  `keperluan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keluar_barang`
--

INSERT INTO `keluar_barang` (`id_brg_keluar`, `kode_barang`, `nama_brg`, `tgl_keluar`, `penerima`, `jml_brg_keluar`, `keperluan`) VALUES
(9980, '1251', 'susu', '2023-11-16', 'rizki', 1000, 'distiutor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk_barang`
--

CREATE TABLE `masuk_barang` (
  `id_msk_brg` int(11) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `kode_supplier` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masuk_barang`
--

INSERT INTO `masuk_barang` (`id_msk_brg`, `kode_barang`, `nama_brg`, `tgl_masuk`, `jml_masuk`, `kode_supplier`) VALUES
(6, '1251', 'susu', '2023-11-15', 4300, '1123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `no_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jml_pinjam` int(11) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`no_pinjam`, `tgl_pinjam`, `kode_barang`, `nama_brg`, `jml_pinjam`, `peminjam`, `tgl_kembali`, `keterangan`) VALUES
(2, '2023-11-17', '1251', 'susu', 300, 'rizki', '2023-11-19', 'distributor market');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jml_brg_masuk` int(11) NOT NULL,
  `jml_brg_keluar` int(11) NOT NULL,
  `total_brg` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`kode_barang`, `nama_brg`, `jml_brg_masuk`, `jml_brg_keluar`, `total_brg`, `keterangan`) VALUES
('1251', 'susu', 4000, 0, -300, 'barang telah masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `telp_supplier` varchar(20) NOT NULL,
  `kota_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `kota_supplier`) VALUES
('1123', 'rizki', 'gasem permai', '085714273101', 'Semarang'),
('1221', 'emma', 'candisari', '0819128', 'Semarang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Rizki Ardiansyah Novianto', 'rizki', 'rizki121521', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `keluar_barang`
--
ALTER TABLE `keluar_barang`
  ADD PRIMARY KEY (`id_brg_keluar`);

--
-- Indeks untuk tabel `masuk_barang`
--
ALTER TABLE `masuk_barang`
  ADD PRIMARY KEY (`id_msk_brg`);

--
-- Indeks untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`no_pinjam`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keluar_barang`
--
ALTER TABLE `keluar_barang`
  MODIFY `id_brg_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9981;

--
-- AUTO_INCREMENT untuk tabel `masuk_barang`
--
ALTER TABLE `masuk_barang`
  MODIFY `id_msk_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  MODIFY `no_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
