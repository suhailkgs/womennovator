-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 12:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `womennovator`
--

-- --------------------------------------------------------

--
-- Table structure for table `juries`
--

CREATE TABLE `juries` (
  `id` int(10) NOT NULL,
  `provider_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ref_by` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fblink` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(10) DEFAULT NULL,
  `sector_id` int(10) DEFAULT NULL,
  `city_id` int(10) DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_fillup` int(11) NOT NULL DEFAULT 0,
  `temp_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `juries`
--

INSERT INTO `juries` (`id`, `provider_id`, `name`, `Ref_by`, `email`, `password`, `mobile_number`, `designation`, `photo`, `fblink`, `linkedin`, `instagram`, `twitter`, `company`, `industry`, `state_id`, `sector_id`, `city_id`, `description`, `created_at`, `updated_at`, `status`, `is_fillup`, `temp_id`) VALUES
(5, '3740', 'Jogan Rai', NULL, 'jogan@gmail.com', NULL, '7854869878', 'des', '6219f4c9916506.40308254.jpg', 'fb', 'jogan.linkedin', 'insta', 'twit', 'company', 'industry', 36, 74, 26, 'desc', NULL, NULL, 1, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `juries`
--
ALTER TABLE `juries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `juries`
--
ALTER TABLE `juries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
