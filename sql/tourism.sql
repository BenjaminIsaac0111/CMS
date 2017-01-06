-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2017 at 05:06 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--
CREATE DATABASE IF NOT EXISTS `tourism` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `tourism`;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgFileName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1028) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `imgFileName`, `description`) VALUES
(4, 'Mars', 'mars.jpg', 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, after Mercury. Named after the Roman god of war, it is often referred to as the &quot;Red Planet&quot; because the iron oxide prevalent on its surface gives it a reddish appearance. Mars is a terrestrial planet with a thin atmosphere, having surface features reminiscent both of the impact craters of the Moon and the valleys, deserts, and polar ice caps of Earth.'),
(5, 'Mars', 'mars.jpg', 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, after Mercury. Named after the Roman god of war, it is often referred to as the &quot;Red Planet&quot; because the iron oxide prevalent on its surface gives it a reddish appearance. Mars is a terrestrial planet with a thin atmosphere, having surface features reminiscent both of the impact craters of the Moon and the valleys, deserts, and polar ice caps of Earth.'),
(6, 'Mars', 'mars.jpg', 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, after Mercury. Named after the Roman god of war, it is often referred to as the &quot;Red Planet&quot; because the iron oxide prevalent on its surface gives it a reddish appearance. Mars is a terrestrial planet with a thin atmosphere, having surface features reminiscent both of the impact craters of the Moon and the valleys, deserts, and polar ice caps of Earth.'),
(8, 'Mars', 'mars.jpg', 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, after Mercury. Named after the Roman god of war, it is often referred to as the &quot;Red Planet&quot; because the iron oxide prevalent on its surface gives it a reddish appearance. Mars is a terrestrial planet with a thin atmosphere, having surface features reminiscent both of the impact craters of the Moon and the valleys, deserts, and polar ice caps of Earth.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ageRange` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `termsAndConditionsCheck` tinyint(1) NOT NULL DEFAULT '0',
  `adminFlag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `ageRange`, `email`, `password`, `termsAndConditionsCheck`, `adminFlag`) VALUES
(1, 'wispytitan', 'Benjamin', 'Wilson', '15-24', 'wispytitan@gmail.com', '$2y$10$tJDxAO4zyvRuptb1rKjaseEzxSfL.Q4gOwjj50nswkYfOvi3HEH.G', 1, 1),
(33, 'helloworld', 'Benjamin', 'Wilson', '15-24', 'benjamintaya0111@gmail.com', '$2y$10$tJDxAO4zyvRuptb1rKjaseEzxSfL.Q4gOwjj50nswkYfOvi3HEH.G', 1, 0),
(36, 'User', 'User', 'Name', '15-24', 'user@gmail.com', '$2y$10$zE7LtY6GJNiifZCkFAfqsOVOL0DWZl376Eh83./8xlmF8q7sqOtyW', 1, 0),
(37, 'Admin', 'Admin', 'Name', '15-24', 'admin@gmail.com', '$2y$10$1sORSaa1GCDlbIJzi4.z0uS1cY/L6P4lXqmWS7ZQnvR4ynedPOmcy', 1, 1),
(40, 'Jesus', 'John', 'Doe', '15-24', 'johndoe@gmail.com', '$2y$10$1..69C/iG/kXqRy6pokkc.h9Aqzj/TOYlFCVPMdN9seAoW5zjDPoS', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
