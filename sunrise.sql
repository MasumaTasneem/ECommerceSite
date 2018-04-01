-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2017 at 06:27 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunrise`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `ProductID` int(11) NOT NULL,
  `Options` varchar(500) NOT NULL,
  `Rating` double DEFAULT '0',
  `showAdd` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`ProductID`, `Options`, `Rating`, `showAdd`) VALUES
(12, 'The flat, compact baody fits neatly into a standard 19 inch rack', 0, 1),
(20, 'Fully equipped with TDA functions and solutions', NULL, 0),
(21, 'Easy migration to VoIP', 0, 1),
(22, 'Easy to use wireless single Line Telephone', 0, 0),
(23, 'Tough enough to stand up to harsh condition', 0, 0),
(24, 'Data sending rate is very high', 0, 1),
(25, 'Caller ID Display', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `buyerinfo`
--

CREATE TABLE `buyerinfo` (
  `UserID` int(11) NOT NULL,
  `UserAddress` varchar(100) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `addClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyerinfo`
--

INSERT INTO `buyerinfo` (`UserID`, `UserAddress`, `PhoneNumber`, `EmailAddress`, `addClient`) VALUES
(1, 'Dhanmondi', '123455', 'maisha@gmail.com', 0),
(2, 'Gulshan', '1234567', 'guffee@live.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PurchaseQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'TV'),
(2, 'home appliance'),
(3, 'PABX'),
(4, 'IP Phone'),
(5, 'Intercom'),
(6, 'FAX'),
(7, 'Telephone set'),
(8, 'CC Camera'),
(9, 'G');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `PaymentMethod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `PaymentMethod`) VALUES
(1, 'Cash on delivery');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Specification` varchar(500) NOT NULL,
  `UnitPrice` double NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `CategoryID`, `Specification`, `UnitPrice`, `Quantity`) VALUES
(11, 'KX-NCP500', 4, 'KX-NCP Series', 2000, 200),
(12, 'KX-NCP100', 4, 'KX-NCP Series', 2500, 199),
(15, 'KX-NCP1000', 4, 'KX-NCP Series', 2500, 200),
(16, 'KX-TDE100', 4, 'KX-TDE Series', 4000, 200),
(17, 'KX-TDE100', 4, 'KX-TDE Series', 4000, 200),
(18, 'KX-TDE100', 4, 'KX-TDE Series', 4000, 200),
(19, 'KX-TDE100', 4, 'KX-TDE Series', 4000, 200),
(20, 'KX-TDE600', 4, 'KX-TDE Series', 3500, 500),
(21, 'KX-TDA100D', 4, 'KX-TDA', 5000, 300),
(22, 'KX-WT115', 7, 'DECT Wireless System', 5000, 200),
(23, 'KX-TCA275', 7, 'KX-TCA', 4000, 500),
(24, 'KX-TBV50', 6, 'KX-TBV', 10000, 200),
(25, 'KX-T7735', 5, 'KX-T', 2000, 599);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `PurchaseQuantity` int(11) NOT NULL,
  `UnitPrice` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PaymentID` int(11) NOT NULL,
  `confirm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`PurchaseID`, `UserID`, `ProductID`, `PurchaseQuantity`, `UnitPrice`, `Quantity`, `Date_Time`, `PaymentID`, `confirm`) VALUES
(1, 1, 6, 0, 15000, 1, '2017-02-10 12:36:42', 1, 0),
(2, 1, 7, 0, 13700, 1, '2017-02-10 18:35:32', 1, 1),
(3, 1, 1, 0, 700, 1, '2017-02-10 18:33:26', 1, 1),
(4, 1, 9, 0, 200, 1, '2017-02-10 12:44:06', 1, 0),
(5, 1, 1, 0, 700, 1, '2017-02-10 13:23:39', 1, 0),
(6, 1, 3, 1, 4500, 0, '2017-02-11 03:28:55', 1, 0),
(7, 1, 6, 1, 15000, 0, '2017-02-11 03:28:55', 1, 0),
(8, 2, 6, 1, 15000, 0, '2017-02-11 03:50:20', 1, 0),
(9, 1, 12, 1, 2500, 0, '2017-02-11 05:20:55', 1, 1),
(10, 1, 25, 1, 2000, 0, '2017-02-11 05:18:09', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `RateID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`RateID`, `ProductID`, `UserID`, `Rating`) VALUES
(26, 2, 1, 2),
(27, 2, 1, 2),
(28, 4, 1, 2),
(29, 4, 1, 2),
(30, 4, 2, 3),
(31, 4, 2, 3),
(32, 8, 2, 1),
(33, 8, 2, 1),
(34, 5, 2, 2),
(35, 5, 2, 2),
(36, 5, 2, 5),
(37, 5, 2, 5),
(38, 1, 2, 3),
(39, 1, 2, 3),
(40, 4, 2, 1),
(41, 4, 2, 1),
(42, 4, 2, 5),
(43, 4, 2, 5),
(44, 4, 2, 4),
(45, 4, 2, 4),
(46, 4, 1, 3),
(47, 4, 1, 3),
(48, 4, 1, 2),
(49, 4, 1, 2),
(50, 5, 1, 1),
(51, 5, 1, 1),
(52, 1, 1, 1),
(53, 1, 1, 1),
(54, 1, 1, 1),
(55, 1, 1, 1),
(56, 1, 1, 5),
(57, 1, 1, 5),
(58, 1, 1, 5),
(59, 1, 1, 5),
(60, 7, 1, 1),
(61, 7, 1, 1),
(62, 7, 1, 5),
(63, 7, 1, 5),
(64, 2, 1, 5),
(65, 2, 1, 5),
(66, 3, 1, 1),
(67, 3, 1, 1),
(68, 3, 1, 5),
(69, 3, 1, 5),
(70, 6, 1, 2),
(71, 6, 1, 2),
(72, 6, 2, 5),
(73, 6, 2, 5),
(74, 6, 2, 1),
(75, 6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Review` varchar(500) NOT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `ProductID`, `UserID`, `Review`, `Date_Time`) VALUES
(2, 6, 2, 'hi!', '2017-02-09 15:58:28'),
(4, 6, 2, 'Hello', '2017-02-09 17:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserID`, `UserName`, `FirstName`, `LastName`, `Password`) VALUES
(1, 'HelloWorld', 'Hello', 'World', '1234'),
(2, 'Guffee94', 'Da', 'Guffee', '098'),
(3, 'Maisha', 'Masuma', 'Tasneem', '13594'),
(4, 'Sarah', 'Sarah', 'Tabassum', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `buyerinfo`
--
ALTER TABLE `buyerinfo`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`RateID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `RateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
