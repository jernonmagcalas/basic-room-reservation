-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2016 at 09:36 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.6.20-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `rosannas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_password` varchar(2555) NOT NULL,
  `admin_type` varchar(255) NOT NULL DEFAULT 'manager',
  `admin_active` tinyint(1) NOT NULL DEFAULT '1',
  `admin_created` datetime NOT NULL,
  `admin_updated` datetime NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `admin_name` (`admin_name`,`admin_user`,`admin_type`,`admin_active`,`admin_created`,`admin_updated`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_name` varchar(255) NOT NULL,
  `reservation_start` datetime NOT NULL,
  `reservation_end` datetime NOT NULL,
  `reservation_pax` tinyint(2) NOT NULL,
  `reservation_subtotal` int(11) NOT NULL,
  `reservation_discount` float(10,2) NOT NULL,
  `reservation_total` float(10,2) NOT NULL,
  `reservation_type` varchar(255) NOT NULL DEFAULT 'walk-in',
  `reservation_created` datetime NOT NULL,
  `reservation_updated` datetime NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `reservation_name` (`reservation_name`,`reservation_start`,`reservation_end`,`reservation_created`,`reservation_updated`),
  KEY `reservation_total` (`reservation_total`),
  KEY `reservation_type` (`reservation_type`),
  KEY `reservation_subtotal` (`reservation_subtotal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_admin`
--

CREATE TABLE IF NOT EXISTS `reservation_admin` (
  `reservation` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  KEY `reservation` (`reservation`,`admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_room`
--

CREATE TABLE IF NOT EXISTS `reservation_room` (
  `reservation` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  KEY `reservation` (`reservation`,`room`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_price_low` int(11) NOT NULL,
  `room_price_high` int(11) NOT NULL,
  `room_min` int(2) NOT NULL DEFAULT '2',
  `room_max` int(2) NOT NULL,
  `room_additional` int(11) NOT NULL,
  `room_active` tinyint(1) NOT NULL DEFAULT '1',
  `room_created` datetime NOT NULL,
  `room_updated` datetime NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `room_name` (`room_name`,`room_type`,`room_price_low`,`room_min`,`room_max`,`room_additional`,`room_active`,`room_created`,`room_updated`),
  KEY `room_price_high` (`room_price_high`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_amount` float(10,2) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_created` datetime NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_admin`
--

CREATE TABLE IF NOT EXISTS `transaction_admin` (
  `transaction` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  KEY `transaction` (`transaction`,`admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_reservation`
--

CREATE TABLE IF NOT EXISTS `transaction_reservation` (
  `transaction` int(11) NOT NULL,
  `reservation` int(11) NOT NULL,
  KEY `transaction` (`transaction`,`reservation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
