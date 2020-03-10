-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 05:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` varchar(12) DEFAULT NULL,
  `productID` varchar(9) DEFAULT NULL,
  `unitPrice` varchar(9) DEFAULT NULL,
  `quantity` varchar(8) DEFAULT NULL,
  `discountID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderID`, `productID`, `unitPrice`, `quantity`, `discountID`) VALUES
('201901010001', '1', '980', '1', '1'),
('201901010001', '2', '1080', '2', '1'),
('201901010001', '3', '300', '3', '1'),
('201901010001', '4', '400', '4', '1'),
('201901010001', '5', '600', '5', '1'),
('201901010001', '6', '777', '5', '1'),
('201901010001', '7', '888', '5', '1'),
('201901010001', '8', '999', '5', '1'),
('201902010002', '9', '100', '5', '2'),
('201902010002', '10', '200', '4', '2'),
('201902150001', '1', '980', '4', '2'),
('201902170001', '2', '1080', '4', '2'),
('201902200001', '3', '300', '4', '2'),
('201902260001', '4', '400', '4', '2'),
('201903020001', '5', '600', '3', '2'),
('201903040001', '6', '777', '3', '9'),
('201903040002', '7', '888', '3', '9'),
('201903040003', '8', '999', '3', '9'),
('201903050001', '9', '100', '3', '9'),
('201903090001', '10', '200', '3', '9'),
('202003060083', '3', '1800', '1', '0'),
('202003060083', '13', '1600', '1', '0'),
('202003060084', '13', '1800', '1', '0'),
('202003060084', '1', '1600', '1', '0'),
('202003060085', '6', '1750', '1', '0'),
('202003060086', '3', '1800', '1', '0'),
('202003060086', '13', '1600', '1', '0'),
('202003060086', '16', '1550', '1', '0'),
('202003060086', '61', '1100', '1', '0'),
('202003060087', '5', '1800', '1', '0'),
('202003060087', '14', '1600', '1', '0'),
('202003060087', '19', '1550', '1', '0'),
('202003060088', '4', '1800', '1', '0'),
('202003060089', '4', '1800', '1', '0'),
('202003060089', '15', '1600', '1', '0'),
('202003060090', '3', '1800', '1', '0'),
('202003060091', '5', '1800', '1', '0'),
('202003060092', '2', '1800', '1', '0'),
('202003060092', '9', '1750', '1', '0'),
('202003060092', '8', '1750', '1', '0'),
('202003060093', '5', '1800', '1', '0'),
('202003060094', '3', '1800', '1', '0'),
('202003060094', '9', '1750', '1', '0'),
('202003060094', '27', '1100', '1', '0'),
('202003060095', '3', '1800', '1', '0'),
('202003060095', '8', '1750', '1', '0'),
('202003060095', '23', '1350', '1', '0'),
('202003070001', '4', '1800', '1', '0'),
('202003070001', '9', '1750', '1', '0'),
('202003070002', '14', '1600', '1', '0'),
('202003070003', '4', '1800', '1', '0'),
('202003070004', '7', '1750', '1', '0'),
('202003080001', '4', '1800', '1', '0'),
('202003080002', '6', '1750', '1', '0'),
('202003080003', '5', '1800', '1', '0'),
('202003080004', '5', '1800', '1', '0'),
('202003080004', '10', '1750', '1', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
