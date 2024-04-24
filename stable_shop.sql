-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 21, 2024 lúc 02:57 PM
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
-- Cơ sở dữ liệu: `stable_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
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
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `description`, `thump`, `slug`, `view`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'Tiêu đề bài viết 1', 'Nội dung bài viết 1', 'thumbnail1.png', 'tieu-de-bai-viet-1', 111, 1, '2024-04-15 16:57:44', '2024-04-15 16:57:44'),
(2, 1, 'Tiêu đề bài viết 2', 'Nội dung bài viết 2', 'thumbnail2.png', 'tieu-de-bai-viet-2', 153, 1, '2024-04-15 16:57:44', '2024-04-15 16:57:44'),
(3, 8, 'Tiêu đề bài viết 3', 'Nội dung bài viết 3', 'thumbnail3.png', 'tieu-de-bai-viet-3', 120, 2, '2024-04-15 16:57:44', '2024-04-15 16:57:44'),
(7, 8, 'Theme blogspot bán hàng thời trang', '<p>Blogspot bán hàng là mẫu template có giao diện đơn giản tập trung vào tốc độ tải trang và thân thiện với mobile rất thích hợp cho cửa hàng vừa và nhỏ, đây là mẫu mới có giao diện đẹp, tốc độ tải trang rất nhanh, dữ liệu có cấu trúc đầy đủ, seo friendly và mobile friendly, bố cục tiện ích gọn gàng dễ dàng cài đặt không phải can thiệp quá nhiều vào theme, v.v..</p><p><a href=\"https://themepoloshop.blogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiFyqOWakh80vZtTTPLH2Tx3KZVOe6udauVTCWmD6-VijT0bz99Ahzrdh5NnLTmHg6R1kCbr7B0AoQ7nc5DKbEuIrYeFUldIKCRcnOlreyoK8uJN4sdhCEsL1NSgeXyJqmKhbXyfTKMx0A/w1200-h630-p-k-no-nu/theme-blogspot-ban-hang-2021-de-su-dung.webp\" alt=\"Theme blogspot tín tức Ô tô, xe máy đẹp chuẩn seo\"></a></p><p><a href=\"https://themepoloshop.blogspot.com/\"><strong>050</strong></a></p><p><a href=\"https://themepoloshop.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Template blogspot bán hàng chuẩn seo tải nhanh</h3><p>Template blogspot bán hàng là mẫu template có giao diện đơn giản tập trung vào tốc độ tải trang và thân thiện với mobile rất thích hợp cho cửa hàng vừa và nhỏ, đây là mẫu mới có giao diện đẹp, tốc độ tải trang rất nhanh, dữ liệu có cấu trúc đầy đủ, seo friendly và mobile friendly, bố cục tiện ích gọn gàng dễ dàng cài đặt không phải can thiệp quá nhiều vào theme, v.v..</p><p><a href=\"https://themeblogspotbanhangdep.blogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgLmUZWcvUiPY4VqpijIvD_W6BefopLr6VqN-2tCo2zC3Z4eLCF2BbxKdoApm10UH8a0WZBkvGcjkdumraVjPuoyFLwnSk-o1JRFB1QmlrPTGO31Q6_bm_aaPCR7GNer352tsplJSbs8_M/s1600/eshop.webpp\" alt=\"Theme blogspot bán hàng nội thất đẹp chuẩn seo\"></a></p><p><a href=\"https://themeblogspotbanhangdep.blogspot.com/\"><strong>049</strong></a></p><p><a href=\"https://theme049.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Template blogspot bán hàng nội thất đẹp chuẩn seo</h3><p>Theme blogspot bán hàng nội thất là mẫu template có giao diện đơn giản tập trung vào tốc độ tải trang và thân thiện với mobile rất thích hợp cho cửa hàng vừa và nhỏ, đây là mẫu mới có giao diện đẹp, tốc độ tải trang rất nhanh, dữ liệu có cấu trúc đầy đủ, seo friendly và mobile friendly, bố cục tiện ích gọn gàng dễ dàng cài đặt không phải can thiệp quá nhiều vào theme, v.v..</p><p><a href=\"https://themeblogspotnoithat.blogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgsASugOKSIN1y4XCeytK_LfRmm4Cizm8C-RNzjjrMC8VUwEK3PBBXNMrdFWzhgUb1RL1e0L5lxdqyyswr2oBwxZk4nGV1sMHamUCZEpl7AKjzdTxejNZpk5R1CpBXgzDylSkp5qDd-LfE/s1600/theme_noi_that.webp\" alt=\"Theme blogspot bán hàng nội thất đẹp chuẩn seo\"></a></p><p><a href=\"https://themeblogspotnoithat.blogspot.com/\"><strong>042</strong></a></p><p><a href=\"https://theme042.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Template blogspot bán hàng thời trang balo túi xách, giày dép, bóp ví nữ</h3><p>Theme blogspot bán hàng thời trang balo túi xách, giày dép, bóp ví nữ là mẫu template có giao diện đơn giản tập trung vào tốc độ tải trang và thân thiện với mobile rất thích hợp cho cửa hàng vừa và nhỏ, đây là mẫu mới có giao diện đẹp, tốc độ tải trang rất nhanh, dữ liệu có cấu trúc đầy đủ, seo friendly và mobile friendly, bố cục tiện ích gọn gàng dễ dàng cài đặt không phải can thiệp quá nhiều vào theme, v.v..</p><p><a href=\"https://themevascara.blogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgPWGfoVz4WJhnkEpGRYS-Ktngg-D2GLrCSR8fuAeSR0ZxOXlvWM08-_QwVNafs0ozykTTf5OAW2C_EhuID8xV5XzULnMHGx0gfx42rn6J8AhU7d6GRdNaulWSrZV5zva75r4n201tUeb8/s1600/theme_thoi_trang.webp\" alt=\"Theme blogspot tín tức Ô tô, xe máy đẹp chuẩn seo\"></a></p><p><a href=\"https://themevascara.blogspot.com/\"><strong>041</strong></a></p><p><a href=\"https://theme041.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Tempalte blogspot bán hàng đẹp chuẩn seo tải nhanh</h3><p>Theme blogspot bán hàng là mẫu template có giao diện đơn giản tập trung vào tốc độ tải trang và thân thiện với mobile rất thích hợp cho cửa hàng vừa và nhỏ, đây là mẫu mới có giao diện đẹp, tốc độ tải trang rất nhanh, dữ liệu có cấu trúc đầy đủ, seo friendly và mobile friendly, bố cục tiện ích gọn gàng dễ dàng cài đặt không phải can thiệp quá nhiều vào theme, v.v..</p><p><a href=\"https://shop.themeblogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEifyMEoQme9_qbaBYJG33qvhUhyLFktnd6ZhTbyR1rfyjUsRdaspmzJGWIbx5NfcLtZMozgHlBt__4IN25t_Hcy_gWy7gDrnaTmebY1-yQatX1aUF3QN2K6WVTR6H4EmveJdRitOuBgaJ4/s1600/theme_blogspot_ban_hang.webp\" alt=\"Theme blogspot tín tức Ô tô, xe máy đẹp chuẩn seo\"></a></p><p><a href=\"https://shop.themeblogspot.com/\"><strong>039</strong></a></p><p><a href=\"https://theme039.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Template blogspot bán hàng Việt Designer Shop</h3><p>Ngay từ tên gọi của nó, theme này mình viết chỉ thiết kế tối ưu cho tính năng bán hàng cho dù là bán bất cứ sản phẩm gì. Dưới đây là danh sách các tính năng mình liệt kê được tích hợp vào theme.</p><p><a href=\"https://store.themeblogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjfgpw_KQtO9gCptWbp0qkG2-KurqwZqev-ykf5qng17zBOMJBk3Emg1JFy3uuevex51u1bK9SkKcCM7LpbyLFASGToQXv9h62w-U_PKn5wNJh2m2dFEX4KvYqECwuHWBb3ZzJ3l1cL8og/s1600/theme_blogspot_viet_designer_shop.webp\" alt=\"Theme blogspot bán hàng Việt Designer Shop\"></a></p><p><a href=\"https://store.themeblogspot.com/\"><strong>036</strong></a></p><p><a href=\"https://theme036.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Tempate blogspot bán hàng Flatsome Mega Shop</h3><p>Theme Blogspot Flatsome Mega Shop bán hàng đẹp chuẩn seo thích hợp cho các shop bán hàng. Template được thiết kế tỉ mỉ đảm bảo các yếu tố cần thiết của một template đẹp chuẩn. Tốc độ tải trang tương đối nhanh, reponsive với mọi kích thước màn hình, thân thiện với mobile, dữ liệu có cấu trúc đầy đủ...</p><p><br>&nbsp;</p><p><a href=\"https://megashop-uxthemes.blogspot.com/\"><img src=\"https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEixyMFoJAPvNsfWPedCWWXKn6MiRqc-6FZHKjqJTGcEarmKp6nCt2dezV0VzlvDhi1xNoVlLX6a9mJJtLW-sJ6mcQBDhFh79awsTnHvO8ZdcYHEXTXjplOxxBJItaDwHYV-SskzDwLZBYA/s1600/flatsome_mega_shop_blogger_theme.webp\" alt=\"Theme blogspot bán hàng Flatsome Mega Shop\"></a></p><p><a href=\"https://megashop-uxthemes.blogspot.com/\"><strong>030</strong></a></p><p><a href=\"https://theme030.blogspot.com/\">Xem trước</a><a href=\"https://zalo.me/0974858395\">Liên hệ</a></p><h3>Template blogspot bán hàng Flatsome Classic Shop</h3><p>Theme Blogspot Flatsome Classic Shop bán hàng đẹp chuẩn seo thích hợp cho các shop bán hàng. Template được thiết kế tỉ mỉ đảm bảo các yếu tố cần thiết của một template đẹp chuẩn. Tốc độ tải trang tương đối nhanh, reponsive với mọi kích thước màn hình, thân thiện với mobile, dữ liệu có cấu trúc đầy đủ...</p>', '1713351334.png', 'theme-blogspot-ban-hang-thoi-trang', 19, 1, '2024-04-17 17:22:28', '2024-04-19 09:34:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comments`
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
-- Đang đổ dữ liệu cho bảng `blog_comments`
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
-- Cấu trúc bảng cho bảng `brands`
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
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brandname`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', '<p>Adidas</p>', 1, '2023-03-20 13:14:15', '2024-03-27 22:07:34'),
(2, 'Nike', '<p>Nike</p>', 1, '2023-03-21 16:34:05', '2024-03-27 22:07:40'),
(3, 'MLB', '<p>MLB</p>', 1, '2023-03-21 16:34:10', '2024-03-27 22:07:46'),
(4, 'PUMA', '<p>PUMA</p>', 1, '2023-03-21 16:34:16', '2024-03-27 22:07:59'),
(5, 'Uniqlo', '<p>Uniqlo</p>', 1, '2023-03-21 16:34:21', '2024-03-27 22:08:08'),
(6, 'Niigoji', '<figure class=\"image\"><img src=\"https://static.miraheze.org/projectsekaiwiki/0/06/Ena_3_art.png\"></figure>', 1, '2024-02-14 16:47:17', '2024-02-14 16:47:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 7, '2024-03-28 00:53:26', '2024-03-28 00:53:26'),
(2, 9, '2024-04-15 13:00:03', '2024-04-15 13:00:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) NOT NULL,
  `cart_id` bigint(20) NOT NULL,
  `product_detail_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_detail_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 7, '2024-03-28 00:55:38', '2024-03-28 00:55:38'),
