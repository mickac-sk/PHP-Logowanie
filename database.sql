-- Drop the database if it already exists to start with a clean slate
DROP DATABASE IF EXISTS logowanie;

-- Create the new database
CREATE DATABASE logowanie;

-- Select the newly created database to use it for the subsequent commands
USE logowanie;

-- Create the 'users' table
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);