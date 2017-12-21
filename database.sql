-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 10:22 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kanishk`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image` varchar(500) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `image`, `datetime`) VALUES
(54, 'Learn Node JSâ€Šâ€”â€ŠThe 3 Best Online Node JS Courses', 'What is Node JS?\r\nNode.js is server side JavaScript. It allows us to create full stack web applications built entirely with JavaScript. Node handles everything from interacting with databases, to consuming APIs!\r\n\r\nWhat makes these courses great?\r\nThere are thousands of Node JS courses online. Iâ€™ve talked with instructors, taken countless classes, and sifted through hundreds of reviews. Hereâ€™s what makes these three the best:\r\n\r\nGreat contentâ€Šâ€”â€ŠThis should go without saying. You need good content to learn anything. These courses are packed with up-to-date content, and awesome projects.\r\nA Great Instructorâ€Šâ€”â€ŠSomeone who is not only knowledgeable about the subject, but also passionate. Someone who can articulate tough concepts and make them easy to understand.\r\nLets jump in. Scroll down to learn Node.js!\r\n\r\nDisclosure: I write reviews and receive compensation from the companies whose products I review. I have experience with every course below, and I only recommend the be', 'e230ddfeb4deaa5515eb11cdbb85df9a.jpg', '2017-12-19 10:57:41'),
(55, 'This Is Your Life in Silicon Valley', 'You wake up at 6:30 a.m. after an Ambien-induced sleep. Itâ€™s Friday. Last night at the Rosewood was pretty intenseâ€Šâ€”â€Šyou had to check out Madera and see if there is any truth to the long-running Silicon Valley rumors. You were disappointed, but at least you did get to see a few GPs from prominent VC firms at the bar. Did they notice you? Did you make eye contact? You remind yourself that they are not real celebritiesâ€Šâ€”â€Šonly well known in a 15-mile radius to the TechCrunch-reading crowd.', '2e72267200e093f21799aef9309c572a.jpeg', '2017-12-20 05:29:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
