-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 02, 2023 lúc 05:31 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlythietbi_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `Id_danhmuc` int NOT NULL,
  `Tendanhmuc` varchar(50) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`Id_danhmuc`, `Tendanhmuc`) VALUES
(1, 'Đồ điện tử'),
(2, 'Thiết bị phòng'),
(3, 'Đồ vệ sinh'),
(4, 'Vật tư cá nhân'),
(5, 'Đồ dùng chung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Id_nv` int NOT NULL,
  `Tennv` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `Id_phongban` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`Id_nv`, `Tennv`, `Email`, `Id_phongban`) VALUES
(1, '123', '123@gmail.com', 2),
(13, 'Chu Văn Trường', 'Truong@gmail.com', 6),
(14, 'Chu Văn Nam', 'Nam@gmail.com', 5),
(15, 'Tống Duy Anh', 'Duyanh@gmail.com', 1),
(16, 'Nguyễn Thị B', 'ThiB@gmail.com', 2),
(17, 'Nguyễn Thị C', 'ThiC@gmail.com', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien_thietbi`
--

CREATE TABLE `nhanvien_thietbi` (
  `Id_nv` int NOT NULL,
  `Id_thietbi` int NOT NULL,
  `Thoigianbatdau` date NOT NULL,
  `Thoigianketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `Id_phongban` int NOT NULL,
  `Tenphongban` varchar(255) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`Id_phongban`, `Tenphongban`) VALUES
