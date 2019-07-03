-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2019 at 05:47 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Storecreator`
--

-- --------------------------------------------------------

--
-- Table structure for table `insertinventory`
--

CREATE TABLE `insertinventory` (
  `ID` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `prod_desc` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(200) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insertinventory`
--

INSERT INTO `insertinventory` (`ID`, `product_name`, `prod_desc`, `price`, `quantity`, `image`) VALUES
(1, 'Beyond Meat Burger', 'A Beyond Meat patty made from plants, topped with crisp lettuce, red onion, tomato, pickles, ketchup', 8, 97, 'images/image1.jpg'),
(2, 'Veggie burger', 'An amazing grillable Veggie Burger patty on a bun with lettuce, tomato, onion.', 9, 67, 'images/image2.jpg'),
(3, 'Grilled Chicken Burger', 'This marinated grilled chicken burgers are juicy, tender, and full of flavor.', 6, 70, 'images/image3.jpg'),
(4, 'Fried Chicken Burger', 'Fried chicken sandwich with slaw and pickles.', 8, 100, 'images/image4.jpg'),
(5, 'Big Mac', 'Mouthwatering perfection starts with two 100% pure beef patties and Big Mac®sauce sandwiched between', 11, 100, 'images/image5.jpg'),
(6, 'Pizza Burger', 'Hamburger meat were cooked in a mixture that includes tomato sauce/paste topped with shredded cheese', 15, 100, 'images/image6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `address`, `payment`) VALUES
(1, 'Shefali', 'Saproo', 'Old carriage', 'Visa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insertinventory`
--
ALTER TABLE `insertinventory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insertinventory`
--
ALTER TABLE `insertinventory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
