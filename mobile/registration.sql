-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 05:21 PM
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
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `type`, `latitude`, `longitude`, `comment`, `created_at`) VALUES
(1, 4, 'Police', 9.21595940, 76.50835620, NULL, '2024-08-22 05:50:58'),
(2, 4, 'Police', 9.34752890, 76.55615650, NULL, '2024-08-22 05:53:01'),
(3, 4, 'Police', 9.21595940, 76.50835620, 'help someone is in trouble', '2024-08-22 08:16:21'),
(4, 4, 'Police', 9.21595940, 76.50835620, 'help someone is in trouble', '2024-08-22 08:16:25'),
(5, 4, 'Police', 9.21595940, 76.50835620, 'help someone is in accident', '2024-08-22 08:17:03'),
(6, 4, 'Police', 9.21595940, 76.50835620, 'help someone is in accident', '2024-08-22 09:28:47'),
(7, 4, 'Accident', 9.93123280, 76.26730410, 'help im a victim, there was an accident', '2024-08-25 14:00:47'),
(8, 4, 'Accident', 9.93123280, 76.26730410, 'i had an accident', '2024-08-26 05:29:24'),
(9, 4, 'Accident', 9.93123280, 76.26730410, 'i had an accident 2', '2024-08-26 05:33:33'),
(10, 4, 'Accident', 9.93123280, 76.26730410, 'please help there was fire on the flat', '2024-08-26 06:28:10'),
(11, 4, 'Accident', 9.93123280, 76.26730410, 'please help there was fire on the flat', '2024-08-26 06:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pin` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `password`, `pin`) VALUES
(4, 'Anandhanarayan', 'Anandhan', 'anandhanarayan@gmail.com', '9496440469', '$2y$10$nX9rsHo6RRUTrIGephurz.92I6FU1n/6VaE.I8OdgNr0JVEfCMCbe', '4444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
