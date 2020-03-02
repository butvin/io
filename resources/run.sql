DROP DATABASE `bj`;
CREATE DATABASE `bj` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `bj`;

DROP TABLE IF EXISTS tickets;
CREATE TABLE IF NOT EXISTS tickets (
  `id` INT UNSIGNED AUTO_INCREMENT,

  `user_id` int DEFAULT 44,
  `text` TEXT DEFAULT NULL,
  `status` TINYINT(1) DEFAULT 1,
--   `created_at` int DEFAULT NULL,
--   `edited_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE users (
  `id` INT NOT NULL AUTO_INCREMENT,

  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `edited_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;