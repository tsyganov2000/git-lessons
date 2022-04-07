-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 19 2022 г., 10:28
-- Версия сервера: 10.7.3-MariaDB
-- Версия PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `contactus`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`) VALUES
(1, 'Admin', 'User', 'm', 'admin@mail.ru', '$2y$10$ojZ6RNxNjfev5s46WVuIZeSUWlqQPIKPU6c5hzPmgcItDVMaUtrRm');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `gender` char(1) NOT NULL,
  `feedback` varchar(30) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(256) NOT NULL,
  `text` text DEFAULT NULL,
  `file` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `feedback`, `email`, `password`, `text`, `file`) VALUES
(54, 'Test', 'User', 'm', '  express  courier', 'test@mail.ru', '$2y$10$679nyDXxepMv5C4qQwxAJelZCSZSul3pZT9ERRfCnuodFYfVGHN1G', 'AFfafafaf', ''),
(55, 'Test', 'User', 'm', 'taxi  express  courier', 'test@mail.ru', '$2y$10$9VcfBlZmtWImaUdJMz9kI.SiUPCmxkooIZsFiLMoIbNCjAyPLeCxi', 'AFf afa aqdsd', 'C:/Users/qqept/Desktop/htdocs/myadmin.devel/contactUs/Files/evroprotokol.pdf');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`email`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
