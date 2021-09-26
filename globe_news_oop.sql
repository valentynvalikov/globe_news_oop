-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 25 2021 г., 10:45
-- Версия сервера: 5.6.38
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `globe_news_oop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `author` varchar(50) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `author`, `created_at`) VALUES
(2, 'Globe Bank', 'Our mission at Globe Bank International is simplest', 'Bad Guy', 1627955555),
(3, 'Leadership', 'Board of Directors', 'Bad Guy', 1627918299),
(4, 'Contact Us', 'We\'re available 24 hours a day', 'Bad Guy', 1627916789),
(5, 'Banking', 'Branch, ATM, and Online Banking', 'Bad Guy', 1627918608),
(6, 'Credit Cards', 'Our credit card program has been redesigned!!!', 'Bad Guy', 1627918009),
(7, 'Mortgages', 'People shouldn\'t have to buy the farm', 'Bad Girl', 1627918909),
(8, 'Checking', 'Options abound when it comes to selecting a Globe Bank', 'Bad Girl', 1627918111),
(9, 'Loans', 'Businesses need upkeep to stay profitable', 'Bad Girl', 1620008888),
(10, 'Merchant Services', 'Whether onsite, online, or on-the-go', 'Bad Dad', 1627918888),
(11, 'Financing', 'From simple loans to long-term financing ', 'Bad Dad', 1627918999),
(12, 'Investments', 'Investments and Asset Managements', 'Bad Dad', 1627900000),
(14, 'Best Practices', 'Tried for a long time', 'Bad Dad', 1627910000),
(23, 'New ad title', 'Is title unique? Yes, it is.', 'admin1234', 1627918202),
(19, 'Good deal', 'Dealing with timestamps', 'admin1234', 1627856651),
(26, 'New user', 'Somehow creation is possible', 'admin', 1627937083),
(22, 'Edit and delete', 'Only by author who created', 'admin1234', 1627918238),
(24, 'Hello world ', 'Feel free to tell something to the whole world!', 'admin1234', 1627918767),
(25, 'Login menu', 'Is shown if not logged in and not shown if logged in.', 'admin1234', 1627927369),
(27, 'Ajax oh no', 'Don\'t know how to implement ajax requests. Impo', 'admin', 1627995644),
(28, 'Testing', 'Testing all features on the go', 'admin', 1627995243),
(30, 'New page', 'After saving goes to show page', 'admin', 1627995815),
(295, '<script>alert (\'hi hacker\'); </script>', '<script>alert (\'hi hacker\'); </script>', 'Buggy', 1629753569),
(296, 'LSB', 'Works.', 'Buggy', 1629834499),
(1, '', 'One single ad without Title to workaround some issues.', 'Architect', 1),
(325, 'Bugs and Features', 'Sometimes bugs can become features!', 'Buggy', 1629805684);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `hashed_password` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `hashed_password`) VALUES
(73, 'Buggy', '$2y$10$MNzetWJdlrlSxjPg8C4rMOrmADA34o8Ro0vbcZabrlWDw6dbjbruW');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
