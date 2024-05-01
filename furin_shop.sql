-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 05:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furin_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thump` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `view` smallint(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `description`, `thump`, `slug`, `view`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tiêu đề bài viết 1', 'Nội dung bài viết 1', 'thumbnail1.png', 'tieu-de-bai-viet-1', 111, 1, '2024-04-15 16:57:44', '2024-04-15 16:57:44'),
(2, 1, 'Tiêu đề bài viết 2', 'Nội dung bài viết 2', 'thumbnail2.png', 'tieu-de-bai-viet-2', 154, 1, '2024-04-15 16:57:44', '2024-04-15 16:57:44'),
(3, 1, 'Tiêu đề bài viết 3', 'Nội dung bài viết 3', 'thumbnail3.png', 'tieu-de-bai-viet-3', 120, 2, '2024-04-15 16:57:44', '2024-04-15 16:57:44'),
(7, 1, 'Theme blogspot bán hàng thời trang', '<p>Blogspot bán hàng là mẫu template có giao diện đơn giản tập trung vào tốc độ tải trang và thân thiện với mobile rất thích hợp cho cửa hàng vừa và nhỏ, đây là mẫu mới có giao diện đẹp, tốc độ tải trang rất nhanh, dữ liệu có cấu trúc đầy đủ, seo friendly và mobile friendly, bố cục tiện ích gọn gàng dễ dàng cài đặt không phải can thiệp quá nhiều vào theme, v.v..</p><p><a href=\"https://themepoloshop.blogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiFyqOWakh80vZtTTPLH2Tx3KZVOe6udauVTCWmD6-VijT0bz99Ahzrdh5NnLTmHg6R1kCbr7B0AoQ7nc5DKbEuIrYeFUldIKCRcnOlreyoK8uJN4sdhCEsL1NSgeXyJqmKhbXyfTKMx0A/w1200-h630-p-k-no-nu/theme-blogspot-ban-hang-2021-de-su-dung.webp\" alt=\"Theme blogspot tín tức Ô tô, xe máy đẹp chuẩn seo\"></a></p><p><a href=\"https://themepoloshop.blogspot.com/\"><strong>050</strong></a></p><p><a href=\"https://themepoloshop.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Template blogspot bán hàng chuẩn seo tải nhanh</h3><p>Template blogspot bán hàng là mẫu template có giao diện đơn giản tập trung vào tốc độ tải trang và thân thiện với mobile rất thích hợp cho cửa hàng vừa và nhỏ, đây là mẫu mới có giao diện đẹp, tốc độ tải trang rất nhanh, dữ liệu có cấu trúc đầy đủ, seo friendly và mobile friendly, bố cục tiện ích gọn gàng dễ dàng cài đặt không phải can thiệp quá nhiều vào theme, v.v..</p><p><a href=\"https://themeblogspotbanhangdep.blogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgLmUZWcvUiPY4VqpijIvD_W6BefopLr6VqN-2tCo2zC3Z4eLCF2BbxKdoApm10UH8a0WZBkvGcjkdumraVjPuoyFLwnSk-o1JRFB1QmlrPTGO31Q6_bm_aaPCR7GNer352tsplJSbs8_M/s1600/eshop.webpp\" alt=\"Theme blogspot bán hàng nội thất đẹp chuẩn seo\"></a></p><p><a href=\"https://themeblogspotbanhangdep.blogspot.com/\"><strong>049</strong></a></p><p><a href=\"https://theme049.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Template blogspot bán hàng nội thất đẹp chuẩn seo</h3><p>Theme blogspot bán hàng nội thất là mẫu template có giao diện đơn giản tập trung vào tốc độ tải trang và thân thiện với mobile rất thích hợp cho cửa hàng vừa và nhỏ, đây là mẫu mới có giao diện đẹp, tốc độ tải trang rất nhanh, dữ liệu có cấu trúc đầy đủ, seo friendly và mobile friendly, bố cục tiện ích gọn gàng dễ dàng cài đặt không phải can thiệp quá nhiều vào theme, v.v..</p><p><a href=\"https://themeblogspotnoithat.blogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgsASugOKSIN1y4XCeytK_LfRmm4Cizm8C-RNzjjrMC8VUwEK3PBBXNMrdFWzhgUb1RL1e0L5lxdqyyswr2oBwxZk4nGV1sMHamUCZEpl7AKjzdTxejNZpk5R1CpBXgzDylSkp5qDd-LfE/s1600/theme_noi_that.webp\" alt=\"Theme blogspot bán hàng nội thất đẹp chuẩn seo\"></a></p><p><a href=\"https://themeblogspotnoithat.blogspot.com/\"><strong>042</strong></a></p><p><a href=\"https://theme042.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Template blogspot bán hàng thời trang balo túi xách, giày dép, bóp ví nữ</h3><p>Theme blogspot bán hàng thời trang balo túi xách, giày dép, bóp ví nữ là mẫu template có giao diện đơn giản tập trung vào tốc độ tải trang và thân thiện với mobile rất thích hợp cho cửa hàng vừa và nhỏ, đây là mẫu mới có giao diện đẹp, tốc độ tải trang rất nhanh, dữ liệu có cấu trúc đầy đủ, seo friendly và mobile friendly, bố cục tiện ích gọn gàng dễ dàng cài đặt không phải can thiệp quá nhiều vào theme, v.v..</p><p><a href=\"https://themevascara.blogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgPWGfoVz4WJhnkEpGRYS-Ktngg-D2GLrCSR8fuAeSR0ZxOXlvWM08-_QwVNafs0ozykTTf5OAW2C_EhuID8xV5XzULnMHGx0gfx42rn6J8AhU7d6GRdNaulWSrZV5zva75r4n201tUeb8/s1600/theme_thoi_trang.webp\" alt=\"Theme blogspot tín tức Ô tô, xe máy đẹp chuẩn seo\"></a></p><p><a href=\"https://themevascara.blogspot.com/\"><strong>041</strong></a></p><p><a href=\"https://theme041.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Tempalte blogspot bán hàng đẹp chuẩn seo tải nhanh</h3><p>Theme blogspot bán hàng là mẫu template có giao diện đơn giản tập trung vào tốc độ tải trang và thân thiện với mobile rất thích hợp cho cửa hàng vừa và nhỏ, đây là mẫu mới có giao diện đẹp, tốc độ tải trang rất nhanh, dữ liệu có cấu trúc đầy đủ, seo friendly và mobile friendly, bố cục tiện ích gọn gàng dễ dàng cài đặt không phải can thiệp quá nhiều vào theme, v.v..</p><p><a href=\"https://shop.themeblogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEifyMEoQme9_qbaBYJG33qvhUhyLFktnd6ZhTbyR1rfyjUsRdaspmzJGWIbx5NfcLtZMozgHlBt__4IN25t_Hcy_gWy7gDrnaTmebY1-yQatX1aUF3QN2K6WVTR6H4EmveJdRitOuBgaJ4/s1600/theme_blogspot_ban_hang.webp\" alt=\"Theme blogspot tín tức Ô tô, xe máy đẹp chuẩn seo\"></a></p><p><a href=\"https://shop.themeblogspot.com/\"><strong>039</strong></a></p><p><a href=\"https://theme039.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Template blogspot bán hàng Việt Designer Shop</h3><p>Ngay từ tên gọi của nó, theme này mình viết chỉ thiết kế tối ưu cho tính năng bán hàng cho dù là bán bất cứ sản phẩm gì. Dưới đây là danh sách các tính năng mình liệt kê được tích hợp vào theme.</p><p><a href=\"https://store.themeblogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjfgpw_KQtO9gCptWbp0qkG2-KurqwZqev-ykf5qng17zBOMJBk3Emg1JFy3uuevex51u1bK9SkKcCM7LpbyLFASGToQXv9h62w-U_PKn5wNJh2m2dFEX4KvYqECwuHWBb3ZzJ3l1cL8og/s1600/theme_blogspot_viet_designer_shop.webp\" alt=\"Theme blogspot bán hàng Việt Designer Shop\"></a></p><p><a href=\"https://store.themeblogspot.com/\"><strong>036</strong></a></p><p><a href=\"https://theme036.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Tempate blogspot bán hàng Flatsome Mega Shop</h3><p>Theme Blogspot Flatsome Mega Shop bán hàng đẹp chuẩn seo thích hợp cho các shop bán hàng. Template được thiết kế tỉ mỉ đảm bảo các yếu tố cần thiết của một template đẹp chuẩn. Tốc độ tải trang tương đối nhanh, reponsive với mọi kích thước màn hình, thân thiện với mobile, dữ liệu có cấu trúc đầy đủ...</p><p><br>&nbsp;</p><p><a href=\"https://megashop-uxthemes.blogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEixyMFoJAPvNsfWPedCWWXKn6MiRqc-6FZHKjqJTGcEarmKp6nCt2dezV0VzlvDhi1xNoVlLX6a9mJJtLW-sJ6mcQBDhFh79awsTnHvO8ZdcYHEXTXjplOxxBJItaDwHYV-SskzDwLZBYA/s1600/flatsome_mega_shop_blogger_theme.webp\" alt=\"Theme blogspot bán hàng Flatsome Mega Shop\"></a></p><p><a href=\"https://megashop-uxthemes.blogspot.com/\"><strong>030</strong></a></p><p><a href=\"https://theme030.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Template blogspot bán hàng Flatsome Classic Shop</h3><p>Theme Blogspot Flatsome Classic Shop bán hàng đẹp chuẩn seo thích hợp cho các shop bán hàng. Template được thiết kế tỉ mỉ đảm bảo các yếu tố cần thiết của một template đẹp chuẩn. Tốc độ tải trang tương đối nhanh, reponsive với mọi kích thước màn hình, thân thiện với mobile, dữ liệu có cấu trúc đầy đủ...</p>', '1713351334.png', 'theme-blogspot-ban-hang-thoi-trang', 19, 1, '2024-04-17 17:22:28', '2024-04-19 09:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) NOT NULL,
  `blog_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `name`, `email`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Doe', 'john.doe@example.com', 'Quần áo ở đây rất đẹp và chất lượng!', '2024-04-18 19:09:43', '2024-04-18 19:09:43'),
