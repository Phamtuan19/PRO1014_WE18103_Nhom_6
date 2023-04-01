-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 01:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro1014_nhom_6`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_notes`
--

CREATE TABLE `order_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `note_takers` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_notes`
--

INSERT INTO `order_notes` (`id`, `order_id`, `user_id`, `note_takers`, `content`, `created_at`, `updated_at`) VALUES
(8, 20, 11, 'khách hàng', 'Giao hàng giờ hành chính', '2023-03-25 02:15:25', '2023-03-25 02:15:25'),
(9, 22, 11, 'khách hàng', 'Giao hàng giờ hành chính', '2023-03-25 02:25:52', '2023-03-25 02:25:52'),
(10, 22, 11, 'khách hàng', 'Giao hàng giờ hành chính', '2023-03-25 02:26:17', '2023-03-25 02:26:17'),
(11, 23, 11, 'khách hàng', 'Giao hàng giờ hành chính', '2023-03-25 02:28:47', '2023-03-25 02:28:47'),
(12, 24, 11, 'khách hàng', 'Giao hàng giờ hành chính', '2023-03-25 02:29:18', '2023-03-25 02:29:18'),
(13, 22, 11, 'Administration', 'ádasdasda', '2023-03-25 03:32:35', '2023-03-25 03:32:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_notes`
--
ALTER TABLE `order_notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_notes`
--
ALTER TABLE `order_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
