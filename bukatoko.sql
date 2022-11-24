-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 05:10 PM
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
(73, 1, 2, '62bc1cb0c5097.png', 'AMD Ryzen™ 9 5950X Desktop Processors', '12300000', 3, '2022-11-18 23:18:33'),
(74, 1, 1, '62bb3f4a6be9a.png', 'Prosesor Intel® Core™ i3 12TH Gen', '1400000', 5, '2022-11-19 15:22:31'),
(79, 41, 3, '62c07259e84b0.png', 'ROG Strix XG27AQM', '5000000', 5, '2022-11-21 18:40:27'),
(80, 1, 3, '62c07259e84b0.png', 'ROG Strix XG27AQM', '5000000', 1, '2022-11-21 18:48:48');

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
(41, 'person.png', 'ujang', 'Ujang', 'ujang@gmail.com', '$2y$10$h4C8NYSIQECRnt2L7IfBoukukmvKHwuyYrvpS1g.JH6Ggf7ZfTCfG', '2022-11-19 16:26:07');

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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
