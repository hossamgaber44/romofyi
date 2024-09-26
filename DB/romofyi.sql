-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 06:03 PM
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
-- Database: `romofyi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$vpSRcsrqEzjp1UBVki1iwuMIne/e3q4FWr0/wweXJmmjr4.M.UHMW', '2024-07-02 07:00:00', '2024-07-10 07:00:00'),
(2, 'ahmed', 'hossamgaber001001@gmail.com', 'ahmed', '2024-07-03 07:00:00', '2024-07-03 07:00:00'),
(3, 'Ali', 'hossamgaber00100ugzzzzzzzzzz1@gmail.com', 'ddddddddd', '2024-07-03 07:00:00', '2024-07-18 07:00:00'),
(4, 'hossam', 'h@gmail.com', '1212', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `Status` enum('Active','Disabled') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `CategoryName`, `img`, `Status`, `created_at`, `updated_at`) VALUES
(24, 'helbet', '117_helbet.png', 'Active', NULL, NULL),
(25, 'jakit', '72_jakit.png', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `oreder_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `first_address` varchar(255) NOT NULL,
  `second_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `oreder_id`, `name`, `phone`, `email`, `city`, `first_address`, `second_address`) VALUES
(1, 0, 'hossam gaber hamed', 123123456, 'hossam@email.com', 'Cairo', '222ddsksksksks', 'djshshhqhahq'),
(3, 13, 'hossam gaber hamed', 112512799, 'hossam@email.com', 'Cairo', '222ddsksksksks', 'djshshhqhahq'),
(4, 14, 'hossam gaber hamed', 10100010, 'hossam@email.com', 'Cairo', '222ddsksksksks', 'djshshhqhahq'),
(5, 15, 'hossam gaber hamed', 10100010, 'hossam@email.com', 'Cairo', '222ddsksksksks', 'djshshhqhahq'),
(6, 16, 'hossam gaber hamed', 10100010, 'hossam@email.com', 'Cairo', '222ddsksksksks', 'djshshhqhahq'),
(7, 17, 'hossam gaber hamed', 0, 'hossam@email.com', 'Cairo', '222ddsksksksks', 'djshshhqhahq'),
(8, 18, 'hossam gaber hamed', 11111, 'hossam@email.com', 'Cairo', '222ddsksksksks', 'djshshhqhahq'),
(9, 19, 'hossam gaber hamed', 777777, 'hossam@email.com', 'Cairo', '222ddsksksksks', 'djshshhqhahq');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `message`, `created_at`, `updated_at`) VALUES
(1, 5, 'hossam gaber', 'hossam@email.com', 123456, '222', 'lorem 12jj3jj3j2jj1k', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `user_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'hossamgaber001001@gmail.com', NULL, NULL),
(2, 6, 'hossam@email.com', NULL, NULL),
(3, 5, 'hossamgaber001001@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_status` enum('pending','processing','shipped') NOT NULL DEFAULT 'pending',
  `finshed` enum('yes','no') NOT NULL DEFAULT 'no',
  `address` text DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `payment_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_status`, `finshed`, `address`, `total_price`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 4, 'pending', 'no', 'gggggggggggg', NULL, '0', NULL, NULL),
