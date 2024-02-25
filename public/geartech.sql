-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2023 lúc 10:44 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `geartech`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bestseller`
--

CREATE TABLE `bestseller` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bestseller`
--

INSERT INTO `bestseller` (`id`, `image`, `name`, `price`, `description`) VALUES
(1, 'loa-vi-tinh-fenda-f670x.jpg', 'Loa vi tính Fenda F670x', 1390000, ''),
(2, 'asus-tuf-gaming-fx517ze-i5.jpg', 'ASUS-TUF-Gaming FX517ze-i5', 18990000, ''),
(3, 'msi-gaming-gf63-thin-11sc-i5.jpg', 'MSI-Gaming GF63-Thin-11SC-i5', 15040000, ''),
(4, 'camera-ip-360-do-1080p.jpg', 'Camera-ip-360-do-1080p', 590000, ''),
(5, 'viewsonic-gaming-vx2728j-27-inch-fullhd.jpg', 'Viewsonic-Gaming VX2728j 27inch FullHD', 4800000, ''),
(6, 'apple-watch-se-2023.jpg', 'Apple Watch SE 2023', 6100000, ''),
(7, 'honor-pad-x9.jpg', 'HonorPad X9', 3890000, ''),
(8, 'iphone-15-pro-max.jpg', 'Iphone 15 pro max', 34190000, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `macthd` int(11) NOT NULL,
  `mahd` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`macthd`, `mahd`, `id`, `soluong`, `dongia`) VALUES
(1, 1, 9, 1, 29790000),
(2, 2, 9, 1, 29790000),
(3, 3, 2, 1, 18990000),
(5, 5, 2, 2, 37980000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(11) NOT NULL,
  `MA_TK` int(10) UNSIGNED NOT NULL,
  `diachi` text NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `tongtien` float NOT NULL,
  `ngaylap` datetime NOT NULL,
  `tinhtrang` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `MA_TK`, `diachi`, `sdt`, `tongtien`, `ngaylap`, `tinhtrang`) VALUES
