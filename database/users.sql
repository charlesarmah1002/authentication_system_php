-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 08:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akatsuki`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `unique_id` int(6) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'inactive',
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`unique_id`, `firstname`, `lastname`, `email`, `username`, `password`, `status`, `role`) VALUES
(208787, 'Charles', 'Wesley', 'charlesarmah@gmail.com', 'carlos', '$2y$10$Wpntyq/U84zH7RLK6J2dueiui3qocg0ViZhihQqURlrPUC6eauYem', 'inactive', 'user'),
(218162, 'Charles', 'Armah', 'charlesarmah.dev@gmail.com', 'maker', '$2y$10$hWW4AyyCksTL9eF7V8a0sOWCm.BflAPi4W6n8OjXgcIFBX/UzeiOu', 'inactive', 'user'),
(313847, 'Charles', 'Armah', 'making@gmail.com', 'making', '$2y$10$G/h/Iua1yTfkcLyVXfzQ2eVoYeKa5rk0wW4ah7/WmC2R7r6xcWUp.', 'inactive', 'user'),
(448889, 'Charles', 'Wesley', 'charlesarmah@gmail.com', 'carlos2', '$2y$10$2iCs7ZjvTBm9hEKoA2TclOTme10pS./B/fc0BHMzLToBkOeX6VreG', 'inactive', 'user'),
(902340, 'Charles', 'Wesley', 'makeme33@gmail.com', 'makest', '$2y$10$LLj18NSQwRmc/ieaASQ2aub6yG3tr4wukhKDbgCXq3jkmSDLUnNmW', 'inactive', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`unique_id`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
