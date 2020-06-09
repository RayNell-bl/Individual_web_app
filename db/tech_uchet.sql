-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2020 г., 23:00
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
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `dolzhnost_id` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `models`
--

CREATE TABLE `models` (
  `model_id` smallint NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `otdel`
--

CREATE TABLE `otdel` (
  `otdel_id` smallint NOT NULL,
  `name` varchar(50) NOT NULL,
  `pred_id` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pred`
--

CREATE TABLE `pred` (
  `pred_id` smallint NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `respons_face`
--

CREATE TABLE `respons_face` (
  `respons_face_id` smallint NOT NULL,
  `employee_id` smallint NOT NULL,
  `otdel_id` smallint NOT NULL,
  `technique_id` smallint NOT NULL,
  `room_id` smallint NOT NULL,
  `date_extrat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `dolzhnost_id` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `models`
--
ALTER TABLE `models`
  MODIFY `model_id` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `otdel`
--
ALTER TABLE `otdel`
  MODIFY `otdel_id` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pred`
--
ALTER TABLE `pred`
  MODIFY `pred_id` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `respons_face`
--
ALTER TABLE `respons_face`
  MODIFY `respons_face_id` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `room`
--
ALTER TABLE `room`
  MODIFY `room_id` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `technique`
--
ALTER TABLE `technique`
  MODIFY `technique_id` smallint NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
