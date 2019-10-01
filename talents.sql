-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 08:51 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET FOREIGN_KEY_CHECKS=0;
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `body` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `talents_ids` set('1','2','3','4','5') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `organization_id`, `title`, `content`, `date`, `type`, `talents_ids`, `created_at`) VALUES
(1, 3, 'new Event', 'new Event', '2019-10-01 13:00:00', NULL, '1,2', '2019-10-01 20:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `talented_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `media` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `talented_id`, `body`, `media`, `created_at`) VALUES
(3, 1, 'against Burnley, but the pair have now made up. The Senegalese forward threw a strop in Liverpool\'s last outing before the international break after Salah opted not to square the ball for an easy goal, gesticulating wildly in the dugout\r\n                                after he was subbed off. But he made up for it on Saturday, scoring twice against Newcastle at Anfield to extend Liverpool\'s lead at the top of the Premier League to five points.', '5d836df819a3d-moSalah.jpg', '2019-09-19 12:00:56'),
(2, 1, 'dssdf', '5d836d1418893-Dancing.jpg', '2019-09-19 11:57:08'),
(5, 3, 'new post', '5d90f6a5cf9e6-237-536x354.jpg', '2019-09-29 18:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sent_from` int(11) NOT NULL,
  `sent_to` int(11) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `user_id`, `description`, `created_at`) VALUES
(1, 8, 'new organization', '2019-09-29 11:26:32'),
(2, 9, 'new organization', '2019-09-29 11:26:32'),
(3, 16, 'new organization', '2019-09-30 21:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `talented`
--

CREATE TABLE `talented` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `talents_ids` set('1','2','3','4') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `talented`
--

INSERT INTO `talented` (`id`, `user_id`, `talents_ids`, `created_at`) VALUES
(1, 13, '2', '2019-09-16 02:23:19'),
(3, 14, '1', '2019-09-29 11:45:26'),
(4, 15, '1,2,3', '2019-09-29 16:30:04'),
(5, 18, '1,2', '2019-09-30 21:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `talent_types`
--

CREATE TABLE `talent_types` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `talent_types`
--

INSERT INTO `talent_types` (`id`, `name`, `icon`, `created_at`) VALUES
(1, 'Playing Music', 'music-playing.jpg', '2019-09-15 14:57:38'),
(2, 'Dancing', 'dancing.png', '2019-09-15 14:57:38'),
(3, 'Writing', 'writing.png', '2019-09-15 14:57:40'),
(4, 'Singing', 'sing.png', '2019-09-15 14:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `photo` blob,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `email`, `password`, `full_name`, `photo`, `created_at`) VALUES
(13, 2, 'w@mail.com', '$2y$12$jq7Ws2RwPGBAqQhLatWyJOdgCXD7cSJj4Gswz1sOpUgImPxohog.i', 'waleed', NULL, '2019-09-14 22:11:15'),
(14, 2, 'ahmed@mail.com', '$2y$12$7au1ad2mGz6/VZ7O9iVhneNZlGIdpzq8gps48GWSo1nL4A5QxL45q', 'ahmed amadon', NULL, '2019-09-29 11:45:26'),
(15, 2, 'ahmed3@mail.com', '$2y$12$u2gMQeIQoFsW7JYXEYTShuh3yQyRQEpeAqmkcvpM9rqRM61QBg352', 'ahmed ali', NULL, '2019-09-29 16:30:04'),
(16, 3, 'ahmed22@mail.com', '$2y$12$HtoLRWjoWp8xpt.TPNh6mu.uz7Fkj06zKEQFywBCV8VrBYXQnRqFO', 'ahmed ali', NULL, '2019-09-30 21:29:54'),
(17, 2, 'ahmed202@mail.com', '$2y$12$9TCrhicnj4W44VfyUiCoyemLeFgzWH7IBPsLOL2Mm3f9jQMKaQREy', 'ahmed ali', NULL, '2019-09-30 21:31:31'),
(18, 2, 'ahmed2002@mail.com', '$2y$12$.TAHx70jem.EavZb06NuaOdpcTPcWA7cY7D1yzrIxGc6NKp1DZBQa', 'ahmed ali', NULL, '2019-09-30 21:38:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD UNIQUE KEY `unique` (`user_id`,`material_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foriegn` (`talented_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talented`
--
ALTER TABLE `talented`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_types`
--
ALTER TABLE `talent_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `talented`
--
ALTER TABLE `talented`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `talent_types`
--
ALTER TABLE `talent_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
