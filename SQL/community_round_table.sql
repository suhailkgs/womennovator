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
-- Table structure for table `community_round_table`
--

CREATE TABLE `community_round_table` (
  `id` int(11) NOT NULL,
  `round_table_title` varchar(255) NOT NULL,
  `round_table_poster` varchar(255) NOT NULL,
  `round_table_mode` varchar(255) NOT NULL,
  `round_table_start_date` varchar(255) NOT NULL,
  `round_table_end_date` varchar(255) NOT NULL,
  `round_table_from` varchar(255) NOT NULL,
  `round_table_to` varchar(255) NOT NULL,
  `round_table_desc` text NOT NULL,
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
  `attendees` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_round_table`
--

INSERT INTO `community_round_table` (`id`, `round_table_title`, `round_table_poster`, `round_table_mode`, `round_table_start_date`, `round_table_end_date`, `round_table_from`, `round_table_to`, `round_table_desc`, `community_id`, `community_name`, `creator_id`, `status`, `is_drafted`, `state`, `city`, `sector`, `type`, `jury`, `faces`, `event_link`, `attendees`) VALUES
(3, 'First Round Table', '6215c758ed6dc7.85447214.jpg', 'online', '2022-02-19', '2022-02-20', '08:00', '10:00', 'First Round Table Content', 99, 'Mystic', 3740, 1, 0, '36', '376', NULL, 'round_table', 'none', 'none', 'none', 0),
(4, 'Test round_table event 1', '621867d44711c6.28890127.jpg', 'online', '2022-02-22', '2022-02-23', '05:05', '08:09', 'Test round_table event 1 desc', 99, 'Mystic', 3740, 1, 0, '36', '216', NULL, 'round_table', 'none', 'none', 'none', 0),
(5, 'Test round_table event 2', '62186824756195.44266671.jpg', 'online', '2022-02-26', '2022-03-01', '15:00', '16:00', 'Test round_table event 2 desc', 99, 'Mystic', 3740, 0, 1, 'none', 'none', 'none', 'round_table', 'none', 'none', 'none', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_round_table`
--
ALTER TABLE `community_round_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_round_table`
--
ALTER TABLE `community_round_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
