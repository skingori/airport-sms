-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2017 at 01:34 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline_table`
--

CREATE TABLE `airline_table` (
  `airline_id` int(20) NOT NULL DEFAULT '0',
  `airline_code` varchar(20) DEFAULT NULL,
  `airline_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airline_table`
--

INSERT INTO `airline_table` (`airline_id`, `airline_code`, `airline_name`) VALUES
(0, '0', ''),
(111, '0', 'KQ'),
(6576, '0', 'vbnv');

-- --------------------------------------------------------

--
-- Table structure for table `customer_flight_notification_table`
--

CREATE TABLE `customer_flight_notification_table` (
  `Customer_flight_notification_id` int(20) NOT NULL,
  `Customer_flight_notification_cust_contact` varchar(20) DEFAULT NULL,
  `Customer_flight_notification_message_status` varchar(20) DEFAULT NULL,
  `Customer_flight_not_cust_flight_fl_id` varchar(50) DEFAULT NULL,
  `Customer_flight_notification_message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_flight_notification_table`
--

INSERT INTO `customer_flight_notification_table` (`Customer_flight_notification_id`, `Customer_flight_notification_cust_contact`, `Customer_flight_notification_message_status`, `Customer_flight_not_cust_flight_fl_id`, `Customer_flight_notification_message`) VALUES
(45, '254724090774', 'READ', '234324', 'Best app of the year,@04:13:47am'),
(46, '254724090774', 'READ', '234324', 'Should your baggage be delayed, you will be notified of its arrival once you have completed a â€˜Pro'),
(47, '254724090774', 'READ', '234324', 'We are happy to keep you updated with relevant flight information during your journey. With our â€˜K'),
(48, '254724090774', 'READ', '234324', 'In the event of a delay lasting more than 30 minutes, or multiple delays that would add up to more than 30 minutes.,@02:48:51pm'),
(49, '254724090774', 'READ', '234324', 'If your flight is cancelled, you will be informed about rebooking to another flight and/or requesting a refund.,@02:51:26pm'),
(50, '254724090774', 'READ', '234324', 'The plane will not crash-land, The journey will not end in sorrow, But it will end in undiluted joy. Have a safe flight.,@05:23:24pm'),
(51, '254724090774', 'UNREAD', '234324', 'The way of peace and safety Is where I wish you go. The path of fulfilment and love Is where I which you take Have the best journey ever! Safe journey to you.,@05:26:02pm'),
(52, '254724090774', 'UNREAD', '234324', 'The way of peace and safety Is where I wish you go. The path of fulfilment and love Is where I which you take Have the best journey ever! Safe journey to you.,@05:27:09pm'),
(53, '254722978292', 'READ', '234324', '30 hours before departure*. You can use the link in the e-mail to check in right away.,@05:48:50pm'),
(54, '254722978292', 'READ', '234324', '30 hours before departure*. You can use the link in the e-mail to check in right away.,@05:50:32pm'),
(55, '254722978292', 'READ', '234324', '3434,@05:51:44pm'),
(56, '254722978292', 'UNREAD', '234324', 'We will keep you updated about relevant flight information by phone, text message or e-mail during your trip. We will also contact you whenever there is a change in your flight itinerary.,@05:52:50pm'),
(57, '254722978292', 'UNREAD', '234324', 'This is my test message,@06:00:14pm'),
(58, '254722978292', 'UNREAD', '234324', 'Your flight is due ,kindly o to T1A,@06:04:15pm'),
(59, '254724090774', 'UNREAD', '234324', 'ann is my love,@09:11:06pm'),
(60, '254724090774', 'UNREAD', '234324', 'This flight is delayed,@09:14:07pm'),
(61, '254724090774', 'UNREAD', '234324', 'weew,@01:21:59pm');

-- --------------------------------------------------------

--
-- Table structure for table `customer_flight_table`
--

CREATE TABLE `customer_flight_table` (
  `Customer_flight_id` varchar(20) NOT NULL,
  `Customer_flight_flight_id` int(20) DEFAULT NULL,
  `Customer_flight_customer_login_id` int(20) DEFAULT NULL,
  `new_column` int(11) DEFAULT NULL,
  `Customer_flight_timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_flight_table`
--

INSERT INTO `customer_flight_table` (`Customer_flight_id`, `Customer_flight_flight_id`, `Customer_flight_customer_login_id`, `new_column`, `Customer_flight_timestamp`) VALUES
('001', 234324, 34545, NULL, '2017-07-07 02:12:55'),
('292', 234324, 4324255, NULL, '2017-07-07 15:46:25'),
('2921', 234324, 12345678, NULL, '2017-07-07 15:47:59'),
('9090', 234324, 34545, NULL, '2017-07-07 12:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `flight_route_table`
--

CREATE TABLE `flight_route_table` (
  `Flight_route_id` int(20) NOT NULL,
  `Flight_route_route_id` varchar(20) DEFAULT NULL,
  `Flight_route_flight_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_route_table`
--

INSERT INTO `flight_route_table` (`Flight_route_id`, `Flight_route_route_id`, `Flight_route_flight_id`) VALUES
(998, '456456456', '32322323'),
(2323, '456456456', '32322323'),
(32323, '456456456', '32322323'),
(342445, '456456456', '32322323'),
(764787, '456456456', '32322323'),
(3654643, '456456456', '234324');

-- --------------------------------------------------------

--
-- Table structure for table `flight_table`
--

CREATE TABLE `flight_table` (
  `Flight_id` int(20) NOT NULL,
  `Flight_number` varchar(20) DEFAULT NULL,
  `Flight_name` varchar(20) DEFAULT NULL,
  `Flight_route_route_id` varchar(20) DEFAULT NULL,
  `Flight_schedule` varchar(20) DEFAULT NULL,
  `Flight_departure_time` varchar(30) DEFAULT NULL,
  `Flight_airline_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_table`
--

INSERT INTO `flight_table` (`Flight_id`, `Flight_number`, `Flight_name`, `Flight_route_route_id`, `Flight_schedule`, `Flight_departure_time`, `Flight_airline_id`) VALUES
(0, '', '', '32322323', '', '', 0),
(234324, 'KG546', 'KG', '456456456', '2018-03-02T00:00', '2018-03-02T00:00', 6576),
(32322323, '232', '23232', '587', '0323-02-23T03:03', '0032-02-23T22:03', 111);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `Login_id` int(20) NOT NULL,
  `Login_username` varchar(20) DEFAULT NULL,
  `Login_password` varchar(100) DEFAULT NULL,
  `Login_fullname` varchar(20) DEFAULT NULL,
  `Login_contact` varchar(20) DEFAULT NULL,
  `Login_email` varchar(20) DEFAULT NULL,
  `Login_rank` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`Login_id`, `Login_username`, `Login_password`, `Login_fullname`, `Login_contact`, `Login_email`, `Login_rank`) VALUES
(34545, 'smwangi', '5e212507ba2c3558ba83d99d867c983e', 'samson mwangi', '254724090774', 'ssd@kk.com', '2'),
(122112, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin admin', '1212112', 'email@email.com', '1'),
(4324255, 'ttt', '25d55ad283aa400af464c76d713c07ad', 'retr retwt', '2342423', 'erw@h.com', '2'),
(12345678, 'jkamau', '81dc9bdb52d04dc20036dbd8313ed055', 'Joseph Kamau', '254722978292', 'joseph.kamau@kaa.go.', '2');

-- --------------------------------------------------------

--
-- Table structure for table `notification_table`
--

CREATE TABLE `notification_table` (
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

CREATE TABLE `routes_table` (
  `Route_id` int(20) NOT NULL,
  `Route_description` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes_table`
--

INSERT INTO `routes_table` (`Route_id`, `Route_description`) VALUES
(0, '64566'),
(587, 'hgfhgfh'),
(456456456, 'gdfgdfg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline_table`
--
ALTER TABLE `airline_table`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `customer_flight_notification_table`
--
ALTER TABLE `customer_flight_notification_table`
  ADD PRIMARY KEY (`Customer_flight_notification_id`);

--
-- Indexes for table `customer_flight_table`
--
ALTER TABLE `customer_flight_table`
  ADD PRIMARY KEY (`Customer_flight_id`);

--
-- Indexes for table `flight_route_table`
--
ALTER TABLE `flight_route_table`
  ADD PRIMARY KEY (`Flight_route_id`);

--
-- Indexes for table `flight_table`
--
ALTER TABLE `flight_table`
  ADD PRIMARY KEY (`Flight_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`Login_id`);

--
-- Indexes for table `routes_table`
--
ALTER TABLE `routes_table`
  ADD PRIMARY KEY (`Route_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_flight_notification_table`
--
ALTER TABLE `customer_flight_notification_table`
  MODIFY `Customer_flight_notification_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `flight_route_table`
--
ALTER TABLE `flight_route_table`
  MODIFY `Flight_route_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3654644;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
