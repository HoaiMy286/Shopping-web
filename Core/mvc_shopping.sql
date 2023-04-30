-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 10:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'green'),
(2, 'red'),
(3, 'black');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` mediumint(9) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `gender` varchar(5) NOT NULL,
  `src` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `type`, `gender`, `src`, `status`) VALUES
(1, 'Nike_1', 3000000, 'shoes', 'men', './Assets/ImageProducts/shoes/Nike Zoom KD 12.png', 1),
(2, 'Nike_2', 2000000, 'shoes', 'women', './Assets/ImageProducts/shoes/Nike Zoom KD 12.png', 1),
(3, 'Nike_3', 2000000, 'shoes', 'men', './Assets/ImageProducts/shoes/Nike Zoom KD 12.png', 1),
(4, 'Nike_4', 2000000, 'shoes', 'men', './Assets/ImageProducts/shoes/Nike Zoom KD 12.png', 1),
(5, 'ecko_1', 5000000, 'hat', 'women', './Assets/ImageProducts/hat/ecko.jpg\"', 1),
(6, 'ecko_2', 5000000, 'hat', 'women', './Assets/ImageProducts/hat/ecko.jpg\"', 1),
(7, 'ecko_3', 5000000, 'hat', 'men', './Assets/ImageProducts/hat/ecko.jpg\"', 1),
(8, 'Adidas_1', 8388607, 'jacket', 'men', './Assets/ImageProducts/jacket/adidas.jpg\"', 1),
(9, 'Adidas_2', 8388607, 'jacket', 'men', './Assets/ImageProducts/jacket/adidas.jpg\"', 1),
(10, 'Adidas_3', 8388607, 'jacket', 'women', './Assets/ImageProducts/jacket/adidas.jpg\"', 1),
(11, 'Adidas_4', 8388607, 'jacket', 'women', './Assets/ImageProducts/jacket/adidas.jpg\"', 1),
(12, 'Adidas_5', 8388607, 'jacket', 'men', './Assets/ImageProducts/jacket/adidas.jpg\"', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

CREATE TABLE `quantity` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`id`, `id_product`, `id_color`, `quantity`) VALUES
(3, 8, 1, 300),
(4, 1, 1, 300),
(5, 2, 2, 20),
(6, 3, 3, 30),
(7, 4, 2, 340),
(8, 5, 3, 50),
(9, 6, 1, 300),
(10, 7, 3, 20),
(13, 10, 2, 50),
(14, 11, 1, 320),
(15, 12, 3, 220),
(16, 8, 3, 30),
(17, 3, 1, 340);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quantity`
--
ALTER TABLE `quantity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_color` (`id_color`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quantity`
--
ALTER TABLE `quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quantity`
--
ALTER TABLE `quantity`
  ADD CONSTRAINT `quantity_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `quantity_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
