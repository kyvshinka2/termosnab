-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 21 2023 г., 13:45
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `termosnab`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Address`
--

CREATE TABLE `Address` (
  `ID` int(11) NOT NULL,
  `Address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Client`
--

CREATE TABLE `Client` (
  `ID` int(11) NOT NULL,
  `Log_In` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Client`
--

INSERT INTO `Client` (`ID`, `Log_In`, `Password`) VALUES
(1, 'chern123', 'chern123');

-- --------------------------------------------------------

--
-- Структура таблицы `Feedback`
--

CREATE TABLE `Feedback` (
  `ID` int(11) NOT NULL,
  `Log_In` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Feedback`
--

INSERT INTO `Feedback` (`ID`, `Log_In`, `Comment`) VALUES
(1, 'baz123', 'Очень крутая компания'),
(2, 'tit123', 'Хорошая компания, приятные доступные цены, товары качественные'),
(3, 'chern123', 'круто'),
(4, 'chern123', 'Быстрый ответ, хорошие руководители ');

-- --------------------------------------------------------

--
-- Структура таблицы `Manufacturer`
--

CREATE TABLE `Manufacturer` (
  `ID` int(11) NOT NULL,
  `Name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Address` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `Director` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Product`
--

CREATE TABLE `Product` (
  `ID` int(11) NOT NULL,
  `ID_Category` int(11) NOT NULL,
  `Name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Provide` int(11) NOT NULL,
  `ID_Manufacturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Provider`
--

CREATE TABLE `Provider` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Address` int(11) NOT NULL,
  `Director` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Manufacturer`
--
ALTER TABLE `Manufacturer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Address` (`ID_Address`);

--
-- Индексы таблицы `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Category` (`ID_Category`),
  ADD KEY `ID_Manufacturer` (`ID_Manufacturer`),
  ADD KEY `ID_Provide` (`ID_Provide`);

--
-- Индексы таблицы `Provider`
--
ALTER TABLE `Provider`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Address` (`ID_Address`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Address`
--
ALTER TABLE `Address`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Client`
--
ALTER TABLE `Client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `Feedback`
--
ALTER TABLE `Feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Manufacturer`
--
ALTER TABLE `Manufacturer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Product`
--
ALTER TABLE `Product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Provider`
--
ALTER TABLE `Provider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Manufacturer`
--
ALTER TABLE `Manufacturer`
  ADD CONSTRAINT `manufacturer_ibfk_1` FOREIGN KEY (`ID_Address`) REFERENCES `Address` (`ID`);

--
-- Ограничения внешнего ключа таблицы `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ID_Category`) REFERENCES `Category` (`ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`ID_Manufacturer`) REFERENCES `Manufacturer` (`ID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`ID_Provide`) REFERENCES `Provider` (`ID`);

--
-- Ограничения внешнего ключа таблицы `Provider`
--
ALTER TABLE `Provider`
  ADD CONSTRAINT `provider_ibfk_1` FOREIGN KEY (`ID_Address`) REFERENCES `Address` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
