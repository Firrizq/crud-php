-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2022 at 01:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-simpel`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `genre` enum('comedy','action','romance','documentary','sci-fi','fiction','fantasy') NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `judul`, `genre`, `durasi`, `rating`) VALUES
(1, 'Haha-man', 'romance', '109', 8),
(2, 'man-man', 'action', '99', 8),
(3, 'forest gump', 'documentary', '100', 9),
(4, 'star wars 1 : the phantom menace', 'sci-fi', '133', 7),
(5, 'star wars 2 : attack of the clones', 'romance', '142', 7),
(6, 'star wars 3 : revenge of the sith', 'fiction', '140', 8),
(7, 'star wars 4 : a new hope', 'fantasy', '121', 9),
(8, 'star wars 5 : the empire strikes back', 'fiction', '124', 9),
(9, 'star wars 6 : return of the jedi', 'comedy', '132', 8),
(10, 'star wars 7 : the force awakens', 'sci-fi', '138', 8),
(11, 'star wars 8 : the last jedi', 'sci-fi', '152', 7),
(12, 'star wars 9 : the rise of skywalker', 'sci-fi', '142', 7),
(22, 'dilan 1990', 'romance', '120', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
