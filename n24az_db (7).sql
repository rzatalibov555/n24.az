-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2025 at 12:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n24az_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('root','moderator','admin') NOT NULL DEFAULT 'admin',
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `role`, `img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rza', 'Talibov', 'rza@gmail.com', 'root', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'root', '1b4b01a1a76cd10ee0176e6c1d34d47d.jpg', 1, '2025-04-21 00:42:57', '2025-09-14 08:08:15'),
(2, 'John', 'Doe', 'john.doe@example.com', 'johndoe', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin', '9a0e262d7c7af35deb890f196132bc27.jpg', 1, '2025-04-21 03:39:42', '2025-04-21 03:39:42'),
(3, 'Aylin', 'Məmmədova', 'aylin.mammadova@example.com', 'aylin_moderator', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'moderator', 'd25e1cddf2812cb732ba15ad47bf4b08.jpg', 1, '2025-04-21 03:44:14', '2025-04-21 04:27:04'),
(4, 'Dmitry', 'Ivanov', 'd.ivanov@example.com', 'dmitry_i', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'moderator', NULL, 1, '2025-04-21 04:08:17', '2025-04-21 04:26:44'),
(5, 'Togrul', 'Huseynov', 'togrul.h@example.com', 'togrul_admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin', NULL, 1, '2025-04-22 03:46:58', '2025-04-22 03:46:58'),
(6, '12312', '21321321', '321321@bk.ru', 'aaaas', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin', '3d680ee0e0dd7b7acd1c9060f0c23672.jpg', 1, '2025-09-10 12:13:28', '2025-09-10 19:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `advertising`
--

CREATE TABLE `advertising` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_az` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertising`
--

INSERT INTO `advertising` (`id`, `title_az`, `title_en`, `title_ru`, `location`, `img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yeni mövsüm kolleksiyası', 'New season collection', 'Коллекция нового сезона', '1', 'e0739f543d9a9211f6dc9617450899dc.jpg', 1, '2025-04-24 21:11:44', '2025-04-25 00:00:43'),
(2, 'Yay endirimləri başladı!', 'Summer sales have started!', 'Летние скидки начались!', '2', '5dc4f6451d588df16f0ba94f5d4760cc.jpg', 1, '2025-04-24 21:13:17', '2025-04-24 21:15:35'),
(3, 'Ucuz qiymətlərlə telefonlar', 'Phones at low prices', 'Телефоны по низким ценам', '3', 'c52b4dc721918c6eb4274079204b0892.jpg', 1, '2025-04-24 21:19:13', '2025-04-24 21:19:13'),
(4, 'Uşaq geyimlərində endirim', 'Discount on kids’ clothing', 'Скидки на детскую одежду', '1', '0c2aa6c0ab9ac3012970f36e9d7448bd.jpg', 1, '2025-04-24 21:20:11', '2025-04-24 21:20:11'),
(5, 'Qışa hazır olun!', 'Get ready for winter!', 'Готовьтесь к зиме!', '2', '6a2796c7af9dc5ce061ac7010a3161b6.jpg', 1, '2025-04-24 21:21:20', '2025-04-24 21:21:20'),
(6, 'Yeni telefon modelləri gəldi', 'New phone models arrived', 'Поступление новых моделей телефонов', '3', 'b1444cbd69a536cc7cac3c62e1e17782.jpg', 1, '2025-04-24 21:22:11', '2025-04-24 21:22:11'),
(7, 'Ailə üçün alış-veriş', 'Shopping for the family', 'Покупки для всей семьи', '1', '75c164d79ee5d4cf4266566740887261.jpg', 1, '2025-04-24 21:25:15', '2025-04-24 21:25:15'),
(8, 'Endirimli ev əşyaları', 'Discounted home goods', 'Скидки на товары для дома', '2', 'dc1ac837a6c1ac768c4ac979baf93036.png', 1, '2025-04-24 21:26:14', '2025-04-24 21:26:14'),
(9, 'Sevgililər günü hədiyyələri', 'Valentine’s Day gifts', 'Подарки ко Дню влюблённых', '3', 'f1b176589a8318846e79c34310efb23b.jpg', 1, '2025-04-24 21:28:59', '2025-04-24 21:28:59'),
(10, 'Geyimdə son trend', 'Latest fashion trends', 'Последние модные тренды', '1', 'cb295a893938aedb76fa581c1450b88e.jpg', 1, '2025-04-24 21:30:59', '2025-04-24 21:30:59'),
(11, 'Məktəbə dönüş kampaniyası', 'Back to school campaign', 'Кампания «Назад в школу»', '2', '9dad16326b762840aa2da8338018f38a.jpg', 1, '2025-04-24 21:32:27', '2025-04-24 21:32:27'),
(12, 'İdman mallarında endirim', 'Discount on sports goods', 'Скидки на спортивные товары', '3', 'fc6eaed4d327c04d9f5fa32b7d2527f3.jpg', 1, '2025-04-24 21:33:14', '2025-04-24 21:33:14'),
(13, '12321312321312312', '123213123', '21321312312321', '2', '2bee10412de7a00cb440fc5b2fb2c996.jpeg', 1, '2025-09-10 12:10:24', '2025-09-10 12:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_slug` varchar(255) DEFAULT NULL,
  `name_az` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_slug`, `name_az`, `name_en`, `name_ru`, `status`, `created_at`, `updated_at`) VALUES
(1, 'siyaset', 'Siyasət', 'Politics', 'Политика', 1, '2025-04-24 23:33:51', '2025-10-22 10:55:37'),
(2, 'iqtisadiyyat', 'İqtisadiyyat', 'Economy', 'Экономика', 1, '2025-04-24 23:34:08', '2025-10-22 10:55:42'),
(3, 'maliye', 'Maliyyə', 'Finance', 'Финансы', 1, '2025-04-24 23:35:35', '2025-10-22 10:55:48'),
(4, 'elm-ve-tehsil', 'Elm və Təhsil', 'Science & Education', 'Наука и Образование', 1, '2025-04-24 23:35:51', '2025-10-22 10:55:54'),
(5, 'texnologiya', 'Texnologiya', 'Technology', 'Технология', 1, '2025-04-24 23:36:08', '2025-10-22 10:56:00'),
(6, 'cemiyyet', 'Cəmiyyət', 'Society', 'Общество', 1, '2025-04-24 23:36:52', '2025-10-22 10:56:06'),
(7, 'medeniyyet', 'Mədəniyyət', 'Culture', 'Культура', 1, '2025-04-24 23:37:09', '2025-10-22 10:56:10'),
(8, 'turizm', 'Turizm', 'Tourism', 'Туризм', 1, '2025-04-24 23:37:26', '2025-10-22 10:56:15'),
(9, 'idman', 'İdman', 'Sports', 'Спорт', 1, '2025-04-24 23:37:44', '2025-10-22 10:56:20'),
(10, 'xarici-xeberler', 'Xarici xəbərlər', 'Foreign News', 'Зарубежные новости', 1, '2025-04-24 23:38:02', '2025-10-22 10:56:27'),
(11, 'tehlil', 'Təhlil', 'Analysis', 'Аналитика', 1, '2025-04-24 23:38:23', '2025-10-22 10:56:32'),
(12, 'rey', 'Rəy', 'Opinion', 'Мнение', 1, '2025-04-24 23:38:38', '2025-10-22 10:56:41'),
(13, 'kose', 'Köşə', 'Column', 'Колонка', 1, '2025-04-24 23:39:11', '2025-10-22 10:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_az` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `short_description_az` text NOT NULL,
  `short_description_en` text NOT NULL,
  `short_description_ru` text NOT NULL,
  `long_description_az` longtext NOT NULL,
  `long_description_en` longtext NOT NULL,
  `long_description_ru` longtext NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `multi_img` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`multi_img`)),
  `video` varchar(255) NOT NULL,
  `view_count` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('daily_news','important_news_1','important_news_2','important_news_3','important_news_4','important_news_lent','general_news','interview','nakhchivan','zangezur_corridor') NOT NULL DEFAULT 'general_news',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title_az`, `slug`, `title_en`, `title_ru`, `short_description_az`, `short_description_en`, `short_description_ru`, `long_description_az`, `long_description_en`, `long_description_ru`, `img`, `multi_img`, `video`, `view_count`, `category_id`, `author_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.', 'yeni-texnoloji-startaplar-olknin-innovasiya-sviyysini-artirir-1', 'New tech startups are boosting the country\'s innovation level.', 'Новые технологические стартапы повышают уровень инноваций в стране.', 'Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.', 'New tech startups are boosting the country\'s innovation level.New tech startups are boosting the country\'s innovation level.New tech startups are boosting the country\'s innovation level.', 'Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.', '<p>Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.</p>\r\n', '<p>New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.</p>\r\n', '<p>Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.</p>\r\n', '24889e2ffd6ee222a44b31da82e5155a.jpg', '[\"ab87d3279a7dc595c4bd134f73c751dd.jpg\", \"527d78ac61d625e2e144377a4a519bd5.jpg\"]', 'https://www.youtube.com/embed/ok4i1aPrecw?si=TOMQ-v0xLTiWKzuO', '462', 2, 1, 'nakhchivan', 1, '2025-10-29 03:58:26', '2025-11-01 19:27:58'),
