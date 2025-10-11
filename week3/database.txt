-- SQL file for PHP User Management System
-- Database: LoginReg
-- Table: table1

-- Create database
CREATE DATABASE IF NOT EXISTS `LoginReg` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `LoginReg`;

-- Create table1 for user data
CREATE TABLE IF NOT EXISTS `table2` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(100) NOT NULL,        -- Laptop brand
  `model` VARCHAR(150) NOT NULL,        -- Laptop model
  `price` DECIMAL(15,2) NOT NULL,       -- Price
  `origin` VARCHAR(100) NOT NULL,       -- Country of origin
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `table2` (`brand`, `model`, `price`, `origin`) VALUES
('Dell', 'Inspiron 15', 15000000, 'USA'),
('HP', 'Pavilion 14', 17000000, 'USA'),
('Asus', 'ZenBook UX425', 22000000, 'Taiwan'),
('Apple', 'MacBook Air M2', 28000000, 'USA'),
('Lenovo', 'ThinkPad X1 Carbon', 32000000, 'China');
