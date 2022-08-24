-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 07:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybank`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accno` varchar(255) NOT NULL,
  `rewards` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `acctype` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accno`, `rewards`, `balance`, `acctype`, `phone`, `date`) VALUES
('1650221826', '9876543210', '2000-03-21', 'sedan', '01966862922', '2022-04-18'),
('1650805730', 'CD1234569', '2000-03-10', 'sedan', '01711390465', '2022-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `addmoney`
--

CREATE TABLE `addmoney` (
  `transid` varchar(255) NOT NULL,
  `account` varchar(25) NOT NULL,
  `card` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addmoney`
--

INSERT INTO `addmoney` (`transid`, `account`, `card`) VALUES
('124', '1000', ''),
('125', '2000', ''),
('126', '', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `billpayment`
--

CREATE TABLE `billpayment` (
  `transid` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billpayment`
--

INSERT INTO `billpayment` (`transid`, `type`) VALUES
('150', 'hourly'),
('151', 'hourly');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `slotno` varchar(299) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rate` varchar(299) NOT NULL,
  `type` varchar(299) NOT NULL,
  `btime` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `slotno`, `time`, `rate`, `type`, `btime`) VALUES
(36, '3', '2022-04-24 17:22:55', '', 'booked', '3');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `username` varchar(255) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`username`, `empid`, `phone`, `pin`) VALUES
('Zaki', 'employee1', '01712312310', '1234'),
('Saman', 'employee2', '01712312311', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `slotno` int(10) NOT NULL,
  `location` varchar(299) NOT NULL,
  `address` varchar(299) NOT NULL,
  `rate` varchar(299) NOT NULL,
  `Pstatus` varchar(299) NOT NULL,
  `glink` varchar(299) NOT NULL,
  `type` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`slotno`, `location`, `address`, `rate`, `Pstatus`, `glink`, `type`) VALUES
(11, 'Gulshan', '100, Road 67', '50', 'Y', 'https://goo.gl/maps/fmGzqVqF9JBkVD8b6', ''),
(27, 'Mirpur 1', '14, Rd 1', '', 'Y', 'https://goo.gl/maps/SiHrJEaqbiUvZaTt5', ''),
(16, 'Motijheel', '143/A, Arambagh Old Post Office', '100', 'Y', 'https://goo.gl/maps/GCvBuvLmXHVZwdwb9', ''),
(3, 'Uttara', '16,Rabindra Sarani', '30', 'N', 'https://goo.gl/maps/bLdsmhmyA1LBqMpN8', ''),
(2, 'Gulshan', '16/2, road 10, Gulshan. ', '50', 'Y', 'https://goo.gl/maps/h8icBWBbAZLT9Adh6', ''),
(23, 'Mogbazar', '27, Road 3', '50', 'Y', 'https://goo.gl/maps/HYcSW9cTEFCNgVX47', ''),
(29, 'Kallyanpur', '3 Mirpur Road', '', 'Y', 'https://goo.gl/maps/bVAexByykZwYcDA29', ''),
(14, 'Shantinagar', '31 Peer Saheber Goli', '30', 'Y', 'https://goo.gl/maps/hdWTxEBLT8XdXgCh9', ''),
(22, 'Dhanmondi', '31/A, Road 5', '70', 'Y', 'https://goo.gl/maps/CBVK2F2wiRELab7k7', ''),
(9, 'Gulshan', '434, Road 100', '60', 'Y', 'https://goo.gl/maps/mE6cDC162v5srX2i7', ''),
(25, 'Adabar', '49, Road 4', '', 'Y', 'https://goo.gl/maps/M5iRzWNBDYWo13XP9', ''),
(15, 'Motijheel', '54, Komor Lane', '100', 'Y', 'https://goo.gl/maps/j2ediyFb1HmcFmZU7', ''),
(0, 'Banani', '57, Road 7/A', '40', 'N', 'https://goo.gl/maps/mmBygVwrtaBL3cSTA', ''),
(10, 'Baridhara', '7, Road No.10', '30', 'Y', 'https://goo.gl/maps/QdwFKULx67uDZZY49', ''),
(26, 'Mirpur 1', '81 Panir Pumper Goli', '', 'Y', 'https://goo.gl/maps/Kv79aJWFT9zx5UHR7', ''),
(13, 'Motijheel', '85/1/A', '100', 'Y', 'https://goo.gl/maps/wQwnN5TpTv1AxJJf8', ''),
(17, 'Motijheel', '93, Dhaka-1000', '100', 'Y', 'https://goo.gl/maps/DoQZE3PftcfR3xHa9', ''),
(7, 'Nikunja', 'House 120, Road 5', '50', 'Y', 'https://goo.gl/maps/Vx4ocAFNmbM29coy6', ''),
(8, 'Banani', 'House 14, Road 10', '40', 'Y', 'https://goo.gl/maps/pT7cBcFVdkD4mA7M8', ''),
(6, 'Nikunja', 'House 18, Road 9', '50', 'Y', 'https://goo.gl/maps/UMyRF6QiU63sLjok7', ''),
(5, 'Dhanmondi', 'House no. 12, 10/A, Dhanmondi. ', '90', 'Y', 'https://goo.gl/maps/CjzKxrrNgFpkyKca8', ''),
(28, 'Gabtoli', 'Karmichael Rd', '', 'Y', 'https://goo.gl/maps/cN7Siqh3NNWBMN8y5', ''),
(18, 'Ramna', 'Moulana Bhashani Rd', '30', 'Y', 'https://goo.gl/maps/uVRAMKgdHp3UoYgm9', ''),
(1, 'Uttara', 'Road 10, Sector 3', '30', 'Y', 'https://goo.gl/maps/JR8tffaVpmxK71Jz6', ''),
(21, 'Dhanmondi', 'Road 10/A', '70', 'Y', 'https://goo.gl/maps/mSU3XVoyqaN4p7di6', ''),
(24, 'Farmgate', 'Road 17', '40', 'Y', 'https://goo.gl/maps/HYcSW9cTEFCNgVX47', ''),
(30, 'Mirpur', 'Road 25', '', 'Y', 'https://goo.gl/maps/RsBs7BVphcGpsR379', ''),
(20, 'Ramna', 'Road 255', '30', 'Y', 'https://goo.gl/maps/uNGy4R83iJmg93U3A\r\n', ''),
(12, 'Gulshan', 'Road 55', '50', 'Y', 'https://goo.gl/maps/MCWggwMysXtpzuD59', ''),
(19, 'Ramna', 'Segun Bagicha Rd', '30', 'Y', 'https://goo.gl/maps/9fYTHRv4yjPYbALcA', ''),
(4, 'Uttara', 'Uttara', '30', 'Y', 'https://goo.gl/maps/KL7LWfywqVbox85b6', '');

