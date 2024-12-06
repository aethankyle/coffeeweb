-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 08:46 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `USERNAME`, `PASSWORD`) VALUES
(1, 'jed_miguel', 'jed'),
(2, 'quinny_lacsina', 'quinny');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CATEGORY_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGORY_ID`, `CATEGORY_NAME`) VALUES
(1, 'Coffee'),
(2, 'Pasta'),
(3, 'Cake');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `CUSTOMER_ID` varchar(9) NOT NULL,
  `CUSTOMER_NAME` char(50) NOT NULL,
  `PHONE_NUM` char(11) NOT NULL,
  `STREET` char(50) NOT NULL,
  `CITY` char(50) NOT NULL,
  `ZIP` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`CUSTOMER_ID`, `CUSTOMER_NAME`, `PHONE_NUM`, `STREET`, `CITY`, `ZIP`) VALUES
('CUS112', 'Quinny', '09652354789', '768 Rizal', 'San Fernando City', '2000'),
('CUS123', 'Jed', '09258974815', '259 Rosario', 'Angeles City', '2001'),
('CUS234', 'Alma', '09225478964', '254 Rosas', 'Angeles City', '2001'),
('CUS255', 'Jed', '09235678141', 'friend zone', 'angeles', '2009');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `EMP_ID` char(9) NOT NULL,
  `EMPF_NAME` char(50) NOT NULL,
  `EMPL_NAME` char(50) NOT NULL,
  `EMPPHONE_NUM` char(11) NOT NULL,
  `EMP_STREET` char(50) NOT NULL,
  `EMP_CITY` char(50) NOT NULL,
  `EMP_ZIP` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`EMP_ID`, `EMPF_NAME`, `EMPL_NAME`, `EMPPHONE_NUM`, `EMP_STREET`, `EMP_CITY`, `EMP_ZIP`) VALUES
('EMP1', 'Jed', 'Bartolome', '09987654321', 'HIJ', 'Angeles', '2010'),
('EMP2', 'Quinny', 'Lacsina', '09987654321', 'ABC', 'Angeles', '2010'),
('EMP3', 'Kisses', 'Reyes', '09255874654', '898 Rosas', 'Angeles City', '2001'),
('EMP4', 'Guzman', 'Almario', '09123454321', 'EFG', 'Mabalacat', '2009');

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

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `PAYMENT_ID` char(9) NOT NULL,
  `ORDER_ID` char(9) NOT NULL,
  `PAYMENT_TYPE` char(50) NOT NULL,
  `TOTAL` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`PAYMENT_ID`, `ORDER_ID`, `PAYMENT_TYPE`, `TOTAL`) VALUES
('P111', 'O112', 'Credit Card', '105'),
('P145', 'O111', 'Credit Car', '32'),
('P233', 'O222', 'Credit Card', '45'),
('P555', 'O255', 'Credit Card', '150');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `PRODUCT_ID` int(9) NOT NULL,
  `PRODUCT_NAME` char(50) NOT NULL,
  `PRODUCT_DESC` varchar(255) NOT NULL,
  `PRODUCT_COST` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_DESC`, `PRODUCT_COST`) VALUES
(1, 'Pink Capuccino', 'Coffee', '9.00'),
(2, 'Coffee Caramel', 'Coffee', '8.00'),
(3, 'Mochaccino', 'Coffee', '9.00'),
(4, 'Cafe Bombon', 'Coffee', '9.00'),
(5, 'Spaghetti Bolognese', 'Pasta', '25.00'),
(6, 'Creamy Carbonara', 'Pasta\r\n', '27.00'),
(7, 'Baked Lasgna', 'Pasta', '30.00'),
(8, 'Mac and Cheese', 'Pasta', '31.00'),
(9, 'Strawberry Shortcake', 'Pastry', '7.00'),
(10, 'Chocolate Fruit Cake', 'Pastry', '9.00'),
(11, 'French Macaroon', 'Pastry', '9.00'),
(12, 'Red Velvet', 'Pastry', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `USER_ID` int(3) NOT NULL,
  `FNAME` char(50) NOT NULL,
  `LNAME` char(50) NOT NULL,
  `USERNAME` char(50) NOT NULL,
  `PASSWORD` char(50) NOT NULL,
  `EMAIL` char(50) NOT NULL,
  `PHONE_NUM` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`USER_ID`, `FNAME`, `LNAME`, `USERNAME`, `PASSWORD`, `EMAIL`, `PHONE_NUM`) VALUES
(21, 'Jed', 'Bartolome', 'Jedm12', '25f486ef10741fcb9cc5ae85597f9cf8', 'jed@email.com', '09258748159'),
(22, 'Quinny', 'Lacsina', 'quinny', '71c6a72d1c3c94003e3e854f769c0470', 'quinny@email.com', '09258748159'),
(23, 'Alma', 'Manaloto', 'AManaloto', 'ebbc3c26a34b609dc46f5c3378f96e08', 'alma@email.com', '09254875856'),
(24, 'jed', 'bartolome', 'jed', '25f486ef10741fcb9cc5ae85597f9cf8', 'jed@email.com', '09856874845');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`PAYMENT_ID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `PRODUCT_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `USER_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
