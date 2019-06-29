-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 11 2017 г., 14:37
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lara`
--

-- --------------------------------------------------------

--
-- Структура таблицы `choice`
--

CREATE TABLE IF NOT EXISTS `choice` (
  `id` int(10) unsigned NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_executor` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `choice`
--

INSERT INTO `choice` (`id`, `id_order`, `id_executor`, `id_customer`) VALUES
(1, 10, 1, 2),
(2, 11, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `to_u` int(11) NOT NULL,
  `by_u` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `type_u` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `to_u`, `by_u`, `text`, `rate`, `type_u`, `created_at`, `updated_at`) VALUES
(1, 1, '2', 'lel', 4, 2, NULL, NULL),
(3, 2, '1', 'rrrr', 3, 1, NULL, NULL),
(4, 2, '1', 'rrrrr', 3, 1, NULL, NULL),
(5, 2, '1', 'rrrrr', 3, 1, NULL, NULL),
(6, 2, '1', 'rrrrr', 3, 1, NULL, NULL),
(7, 2, '1', 'rrrrr', 3, 1, NULL, NULL),
(8, 2, '1', 'rrrrr', 3, 1, NULL, NULL),
(9, 2, '1', 'rrrrr', 3, 1, NULL, NULL),
(10, 2, '1', 'rrrrr', 3, 1, NULL, NULL),
(11, 2, '1', 'ree', 5, 1, NULL, NULL),
(12, 1, '2', 'lel-lol', 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2017_03_05_171348_create_users_comments', 1),
(9, '2017_03_08_071828_order_posts', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) unsigned NOT NULL,
  `addr_from_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_from_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_from_street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_from_house` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_from_flat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_to_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_to_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_to_street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_to_house` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_to_flat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `to_date_time` timestamp NULL DEFAULT NULL,
  `type_goods` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_transp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` decimal(9,2) NOT NULL,
  `paid` decimal(19,2) NOT NULL,
  `id_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `code_executor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `addr_from_country`, `addr_from_city`, `addr_from_street`, `addr_from_house`, `addr_from_flat`, `addr_to_country`, `addr_to_city`, `addr_to_street`, `addr_to_house`, `addr_to_flat`, `created_at`, `updated_at`, `to_date_time`, `type_goods`, `type_transp`, `weight`, `paid`, `id_customer`, `status`, `code_executor`, `code_customer`) VALUES
(1, 'Russia', 'Lipetsk', 'Moskovskaya', '5', '34', 'Russia', 'Moscow', 'Lenina', '15', '2', '2017-04-30 07:12:25', '2017-04-30 07:12:29', '2017-04-30 12:12:03', 'Food', 'Car', '0.50', '5.00', '', 4, '', ''),
(2, 'Russia', 'Lipetsk', 'Moskovskaya', '5', '34', 'Russia', 'Moscow', 'Lenina', '15', '2', '2017-04-30 07:12:25', '2017-04-30 07:12:29', '2017-04-30 12:12:03', 'Food', 'Car', '0.50', '5.00', '', 0, '', ''),
(3, 'Russia', 'Lipetsk', 'Moskovskaya', '5', '34', 'Russia', 'Moscow', 'Lenina', '15', '2', '2017-04-30 07:12:25', '2017-04-30 07:12:29', '2017-04-30 12:12:03', 'Food', 'Car', '0.50', '5.00', '', 0, '', ''),
(4, 'Russia', 'Lipetsk', 'Moskovskaya', '5', '34', 'Russia', 'Moscow', 'Lenina', '15', '2', '2017-04-30 07:12:25', '2017-04-30 07:12:29', '2017-04-30 12:12:03', 'Food', 'Car', '0.50', '5.00', '', 0, '', ''),
(5, 'Russia', 'Lipetsk', 'Moskovskaya', '5', '34', 'Russia', 'Moscow', 'Lenina', '15', '2', '2017-04-30 07:12:25', '2017-04-30 07:12:29', '2017-04-30 12:12:03', 'Food', 'Car', '0.50', '5.00', '', 0, '', ''),
(6, 'Russia', 'Lipetsk', 'Moskovskaya', '5', '34', 'Russia', 'Moscow', 'Lenina', '15', '2', '2017-04-30 07:12:25', '2017-04-30 07:12:29', '2017-04-30 12:12:03', 'Food', 'Car', '0.50', '5.00', '', 0, '', ''),
(7, 'Russia', 'Lipetsk', 'Moskovskaya', '5', '34', 'Russia', 'Moscow', 'Lenina', '15', '2', '2017-04-30 07:12:25', '2017-04-30 07:12:29', '2017-04-30 12:12:03', 'Food', 'Car', '0.50', '5.00', '1', 1, '', ''),
(11, 'Russia', 'Moscow', 'Grunova', '5', '99', 'USA', 'Colorado', 'Creek', '1', '1', NULL, NULL, '2017-06-25 12:00:00', 'Pet', 'Any type', '0.30', '5.00', '1', 0, '58023', '66445');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_age`, `addr_country`, `addr_area`, `addr_city`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nik48rus', 'jaragent@mail.ru', '$2y$10$kwcMNJNESaKzNtx5FEI8a.Mgc7fycoXubSD/jkxrXYvPkrqSPu32K', '30', 'Россия', 'Московская', 'Москва', '9gKForBKFhWapHSqBhMdSNbRS0zukQTNc5PbgjztmN4hB13rsV4qPquIQXad', '2017-03-07 15:21:34', '2017-03-07 15:21:34'),
(2, 'Boris', 'jscss@mail.ru', '$2y$10$qoiLOzKINYiRehm1oEKeKuOI/WN3CdnG.WC6gemRmB1h8Gi2zRjqS', NULL, NULL, NULL, NULL, '9VCk5VGzrvkNpx3i85UbEC1bIRkacR1PiDdwYpODKHUOvZMHEvWWDzhaKfzY', '2017-03-08 04:04:32', '2017-03-08 04:04:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `choice`
--
ALTER TABLE `choice`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