-- --------------------------------------------------------

--
-- Table structure for table `recharge`
--

CREATE TABLE `recharge` (
  `transid` varchar(255) NOT NULL,
  `operator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recharge`
--

INSERT INTO `recharge` (`transid`, `operator`) VALUES
('129', 'grameenPhone');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportid` int(11) NOT NULL,
  `message` text NOT NULL,
  `accno` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportid`, `message`, `accno`, `date`) VALUES
(37, 'report test', '1641403736', '2022-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `sendmoney`
--

CREATE TABLE `sendmoney` (
  `transid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sendmoney`
--

INSERT INTO `sendmoney` (`transid`) VALUES
('128');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transid` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `accno` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `slot` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transid`, `amount`, `accno`, `date`, `time`, `slot`) VALUES
(150, '', '1650136584', '2022-04-20', '2022-04-19 19:13:57.537496', ''),
(151, '', '1650136584', '2022-04-20', '2022-04-19 19:29:41.401513', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `carno` varchar(299) NOT NULL,
  `model` varchar(299) NOT NULL,
  `rewar` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `nid`, `address`, `phone`, `pin`, `carno`, `model`, `rewar`) VALUES
('Raufar Mostafa', 'avro@gmail.com', '123456789', '8/A Dhanmondi, Dhaka ', '01711390465', '1234', 'Dhaka Metro KA 10-2113', 'BMW', '3000'),
('maisha', 'maliha.jahan2000@yahoo.com', '123456789', 'aftabnagar', '01966862922', '1234', '0', '', '2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accno`);

--
-- Indexes for table `addmoney`
--
ALTER TABLE `addmoney`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `billpayment`
--
ALTER TABLE `billpayment`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`time`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`address`);

--
-- Indexes for table `recharge`
--
ALTER TABLE `recharge`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `sendmoney`
--
ALTER TABLE `sendmoney`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
