-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 14 2020 г., 23:26
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tech_uchet`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dolzhnost`
--

CREATE TABLE `dolzhnost` (
  `dolzhnost_id` smallint NOT NULL,
  `name` varchar(50) NOT NULL,
  `mat_respons` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `dolzhnost`
--

INSERT INTO `dolzhnost` (`dolzhnost_id`, `name`, `mat_respons`) VALUES
(1, 'Администратор', 0),
(2, 'Руководитель', 0),
(3, 'Менеджер', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `employee_id` smallint NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `patronomic` varchar(50) NOT NULL,
  `otdel_id` smallint NOT NULL,
  `dolzhnost_id` smallint NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`employee_id`, `lastname`, `firstname`, `patronomic`, `otdel_id`, `dolzhnost_id`, `login`, `pass`) VALUES
(1, 'Админ', 'Админ', 'Админ', 2, 1, 'admin', '$2y$10$mFlJsQgNvDQ27XfADrMh8O9OQA47f2gLmqYdwGeg8SpsvdoRUX95S'),
(2, 'Шляпик', 'Александр', 'Палыч', 1, 2, 'shlyapik2', '$2y$10$53grYrBSY0/lW2fA57jcpujAOK/E/fiK7PdKBLUA6UycHh2GdyJHi'),
(4, 'Громов', 'Антон', 'Палыч', 1, 3, 'manager1', '$2y$10$DVPLa0D.wC5VeJlEX1IkceK1ET1ZbIv3uoNrxnMu47E7fZF5g2U7S');

-- --------------------------------------------------------

--
-- Структура таблицы `models`
--

CREATE TABLE `models` (
  `model_id` smallint NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `models`
--

INSERT INTO `models` (`model_id`, `name`) VALUES
(1, 'компьютер'),
(2, 'принтер'),
(4, 'Сканер');

-- --------------------------------------------------------

--
-- Структура таблицы `otdel`
--

CREATE TABLE `otdel` (
  `otdel_id` smallint NOT NULL,
  `name` varchar(50) NOT NULL,
  `pred_id` smallint NOT NULL,
  `parent_id` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `otdel`
--

INSERT INTO `otdel` (`otdel_id`, `name`, `pred_id`, `parent_id`) VALUES
(1, '1 секция', 1, NULL),
(2, '1 офис', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pred`
--

CREATE TABLE `pred` (
  `pred_id` smallint NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `pred`
--

INSERT INTO `pred` (`pred_id`, `name`) VALUES
(1, '1-е здание'),
(2, '2-е здание'),
(3, '3 здание');

-- --------------------------------------------------------

--
-- Структура таблицы `respons_face`
--

CREATE TABLE `respons_face` (
  `respons_face_id` smallint NOT NULL,
  `employee_id` smallint NOT NULL,
  `technique_id` smallint NOT NULL,
  `room_id` smallint NOT NULL,
  `date_extrat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `respons_face`
--

INSERT INTO `respons_face` (`respons_face_id`, `employee_id`, `technique_id`, `room_id`, `date_extrat`) VALUES
(1, 4, 1, 1, '2020-06-13');

-- --------------------------------------------------------

--
-- Структура таблицы `room`
--

CREATE TABLE `room` (
  `room_id` smallint NOT NULL,
  `name` varchar(50) NOT NULL,
  `ploshad` decimal(10,0) NOT NULL,
  `otdel_id` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `room`
--

INSERT INTO `room` (`room_id`, `name`, `ploshad`, `otdel_id`) VALUES
(1, '1-я комната', '50', 2),
(2, '2-я комната', '65', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `technique`
--

CREATE TABLE `technique` (
  `technique_id` smallint NOT NULL,
  `inv_number` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_buy` date NOT NULL,
  `model_id` smallint NOT NULL,
  `price` bigint NOT NULL,
  `room_id` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `technique`
--

INSERT INTO `technique` (`technique_id`, `inv_number`, `name`, `date_buy`, `model_id`, `price`, `room_id`) VALUES
(1, '0000000001', 'Компьютер настольный', '2020-05-07', 1, 150000, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dolzhnost`
--
ALTER TABLE `dolzhnost`
  ADD PRIMARY KEY (`dolzhnost_id`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Индексы таблицы `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`model_id`);

--
-- Индексы таблицы `otdel`
--
ALTER TABLE `otdel`
  ADD PRIMARY KEY (`otdel_id`);

--
-- Индексы таблицы `pred`
--
ALTER TABLE `pred`
  ADD PRIMARY KEY (`pred_id`);

--
-- Индексы таблицы `respons_face`
--
ALTER TABLE `respons_face`
  ADD PRIMARY KEY (`respons_face_id`);

--
-- Индексы таблицы `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Индексы таблицы `technique`
--
ALTER TABLE `technique`
  ADD PRIMARY KEY (`technique_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dolzhnost`
--
ALTER TABLE `dolzhnost`
  MODIFY `dolzhnost_id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `models`
--
ALTER TABLE `models`
  MODIFY `model_id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `otdel`
--
ALTER TABLE `otdel`
  MODIFY `otdel_id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `pred`
--
ALTER TABLE `pred`
  MODIFY `pred_id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `respons_face`
--
ALTER TABLE `respons_face`
  MODIFY `respons_face_id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `room`
--
ALTER TABLE `room`
  MODIFY `room_id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `technique`
--
ALTER TABLE `technique`
  MODIFY `technique_id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
