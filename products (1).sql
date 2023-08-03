-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 08:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `state` int(100) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(20) NOT NULL,
  `original_price` int(20) NOT NULL,
  `quantity` int(255) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand`, `name`, `state`, `origin`, `details`, `price`, `original_price`, `quantity`, `image_01`, `image_02`, `image_03`, `tag`) VALUES
(5, 'Burberry', 'Quần Shorts Burberry Vintage Check Print Swim 8017295 Màu Nâu Size S', 99, 'Anh', 'lopis', 7900000, 79000000, 2, 'qshort1.jpg', 'qshort2.jpg', 'qshort3.jpg', 'quần short nam, burberry'),
(6, 'Lacoste', 'Áo Polo Lacoste Men’s Regular Fit Light Breathable Colorblock Piqué Polo PH7680 TX4 Phối Màu Size S', 98, '', 'Được làm từ chất vải cotton thoáng mát mang lại cảm giác thoải mái nhất cho người mặc. Form áo chuẩn đẹp từng đường kim mũi chỉ đảm bảo hài lòng ngay cả với khách hàng khó tính nhất', 2750000, 0, 3, 'ao1.jpg', 'ao2.jpg', 'ao3.jpg', 'áo sơ mi nam'),
(7, 'Versace', 'Áo Polo Nam Versace 74GAGT18CJ01T003 Màu Trắng Size S', 0, '', 'Được làm từ chất liệu vải cotton cao cấp, mang lại cảm giác thoải mái khi mặc. Form áo với các đường chỉ khâu vô cùng tỉ mỉ và chắc chắn hài lòng ngay cả với khách hàng khó tính', 4255000, 0, 1, '3_ao1.jpg', '3_ao2.jpg', '3_ao3.jpg', ''),
(8, 'Versace', 'Áo Sơ Mi Versace Jeans Couture Họa Tiết 72HAL2A1 NS114 G89 Màu Đen', 0, '', 'được làm từ chất liệu 100% cotton cao cấp, mang lại cảm giác thoải mái khi mặc. Form áo với các đường chỉ khâu vô cùng tỉ mỉ và chắc chắn hài lòng ngay cả với khách hàng khó tính', 9200000, 0, 4, '3_nu1.jpg', '3_nu2.jpg', '3_nu3.jpg', ''),
(9, 'Burberry', 'Áo Polo Nữ Burberry Black With Collar Check Camel Printed 8053654 Màu Đen', 0, '', ' là chiếc áo thời trang đến từ thương hiệu Burberry nổi tiếng của Anh. Áo có kiểu dáng trẻ trung hiện đại, cùng chất vải cao cấp, mang đến cảm giác thoải mái cho người mặc', 5000000, 0, 0, '2_nu1.jpg', '2_nu2.jpg', '2_nu3.jpg', ''),
(10, 'Lacoste', 'Áo Polo Nữ Lacoste Regular Fit Light Breathable Colorblock Piqué Polo PH7680 TX4', 0, '', 'Với chiếc áo thời trang này bạn có thể kết hợp với nhiều trang phục khác nhau để có set đồ thời trang', 2750000, 0, 0, 'nu1.jpg', 'nu2.jpg', 'nu3.jpg', ''),
(11, '', 'Áo Phông Nam Dolce & Gabbana D&G DG King Print T-Shirt G8KL0THH76P Phối Màu ', 0, '', 'Là sản phẩm thời trang đến từ thương hiệu Dolce & Gabbana nổi tiếng. Áo phông D&G thiết kế trẻ trung, được làm từ chất liệu cao cấp mang lại cảm giác thoải mái cho người mặc', 8050000, 0, 0, '1_aophongnam.jpg', '2_aophongnam.jpg', '3_aophongnam.jpg', ''),
(12, '', 'Áo Phông Nam Versace White Barocco Logo Printed Tshirt 1006974 1A04949 Màu Trắng', 0, '', 'với thiết kế thời trang, màu sắc trẻ trung, áo được làm từ chất liệu thoáng khí giúp bạn cảm thấy thoải mái khi mặc đi học hay tham gia các hoạt động thể thao', 6500000, 0, 0, '21_aophongnam.jpg', '22_aophongnam.jpg', '23_aophongnam.jpg', ''),
(13, '', ' Áo Phông Dior Cactus Jack Oversize 283J632A0752 Màu Trắng', 0, '', ' được làm từ cotton có khả năng thấm hút tốt mang lại cảm giác thoải mái cho người mặc. Form áo chuẩn đẹp, đường may tinh tế, tỉ mỉ từng chi tiết làm hài lòng ngay cả với khách hàng khó tính', 15800000, 0, 0, '31_aophongnam.jpg', '32_aophongnam.jpg', '33_aophongnam.jpg', ''),
(14, 'Gucci', 'Giày Thể Thao Gucci Off The Grid Sneakers Màu Xám Size 39.5', 0, 'Ý', 'giày, gucci', 12500000, 12500000, 1, 'giay1.jpg', 'giay2.jpg', 'giay3.jpg', ''),
(15, 'Gucci', 'Giày Thể Thao Gucci Off The Grid Sneakers Màu Xám Size', 0, 'Ý', 'Tốt', 12500000, 12500000, 1, 'giay1.jpg', 'giay2.jpg', 'giay3.jpg', 'giày nam, gucci');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
