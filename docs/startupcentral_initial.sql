SET foreign_key_checks = 0; #turn off constraints temporarily

#since contraints cause problems, drop table first, working backward
DROP TABLE IF EXISTS sc_VenueReply;
DROP TABLE IF EXISTS sc_VenueReview;
DROP TABLE IF EXISTS sc_VenuePromotion;
DROP TABLE IF EXISTS sc_VenueAmenity;
DROP TABLE IF EXISTS sc_VenueType;
DROP TABLE IF EXISTS sc_Venue;


#all tables must be of type InnoDB to do transactions, foreign key constraints
#foreign key field must match size and type, hence SurveyID is INT UNSIGNED

CREATE TABLE sc_VenueType(
    VenueTypeKey INT UNSIGNED NOT Null AUTO_INCREMENT,
    VenuetypeName VARCHAR(50) DEFAULT '',
    PRIMARY KEY (VenueTypeKey),
    INDEX VenueTypeKey_index(VenueTypeKey)
)ENGINE=INNODB;


CREATE TABLE sc_Venue(
    VenueKey INT UNSIGNED NOT Null AUTO_INCREMENT,
    VenueName VARCHAR(50) DEFAULT '',
    VenueTypeKey INT UNSIGNED DEFAULT 0,
    VenueAddress VARCHAR(255) DEFAULT '',
    VenuePhone VARCHAR(10) DEFAULT '',
    VenueWebsite VARCHAR(50) DEFAULT '',
    VenueHours VARCHAR(50) DEFAULT '',
    PRIMARY KEY (VenueKey),
    FOREIGN KEY (VenueTypeKey) REFERENCES VenueType(VenueTypeKey) ON DELETE CASCADE,
    INDEX VenueKey_index(VenueKey)
)ENGINE=INNODB;


CREATE TABLE sc_VenueAmenity(
    VenueAmenityKey INT UNSIGNED NOT Null AUTO_INCREMENT,
    VenueKey INT UNSIGNED DEFAULT 0,
    Cost VARCHAR(50) DEFAULT '',
    Wifi BOOLEAN DEFAULT 0,
    NoiseLevel VARCHAR(1) DEFAULT '',
    FoodAvailability BOOLEAN DEFAULT 0,
    ElectricOutlets BOOLEAN DEFAULT 0,
    PRIMARY KEY (VenueAmenityKey),
    FOREIGN KEY (VenueKey) REFERENCES sc_Venue(VenueKey) ON DELETE CASCADE
)ENGINE=INNODB;


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

INSERT INTO sc_VenueType values (null, 'Coffee shop');
INSERT INTO sc_VenueType values (null, 'Library');

INSERT INTO sc_Venue values (null, "Elliott Bay Book Company", 1, "1521 10th Ave, Seattle, WA  98122", "2066246600", "http://www.elliottbaybook.com", "M-Th 10am-10pm, F-S 10am-11pm, Sun"); 

INSERT INTO sc_VenueAmenity values (null, 1, "$", 1, "L", 1, 1);

INSERT INTO sc_Venue values (null, "Caffe Vita", 1, "1005 E Pike St, Seattle, WA  98122", "2067094440", "http://www.caffevita.com/locations/wa/capitol-hill", "M-F 6am-11pm, S-Sun 7am-11pm");

INSERT INTO sc_VenueAmenity values (null, 2, "$", 1, "H", 0, 1);

INSERT INTO sc_Venue values (null, "Seattle Public Library - Capitol Hill Branch", 2, "425 Harvard Ave E, Seattle, WA  98102", "2066844715", "http://www.spl.org/locations/capitol-hill-branch", "M-Th 10am-8pm, F-S 10am-6pm, Sun 1pm-5pm");

INSERT INTO sc_VenueAmenity values(null, 3, "Free", 1, "L", 0, 1);

INSERT INTO sc_VenueReview values (null, 1, 1, 3, "It's noisy and their WiFi drops continuously", 20150526);

SET foreign_key_checks = 0; #turn off constraints temporarily
