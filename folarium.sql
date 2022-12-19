-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2022 at 08:31 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `folarium`
--

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` int(11) NOT NULL,
  `contract_position_id` int(11) NOT NULL,
  `contract_length` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `contract_position_id`, `contract_length`) VALUES
(17, 1, '1'),
(18, 1, '2'),
(19, 1, '3'),
(20, 1, '5'),
(21, 2, '1'),
(22, 2, '2'),
(23, 2, '3'),
(24, 3, '1'),
(25, 3, '2'),
(26, 3, '3'),
(27, 4, '1'),
(28, 4, '2'),
(29, 5, '1'),
(30, 5, '2'),
(31, 5, '3'),
(32, 6, '1'),
(33, 6, '2'),
(34, 6, '3');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_position_id` int(11) NOT NULL,
  `employee_contract_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_position_id`, `employee_contract_id`, `name`, `email`, `age`, `address`) VALUES
(3, 3, 26, 'Hanas', 'hanasbayupratama@gmail.com', 4, 'Tokyo'),
(8, 4, 27, 'Samuel', 'samuel@yahoo.com', 26, 'Surabaya'),
(10, 2, 22, 'Tom', 'tom@yahoo.com', 20, 'Makassar'),
(11, 4, 28, 'Anna Mortgage', 'annamortgage@yahoo.com', 30, 'Makassar'),
(14, 4, 28, 'Demba Ba', 'ba@gmail.com', 40, 'Makassar'),
(15, 3, 25, 'Hanas Oke', 'hanasoke@gmail.com', 23, 'Hongkong'),
(16, 4, 28, 'saia', 'saia@yahoo.com', 21, 'Surabaya'),
(17, 4, 28, 'carlos', 'carlos@yahoo.com', 29, 'Buones Aires');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position`) VALUES
(1, 'Customer Service'),
(2, 'Front End Developer'),
(3, 'FullStack Developer'),
(4, 'Chief Marketing Office'),
(5, 'Supervisor'),
(6, 'Copywriter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
