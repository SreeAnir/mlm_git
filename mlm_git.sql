-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 06:11 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlm_git`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `create_date`) VALUES
(8, 'Category 1', 'Category 1', '2018-06-01 06:12:50'),
(9, 'Category 2', 'Category 2', '2018-06-01 06:12:59'),
(10, 'Category 3', 'Category 3', '2018-06-01 06:13:07'),
(11, 'Category 4', 'Category 4', '2018-06-01 06:13:13'),
(12, 'Category 5', 'Category 5', '2018-06-01 06:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `member_log`
--

CREATE TABLE `member_log` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `parent_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_log`
--

INSERT INTO `member_log` (`id`, `name`, `parent_id`) VALUES
(2, 'Admin User', 0),
(3, 'Sreekala', 2),
(4, 'Mujeeb', 2),
(5, 'Priya', 3),
(6, 'Saravan', 4),
(7, 'Ram', 4),
(8, 'Sreejith', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `member_id` text NOT NULL,
  `member_name` text NOT NULL,
  `product_id` text NOT NULL,
  `qty` text NOT NULL,
  `is_igst` text NOT NULL,
  `unit_price` text NOT NULL,
  `create_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `member_id`, `member_name`, `product_id`, `qty`, `is_igst`, `unit_price`, `create_date`) VALUES
