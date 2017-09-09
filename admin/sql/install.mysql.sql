-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 18 2017 г., 12:37
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testmaker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE IF NOT EXISTS `#__testmaker_answers` (
  `idAnswer` int(10) NOT NULL,
  `idQuestion` int(10) NOT NULL,
  `textAnswer` text CHARACTER SET utf8 NOT NULL,
  `valueAnsver` int(5) NOT NULL DEFAULT '0',
  `state` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `#__testmaker_categories` (
  `idCategory` int(5) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 NOT NULL,
  `state` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `#__testmaker_questions` (
  `idQuestion` int(10) NOT NULL,
  `idTest` int(5) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `textQuestion` text CHARACTER SET utf8 NOT NULL,
  `state` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `alias` varchar(255) CHARACTER SET utf8 NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE IF NOT EXISTS `#__testmaker_tests` (
  `idTest` int(5) NOT NULL,
  `idCategory` int(5) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `state` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `alias` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `#__testmaker_answers`
  ADD PRIMARY KEY (`idAnswer`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `#__testmaker_categories`
  ADD PRIMARY KEY (`idCategory`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `#__testmaker_questions`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `#__testmaker_tests`
  ADD PRIMARY KEY (`idTest`);


--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `#__testmaker_answers`
  MODIFY `idAnswer` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `#__testmaker_categories`
  MODIFY `idCategory` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `#__testmaker_questions`
  MODIFY `idQuestion` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `#__testmaker_tests`
  MODIFY `idTest` int(5) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
