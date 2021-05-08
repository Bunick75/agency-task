-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 01:42 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie_details`
--

CREATE TABLE `movie_details` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(500) NOT NULL,
  `movie_poster` varchar(500) NOT NULL,
  `release_date` date NOT NULL,
  `movie_length` float NOT NULL,
  `language` text NOT NULL,
  `genre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_details`
--

INSERT INTO `movie_details` (`movie_id`, `movie_name`, `movie_poster`, `release_date`, `movie_length`, `language`, `genre`) VALUES
(1, 'Rakshas', 'img/rakshas.jpg', '2021-05-02', 180.23, 'marathi', 'horror'),
(2, 'Mother India', 'img/motheIndia.jpg', '2021-04-08', 160.23, 'hindi', 'classic'),
(3, 'Lagaan', 'img/lagaan.jpg', '2021-03-17', 200.22, 'hindi', 'classic'),
(4, 'Amar', 'img/amar.jpg', '2021-02-03', 210.22, 'hindi', 'classic'),
(5, 'TimePass', 'img/timepass.jpg', '2021-02-24', 180.44, 'marathi', 'love story'),
(6, 'Matrix', 'img/matrix.jpg', '2020-12-29', 150.22, 'english', 'scifi'),
(7, 'Rocky', 'img/rocky.jpg', '2020-12-14', 157.22, 'english', 'action'),
(8, 'Oblivion', 'img/oblivion.jpg', '2020-12-03', 157.22, 'english', 'scifi'),
(9, 'Mitwa', 'img/mitwa.jpg', '2021-05-11', 150.22, 'marathi', 'love story');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie_details`
--
ALTER TABLE `movie_details`
  ADD PRIMARY KEY (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie_details`
--
ALTER TABLE `movie_details`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