(1, 'Quản lý vật tư'),
(2, 'Phòng IT'),
(3, 'Phòng Kinh Doanh'),
(4, 'Phòng nhân sự'),
(5, 'Phòng maketing'),
(6, 'Phòng hành chính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Tentk` char(20) COLLATE utf8mb3_bin NOT NULL,
  `Matkhau` char(20) COLLATE utf8mb3_bin NOT NULL,
  `Ngaylap` date NOT NULL,
  `Id_nv` int NOT NULL,
  `Quyen` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Tentk`, `Matkhau`, `Ngaylap`, `Id_nv`, `Quyen`) VALUES
('Truongnv', '123456', '2023-01-03', 13, 1),
('admin', 'admin', '2023-02-16', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbi`
--

CREATE TABLE `thietbi` (
  `Id_thietbi` int NOT NULL,
  `Id_danhmuc` int NOT NULL,
  `Tenthietbi` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `Ngaymua` date NOT NULL,
  `Ngayhetbh` date NOT NULL,
  `Soluong` int NOT NULL,
  `in_use` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Đang đổ dữ liệu cho bảng `thietbi`
--

INSERT INTO `thietbi` (`Id_thietbi`, `Id_danhmuc`, `Tenthietbi`, `Ngaymua`, `Ngayhetbh`, `Soluong`, `in_use`) VALUES
(16, 1, 'Màn hình Glowy 19 inch', '2022-01-01', '2023-01-01', 10, 1),
(17, 1, 'Ram Kingston FURY Beast 16GB', '2022-02-02', '2024-01-01', 20, 0),
(18, 2, 'Quạt cây', '2022-01-01', '2023-01-01', 29, 0),
(19, 5, 'Máy in phun', '2021-01-01', '2022-01-01', 2, 0),
(20, 3, 'Cây lau nhà', '2020-02-02', '2020-08-02', 8, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbihong`
--

CREATE TABLE `thietbihong` (
  `Id_thietbihong` int NOT NULL,
  `Ngayhong` date NOT NULL,
  `Id_thietbi` int NOT NULL,
  `sl_Hong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Đang đổ dữ liệu cho bảng `thietbihong`
--

INSERT INTO `thietbihong` (`Id_thietbihong`, `Ngayhong`, `Id_thietbi`, `sl_Hong`) VALUES
(3, '2023-02-28', 20, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbisua`
--

CREATE TABLE `thietbisua` (
  `Id_thietbisua` int NOT NULL,
  `Ngaysua` date NOT NULL,
  `Nguyennhan` text COLLATE utf8mb3_bin NOT NULL,
  `Khacphuc` text COLLATE utf8mb3_bin NOT NULL,
  `Id_thietbi` int NOT NULL,
  `sl_Sua` int NOT NULL,
  `trangThaiSua` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Đang đổ dữ liệu cho bảng `thietbisua`
--

INSERT INTO `thietbisua` (`Id_thietbisua`, `Ngaysua`, `Nguyennhan`, `Khacphuc`, `Id_thietbi`, `sl_Sua`, `trangThaiSua`) VALUES
(5, '2023-03-02', 'Hỏng đế', 'Sửa đế', 18, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeucau`
--

CREATE TABLE `yeucau` (
  `Id_yeucau` int NOT NULL,
  `Noidung` text COLLATE utf8mb3_bin NOT NULL,
  `Id_nv` int NOT NULL,
  `thoiGianYC` date NOT NULL,
  `TrangThai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Đang đổ dữ liệu cho bảng `yeucau`
--

INSERT INTO `yeucau` (`Id_yeucau`, `Noidung`, `Id_nv`, `thoiGianYC`, `TrangThai`) VALUES
(1, 'Sửa máy lạnh', 13, '2023-03-01', 0),
(2, 'Mua máy lạnh', 13, '2023-02-15', 0),
(3, 'Thay quạt', 16, '2023-03-01', 1),
(4, 'Thay máy 1', 14, '2023-03-01', 0),
(5, 'Sửa máy', 15, '2023-02-23', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`Id_danhmuc`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Id_nv`),
  ADD KEY `fk_phongban` (`Id_phongban`);

--
-- Chỉ mục cho bảng `nhanvien_thietbi`
--
ALTER TABLE `nhanvien_thietbi`
  ADD PRIMARY KEY (`Id_nv`,`Id_thietbi`),
  ADD KEY `fk_nv_tb2` (`Id_thietbi`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`Id_phongban`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Tentk`),
  ADD KEY `fk_nv` (`Id_nv`);

--
-- Chỉ mục cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  ADD PRIMARY KEY (`Id_thietbi`),
  ADD KEY `fk_danhmuc` (`Id_danhmuc`);

--
-- Chỉ mục cho bảng `thietbihong`
--
ALTER TABLE `thietbihong`
  ADD PRIMARY KEY (`Id_thietbihong`),
  ADD KEY `fk_thietbihong` (`Id_thietbi`);

--
-- Chỉ mục cho bảng `thietbisua`
--
ALTER TABLE `thietbisua`
  ADD PRIMARY KEY (`Id_thietbisua`),
  ADD KEY `fk_thietbisua` (`Id_thietbi`);

--
-- Chỉ mục cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  ADD PRIMARY KEY (`Id_yeucau`),
  ADD KEY `fk_nv_yc` (`Id_nv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `Id_danhmuc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id_nv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `Id_phongban` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  MODIFY `Id_thietbi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `thietbihong`
--
ALTER TABLE `thietbihong`
  MODIFY `Id_thietbihong` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thietbisua`
--
ALTER TABLE `thietbisua`
  MODIFY `Id_thietbisua` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  MODIFY `Id_yeucau` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_phongban` FOREIGN KEY (`Id_phongban`) REFERENCES `phongban` (`Id_phongban`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `nhanvien_thietbi`
--
ALTER TABLE `nhanvien_thietbi`
  ADD CONSTRAINT `fk_nv_tb1` FOREIGN KEY (`Id_nv`) REFERENCES `nhanvien` (`Id_nv`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_nv_tb2` FOREIGN KEY (`Id_thietbi`) REFERENCES `thietbi` (`Id_thietbi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_nv` FOREIGN KEY (`Id_nv`) REFERENCES `nhanvien` (`Id_nv`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  ADD CONSTRAINT `fk_danhmuc` FOREIGN KEY (`Id_danhmuc`) REFERENCES `danhmuc` (`Id_danhmuc`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `thietbihong`
--
ALTER TABLE `thietbihong`
  ADD CONSTRAINT `fk_thietbihong` FOREIGN KEY (`Id_thietbi`) REFERENCES `thietbi` (`Id_thietbi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `thietbisua`
--
ALTER TABLE `thietbisua`
  ADD CONSTRAINT `fk_thietbisua` FOREIGN KEY (`Id_thietbi`) REFERENCES `thietbi` (`Id_thietbi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  ADD CONSTRAINT `fk_nv_yc` FOREIGN KEY (`Id_nv`) REFERENCES `nhanvien` (`Id_nv`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
