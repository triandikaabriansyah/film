-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 02:37 PM
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
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sutradara` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `judul`, `slug`, `sutradara`, `genre`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Gundala', 'gundala', 'Joko Anwar', 'Laga', 'Gundala.jpg', NULL, NULL),
(2, 'Sebelum Iblis Menjemput', 'sebelum-iblis-menjemput', 'Timo Tjahjanto', 'Horor', 'iblis.jpg', NULL, NULL),
(6, 'Koala Kumal', 'koala-kumal', 'Raditya Dika', 'Komedi', 'koala.jpg', '2021-05-30 04:34:45', '2021-05-30 04:36:16'),
(12, 'Perempuan Tanah Jahanam', 'perempuan-tanah-jahanam', 'Joko Anwar', 'Horor', '1622369315_83c5b0b89a10adda32c0.jpg', '2021-05-30 05:08:35', '2021-05-30 05:08:35'),
(13, 'Dilan 1990', 'dilan-1990', 'Pidi Baiq & Fajar Bustomi', 'Roman & Drama', '1622373692_5bf109af18432298225f.jpg', '2021-05-30 06:09:09', '2021-05-30 06:21:32');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