(5, 'Bakıda beynəlxalq musiqi festivalı keçirildi.', 'bakida-beynlxalq-musiqi-festivali-kecirildi-1', 'International Music Festival Held in Baku.', 'В Баку прошёл международный музыкальный фестиваль.', 'Bakıda beynəlxalq musiqi festivalı keçirildi.Bakıda beynəlxalq musiqi festivalı keçirildi.Bakıda beynəlxalq musiqi festivalı keçirildi.', 'International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.', 'В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.', '<p>Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.</p>\r\n', '<p>International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.</p>\r\n', '<p>В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.</p>\r\n', 'ace6bad4a7cf48d0a7608dbd31d83cea.jpg', '[\"b81a9a65fe543b51e261aeaad0283568.jpg\", \"efc9d1c86ede8c7c325fcd86c05c554b.jpg\",\"b81a9a65fe543b51e261aeaad0283568.jpg\", \"efc9d1c86ede8c7c325fcd86c05c554b.jpg\"]', 'https://www.youtube.com/embed/ok4i1aPrecw?si=TOMQ-v0xLTiWKzuO', '208', 11, 1, 'zangezur_corridor', 1, '2025-10-30 04:01:36', '2025-11-01 19:27:28'),
(8, '2Azərbaycan texnologiya sahəsində irəliləyir. Azərbaycan texnologiya sahəsində irəliləyir. Azərbaycan texnologiya sahəsində irəliləyir. Azərbaycan texnologiya sahəsində irəliləyir. Azərbaycan texnologiya sahəsində irəliləyir.', 'azerbaycan-texnologiya', '2Azerbaijan Advances in Technology Sector.', '2Азербайджан продвигается в сфере технологий.', '2Azərbaycan texnologiya sahəsində irəliləyir.Azərbaycan texnologiya sahəsində irəliləyir.Azərbaycan texnologiya sahəsində irəliləyir.', '2Azerbaijan Advances in Technology Sector.Azerbaijan Advances in Technology Sector.Azerbaijan Advances in Technology Sector.', '2Азербайджан продвигается в сфере технологий.Азербайджан продвигается в сфере технологий.Азербайджан продвигается в сфере технологий.', '<p>2Azərbaycan texnologiya sahəsində irəliləyir.Azərbaycan texnologiya sahəsində irəliləyir.Azərbaycan texnologiya sahəsində irəliləyir.Azərbaycan texnologiya sahəsində irəliləyir.Azərbaycan texnologiya sahəsində irəliləyir.Azərbaycan texnologiya sahəsində irəliləyir.Azərbaycan texnologiya sahəsində irəliləyir.Azərbaycan texnologiya sahəsində irəliləyir.Azərbaycan texnologiya sahəsində irəliləyir.</p>\r\n', '<p>2Azerbaijan Advances in Technology Sector.Azerbaijan Advances in Technology Sector.Azerbaijan Advances in Technology Sector.Azerbaijan Advances in Technology Sector.Azerbaijan Advances in Technology Sector.Azerbaijan Advances in Technology Sector.Azerbaijan Advances in Technology Sector.Azerbaijan Advances in Technology Sector.Azerbaijan Advances in Technology Sector.</p>\r\n', '<p>2Азербайджан продвигается в сфере технологий.Азербайджан продвигается в сфере технологий.Азербайджан продвигается в сфере технологий.Азербайджан продвигается в сфере технологий.Азербайджан продвигается в сфере технологий.Азербайджан продвигается в сфере технологий.Азербайджан продвигается в сфере технологий.Азербайджан продвигается в сфере технологий.Азербайджан продвигается в сфере технологий.</p>\r\n', '35e0e493c9422f6db2227f21469d0097.png', '[\"75e45349a0768df2ef4e52fba9c7f2b7.jpg\", \"32d3927a27fa2b02b35b6ce86cb46145.png\"]', 'https://www.youtube.com/embed/ok4i1aPrecw?si=TOMQ-v0xLTiWKzuO', '154', 4, 1, 'important_news_3', 1, '2025-10-30 03:30:31', '2025-11-01 13:18:48'),
(9, '3Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.', 'yeni-texnoloji-startap', '3New tech startups are boosting the country\'s innovation level.', '3Новые технологические стартапы повышают уровень инноваций в стране.', '3Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.', '3New tech startups are boosting the country\'s innovation level.New tech startups are boosting the country\'s innovation level.New tech startups are boosting the country\'s innovation level.', '3Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.', '<p>3Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.</p>\r\n', '<p>3New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.</p>\r\n', '<p>3Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.</p>\r\n', 'afdd1fb32b2b660c3a82063f5a08bc76.png', '[\"ab87d3279a7dc595c4bd134f73c751dd.jpg\", \"527d78ac61d625e2e144377a4a519bd5.jpg\"]', 'https://www.youtube.com/embed/ok4i1aPrecw?si=TOMQ-v0xLTiWKzuO', '35', 3, 1, 'interview', 1, '2025-04-26 01:58:26', '2025-11-01 17:26:00'),
(10, '4Bakıda beynəlxalq musiqi festivalı keçirildi', 'bakıda-beynelxalq', '4International Music Festival Held in Baku.', 'В Баку прошёл международный музыкальный фестиваль.', '4Bakıda beynəlxalq musiqi festivalı keçirildi.Bakıda beynəlxalq musiqi festivalı keçirildi.Bakıda beynəlxalq musiqi festivalı keçirildi.', '4International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.', '4В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.', '<p>4Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.Bakıda beynəlxalq musiqi festivalı ke&ccedil;irildi.</p>\r\n', '<p>4International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.International Music Festival Held in Baku.</p>\r\n', '<p>4В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.В Баку прошёл международный музыкальный фестиваль.</p>\r\n', '6a9a1320c130739519ffefe50ec67721.png', '[\"b81a9a65fe543b51e261aeaad0283568.jpg\", \"efc9d1c86ede8c7c325fcd86c05c554b.jpg\"]', 'https://www.youtube.com/embed/ok4i1aPrecw?si=TOMQ-v0xLTiWKzuO', '96', 1, 1, 'important_news_4', 1, '2025-04-26 05:01:37', '2025-11-01 18:22:27'),
(11, '2toto 24\"Azərbaycanla matça ciddi yanaşmalıyıq\" - Mbappe', '2toto-24azrbaycanla-matca-ciddi-yanasmaliyiq-mbappe', '2toto \"We need to take the match against Azerbaijan seriously.\" – Mbappé', '«Мы должны серьёзно отнестись к матчу с Азербайджаном».', 'Diqqətimizi İslandiyaya yönəltməzdən əvvəl Azərbaycanla matça ciddi yanaşmalıyıq. Hər oyunun öz reallığı var və biz sabah qələbə qazanmalıyıq.', '\"We must take the match against Azerbaijan seriously before we turn our attention to Iceland. Every game has its own reality, and we must win tomorrow,\" said French national team player Kylian Mbappé at a press conference held before their 2026 World Cup qualifier against Azerbaijan in Paris.', '«Мы должны серьёзно отнестись к матчу с Азербайджаном, прежде чем переключить внимание на Исландию. У каждой игры есть своя реальность, и завтра мы должны победить», — сказал нападающий сборной Франции Килиан Мбаппе на пресс-конференции, посвящённой предстоящему матчу отборочного этапа ЧМ-2026 против сборной Азербайджана в Париже.', '<p>Diqqətimizi İslandiyaya y&ouml;nəltməzdən əvvəl Azərbaycanla mat&ccedil;a ciddi yanaşmalıyıq. Hər oyunun &ouml;z reallığı var və biz sabah qələbə qazanmalıyıq.</p>\r\n\r\n<p>Bu s&ouml;zləri Fransa millisinin futbol&ccedil;usu Kilian Mbappe D&Ccedil;-2026-nın se&ccedil;mə mərhələsində Parisdə Azərbaycan millisinə qarşı ke&ccedil;irəcəkləri oyundan &ouml;ncə təşkil olunan mətbuat konfransında deyib.</p>\r\n\r\n<p>27 yaşlı h&uuml;cum&ccedil;u yığmamızın se&ccedil;mə mərhələnin son turunda Bakıda Ukrayna ilə he&ccedil;-he&ccedil;ə etməsini x&uuml;susi vurğulayıb: &quot;Bu qarşılaşma İslandiya ilə mat&ccedil;dan az &ouml;nəmli deyil. Məqsəd d&uuml;nya &ccedil;empionatına vəsiqə qazanmaqdır. Vəsiqə təmin olunana qədər m&uuml;barizə aparmalıyıq&rdquo;.</p>\r\n\r\n<p>Meydana &ccedil;ıxmağa hazır olduğunu s&ouml;yləyən forvard istənilən komandaya qol bura biləcəyini ifadə edib: &quot;Mən sabah oynamaq istəyirəm, baş məşq&ccedil;i də buna qarşı deyil. Ciddi problemlərin olacağını d&uuml;ş&uuml;nm&uuml;rəm. &ouml;z&uuml;m&uuml; yaxşı hiss edirəm. Bu g&uuml;n məşq edəcəyəm, bu oyun&ouml;ncəsi son hazırlıq olacaq. X&uuml;susi narahatlığım yoxdur&rdquo;. Qeyd edək ki, oktyabrın 10-da &quot;Park de Prens&rdquo; stadionunda ke&ccedil;iriləcək Fransa - Azərbaycan g&ouml;r&uuml;ş&uuml; Bakı vaxtı ilə saat 22:45-də başlanacaq.</p>\r\n', '<p>&quot;We must take the match against Azerbaijan seriously before we turn our attention to Iceland. Every game has its own reality, and we must win tomorrow,&quot; said French national team player Kylian Mbapp&eacute; at a press conference held before their 2026 World Cup qualifier against Azerbaijan in Paris.</p>\r\n\r\n<p>The 27-year-old forward particularly highlighted that Azerbaijan drew with Ukraine in the final round of the qualifiers in Baku: &quot;This match is no less important than the one against Iceland. Our goal is to qualify for the World Cup. We must keep fighting until qualification is secured.&quot;</p>\r\n\r\n<p>Saying that he is ready to take the field, the forward added that he can score against any team: &quot;I want to play tomorrow, and the coach is not against it. I don&rsquo;t think there will be any serious problems. I feel good. I will train today &mdash; it will be the final session before the match. I have no particular concerns.&quot;</p>\r\n\r\n<p>It should be noted that the France&ndash;Azerbaijan match will take place on October 10 at the Parc des Princes stadium and will kick off at 22:45 Baku time.</p>\r\n', '<p>&laquo;Мы должны серьёзно отнестись к матчу с Азербайджаном, прежде чем переключить внимание на Исландию. У каждой игры есть своя реальность, и завтра мы должны победить&raquo;, &mdash; сказал нападающий сборной Франции Килиан Мбаппе на пресс-конференции, посвящённой предстоящему матчу отборочного этапа ЧМ-2026 против сборной Азербайджана в Париже.</p>\r\n\r\n<p>27-летний форвард особо отметил, что сборная Азербайджана сыграла вничью с Украиной в последнем туре отборочного этапа в Баку: &laquo;Этот матч не менее важен, чем встреча с Исландией. Наша цель &mdash; выйти на чемпионат мира. Мы должны бороться до тех пор, пока не обеспечим себе путёвку&raquo;.</p>\r\n\r\n<p>Заявив, что готов выйти на поле, Мбаппе добавил, что способен забить любой команде: &laquo;Я хочу сыграть завтра, и тренер не против. Не думаю, что будут серьёзные проблемы. Чувствую себя хорошо. Сегодня проведу тренировку &mdash; это будет заключительное занятие перед матчем. Особых опасений нет&raquo;.</p>\r\n\r\n<p>Отметим, что матч Франция &mdash; Азербайджан состоится 10 октября на стадионе &laquo;Парк де Пренс&raquo; и начнётся в 22:45 по бакинскому времени.</p>\r\n', 'b4b7e508ded46f892b6cb3287f77c18a.jpg', '[\"b81a9a65fe543b51e261aeaad0283568.jpg\", \"efc9d1c86ede8c7c325fcd86c05c554b.jpg\"]', 'https://www.youtube.com/embed/ok4i1aPrecw?si=TOMQ-v0xLTiWKzuO', '163', 3, 1, 'important_news_1', 1, '2025-10-11 11:53:01', '2025-11-01 17:16:46'),
(15, 'Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.', 'yeni-texnoloji1', 'New tech startups are boosting the country\'s innovation level.', 'Новые технологические стартапы повышают уровень инноваций в стране.', 'Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.', 'New tech startups are boosting the country\'s innovation level.New tech startups are boosting the country\'s innovation level.New tech startups are boosting the country\'s innovation level.', 'Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.', '<p>Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.</p>\r\n', '<p>New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.</p>\r\n', '<p>Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.</p>\r\n', '24889e2ffd6ee222a44b31da82e5155a.jpg', '[\"ab87d3279a7dc595c4bd134f73c751dd.jpg\", \"527d78ac61d625e2e144377a4a519bd5.jpg\"]', 'https://www.youtube.com/embed/ok4i1aPrecw?si=TOMQ-v0xLTiWKzuO', '235', 2, 1, 'important_news_lent', 1, '2025-10-29 03:58:55', '2025-11-01 14:15:40'),
(16, 'Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.', 'yeni-texnoloji11', 'New tech startups are boosting the country\'s innovation level.', 'Новые технологические стартапы повышают уровень инноваций в стране.', 'Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar ölkənin innovasiya səviyyəsini artırır.', 'New tech startups are boosting the country\'s innovation level.New tech startups are boosting the country\'s innovation level.New tech startups are boosting the country\'s innovation level.', 'Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.', '<p>Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.Yeni texnoloji startaplar &ouml;lkənin innovasiya səviyyəsini artırır.</p>\r\n', '<p>New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.New tech startups are boosting the country&#39;s innovation level.</p>\r\n', '<p>Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.Новые технологические стартапы повышают уровень инноваций в стране.</p>\r\n', '24889e2ffd6ee222a44b31da82e5155a.jpg', '[\"ab87d3279a7dc595c4bd134f73c751dd.jpg\", \"527d78ac61d625e2e144377a4a519bd5.jpg\"]', 'https://www.youtube.com/embed/ok4i1aPrecw?si=TOMQ-v0xLTiWKzuO', '172', 2, 1, 'important_news_lent', 1, '2025-10-29 03:59:45', '2025-11-01 18:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `uid` int(10) UNSIGNED NOT NULL,
  `collection` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`collection`)),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`uid`, `collection`, `created_at`, `updated_at`) VALUES
(1, '{\"maintenance_mode\":false,\"snow_mode\":false}', '2025-04-21 02:18:35', '2025-09-14 10:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `url_translations`
--

CREATE TABLE `url_translations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `common_code` varchar(255) NOT NULL,
  `url_route` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `url_translations`
--

INSERT INTO `url_translations` (`id`, `name`, `lang`, `common_code`, `url_route`) VALUES
(1, 'Xeber linki az dilinde', 'az', 'news_link', 'xeber'),
(2, 'Xeber linki az dilinde', 'en', 'news_link', 'news'),
(3, 'Kateqoriya Linki', 'az', 'category_link', 'kateqoriya'),
(4, 'Kateqoriya Linki', 'en', 'category_link', 'category'),
(5, 'Naxçıvan və Zəngəzur dəhlizi Linki ', 'az', 'category_type_link', 'bolme'),
(6, 'Naxçıvan və Zəngəzur dəhlizi Linki ', 'en', 'category_type_link', 'section');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `advertising`
--
ALTER TABLE `advertising`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `url_translations`
--
ALTER TABLE `url_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_code` (`common_code`,`lang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `advertising`
--
ALTER TABLE `advertising`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `url_translations`
--
ALTER TABLE `url_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
