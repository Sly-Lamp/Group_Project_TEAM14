-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 03:43 PM
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
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `cardNumber` varchar(16) NOT NULL,
  `securityCode` varchar(3) NOT NULL,
  `expiry` date NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`id`, `userID`, `cardNumber`, `securityCode`, `expiry`, `created`) VALUES
(4, 2, '1234567891011121', '456', '2022-03-01', '2021-03-15'),
(6, 1, '1234567891234567', '878', '0000-00-00', '2021-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `homecontent`
--

CREATE TABLE `homecontent` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homecontent`
--

INSERT INTO `homecontent` (`id`, `text`, `created`, `updated`) VALUES
(1, '<p style=\'color:red;\'> Hello 😃 <br><br><br><br><b style=\'color: black;\'>*NOTE:</b> When using inline styles please use single quotes as opposed to double, as it will mess up the scripts!</p>', '2021-03-19 15:30:00', '2021-03-22 15:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

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
(3, '0000-00-00 00:00:00', 'Admin', 2, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

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
(1, 'Apple', 'Robust and crunchy', 'https://indianapublicmedia.org/stateimpact/files/2013/01/apple-image.jpg', 100, 250, '2021-02-15'),
(2, 'Pear', 'Robust and crunchier', 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Pears.jpg', 100, 250, '2021-02-15'),
(3, 'Papaya', 'More Robust and crunchy', 'https://media.istockphoto.com/photos/two-half-cut-of-ripe-papaya-with-seeds-isolated-on-white-background-picture-id1025189776?s=612x612', 250, 100, '2021-03-18'),
(4, 'Strawberries', 'Delicious, but not robust nor crunchy', 'https://i.imgur.com/qyGHL7z.jpg', 500, 500, '0000-00-00'),
(5, 'Bannaannnnaaaa', 'Edible, but full of potassium. Not reccomended if you have a heart', 'https://joanfruit.com/imagecache/custom/ff86993f3754009600e9b9789a140e96.jpeg', 500, 500, '2021-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(22, 'rmcgill@gmail.com', '320513feaa83f785', '$2y$10$mjf3AMeTR77nfZMlG1Jv4uRb1UlzVkZ26oIjG8rdgByuTRUECz8Oa', '1616600712');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usrType` int(1) NOT NULL DEFAULT 0,
  `usrnm` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `sName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usrType`, `usrnm`, `fName`, `sName`, `email`, `pwd`, `created`) VALUES
(1, 1, 'Admin', 'Group', 'Project', 'email@domain.name', '$2y$10$QoEiVuUCSzxH1mZMZl55cu/GyVwvU3KA5H5ZXNvy.XmFmyR.1mt4G', '2021-02-07'),
(2, 0, 'Bob', 'Robert', 'McGill', 'rmcgill@gmail.com', '$2y$10$/Pf0ZCTClu2DDezB6XrZBuzQBdbTAAZb4LRr33Y1pKJBSJC6ckyq.', '2021-03-05'),
(3, 0, 'test', 'Test', 'User', 'test@user.com', '$2y$10$utE5SyP5l4TuL6UQPRwCeuLhF7T2m.cQvPEizetoQNbk5kkZautmS', '2021-03-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `homecontent`
--
ALTER TABLE `homecontent`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_details`
--
ALTER TABLE `card_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `homecontent`
--
ALTER TABLE `homecontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card_details`
--
ALTER TABLE `card_details`
  ADD CONSTRAINT `card_details_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
