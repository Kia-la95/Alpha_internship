-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 08:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_status` varchar(255) NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_status`, `cat_image`) VALUES
(15, 'Java3', 'onhold', 'image_1.jpg'),
(16, 'Java2', 'onhold', 'image_4.jpg'),
(18, 'PHP category 2', 'success', 'image_2.jpg'),
(20, 'Hello from', 'canceled', 'ben-dutton-FKrcPEZfoNU-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_email`, `user_image`, `token`) VALUES
(24, 'j22', 'asdfgh', 'jordan', 'klahouti74@gmail.com', '', '60098dee23e6482585ccd76a46f8cea5c67312faae8f5cfe69974984ffdac78adbac27855bdd961dd2c500023e36e67ad223'),
(25, 'alcapon', '12345', 'alca', '1@1.com', 'eminem_8_mile_bus.jpg', 'c5ecf549fb57f586f108eb2b39bf53e48238a7e050cd4d9dacfec460c99f2641bbefffe3d0f7f66dabcc62e8c4389cc5934b'),
(30, 'kia44', 'kia', 'Kiaaa', 'test-gghz2r1pp@srv1.mail-tester.com', 'acastro_181016_1777_music_0001.jpg', '4715198d8b3b3e0ad605fadf38ba2ff8999cec4bab8d117b95a79233fa5c5186967d4f2f9454d1d7365da1e63ae29cf2d68a'),
(32, 'jm1', 'new', 'jimmy', '123@321.com', 'bantersnaps-wOj5odhDOZ0-unsplash.jpg', '3750543ace98ffbda0bbcdfa791de2919a1f4457717aeb8d2abc5007ca34d47555fda5c11ed5661b5a1daff661987af74f25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
