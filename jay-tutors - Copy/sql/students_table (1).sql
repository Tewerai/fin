-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 09:00 AM
-- Server version: 8.0.33
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jay-tutors`
--

-- --------------------------------------------------------

--
-- Table structure for table `students table`
--

CREATE TABLE `students table` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `student id` longtext NOT NULL,
  `student contact num` longtext NOT NULL,
  `parents contact` longtext NOT NULL,
  `registered on` longtext NOT NULL,
  `mathematic` varchar(255) NOT NULL DEFAULT 'not enrolled',
  `Geography` varchar(255) NOT NULL DEFAULT 'not enrolled',
  `English` varchar(255) NOT NULL DEFAULT 'not enrolled',
  `History` varchar(255) NOT NULL DEFAULT 'not enrolled',
  `gender` varchar(255) NOT NULL,
  `Combined Science` varchar(255) NOT NULL DEFAULT 'not enrolled',
  `Accounts` varchar(255) NOT NULL DEFAULT 'not enrolled',
  `Biology` varchar(255) NOT NULL DEFAULT 'not enrolled',
  `Heritage` varchar(255) NOT NULL DEFAULT 'not enrolled',
  `parents name` varchar(255) NOT NULL,
  `student in session` varchar(255) DEFAULT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students table`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `students table`
--
ALTER TABLE `students table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students table`
--
ALTER TABLE `students table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
