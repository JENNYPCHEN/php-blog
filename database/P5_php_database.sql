-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2021 at 12:05 PM
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
(37, 'Doe', 'Lovely to hear that', 1, '2021-10-22 10:03:04', 22, 62),
(38, 'Doe', 'Lovely to hear that', 1, '2021-10-22 10:04:10', 22, 62),
(40, 'Doe', 'Lovely to hear that', 1, '2021-10-22 10:05:11', 22, 43),
(41, 'Doe', 'Lovely to hear that', 1, '2021-10-22 10:07:14', 22, 62),
(43, 'jack', 'Lovely', 1, '2021-10-22 10:07:55', 22, 62),
(47, 'ChingyiPC', 'Hello here', 1, '2021-11-02 09:13:22', 43, 1);

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
(22, 'ddd', 'ddd', '<p>Hello, World!</p>', NULL, '2021-10-19 16:11:25', '2021-10-22 11:00:00', 1, 'ddd'),
(25, 'Hello', 'Hello', '<p>Hello, World!</p>', NULL, '2021-10-22 10:40:03', '2021-10-22 11:00:00', 62, 'Hello'),
(29, 'new post testingcc', 'new post testingnew post testing', '<p>Hello, World!</p>', NULL, '2021-10-22 11:17:06', '2021-10-22 11:25:44', 62, 'new post testing'),
(40, 'testing', 'testing', '<p>Hello, World!</p>', NULL, '2021-10-25 14:45:46', '2021-10-25 14:45:46', 62, 'testing'),
(42, 'testing', 'testing', '<p>Hello, World!</p>', NULL, '2021-10-25 14:46:59', '2021-10-25 14:46:59', 62, 'testing'),
(43, 'testing', 'testing', '<p>Hello, World!</p>', 'public/img/qifp6dpR/1.jpg', '2021-10-25 14:49:02', '2021-10-28 14:53:48', 62, 'testing'),
(46, 'Qui suis-je ?', 'J\'aime les défis. J\'étudie actuellement le langage PHP.', '<p>Je suis un amateur de d&eacute;fis. J\'ai suivi une formation d\'enseignante en &eacute;cole primaire &agrave; Hong Kong, puis j\'ai fini par enseigner au Royaume-Uni.&nbsp; Apr&egrave;s avoir ma&icirc;tris&eacute; l\'anglais et le syst&egrave;me &eacute;ducatif anglais, j\'ai d&eacute;m&eacute;nag&eacute; en France pour apprendre la langue fran&ccedil;aise et maintenant la langue PHP !</p>\r\n<p>Le codage est une comp&eacute;tence que j\'aurais aim&eacute; d&eacute;couvrir plus t&ocirc;t dans ma vie. Cela me rappelle quand j\'&eacute;tais &agrave; l\'&eacute;cole, comment je passais la plupart de mes temps de pause &agrave; essayer de r&eacute;soudre les devoirs de maths avec mes amis !</p>\r\n<p>Le codage dans mon caf&eacute; et la m&eacute;ditation. C\'est vrai que j\'ai parfois du mal, mais c\'est un sentiment tr&egrave;s agr&eacute;able quand vous pouvez finalement r&eacute;soudre le probl&egrave;me et construire votre propre projet !</p>', 'public/img/fWCLyNUT/php-logo.jpeg', '2021-11-03 09:28:58', '2021-11-03 09:29:41', 1, 'Presentation'),
(47, 'mon premier projet : site web professionnel avec wordpress', 'site web professionnel avec wordpress', '<p>Il s\'agit d\'un projet pour ma formation de d&eacute;veloppeur php. J\'ai appris &agrave; choisir le bon plugin et &agrave; cr&eacute;er un site web enti&egrave;rement fonctionnel en tenant compte du concept de base de la conception du site web. C\'est mon 4&egrave;me projet pour ma formation de d&eacute;veloppeur php. Dans ce projet, j\'ai appliqu&eacute; le concept UML pour concevoir une base de donn&eacute;.</p>', 'public/img/YhmJALkt/project1.png', '2021-11-03 09:41:42', '2021-11-03 09:41:42', 1, 'Project'),
(50, 'mon 2eme projet : site web professionnel avec CSS et HTML', 'site web professionnel avec CSS et HTML', '<p>Ceci est mon projet (marqette de page)construit purement avec css et html. Je suis aussi capable de cr&eacute;er un cahier des charges. https://jennypchen.github.io/</p>\r\n<p>&nbsp;</p>', 'public/img/qLz5RgBW/project2.png', '2021-11-03 09:53:00', '2021-11-03 09:56:15', 1, 'Project');

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
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `date_create`, `user_type_id`, `reset_token`) VALUES
(1, 'administrator', 'administrator', 'ChingyiPC', 'administrator@gmail.com                                                                      ', '$2y$10$XO13KrPb/QbLAFLtRcgimOCd/U/p029R/t7wQGPofZFPl9V1Lw8TC', '2021-10-02 00:00:00', 1, '1635940977$2y$10$QRp7BNjfgtuKo9BO6c.6m..FJ6p1mZidki3jr0.Cly7knCSehsLZm'),
(33, 'lllkakllk', 'LLLK', 'lllkakllk', 'JEE@GMAIL.COM', '123456789', '2021-10-13 15:35:05', NULL, NULL),
(35, 'lllkakllk', 'LLLK', 'lllkakllk7', 'JEE1@GMAIL.COM', '123456789', '2021-10-13 15:36:29', NULL, NULL),
(36, 'ching yi', 'pelgrims', 'PeterLoz', 'ingyi@gmail.com', '123456789', '2021-10-13 16:28:45', NULL, NULL),
(41, 'Peter', 'Sam', 'PeterLoz1', 'peterjon5e@gmail.com', '123456789', '2021-10-13 16:55:54', NULL, NULL),
(43, 'jason', 'larry', 'Jasonlarry', 'jasonlarry@gmail.com', '123456789', '2021-10-13 17:48:00', NULL, NULL),
(44, 'helloopendoor', 'sam', 'sesameopendoor', 'sesameopendoor@gmail.com', '123456789', '2021-10-14 10:12:54', 2, NULL),
(45, 'albertt', 'timm', 'albertteam', 'alerb@gmail.com', '123456789', '2021-10-14 10:15:33', 2, NULL),
(48, 'albertt123', 'timm', 'albertteam12345', 'alerb12345@gmail.com', '98765432', '2021-10-14 10:22:12', 2, NULL),
(51, 'JasonCunning', 'Sun', 'JCS', 'JSC@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-10-20 20:09:49', 2, NULL),
(62, 'TomasHill', 'Sun', 'TomasHillSUN', 'TomasHill@gmail.com', 'f25ded1f2365b0c450d0037161728a63', '2021-10-20 20:26:57', 1, NULL),
(78, 'administrator1', 'administrator1', 'administratorSample', 'administratorSample@gmail.com', '$2y$10$Nd.JS3oWHqfdphUNPt/eKuqFCvpbbIe3x.R5JqcIuv1L0.rUzq2xG', '2021-11-03 13:04:26', 1, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

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
