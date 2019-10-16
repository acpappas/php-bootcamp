-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2019 at 01:43 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(12, '::1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_text`) VALUES
(1, 'Books'),
(2, 'eBooks');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` text CHARACTER SET latin1 NOT NULL,
  `customer_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `customer_pass` varchar(255) CHARACTER SET latin1 NOT NULL,
  `customer_country` text CHARACTER SET latin1 NOT NULL,
  `customer_city` text CHARACTER SET latin1 NOT NULL,
  `customer_contact` varchar(255) CHARACTER SET latin1 NOT NULL,
  `customer_address` text CHARACTER SET latin1 NOT NULL,
  `customer_image` text CHARACTER SET latin1 NOT NULL,
  `customer_ip` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(31, 'Chloe', 'clongmor@student.wethinkcode.co.za', '683c54da62080138b0367c00ce4702b7c63c4a68e8a3f621be74a931987bf36d06a0861fa6507a8e6ec507104722c8e145fddb957825d666c6df220f1df2d9c7', 'South Africa', 'Cape Town', '22222', '57 Waterfront', '42.png', '::1'),
(32, 'Alexandra', 'apappas@student.wethinkcode.co.za', 'connect', 'South Africa', 'Cape Town', '111111', '56 Waterfront', '42.png', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(100) NOT NULL,
  `genre_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_text`) VALUES
(1, 'Fiction'),
(2, 'Sci-fi and Fantasy'),
(3, 'Non-Fiction'),
(4, 'Academic');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_type` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_author` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_image` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_type`, `product_title`, `product_author`, `product_price`, `product_image`, `product_desc`, `product_keywords`) VALUES
(9, 1, 1, 'The Giver of Stars', 'Jojo Moyes', 199, 'giverofstars.jpg', 'New Release', 'fiction, book, moyes, jojo, giver, stars'),
(10, 1, 1, 'Cilka\'s Journey', 'Heather Morris', 305, 'CilkasJourney.jpg', 'Sequel to the Tattooist of Auschwitz', 'fiction,book,morris,cilka,journey'),
(11, 1, 1, 'The Testaments', 'Margaret Atwood', 435, 'Testaments.jpeg', 'Sequel to the Handmaid\'s tale', 'fiction,book,testaments,atwood'),
(12, 1, 1, 'The Guardian of Lies', 'Kate Furnivall', 250, 'guardianoflies.jpeg', 'New Release', 'fiction,book,furnivall'),
(13, 1, 1, 'Cari Mora', 'Thomas Harris', 305, 'carimora.jpg', 'From the Author of the Hannibal Lector series', 'fiction,book,harris,cari mora');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
