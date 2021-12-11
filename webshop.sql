-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2021 at 10:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `postal_code` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `address`, `city`, `postal_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'teststrasse', 'Vienna', '1200000', '2021-12-05 15:55:33', '2021-12-09 11:18:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test@mail.com', '2021-12-05 20:07:12', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`products`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `products`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, 1, '[{\"id\":21,\"name\":\"Alana Lane\",\"description\":\"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.\",\"price\":100,\"gender\":\"men\",\"images\":\"[\\\"\\\\\\/uploads\\\\\\/1638736926_201275955-2.jpeg\\\",\\\"\\\\\\/uploads\\\\\\/1638736926_ezgif.com-gif-maker.jpg\\\",\\\"\\\\\\/uploads\\\\\\/1638736926_ezgif.com-gif-maker(1).jpg\\\",\\\"\\\\\\/uploads\\\\\\/1638736926_ezgif.com-gif-maker(2).jpg\\\"]\",\"created_at\":\"2021-12-05 21:42:06\",\"updated_at\":\"0000-00-00 00:00:00\",\"deleted_at\":null,\"count\":2},{\"id\":20,\"name\":\"Quail Clark\",\"description\":\"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.\",\"price\":638,\"gender\":\"men\",\"images\":\"[\\\"\\\\\\/uploads\\\\\\/1638736904_ezgif.com-gif-maker.jpg\\\",\\\"\\\\\\/uploads\\\\\\/1638736904_ezgif.com-gif-maker(1).jpg\\\",\\\"\\\\\\/uploads\\\\\\/1638736904_ezgif.com-gif-maker(2).jpg\\\"]\",\"created_at\":\"2021-12-05 21:41:44\",\"updated_at\":\"0000-00-00 00:00:00\",\"deleted_at\":null,\"count\":1}]', '2021-12-10 11:29:11', '0000-00-00 00:00:00', NULL),
(8, 1, 1, '[{\"id\":23,\"name\":\"Nell Moses\",\"description\":\"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.\",\"price\":140,\"gender\":\"men\",\"images\":\"[\\\"\\\\\\/uploads\\\\\\/1638736977_20512344-2.jpg\\\",\\\"\\\\\\/uploads\\\\\\/1638736977_20512344-3.jpg\\\",\\\"\\\\\\/uploads\\\\\\/1638736977_20512344-4.jpg\\\",\\\"\\\\\\/uploads\\\\\\/1638736977_test1.jpeg\\\"]\",\"created_at\":\"2021-12-05 21:42:57\",\"updated_at\":\"0000-00-00 00:00:00\",\"deleted_at\":null,\"count\":1}]', '2021-12-10 12:11:47', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[]',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `gender`, `images`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'Vaughan Bryant', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 50, 'women', '[\"\\/uploads\\/1638736538_201233724-1-black_1.jpg\",\"\\/uploads\\/1638736557_201233724-2.jpeg\",\"\\/uploads\\/1638736557_201233724-3_1.jpg\",\"\\/uploads\\/1638736557_201233724-4_1.jpg\"]', '2021-12-05 20:35:38', '2021-12-05 20:40:36', NULL),
(14, 'Ima Fox', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 396, 'women', '[\"\\/uploads\\/1638736593_201207154-1-mutli.jpg\",\"\\/uploads\\/1638736593_201207154-2.jpg\",\"\\/uploads\\/1638736593_201207154-3.jpg\",\"\\/uploads\\/1638736593_201207154-4.jpg\"]', '2021-12-05 20:36:33', '2021-12-05 20:40:39', NULL),
(15, 'Ezra Sosa', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 431, 'women', '[\"\\/uploads\\/1638736625_ezgif.com-gif-maker.jpg\",\"\\/uploads\\/1638736625_ezgif.com-gif-maker(1).jpg\",\"\\/uploads\\/1638736625_ezgif.com-gif-maker(2).jpg\",\"\\/uploads\\/1638736625_ezgif.com-gif-maker(3).jpg\"]', '2021-12-05 20:37:05', '2021-12-05 20:40:41', NULL),
(16, 'Morgan Holmes', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 418, 'women', '[\"\\/uploads\\/1638736668_201207154-1-mutli.jpg\",\"\\/uploads\\/1638736668_201207154-2.jpg\",\"\\/uploads\\/1638736668_201207154-3.jpg\",\"\\/uploads\\/1638736668_201207154-4.jpg\"]', '2021-12-05 20:37:48', '2021-12-05 20:40:44', NULL),
(17, 'Kibo Finch', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 106, 'women', '[\"\\/uploads\\/1638736694_201233724-1-black_1.jpg\",\"\\/uploads\\/1638736694_201233724-2.jpeg\",\"\\/uploads\\/1638736694_201233724-3_1.jpg\",\"\\/uploads\\/1638736694_201233724-4_1.jpg\"]', '2021-12-05 20:38:14', '2021-12-05 20:40:47', NULL),
(18, 'Rudyard Santos', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 531, 'women', '[\"\\/uploads\\/1638736713_ezgif.com-gif-maker.jpg\",\"\\/uploads\\/1638736713_ezgif.com-gif-maker(1).jpg\",\"\\/uploads\\/1638736713_ezgif.com-gif-maker(2).jpg\",\"\\/uploads\\/1638736713_ezgif.com-gif-maker(3).jpg\"]', '2021-12-05 20:38:33', '2021-12-05 20:40:50', NULL),
(19, 'Lael Fitzgerald', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 471, 'women', '[\"\\/uploads\\/1638736811_ezgif.com-gif-maker.jpg\",\"\\/uploads\\/1638736811_ezgif.com-gif-maker(1).jpg\",\"\\/uploads\\/1638736811_ezgif.com-gif-maker(2).jpg\",\"\\/uploads\\/1638736811_ezgif.com-gif-maker(3).jpg\"]', '2021-12-05 20:40:11', '0000-00-00 00:00:00', NULL),
(20, 'Quail Clark', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 638, 'men', '[\"\\/uploads\\/1638736904_ezgif.com-gif-maker.jpg\",\"\\/uploads\\/1638736904_ezgif.com-gif-maker(1).jpg\",\"\\/uploads\\/1638736904_ezgif.com-gif-maker(2).jpg\"]', '2021-12-05 20:41:44', '0000-00-00 00:00:00', NULL),
(21, 'Alana Lane', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 100, 'men', '[\"\\/uploads\\/1638736926_201275955-2.jpeg\",\"\\/uploads\\/1638736926_ezgif.com-gif-maker.jpg\",\"\\/uploads\\/1638736926_ezgif.com-gif-maker(1).jpg\",\"\\/uploads\\/1638736926_ezgif.com-gif-maker(2).jpg\"]', '2021-12-05 20:42:06', '0000-00-00 00:00:00', NULL),
(22, 'Dacey Cole', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 184, 'men', '[\"\\/uploads\\/1638736962_20512344-2.jpg\",\"\\/uploads\\/1638736962_20512344-3.jpg\",\"\\/uploads\\/1638736962_20512344-4.jpg\",\"\\/uploads\\/1638736962_test1.jpeg\"]', '2021-12-05 20:42:42', '0000-00-00 00:00:00', NULL),
(23, 'Nell Moses', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 140, 'men', '[\"\\/uploads\\/1638736977_20512344-2.jpg\",\"\\/uploads\\/1638736977_20512344-3.jpg\",\"\\/uploads\\/1638736977_20512344-4.jpg\",\"\\/uploads\\/1638736977_test1.jpeg\"]', '2021-12-05 20:42:57', '0000-00-00 00:00:00', NULL),
(24, 'Hollee Edwards', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 200, 'men', '[\"\\/uploads\\/1638737002_ezgif.com-gif-maker.jpg\",\"\\/uploads\\/1638737002_ezgif.com-gif-maker(1).jpg\",\"\\/uploads\\/1638737002_ezgif.com-gif-maker(2).jpg\"]', '2021-12-05 20:43:22', '0000-00-00 00:00:00', NULL),
(25, 'Dai Macias', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 253, 'men', '[\"\\/uploads\\/1638737071_ezgif.com-gif-maker.jpg\",\"\\/uploads\\/1638737071_ezgif.com-gif-maker(1).jpg\",\"\\/uploads\\/1638737071_ezgif.com-gif-maker(2).jpg\"]', '2021-12-05 20:44:31', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_orders_mm`
--

CREATE TABLE `products_orders_mm` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `is_admin`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'max.mustermann@email.com', 'Max', 'Mustermann', 1, '$2a$12$Iok3WcgII9wqge7tzKDnbeRBQdbunJOooGflz0VixsFf0d/6lmyL2', '2021-11-25 11:32:36', '2021-11-29 19:44:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_orders_mm`
--
ALTER TABLE `products_orders_mm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products_orders_mm`
--
ALTER TABLE `products_orders_mm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `products_orders_mm`
--
ALTER TABLE `products_orders_mm`
  ADD CONSTRAINT `products_orders_mm_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `products_orders_mm_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
