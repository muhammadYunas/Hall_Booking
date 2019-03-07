-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2018 at 07:22 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hallbooking`
--
CREATE DATABASE IF NOT EXISTS `hallbooking` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hallbooking`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `ad_id` int(9) NOT NULL AUTO_INCREMENT,
  `ad_username` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `ad_password` varchar(100) CHARACTER SET armscii8 NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`ad_id`, `ad_username`, `ad_password`) VALUES
(1, 'donbok', 'donbok'),
(2, 'admin', 'admin'),
(3, 'admin', 'google12345'),
(4, 'donbok', 'google12345');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `bnk_name` varchar(100) CHARACTER SET armscii8 NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`b_id`, `bnk_name`) VALUES
(1, 'Apex Bank'),
(2, 'Axis Bank'),
(3, 'Canara'),
(4, 'Citi Bank'),
(5, 'HDFC Bank'),
(6, 'ICICI Bank'),
(7, 'Federal Bank'),
(8, 'SBI Bank'),
(9, 'Union Bank'),
(10, 'Yes Bank');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE IF NOT EXISTS `hall` (
  `h_id` int(9) NOT NULL AUTO_INCREMENT,
  `h_name` varchar(200) CHARACTER SET armscii8 NOT NULL,
  `h_place` varchar(200) CHARACTER SET armscii8 NOT NULL,
  `price` varchar(100) CHARACTER SET armscii8 NOT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`h_id`, `h_name`, `h_place`, `price`) VALUES
(1, 'SOSO THAM AUDITORIUM', 'GS ROAD IGP', '20,000'),
(2, 'SHILLONG CLUB', 'GS ROAD Oposite Indian Post', '10,000'),
(3, 'Sri Auribindu Hall', 'Municipal Road', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `user_booking`
--

CREATE TABLE IF NOT EXISTS `user_booking` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(100) NOT NULL,
  `u_mobile` varchar(20) NOT NULL,
  `h_id` int(11) NOT NULL,
  `b_date` varchar(100) NOT NULL,
  `amnt` varchar(1000) CHARACTER SET armscii8 NOT NULL,
  `h_active` varchar(1000) NOT NULL,
  `ran_id` varchar(1000) CHARACTER SET armscii8 NOT NULL,
  `payment` varchar(1000) CHARACTER SET armscii8 NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_booking`
--

INSERT INTO `user_booking` (`u_id`, `u_name`, `u_mobile`, `h_id`, `b_date`, `amnt`, `h_active`, `ran_id`, `payment`) VALUES
(8, 'MEGHATECH', '8014834317', 3, '04/12/2018', '8000', 'Active <a href=confirm.php>Confirm Your Booking</a>', '705936606', 'Not Complete');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
