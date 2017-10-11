-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2017 at 12:48 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `budgetapp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `budgetitems_tbl`
--

CREATE TABLE IF NOT EXISTS `budgetitems_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `item_cost` double NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `budgetitems_tbl`
--

INSERT INTO `budgetitems_tbl` (`id`, `item_name`, `item_cost`, `user_id`) VALUES
(1, 'KPLC token', 500, 2),
(2, 'Food Shopping', 2000, 2),
(4, 'rent money', 6000, 3),
(5, 'Food Shoppings', 10000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `budgetusers_tbl`
--

CREATE TABLE IF NOT EXISTS `budgetusers_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `budgetusers_tbl`
--

INSERT INTO `budgetusers_tbl` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Steven', 'Kirika', 'stevenkirika@yahoo.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Joe', 'Doe', 'joe@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b'),
(3, 'Mary', 'Doe', 'mary@gmail.com', '21232f297a57a5a743894a0e4a801fc3');
