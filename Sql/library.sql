-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2019 at 06:50 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_list`
--

CREATE TABLE IF NOT EXISTS `book_list` (
`book_id` int(11) NOT NULL,
  `owner_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `writer` varchar(200) NOT NULL,
  `category` varchar(150) NOT NULL,
  `copies` int(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `book_list`
--

INSERT INTO `book_list` (`book_id`, `owner_id`, `name`, `writer`, `category`, `copies`, `date`) VALUES
(2, 1, 'Brata Kahini', 'Suchitra Bhattacharya', 'Story', 0, '0000-00-00'),
(3, 1, 'Kishor Kahini Songraga', 'Dulendra Bhowmick', 'story', 1, '0000-00-00'),
(4, 2, 'Question Bank', 'Ray & Martin', 'Science', -9, '0000-00-00'),
(5, 1, 'Rosayan', 'Maiti Tewari Roy', 'Chemistry', 3, '0000-00-00'),
(6, 9, 'Jib Bidya', 'Santra', 'Biology', 4, '0000-00-00'),
(7, 8, 'Higher Mathematics', 'Jana Banerjee Khamrui', 'Mathematics', 1, '0000-00-00'),
(9, 1, 'Sahaj Path', 'Tagore', 'Reading', 8, '0000-00-00'),
(10, 1, 'Butterfly', 'Various Writer', 'English', 5, '2019-05-11'),
(11, 1, 'Gitabitan', 'Tagore', 'Music', 1, '2019-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE IF NOT EXISTS `borrowed_books` (
`borrowed_id` int(11) NOT NULL,
  `book_id` int(100) NOT NULL,
  `borrower_id` int(70) NOT NULL,
  `date` date NOT NULL,
  `return` bit(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`borrowed_id`, `book_id`, `borrower_id`, `date`, `return`) VALUES
(78, 2, 8, '0000-00-00', b'0'),
(79, 2, 9, '0000-00-00', b'0'),
(80, 3, 9, '0000-00-00', b'0'),
(81, 4, 1, '2019-05-11', b'1'),
(83, 6, 1, '2019-05-11', b'1'),
(84, 7, 1, '2019-05-11', b'1'),
(85, 4, 1, '2019-05-11', b'1'),
(86, 6, 1, '2019-05-11', b'1'),
(88, 7, 1, '2019-05-11', b'1'),
(89, 7, 1, '2019-05-11', b'1'),
(101, 6, 1, '2019-05-10', b'0'),
(102, 7, 1, '2019-05-11', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `locality` varchar(70) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `Gender`, `locality`, `phone`, `email`, `password`) VALUES
(1, 'Shilpi', '', 'Krishnanagar', 1234567890, 'shilpi@gmail.com', '456789'),
(2, 'Sima ', '', 'Kolkata', 9632587410, 'sima@hotmail.com', '123456'),
(7, 'Sabari', '', 'Dainhat', 7896541023, 'sabari@hotmail.com', 'sabari'),
(8, 'Palash', '', 'Baruipur', 9674546898, 'palash@gmail.com', '123456'),
(9, 'Akash', '', 'Krishnanagar', 9475204632, 'akash@gmail.com', '1234'),
(12, 'Anwesha', 'Female', 'Krishnanagar', 8900213654, 'anwesha172@gmail.com', 'anwesha1234'),
(13, 'Palash Bhowmick', 'Male', 'Baruipur', 9876543210, 'palash.bhowmick@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_list`
--
ALTER TABLE `book_list`
 ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
 ADD PRIMARY KEY (`borrowed_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_list`
--
ALTER TABLE `book_list`
MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
MODIFY `borrowed_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
