-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 05:24 PM
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
-- Database: `expense_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Food'),
(2, 'Transport'),
(3, 'Entertainment'),
(4, 'Shopping'),
(5, 'Bills');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `user_id`, `category_id`, `amount`, `description`, `date`) VALUES
(1, 2, 4, 300.00, 'gabim\r\n', '2025-02-04'),
(5, 12, 5, 400.00, '1234', '2025-02-05'),
(6, 12, 1, 300.00, '12', '2025-02-05'),
(7, 12, 4, 600.00, '123', '2025-02-05'),
(8, 12, 2, 350.00, 'hi', '2025-02-05'),
(12, 13, 1, 600.00, '12', '2025-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `monthly_budget` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `monthly_budget`) VALUES
(2, 'yllbytyqi1', '$2y$10$QOsAeIGmbsHlMQnrMX.wg.bmD5VxeZvv6RRbo1E.qkd9vjD5lZR.y', 0.00),
(6, 'ylli', '$2y$10$3a94yyPPqjZ1XgF4oLMpBupkNxK6SWUFEtNlnjAjTXJ8Nir//NgBu', 0.00),
(7, 'ylli1', '$2y$10$xPxOgaCMgeDH4kHQWr01x.xoVuhI3SsskbG8DjGGDfKTmYzsYpduK', 0.00),
(8, 'yllii', '$2y$10$2XfMAtd2lz71SoY59ABu0urnTZq23/TmSqMHKRQxLFV7qU/cmJGdC', 0.00),
(10, 'yllbytyqi11', '$2y$10$hcJuRGE3vgLONw4JGwKzReWeRH5XqhzGewiTwL5dfqGFxsxHwmJ7i', 0.00),
(11, 'hii', '$2y$10$L.D.CCZlEN3MkiipP2IoS.Ii/qn3C3uOVWXnZMSM/DsJrYUXt1Eq.', 0.00),
(12, '123', '$2y$10$X4ABeYTRif/8UMnalHay9.y4M8ri4Rx0lnFSCXQtfpRwlMA4dJgdK', 0.00),
(13, '1234', '$2y$10$qqyt1W288xTCMigUXdu2v.3tDonSVV9lAcQl2n/OriGTj5mhXqilC', 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
