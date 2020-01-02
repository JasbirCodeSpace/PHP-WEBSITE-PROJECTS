-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 05:00 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--
CREATE DATABASE IF NOT EXISTS `foodshala` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodshala`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `food_item` varchar(30) NOT NULL,
  `restaurant_name` varchar(30) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`name`, `email`, `food_item`, `restaurant_name`, `count`) VALUES
('Jasbir', 'shikhawat.jasbir@gmail.com', 'BBQ CHICKEN WINGS', 'Dhaakad - desi food in style', 4),
('Jasbir', 'shikhawat.jasbir@gmail.com', 'CHOCOLATE FUDGECAKE', 'Sagar Ratna', 2),
('Jasbir', 'shikhawat.jasbir@gmail.com', 'Lassi', 'Dhaakad - desi food in style', 2),
('Jasbir', 'shikhawat.jasbir@gmail.com', 'MEAT FEAST PIZZA', 'Sagar Ratna', 1),
('Jasbir', 'shikhawat.jasbir@gmail.com', 'MIXED SALAD', 'Sagar Ratna', 1),
('Jasbir', 'shikhawat.jasbir@gmail.com', 'Mojito', 'Sagar Ratna', 2),
('Jasbir', 'shikhawat.jasbir@gmail.com', 'SPICY MEATBALLS', 'Sagar Ratna', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `add_line_1` varchar(50) NOT NULL,
  `add_line_2` varchar(50) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `preferred_food` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `name`, `password`, `add_line_1`, `add_line_2`, `city`, `zip_code`, `contact`, `preferred_food`) VALUES
('msk4862@gmail.com', 'Shoaib Asgar', '1234', '35, A-2, Pocket A-2, Pocket 2, Sector 3, Rohini', NULL, 'Delhi', '110085', '9213399235', 'Non-Vegetarian'),
('shikhawat.jasbir@gmail.com', 'Jasbir', '1234', 'B-696 Madipur Colony', '', 'Delhi', '110063', '8375836278', 'Vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `food_item` varchar(30) NOT NULL,
  `restaurant_name` varchar(30) NOT NULL,
  `restaurant_email` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `food_type` varchar(15) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`food_item`, `restaurant_name`, `restaurant_email`, `price`, `food_type`, `category`) VALUES
('BBQ CHICKEN WINGS', 'Dhaakad - desi food in style', 'dhaakad@gmail.com', 385, 'Non-Vegetarian', 'Starters'),
('CHICKEN TIKKA MASALA', 'Dhaakad - desi food in style', 'dhaakad@gmail.com', 280, 'Non-Vegetarian', 'Main Dishes'),
('Lassi', 'Dhaakad - desi food in style', 'dhaakad@gmail.com', 80, 'Vegetarian', 'Drinks'),
('CHOCOLATE FUDGECAKE', 'Sagar Ratna', 'saagarratna@gmail.com', 230, 'Vegetarian', 'Deserts'),
('GARLIC BREAD', 'Sagar Ratna', 'saagarratna@gmail.com', 150, 'Vegetarian', 'Starters'),
('MEAT FEAST PIZZA', 'Sagar Ratna', 'saagarratna@gmail.com', 465, 'Non-Vegetarian', 'Main Dishes'),
('MIXED SALAD', 'Sagar Ratna', 'saagarratna@gmail.com', 160, 'Vegetarian', 'Starters'),
('Mojito', 'Sagar Ratna', 'saagarratna@gmail.com', 120, 'Vegetarian', 'Drinks'),
('SPICY MEATBALLS', 'Sagar Ratna', 'saagarratna@gmail.com', 440, 'Non-Vegetarian', 'Main Dishes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `user_email` varchar(30) NOT NULL,
  `restaurant_email` varchar(30) NOT NULL,
  `food_item` varchar(30) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_email`, `restaurant_email`, `food_item`, `count`) VALUES
('', 'dhaakad@gmail.com', 'CHICKEN TIKKA MASALA', 1),
('shikhawat.jasbir@gmail.com', 'dhaakad@gmail.com', 'BBQ CHICKEN WINGS', 4),
('shikhawat.jasbir@gmail.com', 'dhaakad@gmail.com', 'Lassi', 2),
('shikhawat.jasbir@gmail.com', 'saagarratna@gmail.com', 'CHOCOLATE FUDGECAKE', 2),
('shikhawat.jasbir@gmail.com', 'saagarratna@gmail.com', 'GARLIC BREAD', 2),
('shikhawat.jasbir@gmail.com', 'saagarratna@gmail.com', 'MEAT FEAST PIZZA', 1),
('shikhawat.jasbir@gmail.com', 'saagarratna@gmail.com', 'MIXED SALAD', 1),
('shikhawat.jasbir@gmail.com', 'saagarratna@gmail.com', 'Mojito', 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `add_line_1` varchar(50) NOT NULL,
  `add_line_2` varchar(50) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `delivery` text NOT NULL,
  `delivery_fee` int(10) UNSIGNED NOT NULL,
  `min_delivery_amount` int(10) UNSIGNED NOT NULL,
  `free_delivery_amount` int(10) UNSIGNED NOT NULL,
  `monday_to_friday_time` varchar(20) NOT NULL,
  `saturday_time` varchar(20) NOT NULL,
  `sunday_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`email`, `contact`, `name`, `password`, `description`, `add_line_1`, `add_line_2`, `city`, `zip_code`, `delivery`, `delivery_fee`, `min_delivery_amount`, `free_delivery_amount`, `monday_to_friday_time`, `saturday_time`, `sunday_time`) VALUES
('dhaakad@gmail.com', '7303891002', 'Dhaakad - desi food in style', '1234', NULL, '35, A-2, Pocket A-2, Pocket 2, Sector 3, Rohini', NULL, 'Delhi', '110085', 'Yes', 100, 500, 2000, '12:00to00:00', '12:00to00:00', '12:00to00:00'),
('saagarratna@gmail.com', '1142376471', 'Sagar Ratna', '1234', NULL, 'A-6, Chaudhary Balbir Singh Marg,', ' Pocket 7, A 5B Block, Paschim Vihar', 'Delhi', '110063', 'Yes', 100, 700, 2000, '9:00to11:30', '9:00to11:30', '9:00to11:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`email`,`food_item`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`restaurant_email`,`food_item`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`user_email`,`restaurant_email`,`food_item`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