(2, 1, 'Alice Smith', 'alice.smith@example.com', 'Tôi thích kiểu dáng của sản phẩm này.', '2024-04-18 19:09:43', '2024-04-18 19:09:43'),
(3, 1, 'Emma Johnson', 'emma.johnson@example.com', 'Giá cả hợp lý và phong cách đa dạng.', '2024-04-18 19:09:43', '2024-04-18 19:09:43'),
(4, 2, 'Michael Brown', 'michael.brown@example.com', 'Chất lượng sản phẩm tuyệt vời!', '2024-04-18 19:09:43', '2024-04-18 19:09:43'),
(5, 2, 'Sarah Wilson', 'sarah.wilson@example.com', 'Dịch vụ giao hàng nhanh chóng.', '2024-04-18 19:09:43', '2024-04-18 19:09:43'),
(6, 2, 'David Martinez', 'david.martinez@example.com', 'Tôi sẽ quay lại mua sắm ở đây lần nữa.', '2024-04-18 19:09:43', '2024-04-18 19:09:43'),
(7, 3, 'Jessica Taylor', 'jessica.taylor@example.com', 'Cửa hàng này có đủ loại quần áo cho mọi độ tuổi.', '2024-04-18 19:09:43', '2024-04-18 19:09:43'),
(8, 3, 'Matthew Lee', 'matthew.lee@example.com', 'Nhân viên thân thiện và nhiệt tình.', '2024-04-18 19:09:43', '2024-04-18 19:09:43'),
(9, 7, 'Emily Anderson', 'emily.anderson@example.com', 'Sản phẩm đáng giá tiền bỏ ra.', '2024-04-18 19:09:43', '2024-04-18 19:09:43'),
(10, 7, 'Duy Khai', 'khai@gmail.com', 'sss', '2024-04-18 19:36:34', '2024-04-18 19:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) NOT NULL,
  `brandname` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brandname`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Uniqlo', '<p>Uniqlo</p>', 1, '2024-04-24 21:19:15', '2024-04-24 21:19:15'),
(2, 'Muji', '<p>Muji</p>', 1, '2024-04-24 21:19:28', '2024-04-24 21:19:28'),
(3, 'H&M', '<p>H&amp;M</p>', 1, '2024-04-24 21:19:48', '2024-04-24 21:19:48'),
(4, 'Zara', '<p>Zara</p>', 1, '2024-04-24 21:20:23', '2024-04-24 21:20:23'),
(5, 'Elise', '<p>Elise</p>', 1, '2024-04-24 21:21:40', '2024-04-24 21:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-04-24 23:54:24', '2024-04-24 23:54:24'),
(2, 2, '2024-04-25 00:16:28', '2024-04-25 00:16:28'),
(3, 3, '2024-04-24 23:54:24', '2024-04-24 23:54:24'),
(4, 4, '2024-04-25 00:16:28', '2024-04-25 00:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) NOT NULL,
  `cart_id` bigint(20) NOT NULL,
  `product_detail_id` bigint(20) NOT NULL,
  `selected_size` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_detail_id`, `selected_size`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'XXL', 1, '2024-05-01 19:43:49', '2024-05-01 19:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL,
  `parent_id` tinyint(4) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `parent_id`, `description`, `slug`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Man', 0, '<p>Man</p>', 'man', 1, '2024-04-24 20:47:36', '2024-04-24 20:47:36'),
(2, 'Women', 0, '<p>Women</p>', 'women', 1, '2024-04-24 20:48:25', '2024-04-24 20:48:25'),
(3, 'Kids', 0, '<p>Kids</p>', 'kids', 1, '2024-04-24 20:49:47', '2024-04-24 20:49:47'),
(4, 'T-Shirts & Polos', 1, '<p>Man - T-Shirts &amp; Polos</p>', 't-shirts-polos', 1, '2024-04-24 20:55:53', '2024-04-24 20:57:57'),
(5, 'Shirts', 1, '<p>Man - Shirts</p>', 'shirts', 1, '2024-04-24 20:58:37', '2024-04-24 20:58:37'),
(6, 'Cardigans & Sweaters', 1, '<p>Man - Cardigans &amp; Sweaters</p>', 'cardigans-sweaters', 1, '2024-04-24 20:59:10', '2024-04-24 20:59:10'),
(7, 'Sweatshirts & Hoodies', 1, '<p>Man - Sweatshirts &amp; Hoodies</p>', 'sweatshirts-hoodies', 1, '2024-04-24 20:59:59', '2024-04-24 20:59:59'),
(8, 'Coats & Jackets', 1, '<p>Man - Coats &amp; Jackets</p>', 'coats-jackets', 1, '2024-04-24 21:00:31', '2024-04-24 21:00:31'),
(9, 'Shorts & Trousers', 1, '<p>Man - Shorts &amp; Trousers</p>', 'shorts-trousers', 1, '2024-04-24 21:00:51', '2024-04-24 21:00:51'),
(10, 'Business Wear', 1, '<p>Man - Business Wear</p>', 'business-wear', 1, '2024-04-24 21:02:13', '2024-04-24 21:02:13'),
(11, 'Cardigans & Sweaters', 2, '<p>Women - Cardigans &amp; Sweaters</p>', 'cardigans-sweaters', 1, '2024-04-24 21:03:37', '2024-04-24 21:03:37'),
(12, 'T-Shirts', 2, '<p>Women - T-Shirts</p>', 't-shirts', 1, '2024-04-24 21:03:54', '2024-04-24 21:03:54'),
(13, 'Sweatshirts & Hoodies', 2, '<p>Women - Sweatshirts &amp; Hoodies</p>', 'sweatshirts-hoodies', 1, '2024-04-24 21:04:21', '2024-04-24 21:04:21'),
(14, 'Tops & Shirts', 2, '<p>Women - Tops &amp; Shirts</p>', 'tops-shirts', 1, '2024-04-24 21:04:45', '2024-04-24 21:04:45'),
(15, 'Dresses & Tunics', 2, '<p>Women - Dresses &amp; Tunics</p>', 'dresses-tunics', 1, '2024-04-24 21:05:11', '2024-04-24 21:05:11'),
(16, 'Coats & Jackets', 2, '<p>Women - Coats &amp; Jackets</p>', 'coats-jackets', 1, '2024-04-24 21:05:28', '2024-04-24 21:05:28'),
(17, 'Skirts & Trousers', 2, '<p>Women - Skirts &amp; Trousers</p>', 'skirts-trousers', 1, '2024-04-24 21:05:49', '2024-04-24 21:05:49'),
(18, 'Denim', 2, '<p>Women - Denim</p>', 'denim', 1, '2024-04-24 21:06:50', '2024-04-24 21:06:50'),
(19, 'T-Shirts & Polo Shirts', 3, '<p>Kids - T-Shirts &amp; Polo Shirts</p>', 't-shirts-polo-shirts', 1, '2024-04-24 21:13:02', '2024-04-24 21:13:02'),
(20, 'Shorts', 3, '<p>Kids - Shorts</p>', 'shorts', 1, '2024-04-24 21:14:35', '2024-04-24 21:14:35'),
(21, 'Sweatshirts & Hoodies', 3, '<p>Kids - Sweatshirts &amp; Hoodies</p>', 'sweatshirts-hoodies', 1, '2024-04-24 21:16:37', '2024-04-24 21:16:37'),
(22, 'Sweaters', 3, '<p>Kids - Sweaters</p>', 'sweaters', 1, '2024-04-24 21:17:10', '2024-04-24 21:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime NOT NULL DEFAULT current_timestamp(),
  `discount_amount` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `status`, `start_date`, `end_date`, `discount_amount`, `created_at`, `updated_at`) VALUES
(1, '45381288', 1, '2024-04-20 00:00:00', '2024-05-20 00:00:00', 100, '2024-04-19 09:58:15', '2024-04-19 09:58:15'),
(2, '5954d797', 2, '2024-04-21 00:00:00', '2024-05-21 00:00:00', 50, '2024-04-19 09:58:15', '2024-04-19 09:58:15'),
(3, '2ee30355', 1, '2024-04-22 00:00:00', '2024-05-22 00:00:00', 20, '2024-04-19 09:58:15', '2024-04-19 09:58:15'),
(4, 'd8d46ccc', 2, '2024-04-23 00:00:00', '2024-05-23 00:00:00', 30, '2024-04-19 09:58:15', '2024-04-19 09:58:15'),
(5, '0638969e', 1, '2024-04-24 00:00:00', '2024-05-24 00:00:00', 25, '2024-04-19 09:58:15', '2024-04-19 09:58:15'),
(6, 'a79a52ae', 2, '2024-04-25 00:00:00', '2024-05-25 00:00:00', 75, '2024-04-19 09:58:15', '2024-04-19 09:58:15'),
(7, 'dadd4d99', 1, '2024-04-26 00:00:00', '2024-05-26 00:00:00', 40, '2024-04-19 09:58:15', '2024-04-19 09:58:15'),
(8, '665d0171', 2, '2024-04-27 00:00:00', '2024-05-27 00:00:00', 60, '2024-04-19 09:58:15', '2024-04-19 09:58:15'),
(9, 'OahYKDe1', 1, '2024-04-19 00:00:00', '2024-04-27 00:00:00', 19, '2024-04-19 10:55:59', '2024-04-19 10:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phonenumber` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_postcode` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `message` text DEFAULT NULL,
  `payment` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_fullname`, `user_email`, `user_phonenumber`, `user_country`, `user_address`, `user_postcode`, `status`, `discount`, `message`, `payment`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dat', 'truongdat2325@gmail.com', '0799709006', 'Viet Nam', '2-9 Street 18B, Phuoc Binh, District 9, Ho Chi Minh City', '700001', 4, 0, NULL, 'cod', 228, '2024-05-01 21:46:34', '2024-05-01 21:46:53'),
(2, 2, 'Dat', 'truongdat2325@gmail.com', '0799709006', 'Viet Nam', '2-9 Street 18B, Phuoc Binh, District 9, Ho Chi Minh City', '700001', 3, 0, NULL, 'cod', 235, '2024-05-01 21:47:37', '2024-05-01 21:53:16'),
(3, 2, 'Dat', 'truongdat2325@gmail.com', '0799709006', 'Viet Nam', '2-9 Street 18B, Phuoc Binh, District 9, Ho Chi Minh City', '700001', 3, 0, NULL, 'vnpay', 292, '2024-05-01 21:48:23', '2024-05-01 21:53:28'),
(4, 3, 'Ena', '22211tt0373@mail.tdc.edu.vn', '0799709006', 'Viet Nam', '2-9 Street 18B, Phuoc Binh, District 9, Ho Chi Minh City', '700001', 2, 0, NULL, 'cod', 325, '2024-05-01 21:50:43', '2024-05-01 21:55:05'),
(5, 3, 'Ena', '22211tt0373@mail.tdc.edu.vn', '0799709006', 'Viet Nam', '2-9 Street 18B, Phuoc Binh, District 9, Ho Chi Minh City', '700001', 2, 0, NULL, 'vnpay', 130, '2024-05-01 21:51:06', '2024-05-01 21:55:06'),
(6, 2, 'Dat', 'truongdat2325@gmail.com', '0799709006', 'Viet Nam', '2-9 Street 18B, Phuoc Binh, District 9, Ho Chi Minh City', '700001', 1, 0, NULL, 'vnpay', 165, '2024-05-01 21:54:09', '2024-05-01 21:55:34'),
(7, 3, 'Ena', '22211tt0373@mail.tdc.edu.vn', '0799709006', 'Viet Nam', '2-9 Street 18B, Phuoc Binh, District 9, Ho Chi Minh City', '700001', 0, 0, NULL, 'cod', 236, '2024-05-01 21:56:59', '2024-05-01 21:56:59'),
(8, 3, 'Ena', '22211tt0373@mail.tdc.edu.vn', '0799709006', 'Viet Nam', '2-9 Street 18B, Phuoc Binh, District 9, Ho Chi Minh City', '700001', 0, 0, NULL, 'vnpay', 203, '2024-05-01 21:58:02', '2024-05-01 21:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_detail_id` bigint(20) NOT NULL,
  `ordered_size` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `amount` float NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_detail_id`, `ordered_size`, `quantity`, `unit_price`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'L', 2, 79, 158, '2024-05-01 21:46:34', '2024-05-01 21:46:34'),
(2, 1, 2, 'M', 1, 70, 70, '2024-05-01 21:46:34', '2024-05-01 21:46:34'),
(3, 2, 4, 'L', 3, 59, 177, '2024-05-01 21:47:37', '2024-05-01 21:47:37'),
(4, 2, 5, 'S', 2, 29, 58, '2024-05-01 21:47:37', '2024-05-01 21:47:37'),
(5, 3, 10, 'L', 3, 39, 117, '2024-05-01 21:49:12', '2024-05-01 21:49:12'),
(6, 3, 14, 'XL', 5, 35, 175, '2024-05-01 21:49:12', '2024-05-01 21:49:12'),
(7, 4, 17, 'L', 2, 59, 118, '2024-05-01 21:50:43', '2024-05-01 21:50:43'),
(8, 4, 7, 'M', 2, 89, 178, '2024-05-01 21:50:43', '2024-05-01 21:50:43'),
(9, 4, 13, 'XXL', 1, 29, 29, '2024-05-01 21:50:43', '2024-05-01 21:50:43'),
(10, 5, 6, 'XL', 2, 65, 130, '2024-05-01 21:51:22', '2024-05-01 21:51:22'),
(11, 6, 11, 'L', 2, 39, 78, '2024-05-01 21:54:38', '2024-05-01 21:54:38'),
(12, 6, 13, 'XL', 3, 29, 87, '2024-05-01 21:54:39', '2024-05-01 21:54:39'),
(13, 7, 17, 'M', 4, 59, 236, '2024-05-01 21:56:59', '2024-05-01 21:56:59'),
(14, 8, 5, 'S', 4, 29, 116, '2024-05-01 21:58:23', '2024-05-01 21:58:23'),
(15, 8, 12, 'L', 3, 29, 87, '2024-05-01 21:58:23', '2024-05-01 21:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `price_sale` float DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `view_count` int(11) DEFAULT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `newarrival` tinyint(4) NOT NULL DEFAULT 0,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `sold` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `productname`, `price`, `price_sale`, `sku`, `featured`, `slug`, `quantity`, `description`, `created_by`, `view_count`, `trending`, `newarrival`, `image_1`, `image_2`, `sold`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'Comfort Jacket (Wool Like)', 120, 79, 'JKL890', 1, 'comfort-jacket-wool-like', 50, '<p>Comfort Jacket (Wool Like)</p>', 1, 13, 1, 0, 'storage/uploads/product/comfort-jacket-wool-like-3610a597ecf2d51ed7115fe07ef4571a.jpg', 'storage/uploads/product/comfort-jacket-wool-like-00d84d3da2ca2621854be4697e21e9c6.jpg', 0, '2024-04-24 21:45:47', '2024-05-01 21:46:53'),
(2, 8, 1, 'AirSense JACKET (ULTRA LIGHT)', 100, 70, 'HIG567', 1, 'airsense-jacket-ultra-light', 40, '<p>AirSense JACKET (ULTRA LIGHT)</p>', 1, 22, 1, 0, 'storage/uploads/product/airsense-jacket-ultra-light-2964436f6551e445cd3efff2b3cbb464.webp', 'storage/uploads/product/airsense-jacket-ultra-light-08b1fefce405ae1e4d9a64fd4a780db4.webp', 0, '2024-04-24 21:49:04', '2024-05-01 21:46:53'),
(3, 13, 1, 'Linen Blend Sleeveless Blouse', 70, 59, 'EFC234', 1, 'linen-blend-sleeveless-blouse', 90, '<p>Linen Blend Sleeveless Blouse</p>', 1, 25, 1, 0, 'storage/uploads/product/linen-blend-sleeveless-blouse-5f0c967c4477f0554d43dcd9f0257528.avif', 'storage/uploads/product/linen-blend-sleeveless-blouse-3b32025e41226f569134c36131103dcb.avif', 2, '2024-04-24 21:51:31', '2024-05-01 21:53:16'),
(4, 22, 3, 'Warm Padded Washable Quilted', 40, 29, 'ABD901', 1, 'warm-padded-washable-quilted', 41, '<p>Warm Padded Washable Quilted</p>', 1, 3, 1, 0, 'storage/uploads/product/warm-padded-washable-quilted-2da35157a0883bb16cf47624e86f5129.jpg', 'storage/uploads/product/warm-padded-washable-quilted-c2872e334948945d53d9f6962aeb14e3.jpg', 0, '2024-04-24 21:54:44', '2024-05-01 21:58:23'),
(5, 4, 4, 'Miracle Air Blazer (AirSense Blazer)', 70, 65, 'XWZ648', 1, 'miracle-air-blazer-airsense-blazer', 33, '<p>Miracle Air Blazer (AirSense Blazer)</p>', 1, 7, 1, 0, 'storage/uploads/product/miracle-air-blazer-airsense-blazer-a061a0c12fbfd154761944e68b8e6f80.avif', 'storage/uploads/product/miracle-air-blazer-airsense-blazer-2e99f8748c3bb8ea2ccdb7873aac413b.avif', 2, '2024-04-24 21:56:42', '2024-05-01 21:55:06'),
(6, 7, 5, 'Sweat Long Sleeve Cardigan', 110, 89, 'UVW345', 1, 'sweat-long-sleeve-cardigan', 63, '<p>Sweat Long Sleeve Cardigan</p>', 1, 7, 0, 1, 'storage/uploads/product/sweat-long-sleeve-cardigan-78354b3426c1815627f735a75d7b4978.avif', 'storage/uploads/product/sweat-long-sleeve-cardigan-d43fcf728620f3118dcc7ff764ea666d.avif', 2, '2024-04-24 22:00:24', '2024-05-01 21:55:05'),
(7, 5, 2, 'Sweat Long Sleeve Full-Zip Hoodie', 50, 39, 'RST012', 1, 'sweat-long-sleeve-full-zip-hoodie', 113, '<p>Sweat Long Sleeve Full-Zip Hoodie</p>', 1, 12, 0, 1, 'storage/uploads/product/sweat-long-sleeve-full-zip-hoodie-89de9696eea878bb54737406d04208ea.avif', 'storage/uploads/product/sweat-long-sleeve-full-zip-hoodie-20c3211db8710cebf13fef8c754563e5.avif', 0, '2024-04-24 22:03:05', '2024-05-01 21:54:38'),
(8, 4, 1, 'AIRism Cotton Half Sleeve Relaxed T-Shirt', 40, 29, 'OPQ789', 1, 'airism-cotton-half-sleeve-relaxed-t-shirt', 62, '<p>AIRism Cotton Half Sleeve Relaxed T-Shirt</p>', 1, 12, 0, 1, 'storage/uploads/product/airism-cotton-half-sleeve-relaxed-t-shirt-31536ee0120e6af40503a25665d76395.avif', 'storage/uploads/product/airism-cotton-half-sleeve-relaxed-t-shirt-cdff7be61fd167c8f63a0a7bf86f2ccf.avif', 1, '2024-04-24 22:07:04', '2024-05-01 21:58:23'),
(9, 4, 3, 'Cool Touch Woven Polo Shirt', 60, 35, 'LMN456', 1, 'cool-touch-woven-polo-shirt', 75, '<p>Cool Touch Woven Polo Shirt</p>', 1, 61, 0, 1, 'storage/uploads/product/cool-touch-woven-polo-shirt-8dd9aca3c30fde017b92417d93a61daf.jpg', 'storage/uploads/product/cool-touch-woven-polo-shirt-ec4a1448ee24ab4b621906e185042779.jpg', 0, '2024-04-24 22:14:53', '2024-05-01 21:57:29'),
(10, 12, 3, 'Women\'s Soy fiber ribbed Polo Cardigan', 85, 59, 'TUV678', 1, 'womens-soy-fiber-ribbed-polo-cardigan', 29, '<p>Women\'s Soy fiber ribbed Polo Cardigan</p>', 1, 5, 0, 1, 'storage/uploads/product/womens-soy-fiber-ribbed-polo-cardigan-971b9d7ed3faead1c1d83446bf4f2ed5.jpg', 'storage/uploads/product/womens-soy-fiber-ribbed-polo-cardigan-765e3db507eeb4c47e93d471e4d85f6b.jpg', 2, '2024-04-24 23:30:26', '2024-05-01 21:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `colorImg_1` varchar(255) DEFAULT NULL,
  `colorImg_2` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `name`, `color`, `size`, `quantity`, `colorImg_1`, `colorImg_2`, `created_at`, `updated_at`) VALUES
(1, 1, '08 BLACK GRAY', '#37312f', '[\"XS\",\"M\",\"L\",\"XL\"]', 50, 'storage/uploads/product/comfort-jacket-wool-like-3610a597ecf2d51ed7115fe07ef4571a.jpg', 'storage/uploads/product/comfort-jacket-wool-like-00d84d3da2ca2621854be4697e21e9c6.jpg', '2024-05-01 20:16:40', '2024-05-01 21:46:53'),
(2, 2, '07 LIGHT GRAY', '#959597', '[\"S\",\"M\",\"L\",\"XL\",\"XXL\"]', 40, 'storage/uploads/product/airsense-jacket-ultra-light-2964436f6551e445cd3efff2b3cbb464.webp', 'storage/uploads/product/airsense-jacket-ultra-light-08b1fefce405ae1e4d9a64fd4a780db4.webp', '2024-05-01 20:24:49', '2024-05-01 21:46:53'),
(3, 3, '12 PINK', '#fda796', '[\"S\",\"M\",\"XL\",\"XXL\"]', 60, 'storage/uploads/product/linen-blend-sleeveless-blouse-5f0c967c4477f0554d43dcd9f0257528.avif', 'storage/uploads/product/linen-blend-sleeveless-blouse-3b32025e41226f569134c36131103dcb.avif', '2024-05-01 20:29:56', '2024-05-01 20:55:13'),
(4, 3, '27 GREEN', '#88ac94', '[\"S\",\"M\",\"L\",\"XL\"]', 30, 'storage/uploads/product/linen-blend-sleeveless-blouse-554272a60d1f3332a58e6e6eb7e7256d.avif', 'storage/uploads/product/linen-blend-sleeveless-blouse-01b7c17bf04b52bccde40c7e54bef1b5.png', '2024-05-01 20:32:09', '2024-05-01 21:53:16'),
(5, 4, '13 LIGHT PINK', '#e6d6ca', '[\"S\",\"M\",\"XL\"]', 41, 'storage/uploads/product/warm-padded-washable-quilted-b78555f7fda8950127e7529fb15f40cf.jpg', 'storage/uploads/product/warm-padded-washable-quilted-4098ea11dd87cf1b75de220becb7b44b.jpg', '2024-05-01 20:35:55', '2024-05-01 21:58:23'),
(6, 5, '69 NAVY', '#23262f', '[\"S\",\"M\",\"XL\",\"XXL\"]', 33, 'storage/uploads/product/miracle-air-blazer-airsense-blazer-a061a0c12fbfd154761944e68b8e6f80.avif', 'storage/uploads/product/miracle-air-blazer-airsense-blazer-2e99f8748c3bb8ea2ccdb7873aac413b.avif', '2024-05-01 20:37:13', '2024-05-01 21:51:22'),
(7, 6, '00 WHITE', '#f6f1ee', '[\"S\",\"M\",\"XL\",\"XXL\"]', 38, 'storage/uploads/product/sweat-long-sleeve-cardigan-78354b3426c1815627f735a75d7b4978.avif', 'storage/uploads/product/sweat-long-sleeve-cardigan-d43fcf728620f3118dcc7ff764ea666d.avif', '2024-05-01 20:39:08', '2024-05-01 21:50:43'),
(8, 6, '09 BLACK', '#26272b', '[\"S\",\"M\",\"L\",\"XL\"]', 25, 'storage/uploads/product/sweat-long-sleeve-cardigan-bb98f6e5b569d63d123b63d23e3ac4b0.avif', 'storage/uploads/product/sweat-long-sleeve-cardigan-fb50d82a0ae94f9c50f0cf6dcb8edf98.png', '2024-05-01 20:42:38', '2024-05-01 21:16:09'),
(9, 7, '05 GRAY', '#d7d7dd', '[\"S\",\"M\",\"XL\",\"XXL\"]', 37, 'storage/uploads/product/sweat-long-sleeve-full-zip-hoodie-89de9696eea878bb54737406d04208ea.avif', 'storage/uploads/product/sweat-long-sleeve-full-zip-hoodie-20c3211db8710cebf13fef8c754563e5.avif', '2024-05-01 20:44:10', '2024-05-01 20:48:37'),
(10, 7, '09 BLACK', '#24282b', '[\"S\",\"M\",\"L\",\"XL\"]', 50, 'storage/uploads/product/sweat-long-sleeve-full-zip-hoodie-eea60059b4d29e9780b628999a9183d3.avif', 'storage/uploads/product/sweat-long-sleeve-full-zip-hoodie-fb50d82a0ae94f9c50f0cf6dcb8edf98.png', '2024-05-01 20:45:56', '2024-05-01 21:53:28'),
(11, 7, '67 BLUE', '#273a59', '[\"S\",\"M\",\"L\"]', 26, 'storage/uploads/product/sweat-long-sleeve-full-zip-hoodie-cb0850c4638cbd8416da88d0d19ef337.avif', 'storage/uploads/product/sweat-long-sleeve-full-zip-hoodie-e5707cf8fe7c4294c1edca89d291bbb5.png', '2024-05-01 20:47:47', '2024-05-01 21:54:38'),
(12, 8, '57 OLIVE', '#817f65', '[\"S\",\"M\",\"L\",\"XL\"]', 24, 'storage/uploads/product/airism-cotton-half-sleeve-relaxed-t-shirt-31536ee0120e6af40503a25665d76395.avif', 'storage/uploads/product/airism-cotton-half-sleeve-relaxed-t-shirt-cdff7be61fd167c8f63a0a7bf86f2ccf.avif', '2024-05-01 20:53:11', '2024-05-01 21:58:23'),
(13, 8, '31 BEIGE', '#d6c9c0', '[\"M\",\"L\",\"XL\",\"XXL\"]', 38, 'storage/uploads/product/airism-cotton-half-sleeve-relaxed-t-shirt-06762ab2ba4618c2e7a479bbda324db8.png', 'storage/uploads/product/airism-cotton-half-sleeve-relaxed-t-shirt-19c01a799070b5cb06be46f66732226a.png', '2024-05-01 20:54:37', '2024-05-01 21:54:39'),
(14, 9, '68 NAVY BLUE', '#212f3e', '[\"S\",\"M\",\"L\",\"XL\"]', 30, 'storage/uploads/product/cool-touch-woven-polo-shirt-8dd9aca3c30fde017b92417d93a61daf.jpg', 'storage/uploads/product/cool-touch-woven-polo-shirt-ec4a1448ee24ab4b621906e185042779.jpg', '2024-05-01 20:57:24', '2024-05-01 21:53:28'),
(15, 9, '08 BLACK GRAY', '#24292c', '[\"XS\",\"M\",\"L\"]', 25, 'storage/uploads/product/cool-touch-woven-polo-shirt-4380ac7fa2559780b86093f5b374bb70.jpg', 'storage/uploads/product/cool-touch-woven-polo-shirt-c90e0bbec872b5da14f1791191575b90.jpg', '2024-05-01 20:58:46', '2024-05-01 21:06:00'),
(16, 9, '03 LIGHT GRAY', '#d3d5d8', '[\"L\",\"XL\",\"XXL\"]', 20, 'storage/uploads/product/cool-touch-woven-polo-shirt-56288d3fae83c555d119bfb97f5891a8.jpg', 'storage/uploads/product/cool-touch-woven-polo-shirt-66ff39b2bf8e6522de868c64c5a2b83c.jpg', '2024-05-01 21:00:17', '2024-05-01 21:02:11'),
(17, 10, '09 BLACK', '#181a1c', '[\"XS\",\"S\",\"M\",\"L\"]', 29, 'storage/uploads/product/womens-soy-fiber-ribbed-polo-cardigan-971b9d7ed3faead1c1d83446bf4f2ed5.jpg', 'storage/uploads/product/womens-soy-fiber-ribbed-polo-cardigan-765e3db507eeb4c47e93d471e4d85f6b.jpg', '2024-05-01 21:04:53', '2024-05-01 21:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 4, 9, 5, 'Test #1', '2024-04-25 00:50:03', '2024-04-25 00:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `gender`, `phonenumber`, `address`, `avatar`, `level`, `remember_token`, `active`, `country`, `postcode`, `created_at`, `updated_at`) VALUES
(1, 'えにゃん', 'enyan27@gmail.com', '$2y$10$VnWYBmgAozXAP5kFrkFt1ehrc8NcoGro7Z8lMRvwcsOiIhxF80qAu', 0, '0799709025', '53 Vo Van Ngan, Linh Chieu, Thu Duc City, Ho Chi Minh City', 'storage/uploads/user/2024/03/14/avatar-enananuser-Fb30iZYaIAItbBf.jpg', 0, NULL, 0, NULL, NULL, '2024-02-14 18:25:00', '2024-04-25 01:03:25'),
(2, 'Dat', 'truongdat2325@gmail.com', '$2y$10$C9QvN6si8sLiZBmdUQOk8emMoqJ83r7llZ0mibL.kCnszCKC.9QBO', 0, '0799709006', '2-9 Street 18B, Phuoc Binh, District 9, Ho Chi Minh City', 'storage/uploads/user/2024/04/25/avatar-dat-luca-florio-Sts4Q22v8ts-unsplash.jpg', 2, NULL, 0, 'Viet Nam', '700001', '2024-04-24 23:54:24', '2024-05-01 18:37:17'),
(3, 'Ena', '22211tt0373@mail.tdc.edu.vn', '$2y$10$uqW505PtsKRzZrPZ7MHc/.XZ8WbF3.izib.YPtONF7c0ec.NRchzS', 0, '0799709006', '2-9 Street 18B, Phuoc Binh, District 9, Ho Chi Minh City', NULL, 2, NULL, 0, 'Viet Nam', '700001', '2024-04-25 00:16:28', '2024-05-01 18:36:50'),
(4, 'Do Duy Khai', 'khai@gmail.com', '$2y$10$Dh4R8/Vt9LJhFXjkCY8EKuHr/zxvgHnBjumXUo53jSOPDEOTnqAja', 0, '096322446', 'None', 'storage/uploads/user/2024/04/25/avatar-do-duy-khai-F1OhzhtacAAtc46.jpg', 0, NULL, 0, NULL, NULL, '2024-04-25 00:23:53', '2024-04-25 00:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wish_lists`
--

INSERT INTO `wish_lists` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 3, 2, '2024-04-25 00:01:55', '2024-04-25 00:01:55'),
(4, 6, 2, '2024-04-25 00:01:57', '2024-04-25 00:01:57'),
(6, 9, 3, '2024-04-25 00:34:53', '2024-04-25 00:34:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