(1, '031578762179', '3', 'Sreekala', '234260', '1', 'undefined', '12000', '2020-01-11 18:02:59'),
(2, '051578762212', '5', 'Priya', '234260', '1', 'undefined', '12000', '2020-01-11 18:03:32'),
(3, '051578762384', '5', 'Sowmya', '234262', '1', 'undefined', '20500', '2020-01-11 18:06:24'),
(5, '071578762574', '7', 'Ram', '234260', '1', 'undefined', '12000', '2020-01-11 18:09:34'),
(6, '081578762615', '8', 'Sreejith', '234260', '1', 'undefined', '12000', '2020-01-11 18:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `type` text NOT NULL,
  `ProductName` text NOT NULL,
  `ProductCategory` text NOT NULL,
  `Tax` text NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `igst` float NOT NULL,
  `Available_qty` int(10) NOT NULL,
  `SKU` text NOT NULL,
  `Price` int(11) NOT NULL,
  `hsn` varchar(20) NOT NULL,
  `sac` varchar(20) NOT NULL,
  `SalePrice` int(11) NOT NULL,
  `description` text NOT NULL,
  `productImage` text NOT NULL,
  `company_name` text NOT NULL,
  `company_email` text NOT NULL,
  `company_phone` text NOT NULL,
  `City` text NOT NULL,
  `State` text NOT NULL,
  `Pincode` text NOT NULL,
  `company_address` text NOT NULL,
  `ip_address` text NOT NULL,
  `create_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `type`, `ProductName`, `ProductCategory`, `Tax`, `sgst`, `cgst`, `igst`, `Available_qty`, `SKU`, `Price`, `hsn`, `sac`, `SalePrice`, `description`, `productImage`, `company_name`, `company_email`, `company_phone`, `City`, `State`, `Pincode`, `company_address`, `ip_address`, `create_date`) VALUES
(234260, 133, '', 'Moto E', 'Category 2', '', 5, 2, 1, 10, 'KJO8754', 10000, '', '', 12000, 'product desctrion ', 'images.jpg', '', '', '', '', '', '', '', '::1', '2020-01-11 06:10:43'),
(234261, 133, '', 'Samgung Galaxy', 'Category 3', '', 5, 2, 1, 10, 'KJO8754', 15000, '', '', 10600, 'product desctrion ', 'wp3647894.jpg', '', '', '', '', '', '', '', '::1', '2020-01-11 06:11:22'),
(234262, 133, '', 'iphone 7', 'Category 4', '', 5, 2, 1, 10, 'KJO8755', 20000, '', '', 20500, 'product desctrion ', 'images1.jpg', '', '', '', '', '', '', '', '::1', '2020-01-11 06:11:01'),
(234263, 133, '', 'Redmi 6A', 'Category 5', '', 5, 2, 1, 10, 'KJO8754', 45000, '', '', 45500, 'product desctrion ', 'images3.jpg', '', '', '', '', '', '', '', '::1', '2020-01-11 06:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `profit_share`
--

CREATE TABLE `profit_share` (
  `id` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `member_id` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `product_id` text NOT NULL,
  `profit` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `profit_percentage` int(2) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profit_share`
--

INSERT INTO `profit_share` (`id`, `order_id`, `member_id`, `parent_id`, `product_id`, `profit`, `level`, `profit_percentage`, `create_date`) VALUES
(1, '031578762179', '3', 2, '234260', 700, 1, 35, '2020-01-11 22:32:59'),
(2, '031578762179', '3', 2, '234260', 400, 2, 20, '2020-01-11 22:32:59'),
(3, '031578762179', '3', 2, '234260', 300, 3, 15, '2020-01-11 22:32:59'),
(4, '031578762179', '3', 2, '234260', 200, 4, 10, '2020-01-11 22:32:59'),
(5, '031578762179', '3', 2, '234260', 100, 5, 5, '2020-01-11 22:32:59'),
(6, '031578762179', '3', 2, '234260', 100, 6, 5, '2020-01-11 22:32:59'),
(7, '031578762179', '3', 2, '234260', 100, 7, 5, '2020-01-11 22:32:59'),
(8, '031578762179', '3', 2, '234260', 100, 8, 5, '2020-01-11 22:32:59'),
(9, '051578762212', '5', 3, '234260', 700, 1, 35, '2020-01-11 22:33:32'),
(10, '051578762212', '5', 2, '234260', 400, 2, 20, '2020-01-11 22:33:32'),
(11, '051578762212', '5', 2, '234260', 300, 3, 15, '2020-01-11 22:33:32'),
(12, '051578762212', '5', 2, '234260', 200, 4, 10, '2020-01-11 22:33:32'),
(13, '051578762212', '5', 2, '234260', 100, 5, 5, '2020-01-11 22:33:32'),
(14, '051578762212', '5', 2, '234260', 100, 6, 5, '2020-01-11 22:33:32'),
(15, '051578762212', '5', 2, '234260', 100, 7, 5, '2020-01-11 22:33:32'),
(16, '051578762212', '5', 2, '234260', 100, 8, 5, '2020-01-11 22:33:32'),
(17, '051578762384', '5', 3, '234262', 175, 1, 35, '2020-01-11 22:36:24'),
(18, '051578762384', '5', 2, '234262', 100, 2, 20, '2020-01-11 22:36:24'),
(19, '051578762384', '5', 2, '234262', 75, 3, 15, '2020-01-11 22:36:24'),
(20, '051578762384', '5', 2, '234262', 50, 4, 10, '2020-01-11 22:36:24'),
(21, '051578762384', '5', 2, '234262', 25, 5, 5, '2020-01-11 22:36:24'),
(22, '051578762384', '5', 2, '234262', 25, 6, 5, '2020-01-11 22:36:25'),
(23, '051578762384', '5', 2, '234262', 25, 7, 5, '2020-01-11 22:36:25'),
(24, '051578762384', '5', 2, '234262', 25, 8, 5, '2020-01-11 22:36:25'),
(33, '071578762574', '7', 4, '234260', 700, 1, 35, '2020-01-11 22:39:34'),
(34, '071578762574', '7', 2, '234260', 400, 2, 20, '2020-01-11 22:39:34'),
(35, '071578762574', '7', 2, '234260', 300, 3, 15, '2020-01-11 22:39:34'),
(36, '071578762574', '7', 2, '234260', 200, 4, 10, '2020-01-11 22:39:34'),
(37, '071578762574', '7', 2, '234260', 100, 5, 5, '2020-01-11 22:39:34'),
(38, '071578762574', '7', 2, '234260', 100, 6, 5, '2020-01-11 22:39:34'),
(39, '071578762574', '7', 2, '234260', 100, 7, 5, '2020-01-11 22:39:34'),
(40, '071578762574', '7', 2, '234260', 100, 8, 5, '2020-01-11 22:39:34'),
(41, '081578762615', '8', 4, '234260', 700, 1, 35, '2020-01-11 22:40:15'),
(42, '081578762615', '8', 2, '234260', 400, 2, 20, '2020-01-11 22:40:15'),
(43, '081578762615', '8', 2, '234260', 300, 3, 15, '2020-01-11 22:40:15'),
(44, '081578762615', '8', 2, '234260', 200, 4, 10, '2020-01-11 22:40:16'),
(45, '081578762615', '8', 2, '234260', 100, 5, 5, '2020-01-11 22:40:16'),
(46, '081578762615', '8', 2, '234260', 100, 6, 5, '2020-01-11 22:40:16'),
(47, '081578762615', '8', 2, '234260', 100, 7, 5, '2020-01-11 22:40:16'),
(48, '081578762615', '8', 2, '234260', 100, 8, 5, '2020-01-11 22:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_products`
--

CREATE TABLE `purchase_products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `qty` int(10) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `TaxAmount` text NOT NULL,
  `Tax` text NOT NULL,
  `description` text NOT NULL,
  `company_name` text NOT NULL,
  `company_email` text NOT NULL,
  `company_phone` text NOT NULL,
  `City` text NOT NULL,
  `State` text NOT NULL,
  `Pincode` text NOT NULL,
  `company_address` text NOT NULL,
  `ip_address` text NOT NULL,
  `create_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `value`) VALUES
(1, 'tax', '5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `name` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `alternateEmail` text NOT NULL,
  `mobile_no` text NOT NULL,
  `language` text NOT NULL,
  `website` text NOT NULL,
  `picture_url` text NOT NULL,
  `profile_url` text NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `about` text NOT NULL,
  `locale` text NOT NULL,
  `designation` text NOT NULL,
  `address` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `pincode` text NOT NULL,
  `vat_number` text NOT NULL,
  `AccountNumber` text NOT NULL,
  `IFSCCode` text NOT NULL,
  `ip_address` text NOT NULL,
  `created` text NOT NULL,
  `lastlogged` text NOT NULL,
  `modified` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `status`, `name`, `first_name`, `last_name`, `email`, `alternateEmail`, `mobile_no`, `language`, `website`, `picture_url`, `profile_url`, `dob`, `gender`, `about`, `locale`, `designation`, `address`, `country`, `city`, `pincode`, `vat_number`, `AccountNumber`, `IFSCCode`, `ip_address`, `created`, `lastlogged`, `modified`) VALUES
(1, 'admin@mlm.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Admin', 1, 'Admin MLM', 'Admin', 'MLM', 'admin@mlm.com', '', '9785834812', '', '', '2.png', '', '', '', 'about applicaiton', '', '', 'VDN Jaipur', 'india', 'JAIPUR', '332710', '', '', '', '::1', '2018-01-06 13:23:35', '11-01-2020 16:19 PM', '2018-06-01 08:08:38'),
(2, 'cmsmlm@mailinator.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeLoyYG/tmPfdXxuFRSkC2pxeIfZSJYyq', 'Customer', 1, 'CMS Admin', '', '', 'test@gmail.com', '', '9785834812', '', '', 'admin.png', '', '', '', '', '', '', 'VDN, Jaipur', '', '', '302039', '', '', '', '::1', '2018-06-01 08:22:13', '', ''),
(3, 'sreekalaanirudhan1020@gmail.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1PehskGZsaBoMwdPcXCAdozQqOfVJvOZHe', 'Customer', 1, 'Sreekala', '', '', 'sreekalaanirudhan1020@gmail.com', '', '755885858', '', '', 'download.jpg', '', '', '', '', '', '', 'mnn', '', '', '868686', '', '', '', '::1', '2020-01-11 10:46:52', '', ''),
(4, 'mujeeb@mailnator.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1Pew9v19O9Q9Wqvq2HVODptxGsX3ogTozy', 'Customer', 1, 'Mujeeb', '', '', 'mujeeb@mailnator.com', '', '8484848', '', '', 'images1.jpg', '', '', '', '', '', '', 'fdgfdg fg', '', '', '949494', '', '4484848', '8383', '::1', '2020-01-11 10:48:57', '', ''),
(5, 'priya@mailinator.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1Pe6zbctkTqqcZLSgac9eHchlPUO/S3HP.', 'Customer', 1, 'Priya', '', '', 'priya@mailinator.com', '', '99999', '', '', 'images2.jpg', '', '', '', '', '', '', 'd,dld', '', '', '484848484', '', '', '', '::1', '2020-01-11 10:52:49', '', ''),
(6, 'sara@mail.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1PetrT7Ao9DhRw3Iy9jztljawlAqMRiNri', 'Customer', 0, 'Saravan', '', '', 'sara@mail.com', '', '8879879', '', '', 'images3.jpg', '', '', '', '', '', '', ',mnm, mbmn', '', '', '7777', '', '', '', '::1', '2020-01-11 17:56:01', '', ''),
(7, '89987@ddgd.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeQyl0nlu5OAEKhq38VSa62K2T1XbLHNq', 'Customer', 0, 'Ram', '', '', '89987@ddgd.com', '', '8383838', '', '', 'images.png', '', '', '', '', '', '', 'sks kfsdfs,s dkfjds', '', '', '9879879', '', '', '', '::1', '2020-01-11 18:09:34', '', ''),
(8, '8848484884@gmail.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1Pe5oiYzJMgRfJ4QyJrz7wpHkYnhOYLF2a', 'Customer', 0, 'Sreejith', '', '', '8848484884@gmail.com', '', '4848484848', '', '', 'images1.png', '', '', '', '', '', '', 's ,sdf s', '', '', '309890385', '', '', '', '::1', '2020-01-11 18:10:15', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_log`
--
ALTER TABLE `member_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profit_share`
--
ALTER TABLE `profit_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234265;

--
-- AUTO_INCREMENT for table `profit_share`
--
ALTER TABLE `profit_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `purchase_products`
--
ALTER TABLE `purchase_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
