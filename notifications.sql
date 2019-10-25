-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 08:19 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talents`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `content` text NOT NULL,
  `sent_to` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `related_element_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `content`, `sent_to`, `is_read`, `related_element_id`, `created_at`) VALUES
(1, 2, '/chat?other_id=21', 20, 1, 0, '2019-10-18 21:28:40'),
(2, 2, '/chat?other_id=21', 20, 1, 0, '2019-10-18 21:57:26'),
(3, 1, 'visitor  Add comment to your post', 22, 1, 1, '2019-10-24 15:13:43'),
(4, 1, 'visitor  Add comment to your post', 22, 0, 1, '2019-10-24 15:18:29'),
(5, 1, 'visitor  Add comment to your post', 22, 1, 1, '2019-10-24 16:09:07'),
(6, 1, 'visitor  Add comment to your post', 22, 1, 1, '2019-10-24 16:10:13'),
(7, 2, '/chat?other_id=23', 22, 1, 0, '2019-10-24 16:11:55'),
(8, 2, '/chat?other_id=22', 23, 1, 0, '2019-10-24 16:12:28'),
(9, 2, '/chat?other_id=23', 22, 1, 0, '2019-10-24 16:12:44'),
(10, 2, '/chat?other_id=23', 22, 1, 0, '2019-10-24 16:18:31'),
(11, 2, '/chat?other_id=22', 23, 1, 0, '2019-10-24 16:19:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