(3, 4, 'pending', 'no', 'gggggggggggg', NULL, '0', NULL, NULL),
(10, 5, 'processing', 'yes', NULL, 0, '0', NULL, NULL),
(12, 10, 'pending', 'no', NULL, NULL, '0', NULL, NULL),
(13, 5, 'shipped', 'yes', NULL, 0, '0', NULL, NULL),
(14, 5, 'processing', 'yes', NULL, 100, '0', NULL, NULL),
(15, 5, 'processing', 'yes', NULL, 100, '0', NULL, NULL),
(16, 5, 'pending', 'yes', NULL, 90, '0', NULL, NULL),
(17, 5, 'processing', 'yes', NULL, 490, '0', NULL, NULL),
(18, 5, 'shipped', 'yes', NULL, 120, '0', NULL, NULL),
(19, 5, 'processing', 'yes', '222ddsk fff \n fffddddddd ddddd ddddd dddddd ddddd f \n  f \n ffff fff ff sksksks', 120, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(37, 12, 43, 2, 120.00, NULL, NULL),
(45, 10, 41, 2, 90.00, NULL, NULL),
(46, 10, 42, 2, 90.00, NULL, NULL),
(47, 10, 40, 1, 110.00, NULL, NULL),
(48, 13, 40, 1, 110.00, NULL, NULL),
(49, 14, 40, 1, 110.00, NULL, NULL),
(50, 15, 40, 1, 110.00, NULL, NULL),
(52, 17, 41, 2, 90.00, NULL, NULL),
(53, 17, 42, 1, 90.00, NULL, NULL),
(54, 17, 40, 2, 110.00, NULL, NULL),
(55, 18, 40, 1, 110.00, NULL, NULL),
(56, 19, 40, 1, 110.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `small_desc` varchar(255) NOT NULL,
  `productDescription` text NOT NULL,
  `information` text DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `Status` enum('Active','Disabled') DEFAULT 'Active',
  `price` int(11) NOT NULL,
  `descount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `small_desc`, `productDescription`, `information`, `product_name`, `img`, `Status`, `price`, `descount`, `created_at`, `updated_at`) VALUES
(37, 24, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', NULL, 'Product 1', '311_shoes1.png', 'Disabled', 80, NULL, NULL, NULL),
(38, 24, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', NULL, 'Product 2', '65_shoes2.png', 'Disabled', 90, NULL, NULL, NULL),
(40, 24, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', NULL, 'Product 4', '78_shoes4.png', 'Disabled', 110, NULL, NULL, NULL),
(41, 24, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', NULL, 'Product 5', '192_shoes5.png', 'Disabled', 90, NULL, NULL, NULL),
(42, 24, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', NULL, 'Product 6', '298_tisat1.png', 'Active', 90, NULL, NULL, NULL),
(43, 25, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea veritatis, delectus plam magni molestias?', NULL, 'Product 7', '172_tisat2.png', 'Active', 120, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `Open_hour` time NOT NULL,
  `close_hour` time NOT NULL,
  `call_us` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL,
  `instagram` text NOT NULL,
  `whatsApp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `Open_hour`, `close_hour`, `call_us`, `email`, `facebook`, `twitter`, `linkedin`, `instagram`, `whatsApp`) VALUES
(1, '08:00:08', '18:00:12', 1234567788, 'hossam@gmail.com', 'https://fontawesome.com/search?q=email&o=r&m=free', '#', '#', '#', '#FFF'),
(2, '00:00:08', '00:00:12', 1269220162, 'demo@gmail.com', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `img`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hossam gg', 'mohamedf@gmail.com', NULL, '$2y$10$6CtWHDibXT338uWTJOkwEuNl/o.fQVqlXxXCHy5MJ4QAxxNMMZQUy', NULL, NULL, '2024-06-08 20:03:15', '2024-06-08 20:03:15'),
(4, 'HOSSAM', 'hossam@email.com', NULL, '1212', NULL, NULL, NULL, NULL),
(5, 'HOSSAM GABER', 'h@gmail.com', NULL, '1212', NULL, NULL, NULL, NULL),
(6, 'hghgg', 'hh@gmail.com', NULL, '1212', NULL, NULL, NULL, NULL),
(8, 'hghgg', 'hhh@gmail.com', NULL, '1212', NULL, NULL, NULL, NULL),
(10, 'hossam', 'hossDSam@email.com', NULL, '1212', NULL, NULL, NULL, NULL),
(13, 'hossam gaber hamed 2222', 'hd@gmail.com', NULL, '121', NULL, NULL, NULL, NULL),
(18, 'hossam', 'hossamgasd1001@gmail.com', NULL, '123', NULL, NULL, NULL, NULL),
(19, '', '', NULL, '', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
