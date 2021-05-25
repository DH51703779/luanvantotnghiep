-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 25, 2021 lúc 03:37 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `benhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bacsi`
--

DROP TABLE IF EXISTS `bacsi`;
CREATE TABLE IF NOT EXISTS `bacsi` (
  `MaBS` int(11) NOT NULL AUTO_INCREMENT,
  `TenBS` varchar(100) NOT NULL,
  `HocVi` varchar(100) NOT NULL DEFAULT 'ThS.BS',
  `gioitinh` int(11) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `DienThoai` int(11) NOT NULL,
  `MaKhoa` int(11) NOT NULL,
  `MaPhong` int(11) NOT NULL,
  PRIMARY KEY (`MaBS`),
  KEY `MaPhong` (`MaPhong`),
  KEY `MaKhoa` (`MaKhoa`,`MaPhong`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bacsi`
--

INSERT INTO `bacsi` (`MaBS`, `TenBS`, `HocVi`, `gioitinh`, `DiaChi`, `DienThoai`, `MaKhoa`, `MaPhong`) VALUES
(1, 'Bùi Thị Vạn Hạnh', 'ThS.BS', 0, '123 Hồng Bàng , Quận 5 ', 332004461, 6, 205),
(2, 'Phạm Hữu Luôn', 'PGS.TS.BS', 1, '255 Lý Thường Kiệt Q11', 332004462, 6, 206),
(3, 'Nguyễn Quốc Thành', 'ThS.BS', 1, '208 Trần Quốc Toản Q3', 332004463, 6, 205),
(4, 'Phan Thị Xinh', 'ThS.BS', 0, '222 Lê Văn Khương , Quận 12', 332004464, 6, 206),
(5, 'Dương Duy Khoa', 'ThS.BS', 1, '208 Trần Hưng Đạo ', 332004450, 5, 203),
(6, 'Nguyễn Hồ Lam', 'ThS.BS', 1, '120 Trần Thị Bảy , Quận 12', 332004462, 5, 204),
(7, 'Lê Thị Tuyết Lan', 'ThS.BS', 0, '257 Trần Phú Quận 5', 339718974, 5, 203),
(8, 'Thái Thị Thùy Linh', 'ThS.BS', 0, '120 Cao Thắng Q10', 332004422, 5, 204),
(9, 'Vũ Bá Cương', 'ThS.BS', 1, '545 Lê Lợi', 332004464, 4, 201),
(10, 'Đỗ Phước Hùng', 'ThS.BS', 1, '275 Thành Thái Q10', 585002145, 4, 202),
(11, 'Chu Lan Anh ', 'ThS.BS', 0, '120 Thành Thái', 97564123, 3, 105),
(12, 'Võ Hiếu Bình', 'ThS.BS', 1, '120 Hàm Nghi Q1', 53456789, 3, 106),
(13, 'Bùi Cao Mỹ Ái', 'ThS.BS', 0, '22 Lý Thái Tổ Quận 10', 932345764, 2, 103),
(14, 'Trương Quang Bình ', 'ThS.BS', 1, '22 Tô Ký Quận 12', 923465874, 2, 104),
(15, 'Lê Nguyễn Như Ý', 'ThS.BS', 0, 'Trung Mý Tây . Quận 12', 323457888, 1, 101),
(16, 'Vũ Minh Luân', 'ThS.BS', 1, 'Nguyễn Thị Đặng ,Quận 12', 326484569, 1, 102);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhnhan`
--

DROP TABLE IF EXISTS `benhnhan`;
CREATE TABLE IF NOT EXISTS `benhnhan` (
  `MaBN` int(11) NOT NULL AUTO_INCREMENT,
  `TenBN` varchar(100) NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `DienThoai` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  PRIMARY KEY (`MaBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvi`
--

DROP TABLE IF EXISTS `hocvi`;
CREATE TABLE IF NOT EXISTS `hocvi` (
  `MaHV` int(11) NOT NULL AUTO_INCREMENT,
  `TenHV` varchar(50) NOT NULL,
  `MaBS` int(11) NOT NULL,
  PRIMARY KEY (`MaHV`),
  KEY `MaBS` (`MaBS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

DROP TABLE IF EXISTS `khoa`;
CREATE TABLE IF NOT EXISTS `khoa` (
  `MaKhoa` int(11) NOT NULL,
  `TenKhoa` varchar(100) NOT NULL,
  `Hinh` varchar(100) NOT NULL,
  PRIMARY KEY (`MaKhoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`MaKhoa`, `TenKhoa`, `Hinh`) VALUES
(1, 'Răng hàm mặt', 'rang.png\r\n'),
(2, 'Tim mạch', 'tim.png'),
(3, 'Tai mũi họng', 'tai.png'),
(4, 'Xương khớp ', 'xuong.png'),
(5, 'Hô hấp', 'hohap.png'),
(6, 'Huyết học', 'huyethoc.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichkham`
--

DROP TABLE IF EXISTS `lichkham`;
CREATE TABLE IF NOT EXISTS `lichkham` (
  `MaLK` int(11) NOT NULL,
  `MaKhoa` int(11) NOT NULL,
  `MaBN` int(11) NOT NULL,
  `MaBS` int(11) NOT NULL,
  `NgayKham` date NOT NULL,
  `BuoiKham` varchar(100) NOT NULL,
  `STT` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  PRIMARY KEY (`MaLK`,`MaKhoa`),
  KEY `MaBN` (`MaBN`,`MaBS`),
  KEY `MaBS` (`MaBS`),
  KEY `MaKhoa` (`MaKhoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichtruc`
--

DROP TABLE IF EXISTS `lichtruc`;
CREATE TABLE IF NOT EXISTS `lichtruc` (
  `MaLT` int(11) NOT NULL,
  `Buoi` varchar(50) NOT NULL,
  `NgayTruc` date NOT NULL,
  `MaBS` int(11) NOT NULL,
  PRIMARY KEY (`MaLT`),
  KEY `MaBS` (`MaBS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

DROP TABLE IF EXISTS `phong`;
CREATE TABLE IF NOT EXISTS `phong` (
  `MaPhong` int(11) NOT NULL,
  `MaKhoa` int(11) NOT NULL,
  PRIMARY KEY (`MaPhong`),
  KEY `MaKhoa` (`MaKhoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`MaPhong`, `MaKhoa`) VALUES
(101, 1),
(102, 1),
(103, 2),
(104, 2),
(105, 3),
(106, 3),
(201, 4),
(202, 4),
(203, 5),
(204, 5),
(205, 6),
(206, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `MaBS` int(11) NOT NULL,
  `MaBN` int(11) NOT NULL,
  `VaiTro` int(11) NOT NULL,
  PRIMARY KEY (`MaTK`),
  KEY `MaBS` (`MaBS`),
  KEY `MaBN` (`MaBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `bacsi_ibfk_1` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa` (`MaKhoa`),
  ADD CONSTRAINT `bacsi_ibfk_2` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`);

--
-- Các ràng buộc cho bảng `hocvi`
--
ALTER TABLE `hocvi`
  ADD CONSTRAINT `hocvi_ibfk_1` FOREIGN KEY (`MaBS`) REFERENCES `bacsi` (`MaBS`);

--
-- Các ràng buộc cho bảng `lichkham`
--
ALTER TABLE `lichkham`
  ADD CONSTRAINT `lichkham_ibfk_1` FOREIGN KEY (`MaBN`) REFERENCES `benhnhan` (`MaBN`),
  ADD CONSTRAINT `lichkham_ibfk_2` FOREIGN KEY (`MaBS`) REFERENCES `bacsi` (`MaBS`),
  ADD CONSTRAINT `lichkham_ibfk_3` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa` (`MaKhoa`);

--
-- Các ràng buộc cho bảng `lichtruc`
--
ALTER TABLE `lichtruc`
  ADD CONSTRAINT `lichtruc_ibfk_1` FOREIGN KEY (`MaBS`) REFERENCES `bacsi` (`MaBS`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa` (`MaKhoa`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaBN`) REFERENCES `benhnhan` (`MaBN`),
  ADD CONSTRAINT `taikhoan_ibfk_2` FOREIGN KEY (`MaBS`) REFERENCES `bacsi` (`MaBS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
