-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 25, 2025 lúc 01:36 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bigdeal_service`
--

CREATE TABLE `bigdeal_service` (
  `id` int(11) NOT NULL,
  `food_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `booking date` datetime DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `birthday_service`
--

CREATE TABLE `birthday_service` (
  `id` int(11) NOT NULL,
  `food_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `customer_name` varchar(191) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `name_order_party` varchar(50) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `booking date` datetime DEFAULT NULL,
  `gender` varchar(3) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'Gà rán'),
(2, 'Burger'),
(3, 'Combo tiết kiệm'),
(4, 'Đồ ăn kèm'),
(5, 'Nước giải khát');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `ResName` varchar(255) NOT NULL,
  `ResPhoneNumber` varchar(20) NOT NULL,
  `ResAddress` text NOT NULL,
  `ResEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `ResName`, `ResPhoneNumber`, `ResAddress`, `ResEmail`) VALUES
(1, 'Nhà hàng GourMéz', '0123456789', '47 Quang Trung, Phường 9, Đà Lạt, Lâm Đồng', 'gourmez@example.com'),
(2, 'Chi nhánh Hà Nội', '0987654321', '123 Trần Duy Hưng, Cầu Giấy, Hà Nội', 'hanoi@gourmez.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `name_discount` varchar(255) DEFAULT NULL,
  `qtt_of_dis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_news`
--

CREATE TABLE `discount_news` (
  `id` int(4) NOT NULL,
  `discount_name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_news`
--

INSERT INTO `discount_news` (`id`, `discount_name`, `description`, `img`) VALUES
(1, 'GIẢM 15% CHO BURGER BÒ', '<p><strong>Từ ngày 19 tháng 5 năm 2024, cửa hàng GOURMEZ đang có chương trình khuyến mãi đặc biệt dành cho món burger bò. Khách hàng sẽ được hưởng giảm giá 15% khi mua burger bò tại cửa hàng.&nbsp;</strong></p><p>Món burger bò tại GOURMEZ được chế biến từ thịt bò tươi ngon, được gia vị và nấu nướng cẩn thận để mang đến hương vị thơm ngon và độ tươi ngọt của thịt. Burger được phục vụ kèm các loại rau, phô mai và các phụ gia khác để tạo nên một món ăn hoàn chỉnh và cân bằng. Với mức giảm giá 15%, khách hàng có thể thưởng thức trọn vẹn hương vị burger bò chất lượng cao tại GOURMEZ với mức giá hấp dẫn hơn. Đây là cơ hội tuyệt vời để thưởng thức món ăn yêu thích với giá ưu đãi.&nbsp;</p><p>Chương trình khuyến mãi này áp dụng cho các ngày trong tuần và không áp dụng đồng thời với các chương trình khuyến mãi khác. Vì số lượng có hạn, khách hàng nên đến sớm để đảm bảo có cơ hội thưởng thức món ăn này với giá khuyến mãi.</p>', 'ql_khuyenmai/uploads/Giảm giá (6).png'),
(2, 'TẶNG SALAD RAU CỦ CHO HÓA ĐƠN TRÊN 99K', ' Khi quý khách mua bất kỳ combo ăn nào với tổng giá trị 99.000 đồng trở lên, bạn sẽ được tặng ngay 1 salad rau củ miễn phí.\r\n\r\nSalad rau củ được chế biến từ các loại rau tươi, sạch, giàu vitamin và khoáng chất. Món salad này sẽ giúp bữa ăn của quý khách thêm phần cân bằng dinh dưỡng và tăng cường sức khỏe. Với hương vị thanh mát, salad rau củ sẽ là sự kết hợp hoàn hảo cùng các món chính trong combo.\r\n\r\nChương trình khuyến mãi này áp dụng cho cả khách hàng đến trực tiếp tại cửa hàng và khách hàng đặt món ăn để mang về. Chỉ cần thanh toán đơn hàng từ 99.000 đồng trở lên, quý khách sẽ được tặng ngay 1 salad rau củ miễn phí.\r\n\r\nĐừng bỏ lỡ cơ hội thưởng thức bữa ăn ngon miệng cùng món salad bổ dưỡng với mức giá ưu đãi này. Hãy đến ngay cửa hàng hoặc đặt hàng online để nhận ưu đãi hấp dẫn!', 'ql_khuyenmai/uploads/Giảm giá (7).png'),
(3, 'GÀ GIÒN TẶNG KÈM COMBO HẠNH PHÚC', '<p>Từ ngày <strong>19/5 - 31/5/2024</strong>, khi quý khách mua bất kỳ combo \"Hạnh Phúc\" nào tại cửa hàng hoặc đặt hàng giao tận nơi, sẽ được tặng kèm 1 miếng gà giòn hoàn toàn miễn phí.</p><p>&nbsp;Combo \"Hạnh Phúc\" bao gồm các món ăn đặc trưng của chúng tôi như burger, khoai tây chiên và nước uống. Đây là sự kết hợp hoàn hảo để tạo nên một bữa ăn đầy đủ dinh dưỡng và hấp dẫn về hương vị. Món gà giòn tặng kèm được chế biến từ thịt gà tươi ngon, được ướp gia vị và chiên giòn giòn. Kết hợp cùng combo \"Hạnh Phúc\", món gà giòn sẽ là sự bổ sung hoàn hảo, mang đến cho quý khách một bữa ăn đầy đủ dinh dưỡng và hương vị tuyệt vời. Chương trình khuyến mãi này áp dụng cho cả khách hàng đến trực tiếp tại cửa hàng và khách hàng đặt món ăn để giao tận nơi. Chỉ cần thanh toán combo \"Hạnh Phúc\", quý khách sẽ được tặng ngay 1 miếng gà giòn miễn phí.&nbsp;</p><p>Đừng bỏ lỡ cơ hội thưởng thức bữa ăn ngon miệng cùng món gà giòn bổ dưỡng với mức giá ưu đãi này. Hãy đến ngay cửa hàng hoặc đặt hàng online ', 'ql_khuyenmai/uploads/Giảm giá (8).png'),
(4, 'GIẢM 40% KHI MUA 5 MIẾNG GÀ SỐT MẮM TỎI', '<p>Từ ngày 1/6, cửa hàng đang áp dụng chương trình khuyến mãi hấp dẫn cho sản phẩm Miếng gà sốt mắm tỏi. Với mức giảm giá lên tới 40%, khách hàng sẽ được hưởng ưu đãi khi mua tối thiểu 5 miếng gà cùng với đi NHÓM 4 người trở lên. Cụ thể, khi mua 5 miếng gà sốt mắm tỏi, khách hàng sẽ được giảm 40% trên tổng giá trị đơn hàng. Ưu đãi này không thể kết hợp với các chương trình khuyến mãi khác đang diễn ra tại cửa hàng. Chương trình ưu đãi này có thời gian áp dụng từ ngày 1/6, tuy nhiên thời điểm kết thúc chưa được xác định. Khách hàng vui lòng liên hệ trực tiếp với cửa hàng để nắm bắt thông tin chi tiết và điều kiện áp dụng của chương trình khuyến mãi này.</p>', 'ql_khuyenmai/uploads/Giảm giá (10).png'),
(5, 'NHẬN DEAL SỐC TRI ÂN CHO KHÁCH HÀNG', '<p>Bạn hãy đến chi nhánh Gourmez nào đó bất kỳ gần bạn để được giảm ngay 30% trên tổng hóa đơn ( Dành cho nhóm bạn 4 người trở lên ).&nbsp;</p><p>Lưu ý chỉ áp dụng tại cửa hàng và để được áp dụng thì bạn cần đọc mã code “KM30” để nhân viên có thể áp dụng khuyến mãi nhé</p>', 'ql_khuyenmai/uploads/Giảm giá (11).png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `food_name` varchar(255) DEFAULT NULL,
  `original_price` int(11) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `small_descr` varchar(255) DEFAULT NULL,
  `trending` int(11) DEFAULT NULL,
  `img` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `food`
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
-- Cấu trúc bảng cho bảng `food_for_service`
--

CREATE TABLE `food_for_service` (
  `ID_food` int(11) NOT NULL,
  `ID_service` int(11) NOT NULL,
  `food_combo` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `food_for_service`
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
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `shipper_id` int(11) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `name_cus` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_order` datetime DEFAULT NULL,
  `status` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `payment_mode` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `origin_total_price` int(11) DEFAULT NULL,
  `discount_total_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `food_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `small_descript` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `banner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id_service`, `service_name`, `small_descript`, `image`, `banner`) VALUES
(1, 'bán cá', ' Bạn đang phân vân không biết tổ chức sinh nhật như thế nào? Chuyện gì khó có Gourméz lo, Gourméz sẽ mang lại trải nghiệm tuyệt vời, thú vị, đáng nhớ dành cho bạn.', '1716916799_sinhnhat_icon.png', '1716916799_sn_banner.png'),
(2, 'Đơn hàng lớn', ' Để phục vụ sở thích quây quần cùng gia đình và bạn bè, chương trình chiết khấu hấp dẫn dành cho những đơn hàng lớn đã ra đời để đem đến những lựa chọn tiện lợi hơn cho bạn. Liên hệ ngay với cửa hàng gần nhất để được phục vụ.', '1716960096_iconbigdeal.png', '1716960096_banner_bigdeal.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipper`
--

CREATE TABLE `shipper` (
  `shipper_id` int(11) NOT NULL,
  `name_shipper` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name_staff` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `tintuc_id` int(6) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `summary` mediumtext DEFAULT NULL,
  `img_title` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
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
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `verify_status` tinyint(4) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bigdeal_service`
--
ALTER TABLE `bigdeal_service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `birthday_service`
--
ALTER TABLE `birthday_service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`shipper_id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
