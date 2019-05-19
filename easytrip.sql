-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Май 19 2019 г., 16:55
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `easytrip`
--

-- --------------------------------------------------------

--
-- Структура таблицы `airlines`
--

CREATE TABLE `airlines` (
  `id` int(11) NOT NULL,
  `airline_name` varchar(255) NOT NULL,
  `logo_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `airlines`
--

INSERT INTO `airlines` (`id`, `airline_name`, `logo_image`) VALUES
(1, 'Air Astana', '1280px-Air_Astana_logo.png'),
(2, 'Ukraine International Airlines', '1200px-Ukraine_International_Airlines_Logo.png'),
(3, 'Turkish Airlines', 'Turkish-Airlines-Logo-logotype.png');

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `entertainment_id` int(11) NOT NULL,
  `housing_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `basket_entertainment`
--

CREATE TABLE `basket_entertainment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entertainment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket_entertainment`
--

INSERT INTO `basket_entertainment` (`id`, `user_id`, `entertainment_id`) VALUES
(3, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `basket_guide`
--

CREATE TABLE `basket_guide` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `basket_housing`
--

CREATE TABLE `basket_housing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `housing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket_housing`
--

INSERT INTO `basket_housing` (`id`, `user_id`, `housing_id`) VALUES
(21, 1, 1),
(22, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `basket_ticket`
--

CREATE TABLE `basket_ticket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket_ticket`
--

INSERT INTO `basket_ticket` (`id`, `user_id`, `ticket_id`) VALUES
(38, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `country_id`) VALUES
(1, 'Астана', 1),
(2, 'Алматы', 1),
(3, 'Франкфурт-на-Майне', 2),
(4, 'Дубай', 3),
(5, 'Стамбул', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(1, 'Казахстан'),
(2, 'Германия'),
(3, 'ОАЭ'),
(4, 'Турция');

-- --------------------------------------------------------

--
-- Структура таблицы `entertainments`
--

CREATE TABLE `entertainments` (
  `entertainment_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `entertainments`
--

INSERT INTO `entertainments` (`entertainment_id`, `type_id`, `country_id`, `city_id`, `address`, `info`, `price`, `image`) VALUES
(1, 5, 4, 5, 'Cankurtaran Mh., Kennedy Cd., 34122 Fatih/İstanbul', 'Парк Гюльхане́ — исторический городской парк в районе Эминёню в Стамбуле, в Турции; находится рядом с дворцом Топкапы на прилегающей к нему территории. Южным входом в парк служат одни из самых больших ворот дворца. Это старейший и один из крупнейших парков Стамбула.\r\n\r\nграфик работы: 6:00 - 22:30\r\n', 0, 'IMG_20170424_032.jpg'),
(2, 7, 4, 5, 'Küçükçiftlik Park', '3 июля \r\n16:00\r\nБольшой концерт Marshmello. ', 20624, '386566b0547eaa8c5d8745d5b67a459d.jpg'),
(3, 5, 4, 5, 'Yeşilpınar Mahallesi, Şht. Metin Kaya Sk. No:11, 34065 Eyüp/İstanbu', 'Тематический парк с торговым центром, кафе, аттракционами и другими развлечениями для всех возрастов.\r\n\r\nБудние: 10:00 - 18:00\r\nВыходные: 10:00 - 20:00\r\n\r\n+90 850 210 8563', 7350, 'legend-of-aqua.jpg'),
(4, 5, 3, 4, '+971 4 820 0000', '«Моушнгейт» (Motiongate Dubai) — один из развлекательных парков Dubai Parks and Resorts, посвященный голливудским фильмам и мультфильмам. Его открытие в Дубае состоялось 16 декабря 2016 года. На территории тематического парка Motiongate Dubai расположено несколько тематических зон с аттракционами и развлечениями', 10950, '870_580_fixedwidth_retina.jpg'),
(5, 5, 3, 4, '+971 4 820 0000', 'Riverland представляет собой красивую набережную возле искусственной реки длиной около 1 километра, по которой приятно прогуляться, любуясь на красивые здания, мосты и удивительную реку. Именно в Riverland Dubai расположены входы во все развлекательные парки комплекса. ', 9845, 'original.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `entertainment_types`
--

CREATE TABLE `entertainment_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `entertainment_types`
--

INSERT INTO `entertainment_types` (`id`, `type_name`) VALUES
(1, 'Музей'),
(2, 'Театр'),
(3, 'Кино'),
(4, 'Спорт'),
(5, 'Парки'),
(6, 'Достопримичательности'),
(7, 'Концерты'),
(8, 'Клубы');

-- --------------------------------------------------------

--
-- Структура таблицы `flight_classes`
--

CREATE TABLE `flight_classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `flight_classes`
--

INSERT INTO `flight_classes` (`id`, `class_name`) VALUES
(1, 'Первый класс'),
(2, 'Бизнес-класс'),
(3, 'Эконом класс');

-- --------------------------------------------------------

--
-- Структура таблицы `guides`
--

CREATE TABLE `guides` (
  `guide_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `info` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guides`
--

INSERT INTO `guides` (`guide_id`, `name`, `birth_year`, `country_id`, `city_id`, `info`, `price`) VALUES
(1, 'Тюнай Озгюр', 1989, 4, 5, 'Я из Болгарии, более 20ти лет живу в Стамбуле. Влюбился в этот сказочный город сразу и навсегда. С удовольствием проведу вас по своим излюбленным местам, расскажу об интересных исторических фактах связанных с ними.\r\nМое жизненное кредо- профессиональный подход к любимому делу.\r\nБуду рад видеть вас в своем городе- Стамбуле и сделаю все возможное, что бы ваше пребывание здесь было приятным, интересным и незабываемым.\r\n\r\n+905469687577; +79255380575', 5000),
(2, 'Толкын Рамазанова', 1994, 4, 5, 'Я родилась в Казахстане, живу в Кушадасы-ТУРЦИЯ. Во время туров по Турции я не только гид, но и путешественник, собеседник ,стараюсь смотреть на всё объективно, глазами человека который хочет увидеть и познать, увидеть страну со всех сторон, по настоящему. Турция-это не только \"море,солнце и песок\" если желаете увидеть другие красоты этой страны.\r\n\r\n05337296364', 4500);

-- --------------------------------------------------------

--
-- Структура таблицы `housing`
--

CREATE TABLE `housing` (
  `housing_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `housing`
--

INSERT INTO `housing` (`housing_id`, `type_id`, `country_id`, `city_id`, `address`, `info`, `image`, `price`) VALUES
(1, 2, 4, 5, 'Mesih Paşa Mahallesi, Aksaray Cd No:16, 34130 Fatih/İstanbul,', 'Кондиционер воздуха, центральное отопление и ванная комната во всех номерах. Балкон почти во всех номерах. Дополнительные кровати предоставляются по запросу. Гости могут пользоваться сейфом и мини-баром. Холодильник относится к стандартному оборудованию. Доступ в интернет, телефон, телевизор, радио и WiFi (за отдельную плату) гарантируют современный уровень комфорта. Ванные комнаты оснащены душем и ванной. Имеется фен.\r\n\r\n+90 212 518 51 51', 'гостиница1.png', 15250),
(2, 2, 4, 5, 'Kazlıçeşme Mh., Abay Cd. No: 223 D:No: 223, 34020 Zeytinburnu/İstanbul', 'Ванная комната во всех номерах. Дополнительные кровати предоставляются по запросу. Гости могут пользоваться сейфом и мини-баром. Автомат для приготовления чая и кофе относится к стандартному оборудованию. К вашим услугам набор для глажки. Такие удобства, как доступ в интернет, телефон, телевизор, радио, аудиосистема, будильник и WiFi, гарантируют современный уровень комфорта. Приятные мелочи – например косметические продукты, – ожидают вас в ванных комнатах.\r\n\r\n+90 212 939 45 00', 'гостиница2.png', 25847),
(3, 2, 3, 4, 'ОАЭ, Дубай', 'MADINAT JUMEIRAH AL QASR 5 *\r\nОдин из лучших вариантов, выбранных нами в городе Дубай — популярно среди гостей. \r\nПятизвездочный отель Jumeirah Al Qasr расположен на частном пляже протяженностью 2 км, на просторной территории с ландшафтным садом и искусственными каналами. К услугам гостей номера с собственными меблированным балконом и рыбный ресторан над водами Персидского залива.', '15715.jpg', 10000),
(4, 2, 3, 4, 'ОАЭ, Дубай', 'GROSVENOR HOUSE 5 *\r\nПятизвездочный отель Grosvenor House с панорамным видом на пристань для яхт расположен на набережной района Дубай Марина. К услугам гостей персональный дворецкий, открытый бассейн, бесплатный Wi-Fi и различные рестораны/бары. Торговый центр Mall of the Emirates находится в 10 минутах езды на автомобиле.', '104_45_2a2ce659.jpg', 9800);

-- --------------------------------------------------------

--
-- Структура таблицы `housing_types`
--

CREATE TABLE `housing_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `housing_types`
--

INSERT INTO `housing_types` (`id`, `type_name`) VALUES
(1, 'Хостел'),
(2, 'Гостиница');

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `departure_country` int(11) NOT NULL,
  `departure_city` int(11) NOT NULL,
  `arrival_country` int(11) NOT NULL,
  `arrival_city` int(11) NOT NULL,
  `airline_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` year(4) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `departure_country`, `departure_city`, `arrival_country`, `arrival_city`, `airline_id`, `class_id`, `price`, `day`, `month`, `year`, `time`) VALUES
(1, 1, 2, 4, 5, 1, 3, 97000, 7, 6, 2019, '09:15:00'),
(2, 4, 5, 1, 2, 3, 3, 89500, 10, 6, 2019, '05:05:00'),
(3, 1, 2, 3, 4, 1, 3, 110460, 7, 6, 2019, '11:15:00'),
(4, 3, 4, 1, 2, 1, 3, 111930, 10, 6, 2019, '15:30:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Аруа', 'Ислам', 'arua@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Камила', 'Кенесова', 'kamila@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Еркежан', 'Маралова', 'yerkezhan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `housing_id` (`housing_id`),
  ADD KEY `guide_id` (`guide_id`);

--
-- Индексы таблицы `basket_entertainment`
--
ALTER TABLE `basket_entertainment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `entertainment_id` (`entertainment_id`);

--
-- Индексы таблицы `basket_guide`
--
ALTER TABLE `basket_guide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `guide_id` (`guide_id`);

--
-- Индексы таблицы `basket_housing`
--
ALTER TABLE `basket_housing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `housing_id` (`housing_id`);

--
-- Индексы таблицы `basket_ticket`
--
ALTER TABLE `basket_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `entertainments`
--
ALTER TABLE `entertainments`
  ADD PRIMARY KEY (`entertainment_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `entertainment_types`
--
ALTER TABLE `entertainment_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `flight_classes`
--
ALTER TABLE `flight_classes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`guide_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `housing`
--
ALTER TABLE `housing`
  ADD PRIMARY KEY (`housing_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `housing_types`
--
ALTER TABLE `housing_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `departure_country` (`departure_country`),
  ADD KEY `arrival_country` (`arrival_country`),
  ADD KEY `departure_city` (`departure_city`),
  ADD KEY `arrival_city` (`arrival_city`),
  ADD KEY `airline_id` (`airline_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `basket_entertainment`
--
ALTER TABLE `basket_entertainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `basket_guide`
--
ALTER TABLE `basket_guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `basket_housing`
--
ALTER TABLE `basket_housing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `basket_ticket`
--
ALTER TABLE `basket_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `flight_classes`
--
ALTER TABLE `flight_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `housing_types`
--
ALTER TABLE `housing_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_ibfk_4` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_ibfk_5` FOREIGN KEY (`housing_id`) REFERENCES `housing` (`housing_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_ibfk_6` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`guide_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `basket_entertainment`
--
ALTER TABLE `basket_entertainment`
  ADD CONSTRAINT `basket_entertainment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_entertainment_ibfk_2` FOREIGN KEY (`entertainment_id`) REFERENCES `entertainments` (`entertainment_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `basket_guide`
--
ALTER TABLE `basket_guide`
  ADD CONSTRAINT `basket_guide_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_guide_ibfk_2` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`guide_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `basket_housing`
--
ALTER TABLE `basket_housing`
  ADD CONSTRAINT `basket_housing_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_housing_ibfk_2` FOREIGN KEY (`housing_id`) REFERENCES `housing` (`housing_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `basket_ticket`
--
ALTER TABLE `basket_ticket`
  ADD CONSTRAINT `basket_ticket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_ticket_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `entertainments`
--
ALTER TABLE `entertainments`
  ADD CONSTRAINT `entertainments_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `entertainment_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entertainments_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entertainments_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `guides`
--
ALTER TABLE `guides`
  ADD CONSTRAINT `guides_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guides_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `housing`
--
ALTER TABLE `housing`
  ADD CONSTRAINT `housing_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `housing_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `housing_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `housing_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`departure_country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`arrival_country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`departure_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`arrival_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_5` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_6` FOREIGN KEY (`class_id`) REFERENCES `flight_classes` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
