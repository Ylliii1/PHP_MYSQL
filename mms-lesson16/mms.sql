-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 05:33 PM
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
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `movie_id` int(255) NOT NULL,
  `nr_tickets` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `movie_id`, `nr_tickets`, `date`, `time`) VALUES
(1, 1, 3, 2, '2025-01-13', '14:00'),
(2, 2, 5, 1, '2025-01-14', '16:30'),
(3, 3, 7, 3, '2025-01-15', '19:45'),
(4, 4, 2, 2, '2025-01-16', '20:00'),
(5, 5, 1, 4, '2025-01-17', '18:00'),
(6, 6, 4, 1, '2025-01-18', '22:30'),
(7, 7, 8, 2, '2025-01-19', '17:00'),
(8, 8, 9, 5, '2025-01-20', '15:15'),
(9, 9, 6, 3, '2025-01-21', '12:30'),
(10, 10, 10, 1, '2025-01-22', '11:00');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(255) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `movie_desc` varchar(255) NOT NULL,
  `movie_quality` varchar(255) NOT NULL,
  `movie_rating` int(255) NOT NULL,
  `movie_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie_name`, `movie_desc`, `movie_quality`, `movie_rating`, `movie_image`) VALUES
(1, 'The Great Adventure', 'A thrilling journey through unknown lands.', 'HD', 8, 'great_adventure.jpg'),
(2, 'Love in the City', 'A heartwarming romantic tale set in New York.', 'HD', 7, 'love_in_the_city.jpg'),
(3, 'The Lost World', 'A group of explorers discover a hidden prehistoric world.', '4K', 9, 'the_lost_world.jpg'),
(4, 'Science Fiction', 'An epic saga about artificial intelligence and space travel.', 'HD', 6, 'science_fiction.jpg'),
(5, 'Mystery at Midnight', 'A detective solves a complex case during a stormy night.', '4K', 8, 'mystery_at_midnight.jpg'),
(6, 'The Haunted House', 'A terrifying story about a cursed mansion.', 'HD', 5, 'haunted_house.jpg'),
(7, 'Dragon Chronicles', 'A young hero sets out to defeat an ancient dragon.', '4K', 9, 'dragon_chronicles.jpg'),
(8, 'Courageous Hearts', 'A story of bravery and sacrifice during wartime.', 'HD', 7, 'courageous_hearts.jpg'),
(9, 'The Space Odyssey', 'A thrilling space exploration journey beyond the stars.', '4K', 10, 'space_odyssey.jpg'),
(10, 'Underwater Secrets', 'An adventure to uncover the mysteries beneath the ocean.', 'HD', 6, 'underwater_secrets.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `comfirm_password` varchar(255) NOT NULL,
  `is_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `comfirm_password`, `is_admin`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 'password123', 'password123', '1'),
(2, 'Jane', 'Smith', 'jane.smith@example.com', 'mypassword456', 'mypassword456', '0'),
(3, 'Alice', 'Johnson', 'alice.johnson@example.com', 'qwerty789', 'qwerty789', '0'),
(4, 'Bob', 'Brown', 'bob.brown@example.com', 'securePass321', 'securePass321', '0'),
(5, 'Charlie', 'Davis', 'charlie.davis@example.com', 'helloWorld555', 'helloWorld555', '1'),
(6, 'Diana', 'Miller', 'diana.miller@example.com', 'password987', 'password987', '0'),
(7, 'Eve', 'Wilson', 'eve.wilson@example.com', 'letmein123', 'letmein123', '0'),
(8, 'Frank', 'Moore', 'frank.moore@example.com', 'adminPass000', 'adminPass000', '1'),
(9, 'Grace', 'Taylor', 'grace.taylor@example.com', 'welcome1234', 'welcome1234', '0'),
(10, 'Hannah', 'Anderson', 'hannah.anderson@example.com', 'superSecure88', 'superSecure88', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
