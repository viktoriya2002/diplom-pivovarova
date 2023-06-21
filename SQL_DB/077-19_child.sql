-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 21 2023 г., 23:39
-- Версия сервера: 10.6.12-MariaDB-1:10.6.12+maria~ubu2004
-- Версия PHP: 8.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `077-19_child`
--

-- --------------------------------------------------------

--
-- Структура таблицы `age_group`
--

CREATE TABLE `age_group` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `age_group`
--

INSERT INTO `age_group` (`id`, `name`) VALUES
(1, 'Средняя №1'),
(2, 'Старшая №1'),
(3, 'Не определено'),
(4, 'Старшая №2'),
(5, 'Старшая №3'),
(6, 'Средняя №2'),
(7, 'Средняя №3'),
(8, 'Младшая №1'),
(9, 'Младшая №2'),
(10, 'Младшая №3'),
(11, 'Ясли №1'),
(12, 'Ясли №2'),
(13, 'Ясли №3'),
(14, 'Подготовительная №1'),
(15, 'Подготовительная №2'),
(16, 'Подготовительная №3');

-- --------------------------------------------------------

--
-- Структура таблицы `child`
--

CREATE TABLE `child` (
  `id` int(11) NOT NULL,
  `fio` varchar(500) NOT NULL,
  `date_birth` date NOT NULL,
  `gender` enum('М','Ж') NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT 3,
  `user_id` int(11) NOT NULL,
  `adress` varchar(500) NOT NULL,
  `description` varchar(700) NOT NULL,
  `status` enum('В ожидании','Зачислен','Отклонен') NOT NULL DEFAULT 'В ожидании'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `child`
--

INSERT INTO `child` (`id`, `fio`, `date_birth`, `gender`, `group_id`, `user_id`, `adress`, `description`, `status`) VALUES
(27, 'Петров Кирилл Петрович', '2009-08-12', 'М', 3, 34, 'пр. Испытателей, д. 43/1', 'Активный ребенок с желанием познавать новое. Любимые игрушки: динозаврики и медведи. \r\nЛюбимая еда: апельсины, картофельное пюре.', 'В ожидании'),
(28, 'Иванова Олеся Ивановна', '2008-12-06', 'Ж', 3, 33, 'ул. Маршала Новикова, д.40, кв.13', 'Любимое занятие: рисовать, лепить из пластилина.\r\nНе любит: спать во время \"тихого часа\".', 'В ожидании'),
(29, 'Иванова Василиса Ивановна', '2007-08-25', 'Ж', 3, 33, 'ул. Маршала Новикова, д.40, кв.13', 'Любимое занятие: чтение книг, спорт (волейбол).\r\nЛюбимая сказка: \"Колобок\".\r\n', 'Зачислен'),
(30, 'Петрова Алина Петровна', '2008-01-27', 'Ж', 3, 34, 'пр. Испытателей, д. 43/1', 'Любимая игрушка: бегемотик.', 'В ожидании');

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `age_id` int(11) NOT NULL,
  `number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `group`
--

INSERT INTO `group` (`id`, `name`, `age_id`, `number`) VALUES
(1, 'Ромашки', 1, '13'),
(2, 'Солнышки', 2, '15'),
(3, 'Не определено', 3, '0'),
(4, 'Воробушки', 11, '12'),
(5, 'Слоники', 12, '15'),
(6, 'Шампиньоны', 14, '17'),
(7, 'Облачка', 8, '18');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `day` enum('Пн','Вт','Ср','Чт','Пт') NOT NULL,
  `breakfast` varchar(200) NOT NULL,
  `second_br` varchar(200) NOT NULL,
  `lunch` varchar(200) NOT NULL,
  `dinner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `day`, `breakfast`, `second_br`, `lunch`, `dinner`) VALUES
