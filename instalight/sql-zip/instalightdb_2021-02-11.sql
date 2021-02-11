# ************************************************************
# Sequel Ace SQL dump
# Version 3013
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.17-MariaDB)
# Database: instalightdb
# Generation Time: 2021-02-11 15:23:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `username` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `comment`, `user_id`, `post_id`, `date`, `username`)
VALUES
	(76,'Hej hej!',11,38,'2021-02-11 16:21:10','simon');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT '',
  `bio` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `date` timestamp NULL DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `posted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `userid`, `img`, `bio`, `title`, `date`, `update_date`, `posted_by`)
VALUES
	(38,11,'60254b5a42b675.96758107.jpg','Lorem ipsum dolor sit amet consectetur adipisicing elit. At placeat dicta neque repudiandae mollitia nam! Repudiandae libero dolorem, minima porro molestias at quia nihil quae corporis itaque dolor, illum dicta?','Post 1','2021-02-11 16:20:58','2021-02-11 16:20:58','simon');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `profile_img` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `username`, `date`, `profile_img`, `about`)
VALUES
	(10,'shakiri@mail.com','$2y$10$89TsOVSOzcMzfntbf5hweOZyjDtqXW8zJGWY2CBM2MbLMSzNKaRai','Shakiri','2021-02-10 10:17:36','6023e5bd7cc9c9.39809855.jpg','hej hej hej'),
	(11,'simon@mail.com','$2y$10$o76ZJn0iOOjnrB6rYGHu.ukxbiHOYSrgTA2bbOCsM0EnxLv7dbrOy','simon','2021-02-11 15:08:10','60253acb4a4ca7.22541943.jpg','Lorem ipsum dolor sit amet consectetur adipisicing elit. At placeat dicta neque repudiandae mollitia nam! Repudiandae libero dolorem, minima porro molestias at quia nihil quae corporis itaque dolor, illum dicta?');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
