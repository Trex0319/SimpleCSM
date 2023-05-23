-- Adminer 4.8.0 MySQL 5.5.5-10.5.17-MariaDB-1:10.5.17+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `added_on`) VALUES
(1,	'denish',	'denishfok@gmail.com',	'$2y$10$k7KqE2VjO4eNHnAkZm07rORgu0FfBscXqnl8lx9jlW8fw4vHcvntC',	'2023-05-23 07:01:24'),
(2,	'pig',	'pig@gmail.com',	'$2y$10$hY1ZcKKlh6TZcbw3keddf.ptdNRJbwHhGeyj9BxGyJUhVlhjy31OW',	'2023-05-23 07:10:22');

-- 2023-05-23 07:43:10
