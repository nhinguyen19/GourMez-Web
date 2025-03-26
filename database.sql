-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2025 at 03:04 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `bigdeal_service`
--

DROP TABLE IF EXISTS `bigdeal_service`;
CREATE TABLE IF NOT EXISTS `bigdeal_service` (
  `id` int NOT NULL,
  `food_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `booking date` datetime DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `birthday_service`
--

DROP TABLE IF EXISTS `birthday_service`;
CREATE TABLE IF NOT EXISTS `birthday_service` (
  `id` int NOT NULL,
  `food_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name_order_party` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `booking date` datetime DEFAULT NULL,
  `gender` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `food_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `food_id`, `quantity`) VALUES
(0, 4, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'Gà rán'),
(2, 'Burger'),
(3, 'Combo tiết kiệm'),
(4, 'Đồ ăn kèm'),
(5, 'Nước giải khát');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ResName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ResPhoneNumber` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `ResAddress` text COLLATE utf8mb4_general_ci NOT NULL,
  `ResEmail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `ResName`, `ResPhoneNumber`, `ResAddress`, `ResEmail`) VALUES
(1, 'Nhà hàng GourMéz', '0123456789', '47 Quang Trung, Phường 9, Đà Lạt, Lâm Đồng', 'gourmez@example.com'),
(2, 'Chi nhánh Hà Nội', '0987654321', '123 Trần Duy Hưng, Cầu Giấy, Hà Nội', 'hanoi@gourmez.com');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `discount_id` int NOT NULL,
  `name_discount` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qtt_of_dis` int DEFAULT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_news`
--

