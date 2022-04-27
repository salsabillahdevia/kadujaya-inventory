-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 07 Mar 2022 pada 14.35
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kadujaya_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cap`
--

CREATE TABLE `cap` (
  `id_cap` int(11) NOT NULL,
  `nama_cap` varchar(25) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `stok_awal_terbaru` int(5) NOT NULL,
  `real_stock_terbaru` int(5) NOT NULL,
  `update_stok_awal` datetime NOT NULL,
  `update_real_stock` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cap`
--

INSERT INTO `cap` (`id_cap`, `nama_cap`, `warna`, `stok_awal_terbaru`, `real_stock_terbaru`, `update_stok_awal`, `update_real_stock`) VALUES
(1, 'Umum M4', 'Hitam', 2900, 2900, '2022-02-18 08:44:57', '2022-02-18 08:43:51'),
(2, 'Asianagro', 'Hijau', 5100, 5100, '2022-02-18 09:35:17', '2022-02-18 09:34:14'),
(3, 'ABC 18/20 L', 'Kuning', 5800, 5800, '2021-12-12 21:13:54', '2021-12-12 21:11:35'),
(4, 'Umum M5', 'Hitam', 4000, 4000, '2021-12-12 21:38:49', '2021-12-12 21:38:27'),
(5, 'Umum M4', 'Putih', 800, 800, '2021-12-12 21:19:29', '2021-12-12 21:18:50'),
(6, 'Umum M5', 'Putih', 250, 250, '2021-12-12 22:02:39', '2021-12-12 22:02:11'),
(7, 'Umum M5', 'Merah', 3700, 3700, '2021-12-12 21:23:32', '2021-12-12 21:22:56'),
(8, 'Umum M4', 'Merah', 1500, 1500, '2022-02-18 08:37:12', '2022-02-18 08:36:19'),
(9, 'Umum M4', 'Kuning', 1200, 1200, '2022-02-18 08:32:31', '2022-02-18 08:31:31'),
(10, 'Umum M5', 'Kuning', 4100, 0, '2021-12-05 15:06:06', '0000-00-00 00:00:00'),
(11, 'Indohoest', 'Hijau', 650, 0, '2021-12-05 15:06:27', '0000-00-00 00:00:00'),
(12, 'Indohoest', 'Hitam', 4120, 0, '2021-12-05 15:06:39', '0000-00-00 00:00:00'),
(13, 'Sun', 'Merah', 4140, 0, '2021-12-05 15:07:04', '0000-00-00 00:00:00'),
(14, 'Protek', 'Merah', 631, 0, '2021-12-05 15:07:17', '0000-00-00 00:00:00'),
(15, 'Bimoli', 'Kuning', 540, 0, '2021-12-05 15:07:38', '0000-00-00 00:00:00'),
(16, 'DGW', 'Merah', 4600, 4600, '2022-02-18 08:37:03', '2022-02-18 08:35:55'),
(17, 'Kayaku', 'Hitam', 140, 0, '2021-12-05 15:08:21', '0000-00-00 00:00:00'),
(18, 'Givaudan', 'Merah', 6700, 0, '2021-12-05 15:08:44', '0000-00-00 00:00:00'),
(19, 'Indo Acid', 'Merah', 400, 400, '2022-02-18 08:37:21', '2022-02-18 08:36:29'),
(20, 'Mane', 'Hitam', 730, 730, '2022-02-18 08:36:54', '2022-02-18 08:35:46'),
(21, 'Givaudan', 'Hitam', 780, 0, '2021-12-05 15:09:43', '0000-00-00 00:00:00'),
(22, 'Vermenich', 'Hitam', 900, 0, '2021-12-05 15:09:56', '0000-00-00 00:00:00'),
(23, 'Akasuna', 'Merah', 1000, 0, '2021-12-22 15:05:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cap_keluar`
--

CREATE TABLE `cap_keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_cap` int(11) NOT NULL,
  `stok_awal` int(5) NOT NULL,
  `real_stock` int(5) NOT NULL,
  `cap_keluar` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `tgl_keluar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `catatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cap_keluar`
--

INSERT INTO `cap_keluar` (`id_keluar`, `id_order`, `id_cap`, `stok_awal`, `real_stock`, `cap_keluar`, `total`, `tgl_keluar`, `catatan`) VALUES
(1, 1, 1, 2600, 5000, 500, 2100, '2021-12-11 08:23:15', ''),
(3, 2, 1, 2100, 5000, 100, 2000, '2021-12-11 08:23:20', ''),
(4, 1, 1, 2000, 2000, 500, 1500, '2021-12-12 09:44:58', ''),
(5, 2, 1, 1500, 1400, 100, 1400, '2021-12-12 13:53:41', 'nanti dibungkus kardus. di pickup jam 10 tgl 13 desember'),
(6, 3, 3, 6200, 5800, 400, 5800, '2021-12-12 14:13:54', ''),
(7, 4, 5, 1200, 800, 400, 800, '2021-12-12 14:19:29', 'besok di ambil sama ekspedisi jam 1'),
(8, 6, 7, 4700, 3700, 1000, 3700, '2021-12-12 14:23:31', 'hari ini sore akan dikirim oleh ekspedisi'),
(9, 7, 4, 4600, 4000, 600, 4000, '2021-12-12 14:38:49', ''),
(10, 8, 6, 750, 250, 500, 250, '2021-12-12 15:02:39', ''),
(11, 5, 19, 1000, 200, 800, 200, '2021-12-14 07:09:39', ''),
(12, 9, 9, 1400, 1200, 200, 1200, '2022-02-18 01:32:31', 'pengiriman jam 11 siang'),
(13, 10, 20, 870, 730, 140, 730, '2022-02-18 01:36:54', ''),
(14, 11, 16, 5100, 4600, 500, 4600, '2022-02-18 01:37:03', ''),
(15, 12, 8, 2000, 1500, 500, 1500, '2022-02-18 01:37:11', ''),
(16, 13, 19, 500, 400, 100, 400, '2022-02-18 01:37:21', ''),
(17, 14, 1, 3100, 2900, 200, 2900, '2022-02-18 01:44:57', 'dikirim ekspedisi jam 5 sore hari ini'),
(18, 15, 2, 5200, 5100, 100, 5100, '2022-02-18 02:35:17', 'jam 4 sore diambil ekspedisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cap_masuk`
--

CREATE TABLE `cap_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_cap` int(11) NOT NULL,
  `stok_awal` int(5) NOT NULL,
  `real_stock` int(5) NOT NULL,
  `cap_masuk` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cap_masuk`
--

INSERT INTO `cap_masuk` (`id_masuk`, `id_cap`, `stok_awal`, `real_stock`, `cap_masuk`, `total`, `tgl_masuk`, `catatan`) VALUES
(1, 1, 2400, 5000, 500, 2900, '2020-07-09 13:50:00', 'No order #123098'),
(2, 2, 5000, 5000, 500, 5500, '2021-11-04 13:50:59', ''),
(3, 2, 5500, 5000, 100, 5600, '2021-12-10 15:38:25', 'bagian produksi dah kirim ke gudang'),
(4, 1, 2400, 5000, 100, 2500, '2021-12-10 16:08:46', ''),
(5, 1, 2500, 5000, 100, 2600, '2021-12-10 16:10:11', ''),
(6, 3, 6000, 5800, 200, 6200, '2021-12-10 16:12:42', 'bagian produksi dah kirim ke gudang'),
(7, 4, 4300, 0, 200, 4500, '2021-12-11 04:28:07', ''),
(8, 4, 4500, 0, 100, 4600, '2021-12-11 04:30:24', ''),
(9, 1, 1500, 1400, 500, 2000, '2021-12-12 15:03:38', 'bagian produksi dah taro di gudang'),
(10, 1, 2000, 1400, 1000, 3000, '2022-02-18 01:25:24', 'tangga 18 baru masuk gudang'),
(11, 1, 3000, 1400, 100, 3100, '2022-02-18 01:41:31', 'real stock update please'),
(12, 2, 5000, 5000, 200, 5200, '2022-02-18 02:32:10', 'real stock update please');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_cap` int(11) NOT NULL,
  `jumlah_order` int(5) NOT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `id_cap`, `jumlah_order`, `tgl_order`, `catatan`, `status`) VALUES
