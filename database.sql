CREATE TABLE `user` (
  `user_id` INT PRIMARY KEY,
  `first_name` nVARCHAR(255),
  `lastname` nvarchar(255),
  `email` VARCHAR(255),
  `phone` VARCHAR(20),
  `password` varchar(191),
  `verify_status` tinyint,
  `role` INT,
  `created_at` DATETIME
);

CREATE TABLE `food` (
  `food_id` INT PRIMARY KEY,
  `cate_id` INT,
  `food_name` nVARCHAR(255),
  `original_price` int,
  `selling_price` int,
  `small_descr` NVARCHAR(255),
  `trending` INT,
  `img` varchar(191),
  `created_at` timestamp
);

CREATE TABLE `Category` (
  `cate_id` INT PRIMARY KEY,
  `cate_name` NVARCHAR(255)
);

CREATE TABLE `Order_item` (
  `id` INT PRIMARY KEY,
  `food_id` INT,
  `order_id` INT,
  `quantity` INT,
  `price` int
);

CREATE TABLE `Orders` (
  `order_id` INT PRIMARY KEY,
  `user_id` INT,
  `staff_id` INT,
  `shipper_id` INT,
  `discount_id` int,
  `name_cus` NVARCHAR(255),
  `phone` VARCHAR(20),
  `address` NVARCHAR(255),
  `email` VARCHAR(255),
  `date_order` DATETIME,
  `status` Nvarchar(30),
  `payment_mode` INT,
  `note` Nvarchar(255),
  `origin_total_price` int,
  `discount_total_price` int
);



CREATE TABLE `Cart` (
  `cart_id` INT PRIMARY KEY,
  `user_id` INT,
  `food_id` INT,
  `quantity` INT
);

CREATE TABLE `Discount` (
  `discount_id` INT PRIMARY KEY,
  `name_discount` NVARCHAR(255),
  `qtt_of_dis` INT
);

CREATE TABLE `Staff` (
  `staff_id` INT PRIMARY KEY,
  `name_staff` NVARCHAR(255),
  `phone` VARCHAR(20)
);

CREATE TABLE `Shipper` (
  `shipper_id` INT PRIMARY KEY,
  `name_shipper` NVARCHAR(255),
  `phone` nVARCHAR(20)
);

CREATE TABLE `birthday_service` (
  `id` int PRIMARY KEY,
  `food_id` int,
  `quantity` int,
  `customer_name` nvarchar(191),
  `phone` varchar(10),
  `email` varchar(30),
  `name_order_party` nvarchar(50),
  `birthday` datetime,
  `booking date` datetime,
  `gender` nvarchar(3),
  `address` nvarchar(100),
  `note` nvarchar(191),
  `total_price` int,
  `status` nvarchar(100)
);

CREATE TABLE `bigdeal_service` (
  `id` int PRIMARY KEY,
  `food_id` int,
  `quantity` int,
  `first_name` nvarchar(100),
  `last_name` nvarchar(100),
  `phone` varchar(10),
  `email` varchar(30),
  `booking date` datetime,
  `address` nvarchar(100),
  `note` nvarchar(191),
  `total_price` int,
  `status` nvarchar(100)
);

ALTER TABLE `Category` ADD FOREIGN KEY (`cate_id`) REFERENCES `food` (`cate_id`);

ALTER TABLE `food` ADD FOREIGN KEY (`food_id`) REFERENCES `Cart` (`food_id`);

ALTER TABLE `user` ADD FOREIGN KEY (`user_id`) REFERENCES `Cart` (`user_id`);

ALTER TABLE `food` ADD FOREIGN KEY (`food_id`) REFERENCES `Order_item` (`food_id`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`order_id`) REFERENCES `Order_item` (`order_id`);

ALTER TABLE `user` ADD FOREIGN KEY (`user_id`) REFERENCES `Orders` (`user_id`);

ALTER TABLE `Staff` ADD FOREIGN KEY (`staff_id`) REFERENCES `Orders` (`staff_id`);

ALTER TABLE `Shipper` ADD FOREIGN KEY (`shipper_id`) REFERENCES `Orders` (`shipper_id`);

ALTER TABLE `Discount` ADD FOREIGN KEY (`discount_id`) REFERENCES `Orders` (`discount_id`);


ALTER TABLE `food` ADD FOREIGN KEY (`food_id`) REFERENCES `birthday_service` (`food_id`);

ALTER TABLE `food` ADD FOREIGN KEY (`food_id`) REFERENCES `bigdeal_service` (`food_id`);
