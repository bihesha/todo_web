-- db/init.sql
CREATE DATABASE IF NOT EXISTS `todo_web` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `todo_web`;

CREATE TABLE IF NOT EXISTS `task` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `status` ENUM('pending','done') DEFAULT 'pending',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
