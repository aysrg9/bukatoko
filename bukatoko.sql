-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 04:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id_buy` int(11) NOT NULL,
  `id_order` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `total_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL DEFAULT 'On Process',
  `created` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id_buy`, `id_order`, `id_user`, `product_name`, `price`, `total_price`, `quantity`, `address`, `status`, `created`) VALUES
(21, '6388BF5EEF012/aysrg9', 1, 'ROG Strix XG27AQM', '5000000', 25016000, 5, 'Jl. Medan Merdeka Utara No.9, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110', 'On Process', '01 Dec 2022');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
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
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_product`, `picture`, `product_name`, `price`, `quantity`, `created`) VALUES
(97, 1, 3, '62c07259e84b0.png', 'ROG Strix XG27AQM', '5000000', 1, '2022-11-27 15:58:58'),
(108, 1, 2, '62bc1cb0c5097.png', 'AMD Ryzen™ 9 5950X Desktop Processors', '12300000', 1, '2022-11-27 22:53:48'),
(110, 41, 1, '62bb3f4a6be9a.png', 'Prosesor Intel® Core™ i3 12TH Gen', '1400000', 1, '2022-11-28 13:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
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
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_user`, `picture`, `username`, `fullname`, `email`, `password`, `created`) VALUES
(1, 'person.png', 'aysrg9', 'Egiditya', 'egyditya@gmail.com', '$2y$10$Vvm8xeO3LYv2QEhYFN5eIOvbrxnAdqR0jnoC0WnUGelTMYxyiJ9o2', '2022-11-16 16:53:33'),
(41, 'person.png', 'ujang', 'Ujang Rahmat', 'ujang@gmail.com', '$2y$10$h4C8NYSIQECRnt2L7IfBoukukmvKHwuyYrvpS1g.JH6Ggf7ZfTCfG', '2022-11-19 16:26:07'),
(43, 'person.png', '_123', 'P', 'name@gmail.com', '$2y$10$ve/sLdzl6M0UKRffPbBVd.kqYfrVeg6HqmlKY84jlI4xE.NVaadVO', '2022-11-28 18:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `product`
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
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `price`, `stock`, `description`, `picture`, `created`) VALUES
(1, 'Prosesor Intel® Core™ i3 12TH Gen', '1400000', 5, 'https://ark.intel.com/content/www/id/id/ark/products/132223/intel-core-i312100f-processor-12m-cache-up-to-4-30-ghz.html', '62bb3f4a6be9a.png', '2022-11-16 17:25:20'),
(2, 'AMD Ryzen™ 9 5950X Desktop Processors', '12300000', 5, 'https://www.amd.com/en/products/cpu/amd-ryzen-9-5950x ', '62bc1cb0c5097.png', '2022-11-16 17:25:20'),
(3, 'ROG Strix XG27AQM', '5000000', 15, 'https://rog.asus.com/id/monitors/27-to-31-5-inches/rog-strix-xg27aqm-model/', '62c07259e84b0.png', '2022-11-16 17:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `code_voucher` varchar(256) NOT NULL,
  `piece` varchar(256) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `code_voucher`, `piece`, `created`, `end`) VALUES
(1, 'DISKON', '7000', '2022-11-30 18:26:12', '2022-12-01 00:00:00'),
(2, '%BUKATOKO%', '15000', '2022-11-30 18:26:12', '2022-12-01 00:00:00'),
(3, 'ONLINE', '10000', '2022-11-30 18:26:12', '2022-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
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
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `id_product`, `picture`, `product_name`, `price`, `created`) VALUES
(13, 41, 1, '62bb3f4a6be9a.png', 'Prosesor Intel® Core™ i3 12TH Gen', '1400000', '2022-11-26 00:08:48'),
(16, 43, 3, '62c07259e84b0.png', 'ROG Strix XG27AQM', '5000000', '2022-11-28 19:00:08'),
(20, 1, 1, '62bb3f4a6be9a.png', 'Prosesor Intel® Core™ i3 12TH Gen', '1400000', '2022-11-29 20:01:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id_buy`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id_buy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
