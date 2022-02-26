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
-- Table structure for table `community_we_pitch`
--

CREATE TABLE `community_we_pitch` (
  `id` int(11) NOT NULL,
  `we_pitch_title` varchar(255) NOT NULL,
  `we_pitch_poster` varchar(255) NOT NULL,
  `we_pitch_mode` varchar(255) NOT NULL,
  `we_pitch_start_date` varchar(255) NOT NULL,
  `we_pitch_end_date` varchar(255) NOT NULL,
  `we_pitch_from` varchar(255) NOT NULL,
  `we_pitch_to` varchar(255) NOT NULL,
  `we_pitch_desc` text NOT NULL,
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
-- Dumping data for table `community_we_pitch`
--

INSERT INTO `community_we_pitch` (`id`, `we_pitch_title`, `we_pitch_poster`, `we_pitch_mode`, `we_pitch_start_date`, `we_pitch_end_date`, `we_pitch_from`, `we_pitch_to`, `we_pitch_desc`, `community_id`, `community_name`, `creator_id`, `status`, `is_drafted`, `state`, `city`, `sector`, `type`, `jury`, `faces`, `event_link`, `attendees`) VALUES
(3, 'First we pitch event', '6215c7d1703f96.89902628.jpg', 'offline', '2022-02-27', '2022-02-28', '11:06', '16:08', 'First we pitch event Content', 99, 'Mystic', 3740, 1, 0, 'none', 'none', 'none', 'we_pitch', 'none', 'none', 'none', 0),
(4, 'Test we-pitch event 1', '62186879266d21.83228658.jpg', 'online', '2022-02-26', '2022-03-04', '12:00', '15:00', 'Test we-pitch event 1 desc', 99, 'Mystic', 3740, 1, 0, '36', '348', NULL, 'we_pitch', 'none', 'none', 'none', 0),
(5, 'Test we-pitch event 2', '6218691fbc5a66.27495792.jpg', 'online', '2022-02-25', '2022-02-27', '10:00', '12:00', 'Test we-pitch event 2 desc', 99, 'Mystic', 3740, 0, 1, 'none', 'none', 'none', 'we_pitch', 'none', 'none', 'none', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_we_pitch`
--
ALTER TABLE `community_we_pitch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_we_pitch`
--
ALTER TABLE `community_we_pitch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
