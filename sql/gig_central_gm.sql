-- phpMyAdmin SQL Dump
-- version 4.6.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql.gordanaminovska.com
-- Generation Time: May 09, 2017 at 05:05 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gig_central_gm`
--

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

DROP TABLE IF EXISTS `Company`;
CREATE TABLE `Company` (
  `CompanyID` int(10) UNSIGNED NOT NULL,
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
  `Phone` varchar(25) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`CompanyID`, `Name`, `Address`, `CompanyCity`, `State`, `ZipCode`, `CompanyPhone`, `Website`, `FirstName`, `LastName`, `Email`, `Phone`) VALUES
(1, 'Amazon', '440 Terry Ave N', 'Seattle', 'WA', '98109', '(206) 266-1000', 'https://amazon.com', 'Jeff', 'Bezos', 'jeff.bezos@amazon.com', '(206) 266-1000'),
(2, 'Microsoft', 'Microsoft Headquarters One Microsoft Way', 'Redmond', 'WA', '98052', '(206) 123-4567', 'https://microsoft.com', 'Satya', 'Nadella', 'satya.nadella@microsoft.com', '(206) 123-4567'),
(3, 'Google', '601 N 34th St', 'Seattle', 'WA', '98103', '(206) 123-1000', 'https://google.com', 'Sundar', 'Pichai', 'sundar.pichai@amazon.com', '(206) 123-1000');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Victoria', 'viktoriacool@mail.ru', 'General', 'Hello world');

-- --------------------------------------------------------

--
-- Table structure for table `Gigs`
--

DROP TABLE IF EXISTS `Gigs`;
CREATE TABLE `Gigs` (
  `GigID` int(10) UNSIGNED NOT NULL,
  `CompanyID` int(10) UNSIGNED NOT NULL,
  `GigQualify` varchar(500) DEFAULT '',
  `EmploymentType` varchar(255) DEFAULT '',
  `GigOutline` varchar(500) DEFAULT '',
  `SpInstructions` varchar(350) DEFAULT '',
  `PayRate` varchar(50) DEFAULT '',
  `GigPosted` datetime DEFAULT NULL,
  `LastUpdated` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Gigs`
--

