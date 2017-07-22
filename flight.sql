-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2017 at 04:31 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight`
--
CREATE DATABASE IF NOT EXISTS `flight` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `flight`;

-- --------------------------------------------------------

--
-- Table structure for table `airline_table`
--

DROP TABLE IF EXISTS `airline_table`;
CREATE TABLE IF NOT EXISTS `airline_table` (
  `airline_id` int(20) NOT NULL AUTO_INCREMENT,
  `airline_code` varchar(20) DEFAULT NULL,
  `airline_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`airline_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6583 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_flight_notification_table`
--

DROP TABLE IF EXISTS `customer_flight_notification_table`;
CREATE TABLE IF NOT EXISTS `customer_flight_notification_table` (
  `Customer_flight_notification_id` int(20) NOT NULL AUTO_INCREMENT,
  `Customer_flight_notification_cust_contact` varchar(20) DEFAULT NULL,
  `Customer_flight_notification_message_status` varchar(20) DEFAULT NULL,
  `Customer_flight_not_cust_flight_fl_id` varchar(50) DEFAULT NULL,
  `Customer_flight_notification_message` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Customer_flight_notification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_flight_table`
--

DROP TABLE IF EXISTS `customer_flight_table`;
CREATE TABLE IF NOT EXISTS `customer_flight_table` (
  `Customer_flight_id` int(20) NOT NULL AUTO_INCREMENT,
  `Customer_flight_flight_id` varchar(20) DEFAULT NULL,
  `Customer_flight_customer_login_id` int(20) DEFAULT NULL,
  `Customer_flight_timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Customer_flight_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9097 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight_route_table`
--

DROP TABLE IF EXISTS `flight_route_table`;
CREATE TABLE IF NOT EXISTS `flight_route_table` (
  `Flight_route_id` int(20) NOT NULL AUTO_INCREMENT,
  `Flight_route_route_id` varchar(20) DEFAULT NULL,
  `Flight_route_flight_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Flight_route_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3654644 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight_table`
--

DROP TABLE IF EXISTS `flight_table`;
CREATE TABLE IF NOT EXISTS `flight_table` (
  `Flight_id` int(20) NOT NULL AUTO_INCREMENT,
  `Flight_number` varchar(20) DEFAULT NULL,
  `Flight_name` varchar(20) DEFAULT NULL,
  `Flight_route_route_id` varchar(20) DEFAULT NULL,
  `Flight_schedule` varchar(20) DEFAULT NULL,
  `Flight_departure_time` varchar(30) DEFAULT NULL,
  `Flight_airline_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`Flight_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32322326 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

DROP TABLE IF EXISTS `login_table`;
CREATE TABLE IF NOT EXISTS `login_table` (
  `Login_id` int(20) NOT NULL,
  `Login_username` varchar(20) DEFAULT NULL,
  `Login_password` varchar(100) DEFAULT NULL,
  `Login_fullname` varchar(20) DEFAULT NULL,
  `Login_contact` varchar(20) DEFAULT NULL,
  `Login_email` varchar(20) DEFAULT NULL,
  `Login_rank` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`Login_id`, `Login_username`, `Login_password`, `Login_fullname`, `Login_contact`, `Login_email`, `Login_rank`) VALUES
(34545, 'smwangi', '5e212507ba2c3558ba83d99d867c983e', 'samson mwangi', '254724090774', 'ssd@kk.com', '2'),
(122112, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin admin', '1212112', 'email@email.com', '1'),
(12345678, 'jkamau', '81dc9bdb52d04dc20036dbd8313ed055', 'Joseph Kamau', '254722978292', 'joseph.kamau@kaa.go.', '2');

-- --------------------------------------------------------

--
-- Table structure for table `notification_table`
--

DROP TABLE IF EXISTS `notification_table`;
CREATE TABLE IF NOT EXISTS `notification_table` (
  `Notification_id` int(20) NOT NULL,
  `Notification_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_table`
--

INSERT INTO `notification_table` (`Notification_id`, `Notification_name`) VALUES
(3242234, 'er'),
(343, 'ewrerw'),
(1234, 'flight change'),
(2323, 'gf'),
(11111, 'N/A'),
(2121212, 'rer'),
(323234, 'ere');

-- --------------------------------------------------------

--
-- Table structure for table `routes_table`
--

DROP TABLE IF EXISTS `routes_table`;
CREATE TABLE IF NOT EXISTS `routes_table` (
  `Route_id` varchar(20) NOT NULL,
  `Route_description` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
