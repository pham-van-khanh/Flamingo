-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 09:41 AM
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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `contents` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `date_contacts` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `name`, `email`, `sdt`, `contents`, `date_contacts`, `status`) VALUES
(11, 'Trần Văn A', 'Thanh_Tung@gmail.com', 3533, 'Dịch vụ của bạn rất tuyệt vời t&ocirc;i rất h&agrave;i l&ograve;ng!', '2021-12-14', 0),
(12, 'T&ugrave;ng', 'Thanh_Tung@gmail.com', 1234567890, 'dfdsfsgber', '2021-12-14', 0),
(15, 'Trần Thanh Tung', 'Thanh_Tung@gmail.com', 234450505, 'Dịch vụ rất tuyệt vời', '2021-12-16', 0),
(19, 'Trần Thanh Tung', 'Thanh_Tung@gmail.com', 1234567890, 'okla', '2021-12-16', 0),
(20, 'Trần Thanh Tung', 'Thanh_Tung@gmail.com', 329019362, 'a', '2021-12-18', 0),
(21, 'Hiếu', 'trantungg9102002@gmail.com', 329019362, 'a', '2021-12-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customers` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(10) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customers`, `email`, `pass`, `sdt`, `full_name`, `img`, `address`, `status`) VALUES
(44, 'Thanh_adsadTung@gmail.com', '659ba8b27d41c6033d9c98203bccd2d0', 1111111111, 'Trần Thanh T&ugrave;ng', 'Uploads/7.jpg', '', 1),
(45, 'a@gmail.com', 'a@gmail.com', 12345667, 'Anh 2', 'Uploads/6.jpg', 'HN', 1),
(47, 'abcdxyz@gmail.com', '6fd861a9aab824804b6e5c2c640bfb76', 12345678, 'abcd&aacute;d', 'Uploads/7.jpg', '', 0),
(48, 'demo@gmail.com', '283960d02fefd0705b4d33fb5d3ee92c', 2147483647, 'demo2', 'Uploads/uwp1721625.jpeg', '', 0),
(49, 'demo1@gmail.com', '5c31bff251f7ae657d32f986bd65d240', 2147483647, 'demo1', 'Uploads/uwp1721625.jpeg', '', 1),
(50, 'a2@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 12345678, 'T&ugrave;ng', 'Uploads/uwp1721625.jpeg', 'sdsa', 0),
(52, 'Thanhsdsds_Tung@gmail.com', '3fa138364f7f4bf6d9e3b5bca3cfe3fe', 1111111111, 'Trần Thanh Tung', 'Uploads/7.jpg', '', 1),
(54, 'Thandsdsdh_Tung@gmail.com', 'a85374bf1064bcaefcc12033da51ee8c', 1111111111, 'Trần Thanh Tung', 'Uploads/7.jpg', '', 1),
(55, 'tranthanh_tung@fpt.edu.vn', '123', 353370505, 'Trần Thanh T&ugrave;ng1', 'Uploads/7.jpg', '&lt;p&gt;H&amp;agrave; Nội&lt;/p&gt;', 0),
(56, 'nguyenhieu@gmail.com', '12', 329019362, 'Hiếu', 'Uploads/mountains.jpg', 'ha tay', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` int(10) NOT NULL,
  `address` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_employee`, `name`, `email`, `pass`, `img`, `sdt`, `address`) VALUES
(7, 'Trần Thanh T&ugrave;ng', 'nhanvien1@gmail.com', '8ee29c1e73d717c8fda3b2501a37a70b', 'Uploads/6.jpg', 1111111111, '&lt;p&gt;nhanvien1@gmail.com&lt;/p&gt;'),
(9, 'Trần Thanh Tung', 'Thanh_Tung@gmail.com', '666ae23df3708e7edc69339c99ea693d', 'Uploads/7.jpg', 1111111111, '&lt;p&gt;dsad&lt;/p&gt;'),
(14, 'nhan vien', 'nhanvien2@gmail.com', 'd8cd14c49414764ebee87cc679e960a8', 'Uploads/morning.png', 234456733, '&lt;p&gt;hanoi&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `content` varchar(10000) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `title`, `img`, `content`) VALUES
(3, 'Flamingo C&aacute;t B&agrave; &ndash; &lsquo;thi&ecirc;n đường&rsquo; nghỉ dưỡng b&ecirc;n vịnh Lan Hạ', 'Uploads/3.jpg', '&lt;div class=&quot;bold ArticleLead&quot;&gt;\r\n&lt;p class=&quot;t-j&quot;&gt;Flamingo C&amp;aacute;t B&amp;agrave;, ng&amp;ocirc;i nh&amp;agrave; thứ hai với khung cảnh biển &amp;ndash; trời &amp;ndash; c&amp;acirc;y xanh bao quanh, song h&amp;agrave;nh'),
(10, 'Flamingo khởi c&ocirc;ng Tổ hợp giải tr&iacute; vui choi', '4.jpg', '&lt;p&gt;&lt;strong&gt;Dự &amp;aacute;n Flamingo Hải Tiến được Tập đo&amp;agrave;n Flamingo ch&amp;iacute;nh thức khởi c&amp;ocirc;ng ng&amp;agrave;y 16/10 tại Hoằng H&amp;oacute;a &amp;ndash; Thanh H&amp;oacute;a, đ&amp;aacute;nh dấu cột mốc quan trọng trong h&amp;agrave;nh tr&amp;igrave;nh khẳng định thương hiệu của chủ đầu tư sau th&amp;agrave;nh c&amp;ocirc;ng của h&amp;agrave;ng loạt dự &amp;aacute;n tại Đại Lải (Vĩnh Ph&amp;uacute;c) v&amp;agrave; C&amp;aacute;t B&amp;agrave; (Hải Ph&amp;ograve;ng).&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;Chương tr&amp;igrave;nh c&amp;oacute; sự tham dự của đại diện Ban l&amp;atilde;nh đạo Tỉnh uỷ Thanh H&amp;oacute;a, HĐND, UBND, c&amp;aacute;c sở ban ng&amp;agrave;nh cấp tỉnh, cấp ủy v&amp;agrave; ch&amp;iacute;nh quyền huyện Hoằng Ho&amp;aacute;.&lt;/p&gt;\r\n&lt;p&gt;Flamingo Hải Tiến l&amp;agrave; dự &amp;aacute;n đầu ti&amp;ecirc;n Flamingo triển khai tại Thanh H&amp;oacute;a. Theo đ&amp;oacute;, si&amp;ecirc;u dự &amp;aacute;n đẳng cấp 5 sao &amp;ndash; tr&amp;aacute;i tim tiệc t&amp;ugrave;ng của Thanh H&amp;oacute;a sẽ được ph&amp;aacute;t triển theo m&amp;ocirc; h&amp;igrave;nh Ibiza với những tuyến phố mua sắm &amp;ndash; giải tr&amp;iacute; &amp;ndash; ẩm thực d&amp;agrave;i h&amp;agrave;ng c&amp;acirc;y số. Dự &amp;aacute;n sở hữu tổ hợp hơn 50 tiện &amp;iacute;ch nổi bật như c&amp;ocirc;ng vi&amp;ecirc;n &amp;aacute;nh s&amp;aacute;ng, phố đi bộ, c&amp;ocirc;ng vi&amp;ecirc;n vui chơi giải tr&amp;iacute; s&amp;ocirc;i động, 7 ph&amp;acirc;n khu tiện &amp;iacute;ch gồm thi&amp;ecirc;n đường mua sắm, khu check-in c&amp;ocirc;ng nghệ Hologram 7D, phố ẩm thực&amp;hellip;, hơn 400 sản phẩm shophouse v&amp;agrave; boutique hotel độc đ&amp;aacute;o. Đặc biệt, trung t&amp;acirc;m kho&amp;aacute;ng n&amp;oacute;ng Onsen v&amp;agrave; kiến tr&amp;uacute;c &amp;ldquo;Forest In The Sky &amp;ndash; rừng xanh tr&amp;ecirc;n trời cao&amp;rdquo; &amp;ndash; một đẳng cấp kh&amp;aacute;c biệt m&amp;agrave; Flamingo Holding Group đ&amp;atilde; d&amp;agrave;y c&amp;ocirc;ng kiến tạo hứa hẹn mang đến cho Hải Tiến một diện mạo mới, trở th&amp;agrave;nh t&amp;acirc;m điểm thu h&amp;uacute;t kh&amp;aacute;ch du lịch suốt 4 m&amp;ugrave;a.&lt;/p&gt;\r\n&lt;p&gt;Tận dụng ưu thế d&amp;acirc;n số đ&amp;ocirc;ng, tiềm năng du lịch lớn, đường bờ biển d&amp;agrave;i, dự &amp;aacute;n n&amp;agrave;y nằm trong chiến lược ph&amp;aacute;t triển bền vững c&amp;ugrave;ng kinh tế địa phương đồng thời khẳng định sự bứt ph&amp;aacute; mạnh mẽ của thương hiệu Flamingo tới những miền đất mới.&lt;/p&gt;\r\n&lt;p&gt;Ph&amp;aacute;t biểu tại lễ khởi c&amp;ocirc;ng, &amp;ocirc;ng Mai Xu&amp;acirc;n Li&amp;ecirc;m &amp;ndash; UV Ban Thường vụ Tỉnh ủy, Ph&amp;oacute; Chủ tịch UBND Tỉnh Thanh H&amp;oacute;a đ&amp;aacute;nh gi&amp;aacute; cao uy t&amp;iacute;n, sự chủ động, nỗ lực của Tập đo&amp;agrave;n Flamingo đồng thời khẳng định: &amp;ldquo;Khu du lịch sinh th&amp;aacute;i nghỉ dưỡng cao cấp Flamingo Hải Tiến với hệ thống hạ tầng, cảnh quan đồng bộ, hiện đại, dịch vụ đẳng cấp thế giới, dự kiến sẽ tạo ra sự đột ph&amp;aacute; về du lịch nghỉ dưỡng cho huyện Hoằng H&amp;oacute;a n&amp;oacute;i ri&amp;ecirc;ng v&amp;agrave; tỉnh Thanh H&amp;oacute;a n&amp;oacute;i chung, đ&amp;aacute;p ứng nhu cầu ph&amp;acirc;n kh&amp;uacute;c du lịch nghỉ dưỡng cao cấp cho du kh&amp;aacute;ch; đồng thời, tạo việc l&amp;agrave;m trực tiếp v&amp;agrave; thu nhập ổn định cho h&amp;agrave;ng ng&amp;agrave;n lao động, tăng thu cho ng&amp;acirc;n s&amp;aacute;ch nh&amp;agrave; nước.&amp;rdquo;&lt;/p&gt;\r\n&lt;figure class=&quot;easyimage easyimage-full&quot;&gt;\r\n&lt;figcaption&gt;&amp;Ocirc;ng Mai Xu&amp;acirc;n Li&amp;ecirc;m &amp;ndash; UV Ban Thường vụ Tỉnh ủy, Ph&amp;oacute; Chủ tịch UBND Tỉnh Thanh H&amp;oacute;a nhấn mạnh tầm quan trọng của dự &amp;aacute;n Flamingo Hải Tiến đối với sự ph&amp;aacute;t triển kinh tế tỉnh.&lt;/figcaption&gt;\r\n&lt;/figure&gt;\r\n&lt;p&gt;C&amp;oacute; tr&amp;ecirc;n 25 năm ph&amp;aacute;t triển với tầm nh&amp;igrave;n trở th&amp;agrave;nh nh&amp;agrave; đầu tư h&amp;agrave;ng đầu Việt Nam tr&amp;ecirc;n c&amp;aacute;c lĩnh vực: bất động sản, nghỉ dưỡng, du lịch, dịch vụ, kiến tr&amp;uacute;c&amp;hellip;, Flamingo mong muốn đem đến Thanh H&amp;oacute;a những sản phẩm v&amp;agrave; dịch vụ tốt nhất, để kh&amp;aacute;ch h&amp;agrave;ng c&amp;oacute; những trải nghiệm sống v&amp;agrave; cơ hội đầu tư kinh doanh hấp dẫn nhất. Sau một thời gian d&amp;agrave;i thị trường du lịch nghỉ dưỡng trầm lắng, lễ khởi c&amp;ocirc;ng dự &amp;aacute;n Flamingo Hải Tiến đ&amp;atilde; mang đến sức sống mới cho v&amp;ugrave;ng đất đầy tiềm năng n&amp;agrave;y. Chia sẻ về dự &amp;aacute;n, &amp;ocirc;ng Trần Trọng B&amp;igrave;nh &amp;ndash; Chủ tịch Hội đồng Quản trị Flamingo Holding Group nhấn mạnh: &amp;ldquo;Flamingo Hải Tiến l&amp;agrave; Tổ hợp giải tr&amp;iacute; &amp;ndash; du lịch &amp;ndash; nghỉ dưỡng &amp;ndash; thể thao biển đầu ti&amp;ecirc;n tại Thanh H&amp;oacute;a. Kh&amp;ocirc;ng chỉ tạo n&amp;ecirc;n kh&amp;ocirc;ng gian sống đẳng cấp tại Hải Tiến, kh&amp;aacute;t vọng của Flamingo l&amp;agrave; truyền tải những gi&amp;aacute; trị của t&amp;igrave;nh y&amp;ecirc;u, nghệ thuật, kiến tr&amp;uacute;c, phong c&amp;aacute;ch, để việc trải nghiệm hay sở hữu mỗi sản phẩm ch&amp;uacute;ng t&amp;ocirc;i cung cấp trở th&amp;agrave;nh niềm tự h&amp;agrave;o của mỗi kh&amp;aacute;ch h&amp;agrave;ng.&amp;rdquo;&lt;/p&gt;\r\n&lt;p&gt;Cũng theo đại diện Flamingo, sự ra đời của Flamingo Hải Tiến v&amp;agrave; c&amp;aacute;c dự &amp;aacute;n kh&amp;aacute;c của Flamingo trong tương lai sẽ tạo n&amp;ecirc;n cơ hội việc l&amp;agrave;m cho lao động địa phương, l&amp;agrave; cơ sở đ&amp;agrave;o tạo nh&amp;acirc;n sự cho ng&amp;agrave;nh du lịch &amp;ndash; kh&amp;aacute;ch sạn tr&amp;ecirc;n cả nước n&amp;oacute;i chung v&amp;agrave; địa b&amp;agrave;n Thanh Ho&amp;aacute; n&amp;oacute;i ri&amp;ecirc;ng.&lt;/p&gt;\r\n&lt;figure class=&quot;easyimage easyimage-full&quot;&gt;\r\n&lt;figcaption&gt;Dự &amp;aacute;n Flamingo Hải Tiến c&amp;oacute; tổng mức đầu tư 3.350 tỷ đồng bao gồm c&amp;aacute;c c&amp;ocirc;ng tr&amp;igrave;nh nghỉ dưỡng cao tầng v&amp;agrave; thấp tầng, c&amp;aacute;c Trung t&amp;acirc;m dịch vụ nghỉ dưỡng ti&amp;ecirc;u chuẩn 5 sao.&lt;/figcaption&gt;\r\n&lt;/figure&gt;'),
(11, 'HANOIREDTOURS &ldquo;G&Acirc;Y SỐC&rdquo; VỚI GẦN 23 TỶ ĐỒNG THU VỀ SAU VITM 2019', 'Uploads/uudai10.jpg', '&lt;ul&gt;\r\n&lt;li&gt;Trong sự kiện k&amp;iacute;ch cầu du lịch lớn nhất năm n&amp;agrave;y, Flamingo Group đ&amp;atilde; thu về được những kết quả đ&amp;aacute;ng tự h&amp;agrave;o, khẳng định vị thế dẫn đầu của một doanh nghiệp lớn, c&amp;oacute; uy t&amp;iacute;n tại thị trường Việt Nam. Cụ thể, HanoiRedtours, đơn vị lữ h&amp;agrave;nh thuộc Tập đo&amp;agrave;n đ&amp;atilde; gi&amp;agrave;nh được thắng lợi lớn, mang về doanh số gần 23 tỷ đồng (đạt 157% so với hội chợ 2018) th&amp;ocirc;ng qua việc b&amp;aacute;n tour du lịch trong v&amp;agrave; ngo&amp;agrave;i nước. C&amp;ugrave;ng với đ&amp;oacute; l&amp;agrave; h&amp;agrave;ng ngh&amp;igrave;n voucher nghỉ dưỡng tại Flamingo Đại Lải Resort đến tay kh&amp;aacute;ch h&amp;agrave;ng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Tại VITM 2019, Flamingo Group c&amp;ograve;n g&amp;acirc;y ấn tượng bởi &amp;ldquo;cơn mưa&amp;rdquo; giải thưởng do Hiệp hội Du lịch Việt Nam trao tặng, như &amp;ldquo;Điểm du lịch sinh th&amp;aacute;i ti&amp;ecirc;u biểu 2018 &amp;ndash; Flamingo Đại Lải Resort&amp;rdquo;, &amp;ldquo;Gian h&amp;agrave;ng c&amp;oacute; quy m&amp;ocirc; lớn nhất v&amp;agrave; ấn tượng nhất VITM 2019&amp;rdquo;, &amp;ldquo;Doanh nghiệp tham gia k&amp;iacute;ch cầu hiệu quả nhất &amp;ndash; HanoiRedtours&amp;rdquo;, &amp;ldquo;Gi&amp;aacute;m đốc lữ h&amp;agrave;nh ti&amp;ecirc;u biểu&amp;rdquo; giải thưởng d&amp;agrave;nh cho &amp;ocirc;ng Nguyễn C&amp;ocirc;ng Hoan &amp;ndash; TGĐ HanoiRedtours&amp;hellip; gi&amp;uacute;p thương hiệu Tập đo&amp;agrave;n một lần nữa được khẳng định tại hội chợ mang tầm khu vực n&amp;agrave;y.&lt;/li&gt;\r\n&lt;li&gt;Nổi bật nhất trong hội chợ năm nay ch&amp;iacute;nh l&amp;agrave; gian h&amp;agrave;ng Flamingo Group, với diện t&amp;iacute;ch 126 m2, được thiết kế c&amp;ocirc;ng phu, ho&amp;agrave;nh tr&amp;aacute;ng, m&amp;ocirc; phỏng theo kiến tr&amp;uacute;c The Legend, c&amp;ocirc;ng tr&amp;igrave;nh đặc sắc nhất của Flamingo Đại Lải Resort, sắp được khởi c&amp;ocirc;ng.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Đ&amp;acirc;y cũng l&amp;agrave; &amp;ldquo;điểm hẹn văn h&amp;oacute;a&amp;rdquo; được lựa chọn l&amp;agrave;m s&amp;acirc;n khấu tổ chức c&amp;aacute;c hoạt động giao lưu như m&amp;uacute;a truyền thống Malaysia, nhảy hiện đại K-Pop. C&amp;aacute;c chương tr&amp;igrave;nh bốc thăm tr&amp;uacute;ng thưởng s&amp;ocirc;i động với phần qu&amp;agrave; l&amp;agrave; đ&amp;ecirc;m nghỉ miễn ph&amp;iacute; tại Flamingo Đại Lải Resort, t&amp;uacute;i tote, &amp;aacute;o ph&amp;ocirc;ng, đồ lưu niệm độc lạ&amp;hellip; biến gian h&amp;agrave;ng Flamingo Group trở th&amp;agrave;nh nơi &amp;ldquo;n&amp;oacute;ng&amp;rdquo; nhất trong hội chợ năm nay.&lt;/li&gt;\r\n&lt;li&gt;C&amp;ugrave;ng với đ&amp;oacute;, Flamingo Group v&amp;agrave; c&amp;aacute;c đơn vị th&amp;agrave;nh vi&amp;ecirc;n đ&amp;atilde; tung ra h&amp;agrave;ng ng&amp;agrave;n ưu đ&amp;atilde;i, giảm gi&amp;aacute; s&amp;acirc;u kỷ lục l&amp;ecirc;n tới 80% cho c&amp;aacute;c tour kh&amp;aacute;m ph&amp;aacute; thi&amp;ecirc;n đường du lịch, đ&amp;ecirc;m nghỉ dưỡng đẳng cấp tại resort 5 sao&amp;hellip;, thu h&amp;uacute;t h&amp;agrave;ng ngh&amp;igrave;n lượt kh&amp;aacute;ch gh&amp;eacute; thăm mỗi ng&amp;agrave;y.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;Gian h&amp;agrave;ng đẹp, lu&amp;ocirc;n s&amp;ocirc;i động, n&amp;aacute;o nhiệt của Flamingo đ&amp;atilde; tạo n&amp;ecirc;n sự ch&amp;uacute; &amp;yacute; đặc biệt với b&amp;aacute;o giới, nhờ đ&amp;oacute; những h&amp;igrave;nh ảnh ấn tượng về gian h&amp;agrave;ng phủ k&amp;iacute;n tr&amp;ecirc;n c&amp;aacute;c phương tiện truyền th&amp;ocirc;ng như Đ&amp;agrave;i truyền h&amp;igrave;nh Việt Nam, Đ&amp;agrave;i truyền h&amp;igrave;nh H&amp;agrave; Nội, c&amp;aacute;c trang b&amp;aacute;o, th&amp;ocirc;ng tin điện tử uy t&amp;iacute;n h&amp;agrave;ng đầu cả nước như D&amp;acirc;n tr&amp;iacute;, VNExpress, Zing, B&amp;aacute;o văn h&amp;oacute;a, Kinh tế đ&amp;ocirc; thị&amp;hellip;&lt;/p&gt;'),
(12, 'Kh&aacute;m ph&aacute; v&ugrave;ng đất tươi đẹp Flamingo c&ugrave;ng h&agrave;nh tr&igrave;nh xanh', 'Uploads/cuoi.jpg', '&lt;p&gt;Để phục vụ tốt hơn cho du kh&amp;aacute;ch cũng như cư d&amp;acirc;n, Flamingo đ&amp;atilde; cho triển khai dự &amp;aacute;n x&amp;acirc;y dựng tuyến xe bu&amp;yacute;t nội khu v&amp;agrave; bến xe bu&amp;yacute;t xanh ngay trong resort. Với 16 điểm chờ, tuyến xe bu&amp;yacute;t n&amp;agrave;y kh&amp;ocirc;ng chỉ gi&amp;uacute;p du kh&amp;aacute;ch thuận tiện di chuyển giữa c&amp;aacute;c địa điểm tiện &amp;iacute;ch m&amp;agrave; c&amp;ograve;n mang đến c&amp;aacute;i nh&amp;igrave;n văn minh, hiện đại v&amp;agrave; tăng mỹ quan cho khu resort.&lt;br /&gt;&amp;Yacute; thức được tầm quan trọng của việc đưa sản phẩm xanh, nhi&amp;ecirc;n liệu sạch v&amp;agrave;o việc phục vụ h&amp;agrave;nh kh&amp;aacute;ch, cư d&amp;acirc;n, Flamingo Đại Lải Resort, việc x&amp;acirc;y dựng tuyến xe bu&amp;yacute;t nội khu v&amp;agrave; bến xe bu&amp;yacute;t xanh, khởi đầu một bước ngoặt quan trọng trong việc ph&amp;aacute;t triển hạ tầng giao th&amp;ocirc;ng, gia tăng tiện &amp;iacute;ch, n&amp;acirc;ng cao chất lượng dịch vụ. Từ đ&amp;acirc;y việc đưa &amp;ndash; đ&amp;oacute;n cư d&amp;acirc;n sẽ thuận lợi, tiện nghi v&amp;agrave; an to&amp;agrave;n hơn bao giờ hết.&lt;/p&gt;\r\n&lt;p&gt;&lt;img class=&quot;alignnone size-full wp-image-340&quot; src=&quot;https://bds.flamingogroup.vn/wp-content/uploads/2019/11/14022097_1075709392483063_7102437688530977467_n1.jpg&quot; alt=&quot;&quot; width=&quot;720&quot; height=&quot;960&quot; loading=&quot;lazy&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;Với uy t&amp;iacute;n của một &amp;ldquo;chủ đầu tư xanh&amp;rdquo;, Flamingo lu&amp;ocirc;n nhận thức r&amp;otilde; được tầm quan trọng của việc lu&amp;acirc;n chuyển h&amp;agrave;nh kh&amp;aacute;ch c&amp;ocirc;ng cộng phải gắn liền với việc bảo vệ m&amp;ocirc;i trường sống cho người cư d&amp;acirc;n. Do đ&amp;oacute;, xe được sử dụng để vận chuyển du kh&amp;aacute;ch sẽ l&amp;agrave; xe điện hay gọi c&amp;aacute;ch kh&amp;aacute;c l&amp;agrave;: &amp;ldquo;xe kh&amp;ocirc;ng kh&amp;oacute;i&amp;rdquo;, &amp;ldquo;phương tiện xanh&amp;rdquo;. C&amp;aacute;ch thức giao th&amp;ocirc;ng th&amp;acirc;n thiện với m&amp;ocirc;i trường v&amp;agrave; th&amp;acirc;n thiện với con người n&amp;agrave;y sẽ l&amp;agrave; h&amp;igrave;nh thức di chuyển chủ yếu của du kh&amp;aacute;ch v&amp;agrave; cư d&amp;acirc;n Flamingo nhằm hướng đến x&amp;acirc;y dựng một khu nghỉ dưỡng sinh th&amp;aacute;i cao cấp n&amp;oacute;i kh&amp;ocirc;ng với kh&amp;oacute;i bụi, ồn &amp;agrave;o cũng như c&amp;aacute;c nguy cơ g&amp;acirc;y ra &amp;ocirc; nhiễm m&amp;ocirc;i trường.&lt;/p&gt;\r\n&lt;p&gt;&lt;img class=&quot;alignnone size-full wp-image-342&quot; src=&quot;https://bds.flamingogroup.vn/wp-content/uploads/2019/11/HVG_4980-1030x687.jpg&quot; alt=&quot;&quot; width=&quot;1030&quot; height=&quot;687&quot; loading=&quot;lazy&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;Bến xe bu&amp;yacute;t xanh được thiết kế theo phong c&amp;aacute;ch mở, hiện đại, kết cấu vững chắc v&amp;agrave; th&amp;acirc;n thiện với người sử dụng. Điểm nhấn đặc biệt của bến xe bu&amp;yacute;t l&amp;agrave; được trồng c&amp;aacute;c loại c&amp;acirc;y leo c&amp;oacute; hoa nhiều m&amp;agrave;u sắc kh&amp;aacute;c nhau ở phần khung,&amp;nbsp; vừa tạo kh&amp;ocirc;ng gian xanh m&amp;aacute;t, vừa tạo cảnh quan. Mong muốn mang đến cho người d&amp;ugrave;ng cảm gi&amp;aacute;c tiện lợi v&amp;agrave; thoải m&amp;aacute;i nhất, tại điểm chờ sẽ được bố tr&amp;iacute; những chiếc ghế nghỉ v&amp;agrave; m&amp;aacute;i che nắng, mưa. Trong thời gian ngồi chờ xe bu&amp;yacute;t, du kh&amp;aacute;ch c&amp;oacute; thể ngắm cảnh thi&amp;ecirc;n nhi&amp;ecirc;n, tận hưởng kh&amp;ocirc;ng kh&amp;iacute; trong l&amp;agrave;nh, tho&amp;aacute;ng đ&amp;atilde;ng, thoải m&amp;aacute;i đọc một cuốn s&amp;aacute;ch hay tạp ch&amp;iacute; trong thời gian chờ xe tới. Từ đ&amp;acirc;y, gi&amp;acirc;y ph&amp;uacute;t du kh&amp;aacute;ch chờ xe sẽ l&amp;agrave; những gi&amp;acirc;y ph&amp;uacute;t nghỉ ngơi, trải nghiệm chứ kh&amp;ocirc;ng phải l&amp;agrave; cảm gi&amp;aacute;c buồn ch&amp;aacute;n hay mệt mỏi.&lt;/p&gt;\r\n&lt;p&gt;&lt;img class=&quot;alignnone size-full wp-image-341&quot; src=&quot;https://bds.flamingogroup.vn/wp-content/uploads/2019/11/DSC_2371.jpg&quot; alt=&quot;&quot; width=&quot;843&quot; height=&quot;553&quot; loading=&quot;lazy&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;Theo kế hoạch, thiết kế chi tiết của dự &amp;aacute;n sẽ được triển khai từ đầu th&amp;aacute;ng 8/2016 đến cuối th&amp;aacute;ng 8/2016, sau khi ho&amp;agrave;n th&amp;agrave;nh &amp;ldquo;xe bus xanh&amp;rdquo; sẽ h&amp;igrave;nh th&amp;agrave;nh n&amp;ecirc;n mạng lưới chuy&amp;ecirc;n chở h&amp;agrave;nh kh&amp;aacute;ch tại nội khu resort, 16 điểm dừng xe bus sẽ được bố tr&amp;iacute; tại c&amp;aacute;c địa điểm thu h&amp;uacute;t du kh&amp;aacute;ch như: B&amp;atilde;i biển, khu vui chơi trẻ em, khu tiện &amp;iacute;ch, hay ở mỗi khu biệt thự&amp;hellip;Việc bố tr&amp;iacute; hết sức hợp l&amp;yacute; n&amp;agrave;y sẽ gi&amp;uacute;p du kh&amp;aacute;ch kh&amp;ocirc;ng phải di chuyển xa, kh&amp;ocirc;ng mất thời gian chờ l&amp;acirc;u lại vừa c&amp;oacute; thể ngắm cảnh, chụp ảnh lưu niệm trong thời gian chờ xe.&lt;/p&gt;\r\n&lt;p&gt;&lt;img class=&quot;alignnone size-full wp-image-339&quot; src=&quot;https://bds.flamingogroup.vn/wp-content/uploads/2019/11/HVG_4987-1030x687.jpg&quot; alt=&quot;&quot; width=&quot;1030&quot; height=&quot;687&quot; loading=&quot;lazy&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;Tuyến xe bu&amp;yacute;t v&amp;agrave; bến xe bu&amp;yacute;t xanh nội khu ra đời l&amp;agrave; một minh chứng r&amp;otilde; n&amp;eacute;t cho sự quan t&amp;acirc;m tới từng nhu cầu nhỏ nhất của du kh&amp;aacute;ch v&amp;agrave; cư d&amp;acirc;n Flamingo của chủ đầu tư, Flamingo hy vọng rằng, tuyến xe bu&amp;yacute;t xanh n&amp;agrave;y c&amp;oacute; thể mang lại những lợi &amp;iacute;ch thực sự cho cộng đồng cư d&amp;acirc;n v&amp;agrave; du kh&amp;aacute;ch nghỉ dưỡng.&lt;/p&gt;'),
(14, 'Biệt Thự Forest-VIEW Ti&ecirc;u Chuẩn 5 Sao', 'Uploads/cuoi.jpg', '&lt;h2 style=&quot;font-weight: 500; text-align: center;&quot;&gt;&lt;strong&gt;Biệt Thự Forest-VIEW Ti&amp;ecirc;u Chuẩn 5 Sao - Nghỉ Dưỡng Ho&amp;agrave;n Hảo&lt;/strong&gt;&lt;/h2&gt;\r\n&lt;h2 style=&quot;font-weight: 500; text-align: center;&quot;&gt;&lt;br style=&quot;font-weight: 300;&quot; /&gt;&lt;img src=&quot;https://lh4.googleusercontent.com/-ApYiqEB1qYo/W_0dP-u6T1I/AAAAAAAAAJQ/UoM6FvwNkNMcA_uzN221cydVYVmlDUPywCLcBGAs/s640/42833650_687559524975425_4866050890982752256_o.jpg&quot; /&gt;&lt;/h2&gt;\r\n&lt;p style=&quot;font-weight: 300; text-align: center;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h2 style=&quot;font-weight: 500; text-align: center;&quot;&gt;&lt;span style=&quot;font-weight: 300;&quot;&gt;Forest Premium ch&amp;iacute;nh l&amp;agrave; một địa chỉ l&amp;atilde;ng mạn, quyến rũ cho những ai muốn thả m&amp;igrave;nh v&amp;agrave;o sự trong trẻo của thi&amp;ecirc;n nhi&amp;ecirc;n, cảm nhận sự thư th&amp;aacute;i, thăng hoa khi dạo chơi tr&amp;ecirc;n những vạt hoa lạc ti&amp;ecirc;n v&amp;agrave;ng rộ dưới ch&amp;acirc;n đồi Thiền, hay tr&amp;ecirc;n những c&amp;aacute;nh đồng hoa sắc m&amp;agrave;u, rừng th&amp;ocirc;ng ng&amp;agrave;o ngạt hương của khu Resort Flamingo Đại Lải.&lt;br /&gt;&lt;/span&gt;&lt;br style=&quot;font-weight: 300;&quot; /&gt;&lt;span style=&quot;font-weight: 300;&quot;&gt;Forest Resort với 42 Villas được thiết kế theo phong c&amp;aacute;ch kiến tr&amp;uacute;c đương đại với c&amp;aacute;c n&amp;eacute;t chấm ph&amp;aacute; tinh tế v&amp;agrave; g&amp;oacute;c cạnh, Forest&amp;nbsp; Villa quyến rũ soi m&amp;igrave;nh dưới mặt nước hồ Forest rộng lớn. Mỗi g&amp;oacute;c nh&amp;igrave;n tại đ&amp;acirc;y đều mở ra kh&amp;ocirc;ng gian ngo&amp;agrave;i trời với cảnh quan hồ tuyệt đẹp ph&amp;iacute;a trước v&amp;agrave; khu&amp;ocirc;n vi&amp;ecirc;n vườn rau xanh m&amp;aacute;t.&lt;/span&gt;&lt;br style=&quot;font-weight: 300;&quot; /&gt;&lt;img src=&quot;https://lh4.googleusercontent.com/-ywgXNwDtmBs/W_0dOhA0HVI/AAAAAAAAAJA/BdmUtr056SgkbMrutnKgT8S1U5l_guoyACLcBGAs/s640/42761288_687559511642093_3750550251014979584_o.jpg&quot; /&gt;&lt;/h2&gt;\r\n&lt;h3 style=&quot;font-weight: 500; text-align: center;&quot;&gt;** Tiện &amp;iacute;ch nổi bật:&lt;/h3&gt;\r\n&lt;h2 style=&quot;font-weight: 500; text-align: center;&quot;&gt;&lt;span style=&quot;font-weight: 300;&quot;&gt;Ph&amp;ograve;ng ngủ được thiết kế sang trọng, trang nh&amp;atilde;&lt;br /&gt;Ph&amp;ograve;ng tắm được b&amp;agrave;y tr&amp;iacute; trang nh&amp;atilde;, lịch sự, hiện đại v&amp;agrave; gần gũi với thi&amp;ecirc;n nhi&amp;ecirc;n&lt;/span&gt;&lt;br style=&quot;font-weight: 300;&quot; /&gt;&lt;span style=&quot;font-weight: 300;&quot;&gt;Xe đạp thể thao lu&amp;ocirc;n được bố tr&amp;iacute; ri&amp;ecirc;ng tại biệt thự&lt;/span&gt;&lt;br style=&quot;font-weight: 300;&quot; /&gt;&lt;span style=&quot;font-weight: 300;&quot;&gt;Khu phụ trợ đầy đủ tiện nghi sang trọng với bể bơi bốn m&amp;ugrave;a, ph&amp;ograve;ng x&amp;ocirc;ng hơi, quầy bar&amp;hellip;&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p style=&quot;font-weight: 300; text-align: center;&quot;&gt;&lt;em&gt;&lt;strong&gt;Xin được b&amp;aacute;o gi&amp;aacute; tham khảo như dưới đ&amp;acirc;y (&amp;aacute;p dụng cho 10 người lớn). C&amp;aacute;c bạn h&amp;atilde;y t&amp;igrave;m hiểu kỹ về biệt thự nh&amp;eacute;, v&amp;igrave; c&amp;oacute; nhiều biệt thự với trang bị kh&amp;aacute;c nhau, vị tr&amp;iacute; kh&amp;aacute;c nhau trong Flamingo.&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `reserver`
--

CREATE TABLE `reserver` (
  `id_reserver` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(3000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chờ xác nhận',
  `id_voucher` int(11) DEFAULT NULL,
  `number_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reserver`
--

INSERT INTO `reserver` (`id_reserver`, `id_customers`, `start_date`, `end_date`, `status`, `id_voucher`, `number_people`) VALUES
(177, 44, '2021-12-15', '2021-12-16', 'Hủy', 1, 2),
(180, 47, '2021-12-16', '2021-12-17', 'Đang hoạt động', 1, 2),
(183, 50, '2021-12-16', '2021-12-17', 'Hủy', 1, 2),
(184, 50, '2021-12-16', '2021-12-17', 'Hoàn thành', 1, 2),
(188, 56, '2021-12-19', '2021-12-21', 'Hoàn thành', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reserver_details`
--

CREATE TABLE `reserver_details` (
  `id_sd` int(11) NOT NULL,
  `reserve_id` int(11) NOT NULL,
  `villa_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reserver_details`
--

INSERT INTO `reserver_details` (`id_sd`, `reserve_id`, `villa_id`, `service_id`) VALUES
(214, 177, 2, 1),
(220, 183, 25, 1),
(221, 184, 25, 9),
(225, 188, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `name`, `email`, `pass`, `img`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `img`, `status`) VALUES
(1, 'hero.jpg', 0),
(2, 'hero3.jpg', 1),
(3, 'hero2.jpg', 1),
(4, 'hero3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `intro` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `villa` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `follow_me` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `intro`, `villa`, `experience`, `follow_me`) VALUES
(1, 'Flamingo là khu nghỉ dưỡng\r\nhiện đại hàng, đầu tại Việt Nam với tiêu trí đem đến cho người dùng trải\r\nnghiệm tốt nhất.', '', 'Ẩm thực', 'facebook'),
(2, '', '', 'Vui chơi nghệ thuật', 'Instagram'),
(3, '', '', 'Hổi thảo', 'Youtube');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`id`, `logo`, `status`) VALUES
(1, '1.jpg', 0),
(3, 'pinterest_board_photo.png', 0),
(13, 'Uploads/uwp1721625.jpeg', 1);

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
(5, 'Royal Executive Duplex', 'Uploads/choice1.jpg', 3, 5000000, '&lt;p&gt;Tọa lạc tr&amp;ecirc;n tầng cao nhất của t&amp;ograve;a nh&amp;agrave;, hội tụ mọi tinh hoa của thi&amp;ecirc;n nhi&amp;ecirc;n với tầm nh&amp;igrave;n to&amp;agrave;n cảnh vịnh biển thơ mộng, căn biệt thự tổng thống l&amp;agrave; biểu tượng của ', 12, 600, 'Biển', 0, 1, 1, '2.jpg', '3.jpg', '4.jpg'),
(6, 'Biệt thự Deluxe Residence Ocean', 'Uploads/choice3.jpg', 2, 3000000, '&lt;p&gt;H&amp;ograve;a m&amp;igrave;nh v&amp;agrave;o kh&amp;ocirc;ng gian kho&amp;aacute;ng đạt, cảm nhận gi&amp;oacute; biển m&amp;aacute;t l&amp;agrave;nh v&amp;agrave; ngắm nh&amp;igrave;n to&amp;agrave;n cảnh vịnh Lan Hạ ngay tại khu biệt thự tr&amp', 4, 52, 'Biển', 0, 1, 1, '4.jpg', 'choice3.jpg', '3.jpg'),
(7, 'Executive ocean view', 'room_img3.jpg', 2, 3000000, '&lt;p&gt;Thức giấc trong tiếng s&amp;oacute;ng biển du dương tại căn phòng hướng biển mang đến kh&amp;ocirc;ng gian nghỉ dưỡng tiện nghi v&amp;agrave; thoải m&amp;aacute;i với tầm nh&amp;igrave;n ra vịnh Lan Hạ.&lt;/p&gt;', 4, 50, 'Biển', 0, 1, 1, '3.jpg', '4.jpg', '5.jpg'),
(9, 'EMPERIAL SUITE', 'stay_room1.jpg', 3, 8000000, '&lt;p&gt;Tọa lạc tại vị tr&amp;iacute; ho&amp;agrave;ng kim của Flamingo C&amp;aacute;t B&amp;agrave; Beach Resort, tỏa m&amp;igrave;nh giữa miền sơn thủy, biệt thự tổng thống Emperial Suite sở hữu 3 mặt hưởng trọn vẻ đẹp của vịnh Lan Hạ. Lố&lt;/p&gt;', 20, 850, 'N&uacute;i Biển', 5000000, 1, 1, '3.jpg', '2.jpg', '3.jpg'),
(11, 'Villa The Cloud&nbsp;', 'C.jpg', 2, 3000000, '&lt;p&gt;&lt;em&gt;Villa The Cloud&lt;/em&gt;&amp;nbsp;c&amp;ograve;n sở hữu một cầu thang được thiết kế v&amp;ocirc; c&amp;ugrave;ng duy&amp;ecirc;n d&amp;aacute;ng nối l&amp;ecirc;n ph&amp;ograve;ng ngủ ch&amp;iacute;nh, nơi c&amp;oacute; tầm nh&amp;amp', 6, 98, 'Biển', 2000000, 1, 1, '2.jpg', '4.jpg', '5.jpg'),
(13, 'Biệt thự Residence Ocean', 'A.jpg', 1, 1500000, '&lt;p&gt;Trải nghiệm phong c&amp;aacute;ch sống ho&amp;agrave;ng gia tại Royal Sky Suite - tuyệt t&amp;aacute;c biệt thự lơ lửng giữa trời xanh. Căn biệt thự hội tụ những tinh t&amp;uacute;y trong thiết kế, nội thất sang trọng đẳng cấp v&amp;agrave; c&amp', 12, 49, 'Biển', 0, 1, 1, '2.jpg', '3.jpg', '4.jpg'),
(24, 'Biệt thự v&agrave;ng anh', 'D.jpg', 2, 2500000, '&lt;p&gt;Tọa lạc tại một vị tr&amp;iacute; đắc địa b&amp;ecirc;n bờ biển, với kh&amp;ocirc;ng gian ngo&amp;agrave;i trời rộng lớn,&amp;nbsp;&lt;strong&gt;Villa The Cloud&lt;/strong&gt;&amp;nbsp;l&amp;agrave; một lựa chọn tuyệt vời cho những ai&amp;nbsp;đa', 10, 49, 'Biển', 2000000, 4, 0, 'choice3.jpg', '3.jpg', '4.jpg'),
(25, 'Biệt thự đ&aacute;m m&acirc;y', 'choice3.jpg', 2, 3500000, '&lt;p&gt;Nơi n&amp;agrave;y l&amp;agrave; điểm đến nghỉ dưỡng được nhiều du kh&amp;aacute;ch y&amp;ecirc;u th&amp;iacute;ch ở Bali nhờ thiết kế kiến tr&amp;uacute;c v&amp;agrave; nội thất độc đ&amp;aacute;o. Đ&amp;uacute;ng như t&amp;ecirc;n gọi của n&amp', 78, 49, 'Biển', 2000000, 2, 1, '2.jpg', '3.jpg', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `villa_category`
--

CREATE TABLE `villa_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `villa_category`
--

INSERT INTO `villa_category` (`id`, `name`, `price`, `img`) VALUES
(1, 'Hotel', 999999, 'choice1.jpg'),
(2, 'Biệt thự tr&ecirc;n cao', 1900000, '3.jpg'),
(3, 'Biệt thự tổng thống', 3500000, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `villa_service`
--

CREATE TABLE `villa_service` (
  `id_villa_sv` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `villa_service`
--

INSERT INTO `villa_service` (`id_villa_sv`, `name`, `price`, `img`, `status`) VALUES
(1, 'N/A', 0, '', 0),
(9, 'Dịch vụ trọn g&oacute;i', 1000000, 'Uploads/uudai7.png', 1),
(17, 'spa', 1234, 'Uploads/morning.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `sales` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `title`, `description`, `sales`, `discount`, `img`, `status`) VALUES
(1, 'N/A', 'N/A', '0', '', '', 0),
(15, 'Ch&agrave;o xu&acirc;n 2022', '&lt;p&gt;Nh&amp;acirc;n dịp ch&amp;agrave;o xu&amp;acirc;n 2022 nhập m&amp;atilde;&amp;nbsp;&lt;strong&gt;pnzgagyaXuan02&lt;/strong&gt; để được giảm 50% cho mỗi căn ph&amp;ograve;ng&lt;/p&gt;', '50', 'pnzgagyaXuan02', 'Uploads/thiep-tet-2022-demo-3-chiasetainguyen614c48121c5b6.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customers`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`id_reserver`),
  ADD KEY `id_customers` (`id_customers`),
  ADD KEY `id_voucher` (`id_voucher`);

--
-- Indexes for table `reserver_details`
--
ALTER TABLE `reserver_details`
  ADD PRIMARY KEY (`id_sd`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `villa_id` (`villa_id`),
  ADD KEY `reserve_id` (`reserve_id`) USING BTREE;

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villa`
--
ALTER TABLE `villa`
  ADD PRIMARY KEY (`id_villa`),
  ADD KEY `villa_category_id` (`villa_category_id`);

--
-- Indexes for table `villa_category`
--
ALTER TABLE `villa_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villa_service`
--
ALTER TABLE `villa_service`
  ADD PRIMARY KEY (`id_villa_sv`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reserver`
--
ALTER TABLE `reserver`
  MODIFY `id_reserver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `reserver_details`
--
ALTER TABLE `reserver_details`
  MODIFY `id_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `villa`
--
ALTER TABLE `villa`
  MODIFY `id_villa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `villa_category`
--
ALTER TABLE `villa_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `villa_service`
--
ALTER TABLE `villa_service`
  MODIFY `id_villa_sv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`id_customers`) REFERENCES `customers` (`id_customers`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id_voucher`) ON DELETE CASCADE;

--
-- Constraints for table `reserver_details`
--
ALTER TABLE `reserver_details`
  ADD CONSTRAINT `reserver_details_ibfk_1` FOREIGN KEY (`reserve_id`) REFERENCES `reserver` (`id_reserver`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserver_details_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `villa_service` (`id_villa_sv`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserver_details_ibfk_3` FOREIGN KEY (`villa_id`) REFERENCES `villa` (`id_villa`);

--
-- Constraints for table `villa`
--
ALTER TABLE `villa`
  ADD CONSTRAINT `villa_ibfk_1` FOREIGN KEY (`villa_category_id`) REFERENCES `villa_category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