DROP TABLE IF EXISTS `discount_news`;
CREATE TABLE IF NOT EXISTS `discount_news` (
  `id` int NOT NULL,
  `discount_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount_news`
--

INSERT INTO `discount_news` (`id`, `discount_name`, `description`, `img`) VALUES
(1, 'GIẢM 15% CHO BURGER BÒ', '<p><strong>Từ ngày 19 tháng 5 năm 2024, cửa hàng GOURMEZ đang có chương trình khuyến mãi đặc biệt dành cho món burger bò. Khách hàng sẽ được hưởng giảm giá 15% khi mua burger bò tại cửa hàng.&nbsp;</strong></p><p>Món burger bò tại GOURMEZ được chế biến từ thịt bò tươi ngon, được gia vị và nấu nướng cẩn thận để mang đến hương vị thơm ngon và độ tươi ngọt của thịt. Burger được phục vụ kèm các loại rau, phô mai và các phụ gia khác để tạo nên một món ăn hoàn chỉnh và cân bằng. Với mức giảm giá 15%, khách hàng có thể thưởng thức trọn vẹn hương vị burger bò chất lượng cao tại GOURMEZ với mức giá hấp dẫn hơn. Đây là cơ hội tuyệt vời để thưởng thức món ăn yêu thích với giá ưu đãi.&nbsp;</p><p>Chương trình khuyến mãi này áp dụng cho các ngày trong tuần và không áp dụng đồng thời với các chương trình khuyến mãi khác. Vì số lượng có hạn, khách hàng nên đến sớm để đảm bảo có cơ hội thưởng thức món ăn này với giá khuyến mãi.</p>', 'ql_khuyenmai/uploads/Giảm giá (6).png'),
(2, 'TẶNG SALAD RAU CỦ CHO HÓA ĐƠN TRÊN 99K', ' Khi quý khách mua bất kỳ combo ăn nào với tổng giá trị 99.000 đồng trở lên, bạn sẽ được tặng ngay 1 salad rau củ miễn phí.\r\n\r\nSalad rau củ được chế biến từ các loại rau tươi, sạch, giàu vitamin và khoáng chất. Món salad này sẽ giúp bữa ăn của quý khách thêm phần cân bằng dinh dưỡng và tăng cường sức khỏe. Với hương vị thanh mát, salad rau củ sẽ là sự kết hợp hoàn hảo cùng các món chính trong combo.\r\n\r\nChương trình khuyến mãi này áp dụng cho cả khách hàng đến trực tiếp tại cửa hàng và khách hàng đặt món ăn để mang về. Chỉ cần thanh toán đơn hàng từ 99.000 đồng trở lên, quý khách sẽ được tặng ngay 1 salad rau củ miễn phí.\r\n\r\nĐừng bỏ lỡ cơ hội thưởng thức bữa ăn ngon miệng cùng món salad bổ dưỡng với mức giá ưu đãi này. Hãy đến ngay cửa hàng hoặc đặt hàng online để nhận ưu đãi hấp dẫn!', 'ql_khuyenmai/uploads/Giảm giá (7).png'),
(3, 'GÀ GIÒN TẶNG KÈM COMBO HẠNH PHÚC', '<p>Từ ngày <strong>19/5 - 31/5/2024</strong>, khi quý khách mua bất kỳ combo \"Hạnh Phúc\" nào tại cửa hàng hoặc đặt hàng giao tận nơi, sẽ được tặng kèm 1 miếng gà giòn hoàn toàn miễn phí.</p><p>&nbsp;Combo \"Hạnh Phúc\" bao gồm các món ăn đặc trưng của chúng tôi như burger, khoai tây chiên và nước uống. Đây là sự kết hợp hoàn hảo để tạo nên một bữa ăn đầy đủ dinh dưỡng và hấp dẫn về hương vị. Món gà giòn tặng kèm được chế biến từ thịt gà tươi ngon, được ướp gia vị và chiên giòn giòn. Kết hợp cùng combo \"Hạnh Phúc\", món gà giòn sẽ là sự bổ sung hoàn hảo, mang đến cho quý khách một bữa ăn đầy đủ dinh dưỡng và hương vị tuyệt vời. Chương trình khuyến mãi này áp dụng cho cả khách hàng đến trực tiếp tại cửa hàng và khách hàng đặt món ăn để giao tận nơi. Chỉ cần thanh toán combo \"Hạnh Phúc\", quý khách sẽ được tặng ngay 1 miếng gà giòn miễn phí.&nbsp;</p><p>Đừng bỏ lỡ cơ hội thưởng thức bữa ăn ngon miệng cùng món gà giòn bổ dưỡng với mức giá ưu đãi này. Hãy đến ngay cửa hàng hoặc đặt hàng online ', 'ql_khuyenmai/uploads/Giảm giá (8).png'),
(4, 'GIẢM 40% KHI MUA 5 MIẾNG GÀ SỐT MẮM TỎI', '<p>Từ ngày 1/6, cửa hàng đang áp dụng chương trình khuyến mãi hấp dẫn cho sản phẩm Miếng gà sốt mắm tỏi. Với mức giảm giá lên tới 40%, khách hàng sẽ được hưởng ưu đãi khi mua tối thiểu 5 miếng gà cùng với đi NHÓM 4 người trở lên. Cụ thể, khi mua 5 miếng gà sốt mắm tỏi, khách hàng sẽ được giảm 40% trên tổng giá trị đơn hàng. Ưu đãi này không thể kết hợp với các chương trình khuyến mãi khác đang diễn ra tại cửa hàng. Chương trình ưu đãi này có thời gian áp dụng từ ngày 1/6, tuy nhiên thời điểm kết thúc chưa được xác định. Khách hàng vui lòng liên hệ trực tiếp với cửa hàng để nắm bắt thông tin chi tiết và điều kiện áp dụng của chương trình khuyến mãi này.</p>', 'ql_khuyenmai/uploads/Giảm giá (10).png'),
(5, 'NHẬN DEAL SỐC TRI ÂN CHO KHÁCH HÀNG', '<p>Bạn hãy đến chi nhánh Gourmez nào đó bất kỳ gần bạn để được giảm ngay 30% trên tổng hóa đơn ( Dành cho nhóm bạn 4 người trở lên ).&nbsp;</p><p>Lưu ý chỉ áp dụng tại cửa hàng và để được áp dụng thì bạn cần đọc mã code “KM30” để nhân viên có thể áp dụng khuyến mãi nhé</p>', 'ql_khuyenmai/uploads/Giảm giá (11).png');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int NOT NULL,
  `cate_id` int DEFAULT NULL,
  `food_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `original_price` int DEFAULT NULL,
  `selling_price` int DEFAULT NULL,
  `small_descr` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trending` int DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `cate_id`, `food_name`, `original_price`, `selling_price`, `small_descr`, `trending`, `img`, `created_at`) VALUES
