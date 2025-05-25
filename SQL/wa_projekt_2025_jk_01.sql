-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 25. kvě 2025, 20:49
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `wa_projekt_2025_jk_01`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Ahoj', 'LOL', 2, '2025-04-25 16:16:25', NULL),
(3, 'John', 'John je nejlepší! ', 3, '2025-04-25 20:21:21', NULL),
(4, '3080 vs 6800? ', 'What do you think? ', 4, '2025-05-07 15:51:33', NULL),
(5, 'Jiricek je nejlepsi', 'Fakt! ', 6, '2025-05-15 20:29:39', NULL),
(11, 'G14', '90K?!', 8, '2025-05-25 07:41:24', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `user_id`, `content`, `created_at`) VALUES
(1, 5, 6, 'Test', '2025-05-17 16:55:23'),
(2, 5, 6, '123', '2025-05-17 16:55:35'),
(3, 4, 6, 'Test', '2025-05-17 16:59:04'),
(4, 3, 6, 'Test', '2025-05-17 16:59:12'),
(7, 11, 8, 'cOOO?', '2025-05-25 09:41:29');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `surname`, `created_at`, `role`) VALUES
(1, 'Test', NULL, '$2y$10$ppyWhZNXZnLuP1zly9l1bO5wahNf.ypOBOPUPYDorkRI4uR9At6NS', NULL, NULL, '2025-04-25 14:34:08', 'user'),
(2, 'Test1', NULL, '$2y$10$012Gg6/rtTVkcFSq5b0lkOYZTt7BJ7vFov6/1VUhs.OHLbP5RkVTC', NULL, NULL, '2025-04-25 14:34:59', 'user'),
(3, 'John', NULL, '$2y$10$PaJi9waF64bEsl9N73g82eq1rra/KzQFc80Tn.462mmJQlBzniB76', NULL, NULL, '2025-04-25 16:24:25', 'user'),
(4, 'Jirik', NULL, '$2y$10$n/m4Curf0rB2tPhTkKGLwudEQzv3i16EmjOHoDjLm3ybLnbcVkOfe', NULL, NULL, '2025-05-07 15:38:52', 'user'),
(5, 'Jirik1', NULL, '$2y$10$M2Y5Vx6PhDp.FAOjKP9.seX0C.dbtxySnIQwmxsQ7ZEwPqNGC3qNS', NULL, NULL, '2025-05-10 08:44:52', 'user'),
(6, 'Jiricek', NULL, '$2y$10$w4sDH.DtomfcSk3kNDkGkOUvXuDA9i9mV3aWprHx3DNRKLuUSHKAy', NULL, NULL, '2025-05-15 20:28:58', 'admin'),
(7, 'Jiricek_user', NULL, '$2y$10$ANxLZ8.0M.l388g6kElT8e3FxAKZ45YKda/4oQAYrishS4w8FP48i', NULL, NULL, '2025-05-15 20:34:52', 'user'),
(8, 'george', NULL, '$2y$10$t4Mcr1cUeWVt1rkSXO12m.h.blWaVuEOWUdTYfRsPz8SDsEhu7Xt6', NULL, NULL, '2025-05-25 06:21:58', 'admin');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexy pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pro tabulku `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Omezení pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