(1, 1, 500, '2021-12-11 08:22:56', 'tangga 11 desember baru masuk gudang', 'Selesai'),
(2, 1, 100, '2021-12-11 08:22:56', '', 'Selesai'),
(3, 3, 400, '2021-12-11 08:34:06', '', 'Selesai'),
(4, 5, 400, '2021-12-11 08:52:42', 'gudang naro capnya hari minggu -_-', 'Selesai'),
(5, 19, 800, '2021-12-12 05:32:02', 'sorry baru hitung capnya', 'Selesai'),
(6, 7, 1000, '2021-12-12 14:22:27', '', 'Selesai'),
(7, 4, 600, '2021-12-12 14:37:06', '', 'Selesai'),
(8, 6, 500, '2021-12-12 15:01:51', '', 'Selesai'),
(9, 9, 200, '2021-12-21 09:21:19', '', 'Selesai'),
(10, 20, 140, '2021-12-21 09:22:03', '', 'Selesai'),
(11, 16, 500, '2021-12-21 09:22:16', '', 'Selesai'),
(12, 8, 500, '2022-02-18 01:26:35', '', 'Selesai'),
(13, 19, 100, '2022-02-18 01:26:49', '', 'Selesai'),
(14, 1, 200, '2022-02-18 01:42:56', 'cap masuk tanggal 18 february', 'Selesai'),
(15, 2, 100, '2022-02-18 02:33:24', '', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `kode_petugas` varchar(6) NOT NULL,
  `password` varchar(50) NOT NULL,
  `posisi` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `kode_petugas`, `password`, `posisi`) VALUES
(1, 'admin', '123', 'ADMIN'),
(2, 'gudang', '123', 'GUDANG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cap`
--
ALTER TABLE `cap`
  ADD PRIMARY KEY (`id_cap`);

--
-- Indeks untuk tabel `cap_keluar`
--
ALTER TABLE `cap_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_cap` (`id_cap`),
  ADD KEY `id_order` (`id_order`);

--
-- Indeks untuk tabel `cap_masuk`
--
ALTER TABLE `cap_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_cap` (`id_cap`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_cap` (`id_cap`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cap`
--
ALTER TABLE `cap`
  MODIFY `id_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `cap_keluar`
--
ALTER TABLE `cap_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `cap_masuk`
--
ALTER TABLE `cap_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cap_keluar`
--
ALTER TABLE `cap_keluar`
  ADD CONSTRAINT `cap_keluar_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`),
  ADD CONSTRAINT `cap_keluar_ibfk_2` FOREIGN KEY (`id_cap`) REFERENCES `cap` (`id_cap`);

--
-- Ketidakleluasaan untuk tabel `cap_masuk`
--
ALTER TABLE `cap_masuk`
  ADD CONSTRAINT `cap_masuk_ibfk_1` FOREIGN KEY (`id_cap`) REFERENCES `cap` (`id_cap`);

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_cap`) REFERENCES `cap` (`id_cap`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
