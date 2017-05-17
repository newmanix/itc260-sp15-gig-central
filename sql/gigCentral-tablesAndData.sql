#all tables must be of type InnoDB to do transactions, foreign key constraints
#foreign key field must match size and type, hence SurveyID is INT UNSIGNED
#since contraints cause problems, drop table first, working backward
SET foreign_key_checks = 0; #turn off constraints temporarily

DROP TABLE IF EXISTS contact;
DROP TABLE IF EXISTS test_Customers;
DROP TABLE IF EXISTS sc_VenueReview;
DROP TABLE IF EXISTS sc_VenuePromotion;
DROP TABLE IF EXISTS sc_VenueAmenity;
DROP TABLE IF EXISTS sc_Amenity;
DROP TABLE IF EXISTS sc_VenueType;
DROP TABLE IF EXISTS sc_Venue;
DROP TABLE IF EXISTS sc_Markers;
DROP TABLE IF EXISTS Profile;
DROP TABLE IF EXISTS startups;
DROP TABLE IF EXISTS Gigs;
DROP TABLE IF EXISTS Company;

/**
* contact.sql
*
* Use to store data from profile form
*
* @package small piece of program
* @subpackage Profile_form
* @author Victoria Moiseenko
* @version 1.0 2015/05/21
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Contact_model.php
* @see views/contact
* @see Contact.php
* @todo none
*/
CREATE TABLE IF NOT EXISTS `contact` (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(128) NOT NULL,
  email varchar(128) NOT NULL,
  subject text NOT NULL,
  message text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/**
* test_Customers.sql
*
* Use to store data from profile form
*
* @package small piece of program
* @subpackage Profile_form
* @author Victoria Moiseenko
* @version 1.0 2015/05/21
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Startupform_model.php
* @todo none
*/

create table test_Customers
( CustomerID int unsigned not null auto_increment primary key,
  LastName varchar(50),
  FirstName varchar(50),
  Email varchar(80)
)ENGINE=INNODB;

/**
* sc_VenueType.sql
* sc_Venue.sql
* sc_VenueAmenity
* sc_VenuePromotion
* sc_VenueReview
*
* Used to store data regarding Venues
*
* @package small piece of program
* @subpackage 
* @author 
* @version 1.0 2015/05/21
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see 
* @todo Create MVC for Venues
*/
CREATE TABLE sc_VenueType(
    VenueTypeKey INT UNSIGNED NOT Null AUTO_INCREMENT,
    VenuetypeName VARCHAR(50) DEFAULT '',
    PRIMARY KEY (VenueTypeKey),
    INDEX VenueTypeKey_index(VenueTypeKey)
)ENGINE=INNODB;

CREATE TABLE `sc_Venue` (
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
  CONSTRAINT `sc_Venue_ibfk_1` FOREIGN KEY (`VenueTypeKey`) REFERENCES `sc_VenueType` (`VenueTypeKey`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sc_Amenity
(
AmenityKey INT PRIMARY KEY AUTO_INCREMENT,
AmenityName VARCHAR(128) NOT NULL
);

CREATE TABLE sc_VenueAmenity(
    VenueAmenityKey INT PRIMARY KEY AUTO_INCREMENT,
    AmenityKey INT NOT NULL,
    VenueKey INT UNSIGNED NOT NULL,


FOREIGN KEY (AmenityKey) REFERENCES sc_Amenity(AmenityKey),
FOREIGN KEY (VenueKey) REFERENCES sc_Venue(VenueKey)
);

CREATE TABLE sc_VenuePromotion(
    VenuePromotionKey INT UNSIGNED NOT Null AUTO_INCREMENT,
    VenueKey INT UNSIGNED DEFAULT 0,
    UserKey INT UNSIGNED DEFAULT 0,
    VenuePromotionStarDate DATETIME,
    VenuePromotionEndDate DATETIME,
    VenuePromotionDetail TEXT DEFAULT '',
    PRIMARY KEY (VenuePromotionKey),
    FOREIGN KEY (VenueKey) REFERENCES sc_Venue(VenueKey) ON DELETE CASCADE    
)ENGINE=INNODB;

CREATE TABLE sc_VenueReview(
    VenueReviewKey INT UNSIGNED NOT Null AUTO_INCREMENT,
    VenueKey INT UNSIGNED DEFAULT 0,
    UserKey INT UNSIGNED DEFAULT 0,
    ReviewRate INT UNSIGNED DEFAULT 0,
    ReviewComment TEXT DEFAULT '',
    ReviewDateAdded DATETIME,
    PRIMARY KEY (VenueReviewKey),
    FOREIGN KEY (VenueKey) REFERENCES sc_Venue(VenueKey) ON DELETE CASCADE,
    INDEX VenueReviewKey_index(VenueReviewKey)
)ENGINE=INNODB;

/**
* Marker.sql
*
* Used to store coordinates for a Venue
*
* @package small piece of program
* @subpackage 
* @author 
* @version 1.0 2015/05/21
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see sc_Venue table
* @todo none
*/
CREATE TABLE sc_Markers(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    VenueKey INT UNSIGNED DEFAULT 0,
    lat FLOAT( 10, 6 ) NOT NULL ,
    lng FLOAT( 10, 6 ) NOT NULL ,
    FOREIGN KEY (VenueKey) REFERENCES sc_Venue(VenueKey) ON DELETE CASCADE
)ENGINE=INNODB;

/**
* Profile.sql
*
* Use to store data from profile form
*
* @package small piece of program
* @subpackage Profile_form
* @author Evan Smyth <evsmyth@yahoo.com>
* @version 1.0 2015/05/21
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Profile_form.php
* @see profile_form/index.php
* @todo none
*/
CREATE TABLE IF NOT EXISTS `Profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `i_am_a` text,
  `first_name` text,
  `last_name` text,
  `email` text,
  `password` text NOT NULL,
  `picture` varchar(24) DEFAULT NULL,
  `bio` text,
  `subscribed_to_newsletters` boolean NOT NULL DEFAULT FALSE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

/**
* gig.sql
*
* Use to store data from gig form
*
* @package ITC 260 Gig Central CodeIgnitor
* @package small piece of program
* @subpackage Gigs_form
* @author Patricia Barker <patriciabethbarker@gmail.com>
* @version 2.0 2015/06/11
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see add.php
* @see gigs/add.php
* @see views/gigs
* @todo none
*/
DROP TABLE IF EXISTS Gigs;
CREATE TABLE Gigs (
GigID INT UNSIGNED NOT NULL AUTO_INCREMENT,
CompanyID INT UNSIGNED NOT NULL,
GigQualify varchar(500)  DEFAULT '',
EmploymentType varchar(255)  DEFAULT '',
GigOutline varchar(500)  DEFAULT '',
SpInstructions varchar(350) DEFAULT '',
PayRate varchar(50)  DEFAULT '',
GigPosted DATETIME,
LastUpdated TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (GigID),
 FOREIGN KEY (CompanyID) REFERENCES Company(CompanyID) ON DELETE CASCADE
)ENGINE=INNODB; 

/**
* gig.sql
*
* Use to store data from gig form
*
* @package ITC 260 Gig Central CodeIgnitor
* @package small piece of program
* @subpackage Gigs_form
* @author Souha Amor <souha.amor@gmail.com>
* @version 2.0 2015/06/11
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see add.php
* @see gigs/add.php
* @see views/gigs
* @todo none
*/
CREATE TABLE Company(
CompanyID INT UNSIGNED NOT NULL AUTO_INCREMENT,
Name varchar(100)  DEFAULT '',
Address varchar(85)  DEFAULT '',
CompanyCity varchar(40)  DEFAULT '',
State varchar(25)  DEFAULT '' DEFAULT "WA",
ZipCode varchar(25)  DEFAULT '',
CompanyPhone varchar(25)  DEFAULT '',
Website varchar(100)  DEFAULT '',
FirstName varchar(30)  DEFAULT '',
LastName varchar(30)  DEFAULT '',
Email varchar(75) DEFAULT '',
Phone varchar(25)  DEFAULT '',

PRIMARY KEY (CompanyID)
)ENGINE=INNODB; 

INSERT INTO contact (`id`, `name`, `email`, `subject`, `message`) VALUES (1, 'Victoria', 'viktoriacool@mail.ru', 'General', 'Hello world');

insert into test_Customers values (NULL,"Smith","Bob","bob@example.com");
insert into test_Customers values (NULL,"Jones","Bll","bill@example.com");
insert into test_Customers values (NULL,"Doe","John","john@example.com");
insert into test_Customers values (NULL,"Rules","Ann","ann@example.com");

INSERT INTO sc_VenueType values (null, 'Coffee shop');
INSERT INTO sc_VenueType values (null, 'Library');
INSERT INTO sc_VenueType values (null, 'School');
INSERT INTO sc_VenueType values (null, 'Community Center');
INSERT INTO sc_VenueType values (null, 'Other');

INSERT INTO Company(CompanyID, Name, Address, CompanyCity, State, ZipCode, CompanyPhone, Website, FirstName, LastName, Email, Phone) VALUES
( 1, 'Amazon', '440 Terry Ave N', 'Seattle', 'WA', '98109', '(206) 266-1000', 'https://amazon.com', 'Jeff', 'Bezos', 'jeff.bezos@amazon.com', '(206) 266-1000');

INSERT INTO Gigs(GigID, CompanyID, GigQualify, EmploymentType, GigOutline, SpInstructions, PayRate, GigPosted, LastUpdated) VALUES
( 1, 1, 'HTML/CSS', 'Web Developer', 'Web maintenance', 'Email me your resume', 'None', now(), now());


INSERT INTO Company(CompanyID, Name, Address, CompanyCity, State, ZipCode, CompanyPhone, Website, FirstName, LastName, Email, Phone) VALUES
( 2, 'Microsoft', 'Microsoft Headquarters One Microsoft Way', 'Redmond', 'WA', '98052', '(206) 123-4567', 'https://microsoft.com', 'Satya', 'Nadella', 'satya.nadella@microsoft.com', '(206) 123-4567');

INSERT INTO Gigs(GigID, CompanyID, GigQualify, EmploymentType, GigOutline, SpInstructions, PayRate, GigPosted, LastUpdated) VALUES
( 2, 2, 'C#/.NET', 'Computer Engineer', 'Development of web apps', 'Email me your resume', 'None', now(), now());


INSERT INTO Company(CompanyID, Name, Address, CompanyCity, State, ZipCode, CompanyPhone, Website, FirstName, LastName, Email, Phone) VALUES
( 3, 'Google', '601 N 34th St', 'Seattle', 'WA', '98103', '(206) 123-1000', 'https://google.com', 'Sundar', 'Pichai', 'sundar.pichai@amazon.com', '(206) 123-1000');

INSERT INTO Gigs(GigID, CompanyID, GigQualify, EmploymentType, GigOutline, SpInstructions, PayRate, GigPosted, LastUpdated) VALUES
( 3, 3, 'Photoshop', 'Graphic Designer', 'Designing site mockups', 'Email me your resume', 'None', now(), now());

INSERT INTO sc_Venue (`VenueKey`, `VenueName`, `VenueTypeKey`, `VenueAddress`, `City`, `State`, `ZipCode`, `VenuePhone`, `VenueWebsite`, `VenueHours`) VALUES
(1,	'Elliott Bay Book Company',	1,	'1521 10th Ave',	'Seattle',	'WA',	'98122',	'2066246600',	'http://www.elliottbaybook.com',	'M-Th 10am-10pm, F-S 10am-11pm, Sun'),
(2,	'Caffe Vita',	2,	'1005 E Pike St',	'Seattle',	'WA',	'98122',	'2067094440',	'http://www.caffevita.com/locations/wa/capitol-hill',	'M-F 6am-11pm, S-Sun 7am-11pm'),
(3,	'Seattle Public Library - Capitol Hill Branch',	3,	'425 Harvard Ave E',	'Seattle',	'WA',	'98102',	'2066844715',	'http://www.spl.org/locations/capitol-hill-branch',	'M-Th 10am-8pm, F-S 10am-6pm, Sun 1pm-5pm');

INSERT INTO sc_Amenity VALUES
(1,"Wi-Fi"), (2,"Food"), (3, "Bar"), (4, "Outlets"), (5, "Food"), (6, "Outdoor Seating"), (7, "Parking"), (8, "Wheelchair Accessable");

-- -------------------------------------------------------------------------------------
-- To show the venues and the amenities they offer, run or adapt this SQL:
-- SELECT VenueName, AmenityName FROM sc_Venue
-- INNER JOIN sc_VenueAmenity ON sc_Venue.VenueKey = sc_VenueAmenity.VenueKey
-- INNER JOIN sc_Amenity ON sc_VenueAmenity.AmenityKey = sc_Amenity.AmenityKey
-- ORDER BY VenueName ASC, AmenityName ASC;
-- -------------------------------------------------------------------------------------

INSERT INTO sc_VenueAmenity VALUES
(null,1,1), (null,2,1), (null,4,1),
(null,1,2), (null,4,2),
(null,1,3), (null,4,3);

INSERT INTO sc_VenueReview values (null, 1, 1, 3, "It's noisy and their WiFi drops continuously", 20150526);

INSERT INTO sc_Markers VALUES (null, '1', '47.608941', '-122.340145');

SET foreign_key_checks = 1; #turn contraints back on
