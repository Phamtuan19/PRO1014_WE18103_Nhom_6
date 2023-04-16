-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 07:57 AM
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
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image_url` text NOT NULL,
  `public_id` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `describe` text NOT NULL,
  `is_deleted` date NOT NULL,
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
(1, 'Tiểu Quỹ', 'tieu-quy', NULL, '2023-04-03 05:19:03', '2023-04-03 05:19:03'),
(2, 'Nguyễn Nhật Ánh', 'nguyen-nhat-anh', NULL, '2023-04-03 05:19:48', '2023-04-03 05:19:48'),
(3, 'Trang Hạ', 'trang-ha', NULL, '2023-04-03 05:19:59', '2023-04-03 05:19:59'),
(4, 'Nguyễn Phong Việt', 'nguyen-phong-viet', NULL, '2023-04-03 05:20:08', '2023-04-03 05:20:08'),
(5, 'Anh Khang', 'anh-khang', NULL, '2023-04-03 05:20:13', '2023-04-03 05:20:13'),
(6, 'Sơn Paris', 'son-paris', NULL, '2023-04-03 05:20:19', '2023-04-03 05:20:19'),
(7, 'Nguyễn Ngọc Thạch', 'nguyen-ngoc-thach', NULL, '2023-04-03 05:20:29', '2023-04-03 05:20:29');

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
(1, 'Sách Chính trị - pháp luật', 'sach-chinh-tri-phap-luat', NULL, NULL, '2023-04-03 05:15:33', '2023-04-03 05:15:33'),
(2, 'Sách Khoa học công nghệ - Kinh tế', 'sach-khoa-hoc-cong-nghe-kinh-te', NULL, NULL, '2023-04-03 05:15:52', '2023-04-03 05:15:52'),
(3, 'Sách Văn học nghệ thuật', 'sach-van-hoc-nghe-thuat', NULL, NULL, '2023-04-03 05:15:59', '2023-04-03 05:15:59'),
(4, 'Sách Văn hóa xã hội - Lịch sử', 'sach-van-hoa-xa-hoi-lich-su', NULL, NULL, '2023-04-03 05:16:17', '2023-04-03 05:16:17'),
(5, 'Sách Giáo trình', 'sach-giao-trinh', NULL, NULL, '2023-04-03 05:16:21', '2023-04-03 05:16:21'),
(6, 'Sách Truyện, tiểu thuyết', 'sach-truyen-tieu-thuyet', NULL, NULL, '2023-04-03 05:16:27', '2023-04-03 05:16:27'),
(7, 'Sách Tâm lý, tâm linh, tôn giáo', 'sach-tam-ly-tam-linh-ton-giao', NULL, NULL, '2023-04-03 05:16:33', '2023-04-03 05:16:33'),
(8, 'Sách Sách thiếu nhi', 'sach-sach-thieu-nhi', NULL, NULL, '2023-04-03 05:16:38', '2023-04-03 05:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `content`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 10, 16, 'ádasdasd', NULL, '2023-04-12 17:39:37', '2023-04-12 17:39:37'),
(2, 10, 16, 'comment sản phẩm', NULL, '2023-04-12 17:59:40', '2023-04-12 17:59:40'),
(3, 10, 16, 'comment sản phẩm lần 2', NULL, '2023-04-12 18:00:15', '2023-04-12 18:00:15'),
(4, 10, 16, 'comment sản phẩm lần 3', NULL, '2023-04-12 18:00:23', '2023-04-12 18:00:23'),
(5, 4, 16, 'a', NULL, '2023-04-14 06:54:48', '2023-04-14 06:54:48'),
(6, 7, 16, 'a', NULL, '2023-04-14 08:33:01', '2023-04-14 08:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `delivery_address` (`id`, `order_id`, `name`, `email`, `phone`, `province_city`, `county_district`, `house_number_street_name`, `created_at`, `updated_at`) VALUES
(4, 9, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 10:17:00', '2023-04-05 10:17:00'),
(5, 10, 'Tuấn Phạm', 'Phamtuan19hd@gmail.com', '0346027346', 'Tỉnh Vĩnh Phúc', 'Huyện Lập Thạch', 'bạch đa 1', '2023-04-05 10:28:37', '2023-04-05 10:28:37'),
(6, 11, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 11:11:09', '2023-04-05 11:11:09'),
(7, 12, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 11:11:40', '2023-04-05 11:11:40'),
(8, 13, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 11:21:44', '2023-04-05 11:21:44'),
(9, 14, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 11:45:30', '2023-04-05 11:45:30'),
(10, 15, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 11:46:46', '2023-04-05 11:46:46'),
(11, 16, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 11:50:39', '2023-04-05 11:50:39'),
(12, 17, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 11:51:09', '2023-04-05 11:51:09'),
(13, 18, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 11:55:16', '2023-04-05 11:55:16'),
(14, 19, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 11:56:31', '2023-04-05 11:56:31'),
(15, 20, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 12:02:03', '2023-04-05 12:02:03'),
(16, 21, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 12:08:34', '2023-04-05 12:08:34'),
(17, 22, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 12:08:55', '2023-04-05 12:08:55'),
(18, 23, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 12:10:12', '2023-04-05 12:10:12'),
(19, 24, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 12:11:35', '2023-04-05 12:11:35'),
(20, 25, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 12:12:22', '2023-04-05 12:12:22'),
(21, 26, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 12:13:27', '2023-04-05 12:13:27'),
(22, 27, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 12:14:15', '2023-04-05 12:14:15'),
(23, 28, 'Phạm Anh Tuấn', 'phamtuan19hd@gmail.com', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 12:15:49', '2023-04-05 12:15:49'),
(24, 29, 'Phạm Anh Tuấn', 'tuanpaph29384@fpt.edu.vn', '0346027346', 'Hải dương', 'nam sách', 'an lâm', '2023-04-05 12:17:51', '2023-04-05 12:17:51'),
(25, 30, 'Tuấn Phạm', 'Phamtuan19hd@gmail.com', '0346027346', 'Tỉnh Bắc Ninh', 'Huyện Yên Phong', 'bạch đa 1', '2023-04-05 17:16:46', '2023-04-05 17:16:46'),
(26, 31, 'Customer', 'customer@gmail.com', '0346027222', 'Tỉnh Bắc Ninh', 'Huyện Quế Võ', 'bạch đa 1', '2023-04-07 10:17:17', '2023-04-07 10:17:17'),
(27, 32, 'Customer', 'customer@gmail.com', '0346027222', 'Tỉnh Hưng Yên', 'Huyện Văn Giang', 'bạch đa 1', '2023-04-07 10:22:58', '2023-04-07 10:22:58'),
(28, 33, 'Customer', 'customer@gmail.com', '0346027222', 'Tỉnh Bắc Kạn', 'Huyện Bạch Thông', 'bạch đa 1', '2023-04-07 14:03:16', '2023-04-07 14:03:16'),
(29, 34, 'Customer', 'customer@gmail.com', '0346027222', 'Tỉnh Phú Thọ', 'Thị xã Phú Thọ', 'bạch đa 1', '2023-04-07 14:05:25', '2023-04-07 14:05:25'),
(30, 35, 'customer', 'customer@gmail.com', '0971894323', 'Tỉnh Bắc Ninh', 'Huyện Yên Phong', 'bạch đa 1', '2023-04-11 00:12:48', '2023-04-11 00:12:48'),
(31, 36, 'customer_1', 'customer_1@gmail.com', '0971894222', 'Tỉnh Thái Nguyên', 'Huyện Định Hóa', 'bạch đa 1', '2023-04-11 00:48:18', '2023-04-11 00:48:18'),
(32, 37, 'phamtuan19hd@gmail.com', 'customer_1@gmail.com', '0971894222', 'Tỉnh Thái Nguyên', 'Huyện Định Hóa', 'bạch đa 1', '2023-04-11 00:49:05', '2023-04-11 00:49:05'),
(33, 38, 'Tuấn Phạm', 'Phamtuan19hd@gmail.com', '0346027346', 'Tỉnh Hưng Yên', 'Huyện Văn Lâm', 'asdsadasd', '2023-04-11 00:50:33', '2023-04-11 00:50:33'),
(34, 39, 'customer', 'customer@gmail.com', '0971894323', '30-Tỉnh Hải Dương', '297-Huyện Gia Lộc', 'adasdasdas', '2023-04-12 09:12:20', '2023-04-12 09:12:20'),
(35, 40, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '246-Huyện Lập Thạch', 'bạch đa 1', '2023-04-12 09:54:04', '2023-04-12 09:54:04'),
(36, 41, 'Tuấn Phạm', 'Phamtuan19hd@gmail.com', '0346027346', '25-Tỉnh Phú Thọ', '228-Thị xã Phú Thọ', 'bạch đa 1', '2023-04-13 00:42:42', '2023-04-13 00:42:42'),
(37, 42, 'customer', 'customer@gmail.com', '0971894323', '2-Tỉnh Hà Giang', '26-Huyện Đồng Văn', 'bạch đa 1', '2023-04-13 08:32:47', '2023-04-13 08:32:47'),
(38, 43, 'customer', 'customer@gmail.com', '0971894323', '2-Tỉnh Hà Giang', '27-Huyện Mèo Vạc', 'bạch đa 1', '2023-04-13 08:36:52', '2023-04-13 08:36:52'),
(39, 44, 'customer', 'customer@gmail.com', '0971894323', '22-Tỉnh Quảng Ninh', '195-Thành phố Cẩm Phả', 'bạch đa 1', '2023-04-13 15:19:57', '2023-04-13 15:19:57'),
(40, 45, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '244-Thành phố Phúc Yên', 'bạch đa 1', '2023-04-13 15:43:35', '2023-04-13 15:43:35'),
(41, 46, 'customer', 'customer@gmail.com', '0971894323', '22-Tỉnh Quảng Ninh', '205-Thị xã Đông Triều', 'bạch đa 1', '2023-04-13 15:45:22', '2023-04-13 15:45:22'),
(42, 47, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '246-Huyện Lập Thạch', 'bạch đa 1', '2023-04-13 16:20:19', '2023-04-13 16:20:19'),
(43, 48, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:25:57', '2023-04-13 16:25:57'),
(44, 49, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:28:05', '2023-04-13 16:28:05'),
(45, 50, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:31:55', '2023-04-13 16:31:55'),
(46, 51, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:34:19', '2023-04-13 16:34:19'),
(47, 52, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:42:07', '2023-04-13 16:42:07'),
(48, 53, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:42:40', '2023-04-13 16:42:40'),
(49, 54, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:43:11', '2023-04-13 16:43:11'),
(50, 55, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:44:07', '2023-04-13 16:44:07'),
(51, 56, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:45:41', '2023-04-13 16:45:41'),
(52, 57, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:48:07', '2023-04-13 16:48:07'),
(53, 58, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:51:09', '2023-04-13 16:51:09'),
(54, 59, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:51:45', '2023-04-13 16:51:45'),
(55, 60, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:52:10', '2023-04-13 16:52:10'),
(56, 61, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:52:24', '2023-04-13 16:52:24'),
(57, 62, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:56:02', '2023-04-13 16:56:02'),
(58, 63, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:56:22', '2023-04-13 16:56:22'),
(59, 64, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:56:51', '2023-04-13 16:56:51'),
(60, 67, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 16:59:33', '2023-04-13 16:59:33'),
(61, 68, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 17:01:05', '2023-04-13 17:01:05'),
(62, 69, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 17:05:38', '2023-04-13 17:05:38'),
(63, 70, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 17:09:03', '2023-04-13 17:09:03'),
(64, 71, 'customer', 'customer@gmail.com', '0971894323', '26-Tỉnh Vĩnh Phúc', '248-Huyện Tam Đảo', 'bạch đa 1', '2023-04-13 17:09:44', '2023-04-13 17:09:44'),
(65, 72, 'Tuấn Phạm', 'Phamtuan19hd@gmail.com', '0346027346', '30-Tỉnh Hải Dương', '291-Huyện Nam Sách', 'bạch đa 1', '2023-04-13 17:20:19', '2023-04-13 17:20:19'),
(66, 73, 'Tuấn Phạm', 'duon123@gmail.com', '0346027346', '22-Tỉnh Quảng Ninh', '196-Thành phố Uông Bí', 'asdsadasd', '2023-04-13 17:27:39', '2023-04-13 17:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `discount_code`
--

CREATE TABLE `discount_code` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `discount_code` varchar(255) NOT NULL,
  `percentage_decrease` int(11) NOT NULL,
  `content` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `remaining_quantity` int(11) DEFAULT NULL,
  `time_application` date NOT NULL,
  `expired` date NOT NULL,
  `used_orders` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_code`
--

