-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 20 2021 г., 14:45
-- Версия сервера: 5.6.13
-- Версия PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `pizzeria`
--
CREATE DATABASE IF NOT EXISTS `pizzeria` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `pizzeria`;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telnumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `people` int(2) NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `tel number` text COLLATE utf8_unicode_ci NOT NULL,
  `id_order` int(11) NOT NULL,
  `category` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Структура таблицы `pasta`
--

CREATE TABLE IF NOT EXISTS `pasta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `legend` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `pasta`
--

INSERT INTO `pasta` (`id`, `title`, `description`, `image`, `price`, `legend`) VALUES
(1, 'Lasagna', 'Special sauce, mozzarella, parmesan, ground beef', 'https://www.tastesoflizzyt.com/wp-content/uploads/2019/11/easy-lasagna-recipe-2.jpg', 14.5, 'POPULAR!'),
(2, 'Ravioli', 'Ravioli filled with cheese', 'https://i.ytimg.com/vi/-UMjT86-hDQ/maxresdefault.jpg', 11, ''),
(3, 'Spaghetti Classica', 'Fresh tomatoes, onions, ground beef', 'https://flockler.com/thumbs/sites/192/classic_tomato_spaghetti_21645_s600x600_c854x499_l0x420.png', 25.5, ''),
(4, 'Seafood pasta', 'Salmon, shrimp, lobster, garlic', 'https://rasamalaysia.com/wp-content/uploads/2016/10/one-pot-seafood-pasta-thumb.jpg', 26.9, '');

-- --------------------------------------------------------

--
-- Структура таблицы `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `legend` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `pizza`
--

INSERT INTO `pizza` (`id`, `title`, `description`, `image`, `price`, `legend`) VALUES
(1, 'Margherita', 'Fresh tomatoes, fresh mozzarella, fresh basil', 'https://www.acouplecooks.com/wp-content/uploads/2018/10/Margherita-Pizza-018.jpg', 15.5, ''),
(2, 'Formaggio', 'Four cheeses (mozzarella, parmesan, pecorino, jarl', 'data:image/jpeg;base64,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', 17, ''),
(3, 'Chicken', 'Fresh tomatoes, mozzarella, chicken, onions', 'https://img.buzzfeed.com/thumbnailer-prod-us-east-1/video-api/assets/216054.jpg?output-format=auto&output-quality=auto', 16.5, ''),
(4, 'Meat Town', 'Fresh tomatoes, mozzarella, hot pepporoni, hot sau', 'https://i.pinimg.com/736x/64/b8/26/64b8264523dd7837e560b618d2f8b3b0.jpg', 20, ''),
(5, 'Parma', 'Fresh tomatoes, mozzarella, parma, bacon, fresh ar', 'https://media-cdn.tripadvisor.com/media/photo-s/14/7c/69/3e/pizza-parma-pizza-della.jpg', 21.5, 'NEW!');

-- --------------------------------------------------------

--
-- Структура таблицы `starter`
--

CREATE TABLE IF NOT EXISTS `starter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `legend` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `starter`
--

INSERT INTO `starter` (`id`, `title`, `description`, `price`, `image`, `legend`) VALUES
(1, 'Bruschetta', 'Bread with pesto, tomatoes, onion, garlic', 8.5, 'https://www.simplyrecipes.com/thmb/-FrPTs2EFKzjBGMD9ml9Oc4xgec=/1600x1067/filters:fill(auto,1)/__opt__aboutcom__coeus__resources__content_migration__simply_recipes__uploads__2014__08__bruschetta-tomato-basil-horiz-a-1600-5945c9a9da2a4c23a9988ac88548f964.jpg', ''),
(2, 'Garlic bread', 'Grilled ciabatta, garlic butter, onions', 9.5, 'https://tmbidigitalassetsazure.blob.core.windows.net/rms3-prod/attachments/37/1200x1200/Garlic-Bread_EXPS_GHBZ18_12265_E08_09_5b.jpg', ''),
(3, 'Tomozzarella', 'Tomatoes and mozzarella', 10.5, 'https://food.fnr.sndimg.com/content/dam/images/food/fullset/2013/7/18/0/WU0314H_caprese-salad-recipe_s4x3.jpg.rend.hgtvcom.616.462.suffix/1530799895174.jpeg', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
