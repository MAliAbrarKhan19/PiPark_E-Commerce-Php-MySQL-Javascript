-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2021 at 08:46 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pipark`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(100) NOT NULL,
  `inv_id` varchar(255) DEFAULT NULL,
  `inv_time` varchar(255) DEFAULT NULL,
  `inv_date` varchar(255) DEFAULT NULL,
  `inv_name` varchar(255) DEFAULT NULL,
  `inv_email` varchar(255) DEFAULT NULL,
  `inv_mobile` varchar(255) DEFAULT NULL,
  `inv_address` varchar(255) DEFAULT NULL,
  `inv_destaddress` varchar(255) DEFAULT NULL,
  `inv_total` double DEFAULT NULL,
  `inv_shippingcharge` double DEFAULT NULL,
  `inv_vat` double DEFAULT NULL,
  `inv_grandtotal` double DEFAULT NULL,
  `inv_inwords` varchar(255) DEFAULT '',
  `inv_delivery` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `inv_id`, `inv_time`, `inv_date`, `inv_name`, `inv_email`, `inv_mobile`, `inv_address`, `inv_destaddress`, `inv_total`, `inv_shippingcharge`, `inv_vat`, `inv_grandtotal`, `inv_inwords`, `inv_delivery`) VALUES
(34, '2109090978678062', ' 09:29:59 am', '09,Sep,2021, Thursday', 'pial', 'p@gmail.com', '1234566778', 'daulatpur', 'deana', 720, 50, 108, 878, 'EIGHT HUNDRED SEVENTY EIGHT TAKA ONLY', NULL),
(35, '2109220978660874', ' 09:20:30 am', '22,Sep,2021, Wednesday', '786', 'email@mail.com', '0191218912', '786 sikdar vila, khulna', '786 sikdar vila, khulna', 120, 50, 18, 188, 'ONE HUNDRED EIGHTY EIGHT TAKA ONLY', 'on the way'),
(36, '2109221178611069', ' 11:27:30 am', '22,Sep,2021, Wednesday', '786', 'bnn@vvhv.kjk', '779998798787798', '786 sjkajksnlnsln', '786 sikdar vila, khulna', 350, 50, 52.5, 452.5, 'FOUR HUNDRED FIFTY TWO AND FIFTY ZERO TAKA ONLY', 'canceled'),
(37, '210922127867877', ' 12:44:12 pm', '22,Sep,2021, Wednesday', '786', '', '0191218912', 'vjjvjvjhvjhv', '786 sikdar vila, khulna', 350, 50, 52.5, 452.5, 'FOUR HUNDRED FIFTY TWO AND FIFTY ZERO TK ONLY', NULL),
(38, '2109220478620548', ' 04:45:37 pm', '22,Sep,2021, Wednesday', 'Nu', 'emai.@Email.com', '0182131313', 'moulovi para', 'moulovi para', 230, 50, 34.5, 314.5, 'THREE HUNDRED TEN FOUR AND FIFTY ZERO TK ONLY', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inv_orders`
--

