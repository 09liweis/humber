-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2017 at 09:48 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animals`
--

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `officecode` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `postalcode` varchar(15) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`officecode`, `city`, `phone`, `address`, `state`, `country`, `postalcode`, `photo`) VALUES
('1', 'San Francisco', '+1 650 219 4782', '100 Market Street', 'CA', 'USA', '94080', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTcqqAXBMzeCK-e5cr5df_kerScx2_8TBVx_qhX-zrMKlk1tPcm'),
('2', 'Boston', '+1 215 837 0825', '1550 Court Place', 'MA', 'USA', '02107', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQ_8L5Z_0_ozEzC8hJhO1-r32j9Ei6BKKWnKKj2ljY6aFkEKWMk'),
('3', 'NYC', '+1 212 555 3000', '523 East 53rd Street', 'NY', 'USA', '10022', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQN9rP6t3BlJUvQcCOBY2etsmoO4AKYPnkJHKqQWJlsAjPjVwpd'),
('4', 'Paris', '+33 14 723 4404', '43 Rue Jouffroy D''abbans', NULL, 'France', '75017', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtdgNwOauL0FIkR0EIIS8wA8lysU3ROSYpGXxPDxG-9kln8w7J'),
('5', 'Tokyo', '+81 33 224 5000', '4-1 Kioicho', 'Chiyoda-Ku', 'Japan', '102-8578', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4-1D35a4NSx7dMKDV9f7fUg-9d4HKKx4YzwBe66CmUVbke3YF'),
('6', 'Sydney', '+61 2 9264 2451', '5-11 Wentworth Avenue', NULL, 'Australia', 'NSW 2010', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTf011Ln20g5kjerF3AazLot7N8Rk3wWcMq17M6Afu6zSEJyRrj'),
('7', 'London', '+44 20 7877 2041', '25 Old Broad Street', NULL, 'UK', 'EC2N 1HN', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTCL421oCTenwreeFtvX4hhsRynlOMIT3HtpT2incUcMvvPNJwa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`officecode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
