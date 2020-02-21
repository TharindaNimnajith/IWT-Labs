-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2018 at 07:49 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(50) NOT NULL DEFAULT '',
  `cat_description` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_description`) VALUES
(13, 'MacBook', 'The MacBook is a brand of notebook computers manufactured by Apple Inc. from May 2006 to February 2012, and relaunched in 2005. It replaced the iBook series and 12-inch PowerBook series of notebooks a'),
(14, 'iphones', 'Best iphones'),
(19, 'ipads', 'latest versions'),
(20, 'ipods', 'latest'),
(21, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `od_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `od_date` date NOT NULL,
  `od_status` enum('New','Shipped','Completed','Cancelled') NOT NULL DEFAULT 'New',
  `od_name` varchar(50) NOT NULL DEFAULT '',
  `od_address` varchar(100) NOT NULL DEFAULT '',
  `od_city` varchar(100) NOT NULL DEFAULT '',
  `od_postal_code` varchar(10) NOT NULL DEFAULT '',
  `od_cost` varchar(10) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `od_id` int(10) UNSIGNED NOT NULL,
  `pd_id` int(10) UNSIGNED NOT NULL,
  `od_qty` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pd_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `pd_name` varchar(99) NOT NULL DEFAULT '',
  `pd_description` text NOT NULL,
  `pd_price` decimal(7,2) NOT NULL DEFAULT '0.00',
  `pd_qty` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `pd_image` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pd_id`, `cat_id`, `pd_name`, `pd_description`, `pd_price`, `pd_qty`, `pd_image`) VALUES
(13, 13, '\r\nApple 12\" MacBook (Early 2016, Silver) MLHA2LL/A', '\r\nProduct Information\r\nReleased in April 2016, the Apple MacBook renders performance and multitasking efficiency with its integrated 8 GB RAM. This device is powered by a reliable 1.1 GHz Intel Core m3 processor. Its 256 GB flash drive provides storage space for digital content. Also, it features a convenient 12-inch display that provides a clear view of files, apps and documents. In addition, this silver Apple notebook comes pre-installed with the Mac OS X 10.11 El Capitan.', '99999.99', 1, 'mac1.jpg'),
(14, 13, 'Apple MacBook 12\" Laptop, 256GB - MNYF2LL/A - (June, 2017, Space Gray)', 'Product Information\r\nThe Apple MacBook renders performance and multitasking efficiency with its integrated 8 GB RAM. This device is powered by a reliable 1.2 GHz Intel Core m3 processor. Its 256 GB flash drive provides storage space for digital content. Also, it features a convenient 12-inch display that provides a clear view of files, apps and documents. In addition, this space gray Apple notebook comes pre-installed with the Mac OS Sierra.', '3000.00', 25, 'mac2.jpg'),
(15, 14, 'APPLE IPHONE8 - 64GB - GOLD - SILVER - BLACK', '“With original box”', '0.00', 0, 'iphone1.jpg'),
(16, 19, 'Apple iPad Pro 12.9 inch 256GB GOLD Edition [ WiFi + Cellular LTE ] NEW', 'Apple iPad Pro 12.9 inch 256GB GOLD Edition [ WiFi + Cellular LTE ] NEW', '0.00', 0, 'ipad1.jpg'),
(17, 20, '\r\nApple iPod Touch 5th Generation 16GB/32GB (Latest Model) Dual Cameras', '\r\nApple iPod Touch 5th Generation 16GB/32GB (Latest Model) Dual Cameras', '0.00', 0, 'ipod1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `user_email` varchar(25) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `password`, `user_email`, `created_at`, `updated_at`, `user_is_admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@sliit.lk', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'dilani.l', 'e10adc3949ba59abbe56e057f20f883e', 'dilani@gmail.com', '2018-09-26 06:22:01', '2018-09-26 06:22:01', 0),
(9, 'dilki', 'cf63fb29ec026c4320d5e58eff44d576', 'dila@gmail.com', '2018-09-26 07:10:20', '2018-09-26 07:10:20', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_name` (`cat_name`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`od_id`,`pd_id`),
  ADD KEY `pd_id` (`pd_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `pd_name` (`pd_name`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `od_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
