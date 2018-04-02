-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Квт 02 2018 р., 16:22
-- Версія сервера: 5.6.17
-- Версія PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `coupon.dsmtool`
--

-- --------------------------------------------------------

--
-- Структура таблиці `wp_deals`
--

CREATE TABLE IF NOT EXISTS `wp_deals` (
  `deal_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `deal_category` varchar(30) NOT NULL,
  `deal_item_img` varchar(255) NOT NULL,
  `deal_item_title` varchar(255) NOT NULL,
  `deal_url_high` varchar(255) NOT NULL,
  `deal_price_high` decimal(6,2) NOT NULL,
  `deal_url_deal` varchar(255) NOT NULL,
  `deal_price_deal` decimal(6,2) NOT NULL,
  `deal_date` date NOT NULL,
  `deal_is_used` tinyint(1) NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Дамп даних таблиці `wp_deals`
--

INSERT INTO `wp_deals` (`deal_id`, `deal_category`, `deal_item_img`, `deal_item_title`, `deal_url_high`, `deal_price_high`, `deal_url_deal`, `deal_price_deal`, `deal_date`, `deal_is_used`) VALUES
(2, 'toy', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/toy.jpg', 'Train toy', 'www.dealhigh.com', '21.50', 'www.dealdeal.com', '19.95', '2018-03-30', 0),
(3, 'toy', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/toy2.jpg', 'Rabbit toy', 'www.dealhigh.com', '20.50', 'www.dealdeal.com', '18.95', '2018-03-29', 0),
(4, 'toy', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/toy3.jpg', 'Bear toy', 'www.dealhigh.com', '20.00', 'www.dealdeal.com', '19.00', '2018-03-28', 0),
(5, 'toy', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/toy4.jpg', 'Clown toy', 'www.dealhigh.com', '18.50', 'www.dealdeal.com', '16.95', '2018-03-27', 0),
(6, 'toy', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/toy5.jpg', 'Fish toy', 'www.dealhigh.com', '22.30', 'www.dealdeal.com', '21.00', '2018-03-26', 0),
(7, 'cup', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/cup.jpg', 'Main cup', 'www.dealhigh.com', '22.60', 'www.dealdeal.com', '21.20', '2018-03-30', 0),
(8, 'cup', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/cup2.jpg', 'Red cup', 'www.dealhigh.com', '21.10', 'www.dealdeal.com', '19.50', '2018-03-29', 0),
(9, 'cup', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/cup3.jpg', 'Green cup', 'www.dealhigh.com', '21.90', 'www.dealdeal.com', '20.20', '2018-03-28', 0),
(10, 'cup', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/cup4.jpg', 'Blue cup', 'www.dealhigh.com', '20.20', 'www.dealdeal.com', '17.70', '2018-03-27', 0),
(11, 'cup', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/cup5.jpg', 'Colorful cup', 'www.dealhigh.com', '23.90', 'www.dealdeal.com', '22.50', '2018-03-26', 0),
(12, 'bell', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/bell.jpg', 'First bell', 'www.dealhigh.com', '20.50', 'www.dealdeal.com', '18.20', '2018-03-30', 0),
(13, 'bell', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/bell2.jpg', 'Second bell', 'www.dealhigh.com', '21.70', 'www.dealdeal.com', '20.00', '2018-03-29', 0),
(14, 'bell', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/bell3.jpg', 'Third bell', 'www.dealhigh.com', '19.50', 'www.dealdeal.com', '17.00', '2018-03-28', 0),
(15, 'bell', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/bell4.jpg', 'Fourth bell', 'www.dealhigh.com', '20.00', 'www.dealdeal.com', '18.60', '2018-03-27', 0),
(16, 'bell', 'D:/MY_PROJECTS/coupon.dsmtool/www/wp-content/uploads/test/bell5.jpg', 'Fifth bell', 'www.dealhigh.com', '22.40', 'www.dealdeal.com', '20.10', '2018-03-26', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
