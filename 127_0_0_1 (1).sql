-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 04:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engage`
--
CREATE DATABASE IF NOT EXISTS `engage` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `engage`;

-- --------------------------------------------------------

--
-- Table structure for table `facerecog`
--

CREATE TABLE `facerecog` (
  `slno` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `budget_slab` varchar(15) NOT NULL,
  `contact_number` varchar(14) NOT NULL,
  `email` varchar(20) NOT NULL,
  `premium_products` varchar(200) NOT NULL,
  `average_product` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `additional` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facerecog`
--

INSERT INTO `facerecog` (`slno`, `name`, `budget_slab`, `contact_number`, `email`, `premium_products`, `average_product`, `image`, `additional`) VALUES
(1, 'Isha Rastogi', '10000-12000', '06389083604', 'isharastogii123@gmai', 'Sketchers Elite Flex , Gucci Handbag', 'Cadbury Dairy Milk Silk ', '/Components/face_recognition/images/saved_img_1.jpg', '1. Needs a new pair of sneakers, will buy it next time '),
(2, '-', '-', '-', '-', '-', '-', '/Components/face_recognition/images/saved_img_2.jpg', '-');

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE `objects` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `count` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`id`, `name`, `count`) VALUES
(1, 'bottle', '0'),
(2, 'chair', '0'),
(3, 'person', ' :1 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facerecog`
--
ALTER TABLE `facerecog`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `objects`
--
ALTER TABLE `objects`
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facerecog`
--
ALTER TABLE `facerecog`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
