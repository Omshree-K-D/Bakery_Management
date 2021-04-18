-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 01:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managements`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `Order_ID` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`Order_ID`, `total_quantity`, `total`) VALUES
(1, 27, 1470),
(2, 29, 2850),
(3, 26, 1050),
(4, 2, 3500),
(5, 3, 1270);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(30) NOT NULL,
  `user_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL,
  `full_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `admin_code` int(30) NOT NULL,
  `department` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_name`, `password`, `status`, `full_name`, `admin_code`, `department`) VALUES
(1, 'gayatri', '123', 'normal', 'Gayatri Pawar', 3, 'Bakery'),
(3, 'shree', '123', 'admin', 'Amar Gosavi', 1, 'Bakery'),
(11, 'sarvesha', '123', 'normal', 'Sarvesha Sawant', 3, 'Bakery'),
(12, 'purva', '123', 'normal', 'Sakpal Purva', 3, 'Bakery'),
(30, 'albert', '123', 'normal', 'Albert', 3, 'Bakery');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(5, 'Cafe Mocha ', 'cake5.jpg', 400.00),
(4, 'Coco Coffee Delight Bust', 'cake4.jpg', 350.00),
(2, 'Coco Vanilla ', 'cake2.jpg', 300.00),
(3, 'Vanila Coco Blast', 'cake3.jpg', 450.00),
(1, 'Chocolate Delight', 'cake1.jpg', 300.00),
(6, 'Choco Berry', 'cake6.jpg', 400.00),
(7, 'Cupcake puff', 'cupcake2.jpg', 450.00),
(8, 'Muffeins Special', 'cupcake3.jpg', 500.00),
(9, 'Vaneela Berry Cupcake', 'cupcake4.jpg', 500.00),
(10, 'Margarita Cupcakes', 'cupcake5.jpg', 550.00),
(11, 'Mesthi Donuts Combo', 'Donut1.jpg', 700.00),
(12, 'Jelly Doughnut', 'Donut3.jpg', 600.00),
(13, 'Strawberry Frosted Doughnut', 'Donuts2.jpg', 650.00),
(14, 'Fluffy milk bread', 'snacks1.jpg', 30.00),
(15, 'Ban Pav', 'snacks2.jpg', 20.00),
(16, 'Samosa Plate', 'snacks3.jpg', 24.00),
(17, 'Butter', 'snackscover.jpg', 30.00),
(18, 'Kaju Katri', 'sweets1.jpg', 800.00),
(19, 'Kaju Roll', 'sweets2.jpg', 900.00),
(20, 'Roas Gulla', 'sweets4.jpg', 500.00),
(21, 'Gulab Jamun', 'sweets5.jpg', 650.00),
(22, 'Motichur Laddu', 'sweets6.jpg', 420.00),
(23, 'Kesar Barfi', 'sweets7.jpg', 700.00),
(24, 'Coconut Burfi', 'sweets8.jpg', 270.00),
(26, 'Diwali Big Bucket', '607bf75bb854c3.05090455.jpg', 2000.00),
(25, 'Maha Raja Bucket', '607bf51d353573.36848771.jpg', 1500.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`,`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
