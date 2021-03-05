-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 12:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS orders;
CREATE TABLE `orders` (
  `orderId` int(12) NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT current_timestamp(),
  `usrnm` varchar(255) NOT NULL,
  `itemId` int(12) NOT NULL,
  `itemName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `orderDate`, `usrnm`, `itemId`, `itemName`) VALUES
(3, '0000-00-00 00:00:00', 'Admin', 2, 'Apple'),
(4, '2021-02-08 20:09:52', 'Admin', 2, 'grg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS products;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(512) NOT NULL,
  `imageRef` varchar(255) DEFAULT NULL,
  `price` int(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `imageRef`, `price`, `stock`, `created`) VALUES
(1, 'Apple', 'Robust and crunchy', 'assets/productImages/download.jpg', 100, 250, '2021-02-15'),
(2, 'Pear', 'Robust and crunchier', 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Pears.jpg', 100, 250, '2021-02-15'),
(5, 'Pear', 'Robust and crunchier', 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Pears.jpg', 100, 250, '2021-02-15'),
(7, 'Pear', 'Robust and crunchier', 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Pears.jpg', 100, 250, '2021-02-15'),
(8, 'Pear', 'Robust and crunchier', 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Pears.jpg', 100, 250, '2021-02-15'),
(9, 'Pear', 'Robust and crunchier', 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Pears.jpg', 100, 250, '2021-02-15'),
(10, 'Apple', 'Robust and crunchy', 'assets/productImages/download.jpg', 100, 250, '2021-02-15'),
(11, 'Apple', 'Robust and crunchy', 'assets/productImages/download.jpg', 100, 250, '2021-02-15'),
(12, 'Apple', 'Robust and crunchy', 'assets/productImages/download.jpg', 100, 250, '2021-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS card_details; -- Foreign key constrain means this needs to happen first
DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usrType` int(1) NOT NULL DEFAULT 0,
  `usrnm` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `sName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usrType`, `usrnm`, `fName`, `sName`, `email`, `pwd`) VALUES
(1, 'Admin', 'Group', 'Project', 'email@domain.name', '$2y$10$QoEiVuUCSzxH1mZMZl55cu/GyVwvU3KA5H5ZXNvy.XmFmyR.1mt4G');

-- Non-admin sample users

INSERT INTO `users` (`usrType`, `usrnm`, `fName`, `sName`, `email`, `pwd`, `created`) VALUES
(0, 'Bob', 'Robert', 'McGill', 'rmcgill@gmail.com', '$2y$10$/Pf0ZCTClu2DDezB6XrZBuzQBdbTAAZb4LRr33Y1pKJBSJC6ckyq.', '2021-03-05');

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `cardNumber` varchar(16) NOT NULL,
  `securityCode` varchar(3) NOT NULL,
  `expiry` date NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (id),
  FOREIGN KEY (userID) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sample card details
--

INSERT INTO `card_details` (userID, cardNumber, securityCode, expiry) VALUES
(2, "1234567891011121", "456", "2022-03-01");

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