(1, 'Пн', 'Омлет с чаем, печенье', 'Йогурт с мандарином', 'Борщ, пюре с мясной котлетой, компот, хлеб', 'Чай с печеньем'),
(2, 'Вт', 'Молочная каша с рисом, кофейный напиток', 'Яблоко зеленое', 'Гороховый суп с сухариками, мясной биточек и пюре картофельное, яблочный компот', 'Творожная запеканка, чай'),
(3, 'Ср', 'Каша пшеничная, хлеб с маслом и сыром, чай с молоком, яйцо', 'Сок яблочный, сладкое печенье', 'Рисовый суп, макароны с подливой, мясная котлета, компот из слив', 'Кефир, плюшка'),
(4, 'Чт', 'Молочный суп, хлеб с маслом, какао на молоке', 'Витаминизированный напиток', 'Суп вермишелевый, капуста тушеная, свежий огурец, зерновой хлеб, кисель', 'Ватрушка с повидлом, чай с лимоном'),
(5, 'Пт', 'Творожная запеканка, икра кабачковая', 'Парное молоко, клубничный йогурт', 'Картофельный суп, картофельная запеканка, компот из изюма, зерновой хлеб', 'Сырники из творога, ряженка');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `group_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `group_id`, `description`, `time`, `photo`) VALUES
(1, '8 марта!', 1, 'Уважаемые родители группы \"Ромашки\"! Идет сбор денег на костюмы для детей в форме цветов тюльпанов. Сбор состоится до 25.05.2023 включительно. Сумма - 500 рублей.', '2023-05-16 12:32:10', '/image/RVTV78OAElC1qp7xwE2D0nvDlunDwrxiOPKxO-51MIdldcPwf9.jpg'),
(2, 'Поход в \"Музей игрушки\"', 2, 'Поход позволит детям увидеть игрушки разной эпохи, а также поиграть с некоторыми из них. Дата сбор: 01.06.2023. По вопросам звонить на номер:+79876543210 ', '2023-05-17 18:11:41', '/image/Lt8Cai6TxohrUuCfEpU62r48zVX1H905tvKpZ82VmNFsbvG-V4.jpg'),
(3, '\"Мир без опасности\"', 5, 'Дорогие родители! Среди нашего учреждения, а также нашей группы, прошла акция \"Мир без опасности\". Воспитанники повторили правила дорожного движения и совместно с педагогом изучили листовки, памятки и буклеты по ПДД!', '2023-06-06 10:35:34', '/image/xL0lEReIO8xM0G4tbH542e8iS2AgXoPmLXcIE8rt6EWW4dI38o.jpg'),
(4, 'День России', 5, 'В нашей группе воспитанникам была проведена беседа на тему: «Наша Родина – Россия», в ходе которой дети повторяли понятия «Родина», «флаг», «герб», «гимн». По итогу беседы получился коллаж: «День России».', '2023-06-06 10:36:02', '/image/NpSVYSllRaxvYNu3CQMu3jZAWTJOpbRRT9scOQFROZI0L5x4zy.jpg'),
(5, 'День защиты детей!', 7, '1 июня провели праздничное мероприятие посвященное Дню защиты детей! В актовом зале был проведен праздник с выступлением воспитанников и их родителей. За фотографиями обращаться к воспитателю, Марине Игоревне!', '2023-06-06 10:36:33', '/image/RKZg_G9rRtMkkLEfQ0O6D63K265ZRDJnQ44eEvCIqXpA1IzFVf.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fio` varchar(500) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adress` varchar(400) NOT NULL,
  `place` varchar(200) DEFAULT NULL,
  `post` varchar(200) DEFAULT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `fio`, `phone`, `email`, `adress`, `place`, `post`, `login`, `password`, `admin`) VALUES
(33, 'Иванов Иван Иванович', '+79999999999', 'ivan@gmail.com', 'ул. Маршала Новикова, д.40, кв.13', '', '', 'user', '$2y$13$ixMa5eQYPnEO5p4vaesMPuUeWtkhKw92GpWGgsDDpAD7nejrb7A5e', 0),
(34, 'Петров Петр Петрович', '+77777777777', 'petr@mail.ru', 'СПб, Спортивная улица, д.17', '', '', 'admin', '$2y$13$I1RbJjxVxRu8dWgxKRUB1eHvX/1qwBa/mwEt8izJOLm5tSAY/c2yO', 1),
(36, 'Кузнецова Светлана Антоновна', '+70000000000', '12345@bk.ru', 'г. СПб, ул. Уточкина, д.5', '', '', 'shelfy', '$2y$13$TGdxWurehPl2V0YG2h03Fey4Oj1wIYbyyMUVkA/FThvF7eNIP7yje', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `age_group`
--
ALTER TABLE `age_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age_id` (`age_id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `age_group`
--
ALTER TABLE `age_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `child_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`age_id`) REFERENCES `age_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
