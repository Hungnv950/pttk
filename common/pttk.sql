-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2016 lúc 04:07 SA
-- Phiên bản máy phục vụ: 5.7.11
-- Phiên bản PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pttk`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advanced service`
--

CREATE TABLE `advanced service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `advanced service`
--

INSERT INTO `advanced service` (`id`, `name`, `description`, `price`) VALUES
(1, 'Khăn lạnh', '', 5000),
(2, 'Lipton', '', 20000),
(3, 'Bò húc', '', 20000),
(4, 'Sting', '', 20000),
(5, 'Table', '1', 500000),
(6, 'Table', '2', 450000),
(7, 'Table', '3', 400000),
(8, 'Table', '4', 300000),
(9, 'Table', '5', 200000),
(10, 'Table', '6', 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table` int(11) NOT NULL,
  `employee_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `eat_time` int(11) NOT NULL,
  `book_time` int(11) NOT NULL,
  `book_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'wait',
  `money_payed` int(11) NOT NULL DEFAULT '0',
  `cost` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `table`, `employee_id`, `eat_time`, `book_time`, `book_status`, `money_payed`, `cost`) VALUES
(1, 1, 1, '1', 2, 1481130245, 'wait', 2, 1),
(3, 1, 1, '1', 0, 1481130704, 'wait', 0, 2),
(4, 1, 4, '1', 1, 1481131030, 'wait', 0, 212),
(5, 2, 2, '2', 1, 1481210539, 'wait', 0, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1480523248),
('m130524_201442_init', 1480523250),
('m161204_154005_create_table_booking', 1480900590),
('m161204_163745_create_table_table', 1480900590),
('m161205_004947_create_table_advanced_service', 1480900590),
('m161206_021712_create_table_booking', 1480990887),
('m161206_021758_create_table_table', 1480990887),
('m161206_022442_create_table_table', 1480991247),
('m161206_125322_create_table_shift', 1481028944),
('m161207_170259_create_table_booking', 1481130225),
('m161208_151931_init', 1481210409);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shift`
--

INSERT INTO `shift` (`id`, `name`, `time`, `description`) VALUES
(1, 'Sáng\r\n', '7h-11h', NULL),
(2, 'Trưa', '11h30-14h', NULL),
(3, 'Chiều', '15h-18h', NULL),
(4, 'Tối', '19h-22h30', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table`
--

CREATE TABLE `table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table`
--

INSERT INTO `table` (`id`, `name`, `status`, `description`, `image`, `price`) VALUES
(1, 'Bàn 1', 5, '6 người', 'images (1).jpg', 200000),
(2, 'Bàn 2', 5, '6 người', 'images (1).jpg', 200000),
(3, 'Bàn 3', 4, '6 người', 'images (1).jpg', 150000),
(4, 'Bàn 4', 4, '10 người', 'images (1).jpg', 150000),
(5, 'Bàn 5', 5, '2 người', 'images (4).jpg', 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `positon` int(2) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `phone_number`, `fb_id`, `money`, `positon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Hưng', 'oQonFTAfifVYC5R-pOmFymrINqtgC4Cb', '$2y$13$JSSklUkyDIYkbkxsEWj0te./Tg7wwQDEPNFrFv/90n.Q1UscKMmz.', NULL, '916349375168954@facebook.com', 'null', 'https://www.facebook.com/app_scoped_user_id/916349375168954/', NULL, 1, 10, 1481210429, 1481210429),
(2, 'HungNV', 'Wf1-35tnZVTJVZKzA7qj_E1fuM8cwT3N', '$2y$13$F3zg24lJaVT5R29wV0XK4OwQNKU9NodVQpSbUAJFmPqNVbM6pMrq2', NULL, 'hungnv950@gmail.com', '0101001', NULL, NULL, 1, 10, 1481210503, 1481210503);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `advanced service`
--
ALTER TABLE `advanced service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `fb_id` (`fb_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `advanced service`
--
ALTER TABLE `advanced service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `table`
--
ALTER TABLE `table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
