-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 05:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `museum`
--

-- --------------------------------------------------------

--
-- Table structure for table `bucket_list`
--

CREATE TABLE `bucket_list` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `is_checked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bucket_list`
--

INSERT INTO `bucket_list` (`id`, `item`, `is_checked`) VALUES
(4, 'pantai', 0),
(5, 'makan eskrim', 0),
(8, 'minum kopi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `caption` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_url`, `caption`, `created_at`) VALUES
(28, 'IMG-20240714-WA0104.jpg', NULL, '2024-09-25 09:08:01'),
(29, 'IMG-20240613-WA0114.jpg', NULL, '2024-09-25 09:08:19'),
(30, 'IMG-20240613-WA0096.jpg', NULL, '2024-09-25 09:08:33'),
(32, '1.jpeg', NULL, '2024-09-25 09:09:18'),
(33, 'IMG-20240528-WA0053.jpg', NULL, '2024-09-25 09:09:29'),
(34, 'IMG-20240613-WA0096.jpg', NULL, '2024-09-25 09:09:40'),
(37, 'IMG-20240715-WA0096.jpg', NULL, '2024-09-25 09:10:24'),
(39, 'IMG-20240715-WA0135.jpg', NULL, '2024-09-25 09:13:57'),
(41, 'IMG-20240721-WA0121.jpg', NULL, '2024-09-25 09:15:07'),
(43, 'her.jpg', NULL, '2024-09-25 09:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `memories`
--

CREATE TABLE `memories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(500) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memories`
--

INSERT INTO `memories` (`id`, `title`, `text`, `picture`, `create_at`, `created_at`) VALUES
(57, 'Tes memori 1', 'bla bla bla bla bla', '678b31946abbe.jpg', '2025-01-18 04:44:04', '2025-01-06 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `file_url`) VALUES
(2, 'Sampai Jadi Debu', 'Banda Neira', 'assets/uploaded-songs/Sampai_Jadi_Debu_-_Banda_Naira__Lirik_Lagu_(256k).mp3'),
(3, 'Lovers Rock', 'TV girl', 'assets/uploaded-songs/lovers-rock.mp3'),
(42, 'Locked Out Of Heaven', 'Bruno Mars', 'assets/uploaded-songs/Bruno_Mars_-_Locked_Out_Of_Heaven__Official_Music_Video_(128k).mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bucket_list`
--
ALTER TABLE `bucket_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memories`
--
ALTER TABLE `memories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bucket_list`
--
ALTER TABLE `bucket_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `memories`
--
ALTER TABLE `memories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