CREATE TABLE `inv_orders` (
  `order_sl` int(100) NOT NULL,
  `inv_id` varchar(255) DEFAULT NULL,
  `inv_cartno` int(100) NOT NULL,
  `sl` int(100) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_price` double DEFAULT NULL,
  `item_quantity` int(100) DEFAULT NULL,
  `item_total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_orders`
--

INSERT INTO `inv_orders` (`order_sl`, `inv_id`, `inv_cartno`, `sl`, `item_name`, `item_price`, `item_quantity`, `item_total`) VALUES
(11, '2020090207860090806', 5, 12, 'Pizza', 400, 1, 400),
(10, '2020090207860090806', 4, 13, 'Mutton Biriany', 87, 2, 174),
(9, '2020090207860090806', 3, 10, 'spicy-chicken-burgers', 30, 3, 90),
(8, '2020090207860090806', 2, 9, 'Mutton burger and French fry', 370, 1, 370),
(12, '2020090207860090806', 6, 11, 'avocado-bun-burgers', 500, 1, 500),
(13, '2020090207860034715', 1, 6, 'Hajir Biriany', 120, 2, 240),
(14, '2020090207860034715', 2, 9, 'Mutton burger and French fry', 370, 1, 370),
(15, '2020090207860034715', 3, 13, 'Mutton Biriany', 87, 7, 609),
(19, '2020090207860035614', 1, 7, 'Spicy Chicken Burgers', 230, 1, 230),
(20, '2020090207860035614', 2, 10, 'spicy-chicken-burgers', 30, 4, 120),
(21, '2020090207860035614', 3, 9, 'Mutton burger and French fry', 370, 4, 1480),
(22, '2020090207860035614', 5, 6, 'Hajir Biriany', 120, 6, 720),
(23, '2020090207860035802', 1, 7, 'Spicy Chicken Burgers', 230, 2, 460),
(24, '2020090207860035802', 2, 10, 'spicy-chicken-burgers', 30, 4, 120),
(25, '2020090207860035802', 3, 9, 'Mutton burger and French fry', 370, 4, 1480),
(26, '2020090207860035802', 5, 6, 'Hajir Biriany', 120, 6, 720),
(27, '2009020478644093', 1, 7, 'Spicy Chicken Burgers', 230, 2, 460),
(28, '2009020478644093', 2, 10, 'spicy-chicken-burgers', 30, 4, 120),
(29, '2009020478644093', 3, 9, 'Mutton burger and French fry', 370, 4, 1480),
(30, '2009020478644093', 5, 6, 'Hajir Biriany', 120, 6, 720),
(31, '200902047867674', 1, 7, 'Spicy Chicken Burgers', 230, 2, 460),
(32, '200902047867674', 2, 10, 'spicy-chicken-burgers', 30, 4, 120),
(33, '200902047867674', 3, 9, 'Mutton burger and French fry', 370, 4, 1480),
(34, '200902047867674', 5, 6, 'Hajir Biriany', 120, 6, 720),
(58, '2109090978678062', 1, 9, 'Mutton burger and French fry', 370, 1, 370),
(36, '2009020478667110', 2, 10, 'spicy-chicken-burgers', 30, 4, 120),
(37, '2009020478667110', 3, 9, 'Mutton burger and French fry', 370, 4, 1480),
(38, '2009020478667110', 5, 6, 'Hajir Biriany', 120, 6, 720),
(44, '2009060678610071', 1, 9, 'Mutton burger and French fry', 370, 1, 370),
(40, '2009050478663136', 1, 13, 'Mutton Biriany', 87, 1, 87),
(41, '2009050478663136', 2, 6, 'Hajir Biriany', 120, 3, 360),
(42, '2009050478663136', 3, 12, 'Pizza', 400, 1, 400),
(43, '2009050478663136', 4, 10, 'spicy-chicken-burgers', 30, 2, 60),
(45, '2009060678610071', 2, 10, 'spicy-chicken-burgers', 30, 4, 120),
(46, '2009060978630248', 1, 7, 'Spicy Chicken Burgers', 230, 13, 2990),
(47, '2009060978630248', 2, 6, 'Hajir Biriany', 120, 4, 480),
(48, '2009060978630248', 3, 0, '', 0, 0, 0),
(49, '2010010878621512', 1, 21, 'Burger Naga', 375, 2, 750),
(50, '2010010878621512', 2, 0, '', 0, 0, 0),
(59, '2109090978678062', 2, 7, 'Spicy Chicken Burgers', 230, 1, 230),
(60, '2109090978678062', 3, 6, 'Hajir Biriany', 120, 1, 120),
(61, '2109090978678062', 4, 0, '', 0, 0, 0),
(62, '2109220978660874', 1, 6, 'Hajir Biriany', 120, 1, 120),
(63, '2109221178611069', 1, 7, 'Spicy Chicken Burgers', 230, 1, 230),
(64, '2109221178611069', 2, 6, 'Hajir Biriany', 120, 1, 120),
(65, '210922127867877', 1, 7, 'Spicy Chicken Burgers', 230, 1, 230),
(66, '210922127867877', 2, 6, 'Hajir Biriany', 120, 1, 120),
(67, '2109220478620548', 1, 7, 'Spicy Chicken Burgers', 230, 1, 230);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `sl` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_des` varchar(255) DEFAULT NULL,
  `item_price` int(100) DEFAULT NULL,
  `item_img` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`sl`, `item_name`, `item_des`, `item_price`, `item_img`) VALUES
(7, 'Spicy Chicken Burgers', 'Spicy  soft Chicken with Burgers', 230, './img/dd7822b4b7802ced3651044d13b51a36.jpg'),
(6, 'Hajir Biriany', 'Hajir Biriany with beef and rice of high quality.', 120, './img/biriany-1.jpg'),
(19, 'Mutton Biriany', 'Mutton Biriany with beef and rice of high quality.', 3000, './img/biriany-Mutton.jpg'),
(10, 'spicy-chicken-burgers', 'spicy-chicken-burgers-3', 30, './img/spicy-chicken-burgers-3.jpg'),
(9, 'Mutton burger and French fry', 'Mutton burger and French fry by Burger point', 370, './img/burgers-3.jpg'),
(11, 'avocado-bun-burgers', 'Natural Green avocado-bun-burgers-', 500, './img/avocado-bun-burgers-11a.jpg'),
(12, 'Pizza', 'Onion Chicken pizza', 400, './img/pizza-3.jpg'),
(20, 'Chicken Khajana', 'Chicken Khajana- fried chicken with delicious masala', 370, './img/chicken khajana.jpg'),
(21, 'Burger Naga', 'Burger Naga', 375, './img/photo-1571091718767-18b5b1457add.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_orders`
--
ALTER TABLE `inv_orders`
  ADD PRIMARY KEY (`order_sl`),
  ADD KEY `inv_id` (`inv_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `inv_orders`
--
ALTER TABLE `inv_orders`
  MODIFY `order_sl` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
