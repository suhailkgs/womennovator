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
-- Table structure for table `community_normal_event`
--

CREATE TABLE `community_normal_event` (
  `id` int(11) NOT NULL,
  `normal_event_title` varchar(255) NOT NULL,
  `normal_event_poster` varchar(255) NOT NULL,
  `normal_event_mode` varchar(255) NOT NULL,
  `normal_event_start_date` varchar(255) NOT NULL,
  `normal_event_end_date` varchar(255) NOT NULL,
  `normal_event_from` varchar(255) NOT NULL,
  `normal_event_to` varchar(255) NOT NULL,
  `normal_event_desc` text NOT NULL,
  `community_id` int(11) NOT NULL,
  `community_name` varchar(255) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `is_drafted` int(11) NOT NULL DEFAULT 0,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `jury` varchar(255) DEFAULT NULL,
  `faces` varchar(255) DEFAULT NULL,
  `event_link` varchar(255) DEFAULT NULL,
  `attendees` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_normal_event`
--

INSERT INTO `community_normal_event` (`id`, `normal_event_title`, `normal_event_poster`, `normal_event_mode`, `normal_event_start_date`, `normal_event_end_date`, `normal_event_from`, `normal_event_to`, `normal_event_desc`, `community_id`, `community_name`, `creator_id`, `status`, `is_drafted`, `state`, `city`, `sector`, `type`, `jury`, `faces`, `event_link`, `attendees`) VALUES
(5, 'First Normal Event', '6215c137f35da8.70501514.jpg', 'online', '2022-02-26', '2022-02-28', '16:00', '18:00', '<h3 style=\"font-family: Poppins, sans-serif; font-weight: 700; line-height: 1.1; margin-bottom: 0.8em; font-size: 16px;\"><span style=\"font-size: 0.875rem; font-weight: 400;\">Happening this Monday, around you, the event you’ve all been waiting for -- Festival in a Box!!!!</span><br></h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 20px; font-family: Poppins, sans-serif;\">Special treats this time around</p><ul style=\"margin-bottom: 20px; padding-left: 30px; color: rgb(51, 51, 51); font-family: Poppins, sans-serif; font-size: 17px;\"><li style=\"font-size: 14px; line-height: 20px; color: rgb(0, 0, 0);\">Talk by self-made entrepreneur Rupali Chopra</li><li style=\"font-size: 14px; line-height: 20px; color: rgb(0, 0, 0);\">A dropping by, veteran author and coloumist Rashmi Seth</li></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 20px; font-family: Poppins, sans-serif;\">Events you can win awards under</p><ul style=\"margin-bottom: 20px; padding-left: 30px; color: rgb(51, 51, 51); font-family: Poppins, sans-serif; font-size: 17px;\"><li style=\"font-size: 14px; line-height: 20px; color: rgb(0, 0, 0);\">Most Profitable Week award</li><li style=\"font-size: 14px; line-height: 20px; color: rgb(0, 0, 0);\">Wonder Women of the Month award</li></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 20px; font-family: Poppins, sans-serif;\">To participate for these awards, apply here --&nbsp;<a style=\"color: rgb(51, 122, 183); transition: all 0.2s ease-in-out 0s;\">bit.ly/southmumbaiawards</a></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 20px; font-family: Poppins, sans-serif;\">Call here is case of doubts -- +91 7053020016</p>', 99, 'Mystic', 3740, 1, 0, '36', '416', NULL, 'normal_event', 'none', 'none', 'none', 1),
(6, 'Second Normal Event', '6215c6d26300f0.55394240.jpg', 'online', '2022-02-21', '2022-02-22', '10:00', '13:00', 'Second Normal Event Content', 99, 'Mystic', 3740, 1, 0, '36', '26', NULL, 'normal_event', 'none', 'none', 'none', 0),
(7, 'Testing event 1', '6218661777d747.35953320.jpg', 'online', '2022-02-25', '2022-02-27', '10:00', '12:00', 'test event 1 desc', 99, 'Mystic', 3740, 1, 0, '36', '352', NULL, 'normal_event', 'none', 'none', 'none', 0),
(8, 'Testing event 2', '62186685c8be69.90124668.jpg', 'offline', '2022-02-26', '2022-02-28', '05:00', '06:00', 'test event 2 desc', 99, 'Mystic', 3740, 0, 1, 'none', 'none', 'none', 'normal_event', 'none', 'none', 'none', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_normal_event`
--
ALTER TABLE `community_normal_event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_normal_event`
--
ALTER TABLE `community_normal_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