(2, 2, 4, 1, '2024-04-16 21:27:43', '2024-04-16 21:27:43'),
(3, 2, 1, 1, '2024-04-16 21:27:54', '2024-04-16 21:27:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
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
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `parent_id`, `description`, `slug`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Man', 0, '<p>Điện thoại</p>', 'man', 1, '2024-01-22 13:16:04', '2024-03-27 21:58:17'),
(2, 'Man Shorts', 1, '<p>iPhone</p>', 'man-shorts', 1, '2024-01-22 13:16:04', '2024-03-27 21:58:33'),
(3, 'Man T-Shirts', 1, '<p>Samsung</p>', 'man-t-shirts', 1, '2024-01-22 13:16:04', '2024-03-27 21:58:45'),
(4, 'Man Hoodie', 1, '<p>Xiaomi</p>', 'man-hoodie', 1, '2024-01-22 13:16:04', '2024-03-27 21:58:53'),
(5, 'Man Sweater', 1, '<p>OnePlus</p>', 'man-sweater', 1, '2024-01-22 13:16:04', '2024-03-27 21:59:02'),
(6, 'Women', 0, '<p>Laptop</p>', 'women', 1, '2024-01-22 13:16:04', '2024-03-27 21:59:11'),
(7, 'Kids', 0, '<p>Đồng hồ</p>', 'kids', 1, '2024-01-22 13:16:04', '2024-03-27 22:00:06'),
(8, 'Women Hoodie', 6, '<p>Mac</p>', 'women-hoodie', 1, '2024-01-22 13:16:04', '2024-03-27 22:00:13'),
(9, 'Women Jackets', 6, '<p>Asus</p>', 'women-jackets', 1, '2024-01-22 13:16:04', '2024-03-27 22:00:26'),
(10, 'Kids Sweatshirt', 7, '<p>Asus</p>', 'kids-sweatshirt', 1, '2024-01-22 13:16:04', '2024-03-27 22:00:37'),
(11, 'Kids T-Shirts', 7, '<p>Huawei</p>', 'kids-t-shirts', 1, '2024-01-22 13:16:04', '2024-03-27 22:00:47'),
(12, 'Dress', 6, '<p>Acer</p>', 'dress', 1, '2024-01-22 13:16:04', '2024-03-27 22:00:59'),
(13, 'Man Blazer', 1, '<p>Huawei</p>', 'man-blazer', 1, '2024-01-22 13:16:04', '2024-03-27 22:01:08'),
(14, 'Kids Jacket', 1, '<p>Oppo</p>', 'kids-jacket', 1, '2024-01-22 13:16:04', '2024-03-27 22:01:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
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
-- Đang đổ dữ liệu cho bảng `coupons`
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
-- Cấu trúc bảng cho bảng `orders`
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
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_fullname`, `user_email`, `user_phonenumber`, `user_country`, `user_address`, `user_postcode`, `status`, `discount`, `message`, `payment`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 4, 0, NULL, 'cod', 70, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(2, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 4, 0, NULL, 'cod', 70, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(3, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 4, 0, NULL, 'cod', 70, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(4, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 4, 0, NULL, 'cod', 70, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(5, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 2, 0, NULL, 'cod', 70, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(6, 3, 'Đạt', 'truongdat2325@gmail.com', '342456252', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '100001', 4, 0, NULL, 'cod', 105, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(7, 3, 'Đạt', 'truongdat2325@gmail.com', '342456252', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '100001', 4, 0, NULL, 'cod', 105, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(9, 3, 'Đạt', 'truongdat2325@gmail.com', '342456252', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '100001', 4, 0, NULL, 'cod', 105, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(10, 3, 'Đạt', 'truongdat2325@gmail.com', '342456252', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '100001', 4, 0, NULL, 'cod', 105, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(11, 3, 'Đạt', 'truongdat2325@gmail.com', '342456252', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '100001', 4, 0, NULL, 'cod', 105, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(12, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 4, 0, NULL, 'cod', 278, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(13, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 4, 0, NULL, 'cod', 278, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(14, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 4, 0, NULL, 'cod', 278, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(15, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 4, 0, NULL, 'cod', 278, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(16, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 4, 0, NULL, 'cod', 105, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(17, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 2, 0, NULL, 'cod', 105, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(18, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 3, 0, NULL, 'cod', 32, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(19, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 1, 0, NULL, 'cod', 32, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(20, 2, 'Đạt', 'truongdat2325@gmail.com', '214124124', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '07000', 1, 0, NULL, 'cod', 29, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(22, 3, 'Đạt', 'truongdat2325@gmail.com', '0967463724', 'Việt Nam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '42000', 0, 0, NULL, 'cod', 525, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(23, 3, 'Đạt', 'truongdat2325@gmail.com', '342456252', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '100001', 0, 0, NULL, 'cod', 105, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(24, 3, 'Đạt', 'truongdat2325@gmail.com', '342456252', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '100001', 0, 0, NULL, 'cod', 105, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(25, 3, 'Đạt', 'truongdat2325@gmail.com', '342456252', 'Vietnam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '100001', 0, 0, NULL, 'cod', 29, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(26, 4, 'Đạt', 'truongdat2325@gmail.com', '6576787685675', 'demo', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '7777', 0, 0, NULL, 'cod', 210, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(27, 4, 'Đạt', 'truongdat2325@gmail.com', '6576787685675', 'demo', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '7777', 0, 0, NULL, 'cod', 210, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(28, 4, 'Đạt', 'truongdat2325@gmail.com', '6576787685675', 'demo', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '7777', 0, 0, NULL, 'cod', 210, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(30, 5, 'Đạt', 'truongdat2325@gmail.com', '0799709006', 'Japan', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '1000007', 0, 0, NULL, 'cod', 498, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(31, 5, 'Đạt', 'truongdat2325@gmail.com', '0799709006', 'Japan', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '1000007', 0, 0, NULL, 'cod', 498, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(32, 5, 'Đạt', 'truongdat2325@gmail.com', '0799709006', 'Japan', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '1000007', 0, 0, NULL, 'cod', 498, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(33, 5, 'Đạt', 'truongdat2325@gmail.com', '0799709006', 'Viet Nam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '100007', 1, 0, NULL, 'cod', 29, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(34, 5, 'Đạt', 'truongdat2325@gmail.com', '0799709006', 'Viet Nam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '10007', 1, 0, NULL, 'cod', 29, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(35, 5, 'Đạt', 'truongdat2325@gmail.com', '0799709006', 'Tokyo', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '10007', 1, 0, NULL, 'cod', 25, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(36, 7, 'Đạt', 'truongdat2325@gmail.com', '0799709025', 'Viet Nam', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '10007', 2, 0, NULL, 'cod', 623, '2024-01-22 16:47:59', '2024-03-14 16:50:56'),
(37, 7, 'Đạt', 'truongdat2325@gmail.com', '0799709025', 'Tokyo', '〒338-0001 Saitama, Chuo Ward, dKamiochiai, 3 Chome−2−6 立川ビル', '700001', 1, 0, NULL, 'cod', 125, '2024-01-22 16:47:59', '2024-03-14 16:50:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_detail_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `amount` float NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_detail_id`, `quantity`, `unit_price`, `amount`, `created_at`, `updated_at`) VALUES
(1, 5, 15, 2, 35, 70, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(2, 10, 53, 1, 105, 105, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(3, 11, 53, 1, 105, 105, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(4, 12, 56, 1, 249, 249, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(5, 13, 56, 1, 249, 249, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(6, 14, 56, 1, 249, 249, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(7, 15, 56, 1, 249, 249, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(8, 15, 44, 1, 29, 29, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(9, 16, 53, 1, 105, 105, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(10, 17, 53, 1, 105, 105, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(11, 18, 41, 1, 32, 32, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(12, 19, 40, 1, 32, 32, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(13, 20, 44, 1, 29, 29, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(14, 24, 53, 1, 105, 105, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(15, 25, 44, 1, 29, 29, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(16, 28, 53, 2, 105, 210, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(17, 33, 44, 1, 29, 29, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(18, 34, 44, 1, 29, 29, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(19, 35, 62, 1, 25, 25, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(20, 36, 62, 5, 25, 125, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(21, 36, 57, 2, 249, 498, '2024-01-22 16:49:18', '2024-03-14 16:49:18'),
(22, 37, 62, 5, 25, 125, '2024-01-22 16:49:18', '2024-03-14 16:49:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `productname`, `price`, `price_sale`, `sku`, `featured`, `slug`, `quantity`, `description`, `created_by`, `view_count`, `trending`, `newarrival`, `image_1`, `image_2`, `sold`, `created_at`, `updated_at`) VALUES
(1, 13, 5, 'Comfort Jacket (Wool Like)', 300, 249, 'UNI980', 1, 'comfort-jacket-wool-like', 120, '<p>Comfort Jacket (Wool Like)</p>', 6, 13, 1, 0, 'storage/uploads/product/comfort-jacket-wool-like-b26d860cbaca513e0ccf7720f07535c0.jpg', 'storage/uploads/product/comfort-jacket-wool-like-00d84d3da2ca2621854be4697e21e9c6.jpg', 0, '2024-03-14 21:49:00', '2024-04-21 19:13:18'),
(2, 3, 4, 'AirSense JACKET (ULTRA LIGHT)', 400, 350, 'PMA581', 1, 'airsense-jacket-ultra-light', 70, '<p><strong>AirSense JACKET (ULTRA LIGHT)</strong></p>', 6, 23, 1, 0, 'storage/uploads/product/airsense-jacket-ultra-light-02127713910dace470e26c8726dd43a4.webp', 'storage/uploads/product/airsense-jacket-ultra-light-e5cfebc3ccf8ec84460d77967dc6d353.webp', 0, '2024-03-14 22:02:30', '2024-04-21 19:49:01'),
(3, 8, 3, 'Linen Blend Sleeveless Blouse', 329, 299, 'MLB575', 1, 'linen-blend-sleeveless-blouse', 25, '<p><strong>Linen Blend Sleeveless Blouse</strong></p>', 6, 34, 0, 1, 'storage/uploads/product/linen-blend-sleeveless-blouse-e9c873e04541af37d6342e04e7ff341b.avif', 'storage/uploads/product/linen-blend-sleeveless-blouse-83c75f432fdd84c3a779a2eab38082cc.avif', 0, '2024-03-27 22:29:05', '2024-04-21 19:34:13'),
(4, 10, 2, 'Warm Padded Washable Quilted', 500, 399, 'NIK667', 1, 'warm-padded-washable-quilted', 90, '<p>Warm Padded Washable Quilted</p>', 6, 40, 0, 1, 'storage/uploads/product/warm-padded-washable-quilted-34fa9125e042592c5d5c8c0c412bd703.jpg', 'storage/uploads/product/warm-padded-washable-quilted-42d76093200845b3fe6eeb357d764332.jpg', 0, '2024-03-27 23:39:19', '2024-04-21 19:09:11'),
(5, 2, 1, 'Miracle Air Blazer (AirSense Blazer)', 450, 399, 'ADS167', 1, 'miracle-air-blazer-airsense-blazer', 56, '<p>Miracle Air Blazer (AirSense Blazer)</p>', 6, 37, 0, 1, 'storage/uploads/product/miracle-air-blazer-airsense-blazer-888a77fe4a9b586194c098c0f283e7a5.avif', 'storage/uploads/product/miracle-air-blazer-airsense-blazer-bec6f209ebf2b70ecd4e94a4fc2be24d.avif', 0, '2024-03-27 23:53:56', '2024-04-21 19:56:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `colorImg_1` varchar(255) DEFAULT NULL,
  `colorImg_2` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `color`, `size`, `quantity`, `colorImg_1`, `colorImg_2`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blue', 'L', 70, 'storage/uploads/product/comfort-jacket-wool-like-b26d860cbaca513e0ccf7720f07535c0.jpg', 'storage/uploads/product/comfort-jacket-wool-like-00d84d3da2ca2621854be4697e21e9c6.jpg', '2024-03-14 21:56:48', '2024-03-27 22:25:12'),
(2, 1, 'Black', 'XL', 50, 'storage/uploads/product/comfort-jacket-wool-like-b26d860cbaca513e0ccf7720f07535c0.jpg', 'storage/uploads/product/comfort-jacket-wool-like-00d84d3da2ca2621854be4697e21e9c6.jpg', '2024-03-14 21:58:15', '2024-03-27 22:24:54'),
(3, 2, '#bdc3c7', 'XL', 20, 'storage/uploads/product/airsense-jacket-ultra-light-02127713910dace470e26c8726dd43a4.webp', 'storage/uploads/product/airsense-jacket-ultra-light-e5cfebc3ccf8ec84460d77967dc6d353.webp', '2024-03-14 22:04:05', '2024-03-27 23:44:23'),
(4, 3, '#f7797d', 'M', 25, 'storage/uploads/product/linen-blend-sleeveless-blouse-e9c873e04541af37d6342e04e7ff341b.avif', 'storage/uploads/product/linen-blend-sleeveless-blouse-83c75f432fdd84c3a779a2eab38082cc.avif', '2024-03-27 22:29:40', '2024-03-27 23:41:28'),
(5, 2, '#636FA4', 'S', 40, 'storage/uploads/product/airsense-jacket-ultra-light-02127713910dace470e26c8726dd43a4.webp', 'storage/uploads/product/airsense-jacket-ultra-light-e5cfebc3ccf8ec84460d77967dc6d353.webp', '2024-03-27 23:43:26', '2024-03-27 23:43:26'),
(6, 2, '#bdc3c7', 'L', 10, 'storage/uploads/product/airsense-jacket-ultra-light-02127713910dace470e26c8726dd43a4.webp', 'storage/uploads/product/airsense-jacket-ultra-light-e5cfebc3ccf8ec84460d77967dc6d353.webp', '2024-03-27 23:44:46', '2024-03-27 23:44:46'),
(7, 4, '#ffc3a0', 'M', 70, 'storage/uploads/product/warm-padded-washable-quilted-b78555f7fda8950127e7529fb15f40cf.jpg', 'storage/uploads/product/warm-padded-washable-quilted-4098ea11dd87cf1b75de220becb7b44b.jpg', '2024-03-27 23:46:02', '2024-03-27 23:46:02'),
(8, 4, '#ffc3a0', 'S', 20, 'storage/uploads/product/warm-padded-washable-quilted-34fa9125e042592c5d5c8c0c412bd703.jpg', 'storage/uploads/product/warm-padded-washable-quilted-42d76093200845b3fe6eeb357d764332.jpg', '2024-03-27 23:46:22', '2024-03-27 23:46:22'),
(9, 5, '#373B44', 'L', 42, 'storage/uploads/product/miracle-air-blazer-airsense-blazer-888a77fe4a9b586194c098c0f283e7a5.avif', 'storage/uploads/product/miracle-air-blazer-airsense-blazer-bec6f209ebf2b70ecd4e94a4fc2be24d.avif', '2024-03-27 23:54:41', '2024-03-27 23:54:41'),
(10, 5, '#DECBA4', 'M', 14, 'storage/uploads/product/miracle-air-blazer-airsense-blazer-888a77fe4a9b586194c098c0f283e7a5.avif', 'storage/uploads/product/miracle-air-blazer-airsense-blazer-bec6f209ebf2b70ecd4e94a4fc2be24d.avif', '2024-03-27 23:55:24', '2024-03-27 23:55:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
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
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 9, 2, 4, 'Hi', '2024-04-21 17:24:44', '2024-04-21 17:24:44'),
(2, 9, 2, 4, 'Duy Khải', '2024-04-21 17:26:10', '2024-04-21 17:26:10'),
(3, 9, 4, 5, 'Duy Khải', '2024-04-21 17:29:46', '2024-04-21 17:29:46'),
(4, 9, 4, 3, 'SP tot', '2024-04-21 17:44:50', '2024-04-21 17:44:50'),
(5, 9, 4, 4, 'Sp tot khong nen mua', '2024-04-21 17:45:53', '2024-04-21 17:45:53'),
(6, 9, 4, 1, 'Sp te', '2024-04-21 17:47:07', '2024-04-21 17:47:07'),
(7, 9, 4, 1, 'te', '2024-04-21 17:48:44', '2024-04-21 17:48:44'),
(8, 9, 4, 1, '2', '2024-04-21 17:48:58', '2024-04-21 17:48:58'),
(9, 9, 5, 2, 'dssss', '2024-04-21 17:49:38', '2024-04-21 17:49:38'),
(10, 9, 5, 4, 'Sssss', '2024-04-21 17:55:09', '2024-04-21 17:55:09'),
(11, 9, 5, 4, 'Sssss', '2024-04-21 17:56:06', '2024-04-21 17:56:06'),
(12, 9, 5, 3, 'Hello', '2024-04-21 17:58:57', '2024-04-21 17:58:57'),
(13, 9, 5, 3, 'Hi', '2024-04-21 17:59:07', '2024-04-21 17:59:07'),
(14, 9, 5, 4, 'Hello', '2024-04-21 18:01:52', '2024-04-21 18:01:52'),
(15, 9, 5, 5, 'Duy Khải', '2024-04-21 18:03:21', '2024-04-21 18:03:21'),
(16, 9, 5, 5, 'Great!!!', '2024-04-21 18:07:31', '2024-04-21 18:07:31'),
(17, 9, 2, 4, 'sss', '2024-04-21 18:19:17', '2024-04-21 18:19:17'),
(18, 9, 5, 5, 'create', '2024-04-21 18:21:19', '2024-04-21 18:21:19'),
(19, 9, 3, 3, 'Bthg', '2024-04-21 18:31:11', '2024-04-21 18:31:11'),
(20, 9, 3, 4, 'sss', '2024-04-21 18:32:53', '2024-04-21 18:32:53'),
(21, 9, 1, 5, 'Sản phẩm tốt, nên mua', '2024-04-21 19:10:13', '2024-04-21 19:10:13'),
(22, 9, 5, 4, 'sauydusaydas', '2024-04-21 19:13:27', '2024-04-21 19:13:27'),
(23, 9, 5, 4, 'Đã đánh giá', '2024-04-21 19:14:43', '2024-04-21 19:14:43'),
(24, 9, 5, 1, 'sđs', '2024-04-21 19:17:13', '2024-04-21 19:17:13'),
(25, 9, 5, 3, 'sss', '2024-04-21 19:17:24', '2024-04-21 19:17:24'),
(26, 9, 5, 2, 'DuyKhai', '2024-04-21 19:18:01', '2024-04-21 19:18:01'),
(27, 9, 5, 2, 'DuyKhai', '2024-04-21 19:18:02', '2024-04-21 19:18:02'),
(28, 9, 5, 3, 'Khai12', '2024-04-21 19:18:14', '2024-04-21 19:18:14'),
(29, 9, 5, 2, 'sss', '2024-04-21 19:19:55', '2024-04-21 19:19:55'),
(30, 9, 5, 5, 'ssss', '2024-04-21 19:20:01', '2024-04-21 19:20:01'),
(31, 9, 5, 5, 'Đánh giá', '2024-04-21 19:27:14', '2024-04-21 19:27:14'),
(32, 9, 5, 5, 'ssss', '2024-04-21 19:27:31', '2024-04-21 19:27:31'),
(33, 9, 5, 4, 'HI', '2024-04-21 19:30:31', '2024-04-21 19:30:31'),
(34, 9, 5, 4, 'HI', '2024-04-21 19:30:31', '2024-04-21 19:30:31'),
(35, 9, 3, 4, 'SOS', '2024-04-21 19:34:06', '2024-04-21 19:34:06'),
(36, 9, 2, 1, 's', '2024-04-21 19:37:43', '2024-04-21 19:37:43'),
(37, 9, 2, 3, 'sss', '2024-04-21 19:44:05', '2024-04-21 19:44:05'),
(38, 9, 5, 5, 'ssss', '2024-04-21 19:49:07', '2024-04-21 19:49:07'),
(39, 9, 5, 5, 'uiasudisaud', '2024-04-21 19:49:14', '2024-04-21 19:49:14'),
(40, 9, 5, 5, 'sss', '2024-04-21 19:53:08', '2024-04-21 19:53:08'),
(41, 9, 5, 5, 'ădews', '2024-04-21 19:55:10', '2024-04-21 19:55:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `gender`, `phonenumber`, `address`, `avatar`, `level`, `remember_token`, `active`, `country`, `postcode`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@localhost.com', '$2y$10$JI37429WqDfGvEMhC96vr.s2eKFNoUXgrDm5wX.cGe8TD6X/dRyoG', 0, NULL, '〒338-0001 Saitama, Chuo Ward, Kamiochiaii, 3 Chome−2−6 立川', NULL, 0, NULL, 0, NULL, NULL, '2024-01-22 06:10:55', '2024-02-14 16:54:28'),
(4, 'User', 'admin@gmail.com', '$2y$10$kB6Y9J76pPzRAfyMyUcyreZJsGkOounjzpqQOpIlLLIPEa6rVlFHe', NULL, '6576787685675', '〒338-0001 Saitama, Chuo Ward, Kamiochiaii, 3 Chome−2−6 立川', NULL, 2, NULL, 0, NULL, NULL, '2024-01-22 06:10:55', '2024-03-03 16:53:49'),
(5, 'Đạt', 'truongdat2325@gmail.com', '$2y$10$9w7cbqqfZwO7wGLNQLcA2eGNCskbW8wcYr0guwOt/TsU5F3LLA/HO', NULL, '0799709006', '〒338-0001 Saitama, Chuo Ward, Kamiochiaii, 3 Chome−2−6 立川', NULL, 2, 'TSc8EBjzqsaZNUy3adWImybi1vJH80PACrcnIVP8sxYa2unZ6Pd8uDJfOj6A', 0, NULL, NULL, '2024-01-22 06:10:55', '2024-02-14 16:10:15'),
(6, 'Enyan(Admin)', 'ena@gmail.com', '$2y$10$XusAPkdQQ3reI2AYnnAHCOz7/2EWq2VMIWEvk2yTbFNZ14JCIjTdW', 1, '0799709006', '〒338-0001 Saitama, Chuo Ward, Kamiochiaii, 3 Chome−2−6 立川', 'storage/uploads/user/2024/03/13/avatar-shinonome-ena-Fb30iZYaIAItbBf.jpg', 0, NULL, 0, NULL, NULL, '2024-01-22 06:10:55', '2024-03-14 17:36:27'),
(7, 'Enanan(User)', '22211tt0373@mail.tdc.edu.vn', '$2y$10$xIAsj3JxANzUAopgeWp.KujlgqAgLm6cdAiOHezEA5FyyeBoOmWV6', 0, '0799709025', '〒338-0001 Saitama, Chuo Ward, Kamiochiaii, 3 Chome−2−6 立川', 'storage/uploads/user/2024/03/14/avatar-enananuser-Fb30iZYaIAItbBf.jpg', 2, NULL, 0, 'Saitama', '7000001', '2024-01-22 06:10:55', '2024-03-14 16:44:31'),
(8, 'Khải', 'khai@gmail.com', '$2y$10$.A7BD5AvwiIVwCD4xuVKge2G8Aiv1wyx5aCUrtd0BSrakfpzitjky', 0, '091111111111', 'Unknow', NULL, 0, NULL, 0, NULL, NULL, '2024-03-14 21:55:45', '2024-03-14 21:55:45'),
(9, 'Duy Khai', 'khai13@gmail.com', '$2y$10$1y/rUKmElrLx5oh1qvZVwezDPoJK4rS7UBUG0dCFRbmh0SjzRQsl.', NULL, '0982934832', NULL, NULL, 2, NULL, 0, NULL, NULL, '2024-04-15 13:00:03', '2024-04-15 13:00:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wish_lists`
--

INSERT INTO `wish_lists` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, 7, '2024-03-28 00:56:56', '2024-03-28 00:56:56'),
(3, 3, 7, '2024-03-28 00:56:58', '2024-03-28 00:56:58'),
(4, 5, 9, '2024-04-16 21:26:35', '2024-04-16 21:26:35');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
