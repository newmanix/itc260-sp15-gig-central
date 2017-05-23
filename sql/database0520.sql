-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Amenity`;
CREATE TABLE `Amenity` (
  `AmenityKey` int(11) NOT NULL AUTO_INCREMENT,
  `AmenityName` varchar(128) NOT NULL,
  PRIMARY KEY (`AmenityKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Amenity` (`AmenityKey`, `AmenityName`) VALUES
(1,	'Wi-Fi'),
(2,	'Food'),
(3,	'Bar'),
(4,	'Outlets'),
(5,	'Food'),
(6,	'Outdoor Seating'),
(7,	'Parking'),
(8,	'Wheelchair Accessable')
ON DUPLICATE KEY UPDATE `AmenityKey` = VALUES(`AmenityKey`), `AmenityName` = VALUES(`AmenityName`);

DROP TABLE IF EXISTS `Company`;
CREATE TABLE `Company` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Company` (`CompanyID`, `Name`, `Address`, `CompanyCity`, `State`, `ZipCode`, `CompanyPhone`, `Website`, `FirstName`, `LastName`, `Email`, `Phone`) VALUES
(1,	'Amazon',	'440 Terry Ave N',	'Seattle',	'WA',	'98109',	'(206) 266-1000',	'https://amazon.com',	'Jeff',	'Bezos',	'jeff.bezos@amazon.com',	'(206) 266-1000'),
(2,	'Microsoft',	'Microsoft Headquarters One Microsoft Way',	'Redmond',	'WA',	'98052',	'(206) 123-4567',	'https://microsoft.com',	'Satya',	'Nadella',	'satya.nadella@microsoft.com',	'(206) 123-4567'),
(3,	'Google',	'601 N 34th St',	'Seattle',	'WA',	'98103',	'(206) 123-1000',	'https://google.com',	'Sundar',	'Pichai',	'sundar.pichai@amazon.com',	'(206) 123-1000')
ON DUPLICATE KEY UPDATE `CompanyID` = VALUES(`CompanyID`), `Name` = VALUES(`Name`), `Address` = VALUES(`Address`), `CompanyCity` = VALUES(`CompanyCity`), `State` = VALUES(`State`), `ZipCode` = VALUES(`ZipCode`), `CompanyPhone` = VALUES(`CompanyPhone`), `Website` = VALUES(`Website`), `FirstName` = VALUES(`FirstName`), `LastName` = VALUES(`LastName`), `Email` = VALUES(`Email`), `Phone` = VALUES(`Phone`);

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1,	'Victoria',	'viktoriacool@mail.ru',	'General',	'Hello world')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `email` = VALUES(`email`), `subject` = VALUES(`subject`), `message` = VALUES(`message`);

