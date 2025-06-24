DROP DATABASE IF EXISTS `employee_management`;

CREATE DATABASE IF NOT EXISTS `employee_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `employee_management`;

-- user
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

-- tabel karyawannya
CREATE TABLE IF NOT EXISTS `employees` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `role` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `user_id` (`user_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
);

-- tabel untuk riwayat pendidikan karyawannya
CREATE TABLE IF NOT EXISTS `education` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `employee_id` INT NOT NULL,
    `institution` VARCHAR(255) NOT NULL,
    `degree` VARCHAR(255) NOT NULL,
    `major` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
);