(1, 1, 'Gà sốt 8 vị cay', 119000, 119000, 'Gà sốt 8 vị cay “đốn tym” bạn bởi hương vị cay có 1-0-2, đó chính là nước sốt đặc biệt với sự hoà quyện của 8 loại ớt, tiêu lừng danh trên thế giới sánh quyện trên từng miếng gà giòn tươi.', NULL, '1715175115_Gacay8vi.1.jpg', '2025-03-25 08:33:20'),
(2, 1, 'Miếng gà giòn', 35000, 35000, 'Gà tươi được chiên giòn vàng, bên trong thịt mềm mại và ngọt ngào, tạo nên một trải nghiệm ẩm thực đậm đà và hấp dẫn.\r\n', NULL, '1715175206_kfc-fried-chicken-62e0ca.jpg', '2025-03-25 08:33:20'),
(3, 1, 'Cơm gà giòn', 45000, 45000, 'Cơm gà giòn là một sự kết hợp hoàn hảo giữa cơm trắng thơm ngon và miếng gà giòn rụm, tạo nên một trải nghiệm ẩm thực độc đáo và hấp dẫn.\r\n', NULL, '1715175305_cơm gà giòn.jpg', '2025-03-25 08:33:20'),
(4, 3, 'Combo 5 miếng gà ', 85000, 79000, 'Combo bao gồm 5 miếng gà không xương ăn kèm sốt mayonnaise và sốt tương ớt chua ngọt', NULL, '1715218746_Combo 5 miếng gà không xương.7.webp', '2025-03-25 08:33:20'),
(5, 3, 'Combo B', 220000, 220000, 'Combo bao gồm: 2 Miếng gà sốt bơ tỏi và thảo mộc, 2 Miếng gà có xương (lựa chọn vị cay/ không cay), 1 Món ăn kèm cỡ vừa tùy chọn (Bắp cải trộn/ Khoai tây nghiền/ Khoai tây chiên),2 Nước ngọt.\r\n\r\n', NULL, '1715175916_Combo_Gasotbotoi.3.png', '2025-03-25 08:33:20'),
(6, 3, 'Combo tiết kiệm', 65000, 65000, 'Combo bao gồm: 1 Bánh cuộn gà giòn không xương (lựa chọn vị cay/ không cay), 1 Khoai tây nghiền tiêu chuẩn, 1 Nước ngọt, 1 Tương ớt + 1 Tương cà.\r\n', NULL, '1715176014_Combo_Tietkiem.4.png', '2025-03-25 08:33:20'),
(7, 3, 'Combo hạnh phúc', 100000, 100000, 'Combo bao gồm 2 miếng gà giòn + 1 ly pepsi vừa + 1 phần khoai tây vừa + 1 bánh su kem.\r\n', NULL, '1715176289_Rectangle 57.png', '2025-03-25 08:33:20'),
(8, 3, 'Combo buổi trưa tiện lợi', 78000, 78000, 'Combo bao gồm mỳ ý sốt bò bằm + 1 ly coca size M + 1 miếng gà giòn.\r\n', NULL, '1715176366_combo buổi trưa tiện lợi.jpg', '2025-03-25 08:33:20'),
(9, 2, 'Burger Tex Supreme', 59000, 59000, 'Burger Tex Supreme ( lựa chọn vị cay/ không cay),1 Tương ớt + 1 Tương cà', NULL, '1715176587_BurgerTexSupreme.2.jpg', '2025-03-25 08:33:20'),
(10, 2, 'Burger gà chiên giòn', 45000, 45000, 'Burger với nhân gà chiên giòn rụm, ăn cùng salad, cà chua, đẫm sốt mayonnaise.\r\n', NULL, '1715176643_Burger Gà Chiên Giòn.6.webp', '2025-03-25 08:33:20'),
(11, 2, 'Burger tôm', 40000, 40000, 'Tôm tươi và giòn được chất lượng bọc trong chiếc bánh mì mềm mại, tạo nên một trải nghiệm ẩm thực đơn giản nhưng hấp dẫn.', NULL, '1715176698_Rectangle 45.png', '2025-03-25 08:33:20'),
(12, 2, 'Burger bò', 45000, 45000, 'Một chiếc burger bò được tạo nên từ các thành phần chính như bánh mì burger, thịt bò xay, rau sống và các loại gia vị, tạo nên một hòa quyện hương vị độc đáo.', NULL, '1715180294_burger bò.jpg', '2025-03-25 08:33:20'),
(13, 4, 'Mỳ ý sốt bò bằm', 45000, 45000, 'Mì ý sốt bò bằm thơm lừng được phủ bởi phô mai mozzarella.\r\n', NULL, '1715180342_Mì ý sốt bò bằm.8.webp', '2025-03-25 08:33:20'),
(14, 4, 'Khoai tây chiên Cajun', 35000, 29000, 'Khoai tây chiên giòn ăn cùng với gia vị Cajun thơm lừng.\r\n\r\n', NULL, '1715180425_Khoai tây chiên Cajun.5.png', '2025-03-25 08:33:20'),
(15, 4, 'Hotdog YumYum', 35000, 35000, 'Một thanh hotdog nóng hổi, bên trong có xúc xích thơm phức và mềm mại, được bọc trong lớp bánh mì mềm và mịn, cùng với các loại gia vị và sốt đặc trưng, tạo nên một trải nghiệm ẩm thực đơn giản nhưng vô cùng ngon miệng.\r\n', NULL, '1715180528_Rectangle 55.png', '2025-03-25 08:33:20'),
(16, 4, 'Khoai tây lắc BBQ', 25000, 25000, 'Món ăn là sự kết hợp hoàn hảo giữa lớp vỏ giòn giòn của khoai tây, được thấm đầy vị BBQ đậm đà và hấp dẫn. Mỗi miếng khoai tây khiến bạn cảm nhận được sự hòa quyện giữa vị ngọt, cay và hương thơm của gia vị BBQ, tạo nên một trải nghiệm ăn vặt độc đáo và t', NULL, '1715180587_khoai tây lắc bbq.jpg', '2025-03-25 08:33:20'),
(17, 4, 'Bánh xoài đào', 10000, 10000, 'Bánh được làm từ mousse xoài và đào, được bao bọc trong lớp bánh mousse nhẹ và mịn. Khi ăn sẽ cho cảm giác chua ngọt đầy hấp dẫn và thơm ngon.\r\n', NULL, '1715180658_bánh xoài đào.jpeg', '2025-03-25 08:33:20'),
(18, 4, 'Bánh tart trứng', 17000, 17000, 'Vỏ bánh tartlà một  lớp bánh mì ngọt, giòn mỏng và có cấu trúc hạt như vỏ bánh quy. Vỏ bánh này thường được làm từ bột mỳ, bơ, đường và một chút muối, tạo nên một hỗn hợp mềm mịn. ', NULL, '1715180783_banh-tart-trung.jpg', '2025-03-25 08:33:20'),
(19, 4, 'Salad rau củ', 37000, 37000, 'Món ăn bao gồm rau xà lách, dưa leo, cà chia, hành tím,ớt chuông, sốt mè rang, sốt mayonnaise.', NULL, '1715180852_Salad.jpg', '2025-03-25 08:33:20'),
(20, 5, 'Milo', 10000, 10000, 'Sản phẩm có hương vị thơm ngon và giàu dinh dưỡng với sự hòa quyện của cacao, sữa và lúa mạch.', NULL, '1715347844_Milo.jpg.webp', '2025-03-25 08:33:20'),
(21, 5, 'Pepsi', 10000, 10000, 'Sản phẩm từ thương hiệu nước ngọt Pepsi nổi tiếng toàn cầu với mùi vị thơm ngon với hỗn hợp hương tự nhiên cùng chất tạo ngọt tổng hợp, giúp xua tan cơn khát và cảm giác mệt mỏi.', NULL, '1715348048_Pepsi.jpg', '2025-03-25 08:33:20'),
(22, 1, 'Gà mắm tỏi', 35000, 35000, '<ul><li>Món gà mắm tỏi là sự kết hợp tinh tế giữa vị ngọt, thơm của gà và hương vị đậm đà của mắm tỏi.&nbsp;</li><li>Mắm tỏi, với hương vị đặc trưng của tỏi và hòa quyện với vị ngọt tự nhiên của gà, tạo ra một hòa quyện vị giác đặc biệt.</li></ul>', NULL, '1715501482_Gà mắm tỏi (1).png', '2025-03-25 08:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `food_for_service`
--

DROP TABLE IF EXISTS `food_for_service`;
CREATE TABLE IF NOT EXISTS `food_for_service` (
  `ID_food` int NOT NULL,
  `ID_service` int NOT NULL,
  `food_combo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_for_service`
--

INSERT INTO `food_for_service` (`ID_food`, `ID_service`, `food_combo`, `price`, `image`) VALUES
(1, 1, 'Combo A', 100000, '1717231125_combo1.png'),
(2, 1, 'Combo B', 150000, '1715313455_combo2.png'),
(3, 1, 'Combo C', 70000, '1715313471_combo3.png'),
(4, 2, 'Gà mắm tỏi', 25000, '1715313504_Gà mắm tỏi.png'),
(5, 2, 'Burger Tôm', 25000, '1715313534_Burgertom.png'),
(6, 2, 'Gà ngon', 15000, '1715787544_Combo 5 miếng gà không xương.7.webp'),
(7, 0, 'hdadhias', 900000, '1717604752_anhQMK.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `staff_id` int DEFAULT NULL,
  `shipper_id` int DEFAULT NULL,
  `discount_id` int DEFAULT NULL,
  `name_cus` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_order` datetime DEFAULT NULL,
  `status` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `payment_mode` int DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `origin_total_price` int DEFAULT NULL,
  `discount_total_price` int DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int NOT NULL,
  `food_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int NOT NULL,
  `service_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `small_descript` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `banner` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `service_name`, `small_descript`, `image`, `banner`) VALUES
(1, 'bán cá', ' Bạn đang phân vân không biết tổ chức sinh nhật như thế nào? Chuyện gì khó có Gourméz lo, Gourméz sẽ mang lại trải nghiệm tuyệt vời, thú vị, đáng nhớ dành cho bạn.', '1716916799_sinhnhat_icon.png', '1716916799_sn_banner.png'),
(2, 'Đơn hàng lớn', ' Để phục vụ sở thích quây quần cùng gia đình và bạn bè, chương trình chiết khấu hấp dẫn dành cho những đơn hàng lớn đã ra đời để đem đến những lựa chọn tiện lợi hơn cho bạn. Liên hệ ngay với cửa hàng gần nhất để được phục vụ.', '1716960096_iconbigdeal.png', '1716960096_banner_bigdeal.png');

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

DROP TABLE IF EXISTS `shipper`;
CREATE TABLE IF NOT EXISTS `shipper` (
  `shipper_id` int NOT NULL,
  `name_shipper` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`shipper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int NOT NULL,
  `name_staff` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE IF NOT EXISTS `tintuc` (
  `tintuc_id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `summary` mediumtext COLLATE utf8mb4_general_ci,
  `img_title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`tintuc_id`, `title`, `summary`, `img_title`, `description`) VALUES
(1, 'Khai Trương Cửa Hàng Mới', 'Chào mừng chi nhánh mới của Gà Rán Ngon tại Quận 1!', 'khai-truong.jpg', 'Chúng tôi rất vui mừng thông báo về sự kiện khai trương chi nhánh mới tại TP.HCM. Đến ngay để nhận ưu đãi hấp dẫn!'),
(2, 'Combo Siêu Tiết Kiệm', 'Thưởng thức gà rán giòn rụm với giá siêu hời!', 'combo-tiet-kiem.jpg', 'Hãy trải nghiệm combo đặc biệt chỉ từ 99.000đ với phần gà rán, khoai tây chiên và nước ngọt!'),
(3, 'Ưu Đãi Khách Hàng Thành Viên', 'Giảm ngay 20% cho thành viên thân thiết!', 'uu-dai-thanh-vien.jpg', 'Đăng ký thành viên ngay hôm nay để nhận ngay ưu đãi 20% cho mọi đơn hàng trên ứng dụng của chúng tôi.'),
(4, 'Giao Hàng Miễn Phí', 'Nhận ngay gà rán nóng hổi mà không lo phí ship.', 'giao-hang-mien-phi.jpg', 'Từ ngày 1/4 đến 30/4, chúng tôi miễn phí vận chuyển cho tất cả các đơn hàng trên 150.000đ. Đặt hàng ngay!'),
(5, 'Gà Cay Hàn Quốc - Hương Vị Mới', 'Thưởng thức gà cay sốt Hàn Quốc đặc biệt!', 'ga-cay-han-quoc.jpg', 'Bạn đã thử món gà cay Hàn Quốc của chúng tôi chưa? Với công thức sốt cay chuẩn vị, đảm bảo khiến bạn mê mẩn!'),
(6, 'Giảm 50% Khi Đặt Online', 'Đặt hàng qua web ngay để nhận ưu đãi!', 'giam-gia-50.jpg', 'Khuyến mãi lớn! Giảm ngay 50% khi đặt hàng qua website chính thức. Áp dụng cho tất cả các đơn hàng từ 200.000đ trở lên.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `verify_status` tinyint DEFAULT NULL,
  `role` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP,
  `reset_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL,
  `otp` int DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `user_name`, `email`, `phone`, `address`, `password`, `verify_status`, `role`, `created_at`, `last_updated`, `reset_token`, `reset_token_expiry`, `otp`) VALUES
(3, 'Dương Yến Nhi', 'dyn', 'duongyennhi270904@gmail.com', '0939883916', 'ktx khu b, đại học quốc gia', '$2y$10$pWsVL6Pei0FXOrFqGZ1Fveni/eQgzi5WYYBKMeglhqAXnqL5IXD0u', NULL, 0, '2025-03-26 21:26:28', '2025-03-26 21:31:22', '3813ea73ffb66c2b08c875cac7ab45776a35a9e28726b46bb378f51ee348f70a8602c2b389bcfed6911948cedd38554eadd9', '2025-03-26 22:54:34', 421330),
(4, 'Nguyễn Văn A', 'mii', 'nhiaccphu01@gmail.com', '0939883916', NULL, '$2y$10$739tfCrL.DsB36LPgFwhves6DLWoNP5.4eJPkHwP70vjkWWIxmUlS', NULL, 0, '2025-03-26 21:34:44', '2025-03-26 21:34:44', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
