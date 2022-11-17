-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 22 Sep 2021 pada 17.07
-- Versi server: 5.7.30
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(2, 'rudi', 'L', '02313124', 'gang mangga', '2021-05-10 02:17:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kode_penjualan` varchar(25) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`kode_penjualan`, `total_bayar`, `bayar`, `kembalian`) VALUES
('KDP0509210001', 33000, 50000, 17000),
('KDP0509210002', 0, 50000, 0),
('KDP1109210001', 33000, 50000, 17000),
('KDP1109210002', 30000, 30000, 0),
('KDP1109210003', 3000, 10000, 7000),
('KDP1109210004', 3000, 10000, 7000),
('KDP1109210005', 3000, 5000, 2000),
('KDP1409210001', 30000, 40000, 10000),
('KDP1409210002', 30000, 40000, 10000),
('KDP1809210001', 30000, 40000, 10000),
('KDP1809210002', 30000, 40000, 10000),
('KDP1809210003', 30000, 40000, 10000),
('KDP1809210004', 30000, 40000, 10000),
('KDP1809210005', 30000, 40000, 10000),
('KDP1809210006', 3000, 10000, 7000),
('KDP1809210007', 30000, 40000, 10000),
('KDP1809210008', 30000, 40000, 10000),
('KDP1809210009', 30000, 40000, 10000),
('KDP1809210010', 90000, 100000, 10000),
('KDP1809210011', 39000, 50000, 11000),
('KDP1809210012', 33000, 50000, 17000),
('KDP1809210013', 30000, 40000, 10000),
('KDP1809210014', 60000, 100000, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`) VALUES
(1, 'Makanan', '2021-05-12 23:19:35', '2021-05-15 14:30:01'),
(3, 'Minuman', '2021-05-12 23:36:23', NULL),
(4, 'ATK', '2021-05-15 19:30:08', NULL),
(5, 'Obat', '2021-05-24 16:27:39', NULL),
(6, 'Sembako', '2021-05-24 16:28:49', NULL),
(7, 'Lain-lain', '2021-05-24 16:29:03', NULL),
(8, 'Rokok', '2021-05-24 16:29:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`) VALUES
(5, 'A005', 'Es Cream Waku Coklat ', 1, 3, 5000, 15, 'item-210516-1.jpg', '2021-05-16 00:13:32', '2021-05-16 08:29:28'),
(6, 'A003', 'Mie Goreng', 1, 3, 3000, 46, NULL, '2021-05-16 00:14:12', NULL),
(8, 'A004', 'susu', 3, 3, 1500, 0, NULL, '2021-05-16 01:12:20', NULL),
(11, 'A007', 'biskuit', 1, 3, 1000, 15, 'item-210524-.PNG', '2021-05-24 14:16:03', NULL),
(12, 'A008', 'Indomie mie goreng', 1, 3, 3000, 10, NULL, '2021-05-24 14:19:30', NULL),
(13, 'A009', 'Indomie Mie Soto', 1, 3, 3000, 10, NULL, '2021-05-24 14:20:38', NULL),
(14, 'A006', 'Kecap bango 210ML', 1, 3, 13000, 17, NULL, '2021-05-24 14:22:02', NULL),
(15, 'A010', 'Indomie Mie Ayam Bawang', 1, 3, 3000, 10, NULL, '2021-05-24 14:23:37', NULL),
(16, 'A011', 'Indomie Mie Kari Ayam', 1, 3, 3000, 20, NULL, '2021-05-24 14:26:19', NULL),
(17, 'A001', 'Aqua  220ML', 3, 4, 30000, 44, NULL, '2021-05-27 16:25:28', NULL),
(18, 'A012', 'Minyak Sedap 2L', 7, 3, 30000, 0, NULL, '2021-06-08 13:25:17', '2021-08-30 19:11:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(1, 'Kilogram', '2021-05-12 23:19:35', '2021-05-13 18:48:22'),
(3, 'Pcs', '2021-05-12 23:36:23', '2021-05-13 22:07:41'),
(4, 'Lusin', '2021-05-13 23:48:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name_perusahaan` varchar(100) NOT NULL,
  `phone_perusahaan` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `name_sales` varchar(100) NOT NULL,
  `phone_sales` varchar(15) NOT NULL,
  `description` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name_perusahaan`, `phone_perusahaan`, `address`, `name_sales`, `phone_sales`, `description`, `created`, `updated`) VALUES
(2, 'Unilever Makanan', '021317321', 'jalan a', 'sales a', '0827312131', NULL, '2021-05-01 23:20:00', '2021-05-28 10:38:36'),
(3, 'Unilever Minuman', '02312512', 'alamat b', 'sales b', '0978979872', 'kunjungan hari selasa 1 hari dalam seminggu', '2021-05-01 23:51:44', '2021-05-28 10:38:52'),
(4, 'Wings', '9812381', 'pemancingan           ', 'ganti sales m', '091283123', 'sales makanan ganti', '2021-05-07 22:13:27', '2021-05-28 10:39:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penjualan`
--

CREATE TABLE `t_penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_penjualan` varchar(25) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_penjualan`
--

INSERT INTO `t_penjualan` (`penjualan_id`, `user_id`, `kode_penjualan`, `kode_barang`, `jumlah`, `total`, `tanggal`) VALUES
(1, 1, 'KDP0509210001', 'A001', 1, 30000, '2021-09-05'),
(2, 1, 'KDP0509210001', 'A003', 1, 3000, '2021-09-05'),
(3, 1, 'KDP0509210002', 'A001', 1, 30000, '2021-09-05'),
(4, 1, 'KDP0509210003', 'A001', 1, 30000, '2021-09-05'),
(5, 1, 'KDP1109210001', 'A001', 1, 30000, '2021-09-11'),
(6, 1, 'KDP1109210001', 'A003', 1, 3000, '2021-09-11'),
(7, 1, 'KDP1109210002', 'A001', 1, 30000, '2021-09-11'),
(8, 1, 'KDP1109210003', 'A003', 1, 3000, '2021-09-11'),
(9, 1, 'KDP1109210004', 'A003', 1, 3000, '2021-09-11'),
(10, 1, 'KDP1109210005', 'A003', 1, 3000, '2021-09-11'),
(11, 1, 'KDP1409210001', 'A001', 1, 30000, '2021-09-14'),
(12, 1, 'KDP1409210002', 'A001', 1, 30000, '2021-09-14'),
(13, 1, 'KDP1809210001', 'A001', 1, 30000, '2021-09-18'),
(14, 1, 'KDP1809210002', 'A001', 1, 30000, '2021-09-18'),
(15, 1, 'KDP1809210003', 'A001', 1, 30000, '2021-09-18'),
(16, 1, 'KDP1809210004', 'A001', 1, 30000, '2021-09-18'),
(17, 1, 'KDP1809210005', 'A001', 1, 30000, '2021-09-18'),
(18, 1, 'KDP1809210006', 'A003', 1, 3000, '2021-09-18'),
(20, 1, 'KDP1809210007', 'A001', 1, 30000, '2021-09-18'),
(21, 1, 'KDP1809210008', 'A001', 1, 30000, '2021-09-18'),
(22, 1, 'KDP1809210009', 'A001', 1, 30000, '2021-09-18'),
(23, 1, 'KDP1809210010', 'A001', 3, 90000, '2021-09-18'),
(24, 1, 'KDP1809210011', 'A001', 1, 30000, '2021-09-18'),
(25, 1, 'KDP1809210011', 'A003', 3, 9000, '2021-09-18'),
(26, 1, 'KDP1809210012', 'A001', 1, 30000, '2021-09-18'),
(27, 1, 'KDP1809210012', 'A003', 1, 3000, '2021-09-18'),
(28, 1, 'KDP1809210013', 'A001', 1, 30000, '2021-09-18'),
(29, 1, 'KDP1809210014', 'A001', 2, 60000, '2021-09-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out','return') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `harga_beli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`, `harga_beli`) VALUES
(6, 17, 'in', 'kulakan', 2, 10, '2021-05-27', '2021-05-27 16:36:27', 1, NULL),
(9, 12, 'in', 'kulakan', 3, 10, '2021-05-27', '2021-05-27 16:37:31', 1, NULL),
(10, 13, 'in', 'tambahkan', 3, 10, '2021-05-27', '2021-05-27 16:37:45', 1, NULL),
(11, 15, 'in', 'tambahkan', 3, 10, '2021-05-27', '2021-05-27 16:37:58', 1, NULL),
(14, 5, 'in', 'kulakan', 4, 15, '2021-05-28', '2021-05-28 14:27:46', 1, NULL),
(15, 14, 'in', '', 3, 20, '2021-05-28', '2021-05-28 14:28:01', 1, NULL),
(16, 11, 'in', 'kulakan', 2, 15, '2021-05-28', '2021-05-28 14:28:20', 1, NULL),
(17, 16, 'in', 'kulakan', 3, 20, '2021-05-28', '2021-05-28 14:28:42', 1, NULL),
(23, 14, 'out', 'rusak', NULL, 3, '2021-05-28', '2021-05-28 15:59:51', 1, NULL),
(24, 6, 'in', 'tambah', 2, 15, '2021-06-08', '2021-06-08 13:18:06', 1, NULL),
(25, 17, 'in', 'tambah', 3, 31, '2021-08-30', '2021-08-31 02:12:01', 1, NULL),
(26, 6, 'in', 'tambah', 4, 33, '2021-08-30', '2021-08-31 02:12:30', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1 admin, 2 kasir, 3 inventori, 4 report'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Chairul Anwar', 'Sawangan Depok', 1),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'malik makul', 'jalan baru', 2),
(4, 'opay123', '698748ec31e008f167288bb9855b977dbfe2018d', 'opay', 'jalan sawah', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- Indeks untuk tabel `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_id` (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD PRIMARY KEY (`penjualan_id`);

--
-- Indeks untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