DROP TABLE IF EXISTS `Gigs`;
CREATE TABLE `Gigs` (
  `GigID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` int(10) unsigned NOT NULL,
  `GigQualify` varchar(500) DEFAULT '',
  `EmploymentType` varchar(255) DEFAULT '',
  `GigOutline` varchar(500) DEFAULT '',
  `SpInstructions` varchar(350) DEFAULT '',
  `PayRate` varchar(50) DEFAULT '',
  `GigPosted` datetime DEFAULT NULL,
  `LastUpdated` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`GigID`),
  KEY `CompanyID` (`CompanyID`),
  CONSTRAINT `Gigs_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `Company` (`CompanyID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Gigs` (`GigID`, `CompanyID`, `GigQualify`, `EmploymentType`, `GigOutline`, `SpInstructions`, `PayRate`, `GigPosted`, `LastUpdated`) VALUES
(1,	1,	'HTML/CSS',	'Web Developer',	'Web maintenance',	'Email me your resume',	'None',	'2017-05-20 14:30:35',	'2017-05-20 21:30:35'),
(2,	2,	'C#/.NET',	'Computer Engineer',	'Development of web apps',	'Email me your resume',	'None',	'2017-05-20 14:30:35',	'2017-05-20 21:30:35'),
(3,	3,	'Photoshop',	'Graphic Designer',	'Designing site mockups',	'Email me your resume',	'None',	'2017-05-20 14:30:35',	'2017-05-20 21:30:35')
ON DUPLICATE KEY UPDATE `GigID` = VALUES(`GigID`), `CompanyID` = VALUES(`CompanyID`), `GigQualify` = VALUES(`GigQualify`), `EmploymentType` = VALUES(`EmploymentType`), `GigOutline` = VALUES(`GigOutline`), `SpInstructions` = VALUES(`SpInstructions`), `PayRate` = VALUES(`PayRate`), `GigPosted` = VALUES(`GigPosted`), `LastUpdated` = VALUES(`LastUpdated`);

DROP TABLE IF EXISTS `Markers`;
CREATE TABLE `Markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `VenueKey` int(10) unsigned DEFAULT '0',
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `VenueKey` (`VenueKey`),
  CONSTRAINT `Markers_ibfk_1` FOREIGN KEY (`VenueKey`) REFERENCES `Venue` (`VenueKey`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Markers` (`id`, `VenueKey`, `lat`, `lng`) VALUES
(1,	1,	47.614662,	-122.322037),
(2,	2,	47.613953,	-122.321220),
(3,	3,	47.604340,	-122.325890)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `VenueKey` = VALUES(`VenueKey`), `lat` = VALUES(`lat`), `lng` = VALUES(`lng`);

DROP TABLE IF EXISTS `Profile`;
CREATE TABLE `Profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `i_am_a` text,
  `first_name` text,
  `last_name` text,
  `email` text,
  `password` text NOT NULL,
  `picture` varchar(24) DEFAULT NULL,
  `bio` text,
  `subscribed_to_newsletters` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `test_Customers`;
CREATE TABLE `test_Customers` (
  `CustomerID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `LastName` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Email` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `test_Customers` (`CustomerID`, `LastName`, `FirstName`, `Email`) VALUES
(1,	'Smith',	'Bob',	'bob@example.com'),
(2,	'Jones',	'Bll',	'bill@example.com'),
(3,	'Doe',	'John',	'john@example.com'),
(4,	'Rules',	'Ann',	'ann@example.com')
ON DUPLICATE KEY UPDATE `CustomerID` = VALUES(`CustomerID`), `LastName` = VALUES(`LastName`), `FirstName` = VALUES(`FirstName`), `Email` = VALUES(`Email`);

DROP TABLE IF EXISTS `Venue`;
CREATE TABLE `Venue` (
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
  `Food` varchar(5) DEFAULT '',
  `Bar` varchar(5) DEFAULT '',
  `Outlets` varchar(10) DEFAULT '',
  `WiFi` varchar(10) DEFAULT '',
  `Outdoor` varchar(10) DEFAULT '',
  `Wheelchair` varchar(10) DEFAULT '',
  `Parking` varchar(10) DEFAULT '',
  PRIMARY KEY (`VenueKey`),
  KEY `VenueTypeKey` (`VenueTypeKey`),
  KEY `VenueKey_index` (`VenueKey`),
  CONSTRAINT `Venue_ibfk_1` FOREIGN KEY (`VenueTypeKey`) REFERENCES `VenueType` (`VenueTypeKey`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Venue` (`VenueKey`, `VenueName`, `VenueTypeKey`, `VenueAddress`, `City`, `State`, `ZipCode`, `VenuePhone`, `VenueWebsite`, `VenueHours`, `Food`, `Bar`, `Outlets`, `WiFi`, `Outdoor`, `Wheelchair`, `Parking`) VALUES
(1,	'Elliott Bay Book Company',	1,	'1521 10th Ave',	'Seattle',	'WA',	'98122',	'2066246600',	'http://www.elliottbaybook.com',	'M-Th 10am-10pm, F-S 10am-11pm, Sun',	'',	'',	'',	'',	'',	'',	''),
(2,	'Caffe Vita',	2,	'1005 E Pike St',	'Seattle',	'WA',	'98122',	'2067094440',	'http://www.caffevita.com/locations/wa/capitol-hill',	'M-F 6am-11pm, S-Sun 7am-11pm',	'',	'',	'',	'',	'',	'',	''),
(3,	'Seattle Public Library - Capitol Hill Branch',	3,	'425 Harvard Ave E',	'Seattle',	'WA',	'98102',	'2066844715',	'http://www.spl.org/locations/capitol-hill-branch',	'M-Th 10am-8pm, F-S 10am-6pm, Sun 1pm-5pm',	'',	'',	'',	'',	'',	'',	''),
(4,	'Seattle Hotel',	5,	'12345 example st',	'Seattle',	'WA',	'98000',	'1234456789',	'',	'',	'Yes',	'Yes',	'Yes',	'Yes',	'Yes',	'Yes',	'Yes')
ON DUPLICATE KEY UPDATE `VenueKey` = VALUES(`VenueKey`), `VenueName` = VALUES(`VenueName`), `VenueTypeKey` = VALUES(`VenueTypeKey`), `VenueAddress` = VALUES(`VenueAddress`), `City` = VALUES(`City`), `State` = VALUES(`State`), `ZipCode` = VALUES(`ZipCode`), `VenuePhone` = VALUES(`VenuePhone`), `VenueWebsite` = VALUES(`VenueWebsite`), `VenueHours` = VALUES(`VenueHours`), `Food` = VALUES(`Food`), `Bar` = VALUES(`Bar`), `Outlets` = VALUES(`Outlets`), `WiFi` = VALUES(`WiFi`), `Outdoor` = VALUES(`Outdoor`), `Wheelchair` = VALUES(`Wheelchair`), `Parking` = VALUES(`Parking`);

DROP TABLE IF EXISTS `VenueAmenity`;
CREATE TABLE `VenueAmenity` (
  `VenueAmenityKey` int(11) NOT NULL AUTO_INCREMENT,
  `AmenityKey` int(11) NOT NULL,
  `VenueKey` int(10) unsigned NOT NULL,
  PRIMARY KEY (`VenueAmenityKey`),
  KEY `AmenityKey` (`AmenityKey`),
  KEY `VenueKey` (`VenueKey`),
  CONSTRAINT `VenueAmenity_ibfk_1` FOREIGN KEY (`AmenityKey`) REFERENCES `Amenity` (`AmenityKey`),
  CONSTRAINT `VenueAmenity_ibfk_2` FOREIGN KEY (`VenueKey`) REFERENCES `Venue` (`VenueKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `VenueAmenity` (`VenueAmenityKey`, `AmenityKey`, `VenueKey`) VALUES
(1,	1,	1),
(2,	2,	1),
(3,	4,	1),
(4,	1,	2),
(5,	4,	2),
(6,	1,	3),
(7,	4,	3)
ON DUPLICATE KEY UPDATE `VenueAmenityKey` = VALUES(`VenueAmenityKey`), `AmenityKey` = VALUES(`AmenityKey`), `VenueKey` = VALUES(`VenueKey`);

DROP TABLE IF EXISTS `VenueType`;
CREATE TABLE `VenueType` (
  `VenueTypeKey` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VenuetypeName` varchar(50) DEFAULT '',
  PRIMARY KEY (`VenueTypeKey`),
  KEY `VenueTypeKey_index` (`VenueTypeKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `VenueType` (`VenueTypeKey`, `VenuetypeName`) VALUES
(1,	'Coffee shop'),
(2,	'Library'),
(3,	'School'),
(4,	'Community Center'),
(5,	'Other')
ON DUPLICATE KEY UPDATE `VenueTypeKey` = VALUES(`VenueTypeKey`), `VenuetypeName` = VALUES(`VenuetypeName`);

-- 2017-05-21 00:00:47
