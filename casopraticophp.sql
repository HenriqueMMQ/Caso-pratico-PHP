-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2023 at 02:05 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casopraticophp`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `date`, `reason`) VALUES
(163, 50, '2023-08-12', 'ganda big bigbigibgibigbg'),
(164, 48, '2023-08-15', 'Consulta 1fasdfa'),
(165, 48, '2023-08-09', 'Consulta fsdafsdafsadfasasfdsadfads'),
(166, 48, '2023-08-09', 'sadfasdfgfasgffgdsa'),
(167, 48, '2023-08-15', 'amanha'),
(168, 48, '2023-08-16', 'depoisdeamanha');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `surname` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(15) DEFAULT '9',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `name`, `surname`, `username`, `email`, `phone`, `password`) VALUES
(1, 1, 'teste1', '', 'teste1', 'teste@teste.com', 0, 'teste123ABC'),
(48, 1, 'Henrique', 'Manuel', 'henrique', 'henrique@gmail.com', 912345678, '$2y$10$kRqf/ZiilvrxNg4LBZOmq.4qHFS3KKDh21J0Ms0x2ZToh9CL3w.mO'),
(49, 0, 'Zé', '', 'Zé', 'Ze@teste.com', 0, '$2y$10$vxBgBsKh7oWanSN40Xx6s.IhOoOH/go.EzG4XSJfBpqV69S/h7an6'),
(50, 0, 'zeca', '', 'zeca', 'zeca@gmail.com', 919999999, '$2y$10$D3uO4jXYuhqhHoqplqXXXuoXQOfzacW/m3UZ.6Oh5BtrP97FauW3a'),
(51, 0, 'Birilaugo', 'Birileugo', 'biribiri', 'tecoteco@ticotico.com', 9, '$2y$10$XzOB8dTMNY6HZvV0rUfmE.rgatsYBA35FWhvRLNIbyTPpyjs9cDSi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
