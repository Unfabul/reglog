-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 20 2019 г., 21:13
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `reglog`
--
CREATE DATABASE IF NOT EXISTS `reglog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `reglog`;

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Англия'),
(2, 'Германия'),
(3, 'Франция'),
(4, 'Испания'),
(5, 'Аргентина');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `agree` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `realname`, `password`, `birthdate`, `country`, `agree`) VALUES
(1, '123@test.ru', 'test1', 'name', '1234', '25', '', 'on'),
(8, '1234@test.ru', 'test2', 'name', '1234', '65', '...', 'on'),
(9, '12345@test.ru', 'test3', 'name', '213', '36', '...', 'on'),
(10, '123456@test.ru', 'test4', 'name', '213', '36', '...', 'on'),
(11, '1234567@test.ru', 'test5', 'ÐŸÐ°Ð²ÐµÐ»', '1234', '02-02-2000', '...', 'on'),
(12, '12345678@test.ru', 'test6', 'Ð˜Ð³Ð¾Ñ€ÑŒ', '1234', '15-06-1900', '...', ''),
(13, '00@test.ru', 'test11', 'Барс', '134', '7-7-1998', 'Франция', 'on'),
(14, '100@test.ru', 'test200', 'Radion', '155', '11/11/2017', 'Франция', 'on'),
(16, '200@test.ru', 'test400', 'Вася', '123', '06/11/2019', 'Испания', 'on'),
(17, '700@test.ru', 'test700', 'Julia', '123', '06/11/2019', 'Германия', 'on'),
(18, '9000@test.ru', 'test9000', 'Harry', '123', '01/16/2018', 'Аргентина', 'on');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
