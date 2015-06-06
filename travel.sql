-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2012 at 04:41 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`, `Mail`) VALUES
('ankit.bhai', 'gggggg', 'ankit.rohillaa@yahoo.com'),
('prachi.behen', 'abcdefgh', 'prachi@yahoo.co.in');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `From` text NOT NULL,
  `To` text NOT NULL,
  `Car_name` text NOT NULL,
  `Name` text NOT NULL,
  `Age` int(11) NOT NULL,
  `AC` text NOT NULL,
  `Date_time_book` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Date_time_from` text NOT NULL,
  `Address` text NOT NULL,
  `PIN` text NOT NULL,
  `Contact_no` text NOT NULL,
  `Payment_type` text NOT NULL,
  `Card_Bank_type` text NOT NULL,
  `Card_holder_name` text NOT NULL,
  `Expiry_date` text NOT NULL,
  `Card_no` text NOT NULL,
  `CVV_no` int(11) NOT NULL,
  `Distance` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Mail` text NOT NULL,
  `Done` int(11) NOT NULL,
  `Passcode` text NOT NULL,
  `Deleted` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`ID`, `From`, `To`, `Car_name`, `Name`, `Age`, `AC`, `Date_time_book`, `Date_time_from`, `Address`, `PIN`, `Contact_no`, `Payment_type`, `Card_Bank_type`, `Card_holder_name`, `Expiry_date`, `Card_no`, `CVV_no`, `Distance`, `Amount`, `Mail`, `Done`, `Passcode`, `Deleted`) VALUES
(59, 'Agra', 'Kanpur', 'Omni E Van', 'Raman', 20, 'Yes', '2012-07-26 14:20:25', '1/12/2012  0:0 AM', 'T 620 , Rishi Nagar , Shakur Basti , New Delhi', '110034', '9913891623', 'Credit card', 'American Express', 'Raman', '09/2020', '8698977998985654', 322, 532, 2128, 'raman@yahoo.com', 0, '', 0),
(60, 'Agra', 'Shimla', 'Eeco', 'Rahul', 20, 'No', '2012-07-26 14:22:12', '21/10/2012  12:30 PM', 'Block B-3 , New Friends Colony , Delhi', '110058', '9081784268', 'Debit card', 'Indian Overseas Bank', 'Rahul', '04/2015', '8768797998984423', 345, 423, 1692, 'rahul@gmail.com', 0, '', 0),
(61, 'Kolkata', 'Mount Abu', '800', 'Ravi', 39, 'Yes', '2012-07-26 14:23:32', '5/9/2012  6:0 AM', 'C-8 /200 B Keshav Puram , New Delhi', '110035', '8795845846', 'Debit card', 'Reserve Bank of India', 'Ravi', '01/2033', '7958866886863456', 456, 1455, 7275, 'ravi@rediff.com', 0, '', 0),
(62, 'Kanpur', 'Shimla', 'Eeco', 'Prateek', 32, 'Yes', '2012-07-26 14:25:24', '1/10/2012  9:0 AM', 'House 994 , Gali No. 76 , Hari Nagar New Delhi', '110023', '6986986987', 'Credit card', 'Visa', 'Prateek', '05/2021', '8768979897983457', 127, 512, 2048, 'pratekk_cool@yahoo.co.in', 0, '', 0),
(63, 'Chennai', 'Kolkata', 'Fortuner', 'Prashant', 22, 'Yes', '2012-07-26 14:27:05', '22/11/2012  06:30 AM', 'C-6/346 B , Prashant Vihar , New Delhi', '110045', '9991273871', 'Debit card', 'ICICI Bank', 'Prashant', '01/2027', '5886865856835467', 345, 1323, 18522, 'prasha@yahoo.com', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE IF NOT EXISTS `car_models` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Rupees_per_kilometre` int(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Company` text NOT NULL,
  `Pictures` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Available` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`ID`, `Name`, `Rupees_per_kilometre`, `Capacity`, `Company`, `Pictures`, `Total`, `Available`) VALUES
(37, 'Fortuner', 14, 8, 'Toyota', 4, 10, 9),
(38, 'Eeco', 4, 6, 'Maruti Suzuki', 5, 15, 13),
(39, 'I 10', 6, 4, 'Hyundai', 2, 5, 5),
(40, 'Swift Dzire', 8, 5, 'Maruti Suzuki', 2, 15, 15),
(41, 'Omni E Van', 4, 5, 'Maruti Suzuki', 3, 30, 29),
(42, '800', 5, 4, 'Maruti Suzuki', 2, 10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Manager` text NOT NULL,
  `City` text NOT NULL,
  `Address` text NOT NULL,
  `PIN` text NOT NULL,
  `Contact_no` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `Manager`, `City`, `Address`, `PIN`, `Contact_no`) VALUES
(1, 'Ramesh', 'Delhi', 'B1A / 55B Janak Puri', '110058', '9955773385'),
(3, 'Sunita', 'Agra', 'Taj nagari Taj marketshop no - 99A', '334677', '288634'),
(5, 'Kiran Bedi', 'Kolkata', 'Panchmadi marg block C4 , Machhi market shop no. 5', '330053', '7562365'),
(6, 'Manmohan Singh', 'Amritsar', 'Gurudwara gali , plot no -22', '440745', '9087097113');

-- --------------------------------------------------------

--
-- Table structure for table `distance`
--

CREATE TABLE IF NOT EXISTS `distance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Locations` text NOT NULL,
  `Agra` int(11) NOT NULL,
  `Delhi` int(11) NOT NULL,
  `Kanpur` int(11) NOT NULL,
  `Mumbai` int(11) NOT NULL,
  `Kolkata` int(11) NOT NULL,
  `Shimla` int(11) NOT NULL,
  `Chennai` int(11) NOT NULL,
  `Mount Abu` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `distance`
--

INSERT INTO `distance` (`ID`, `Locations`, `Agra`, `Delhi`, `Kanpur`, `Mumbai`, `Kolkata`, `Shimla`, `Chennai`, `Mount Abu`) VALUES
(1, 'Agra', 0, 232, 532, 995, 845, 423, 1996, 264),
(2, 'Delhi', 232, 0, 623, 1523, 623, 223, 2104, 395),
(3, 'Kanpur', 532, 623, 0, 954, 231, 512, 1754, 745),
(4, 'Mumbai', 995, 1523, 954, 0, 734, 884, 645, 856),
(5, 'Kolkata', 845, 623, 231, 734, 0, 567, 1323, 1455),
(6, 'Shimla', 423, 223, 512, 884, 567, 0, 2744, 775),
(7, 'Chennai', 1996, 2104, 1754, 645, 1323, 2744, 0, 1533),
(8, 'Mount Abu', 264, 395, 745, 856, 1455, 775, 1533, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp_bill`
--

CREATE TABLE IF NOT EXISTS `temp_bill` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `From` text NOT NULL,
  `To` text NOT NULL,
  `Car_name` text NOT NULL,
  `Name` text NOT NULL,
  `Age` int(11) NOT NULL,
  `AC` text NOT NULL,
  `Date_time_book` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Date_time_from` text NOT NULL,
  `Address` text NOT NULL,
  `PIN` text NOT NULL,
  `Contact_no` text NOT NULL,
  `Payment_type` text NOT NULL,
  `Card_Bank_type` text NOT NULL,
  `Card_holder_name` text NOT NULL,
  `Expiry_date` text NOT NULL,
  `Card_no` text NOT NULL,
  `CVV_no` int(11) NOT NULL,
  `Distance` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Mail` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
