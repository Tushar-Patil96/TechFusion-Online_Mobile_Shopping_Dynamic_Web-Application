-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2026 at 08:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fusionshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `confirmpassword` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `confirmpassword`, `email`, `contact`, `address`, `role`) VALUES
(1, 'zoro', '123', '123', 'zoro@gmail.com', '9960414115', 'pirate hunter zoro from one piece', 'admin'),
(2, 'luffy', '321', '321', 'luffy@gmail.com', '9058798920', 'monkey d luffy from one piece', 'admin'),
(33, 'vaibhav', 'ghostytv', '', 'vp4214149@gmail.com', '7058176955', 'GOPALCHAWADI,CIDCO NANDED', 'user'),
(35, 'faisal', 'clutcher', '', 'faisal420@gmail.com', '9890580529', 'GOPALCHAWADI,CIDCO NANDED', 'user'),
(36, 'rohit ', 'bts', '', 'rohitwadikar@gmail.com', '1234567890', 'shree nagar nanded', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(200) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_name`, `product_image`, `quantity`, `price`, `order_date`) VALUES
(4, 1, 'Iphone 13 Pro Max', 'All Phones/iphone-13.jpg', 1, '₹1,00,999', '2025-09-18 11:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(200) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `intro` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(30) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(200) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand`, `intro`, `name`, `price`, `ram`, `color`, `image`, `quantity`) VALUES
(1, 'Apple', 'Premium quality and design.', 'Iphone 16 Pro Max', '₹1,46,999', '', '', 'All Phones\\iphobe-16.jpg', 1),
(2, 'Apple', 'Sleek and stylish phones.', 'Iphone 15 Pro Max', '₹1,19,999', '', '', 'All Phones/iphone-15.jpg', 1),
(3, 'Apple', 'High-performance phones.', 'Iphone 14 Pro Max', '₹1,09,999', '', '', 'All Phones/iphone-14.jpg', 1),
(4, 'Apple', 'Innovative features and design.', 'Iphone 13 Pro Max', '₹1,00,999', '', '', 'All Phones/iphone-13.jpg', 1),
(5, 'Samsung', 'High performance and style.', 'Samsung Galaxy A55 5G', '₹34,900', '', '', 'All Phones/Samsung Galaxy A55 5G.jpg', 1),
(6, 'Samsung', 'Classic and durable phones.', 'Samsung Galaxy S23 Ultra', '₹1,46,999', '', '', 'All Phones/Samsung Galaxy S23 Ultra.jpg', 1),
(7, 'Samsung', 'Affordable and reliable devices.', 'Samsung Galaxy A35 5G Mobile', '₹24,999', '', '', 'All Phones/Samsung Galaxy A35 5G.jpg', 1),
(8, 'Samsung', 'High performance and style.', 'Samsung Galaxy M35 5G Mobile', '₹32,499', '', '', 'All Phones/Samsung-Galaxy-M35-5G.jpg', 1),
(9, 'Samsung', 'Innovative features and design.', 'Samsung Galaxy S24 Ultra', '₹1,69,499', '', '', 'images/Samsung-galaxy-s24.png', 1),
(10, 'Vivo', 'Stylish design and powerful performance.', 'Vivo Y300 5G', '₹23,900', '', '', 'All Phones/Vivo Y300 5G.jpg', 1),
(11, 'Vivo', 'Innovative features and design.', 'Vivo T3 Lite 5G', '₹17,999', '', '', 'All Phones/Vivo T3 Lite 5G.jpg', 1),
(12, 'Vivo', 'High performance and style.', 'Vivo V30 5G', '₹33,900', '', '', 'All Phones/Vivo V30 5G.jpg', 1),
(13, 'Vivo', 'Sleek and stylish phones.', 'Vivo X200 5G', '₹65,999', '', '', 'All Phones/Vivo X200 5G.jpg', 1),
(14, 'Oppo', 'Affordable and reliable devices.', 'Oppo A3X 5G', '₹12,499', '', '', 'All Phones/OPPO A3X 5G.jpg', 1),
(15, 'Oppo', 'Premium quality and design.', 'Oppo F27 Pro+ 5G', '₹25,999', '', '', 'All Phones/OPPO F27 Pro+ 5G.jpg', 1),
(16, 'Oppo', 'Premium quality and design.', 'Oppo Reno10 Pro 5G', '₹37,999', '', '', 'All Phones/Oppo Reno10 Pro 5G.jpg', 1),
(17, 'Oppo', 'Affordable and reliable devices.', 'Oppo F25 Pro 5G', '₹19,999', '', '', 'All Phones/Oppo F25 Pro 5G.jpg', 1),
(18, 'Oppo', 'Premium quality and design.', 'Oppo F23 5G', '₹26,499', '', '', 'All Phones/Oppo F23 5G.jpg', 1),
(19, 'IQOO', 'Premium quality and design.', 'IQOO 13 5G', '₹59,999', '', '', 'All Phones/IQOO 13 5G.jpg', 1),
(20, 'IQOO', 'High performance and style', 'IQOO Neo9 Pro 5G', '₹35,999', '', '', 'All Phones/IQOO Neo9 Pro 5G.jpg', 1),
(21, 'IQOO', 'Innovative features and design.', 'IQOO Z7 Pro 5G', '₹21,999', '', '', 'All Phones/IQOO Z7 Pro 5G.jpg', 1),
(22, 'IQOO', 'High performance and style.', 'IQOO Z9x 5G', '₹11,699', '', '', 'All Phones/IQOO Z9x 5G.jpg', 1),
(23, 'Redmi', 'Premium quality and design.	', 'Redmi A4 5G', '₹10,999', '', '', 'All Phones/Redmi A4 5G.jpg', 1),
(24, 'Redmi', 'Innovative features and design.', 'Redmi Note 12 5G', '₹35,999', '', '', 'All Phones/Redmi Note 12 5G.jpg', 1),
(25, 'Redmi', 'Sleek and stylish phones.', 'Redmi Note 13 Pro', '₹24,999', '', '', 'All Phones/Redmi Note 13 Pro.jpg', 1),
(26, 'Redmi', 'Affordable and reliable devices.', 'Redmi Note 14 5G', '₹32,499', '', '', 'All Phones/Redmi Note 14 5G.jpg', 1),
(27, 'Realme', 'Stylish design and powerful performance.', 'Realme 12+ 5G', '₹23,999', '', '', 'All Phones/Realme 12+ 5G.jpg', 1),
(28, 'Realme', 'Premium quality and design.', 'Realme GT 6T 5G', '₹27,699', '', '', 'All Phones/Realme GT 6T 5G.jpg', 1),
(29, 'Realme', 'Affordable and reliable devices.', 'Realme 13 Pro 5G', '₹26,499', '', '', 'All Phones/Realme 13 Pro 5G.jpg', 1),
(30, 'Realme', 'High-performance phones.', 'Realme NARZO N61', '₹35,999', '', '', 'All Phones/Realme NARZO N61.jpg', 1),
(31, 'Moto', 'Innovative features and design.', 'Moto G85 5G', '₹16,999', '', '', 'All Phones/Moto G85 5G.jpg', 1),
(32, 'Moto', 'Stylish design and powerful performance.', 'Motorola G73 5G', '₹12,999', '', '', 'All Phones/Motorola G73 5G.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`password`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
