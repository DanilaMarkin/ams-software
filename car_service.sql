-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2025 г., 13:27
-- Версия сервера: 8.0.30
-- Версия PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `car_service`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car_brands`
--

CREATE TABLE `car_brands` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `car_brands`
--

INSERT INTO `car_brands` (`id`, `name`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'Chevrolet'),
(4, 'Lada');

-- --------------------------------------------------------

--
-- Структура таблицы `car_models`
--

CREATE TABLE `car_models` (
  `id` int NOT NULL,
  `brand_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `body_type` enum('Хэтчбек','Легковой','Джип') NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `car_models`
--

INSERT INTO `car_models` (`id`, `brand_id`, `name`, `start_date`, `end_date`, `body_type`, `image_url`) VALUES
(1, 1, 'A4', '1994-01-01', NULL, 'Легковой', 'https://rg.ru/uploads/images/168/99/86/01.jpeg'),
(2, 2, 'X3', '2003-01-01', '2017-09-10', 'Джип', 'https://upload.wikimedia.org/wikipedia/commons/c/c2/2018_BMW_X3_xDrive30d_M_Sport_Automatic_3.0_Front.jpg'),
(3, 3, 'Aveo', '2002-01-01', '2018-08-31', 'Джип', 'https://carsweek.ru/upload/resize_cache/iblock/406/690_900_1/406ebd8518dc74211acfc0bf0e3edd17.jpg'),
(4, 4, 'Largus', '2015-01-01', '2015-05-13', 'Хэтчбек', 'https://avatars.mds.yandex.net/get-verba/1540742/2a00000180f633acc34bd6acd409f98b2bc4/cattouchretcr');

-- --------------------------------------------------------

--
-- Структура таблицы `work_prices`
--

CREATE TABLE `work_prices` (
  `id` int NOT NULL,
  `model_id` int NOT NULL,
  `work_name` varchar(255) NOT NULL,
  `work_time` float NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `work_prices`
--

INSERT INTO `work_prices` (`id`, `model_id`, `work_name`, `work_time`, `price`) VALUES
(1, 1, 'Замена тормозных колодок передних', 0.5, '4500.00'),
(2, 2, 'Замена масла', 1, '1200.00'),
(3, 3, 'Замена фильтров', 1.5, '1500.00'),
(4, 4, 'Полировка кузова', 3, '500.00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Индексы таблицы `work_prices`
--
ALTER TABLE `work_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_id` (`model_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `work_prices`
--
ALTER TABLE `work_prices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `car_models`
--
ALTER TABLE `car_models`
  ADD CONSTRAINT `car_models_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `car_brands` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `work_prices`
--
ALTER TABLE `work_prices`
  ADD CONSTRAINT `work_prices_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `car_models` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
