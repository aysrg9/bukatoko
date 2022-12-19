-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2022 pada 14.58
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
-- Database: `bukatoko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buy`
--

CREATE TABLE `buy` (
  `id_buy` int(11) NOT NULL,
  `id_order` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `total_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `status_order` varchar(256) NOT NULL DEFAULT 'On Process',
  `created` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buy`
--

INSERT INTO `buy` (`id_buy`, `id_order`, `id_user`, `picture`, `product_name`, `price`, `total_price`, `quantity`, `address`, `status_order`, `created`) VALUES
(112, '6396BDE35F9D3/ujang', 41, '62c07259e84b0.png', 'ROG Strix XG27AQM', '5000000', 5016000, 1, 'Jl. Medan Merdeka Utara No.9, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110\r\n', 'Done', '12 Dec 2022'),
(113, '6396BE0AA7718/aysrg9', 1, '62c07259e84b0.png', 'ROG Strix XG27AQM', '5000000', 5016000, 1, 'Jl Nurul Huda No98 RT001/04, Kel. Cempaka Putih, Kec. Ciputat Timur, Tangerang Selatan, Banten, Indonesia, 15412', 'Done', '12 Dec 2022'),
(114, '639810F121922/aysrg9', 1, '62bb3f4a6be9a.png', 'Prosesor Intel® Core™ i3 12TH Gen', '1400000', 7016000, 5, 'Jl. Medan Merdeka Utara No.9, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110', 'Done', '13 Dec 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_product`, `picture`, `product_name`, `price`, `quantity`, `created`) VALUES
(126, 1, 3, '62c07259e84b0.png', 'ROG Strix XG27AQM', '5000000', 1, '2022-12-13 12:36:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_user` int(11) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `username` varchar(8) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_user`, `picture`, `username`, `fullname`, `email`, `password`, `created`) VALUES
(1, 'person.png', 'aysrg9', 'Egiditya', 'egyditya@gmail.com', '$2y$10$Vvm8xeO3LYv2QEhYFN5eIOvbrxnAdqR0jnoC0WnUGelTMYxyiJ9o2', '2022-11-16 16:53:33'),
(41, 'person.png', 'ujang', 'Ujang Rahmat', 'ujang@gmail.com', '$2y$10$h4C8NYSIQECRnt2L7IfBoukukmvKHwuyYrvpS1g.JH6Ggf7ZfTCfG', '2022-11-19 16:26:07'),
(43, 'person.png', '_123', 'P', 'name@gmail.com', '$2y$10$ve/sLdzl6M0UKRffPbBVd.kqYfrVeg6HqmlKY84jlI4xE.NVaadVO', '2022-11-28 18:56:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` varchar(256) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `price`, `stock`, `description`, `picture`, `created`) VALUES
(1, 'Prosesor Intel® Core™ i3 12TH Gen', '1400000', 0, 'https://ark.intel.com/content/www/id/id/ark/products/132223/intel-core-i312100f-processor-12m-cache-up-to-4-30-ghz.html', '62bb3f4a6be9a.png', '2022-11-16 17:25:20'),
(2, 'AMD Ryzen™ 9 5950X Desktop Processors', '12300000', 10, 'https://www.amd.com/en/products/cpu/amd-ryzen-9-5950x ', '62bc1cb0c5097.png', '2022-11-16 17:25:20'),
(3, 'ROG Strix XG27AQM', '5000000', 18, 'https://rog.asus.com/id/monitors/27-to-31-5-inches/rog-strix-xg27aqm-model/', '62c07259e84b0.png', '2022-11-16 17:25:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `code_voucher` varchar(256) NOT NULL,
  `piece` varchar(256) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `code_voucher`, `piece`, `created`, `quantity`) VALUES
(1, 'DISKON', '7000', '2022-11-30 18:26:12', 50),
(2, 'BUKATOKO', '15000', '2022-11-30 18:26:12', 3),
(3, 'ONLINE', '10000', '2022-11-30 18:26:12', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `id_product`, `picture`, `product_name`, `price`, `created`) VALUES
(16, 43, 3, '62c07259e84b0.png', 'ROG Strix XG27AQM', '5000000', '2022-11-28 19:00:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id_buy`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buy`
--
ALTER TABLE `buy`
  MODIFY `id_buy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
