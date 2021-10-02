-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 05:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visionarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(200) NOT NULL,
  `bookImage` varchar(100) DEFAULT NULL,
  `bookName` varchar(200) DEFAULT NULL,
  `bookDesc` varchar(300) DEFAULT NULL,
  `bookSelling` varchar(50) DEFAULT NULL,
  `bookOriginal` varchar(50) DEFAULT NULL,
  `bookCatagory` varchar(50) DEFAULT NULL,
  `userId` varchar(200) DEFAULT NULL,
  `userPhone` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `district` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookImage`, `bookName`, `bookDesc`, `bookSelling`, `bookOriginal`, `bookCatagory`, `userId`, `userPhone`, `city`, `location`, `address`, `district`) VALUES
(222, '10520210411175101.jpg', 'Is someone there ', 'it\'s an Amazing horror book.. I read it 4 times..now I want to share some funny things with you ???? .. let\'s fun together  It\'s a story of old lady and that night.................... ', '100', '125', 'Horror Books', '105', '+919730548995', 'Karanja', '20.4827357, 77.4816693', 'Karanja , Washim ', 'Washim');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `country` varchar(150) DEFAULT 'NO',
  `state` varchar(150) DEFAULT 'NO',
  `city` varchar(150) DEFAULT 'NO',
  `location` varchar(150) DEFAULT 'NO',
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT 'NO',
  `district` varchar(200) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `password`, `country`, `state`, `city`, `location`, `email`, `address`, `district`) VALUES
(105, 'vedika Sontkke', '+919730548995', 'vedika@2003#', 'India', 'Maharashtra', 'Karanja', '20.4783232, 77.4748331', 'vedikasontakke2003@gmail.com', 'Washim Road , Manaknagar ', 'Washim'),
(106, 'parth', '+919146510960', 'password', 'India', 'Maharashtra', 'Pusad', '19.910425699999998, 77.568649', 'parthtagalpallewar123@gmail.com', 'Pusad , Yavatmal ', 'Yavatmal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