INSERT INTO `Gigs` (`GigID`, `CompanyID`, `GigQualify`, `EmploymentType`, `GigOutline`, `SpInstructions`, `PayRate`, `GigPosted`, `LastUpdated`) VALUES
(1, 1, 'HTML/CSS', 'Web Developer', 'Web maintenance', 'Email me your resume', 'None', '2017-05-09 16:55:38', '2017-05-09 23:55:38'),
(2, 2, 'C#/.NET', 'Computer Engineer', 'Development of web apps', 'Email me your resume', 'None', '2017-05-09 16:55:38', '2017-05-09 23:55:38'),
(3, 3, 'Photoshop', 'Graphic Designer', 'Designing site mockups', 'Email me your resume', 'None', '2017-05-09 16:55:38', '2017-05-09 23:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `Profile`
--

DROP TABLE IF EXISTS `Profile`;
CREATE TABLE `Profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `i_am_a` text,
  `first_name` text,
  `last_name` text,
  `email` text,
  `password` text NOT NULL,
  `picture` varchar(24) DEFAULT NULL,
  `bio` text,
  `subscribed_to_newsletters` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sc_Amenity`
--

DROP TABLE IF EXISTS `sc_Amenity`;
CREATE TABLE `sc_Amenity` (
  `AmenityKey` int(11) NOT NULL,
  `AmenityName` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sc_Amenity`
--

INSERT INTO `sc_Amenity` (`AmenityKey`, `AmenityName`) VALUES
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
-- Table structure for table `sc_Markers`
--

DROP TABLE IF EXISTS `sc_Markers`;
CREATE TABLE `sc_Markers` (
  `id` int(11) NOT NULL,
  `VenueKey` int(10) UNSIGNED DEFAULT '0',
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sc_Markers`
--

INSERT INTO `sc_Markers` (`id`, `VenueKey`, `lat`, `lng`) VALUES
(1, 1, 47.608940, -122.340141);

-- --------------------------------------------------------

--
-- Table structure for table `sc_Venue`
--

DROP TABLE IF EXISTS `sc_Venue`;
CREATE TABLE `sc_Venue` (
  `VenueKey` int(10) UNSIGNED NOT NULL,
  `VenueName` varchar(50) DEFAULT '',
  `VenueTypeKey` int(10) UNSIGNED DEFAULT '0',
  `VenueAddress` varchar(255) DEFAULT '',
  `City` varchar(255) DEFAULT '',
  `State` varchar(50) DEFAULT '',
  `ZipCode` varchar(10) DEFAULT '',
  `VenuePhone` varchar(10) DEFAULT '',
  `VenueWebsite` varchar(50) DEFAULT '',
  `VenueHours` varchar(50) DEFAULT '',
  `Food` varchar(5) DEFAULT '',
  `Bar` varchar(5) DEFAULT '',
  `Outlets` varchar(10) DEFAULT '',
  `WiFi` varchar(10) DEFAULT '',
  `Outdoor` varchar(10) DEFAULT '',
  `Wheelchair` varchar(10) DEFAULT '',
  `Parking` varchar(10) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_Venue`
--

INSERT INTO `sc_Venue` (`VenueKey`, `VenueName`, `VenueTypeKey`, `VenueAddress`, `City`, `State`, `ZipCode`, `VenuePhone`, `VenueWebsite`, `VenueHours`, `Food`, `Bar`, `Outlets`, `WiFi`, `Outdoor`, `Wheelchair`, `Parking`) VALUES
(1, 'Elliott Bay Book Company', 1, '1521 10th Ave', 'Seattle', 'WA', '98122', '2066246600', 'http://www.elliottbaybook.com', 'M-Th 10am-10pm, F-S 10am-11pm, Sun', '', '', '', '', '', '', ''),
(2, 'Caffe Vita', 2, '1005 E Pike St', 'Seattle', 'WA', '98122', '2067094440', 'http://www.caffevita.com/locations/wa/capitol-hill', 'M-F 6am-11pm, S-Sun 7am-11pm', '', '', '', '', '', '', ''),
(3, 'Seattle Public Library - Capitol Hill Branch', 3, '425 Harvard Ave E', 'Seattle', 'WA', '98102', '2066844715', 'http://www.spl.org/locations/capitol-hill-branch', 'M-Th 10am-8pm, F-S 10am-6pm, Sun 1pm-5pm', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sc_VenueAmenity`
--

DROP TABLE IF EXISTS `sc_VenueAmenity`;
CREATE TABLE `sc_VenueAmenity` (
  `VenueAmenityKey` int(11) NOT NULL,
  `AmenityKey` int(11) NOT NULL,
  `VenueKey` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sc_VenueAmenity`
--

INSERT INTO `sc_VenueAmenity` (`VenueAmenityKey`, `AmenityKey`, `VenueKey`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 4, 1),
(4, 1, 2),
(5, 4, 2),
(6, 1, 3),
(7, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sc_VenuePromotion`
--

DROP TABLE IF EXISTS `sc_VenuePromotion`;
CREATE TABLE `sc_VenuePromotion` (
  `VenuePromotionKey` int(10) UNSIGNED NOT NULL,
  `VenueKey` int(10) UNSIGNED DEFAULT '0',
  `UserKey` int(10) UNSIGNED DEFAULT '0',
  `VenuePromotionStarDate` datetime DEFAULT NULL,
  `VenuePromotionEndDate` datetime DEFAULT NULL,
  `VenuePromotionDetail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sc_VenueReview`
--

DROP TABLE IF EXISTS `sc_VenueReview`;
CREATE TABLE `sc_VenueReview` (
  `VenueReviewKey` int(10) UNSIGNED NOT NULL,
  `VenueKey` int(10) UNSIGNED DEFAULT '0',
  `UserKey` int(10) UNSIGNED DEFAULT '0',
  `ReviewRate` int(10) UNSIGNED DEFAULT '0',
  `ReviewComment` text,
  `ReviewDateAdded` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sc_VenueReview`
--

INSERT INTO `sc_VenueReview` (`VenueReviewKey`, `VenueKey`, `UserKey`, `ReviewRate`, `ReviewComment`, `ReviewDateAdded`) VALUES
(1, 1, 1, 3, 'It\'s noisy and their WiFi drops continuously', '2015-05-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sc_VenueType`
--

DROP TABLE IF EXISTS `sc_VenueType`;
CREATE TABLE `sc_VenueType` (
  `VenueTypeKey` int(10) UNSIGNED NOT NULL,
  `VenuetypeName` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sc_VenueType`
--

INSERT INTO `sc_VenueType` (`VenueTypeKey`, `VenuetypeName`) VALUES
(1, 'Coffee shop'),
(2, 'Library'),
(3, 'School'),
(4, 'Community Center'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `test_Customers`
--

DROP TABLE IF EXISTS `test_Customers`;
CREATE TABLE `test_Customers` (
  `CustomerID` int(10) UNSIGNED NOT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Email` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_Customers`
--

INSERT INTO `test_Customers` (`CustomerID`, `LastName`, `FirstName`, `Email`) VALUES
(1, 'Smith', 'Bob', 'bob@example.com'),
(2, 'Jones', 'Bll', 'bill@example.com'),
(3, 'Doe', 'John', 'john@example.com'),
(4, 'Rules', 'Ann', 'ann@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `Gigs`
--
ALTER TABLE `Gigs`
  ADD PRIMARY KEY (`GigID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indexes for table `Profile`
--
ALTER TABLE `Profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sc_Amenity`
--
ALTER TABLE `sc_Amenity`
  ADD PRIMARY KEY (`AmenityKey`);

--
-- Indexes for table `sc_Markers`
--
ALTER TABLE `sc_Markers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `VenueKey` (`VenueKey`);

--
-- Indexes for table `sc_Venue`
--
ALTER TABLE `sc_Venue`
  ADD PRIMARY KEY (`VenueKey`),
  ADD KEY `VenueTypeKey` (`VenueTypeKey`),
  ADD KEY `VenueKey_index` (`VenueKey`);

--
-- Indexes for table `sc_VenueAmenity`
--
ALTER TABLE `sc_VenueAmenity`
  ADD PRIMARY KEY (`VenueAmenityKey`),
  ADD KEY `AmenityKey` (`AmenityKey`),
  ADD KEY `VenueKey` (`VenueKey`);

--
-- Indexes for table `sc_VenuePromotion`
--
ALTER TABLE `sc_VenuePromotion`
  ADD PRIMARY KEY (`VenuePromotionKey`),
  ADD KEY `VenueKey` (`VenueKey`);

--
-- Indexes for table `sc_VenueReview`
--
ALTER TABLE `sc_VenueReview`
  ADD PRIMARY KEY (`VenueReviewKey`),
  ADD KEY `VenueKey` (`VenueKey`),
  ADD KEY `VenueReviewKey_index` (`VenueReviewKey`);

--
-- Indexes for table `sc_VenueType`
--
ALTER TABLE `sc_VenueType`
  ADD PRIMARY KEY (`VenueTypeKey`),
  ADD KEY `VenueTypeKey_index` (`VenueTypeKey`);

--
-- Indexes for table `test_Customers`
--
ALTER TABLE `test_Customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `CompanyID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Gigs`
--
ALTER TABLE `Gigs`
  MODIFY `GigID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Profile`
--
ALTER TABLE `Profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sc_Amenity`
--
ALTER TABLE `sc_Amenity`
  MODIFY `AmenityKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sc_Markers`
--
ALTER TABLE `sc_Markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sc_Venue`
--
ALTER TABLE `sc_Venue`
  MODIFY `VenueKey` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sc_VenueAmenity`
--
ALTER TABLE `sc_VenueAmenity`
  MODIFY `VenueAmenityKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sc_VenuePromotion`
--
ALTER TABLE `sc_VenuePromotion`
  MODIFY `VenuePromotionKey` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sc_VenueReview`
--
ALTER TABLE `sc_VenueReview`
  MODIFY `VenueReviewKey` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sc_VenueType`
--
ALTER TABLE `sc_VenueType`
  MODIFY `VenueTypeKey` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `test_Customers`
--
ALTER TABLE `test_Customers`
  MODIFY `CustomerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Gigs`
--
ALTER TABLE `Gigs`
  ADD CONSTRAINT `Gigs_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `Company` (`CompanyID`) ON DELETE CASCADE;

--
-- Constraints for table `sc_Markers`
--
ALTER TABLE `sc_Markers`
  ADD CONSTRAINT `sc_Markers_ibfk_1` FOREIGN KEY (`VenueKey`) REFERENCES `sc_Venue` (`VenueKey`) ON DELETE CASCADE;

--
-- Constraints for table `sc_Venue`
--
ALTER TABLE `sc_Venue`
  ADD CONSTRAINT `sc_Venue_ibfk_1` FOREIGN KEY (`VenueTypeKey`) REFERENCES `sc_VenueType` (`VenueTypeKey`) ON DELETE CASCADE;

--
-- Constraints for table `sc_VenueAmenity`
--
ALTER TABLE `sc_VenueAmenity`
  ADD CONSTRAINT `sc_VenueAmenity_ibfk_1` FOREIGN KEY (`AmenityKey`) REFERENCES `sc_Amenity` (`AmenityKey`),
  ADD CONSTRAINT `sc_VenueAmenity_ibfk_2` FOREIGN KEY (`VenueKey`) REFERENCES `sc_Venue` (`VenueKey`);

--
-- Constraints for table `sc_VenuePromotion`
--
ALTER TABLE `sc_VenuePromotion`
  ADD CONSTRAINT `sc_VenuePromotion_ibfk_1` FOREIGN KEY (`VenueKey`) REFERENCES `sc_Venue` (`VenueKey`) ON DELETE CASCADE;

--
-- Constraints for table `sc_VenueReview`
--
ALTER TABLE `sc_VenueReview`
  ADD CONSTRAINT `sc_VenueReview_ibfk_1` FOREIGN KEY (`VenueKey`) REFERENCES `sc_Venue` (`VenueKey`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
