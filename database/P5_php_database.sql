-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2021 at 07:38 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p5phpblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `author` varchar(45) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  `date_create` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `author`, `comment`, `valid`, `date_create`, `post_id`, `user_id`) VALUES
(34, 'Doe', 'Lovely to hear that', 1, '2021-10-22 10:02:15', 22, 62),
(35, 'Doe', 'Lovely to hear that', NULL, '2021-10-22 10:02:16', 22, 62),
(37, 'Doe', 'Lovely to hear that', NULL, '2021-10-22 10:03:04', 22, 62),
(38, 'Doe', 'Lovely to hear that', NULL, '2021-10-22 10:04:10', 22, 62),
(40, 'Doe', 'Lovely to hear that', NULL, '2021-10-22 10:05:11', 22, 43),
(41, 'Doe', 'Lovely to hear that', 1, '2021-10-22 10:07:14', 22, 62),
(42, 'Doe', 'Lovely to hear that', 1, '2021-10-22 10:07:41', 22, 62),
(43, 'jack', 'Lovely', 1, '2021-10-22 10:07:55', 22, 62),
(44, 'TomasHillSUN', 'ccccc', NULL, '2021-10-22 13:12:21', 22, 62);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `chapo` longtext NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `category` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `chapo`, `content`, `image`, `date_create`, `date_update`, `user_id`, `category`) VALUES
(15, 'I love PHP', 'I love PHP', 'I love PHP', NULL, '2021-10-18 14:56:10', '2021-10-22 11:00:00', 1, 'I love PHP'),
(21, 'hhh', 'hhh', 'hhh', NULL, '2021-10-19 16:01:49', '2021-10-22 11:00:00', 1, 'hhh'),
(22, 'ddd', 'ddd', '<p>Hello, World!</p>', NULL, '2021-10-19 16:11:25', '2021-10-22 11:00:00', 1, 'ddd'),
(25, 'Hello', 'Hello', '<p>Hello, World!</p>', NULL, '2021-10-22 10:40:03', '2021-10-22 11:00:00', 62, 'Hello'),
(29, 'new post testingcc', 'new post testingnew post testing', '<p>Hello, World!</p>', NULL, '2021-10-22 11:17:06', '2021-10-22 11:25:44', 62, 'new post testing'),
(30, 'testing', 'testing', '<p>Hello, World!</p>', NULL, '2021-10-22 11:29:34', '2021-10-22 11:29:34', 62, 'testing'),
(31, 'testing', 'testing', '<p>testing</p>', '', '2021-10-25 12:37:59', '2021-10-25 14:39:59', 62, 'testing'),
(38, 'hi', 'testing', '<p>testing</p>', 'hi', '2021-10-25 14:08:18', '2021-10-25 14:39:46', 63, 'hi'),
(39, 'hi', 'hi', 'hi', 'public/img/cbKvSNcS/219269.jpg', '2021-10-25 14:11:53', '2021-10-25 14:11:53', 63, 'hi'),
(40, 'testing', 'testing', '<p>Hello, World!</p>', NULL, '2021-10-25 14:45:46', '2021-10-25 14:45:46', 62, 'testing'),
(42, 'testing', 'testing', '<p>Hello, World!</p>', NULL, '2021-10-25 14:46:59', '2021-10-25 14:46:59', 62, 'testing'),
(43, 'testing', 'testing', '<p>Hello, World!</p>', 'public/img/ShsnhOQC/219269.jpg', '2021-10-25 14:49:02', '2021-10-25 15:26:57', 62, 'testing'),
(44, 'imagePath', 'Testing', '<p>Hello, World!</p>', 'public/img/FjMOD62S/219269.jpg', '2021-10-25 15:18:11', '2021-10-25 15:26:42', 62, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_type_id` int(11) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `date_create`, `user_type_id`) VALUES
(1, 'Jenny', 'Chen', 'ChingyiPC', 'pelgrims.chenchingyi@gmail.com                                                                      ', '92320939', '2021-10-02 00:00:00', 1),
(4, 'peter', 'jone', 'peterJone01', 'peterjone@gmail.com', '1234567', '2021-10-12 14:18:57', NULL),
(19, 'hello', 'Simson', 'LauSimson', 'simson.lau@gmail.com', '050412345', '2021-10-12 15:45:28', NULL),
(21, 'joeylee', 'marrion', 'joeyleemarion', 'joeylee@gmail.com', 'joeyleemarion1', '2021-10-12 15:52:20', NULL),
(22, 'joeylee1234', 'marrion', 'joeyleemarion1234', 'joeyleemarion@gmail.com', 'joeyleemarion1234', '2021-10-12 15:55:30', NULL),
(23, 'joeylee123445', 'marrion', 'joeyleemarion123445', 'joeyleemarion45@gmail.com', 'joeyleemarion123445', '2021-10-12 15:58:06', NULL),
(28, 'joeylee987456', 'marrion', 'joeylee987456', 'joeyleemarion852@gmail.com', 'joeylee987456', '2021-10-12 16:00:42', NULL),
(30, 'joeychi', 'marrion', 'joeylee', 'joeyleemario@gmail.com', 'joeylee987456', '2021-10-12 16:06:08', NULL),
(32, 'hello', 'chen', 'hellohello', 'hello@gmail.com', '123456789', '2021-10-13 14:17:55', NULL),
(33, 'lllkakllk', 'LLLK', 'lllkakllk', 'JEE@GMAIL.COM', '123456789', '2021-10-13 15:35:05', NULL),
(35, 'lllkakllk', 'LLLK', 'lllkakllk7', 'JEE1@GMAIL.COM', '123456789', '2021-10-13 15:36:29', NULL),
(36, 'ching yi', 'pelgrims', 'PeterLoz', 'ingyi@gmail.com', '123456789', '2021-10-13 16:28:45', NULL),
(41, 'Peter', 'Sam', 'PeterLoz1', 'peterjon5e@gmail.com', '123456789', '2021-10-13 16:55:54', NULL),
(43, 'jason', 'larry', 'Jasonlarry', 'jasonlarry@gmail.com', '123456789', '2021-10-13 17:48:00', NULL),
(44, 'helloopendoor', 'sam', 'sesameopendoor', 'sesameopendoor@gmail.com', '123456789', '2021-10-14 10:12:54', 2),
(45, 'albertt', 'timm', 'albertteam', 'alerb@gmail.com', '123456789', '2021-10-14 10:15:33', 2),
(48, 'albertt123', 'timm', 'albertteam12345', 'alerb12345@gmail.com', '98765432', '2021-10-14 10:22:12', 2),
(50, 'Ashley', 'Pelgrims', 'AshleyPelgrims', 'Ashley@gmail.com', '123456789', '2021-10-14 14:30:27', 2),
(51, 'JasonCunning', 'Sun', 'JCS', 'JSC@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-10-20 20:09:49', 2),
(62, 'TomasHill', 'Sun', 'TomasHillSUN', 'TomasHill@gmail.com', 'f25ded1f2365b0c450d0037161728a63', '2021-10-20 20:26:57', 1),
(63, 'Ching Yi', 'Pelgrims Chen', 'chaletsetcaviar', 'pelgrims.ssssschenchingyi@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-10-21 15:53:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`) VALUES
(1, 'administrator'),
(2, 'reader');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_post1_idx` (`post_id`),
  ADD KEY `fk_comment_user1_idx` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_user1_idx` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`,`email`),
  ADD KEY `fk_user_user_type_idx` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_type` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
