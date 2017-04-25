-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2015 at 01:26 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdcol`
--

-- --------------------------------------------------------

--
-- Table structure for table `staffdirectory`
--

CREATE TABLE IF NOT EXISTS `staffdirectory` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `lname` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `profile` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `department` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `staffdirectory`
--

INSERT INTO `staffdirectory` (`id`, `fname`, `lname`, `email`, `profile`, `department`) VALUES
(24, 'Haylee Mitchell DDS', 'Dr. Randi Jakubowski Sr.', 'Moore.Laverne@Toy.com', 'Maiores reiciendis ab sit id.', 'SMSIT'),
(25, 'Hazle Boehm', 'Jeromy O''Hara', 'pMorar@gmail.com', 'Quia eligendi est quidem.', 'SMSIT'),
(26, 'Helena Beer II', 'Mr. Kole O''Hara', 'Ahmad11@Witting.com', 'Reiciendis nihil eius facilis quasi accusamus.', 'SMSIT'),
(27, 'Lexi Collier', 'Theron Hettinger V', 'Kylie.Turner@hotmail.com', 'Eos sed aspernatur voluptatibus porro doloribus.', 'SMSIT'),
(28, 'Gia Friesen', 'Nona Hilpert', 'Lonnie57@hotmail.com', 'Porro cupiditate autem unde aliquam aut ut.', 'SMSIT'),
(29, 'Meghan Schroeder MD', 'Wilfred Roob', 'Ayden.Romaguera@Johns.biz', 'Aut quod cupiditate enim dolor facere.', 'SMSIT'),
(30, 'Alysson Koch', 'Dr. Kelsi Shanahan', 'hOKeefe@Homenick.com', 'Quisquam quis commodi quia.', 'HR'),
(31, 'Juanita McLaughlin DDS', 'Elenor Ferry III', 'Isabella.Dare@hotmail.com', 'Officiis deserunt qui accusamus.', 'HR'),
(32, 'Prof. Colleen Hudson', 'Marlen O''Hara', 'fMiller@hotmail.com', 'Dolorem quasi aut rerum et amet quidem.', 'HR'),
(33, 'Daryl Sanford', 'Mr. Kacey Donnelly', 'eMacejkovic@Jerde.net', 'Inventore maxime dolores ut nihil.', 'HR'),
(34, 'Caitlyn Tillman Sr.', 'Maximus Anderson', 'Sim.Morissette@Zieme.com', 'Sit et totam accusamus sunt.', 'HR'),
(35, 'Ettie Leuschke PhD', 'Vena Murazik', 'Stokes.Carolanne@Metz.biz', 'Nihil et commodi sunt veniam pariatur.', 'HR'),
(36, 'Sanford Harvey', 'Reyes Nitzsche I', 'Rogahn.Kylie@yahoo.com', 'Et qui voluptate provident atque repellendus.', 'ACC'),
(37, 'Prof. Kelsi Wunsch', 'Prof. Lizzie Hilpert II', 'xMorar@hotmail.com', 'Nam a eveniet dolorem qui.', 'ACC'),
(38, 'Flavio Bashirian', 'Hallie Hoeger', 'zBauch@gmail.com', 'Laudantium ipsum ea quibusdam.', 'ACC'),
(39, 'Shanon Nolan II', 'Hillary Schroeder', 'Kade.Legros@yahoo.com', 'Praesentium dolorem totam necessitatibus qui totam sunt.', 'ACC'),
(40, 'Prof. Sherwood Smitham', 'Cloyd Batz', 'Michale24@Rippin.com', 'Sapiente quia consequatur ea magnam.', 'SERV'),
(41, 'Miguel Kris', 'Verda Runolfsdottir', 'Mills.Mohammed@Kuvalis.com', 'Similique qui nesciunt rerum.', 'SERV'),
(42, 'Prof. Margot Doyle', 'Liana Harber', 'Shanel42@yahoo.com', 'Accusantium officiis rem et quo consequatur.', 'DRT'),
(43, 'Levi Douglas', 'Prof. Diego Abernathy', 'Twila.Reichert@yahoo.com', 'Nisi officia id voluptatibus sit minima.', 'SERV'),
(44, 'Karen Hodkiewicz', 'Krystina Treutel', 'Lolita.Rodriguez@hotmail.com', 'Saepe eos omnis ab.', 'DRT'),
(45, 'Antwan O''Keefe', 'Leora Strosin', 'Miller.Jason@yahoo.com', 'Iure sint voluptas harum a.', 'DRT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staffdirectory`
--
ALTER TABLE `staffdirectory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staffdirectory`
--
ALTER TABLE `staffdirectory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
