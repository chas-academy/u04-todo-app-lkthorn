SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
SET NAMES utf8mb4;
DROP TABLE IF EXISTS `todos`;
CREATE TABLE `todos` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `task` text NOT NULL,
    `done` tinyint(4) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
INSERT INTO `todos` (`id`, `title`, `task`, `done`)
VALUES (105, 'Title', 'Task', 1),
    (106, 'Title 2', '', 0);