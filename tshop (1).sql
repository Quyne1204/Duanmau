-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2022 lúc 06:22 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `iduser` int(11) DEFAULT 0,
  `bill_name` varchar(200) NOT NULL,
  `bill_diachi` varchar(200) NOT NULL,
  `bill_sdt` varchar(200) NOT NULL,
  `bill_pttt` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) DEFAULT 0 COMMENT '0. đang tạo đơn hàng 1. đã xử lý 2. đang giao hàng 3. giao hàng thành công'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `iduser`, `bill_name`, `bill_diachi`, `bill_sdt`, `bill_pttt`, `date`, `total`, `bill_status`) VALUES
(2, NULL, 'Nguyen Van Quy', 'Ha Noi', '123456', '0', '2024-10-22', 133, 0),
(85, 44, 'Nguyễn Văn Quý', 'Sơn lôi - bình xuyên - vĩnh phúc', '0336442176', 'Trả tiền khi nhận hàng', '2022-10-24', 68, 3),
(86, 42, '', '', '', 'Trả tiền khi nhận hàng', '2022-10-24', 65, 2),
(87, 54, '', '', '', 'Trả tiền khi nhận hàng', '2022-10-24', 3065, 1),
(88, 0, '', '', '', 'Trả tiền khi nhận hàng', '2022-10-24', 35, 0),
(89, 39, '', '', '', 'Trả tiền khi nhận hàng', '2022-10-24', 70, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_cmt` int(11) NOT NULL,
  `noidung` varchar(1000) NOT NULL,
  `username` varchar(222) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `ngaycmt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_cmt`, `noidung`, `username`, `id_pro`, `ngaycmt`) VALUES
(7, 'chat luona', 'Quy', 63, '2023-10-22'),
(8, 'sp chat luong', 'Quy', 62, '2023-10-22'),
(9, 'dep qua', 'trang', 63, '2023-10-22'),
(12, '21323', 'Quy', 63, '2024-10-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `img` varchar(253) DEFAULT NULL,
  `name` varchar(253) DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `soluong` int(5) NOT NULL,
  `thanhtien` int(15) NOT NULL,
  `idbill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(4, 42, 63, 'sp13.png', 'KÍNH MẮT NỮ THỜI TRANG CAO CẤP ELLY – EK117', 35, 1, 35, 2),
(5, 42, 62, 'sp12.jpg', 'KÍNH MẮT UNISEX CAO CẤP ELLY – EKU148', 33, 1, 33, 2),
(6, 42, 61, 'sp11.jpg', 'KÍNH MẮT NAM CAO CẤP ELLY HOMME – EKM68', 30, 1, 30, 2),
(7, 42, 63, 'sp13.png', 'KÍNH MẮT NỮ THỜI TRANG CAO CẤP ELLY – EK117', 35, 1, 35, 2),
(46, 44, 63, 'sp13.png', 'KÍNH MẮT NỮ THỜI TRANG CAO CẤP ELLY – EK117', 35, 1, 35, 85),
(47, 44, 62, 'sp12.jpg', 'KÍNH MẮT UNISEX CAO CẤP ELLY – EKU148', 33, 1, 33, 85),
(48, 42, 63, 'sp13.png', 'KÍNH MẮT NỮ THỜI TRANG CAO CẤP ELLY – EK117', 35, 1, 35, 86),
(49, 42, 59, 'sp9.jpg', 'GIÀY NỮ CAO CẤP ELLY – EGM93', 30, 1, 30, 86),
(50, 54, 57, 'sp7.png', 'ĐỒNG HỒ NỮ FREDERIQUE ', 3000, 1, 3000, 87),
(51, 54, 59, 'sp9.jpg', 'GIÀY NỮ CAO CẤP ELLY – EGM93', 30, 1, 30, 87),
(52, 54, 63, 'sp13.png', 'KÍNH MẮT NỮ THỜI TRANG CAO CẤP ELLY – EK117', 35, 1, 35, 87),
(54, 39, 63, 'sp13.png', 'KÍNH MẮT NỮ THỜI TRANG CAO CẤP ELLY – EK117', 35, 1, 35, 89),
(55, 39, 63, 'sp13.png', 'KÍNH MẮT NỮ THỜI TRANG CAO CẤP ELLY – EK117', 35, 1, 35, 89);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_loai` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_loai`, `name`) VALUES
(4, 'Giày Nam '),
(5, 'Đồng Hồ'),
(7, 'Kính Thời Trang'),
(8, 'Giày Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(10,2) DEFAULT 0.00,
  `img` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `luotxem` int(100) DEFAULT 0,
  `date` date NOT NULL,
  `sale` float NOT NULL DEFAULT 0,
  `id_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `name`, `price`, `img`, `detail`, `luotxem`, `date`, `sale`, `id_dm`) VALUES
(51, 'JAMES DERBY - DB27', 75.00, 'sp1.webp', '- Màu: Đen - Chất liệu:     + Đế: EVA     + Quai: da bò cao cấp     + Lót tăng chiều cao: EVA không hủy     + Lớp lót đệm độc quyền T&TRA có tính đàn hồi cao, mang lại cảm giác ÊM CHÂN hơn khi sử dụng. - Tăng cao: 8cm ( đế ngoài 3cm, lót ẩn bên trong 5cm) - Thiết kế và sản xuất: T&TRA - Xuất xứ: Việt Nam', 10, '2022-09-21', 12, 4),
(52, 'CLASSY CHELSEA BOOTS - BO14', 90.00, 'sp2.webp', '- Màu: Đen - Chất liệu:     + Đế: EVA     + Quai: da bò cao cấp     + Lót tăng chiều cao: EVA không hủy     + Lớp lót đệm độc quyền T&TRA có tính đàn hồi cao, mang lại cảm giác ÊM CHÂN hơn khi sử dụng. - Tăng cao: 8cm ( đế ngoài 3cm, lót ẩn bên trong 5cm) - Thiết kế và sản xuất: T&TRA - Xuất xứ: Việt Nam', 1000, '2022-09-17', 0, 4),
(53, 'GIBSON CAPTOE OXFORD - DD07', 50.00, 'sp3.webp', '- Màu: Đen - Chất liệu:     + Đế: EVA     + Quai: da bò cao cấp     + Lót tăng chiều cao: EVA không hủy     + Lớp lót đệm độc quyền T&TRA có tính đàn hồi cao, mang lại cảm giác ÊM CHÂN hơn khi sử dụng. - Tăng cao: 8cm ( đế ngoài 3cm, lót ẩn bên trong 5cm) - Thiết kế và sản xuất: T&TRA - Xuất xứ: Việt Nam', 2999, '2022-08-30', 20, 4),
(54, 'ĐỒNG HỒ NAM CITIZEN NH8360-12A', 250.00, 'sp4.png', 'Mã sản phẩm	NH8360-12A Giới tính	Nam Xuất xứ	Nhật Bản Thương hiệu	Citizen Lịch	Lịch ngày, lịch thứ Loại vỏ	Thép không gỉ Khoảng đường kính	40 mm Mặt kính	Kính cường lực Màu mặt	Trắng Loại đồng hồ	Đồng hồ cơ Dòng sản phẩm	Automatic Độ dày	11 mm Loại máy	Quartz L129 Độ chịu nước	5 ATM Màu dây	Đen Loại dây	Dây da', 199, '2022-10-29', 20, 5),
(55, 'ĐỒNG HỒ NAM CITIZEN NP1020-15A', 450.00, 'sp5.png', 'Mã sản phẩm	NP1020-15A Giới tính	Nam Xuất xứ	Nhật Bản Thương hiệu	Citizen Thời gian bảo hành	1 năm toàn cầu Loại vỏ	Thép không gỉ Khoảng đường kính	40 mm Mặt kính	Kính cường lực Màu mặt	Trắng Loại đồng hồ	Đồng hồ cơ Dòng sản phẩm	Automatic Độ dày	11.2 mm Độ chịu nước	10 ATM Màu dây	Nâu Loại dây	Dây da USP	 Open-Heart  Chức năng	24 Giờ', 253, '2022-10-31', 30, 5),
(57, 'ĐỒNG HỒ NỮ FREDERIQUE ', 3000.00, 'sp7.png', 'Mã sản phẩm	FC-200MPW2ACD6 Giới tính	Nữ Xuất xứ	Thụy Sỹ Thương hiệu	Frederique Constant Loại vỏ	Đính kim cương Khoảng đường kính	28 x 20.7 mm Mặt kính	Sapphire Màu mặt	Trắng MOP Chân kính	4 Loại đồng hồ	Đồng hồ điện tử Phong cách đồng hồ	Luxury (Cao cấp) Dòng sản phẩm	Classics Độ dày	6.98 mm Loại máy	Quartz Độ chịu nước	3 ATM Loại dây	Dây da bò Tên nhà sản xuất	FREDERIQUE CONSTANT', 200, '2022-10-01', 10, 5),
(58, 'GIÀY NỮ THỜI TRANG CAO CẤP ELLY – EG140', 20.50, 'sp8.jpg', '– Thương hiệu: ELLY. – Sản xuất: Việt Nam. – Kiểu dáng: sandal. – Độ cao gót: 1,5 cm. – Màu sắc: Đen, nude. – Size: 35, 36, 37, 38, 39. – Chất liệu: Da tổng hợp cao cấp nhập khẩu. – Trọn bộ sản phẩm gồm: 01 giày nữ thời trang cao cấp ELLY – EG140 + 01 hộp đựng sang trọng. – Bảo hành: 03 tháng (với lỗi do sản xuất).', 500, '2022-10-29', 10, 8),
(59, 'GIÀY NỮ CAO CẤP ELLY – EGM93', 29.90, 'sp9.jpg', '– Thương hiệu: ELLY. – Sản xuất: Việt Nam. – Kiểu dáng: Giày cao gót. – Độ cao gót: 3 cm. – Màu sắc: Đen – Size: 35-36-37-38-39. – Chất liệu: Da microfiber cao cấp nhập khẩu. – Trọn bộ sản phẩm gồm: 01 giày nữ cao cấp ELLY – EGM93 + 01 hộp đựng sang trọng. – Bảo hành: 06 tháng (với lỗi do sản xuất).', NULL, '2022-10-30', 15, 8),
(60, 'GIÀY NỮ THỜI TRANG CAO CẤP ELLY – EG119', 29.00, 'sp10.jpg', '– Thương hiệu: ELLY. – Sản xuất: Việt Nam. – Kiểu dáng: Giày cao gót. – Độ cao gót: 9 cm. – Màu sắc: Đen, nude. – Size: 35-36-37-38-39. – Chất liệu: Da tổng hợp cao cấp nhập khẩu. – Trọn bộ sản phẩm gồm: 01 giày nữ cao cấp ELLY – EG119 + 01 hộp đựng sang trọng. – Bảo hành: 06 tháng (với lỗi do sản xuất).', NULL, '2022-10-30', 20, 8),
(61, 'KÍNH MẮT NAM CAO CẤP ELLY HOMME – EKM68', 30.00, 'sp11.jpg', 'Đây là mẫu kính râm đẹp HOT năm 2022 Màu sắc: Gọng hồng mắt hồng Full viền kính là nhựa, tròng kính là Polycacbonat dẻo mảnh, chuôi kính có lõi thép bên ngoài bọc nhựa nên khi đeo không có cảm giác đau nhức khó chịu. Dáng kính vuông to, tròng kính 0 độ chống UV400. Có thể cắt thêm kính râm cận. Phụ kiện thời trang phù hợp với mọi lứa tuổi. Chất liệu nhựa bền, tiếp xúc với mồ hôi không lo bị bám mùi. Phù hợp với đa số kiểu khuôn mặt.', NULL, '2022-09-30', 10, 7),
(62, 'KÍNH MẮT UNISEX CAO CẤP ELLY – EKU148', 32.50, 'sp12.jpg', 'Kính râm thời trang RM 20071 là mẫu sản phẩm được thiết kế độc quyền bởi Ree-man. RM20071 được thiết kế bởi chất liệu titanium cao cấp bền bỉ với thời gian, mang đến những trải nghiệm độc đáo như: giá trị sử dụng lâu dài, mặt kính bóng đẹp, khó bị gỉ, chống chịu tốt bởi tác động của môi trường, … Reeman 20071 nổi bật với sự kết hợp khéo léo gam màu xanh lá cá tính cho cả phần gọng và mắt kính cá tính, tất cả tạo nên một tổng thể hài hoà. Chắc chắn sẽ đem lại vẻ thời trang tối đa cho bạn.', NULL, '2022-10-15', 10, 7),
(63, 'KÍNH MẮT NỮ THỜI TRANG CAO CẤP ELLY – EK117', 35.00, 'sp13.png', 'Đây là mẫu kính râm đẹp HOT năm 2022 Màu sắc: Gọng ghi mắt xanh Full viền kính là titanium nguyên chất siêu bền, siêu nhẹ Dáng kính chữ nhật mảnh, tròng kính 0 độ chống UV400. Có thể cắt thêm kính râm cận. Phụ kiện thời trang phù hợp với mọi lứa tuổi. Chất liệu nhựa bền, tiếp xúc với mồ hôi không lo bị bám mùi. Phù hợp với đa số kiểu khuôn mặt.', 600, '2022-10-13', 20, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `vaitro` tinyint(4) NOT NULL DEFAULT 0,
  `img` varchar(200) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `sdt` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `email`, `vaitro`, `img`, `diachi`, `sdt`) VALUES
(39, 'Quy', '1', '', '', 1, '', NULL, NULL),
(41, 'quy1', '1', 'Nguyễn Văn Quý', 'quynvph21897@fpt.edu.vn', 2, '', 'Hà Nội', '0336442176'),
(42, 'quy2', '1', '', '', 2, '', NULL, NULL),
(43, 'quan', '1', '', '', 2, '', NULL, NULL),
(44, 'admin', '1', 'Nguyễn Văn Quý', 'nvq12042003@gmail.com', 1, '', 'Sơn lôi - bình xuyên - vĩnh phúc', '0336442176'),
(45, 'quy3', '1', '', '', 2, '', NULL, NULL),
(54, 'trang', '1', '', '', 2, '', NULL, NULL),
(57, '1', '1', '', '', 1, '', '', ''),
(58, '2', '2', '', '', 2, '', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_cmt`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `cart_bill` (`idbill`),
  ADD KEY `cart_user` (`iduser`),
  ADD KEY `cart_sanpham` (`idpro`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_loai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `sanpham_danhmuc` (`id_dm`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `cart_sanpham` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_danhmuc` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
