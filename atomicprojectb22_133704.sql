-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2016 at 11:39 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atomicprojectb22_133704`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE IF NOT EXISTS `birthday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `name`, `date_of_birth`, `deleted_at`) VALUES
(2, 'Shibli', '05/04/1995', '1466890735'),
(3, 'Imran', '06/05/2000', NULL),
(4, 'Bill', '04/06/1997', '1466888662'),
(5, 'Yameen', '01/06/1988', NULL),
(6, 'Blake', '18/02/1993', NULL),
(7, 'Sadik', '16/06/1993', '1466888660'),
(8, 'Mabin', '02/02/1997', NULL),
(9, 'Galib', '08/03/2001', NULL),
(10, 'Suva', '03/02/1993', NULL),
(11, 'Labib', '02/04/1986', '1466890729');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `bookTitle` varchar(255) NOT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ID`, `bookTitle`, `deleted_at`) VALUES
(78, 'The Hunger Games (The Hunger Games, #1) ', NULL),
(83, 'Animal Farm ', NULL),
(84, 'The Book Thief ', NULL),
(85, 'The Fault in Our Stars ', NULL),
(86, 'Wuthering Heights ', NULL),
(87, 'Les MisÃ©rables ', '1466877650'),
(88, 'Romeo and Juliet ', NULL),
(89, 'Divergent (Divergent, #1) ', NULL),
(90, '	The Alchemist ', NULL),
(91, '	The Help ', NULL),
(92, 'The Princess Bride ', NULL),
(93, 'The Great Gatsby ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `name`, `city`, `deleted_at`) VALUES
(1, 'SB', 'Dhaka', '1466879497'),
(3, 'NN', 'Barishal', '1466786263'),
(7, 'Shibli', 'Dhaka', NULL),
(10, 'Sadik', 'Rajshahi', '1466879598'),
(11, 'Shuvashish', 'Rajshahi', '1466879589'),
(12, 'Shibli Emon', 'Barishal', NULL),
(13, 'Masum', 'Chittagong', NULL),
(14, 'Yameen', 'Dhaka', NULL),
(15, 'Imran', 'Barishal', '1466879585'),
(16, 'Rahim', 'Barishal', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `educationlevel`
--

CREATE TABLE IF NOT EXISTS `educationlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `educationlevel`
--

INSERT INTO `educationlevel` (`id`, `name`, `level`, `deleted_at`) VALUES
(2, 'Shibli', 'Secondary School Certificate(S.S.C)', NULL),
(3, 'Yameen', 'M.S.C/M.A/M.B.A', NULL),
(4, 'Masum', 'B.S.C/B.A/B.B.A', NULL),
(5, 'Sadik', 'Higher Secondary Certificate(H.S.C)', '1466851343'),
(8, 'Imran', 'Junior School Certificate(J.S.C)', '1466879002'),
(12, 'Sadik', 'Higher Secondary Certificate(H.S.C)', NULL),
(13, 'Shibli', 'B.S.C/B.A/B.B.A', '1466878987'),
(14, 'Shibli', 'Phd.', '1466878983'),
(15, 'Rahim', 'Higher Secondary Certificate(H.S.C)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`ID`, `name`, `email_address`, `deleted_at`) VALUES
(2, 'Shibli', 'shibli.emon@gmail.com', NULL),
(3, 'Ashfak', 'a@b.com', '1466790973'),
(4, 'Ashfak', 'ashfak@shibliemon.com', NULL),
(5, 'Shibli', 'ashfak@shibliemon.com', '1466878424'),
(6, 'SBB', 'sbb@gmail.com', '1466658335'),
(7, 'Emon', 'shibli.emon@yahoo.com', NULL),
(8, 'Rahim', 'rahim.prsf@gmail.com', NULL),
(9, 'Sadik', 'sadik.ultra@gmail.com', NULL),
(10, 'Shuvashish', 'shuvashish.sarkar@gmail.com', '1466878422');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE IF NOT EXISTS `hobbies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `hobby_list` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`ID`, `name`, `hobby_list`, `deleted_at`) VALUES
(3, 'Ashfak', 'Cricket,Playing Football,Coding,Vollyball,Swimming', NULL),
(8, 'Arif', 'Cricket,Playing Football', NULL),
(10, 'Sohan', 'Cricket,Playing Football,Swimming', '1466879433'),
(12, 'Shibli', 'Coding', '1466790365'),
(13, 'Bell', 'Coding,Vollyball', '1466879425'),
(14, 'FF', '', '1466790384'),
(15, 'FS', 'Playing Football,Coding,Vollyball', '1466658257'),
(16, 'Sadik', 'Cricket,Swimming', '1466879428'),
(17, 'Shuvo', 'Coding', NULL),
(18, 'Mini', 'Cricket', NULL),
(19, 'Ronaldo', 'Playing Football', NULL),
(20, 'Sakib', 'Cricket', NULL),
(21, 'Mustafiz', 'Cricket', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orgsummary`
--

CREATE TABLE IF NOT EXISTS `orgsummary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `orgsummary`
--

INSERT INTO `orgsummary` (`id`, `name`, `summary`, `deleted_at`) VALUES
(1, 'Sblief Tech', ' IT', '1466878117'),
(2, 'SB', ' Tech', '1466793023'),
(3, 'Bitm', ' Tech', NULL),
(4, 'Facebook', ' Social Network', NULL),
(5, 'Amazon', ' eCommerce', NULL),
(6, 'Samsung', ' Electronics', NULL),
(7, 'Nokia', ' Mobile', NULL),
(8, 'Dell', ' Computer Accessories', NULL),
(9, 'Dovana', ' Hosting', '1466878270');

-- --------------------------------------------------------

--
-- Table structure for table `profilepicture`
--

CREATE TABLE IF NOT EXISTS `profilepicture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `profilepicture`
--

INSERT INTO `profilepicture` (`id`, `name`, `images`, `deleted_at`) VALUES
(17, 'Mash', '1466860605mash.jpeg', NULL),
(18, 'Steve', '1466860003jobs.jpeg', '1466878536'),
(19, 'Blake', '1466860040blake.jpeg', NULL),
(20, 'Sakib', '1466860060file.jpeg', NULL),
(21, 'Christina', '1466878479chisitina.jpg', '1466878533'),
(22, 'Hugh', '1466878506hugh.jpeg', NULL),
(23, 'Bill', '1466878524gates.jpeg', NULL),
(24, 'Shibli', '14668788482015-07-22-13-30-56-419.jpg', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
