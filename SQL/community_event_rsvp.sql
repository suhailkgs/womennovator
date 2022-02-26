-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 12:54 PM
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
-- Table structure for table `community_event_rsvp`
--

CREATE TABLE `community_event_rsvp` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `linkedin_link_co` varchar(255) DEFAULT NULL,
  `is_incoperated` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `community_website` varchar(255) DEFAULT NULL,
  `is_incubator` varchar(255) NOT NULL,
  `expertise` varchar(255) DEFAULT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `applying_reason` varchar(255) DEFAULT NULL,
  `pitch_link` varchar(255) DEFAULT NULL,
  `video` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_event_rsvp`
--

INSERT INTO `community_event_rsvp` (`id`, `event_id`, `event_type`, `user_id`, `linkedin_link`, `linkedin_link_co`, `is_incoperated`, `company_name`, `community_website`, `is_incubator`, `expertise`, `progress`, `applying_reason`, `pitch_link`, `video`) VALUES
(1, 5, 'normal_event', 3740, 'https://linkendin/gourab', 'https://linkendin/gourab/paul', 'yes', 'ITC', 'https://website/itc.com', 'no', 'technology', 'on going', 'testing', 'https://youtube.com/pitch', '62185fe48122e3.20507500.mkv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_event_rsvp`
--
ALTER TABLE `community_event_rsvp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_event_rsvp`
--
ALTER TABLE `community_event_rsvp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