(1, 14, 'ct', '0123456789', 29790000, '2023-11-19 01:59:45', 1),
(2, 14, 'ct', '0123456789', 29790000, '2023-11-19 02:01:57', -1),
(3, 14, 'ct', '0123456789', 18990000, '2023-11-19 02:02:15', 0),
(5, 15, 'CanTho', '0123456789', 37980000, '2023-11-19 03:39:46', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `tensp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `tensp`, `price`, `image`, `description`, `soluong`) VALUES
(1, 'Loa vi tính Fenda F670x', 1390000, 'loa-vi-tinh-fenda-f670x.jpg', 'Trong một bộ loa của 2.1 Fenda F670X sẽ bao gồm: 1 loa siêu trầm (loa giữa) và 2 loa vệ tinh. Khi nhìn vào tổng thể của loa vi tính 2.1 Fenda F670X, mình rất ấn tượng khi thiết bị sở hữu một ngoại hình không quá to với kích thước của phần loa giữa là 6.5 inch và đủ để bạn đặt kế một bộ PC trên bàn. Không những thế, loa vi tính 2.1 Fenda F670X còn được làm tương đối nhẹ khi chỉ nặng 4.2 kg. Con số này tuy không quá ấn tượng nhưng đủ để khiến bạn thoải mái và dễ dàng khi chi chuyển và lắp đặt hơn.', 10),
(2, 'ASUS-TUF-Gaming FX517ze-i5', 18990000, 'asus-tuf-gaming-fx517ze-i5.jpg', 'Asus TUF Dash F15 FX517ZC-HN077W là chiếc laptop gaming siêu nhỏ gọn, bền bỉ đạt chuẩn quân đội trang bị bộ vi xử lý Intel thế hệ thứ 12 mới nhất, cho bạn chơi game linh hoạt mọi lúc mọi nơi.', 0),
(3, 'MSI-Gaming GF63-Thin-11SC-i5', 15040000, 'msi-gaming-gf63-thin-11sc-i5.jpg', 'Mang trong mình sức mạnh hiệu năng của bộ vi xử lý Intel Core i5 dòng H mạnh mẽ và card đồ họa rời NVIDIA GeForce GTX, laptop MSI Gaming GF63 Thin 11SC i5 (664VN) có khả năng chiến game nặng và thiết kế đồ họa một cách mượt mà.', 0),
(4, 'Camera-ip-360-do-1080p', 590000, 'camera-ip-360-do-1080p.jpg', 'Camera IP 360 Độ 1080P IMOU Ranger 2C TA22CP với kiểu dáng nhỏ gọn, chân đế bằng phẳng giúp dễ dàng lắp đặt, camera hỗ trợ ghi lại bao quát không gian xung quanh với độ sắc nét cao, hứa hẹn mang đến người dùng những trải nghiệm tốt nhất.', 6),
(5, 'Viewsonic-Gaming VX2728j 27inch FullHD', 4800000, 'viewsonic-gaming-vx2728j-27-inch-fullhd.jpg', 'Bạn đang tìm kiếm một màn hình gaming chất lượng cao để nâng cao trải nghiệm chơi game của mình. Màn hình ViewSonic Gaming VX2728J 27 inch Full HD với tấm nền IPS hỗ trợ tần số quét 165 Hz, công nghệ AMD FreeSync Premium và nhiều tính năng nổi bật khác sẽ mang đến cho bạn một trải nghiệm chơi game mượt mà, chân thực và sống động.', 2),
(6, 'Apple Watch SE 2023', 6100000, 'apple-watch-se-2023.jpg', 'Sở hữu thiết kế hiện đại, đầy đủ các tính năng sức khỏe, chế độ luyện tập đa dạng, hệ điều hành phiên bản mới thêm nhiều tiện ích hơn, giao diện thân thiện với người dùng,... chiếc Apple Watch SE 2023 GPS + Cellular 44mm viền nhôm dây thể thao sẽ sẵn sàng đồng hành cùng bạn trong mọi hoạt động thường nhật.', 0),
(7, 'HonorPad X9', 3890000, 'honor-pad-x9.jpg', 'Honor Pad X9 là mẫu máy tính bảng mới được nhà Honor cho ra mắt sau khoảng thời gian dài vắng bóng tại Việt Nam, lần ra mắt này hãng mang tới một sản phẩm có giá thành rẻ, hiệu năng tốt cùng pin lớn giúp đáp ứng dài lâu cho mọi tác vụ.', 20),
(8, 'Iphone 15 pro max', 34190000, 'iphone-15-pro-max.jpg', 'iPhone 15 Pro Max là một chiếc điện thoại thông minh cao cấp được mong đợi nhất năm 2023. Với nhiều tính năng mới và cải tiến, iPhone 15 Pro Max chắc chắn sẽ là một lựa chọn tuyệt vời cho những người dùng đang tìm kiếm một chiếc điện thoại có hiệu năng mạnh mẽ, camera chất lượng và thiết kế sang trọng.', 10),
(9, 'Iphone 14 Pro Max 256G', 29790000, 'iphone-14-pro.jpg', 'Mới đây thì chiếc điện thoại iPhone 14 Pro Max 256GB cũng đã được chính thức lộ diện trên toàn cầu và đập tan bao lời đồn đoán bấy lâu nay, bên trong máy sẽ được trang bị con chip hiệu năng khủng cùng sự nâng cấp về camera đến từ nhà Apple.', 8),
(10, 'OPPO Reno10 5G 256GB', 10490000, 'oppo-reno10.jpg', 'Là một trong những chiếc smartphone mới nhất của OPPO trên thị trường hiện nay, OPPO Reno10 5G mang trên mình bộ áo đẹp mắt, hiệu năng ổn định đi cùng với đó là khả năng nhiếp ảnh vượt trội, đáp ứng mượt mà hầu hết các nhu cầu của người dùng.', 14),
(11, 'Vivo Y02T', 2990000, 'vivo-y02t.jpg', 'Điện thoại vivo Y02T là một trong những sản phẩm mới của vivo, hãng smartphone nổi tiếng của Trung Quốc. Tuy thuộc phân khúc giá rẻ, nhưng vẫn có những tính năng nổi bật như pin lớn 5000 mAh, màn hình IPS LCD 6.51 inch, bộ xử lý Helio P35 và bộ nhớ lưu trữ 64 GB.', 2),
(12, 'IPhone 13 128GB', 16390000, 'iphone-13.jpg', 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì hãng điện thoại Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 với nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.', 3),
(13, 'Laptop HP 15s fq2716TU i3', 10390000, 'hp-15s-fq2716tu-i3.jpg', 'Nếu bạn đang tìm kiếm một chiếc laptop học tập - văn phòng có thể đáp ứng tất tần tật mọi nhu cầu sử dụng hàng ngày từ học tập, làm việc văn phòng đến thiết kế đồ họa cơ bản, còn chần chừ gì nữa mà không tham khảo ngay laptop HP 15s fq2716TU i3 (7C0X3PA).', 2),
(14, 'Laptop Lenovo Ideapad 3 15IAU7 i3', 8690000, 'lenovo-ideapad-3.jpg', 'Laptop Lenovo Ideapad 3 15IAU7 i3 (82RK005LVN) đã trở thành một người bạn đồng hành đắc lực, cùng mình giải quyết mọi vấn đề trong công việc cũng như học tập nhờ hiệu năng mạnh mẽ đến từ bộ vi xử lý Intel thế hệ 12 tân tiến.', 4),
(15, 'Laptop Acer Aspire 5 Gaming A515 58GM 51LB i5', 16990000, 'acer-aspire-5.jpg', 'Mẫu laptop gaming với mức giá tầm trung đến từ thương hiệu Acer vừa được lên kệ tại Thế Giới Di Động, sở hữu hiệu năng mạnh mẽ với con chip Intel Gen 13 dòng H hiệu năng cao, RAM 16 GB, card rời RTX cùng nhiều tính năng hiện đại. Laptop Acer Aspire 5 Gaming A515 58GM 51LB i5 13420H (NX.KQ4SV.002) chắc chắn sẽ mang đến cho bạn những trải nghiệm sử dụng và chiến game giải trí tuyệt vời.', 5),
(16, 'Laptop Asus TUF Gaming F15 FX506HF i5', 16990000, 'asus-tuf-gaming.jpg', 'Với bộ vi xử lý Intel Core i5 dòng H mạnh mẽ và card đồ họa rời NVIDIA GeForce RTX 2050 4 GB, laptop Asus TUF Gaming F15 FX506HF là một trong những lựa chọn tuyệt vời cho các game thủ và những người dùng làm việc đa tác vụ hoặc liên quan đến đồ họa, kỹ thuật.', 0),
(17, 'Camera IP 360 1536P TP-Link Tapo C210', 690000, 'camera-ip-360.jpg', 'Kiểu dáng tròn trĩnh, thiết kế sang trọng với gam màu trắng tươi sáng\nKiểu dáng camera gọn chắc, chân đế phẳng dễ dàng cho việc lắp đặt ở nhiều vị trí từ để bàn, kệ đến gắn tường, trần. ', 2),
(18, 'Pin sạc dự phòng Polymer 10000mAh 12W AVA+ DS609A', 250000, 'pin-sac-du-phong-polymer.jpg', 'Pin sạc dự phòng Polymer 10000mAh 12W AVA+ DS609A sở hữu dung lượng pin lớn chỉ trong 1 thiết kế gọn nhẹ, mang đến cho bạn những trải nghiệm tuyệt vời.', 12),
(19, 'Tai nghe Bluetooth True Wireless Mozard TS13', 110000, 'tai-nghe-bluetooth-true-wireless.jpg', 'Tai nghe True Wireless sành điệu, màu sắc thời thượng\nLà mẫu tai nghe không dây thời thượng, Mozard TS13 tạo ấn tượng mạnh với củ tai nhỏ gọn, cho thao tác đeo, sử dụng cực thoải mái, tiện lợi.\n\nHộp sạc thiết kế với những đường cong tinh tế, có tính thẩm mỹ cao, bản lề bật lên/đóng lại dễ dàng, nắp hộp và thân được làm khít và phủ một lớp nhựa nhám, ngăn côn trùng, bụi bẩn xâm nhập vào bên trong. Khi sử dụng thì cảm giác rất bám tay, ít dính mồ hôi cũng như dấu vân tay, là sản phẩm có độ hoàn thiện cao trong phân khúc.', 3),
(20, 'Đồng hồ thông minh Samsung Galaxy Watch5', 3990000, 'samsung-galaxy-watch.jpg', 'Sau thành công của dòng Galaxy Watch4, tháng 8/2022 ông lớn công nghệ Samsung đã cho ra mắt thế hệ smartwatch tiếp theo của hãng mang tên Samsung Galaxy Watch5 40mm.', 6),
(21, 'Đồng hồ thông minh Xiaomi Redmi Watch 3', 2290000, 'redmi-watch-3.jpg', 'Tầm giá chưa đến 3 triệu đồng thì một chiếc smartwatch vừa có nghe gọi vừa được trang bị GPS độc lập khá hiếm thấy nhưng gần đây Xiaomi đã cho ra mắt sản phẩm đồng hồ thông minh Xiaomi Redmi Watch 3 có cả hai tính năng trên. Bên cạnh đó còn được trang bị nhiều tính năng hỗ trợ theo dõi sức khỏe và luyện tập phục vụ cho người dùng.', 9),
(22, 'Đồng hồ thông minh BeFit Watch Ultra S', 890000, 'befit-watch-ultra-s.jpg', 'Tầm giá chưa đến 3 triệu đồng thì một chiếc smartwatch vừa có nghe gọi vừa được trang bị GPS độc lập khá hiếm thấy nhưng gần đây Xiaomi đã cho ra mắt sản phẩm đồng hồ thông minh Xiaomi Redmi Watch 3 có cả hai tính năng trên. Bên cạnh đó còn được trang bị nhiều tính năng hỗ trợ theo dõi sức khỏe và luyện tập phục vụ cho người dùng.', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MA_TK` int(10) UNSIGNED NOT NULL,
  `TEN_DANG_NHAP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MAT_KHAU` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT 1,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DIA_CHI` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MA_TK`, `TEN_DANG_NHAP`, `MAT_KHAU`, `STATUS`, `EMAIL`, `PHONE`, `DIA_CHI`) VALUES
(14, 'n.h.congtru1209', '21232f297a57a5a743894a0e4a801fc3', 1, 'n.h.congtru1209@gmail.com', '0399750925', 'Can Tho'),
(15, 'n.h.congtru', '21232f297a57a5a743894a0e4a801fc3', 1, 'congtru1209@gmail.com', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bestseller`
--
ALTER TABLE `bestseller`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`macthd`),
  ADD KEY `mahd` (`mahd`,`id`),
  ADD KEY `sphd` (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `MA_TK` (`MA_TK`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MA_TK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `macthd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MA_TK` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `cthd` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`),
  ADD CONSTRAINT `sphd` FOREIGN KEY (`id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `tkorder` FOREIGN KEY (`MA_TK`) REFERENCES `taikhoan` (`MA_TK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
