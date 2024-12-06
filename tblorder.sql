-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 08:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcoffeeweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `ORDER_ID` varchar(255) NOT NULL,
  `PRODUCT_ID` varchar(255) NOT NULL,
  `CUSTOMER_ID` varchar(255) NOT NULL,
  `EMP_ID` varchar(255) NOT NULL,
  `PRODUCT_COST` decimal(6,2) NOT NULL,
  `QUANTITY` int(20) NOT NULL,
  `DATE` date NOT NULL,
  `TIME` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`ORDER_ID`, `PRODUCT_ID`, `CUSTOMER_ID`, `EMP_ID`, `PRODUCT_COST`, `QUANTITY`, `DATE`, `TIME`) VALUES
('O111', '2', 'CUS123', 'EMP1', '8.00', 4, '2022-05-11', '03:00:00'),
('O112', '15', 'CUS112', 'EMP1', '21.00', 5, '2022-05-28', '16:17:00'),
('O222', '1', 'CUS234', 'EMP1', '9.00', 5, '2022-05-11', '09:49:00'),
('O255', '7', 'CUS255', 'EMP1', '30.00', 5, '2022-06-10', '14:42:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`ORDER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
