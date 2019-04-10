-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 10, 2019 at 03:38 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(17, 'email@test.fr', '819b0643d6b89dc9b579fdfc9094f28e'),
(19, 'mathis.gadie@outlook.com', '515f7138e65a4cc917b82b1aedec50d3'),
(29, 'new@mail.fr', '3e168048cf47e86ab080f9f23b7b02d7'),
(57, 'test@mail.fr', '5f4dcc3b5aa765d61d8327deb882cf99'),
(58, 'adresse@mail.fr', 'b6edd10559b20cb0a3ddaeb15e5267cc'),
(63, 'plantfan@mail.fr', '2d00dc1fbdf925f32d325090b9569443'),
(64, 'plantfan@mail.fre', '5478a9dd03d7cae6ea348b93667cbea5'),
(65, 'test1@mail.fr', 'dbb47aac5ee89003fde6b3fb6354536b'),
(66, 'test2@mail.fr', '94ad8aff30099302daee6a75a9385349');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
