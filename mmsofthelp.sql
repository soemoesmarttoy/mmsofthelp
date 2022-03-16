-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 05:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmsofthelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `com_id` int(10) NOT NULL,
  `is_good` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `com_id`, `is_good`) VALUES
(19, 'စပါး', 19, 1),
(20, 'ဆန်', 19, 1),
(21, 'ဆန်လတ်', 19, 1),
(22, 'ဆန်ကွဲ', 19, 1),
(23, 'အခြား', 19, 1),
(24, 'Payment Type(ငွေးပေးချေမှုပုံစံ)', 0, 0),
(25, 'ကုန်+ကား', 0, 0),
(26, 'ကား', 0, 0),
(27, 'ကုန်ထားရှိမည့်နေရာ', 0, 0),
(28, 'အိတ်အရေအတွက်', 0, 0),
(29, 'အလုပ်အမျိုးအစား', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `phone`, `address`) VALUES
(0, 'Placeholder', '', ''),
(19, 'MMSoftHelp', '09254286153', 'Yangon'),
(21, 'Smarttoy', '1234', 'Taungoo');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `com_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `com_id`) VALUES
(3, 'Aung Aung', '1234', 19),
(4, 'Maung Maung', '1234', 19);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `com_id` int(10) NOT NULL,
  `type` enum('item','place','unit','tin','kg','vis','pound','pay') NOT NULL,
  `qty` float NOT NULL,
  `unit_price` float NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `cat_id`, `com_id`, `type`, `qty`, `unit_price`, `updated_at`, `updated_date`) VALUES
(14, 'ဗျော့ထွန်း', 19, 19, 'item', 1000, 200000, '2022-03-14 04:23:01', '2022-03-14'),
(15, 'ဆင်းသုခ', 19, 19, 'item', 500, 300000, '2022-03-14 04:23:26', '2022-03-14'),
(16, 'ဗျော့ထွန်း(၃၀)', 20, 19, 'item', 0, 0, '2022-03-14 07:11:39', '2022-03-14'),
(17, 'ဗျော့ထွန်း', 21, 19, 'item', 0, 0, '2022-03-14 07:11:49', '2022-03-14'),
(18, 'ဆင်းသုခ(၂၈.၅၀)', 20, 19, 'item', 0, 0, '2022-03-14 07:12:05', '2022-03-14'),
(19, 'ကောက်ညှင်း', 22, 19, 'item', 1000, 200000, '2022-03-14 16:49:17', '2022-03-14'),
(20, 'မျိုးရော', 22, 19, 'item', 1000, 200000, '2022-03-14 17:01:07', '2022-03-14'),
(21, 'ဖွဲနု', 23, 19, 'item', 1000, 200000, '2022-03-14 17:01:25', '2022-03-14'),
(22, 'ပေါ်ဆန်း', 22, 19, 'item', 1000, 200000, '2022-03-14 17:03:48', '2022-03-14'),
(23, 'ငွေကြိုပေး', 24, 0, 'pay', 0, 0, '2022-03-15 02:23:59', '2022-03-15'),
(24, 'အ‌ကြွေး', 24, 0, 'pay', 0, 0, '2022-03-15 02:23:59', '2022-03-15'),
(25, 'လက်ငင်းရှင်း', 24, 0, 'pay', 0, 0, '2022-03-15 02:25:31', '2022-03-15'),
(26, 'ပွိုင့်', 23, 19, 'item', 0, 0, '2022-03-15 09:31:57', '2022-03-15'),
(27, 'ဂိုဒေါင်A', 27, 19, 'place', 1, 3000, '2022-03-15 10:00:17', '2022-03-15'),
(30, 'ဂိုဒေါင်B', 27, 19, 'place', 1, 4000, '2022-03-16 01:50:35', '2022-03-16'),
(38, 'စပါးမျိုးစစ်', 29, 19, 'unit', 39, 100, '2022-03-16 15:54:07', '2022-03-16'),
(39, 'စပါးအလေးချိန်', 29, 19, 'unit', 40, 100, '2022-03-16 15:54:25', '2022-03-16'),
(40, 'စပါးကားချ', 29, 19, 'unit', 41, 100, '2022-03-16 15:54:54', '2022-03-16'),
(41, 'စပါးထည့်', 29, 19, 'unit', 42, 100, '2022-03-16 15:55:11', '2022-03-16'),
(42, 'စပါးကြိတ်ခွဲ', 29, 19, 'unit', 0, 100, '2022-03-16 15:55:39', '2022-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `com_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `unit_price` float NOT NULL,
  `qty` float NOT NULL,
  `pay_type_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `com_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `com_id`) VALUES
(1, 'Products', 'Rice and others', 21),
(2, 'ဆက်သွယ်ရန်', 'ဖုန်း ၀၉၁၂၃၄၅၆၇၈၉\r\nအီးမေးလ် ‌abc@mail.com\r\nလိပ်စာ ၁၂၃,  ၁၂၃ လမ်း, ၁၂၃ ့', 21),
(14, 'Hello', '<p><i><strong>Hello World</strong></i></p><ul><li><i><strong>hi</strong></i></li><li><i><strong>hi</strong></i></li></ul>', 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(250) NOT NULL,
  `com_id` int(10) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `phone`, `address`, `com_id`, `role`) VALUES
(1, 'smt@mail.com', '1234', '1234', 'Yangon', 19, 'admin'),
(2, 'soe@mail.com', '1234', '09254286153', 'Yangon', 19, 'အရောင်းမန်နေဂျာ'),
(3, 'moe@mail.com', '1234', '1234', 'Yangon', 19, 'အဝယ်မန်နေဂျာ'),
(6, 'smarttoy@gmail.com', '1234', '1234', 'Singapore', 21, 'admin'),
(7, 'soemoethein@gmail.com', '1234', '1234', 'Singapore', 21, 'Sales Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `com_id` (`com_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `com_id` (`com_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `companies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
