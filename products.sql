-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 08:49 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(255) NOT NULL,
  `PRODUCT_PRICE` int(11) NOT NULL,
  `PRODUCT_ARTICLE` varchar(255) NOT NULL,
  `PRODUCT_QUANTITY` int(11) NOT NULL,
  `DATE_CREATE` date NOT NULL,
  `count` smallint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_ARTICLE`, `PRODUCT_QUANTITY`, `DATE_CREATE`, `count`) VALUES
(2, 2, 'item 2', 1, 'this is test item	', 25, '2020-10-07', 7),
(3, 5, 'item 3', 6, 'this is test item	', 23, '2020-10-01', 7),
(4, 4, 'item 4', 5, 'this is test item	', 54, '2020-10-01', 7),
(5, 3, 'item 5', 34, 'this is test item', 22, '2020-10-01', 7),
(8, 54, 'item 6', 54, 'this is test item', 22, '2020-10-02', 7),
(9, 323, 'item 7', 43, 'this is test item', 342, '2020-10-02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
