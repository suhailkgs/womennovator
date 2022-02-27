-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 11:29 AM
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
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `poc_name` varchar(255) NOT NULL,
  `poc_email` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `contribution` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `partnership_agreement` varchar(50) DEFAULT NULL,
  `interact_as_partner_others` varchar(255) DEFAULT NULL,
  `program_updates` varchar(50) DEFAULT NULL,
  `social_handles` varchar(255) DEFAULT NULL,
  `nominate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_fillup` int(11) NOT NULL DEFAULT 0,
  `temp_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `poc_name`, `poc_email`, `business_name`, `mobile`, `provider_id`, `contribution`, `logo`, `partnership_agreement`, `interact_as_partner_others`, `program_updates`, `social_handles`, `nominate`, `created_at`, `updated_at`, `state_id`, `city_id`, `status`, `is_fillup`, `temp_id`) VALUES
(3, 'Ram Techs', 'ramtech@gmail.com', 'Technology', '9564785426', 3740, 'Contribution', '621b3fec539b64.02222803.png', 'partnership', NULL, 'programs', 'social', NULL, '2022-02-27 09:04:55', NULL, 36, 348, 1, 1, NULL),
(5, 'Jaya Clinic', 'jaya@gmail.com', 'Technology', '9564785426', NULL, 'Contribution', '621b423dcdb1c5.82790234.jpg', 'partnership', NULL, 'programs', 'social', NULL, '2022-02-27 09:19:57', NULL, 36, 216, 1, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
