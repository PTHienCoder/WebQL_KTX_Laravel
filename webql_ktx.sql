-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 20, 2022 lúc 09:48 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webql_ktx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_06_06_112949_create_tbl_admin_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(2, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'PTHien', '0868307362', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banquanly`
--

CREATE TABLE `tbl_banquanly` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gioitinh` varchar(50) NOT NULL,
  `quequan` varchar(50) NOT NULL,
  `ngaysinh` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `macbo` varchar(50) NOT NULL,
  `idkhu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_banquanly`
--

INSERT INTO `tbl_banquanly` (`id`, `name`, `email`, `phone`, `gioitinh`, `quequan`, `ngaysinh`, `image`, `macbo`, `idkhu`) VALUES
(1, 'pthien', 'canbo3@gmail.com', '567575761313', '0', 'adasdad', '1231223', 'IMG_304420.JPG', 'c7c44', 2),
(2, 'pthien', 'canbo1@gmail.com', '567575761313', '0', 'adasdad', '1231223', 'IMG_304446.JPG', 'e6c59', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hocki`
--

CREATE TABLE `tbl_hocki` (
  `id_hocki` int(55) NOT NULL,
  `yeard` varchar(255) NOT NULL,
  `hocki` varchar(55) NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khuktx`
--

CREATE TABLE `tbl_khuktx` (
  `id_khu` int(11) NOT NULL,
  `tenkhu` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `mota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_khuktx`
--

INSERT INTO `tbl_khuktx` (`id_khu`, `tenkhu`, `diachi`, `mota`) VALUES
(1, 'KTN1', 'Đại học spkt.', 'abc'),
(2, 'KTN2', 'Đại học spkt', 'dvdv'),
(3, 'KTN3', 'Đại học spkt', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id_no` int(55) NOT NULL,
  `id_ngTB` varchar(50) NOT NULL,
  `id_ngNhan` varchar(55) DEFAULT NULL,
  `id_khu_TV` varchar(55) DEFAULT NULL,
  `title` varchar(55) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `time` varchar(55) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(55) NOT NULL,
  `dateStart` varchar(255) DEFAULT NULL,
  `dateEnd` varchar(255) DEFAULT NULL,
  `trangthai` varchar(55) DEFAULT NULL,
  `price` varchar(55) DEFAULT NULL,
  `noptra` varchar(55) DEFAULT NULL,
  `idphieu` varchar(55) DEFAULT NULL,
  `idphong` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieudangky`
--

CREATE TABLE `tbl_phieudangky` (
  `id_phieu` int(11) NOT NULL,
  `idphong` varchar(50) NOT NULL,
  `idstudent` varchar(55) NOT NULL,
  `idgioitinh` varchar(255) NOT NULL,
  `idkhu` varchar(55) NOT NULL,
  `sogiuong` varchar(55) NOT NULL,
  `ngaydky` varchar(50) NOT NULL,
  `ngayketthuc` varchar(55) NOT NULL,
  `idnamhoc` varchar(255) NOT NULL,
  `trangthai` varchar(55) NOT NULL,
  `time_loading` varchar(55) DEFAULT NULL,
  `idchuyen_phong` varchar(55) DEFAULT NULL,
  `Lydo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phong`
--

CREATE TABLE `tbl_phong` (
  `id_phong` int(11) NOT NULL,
  `sophong` varchar(255) NOT NULL,
  `idkhu` int(11) NOT NULL,
  `svcur` int(11) NOT NULL,
  `svmax` int(11) NOT NULL,
  `giaphong` varchar(55) NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `tang` varchar(55) NOT NULL,
  `tinhtrang` varchar(255) NOT NULL,
  `loaiphong` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_phong`
--

INSERT INTO `tbl_phong` (`id_phong`, `sophong`, `idkhu`, `svcur`, `svmax`, `giaphong`, `gioitinh`, `tang`, `tinhtrang`, `loaiphong`) VALUES
(6, 'A101', 1, 1, 8, '50000', '0', '1', 'new', '0'),
(7, 'B101', 1, 0, 8, '600000', '0', '1', 'new', '0'),
(8, 'B201', 1, 0, 8, '50000', '0', '1', 'new', '0'),
(9, 'A102', 1, 0, 8, '60000', '0', '1', 'new', '0'),
(10, 'B101', 1, 0, 8, '42342424', '0', '3', 'new', '1'),
(11, 'K451', 2, 0, 8, '1321313', '0', '1', 'new', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sogiuong`
--

CREATE TABLE `tbl_sogiuong` (
  `id` int(55) NOT NULL,
  `sogiuong` varchar(50) NOT NULL,
  `type` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_sogiuong`
--

INSERT INTO `tbl_sogiuong` (`id`, `sogiuong`, `type`) VALUES
(1, '1', NULL),
(2, '2', NULL),
(3, '3', NULL),
(4, '4', NULL),
(5, '5', NULL),
(6, '6', NULL),
(7, '7', NULL),
(8, '8', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ngaysinh` varchar(255) NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `class` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cmnd` varchar(55) NOT NULL,
  `masv` varchar(50) NOT NULL,
  `khoahoc` varchar(50) NOT NULL,
  `quequan` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nghenghiep` varchar(55) NOT NULL,
  `truong` varchar(55) NOT NULL,
  `chuyennganh` varchar(55) NOT NULL,
  `mauser` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `email`, `ngaysinh`, `gioitinh`, `class`, `cmnd`, `masv`, `khoahoc`, `quequan`, `phone`, `image`, `nghenghiep`, `truong`, `chuyennganh`, `mauser`) VALUES
(7, 'pthien', 'pthien@gmail.com', '16 June 2022', '0', 'ádád', '31313', 'ád', 'á', 'pthien@gmail.com', '56757576', '281102270_427297972155801_606673233963149893_n10.png', 'ád', 'ád', 'ádasd', 'f315f'),
(8, 'đinhduc', 'dihduc0868307362@gmail.com', '20 June 2022', '0', 'ád', '12321313213', 'ád', 'ádadád', 'sdadsad', '123312332', 'bn16.jpg', 'ádad', 'ádad', 'ádad', '48c34'),
(9, 'đinhduc', 'dihduc0868307362@gmail.com', '20 June 2022', '0', 'ád', '12321313213', 'ád', 'ádadád', 'sdadsad', '123312332', 'bn177.jpg', 'ádad', 'ádad', 'ádad', 'acbbc'),
(10, 'đinhuc', 'user1@gmail.com', '23 June 2022', '0', 'ádad', 'dsada', 'adsad', 'ádadsd', 'adasds', '13132', 'datlichkham0.jpg', 'dsada', 'sdsd', 'áds', 'a2615');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(255) NOT NULL,
  `id_sv` varchar(50) NOT NULL,
  `gioitinh` varchar(55) NOT NULL,
  `idphog` int(55) NOT NULL,
  `idphiu` int(60) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `auth` int(11) NOT NULL,
  `mauser` varchar(55) NOT NULL,
  `gioitinh` varchar(55) NOT NULL,
  `idkhu` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `pass`, `auth`, `mauser`, `gioitinh`, `idkhu`) VALUES
(1, 'canbo3@gmail.com', '123456', 1, 'c7c44', '0', '2'),
(10, 'canbo1@gmail.com', '123456', 1, 'e6c59', '0', '1'),
(13, 'pthien@gmail.com', '123', 2, 'f315f', '0', NULL),
(17, 'user1@gmail.com', '123', 2, 'a2615', '0', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_active_admin`
--

CREATE TABLE `tb_active_admin` (
  `id` int(55) NOT NULL,
  `avtive` varchar(50) NOT NULL,
  `id_admin` varchar(55) NOT NULL,
  `trangthai` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_active_admin`
--

INSERT INTO `tb_active_admin` (`id`, `avtive`, `id_admin`, `trangthai`) VALUES
(1, 'DKY_PHONG', '2', 'false');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_banquanly`
--
ALTER TABLE `tbl_banquanly`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_hocki`
--
ALTER TABLE `tbl_hocki`
  ADD PRIMARY KEY (`id_hocki`);

--
-- Chỉ mục cho bảng `tbl_khuktx`
--
ALTER TABLE `tbl_khuktx`
  ADD PRIMARY KEY (`id_khu`);

--
-- Chỉ mục cho bảng `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id_no`);

--
-- Chỉ mục cho bảng `tbl_phieudangky`
--
ALTER TABLE `tbl_phieudangky`
  ADD PRIMARY KEY (`id_phieu`);

--
-- Chỉ mục cho bảng `tbl_phong`
--
ALTER TABLE `tbl_phong`
  ADD PRIMARY KEY (`id_phong`);

--
-- Chỉ mục cho bảng `tbl_sogiuong`
--
ALTER TABLE `tbl_sogiuong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_active_admin`
--
ALTER TABLE `tb_active_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_banquanly`
--
ALTER TABLE `tbl_banquanly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_hocki`
--
ALTER TABLE `tbl_hocki`
  MODIFY `id_hocki` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_khuktx`
--
ALTER TABLE `tbl_khuktx`
  MODIFY `id_khu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id_no` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `tbl_phieudangky`
--
ALTER TABLE `tbl_phieudangky`
  MODIFY `id_phieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `tbl_phong`
--
ALTER TABLE `tbl_phong`
  MODIFY `id_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_sogiuong`
--
ALTER TABLE `tbl_sogiuong`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tb_active_admin`
--
ALTER TABLE `tb_active_admin`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
