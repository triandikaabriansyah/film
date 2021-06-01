-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 11:18 AM
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
-- Database: `db_film`
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
(15, 'Perempuan Tanah Jahanam', 'perempuan-tanah-jahanam', 'Joko Anwar', 'Horor', '1622538831_0a5a31a4998790456bd7.jpg', '2021-06-01 04:13:35', '2021-06-01 04:13:51'),
(16, 'Dilan 1990', 'dilan-1990', 'Pidi Baiq & Fajar Bustomi', 'Roman & Drama', '1622538875_667033109c840c30d33e.jpg', '2021-06-01 04:14:35', '2021-06-01 04:14:35'),
(17, 'Koala Kumal', 'koala-kumal', 'Raditya Dika', 'Komedi', '1622538902_d867167d5a3c4fa586a3.jpg', '2021-06-01 04:15:02', '2021-06-01 04:15:02');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
