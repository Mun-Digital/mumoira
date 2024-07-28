-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 28, 2024 lúc 01:10 PM
-- Phiên bản máy phục vụ: 10.3.39-MariaDB-cll-lve
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blocalnamanhlove_local`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `accountNumber` varchar(255) DEFAULT NULL,
  `accountName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banks`
--

INSERT INTO `banks` (`id`, `image`, `short_name`, `accountNumber`, `accountName`) VALUES
(1, 'assets/storage/images/bank/TNZ.png', 'MBBank', '0368706379', 'ABC'),
(3, 'assets/storage/images/bank/LWD.png', 'MBBank', '11111111176', 'abcdk76');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank_list`
--

CREATE TABLE `bank_list` (
  `id` int(11) NOT NULL,
  `bank_id` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bank_list`
--

INSERT INTO `bank_list` (`id`, `bank_id`, `bank_name`, `type`) VALUES
(1, 'THESIEURE', 'Ví THESIEURE.COM', 'manual'),
(2, 'MOMO', 'Ví điện tử MOMO', 'manual'),
(3, 'Zalo Pay', 'Ví điện tử Zalo Pay', 'manual'),
(4, 'VietinBank', 'Ngân hàng TMCP Công thương Việt Nam VietinBank', 'manual'),
(5, 'Vietcombank', 'Ngân hàng TMCP Ngoại Thương Việt Nam Vietcombank', 'manual'),
(6, 'BIDV', 'Ngân hàng TMCP Đầu tư và Phát triển Việt Nam BIDV', 'manual'),
(7, 'Agribank', 'Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam Agribank', 'manual'),
(8, 'OCB', 'Ngân hàng TMCP Phương Đông OCB', 'manual'),
(9, 'MBBank', 'Ngân hàng TMCP Quân đội MBBank', 'auto'),
(10, 'Techcombank', 'Ngân hàng TMCP Kỹ thương Việt Nam Techcombank', 'manual'),
(11, 'ACB', 'Ngân hàng TMCP Á Châu ACB', 'manual'),
(12, 'VPBank', 'Ngân hàng TMCP Việt Nam Thịnh Vượng VPBank', 'manual'),
(13, 'TPBank', 'Ngân hàng TMCP Tiên Phong TPBank', 'manual'),
(14, 'Sacombank', 'Ngân hàng TMCP Sài Gòn Thương Tín Sacombank', 'manual'),
(15, 'HDBank', 'Ngân hàng TMCP Phát triển Thành phố Hồ Chí Minh HDBank', 'manual'),
(16, 'VietCapitalBank', 'Ngân hàng TMCP Bản Việt VietCapitalBank', 'manual'),
(17, 'SCB', 'Ngân hàng TMCP Sài Gòn SCB', 'manual'),
(18, 'VIB', 'Ngân hàng TMCP Quốc tế Việt Nam VIB', 'manual'),
(19, 'SHB', 'Ngân hàng TMCP Sài Gòn - Hà Nội SHB', 'manual'),
(20, 'Eximbank', 'Ngân hàng TMCP Xuất Nhập khẩu Việt Nam Eximbank', 'manual'),
(21, 'MSB', 'Ngân hàng TMCP Hàng Hải MSB', 'manual'),
(22, 'CAKE', 'TMCP Việt Nam Thịnh Vượng - Ngân hàng số CAKE by VPBank CAKE', 'manual'),
(23, 'Ubank', 'TMCP Việt Nam Thịnh Vượng - Ngân hàng số Ubank by VPBank Ubank', 'manual'),
(24, 'SaigonBank', 'Ngân hàng TMCP Sài Gòn Công Thương SaigonBank', 'manual'),
(25, 'BacABank', 'Ngân hàng TMCP Bắc Á BacABank', 'manual'),
(26, 'PVcomBank', 'Ngân hàng TMCP Đại Chúng Việt Nam PVcomBank', 'manual'),
(27, 'Oceanbank', 'Ngân hàng Thương mại TNHH MTV Đại Dương Oceanbank', 'manual'),
(28, 'NCB', 'Ngân hàng TMCP Quốc Dân NCB', 'manual'),
(29, 'ShinhanBank', 'Ngân hàng TNHH MTV Shinhan Việt Nam ShinhanBank', 'manual'),
(30, 'ABBANK', 'Ngân hàng TMCP An Bình ABBANK', 'manual'),
(31, 'VietABank', 'Ngân hàng TMCP Việt Á VietABank', 'manual'),
(32, 'NamABank', 'Ngân hàng TMCP Nam Á NamABank', 'manual'),
(33, 'PGBank', 'Ngân hàng TMCP Xăng dầu Petrolimex PGBank', 'manual'),
(34, 'VietBank', 'Ngân hàng TMCP Việt Nam Thương Tín VietBank', 'manual'),
(35, 'BaoVietBank', 'Ngân hàng TMCP Bảo Việt BaoVietBank', 'manual'),
(36, 'SeABank', 'Ngân hàng TMCP Đông Nam Á SeABank', 'manual'),
(37, 'COOPBANK', 'Ngân hàng Hợp tác xã Việt Nam COOPBANK', 'manual'),
(38, 'LienVietPostBank', 'Ngân hàng TMCP Bưu Điện Liên Việt LienVietPostBank', 'manual'),
(39, 'KienLongBank', 'Ngân hàng TMCP Kiên Long KienLongBank', 'manual'),
(40, 'KBank', 'Ngân hàng Đại chúng TNHH Kasikornbank KBank', 'manual'),
(41, 'GPBank', 'Ngân hàng Thương mại TNHH MTV Dầu Khí Toàn Cầu GPBank', 'manual'),
(42, 'CBBank', 'Ngân hàng Thương mại TNHH MTV Xây dựng Việt Nam CBBank', 'manual'),
(43, 'CIMB', 'Ngân hàng TNHH MTV CIMB Việt Nam CIMB', 'manual'),
(44, 'DBSBank', 'DBS Bank Ltd - Chi nhánh Thành phố Hồ Chí Minh DBSBank', 'manual'),
(45, 'DongABank', 'Ngân hàng TMCP Đông Á DongABank', 'manual'),
(46, 'KookminHCM', 'Ngân hàng Kookmin - Chi nhánh Thành phố Hồ Chí Minh KookminHCM', 'manual'),
(47, 'KookminHN', 'Ngân hàng Kookmin - Chi nhánh Hà Nội KookminHN', 'manual'),
(48, 'Woori', 'Ngân hàng TNHH MTV Woori Việt Nam Woori', 'manual'),
(49, 'VRB', 'Ngân hàng Liên doanh Việt - Nga VRB', 'manual'),
(50, 'StandardChartered', 'Ngân hàng TNHH MTV Standard Chartered Bank Việt Nam StandardChartered', 'manual'),
(51, 'HongLeong', 'Ngân hàng TNHH MTV Hong Leong Việt Nam HongLeong', 'manual'),
(52, 'HSBC', 'Ngân hàng TNHH MTV HSBC (Việt Nam) HSBC', 'manual'),
(53, 'IBKHN', 'Ngân hàng Công nghiệp Hàn Quốc - Chi nhánh Hà Nội IBKHN', 'manual'),
(54, 'IBKHCM', 'Ngân hàng Công nghiệp Hàn Quốc - Chi nhánh TP. Hồ Chí Minh IBKHCM', 'manual'),
(55, 'IndovinaBank', 'Ngân hàng TNHH Indovina IndovinaBank', 'manual'),
(56, 'Nonghyup', 'Ngân hàng Nonghyup - Chi nhánh Hà Nội Nonghyup', 'manual'),
(57, 'UnitedOverseas', 'Ngân hàng United Overseas - Chi nhánh TP. Hồ Chí Minh UnitedOverseas', 'manual'),
(58, 'PublicBank', 'Ngân hàng TNHH MTV Public Việt Nam PublicBank', 'manual'),
(59, 'Kasikorn Bank', 'Kasikorn Bank', 'manual'),
(60, 'Siam Commercial Bank', 'Siam Commercial Bank', 'manual'),
(61, 'Bank of Ayudthya', 'Bank of Ayudthya', 'manual'),
(62, 'Krungthai Bank', 'Krungthai Bank', 'manual'),
(63, 'Bangkok Bank', 'Bangkok Bank', 'manual'),
(64, 'ICICI Bank', 'ICICI Bank', 'manual'),
(65, 'HDFC Bank', 'HDFC Bank', 'manual'),
(66, 'State Bank of India', 'State Bank of India', 'manual'),
(67, 'ABA Bank', 'ABA Bank Cambodia', 'manual'),
(68, 'Wing Bank', 'Wing Bank', 'manual'),
(69, 'Maybank', 'Maybank', 'manual'),
(70, 'CIMB Clicks Malaysia', 'CIMB Clicks Malaysia', 'manual'),
(71, 'United Bank for Africa (UBA)', 'United Bank for Africa (UBA)', 'manual');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `home` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `exp` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `user_id`, `name`, `home`, `position`, `data`, `price`, `status`, `exp`, `time`) VALUES
(4, 8, 'MU online 1', 'https://namanh.love', 't', 'http://clouds.namanh.love/clouds/stt670-copy.jpg', 30000, 'active', 1722446145, 1719854145);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner_list`
--

CREATE TABLE `banner_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `lim` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner_list`
--

INSERT INTO `banner_list` (`id`, `name`, `position`, `lim`, `price`, `note`, `time`, `height`, `width`) VALUES
(1, 'giữa lớn', 'mh', 30, 30000, 'giữa lớn', 30, 280, 780),
(2, 'giữa lớn', 'mh', 1, 30000, 'giữa lớn', 1, 280, 780),
(3, 'giữa lớn', 'mh', 2, 21429, 'giữa lớn', 2, 280, 780),
(4, 'giữa lớn', 'mh', 3, 15000, 'giữa lớn', 3, 280, 780),
(5, 'giữa lớn', 'mh', 6, 2143, 'giữa lớn', 6, 280, 780),
(6, 'trái', 'l', 30, 28500, 'trái', 30, 210, 400),
(7, 'trái', 'l', 1, 20000, 'trái', 1, 210, 400),
(8, 'trái', 'l', 2, 14286, 'trái', 2, 210, 400),
(9, 'trái', 'l', 3, 10000, 'trái', 3, 210, 400),
(10, 'trái', 'l', 6, 1429, 'trái', 6, 210, 400),
(11, 'phải', 'r', 30, 31300, 'phải', 30, 210, 400),
(12, 'phải', 'r', 1, 22000, 'phải', 1, 210, 400),
(13, 'phải', 'r', 2, 15714, 'phải', 2, 210, 400),
(14, 'phải', 'r', 3, 11000, 'phải', 3, 210, 400),
(15, 'phải', 'r', 6, 1571, 'phải', 6, 210, 400),
(16, 'giữa nhỏ', 'mt', 30, 40600, 'giữa nhỏ', 30, 110, 780),
(17, 'giữa nhỏ', 'mt', 1, 29000, 'giữa nhỏ', 1, 110, 780),
(18, 'giữa nhỏ', 'mt', 2, 20714, 'giữa nhỏ', 2, 110, 780),
(19, 'giữa nhỏ', 'mt', 3, 14500, 'giữa nhỏ', 3, 110, 780),
(20, 'giữa nhỏ', 'mt', 6, 2071, 'giữa nhỏ', 6, 110, 780);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner_price`
--

CREATE TABLE `banner_price` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `banner_price`
--

INSERT INTO `banner_price` (`id`, `position_id`, `duration`, `price`) VALUES
(1, 1, 1, 1500.00),
(2, 1, 2, 4350.00),
(3, 1, 3, 6000.00),
(4, 1, 6, 11000.00),
(5, 2, 1, 1500.00),
(6, 2, 2, 4350.00),
(7, 2, 3, 6000.00),
(8, 2, 6, 11000.00),
(9, 3, 1, 2200.00),
(10, 3, 2, 6500.00),
(11, 3, 3, 9000.00),
(12, 3, 6, 16500.00),
(13, 4, 1, 2200.00),
(14, 4, 2, 6500.00),
(15, 4, 3, 9000.00),
(16, 4, 6, 16500.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner_property`
--

CREATE TABLE `banner_property` (
  `id` int(11) NOT NULL,
  `position_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `banner_property`
--

INSERT INTO `banner_property` (`id`, `position_name`, `position`, `width`, `height`) VALUES
(1, 'Trái', 'l', 210, 400),
(2, 'Phải', 'r', 210, 400),
(3, 'Giữa lớn', 'mh', 780, 280),
(4, 'Giữa nhỏ', 'mt', 780, 110);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `catalogy` varchar(255) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `home` varchar(255) DEFAULT NULL,
  `fanpage_support` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `reset` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `server_name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `alpha_test` int(11) DEFAULT NULL,
  `open_beta` int(11) DEFAULT NULL,
  `exp` int(11) DEFAULT NULL,
  `drops` varchar(255) DEFAULT NULL,
  `anti_hack` varchar(255) DEFAULT NULL,
  `motachitiet` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `catalogy`, `title`, `image`, `home`, `fanpage_support`, `version`, `reset`, `type`, `point`, `server_name`, `description`, `alpha_test`, `open_beta`, `exp`, `drops`, `anti_hack`, `motachitiet`, `status`, `time`) VALUES
(2, 1, NULL, 'Mu session 6', 'https://i.imgur.com/H1gLguP.jpeg', 'https://namanh.love', 'https://namanh.love', '1.2.0', 'non', 'mu_ogrinal', 'orginal', 'namanh.love', 'MU NamAnh top 1', 1776585685, 2147483647, 188774574, '99', 'goldsheild', 'abcxysdgs', 'active', 177665468);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongtien`
--

CREATE TABLE `dongtien` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sotientruoc` int(11) DEFAULT NULL,
  `sotienthaydoi` int(11) DEFAULT NULL,
  `sotiensau` int(11) DEFAULT NULL,
  `noidung` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dongtien`
--

INSERT INTO `dongtien` (`id`, `user_id`, `sotientruoc`, `sotienthaydoi`, `sotiensau`, `noidung`, `time`) VALUES
(1, 1, 100000, 100000, 0, 'Trừ tiền test', 16676578),
(2, 1, 1000, 2000, 3000, 'test cong tien', 1717340622),
(3, 1, 3000, 2500, 500, 'test tru tien', 1717340640),
(4, 1, 500, 10000, -9500, 'test am tien', 1717340652),
(5, 1, -9500, 10000, 500, 'am sory', 1717341028),
(6, 1, 500, 2000, 2500, 'Nạp tiền tự động qua MBBank (#FT24162708190903 - CUSTOMER namanh.1. TU: DANG NHU NAM - 2000)', 1717859522),
(7, 6, 0, 25879, 25879, 'cong tien user', 1719221140),
(8, 6, 25879, 1234, 24645, '', 1719221769),
(9, 6, 24645, 2723, 21922, 'tru tien 02', 1719221786),
(10, 3, 400000, 30000, 370000, 'Thuê đặt banner', 1719824219),
(11, 8, 0, 9000000, 9000000, '', 1719853977),
(12, 8, 9000000, 30000, 8970000, 'Thuê đặt banner', 1719854145);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `tid` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `tid`, `user_id`, `amount`, `description`, `time`) VALUES
(0, 'FT24162708190903', 1, 2000, 'CUSTOMER namanh.1. TU: DANG NHU NAM', 1717859522);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `createdate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `ip`, `device`, `createdate`) VALUES
(1, 1, 'Đăng nhập thành công vào hệ thống', '103.161.180.180', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719222389'),
(2, 1, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.161.180.180', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719222396'),
(3, 8, 'Đăng nhập thành công vào hệ thống', '103.161.180.180', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719222475'),
(4, 1, 'Đăng nhập thành công vào hệ thống', '103.161.180.180', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719222498'),
(5, 1, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.161.180.180', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719222504'),
(6, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:437e:f290:ad69:a840:17c9:b6e9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719281992'),
(7, 1, '[Warning] Đăng nhập thành công vào hệ thống Admin', '2001:ee0:437e:f290:ad69:a840:17c9:b6e9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719282143'),
(8, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.252.93.132', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719282508'),
(9, 1, 'Thêm ngân hàng (MOMO -  1321312312) vào hệ thống.', '2001:ee0:437e:f290:ad69:a840:17c9:b6e9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719283167'),
(10, 1, '[Warning] Đăng nhập thành công vào hệ thống Admin', '2001:ee0:437e:f290:ad69:a840:17c9:b6e9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719283853'),
(11, 1, '[Admin] Cập nhật thông tin thành viên admin[1].', '2001:ee0:437e:f290:ad69:a840:17c9:b6e9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719284313'),
(12, 1, 'Bạn được Admin thay đổi thông tin.', NULL, NULL, '1719284313'),
(13, 1, '[Admin] Cập nhật thông tin thành viên user[2].', '2001:ee0:437e:f290:ad69:a840:17c9:b6e9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719284613'),
(14, 2, 'Bạn được Admin thay đổi thông tin.', NULL, NULL, '1719284613'),
(15, 1, '[Admin] Cập nhật thông tin thành viên user[2].', '2001:ee0:437e:f290:ad69:a840:17c9:b6e9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719284633'),
(16, 2, 'Bạn được Admin thay đổi thông tin.', NULL, NULL, '1719284633'),
(17, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:51f3:72e7:6027:b9d5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719304165'),
(18, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:51f3:72e7:6027:b9d5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719316754'),
(19, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:51f3:72e7:6027:b9d5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719317644'),
(20, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:51f3:72e7:6027:b9d5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719317974'),
(21, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:51f3:72e7:6027:b9d5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719318368'),
(22, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:2173:ccd6:8110:47a6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719365931'),
(23, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:2088:cb3f:b893:dc52', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '1719366068'),
(24, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:2173:ccd6:8110:47a6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719367016'),
(25, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:2173:ccd6:8110:47a6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719367094'),
(26, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:2173:ccd6:8110:47a6', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', '1719367919'),
(27, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:2088:cb3f:b893:dc52', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '1719368034'),
(28, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:2173:ccd6:8110:47a6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719374228'),
(29, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:788d:a559:c958:284d', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '1719375339'),
(30, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:68c9:934f:e57b:8272', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719384938'),
(31, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:68c9:934f:e57b:8272', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719385610'),
(32, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:4379:77b0:68c9:934f:e57b:8272', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719385729'),
(33, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.161.181.190', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719676186'),
(34, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.161.181.190', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719677093'),
(35, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.228.37.204', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719683583'),
(36, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.228.37.204', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719823862'),
(37, 3, 'Thuê đặt banner.', '14.191.142.75', 'PostmanRuntime/7.39.0', '1719824219'),
(38, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:437a:a8f0:14cf:3061:bc32:3401', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719824319'),
(39, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.161.181.190', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719853959'),
(40, 8, '[Admin] Cộng 9000000 cho User local[8].', '103.161.181.190', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719853977'),
(41, 8, 'Thuê đặt banner.', '54.86.50.139', 'PostmanRuntime/7.39.0', '1719854145'),
(42, 3, 'Bạn được admin duyệt banner.', '103.228.37.204', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719857323'),
(43, 3, 'Bạn được admin duyệt banner.', '103.228.37.204', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719857328'),
(44, 3, 'Bạn được admin duyệt banner.', '103.228.37.204', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719857331'),
(45, 8, 'Bạn được admin duyệt banner.', '103.228.37.204', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719857336'),
(46, 3, 'Bạn bị admin xóa banner ra khỏi hệ thống', '103.228.37.204', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719857577'),
(47, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.228.37.204', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719935278'),
(48, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:437a:5950:99b2:43:5320:4467', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719967742'),
(49, 1, 'Đăng nhập thành công vào hệ thống', '2001:ee0:437a:5950:99b2:43:5320:4467', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1719974062'),
(50, 8, 'Đăng nhập thành công vào hệ thống', '103.252.93.72', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720098636'),
(51, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.252.93.72', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720456572'),
(52, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720524041'),
(53, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.252.93.72', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720540608'),
(54, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '36.50.177.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720787318'),
(55, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '36.50.177.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720787754'),
(56, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '36.50.177.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720793484'),
(57, 1, 'Đăng nhập thành công vào hệ thống', '113.185.40.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720881007'),
(58, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '36.50.177.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720894959'),
(59, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '36.50.177.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720904921'),
(60, 1, 'Bạn được admin duyệt baì viết.', '36.50.177.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720904964'),
(61, 1, 'Bạn được admin duyệt baì viết.', '36.50.177.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1720905068'),
(62, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721489336'),
(63, 1, 'Bạn bị admin xóa bài viết ra khỏi hệ thống', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721489388'),
(64, 8, 'Thêm phiên bản (Session 2) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721492643'),
(65, 8, 'Thêm phiên bản (Session 3) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721492650'),
(66, 8, 'Thêm phiên bản (Session 6) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721492655'),
(67, 8, 'Thêm phiên bản (Session 7) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721492661'),
(68, 8, 'Thêm phiên bản (Session 16) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721492666'),
(69, 8, 'Xóa ngân hàng 123456789 - TPBank ra khỏi hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721493402'),
(70, 8, 'Xóa ngân hàng 3333 - Vietcombank ra khỏi hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721493534'),
(71, 8, 'Xóa ngân hàng 1321312312 - MOMO ra khỏi hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721493547'),
(72, 8, 'Xóa phiên bản Session 16 ra khỏi hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721496005'),
(73, 8, 'Thêm phiên bản (Session 16) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721496015'),
(74, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721499649'),
(75, 8, 'Thêm kiểu reset (Non Reset) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721499703'),
(76, 8, 'Thêm kiểu reset (Reset Web) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721499721'),
(77, 8, 'Thêm kiểu reset (Reset In Game) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721499732'),
(78, 8, 'Xóa kiểu reset Reset In Game ra khỏi hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721499783'),
(79, 8, 'Thêm kiểu reset (Reset In Game) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721499794'),
(80, 8, 'Thêm thể loại (Mu Nguyên bản Webzen) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721500013'),
(81, 8, 'Thêm thể loại (Mu Custom thêm đồ mới) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721500030'),
(82, 8, 'Xóa thể loại Mu Custom thêm đồ mới ra khỏi hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721500142'),
(83, 8, 'Thêm thể loại (Mu Custom thêm đồ mới) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721500146'),
(84, 8, 'Thêm kiểu point (Nguyên bản) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721500629'),
(85, 8, 'Thêm kiểu point (Keep point) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721500644'),
(86, 8, 'Xóa kiểu point Keep point ra khỏi hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721500652'),
(87, 8, 'Thêm kiểu point (Keep point) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721500656'),
(88, 8, 'Thêm kiểu point (Keep point) vào hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721500795'),
(89, 8, 'Xóa kiểu point Keep point ra khỏi hệ thống.', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721500801'),
(90, 1, 'Đăng nhập thành công vào hệ thống', '171.224.180.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721538568'),
(91, 1, 'Đăng nhập thành công vào hệ thống', '171.224.180.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721538636'),
(92, 1, '[Warning] Đăng nhập thành công vào hệ thống Admin', '171.224.180.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721538978'),
(93, 1, 'Cập nhật thông tin ngân hàng (MBBank - 036870637998) vào hệ thống.', '171.224.180.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721539465'),
(94, 1, 'Cập nhật thông tin ngân hàng (MBBank - 11111111176) vào hệ thống.', '171.224.180.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721539484'),
(95, 1, 'Cập nhật thông tin ngân hàng (MBBank - 0368706379) vào hệ thống.', '171.224.180.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721539520'),
(96, 1, '[Warning] Đăng nhập thành công vào hệ thống Admin', '2405:4803:e29c:59b0:6475:e543:89df:8abe', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721660510'),
(97, 1, '[Warning] Đăng nhập thành công vào hệ thống Admin', '2405:4803:e29c:59b0:6475:e543:89df:8abe', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721661546'),
(98, 1, 'Đăng nhập thành công vào hệ thống', '2405:4803:e29c:59b0:6475:e543:89df:8abe', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721662107'),
(99, 1, 'Đăng nhập thành công vào hệ thống', '2405:4803:e29c:59b0:6475:e543:89df:8abe', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721662210'),
(100, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.161.118.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721752944'),
(101, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '103.252.93.72', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '1721814479'),
(102, 1, '[Warning] Đăng nhập thành công vào hệ thống Admin', '2405:4803:e29c:59b0:6417:956:11d5:f436', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '1721981605'),
(103, 1, '[Warning] Đăng nhập thành công vào hệ thống Admin', '2405:4803:e29c:59b0:6417:956:11d5:f436', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '1721999291'),
(104, 8, '[Warning] Đăng nhập thành công vào hệ thống Admin', '36.50.177.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '1722142564');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs_autobank`
--

CREATE TABLE `logs_autobank` (
  `id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `logs_autobank`
--

INSERT INTO `logs_autobank` (`id`, `status`, `message`, `time`) VALUES
(1, '00', 'Đăng Nhập Thành công', 1717858728);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `otp_confirm`
--

CREATE TABLE `otp_confirm` (
  `id` int(11) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `otp` varchar(7) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `otp_confirm`
--

INSERT INTO `otp_confirm` (`id`, `phone`, `otp`, `time`) VALUES
(1, '0123456789', '065472', 1718127993),
(2, '0366666667', '453280', 1718282740),
(3, '0123456789', '157960', 1718283107),
(4, '0368706379', '630527', 1718283545),
(5, '0368706379', '546839', 1718284451),
(6, '0368706379', '691273', 1718285355),
(7, '0368706379', '601428', 1718285527),
(8, '0368706379', '167534', 1718288679),
(9, '0368706379', '347690', 1718289088),
(10, '0368706379', '364075', 1718291861),
(11, '0368706379', '039518', 1718292157),
(12, '0368706379', '604591', 1718292270),
(13, '0368706379', '548317', 1718293245),
(14, '0368706379', '732460', 1718293330),
(15, '0368706379', '078653', 1718293696),
(16, '0368706379', '025497', 1718293845),
(17, '0368706379', '508264', 1718293964),
(18, '0368706379', '403259', 1718298270),
(19, '0368706379', '698745', 1718561462),
(20, '0368706379', '123956', 1718561567);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'title', 'Mumoira'),
(2, 'status_bank', '1'),
(3, 'token_bank', 'fd3be9b1-1156-4b4c-b264-f8ba7e62b059'),
(4, 'stk_bank', '123456787'),
(5, 'mk_bank', '1234567'),
(6, 'prefix_autobank', 'namanh.'),
(7, 'status_momo', '0'),
(8, 'token_momo', 'ahdsfryhe-hrx-ghd'),
(9, 'type_bank', 'BIDV'),
(10, 'status', '1'),
(11, 'status_update', '0'),
(12, 'status_captcha', '0'),
(13, 'hotline', '0366789345'),
(14, 'email', 'abc@gmail.com'),
(15, 'session_login', '295000'),
(16, 'min_recharge', '5000'),
(17, 'invoice_expiration', '86400'),
(18, 'mouse_click_effect', '0'),
(19, 'font_family', 'abc'),
(20, 'display_api', '1'),
(21, 'display_contact', '1'),
(22, 'timezone', 'Asia/Ho_Chi_Minh'),
(23, 'max_register_ip', '2'),
(24, 'pin_cron', '0'),
(25, 'javascript_header', 'haah'),
(26, 'javascript', 'hehe'),
(27, 'type_notification', 'telegram'),
(28, 'token_telegram', 'ajfg'),
(29, 'chat_id_telegram', '-7887788'),
(30, 'thongbao', '<p>abc</p>\r\n'),
(31, 'recharge_notice', '<p>jky</p>\r\n'),
(32, 'chinh_sach_bao_mat', '<p>ohi</p>\r\n'),
(33, 'dieu_khoan_su_dung', '<p>skd</p>\r\n'),
(34, 'contact_page', ''),
(35, 'notice_popup', '<p>sumu</p>\r\n'),
(36, 'status_napthe', '0'),
(37, 'partner_id_card', '68786798'),
(38, 'partner_key_card', '897878'),
(39, 'ck_napthe', '12'),
(40, 'notice_napthe', '<p>check</p>\r\n'),
(41, 'sdt_momo', '57668787468'),
(43, 'description', 'ADS'),
(44, 'keywords', 'ads');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `technique_info`
--

CREATE TABLE `technique_info` (
  `id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `technique_info`
--

INSERT INTO `technique_info` (`id`, `value`, `type`, `time`) VALUES
(1, 'Session 2', 'version', 1721492643),
(2, 'Session 3', 'version', 1721492650),
(3, 'Session 6', 'version', 1721492655),
(4, 'Session 7', 'version', 1721492661),
(6, 'Session 16', 'version', 1721496015),
(7, 'Non Reset', 'reset', 1721499703),
(8, 'Reset Web', 'reset', 1721499721),
(10, 'Reset In Game', 'reset', 1721499794),
(11, 'Mu Nguyên bản Webzen', 'category', 1721500013),
(13, 'Mu Custom thêm đồ mới', 'category', 1721500146),
(14, 'Nguyên bản', 'point', 1721500629),
(16, 'Keep point', 'point', 1721500656);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `admin` int(1) NOT NULL DEFAULT 0,
  `money` int(11) NOT NULL DEFAULT 0,
  `total_money` int(11) NOT NULL DEFAULT 0,
  `vip` int(11) NOT NULL DEFAULT 0,
  `chietkhau` int(11) NOT NULL DEFAULT 0,
  `device` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `banned` int(11) NOT NULL DEFAULT 0,
  `create_date` int(11) DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `time_session` int(11) DEFAULT NULL,
  `time` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `token`, `phone`, `admin`, `money`, `total_money`, `vip`, `chietkhau`, `device`, `ip`, `banned`, `create_date`, `update_date`, `time_session`, `time`) VALUES
(1, 'admin', '$2y$10$ILfYvd5QReyq.Xc6M/mVKeItlL4prIg77fY2aQeRHfLG.5snF0x6S', '6824a8bdd78e9e11aac42790589138b0', '0366666666', 1, 2500, 15000, 0, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2405:4803:e29c:59b0:6417:956:11d5:f436', 0, 1717085555, 1721999291, 1721999463, NULL),
(2, 'user', '$2y$10$UVXjhHxfLci3SoHI.CRU8O8enZgte3w8LfI7ocT162mkqz9k4tRw2', '42b399822036ca5e00df536f8b6b48dc', '0322345345', 0, 0, 0, 0, 0, 'PostmanRuntime/7.37.3', '103.77.172.124', 0, 1717086125, 1717086125, 1717086125, NULL),
(3, 'huutoai', '$2y$10$/aWuf3lzTy462fVlVBU9BuoXKod5x8tcTsFhB/lJGTOLQOS3qvlWG', '2c4ff65abc87e4a487fa42ad350dce44', '0918290321', 0, 370000, 400000, 0, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4.1 Mobile/15E148 Safari/604.1', '171.224.179.193', 0, 1717088467, 1717088467, 1717088467, NULL),
(4, 'admin1111', '$2y$10$BCeMMigjHTcNid/sVoZWbufsMDAN.CspL0jFUnYRUtzMsLv/w2ZuO', '8b59e4cbef9fed8ee5d7c368df12c0af', '0853032558', 0, 0, 0, 0, 0, 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Mobile Safari/537.36', '171.224.179.193', 0, 1717142138, 1717142138, 1717142138, NULL),
(5, 'admin11111111', '$2y$10$WGB2CM6q60ky6Cc3joj41e/tsEEBYuOzT7HZorMTYAeiEBMMs8PMi', '24a89f015d67aef6b2fe9435cf4e02fb', '08530325581', 0, 0, 0, 0, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '171.224.179.193', 0, 1717143485, 1717143485, 1717143485, NULL),
(6, '12313', '$2y$10$eOrj6LRAl//CrLjAqPDVMeD37.BFiL95lP/tGJAzm53TRBRozz6Qm', '84d8a5204e4737bd0a927d949facc9e2', '0965532559', 0, 21922, 25879, 0, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '2001:ee0:437e:c0d0:6c8f:11f2:33d4:61d3', 0, 1718107228, 1718107228, 1718107228, NULL),
(8, 'local', '$2y$10$3LYhPzFmOVX8NrEflKUMHuSHd1ATqqs8NOzrbknLifI/fXD..UCeu', '7a46e80ea2407fe09d58f6d5d487c5cd', '0368706379', 1, 8970000, 9000000, 0, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '36.50.177.77', 0, NULL, 1722142564, 1722142564, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bank_list`
--
ALTER TABLE `bank_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner_list`
--
ALTER TABLE `banner_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner_price`
--
ALTER TABLE `banner_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`);

--
-- Chỉ mục cho bảng `banner_property`
--
ALTER TABLE `banner_property`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logs_autobank`
--
ALTER TABLE `logs_autobank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `otp_confirm`
--
ALTER TABLE `otp_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `technique_info`
--
ALTER TABLE `technique_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `bank_list`
--
ALTER TABLE `bank_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `banner_list`
--
ALTER TABLE `banner_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `banner_price`
--
ALTER TABLE `banner_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `banner_property`
--
ALTER TABLE `banner_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `logs_autobank`
--
ALTER TABLE `logs_autobank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `otp_confirm`
--
ALTER TABLE `otp_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `technique_info`
--
ALTER TABLE `technique_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banner_price`
--
ALTER TABLE `banner_price`
  ADD CONSTRAINT `banner_price_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `banner_property` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
