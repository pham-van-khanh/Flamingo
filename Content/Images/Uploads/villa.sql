-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 02:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `villa_flamingo`
--

-- --------------------------------------------------------

--
-- Table structure for table `villa`
--

CREATE TABLE `villa` (
  `id_villa` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `villa_category_id` int(11) NOT NULL,
  `price` int(10) NOT NULL,
  `desciption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `view` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_sale` int(11) NOT NULL DEFAULT 0,
  `bedrooms` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `img1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img3` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `villa`
--

INSERT INTO `villa` (`id_villa`, `name`, `images`, `villa_category_id`, `price`, `desciption`, `quantity`, `area`, `view`, `price_sale`, `bedrooms`, `status`, `img1`, `img2`, `img3`) VALUES
(2, 'Biệt thự v&agrave;ng anh', 'B.jpg', 1, 1000000, '&lt;p&gt;Thức giấc trong tiếng s&amp;oacute;ng biển du dương tại căn phòng hướng biển mang đến kh&amp;ocirc;ng gian nghỉ dưỡng tiện nghi v&amp;agrave; thoải m&amp;aacute;i với tầm nh&amp;igrave;n ra vịnh Lan Hạ.&lt;/p&gt;', 8, 49, 'Biển', 0, 1, 1, '3.jpg', '4.jpg', 'choice3.jpg'),
(3, 'Biệt thự Executive Ocean', 'Uploads/4.jpg', 1, 1500000, '&lt;p&gt;Thức giấc trong tiếng s&amp;oacute;ng biển du dương tại căn phòng hướng biển mang đến kh&amp;ocirc;ng gian nghỉ dưỡng tiện nghi v&amp;agrave; thoải m&amp;aacute;i với tầm nh&amp;igrave;n ra vịnh Lan Hạ.&lt;/p&gt;', 8, 49, 'Biển', 0, 1, 1, '2.jpg', '4.jpg', '3.jpg'),
(4, 'Biệt thự Premier Residence', 'Uploads/3.jpg', 2, 2000000, '&lt;p&gt;Với tầm nh&amp;igrave;n bao qu&amp;aacute;t ra biển, được v&amp;iacute; như một nốt trầm tĩnh lặng trong bản giao hưởng đến từ đại Dương, biệt thự Premier Residence Ocean mang lại một cảm gi&amp;aacute;c tự do, ph&amp;oacute;ng kho&amp;aacute;ng,', 4, 76, 'Biển', 0, 1, 1, '3.jpg', 'choice3.jpg', '4.jpg'),
(5, 'Royal Executive Duplex', 'Uploads/choice1.jpg', 3, 5000000, 'Tọa lạc tr&ecirc;n tầng cao nhất của t&ograve;a nh&agrave;, hội tụ mọi tinh hoa của thi&ecirc;n nhi&ecirc;n với tầm nh&igrave;n to&agrave;n cảnh vịnh biển thơ mộng, căn biệt thự tổng thống l&agrave; biểu tượng của lối sống sang trọng v&agrave; đẳng cấp vớ', 12, 600, 'Biển', 0, 1, 1, '2.jpg', '3.jpg', '4.jpg'),
(6, 'Biệt thự Deluxe Residence Ocean', 'Uploads/choice3.jpg', 2, 3000000, '&lt;p&gt;H&amp;ograve;a m&amp;igrave;nh v&amp;agrave;o kh&amp;ocirc;ng gian kho&amp;aacute;ng đạt, cảm nhận gi&amp;oacute; biển m&amp;aacute;t l&amp;agrave;nh v&amp;agrave; ngắm nh&amp;igrave;n to&amp;agrave;n cảnh vịnh Lan Hạ ngay tại khu biệt thự tr&amp', 4, 52, 'Biển', 0, 1, 1, '4.jpg', 'choice3.jpg', '3.jpg'),
(7, 'Executive ocean view', 'room_img3.jpg', 2, 3000000, '&lt;p&gt;Thức giấc trong tiếng s&amp;oacute;ng biển du dương tại căn phòng hướng biển mang đến kh&amp;ocirc;ng gian nghỉ dưỡng tiện nghi v&amp;agrave; thoải m&amp;aacute;i với tầm nh&amp;igrave;n ra vịnh Lan Hạ.&lt;/p&gt;', 4, 50, 'Biển', 0, 1, 1, '3.jpg', '4.jpg', '5.jpg'),
(9, 'EMPERIAL SUITE', 'stay_room1.jpg', 3, 80000000, '&lt;p&gt;Tọa lạc tại vị tr&amp;iacute; ho&amp;agrave;ng kim của Flamingo C&amp;aacute;t B&amp;agrave; Beach Resort, tỏa m&amp;igrave;nh giữa miền sơn thủy, biệt thự tổng thống Emperial Suite sở hữu 3 mặt hưởng trọn vẻ đẹp của vịnh Lan Hạ. Lố&lt;/p&gt;', 20, 850, 'N&uacute;i Biển', 5000000, 1, 1, '3.jpg', '2.jpg', '3.jpg'),
(11, 'Villa The Cloud&nbsp;', 'C.jpg', 2, 3000000, '&lt;p&gt;&lt;em&gt;Villa The Cloud&lt;/em&gt;&amp;nbsp;c&amp;ograve;n sở hữu một cầu thang được thiết kế v&amp;ocirc; c&amp;ugrave;ng duy&amp;ecirc;n d&amp;aacute;ng nối l&amp;ecirc;n ph&amp;ograve;ng ngủ ch&amp;iacute;nh, nơi c&amp;oacute; tầm nh&amp;amp', 6, 98, 'Biển', 2000000, 1, 1, '2.jpg', '4.jpg', '5.jpg'),
(13, 'Biệt thự Residence Ocean', 'A.jpg', 1, 1500000, '&lt;p&gt;Trải nghiệm phong c&amp;aacute;ch sống ho&amp;agrave;ng gia tại Royal Sky Suite - tuyệt t&amp;aacute;c biệt thự lơ lửng giữa trời xanh. Căn biệt thự hội tụ những tinh t&amp;uacute;y trong thiết kế, nội thất sang trọng đẳng cấp v&amp;agrave; c&amp', 12, 49, 'Biển', 0, 1, 1, '2.jpg', '3.jpg', '4.jpg'),
(24, 'Biệt thự v&agrave;ng anh', 'D.jpg', 2, 2500000, '&lt;p&gt;Tọa lạc tại một vị tr&amp;iacute; đắc địa b&amp;ecirc;n bờ biển, với kh&amp;ocirc;ng gian ngo&amp;agrave;i trời rộng lớn,&amp;nbsp;&lt;strong&gt;Villa The Cloud&lt;/strong&gt;&amp;nbsp;l&amp;agrave; một lựa chọn tuyệt vời cho những ai&amp;nbsp;đa', 10, 49, 'Biển', 2000000, 4, 1, 'choice3.jpg', '3.jpg', '4.jpg'),
(25, 'Biệt thự đ&aacute;m m&acirc;y', 'choice3.jpg', 2, 3500000, '&lt;p&gt;Nơi n&amp;agrave;y l&amp;agrave; điểm đến nghỉ dưỡng được nhiều du kh&amp;aacute;ch y&amp;ecirc;u th&amp;iacute;ch ở Bali nhờ thiết kế kiến tr&amp;uacute;c v&amp;agrave; nội thất độc đ&amp;aacute;o. Đ&amp;uacute;ng như t&amp;ecirc;n gọi của n&amp', 78, 49, 'Biển', 2000000, 2, 1, '2.jpg', '3.jpg', '4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `villa`
--
ALTER TABLE `villa`
  ADD PRIMARY KEY (`id_villa`),
  ADD KEY `villa_category_id` (`villa_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `villa`
--
ALTER TABLE `villa`
  MODIFY `id_villa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `villa`
--
ALTER TABLE `villa`
  ADD CONSTRAINT `villa_ibfk_1` FOREIGN KEY (`villa_category_id`) REFERENCES `villa_category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
