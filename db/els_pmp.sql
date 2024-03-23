-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 11:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `els_pmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `name`, `email`, `mobile`) VALUES
(11, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(12, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(13, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(14, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(15, 'Dipty Mohapatra', 'dipti@jetsmartis.com', 8018887342),
(16, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(17, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(18, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(19, 'Rajanikanta Biswal', 'rajanikanta.v1@gmail.com', 8018886342),
(20, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(21, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(22, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(23, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(24, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(25, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(26, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(27, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(28, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(29, 'Rajanikanta Biswal', 'rajanikanta.v1@gmail.com', 8018886342),
(30, 'Rajanikanta Biswal', 'rajanikanta.v1@gmail.com', 8018886342),
(31, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(32, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(33, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(34, 'Urmimala Swain', 'urmimalaswain03@gmail.com', 9348507285),
(35, 'Rajanikanta Biswal', 'rajanikanta.v1@gmail.com', 8018886342),
(36, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(37, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(38, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342),
(39, 'Rajanikanta Biswal', 'rajanikantabiswal15@gmail.com', 8018886342);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
