-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220808.d85cb55ddf
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 03:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_member`
--

CREATE TABLE `add_member` (
  `Id` int(255) NOT NULL,
  `Admin_Email` varchar(255) NOT NULL,
  `Admin_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_member`
--

INSERT INTO `add_member` (`Id`, `Admin_Email`, `Admin_Password`) VALUES
(2, 'afzalaaaaa@gmail.com', 'aaaaafzal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `resort_info`
--

CREATE TABLE `resort_info` (
  `no` int(255) NOT NULL,
  `resort_name` varchar(255) NOT NULL,
  `resort_mail` varchar(255) NOT NULL,
  `resort_phone` int(255) NOT NULL,
  `resort_address` varchar(255) NOT NULL,
  `resort_photos` varchar(255) NOT NULL DEFAULT 'rf1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resort_info`
--

INSERT INTO `resort_info` (`no`, `resort_name`, `resort_mail`, `resort_phone`, `resort_address`, `resort_photos`) VALUES
(5, 'shuvo', 'shuvo@gmail.com', 99098700, 'Dhaka', 'Md. Afzal Hossen.jpg'),
(19, 'newa', 'new@gmail.com', 12345, 'new', 'kiosk 1.jpg'),
(20, 'a', 'a@asfds.com', 344, 'ad', 'kiosk 3.jpg'),
(21, 'fd', 'das@gmail.com', 33, 'das', 'rf1.jpg'),
(22, 'asd', 'afzalbhola07@gmail.com', 1811178307, 'Dhaka', 'Model 3.jpg'),
(23, 'Md.Afzal Hossen', 'afzalbhola07@gmail.com', 1811178307, 'Dhaka', 'kiosk 3.jpg'),
(24, 'ff', 'afzalbhola07@gmail.com', 1811178307, 'Dhaka', 'Model 3.jpg'),
(26, 'ff', 'fff@gmail.com', 44, 'dfsfd', 't-2.jpg'),
(27, 'sdf', 'a@gmail.com', 3432, 'adsf', 'tag1.jpg'),
(28, 'adf', 'ad@gmail.com', 1111, 'dfd', 'kiosk 3.jpg'),
(29, 'asddsf', 'a@gmail.com', 333, '333', 'kiosk 1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_member`
--
ALTER TABLE `add_member`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `resort_info`
--
ALTER TABLE `resort_info`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_member`
--
ALTER TABLE `add_member`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resort_info`
--
ALTER TABLE `resort_info`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
