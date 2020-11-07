-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 07 2020 г., 06:21
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mysite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `welcome`
--

CREATE TABLE `welcome` (
  `Slogin` varchar(12) NOT NULL,
  `Swelcom` varchar(12) NOT NULL DEFAULT 'Приветствуем',
  `Sname` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Приветвстие';

--
-- Дамп данных таблицы `welcome`
--

INSERT INTO `welcome` (`Slogin`, `Swelcom`, `Sname`) VALUES
('admin', 'Приветствуем', 'Андрей'),
('user', 'Приветствуем', 'Иван');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `welcome`
--
ALTER TABLE `welcome`
  ADD PRIMARY KEY (`Slogin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
