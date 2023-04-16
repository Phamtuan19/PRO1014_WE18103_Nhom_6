-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 11:10 AM
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
-- Table structure for table `anonymous`
--

CREATE TABLE `anonymous` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `province_city` varchar(255) NOT NULL,
  `county_district` varchar(255) NOT NULL,
  `house_number_street_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `storecatalog_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `slug`, `storecatalog_id`, `created_at`, `updated_at`) VALUES
(1, 'kansuke-naka', 'kansuke-naka', 2, '2023-03-22 18:35:26', '2023-03-22 18:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `storecatalog_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `storecatalog_id`, `created_at`, `updated_at`) VALUES
(2, 'Sách Chính trị – pháp luật', 'sach-chinh-tri-–-phap-luat', NULL, NULL, '2023-03-22 18:35:08', '2023-03-22 18:35:26'),
(3, 'Khoa học công nghệ – Kinh tế', 'khoa-hoc-cong-nghe-–-kinh-te', NULL, NULL, '2023-03-22 18:35:08', '2023-03-22 18:35:26'),
(4, 'Văn học nghệ thuật', 'van-hoc-nghe-thuat', NULL, 1, '2023-03-20 02:49:18', '2023-03-20 02:49:18'),
(5, 'Văn hóa xã hội – Lịch sử', 'van-hoa-xa-hoi-lich-su', NULL, NULL, '2023-03-22 18:35:08', '2023-03-22 18:35:26'),
(6, 'Giáo trình', 'giao-trinh', NULL, 1, '2023-03-20 02:49:18', '2023-03-20 02:49:18'),
(7, 'Truyện, tiểu thuyết', 'truyen-tieu-thuyet', NULL, NULL, '2023-03-20 02:48:53', '2023-03-20 02:49:00'),
(8, 'Tâm lý, tâm linh, tôn giáo', 'tam-ly-tam-linh-ton-giao', NULL, NULL, '2023-03-22 18:35:08', '2023-03-22 18:35:26'),
(9, 'Sách thiếu nhi', 'sach-thieu-nhi', NULL, NULL, '2023-03-22 18:35:08', '2023-03-22 18:35:26'),
(11, 'submenu-1', 'submenu-1', 2, NULL, '2023-03-19 21:23:06', '2023-03-19 21:23:06'),
(12, 'submenu-2', 'submenu-2', 2, NULL, '2023-03-19 21:23:14', '2023-03-19 21:23:14'),
(13, 'submenu-3', 'submenu-3', 3, NULL, '2023-03-19 21:23:21', '2023-03-19 21:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `province_city` varchar(255) NOT NULL,
  `county_district` varchar(255) NOT NULL,
  `house_number_street_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `user_id`, `order_id`, `name`, `email`, `phone`, `province_city`, `county_district`, `house_number_street_name`, `created_at`, `updated_at`) VALUES
(2, 6, 17, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-25 02:15:25', '2023-03-25 02:15:25'),
(3, 6, 18, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-25 02:25:52', '2023-03-25 02:25:52'),
(4, 6, 19, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-25 02:26:17', '2023-03-25 02:26:17'),
(5, 6, 20, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-25 02:26:39', '2023-03-25 02:26:39'),
(6, 6, 21, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-25 02:26:47', '2023-03-25 02:26:47'),
(7, 6, 22, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-25 02:27:49', '2023-03-25 02:27:49'),
(8, 6, 23, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-25 02:28:47', '2023-03-25 02:28:47'),
(9, 6, 24, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-25 02:29:18', '2023-03-25 02:29:18'),
(10, 6, 25, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-27 06:49:00', '2023-03-27 06:49:00'),
(11, 6, 26, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-27 06:54:03', '2023-03-27 06:54:03'),
(12, 6, 27, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'hải dương', 'nam sách', 'an lâm', '2023-03-27 06:54:33', '2023-03-27 06:54:33'),
(13, 12, 28, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 06:58:03', '2023-03-27 06:58:03'),
(14, 12, 29, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 06:58:57', '2023-03-27 06:58:57'),
(15, 12, 30, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 07:00:10', '2023-03-27 07:00:10'),
(16, 12, 31, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:01:47', '2023-03-27 14:01:47'),
(17, 12, 32, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:04:27', '2023-03-27 14:04:27'),
(18, 12, 33, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:04:57', '2023-03-27 14:04:57'),
(19, 12, 34, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:07:33', '2023-03-27 14:07:33'),
(20, 12, 35, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:08:09', '2023-03-27 14:08:09'),
(21, 12, 36, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:10:03', '2023-03-27 14:10:03'),
(22, 12, 37, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:11:16', '2023-03-27 14:11:16'),
(23, 12, 38, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:14:41', '2023-03-27 14:14:41'),
(24, 12, 39, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:15:03', '2023-03-27 14:15:03'),
(25, 12, 40, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:15:13', '2023-03-27 14:15:13'),
(26, 12, 41, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:17:04', '2023-03-27 14:17:04'),
(27, 12, 42, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:17:06', '2023-03-27 14:17:06'),
(28, 12, 43, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:17:22', '2023-03-27 14:17:22'),
(29, 12, 44, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:17:29', '2023-03-27 14:17:29'),
(30, 12, 45, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:17:43', '2023-03-27 14:17:43'),
(31, 12, 46, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:18:53', '2023-03-27 14:18:53'),
(32, 12, 47, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-27 14:21:22', '2023-03-27 14:21:22'),
(33, 12, 48, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-28 01:15:41', '2023-03-28 01:15:41'),
(34, 12, 49, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-30 01:59:34', '2023-03-30 01:59:34'),
(35, 12, 50, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-30 03:38:17', '2023-03-30 03:38:17'),
(36, 12, 51, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-30 03:38:30', '2023-03-30 03:38:30'),
(37, 12, 52, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'đâsdasas', 'adasdsada', 'ádasdsad', '2023-03-30 03:38:51', '2023-03-30 03:38:51'),
(38, 6, 54, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-03-30 06:09:40', '2023-03-30 06:09:40'),
(39, 6, 54, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-03-30 06:09:40', '2023-03-30 06:09:40'),
(40, 6, 56, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-03-30 06:11:16', '2023-03-30 06:11:16'),
(41, 6, 56, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-03-30 06:11:16', '2023-03-30 06:11:16'),
(42, 6, 57, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-03-30 06:15:07', '2023-03-30 06:15:07'),
(43, 6, 58, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-03-30 06:15:45', '2023-03-30 06:15:45'),
(44, 6, 59, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-03-30 06:17:53', '2023-03-30 06:17:53'),
(45, 12, 60, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hà Giang', 'Huyện Mèo Vạc', 'ádsadsa', '2023-03-30 07:54:23', '2023-03-30 07:54:23'),
(46, 12, 62, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hà Giang', 'Huyện Mèo Vạc', 'ádsadsa', '2023-03-30 07:56:28', '2023-03-30 07:56:28'),
(47, 12, 63, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hà Giang', 'Huyện Mèo Vạc', 'ádsadsa', '2023-03-30 07:56:36', '2023-03-30 07:56:36'),
(48, 12, 64, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hà Giang', 'Huyện Mèo Vạc', 'ádsadsa', '2023-03-30 07:57:08', '2023-03-30 07:57:08'),
(49, 12, 65, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hà Giang', 'Huyện Mèo Vạc', 'ádsadsa', '2023-03-30 07:57:27', '2023-03-30 07:57:27'),
(50, 12, 66, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hà Giang', 'Huyện Mèo Vạc', 'ádsadsa', '2023-03-30 07:57:32', '2023-03-30 07:57:32'),
(51, 12, 67, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hà Giang', 'Huyện Mèo Vạc', 'ádsdsads', '2023-03-30 07:59:14', '2023-03-30 07:59:14'),
(52, 12, 68, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hà Giang', 'Huyện Mèo Vạc', 'ádsdsads', '2023-03-30 07:59:42', '2023-03-30 07:59:42'),
(53, 12, 69, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hà Giang', 'Huyện Mèo Vạc', 'ádsdsads', '2023-03-30 08:00:05', '2023-03-30 08:00:05'),
(54, 12, 70, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hà Giang', 'Huyện Mèo Vạc', 'ádsdsads', '2023-03-30 08:00:55', '2023-03-30 08:00:55'),
(55, 12, 71, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hưng Yên', 'Huyện Văn Giang', 'sadsadasd', '2023-03-30 08:02:33', '2023-03-30 08:02:33'),
(56, 12, 72, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:03:49', '2023-03-30 08:03:49'),
(57, 12, 73, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:04:03', '2023-03-30 08:04:03'),
(58, 12, 74, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:04:21', '2023-03-30 08:04:21'),
(59, 12, 75, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:04:32', '2023-03-30 08:04:32'),
(60, 12, 76, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:05:03', '2023-03-30 08:05:03'),
(61, 12, 77, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:06:06', '2023-03-30 08:06:06'),
(62, 12, 78, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:06:14', '2023-03-30 08:06:14'),
(63, 12, 79, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:07:18', '2023-03-30 08:07:18'),
(64, 12, 80, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:07:30', '2023-03-30 08:07:30'),
(65, 12, 81, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:08:04', '2023-03-30 08:08:04'),
(66, 12, 82, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:08:52', '2023-03-30 08:08:52'),
(67, 12, 83, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'sdasdsada', '2023-03-30 08:09:01', '2023-03-30 08:09:01'),
(68, 12, 84, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Hải Dương', 'Thành phố Chí Linh', 'bạch đa 1', '2023-03-30 08:09:27', '2023-03-30 08:09:27'),
(69, 12, 85, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Vĩnh Phúc', 'Thành phố Phúc Yên', 'sadsadas', '2023-03-30 08:09:58', '2023-03-30 08:09:58'),
(70, 12, 86, 'Admin_3', 'admin_3@gmail.com', '0346027222', 'Tỉnh Vĩnh Phúc', 'Thành phố Phúc Yên', 'sadsadas', '2023-03-30 08:10:13', '2023-03-30 08:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `discount_code`
--

CREATE TABLE `discount_code` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount_code` varchar(255) NOT NULL,
  `percentage_decrease` tinyint(4) NOT NULL,
  `content` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `remaining_quantity` int(11) DEFAULT NULL,
  `time_application` date NOT NULL,
  `expired` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `public_id` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `product_id`, `image_url`, `public_id`, `created_at`, `updated_at`) VALUES
(3, 4, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1678441857/PRO1014_WE18103_Nhom_6/Products/klv8bbgo2el5ej7wuiys.jpg', 'PRO1014_WE18103_Nhom_6/Products/klv8bbgo2el5ej7wuiys', '2023-03-10 02:50:59', '2023-03-10 02:50:59'),
(4, 5, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1678460766/PRO1014_WE18103_Nhom_6/Products/mjhkyx8ldvnxyekswo4y.jpg', 'PRO1014_WE18103_Nhom_6/Products/mjhkyx8ldvnxyekswo4y', '2023-03-10 08:06:06', '2023-03-10 08:06:06'),
(5, 7, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1678466152/PRO1014_WE18103_Nhom_6/Products/sl93wbpusrkwoctetcib.jpg', 'PRO1014_WE18103_Nhom_6/Products/sl93wbpusrkwoctetcib', '2023-03-10 09:35:54', '2023-03-10 09:35:54'),
(6, 8, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1679768689/PRO1014_WE18103_Nhom_6/Products/cha5mlwijjanat5ls4xd.jpg', 'PRO1014_WE18103_Nhom_6/Products/cha5mlwijjanat5ls4xd', '2023-03-25 11:24:50', '2023-03-25 11:24:50'),
(7, 9, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1679768695/PRO1014_WE18103_Nhom_6/Products/up3l13au5n7sjvi1lfhu.jpg', 'PRO1014_WE18103_Nhom_6/Products/up3l13au5n7sjvi1lfhu', '2023-03-25 11:24:55', '2023-03-25 11:24:55'),
(8, 10, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1679768701/PRO1014_WE18103_Nhom_6/Products/vebwgxzom4foraqfer5a.jpg', 'PRO1014_WE18103_Nhom_6/Products/vebwgxzom4foraqfer5a', '2023-03-25 11:25:01', '2023-03-25 11:25:01'),
(9, 11, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1679768705/PRO1014_WE18103_Nhom_6/Products/fhjz4hsm0t5z4jy5fekk.jpg', 'PRO1014_WE18103_Nhom_6/Products/fhjz4hsm0t5z4jy5fekk', '2023-03-25 11:25:05', '2023-03-25 11:25:05'),
(10, 12, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1679768708/PRO1014_WE18103_Nhom_6/Products/uam2etnr4jgtbaibv7zz.jpg', 'PRO1014_WE18103_Nhom_6/Products/uam2etnr4jgtbaibv7zz', '2023-03-25 11:25:09', '2023-03-25 11:25:09'),
(12, 13, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1679800949/PRO1014_WE18103_Nhom_6/Products/wioaezhrspcnuwboghke.jpg', 'PRO1014_WE18103_Nhom_6/Products/wioaezhrspcnuwboghke', '2023-03-25 20:22:29', '2023-03-25 20:22:29'),
(13, 13, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1679800950/PRO1014_WE18103_Nhom_6/Products/zmljofw4rmqqi9d0cjwm.jpg', 'PRO1014_WE18103_Nhom_6/Products/zmljofw4rmqqi9d0cjwm', '2023-03-25 20:22:31', '2023-03-25 20:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2023_03_09_095118_create_position_table', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(7, '2014_10_12_100000_create_password_resets_table', 2),
(8, '2019_08_19_000000_create_failed_jobs_table', 2),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(10, '2023_03_09_095118_create_positions_table', 2),
(11, '2023_03_09_172120_create_products_table', 3),
(12, '2023_03_09_172701_create_products_detail_table', 3),
(13, '2023_03_09_173154_create_warehouses_table', 3),
(14, '2023_03_09_173548_create_categories_table', 3),
(15, '2023_03_09_173711_create_author_table', 3),
(16, '2023_03_09_173754_create_publishing_house_table', 3),
(17, '2023_03_10_081035_create_image_table', 4),
(18, '2023_03_20_071359_create_store_catalog_table', 5),
(19, '2023_03_24_131431_create_orders_table', 6),
(20, '2023_03_24_131506_create_order_detail_table', 6),
(21, '2023_03_24_131610_create_payments_table', 6),
(22, '2023_03_24_132429_create_discount_code_table', 6),
(23, '2023_03_24_133134_create_order_notes_table', 6),
(24, '2023_03_24_142908_create_anonymous_table', 7),
(25, '2023_03_25_015205_create_store_table', 8),
(26, '2023_03_25_090105_create_delivery_address_table', 9),
(27, '2023_03_25_144848_create_order_status_table', 10),
(28, '2023_03_30_114016_create_payment_status_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `code_order` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `discount_code_id` int(11) DEFAULT NULL,
  `order_status_id` int(11) DEFAULT NULL,
  `payment_form` varchar(255) NOT NULL,
  `payment_status_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `shipping_fee` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Chưa xác nhận', 'chua-xac-nhan', '2023-03-25 07:51:56', '2023-03-25 07:51:56'),
(2, 'Đã xác nhận', 'da-xac-nhan', '2023-03-25 07:51:56', '2023-03-25 07:51:56'),
(3, 'Đang vận chuyển', 'da-van-chuyen', '2023-03-25 07:51:56', '2023-03-25 07:51:56'),
(4, 'Thành công', 'thanh-cong', '2023-03-25 07:51:56', '2023-03-25 07:51:56'),
(5, 'Hủy hàng', 'huy-hang', '2023-03-25 07:51:56', '2023-03-25 07:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Đã thanh toán', '2023-03-30 04:42:23', '2023-03-30 04:42:23'),
(2, 'Chưa thanh toán', '2023-03-30 04:42:23', '2023-03-30 04:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Administration', NULL, '2023-03-09 02:58:26', '2023-03-09 02:58:26'),
(2, 'Editor', NULL, '2023-03-09 02:58:26', '2023-03-09 02:58:26'),
(3, 'Member', NULL, '2023-03-09 02:58:26', '2023-03-09 02:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_code` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `publishing_house_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `introduction` text NOT NULL,
  `publication_date` date NOT NULL,
  `is_deleted` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `author_id`, `category_id`, `publishing_house_id`, `user_id`, `name`, `title`, `introduction`, `publication_date`, `is_deleted`, `created_at`, `updated_at`) VALUES
(5, 5638539, 1, 2, 1, 4, 'Doremon', 'addasdsadsad', 'ádsadsadasdsads', '2023-03-01', NULL, '2023-03-10 08:06:02', '2023-03-10 08:06:02'),
(7, 1073244, 1, 2, 1, 4, 'Doremon 1', 'adasdsadsa', 'sadsadsadsad', '2023-03-01', NULL, '2023-03-10 09:35:45', '2023-03-10 09:35:45'),
(8, 7089420, 1, 2, 1, 11, 'sách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', '2023-03-01', NULL, '2023-03-25 11:24:45', '2023-03-25 11:24:45'),
(9, 2045603, 1, 2, 1, 11, 'sách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', '2023-03-01', NULL, '2023-03-25 11:24:53', '2023-03-25 11:24:53'),
(10, 1644814, 1, 2, 1, 11, 'sách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', '2023-03-01', NULL, '2023-03-25 11:24:58', '2023-03-25 11:24:58'),
(11, 4864186, 1, 2, 1, 11, 'sách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', '2023-03-01', NULL, '2023-03-25 11:25:02', '2023-03-25 11:25:02'),
(12, 3192231, 1, 2, 1, 11, 'sách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', '2023-03-01', NULL, '2023-03-25 11:25:06', '2023-03-25 11:25:06'),
(13, 4904701, 1, 2, 1, 11, 'sách nấu ăn', 'sách nấu ănsách nấu ănsách nấu ăn', 'Tiếng huyên náo và tiếng chân chạy rầm rập trên đường phố New York. Cảnh sát đang rượt đuổi một tên tội phạm nguy hiểm. Cuối cùng, sau rất nhiều nỗ lực và quyết tâm, cảnh sát đã tốm được Crowley “Hai Súng”, một tên giết người hàng loạt, ngay tại nơi mà hắn không ngờ đến : nhà người yêu cầu hắn trên đại lộ West End.\r\n\r\nMột trăm năm mươi cảnh sát và mật vụ bao vây toà nhà cao nhất, nơi hắn ẩn náu. Họ chọc thủng mái nhà, phun khói và bố trí cả súng máy tại các cửa sổ của những cao ốc xung quanh. Âm thanh chát chúa của những tràng súng máy và súng ngắn vang lên liên tục trong hơn một giờ đồng hồ. Bên trong căn phòng ở tầng cao nhất ấy, Crowley ẩn người sau những chiếc ghế bành độn bông dày, quyết liệt chống trả lực lượng cảnh sát bằng những tràng súng liên thanh. Nhưng cuối cùng, tên tội phạm có tài thiện xạ này cũng phải đầu hàng.\r\n\r\nCảnh sát trưởng New York, ông E. P. Mulrooney nhấn mạnh rằng tên Crowley “Hai Súng” là một trong những tên tội phạm nguy hiểm và tàn ác nhất trong lịch sử tội phạm ở thành phố đông dân nhất nước Mỹ này. Một điểm rất đáng lưu ý về con người Crowley là: “Chỉ một lý do cỏn con, thặm chí không cần có lý do nào, hoặc đơn giản để giải sầu, hắn cũng có thể chĩa súng vào người khác và bóp cò“. Tuy nhiên, đó là suy nghĩ của cảnh sát. Riêng tên tội phạm máu lạnh này lại không nghĩ như thế. Khi bên ngoài cảnh sát tìm mọi cách để bắt hắn thì trong phòng, Crowley đang viết một bức thư. Bức thư còn dính vết máu đỏ. Và, đây là những gì Crowley đã viết: “Dưới lớp áo này là một trái tim mệt mỏi nhưng dịu dàng – một trái tim không hề làm tổn thương ai”. Đọc những dòng này, ai chẳng thấy lòng mình xúc động nhưng sự thật thì lại trái ngược với những gì hắn viết. Chỉ vài giờ trước đó, Crowley đã nỗ súng vào một cảnh sát giao thông khi anh ta chặn xe hắn để kiểm tra bằng lái. Khi viên cảnh sát ngã gục xuống, Crowley đã nhảy ra khỏi xe, chộp khẩu súng ngắn của nạn nhân và lạnh lùng bồi thêm một phát nữa vào thân hình đang run rẩy hấp hối. Crowley bị kết án tử hình. Trên ghế điện ở nhà tù Sing Sing, hắn còn nguỵ biện rằng: “Phải chăng đây là sự trừng phạt mà tôi phải chịu vì đã giết người? Không! Đây là sựï trừng phạt mà tôi phải chịu chỉ vì tôi cần tự bảo vệ mình”.\r\n\r\nThật kỳ lạ là một kẻ thủ ác rõ ràng như vậy lại không chịu nhìn nhận tội lỗi của mình.\r\n\r\nTôi có trao đỗi thư từ qua lại với Lewis Lawer, viên cai ngục nhà tù Sing Sing (là nơi giam giữ những tên tội phạm nguy hiểm nhất ở New York). Lewis Lawer tâm sự: “Rất hiếm phạm nhân ở Sing Sing tự xem mình là người xấu. Họ nghĩ họ cũng là những con người bình thường như anh và tôi. Họ có thể kể cho anh nghe tại sao họ phá một két sắt hay nhanh tay bấm cò súng. Hầu hết bọn họ đều tìm cach đưa ra những lý lẽ dối trá để bào chữa cho những hành vi phạm pháp và vô lương tâm của mình. Họ kiên quyết cho rằng không có lý do gì để bỏ tù họ cả”.\r\n\r\nNếu như Al Capone(3), “Hai Súng” và những tay anh chị thuộc các băng đảng xã hội đen không bao giờ thừa nhận tội ác tày trời của mình thì liệu những con người bình thường có dễ dàng tự nhìn nhận những sai lầm hết sức đời thường của mình không?\r\n\r\nJohn Wanamaker, người sáng lập chuỗi cữa hàng bán lẻ mang tên ông, từng thừa nhận rằng: “Cách đây ba mươi năm, tôi hiểu rằng mắng nhiếc người khác là ngu ngốc. Tôi đã gặp nhiều rắc rối tưởng như không thể chịu đựng trước khi hiểu đượcc một sự thật hiển nhiên là Thượng đế trao cho mỗi người một đặc điểm riêng, không ai giống ai. Và, chính vì vậy, tôi không thể đòi hỏi mọi người hành xử giống nhau và mọi người đều biết tự phê phán mình khi họ làm một điều gì đó không tốt”.', '2023-03-01', NULL, '2023-03-26 23:55:31', '2023-03-26 23:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `products_detail`
--

CREATE TABLE `products_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `page_number` int(11) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `import_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `promotion_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_detail`
--

INSERT INTO `products_detail` (`id`, `product_id`, `size`, `page_number`, `weight`, `import_price`, `price`, `promotion_price`, `created_at`, `updated_at`) VALUES
(2, 4, '23x1212121', 100, '200', 100000, 200000, 150000, '2023-03-10 01:39:50', '2023-03-10 02:32:13'),
(3, 5, '23x12', 100, '200', 100000, 200000, 150000, '2023-03-10 08:06:02', '2023-03-10 08:06:02'),
(4, 7, '23x12', 100, '200', 100000, 150000, 120000, '2023-03-10 09:35:45', '2023-03-10 09:35:45'),
(5, 8, '23x12', 100, '200', 100000, 150000, 10000, '2023-03-25 11:24:45', '2023-03-25 11:24:45'),
(6, 9, '23x12', 100, '200', 100000, 150000, 10000, '2023-03-25 11:24:53', '2023-03-25 11:24:53'),
(7, 10, '23x12', 100, '200', 100000, 150000, 10000, '2023-03-25 11:24:58', '2023-03-25 11:24:58'),
(8, 11, '23x12', 100, '200', 100000, 150000, 10000, '2023-03-25 11:25:02', '2023-03-25 11:25:02'),
(9, 12, '23x12', 100, '200', 100000, 150000, 10000, '2023-03-25 11:25:06', '2023-03-25 11:25:06'),
(10, 13, '23x12', 100, '200', 100000, 150000, 10000, '2023-03-25 11:25:10', '2023-03-25 11:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `publishing_house`
--

CREATE TABLE `publishing_house` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `storecatalog_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishing_house`
--

INSERT INTO `publishing_house` (`id`, `name`, `slug`, `storecatalog_id`, `created_at`, `updated_at`) VALUES
(1, 'Kevin Ford', 'kevin-ford', NULL, '2023-03-20 02:52:51', '2023-03-22 18:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image_url` text NOT NULL,
  `public_id` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `describe` text NOT NULL,
  `deleted` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_catalog`
--

CREATE TABLE `store_catalog` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_catalog`
--

INSERT INTO `store_catalog` (`id`, `name`, `slug`, `path`, `parent_id`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Sách - Truyện tranh', 'sach-truyen-tranh', NULL, NULL, 1, '2023-03-20 02:49:18', '2023-03-20 02:49:18'),
(2, 'Tác giả', 'tac-gia', NULL, NULL, 2, '2023-03-22 18:35:26', '2023-03-22 18:35:26'),
(3, 'Tin tức', 'tin-tuc', NULL, NULL, 5, '2023-03-20 03:31:25', '2023-03-20 03:31:25'),
(4, 'Mới nhất', 'moi-nhat', NULL, NULL, 3, '2023-03-20 03:31:33', '2023-03-20 03:31:33'),
(5, 'Sale', 'sale', NULL, NULL, 4, '2023-03-20 03:31:45', '2023-03-20 03:31:45'),
(6, 'Trang chủ', 'trang-chu', NULL, NULL, NULL, '2023-03-20 04:01:21', '2023-03-20 04:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `image_public_id` text DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_deleted` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `image_url`, `image_public_id`, `position_id`, `password`, `email_verified_at`, `remember_token`, `is_deleted`, `created_at`, `updated_at`) VALUES
(11, 'Admin', 'admin@gmail.com', '0346027346', NULL, NULL, NULL, 1, '$2y$10$cutXAyqY.ghxm4JG80z.uu9jPjyuU2RiMiRgwwGEIdi5a3ttc0A4O', NULL, NULL, NULL, '2023-03-01 09:14:25', NULL),
(12, 'Admin_3', 'admin_3@gmail.com', '0346027222', NULL, NULL, NULL, 3, '$2y$10$bL9d18PFvLWynkUMfPXegu9ysDdYTraqggQHFsAh1O0LXKPOWH/..', NULL, NULL, NULL, '2023-03-27 03:04:11', '2023-03-27 03:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `import_quantity` int(11) NOT NULL,
  `quantity_stock` int(11) DEFAULT NULL,
  `quantity_sold` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `product_id`, `import_quantity`, `quantity_stock`, `quantity_sold`, `created_at`, `updated_at`) VALUES
(1, 7, 150, NULL, NULL, '2023-03-10 09:35:45', '2023-03-10 09:35:45'),
(2, 8, 100, NULL, NULL, '2023-03-25 11:24:45', '2023-03-25 11:24:45'),
(3, 9, 100, NULL, NULL, '2023-03-25 11:24:53', '2023-03-25 11:24:53'),
(4, 10, 100, NULL, NULL, '2023-03-25 11:24:58', '2023-03-25 11:24:58'),
(5, 11, 100, NULL, NULL, '2023-03-25 11:25:02', '2023-03-25 11:25:02'),
(6, 12, 100, NULL, NULL, '2023-03-25 11:25:06', '2023-03-25 11:25:06'),
(7, 13, 100, NULL, NULL, '2023-03-25 11:25:10', '2023-03-25 11:25:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anonymous`
--
ALTER TABLE `anonymous`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_notes`
--
ALTER TABLE `order_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishing_house`
--
ALTER TABLE `publishing_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_catalog`
--
ALTER TABLE `store_catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anonymous`
--
ALTER TABLE `anonymous`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `order_notes`
--
ALTER TABLE `order_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publishing_house`
--
ALTER TABLE `publishing_house`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_catalog`
--
ALTER TABLE `store_catalog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
