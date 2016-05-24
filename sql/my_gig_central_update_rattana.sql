-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2016 at 07:19 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_gig_central`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` text NOT NULL,
  `AdminEmail` text NOT NULL,
  `AdminPassword` text NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `AdminName`, `AdminEmail`, `AdminPassword`) VALUES
(1, '', 'rattana.neak@gmail.com', '200987'),
(2, '', 'rattana@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `CompanyID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT '',
  `Address` varchar(85) DEFAULT '',
  `CompanyCity` varchar(40) DEFAULT '',
  `State` varchar(25) DEFAULT 'WA',
  `ZipCode` varchar(25) DEFAULT '',
  `CompanyPhone` varchar(25) DEFAULT '',
  `Website` varchar(100) DEFAULT '',
  `FirstName` varchar(30) DEFAULT '',
  `LastName` varchar(30) DEFAULT '',
  `Email` varchar(75) DEFAULT '',
  `Phone` varchar(25) DEFAULT '',
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Victoria', 'viktoriacool@mail.ru', 'General', 'Hello world');

-- --------------------------------------------------------

--
-- Table structure for table `gigs`
--

CREATE TABLE IF NOT EXISTS `gigs` (
  `GigID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` int(10) unsigned NOT NULL,
  `GigQualify` varchar(500) DEFAULT '',
  `EmploymentType` varchar(255) DEFAULT '',
  `GigOutline` varchar(500) DEFAULT '',
  `SpInstructions` varchar(350) DEFAULT '',
  `PayRate` varchar(50) DEFAULT '',
  `GigPosted` datetime DEFAULT NULL,
  `LastUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`GigID`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Profile`
--

CREATE TABLE IF NOT EXISTS `Profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `first_name` text,
  `last_name` text,
  `email` text,
  `password` text NOT NULL,
  `picture` varchar(24) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `sc_amenity`
--

CREATE TABLE IF NOT EXISTS `sc_amenity` (
  `AmenityKey` int(11) NOT NULL AUTO_INCREMENT,
  `AmenityName` varchar(128) NOT NULL,
  PRIMARY KEY (`AmenityKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sc_amenity`
--

INSERT INTO `sc_amenity` (`AmenityKey`, `AmenityName`) VALUES
(1, 'Wi-Fi'),
(2, 'Food'),
(3, 'Bar'),
(4, 'Outlets'),
(5, 'Food'),
(6, 'Outdoor Seating'),
(7, 'Parking'),
(8, 'Wheelchair Accessable');

-- --------------------------------------------------------

--
-- Table structure for table `sc_markers`
--

CREATE TABLE IF NOT EXISTS `sc_markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `VenueKey` int(10) unsigned DEFAULT '0',
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `VenueKey` (`VenueKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sc_markers`
--

INSERT INTO `sc_markers` (`id`, `VenueKey`, `lat`, `lng`) VALUES
(1, 1, 47.608940, -122.340141);

-- --------------------------------------------------------

--
-- Table structure for table `sc_venue`
--

CREATE TABLE IF NOT EXISTS `sc_venue` (
  `VenueKey` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VenueName` varchar(50) DEFAULT '',
  `VenueTypeKey` int(10) unsigned DEFAULT '0',
  `VenueAddress` varchar(255) DEFAULT '',
  `City` varchar(255) DEFAULT '',
  `State` varchar(50) DEFAULT '',
  `ZipCode` varchar(10) DEFAULT '',
  `VenuePhone` varchar(10) DEFAULT '',
  `VenueWebsite` varchar(50) DEFAULT '',
  `VenueHours` varchar(50) DEFAULT '',
  PRIMARY KEY (`VenueKey`),
  KEY `VenueTypeKey` (`VenueTypeKey`),
  KEY `VenueKey_index` (`VenueKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sc_venue`
--

INSERT INTO `sc_venue` (`VenueKey`, `VenueName`, `VenueTypeKey`, `VenueAddress`, `City`, `State`, `ZipCode`, `VenuePhone`, `VenueWebsite`, `VenueHours`) VALUES
(1, 'Elliott Bay Book Company', 1, '1521 10th Ave', 'Seattle', 'WA', '98122', '2066246600', 'http://www.elliottbaybook.com', 'M-Th 10am-10pm, F-S 10am-11pm, Sun'),
(2, 'Caffe Vita', 2, '1005 E Pike St', 'Seattle', 'WA', '98122', '2067094440', 'http://www.caffevita.com/locations/wa/capitol-hill', 'M-F 6am-11pm, S-Sun 7am-11pm'),
(3, 'Seattle Public Library - Capitol Hill Branch', 3, '425 Harvard Ave E', 'Seattle', 'WA', '98102', '2066844715', 'http://www.spl.org/locations/capitol-hill-branch', 'M-Th 10am-8pm, F-S 10am-6pm, Sun 1pm-5pm');

-- --------------------------------------------------------

--
-- Table structure for table `sc_venueamenity`
--

CREATE TABLE IF NOT EXISTS `sc_venueamenity` (
  `VenueAmenityKey` int(11) NOT NULL AUTO_INCREMENT,
  `AmenityKey` int(11) NOT NULL,
  `VenueKey` int(10) unsigned NOT NULL,
  PRIMARY KEY (`VenueAmenityKey`),
  KEY `AmenityKey` (`AmenityKey`),
  KEY `VenueKey` (`VenueKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sc_venueamenity`
--

INSERT INTO `sc_venueamenity` (`VenueAmenityKey`, `AmenityKey`, `VenueKey`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 4, 1),
(4, 1, 2),
(5, 4, 2),
(6, 1, 3),
(7, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sc_venuepromotion`
--

CREATE TABLE IF NOT EXISTS `sc_venuepromotion` (
  `VenuePromotionKey` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VenueKey` int(10) unsigned DEFAULT '0',
  `UserKey` int(10) unsigned DEFAULT '0',
  `VenuePromotionStarDate` datetime DEFAULT NULL,
  `VenuePromotionEndDate` datetime DEFAULT NULL,
  `VenuePromotionDetail` text,
  PRIMARY KEY (`VenuePromotionKey`),
  KEY `VenueKey` (`VenueKey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sc_venuereview`
--

CREATE TABLE IF NOT EXISTS `sc_venuereview` (
  `VenueReviewKey` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VenueKey` int(10) unsigned DEFAULT '0',
  `UserKey` int(10) unsigned DEFAULT '0',
  `ReviewRate` int(10) unsigned DEFAULT '0',
  `ReviewComment` text,
  `ReviewDateAdded` datetime DEFAULT NULL,
  PRIMARY KEY (`VenueReviewKey`),
  KEY `VenueKey` (`VenueKey`),
  KEY `VenueReviewKey_index` (`VenueReviewKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sc_venuereview`
--

INSERT INTO `sc_venuereview` (`VenueReviewKey`, `VenueKey`, `UserKey`, `ReviewRate`, `ReviewComment`, `ReviewDateAdded`) VALUES
(1, 1, 1, 3, 'It''s noisy and their WiFi drops continuously', '2015-05-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sc_venuetype`
--

CREATE TABLE IF NOT EXISTS `sc_venuetype` (
  `VenueTypeKey` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VenuetypeName` varchar(50) DEFAULT '',
  PRIMARY KEY (`VenueTypeKey`),
  KEY `VenueTypeKey_index` (`VenueTypeKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sc_venuetype`
--

INSERT INTO `sc_venuetype` (`VenueTypeKey`, `VenuetypeName`) VALUES
(1, 'Coffee shop'),
(2, 'Library'),
(3, 'School'),
(4, 'Community Center'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `test_customers`
--

CREATE TABLE IF NOT EXISTS `test_customers` (
  `CustomerID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `LastName` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Email` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `test_customers`
--

INSERT INTO `test_customers` (`CustomerID`, `LastName`, `FirstName`, `Email`) VALUES
(1, 'Smith', 'Bob', 'bob@example.com'),
(2, 'Jones', 'Bll', 'bill@example.com'),
(3, 'Doe', 'John', 'john@example.com'),
(4, 'Rules', 'Ann', 'ann@example.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gigs`
--
ALTER TABLE `gigs`
  ADD CONSTRAINT `gigs_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE CASCADE;

--
-- Constraints for table `sc_markers`
--
ALTER TABLE `sc_markers`
  ADD CONSTRAINT `sc_markers_ibfk_1` FOREIGN KEY (`VenueKey`) REFERENCES `sc_venue` (`VenueKey`) ON DELETE CASCADE;

--
-- Constraints for table `sc_venue`
--
ALTER TABLE `sc_venue`
  ADD CONSTRAINT `sc_Venue_ibfk_1` FOREIGN KEY (`VenueTypeKey`) REFERENCES `sc_venuetype` (`VenueTypeKey`) ON DELETE CASCADE;

--
-- Constraints for table `sc_venueamenity`
--
ALTER TABLE `sc_venueamenity`
  ADD CONSTRAINT `sc_venueamenity_ibfk_1` FOREIGN KEY (`AmenityKey`) REFERENCES `sc_amenity` (`AmenityKey`),
  ADD CONSTRAINT `sc_venueamenity_ibfk_2` FOREIGN KEY (`VenueKey`) REFERENCES `sc_venue` (`VenueKey`);

--
-- Constraints for table `sc_venuepromotion`
--
ALTER TABLE `sc_venuepromotion`
  ADD CONSTRAINT `sc_venuepromotion_ibfk_1` FOREIGN KEY (`VenueKey`) REFERENCES `sc_venue` (`VenueKey`) ON DELETE CASCADE;

--
-- Constraints for table `sc_venuereview`
--
ALTER TABLE `sc_venuereview`
  ADD CONSTRAINT `sc_venuereview_ibfk_1` FOREIGN KEY (`VenueKey`) REFERENCES `sc_venue` (`VenueKey`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
