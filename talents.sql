-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 05:45 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talents`
--
CREATE DATABASE IF NOT EXISTS `talents` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `talents`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `body` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `announcements`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


TRUNCATE TABLE `events`;

--
-- Truncate table before insert `comments`
--

TRUNCATE TABLE `comments`;
-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `unique` (`user_id`,`material_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `likes`
--

TRUNCATE TABLE `likes`;
-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `talented_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `media` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `foriegn` (`talented_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `talented_id`, `body`, `media`, `created_at`) VALUES
(1, 1, 'k\r\n', NULL, '2019-09-15 19:26:15'),
(2, 1, 'njjk', '5d7e98bd65a76-Capture.PNG', '2019-09-15 20:02:05');

--
-- Truncate table before insert `materials`
--

TRUNCATE TABLE `materials`;
--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `talented_id`, `body`, `media`, `created_at`) VALUES
(3, 1, 'against Burnley, but the pair have now made up. The Senegalese forward threw a strop in Liverpool\'s last outing before the international break after Salah opted not to square the ball for an easy goal, gesticulating wildly in the dugout\r\n                                after he was subbed off. But he made up for it on Saturday, scoring twice against Newcastle at Anfield to extend Liverpool\'s lead at the top of the Premier League to five points.', '5d836df819a3d-moSalah.jpg', '2019-09-19 12:00:56'),
(2, 1, 'dssdf', '5d836d1418893-Dancing.jpg', '2019-09-19 11:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sent_from` int(11) NOT NULL,
  `sent_to` int(11) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `messages`
--

TRUNCATE TABLE `messages`;
-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `organizations`
--

TRUNCATE TABLE `organizations`;
--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `user_id`, `description`) VALUES
(1, 8, 'new organization'),
(2, 9, 'new organization');

-- --------------------------------------------------------

--
-- Table structure for table `talented`
--

DROP TABLE IF EXISTS `talented`;
CREATE TABLE IF NOT EXISTS `talented` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `talents_ids` set('1', '2', '3', '4') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `talented`
--

TRUNCATE TABLE `talented`;
--
-- Dumping data for table `talented`
--

INSERT INTO `talented` (`id`, `user_id`, `talents_ids`) VALUES
(1, 1, '1,2'),
(2, 6, '1,2');

-- --------------------------------------------------------

--
-- Dumping data for table `talented`
--

INSERT INTO `talented` (`id`, `user_id`, `talent_type`, `created_at`) VALUES
(1, 13, 1, '2019-09-15 19:23:19');

--
-- Truncate table before insert `talent_types`
--

TRUNCATE TABLE `talent_types`;
--
-- Dumping data for table `talent_types`
--

INSERT INTO `talent_types` (`id`, `name`, `craeted_at`) VALUES
(1, 'music', '2019-09-19 14:50:32'),
(2, 'dancing', '2019-09-19 14:50:32'),
(3, 'poetry', '2019-09-19 14:50:37'),
(4, 'creative writing', '2019-09-19 14:50:37'),
(5, 'painting', '2019-09-19 14:51:14'),
(6, 'singing', '2019-09-19 14:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `image` blob
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `full_name`, `type`, `image`) VALUES
(1, 'mail@gmail.com', '$2y$12$A66R/I681czBHfZXfn14keOUcs0QrpvvXLfvJ/u35Yj8YdsTr5fw6', 'abdo', 'abdo abouzaid', 2, NULL),
(6, 'mail2@gmail.com', '$2y$12$OFdINr0bDDiD1nJQHk5K8O439X7GHXhH6abn2u5bXU9A9.raP438O', 'abdo2', 'abdo2', 2, NULL),
(8, 'mail3@gmail.com', '$2y$12$ESszfjdhSWXDMfLM6vFZfu0x3zbRkPaLqp5.VUjLJpCRlf/ehdv9m', 'mail3', 'abdo', 3, NULL),
(9, 'mail4@gmail.com', '$2y$12$Q1onKrykstsYCL/Kz4IZfOcXsHrg0XaC3pgAlwFKh8O9xy6v90kVS', 'mail33', 'abdo', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--

DROP TABLE IF EXISTS `talent_types`;
CREATE TABLE IF NOT EXISTS `talent_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `talent_types`
--

INSERT INTO `talent_types` (`id`, `name`, `created_at`) VALUES
(1, 'music', '2019-09-15 14:57:38'),
(2, 'poetry', '2019-09-15 14:57:38'),
(3, 'creative writing', '2019-09-15 14:57:40'),
(4, 'sing', '2019-09-15 14:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `photo` blob,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `username`, `email`, `password`, `full_name`, `photo`, `created_at`) VALUES
(13, 2, 'walwwd', 'w@mail.com', '$2y$12$jq7Ws2RwPGBAqQhLatWyJOdgCXD7cSJj4Gswz1sOpUgImPxohog.i', 'waleed', NULL, '2019-09-14 22:11:15');
COMMIT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `talented`
--
ALTER TABLE `talented`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `talent_types`
--
ALTER TABLE `talent_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
