-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 03:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)  SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Bhuwan', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'motorolla'),
(5, 'LG'),
(6, 'Cloth Brand'),
(7, 'Sony'),
(8, 'Nokia');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(6, 26, '::1', 4, 1),
(55, 5, '::1', 14, 1),
(71, 61, '127.0.0.1', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronics'),
(2, 'Ladies Wears'),
(3, 'Mens Wear'),
(4, 'Kids Wear'),
(5, 'Furnitures'),
(6, 'Home Appliances'),
(7, 'Electronics Gadgets');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE `email_info` (
  `email_id` int(100) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`email_id`, `email`) VALUES
(1, 'bhuwan@gmail.com'),
(2, 'mukeshmahto@gmail.com'),
(3, 'muskanm123@gmail.com'),
(4, 'samup@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_type` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `o_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_type`, `p_status`, `o_status`, `added_on`) VALUES
(1, 1, 1, 2, '07M47684BS5725041', 'Online', 'Completed', 3, '2020-06-27 15:24:00'),
(2, 1, 2, 1, '07M47684BS5725041', 'Online', 'Completed', 5, '2020-06-20 15:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`) VALUES
(1, 1, 'Bhuwan', 'bhuwanpariyar@gmail.com', 'Kupondole', 'lalitpur', 'kathmandu', 123456, 'Bhuwan Pariyar', '1234 5678 9123 4567', '12/90', 2, 35000, 1234),
(2, 1, 'Bhuwan', 'bhuwanpariyarr@gmail.com', 'Kupondole', 'lalitpur', 'kathmandu', 123456, 'Bhuwan Pariyar', '1234 5678 9123 4567', '12/90', 1, 95000, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`) VALUES
(3, 1, 1, 2, 70000),
(4, 2, 2, 1, 95000);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'cancelled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 2, 'Samsung galaxy s7 edge', 35000, 'Samsung galaxy s7 edge', 'product07.png', 'samsung mobile electronics'),
(2, 1, 3, 'iPhone 5s', 95000, 'iphone 5s', 'iphone-apple-png-file-550.png', 'mobile iphone apple'),
(3, 1, 3, 'iPad air 2', 80000, 'ipad apple brand', 'da4371ffa192a115f922b1c0dff88193.png', 'apple ipad tablet'),
(4, 1, 3, 'iPhone 6s', 120000, 'Apple iPhone ', 'http___pluspng.com_img-png_iphone-6s-png-iphone-6s-gold-64gb-1000.png', 'iphone apple mobile'),
(5, 1, 3, 'iPad 2', 75000, 'samsung ipad', 'iPad-air.png', 'ipad tablet samsung'),
(6, 1, 1, 'samsung Laptop r series', 35000, 'samsung Black combination Laptop', 'laptop_PNG5939.png', 'samsung laptop '),
(7, 1, 1, 'Laptop Pavillion', 50000, 'Laptop Hp Pavillion', 'laptop_PNG5930.png', 'Laptop Hp Pavillion'),
(8, 1, 4, 'Motorolla mobile', 40000, 'moto Mobile', '530201353846AM_635_sony_xperia_z.png', 'moto mobile'),
(9, 1, 3, 'iPhone New', 120000, 'iphone', 'iphone-hd-png-iphone-apple-png-file-550.png', 'iphone apple mobile'),
(10, 2, 6, 'Red Ladies dress', 1000, 'red dress for girls', 'red dress.jpg', 'red dress '),
(11, 4, 6, 'kids ethnic dress', 1200, 'kids ethnic dress', 'kids-ethnic.jpg', 'kids ethnic dress'),
(12, 2, 6, 'Ladies Casual Cloths', 1500, 'ladies casual summer two colors pleted', '7475-ladies-casual-dresses-summer-two-colors-pleated.jpg', 'girl dress cloths casual'),
(13, 2, 6, 'SpringAutumnDress', 1200, 'girls dress', 'shortname.jpg', 'girl dress'),
(14, 2, 6, 'Casual Dress', 1400, 'girl dress', 'download.jpg', 'ladies cloths girl'),
(15, 2, 6, 'Formal Look', 1500, 'girl dress', 'shutterstock_203611819.jpg', 'ladies wears dress girl'),
(16, 3, 6, 'Sweter for men', 600, '2012-Winter-Sweater-for-Men-for-better-outlook', '2012-Winter-Sweater-for-Men-for-better-outlook.jpg', 'black sweter cloth winter'),
(17, 3, 6, 'Gents formal', 1000, 'gents formal look', 'gents-formal-250x250.jpg', 'gents wear cloths'),
(19, 4, 6, 'kids kurta suruwal', 3000, 'kids kurta suruwal', 'images (1).jpg', 'kids kurta suruwal'),
(20, 3, 6, 'Mens Sweeter', 1600, 'jg', 'Winter-fashion-men-burst-sweater.png', 'sweeter gents '),
(21, 3, 6, 'T shirt', 800, 'ssds', 'IN-Mens-Apparel-Voodoo-Tiles-09._V333872612_.jpg', 'formal t shirt black'),
(22, 4, 6, 'Yellow T shirt ', 1300, 'yello t shirt with pant', '1.0x0.jpg', 'kids yellow t shirt'),
(23, 4, 6, 'Girls cloths', 1900, 'sadsf', 'GirlsClothing_Widgets.jpg', 'formal kids wear dress'),
(24, 4, 6, 'Blue T shirt', 700, 'g', 'images.jpg', 'kids dress'),
(25, 4, 6, 'Yellow girls dress', 750, 'as', 'images (3).jpg', 'yellow kids dress'),
(27, 4, 6, 'Formal look', 690, 'sd', 'image28.jpg', 'formal kids dress'),
(32, 5, 0, 'Book Shelf', 3500, 'book shelf', 'furniture-book-shelf-250x250.jpg', 'book shelf furniture'),
(33, 6, 5, 'Refrigerator', 35000, 'Refrigerator', 'CT_WM_BTS-BTC-AppliancesHome_20150723.jpg', 'refrigerator samsung'),
(34, 6, 0, 'Emergency Light', 550, 'Emergency Light', 'emergency light.JPG', 'emergency light'),
(35, 6, 0, 'electronic iron', 1500, 'electronic iron', 'SDL010220333_1.jpg', 'electronic iron'),
(36, 6, 0, 'Iron', 1500, 'gj', 'iron.JPG', 'iron'),
(37, 3, 6, 'T-shirt', 500, 'T-shirt', 'images (4).jpg', 'T-shirt'),
(38, 6, 0, 'Mixer', 3500, 'singer-mixer-grinder-mg-46-medium', 'mixer.jpg', 'singer-mixer'),
(39, 6, 0, 'Mixer Grinder', 2500, 'Mixer Grinder', 'singer-mixer-grinder-mg-46-medium_4bfa018096c25dec7ba0af40662856ef.jpg', 'Mixer Grinder'),
(40, 2, 6, 'Formal girls dress', 3000, 'Formal girls dress', 'girl-walking.jpg', 'ladies'),
(45, 1, 2, 'Samsung Galaxy Note 3', 10000, 'Samsung Galaxy Note 3', 'samsung_galaxy_note3_note3neo.JPG', 'samsung galaxy Note 3 neo'),
(46, 1, 7, 'Sony xperia', 10000, 'SGN3', 'sony mobile.jpg', 'SGN3'),
(47, 1, 3, 'apple Laptop', 95000, 'nbk', 'product01.png', 'apple Laptop'),
(48, 7, 7, 'Headphones', 2500, 'Headphones', 'product05.png', 'Headphones Sony'),
(49, 7, 7, 'Headphones', 2500, 'Headphones', 'product02.png', 'Headphones Sony'),
(50, 3, 6, 'boys shirts', 350, 'shirts', 'pm1.JPG', 'suit boys shirts'),
(51, 3, 6, 'boys shirts', 270, 'shirts', 'pm2.JPG', 'suit boys shirts'),
(52, 3, 6, 'boys shirts', 453, 'shirts', 'pm3.JPG', 'suit boys shirts'),
(53, 3, 6, 'boys shirts', 220, 'shirts', 'ms1.JPG', 'suit boys shirts'),
(54, 3, 6, 'boys shirts', 290, 'shirts', 'ms2.JPG', 'suit boys shirts'),
(55, 3, 6, 'boys shirts', 259, 'shirts', 'ms3.JPG', 'suit boys shirts'),
(56, 3, 6, 'boys shirts', 299, 'shirts', 'pm7.JPG', 'suit boys shirts'),
(57, 3, 6, 'boys shirts', 260, 'shirts', 'i3.JPG', 'suit boys shirts'),
(58, 3, 6, 'boys shirts', 350, 'shirts', 'pm9.JPG', 'suit boys shirts'),
(59, 3, 6, 'boys shirts', 855, 'shirts', 'a2.JPG', 'suit boys shirts'),
(60, 3, 6, 'boys shirts', 150, 'shirts', 'pm11.JPG', 'suit boys shirts'),
(61, 3, 6, 'boys shirts', 215, 'shirts', 'pm12.JPG', 'suit boys shirts'),
(62, 3, 6, 'boys shirts', 299, 'shirts', 'pm13.JPG', 'suit boys shirts'),
(63, 3, 6, 'boys Jeans Pant', 550, 'Pants', 'pt1.JPG', 'boys Jeans Pant'),
(64, 3, 6, 'boys Jeans Pant', 460, 'pants', 'pt2.JPG', 'boys Jeans Pant'),
(65, 3, 6, 'boys Jeans Pant', 470, 'pants', 'pt3.JPG', 'boys Jeans Pant'),
(66, 3, 6, 'boys Jeans Pant', 480, 'pants', 'pt4.JPG', 'boys Jeans Pant'),
(67, 3, 6, 'boys Jeans Pant', 360, 'pants', 'pt5.JPG', 'boys Jeans Pant'),
(68, 3, 6, 'boys Jeans Pant', 550, 'pants', 'pt6.JPG', 'boys Jeans Pant'),
(69, 3, 6, 'boys Jeans Pant', 390, 'pants', 'pt7.JPG', 'boys Jeans Pant'),
(70, 3, 6, 'boys Jeans Pant', 399, 'pants', 'pt8.JPG', 'boys Jeans Pant'),
(71, 1, 2, 'Samsung galaxy s7', 50000, 'Samsung galaxy s7', 'product07.png', 'samsung mobile electronics'),
(72, 7, 2, 'samsung earphone', 350, 'sony earphone', 'earphone4.png', 'samsung earphone electronics gadgets'),
(73, 7, 2, 'samsung earphone', 350, 'samsung earphone', 'earphone5.png', 'samsung earphones electronics gadgets'),
(74, 1, 1, 'HP i5 laptop', 55000, 'HP i5 laptop', 'product01.png', 'HP i5 laptop electronics'),
(75, 1, 1, 'HP i7 laptop 8gb ram', 55000, 'HP i7 laptop 8gb ram', 'product03.png', 'HP i7 laptop 8gb ram electronics'),
(76, 1, 5, 'sony note 6gb ram', 45000, 'sony note 6gb ram', 'product04.png', 'sony note 6gb ram mobile electronics'),
(77, 1, 4, 'MSV laptop 16gb ram NVIDEA Graphics', 50000, 'MSV laptop 16gb ram', 'product06.png', 'MSV laptop 16gb ram NVIDEA Graphics electronics'),
(78, 1, 5, 'dell laptop 8gb ram intel integerated Graphics', 45000, 'dell laptop 8gb ram intel integerated Graphics', 'product08.png', 'dell laptop 8gb ram intel integerated Graphics electronics'),
(79, 7, 2, 'camera with 3D pixels', 2500, 'camera with 3D pixels', 'product09.png', 'camera with 3D pixels camera electronics gadgets'),
(81, 4, 6, 'Kids blue dress', 1200, 'blue dress', 'blue.jpg', 'kids blue dress'),
(82, 1, 7, 'hgvgfcy', 100, 'hg uytdf y', '530201353846AM_635_sony_xperia_z.png', '1'),
(83, 3, 6, 'Laptop bag', 1000, 'laptop bag', 'bag4.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `rdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `name`, `email_id`, `review`, `rating`, `rdate`) VALUES
(1, 'bhuwan', 'bhuwan@gmail.com', 'great', 4, '2020-06-19 07:18:08'),
(2, 'mukesh', 'mukesh@gmail.com', 'awesome', 5, '2020-06-20 05:00:00'),
(3, 'muskan', 'muskanm@gmail.com', 'cool', 4, '2020-06-20 19:36:00'),
(4, 'samip', 'samip@gmail.com', 'wonderful', 5, '2020-06-19 19:36:00'),
(5, 'Bhuwan', 'bhuwanpariyarr@gmail.com', 'not bad', 4, '2020-06-20 19:47:00'),
(6, 'acme', 'acme@gmail.com', 'average', 3, '2020-06-21 13:08:00'),
(7, 'Bhuwan', 'bhuwanpariyarr@gmail.com', 'need improvement', 2, '2020-06-21 13:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Bhuwan', 'Pariyar', 'bhuwanpariyarr@gmail.com', 'bhuwan12345', '9813246534', 'kupondole', 'lalitpur'),
(2, 'Mukesh', 'Mahato', 'mukeshm@gmail.com', 'mukesh123', '9800000000', 'siraha', 'siraha'),
(3, 'Muskan', 'Manandhar', 'muskanm@gmail.com', 'muskan123', '9811111111', 'sitapaila', 'kathmandu'),
(4, 'Samip', 'Pokharel', 'samip@gmail.com', 'samip12345', '9822222222', 'sitapaila', 'kathmandu');

--
-- Triggers `user_info`
--
DELIMITER $$
CREATE TRIGGER `after_user_info_insert` AFTER INSERT ON `user_info` FOR EACH ROW BEGIN 
INSERT INTO user_info_backup VALUES(new.user_id,new.first_name,new.last_name,new.email,new.password,new.mobile,new.address1,new.address2);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info_backup`
--

CREATE TABLE `user_info_backup` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info_backup`
--

INSERT INTO `user_info_backup` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Bhuwan', 'Pariyar', 'bhuwanpariyarr@gmail.com', 'bhuwan12345', '9813246534', 'kupondole', 'lalitpur'),
(2, 'Mukesh', 'Mahato', 'mukeshm@gmail.com', 'mukesh123', '9800000000', 'siraha', 'siraha'),
(3, 'Muskan', 'Manandhar', 'muskanm@gmail.com', 'muskan123', '9811111111', 'sitapaila', 'kathmandu'),
(4, 'Samip', 'Pokharel', 'samip@gmail.com', 'samip12345', '9822222222', 'sitapaila', 'kathmandu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_pro_id`),
  ADD KEY `order_products` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info_backup`
--
ALTER TABLE `user_info_backup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_info`
--
ALTER TABLE `email_info`
  MODIFY `email_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info_backup`
--
ALTER TABLE `user_info_backup`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products` FOREIGN KEY (`order_id`) REFERENCES `orders_info` (`order_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
