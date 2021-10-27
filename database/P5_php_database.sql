-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2021 at 09:38 AM
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
(37, 'Doe', 'Lovely to hear that', NULL, '2021-10-22 10:03:04', 22, 62),
(38, 'Doe', 'Lovely to hear that', NULL, '2021-10-22 10:04:10', 22, 62),
(40, 'Doe', 'Lovely to hear that', 1, '2021-10-22 10:05:11', 22, 43),
(41, 'Doe', 'Lovely to hear that', 1, '2021-10-22 10:07:14', 22, 62),
(42, 'Doe', 'Lovely to hear that', 1, '2021-10-22 10:07:41', 22, 62),
(43, 'jack', 'Lovely', 1, '2021-10-22 10:07:55', 22, 62),
(44, 'TomasHillSUN', 'ccccc', 1, '2021-10-22 13:12:21', 22, 62),
(45, 'TomasHillSUN', 'thanks', 1, '2021-10-26 15:16:46', 45, 62);

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
(40, 'testing', 'testing', '<p>Hello, World!</p>', NULL, '2021-10-25 14:45:46', '2021-10-25 14:45:46', 62, 'testing'),
(42, 'testing', 'testing', '<p>Hello, World!</p>', NULL, '2021-10-25 14:46:59', '2021-10-25 14:46:59', 62, 'testing'),
(43, 'testing', 'testing', '<p>Hello, World!</p>', 'Array', '2021-10-25 14:49:02', '2021-10-25 22:13:57', 62, 'testing'),
(45, 'New Post1', 'New Post', '<p>Once upon a time, there was a little girl who lived in a village near the forest.&nbsp;</p>\r\n<p>Whenever she went out, the little girl wore a red riding cloak, so everyone in the village called her Little Red Riding Hood.</p>\r\n<p>Once upon a time, there was a little girl who lived in a village near the forest.&nbsp; Whenever she went out, the little girl wore a red riding cloak, so everyone in the village called her Little Red Riding Hood.Once upon a time, there was a little girl who lived in a village near the forest.&nbsp; Whenever she went out, the little girl wore a red riding cloak, so everyone in the village called her Little Red Riding HooOnce upon a time, there was a little girl who lived in a village near the forest.&nbsp; Whenever she went out, the little girl wore a red riding cloak, so everyone in the village called her Little Red Riding Hood.</p>\r\n<p>One morning, Little Red Riding Hood asked her mother if she could go to visit her grandmother as it had been awhile since they\'d seen each other. \"That\'s a good idea,\" her mother said.&nbsp; So they packed a nice basket for Little Red Riding Hood to take to her grandmother. When the basket was ready, the little girl put on her red cloak and kissed her mother goodbye.</p>', 'public/img/fDU1n0Po/219269.jpg', '2021-10-25 21:53:23', '2021-10-27 07:52:17', 62, 'New Post');

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
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `user_type_id` int(11) DEFAULT '2',
  `reset_token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `date_create`, `user_type_id`, `reset_token`) VALUES
(1, 'Jenny', 'Chen', 'ChingyiPC', 'pelgrims.chenchingyi@gmail.com                                                                      ', '$2y$10$0LMqQp1OETmOaARw15k1mOY.xTZsCezRQyKNud16MiYh4xB7oa686', '2021-10-02 00:00:00', 1, NULL),
(22, 'joeylee1234', 'marrion', 'joeyleemarion1234', 'joeyleemarion@gmail.com', 'joeyleemarion1234', '2021-10-12 15:55:30', NULL, NULL),
(23, 'joeylee123445', 'marrion', 'joeyleemarion123445', 'joeyleemarion45@gmail.com', 'joeyleemarion123445', '2021-10-12 15:58:06', NULL, NULL),
(28, 'joeylee987456', 'marrion', 'joeylee987456', 'joeyleemarion852@gmail.com', 'joeylee987456', '2021-10-12 16:00:42', NULL, NULL),
(30, 'joeychi', 'marrion', 'joeylee', 'joeyleemario@gmail.com', 'joeylee987456', '2021-10-12 16:06:08', NULL, NULL),
(32, 'hello', 'chen', 'hellohello', 'hello@gmail.com', '123456789', '2021-10-13 14:17:55', NULL, NULL),
(33, 'lllkakllk', 'LLLK', 'lllkakllk', 'JEE@GMAIL.COM', '123456789', '2021-10-13 15:35:05', NULL, NULL),
(35, 'lllkakllk', 'LLLK', 'lllkakllk7', 'JEE1@GMAIL.COM', '123456789', '2021-10-13 15:36:29', NULL, NULL),
(36, 'ching yi', 'pelgrims', 'PeterLoz', 'ingyi@gmail.com', '123456789', '2021-10-13 16:28:45', NULL, NULL),
(41, 'Peter', 'Sam', 'PeterLoz1', 'peterjon5e@gmail.com', '123456789', '2021-10-13 16:55:54', NULL, NULL),
(43, 'jason', 'larry', 'Jasonlarry', 'jasonlarry@gmail.com', '123456789', '2021-10-13 17:48:00', NULL, NULL),
(44, 'helloopendoor', 'sam', 'sesameopendoor', 'sesameopendoor@gmail.com', '123456789', '2021-10-14 10:12:54', 2, NULL),
(45, 'albertt', 'timm', 'albertteam', 'alerb@gmail.com', '123456789', '2021-10-14 10:15:33', 2, NULL),
(48, 'albertt123', 'timm', 'albertteam12345', 'alerb12345@gmail.com', '98765432', '2021-10-14 10:22:12', 2, NULL),
(50, 'Ashley', 'Pelgrims', 'AshleyPelgrims', 'Ashley@gmail.com', '123456789', '2021-10-14 14:30:27', 2, NULL),
(51, 'JasonCunning', 'Sun', 'JCS', 'JSC@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-10-20 20:09:49', 2, NULL),
(62, 'TomasHill', 'Sun', 'TomasHillSUN', 'TomasHill@gmail.com', 'f25ded1f2365b0c450d0037161728a63', '2021-10-20 20:26:57', 1, NULL),
(63, 'Ching Yi', 'Pelgrims Chen', 'chaletsetcaviar', 'pelgrims.ssssschenchingyi@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-10-21 15:53:14', 1, NULL),
(64, 'Ching Yi', 'Pelgrims Chen', 'ChingYiCHEN', 'pelgrims.chenchisddddngyi@gmail.com', '0659c7992e268962384eb17fafe88364', '2021-10-26 13:24:00', 2, NULL),
(72, 'Peter', 'PeterPeter', 'PeterPeterPeterPeter', 'PeterPeterPeterPeter@gmail.com', 'c8ca1864d977bf6528c5e195ec09d93f', '2021-10-27 09:02:56', 2, NULL),
(73, 'HelloHello', 'HelloHello', 'HelloHello123', 'HelloHelloHello123@gmail.com', '$2y$10$Z.Mze/rIGDyuOPizfgbsGu8NSgQKnMCQs4Y101EXdPEyYn9FLFpG6', '2021-10-27 10:05:57', 2, NULL),
(75, 'testing', 'testing', 'testing', 'testing@gmail.com', '$2y$10$0LMqQp1OETmOaARw15k1mOY.xTZsCezRQyKNud16MiYh4xB7oa686', '2021-10-27 10:47:47', 2, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
