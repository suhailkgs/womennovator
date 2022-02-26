-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 12:55 PM
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
-- Table structure for table `community_resource`
--

CREATE TABLE `community_resource` (
  `id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `community_name` varchar(255) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `resource_title` varchar(255) NOT NULL,
  `resource_content` text NOT NULL,
  `resource_image` varchar(255) DEFAULT NULL,
  `resource_file` varchar(255) DEFAULT NULL,
  `resource_date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_resource`
--

INSERT INTO `community_resource` (`id`, `community_id`, `community_name`, `creator_id`, `resource_title`, `resource_content`, `resource_image`, `resource_file`, `resource_date`, `status`) VALUES
(1, 99, 'Mystic', 3740, 'First Resource', 'First Resource', '621602e284cbc9.28114684.png', '621602e2866847.36613281.pdf', 'Wednesday, 23 February, 2022', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_resource`
--
ALTER TABLE `community_resource`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_resource`
--
ALTER TABLE `community_resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
