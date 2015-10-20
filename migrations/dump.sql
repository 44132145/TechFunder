-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               5.5.46 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных techfunderdb
CREATE DATABASE IF NOT EXISTS `techfunderdb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `techfunderdb`;


-- Дамп структуры для таблица techfunderdb.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы techfunderdb.migration: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1445098007),
	('m151018_070043_init_tables', 1445156706),
	('m151019_063052_update_questionnaire', 1445236489),
	('m151019_091308_InsertDataToQuestionnaire', 1445259352);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Дамп структуры для таблица techfunderdb.questionnaire
CREATE TABLE IF NOT EXISTS `questionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('text','date') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'text',
  `post_index` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateAdd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `formName` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы techfunderdb.questionnaire: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `questionnaire` DISABLE KEYS */;
INSERT INTO `questionnaire` (`id`, `type`, `post_index`, `title`, `dateAdd`, `formName`) VALUES
	(6, 'text', 'firstname', 'First Name', '2015-10-19 15:55:52', 'form1'),
	(7, 'text', 'lastname', 'Last Name', '2015-10-19 15:55:52', 'form1'),
	(8, 'text', 'email', 'Email address', '2015-10-19 15:55:52', 'form1'),
	(9, 'date', 'birthday', 'birthday', '2015-10-19 15:55:52', 'form1'),
	(10, 'text', 'shoesize', 'Shoe size', '2015-10-19 15:55:52', 'form1'),
	(11, 'text', 'ice_cream', 'What is Your Favorite Ice cream?', '2015-10-19 15:55:52', 'form2'),
	(12, 'text', 'superhero', 'Who is your favorite superhero?', '2015-10-19 15:55:52', 'form2'),
	(13, 'text', 'movie_star', 'Who is your favorite movie star?', '2015-10-19 15:55:52', 'form2'),
	(14, 'date', 'world_will_end', 'when do you think the world will end?', '2015-10-19 15:55:52', 'form2'),
	(15, 'text', 'super_bowl', 'Who will win the super bowl this year?', '2015-10-19 15:55:52', 'form2');
/*!40000 ALTER TABLE `questionnaire` ENABLE KEYS */;


-- Дамп структуры для таблица techfunderdb.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `shoesize` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `UniqueRow` (`firstname`,`lastname`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы techfunderdb.user: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Дамп структуры для таблица techfunderdb.user_questionnaire
CREATE TABLE IF NOT EXISTS `user_questionnaire` (
  `user_id` int(11) DEFAULT NULL,
  `id_Q` int(11) DEFAULT NULL,
  `user_response` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  KEY `UQ2User` (`user_id`),
  KEY `UQ2Ques` (`id_Q`),
  CONSTRAINT `UQ2Ques` FOREIGN KEY (`id_Q`) REFERENCES `questionnaire` (`id`),
  CONSTRAINT `UQ2User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы techfunderdb.user_questionnaire: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `user_questionnaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_questionnaire` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
