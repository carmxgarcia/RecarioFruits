-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2015 at 12:51 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `recariofruits`
--
CREATE DATABASE IF NOT EXISTS `recariofruits` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `recariofruits`;

-- --------------------------------------------------------

--
-- Table structure for table `fruit`
--

CREATE TABLE IF NOT EXISTS `fruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `distributor` varchar(30) DEFAULT NULL,
  `img` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `fruit`
--

INSERT INTO `fruit` (`id`, `name`, `price`, `quantity`, `distributor`, `img`) VALUES
(10, 'Grapes', 45.78, 5, 'YinYang', 'grapes.jpg'),
(13, 'Banana', 67.58, 50, 'YinYang', 'banana.jpg'),
(14, 'Banana', 67.58, 50, 'YinYang', 'banana.jpg'),
(15, 'Guava', 563.2, 465, 'Tini', 'guava.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `logdatetime` datetime NOT NULL,
  `fname` varchar(30) NOT NULL,
  `fprice` int(11) NOT NULL,
  PRIMARY KEY (`logdatetime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`logdatetime`, `fname`, `fprice`) VALUES
('2015-04-30 06:01:34', 'Banana', 7),
('2015-05-03 14:31:35', 'Banana', 10),
('2015-05-03 14:31:45', 'Mango', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
