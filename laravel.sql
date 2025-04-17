-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 17, 2025 lúc 09:55 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `logo`, `created_at`, `updated_at`) VALUES
(3, 'Sam Sung', 'sam-sung', 'logos/8R6mzO8bFWT9NQHUTvHaTINC6tDwCVhEIvAXi70q.png', '2025-04-16 23:27:52', '2025-04-16 23:32:18'),
(4, 'Apple', 'apple', 'logos/cEzQc79iW7SpNjkNGNcmqNxsIOkg7oqkXv8q2SIj.jpg', '2025-04-16 23:28:07', '2025-04-17 00:26:22'),
(5, 'Sony', 'sony', 'logos/3j9RPAFsE85pChw6O6k2GV1Am55H2NwAotukbAyw.jpg', '2025-04-16 23:28:35', '2025-04-16 23:32:46'),
(6, 'Oppo', 'oppo', 'logos/DoAJydndQrNZosaUtjkmneilgY6LHe0zSx67qJlW.jpg', '2025-04-16 23:28:51', '2025-04-16 23:31:33'),
(7, 'Realme', 'realme', 'logos/PBqOhoaKbqv3RC5NeEfsAjabFm2TuHk2KgjBrKiv.jpg', '2025-04-16 23:33:00', '2025-04-16 23:33:00'),
(8, 'Xiaomi', 'xiaomi', 'logos/mrD9vj2kkZ2Guf8JQckS9VmCs8C6oNvsgJYFl9eQ.png', '2025-04-16 23:53:55', '2025-04-16 23:53:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Dien Thoai', 'dien-thoai', 'image/gQfiHjQNLy68GO0vZbYJv4mucMRm2C99y5lRbEb3.jpg', '2025-04-10 02:16:02', '2025-04-16 23:26:04'),
(3, 'Phu Kien', 'phu-kien', 'image/J0Qr48TCgaI4y7ogxUOlghDJGhhSVZ9Oy2bmBDvi.jpg', '2025-04-16 23:26:16', '2025-04-16 23:26:16'),
(4, 'Ti vi', 'ti-vi', 'image/v3ZNiSVXwgosd33981vo8SChCYJCQk36Brd6E2D6.png', '2025-04-16 23:26:37', '2025-04-16 23:26:37'),
(5, 'Lap Top', 'lap-top', 'image/NaAydZVGh0bRviOOaNXt22xRXUQbChtfeRh7SwDN.jpg', '2025-04-16 23:26:50', '2025-04-16 23:26:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, 'create_brand_table', 1),
(13, 'create_categorys_table', 1),
(14, 'create_products_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `rating` double(8,2) NOT NULL DEFAULT 0.00,
  `reviews_count` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image`, `brand_id`, `category_id`, `rating`, `reviews_count`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Iphone 16 promax', 'Iphone 16 promax', 30000000.00, 10, 'products/1dqxtvLvqAix9HVxd3SWx4EDWYOhGys74P9uYacZ.jpg', 4, 2, 0.00, 0, 0, 'active', '2025-04-16 23:35:52', '2025-04-16 23:36:04'),
(5, 'SamSung GalaxyS23', 'SamSung GalaxyS23 ultra đến từ thương hiệu Mỹ', 1300000.00, 10, 'products/8XWSz1gMDeJh16T3oQIzdUkfoYS3X6278D0bucSo.jpg', 3, 2, 0.00, 0, 0, 'active', '2025-04-16 23:37:33', '2025-04-16 23:37:33'),
(6, 'Iphone 11', 'Iphone 11 sản phẩm đã được phong sát', 7000000.00, 10, 'products/w79fs6vAMd3EehO9y74DUPDpq87r1pwaFlgREEnT.jpg', 4, 2, 0.00, 0, 0, 'active', '2025-04-16 23:38:27', '2025-04-16 23:38:27'),
(8, 'Iphone 15 promax', 'là chiếc điện thoại đến từ nhà táo. Với hiệu năng vượt trội đem lại sự thú vị cho người sử dụng', 25000000.00, 10, 'products/VYzIhv4LGhOZdCGnGbZoxverXGiU0M3G9qbMaKOC.jpg', 4, 2, 0.00, 0, 0, 'active', '2025-04-16 23:43:18', '2025-04-16 23:52:25'),
(9, 'Iphone 8', 'Là chiếc điện thoại đến từ nhà táo.Với hiệu năng vượt trội đem lại trải nghiệm người dùng ổn định', 10000000.00, 10, 'products/Fw73GHJ8wHt46QKPHkw3YvlbyRnzpRpGbhPYSYli.jpg', 4, 2, 0.00, 0, 0, 'active', '2025-04-16 23:50:04', '2025-04-16 23:50:04'),
(10, 'xiaomi-redmi-note-13-pro-5g', 'xiaomi-redmi-note-13-pro-5g-xanhla mau xanh la', 12000000.00, 10, 'products/BRNEXepgQtDrgcgkMxQ1dzofuPV2jhgS3nUR8VQq.jpg', 8, 2, 0.00, 0, 0, 'active', '2025-04-16 23:54:57', '2025-04-16 23:54:57'),
(11, 'xiaomi-redmi-note-10-pro', 'xiaomi-redmi-note-10-pro-thumb-xam', 12000000.00, 10, 'products/jkfobLdQeny7oA36FvVOkFZqGk4mqt1ehrNALb9V.jpg', 8, 2, 0.00, 0, 0, 'active', '2025-04-16 23:55:46', '2025-04-16 23:55:46'),
(12, 'xiaomi-redmi-12-pro-4g', 'xiaomi-redmi-12-pro-4g-xanh', 12000000.00, 10, 'products/gbl2R411xc7dTBj6KiwRg2v64Rfg8qsxvv3RZhkX.jpg', 8, 2, 0.00, 0, 0, 'active', '2025-04-16 23:56:22', '2025-04-16 23:56:22'),
(14, 'vtalk-ear', 'vtalk-ear tai phone giá rẻ', 300000.00, 5, 'products/DS1GWaxvOxPIDbr78LwjHMattq6Yuw9b0EC5ydbp.jpg', 7, 3, 0.00, 0, 0, 'active', '2025-04-16 23:58:08', '2025-04-16 23:58:08'),
(15, 'vi-vn-samsung-galaxy-chromebook', 'vi-vn-samsung-galaxy-chromebook-go-xe310xda-n4500-', 35000000.00, 2, 'products/MNxvONhrDdAc9TuSE9qCzW5KffYHISD3IzM4bcve.jpg', 3, 5, 0.00, 0, 0, 'active', '2025-04-16 23:58:51', '2025-04-16 23:58:51'),
(16, 'TiVi Sony2', 'TiVi Sony2 màn hình 1 tỉ màu xắc', 10000000.00, 10, 'products/WROKxTDO4tu2rlSkUj8R1v4qYHCCe0hDKCyfu3bO.jpg', 5, 4, 0.00, 0, 0, 'active', '2025-04-16 23:59:45', '2025-04-16 23:59:45'),
(17, 'tivisony1.jpg', 'tivisony1', 10000000.00, 2, 'products/q7oUqAKOgvlynKn1fRFyxjrk24iRIU7PDMHaXQuW.jpg', 5, 4, 0.00, 0, 0, 'active', '2025-04-17 00:02:04', '2025-04-17 00:02:04'),
(18, 'Tivi SamSung 4', 'Tivi SamSung 4 màn hình 1 tỉ sắc màu với trải nghiệm tuyệt đỉnh', 12000000.00, 10, 'products/VxZdWqJmmRU11k0koD29Tp72BmAE9fDX0Ay7zl6T.jpg', 3, 4, 0.00, 0, 0, 'active', '2025-04-17 00:03:03', '2025-04-17 00:03:03'),
(19, 'tivisamsung3', 'tivisamsung3', 10000000.00, 10, 'products/KnJbcNFFQs0Q4Uzc9W2QORaGPccrApeaweHIsRyF.jpg', 3, 4, 0.00, 0, 0, 'active', '2025-04-17 00:03:45', '2025-04-17 00:03:45'),
(20, 'tivisamsung2', 'tivisamsung2', 10000000.00, 12, 'products/Jgt1x4aBY8qNoOYimuxmj3GMG8I1ysYuHbvXPMOB.jpg', 3, 4, 0.00, 0, 0, 'active', '2025-04-17 00:05:00', '2025-04-17 00:05:00'),
(21, 'tivisamsung1', 'tivisamsung1', 10000000.00, 10, 'products/daMksYfr7HzUrB7uoNoOKUUBxAhPl8wThrTex5re.jpg', 3, 4, 0.00, 0, 0, 'active', '2025-04-17 00:05:54', '2025-04-17 00:05:54'),
(22, 'tai-nghe-bluetooth-tws-oppo-enco-air-4-pro-etea1-den', 'tai-nghe-bluetooth-tws-oppo-enco-air-4-pro-etea1-den-1-750x500.jpg', 500000.00, 10, 'products/CXCqTnljNuSoxyM4h5RbnwOh64Vi09w78uxSsTdH.jpg', 6, 3, 0.00, 0, 0, 'active', '2025-04-17 00:07:37', '2025-04-17 00:07:37'),
(23, 'tai-nghe-bluetooth-true-wireless-oppo-enco-buds-2-pro', 'tai-nghe-bluetooth-true-wireless-oppo-enco-buds-2-pro-e510', 2000000.00, 5, 'products/f9T4Dv1vv0mSy90zn7rCpEvcA6RZ2msj9JhZpwt3.jpg', 6, 3, 0.00, 0, 0, 'active', '2025-04-17 00:08:25', '2025-04-17 00:08:25'),
(24, 'tai-nghe-apple-earpods-lightning', 'tai-nghe-apple-earpods-lightning-chinh-hang', 800000.00, 10, 'products/qvlLVwOYN8OdlI5H7cjOZedImiJpBgY3W4NU8sjJ.png', 4, 3, 0.00, 0, 0, 'active', '2025-04-17 00:09:16', '2025-04-17 00:09:16'),
(25, 'sony-xperia-xz2', 'sony-xperia-xz2-cu', 10000000.00, 1, 'products/kQ783pxMjrt0l2pClOChi0kIoEkfnBOLcdu0Nf0r.jpg', 5, 2, 0.00, 0, 0, 'active', '2025-04-17 00:10:19', '2025-04-17 00:10:19'),
(26, 'sony-xperia-xz1', 'sony-xperia-xz1 cu', 1000000.00, 1, 'products/TPTvjRitKGR2Oa8wS0urJX2nTcrFZQRuDH0cQyFI.jpg', 5, 2, 0.00, 0, 0, 'active', '2025-04-17 00:11:03', '2025-04-17 00:11:03'),
(27, 'sony-xperia-5', 'sony-xperia-5-mark-3-8gb-128gb-ban-my-cu-99', 5000000.00, 1, 'products/xplCkIGvymtGlbpxK5Zh4FBEnaysM3u4985QUqhb.jpg', 5, 2, 0.00, 0, 0, 'active', '2025-04-17 00:11:50', '2025-04-17 00:11:50'),
(28, 'sony-sn-898', 'sony-sn-898-bluetooth', 400000.00, 1, 'products/cnYuRLiMGj3FxmSZvbTJKc8EusjpZbxtZF5troRa.jpg', 5, 3, 0.00, 0, 0, 'active', '2025-04-17 00:13:05', '2025-04-17 00:13:05'),
(29, 'sony-handy-portable-fmamwide-fm-radio', 'sony-handy-portable-fmamwide-fm-radio-icf-p27-black-icf-p27-bc', 10000000.00, 1, 'products/22JlG6lCVw8cHpZdgZZZTzvafDYModsMQUgT0cAr.jpg', 5, 3, 0.00, 0, 0, 'active', '2025-04-17 00:13:56', '2025-04-17 00:13:56'),
(30, 'oppo-a9', 'oppo-a9', 6000000.00, 12, 'products/boEaxm4T7txgYSKi0GenS1lppmVO0x2B3I00TEia.jpg', 6, 2, 0.00, 0, 0, 'active', '2025-04-17 00:18:26', '2025-04-17 00:18:26'),
(31, 'oppo-a55', 'oppo-a55-4g-thumb-new', 6000000.00, 10, 'products/m3dl9z9KGbegO61a6FA8UV8WSFg0u6TOstMHpkjx.jpg', 6, 2, 0.00, 0, 0, 'active', '2025-04-17 00:19:04', '2025-04-17 00:19:04'),
(32, 'oppo-a91', 'oppo-a91', 7000000.00, 10, 'products/DXXpp0y31gq5cj5MRQZqosSbI5cqaW087PIVlYiS.jpg', 6, 2, 0.00, 0, 0, 'active', '2025-04-17 00:19:43', '2025-04-17 00:19:43'),
(33, 'oppo-a92', 'oppo-a92-tim', 7000000.00, 10, 'products/03fVdvq4GOBD4iKtdWikSdzBDJFczOjiUqOaS50B.jpg', 6, 2, 0.00, 0, 0, 'active', '2025-04-17 00:20:49', '2025-04-17 00:20:49'),
(34, 'Pin oppo', 'pin oppo', 500000.00, 20, 'products/8sNzLLwOEAfVUiPqIVQgrkgULXm2GURtBqwXLSDr.png', 6, 3, 0.00, 0, 0, 'active', '2025-04-17 00:21:39', '2025-04-17 00:21:39'),
(35, 'pin-realme-8', 'pin-realme-8-rmx3085-blp841-zin2-hongchi', 700000.00, 20, 'products/CVUM1memfiH7PAhtELx4tX0RaPHnqDWmMlpkaiTv.jpg', 7, 3, 0.00, 0, 0, 'active', '2025-04-17 00:22:17', '2025-04-17 00:22:17'),
(36, 'op-lung-iphone-16-pro-max', 'op-lung-iphone-16-pro-max', 300000.00, 30, 'products/UDqSHHFWFyA5EfEefMvZeIcyJq0277DacqGIROdy.jpg', 4, 3, 0.00, 0, 0, 'active', '2025-04-17 00:23:20', '2025-04-17 00:23:20'),
(37, 'Xiaomi note-11-pro', 'Xiaomi note-11-pro', 6000000.00, 10, 'products/GqfSzFmfFJal8neNodCvtNYHguiIPg3QAitgcwFr.jpg', 8, 2, 0.00, 0, 0, 'active', '2025-04-17 00:23:59', '2025-04-17 00:23:59'),
(38, 'mat-kinh-oppo', 'mat-kinh-oppo', 50000.00, 10, 'products/9uXgNPwKHrGS2QJYXc1Tacp8G8CQEQRlhDQUNaGZ.png', 6, 3, 0.00, 0, 0, 'active', '2025-04-17 00:24:47', '2025-04-17 00:24:47'),
(39, 'man-hinh-samsung-galaxy-note-20', 'man-hinh-samsung-galaxy-note-20', 5000000.00, 5, 'products/6qs6hBBFRfSQU4zDXjJHIaJ6ZKeicIPrs3kgzYbT.jpg', 3, 3, 0.00, 0, 0, 'active', '2025-04-17 00:25:18', '2025-04-17 00:25:18'),
(40, 'MacBook-Pro-16-inch-M1-Pro-M1-Max', 'MacBook-Pro-16-inch-M1-Pro-M1-Max', 40000000.00, 5, 'products/GXU8eJ2co696e1RgUgsaxcvnqgBNIStP14wVWEh0.png', 4, 5, 0.00, 0, 0, 'active', '2025-04-17 00:26:02', '2025-04-17 00:26:02'),
(41, 'macbook_pro_14_inch_2023', 'macbook_pro_14_inch_2023_545l', 45000000.00, 3, 'products/MDNdZvIENwWWO9gBv2Z1YI1b1xrIlr3tuJIP97Ox.png', 4, 5, 0.00, 0, 0, 'active', '2025-04-17 00:27:17', '2025-04-17 00:27:17'),
(42, 'macbook_pro_14_inch_2023', 'macbook_pro_14_inch_2023_545l', 45000000.00, 3, 'products/iuyaTB4ONzzJ8B1fO3aReGCRZTYLCGYekA2f5n8V.png', 4, 5, 0.00, 0, 0, 'active', '2025-04-17 00:27:18', '2025-04-17 00:27:18'),
(43, 'macbook_pro_14_inch_2021_m1_pro', 'macbook_pro_14_inch_2021_m1_pro', 30000000.00, 5, 'products/pRIKY6nLWLOBnEPtdl1rP4F8kl0ri2jbvT9vGnFW.png', 4, 5, 0.00, 0, 0, 'active', '2025-04-17 00:28:12', '2025-04-17 00:28:12'),
(44, 'apple-airpods-pro-2', 'apple-airpods-pro-2-2023', 1000000.00, 5, 'products/yZl1FaSK2yPQ6DAse9JA7zNg2AbMiLcnbKz0oR7p.jpg', 4, 3, 0.00, 0, 0, 'active', '2025-04-17 00:29:27', '2025-04-17 00:29:27'),
(45, 'audio_airpod', 'audio_airpod', 3000000.00, 5, 'products/jyd6SYaVctSqJtrbCNNmonGT2XchbNMIhH2xYVD6.jpg', 4, 3, 0.00, 0, 0, 'active', '2025-04-17 00:30:14', '2025-04-17 00:30:14'),
(46, 'avt-loa-sony', 'avt-loa-sony-ult-tower-10', 2000000.00, 3, 'products/HPSQMlQq18x4sSLaJhngWpzYbWUOjhCxfiLtxolS.jpg', 5, 3, 0.00, 0, 0, 'active', '2025-04-17 00:31:03', '2025-04-17 00:31:03'),
(47, 'cauchy-passport-deep-grey', 'cauchy-passport-deep-grey-04-b-earphone-cover-opening-combination', 1000000.00, 1, 'products/mEk5OZGa2b5cls5f2ulExQhpc2YhwLvO5TvuBLOn.png', 5, 3, 0.00, 0, 0, 'active', '2025-04-17 00:31:51', '2025-04-17 00:32:04'),
(48, 'coc-sac-nhanh-apple', 'coc-sac-nhanh-apple-20w-type-c-chinh-hang', 500000.00, 5, 'products/1eS2GuwD71N0n2mRqqnravzWcK3orlqnfMMtZDb5.png', 4, 3, 0.00, 0, 0, 'active', '2025-04-17 00:32:55', '2025-04-17 00:32:55'),
(49, 'cu-sac-nhanh-samsung', 'cu-sac-nhanh-samsung-45w-chinh-hang', 15000000.00, 10, 'products/6F76BbzeQf3T9WwuwvwJgXLPh9Ju73NkWxJRKl3z.jpg', 3, 3, 0.00, 0, 0, 'active', '2025-04-17 00:33:57', '2025-04-17 00:33:57'),
(50, 'Laptop Sony Gaming Th4', 'Laptop Sony Gaming Th4', 40000000.00, 10, 'products/0edmZlgHVFcZoXdYfQfpstZP5p5eTG8L3VqchNr0.png', 5, 5, 0.00, 0, 0, 'active', '2025-04-17 00:34:53', '2025-04-17 00:34:53'),
(51, 'galaxy-book4-ultra', 'galaxy-book4-ultra', 25000000.00, 5, 'products/FVa6ZPDP0ZMXqm1cB2a7HqkjhbMOtxkz59iWpkmU.jpg', 3, 5, 0.00, 0, 0, 'active', '2025-04-17 00:35:38', '2025-04-17 00:35:38'),
(52, 'google-tivi-sony', 'google-tivi-sony-2k-32-inch', 12000000.00, 3, 'products/GauUqXeElKtcNh9lzNfZpjG325ByCSmQ7LzRYUMh.png', 5, 4, 0.00, 0, 0, 'active', '2025-04-17 00:36:20', '2025-04-17 00:36:20'),
(53, 'Iphone 16 se', 'Iphone 16 se', 2000000.00, 2, 'products/rcPiguaMi5llHI7AoHzmM3LsQJ5j6dOR7iUwS1N1.jpg', 4, 2, 0.00, 0, 0, 'active', '2025-04-17 00:45:01', '2025-04-17 00:45:01'),
(54, 'Iphone 13 mini', 'Iphone 13 mini', 12000000.00, 5, 'products/AXlCHr0N9yxd16s8lWi8CQECUKx6U6y18guhpdAv.jpg', 4, 2, 0.00, 0, 0, 'active', '2025-04-17 00:45:36', '2025-04-17 00:45:36'),
(55, 'Iphone 12  Mini', 'Iphone 12MiNi', 1200000.00, 2, 'products/iHbk4MjPT3r4V8HbNqS2KBCuqoEZQhpuRlRjYBtV.jpg', 4, 2, 0.00, 0, 0, 'active', '2025-04-17 00:46:43', '2025-04-17 00:46:43'),
(56, 'Iphone 13', 'Iphone 13', 18000000.00, 2, 'products/BQQbFDsG314cQmOtSQkGZGkkG5XTG5DCDACUeyZ3.jpg', 4, 2, 0.00, 0, 0, 'active', '2025-04-17 00:48:09', '2025-04-17 00:48:09'),
(57, 'SamSung A16', 'SamSung A16', 8000000.00, 5, 'products/snXkYzF6IHYAwOW9RFxwG4QJdUqzZnLhqVVcvFQ4.jpg', 3, 2, 0.00, 0, 0, 'active', '2025-04-17 00:50:50', '2025-04-17 00:50:50'),
(58, 'Sam Sung A06', 'Sam Sung A06', 7000000.00, 5, 'products/59UG92swjUen7S5SEirlUNwYxGnSi09IPc4B24bP.jpg', 3, 2, 0.00, 0, 0, 'active', '2025-04-17 00:51:21', '2025-04-17 00:51:21'),
(59, 'Sam Sung A35', 'Sam Sung A35', 8000000.00, 5, 'products/KE12I6YKyTYGCqCtUTrksHdAg5368cMg2Sk9XAiA.jpg', 3, 2, 0.00, 0, 0, 'active', '2025-04-17 00:51:59', '2025-04-17 00:51:59'),
(60, 'SamSung Zilip 6', 'SamSung Zilip 6', 40000000.00, 10, 'products/zVG6RMCXc0qFjQAWplGfJiR0QNyLBRjrejQsQO5x.jpg', 3, 2, 0.00, 0, 0, 'active', '2025-04-17 00:52:43', '2025-04-17 00:52:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `github` varchar(100) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorys_name_unique` (`name`),
  ADD UNIQUE KEY `categorys_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
