-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 06 2018 г., 12:48
-- Версия сервера: 5.5.60-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `SELECT`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Listbisiness`
--

CREATE TABLE IF NOT EXISTS `Listbisiness` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `Listbisiness`
--

INSERT INTO `Listbisiness` (`id`, `name`, `date`, `status`) VALUES
(1, 'Проснуться', '2018-07-05 08:18:53', ''),
(3, 'Почистить зубы', '2018-07-05 11:35:46', ''),
(4, '????????????', '0000-00-00 00:00:00', ''),
(13, 'tyu', '2018-07-06 02:40:11', 'Завершено'),
(15, 'вававв', '2018-07-06 02:45:32', 'Не начинал');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