INSERT INTO `discount_code` (`id`, `user_id`, `discount_code`, `percentage_decrease`, `content`, `quantity`, `remaining_quantity`, `time_application`, `expired`, `used_orders`, `created_at`, `updated_at`) VALUES
(1, 1, 'pE0pF7KU', 100000, 'ádasdasdasdasd', 12, 6, '2023-04-13', '2023-05-05', NULL, '2023-04-13 10:42:51', '2023-04-13 17:09:49');

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
(1, 1, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1680499551/PRO1014_WE18103_Nhom_6/Products/xhyfcraosspozfuy1yik.jpg', 'PRO1014_WE18103_Nhom_6/Products/xhyfcraosspozfuy1yik', '2023-04-03 05:25:52', '2023-04-03 05:25:52'),
(2, 2, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1680499609/PRO1014_WE18103_Nhom_6/Products/wivesivoa7yqvafgfudd.jpg', 'PRO1014_WE18103_Nhom_6/Products/wivesivoa7yqvafgfudd', '2023-04-03 05:26:50', '2023-04-03 05:26:50'),
(3, 3, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1680499616/PRO1014_WE18103_Nhom_6/Products/efqd6pvuigl6ld1jynpl.jpg', 'PRO1014_WE18103_Nhom_6/Products/efqd6pvuigl6ld1jynpl', '2023-04-03 05:26:58', '2023-04-03 05:26:58'),
(4, 4, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1680499636/PRO1014_WE18103_Nhom_6/Products/ar81mht6q1qka11f325q.jpg', 'PRO1014_WE18103_Nhom_6/Products/ar81mht6q1qka11f325q', '2023-04-03 05:27:17', '2023-04-03 05:27:17'),
(5, 5, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1680499640/PRO1014_WE18103_Nhom_6/Products/dr0uvyvpyxduzzcin6el.jpg', 'PRO1014_WE18103_Nhom_6/Products/dr0uvyvpyxduzzcin6el', '2023-04-03 05:27:21', '2023-04-03 05:27:21'),
(6, 6, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1680499645/PRO1014_WE18103_Nhom_6/Products/xaeqh735hy8cqgxbxmuj.jpg', 'PRO1014_WE18103_Nhom_6/Products/xaeqh735hy8cqgxbxmuj', '2023-04-03 05:27:26', '2023-04-03 05:27:26'),
(7, 7, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1680499649/PRO1014_WE18103_Nhom_6/Products/ns1rysymudbv0ewl8pap.jpg', 'PRO1014_WE18103_Nhom_6/Products/ns1rysymudbv0ewl8pap', '2023-04-03 05:27:31', '2023-04-03 05:27:31'),
(8, 8, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1680499663/PRO1014_WE18103_Nhom_6/Products/d7ozxbmnz5bytdncpsxj.jpg', 'PRO1014_WE18103_Nhom_6/Products/d7ozxbmnz5bytdncpsxj', '2023-04-03 05:27:45', '2023-04-03 05:27:45'),
(9, 9, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1680499668/PRO1014_WE18103_Nhom_6/Products/q0erk3lwesdbie61ryd0.jpg', 'PRO1014_WE18103_Nhom_6/Products/q0erk3lwesdbie61ryd0', '2023-04-03 05:27:49', '2023-04-03 05:27:49'),
(10, 10, 'https://res.cloudinary.com/dizwixa7c/image/upload/v1680499672/PRO1014_WE18103_Nhom_6/Products/qcaioghprvqgfawodojf.jpg', 'PRO1014_WE18103_Nhom_6/Products/qcaioghprvqgfawodojf', '2023-04-03 05:27:54', '2023-04-03 05:27:54');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_09_095118_create_positions_table', 1),
(6, '2023_03_09_172120_create_products_table', 1),
(7, '2023_03_09_172701_create_products_detail_table', 1),
(8, '2023_03_09_173154_create_warehouses_table', 1),
(9, '2023_03_09_173548_create_categories_table', 1),
(10, '2023_03_09_173711_create_author_table', 1),
(11, '2023_03_09_173754_create_publishing_house_table', 1),
(12, '2023_03_10_081035_create_image_table', 1),
(13, '2023_03_20_071359_create_store_catalog_table', 1),
(14, '2023_03_24_131431_create_orders_table', 1),
(15, '2023_03_24_131506_create_order_detail_table', 1),
(16, '2023_03_24_131610_create_payments_table', 1),
(17, '2023_03_24_132429_create_discount_code_table', 1),
(18, '2023_03_24_133134_create_order_notes_table', 1),
(19, '2023_03_25_015205_create_advertise_table', 1),
(20, '2023_03_25_090105_create_delivery_address_table', 1),
(21, '2023_03_25_144848_create_order_status_table', 1),
(22, '2023_03_30_114016_create_payment_status_table', 1),
(23, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(24, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(25, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(26, '2016_06_01_000004_create_oauth_clients_table', 2),
(27, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(28, '2023_04_11_150037_create_post_table', 3),
(29, '2023_04_13_000656_create_comments_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('036a943a8667ccc01a2a3910bbe16b0ce658ad119425733f2da15af67d7f6cfb99d1157b250f57ce', 2, 1, 'authLogin', '[]', 1, '2023-04-06 09:09:35', '2023-04-06 09:09:35', '2024-04-06 16:09:35'),
('0d9ef7d282d21d5a6960cff6ee0701e49059e6c4aac5a98c3244503459e8f2abf566286270cf0e9d', 2, 1, 'authLogin', '[]', 1, '2023-04-06 16:08:49', '2023-04-06 16:08:49', '2024-04-06 23:08:49'),
('108caeb8d990c3644a6ef321c54d12554e43bb65946c8f21b68ef6796080468f390477ec25a688b6', 16, 1, 'authLogin', '[]', 1, '2023-04-13 17:19:32', '2023-04-13 17:19:32', '2024-04-14 00:19:32'),
('1abebb8d1b0159155917bb401ee9862f3f16d230c17bdca6cb691fc7f1f792b50ef4c2f8b3cb5441', 2, 1, 'authLogin', '[]', 1, '2023-04-05 17:12:24', '2023-04-05 17:12:24', '2024-04-06 00:12:24'),
('1ad479e3af05d0fbce81b0ddfeba6a5531c5233c21d90a496301d13b256af6e5b436e5fc02cbbaa1', 2, 1, 'authLogin', '[]', 1, '2023-04-07 07:15:23', '2023-04-07 07:15:23', '2024-04-07 14:15:23'),
('27310e9121818c93c5d15022d822afdb062c83983890578c5fffbec7240b33cbe6b124d369955a20', 16, 1, 'authLogin', '[]', 1, '2023-04-13 17:33:49', '2023-04-13 17:33:49', '2024-04-14 00:33:49'),
('28d448e6692cc140f4545d680d6f86f645a305d199bbca609bdbe781f7cff329097381c11d4e2b18', 2, 1, 'authLogin', '[]', 1, '2023-04-06 10:09:05', '2023-04-06 10:09:05', '2024-04-06 17:09:05'),
('345cf9b817fbbf41404f6eea038c81090cff7006528fc68bfdee28a643a71c68286f67975a1190a3', 16, 1, 'authLogin', '[]', 1, '2023-04-08 13:40:10', '2023-04-08 13:40:10', '2024-04-08 20:40:10'),
('398ea31aacaf706623a78e1f9e385c39d98fb4dc32c580261373590f5b50973361f0956f334b3354', 16, 1, 'authLogin', '[]', 1, '2023-04-13 08:32:07', '2023-04-13 08:32:07', '2024-04-13 15:32:07'),
('3dc4cfe0798aea03a5cc9c67180f488264733df3ade5c1313ae7c8219540d6161e96401441ee1752', 2, 1, 'authLogin', '[]', 1, '2023-04-05 17:08:53', '2023-04-05 17:08:53', '2024-04-06 00:08:53'),
('3e72c85ba7160ba107a1fdd70406af5e66b6ea2361b232ca6e07e4f6b0e92f362e57764edfa6f8ac', 2, 1, 'authLogin', '[]', 1, '2023-04-07 10:00:13', '2023-04-07 10:00:13', '2024-04-07 17:00:13'),
('442168c595350f30f9d1b8a03afeffb32b181c9ee9efefb844841ef2e032e4da4aee40f30813fbdb', 2, 1, 'authLogin', '[]', 1, '2023-04-06 16:06:27', '2023-04-06 16:06:27', '2024-04-06 23:06:27'),
('4dd177eb8e388b15283ccce1da0e7a8f19d1676a707c27378f80dccc90d566eac3a6da81422512d0', 2, 1, 'authLogin', '[]', 1, '2023-04-06 10:08:16', '2023-04-06 10:08:16', '2024-04-06 17:08:16'),
('50b5c02304c3bec4eb34e46e9429c2caebbb474e962b126c4143b4c0e08f969ca72f0fb73f2abeda', 16, 1, 'authLogin', '[]', 1, '2023-04-13 17:18:49', '2023-04-13 17:18:49', '2024-04-14 00:18:49'),
('586cdf05b1abf743a81f6e55b0e52afe16ac091fd3cd7cd5ad8573867f7067a01348a48922d0526a', 2, 1, 'authLogin', '[]', 1, '2023-04-07 05:09:56', '2023-04-07 05:09:56', '2024-04-07 12:09:56'),
('5c460e636f1585140a006d6567af73ab6356dc4839ea476b231995bb42dc1626da21fc5ae0899c52', 2, 1, 'authLogin', '[]', 1, '2023-04-06 18:02:19', '2023-04-06 18:02:19', '2024-04-07 01:02:19'),
('64298a11bb1656bc24f61bc1baaf1e0f59f610f45000f2dff46e3f41920421ff6ce64f3bf709fbfe', 16, 1, 'authLogin', '[]', 0, '2023-04-15 05:44:33', '2023-04-15 05:44:33', '2024-04-15 12:44:33'),
('6e450f63866022cd46715e3e3a5cd00c0c2279384f6ef4e118cef4a13cb818bbbb06203c715c36c4', 2, 1, 'authLogin', '[]', 1, '2023-04-06 09:14:49', '2023-04-06 09:14:49', '2024-04-06 16:14:49'),
('75116e6bcf796d09ea30339ffb032df4239dd2405acb22962c0eb0804f5a4e443a6ccbd82a739460', 2, 1, 'authLogin', '[]', 1, '2023-04-05 17:11:27', '2023-04-05 17:11:27', '2024-04-06 00:11:27'),
('79f6b83abfc0d5b5afef38ef8ca89c7c7585baea2fc278561ad2543b6ebe038d863c05316ebb2867', 2, 1, 'authLogin', '[]', 1, '2023-04-06 16:07:08', '2023-04-06 16:07:08', '2024-04-06 23:07:08'),
('7a2d11eb94d8ea455fef3e848a69ae29b49e35aeb8d1c1d1f1d2c244a16e9f3a19077b8cadd02bcb', 16, 1, 'authLogin', '[]', 1, '2023-04-07 16:34:36', '2023-04-07 16:34:36', '2024-04-07 23:34:36'),
('822622d9f880c3ac5922f5aacd3440f1bed91f6c91c0eeabffacb958dc2b3b1a45e723f773e7836c', 2, 1, 'authLogin', '[]', 1, '2023-04-07 07:15:58', '2023-04-07 07:15:58', '2024-04-07 14:15:58'),
('83044c79d48ac6dea48bd78801714f9f308d57fca733ce8bb8c6ece27f29639dea46e734fab91c83', 16, 1, 'authLogin', '[]', 1, '2023-04-13 06:37:41', '2023-04-13 06:37:41', '2024-04-13 13:37:41'),
('838c06c17eb184356bb57267ce1ed919ec4f5e6449e77a2fa66bba97758899a427bc59fba477678a', 2, 1, 'authLogin', '[]', 1, '2023-04-06 16:14:55', '2023-04-06 16:14:55', '2024-04-06 23:14:55'),
('8764f3a0177857f98fd48b575287620b083ee741f398219b4cdb0472dff4cc7d3c7d70923e856922', 16, 1, 'authLogin', '[]', 1, '2023-04-12 07:56:49', '2023-04-12 07:56:49', '2024-04-12 14:56:49'),
('89d84b86f3ee261e5a984db3d16a8fa74ceeea38b8cefc3394bbdb4bc9f630fdaa4a11e143476392', 2, 1, 'authLogin', '[]', 1, '2023-04-05 16:44:08', '2023-04-05 16:44:08', '2024-04-05 23:44:08'),
('8f45edb404182fce4adc13ca286280f9b5f3a2be76330fae4a5303db959cafc933864e3b70540045', 16, 1, 'authLogin', '[]', 1, '2023-04-12 07:47:26', '2023-04-12 07:47:26', '2024-04-12 14:47:26'),
('8fb8bb98b5b99c8c566a39458a127afeeca8882d4044e7c8ee9dcbf4d5fd365777a5531cdc5aeaff', 17, 1, 'authLogin', '[]', 1, '2023-04-11 00:39:58', '2023-04-11 00:39:58', '2024-04-11 07:39:58'),
('91390042dd76a68f9fca2802df3f3d118066e854db214fb104cab52811dd04cac34a6d48d0c18754', 16, 1, 'authLogin', '[]', 1, '2023-04-08 13:46:55', '2023-04-08 13:46:55', '2024-04-08 20:46:55'),
('94ba578f449b9854e87d93e0ee4bf1c5b292c512f808c03025d28a5b84cb3d593e3c8753c5164994', 2, 1, 'authLogin', '[]', 0, '2023-04-07 05:13:44', '2023-04-07 05:13:44', '2024-04-07 12:13:44'),
('9998210929603949ad6fb39c2e538ae84314912ca061d6ee91b547bdab47244d77bf6e9c3e878c2c', 16, 1, 'authLogin', '[]', 1, '2023-04-12 07:59:56', '2023-04-12 07:59:56', '2024-04-12 14:59:56'),
('a2c4d0347779324003ef839b64eb8c57c6deaab9d60e00d2a65d9afd14dee0a46eb10d4e81aae726', 16, 1, 'authLogin', '[]', 1, '2023-04-12 07:59:29', '2023-04-12 07:59:29', '2024-04-12 14:59:29'),
('a4359646be249b38a90ffb3686b03685088b5f527fe39d9d0efa9b3b9838b97847dda49926308d44', 2, 1, 'authLogin', '[]', 1, '2023-04-06 16:03:14', '2023-04-06 16:03:14', '2024-04-06 23:03:14'),
('b3d1b37ceb62139d52e4e66432436253e5b9da623d5fe054e4ffe58fb58faf28a36d37d9a24cb5bf', 16, 1, 'authLogin', '[]', 1, '2023-04-08 13:39:23', '2023-04-08 13:39:23', '2024-04-08 20:39:23'),
('b4bc83f086361341f70025cf813092ffb056b3c68b4ad9f97585b346ca9a442afa4d944bf58c7e49', 16, 1, 'authLogin', '[]', 1, '2023-04-13 06:48:56', '2023-04-13 06:48:56', '2024-04-13 13:48:56'),
('b6d3ed2d4e82ba1be705214d50dc72a590bbddbf3bfb846d3f918356b0f853bae141216b719bab92', 2, 1, 'authLogin', '[]', 1, '2023-04-06 09:16:19', '2023-04-06 09:16:19', '2024-04-06 16:16:19'),
('bc59696a886cf91e35fe693d21e30052020d5057894ce4f6b145bf5d36a4fa98af2bfacc4514a3ec', 2, 1, 'authLogin', '[]', 1, '2023-04-07 07:16:27', '2023-04-07 07:16:27', '2024-04-07 14:16:27'),
('c6d1746149bfb116118874d8e2ff8f1f5ed63da0c122bd002f7f3a3055b5c65b1cabd8bb7a79d28b', 16, 1, 'authLogin', '[]', 1, '2023-04-13 06:24:57', '2023-04-13 06:24:57', '2024-04-13 13:24:57'),
('cbf0766fb3f42a0a80d9a7822a26c5f68a7adb6626cca5fb71415242ccddf6589cbc3bbbcc0bf943', 16, 1, 'authLogin', '[]', 1, '2023-04-11 10:00:12', '2023-04-11 10:00:12', '2024-04-11 17:00:12'),
('d65fa8d95b15f4a3f2d2d98cfd50a686bbd5a12fbe0c1b54b12a5bd6952cf8b081f0fa38d9631435', 2, 1, 'authLogin', '[]', 1, '2023-04-06 16:01:55', '2023-04-06 16:01:55', '2024-04-06 23:01:55'),
('d75e2b365446dc0ef0224cf724b909916a6e99a00d47b35607bf253dffe33bf7777954901ac498e8', 2, 1, 'authLogin', '[]', 1, '2023-04-06 00:18:27', '2023-04-06 00:18:27', '2024-04-06 07:18:27'),
('dabccfc367070b4dbb4b38fc3df391321c02e852077e5166b08a29ec48760c3d14bd30edf42add2e', 16, 1, 'authLogin', '[]', 1, '2023-04-08 13:47:45', '2023-04-08 13:47:45', '2024-04-08 20:47:45'),
('db8f799ce2fd1c147533ecec927f1876eb393f2eaf555955ee96dd38a1ef4856e9afcf3e99fc428e', 2, 1, 'authLogin', '[]', 1, '2023-04-05 17:14:32', '2023-04-05 17:14:32', '2024-04-06 00:14:32'),
('dd4ad9df4839c42f8b5afe43cadd403085fe2d9d5bb955418781e990151a7ca90014ca3460185bde', 2, 1, 'authLogin', '[]', 1, '2023-04-07 07:11:13', '2023-04-07 07:11:13', '2024-04-07 14:11:13'),
('e30f63fe4c619b08e9f6a1571b3c310449993ff9aa274a705fb675ae77f25793e17bbe041ab21e5c', 16, 1, 'authLogin', '[]', 1, '2023-04-13 07:14:30', '2023-04-13 07:14:30', '2024-04-13 14:14:30'),
('e95369f429f04511514a03f479c238b6f286c6a8839a2c954dacece62d2331ff557331f5df1eea9a', 16, 1, 'authLogin', '[]', 1, '2023-04-07 16:36:26', '2023-04-07 16:36:26', '2024-04-07 23:36:26'),
('eb6cfd22865a75a4e3892b840305e962e1caa224ade82904dc55a02dd1d5cf148ca6ef92c7329cbb', 2, 1, 'authLogin', '[]', 1, '2023-04-06 16:01:02', '2023-04-06 16:01:02', '2024-04-06 23:01:02'),
('f3a86c3336b00461e65a4ea139abf52d9f1d9ac1992b1ed251bc5b71522c303397db643b089f336e', 16, 1, 'authLogin', '[]', 1, '2023-04-13 19:14:49', '2023-04-13 19:14:49', '2024-04-14 02:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '5VJV6eVcALq2S9mswKwE0BBSQH71p0r0VuvHIaI3', NULL, 'http://localhost', 1, 0, 0, '2023-04-05 15:18:31', '2023-04-05 15:18:31'),
(2, NULL, 'Laravel Password Grant Client', 'wODGPh5mJjKwtYGpGXUSR1cyxo8mqseOUukJWbj3', 'users', 'http://localhost', 0, 1, 0, '2023-04-05 15:18:31', '2023-04-05 15:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-04-05 15:18:31', '2023-04-05 15:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `code_order` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `discount_code_id` int(11) DEFAULT NULL,
  `order_status_id` varchar(255) NOT NULL,
  `payment_form` varchar(255) NOT NULL,
  `payment_status_id` int(11) DEFAULT NULL,
  `quantity` tinyint(4) NOT NULL,
  `total_price` int(11) NOT NULL,
  `shipping_fee` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code_order`, `user_id`, `discount_code_id`, `order_status_id`, `payment_form`, `payment_status_id`, `quantity`, `total_price`, `shipping_fee`, `created_at`, `updated_at`) VALUES
(9, 'OD171700', NULL, NULL, '5', 'Pay', 1, 7, 945000, NULL, '2023-03-15 10:17:00', '2023-04-12 16:23:11'),
(10, 'OD172837', NULL, NULL, '2', 'Pay', 2, 2, 261000, NULL, '2023-03-15 10:17:00', '2023-04-05 10:28:37'),
(11, 'OD181109', NULL, NULL, '3', 'Pay', 2, 5, 675000, NULL, '2023-04-05 11:11:09', '2023-04-05 11:11:09'),
(12, 'OD181140', NULL, NULL, '4', 'Pay', 2, 5, 675000, NULL, '2023-04-05 11:11:40', '2023-04-05 11:11:40'),
(13, 'OD182144', NULL, NULL, '5', 'Pay', 2, 5, 675000, NULL, '2023-04-05 11:21:44', '2023-04-05 11:21:44'),
(14, 'OD184530', NULL, NULL, '5', 'Pay', 2, 5, 675000, NULL, '2023-04-05 11:45:30', '2023-04-05 11:45:30'),
(15, 'OD184646', NULL, NULL, '5', 'Pay', 2, 2, 270000, NULL, '2023-04-05 11:46:46', '2023-04-12 16:06:43'),
(16, 'OD185039', NULL, NULL, '5', 'Pay', 2, 2, 270000, NULL, '2023-04-05 11:50:39', '2023-04-12 16:15:33'),
(17, 'OD185109', NULL, NULL, '5', 'Pay', 2, 2, 270000, NULL, '2023-03-15 10:17:00', '2023-04-12 16:17:40'),
(18, 'OD185516', NULL, NULL, '5', 'Pay', 2, 2, 270000, NULL, '2023-04-10 14:51:45', '2023-04-05 11:55:16'),
(19, 'OD185631', NULL, NULL, '5', 'Pay', 2, 2, 270000, NULL, '2023-03-15 10:17:00', '2023-04-05 11:56:31'),
(20, 'OD190203', NULL, NULL, '5', 'Pay', 2, 2, 270000, NULL, '2023-04-05 12:02:03', '2023-04-13 01:15:08'),
(21, 'OD190834', NULL, NULL, '4', 'Pay', 2, 2, 270000, NULL, '2023-04-05 12:08:34', '2023-04-13 01:29:40'),
(22, 'OD190855', NULL, NULL, '1', 'Pay', 2, 2, 270000, NULL, '2023-04-05 12:08:55', '2023-04-05 12:08:55'),
(23, 'OD191012', NULL, NULL, '1', 'Pay', 2, 2, 270000, NULL, '2023-04-05 12:10:12', '2023-04-05 12:10:12'),
(24, 'OD191135', NULL, NULL, '1', 'Pay', 2, 2, 270000, NULL, '2023-04-05 12:11:35', '2023-04-05 12:11:35'),
(25, 'OD191222', NULL, NULL, '1', 'Pay', 2, 2, 270000, NULL, '2023-04-05 12:12:22', '2023-04-05 12:12:22'),
(26, 'OD191327', NULL, NULL, '1', 'Pay', 2, 2, 270000, NULL, '2023-04-05 12:13:27', '2023-04-05 12:13:27'),
(27, 'OD191415', NULL, NULL, '1', 'Pay', 2, 2, 270000, NULL, '2023-04-05 12:14:15', '2023-04-05 12:14:15'),
(28, 'OD191549', NULL, NULL, '1', 'Pay', 2, 2, 270000, NULL, '2023-04-05 12:15:49', '2023-04-05 12:15:49'),
(29, 'OD191751', NULL, NULL, '1', 'Pay', 2, 2, 270000, NULL, '2023-04-05 12:17:51', '2023-04-05 12:17:51'),
(30, 'OD001646', NULL, NULL, '1', 'Pay', 2, 2, 261000, NULL, '2023-04-05 17:16:46', '2023-04-05 17:16:46'),
(31, 'OD171717', NULL, NULL, '1', 'Pay', 2, 3, 405000, NULL, '2023-04-07 10:17:17', '2023-04-07 10:17:17'),
(32, 'OD172258', 2, NULL, '1', 'COD', 2, 3, 405000, NULL, '2023-04-07 10:22:58', '2023-04-07 10:22:58'),
(33, 'OD210316', 2, NULL, '1', 'COD', 2, 2, 270000, NULL, '2023-04-07 14:03:16', '2023-04-07 14:03:16'),
(34, 'OD210525', 2, NULL, '1', 'COD', 2, 2, 270000, NULL, '2023-04-07 14:05:25', '2023-04-07 14:05:25'),
(35, 'OD071248', 16, NULL, '5', 'COD', 2, 2, 258000, NULL, '2023-04-11 00:12:48', '2023-04-12 17:03:55'),
(36, 'OD074818', 17, NULL, '1', 'COD', 2, 2, 259000, NULL, '2023-04-11 00:48:18', '2023-04-11 05:30:30'),
(37, 'OD074905', 17, NULL, '5', 'Pay', 2, 2, 259000, NULL, '2023-04-11 00:49:05', '2023-04-11 06:00:18'),
(38, 'OD075033', 17, NULL, '5', 'COD', 2, 2, 268000, NULL, '2023-04-11 00:50:33', '2023-04-11 05:51:06'),
(39, 'OD161220', 16, NULL, '5', 'COD', 2, 2, 252000, NULL, '2023-04-12 09:12:20', '2023-04-13 00:44:26'),
(40, 'OD165404', 16, NULL, '2', 'COD', 1, 2, 251000, NULL, '2023-04-12 09:54:04', '2023-04-13 00:46:43'),
(41, 'OD074242', 16, NULL, '1', 'COD', 2, 2, 259000, NULL, '2023-04-13 00:42:42', '2023-04-13 00:42:42'),
(42, 'OD153247', 16, NULL, '1', 'COD', 2, 22, 2940000, NULL, '2023-04-13 08:32:47', '2023-04-13 08:32:47'),
(43, 'OD153652', 16, NULL, '1', 'COD', 2, 4, 510000, NULL, '2023-04-13 08:36:52', '2023-04-13 08:36:52'),
(44, 'OD221957', 16, NULL, '1', 'COD', 2, 1, 135000, NULL, '2023-04-13 15:19:57', '2023-04-13 15:19:57'),
(45, 'OD224335', 16, NULL, '1', 'COD', 2, 2, 268000, NULL, '2023-04-13 15:43:35', '2023-04-13 15:43:35'),
(46, 'OD224522', 16, NULL, '1', 'COD', 2, 2, 270000, NULL, '2023-04-13 15:45:22', '2023-04-13 15:45:22'),
(47, 'OD232019', 16, NULL, '1', 'COD', 2, 1, 115000, NULL, '2023-04-13 16:20:19', '2023-04-13 16:20:19'),
(48, 'OD232557', 16, NULL, '1', 'COD', 2, 1, 115000, NULL, '2023-04-13 16:25:57', '2023-04-13 16:25:57'),
(49, 'OD232805', 16, 1, '1', 'COD', 2, 1, 115000, NULL, '2023-04-13 16:28:05', '2023-04-13 16:28:05'),
(50, 'OD233155', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:31:55', '2023-04-13 16:31:55'),
(51, 'OD233419', 16, NULL, '1', 'COD', 2, 1, 115000, NULL, '2023-04-13 16:34:19', '2023-04-13 16:34:19'),
(52, 'OD234207', 16, NULL, '1', 'COD', 2, 1, 115000, NULL, '2023-04-13 16:42:07', '2023-04-13 16:42:07'),
(53, 'OD234240', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:42:40', '2023-04-13 16:42:40'),
(54, 'OD234311', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:43:11', '2023-04-13 16:43:11'),
(55, 'OD234407', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:44:07', '2023-04-13 16:44:07'),
(56, 'OD234541', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:45:41', '2023-04-13 16:45:41'),
(57, 'OD234807', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:48:07', '2023-04-13 16:48:07'),
(58, 'OD235109', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:51:09', '2023-04-13 16:51:09'),
(59, 'OD235145', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:51:45', '2023-04-13 16:51:45'),
(60, 'OD235210', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:52:10', '2023-04-13 16:52:10'),
(61, 'OD235224', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:52:24', '2023-04-13 16:52:24'),
(62, 'OD235602', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:56:02', '2023-04-13 16:56:02'),
(63, 'OD235622', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:56:22', '2023-04-13 16:56:22'),
(64, 'OD235651', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:56:51', '2023-04-13 16:56:51'),
(65, 'OD235801', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:58:01', '2023-04-13 16:58:01'),
(66, 'OD235910', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:59:10', '2023-04-13 16:59:10'),
(67, 'OD235933', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 16:59:33', '2023-04-13 16:59:33'),
(68, 'OD000105', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 17:01:05', '2023-04-13 17:01:05'),
(69, 'OD000538', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 17:05:38', '2023-04-13 17:05:38'),
(70, 'OD000903', 16, 1, '1', 'COD', 2, 1, 105000, NULL, '2023-04-13 17:09:03', '2023-04-13 17:09:03'),
(71, 'OD000944', 16, 1, '1', 'COD', 2, 1, 15000, NULL, '2023-04-13 17:09:44', '2023-04-13 17:09:44'),
(72, 'OD002019', NULL, NULL, '1', 'COD', 2, 1, 115000, NULL, '2023-04-13 17:20:19', '2023-04-13 17:20:19'),
(73, 'OD002739', NULL, NULL, '1', 'COD', 2, 3, 365000, NULL, '2023-04-13 17:27:39', '2023-04-13 17:27:39');

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

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_code`, `price`, `price_sale`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(7, 9, '1522840', 165000, 135000, 3, 405000, '2023-03-16 10:17:00', '2023-04-05 10:17:00'),
(8, 9, '1767589', 165000, 135000, 4, 540000, '2023-03-22 10:17:00', '2023-04-05 10:17:00'),
(9, 10, '5268857', 165000, 135000, 1, 135000, '2023-03-23 10:28:37', '2023-04-05 10:28:37'),
(10, 10, '4802947', 165000, 126000, 1, 126000, '2023-04-05 10:28:37', '2023-04-05 10:28:37'),
(11, 11, '1522840', 165000, 135000, 1, 135000, '2023-04-05 11:11:09', '2023-04-05 11:11:09'),
(12, 11, '1767589', 165000, 135000, 4, 540000, '2023-04-05 11:11:09', '2023-04-05 11:11:09'),
(13, 12, '1522840', 165000, 135000, 1, 135000, '2023-04-05 11:11:40', '2023-04-05 11:11:40'),
(14, 12, '1767589', 165000, 135000, 4, 540000, '2023-04-05 11:11:40', '2023-04-05 11:11:40'),
(15, 13, '1522840', 165000, 135000, 1, 135000, '2023-04-05 11:21:44', '2023-04-05 11:21:44'),
(16, 13, '1767589', 165000, 135000, 4, 540000, '2023-04-05 11:21:44', '2023-04-05 11:21:44'),
(17, 14, '1522840', 165000, 135000, 1, 135000, '2023-04-05 11:45:30', '2023-04-05 11:45:30'),
(18, 14, '1767589', 165000, 135000, 4, 540000, '2023-04-05 11:45:30', '2023-04-05 11:45:30'),
(19, 15, '1522840', 165000, 135000, 1, 135000, '2023-04-05 11:46:46', '2023-04-05 11:46:46'),
(20, 15, '1767589', 165000, 135000, 1, 135000, '2023-04-05 11:46:46', '2023-04-05 11:46:46'),
(21, 16, '1522840', 165000, 135000, 1, 135000, '2023-04-05 11:50:39', '2023-04-05 11:50:39'),
(22, 16, '1767589', 165000, 135000, 1, 135000, '2023-04-05 11:50:39', '2023-04-05 11:50:39'),
(23, 17, '1522840', 165000, 135000, 1, 135000, '2023-04-05 11:51:09', '2023-04-05 11:51:09'),
(24, 17, '1767589', 165000, 135000, 1, 135000, '2023-04-05 11:51:09', '2023-04-05 11:51:09'),
(25, 18, '1522840', 165000, 135000, 1, 135000, '2023-04-05 11:55:16', '2023-04-05 11:55:16'),
(26, 18, '1767589', 165000, 135000, 1, 135000, '2023-03-22 11:55:16', '2023-04-05 11:55:16'),
(27, 19, '1522840', 165000, 135000, 1, 135000, '2023-04-05 11:56:31', '2023-04-05 11:56:31'),
(28, 19, '1767589', 165000, 135000, 1, 135000, '2023-04-05 11:56:31', '2023-04-05 11:56:31'),
(29, 20, '1522840', 165000, 135000, 1, 135000, '2023-04-05 12:02:03', '2023-04-05 12:02:03'),
(30, 20, '1767589', 165000, 135000, 1, 135000, '2023-04-05 12:02:03', '2023-04-05 12:02:03'),
(31, 21, '1522840', 165000, 135000, 1, 135000, '2023-04-05 12:08:34', '2023-04-05 12:08:34'),
(32, 21, '1767589', 165000, 135000, 1, 135000, '2023-04-05 12:08:34', '2023-04-05 12:08:34'),
(33, 22, '1522840', 165000, 135000, 1, 135000, '2023-04-05 12:08:55', '2023-04-05 12:08:55'),
(34, 22, '1767589', 165000, 135000, 1, 135000, '2023-04-05 12:08:55', '2023-04-05 12:08:55'),
(35, 23, '1522840', 165000, 135000, 1, 135000, '2023-04-05 12:10:12', '2023-04-05 12:10:12'),
(36, 23, '1767589', 165000, 135000, 1, 135000, '2023-04-05 12:10:12', '2023-04-05 12:10:12'),
(37, 24, '1522840', 165000, 135000, 1, 135000, '2023-04-05 12:11:35', '2023-04-05 12:11:35'),
(38, 24, '1767589', 165000, 135000, 1, 135000, '2023-04-05 12:11:35', '2023-04-05 12:11:35'),
(39, 25, '1522840', 165000, 135000, 1, 135000, '2023-04-05 12:12:22', '2023-04-05 12:12:22'),
(40, 25, '1767589', 165000, 135000, 1, 135000, '2023-04-05 12:12:22', '2023-04-05 12:12:22'),
(41, 26, '1522840', 165000, 135000, 1, 135000, '2023-04-05 12:13:27', '2023-04-05 12:13:27'),
(42, 26, '1767589', 165000, 135000, 1, 135000, '2023-04-05 12:13:27', '2023-04-05 12:13:27'),
(43, 27, '1522840', 165000, 135000, 1, 135000, '2023-04-05 12:14:15', '2023-04-05 12:14:15'),
(44, 27, '1767589', 165000, 135000, 1, 135000, '2023-04-05 12:14:15', '2023-04-05 12:14:15'),
(45, 28, '1522840', 165000, 135000, 1, 135000, '2023-04-05 12:15:49', '2023-04-05 12:15:49'),
(46, 28, '1767589', 165000, 135000, 1, 135000, '2023-04-05 12:15:49', '2023-04-05 12:15:49'),
(47, 29, '1522840', 165000, 135000, 1, 135000, '2023-04-05 12:17:51', '2023-04-05 12:17:51'),
(48, 29, '1767589', 165000, 135000, 1, 135000, '2023-04-05 12:17:51', '2023-04-05 12:17:51'),
(49, 30, '5268857', 165000, 135000, 1, 135000, '2023-04-05 17:16:46', '2023-04-05 17:16:46'),
(50, 30, '4802947', 165000, 126000, 1, 126000, '2023-04-05 17:16:46', '2023-04-05 17:16:46'),
(51, 31, '5489022', 165000, 135000, 2, 270000, '2023-04-07 10:17:17', '2023-04-07 10:17:17'),
(52, 31, '1251967', 165000, 135000, 1, 135000, '2023-04-07 10:17:17', '2023-04-07 10:17:17'),
(53, 32, '5489022', 165000, 135000, 2, 270000, '2023-04-07 10:22:58', '2023-04-07 10:22:58'),
(54, 32, '1251967', 165000, 135000, 1, 135000, '2023-04-07 10:22:58', '2023-04-07 10:22:58'),
(55, 33, '1251967', 165000, 135000, 2, 270000, '2023-04-07 14:03:16', '2023-04-07 14:03:16'),
(56, 34, '1251967', 165000, 135000, 2, 270000, '2023-04-07 14:05:25', '2023-04-07 14:05:25'),
(57, 35, '5399766', 165000, 133000, 1, 133000, '2023-04-11 00:12:48', '2023-04-11 00:12:48'),
(58, 35, '5676053', 165000, 125000, 1, 125000, '2023-04-11 00:12:48', '2023-04-11 00:12:48'),
(59, 36, '4802947', 165000, 126000, 1, 126000, '2023-04-11 00:48:18', '2023-04-11 00:48:18'),
(60, 36, '5399766', 165000, 133000, 1, 133000, '2023-04-11 00:48:18', '2023-04-11 00:48:18'),
(61, 37, '4802947', 165000, 126000, 1, 126000, '2023-04-11 00:49:05', '2023-04-11 00:49:05'),
(62, 37, '5399766', 165000, 133000, 1, 133000, '2023-04-11 00:49:05', '2023-04-11 00:49:05'),
(63, 38, '5399766', 165000, 133000, 1, 133000, '2023-04-11 00:50:33', '2023-04-11 00:50:33'),
(64, 38, '8219213', 165000, 135000, 1, 135000, '2023-04-11 00:50:33', '2023-04-11 00:50:33'),
(65, 39, '4802947', 165000, 126000, 2, 252000, '2023-04-12 09:12:20', '2023-04-12 09:12:20'),
(66, 40, '5676053', 165000, 125000, 1, 125000, '2023-04-12 09:54:04', '2023-04-12 09:54:04'),
(67, 40, '4802947', 165000, 126000, 1, 126000, '2023-04-12 09:54:04', '2023-04-12 09:54:04'),
(68, 41, '5399766', 165000, 133000, 1, 133000, '2023-04-13 00:42:42', '2023-04-13 00:42:42'),
(69, 41, '4802947', 165000, 126000, 1, 126000, '2023-04-13 00:42:42', '2023-04-13 00:42:42'),
(70, 42, '8219213', 165000, 135000, 20, 2700000, '2023-04-13 08:32:47', '2023-04-13 08:32:47'),
(71, 42, '5676053', 165000, 125000, 1, 125000, '2023-04-13 08:32:47', '2023-04-13 08:32:47'),
(72, 42, '5859241', 165000, 115000, 1, 115000, '2023-04-13 08:32:47', '2023-04-13 08:32:47'),
(73, 43, '5859241', 165000, 115000, 1, 115000, '2023-04-13 08:36:52', '2023-04-13 08:36:52'),
(74, 43, '5268857', 165000, 135000, 1, 135000, '2023-04-13 08:36:52', '2023-04-13 08:36:52'),
(75, 43, '5676053', 165000, 125000, 1, 125000, '2023-04-13 08:36:52', '2023-04-13 08:36:52'),
(76, 43, '5489022', 165000, 135000, 1, 135000, '2023-04-13 08:36:52', '2023-04-13 08:36:52'),
(77, 44, '5268857', 165000, 135000, 1, 135000, '2023-04-13 15:19:57', '2023-04-13 15:19:57'),
(78, 45, '5268857', 165000, 135000, 1, 135000, '2023-04-13 15:43:35', '2023-04-13 15:43:35'),
(79, 45, '5399766', 165000, 133000, 1, 133000, '2023-04-13 15:43:35', '2023-04-13 15:43:35'),
(80, 46, '5489022', 165000, 135000, 1, 135000, '2023-04-13 15:45:22', '2023-04-13 15:45:22'),
(81, 46, '5268857', 165000, 135000, 1, 135000, '2023-04-13 15:45:22', '2023-04-13 15:45:22'),
(82, 47, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:20:19', '2023-04-13 16:20:19'),
(83, 48, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:25:57', '2023-04-13 16:25:57'),
(84, 49, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:28:05', '2023-04-13 16:28:05'),
(85, 50, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:31:55', '2023-04-13 16:31:55'),
(86, 51, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:34:19', '2023-04-13 16:34:19'),
(87, 52, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:42:07', '2023-04-13 16:42:07'),
(88, 53, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:42:40', '2023-04-13 16:42:40'),
(89, 54, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:43:11', '2023-04-13 16:43:11'),
(90, 55, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:44:07', '2023-04-13 16:44:07'),
(91, 56, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:45:41', '2023-04-13 16:45:41'),
(92, 57, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:48:07', '2023-04-13 16:48:07'),
(93, 58, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:51:09', '2023-04-13 16:51:09'),
(94, 59, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:51:45', '2023-04-13 16:51:45'),
(95, 60, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:52:10', '2023-04-13 16:52:10'),
(96, 61, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:52:24', '2023-04-13 16:52:24'),
(97, 62, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:56:02', '2023-04-13 16:56:02'),
(98, 63, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:56:22', '2023-04-13 16:56:22'),
(99, 64, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:56:51', '2023-04-13 16:56:51'),
(100, 67, '5859241', 165000, 115000, 1, 115000, '2023-04-13 16:59:33', '2023-04-13 16:59:33'),
(101, 68, '5859241', 165000, 115000, 1, 115000, '2023-04-13 17:01:05', '2023-04-13 17:01:05'),
(102, 69, '5859241', 165000, 115000, 1, 115000, '2023-04-13 17:05:38', '2023-04-13 17:05:38'),
(103, 70, '5859241', 165000, 115000, 1, 115000, '2023-04-13 17:09:03', '2023-04-13 17:09:03'),
(104, 71, '5859241', 165000, 115000, 1, 115000, '2023-04-13 17:09:44', '2023-04-13 17:09:44'),
(105, 72, '5859241', 165000, 115000, 1, 115000, '2023-04-13 17:20:19', '2023-04-13 17:20:19'),
(106, 73, '5676053', 165000, 125000, 2, 250000, '2023-04-13 17:27:39', '2023-04-13 17:27:39'),
(107, 73, '5859241', 165000, 115000, 1, 115000, '2023-04-13 17:27:39', '2023-04-13 17:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_notes`
--

CREATE TABLE `order_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `note_takers` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_notes`
--

INSERT INTO `order_notes` (`id`, `order_id`, `note_takers`, `content`, `created_at`, `updated_at`) VALUES
(2, 9, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 10:17:00', '2023-04-05 10:17:00'),
(3, 10, 'Tuấn Phạm (khách hàng)', 'a', '2023-04-05 10:28:37', '2023-04-05 10:28:37'),
(4, 11, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 11:11:09', '2023-04-05 11:11:09'),
(5, 12, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 11:11:40', '2023-04-05 11:11:40'),
(6, 13, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 11:21:44', '2023-04-05 11:21:44'),
(7, 14, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 11:45:30', '2023-04-05 11:45:30'),
(8, 15, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 11:46:46', '2023-04-05 11:46:46'),
(9, 16, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 11:50:39', '2023-04-05 11:50:39'),
(10, 17, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 11:51:09', '2023-04-05 11:51:09'),
(11, 18, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 11:55:16', '2023-04-05 11:55:16'),
(12, 19, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 11:56:31', '2023-04-05 11:56:31'),
(13, 20, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 12:02:03', '2023-04-05 12:02:03'),
(14, 21, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 12:08:34', '2023-04-05 12:08:34'),
(15, 22, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 12:08:55', '2023-04-05 12:08:55'),
(16, 23, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 12:10:12', '2023-04-05 12:10:12'),
(17, 24, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 12:11:35', '2023-04-05 12:11:35'),
(18, 25, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 12:12:22', '2023-04-05 12:12:22'),
(19, 26, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 12:13:27', '2023-04-05 12:13:27'),
(20, 27, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 12:14:15', '2023-04-05 12:14:15'),
(21, 28, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 12:15:49', '2023-04-05 12:15:49'),
(22, 29, 'Phạm Anh Tuấn (khách hàng)', 'Giao hàng giờ hành chính', '2023-04-05 12:17:51', '2023-04-05 12:17:51'),
(23, 30, 'Tuấn Phạm (khách hàng)', 'á', '2023-04-05 17:16:46', '2023-04-05 17:16:46'),
(24, 31, 'Customer (khách hàng)', 'adasdas', '2023-04-07 10:17:17', '2023-04-07 10:17:17'),
(25, 32, 'Customer (khách hàng)', 'ádasdsa', '2023-04-07 10:22:58', '2023-04-07 10:22:58'),
(26, 41, 'Tuấn Phạm (khách hàng)', 'giao hàng giờ hành chính', '2023-04-13 00:42:42', '2023-04-13 00:42:42');

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
(1, 'Chưa xác nhận', 'chua-xac-nhan', '2023-04-03 05:11:59', '2023-04-03 05:11:59'),
(2, 'Đã xác nhận', 'da-xac-nhan', '2023-04-03 05:11:59', '2023-04-03 05:11:59'),
(3, 'Đang vận chuyển', 'da-van-chuyen', '2023-04-03 05:11:59', '2023-04-03 05:11:59'),
(4, 'Thành công', 'thanh-cong', '2023-04-03 05:11:59', '2023-04-03 05:11:59'),
(5, 'Hủy hàng', 'huy-hang', '2023-04-03 05:11:59', '2023-04-03 05:11:59');

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
(1, 'Đã thanh toán', '2023-04-03 05:11:59', '2023-04-03 05:11:59'),
(2, 'Chưa thanh toán', '2023-04-03 05:11:59', '2023-04-03 05:11:59');

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
(1, 'Administration', NULL, '2023-04-03 05:11:59', '2023-04-03 05:11:59'),
(2, 'Member', NULL, '2023-04-03 05:11:59', '2023-04-03 05:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_code` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `introduction` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `image_public_id` text DEFAULT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `product_code`, `title`, `introduction`, `slug`, `content`, `image_url`, `image_public_id`, `view`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'TOP 15 NHỮNG CUỐN SÁCH HAY NÊN ĐỌC ÍT NHẤT 1 LẦN TRONG ĐỜI', 'Đọc sách là một trong những cách giúp bạn học thêm nhiều thứ về cuộc sống, những trải nghiệm mà có thể bạn chưa từng có. Đây cũng là thói quen tìm thấy ở rất nhiều người thành công. Sau đây Hải Triều sẽ review TOP những cuốn sách hay nên đọc nhất mọi thời đại.', 'top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi', '<h2><strong>TOP 15 NHỮNG CUỐN S&Aacute;CH HAY N&Ecirc;N ĐỌC</strong></h2>\r\n\r\n<p>Đọc s&aacute;ch mang lại rất nhiều điều t&iacute;ch cực cho ch&uacute;ng ta. Những lợi &iacute;ch c&oacute; thể kể đến như: gi&uacute;p bản th&acirc;n trở n&ecirc;n tốt hơn, k&iacute;ch th&iacute;ch n&atilde;o bộ hoạt động, giảm stress, gi&uacute;p bạn tự học mọi thứ,&hellip; Dưới đ&acirc;y l&agrave; những cuốn s&aacute;ch hay n&ecirc;n đọc d&agrave;nh cho người đang r&egrave;n luyện th&oacute;i quen đọc s&aacute;ch.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/kinh-nghiem/top-12-chai-thuoc-nho-mat-tot-cho-nguoi-can-thi-nen-dung.html\" target=\"_blank\"><img alt=\"TOP 12 chai thuốc nhỏ mắt tốt cho người cận thị nên dùng\" src=\"https://donghohaitrieu.com/wp-content/uploads/2017/03/button-k8.gif\" style=\"height:30px; width:100px\" /></a></p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/kinh-nghiem/top-12-chai-thuoc-nho-mat-tot-cho-nguoi-can-thi-nen-dung.html\" target=\"_blank\"><strong>TOP 12 chai thuốc nhỏ mắt tốt cho người cận thị n&ecirc;n d&ugrave;ng</strong></a></p>\r\n\r\n<p>︽ ︽ ︽ ︽ ︽ ︽ ︽ ︽ ︽ ︽</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. NH&Agrave; GIẢ KIM</strong></h3>\r\n\r\n<p>Nh&agrave; Giả Kim l&agrave; một trong những cuốn s&aacute;ch hay n&ecirc;n đọc nhất của t&aacute;c giả Paulo Coelho. Kh&ocirc;ng c&oacute; g&igrave; ngạc nhi&ecirc;n khi đ&acirc;y l&agrave; một trong những cuốn s&aacute;ch b&aacute;n chạy nhất tại c&aacute;c&nbsp;<a href=\"https://donghohaitrieu.com/kinh-nghiem/15-nha-sach-hieu-sach-noi-tieng-va-dong-khach-nhat-hien-nay.html\" target=\"_blank\">nh&agrave; s&aacute;ch</a>.</p>\r\n\r\n<p>Nội dung cuốn s&aacute;ch n&oacute;i về cậu b&eacute; chăn cười hay mơ mộng về những cuộc phi&ecirc;u lưu. Cậu đ&atilde; v&ocirc; t&igrave;nh gặp một thầy b&oacute;i c&oacute; khả năng đặc biệt v&agrave; từ đ&oacute; cuộc h&agrave;nh tr&igrave;nh của cậu bắt đầu được hiện thực h&oacute;a.</p>\r\n\r\n<p>Cậu b&eacute; chăn cừu ng&agrave;y n&agrave;o đ&atilde; từ bỏ những thứ quen thuộc, bắt đầu h&agrave;nh động cho những g&igrave; cậu muốn về một tương lai kh&oacute; đo&aacute;n trước. Chuyện bắt đầu bằng việc cậu bị lừa sạch to&agrave;n bộ t&agrave;i sản ch&iacute;nh l&agrave; đ&agrave;n cừu của m&igrave;nh.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 1\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/1-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:576px; width:770px\" /></em></p>\r\n\r\n<p><em>Những cuốn s&aacute;ch hay nhất n&ecirc;n đọc &ndash; Nh&agrave; giả kim</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cậu lang thang tới một thị trấn xa x&ocirc;i, l&agrave;m c&ocirc;ng cho một cửa h&agrave;ng nhỏ trong 1 năm m&agrave; chỉ đủ sống qua ng&agrave;y.&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/10-website-lay-hinh-anh-dong-ho-dep-nhat-tren-the-gioi-va-vn.html\" target=\"_blank\">H&igrave;nh ảnh</a>&nbsp;quen thuộc từng chừng đơn giản nhưng rất nhiều bạn trẻ đang mắc kẹt trong đ&oacute;, ra trường đi l&agrave;m lương 3 cọc 3 đồng kh&ocirc;ng c&oacute; dư.</p>\r\n\r\n<p>V&agrave; rồi cậu gặp nh&agrave; giả kim, người đ&atilde; gi&uacute;p cậu t&igrave;m ra kho b&aacute;u của đời m&igrave;nh. Vị thần th&aacute;nh n&agrave;y c&oacute; khả năng dự đo&aacute;n được tương lai của cậu v&agrave; rồi mọi chuyện diễn ra theo như &ocirc;ng ti&ecirc;n đo&aacute;n. Nhưng phải trải qua những đắng cay th&igrave; quả ngọt mới c&oacute; được. Cậu b&eacute; chăn cừu cuối c&ugrave;ng cũng t&igrave;m được kho b&aacute;u th&ocirc;ng qua một t&ecirc;n cướp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. ĐỜI THAY ĐỔI KHI CH&Uacute;NG TA THAY ĐỔI</strong></h3>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/kinh-nghiem/review-sach-hay\" target=\"_blank\">Review những cuốn s&aacute;ch hay n&ecirc;n đọc</a>&nbsp;trong đời tiếp theo l&agrave; Đời thay đổi khi ch&uacute;ng ta thay đổi. T&aacute;c giả Andrew Matthews đ&atilde; gửi ngắm những th&ocirc;ng điệp cho mọi người th&ocirc;ng qua cuốn s&aacute;ch n&agrave;y. Một x&atilde; hội ng&agrave;y c&agrave;ng ph&aacute;t triển k&eacute;o theo nhiều hệ lụy m&agrave; nếu ch&uacute;ng ta kh&ocirc;ng nhận thức được v&agrave; thay đổi sẽ bị loại bỏ v&agrave; đ&agrave;o thải.</p>\r\n\r\n<p>Cuốn s&aacute;ch đưa ra những v&iacute; dụ trong cuộc sống m&agrave; bạn phải đối mặt v&agrave; c&aacute;ch bạn giải quyết ch&uacute;ng như thế n&agrave;o. Đ&acirc;y cũng l&agrave; phương ph&aacute;p gi&uacute;p bạn t&igrave;m ra năng lực tiềm ẩn của bản th&acirc;n, hiểu ch&iacute;nh hơn hơn. Bạn sẽ được thư gi&atilde;n v&agrave; chi&ecirc;m nghiệm mọi thứ khi đọc cuốn s&aacute;ch n&agrave;y.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 2\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/2-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:513px; width:770px\" /></em></p>\r\n\r\n<p><em>Những cuốn s&aacute;ch hay n&ecirc;n đọc để th&agrave;nh c&ocirc;ng &ndash; Đời thay đổi khi ch&uacute;ng ta thay đổi</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cuộc đời của mỗi người sẽ lu&ocirc;n trải qua những giai đoạn thăng trầm, đ&ocirc;i l&uacute;c bạn sẽ bu&ocirc;ng bỏ tất cả v&igrave; mất niềm tin, &yacute; ch&iacute;. Nhưng bạn phải thật s&aacute;ng suốt v&agrave; tỉnh t&aacute;o để nhận ra những b&agrave;i học cuộc đời mang lại.</p>\r\n\r\n<p>Bởi ngo&agrave;i kia c&ograve;n rất nhiều người trải qua những chuyện đ&aacute;ng sợ hơn ch&uacute;ng ta. C&aacute;ch bạn thay đổi mọi thứ chỉ đơn giản l&agrave; thay đổi bản th&acirc;n, tư duy để ph&ugrave; hợp với cuộc sống n&agrave;y. Đ&oacute; cũng l&agrave; những gi&aacute; trị, b&agrave;i học m&agrave; t&aacute;c giả gửi gắm v&agrave;o trong cuốn s&aacute;ch.</p>\r\n\r\n<h3><strong>3. ĐẮC NH&Acirc;N T&Acirc;M</strong></h3>\r\n\r\n<p>Đắc Nh&acirc;n T&acirc;m l&agrave; một trong những cuốn s&aacute;ch hay n&ecirc;n đọc cho học sinh v&agrave; cả người trưởng th&agrave;nh. Được t&aacute;c giả Dale Carnegie ra mắt năm 1937, trải qua nhiều năm đ&acirc;y vẫn l&agrave; cuốn s&aacute;ch đ&aacute;ng đọc bởi những gi&aacute; trị m&agrave; n&oacute; mang lại.</p>\r\n\r\n<p>T&aacute;c giả l&agrave; một chuy&ecirc;n gia t&acirc;m l&yacute;, ch&iacute;nh trị, nh&agrave; ngoại giao v&agrave; l&agrave; giảng vi&ecirc;n người Mỹ nổi tiếng. &Ocirc;ng thường chia sẻ những&nbsp;<a href=\"https://donghohaitrieu.com/kinh-nghiem\" target=\"_blank\">kinh nghiệm</a>, b&iacute; quyết th&agrave;nh c&ocirc;ng cho mọi người th&ocirc;ng qua c&aacute;c cuốn s&aacute;ch với nhiều chủ đề kh&aacute;c nhau.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 3\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/3-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:464px; width:770px\" /></em></p>\r\n\r\n<p><em>Đắc nh&acirc;n t&acirc;m l&agrave; một trong những cuốn s&aacute;ch hay n&ecirc;n đọc một lần trong đời về c&aacute;ch đối nh&acirc;n xử thế</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đắc nh&acirc;n t&acirc;m được chia th&agrave;nh 4 phần với mỗi phần tương ứng với một b&agrave;i học v&agrave; b&iacute; quyết kh&aacute;c nhau.</p>\r\n\r\n<p>◆ Phần 1 về c&aacute;ch đối nh&acirc;n xử thế của mọi người, những nghệ thuật ứng xử t&acirc;m đắt nhất được g&oacute;i gọn trong những mẩu truyện ngắn.</p>\r\n\r\n<p>◆ Phần 2 l&agrave; những nghệ thuật, mẹo gi&uacute;p bạn lấy được thiện cảm với người đối diện.</p>\r\n\r\n<p>◆ Phần 3 l&agrave; phần quan trọng nhất gi&uacute;p bạn c&oacute; được những suy nghĩ chung với mọi người trong cuộc sống.</p>\r\n\r\n<p>◆ Phần 4 l&agrave; c&aacute;ch để bạn c&oacute; thể chuyển h&oacute;a mọi hận th&ugrave;, ti&ecirc;u cực của một người sang t&iacute;ch cực. Một việc rất kh&oacute; được đưa ra lời khuy&ecirc;n từ một nh&agrave; t&acirc;m l&yacute; học.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. C&Aacute;CH NGHĨ ĐỂ TH&Agrave;NH C&Ocirc;NG</strong></h3>\r\n\r\n<p>Những cuốn s&aacute;ch n&ecirc;n đọc khi c&ograve;n trẻ n&ecirc;n l&agrave; những cuốn s&aacute;ch về tư duy t&iacute;ch cực. C&aacute;ch nghĩ để th&agrave;nh c&ocirc;ng l&agrave; một trong những cuốn s&aacute;ch như vậy. Cuốn s&aacute;ch lu&ocirc;n nằm trong TOP những cuốn s&aacute;ch b&aacute;n chạy nhất mọi thời đại.</p>\r\n\r\n<p>T&aacute;c phẩm của Napoleon Hill được v&iacute; von l&agrave; &ldquo;người tạo ra những nh&agrave; triệu ph&uacute;&rdquo; tr&ecirc;n tr&aacute;i đất. Một cuốn s&aacute;ch kh&aacute; th&agrave;nh c&ocirc;ng gi&uacute;p cho mọi người c&oacute; một suy nghĩ, g&oacute;c nh&igrave;n đ&uacute;ng đắn.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; c&acirc;u chuyện của con trai t&aacute;c giả, đứa b&eacute; sinh ra kh&ocirc;ng c&oacute; đ&ocirc;i tai. Người bố khi ấy đ&atilde; gieo cho cậu một niềm tin m&atilde;nh liệt. Tuổi đi học của cậu b&eacute; thay v&igrave; học trong trường khiếm thị th&igrave; &ocirc;ng bố đ&atilde; mang con m&igrave;nh đến ng&ocirc;i trường b&igrave;nh thường để học tập.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 4\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/4-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:513px; width:770px\" /></em></p>\r\n\r\n<p><em>Những cuốn s&aacute;ch hay nhất mọi thời đại n&ecirc;n đọc &ndash; C&aacute;ch nghĩ để th&agrave;nh c&ocirc;ng</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tất nhi&ecirc;n sẽ c&oacute; rất nhiều đ&agrave;m ph&aacute;n, những lời ch&ecirc; bai từ bạn b&egrave; đồng trang lứa. Nhưng ch&iacute;nh v&igrave; những nghịch cảnh n&agrave;y sẽ sinh ra những lợi &iacute;ch kh&ocirc;ng dễ g&igrave; c&oacute; được. Cậu sẽ được c&ocirc; gi&aacute;o quan t&acirc;m nhiều hơn.</p>\r\n\r\n<p>Th&ocirc;ng qua những c&acirc;u chuyện nhỏ, t&aacute;c giả đ&atilde; kh&eacute;o l&eacute;o mang đến những phương ph&aacute;p đơn giản, tư duy t&iacute;ch cực v&agrave; s&aacute;ng tạo trong cuộc sống. Từ những c&ocirc;ng thức đ&oacute;, bạn sẽ dễ d&agrave;ng giải quyết v&agrave; &aacute;p dụng cả v&agrave;o trong kinh doanh, l&agrave;m gi&agrave;u.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>5. HẠT GIỐNG T&Acirc;M HỒN</strong></h3>\r\n\r\n<p>Những cuốn s&aacute;ch n&ecirc;n đọc ở tuổi 17, Hạt giống t&acirc;m hồn l&agrave; cuốn s&aacute;ch c&oacute; vị thế quan trọng trong l&agrave;ng văn học thế giới. Như đ&uacute;ng t&ecirc;n gọi của m&igrave;nh, Hạt giống t&acirc;m hồn gi&uacute;p nu&ocirc;i dưỡng t&acirc;m hồn người đọc.</p>\r\n\r\n<p>Bạn sẽ thấy m&igrave;nh trong những c&acirc;u chuyện nhỏ, nhẹ nh&agrave;ng v&agrave; giản dị nhưng chứa đựng những triết l&yacute; sống s&acirc;u sắc. Từng chương s&aacute;ch l&agrave; một kh&iacute;a cạnh, trải nghiệm mới về cuộc sống. Từ đ&oacute; gi&uacute;p bạn khai ph&aacute; những c&acirc;u hỏi về cuộc sống n&agrave;y.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 5\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/5-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:448px; width:770px\" /></em></p>\r\n\r\n<p><em>Hạt giống t&acirc;m hồn &ndash; Những cuốn s&aacute;ch hay giới trẻ n&ecirc;n đọc</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chắc hẳn nhiều người từng c&oacute; những c&acirc;u hỏi như &ldquo;t&ocirc;i l&agrave; ai, t&ocirc;i sống tr&ecirc;n đời với mục đ&iacute;ch g&igrave;?&rdquo;. Hạt giống t&acirc;m hồn sẽ gi&uacute;p bạn hiểu hơn về những g&igrave; bạn cần phải l&agrave;m, c&aacute;ch bạn lựa chọn cuộc sống của m&igrave;nh thay v&igrave; sống lặng lẽ, chậm r&atilde;i nh&igrave;n người kh&aacute;c.</p>\r\n\r\n<p>Bạn sẽ t&igrave;m thấy ch&iacute;nh m&igrave;nh, những điều bạn từng l&atilde;ng qu&ecirc;n. Từ đ&oacute; bạn r&uacute;t ra những b&agrave;i học qu&yacute; gi&aacute; v&agrave; đương đầu với cuộc sống muốn m&agrave;u n&agrave;y. Sống mạnh mẽ v&agrave; khao kh&aacute;t thực hiện ước mơ cuộc đời của ch&iacute;nh m&igrave;nh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/kinh-nghiem/top-25-quan-ca-phe-mua-mang-ve-gan-day-nhat-ngon-bo-re.html\" target=\"_blank\"><img alt=\"TOP 25 quán cà phê mua mang về gần đây nhất ngon-bổ-rẻ\" src=\"https://donghohaitrieu.com/wp-content/uploads/2018/08/button-10-18-8-2018.gif\" style=\"height:67px; width:270px\" /></a></p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/kinh-nghiem/top-25-quan-ca-phe-mua-mang-ve-gan-day-nhat-ngon-bo-re.html\" target=\"_blank\"><strong>TOP 25 qu&aacute;n c&agrave; ph&ecirc; mua mang về gần đ&acirc;y nhất ngon-bổ-rẻ</strong></a></p>\r\n\r\n<p>★ ★ ★ ★ ★ ★ ★ ★ ★ ★ ★ ★&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>6. QUẲNG G&Aacute;NH LO ĐI V&Agrave; VUI SỐNG</strong></h3>\r\n\r\n<p>Những cuốn s&aacute;ch n&ecirc;n đọc để th&agrave;nh c&ocirc;ng c&oacute; thể kể đến như Quẳng g&aacute;nh lo đi v&agrave; vui sống. T&aacute;c phẩm của t&aacute;c giả Dale Carnegie gi&uacute;p bạn ph&aacute;t triển kỹ năng của bản th&acirc;n th&ocirc;ng qua những c&acirc;u chuyện thực tế.</p>\r\n\r\n<p>Cuộc sống chưa bao giờ l&agrave; dễ d&agrave;ng, lu&ocirc;n c&oacute; những thử th&aacute;ch, nguy hiểm r&igrave;nh rập mỗi khi bạn tiến về ph&iacute;a trước. Những nỗi lo về cuộc sống, cơm &aacute;o gạo tiền, c&ocirc;ng việc, mối quan hệ sẽ khiến bạn sẽ đau đầu nhưng thay v&igrave; nghĩ qu&aacute; nhiều, bạn n&ecirc;n t&igrave;m kiếm niềm vui ở ch&iacute;nh m&igrave;nh.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 6\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/6-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:513px; width:770px\" /></em></p>\r\n\r\n<p><em>Tổng hợp những cuốn s&aacute;ch hay n&ecirc;n đọc &ndash; Quẳng g&aacute;nh lo đi v&agrave; vui sống</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mọi vấn đề muốn giải quyết th&igrave; thay v&igrave; lo lắng tại sao ch&uacute;ng ta kh&ocirc;ng bỏ qua suy nghĩ đ&oacute; v&agrave; t&igrave;m kiếm điều t&iacute;ch cực. Cuộc sống bộn bề n&ecirc;n bạn cứ b&igrave;nh tĩnh v&agrave; nh&igrave;n mọi thứ theo những chiều t&iacute;ch cực.</p>\r\n\r\n<p>Kh&ocirc;ng c&oacute; đau khổ n&agrave;o l&agrave; m&atilde;i m&atilde;i, kh&ocirc;ng c&oacute; nỗi sợ n&agrave;o kh&ocirc;ng ngu&ocirc;i ngoai. N&ecirc;n nếu bạn mất thứ g&igrave; đ&oacute;, &ocirc;ng trời sẽ b&ugrave; đắp cho bạn bằng một điều t&iacute;ch cực kh&aacute;c. N&ecirc;n cứ hạnh ph&uacute;c m&agrave; sống th&ocirc;i, kh&ocirc;ng phải qu&aacute; lo lắng để rồi l&agrave;m giảm chất lượng cuộc sống l&agrave; những g&igrave; cuốn s&aacute;ch n&agrave;y muốn truyền tải.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>7. ĐỌC VỊ BẤT KỲ AI</strong></h3>\r\n\r\n<p>Đọc vị bất kỳ ai l&agrave; những cuốn s&aacute;ch hay n&ecirc;n đọc về cuộc sống. Sử dụng từ ngữ logic, v&iacute; dụ ch&acirc;n thật cuốn h&uacute;t người đọc, Đọc vị bất kỳ ai sẽ mang đến những trải nghiệm, hiểu biết về t&acirc;m l&yacute;, h&agrave;nh vi của con người.</p>\r\n\r\n<p>Cuốn s&aacute;ch m&ocirc; tả chi tiết những thủ thuật gi&uacute;p bạn hiểu một người n&agrave;o đ&oacute; một c&aacute;ch nhanh ch&oacute;ng th&ocirc;ng qua những cử chỉ, h&agrave;nh động nhỏ của họ. Một cuốn s&aacute;ch mang lại nhiều tri thức, hiểu biết về con người từ đ&oacute; bạn sẽ kh&ocirc;ng trở th&agrave;nh nạn nh&acirc;n của ai đ&oacute;.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 7\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/7-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:513px; width:770px\" /></em></p>\r\n\r\n<p><em>Những cuốn s&aacute;ch n&ecirc;n đọc ở tuổi 18 &ndash; Đọc vị bất kỳ ai</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Khi tiếp x&uacute;c với một người, liệu bạn c&oacute; hiểu biết những cảm x&uacute;c, suy nghĩ của người đ&oacute;. Đ&ocirc;i khi chỉ th&ocirc;ng qua v&agrave;i lời n&oacute;i, cử chỉ sẽ gi&uacute;p bạn t&igrave;m ra được sự thật một người đang che dấu bạn.</p>\r\n\r\n<p>Đọc vị bất kỳ ai như một cẩm nang để cho những ai đang quan t&acirc;m, t&igrave;m hiểu t&acirc;m l&yacute; con người. Cũng như từng bước gắn kết c&aacute;c mối quan hệ, biến ch&uacute;ng trở n&ecirc;n tốt đẹp hơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/tin-tuc/phu-kien-thoi-trang/tien-nhan-roi-nen-mua-vang-hay-gui-tiet-kiem-de-sinh-loi.html\" target=\"_blank\"><img alt=\"Tiền nhàn rỗi, Nên mua vàng hay gửi tiết kiệm để sinh lời?\" src=\"https://donghohaitrieu.com/wp-content/uploads/2018/08/button-10-18-8-2018.gif\" style=\"height:67px; width:270px\" /></a></p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/tin-tuc/phu-kien-thoi-trang/tien-nhan-roi-nen-mua-vang-hay-gui-tiet-kiem-de-sinh-loi.html\" target=\"_blank\"><strong>Tiền nh&agrave;n rỗi, N&ecirc;n mua v&agrave;ng hay gửi tiết kiệm để sinh lời?</strong></a></p>\r\n\r\n<p>❃❃❃❃❃❃❃❃❃❃❃❃❃<strong>❃❃❃</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>8. TIỂU THUYẾT BỐ GI&Agrave;</strong></h3>\r\n\r\n<p>Những cuốn s&aacute;ch hay n&ecirc;n đọc tiếp theo l&agrave; Bố gi&agrave;, t&aacute;c phẩm n&oacute;i về cuộc sống x&atilde; hội đen. Đ&acirc;y sẽ l&agrave; những trải nghiệm, g&oacute;c nh&igrave;n ho&agrave;n to&agrave;n mới lạ với nhiều người. T&aacute;c phẩm kinh điển n&agrave;y đ&atilde; được chuyển thể th&agrave;nh phim v&agrave; cực kỳ th&agrave;nh c&ocirc;ng với c&aacute;c giải thưởng danh gi&aacute;.</p>\r\n\r\n<p>Bố gi&agrave; của t&aacute;c giả Mario Puzo, một nh&agrave; văn người Mỹ nổi tiếng với nhiều t&aacute;c phẩm x&atilde; hội đen, Mafia như Cha con Gi&aacute;o ho&agrave;ng, Những kẻ đi&ecirc;n rồ phải chết, Đất m&aacute;u Sicily, Luật im lặng&hellip;</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 8\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/8-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:600px; width:600px\" /></em></p>\r\n\r\n<p><em>Những cuốn s&aacute;ch n&ecirc;n đọc trước tuổi 20 &ndash; Bố gi&agrave;</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nội dung s&aacute;ch kể về gia đ&igrave;nh Mafia gốc &Yacute; sống tại Mỹ được cai quản bởi thế lực Mafia kh&eacute;t tiếng tại New York c&oacute; t&ecirc;n Vito Corleone. &Ocirc;ng tr&ugrave;m Vito Corleone lớn l&ecirc;n trong gia đ&igrave;nh Mafia truyền thống nhưng kh&ocirc;ng muốn bản th&acirc;n bị ảnh hưởng bởi những điều ti&ecirc;u cực.</p>\r\n\r\n<p>Sau những sự thật về x&atilde; hội bấy giờ, những c&ocirc;ng l&yacute; v&agrave; ph&aacute;p luật v&agrave; trước giờ anh lu&ocirc;n theo th&igrave; cuộc sống Mafia mới l&agrave; nơi l&agrave; người d&acirc;n ngh&egrave;o yếu đuối mới được bảo vệ.</p>\r\n\r\n<p>Th&ocirc;ng qua cuốn s&aacute;ch n&agrave;y, nhiều gi&aacute; trị nh&acirc;n văn được thể hiện s&acirc;u sắc qua những c&acirc;u chuyện. Điển h&igrave;nh trong đ&oacute; như:</p>\r\n\r\n<p>◆ Giữ lời hứa v&agrave; kh&ocirc;ng can thiệp v&agrave;o cuộc sống gia đ&igrave;nh người kh&aacute;c</p>\r\n\r\n<p>◆ Học c&aacute;ch kiềm chế bản th&acirc;n</p>\r\n\r\n<p>◆ Học hỏi sau những sai lầm</p>\r\n\r\n<p>◆ D&agrave;nh&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/10-y-nghia-cua-thoi-gian-giup-ban-tran-trong-cuoc-song.html\" target=\"_blank\">thời gian</a>&nbsp;cho gia đ&igrave;nh</p>\r\n\r\n<p>◆ Vũ lực l&agrave; lựa chọn cuối c&ugrave;ng</p>\r\n\r\n<p>T&oacute;m lại, Bố gi&agrave; như một bức tranh tổng thể của thế giới ngầm Mafia, nơi m&agrave; nhiều người sẽ kh&ocirc;ng hiểu v&agrave; h&igrave;nh dung được. Người đọc sẽ được trải nghiệm, đặt m&igrave;nh trong ch&iacute;nh ho&agrave;n cảnh đ&oacute;. R&uacute;t ra những b&agrave;i học qu&yacute; gi&aacute; về cuộc sống.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>TOP DW B&Aacute;N CHẠY</p>\r\n\r\n<p>1/10</p>\r\n\r\n<p>left</p>\r\n\r\n<p>right</p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/san-pham/daniel-wellington-dw00100161-nu-quartz-pin-day-kim-loai\"><img alt=\"\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/07/9_DW00100161-399x399.jpg\" style=\"height:399px; width:399px\" /></a></p>\r\n\r\n<h3><a href=\"https://donghohaitrieu.com/san-pham/daniel-wellington-dw00100161-nu-quartz-pin-day-kim-loai\">Daniel Wellington DW00100161 &ndash; Nữ &ndash; Quartz (Pin) &ndash; Mặt Số 32mm, K&iacute;nh Cứng, Chống Nước 3ATM</a></h3>\r\n\r\n<p>Được xếp hạng&nbsp;<strong>5.00</strong>&nbsp;5 sao</p>\r\n\r\n<p>4.737.000&nbsp;₫</p>\r\n\r\n<p>1/11</p>\r\n\r\n<p>left</p>\r\n\r\n<p>right</p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/san-pham/daniel-wellington-dw00100219-nu-quartz-pin-day-kim-loai\"><img alt=\"\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/09/518_DW00100219-399x399.jpg\" style=\"height:399px; width:399px\" /></a></p>\r\n\r\n<h3><a href=\"https://donghohaitrieu.com/san-pham/daniel-wellington-dw00100219-nu-quartz-pin-day-kim-loai\">Daniel Wellington Classic Petite DW00100219 &ndash; Nữ &ndash; Quartz (Pin) &ndash; Mặt Số 28 Mm, K&iacute;nh Cứng, Si&ecirc;u Mỏng Chỉ 6 Mm</a></h3>\r\n\r\n<p>4.075.000&nbsp;₫</p>\r\n\r\n<p>1/7</p>\r\n\r\n<p>left</p>\r\n\r\n<p>right</p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/san-pham/daniel-wellington-dw00100217-nu-quartz-pin-day-kim-loai\"><img alt=\"\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/08/96_DW00100217-399x399.jpg\" style=\"height:399px; width:399px\" /></a></p>\r\n\r\n<h3><a href=\"https://donghohaitrieu.com/san-pham/daniel-wellington-dw00100217-nu-quartz-pin-day-kim-loai\">Daniel Wellington Petite DW00100217 &ndash; Nữ &ndash; Quartz (Pin) &ndash; Mặt Số 28mm, K&iacute;nh Cứng, Chống Nước 3ATM</a></h3>\r\n\r\n<p>4.075.000&nbsp;₫</p>\r\n\r\n<p>1/11</p>\r\n\r\n<p>left</p>\r\n\r\n<p>right</p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/san-pham/daniel-wellington-dw00100163-nu-quartz-pin-day-kim-loai\"><img alt=\"\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/11/DW00100163-399x399.jpg\" style=\"height:399px; width:399px\" /></a></p>\r\n\r\n<h3><a href=\"https://donghohaitrieu.com/san-pham/daniel-wellington-dw00100163-nu-quartz-pin-day-kim-loai\">Daniel Wellington Petite DW00100163 &ndash; Nữ &ndash; Quartz (Pin) &ndash; Mặt Số 32mm, K&iacute;nh Cứng, Chống Nước 5ATM</a></h3>\r\n\r\n<p>4.737.000&nbsp;₫</p>\r\n\r\n<h3><strong>9. CUỘC SỐNG KH&Ocirc;NG GIỚI HẠN</strong></h3>\r\n\r\n<p>Những cuốn s&aacute;ch n&ecirc;n đọc để ph&aacute;t triển bản th&acirc;n kh&ocirc;ng thể bỏ qua ch&iacute;nh l&agrave; Cuộc sống kh&ocirc;ng giới hạn. Ấn tượng ban đầu l&agrave; cuốn s&aacute;ch n&agrave;y được viết bởi một người đặc biệt. Nick Vujicic t&aacute;c giả cuốn s&aacute;ch l&agrave; một người bị thiếu 2 tay v&agrave; 2 ch&acirc;n bẩm sinh.</p>\r\n\r\n<p>Cuốn s&aacute;ch n&oacute;i về ch&iacute;nh cuộc đời của t&aacute;c giả, c&ograve;n g&igrave; buồn hơn khi sinh ra bị cụt 2 tay 2 ch&acirc;n. &Ocirc;ng bị mắc một hội chứng Tetra-amelia g&acirc;y ra sự thiếu hụt tay ch&acirc;n. Từ những nỗi đau n&agrave;y t&aacute;c giả đ&atilde; vượt l&ecirc;n số phận của ch&iacute;nh m&igrave;nh, sống cuộc đời &yacute; nghĩa.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 9\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/9-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:513px; width:770px\" /></em></p>\r\n\r\n<p><em>Những cuốn s&aacute;ch self-help n&ecirc;n đọc &ndash; Cuộc sống kh&ocirc;ng giới hạn</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong cuộc sống, kh&ocirc;ng ai sinh ra c&oacute; quyền được lựa chọn nơi m&igrave;nh sinh ra, lựa chọn m&igrave;nh l&agrave; ai. Những thứ vốn kh&ocirc;ng thể thay đổi bạn n&ecirc;n học c&aacute;ch vui vẻ chấp nhận v&agrave; t&igrave;m c&aacute;ch ứng biến, giải quyết.</p>\r\n\r\n<p>Cuốn s&aacute;ch như một bức tranh về cuộc sống mu&ocirc;n m&agrave;u, d&ugrave; kh&ocirc;ng c&oacute; ch&acirc;n tay nhưng vẫn vượt qua mọi r&agrave;o cản để t&igrave;m đến gi&aacute; trị của hạnh ph&uacute;c.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>TOP CITIZEN B&Aacute;N CHẠY</p>\r\n\r\n<p>1/18</p>\r\n\r\n<p>left</p>\r\n\r\n<p>right</p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/san-pham/citizen-bi5072-01a-nam-quartz-pin-day-da\"><img alt=\"\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/09/212_BI5072-01A-399x399.jpg\" style=\"height:399px; width:399px\" /></a></p>\r\n\r\n<h3><a href=\"https://donghohaitrieu.com/san-pham/citizen-bi5072-01a-nam-quartz-pin-day-da\">Citizen BI5072-01A &ndash; Nam &ndash; Quartz (Pin) &ndash; Mặt Số 40 Mm, K&iacute;nh Cứng, Chống Nước 5 ATM</a></h3>\r\n\r\n<p>Được xếp hạng&nbsp;<strong>5.00</strong>&nbsp;5 sao</p>\r\n\r\n<p>3.685.000&nbsp;₫</p>\r\n\r\n<p>1/13</p>\r\n\r\n<p>left</p>\r\n\r\n<p>right</p>\r\n\r\n<p>New!<a href=\"https://donghohaitrieu.com/san-pham/citizen-nh8394-70h-nam-automatic-tu-dong-day-kim-loai-mat-so-40mm\"><img alt=\"\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2020/10/NH8394-70H-399x399.jpg\" style=\"height:399px; width:399px\" /></a></p>\r\n\r\n<h3><a href=\"https://donghohaitrieu.com/san-pham/citizen-nh8394-70h-nam-automatic-tu-dong-day-kim-loai-mat-so-40mm\">Citizen C7 NH8394-70H &ndash; Nam &ndash; Automatic (Tự Động) &ndash; Mặt Số 40mm, K&iacute;nh Cứng Cong, Trữ C&oacute;t 42 Giờ</a></h3>\r\n\r\n<p>Được xếp hạng&nbsp;<strong>5.00</strong>&nbsp;5 sao</p>\r\n\r\n<p>9.177.000&nbsp;₫</p>\r\n\r\n<p>1/10</p>\r\n\r\n<p>left</p>\r\n\r\n<p>right</p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/san-pham/citizen-bi5006-81p-nam-quartz-pin-day-kim-loai\"><img alt=\"\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/10/86_BI5006-81P-399x399.jpg\" style=\"height:399px; width:399px\" /></a></p>\r\n\r\n<h3><a href=\"https://donghohaitrieu.com/san-pham/citizen-bi5006-81p-nam-quartz-pin-day-kim-loai\">Citizen BI5006-81P &ndash; Nam &ndash; Quartz (Pin) &ndash; Mặt Số 39 Mm, Lịch Ng&agrave;y, Chống Nước 5 ATM</a></h3>\r\n\r\n<p>Được xếp hạng&nbsp;<strong>4.00</strong>&nbsp;5 sao</p>\r\n\r\n<p>3.985.000&nbsp;₫</p>\r\n\r\n<p>1/11</p>\r\n\r\n<p>left</p>\r\n\r\n<p>right</p>\r\n\r\n<p><a href=\"https://donghohaitrieu.com/san-pham/citizen-aw0081-89l-nam-eco-drive-nang-luong-anh-sang-day-kim-loai-mat-so-42mm\"><img alt=\"\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/02/AW0081-89L-399x399.jpg\" style=\"height:399px; width:399px\" /></a></p>\r\n\r\n<h3><a href=\"https://donghohaitrieu.com/san-pham/citizen-aw0081-89l-nam-eco-drive-nang-luong-anh-sang-day-kim-loai-mat-so-42mm\">Citizen Eco-Drive AW0081-89L &ndash; Nam &ndash; Eco-Drive &ndash; Mặt Số 42 Mm, Chống Nước 10ATM, Guilloch&eacute;</a></h3>\r\n\r\n<p>6.685.000&nbsp;₫</p>\r\n\r\n<h3><strong>10. NGƯỜI GI&Agrave;U C&Oacute; NHẤT TH&Agrave;NH BABYLON</strong></h3>\r\n\r\n<p>Top những cuốn s&aacute;ch n&ecirc;n đọc về t&agrave;i ch&iacute;nh th&ocirc;ng minh, bu&ocirc;n b&aacute;n, tiết kiệm c&oacute; thể kể đến như Người gi&agrave;u c&oacute; nhất th&agrave;nh Babylon. Những kinh nghiệm trong quản l&yacute; t&agrave;i ch&iacute;nh, kinh doanh v&agrave; phương ph&aacute;p l&agrave;m gi&agrave;u n&agrave;y vẫn giữ nguy&ecirc;n gi&aacute; trị đến tận ng&agrave;y nay.</p>\r\n\r\n<p>Babylon được biết đến l&agrave; th&agrave;nh phố thịnh vượng nhất thế giới với nhiều th&agrave;nh lũy, nh&agrave; cửa, cung điện rộng r&atilde;i. Kh&ocirc;ng ai ngờ rằng nơi đ&acirc;y từng l&agrave; một v&ugrave;ng đất cằn cỗi, k&eacute;m ph&aacute;t triển.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 10\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/10-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:513px; width:770px\" /></em></p>\r\n\r\n<p><em>Review những cuốn s&aacute;ch hay n&ecirc;n đọc &ndash; Người gi&agrave;u c&oacute; nhất th&agrave;nh Babylon</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; điều n&agrave;y m&agrave; t&aacute;c giả đ&atilde; sử dụng n&oacute; với những loạt truyện ngụ ng&ocirc;n để minh chứng cho quy luật về t&agrave;i ch&iacute;nh v&agrave; tạo dựng tiền của. Ng&agrave;y nay n&oacute; c&ograve;n được c&aacute;c c&ocirc;ng ty bảo hiểm,&nbsp;<a href=\"https://donghohaitrieu.com/kinh-nghiem/top-15-cac-ngan-hang-o-viet-nam-uy-tin-dich-vu-tot-nhat.html\" target=\"_blank\">ng&acirc;n h&agrave;ng</a>&nbsp;sử dụng l&agrave;m b&agrave;i học về sự tiết kiệm v&agrave; động lực l&agrave;m việc.</p>\r\n\r\n<p>Th&ocirc;ng điệp truyền tải đến người đọc, d&ugrave; bạn bắt đầu với số tiền bao nhi&ecirc;u, h&atilde;y trả c&ocirc;ng cho bạn trước ti&ecirc;n. Từ đ&oacute; bạn sẽ kh&ocirc;ng c&ograve;n l&agrave; n&ocirc; lệ của đồng tiền nữa. H&atilde;y tr&iacute;ch 10% thu nhập h&agrave;ng th&aacute;ng để tiết kiệm. Bạn sẽ từ bỏ cuộc sống ngh&egrave;o kh&oacute; để tiến đến sự sung t&uacute;c, gi&agrave;u c&oacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>11. 7 TH&Oacute;I QUEN ĐỂ TH&Agrave;NH ĐẠT</strong></h3>\r\n\r\n<p>Một trong những cuốn s&aacute;ch n&ecirc;n đọc để ph&aacute;t triển bản th&acirc;n ch&iacute;nh l&agrave; 7 th&oacute;i quen để th&agrave;nh đạt. Cuốn s&aacute;ch gi&uacute;p bạn h&igrave;nh th&agrave;nh những th&oacute;i quen tốt v&agrave; t&iacute;ch cực, từ đ&oacute; th&agrave;nh c&ocirc;ng sẽ đến với c&ocirc;ng việc v&agrave; cuộc sống của bạn.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 11\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/11-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:707px; width:600px\" /></em></p>\r\n\r\n<p><em>7 th&oacute;i quen để th&agrave;nh đạt l&agrave; những cuốn s&aacute;ch hay n&ecirc;n đọc cho mọi lứa tuổi</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Khi m&agrave; thế giới hiện tại, những người đi l&ecirc;n từ những điều nhỏ b&eacute; nhất để trở n&ecirc;n th&agrave;nh c&ocirc;ng v&agrave; gi&agrave;u sụ. Đa phần ch&uacute;ng ta nghĩ rằng họ ăn may v&igrave; tỷ lệ phần trăm những người như vậy rất &iacute;t.</p>\r\n\r\n<p>Cuốn s&aacute;ch 7 th&oacute;i quen để th&agrave;nh đạt muốn người đọc hiểu được gi&aacute; trị của những th&oacute;i quen trong cuộc sống. Thứ sẽ đem ch&uacute;ng ta đến gần hơn với những gi&aacute; trị của th&agrave;nh c&ocirc;ng, sự tự do trong cuộc sống.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>12. H&Agrave;NH TR&Igrave;NH VỀ PHƯƠNG Đ&Ocirc;NG</strong></h3>\r\n\r\n<p>Những cuốn s&aacute;ch n&ecirc;n đọc 1 lần trong đời nếu bạn l&agrave; một người th&iacute;ch c&aacute;c vấn đề về t&acirc;m linh, H&agrave;nh tr&igrave;nh về phương Đ&ocirc;ng sẽ giải th&iacute;ch cho bạn. Nội dung cuốn s&aacute;ch kể về c&acirc;u chuyện của nh&oacute;m khoa học được cử đến Ấn Độ.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 12\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/12-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:577px; width:770px\" /></em></p>\r\n\r\n<p><em>Review những cuốn s&aacute;ch hay n&ecirc;n đọc &ndash; H&agrave;nh tr&igrave;nh về phương Đ&ocirc;ng</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Họ đ&atilde; đi khắp c&aacute;c ng&ocirc;i&nbsp;<a href=\"https://donghohaitrieu.com/kinh-nghiem/top-15-ngoi-chua-phat-giao-dep-lon-nhat-viet-nam-hien-nay.html\" target=\"_blank\">ch&ugrave;a</a>&nbsp;Ấn Độ, ph&aacute;t hiện những điều m&ecirc; t&iacute;n tại đ&acirc;y. Họ c&ograve;n cảm nhận được những chi&ecirc;u tr&ograve; của c&aacute;c ảo thuật gia n&agrave;y. Th&ocirc;ng qua chuy&ecirc;n đi, họ được tiếp x&uacute;c với những nền văn h&oacute;a cổ xưa Ấn Độ.</p>\r\n\r\n<p>T&oacute;m lại, cuốn s&aacute;ch H&agrave;nh tr&igrave;nh về phương Đ&ocirc;ng chứa đựng kiến thức bổ &iacute;ch, triết l&yacute; nh&acirc;n sinh, c&oacute; phần nghi&ecirc;n về t&acirc;m linh v&agrave; t&iacute;n ngưỡng. Gi&uacute;p người đọc hiểu r&otilde; hơn về Yoga, thiền định&hellip;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>13. TỘI &Aacute;C V&Agrave; H&Igrave;NH PHẠT</strong></h3>\r\n\r\n<p>Những cuốn s&aacute;ch bạn n&ecirc;n đọc &ndash; Tội &aacute;c v&agrave; h&igrave;nh phạt mang nặng &yacute; nghĩa t&acirc;m l&yacute;. Cuốn s&aacute;ch phản &aacute;nh ch&acirc;n thật về cuộc sống bần c&ugrave;ng của người d&acirc;n Nga. Những con người nhỏ b&eacute; t&igrave;m c&aacute;ch tho&aacute;t khỏi cảnh ngh&egrave;o đ&oacute;i được t&aacute;c giả kh&eacute;o l&eacute;o x&acirc;y dựng bằng những ng&ocirc;n từ đầy t&iacute;nh tượng h&igrave;nh.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 13\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/13-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:513px; width:770px\" /></em></p>\r\n\r\n<p><em>Những cuốn s&aacute;ch văn học hay n&ecirc;n đọc mang nặng yếu tố t&acirc;m l&yacute; l&agrave; Tội &aacute;c v&agrave; h&igrave;nh phạt</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Những mạch cảm x&uacute;c ch&acirc;n thật được kết nối một c&aacute;ch linh hoạt, uyển chuyển bởi những cuộc đối thoại thiết lập tương quan giữa người đọc, nh&acirc;n vật v&agrave; t&aacute;c giả. Tất cả tạo n&ecirc;n một bức tranh tổng thể mang m&agrave;u sắc đặc trưng của nước Nga.</p>\r\n\r\n<p>Cuốn tiểu thuyết kinh điển n&agrave;y c&oacute; gi&aacute; trị v&agrave; th&ocirc;ng điệp trường tồn đến tận ng&agrave;y nay. Người đọc sẽ cảm nhận được những triết l&yacute; s&acirc;u sắc nhất v&agrave; kh&ocirc;ng bao giờ lỗi thời.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>14. NGƯỜI B&Aacute;N H&Agrave;NG VĨ ĐẠI NHẤT THẾ GIỚI</strong></h3>\r\n\r\n<p>Người b&aacute;n vĩ đại nhất thế giới c&oacute; nội dung kể về h&agrave;nh tr&igrave;nh của Haifit, một cậu b&eacute; chăn lạc đ&agrave; với mong muốn đổi đời, trở th&agrave;nh người bu&ocirc;n b&aacute;n t&agrave;i giỏi nhất thế giới. &Ocirc;ng chủ của cậu b&eacute; chăn lạc đ&agrave; Pathos đ&atilde; đưa cậu 10 cuốn giấy da chỉ đường để gi&uacute;p cậu biến ước mơ th&agrave;nh hiện thực.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời- ảnh 14\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/14-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:600px; width:600px\" /></em></p>\r\n\r\n<p><em>Những cuốn s&aacute;ch hay n&ecirc;n đọc d&agrave;nh cho bạn trẻ y&ecirc;u th&iacute;ch kinh doanh b&aacute;n h&agrave;ng</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Những cuốn s&aacute;ch hay n&ecirc;n đọc về kinh doanh b&aacute;n h&agrave;ng gồm c&oacute; Người b&aacute;n h&agrave;ng vĩ đại nhất thế giới. Cuốn s&aacute;ch th&ocirc;ng qua những mẩu chuyện ngắn cho bạn g&oacute;c nh&igrave;n về c&aacute;ch tiếp cận kh&aacute;ch h&agrave;ng, giải quyết vấn đề v&agrave; nhu cầu của họ.</p>\r\n\r\n<p>Người đọc sẽ được dẫn dắt v&agrave;o thế giới kinh doanh. Th&ocirc;ng qua 10 cuốn giấy da b&ecirc;n trong rương cổ, bạn sẽ ph&aacute;t hiện ra từng b&iacute; quyết b&aacute;n h&agrave;ng được tinh gọn trong đấy. Cuốn s&aacute;ch hay cho bạn n&agrave;o c&oacute; hứng th&uacute; v&agrave; t&igrave;m hiểu về kinh doanh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>15. TR&Ecirc;N ĐƯỜNG BĂNG</strong></h3>\r\n\r\n<p>Những cuốn s&aacute;ch n&ecirc;n đọc 1 lần trong đời được nhiều bạn trẻ truyền tay nhau hiện nay l&agrave; cuốn Tr&ecirc;n đường băng. Đ&oacute; l&agrave; những c&acirc;u chuyện của Tony v&ocirc; c&ugrave;ng th&uacute; vị v&agrave; bổ &iacute;ch. Đ&oacute; l&agrave; những trải nghiệm của Tony được kể lại với c&aacute;ch dẫn dắt h&oacute;m hỉnh, gần gũi.</p>\r\n\r\n<p><em><img alt=\"TOP 15 những cuốn sách hay nên đọc ít nhất 1 lần trong đời - ảnh 15\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/09/15-top-15-nhung-cuon-sach-hay-nen-doc-it-nhat-1-lan-trong-doi.jpg\" style=\"height:513px; width:770px\" /></em></p>\r\n\r\n<p><em>Review những cuốn s&aacute;ch hay n&ecirc;n đọc Tr&ecirc;n đường băng</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cuốn s&aacute;ch gồm c&oacute; 3 phần với mỗi phần gồm nhiều chương với rất nhiều c&acirc;u chuyện m&agrave; Tony trải nghiệm. Những con người Tony đ&atilde; từng tiếp x&uacute;c, c&acirc;u chuyện học ngoại ngữ, c&aacute;ch sử dụng tiền&hellip; l&agrave; những vấn đề Tony đề cập trong cuốn s&aacute;ch.</p>\r\n\r\n<p>Mọi thứ m&agrave; Tony chia sẻ trong cuốn s&aacute;ch đều mang một gi&aacute; trị m&agrave; kh&ocirc;ng phải một v&agrave;i h&ocirc;m c&oacute; thể hiểu được. Cần c&oacute; sự thấu hiểu v&agrave; &aacute;p dụng v&agrave;o thực tại, v&agrave;o ch&iacute;nh cuộc sống h&agrave;ng ng&agrave;y. Bạn sẽ dần cảm nhận được những thay đổi t&iacute;ch cực của bản th&acirc;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>TỔNG KẾT</strong></h2>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; TOP 15 những cuốn s&aacute;ch hay n&ecirc;n đọc &iacute;t nhất 1 lần trong đời, đặc biệt l&agrave; những bạn mới lần đầu hoặc đang tập th&oacute;i quen đọc s&aacute;ch. Một th&oacute;i quen của rất nhiều người gi&agrave;u tr&ecirc;n thế giới gi&uacute;p đem đến những tri thức, trải nghiệm m&agrave; trước giờ bạn chưa từng c&oacute;.</p>', 'a', 'a', 5, '2023-04-11 09:17:35', '2023-04-12 15:55:08');
INSERT INTO `post` (`id`, `user_id`, `product_code`, `title`, `introduction`, `slug`, `content`, `image_url`, `image_public_id`, `view`, `created_at`, `updated_at`) VALUES
(3, 1, NULL, 'Bài dự thi Viết cảm nhận về một cuốn sách mà em yêu thích (25 mẫu)', 'Đọc sách là một trong những cách giúp bạn học thêm nhiều thứ về cuộc sống, những trải nghiệm mà có thể bạn chưa từng có. Đây cũng là thói quen tìm thấy ở rất nhiều người thành công. Sau đây Hải Triều sẽ review TOP những cuốn sách hay nên đọc nhất mọi thời đại.', 'bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-25-mau', '<p><strong>B&agrave;i dự thi Viết cảm nhận về một&nbsp;<a href=\"https://download.vn/bai-du-thi-dai-su-van-hoa-doc-thu-do-de-1-49915\">cuốn s&aacute;ch</a>&nbsp;m&agrave; em y&ecirc;u th&iacute;ch mang tới 25 mẫu hay, độc đ&aacute;o nhất.&nbsp;</strong>Qua đ&oacute;, c&aacute;c em sẽ c&oacute; th&ecirc;m nhiều &yacute; tưởng mới, nhanh ch&oacute;ng ho&agrave;n thiện b&agrave;i dự thi của m&igrave;nh thật hay.</p>\r\n\r\n<p><img alt=\"Viết cảm nhận về một cuốn sách mà em yêu thích\" src=\"https://o.rada.vn/data/image/2020/04/08/Cuon-sach-640.jpg\" style=\"height:335px; width:640px\" /></p>\r\n\r\n<p>Viết cảm nhận về một cuốn s&aacute;ch m&agrave; em y&ecirc;u th&iacute;ch</p>\r\n\r\n<p>Mỗi cuốn s&aacute;ch đều truyền tải một th&ocirc;ng điệp, một &yacute; nghĩa ri&ecirc;ng. Mỗi người sẽ c&oacute; cảm nhận ri&ecirc;ng về một cốn s&aacute;ch n&agrave;o đ&oacute;. Với 25 b&agrave;i cảm nhận về cuốn s&aacute;ch Tuổi trẻ đ&aacute;ng gi&aacute; bao nhi&ecirc;u, Thời ni&ecirc;n thiếu kh&ocirc;ng thể quay trở lại, Hạt giống t&acirc;m hồn, Đắc nh&acirc;n t&acirc;m... sẽ gi&uacute;p c&aacute;c em c&oacute; th&ecirc;m nhiều &yacute; tưởng:</p>\r\n\r\n<h2>Viết về một cuốn s&aacute;ch m&agrave; em y&ecirc;u th&iacute;ch</h2>\r\n\r\n<ul>\r\n	<li><a href=\"https://download.vn/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-44298#mcetoc_1gsotc7jv18\">Viết cảm nhận về cuốn Tuổi trẻ đ&aacute;ng gi&aacute; bao nhi&ecirc;u</a></li>\r\n	<li><a href=\"https://download.vn/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-44298#mcetoc_1gps0lvek10\">Viết cảm nhận về cuốn Ối, đừng mặc xấu</a></li>\r\n	<li><a href=\"https://download.vn/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-44298#mcetoc_1geqjbse42g\">Viết về cuốn s&aacute;ch Thời ni&ecirc;n thiếu kh&ocirc;ng thể quay trở lại</a></li>\r\n	<li><a href=\"https://download.vn/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-44298#mcetoc_1fvk1lo7ar\">Viết về cuốn s&aacute;ch Hachiko ch&uacute; ch&oacute; đợi chờ</a></li>\r\n	<li><a href=\"https://download.vn/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-44298#mcetoc_1fhah0v730\">Viết về cuốn s&aacute;ch Lời chia tay đẹp nhất thế gian</a></li>\r\n	<li><a href=\"https://download.vn/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-44298#mcetoc_1f375gkkc0\">Viết về cuốn s&aacute;ch Tiếng gọi nơi hoang d&atilde;</a></li>\r\n	<li><a href=\"https://download.vn/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-44298#mcetoc_1evbilnqg8\">Viết về cuốn s&aacute;ch Những kẻ mộng mơ</a></li>\r\n	<li><a href=\"https://download.vn/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-44298#mcetoc_1f375gkkc1\">Viết về cuốn s&aacute;ch Ngữ văn 7 tập hai</a></li>\r\n	<li><a href=\"https://download.vn/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-44298#mcetoc_1evbi5m980\">Viết về cuốn s&aacute;ch Kh&ocirc;ng gia đ&igrave;nh</a></li>\r\n	<li><a href=\"https://download.vn/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-44298#mcetoc_1elc2esr30\">Viết về cuốn s&aacute;ch Khoảng Lặng Của Tr&aacute;i Tim</a></li>\r\n</ul>\r\n\r\n<p>Xem th&ecirc;m</p>\r\n\r\n<h2>Viết cảm nhận về cuốn Tuổi trẻ đ&aacute;ng gi&aacute; bao nhi&ecirc;u</h2>\r\n\r\n<p>Tuổi trẻ đ&aacute;ng gi&aacute; bao nhi&ecirc;u của t&aacute;c giả trẻ Rosie Nguyễn cũng l&agrave; một cuốn s&aacute;ch thuộc thể loại self-help như vậy. Nhận kh&ocirc;ng &iacute;t chỉ tr&iacute;ch khen ch&ecirc; tr&aacute;i ngược, nhưng sự thật vẫn l&agrave; sự thật, kh&ocirc;ng ai c&oacute; thể phủ nhận được những tinh hoa m&agrave; cuốn s&aacute;ch đem đến, nhưng những tinh hoa ấy chỉ d&agrave;nh cho những người hiểu chuyện.</p>\r\n\r\n<p>Thời sinh vi&ecirc;n c&oacute; lẽ ch&uacute;ng ta đủ rảnh để đọc s&aacute;ch, &agrave; qu&ecirc;n, đấy l&agrave; thời điểm m&agrave; game online, tr&agrave; sữa, d&atilde; ngoại, y&ecirc;u đương cũng xuất hiện để &ldquo;cạnh tranh&rdquo;, cướp mất thời gian của ch&uacute;ng ta mất rồi. Thậm ch&iacute; nếu kh&ocirc;ng d&iacute;nh v&agrave;o bất cứ một trong những th&uacute; vui tr&ecirc;n, th&igrave; việc lướt facebook đọc b&aacute;o, check in cũng kha kh&aacute; tốn thời gian. Đấy l&agrave; phần d&agrave;nh cho học sinh phổ th&ocirc;ng. C&ograve;n đối với sinh vi&ecirc;n mới ra trường, hay những nh&acirc;n vi&ecirc;n c&ocirc;ng sở đang ch&aacute;n c&ocirc;ng việc văn ph&ograve;ng, những kinh nghiệm khi chuyển m&igrave;nh, đổi việc, hoặc đơn giản l&agrave; biến c&ocirc;ng việc th&agrave;nh đam m&ecirc;, những kinh nghiệm quan điểm của Rosie c&oacute; thể sẽ &iacute;t nhiều khiến bạn thấy hứng th&uacute;!To&aacute;t l&ecirc;n trong từng chương s&aacute;ch l&agrave; kinh nghiệm của người đi trước. Rosie Nguyễn cũng đ&atilde; từng trải qua thời học tr&ograve; ng&acirc;y thơ, thời đại học sinh vi&ecirc;n với nhiều cung bậc cảm x&uacute;c, v&agrave; sau đ&oacute; l&agrave; c&ocirc;ng việc tuổi trẻ văn ph&ograve;ng, những bước ch&acirc;n tr&ecirc;n h&agrave;nh tr&igrave;nh kh&aacute;m ph&aacute; thế giới của một Ta ba l&ocirc;&hellip;V&acirc;ng,t&aacute;c giả đ&atilde; từng l&agrave;m nhiều c&ocirc;ng việc kh&aacute;c nhau để sống, từng đến nhiều nơi tr&ecirc;n thế giới, kh&aacute;m ph&aacute; nhiều miền đất mới để rồi r&uacute;t ra những chi&ecirc;m nghiệm qu&yacute; gi&aacute;: &ldquo;Ch&uacute;ng ta chỉ thật sự hạnh ph&uacute;c khi sống với đam m&ecirc; của m&igrave;nh&rdquo;. Tuổi trẻ l&agrave; cả một bầu trời rộng lớn, ở đ&oacute; c&oacute; ước mơ, ho&agrave;i b&atilde;o, t&igrave;nh y&ecirc;u v&agrave; cả nhiệt huyết tuổi thanh xu&acirc;n. Tuy nhi&ecirc;n, vẫn c&oacute; nhiều bạn trẻ giữa v&ograve;ng quay cuộc sống kh&ocirc;ng x&aacute;c định được m&igrave;nh th&iacute;ch g&igrave; v&agrave; loay hoay kh&ocirc;ng biết đi về đ&acirc;u. C&oacute; lẽ mấy v&iacute; dụ thống k&ecirc; cũng chẳng l&agrave;m ch&uacute;ng ta quan t&acirc;m lắm đ&acirc;u, v&iacute; dụ c&aacute;c nước ph&aacute;t triển th&igrave; người ta mỗi năm đọc mấy trăm cuốn, c&ograve;n ch&uacute;ng ta th&igrave; chỉ đếm chưa hết đầu ng&oacute;n tay.Nếu đọc hết cuốn s&aacute;ch, bạn c&oacute; th&ecirc;m nghị lực, niềm tin, nh&igrave;n thấy được những tương lai kh&aacute;c nhau của những h&agrave;nh động kh&aacute;c nhau.</p>\r\n\r\n<p>V&agrave; để l&agrave;m được điều đ&oacute;, h&atilde;y tr&acirc;n trọng những cuốn s&aacute;ch bạn nh&eacute;, để sau tất cả, những cuốn s&aacute;ch d&agrave;nh cho người trẻ như Tuổi trẻ đ&aacute;ng gi&aacute; bao nhi&ecirc;u n&agrave;y, kh&ocirc;ng đơn thuần chỉ c&oacute; gi&aacute; trị 70 ngh&igrave;n đồng!</p>\r\n\r\n<p>Bằng những c&acirc;u c&acirc;u chuyện hay, c&oacute; thật m&agrave; t&aacute;c giả chia sẻ c&aacute;c bạn trẻ sẽ c&oacute; c&aacute;i nh&igrave;n to&agrave;n diện hơn về tuổi trẻ của ri&ecirc;ng m&igrave;nh. Từ đ&oacute; r&uacute;t ra những b&agrave;i học qu&yacute; gi&aacute;. Đừng để tuổi trẻ của ch&uacute;ng ta qua đi trong tiếc nuối v&igrave; tuổi trẻ mỗi người chỉ một, h&atilde;y sống thật nhiệt huyết để qu&atilde;ng đời ấy m&atilde;i l&agrave; qu&atilde;ng đời đẹp nhất.</p>\r\n\r\n<h2>Viết cảm nhận về cuốn Ối, đừng mặc xấu</h2>\r\n\r\n<p>Đọc s&aacute;ch l&agrave; một th&oacute;i quen tốt m&agrave; em duy tr&igrave; h&agrave;ng ng&agrave;y để tăng vốn hiểu biết cho m&igrave;nh cũng như thanh lọc t&acirc;m hồn, t&igrave;m đến những mục đ&iacute;ch sống hạnh ph&uacute;c trong đời. gần đ&acirc;y, em c&oacute; được đọc một cuốn s&aacute;ch rất hay &quot;Ối, đừng mặc xấu&quot; của t&aacute;c giả Clinton Kelly.</p>\r\n\r\n<p>Cuốn s&aacute;ch l&agrave; một chuỗi những kinh nghiệm, b&agrave;i học, lời khuy&ecirc;n của t&aacute;c giả về c&aacute;ch ăn mặc trong cuộc sống. Trong đời sống, việc ăn mặc cần phải gọn g&agrave;ng, đẹp mắt để kh&ocirc;ng chỉ t&ocirc;n trọng bản th&acirc;n m&igrave;nh m&agrave; c&ograve;n l&agrave; t&ocirc;n trọng người đối diện. Việc ăn mặc đẹp sẽ gi&uacute;p bạn tự tin giải quyết được c&ocirc;ng việc. Cuốn s&aacute;ch n&agrave;y ra đời ch&iacute;nh l&agrave; với mục đ&iacute;ch như thế. Với người đọc, kể cả l&agrave; kh&ocirc;ng giỏi trong chuyện ăn mặc th&igrave; cuốn s&aacute;ch n&agrave;y sẽ tổng hợp những lời khuy&ecirc;n về c&aacute;ch ăn mặc: c&aacute;ch phối đồ, c&aacute;ch l&ecirc;n đồ,... để gi&uacute;p cho ch&uacute;ng ta c&oacute; một diện mạo tự tin khi ra đường. Sau khi đọc cuốn s&aacute;ch n&agrave;y, em đ&atilde; biết c&aacute;ch chọn đồ cho đ&uacute;ng dịp như: đi học, đi chơi, đi picnic,.. lại c&ograve;n ph&ugrave; hợp với thời tiết v&agrave; t&iacute;nh c&aacute;ch bản th&acirc;n nữa. Nhờ &aacute;p dụng cuốn s&aacute;ch n&agrave;y, em kh&ocirc;ng c&ograve;n gặp kh&oacute; khăn trong việc nghĩ h&ocirc;m nay sẽ mặc g&igrave;, mẹ kh&ocirc;ng c&ograve;n phải ph&agrave;n n&agrave;n về bộ em đang mặc nữa.</p>\r\n\r\n<p>Đặc biệt hơn, em cảm thấy tự tin khi ăn mặc đẹp v&agrave; c&ograve;n biết chọn lọc những đồ cần thiết cho tủ đồ của m&igrave;nh sao cho tối giản nhất c&oacute; thể nữa; tr&aacute;nh t&igrave;nh trạng &quot;tủ đồ đầy m&agrave; kh&ocirc;ng c&oacute; g&igrave; để mặc&quot;. T&oacute;m lại, cuốn s&aacute;ch n&agrave;y rất bổ &iacute;ch cho những ai đang cần cải thiện gu ăn mặc của m&igrave;nh sao cho một diện mạo tự tin, đẹp đẽ.</p>\r\n\r\n<h2>Viết về cuốn s&aacute;ch Thời ni&ecirc;n thiếu kh&ocirc;ng thể quay trở lại</h2>\r\n\r\n<p>Người ta thường cho rằng lứa tuổi học tr&ograve; l&agrave; lứa tuổi v&ocirc; tư, cuộc sống chỉ xoay quanh những mối quan t&acirc;m đơn giản. Bởi vậy, đ&acirc;y ch&iacute;nh l&agrave; thời kỳ tươi đẹp nhất trong cuộc đời mỗi con người. Nhưng thật ra, thế giới nội t&acirc;m của c&aacute;c c&ocirc; cậu học sinh tuổi mới lớn phức tạp hơn thế rất nhiều. Trong t&acirc;m tr&iacute; của những đứa trẻ đang lớn, đang chập chững bước v&agrave;o đời ấy c&oacute; rất nhiều những m&acirc;u thuẫn, dằn vặt, suy tư, kh&aacute;t vọng... khi đối mặt với mu&ocirc;n v&agrave;n cuộc sống đang hiện ra trước mắt.</p>\r\n\r\n<p>Trong qu&atilde;ng thời gian n&agrave;y, chắc chắn ai cũng sẽ c&oacute; những vấn đề của ri&ecirc;ng m&igrave;nh. Những vấn đề m&agrave; nếu ch&uacute;ng ta chia sẻ với gia đ&igrave;nh, bạn b&egrave; chưa chắc đ&atilde; t&igrave;m được sự đồng cảm hay tiếng n&oacute;i chung. Rồi ta cứ mắc kẹt trong v&ograve;ng luẩn quẩn ấy: kh&ocirc;ng t&igrave;m được c&aacute;ch giải quyết cho bản th&acirc;n, cứ thế li&ecirc;n tục tạo ra những sai lầm, để rồi khi trưởng th&agrave;nh, ta nh&igrave;n lại v&agrave; hối tiếc cho qu&aacute; khứ. Với t&ocirc;i, qu&aacute; khứ chưa hề xa x&ocirc;i lắm, n&oacute; mới chỉ như ng&agrave;y h&ocirc;m qua nhưng t&ocirc;i đ&atilde; hối tiếc về biết bao điều m&agrave; m&igrave;nh đ&atilde; l&agrave;m, hoặc chưa l&agrave;m&hellip;</p>\r\n\r\n<p>Những trải nghiệm v&agrave; cảm x&uacute;c ấy của t&ocirc;i cũng như của bao người kh&aacute;c dường như đ&atilde; được t&aacute;c giả Đồng Hoa mang tới v&agrave; g&oacute;i lại trọn vẹn trong cuốn tiểu thuyết &ldquo;Thời ni&ecirc;n thiếu kh&ocirc;ng thể quay trở lại&rdquo;.</p>\r\n\r\n<p>T&ocirc;i cũng như bao c&ocirc; cậu học sinh kh&aacute;c, cũng đang trong lứa tuổi học tr&ograve;, cũng c&oacute; nhiều g&aacute;nh nặng tr&ecirc;n vai, nhiều l&uacute;c t&ocirc;i cảm thấy bế tắc: m&igrave;nh sẽ đối mặt với vấn đề ra sao, t&acirc;m sự với ai, ai sẽ l&agrave; người tin tưởng m&igrave;nh b&acirc;y giờ&hellip;? Cũng may mắn cho t&ocirc;i bởi b&ecirc;n cạnh t&ocirc;i lu&ocirc;n c&oacute; những người bạn tốt, v&agrave; một trong số họ đ&atilde; tặng t&ocirc;i cuốn cuốn s&aacute;ch n&agrave;y, cuốn s&aacute;ch với t&ocirc;i vừa l&agrave; sự chia sẻ, vừa l&agrave; nguồn động vi&ecirc;n, vừa l&agrave; sự chỉ dẫn để t&ocirc;i c&oacute; được l&ograve;ng tin để đối mặt với những &ldquo;thử th&aacute;ch thanh xu&acirc;n&rdquo;.</p>\r\n\r\n<p><em>&quot;Nhiều năm qua, t&ocirc;i lu&ocirc;n học tập một việc, ch&iacute;nh l&agrave; kh&ocirc;ng quay đầu lại, chỉ v&igrave; bản th&acirc;n m&igrave;nh chưa từng l&agrave;m việc g&igrave; phải hối hận, kh&ocirc;ng hối hận v&igrave; những chuyện m&igrave;nh đ&atilde; l&agrave;m.</em></p>\r\n\r\n<p><em>Mỗi bước đi của cuộc sống đều phải trả gi&aacute; đắt.</em></p>\r\n\r\n<p><em>T&ocirc;i c&oacute; được một &iacute;t m&igrave;nh muốn, mất đi một &iacute;t những g&igrave; m&igrave;nh kh&ocirc;ng muốn mất.</em></p>\r\n\r\n<p><em>Nhưng con người tr&ecirc;n thế giới n&agrave;y c&oacute; phải ai cũng vậy đ&acirc;u?&quot;</em></p>\r\n\r\n<p>Nhắc đến tiểu thuyết ng&ocirc;n t&igrave;nh, mọi người thường cho rằng đ&oacute; l&agrave; những cuốn s&aacute;ch v&ocirc; bổ to&agrave;n về chuyện t&igrave;nh y&ecirc;u với những t&igrave;nh tiết tưởng tượng xa rời thực tế, kh&ocirc;ng gi&uacute;p &iacute;ch g&igrave; cho người đọc, nhưng t&ocirc;i đ&atilde; thay đổi suy nghĩ của m&igrave;nh khi đọc cuốn tiểu thuyết n&agrave;y của Đồng Hoa. T&aacute;c giả Đồng Hoa đ&atilde; vượt l&ecirc;n tr&ecirc;n giới hạn của một t&aacute;c giả ng&ocirc;n t&igrave;nh, khi cuốn tiểu thuyết của c&ocirc; d&ugrave; c&oacute; đề cập đến c&acirc;u chuyện t&igrave;nh y&ecirc;u của lứa tuổi học tr&ograve; nhưng n&oacute; lại chứa đựng nhiều b&agrave;i học nh&acirc;n sinh s&acirc;u sắc d&agrave;nh cho mỗi độc giả khi đọc cuốn truyện n&agrave;y.</p>\r\n\r\n<p>Qua h&igrave;nh ảnh nh&acirc;n vật La Kỳ Kỳ m&agrave; t&aacute;c giả x&acirc;y dựng t&ocirc;i tin chắc rằng kh&ocirc;ng chỉ t&ocirc;i m&agrave; tất cả mọi người đều t&igrave;m thấy một phần bản th&acirc;n m&igrave;nh trong đ&oacute;. Xuy&ecirc;n suốt c&acirc;u chuyện l&agrave; h&igrave;nh ảnh c&ocirc; g&aacute;i nhỏ La Kỳ Kỳ trong những năm th&aacute;ng của cuộc đời học sinh, trải d&agrave;i từ những năm th&aacute;ng học tiểu học, với b&oacute;ng ma t&acirc;m l&yacute; đến từ c&ocirc; gi&aacute;o Triệu v&agrave; rồi t&igrave;m được &aacute;nh s&aacute;ng cuối con đường cứu gi&uacute;p c&ocirc; b&eacute; l&agrave; c&ocirc; gi&aacute;o Cao. T&ocirc;i như bắt gặp h&igrave;nh ảnh của m&igrave;nh trong La Kỳ Kỳ thời cấp hai, khi c&ocirc; đối đầu một c&aacute;ch bướng bỉnh với thầy &quot;chậu của cải&quot;... Những mất m&aacute;t, tổn thương đến với Kỳ Kỳ đ&atilde; gi&uacute;p c&ocirc; trở th&agrave;nh con người mạnh mẽ, ki&ecirc;n định nhưng t&acirc;m hồn của c&ocirc; cũng bởi thế m&agrave; trở n&ecirc;n nhạy cảm hơn bao giờ hết. Ngo&agrave;i kia, cũng c&oacute; rất nhiều những anh chị, những bạn như t&ocirc;i: v&igrave; đau đớn m&agrave; trưởng th&agrave;nh nhanh ch&oacute;ng nhưng lu&ocirc;n muốn được một lần nữa quay trở về với thời thơ ấu.</p>\r\n\r\n<p>Trong suốt qu&atilde;ng thời gian tuổi trẻ, qu&atilde;ng thời gian khi t&acirc;m hồn ta c&ograve;n non nớt, chập chững bước v&agrave;o đời những bước đi đầu ti&ecirc;n, th&igrave; c&aacute;c t&aacute;c động xung quanh ch&uacute;ng ta ảnh hưởng một c&aacute;ch kh&ocirc;ng ngờ tới. Hiệu ứng bươm bướm giải th&iacute;ch kh&aacute; đ&uacute;ng trong vấn đề n&agrave;y. C&oacute; thể n&oacute;i, cuộc đời Kỳ Kỳ chịu t&aacute;c động rất lớn bởi sự kiện c&acirc;y b&uacute;t m&aacute;y khi c&ocirc; c&ograve;n học tiểu học. Chỉ đơn giản l&agrave; một c&acirc;y b&uacute;t đắt tiền của người bạn bị mất, tất cả mọi người đều đổ dồn sự nghi ngờ cho c&ocirc; b&eacute;,chỉ đơn giản l&agrave; v&igrave; c&ocirc; kh&ocirc;ng được l&ograve;ng c&ocirc; chủ nghiệm, sự việc đ&oacute; đ&atilde; g&acirc;y ra hệ luỵ rất lớn về sau. Vốn đ&atilde; c&oacute; những tổn thương trong t&acirc;m hồn, c&ocirc; b&eacute; ng&agrave;y ng&agrave;y kh&eacute;p k&iacute;n bản th&acirc;n m&igrave;nh, tự tạo cho m&igrave;nh một chiếc vỏ để chui v&agrave;o, học h&agrave;nh ng&agrave;y c&agrave;ng sa s&uacute;t, rồi t&igrave;m đến những người bạn m&agrave; x&atilde; hội gắn cho c&aacute;i m&aacute;c l&agrave; bất hảo.</p>\r\n\r\n<p>Trong c&acirc;u chuyện n&agrave;y, t&ocirc;i như t&igrave;m thấy bản th&acirc;n m&igrave;nh trong nhiều ph&acirc;n đoạn,l&uacute;c c&ocirc; gi&aacute;o Triệu đổ oan cho Kỳ Kỳ lấy trộm chiếc b&uacute;t m&aacute;y, những l&uacute;c bố mẹ c&ocirc; c&oacute; ph&acirc;n biệt đối xử một c&aacute;ch r&otilde; r&agrave;ng giữa hai chị em, l&uacute;c &ocirc;ng ngoại mất. T&ocirc;i cảm thấy đồng cảm với nh&acirc;n vật, nhất l&agrave; l&uacute;c &ocirc;ng ngoại của c&ocirc; mất, t&ocirc;i cũng giống như nh&acirc;n vật, cũng được &ocirc;ng ngoại y&ecirc;u thương chiều chuộng nhất, người m&agrave; l&uacute;c đ&oacute; bản th&acirc;n m&igrave;nh y&ecirc;u thương nhất. Nhưng rồi &ocirc;ng lại rời bỏ m&igrave;nh ra đi, t&ocirc;i cảm thấy như mất hết tất cả, tự hỏi tại sao &ocirc;ng trời lại cướp đi người m&agrave; m&igrave;nh y&ecirc;u thương nhất. Rồi t&ocirc;i chợt nhận thấy, ho&aacute; ra tr&ecirc;n đời n&agrave;y c&oacute; người chung ho&agrave;n cảnh với m&igrave;nh, d&ugrave; chỉ c&oacute; nh&acirc;n vật kh&ocirc;ng c&oacute; thật, một nh&acirc;n vật hư cấu, nhưng phần n&agrave;o t&ocirc;i cũng cảm thấy như được an ủi. Đ&oacute; cũng l&agrave; l&uacute;c t&ocirc;i nhận ra được nhiều điều.</p>\r\n\r\n<p>&quot;... Con người nhận được thứ n&agrave;y, chắc chắn sẽ mất đi thứ kh&aacute;c, đ&ocirc;i khi mất đi ch&iacute;nh l&agrave; để nhận lại, v&agrave; c&oacute; l&uacute;c nhận được ch&iacute;nh l&agrave; để mất đi...&quot;</p>\r\n\r\n<p>Lời n&oacute;i n&agrave;y của Tiểu Ba khiến t&ocirc;i như vỡ o&agrave; những cảm x&uacute;c trước đ&oacute;, n&oacute; khiến t&ocirc;i hiểu ra rằng cuộc sống kh&ocirc;ng bất c&ocirc;ng như mọi người hay nghĩ, n&oacute; lu&ocirc;n c&oacute; sự cho đi v&agrave; nhận lại, đ&oacute; l&agrave; sự c&acirc;n bằng của cuộc sống. Tạo ho&aacute; ban tặng cho ta thứ g&igrave; sẽ lấy đi của ch&uacute;ng ta một c&aacute;i g&igrave; đấy. Cuộc đời ch&iacute;nh l&agrave; như thế, ch&uacute;ng ta phải học c&aacute;ch chấp nhận, học c&aacute;ch nhận lấy v&agrave; mất đi.</p>\r\n\r\n<p>Trong t&aacute;c phẩm n&agrave;y, t&ocirc;i t&igrave;m thấy một C&aacute;t Hiểu Phi xinh đẹp,học giỏi một c&ocirc; b&eacute; c&oacute; tương lai đầy hy vọng, nhưng nếu c&ocirc; kh&ocirc;ng vướng v&agrave;o mối t&igrave;nh với Vương Chinh, hoặc cuốn v&agrave;o v&ograve;ng xo&aacute;y của x&atilde; hội th&igrave; c&oacute; lẽ cuộc đời c&ocirc; đ&atilde; bớt bi kịch hơn, số phận sẽ c&ocirc;ng bằng với con người ấy hơn. Đau thương cho Hiểu Phi d&ugrave; cho c&ocirc; muốn quay đầu lại, l&agrave;m lại cuộc đời m&igrave;nh cỡ n&agrave;o đi chăng nữa, th&igrave; x&atilde; hội cũng kh&ocirc;ng cho ph&eacute;p c&ocirc; c&oacute; quyền quay đầu.</p>\r\n\r\n<p>T&ocirc;i bắt gặp h&igrave;nh ảnh Quan H&agrave; lu&ocirc;n sống giả tạo trong c&aacute;i vỏ bọc c&ocirc;ng ch&uacute;a của ch&iacute;nh bản th&acirc;n m&igrave;nh tạo ra, một Quan H&agrave; xinh đẹp, giỏi giang, ho&agrave; đồng, kh&ocirc;ng ngừng cố gắng miệt m&agrave;i x&acirc;y dựng chiếc mặt nạ giả tạo do m&igrave;nh tạo ra.</p>\r\n\r\n<p>Hay h&igrave;nh ảnh Hứa Tiểu Ba dịu d&agrave;ng lu&ocirc;n giải th&iacute;ch cho Kỳ kỳ hiểu, kh&ocirc;ng muốn c&ocirc; mắc sai lầm của tuổi trẻ, lu&ocirc;n &acirc;m thầm ở đằng sau bảo vệ c&ocirc;.</p>\r\n\r\n<p>T&ocirc;i t&igrave;m thấy rất nhiều điều trong &quot;Thời ni&ecirc;n thiếu kh&ocirc;ng thể quay lại ấy&quot;, dường như t&igrave;m thấy cả ch&iacute;nh bản th&acirc;n m&igrave;nh.</p>\r\n\r\n<p><em>Thời ni&ecirc;n thiếu c&oacute; thật l&agrave; kh&ocirc;ng thể quay lại?</em><br />\r\n<em>Thật sự kh&ocirc;ng thể quay lại khoảng thời gian tươi đẹp ấy.</em><br />\r\n<em>&igrave; kh&ocirc;ng thể quay lại n&ecirc;n ch&uacute;ng ta lu&ocirc;n hối tiếc về ng&agrave;y xưa.</em></p>\r\n\r\n<p>V&igrave; đang sống trong thời ni&ecirc;n thiếu, n&ecirc;n lu&ocirc;n cảm thấy thời gian ph&iacute;a trước rất d&agrave;i, nghĩ rằng tất cả mọi thứ c&oacute; thể nh&igrave;n lại lần nữa, nhưng lại kh&ocirc;ng biết, thời gian như một d&ograve;ng s&ocirc;ng, kh&ocirc;ng bao giờ chảy ngược về nguồn.</p>\r\n\r\n<p>Trong cuốn s&aacute;ch n&agrave;y, ta c&oacute; thể t&igrave;m thấy những g&igrave; bạn nhiệt t&igrave;nh y&ecirc;u thương, đi&ecirc;n cuồng theo đuổi lại dần dần bị l&atilde;ng qu&ecirc;n, thay v&agrave;o đ&oacute; l&agrave; sự hiện diện r&otilde; r&agrave;ng của sự trưởng th&agrave;nh.</p>\r\n\r\n<p>Đ&acirc;y kh&ocirc;ng phải l&agrave; một cuốn ng&ocirc;n t&igrave;nh về t&igrave;nh y&ecirc;u tuổi trẻ th&ocirc;ng thường, m&agrave; l&agrave; một cuốn s&aacute;ch về tuổi trẻ, tuổi thanh xu&acirc;n, n&oacute; như khắc hoạ lại cuộc đời, lại thời ni&ecirc;n thiếu của ch&uacute;ng ta. C&oacute; những thứ một khi đ&aacute;nh mất l&agrave; kh&ocirc;ng thể t&igrave;m lại, c&oacute; những người đi qua nhau l&agrave; vĩnh viễn kh&ocirc;ng thể gặp lại được nữa. Ta sẽ m&atilde;i m&atilde;i kh&ocirc;ng thể t&igrave;m được những thứ m&igrave;nh bỏ lỡ, bởi đ&oacute; ch&iacute;nh l&agrave; cuộc đời l&agrave; thanh xu&acirc;n l&agrave; thời ni&ecirc;n thiếu kh&ocirc;ng thể quay lại.</p>\r\n\r\n<p>Nếu bạn c&ograve;n trẻ, xin h&atilde;y đối xử với những người xung quanh bạn thật tốt, thật dịu d&agrave;ng, kh&ocirc;ng phải v&igrave; sự cảm k&iacute;ch của người đ&oacute; đối với bạn, m&agrave; l&agrave; để sau n&agrave;y, khi bất chợt nh&igrave;n lại, bạn sẽ thấy trong tuổi thanh xu&acirc;n của m&igrave;nh c&oacute; &iacute;t điều phải &acirc;n hận hơn.</p>\r\n\r\n<h2>Viết về cuốn s&aacute;ch Hachiko ch&uacute; ch&oacute; đợi chờ</h2>\r\n\r\n<p>Em th&iacute;ch đọc s&aacute;ch, đọc truyện từ hồi c&ograve;n học lớp 2, những cuốn s&aacute;ch, cuốn truyện của em chất cao tr&ecirc;n gi&aacute; s&aacute;ch theo năm th&aacute;ng. C&oacute; những cuốn em đ&atilde; tặng hoặc cho đi, nhưng c&oacute; những cuốn s&aacute;ch em vẫn lu&ocirc;n muốn giữ lại. Một trong số đ&oacute; l&agrave; cuốn &quot;Hachiko ch&uacute; ch&oacute; đợi chờ&quot;.</p>\r\n\r\n<p>Lần đầu ti&ecirc;n em đọc cuốn s&aacute;ch n&agrave;y đ&atilde; rất x&uacute;c động v&agrave; ấn tượng, sau đ&oacute; em lại được xem phim về ch&iacute;nh ch&uacute; ch&oacute; trong cuốn s&aacute;ch, ch&iacute;nh v&igrave; thế m&agrave; cảm x&uacute;c của em về cuốn s&aacute;ch l&agrave; rất s&acirc;u đậm. T&aacute;c giả của cuốn s&aacute;ch l&agrave; Luis Prats (nằm trong danh mục s&aacute;ch của tổ chức Thư viện Thanh thiếu ni&ecirc;n quốc tế). Trang b&igrave;a cuốn s&aacute;ch ch&iacute;nh l&agrave; h&igrave;nh vẽ minh họa về ch&uacute; ch&oacute; Hachiko, Hachiko l&agrave; một giống ch&oacute; akita của Nhật Bản. Với c&aacute;ch tr&igrave;nh b&agrave;y bằng m&agrave;u nước rất đẹp chắc chắn sẽ đọng lại trong người đọc những sắc m&agrave;u kh&oacute; phai. Cuốn s&aacute;ch kể về cuộc sống v&agrave; t&igrave;nh cảm, sự trung th&agrave;nh của ch&uacute; ch&oacute; Hachiko d&agrave;nh cho người chủ của m&igrave;nh. Gi&aacute;o sư Eisaburo Ueno l&agrave; chủ của Hachiko, khi chủ c&ograve;n sống, Hachiko h&agrave;ng ng&agrave;y theo &ocirc;ng đến nh&agrave; ga tiễn &ocirc;ng đi l&agrave;m, đều đặn 5 giờ chiều lại đến nh&agrave; ga đ&oacute;n &ocirc;ng trở về. Nhưng rồi gi&aacute;o sư qua đời, Hachiko th&igrave; kh&ocirc;ng biết điều đ&oacute;, ch&uacute; ch&oacute; vẫn l&agrave;m c&ocirc;ng việc của m&igrave;nh, chờ chủ trong m&ograve;n mỏi bất kể mưa nắng kh&ocirc;ng thiếu một ng&agrave;y n&agrave;o trong suốt 10 năm. Sự trung th&agrave;nh của ch&uacute; ch&oacute; khiến Hachiko trở th&agrave;nh biểu tượng cho l&ograve;ng trung th&agrave;nh ở đất nước Nhật Bản, trở th&agrave;nh ch&uacute; ch&oacute; nổi tiếng nhất thế giới. Từng c&acirc;u chuyện của Hachiko khiến con tim em lay động, những h&agrave;ng nước mắt vẫn kh&ocirc;ng thể k&igrave;m được mỗi lần đọc s&aacute;ch.</p>\r\n\r\n<p>Em tin d&ugrave; l&agrave; người mạnh mẽ đến đ&acirc;u cũng sẽ phải rung động khi đọc cuốn s&aacute;ch n&agrave;y. Sau khi đọc cuốn s&aacute;ch em đ&atilde; nu&ocirc;i một ch&uacute; ch&oacute;, em rất y&ecirc;u qu&yacute; n&oacute; v&agrave; cũng đặt cho n&oacute; c&aacute;i t&ecirc;n Hachiko, đến nay ch&uacute; ch&oacute; đ&atilde; gần 5 tuổi.</p>\r\n\r\n<h2>Viết về cuốn s&aacute;ch Lời chia tay đẹp nhất thế gian</h2>\r\n\r\n<p>C&oacute; ai đ&oacute; đ&atilde; n&oacute;i rằng: &ldquo;Mỗi cuốn s&aacute;ch l&agrave; một bức tranh k&igrave; diệu, mở ra trước mắt ch&uacute;ng ta những ch&acirc;n trời tri thức. Quả thật như vậy, qua mỗi cuốn s&aacute;ch, ta sẽ bắt gặp những c&acirc;u chuyện, những con người với từng mảnh đời, số phận kh&aacute;c nhau. Đ&oacute; l&agrave; n&agrave;ng Kiều với th&acirc;n phận ch&igrave;m nổi, bấp b&ecirc;nh c&ugrave;ng 15 năm phi&ecirc;u bạt v&igrave; phải chịu đựng những hủ tục của một giai cấp thống trị thối n&aacute;t; l&agrave; cậu b&eacute; Hồng với một tuổi thơ bất hạnh c&ugrave;ng ho&agrave;n cảnh sống chật vật. Qua những c&acirc;u chuyện ấy, mỗi người sẽ tự r&uacute;t ra những b&agrave;i học cho ri&ecirc;ng m&igrave;nh. Với t&ocirc;i, cuốn s&aacute;ch đ&atilde; để lại trong t&ocirc;i nhiều x&uacute;c cảm v&agrave; ấn tượng nhất l&agrave; cuốn &ldquo;Lời chia tay đẹp nhất thế gian&rdquo; của t&aacute;c giả Noh Hee Kyung.</p>\r\n\r\n<p>D&ugrave; c&oacute; viết nhiều v&agrave; được khai th&aacute;c ở kh&iacute;a cạnh n&agrave;o th&igrave; c&oacute; lẽ, những c&acirc;u chuyện về gia đ&igrave;nh vẫn lu&ocirc;n l&agrave; chủ đề kh&ocirc;ng bao giờ xưa cũ. Bởi n&oacute; lu&ocirc;n chạm đến s&acirc;u thẳm trong l&ograve;ng mỗi người, v&agrave; bởi ch&uacute;ng ta, hầu hết ai cũng c&oacute; một gia đ&igrave;nh để nhớ về. &ldquo;Thật kỳ lạ, khi c&ograve;n tr&ecirc;n đời, mẹ chỉ đơn giản l&agrave; mẹ th&ocirc;i, chẳng c&oacute; g&igrave; hơn. Thế nhưng khi b&agrave; qua đời, t&ocirc;i bỗng c&oacute; suy nghĩ rằng b&agrave; ch&iacute;nh l&agrave; cả cuộc đời của m&igrave;nh.&rdquo; Chỉ với trang s&aacute;ch đầu ti&ecirc;n, t&aacute;c giả đ&atilde; đem đến một nỗi buồn man m&aacute;c c&ugrave;ng sự day dứt đến đau l&ograve;ng của những người ở lại, b&aacute;o trước về một cuộc chia tay buồn b&atilde; v&agrave; đầy tiếc nuối.</p>\r\n\r\n<p>Lời chia tay đẹp nhất thế gian l&agrave; c&acirc;u chuyện kể về b&agrave; nội trợ Kim In Hee v&agrave; gia đ&igrave;nh của b&agrave;. Kim In Hee l&agrave; một người mẹ, người vợ, người con d&acirc;u tảo tần, chịu thương chịu kh&oacute;. B&agrave; đ&atilde; d&agrave;nh cả cuộc đời để chăm s&oacute;c, vun v&eacute;n hạnh ph&uacute;c cho gia đ&igrave;nh nhỏ của m&igrave;nh.</p>\r\n\r\n<p>B&agrave; c&oacute; một người chồng l&agrave;m b&aacute;c sĩ, t&iacute;nh t&igrave;nh cộc cằn, v&ocirc; t&acirc;m; một người mẹ chồng gi&agrave; đ&atilde; mất tr&iacute; nhớ, khi th&igrave; đ&aacute;nh đập, bu&ocirc;ng những lời chửi bới, mắng nhiếc thậm tệ, một đứa con g&aacute;i lu&ocirc;n mải m&ecirc; chạy theo c&ocirc;ng việc v&agrave; t&igrave;nh cảm sai tr&aacute;i của m&igrave;nh m&agrave; chẳng mấy khi quan t&acirc;m đến mẹ; một đứa con trai lu&ocirc;n thất bại trong việc thi cử n&ecirc;n l&uacute;c n&agrave;o cũng ch&aacute;n chường v&agrave; một người em trai lu&ocirc;n đắm m&igrave;nh trong cờ bạc, rượu ch&egrave;. Họ bận bịu với c&ocirc;ng việc, với cuộc sống ngo&agrave;i kia, với những con người xa lạ m&agrave; qu&ecirc;n đi một người vẫn hằng ng&agrave;y lo cho họ từng bữa cơm, từng bộ quần &aacute;o. Cuộc sống của b&agrave; cứ tr&ocirc;i qua một c&aacute;ch b&igrave;nh dị v&agrave; lặng lẽ, với căn bếp nhỏ, với những c&ocirc;ng việc đang dang dở của m&igrave;nh.</p>\r\n\r\n<p>Cả cuộc đời b&agrave; chưa từng mưu cầu một điều g&igrave; lớn lao, ước mong duy nhất của b&agrave; chỉ l&agrave; cả nh&agrave; c&oacute; thể kịp dọn đến ng&ocirc;i nh&agrave; mới đang x&acirc;y để tr&aacute;nh những cơn gi&oacute; r&eacute;t của m&ugrave;a đ&ocirc;ng. Ấy vậy m&agrave;, ước mong nhỏ b&eacute;, b&igrave;nh dị ấy chưa kịp thực hiện, b&agrave; đ&atilde; phải bỏ lại tất cả. Trong một lần đi kiểm tra sức khỏe, b&agrave; được chẩn đo&aacute;n mắc căn bệnh ung thư giai đoạn cuối kh&ocirc;ng thể chữa trị. Căn bệnh n&agrave;y chắc hẳn đ&atilde; c&oacute; từ l&acirc;u, n&oacute; len lỏi v&agrave;o trong những cơn tiểu rắt c&ugrave;ng sự đau đớn, thế nhưng b&agrave; n&agrave;o quan t&acirc;m tới những điều ấy. Sự bận bịu với c&ocirc;ng việc đ&atilde; khiến b&agrave; chẳng m&agrave;ng đến bản th&acirc;n m&igrave;nh nữa. Đối mặt với c&aacute;i chết sắp đến của b&agrave;, c&aacute;c th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh mới dần nhận ra gi&aacute; trị c&ugrave;ng sự v&ocirc; t&acirc;m, bạc bẽo của m&igrave;nh, để rồi trong họ d&acirc;ng l&ecirc;n nỗi x&oacute;t xa, &acirc;n hận v&ocirc; c&ugrave;ng. Người chồng tuy l&agrave; một b&aacute;c sĩ nhưng giờ đ&acirc;y cũng chỉ biết đứng nh&igrave;n vợ m&igrave;nh ng&agrave;y ng&agrave;y bị cơn đau gi&agrave;y x&eacute;. Mặc d&ugrave; biết người vợ m&igrave;nh sẽ kh&ocirc;ng qua khỏi nhưng trong &ocirc;ng vẫn nhen nh&oacute;m những tia hy vọng. Người con g&aacute;i vốn mải m&ecirc; chạy theo c&ocirc;ng việc v&agrave; t&igrave;nh y&ecirc;u, nay đ&atilde; g&aacute;c lại tất cả để phụ gi&uacute;p mẹ việc nh&agrave;. Người con trai giờ đ&acirc;y lu&ocirc;n tha thiết cầu xin thời gian tr&ocirc;i chậm lại để mẹ nhận được tờ giấy b&aacute;o đại học m&agrave; b&agrave; hằng ao ước. Ngay cả người em trai ng&agrave;y ng&agrave;y chỉ biết rượu ch&egrave; giờ đ&acirc;y cũng đ&atilde; thay đổi, tu ch&iacute; l&agrave;m ăn. V&agrave; cũng ch&iacute;nh v&agrave;o những ng&agrave;y cuối đời, b&agrave; cũng được c&ugrave;ng gia đ&igrave;nh qu&acirc;y quần, hạnh ph&uacute;c trong ng&ocirc;i nh&agrave; mới. B&agrave; ra đi trong v&ograve;ng tay y&ecirc;u thương của cả gia đ&igrave;nh, trong nụ cười m&atilde;n nguyện. Cuộc chia tay của họ hiện l&ecirc;n thật x&oacute;t xa, buồn b&atilde; nhưng cũng đẹp nhất thế gian. Chắc hẳn, ai đọc cuốn s&aacute;ch cũng cảm thấy ngỡ ng&agrave;ng, giật m&igrave;nh v&igrave; bản th&acirc;n bấy l&acirc;u nay &ldquo;nhận&rdquo; t&igrave;nh y&ecirc;u thương, sự chăm s&oacute;c của mẹ như một lẽ thường t&igrave;nh m&agrave; chẳng hề để t&acirc;m. V&agrave; chỉ khi rời xa me, ta mới nhận ra, những điều ấy thật đ&aacute;ng tr&acirc;n qu&yacute; biết nhường n&agrave;o.</p>\r\n\r\n<p>Thật sự cảm ơn t&aacute;c giả Noh Hee Kyung đ&atilde; đem đến cho độc giả cuốn tiểu thuyết v&ocirc; c&ugrave;ng &yacute; nghĩa v&agrave; đầy sự x&uacute;c động. &ldquo;Lời chia tay đẹp nhất thế gian&rdquo; cũng ch&iacute;nh l&agrave; lời tri &acirc;n cuối c&ugrave;ng m&agrave; t&aacute;c giả gửi đến người mẹ qu&aacute; cố của m&igrave;nh v&agrave; đ&atilde; trở th&agrave;nh cuốn s&aacute;ch biểu tượng về t&igrave;nh cảm gia đ&igrave;nh, kiệt t&aacute;c lay động tr&aacute;i tim của biết bao thế hệ người H&agrave;n Quốc trong suốt 22 năm qua.</p>\r\n\r\n<h2>Viết về cuốn s&aacute;ch Tiếng gọi nơi hoang d&atilde;</h2>\r\n\r\n<p>Jack London t&ecirc;n thật l&agrave; John Griffith London, sinh năm 1876 v&agrave; mất năm 1916 tại San Francisco l&agrave; t&aacute;c giả của những t&aacute;c phẩm nổi tiếng thế giới như G&oacute;t sắt, Martin Eden, Nanh trắng,... v&agrave; cuốn s&aacute;ch em y&ecirc;u th&iacute;ch v&agrave; muốn giới thiệu t&ecirc;n gọi l&agrave; &ldquo; Tiếng gọi nơi hoang d&atilde;&rdquo;- t&aacute;c phẩm khiến thế giới phải tụng cả khi được xuất bản lần đầu năm 1903.</p>\r\n\r\n<p>Tiểu thuyết l&agrave; kết quả của chuyến đi tới Klondike t&igrave;m v&agrave;ng của t&aacute;c giả. Nội dung cuốn tiểu thuyết xoanh quanh nh&acirc;n vật ch&iacute;nh l&agrave; một ch&uacute; ch&oacute; t&ecirc;n l&agrave; Buck-một ch&uacute; ch&oacute; đ&atilde; phải trải qua qu&aacute; nhiều bất hạnh. Buck vốn dĩ đang sống trong một gia đ&igrave;nh kh&aacute; giả, &ldquo;n&oacute; l&agrave; vua của mọi thứ sinh vật b&ograve;, lết v&agrave; bay, kể cả con người nữa, trong c&aacute;i trang trại của ng&agrave;i thẩm ph&aacute;n Miller&rdquo;. V&agrave; Buck bị đẩy ra ngo&agrave;i x&atilde; hội , Buck bị bắt c&oacute;c đưa l&ecirc;n v&ugrave;ng Alaska tr&ecirc;n Bắc Cực để k&eacute;o xe trượt cho những người t&igrave;m v&agrave;ng, l&ograve;ng tự trọng của một vị vừa ki&ecirc;u h&atilde;nh đ&atilde; bị từng mũi d&ugrave;i cui đập đến tan vỡ v&agrave; từ đ&acirc;y bản năng sinh tồn của n&oacute; mới khơi dậy. Buck như một m&oacute;n h&agrave;ng t&ugrave;y &yacute; chuyển đổi từ người n&agrave;y sang người kh&aacute;c , phải qua tay những người chủ độc &aacute;c v&agrave; t&agrave;n nhẫn, bị b&oacute;c lột sức lao động trong b&atilde;o tuyết với những phần ăn &iacute;t ỏi. Cuối c&ugrave;ng, Buck gặp được John Thornton, một người chủ c&oacute; nh&acirc;n c&aacute;ch v&ocirc; c&ugrave;ng đẹp đẽ v&agrave; tốt bụng v&agrave; Buck nhanh ch&oacute;ng h&ograve;a nhập nơi đ&acirc;y. Lần đầu ti&ecirc;n n&oacute; cảm nhận được thế n&agrave;o l&agrave; t&igrave;nh y&ecirc;u thương thật sự chứ kh&ocirc;ng phải l&agrave; tinh thần tr&aacute;ch nhiệm bảo vệ c&aacute;c đứa con của thẩm ph&aacute;n Miller trước kia. Cuộc sống của Buck đang y&ecirc;n b&igrave;nh v&agrave; tốt đẹp th&igrave; hiện thực t&agrave;n khốc lại xảy đến với người chủ n&oacute; y&ecirc;u thương nhất: John Thornton. Chủ nh&acirc;n của n&oacute; đ&atilde; chết bởi đ&aacute;m người da đỏ Yeehats sau cuộc đi săn c&ugrave;ng những con ch&oacute; kh&aacute;c của n&oacute;. Giờ đ&acirc;y t&igrave;nh y&ecirc;u thương, l&ograve;ng trung th&agrave;nh của Buck đ&atilde; ho&aacute; th&agrave;nh sự tuyệt vọng v&agrave; nỗi đau thống khổ , n&oacute; chỉ biết lao v&agrave;o cấu x&eacute; những t&agrave;n dư c&ograve;n lại. Từ đ&oacute;, n&oacute; dứt bỏ con người, trở th&agrave;nh một con ch&oacute; hoang đi theo tiếng gọi từ nguy&ecirc;n thủy.</p>\r\n\r\n<p>&ldquo;Tiếng gọi hoang d&atilde;&rdquo; của Jack London l&agrave; một cuốn s&aacute;ch gi&agrave;u sự nghĩa. N&oacute; kh&ocirc;ng chỉ kể về cuộc thăng trầm của ch&uacute; ch&oacute; Buck nữa m&agrave; c&oacute; lẽ đ&ocirc;i khi ch&uacute;ng ta sẽ như thấy h&igrave;nh ảnh của ch&iacute;nh m&igrave;nh ở trong đ&oacute;. T&aacute;c phẩm cũng phản &aacute;nh rất hiện thực về sự kh&aacute;c biệt trong sinh tồn. Trong mỗi con người lu&ocirc;n c&oacute; một phần bản năng tồn tại, n&oacute; sẽ chỉ trỗi dậy khi ch&uacute;ng ta phải trải qua những đau thương đến mức gục ng&atilde;. Đọc cuốn tiểu thuyết n&agrave;y bạn sẽ kh&ocirc;ng chỉ đơn c&oacute; những cảm x&uacute;c vui buồn m&agrave; c&ograve;n l&agrave; sự đồng cảm tuyệt đối. V&agrave; cũng mong rằng sau khi đọc t&aacute;c phẩm, mỗi ch&uacute;ng ta sẽ y&ecirc;u thương động vật hơn v&igrave; ch&uacute;ng cũng c&oacute; bản t&iacute;nh y&ecirc;u thương, biết tr&acirc;n trọng.</p>\r\n\r\n<p>Em rất th&iacute;ch cuốn s&aacute;ch n&agrave;y của Jack London. Đ&oacute; l&agrave; một cuốn s&aacute;ch hay, truyền tải rất nhiều th&ocirc;ng điệp v&agrave; quan điểm &yacute; nghĩa cho cuộc sống thực tế của ch&uacute;ng ta. Em hy vọng trong tương lai c&oacute; thể t&igrave;m hiểu v&agrave; đọc về những cuốn s&aacute;ch như vậy.</p>\r\n\r\n<h2>Viết về cuốn s&aacute;ch Những kẻ mộng mơ</h2>\r\n\r\n<p>C&oacute; thể n&oacute;i s&aacute;ch l&agrave; thứ kh&ocirc;ng thể thiếu trong cuộc đời mỗi con người, s&aacute;ch cho ta tri thức, nu&ocirc;i dạy t&acirc;m hồn v&agrave; tr&iacute; tuệ của con người. V&agrave; chắc hẳn ai cũng c&oacute; &iacute;t nhất một cuốn s&aacute;ch y&ecirc;u th&iacute;ch của ri&ecirc;ng m&igrave;nh v&agrave; t&ocirc;i cũng vậy. &ldquo;Những kẻ mộng mơ&rdquo; của Elvis Nguyễn l&agrave; cuốn s&aacute;ch m&agrave; t&ocirc;i tr&acirc;n qu&yacute; nhất. Trong một đọc c&aacute;c mẩu tin tr&ecirc;n mạng, t&ocirc;i t&igrave;nh cờ đọc được một v&agrave;i đoạn tr&iacute;ch nhỏ của cuốn s&aacute;ch n&agrave;y, t&ocirc;i đ&atilde; nhận ra rằng đ&acirc;y l&agrave; cuốn s&aacute;ch của cuộc đời t&ocirc;i.</p>\r\n\r\n<p>C&oacute; thể khẳng định rằng, cuốn s&aacute;ch n&agrave;y sẽ hấp dẫn bạn ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n. Sự thu h&uacute;t của n&oacute; đến từ c&aacute;ch m&agrave; t&aacute;c giả phối m&agrave;u v&agrave; trang tr&iacute; b&igrave;a s&aacute;ch. Cuốn s&aacute;ch nhỏ gọn, d&agrave;i khoảng 17cm, rộng 12cm, t&ocirc;ng m&agrave;u trắng x&aacute;m rất ph&ugrave; hợp với nội dung của cuốn s&aacute;ch. Mặt b&igrave;a bọc b&igrave;a b&oacute;ng s&aacute;ng, trơn nhẵn. T&aacute;c giả thật tinh tế v&agrave; biết c&aacute;ch chiều l&ograve;ng bạn đọc khi đ&iacute;nh k&egrave;m theo cuốn s&aacute;ch những tấm ảnh nhỏ xinh d&ugrave;ng để người đọc viết lại cảm nhận của bản th&acirc;n.</p>\r\n\r\n<p>Hẳn rằng mỗi người ch&uacute;ng ta ai cũng đ&atilde; c&oacute; lần cảm thấy rằng m&igrave;nh thật v&ocirc; dụng, rằng cuộc sống qu&aacute; nh&agrave;m ch&aacute;n khiến ta bất lực, con người ta cảm thấy thật đơn độc, mệt mỏi v&agrave; đ&aacute;nh mất bản th&acirc;n m&igrave;nh. Vậy th&igrave; đ&acirc;y l&agrave; cuốn s&aacute;ch d&agrave;nh cho bạn. Cuốn s&aacute;ch gi&uacute;p ta t&igrave;m lại ch&iacute;nh m&igrave;nh, dẫn lối m&igrave;nh đến với b&igrave;nh y&ecirc;n v&agrave; hạnh ph&uacute;c. Cuốn s&aacute;ch kh&ocirc;ng hẳn l&agrave; tản văn hay tiểu thuyết m&agrave; c&oacute; lẽ đơn giản chỉ l&agrave; một cuốn nhật k&iacute;, nhật k&iacute; của những người đang theo đuổi đam m&ecirc;, người theo đuổi danh vọng hay kẻ đang t&igrave;m kiếm t&igrave;nh y&ecirc;u hoặc một thứ g&igrave; kh&aacute;c. Bởi vậy ta c&oacute; thể nh&igrave;n thấy được bản th&acirc;n m&igrave;nh ở trong đ&oacute;. Tuổi trẻ đầy những ho&agrave;i b&atilde;o nhưng cũng chất chứa nhiều nỗi đau, những vấp ng&atilde; khiến ta cảm nhận r&otilde; vị mặn ch&aacute;t của những tổn thương. Ta cảm nhận được vị cuộc đời : &ldquo;Ch&uacute;ng ta ngủ v&ugrave;i tuổi thanh xu&acirc;n của m&igrave;nh trong một qu&atilde;ng đời. Khi tỉnh giấc ch&uacute;ng ta cố gắng t&igrave;m hiểu xem m&igrave;nh l&agrave; ai. Tại sao m&igrave;nh lại tồn tại ở tr&ecirc;n đời?&rdquo;. Vậy tuổi trẻ c&oacute; g&igrave;? C&oacute; lẽ l&agrave; sự c&ocirc; đơn, sự yếu đuối c&ugrave;ng cực khi đối mặt với cuộc sống. Với lời văn giản đơn kh&ocirc;ng qu&aacute; m&agrave;u m&egrave; trau chuốt mang lại cho ta nhiều cảm gi&aacute;c ch&acirc;n thực, đầy những cảm x&uacute;c lẫn lộn. Ta như c&oacute; sự đồng điệu với t&aacute;c giả, từ đ&oacute; soi chiếu v&agrave;o bản th&acirc;n, t&igrave;m sự giải tho&aacute;t cho những kh&uacute;c mắc trong qu&aacute; khứ, mở l&ograve;ng bao dung cho những điều đ&atilde; qua để trưởng th&agrave;nh, để bắt đầu một h&agrave;nh tr&igrave;nh mới.</p>\r\n\r\n<p>Trong những th&aacute;ng ng&agrave;y, bản th&acirc;n mệt mỏi muốn ch&ugrave;n bước, cuốn s&aacute;ch l&agrave; liều thuốc xoa dịu t&acirc;m hồn t&ocirc;i, l&agrave;m t&ocirc;i cảm thấy m&igrave;nh được sẻ chia, thấu hiểu. &ldquo;Tuổi trẻ ch&uacute;ng ta như một giấc mộng d&agrave;i kh&ocirc;ng lối tho&aacute;t. Cho tới ng&agrave;y ch&uacute;ng ta tỉnh giấc v&agrave; t&igrave;m ra hướng đi cho ri&ecirc;ng m&igrave;nh&rdquo;. Tuổi trẻ của t&ocirc;i đ&atilde; c&oacute; l&uacute;c l&agrave; một trang giấy trắng v&igrave; sự lạc lối mất phương hướng nhưng đ&atilde; c&oacute; l&uacute;c n&oacute; cũng l&agrave; trang giấy &uacute;a v&agrave;ng nhuốm m&agrave;u v&igrave; những giọt mồ h&ocirc;i v&agrave; cả nước mắt.</p>\r\n\r\n<p>&ldquo;C&oacute; những thứ ở lại. C&oacute; những thứ sẽ đi. Một l&uacute;c n&agrave;o đ&oacute;. Một nơi n&agrave;o đ&oacute;. Ch&uacute;ng ta b&aacute;m v&iacute;u cảm x&uacute;c, sự mất m&aacute;t. M&agrave; trưởng th&agrave;nh. Qu&ecirc;n hết tất cả, hay chấp nhận hiện thực rằng ch&uacute;ng ta đ&atilde; xa?&rdquo; Mong ai đ&oacute; an y&ecirc;n c&ugrave;ng t&ocirc;i. - Elvis Nguyễn.</p>\r\n\r\n<h2>Viết về cuốn s&aacute;ch Ngữ văn 7 tập hai</h2>\r\n\r\n<p>Thời học sinh, l&agrave;m g&igrave; c&oacute; ai l&agrave; kh&ocirc;ng gắn b&oacute; với những quyển s&aacute;ch, những quyển vở? V&agrave; em cũng thế. Năm nay em học lớp bảy, v&agrave; từ đầu năm tới giờ, cuốn s&aacute;ch khiến em cảm thấy th&iacute;ch th&uacute; nhất l&agrave; cuốn s&aacute;ch gi&aacute;o khoa ngữ văn bảy tập hai.</p>\r\n\r\n<p>Ấn tượng đầu ti&ecirc;n của em về quyển s&aacute;ch l&agrave; h&igrave;nh ảnh trang b&igrave;a. Những d&ograve;ng chữ ngay ngắn, to nhỏ c&oacute; m&agrave;u sắc kh&aacute;c nhau được sắp xếp theo thứ tự. Điều em th&iacute;ch nhất ở trang n&agrave;y l&agrave; h&igrave;nh ảnh những b&ocirc;ng sen hồng điểm nhụy v&agrave;ng, l&aacute; xanh tr&ecirc;n nền xanh. N&oacute; tạo cho em cảm gi&aacute;c rất d&acirc;n d&atilde;, b&igrave;nh dị v&agrave; c&oacute; hồn.N&oacute; cũng l&agrave; vẻ đẹp thuần khiết của văn học Việt Nam.Khi mở s&aacute;ch ra, những trang giấy n&acirc;u c&ugrave;ng chữ đen hiện l&ecirc;n với c&aacute;c k&iacute;ch cỡ, kiểu d&aacute;ng kh&aacute;c nhau. Thỉnh thoảng lại c&oacute; những bức ảnh hay tranh vẽ xen kẽ c&aacute;c văn bản.Em rất th&iacute;ch những bức tranh đ&oacute;, v&igrave; n&oacute; mi&ecirc;u tả được nội dung của văn bản. Chắc hẳn c&aacute;c t&aacute;c giả phải k&igrave; c&ocirc;ng lắm mới c&oacute; thể chọn ra c&aacute;c bức ảnh ph&ugrave; hợp với t&aacute;c phẩm như vậy.</p>\r\n\r\n<p>Em rất tr&acirc;n trọng quyển s&aacute;ch v&igrave; n&oacute; như l&agrave; người thầy dạy em học văn. Ch&uacute;ng ta kh&ocirc;ng chỉ dựa v&agrave;o lời giảng văn của c&ocirc; tr&ecirc;n lớp m&agrave; học được, ta phải cần những chi tiết, những nội dung trong s&aacute;ch. Cuốn s&aacute;ch n&agrave;y đ&atilde; cho em những b&agrave;i văn, b&agrave;i thơ hay thời Đường, thời trung đại của c&aacute;c nh&agrave; văn, nh&agrave; thơ của c&aacute;c nước kh&aacute;c nhau. Em rất th&iacute;ch đọc những b&agrave;i văn, b&agrave;i thơ trong s&aacute;ch. Đọc ch&uacute;ng, em thấy được một t&acirc;m hồn nghệ sĩ đang thổn thức trong tr&aacute;i tim m&igrave;nh. Kh&ocirc;ng chỉ c&oacute; văn bản, cuốn s&aacute;ch c&ograve;n dạy em c&aacute;c kĩ năng văn học, c&aacute;ch l&agrave;m những b&agrave;i văn hay. C&aacute;c kĩ năng sẽ gi&uacute;p em l&agrave;m b&agrave;i tập kh&ocirc;ng bị sai cấu tr&uacute;c, c&aacute;ch d&ugrave;ng. Những d&agrave;n b&agrave;i, d&agrave;n &yacute; sẽ gi&uacute;p em l&agrave;m văn kh&ocirc;ng bị sai, lạc đề. Rồi những b&agrave;i văn mẫu l&agrave; gợi &yacute; gi&uacute;p em l&agrave;m b&agrave;i. Hay những c&acirc;u hỏi đ&atilde; l&agrave;m ch&uacute;ng em phải vắt &oacute;c suy nghĩ thật l&acirc;u, thật kĩ mới c&oacute; thể l&agrave;m được. S&aacute;ch kh&ocirc;ng chỉ l&agrave; thầy, m&agrave; s&aacute;ch c&ograve;n l&agrave; bạn. Mỗi khi đọc lại những b&agrave;i văn, em cảm thấy thật đồng cảm với những ho&agrave;n cảnh, số phận trong b&agrave;i. S&aacute;ch c&ugrave;ng chia sẻ niềm vui nỗi với em.</p>\r\n\r\n<p>H&ocirc;m nay, em cảm thấy rất hạnh ph&uacute;c khi c&oacute; cuốn s&aacute;ch để học. Đ&oacute; l&agrave; cuốn s&aacute;ch đ&atilde; mang lại cho em nhiều kiến thức bổ &iacute;ch, th&uacute; vị. Em mong rằng m&igrave;nh sẽ c&oacute; thật nhiều cuốn s&aacute;ch bổ &iacute;ch như thế nữa để học, bổ sung kiến thức cho m&igrave;nh. C&ograve;n mai n&agrave;y, khi đ&atilde; lớn, khi đ&atilde; chuyển khối, em sẽ đi quy&ecirc;n g&oacute;p những quyển s&aacute;ch n&agrave;y cho c&aacute;c bạn v&ugrave;ng s&acirc;u v&ugrave;ng xa, c&aacute;c bạn c&oacute; điều kiện kh&oacute; khăn để c&aacute;c bạn ấy c&oacute; s&aacute;ch học, c&oacute; kiến thức để trở th&agrave;nh những con người c&oacute; &iacute;ch cho x&atilde; hội.</p>\r\n\r\n<p>Được đọc v&agrave; học với những quyển s&aacute;ch l&agrave; một điều rất hạnh ph&uacute;c đối với em. Em rất th&iacute;ch v&agrave; tr&acirc;n trọng quyển s&aacute;ch n&agrave;y. Em hứa sẽ học thật giỏi để mai n&agrave;y cống hiến cho non s&ocirc;ng, đất nước.</p>\r\n\r\n<h2>Viết về cuốn s&aacute;ch Kh&ocirc;ng gia đ&igrave;nh</h2>\r\n\r\n<p>T&ocirc;i l&agrave; một đứa b&eacute; mồ c&ocirc;i&hellip;</p>\r\n\r\n<p>Sinh ra trong một gia đ&igrave;nh thiếu đi c&aacute;i siết chặt từ b&agrave;n tay cha, v&agrave; c&aacute;i &ocirc;m ấm &aacute;p của mẹ. t&ocirc;i đ&atilde; lu&ocirc;n ước ao c&oacute; được sự may mắn như bao đứa trẻ kh&aacute;c, nhưng cuộc sống chẳng rộng l&ograve;ng cho ai tất cả, t&ocirc;i đ&atilde; thực sự sụp đổ khi đối diện trước những khổ đau ấy. Nhưng bất ngờ t&igrave;m thấy v&agrave; đồng cảm với cuốn s&aacute;ch của một t&aacute;c gia nổi tiếng Hector Malot, trong cuốn s&aacute;ch đ&atilde; chứa đựng những khoảnh khắc đ&ocirc;i khi l&agrave;m t&ocirc;i đau đớn nhưng đ&ocirc;i khi lại thấy m&igrave;nh thật hạnh ph&uacute;c.</p>\r\n\r\n<p>B&atilde;o gi&ocirc;ng c&oacute; thể đến v&agrave; lấy đi hạnh ph&uacute;c của bất cứ một ai, điều quan trọng ở đ&acirc;y l&agrave; c&aacute;ch ta đ&oacute;n nhận những nghịch cảnh đ&oacute; v&agrave; đối mặt với ch&uacute;ng ra sao để l&agrave;m cho những điều b&igrave;nh dị trở n&ecirc;n phi thường. Giống như c&aacute;ch m&agrave; cậu b&eacute; Remi trong t&aacute;c phẩm &ldquo;KH&Ocirc;NG GIA Đ&Igrave;NH&rdquo; m&agrave; t&ocirc;i sắp sửa chia sẻ cho tất cả c&aacute;c bạn, cho những người đ&atilde; v&agrave; đang cần &ldquo;động lực&rdquo; để sống.</p>\r\n\r\n<p>&ldquo;Kh&ocirc;ng gia đ&igrave;nh&rdquo; kể về cuộc phi&ecirc;u bạt của R&ecirc;mi - một cậu b&eacute; kh&ocirc;ng cha mẹ, kh&ocirc;ng họ h&agrave;ng th&acirc;n th&iacute;ch, sống với mẹ nu&ocirc;i ở một v&ugrave;ng qu&ecirc; hẻo l&aacute;nh. Sau đ&oacute;, em đi theo đo&agrave;n xiếc ch&oacute;, khỉ của Vitali - một cụ gi&agrave; từng trải v&agrave; đức độ, đi chu du v&agrave; biểu diễn khắp mọi miền nước Ph&aacute;p. Remi đ&atilde; lớn l&ecirc;n trong sự gian khổ của cuộc h&agrave;nh tr&igrave;nh. Nhiều l&uacute;c cả đo&agrave;n được ăn no mặc ấm, cũng c&oacute; l&uacute;c phải đi trong trời đ&ocirc;ng gi&aacute; r&eacute;t, dưới cơn b&atilde;o tuyết, nhịn ăn tưởng chết đến nơi. Rồi cụ Vitali mất, chỉ c&ograve;n R&ecirc;mi v&agrave; ch&uacute; ch&oacute; Capi trung th&agrave;nh. Từ đ&acirc;y em tự lập, kh&ocirc;ng những lo cho m&igrave;nh, em c&ograve;n cưu mang ch&uacute; b&eacute; Matchia v&agrave;o g&aacute;nh h&aacute;t rong. Họ đ&atilde; trở th&agrave;nh đ&ocirc;i bạn th&acirc;n, c&ugrave;ng nhau phi&ecirc;u bạt, c&ugrave;ng chịu đựng gian khổ v&agrave; c&ugrave;ng sẻ chia niềm sung sướng. Nhưng cuộc đời em đ&acirc;u đ&atilde; hết gian tru&acirc;n! Đ&atilde; c&oacute; l&uacute;c em bị kẹt dưới hầm mỏ lụt đến mười bốn ng&agrave;y đ&ecirc;m. C&oacute; l&uacute;c kh&aacute;c, em v&agrave;o nhầm nh&agrave; một t&ecirc;n v&ocirc; lại v&igrave; tưởng đ&oacute; l&agrave; cha đẻ của m&igrave;nh. Rồi em lại phải v&agrave;o t&ugrave; v&igrave; bị mắc &aacute;n oan...Nhưng d&ugrave; ở đ&acirc;u, trong ho&agrave;n cảnh n&agrave;o, em vẫn noi theo nếp sống của cụ Vitali: giữ g&igrave;n nh&acirc;n phẩm, ngay thẳng, gan dạ, tự trọng, thương người, ham lao động, kh&ocirc;ng ngửa tay xin xỏ, kh&ocirc;ng dối tr&aacute;, nhớ ơn nghĩa, lu&ocirc;n l&agrave;m người c&oacute; &iacute;ch. Cuối c&ugrave;ng, giống như những kết th&uacute;c c&oacute; hậu trong c&aacute;c c&acirc;u chuyện cổ t&iacute;ch, R&ecirc;mi t&igrave;m lại được gia đ&igrave;nh thật sự của m&igrave;nh v&agrave; sống hạnh ph&uacute;c b&ecirc;n những người th&acirc;n y&ecirc;u.</p>\r\n\r\n<p>Qua cuộc phi&ecirc;u lưu của cậu b&eacute; R&ecirc;mi ta thấy được nhiều điều về số phận khổ đau của con người...Trước hết l&agrave; R&ecirc;mi - nạn nh&acirc;n của cuộc tranh gi&agrave;nh quyền thừa kế t&agrave;i sản. Em sống cuộc đời phi&ecirc;u bạt của kẻ h&aacute;t rong v&agrave; phải chịu bao nhi&ecirc;u gian khổ mới t&igrave;m lại được gia đ&igrave;nh. Cuộc đời của cụ Vitali cũng l&agrave; một bi kịch. Cụ vốn l&agrave; một người đứng tr&ecirc;n bậc cao nhất của nấc thang x&atilde; hội, nhưng cuối c&ugrave;ng lại phải l&agrave;m nghề xiếc ch&oacute; sống qua ng&agrave;y. Sức lực của cụ bị b&agrave;o m&ograve;n bởi sự khắc nghiệt của x&atilde; hội. Để rồi cụ chết, chết v&igrave; kh&ocirc;ng tin v&agrave;o l&ograve;ng tốt của con người. C&ograve;n cả ch&uacute; b&eacute; Matchia lu&ocirc;n bị đ&aacute;nh đập, h&agrave;nh hạ bởi &ocirc;ng chủ. Liệu c&ograve;n số phận n&agrave;o đ&aacute;ng buồn hơn thế?</p>\r\n\r\n<p>Nhưng cuốn s&aacute;ch n&agrave;y kh&ocirc;ng chỉ c&oacute; to&agrave;n đau khổ, n&oacute; cũng c&oacute; nhiều điều th&uacute; vị để đọc, để cảm thấy vui v&igrave; những gi&aacute; trị tốt đẹp của con người. Trước hết l&agrave; t&igrave;nh cảm gia đ&igrave;nh, t&igrave;nh thương của cụ Vitali d&agrave;nh cho R&ecirc;mi. Cụ đ&atilde; dạy em nhiều điều hay lẽ phải để tồn tại trong thế giới khắc nghiệt. B&agrave; Milligan v&agrave; Arthur cũng y&ecirc;u R&ecirc;mi. Họ chăm s&oacute;c, cưu mang khi em rơi v&agrave;o t&igrave;nh trạng kh&oacute; khăn nhất.V&agrave; cũng thật thiếu s&oacute;t nếu kh&ocirc;ng kể đến t&igrave;nh bạn thắm thiết giữa R&ecirc;mi v&agrave; Matchia. Hai em sống đ&ugrave;m bọc nhau, chia sẻ đắng cay ngọt b&ugrave;i,lu&ocirc;n s&aacute;t c&aacute;nh c&ugrave;ng nhau trong hoạn nạn. C&acirc;u chuyện n&agrave;y c&ograve;n ca ngợi lao động, ca ngợi tinh thần tự lập tự tin của giới trẻ.</p>\r\n\r\n<p>&ldquo;Tiến l&ecirc;n! Thế giới mở rộng trước mắt t&ocirc;i, t&ocirc;i c&oacute; thể dời ch&acirc;n xuống nam hay l&ecirc;n bắc, sang đ&ocirc;ng hay qua đo&agrave;i t&ugrave;y l&ograve;ng.</p>\r\n\r\n<p>T&ocirc;i chỉ l&agrave; một đứa trẻ con, thế m&agrave; t&ocirc;i đ&atilde; l&agrave;m chủ cuộc đời của t&ocirc;i&rdquo;</p>\r\n\r\n<p>H&atilde;y đắm ch&igrave;m d&ograve;ng cảm x&uacute;c của m&igrave;nh v&agrave;o những trang s&aacute;ch để bản th&acirc;n tự tin bước qua những th&aacute;ch thức m&agrave; cuộc sống đặt ra v&agrave; để tr&aacute;i tim ta cảm nhận được thế giới n&agrave;y cần lắm những t&igrave;nh y&ecirc;u thương như thế. Tuổi trẻ đừng ngại đương đầu với kh&oacute; khăn bởi nếu kh&ocirc;ng bị lạc đường ta sẽ kh&oacute; biết m&igrave;nh vốn rất sợ h&atilde;i, nếu kh&ocirc;ng bị dối gạt ta sẽ kh&oacute; biết m&igrave;nh rất dễ tổn thương, nếu kh&ocirc;ng bị bỏ rơi ta sẽ kh&oacute; thấy được t&iacute;nh yếu đuối v&agrave; dựa dẫm của m&igrave;nh. KH&Ocirc;NG GIA Đ&Igrave;NH l&agrave; một t&aacute;c phẩm đầy t&iacute;nh nh&acirc;n văn, đ&atilde; mang đến cho độc giả những gi&aacute; trị tinh thần tồn tại m&atilde;i theo năm th&aacute;ng. T&aacute;c phẩm như ngọn đ&egrave;n soi rọi cho biết bao t&acirc;m hồn tho&aacute;t khỏi những b&oacute;ng đ&ecirc;m của cuộc đời. V&agrave; cũng để những ai &ldquo;c&oacute; gia đ&igrave;nh&rdquo; suy ngẫm, l&agrave;m sao sống cho tốt, xứng đ&aacute;ng với c&aacute;i may mắn m&agrave; số phận ban cho.</p>', 'https://res.cloudinary.com/dizwixa7c/image/upload/v1681293962/PRO1014_WE18103_Nhom_6/Products/ek29bl3xqehgxafu3u9y.jpg', 'PRO1014_WE18103_Nhom_6/Products/ek29bl3xqehgxafu3u9y', 1, '2023-04-12 10:06:03', '2023-04-13 17:24:13');
INSERT INTO `post` (`id`, `user_id`, `product_code`, `title`, `introduction`, `slug`, `content`, `image_url`, `image_public_id`, `view`, `created_at`, `updated_at`) VALUES
(4, 1, NULL, 'Bảo mật thông tin', 'CHÍNH SÁCH BẢO MẬT THÔNG TIN', 'bao-mat-thong-tin', '<h2><strong>CH&Iacute;NH S&Aacute;CH BẢO MẬT TH&Ocirc;NG TIN</strong></h2>\r\n\r\n<h2><strong>1. Mục đ&iacute;ch &aacute;p dụng</strong></h2>\r\n\r\n<p>Ch&iacute;nh s&aacute;ch bảo mật v&agrave; chia sẻ th&ocirc;ng tin n&agrave;y &ldquo;Ch&iacute;nh S&aacute;ch&rdquo;&nbsp;nhằm đảm bảo an to&agrave;n th&ocirc;ng tin li&ecirc;n quan đến c&aacute;c tổ chức, c&aacute; nh&acirc;n tham gia truy cập v&agrave;/hoặc giao dịch tr&ecirc;n website&nbsp;www.j-p.vn&nbsp;thuộc quyền sở hữu của hệ thống&nbsp;<strong>thời trang nữ</strong>&nbsp;J-P Fashion. Ch&iacute;nh S&aacute;ch n&agrave;y m&ocirc; tả c&aacute;ch www.j-p.vn tiếp nhận, tổng hợp, lưu giữ, sử dụng v&agrave; bảo vệ th&ocirc;ng tin của c&aacute;c tổ chức, c&aacute; nh&acirc;n tham gia truy cập, giao dịch tr&ecirc;n www.j-p.vn &ldquo;Kh&aacute;ch H&agrave;ng&rdquo;. Việc Kh&aacute;ch H&agrave;ng truy cập hoặc thực hiện giao dịch tr&ecirc;n www.j-p.vn được hiểu l&agrave; Kh&aacute;ch H&agrave;ng đ&atilde; đọc, hiểu v&agrave; đồng &yacute; tu&acirc;n thủ Ch&iacute;nh S&aacute;ch n&agrave;y, kể cả c&aacute;c phi&ecirc;n bản sửa đổi, bổ sung của Ch&iacute;nh S&aacute;ch. Phi&ecirc;n bản sửa đổi, bổ sung Ch&iacute;nh S&aacute;ch n&agrave;y (nếu c&oacute;) sẽ c&oacute; hiệu lực sau 5 ng&agrave;y kể từ ng&agrave;y việc sửa đổi, bổ sung Ch&iacute;nh S&aacute;ch được th&ocirc;ng b&aacute;o tr&ecirc;n www.j-p.vn.</p>\r\n\r\n<h2><strong>2. Quy định cụ thể</strong></h2>\r\n\r\n<h2><strong>2.1. Về việc thu thập th&ocirc;ng tin</strong></h2>\r\n\r\n<p>- Khi Kh&aacute;ch H&agrave;ng thực hiện giao dịch v&agrave;/hoặc đăng k&yacute; mở t&agrave;i khoản tại www.j-p.vn, t&ugrave;y từng thời điểm, Kh&aacute;ch H&agrave;ng phải cung cấp một số th&ocirc;ng tin cần thiết cho việc thực hiện giao dịch v&agrave; hoặc đăng k&yacute; t&agrave;i khoản &ldquo;Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng&rdquo;.</p>\r\n\r\n<p>- Kh&aacute;ch H&agrave;ng c&oacute; tr&aacute;ch nhiệm đảm bảo những th&ocirc;ng tin Kh&aacute;ch H&agrave;ng cung cấp l&agrave; đầy đủ v&agrave; ch&iacute;nh x&aacute;c v&agrave; lu&ocirc;n cập nhật th&ocirc;ng tin để đảm bảo t&iacute;nh đầy đủ v&agrave; ch&iacute;nh x&aacute;c. www.j-p.vn kh&ocirc;ng chịu tr&aacute;ch nhiệm giải quyết bất kỳ tranh chấp n&agrave;o nếu th&ocirc;ng tin Kh&aacute;ch H&agrave;ng cung cấp kh&ocirc;ng ch&iacute;nh x&aacute;c hoặc kh&ocirc;ng được cập nhật hoặc giả mạo.&nbsp;</p>\r\n\r\n<h2><strong>2.2. Về việc lưu giữ v&agrave; bảo mật th&ocirc;ng tin ri&ecirc;ng</strong></h2>\r\n\r\n<p>- Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng, cũng như c&aacute;c th&ocirc;ng tin trao đổi giữa Kh&aacute;ch H&agrave;ng v&agrave; www.j-p.vn, đều được lưu giữ v&agrave; bảo mật bởi hệ thống của www.j-p.vn, ri&ecirc;ng th&ocirc;ng tin thẻ thanh to&aacute;n của Kh&aacute;ch H&agrave;ng sẽ do c&aacute;c đối t&aacute;c Cổng thanh to&aacute;n của www.j-p.vn bảo mật theo ti&ecirc;u chuẩn quốc tế PCI DSS.</p>\r\n\r\n<p>- www.j-p.vn c&oacute; c&aacute;c biện ph&aacute;p th&iacute;ch hợp về kỹ thuật v&agrave; an ninh để ngăn chặn việc truy cập, sử dụng tr&aacute;i ph&eacute;p Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng. www.j-p.vn cũng thường xuy&ecirc;n phối hợp với c&aacute;c chuy&ecirc;n gia bảo mật nhằm cập nhật những th&ocirc;ng tin mới nhất về an ninh mạng để đảm bảo sự an to&agrave;n cho Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng khi Kh&aacute;ch H&agrave;ng truy cập, đăng k&yacute; mở t&agrave;i khoản v&agrave;/hoặc sử dụng c&aacute;c t&iacute;nh năng của www.j-p.vn. Khi thu thập dữ liệu, www.j-p.vn thực hiện lưu giữ v&agrave; bảo mật Th&ocirc;ng&nbsp;Tin Kh&aacute;ch H&agrave;ng tại hệ thống m&aacute;y chủ v&agrave; c&aacute;c Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng n&agrave;y được bảo đảm an to&agrave;n bằng c&aacute;c hệ thống tường lửa (firewall), c&aacute;c biện ph&aacute;p kiểm so&aacute;t truy cập, m&atilde; h&oacute;a dữ liệu.</p>\r\n\r\n<p>- C&aacute;c th&ocirc;ng tin thẻ thanh to&aacute;n của Kh&aacute;ch H&agrave;ng được c&aacute;c đối t&aacute;c cổng thanh to&aacute;n của www.j- p.vn bảo vệ theo ti&ecirc;u chuẩn quốc tế. www.j-p.vn kh&ocirc;ng cho ph&eacute;p c&aacute;c b&ecirc;n thứ ba theo d&otilde;i hoặc thu thập th&ocirc;ng tin của Kh&aacute;ch H&agrave;ng tr&ecirc;n c&aacute;c website th&agrave;nh phần của www.j-p.vn.</p>\r\n\r\n<p>- Đối với c&aacute;c t&agrave;i khoản đ&atilde; đ&oacute;ng ch&uacute;ng t&ocirc;i vẫn lưu trữ Th&ocirc;ng Tin C&aacute; Nh&acirc;n v&agrave; truy cập của Kh&aacute;ch H&agrave;ng để phục vụ cho c&aacute;c mục đ&iacute;ch ph&ograve;ng chống gian lận, điều tra, giải đ&aacute;p thắc mắc&hellip; C&aacute;c Th&ocirc;ng Tin C&aacute; Nh&acirc;n n&agrave;y sẽ được www.j-p.vn lưu giữ tr&ecirc;n hệ thống m&aacute;y chủ tối đa trong v&ograve;ng 11 th&aacute;ng kể từ ng&agrave;y Kh&aacute;ch H&agrave;ng đ&oacute;ng t&agrave;i khoản tr&ecirc;n www.j-p.vn. Sau khi thời hạn n&agrave;y&nbsp;kết th&uacute;c, www.j-p.vn sẽ tiến h&agrave;nh x&oacute;a vĩnh viễn Th&ocirc;ng Tin C&aacute; Nh&acirc;n của Bạn.</p>\r\n\r\n<p>- Kh&aacute;ch H&agrave;ng tuyệt đối kh&ocirc;ng được c&oacute; bất kỳ h&agrave;nh vi sử dụng c&ocirc;ng cụ, chương tr&igrave;nh để can thiệp tr&aacute;i ph&eacute;p v&agrave;o hệ thống hay l&agrave;m thay đổi cấu tr&uacute;c dữ liệu của www.j-p.vn, cũng như bất kỳ h&agrave;nh vi n&agrave;o kh&aacute;c nhằm ph&aacute;t t&aacute;n, cổ vũ cho c&aacute;c hoạt động với mục đ&iacute;ch can thiệp, ph&aacute; hoại hay x&acirc;m nhập v&agrave;o dữ liệu của hệ thống www.j-p.vn, cũng như c&aacute;c c&aacute;c h&agrave;nh vi m&agrave; ph&aacute;p luật Việt Nam nghi&ecirc;m cấm. Trong trường hợp www.j-p.vn ph&aacute;t hiện Kh&aacute;ch H&agrave;ng c&oacute; h&agrave;nh vi cố t&igrave;nh giả mạo, gian lận, ph&aacute;t t&aacute;n c&aacute;c th&ocirc;ng tin tr&aacute;i ph&eacute;p,&hellip; www.j-p.vn c&oacute; quyền chuyển Th&ocirc;ng Tin C&aacute; Nh&acirc;n của Kh&aacute;ch H&agrave;ng cho c&aacute;c cơ quan c&oacute; thẩm quyền để xử l&yacute; theo quy định ph&aacute;p luật.</p>\r\n\r\n<h2><strong>2.3. Về việc sử dụng Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng</strong></h2>\r\n\r\n<p>- www.j-p.vn c&oacute; quyền sử dụng c&aacute;c th&ocirc;ng tin Kh&aacute;ch H&agrave;ng cung cấp, bao gồm nhưng kh&ocirc;ng giới hạn ở Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng để:</p>\r\n\r\n<p>- Cung cấp c&aacute;c dịch vụ/tiện &iacute;ch cho Kh&aacute;ch H&agrave;ng dựa tr&ecirc;n nhu cầu v&agrave; c&aacute;c th&oacute;i quen của Kh&aacute;ch H&agrave;ng khi truy cập v&agrave;o www.j-p.vn;</p>\r\n\r\n<p>- Ph&aacute;t hiện, ngăn chặn c&aacute;c hoạt động giả mạo, ph&aacute; hoại t&agrave;i khoản của Kh&aacute;ch H&agrave;ng hoặc c&aacute;c hoạt động giả mạo nhận dạng của Kh&aacute;ch H&agrave;ng tr&ecirc;n www.j-p.vn;</p>\r\n\r\n<p>- Li&ecirc;n lạc, hỗ trợ li&ecirc;n lạc v&agrave; giải quyết với Kh&aacute;ch H&agrave;ng trong những trường hợp đặc biệt.</p>\r\n\r\n<h2><strong>&nbsp;2.4. Về việc li&ecirc;n kết với c&aacute;c website kh&aacute;c</strong></h2>\r\n\r\n<p>- Kh&aacute;ch H&agrave;ng c&oacute; tr&aacute;ch nhiệm bảo vệ th&ocirc;ng tin t&agrave;i khoản của m&igrave;nh v&agrave; kh&ocirc;ng cung cấp bất kỳ th&ocirc;ng tin n&agrave;o li&ecirc;n quan đến t&agrave;i khoản v&agrave; mật khẩu truy cập tr&ecirc;n www.j-p.vn tr&ecirc;n c&aacute;c website kh&aacute;c ngoại trừ khi đăng nhập v&agrave;o địa chỉ ch&iacute;nh thức của J-P Fashion tại&nbsp;www.j-p.vn.</p>\r\n\r\n<p>- Kh&aacute;ch H&agrave;ng kh&ocirc;ng chịu tr&aacute;ch nhiệm về những vấn đề ph&aacute;t sinh khi Kh&aacute;ch H&agrave;ng truy cập v&agrave;o www.j-p.vn từ c&aacute;c website kh&aacute;c kh&ocirc;ng phải l&agrave; website ch&iacute;nh thức của www.j-p.vn.</p>\r\n\r\n<h2><strong>&nbsp;2.5. Về việc chia sẻ Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng</strong></h2>\r\n\r\n<p>- www.j-p.vn kh&ocirc;ng cung cấp Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng cho bất kỳ b&ecirc;n thứ ba n&agrave;o trừ trường hợp phải thực hiện theo y&ecirc;u cầu của c&aacute;c cơ quan Nh&agrave; nước c&oacute; thẩm quyền, hoặc theo quy định của ph&aacute;p luật, hoặc khi việc cung cấp th&ocirc;ng tin đ&oacute; l&agrave; cần thiết để www.j-p.vn cung cấp dịch vụ tiện &iacute;ch cho Kh&aacute;ch H&agrave;ng (v&iacute; dụ: cung cấp c&aacute;c th&ocirc;ng tin giao nhận cần thiết cho c&aacute;c đơn vị đối t&aacute;c vận chuyển &hellip;).</p>\r\n\r\n<p>- Ngo&agrave;i c&aacute;c trường hợp n&ecirc;u tr&ecirc;n, www.j-p.vn sẽ c&oacute; th&ocirc;ng b&aacute;o cụ thể cho Kh&aacute;ch H&agrave;ng khi phải tiết lộ Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng cho một b&ecirc;n thứ ba. Trong trường hợp n&agrave;y, www.j-p.vn cam kết sẽ chỉ tiết lộ Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng khi được sự đồng &yacute; của Kh&aacute;ch H&agrave;ng.</p>\r\n\r\n<p>- www.j-p.vn c&oacute; thể chia sẻ Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng cho c&aacute;c mục đ&iacute;ch sau:</p>\r\n\r\n<p>-&nbsp; Nghi&ecirc;n cứu thị trường v&agrave; c&aacute;c b&aacute;o c&aacute;o ph&acirc;n t&iacute;ch: www.j-p.vn c&oacute; thể d&ugrave;ng Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng để nghi&ecirc;n cứu thị trường, tổng hợp, ph&acirc;n t&iacute;ch th&ocirc;ng tin chung của Kh&aacute;ch H&agrave;ng (v&iacute; dụ độ tuổi trung b&igrave;nh, khu vực địa l&yacute;), th&ocirc;ng tin chi tiết sẽ được ẩn v&agrave; chỉ được d&ugrave;ng để phục vụ c&ocirc;ng việc thống k&ecirc;. Trong trường hợp www.j-p.vn tiến h&agrave;nh khảo s&aacute;t cần sự tham gia của Kh&aacute;ch H&agrave;ng, bất kỳ c&acirc;u trả lời cho khảo s&aacute;t hoặc thăm d&ograve; dư luận m&agrave; Kh&aacute;ch H&agrave;ng cung cấp cho www.j-p.vn sẽ kh&ocirc;ng được chuyển cho bất kỳ b&ecirc;n thứ ba n&agrave;o.</p>\r\n\r\n<p>- Trao đổi Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng c&aacute;c b&ecirc;n thứ 3 l&agrave; đối t&aacute;c, đại l&yacute; của J-P Fashion: www.j-p.vn c&oacute; thể chuyển Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng cho c&aacute;c đại l&yacute; v&agrave; nh&agrave; thầu phụ để l&agrave;m ph&acirc;n t&iacute;ch dữ liệu, tiếp thị v&agrave; hỗ trợ dịch vụ kh&aacute;ch h&agrave;ng. www.j-p.vn cũng c&oacute; thể trao đổi&nbsp;Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng với b&ecirc;n thứ ba cho mục đ&iacute;ch chống gian lận v&agrave; giảm rủi ro t&iacute;n dụng.</p>\r\n\r\n<p>- Trao đổi Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng với c&aacute;c đối t&aacute;c quảng c&aacute;o: Hệ thống theo d&otilde;i h&agrave;nh vi của Kh&aacute;ch H&agrave;ng được www.j-p.vn sử dụng tr&ecirc;n k&ecirc;nh hiển thị quảng c&aacute;o (v&iacute; dụ như tiếp thị lại Kh&aacute;ch H&agrave;ng, hệ thống quản l&yacute; c&aacute;c chiến dịch quảng c&aacute;o DoubleClick, b&aacute;o c&aacute;o về nh&acirc;n khẩu, sở th&iacute;ch của kh&aacute;ch h&agrave;ng với c&ocirc;ng cụ Google Analytics...) c&oacute; thể thu thập được c&aacute;c&nbsp;th&ocirc;ng tin như độ tuổi, giới t&iacute;nh, sở th&iacute;ch v&agrave; số lần tương t&aacute;c với số lần xuất hiện của quảng c&aacute;o. Với t&iacute;nh năng c&agrave;i đặt quảng c&aacute;o, Kh&aacute;ch H&agrave;ng c&oacute; thể lựa chọn tho&aacute;t ra khỏi t&iacute;nh năng theo d&otilde;i h&agrave;nh vi kh&aacute;ch h&agrave;ng của Google Analytics v&agrave; lựa chọn c&aacute;ch xuất hiện của k&ecirc;nh hiển thị quảng c&aacute;o tr&ecirc;n Google.</p>\r\n\r\n<p>-&nbsp; Trao đổi Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng với những đơn vị kinh doanh kh&aacute;c m&agrave; www.j-p.vn c&oacute; kế hoạch s&aacute;p nhập hoặc mua lại: Trong trường hợp n&agrave;y, www.j-p.vn sẽ y&ecirc;u cầu những đơn vị đ&oacute; tu&acirc;n thủ nghi&ecirc;m ngặt theo Ch&iacute;nh S&aacute;ch n&agrave;y.</p>\r\n\r\n<h2>&nbsp;<strong>2.6. Sử dụng Cookie</strong></h2>\r\n\r\n<p>www.j-p.vn cung cấp c&aacute;c tập tin cookie hoặc c&aacute;c c&ocirc;ng nghệ tương tự, nhằm thu thập c&aacute;c th&ocirc;ng tin như: lịch sử truy cập, c&aacute;c lựa chọn của Kh&aacute;ch H&agrave;ng khi truy cập v&agrave; sử dụng t&iacute;nh năng của www.j-p.vn... nhằm tăng trải nghiệm bảo mật v&agrave; gi&uacute;p ww.j-p.vn hiểu r&otilde; nhu cầu, sở th&iacute;ch của Kh&aacute;ch H&agrave;ng để c&oacute; thể cung cấp dịch vụ tốt hơn.</p>\r\n\r\n<h2><strong>&nbsp;2.7. Li&ecirc;n hệ, giải đ&aacute;p thắc mắc</strong></h2>\r\n\r\n<p>Bất kỳ khi n&agrave;o Kh&aacute;ch H&agrave;ng cần hỗ trợ, xin li&ecirc;n lạc:</p>\r\n\r\n<p>Hotline:&nbsp;<em><strong>0916305533</strong></em>&nbsp;</p>\r\n\r\n<p>Email:&nbsp;cskh@j-p.vn</p>', 'https://res.cloudinary.com/dizwixa7c/image/upload/v1681410276/PRO1014_WE18103_Nhom_6/Products/vzocoa2enfksxfzfyc3d.jpg', 'PRO1014_WE18103_Nhom_6/Products/vzocoa2enfksxfzfyc3d', 0, '2023-04-13 18:24:37', '2023-04-13 18:24:37'),
(5, 1, NULL, 'hướng dẫn mua hàng', 'HƯỚNG DẪN MUA HÀNG', 'huong-dan-mua-hang', '<p><strong>Mua sắm trực tuyến tại hệ thống thời trang nữ&nbsp;J-P Fashion thật dễ d&agrave;ng.</strong></p>\r\n\r\n<p><strong>Qu&yacute; kh&aacute;ch&nbsp;l&agrave;m theo hướng dẫn&nbsp;sau:</strong>&nbsp;</p>\r\n\r\n<hr />\r\n<h2><strong>1. Truy cập v&agrave;o website:&nbsp;</strong><strong><a href=\"https://j-p.vn/\">https://j-p.vn/</a>&nbsp;v&agrave; chọn mục sản phẩm:</strong></h2>\r\n\r\n<p>Bạn chọn mục sản phẩm (&Aacute;o - Quần - V&aacute;y - Đầm...) cần mua</p>\r\n\r\n<p>Bạn n&ecirc;n Đăng k&yacute; th&agrave;nh vi&ecirc;n để nhận được nhiều ưu đ&atilde;i. Tham khảo chương tr&igrave;nh tại mục&nbsp;<a href=\"https://j-p.vn/khach-hang-thanh-vien.html\">Kh&aacute;ch H&agrave;ng Th&acirc;n Thiết</a></p>\r\n\r\n<p><img alt=\"\" src=\"https://j-p.vn/vnt_upload/File/03_2020/buoc_1.png\" /></p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h2><strong>2. Nhấp chuột v&agrave;o sản phẩm cần mua v&agrave; Sử dụng bộ lọc:</strong></h2>\r\n\r\n<p>Bạn nhấp v&agrave;o h&igrave;nh để xem chi thiết th&ocirc;ng tin sản phẩm: M&agrave;u sắc; K&iacute;ch thước; Gi&aacute;...của sản phẩm.</p>\r\n\r\n<p>Bạn sử dụng bộ lọc để t&igrave;m kiếm nhanh sản phẩm m&igrave;nh ưng &yacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"https://j-p.vn/vnt_upload/File/03_2020/buoc_2.png\" /></p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h2><strong>3. Lựa chọn M&agrave;u Sắc v&agrave; K&iacute;ch Thước:</strong></h2>\r\n\r\n<p>Bạn chọn m&agrave;u sắc v&agrave; k&iacute;ch thước sản phẩm cần mua. Cho v&agrave;o giỏ h&agrave;ng nếu bạn muốn tiếp tục mua sản phẩm kh&aacute;c. Bạn c&oacute; thể đặt h&agrave;ng để tiến th&agrave;nh thanh to&aacute;n mua sản phẩm.</p>\r\n\r\n<p><img alt=\"\" src=\"https://j-p.vn/vnt_upload/File/03_2020/buoc_3.png\" /></p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h2><strong>4. Sử dụng M&atilde; Khuyến M&atilde;i; Điểm T&iacute;ch Lũy Mua H&agrave;ng:</strong></h2>\r\n\r\n<p>Bạn nhập m&atilde; khuyễn m&atilde;i&nbsp;để được giảm gi&aacute; cho đơn h&agrave;ng.</p>\r\n\r\n<p>Bạn đăng nhập đổi điểm t&iacute;ch lũy mua h&agrave;ng. Tham khảo chương tr&igrave;nh tại mục&nbsp;<a href=\"https://j-p.vn/khach-hang-thanh-vien.html\">Kh&aacute;ch H&agrave;ng Th</a>&acirc;n Thiết</p>\r\n\r\n<p><img alt=\"\" src=\"https://j-p.vn/vnt_upload/File/03_2020/buoc_4.png\" /></p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h2><strong>5. Điền Th&ocirc;ng Tin Kh&aacute;ch H&agrave;ng v&agrave; Chọn Phương Thức Thanh To&aacute;n</strong></h2>\r\n\r\n<p>Bạn điền chi tiết th&ocirc;ng tin người mua v&agrave; nhận sản phẩm.</p>\r\n\r\n<p>Chọn phương thức thanh to&aacute;n ph&ugrave; hợp với bạn<strong>:</strong></p>\r\n\r\n<p><strong>Thanh To&aacute;n Khi Nhận H&agrave;ng (COD)</strong></p>\r\n\r\n<p><strong>Thanh To&aacute;n Trực Tuyến Alepay: Master Card; Visa; JCB; ATM đều chấp nhận</strong></p>\r\n\r\n<p><strong>Thanh To&aacute;n Qua T&agrave;i Khoản Ng&acirc;n H&agrave;ng</strong></p>\r\n\r\n<p><strong>Thanh To&aacute;n V&agrave; Nhận H&agrave;ng Tại Ph&ograve;ng Giao Dịch</strong></p>\r\n\r\n<p><strong>Thanh To&aacute;n V&agrave; Nhận H&agrave;ng Tại</strong>&nbsp;<strong><a href=\"https://j-p.vn/he-thong.html\">Cửa H&agrave;ng</a></strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://j-p.vn/vnt_upload/File/03_2020/buoc_5.png\" /></p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h2><strong>6. Đặt H&agrave;ng Th&agrave;nh C&ocirc;ng</strong></h2>\r\n\r\n<p>Qu&yacute; kh&aacute;ch sẽ nhận được SMS v&agrave; Email&nbsp;x&aacute;c nhận đơn h&agrave;ng đặt th&agrave;nh c&ocirc;ng.</p>\r\n\r\n<p>* Đơn h&agrave;ng Online sẽ được x&aacute;c nhận qua điện thoại trong v&ograve;ng 48h l&agrave;m việc.</p>\r\n\r\n<p>* Nếu J-P Fashion kh&ocirc;ng thể li&ecirc;n hệ được Qu&yacute; kh&aacute;ch, đơn h&agrave;ng sẽ tự động huỷ tr&ecirc;n hệ thống.</p>\r\n\r\n<p>* Vui l&ograve;ng li&ecirc;n hệ hotline&nbsp;<em><strong>0916305533</strong></em>&nbsp;để được hỗ trợ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://j-p.vn/vnt_upload/File/03_2020/buoc_6.png\" /></p>\r\n\r\n<p><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 27px; left: 468.213px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'https://res.cloudinary.com/dizwixa7c/image/upload/v1681411795/PRO1014_WE18103_Nhom_6/Products/qxfwi3sorkbldkacljab.jpg', 'PRO1014_WE18103_Nhom_6/Products/qxfwi3sorkbldkacljab', 0, '2023-04-13 19:01:05', '2023-04-13 19:01:05'),
(7, 1, NULL, 'CHÍNH SÁCH KIỂM HÀNG', 'CHÍNH SÁCH KIỂM HÀNG', 'chinh-sach-kiem-hang', '<p><strong><em>Ch&iacute;nh s&aacute;ch kiểm h&agrave;ng</em></strong></p>\r\n\r\n<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em>Nhằm đ&aacute;p ứng nhu cầu v&agrave; bảo vệ tối đa quyền lợi kh&aacute;ch h&agrave;ng khi mua sản phẩm của J-P Fashion. Ch&uacute;ng t&ocirc;i đ&atilde; triển khai ch&iacute;nh s&aacute;ch hỗ trợ việc xem v&agrave; kiểm tra h&agrave;ng h&oacute;a khi giao h&agrave;ng. Kh&aacute;ch h&agrave;ng khi nhận được h&agrave;ng từ nh&acirc;n vi&ecirc;n vận chuyển c&oacute; thể mở ni&ecirc;m phong xem h&agrave;ng của ch&uacute;ng t&ocirc;i để đồng kiểm tra h&agrave;ng h&oacute;a với nh&acirc;n vi&ecirc;n vận chuyển.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lưu &yacute;:&nbsp;J-P Fashion hỗ trợ cho kh&aacute;ch h&agrave;ng xem h&agrave;ng nhưng vui l&ograve;ng kh&ocirc;ng thử.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trong trường hợp nh&acirc;n vi&ecirc;n vận chuyển y&ecirc;u cầu qu&yacute; kh&aacute;ch k&yacute; v&agrave;o bi&ecirc;n bản x&aacute;c nhận kh&aacute;ch h&agrave;ng đ&atilde; nhận đủ v&agrave; nguy&ecirc;n vẹn tất cả sản phẩm (bi&ecirc;n bản đồng kiểm).&nbsp;J-P Fashion khuyến kh&iacute;ch qu&yacute; kh&aacute;ch sử dụng tối đa quyền lợi tr&ecirc;n trước khi k&yacute; x&aacute;c nhận để được hỗ trợ tốt nhất trong mọi t&igrave;nh huống. Nếu ph&aacute;t sinh y&ecirc;u cầu đổi trả qu&yacute; kh&aacute;ch vui l&ograve;ng li&ecirc;n hệ hotline:&nbsp;<strong>0916305533</strong>&nbsp;để được hỗ trợ nhanh nhất.</p>', 'https://res.cloudinary.com/dizwixa7c/image/upload/v1681412526/PRO1014_WE18103_Nhom_6/Products/lny592mcx2njys63isdt.jpg', 'PRO1014_WE18103_Nhom_6/Products/lny592mcx2njys63isdt', 0, '2023-04-13 19:02:07', '2023-04-13 19:02:07'),
(8, 1, NULL, 'CHÍNH SÁCH ĐỔI TRẢ', 'CHÍNH SÁCH ĐỔI HÀNG', 'chinh-sach-doi-tra', '<h2><strong>I.&nbsp;Đối với kh&aacute;ch h&agrave;ng mua sản phẩm trực tiếp tại hệ thống thời trang nữ J-P Fashion:</strong></h2>\r\n\r\n<p>-&nbsp; Kh&aacute;ch h&agrave;ng phải kiểm tra kỹ sản phẩm trước khi rời khỏi quầy.</p>\r\n\r\n<p>-&nbsp; Kh&aacute;ch h&agrave;ng muốn đổi sản phẩm th&igrave; phải li&ecirc;n hệ trực tiếp với chi nh&aacute;nh đ&atilde; mua h&agrave;ng.</p>\r\n\r\n<p>-&nbsp; Kh&aacute;ch h&agrave;ng phải xuất tr&igrave;nh được h&oacute;a đơn mua sản phẩm.</p>\r\n\r\n<p>-&nbsp; H&agrave;ng phải mới 100%, c&ograve;n nguy&ecirc;n tem, nguy&ecirc;n mạc của hệ thống&nbsp;<strong>thời trang nữ</strong>&nbsp;J-P Fashion.</p>\r\n\r\n<p>-&nbsp; Thời gian đổi h&agrave;ng kh&ocirc;ng qu&aacute; 7 ng&agrave;y kể từ khi xuất h&oacute;a đơn (đơn h&agrave;ng, bill mua h&agrave;ng).</p>\r\n\r\n<p>-&nbsp; Sản phẩm muốn đổi phải c&oacute; gi&aacute; tiền bằng hoặc lớn hơn sản phẩm cũ.</p>\r\n\r\n<p>-&nbsp; Đối với sản phẩm c&oacute; size th&igrave; chỉ được đổi size, đổi m&agrave;u c&ugrave;ng loại, kh&ocirc;ng được đổi sang kiểu kh&aacute;c.</p>\r\n\r\n<p>- Đối với sản phẩm nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng muốn sử dụng tiếp th&igrave; J-P Fashion&nbsp;kh&ocirc;ng ho&agrave;n tiền.</p>\r\n\r\n<h2><strong>II. &nbsp;Đối với kh&aacute;ch h&agrave;ng đặt h&agrave;ng online:</strong></h2>\r\n\r\n<p>- Thời gian đổi h&agrave;ng trong v&ograve;ng 7 ng&agrave;y t&iacute;nh từ l&uacute;c kh&aacute;ch h&agrave;ng nhận h&agrave;ng&nbsp;<strong>(Miễn ph&iacute; đổi h&agrave;ng)</strong>.&nbsp;Ngo&agrave;i thời gian tr&ecirc;n J-P Fashion sẽ kh&ocirc;ng giải quyết.</p>\r\n\r\n<p>-&nbsp; Chỉ chấp nhận đổi h&agrave;ng khi sản phẩm c&ograve;n mới 100%, kh&ocirc;ng đổi sản phẩm đ&atilde; qua sử dụng, hư hỏng, đ&atilde; qua&nbsp;chỉnh sửa hoặc đ&atilde; qua một lần đổi h&agrave;ng.</p>\r\n\r\n<p>-&nbsp; Sản phẩm phải c&ograve;n nguy&ecirc;n tem, nguy&ecirc;n mạc của J-P Fashion.</p>\r\n\r\n<p>-&nbsp; Kh&aacute;ch h&agrave;ng phải chụp lại sản phẩm, gửi m&atilde; số sản phẩm, gi&aacute; tiền sản phẩm muốn đổi để nh&acirc;n vi&ecirc;n online&nbsp;x&aacute;c nhận.</p>\r\n\r\n<p>-&nbsp; Đối với sản phẩm c&oacute; size th&igrave; chỉ được đổi size, đổi m&agrave;u c&ugrave;ng loại, kh&ocirc;ng được đổi sang kiểu kh&aacute;c.</p>\r\n\r\n<p>-&nbsp; Khi c&oacute; nhu cầu đổi h&agrave;ng, th&igrave; kh&aacute;ch h&agrave;ng cần c&oacute; h&oacute;a đơn mua h&agrave;ng, nếu kh&ocirc;ng c&oacute; h&oacute;a đơn mua h&agrave;ng th&igrave; J-P Fashion&nbsp;kh&ocirc;ng chấp nhận việc đổi h&agrave;ng.</p>\r\n\r\n<p>-&nbsp; Đối với sản phẩm nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng muốn sử dụng tiếp th&igrave; J-P Fashion sẽ kh&ocirc;ng ho&agrave;n tiền.</p>\r\n\r\n<p>**&nbsp;<strong>Đối với sản phẩm sale</strong>:&nbsp;Kh&aacute;ch h&agrave;ng chỉ được đổi size. Nếu sản phẩm hết size c&oacute; thể đổi qua size m&agrave;u kh&aacute;c c&ugrave;ng kiểu. Kh&aacute;ch h&agrave;ng kh&ocirc;ng được đổi sang sản phẩm kh&aacute;c.</p>\r\n\r\n<h2><strong>III.&nbsp;C&aacute;ch thức đổi h&agrave;ng</strong></h2>\r\n\r\n<h2><strong>1.&nbsp;Đối với kh&aacute;ch h&agrave;ng mua h&agrave;ng trực tiếp tại shop:</strong>&nbsp;Kh&aacute;ch h&agrave;ng đem sản phẩm, bill đơn h&agrave;ng đ&atilde; mua đến trực tiếp bất kỳ chi nh&aacute;nh n&agrave;o của hệ thống.</h2>\r\n\r\n<h2><strong>2.&nbsp;Đối với kh&aacute;ch h&agrave;ng đặt h&agrave;ng online:</strong></h2>\r\n\r\n<p><strong>Bước 1:&nbsp;</strong>Kh&aacute;ch h&agrave;ng li&ecirc;n hệ với bộ phận online của J-P Fashion qua số hotline:&nbsp;<strong>0916305533</strong></p>\r\n\r\n<p><strong>Bước 2:&nbsp;</strong>Kh&aacute;ch h&agrave;ng chụp lại sản phẩm<strong>,</strong>&nbsp;gửi m&atilde; barcode của sản phẩm, gi&aacute; tiền sản phẩm muốn đổi cho bộ&nbsp;phận&nbsp;online, nh&acirc;n vi&ecirc;n sẽ tiếp nhận v&agrave; giải quyết.</p>\r\n\r\n<p><strong>Bước 3:&nbsp;</strong>Kh&aacute;ch h&agrave;ng gửi sản phẩm + ho&aacute; đơn + bao b&igrave; sản phẩm (nếu c&oacute;) về địa chỉ:&nbsp;889 C&aacute;ch Mạng Th&aacute;ng T&aacute;m, Phường 7, Quận T&acirc;n B&igrave;nh, Tp. Hồ Ch&iacute; Minh</p>', 'https://res.cloudinary.com/dizwixa7c/image/upload/v1681412565/PRO1014_WE18103_Nhom_6/Products/x6ec90nagyfc4dkoyy0p.jpg', 'PRO1014_WE18103_Nhom_6/Products/x6ec90nagyfc4dkoyy0p', 0, '2023-04-13 19:04:41', '2023-04-13 19:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_code` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `publishing_house_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
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
(1, 1522840, 1, 1, 1, 1, 'Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn', NULL, '“Đằng sau những tiếng lòng ngần ngại muốn nói lại thôi, những mâu thuẫn sợ người ta nhìn thấy, lại sợ người ta không nhìn thấy, những ngông cuồng không sợ trời chẳng sợ đất, luôn có một người khiến lòng dạ bạn ngổn ngang trăm mối, chẳng thể lắng dịu.’\n \nTrước kia, đọc tác phẩm của Lỗ Tấn, tôi thường không thể hiểu trọn vẹn.\n \nNhiều năm về sau đọc lại, tôi đã hiểu được nhiệt huyết hừng hực, chính nghĩa chân thành, trái tim hướng về phía tươi sáng của một người thiếu niên.\n \nNgười ấm áp, chẳng qua là sau khi nhìn thấu mặt tối tăm của nhân tính, vẫn lựa chọn bước về phía có ánh sáng.\n \nBạn và tôi bước đi giữa nhân gian coi trọng vật chất, hầu hết đều phải chịu đựng sự ấm ức như vậy, có người trải qua một lần đả kích suy sụp, đã thêm phần cẩn trọng và đề phòng.\n \nGặp chuyện không còn xung trận ngựa lên trước, không còn lòng thương xót, phản ứng đầu tiên đối với người đến gần là phòng ngự. Tiếp theo đó, chỉ cần phát hiện ra chuyện chẳng liên quan đến mình, sẽ bưng tai bịt mắt.\n \nLòng không gợn sóng, buồn vui ở đâu?\n \nChúng ta đang lạnh lùng chống lại thế giới bên ngoài, cũng đang lạnh lùng giết chết cảm nhận sâu sắc của chính mình.\n \nChúng ta dốc sức dấn bước, chèo thuyền ngược dòng, chẳng qua là bởi chỉ khi ai ai cũng sẵn lòng cố gắng làm một người ấm áp vươn lên, mới có hy vọng tạo nên một thời đại ấm áp vươn lên.\n \nCàng hiểu sự lạnh lùng vô tình của thế giới này thì càng biết trân quý những ấm áp trong cuộc đời.\n \n“Dẫu đã trải qua bao thăng trầm của cuộc đời, khi cúi người nhìn thấy cỏ cây đâm chồi, gió xuân tươi mát, vẫn thấy lòng phơi phới.”\n \nMãi ấp ôm một phần tình cảm dịu dàng đối với thế giới này, mới có thể trở thành người ấm áp.\n \nNuốt ngược nước mắt để trưởng thành hơn - Mong rằng mỗi chúng ta, đều trở thành phiên bản tốt hơn của bản thân, trưởng thành với nụ cười trên môi.', '2023-03-20', NULL, '2023-04-03 05:25:47', '2023-04-03 05:25:47'),
(2, 1767589, 1, 1, 1, 1, 'Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn', NULL, '“Đằng sau những tiếng lòng ngần ngại muốn nói lại thôi, những mâu thuẫn sợ người ta nhìn thấy, lại sợ người ta không nhìn thấy, những ngông cuồng không sợ trời chẳng sợ đất, luôn có một người khiến lòng dạ bạn ngổn ngang trăm mối, chẳng thể lắng dịu.’\r\n \r\nTrước kia, đọc tác phẩm của Lỗ Tấn, tôi thường không thể hiểu trọn vẹn.\r\n \r\nNhiều năm về sau đọc lại, tôi đã hiểu được nhiệt huyết hừng hực, chính nghĩa chân thành, trái tim hướng về phía tươi sáng của một người thiếu niên.\r\n \r\nNgười ấm áp, chẳng qua là sau khi nhìn thấu mặt tối tăm của nhân tính, vẫn lựa chọn bước về phía có ánh sáng.\r\n \r\nBạn và tôi bước đi giữa nhân gian coi trọng vật chất, hầu hết đều phải chịu đựng sự ấm ức như vậy, có người trải qua một lần đả kích suy sụp, đã thêm phần cẩn trọng và đề phòng.\r\n \r\nGặp chuyện không còn xung trận ngựa lên trước, không còn lòng thương xót, phản ứng đầu tiên đối với người đến gần là phòng ngự. Tiếp theo đó, chỉ cần phát hiện ra chuyện chẳng liên quan đến mình, sẽ bưng tai bịt mắt.\r\n \r\nLòng không gợn sóng, buồn vui ở đâu?\r\n \r\nChúng ta đang lạnh lùng chống lại thế giới bên ngoài, cũng đang lạnh lùng giết chết cảm nhận sâu sắc của chính mình.\r\n \r\nChúng ta dốc sức dấn bước, chèo thuyền ngược dòng, chẳng qua là bởi chỉ khi ai ai cũng sẵn lòng cố gắng làm một người ấm áp vươn lên, mới có hy vọng tạo nên một thời đại ấm áp vươn lên.\r\n \r\nCàng hiểu sự lạnh lùng vô tình của thế giới này thì càng biết trân quý những ấm áp trong cuộc đời.\r\n \r\n“Dẫu đã trải qua bao thăng trầm của cuộc đời, khi cúi người nhìn thấy cỏ cây đâm chồi, gió xuân tươi mát, vẫn thấy lòng phơi phới.”\r\n \r\nMãi ấp ôm một phần tình cảm dịu dàng đối với thế giới này, mới có thể trở thành người ấm áp.\r\n \r\nNuốt ngược nước mắt để trưởng thành hơn - Mong rằng mỗi chúng ta, đều trở thành phiên bản tốt hơn của bản thân, trưởng thành với nụ cười trên môi.', '2023-03-20', NULL, '2023-04-03 05:26:48', '2023-04-03 05:26:48'),
(3, 8219213, 2, 2, 1, 1, 'Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn', NULL, '“Đằng sau những tiếng lòng ngần ngại muốn nói lại thôi, những mâu thuẫn sợ người ta nhìn thấy, lại sợ người ta không nhìn thấy, những ngông cuồng không sợ trời chẳng sợ đất, luôn có một người khiến lòng dạ bạn ngổn ngang trăm mối, chẳng thể lắng dịu.’\r\n \r\nTrước kia, đọc tác phẩm của Lỗ Tấn, tôi thường không thể hiểu trọn vẹn.\r\n \r\nNhiều năm về sau đọc lại, tôi đã hiểu được nhiệt huyết hừng hực, chính nghĩa chân thành, trái tim hướng về phía tươi sáng của một người thiếu niên.\r\n \r\nNgười ấm áp, chẳng qua là sau khi nhìn thấu mặt tối tăm của nhân tính, vẫn lựa chọn bước về phía có ánh sáng.\r\n \r\nBạn và tôi bước đi giữa nhân gian coi trọng vật chất, hầu hết đều phải chịu đựng sự ấm ức như vậy, có người trải qua một lần đả kích suy sụp, đã thêm phần cẩn trọng và đề phòng.\r\n \r\nGặp chuyện không còn xung trận ngựa lên trước, không còn lòng thương xót, phản ứng đầu tiên đối với người đến gần là phòng ngự. Tiếp theo đó, chỉ cần phát hiện ra chuyện chẳng liên quan đến mình, sẽ bưng tai bịt mắt.\r\n \r\nLòng không gợn sóng, buồn vui ở đâu?\r\n \r\nChúng ta đang lạnh lùng chống lại thế giới bên ngoài, cũng đang lạnh lùng giết chết cảm nhận sâu sắc của chính mình.\r\n \r\nChúng ta dốc sức dấn bước, chèo thuyền ngược dòng, chẳng qua là bởi chỉ khi ai ai cũng sẵn lòng cố gắng làm một người ấm áp vươn lên, mới có hy vọng tạo nên một thời đại ấm áp vươn lên.\r\n \r\nCàng hiểu sự lạnh lùng vô tình của thế giới này thì càng biết trân quý những ấm áp trong cuộc đời.\r\n \r\n“Dẫu đã trải qua bao thăng trầm của cuộc đời, khi cúi người nhìn thấy cỏ cây đâm chồi, gió xuân tươi mát, vẫn thấy lòng phơi phới.”\r\n \r\nMãi ấp ôm một phần tình cảm dịu dàng đối với thế giới này, mới có thể trở thành người ấm áp.\r\n \r\nNuốt ngược nước mắt để trưởng thành hơn - Mong rằng mỗi chúng ta, đều trở thành phiên bản tốt hơn của bản thân, trưởng thành với nụ cười trên môi.', '2023-03-20', NULL, '2023-04-03 05:26:56', '2023-04-03 05:26:56'),
(4, 5268857, 1, 2, 1, 1, 'Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn', NULL, '“Đằng sau những tiếng lòng ngần ngại muốn nói lại thôi, những mâu thuẫn sợ người ta nhìn thấy, lại sợ người ta không nhìn thấy, những ngông cuồng không sợ trời chẳng sợ đất, luôn có một người khiến lòng dạ bạn ngổn ngang trăm mối, chẳng thể lắng dịu.’\r\n \r\nTrước kia, đọc tác phẩm của Lỗ Tấn, tôi thường không thể hiểu trọn vẹn.\r\n \r\nNhiều năm về sau đọc lại, tôi đã hiểu được nhiệt huyết hừng hực, chính nghĩa chân thành, trái tim hướng về phía tươi sáng của một người thiếu niên.\r\n \r\nNgười ấm áp, chẳng qua là sau khi nhìn thấu mặt tối tăm của nhân tính, vẫn lựa chọn bước về phía có ánh sáng.\r\n \r\nBạn và tôi bước đi giữa nhân gian coi trọng vật chất, hầu hết đều phải chịu đựng sự ấm ức như vậy, có người trải qua một lần đả kích suy sụp, đã thêm phần cẩn trọng và đề phòng.\r\n \r\nGặp chuyện không còn xung trận ngựa lên trước, không còn lòng thương xót, phản ứng đầu tiên đối với người đến gần là phòng ngự. Tiếp theo đó, chỉ cần phát hiện ra chuyện chẳng liên quan đến mình, sẽ bưng tai bịt mắt.\r\n \r\nLòng không gợn sóng, buồn vui ở đâu?\r\n \r\nChúng ta đang lạnh lùng chống lại thế giới bên ngoài, cũng đang lạnh lùng giết chết cảm nhận sâu sắc của chính mình.\r\n \r\nChúng ta dốc sức dấn bước, chèo thuyền ngược dòng, chẳng qua là bởi chỉ khi ai ai cũng sẵn lòng cố gắng làm một người ấm áp vươn lên, mới có hy vọng tạo nên một thời đại ấm áp vươn lên.\r\n \r\nCàng hiểu sự lạnh lùng vô tình của thế giới này thì càng biết trân quý những ấm áp trong cuộc đời.\r\n \r\n“Dẫu đã trải qua bao thăng trầm của cuộc đời, khi cúi người nhìn thấy cỏ cây đâm chồi, gió xuân tươi mát, vẫn thấy lòng phơi phới.”\r\n \r\nMãi ấp ôm một phần tình cảm dịu dàng đối với thế giới này, mới có thể trở thành người ấm áp.\r\n \r\nNuốt ngược nước mắt để trưởng thành hơn - Mong rằng mỗi chúng ta, đều trở thành phiên bản tốt hơn của bản thân, trưởng thành với nụ cười trên môi.', '2023-03-20', NULL, '2023-04-03 05:27:15', '2023-04-03 05:27:15'),
(5, 5489022, 3, 3, 1, 1, 'Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn', NULL, '“Đằng sau những tiếng lòng ngần ngại muốn nói lại thôi, những mâu thuẫn sợ người ta nhìn thấy, lại sợ người ta không nhìn thấy, những ngông cuồng không sợ trời chẳng sợ đất, luôn có một người khiến lòng dạ bạn ngổn ngang trăm mối, chẳng thể lắng dịu.’\r\n \r\nTrước kia, đọc tác phẩm của Lỗ Tấn, tôi thường không thể hiểu trọn vẹn.\r\n \r\nNhiều năm về sau đọc lại, tôi đã hiểu được nhiệt huyết hừng hực, chính nghĩa chân thành, trái tim hướng về phía tươi sáng của một người thiếu niên.\r\n \r\nNgười ấm áp, chẳng qua là sau khi nhìn thấu mặt tối tăm của nhân tính, vẫn lựa chọn bước về phía có ánh sáng.\r\n \r\nBạn và tôi bước đi giữa nhân gian coi trọng vật chất, hầu hết đều phải chịu đựng sự ấm ức như vậy, có người trải qua một lần đả kích suy sụp, đã thêm phần cẩn trọng và đề phòng.\r\n \r\nGặp chuyện không còn xung trận ngựa lên trước, không còn lòng thương xót, phản ứng đầu tiên đối với người đến gần là phòng ngự. Tiếp theo đó, chỉ cần phát hiện ra chuyện chẳng liên quan đến mình, sẽ bưng tai bịt mắt.\r\n \r\nLòng không gợn sóng, buồn vui ở đâu?\r\n \r\nChúng ta đang lạnh lùng chống lại thế giới bên ngoài, cũng đang lạnh lùng giết chết cảm nhận sâu sắc của chính mình.\r\n \r\nChúng ta dốc sức dấn bước, chèo thuyền ngược dòng, chẳng qua là bởi chỉ khi ai ai cũng sẵn lòng cố gắng làm một người ấm áp vươn lên, mới có hy vọng tạo nên một thời đại ấm áp vươn lên.\r\n \r\nCàng hiểu sự lạnh lùng vô tình của thế giới này thì càng biết trân quý những ấm áp trong cuộc đời.\r\n \r\n“Dẫu đã trải qua bao thăng trầm của cuộc đời, khi cúi người nhìn thấy cỏ cây đâm chồi, gió xuân tươi mát, vẫn thấy lòng phơi phới.”\r\n \r\nMãi ấp ôm một phần tình cảm dịu dàng đối với thế giới này, mới có thể trở thành người ấm áp.\r\n \r\nNuốt ngược nước mắt để trưởng thành hơn - Mong rằng mỗi chúng ta, đều trở thành phiên bản tốt hơn của bản thân, trưởng thành với nụ cười trên môi.', '2023-03-20', NULL, '2023-04-03 05:27:19', '2023-04-03 05:27:19'),
(6, 1251967, 3, 3, 1, 1, 'Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn', NULL, '“Đằng sau những tiếng lòng ngần ngại muốn nói lại thôi, những mâu thuẫn sợ người ta nhìn thấy, lại sợ người ta không nhìn thấy, những ngông cuồng không sợ trời chẳng sợ đất, luôn có một người khiến lòng dạ bạn ngổn ngang trăm mối, chẳng thể lắng dịu.’\r\n \r\nTrước kia, đọc tác phẩm của Lỗ Tấn, tôi thường không thể hiểu trọn vẹn.\r\n \r\nNhiều năm về sau đọc lại, tôi đã hiểu được nhiệt huyết hừng hực, chính nghĩa chân thành, trái tim hướng về phía tươi sáng của một người thiếu niên.\r\n \r\nNgười ấm áp, chẳng qua là sau khi nhìn thấu mặt tối tăm của nhân tính, vẫn lựa chọn bước về phía có ánh sáng.\r\n \r\nBạn và tôi bước đi giữa nhân gian coi trọng vật chất, hầu hết đều phải chịu đựng sự ấm ức như vậy, có người trải qua một lần đả kích suy sụp, đã thêm phần cẩn trọng và đề phòng.\r\n \r\nGặp chuyện không còn xung trận ngựa lên trước, không còn lòng thương xót, phản ứng đầu tiên đối với người đến gần là phòng ngự. Tiếp theo đó, chỉ cần phát hiện ra chuyện chẳng liên quan đến mình, sẽ bưng tai bịt mắt.\r\n \r\nLòng không gợn sóng, buồn vui ở đâu?\r\n \r\nChúng ta đang lạnh lùng chống lại thế giới bên ngoài, cũng đang lạnh lùng giết chết cảm nhận sâu sắc của chính mình.\r\n \r\nChúng ta dốc sức dấn bước, chèo thuyền ngược dòng, chẳng qua là bởi chỉ khi ai ai cũng sẵn lòng cố gắng làm một người ấm áp vươn lên, mới có hy vọng tạo nên một thời đại ấm áp vươn lên.\r\n \r\nCàng hiểu sự lạnh lùng vô tình của thế giới này thì càng biết trân quý những ấm áp trong cuộc đời.\r\n \r\n“Dẫu đã trải qua bao thăng trầm của cuộc đời, khi cúi người nhìn thấy cỏ cây đâm chồi, gió xuân tươi mát, vẫn thấy lòng phơi phới.”\r\n \r\nMãi ấp ôm một phần tình cảm dịu dàng đối với thế giới này, mới có thể trở thành người ấm áp.\r\n \r\nNuốt ngược nước mắt để trưởng thành hơn - Mong rằng mỗi chúng ta, đều trở thành phiên bản tốt hơn của bản thân, trưởng thành với nụ cười trên môi.', '2023-03-20', NULL, '2023-04-03 05:27:24', '2023-04-03 05:27:24'),
(7, 5399766, 4, 1, 1, 1, 'Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn', NULL, '“Đằng sau những tiếng lòng ngần ngại muốn nói lại thôi, những mâu thuẫn sợ người ta nhìn thấy, lại sợ người ta không nhìn thấy, những ngông cuồng không sợ trời chẳng sợ đất, luôn có một người khiến lòng dạ bạn ngổn ngang trăm mối, chẳng thể lắng dịu.’\r\n \r\nTrước kia, đọc tác phẩm của Lỗ Tấn, tôi thường không thể hiểu trọn vẹn.\r\n \r\nNhiều năm về sau đọc lại, tôi đã hiểu được nhiệt huyết hừng hực, chính nghĩa chân thành, trái tim hướng về phía tươi sáng của một người thiếu niên.\r\n \r\nNgười ấm áp, chẳng qua là sau khi nhìn thấu mặt tối tăm của nhân tính, vẫn lựa chọn bước về phía có ánh sáng.\r\n \r\nBạn và tôi bước đi giữa nhân gian coi trọng vật chất, hầu hết đều phải chịu đựng sự ấm ức như vậy, có người trải qua một lần đả kích suy sụp, đã thêm phần cẩn trọng và đề phòng.\r\n \r\nGặp chuyện không còn xung trận ngựa lên trước, không còn lòng thương xót, phản ứng đầu tiên đối với người đến gần là phòng ngự. Tiếp theo đó, chỉ cần phát hiện ra chuyện chẳng liên quan đến mình, sẽ bưng tai bịt mắt.\r\n \r\nLòng không gợn sóng, buồn vui ở đâu?\r\n \r\nChúng ta đang lạnh lùng chống lại thế giới bên ngoài, cũng đang lạnh lùng giết chết cảm nhận sâu sắc của chính mình.\r\n \r\nChúng ta dốc sức dấn bước, chèo thuyền ngược dòng, chẳng qua là bởi chỉ khi ai ai cũng sẵn lòng cố gắng làm một người ấm áp vươn lên, mới có hy vọng tạo nên một thời đại ấm áp vươn lên.\r\n \r\nCàng hiểu sự lạnh lùng vô tình của thế giới này thì càng biết trân quý những ấm áp trong cuộc đời.\r\n \r\n“Dẫu đã trải qua bao thăng trầm của cuộc đời, khi cúi người nhìn thấy cỏ cây đâm chồi, gió xuân tươi mát, vẫn thấy lòng phơi phới.”\r\n \r\nMãi ấp ôm một phần tình cảm dịu dàng đối với thế giới này, mới có thể trở thành người ấm áp.\r\n \r\nNuốt ngược nước mắt để trưởng thành hơn - Mong rằng mỗi chúng ta, đều trở thành phiên bản tốt hơn của bản thân, trưởng thành với nụ cười trên môi.', '2023-03-20', NULL, '2023-04-03 05:27:29', '2023-04-03 09:36:03'),
(8, 4802947, 5, 4, 1, 1, 'Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn', NULL, '“Đằng sau những tiếng lòng ngần ngại muốn nói lại thôi, những mâu thuẫn sợ người ta nhìn thấy, lại sợ người ta không nhìn thấy, những ngông cuồng không sợ trời chẳng sợ đất, luôn có một người khiến lòng dạ bạn ngổn ngang trăm mối, chẳng thể lắng dịu.’\r\n \r\nTrước kia, đọc tác phẩm của Lỗ Tấn, tôi thường không thể hiểu trọn vẹn.\r\n \r\nNhiều năm về sau đọc lại, tôi đã hiểu được nhiệt huyết hừng hực, chính nghĩa chân thành, trái tim hướng về phía tươi sáng của một người thiếu niên.\r\n \r\nNgười ấm áp, chẳng qua là sau khi nhìn thấu mặt tối tăm của nhân tính, vẫn lựa chọn bước về phía có ánh sáng.\r\n \r\nBạn và tôi bước đi giữa nhân gian coi trọng vật chất, hầu hết đều phải chịu đựng sự ấm ức như vậy, có người trải qua một lần đả kích suy sụp, đã thêm phần cẩn trọng và đề phòng.\r\n \r\nGặp chuyện không còn xung trận ngựa lên trước, không còn lòng thương xót, phản ứng đầu tiên đối với người đến gần là phòng ngự. Tiếp theo đó, chỉ cần phát hiện ra chuyện chẳng liên quan đến mình, sẽ bưng tai bịt mắt.\r\n \r\nLòng không gợn sóng, buồn vui ở đâu?\r\n \r\nChúng ta đang lạnh lùng chống lại thế giới bên ngoài, cũng đang lạnh lùng giết chết cảm nhận sâu sắc của chính mình.\r\n \r\nChúng ta dốc sức dấn bước, chèo thuyền ngược dòng, chẳng qua là bởi chỉ khi ai ai cũng sẵn lòng cố gắng làm một người ấm áp vươn lên, mới có hy vọng tạo nên một thời đại ấm áp vươn lên.\r\n \r\nCàng hiểu sự lạnh lùng vô tình của thế giới này thì càng biết trân quý những ấm áp trong cuộc đời.\r\n \r\n“Dẫu đã trải qua bao thăng trầm của cuộc đời, khi cúi người nhìn thấy cỏ cây đâm chồi, gió xuân tươi mát, vẫn thấy lòng phơi phới.”\r\n \r\nMãi ấp ôm một phần tình cảm dịu dàng đối với thế giới này, mới có thể trở thành người ấm áp.\r\n \r\nNuốt ngược nước mắt để trưởng thành hơn - Mong rằng mỗi chúng ta, đều trở thành phiên bản tốt hơn của bản thân, trưởng thành với nụ cười trên môi.', '2023-03-20', NULL, '2023-04-03 05:27:43', '2023-04-03 09:35:52'),
(9, 5859241, 1, 4, 1, 1, 'Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn', NULL, '“Đằng sau những tiếng lòng ngần ngại muốn nói lại thôi, những mâu thuẫn sợ người ta nhìn thấy, lại sợ người ta không nhìn thấy, những ngông cuồng không sợ trời chẳng sợ đất, luôn có một người khiến lòng dạ bạn ngổn ngang trăm mối, chẳng thể lắng dịu.’\r\n \r\nTrước kia, đọc tác phẩm của Lỗ Tấn, tôi thường không thể hiểu trọn vẹn.\r\n \r\nNhiều năm về sau đọc lại, tôi đã hiểu được nhiệt huyết hừng hực, chính nghĩa chân thành, trái tim hướng về phía tươi sáng của một người thiếu niên.\r\n \r\nNgười ấm áp, chẳng qua là sau khi nhìn thấu mặt tối tăm của nhân tính, vẫn lựa chọn bước về phía có ánh sáng.\r\n \r\nBạn và tôi bước đi giữa nhân gian coi trọng vật chất, hầu hết đều phải chịu đựng sự ấm ức như vậy, có người trải qua một lần đả kích suy sụp, đã thêm phần cẩn trọng và đề phòng.\r\n \r\nGặp chuyện không còn xung trận ngựa lên trước, không còn lòng thương xót, phản ứng đầu tiên đối với người đến gần là phòng ngự. Tiếp theo đó, chỉ cần phát hiện ra chuyện chẳng liên quan đến mình, sẽ bưng tai bịt mắt.\r\n \r\nLòng không gợn sóng, buồn vui ở đâu?\r\n \r\nChúng ta đang lạnh lùng chống lại thế giới bên ngoài, cũng đang lạnh lùng giết chết cảm nhận sâu sắc của chính mình.\r\n \r\nChúng ta dốc sức dấn bước, chèo thuyền ngược dòng, chẳng qua là bởi chỉ khi ai ai cũng sẵn lòng cố gắng làm một người ấm áp vươn lên, mới có hy vọng tạo nên một thời đại ấm áp vươn lên.\r\n \r\nCàng hiểu sự lạnh lùng vô tình của thế giới này thì càng biết trân quý những ấm áp trong cuộc đời.\r\n \r\n“Dẫu đã trải qua bao thăng trầm của cuộc đời, khi cúi người nhìn thấy cỏ cây đâm chồi, gió xuân tươi mát, vẫn thấy lòng phơi phới.”\r\n \r\nMãi ấp ôm một phần tình cảm dịu dàng đối với thế giới này, mới có thể trở thành người ấm áp.\r\n \r\nNuốt ngược nước mắt để trưởng thành hơn - Mong rằng mỗi chúng ta, đều trở thành phiên bản tốt hơn của bản thân, trưởng thành với nụ cười trên môi.', '2023-03-20', NULL, '2023-04-03 09:35:21', '2023-04-03 09:35:21'),
(10, 5676053, 1, 5, 1, 1, 'Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn', NULL, '“Đằng sau những tiếng lòng ngần ngại muốn nói lại thôi, những mâu thuẫn sợ người ta nhìn thấy, lại sợ người ta không nhìn thấy, những ngông cuồng không sợ trời chẳng sợ đất, luôn có một người khiến lòng dạ bạn ngổn ngang trăm mối, chẳng thể lắng dịu.’\r\n \r\nTrước kia, đọc tác phẩm của Lỗ Tấn, tôi thường không thể hiểu trọn vẹn.\r\n \r\nNhiều năm về sau đọc lại, tôi đã hiểu được nhiệt huyết hừng hực, chính nghĩa chân thành, trái tim hướng về phía tươi sáng của một người thiếu niên.\r\n \r\nNgười ấm áp, chẳng qua là sau khi nhìn thấu mặt tối tăm của nhân tính, vẫn lựa chọn bước về phía có ánh sáng.\r\n \r\nBạn và tôi bước đi giữa nhân gian coi trọng vật chất, hầu hết đều phải chịu đựng sự ấm ức như vậy, có người trải qua một lần đả kích suy sụp, đã thêm phần cẩn trọng và đề phòng.\r\n \r\nGặp chuyện không còn xung trận ngựa lên trước, không còn lòng thương xót, phản ứng đầu tiên đối với người đến gần là phòng ngự. Tiếp theo đó, chỉ cần phát hiện ra chuyện chẳng liên quan đến mình, sẽ bưng tai bịt mắt.\r\n \r\nLòng không gợn sóng, buồn vui ở đâu?\r\n \r\nChúng ta đang lạnh lùng chống lại thế giới bên ngoài, cũng đang lạnh lùng giết chết cảm nhận sâu sắc của chính mình.\r\n \r\nChúng ta dốc sức dấn bước, chèo thuyền ngược dòng, chẳng qua là bởi chỉ khi ai ai cũng sẵn lòng cố gắng làm một người ấm áp vươn lên, mới có hy vọng tạo nên một thời đại ấm áp vươn lên.\r\n \r\nCàng hiểu sự lạnh lùng vô tình của thế giới này thì càng biết trân quý những ấm áp trong cuộc đời.\r\n \r\n“Dẫu đã trải qua bao thăng trầm của cuộc đời, khi cúi người nhìn thấy cỏ cây đâm chồi, gió xuân tươi mát, vẫn thấy lòng phơi phới.”\r\n \r\nMãi ấp ôm một phần tình cảm dịu dàng đối với thế giới này, mới có thể trở thành người ấm áp.\r\n \r\nNuốt ngược nước mắt để trưởng thành hơn - Mong rằng mỗi chúng ta, đều trở thành phiên bản tốt hơn của bản thân, trưởng thành với nụ cười trên môi.', '2023-03-20', NULL, '2023-04-03 09:35:09', '2023-04-03 09:35:09');

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
  `import_price` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `promotion_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_detail`
--

INSERT INTO `products_detail` (`id`, `product_id`, `size`, `page_number`, `weight`, `import_price`, `price`, `promotion_price`, `created_at`, `updated_at`) VALUES
(1, 1, '14.5 x 20.5 x 2.0 cm', 340, '500', 150000, 165000, 95000, '2023-04-03 05:25:47', '2023-04-03 05:25:47'),
(2, 2, '14.5 x 20.5 x 2.0 cm', 340, '500', 150000, 165000, 135000, '2023-04-03 05:26:48', '2023-04-03 05:26:48'),
(3, 3, '14.5 x 20.5 x 2.0 cm', 340, '500', 150000, 165000, 135000, '2023-04-03 05:26:56', '2023-04-03 05:26:56'),
(4, 4, '14.5 x 20.5 x 2.0 cm', 340, '500', 150000, 165000, 135000, '2023-04-03 05:27:15', '2023-04-03 05:27:15'),
(5, 5, '14.5 x 20.5 x 2.0 cm', 340, '500', 150000, 165000, 135000, '2023-04-03 05:27:19', '2023-04-03 05:27:19'),
(6, 6, '14.5 x 20.5 x 2.0 cm', 340, '500', 150000, 165000, 135000, '2023-04-03 05:27:24', '2023-04-03 05:27:24'),
(7, 7, '14.5 x 20.5 x 2.0 cm', 340, '500', 150000, 165000, 133000, '2023-04-03 05:27:29', '2023-04-03 09:36:03'),
(8, 8, '14.5 x 20.5 x 2.0 cm', 340, '500', 150000, 165000, 126000, '2023-04-03 05:27:43', '2023-04-03 09:35:52'),
(9, 9, '14.5 x 20.5 x 2.0 cm', 340, '500', 150000, 165000, 113500, '2023-04-03 05:27:47', '2023-04-03 09:35:21'),
(10, 10, '14.5 x 20.5 x 2.0 cm', 340, '500', 150000, 165000, 125000, '2023-04-03 05:27:52', '2023-04-03 09:35:09');

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
(1, 'Nhà xuất bản Trẻ', 'nha-xuat-ban-tre', NULL, '2023-04-03 05:21:09', '2023-04-03 05:21:09'),
(2, 'Nhà xuất bản Kim Đồng', 'nha-xuat-ban-kim-dong', NULL, '2023-04-03 05:21:15', '2023-04-03 05:21:15'),
(3, 'Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh', 'nha-xuat-ban-tong-hop-thanh-pho-ho-chi-minh', NULL, '2023-04-03 05:21:22', '2023-04-03 05:21:22'),
(4, 'Nhà xuất bản Hội Nhà văn', 'nha-xuat-ban-hoi-nha-van', NULL, '2023-04-03 05:21:28', '2023-04-03 05:21:28'),
(5, 'Nhà xuất bản Chính trị quốc gia Sự thật', 'nha-xuat-ban-chinh-tri-quoc-gia-su-that', NULL, '2023-04-03 05:21:33', '2023-04-03 05:21:33'),
(6, 'Nhà xuất bản Phụ nữ Việt Nam', 'nha-xuat-ban-phu-nu-viet-nam', NULL, '2023-04-03 05:21:44', '2023-04-03 05:21:44'),
(7, 'Nhà xuất bản Lao Động', 'nha-xuat-ban-lao-dong', NULL, '2023-04-03 05:21:51', '2023-04-03 05:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `store_catalog`
--

CREATE TABLE `store_catalog` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `image_public_id` text DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `discount_code` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_deleted` date DEFAULT NULL,
  `token_verify` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `image_url`, `image_public_id`, `position_id`, `password`, `discount_code`, `email_verified_at`, `remember_token`, `is_deleted`, `token_verify`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '0346027346', NULL, NULL, NULL, 1, '$2y$10$K16QvT/CLuqEPy0YRwyrs.tCK/p9T36QgZ33few1x3bsfJAm7pTcG', NULL, NULL, NULL, NULL, NULL, '2023-04-03 05:11:59', '2023-04-03 05:11:59'),
(16, 'customer', 'customer@gmail.com', '0971894323', NULL, NULL, NULL, 2, '$2y$10$FeUcfZyJyfCUSS4..3ZVfOpkfdM/PGqM9Fr6cAiWYTmXv/NWiU/N6', NULL, NULL, NULL, NULL, NULL, '2023-04-07 16:34:26', '2023-04-07 16:34:26'),
(17, 'customer_1', 'customer_1@gmail.com', '0971894222', NULL, NULL, NULL, 2, '$2y$10$ADBCKYYLx.IK2MKN1B50eOEr3cZ4M5KZIaiEBRfGB.JPcTJ95kXGi', NULL, NULL, NULL, NULL, NULL, '2023-04-11 00:39:45', '2023-04-11 00:39:45');

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
(1, 1, 21, 28, 14, '2023-04-03 05:25:47', '2023-04-13 01:15:04'),
(2, 2, 21, 29, 15, '2023-04-03 05:26:48', '2023-04-13 01:15:04'),
(3, 3, 21, 21, 21, '2023-04-03 05:26:56', '2023-04-13 08:32:47'),
(4, 4, 21, 15, 6, '2023-04-03 05:27:15', '2023-04-13 15:45:22'),
(5, 5, 21, 15, 6, '2023-04-03 05:27:19', '2023-04-13 15:45:22'),
(6, 6, 21, 15, 6, '2023-04-03 05:27:24', '2023-04-07 14:05:25'),
(7, 7, 21, 16, 5, '2023-04-03 05:27:29', '2023-04-13 15:43:35'),
(8, 8, 21, 15, 6, '2023-04-03 05:27:43', '2023-04-13 00:44:26'),
(9, 9, 21, 15, 27, '2023-04-03 05:27:47', '2023-04-13 17:27:39'),
(10, 10, 21, 16, 5, '2023-04-03 05:27:52', '2023-04-13 17:27:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_slug_unique` (`slug`);

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
-- Indexes for table `store_catalog`
--
ALTER TABLE `store_catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `order_notes`
--
ALTER TABLE `order_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publishing_house`
--
ALTER TABLE `publishing_house`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store_catalog`
--
ALTER TABLE `store_catalog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
