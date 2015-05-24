/*
starup-initial.sql
2015/05/22

Create tables for Startup Central Website
User prefix 'sc_' for the startup central database tabels.
sc_Venue, sc_VenueType, sc_VeueAmenity, sc_VenuePromotion, sc_VenueReview, sc_VenueReply


*/

SET foreign_key_checks = 0; #turn off constraints temporarily

#since contraints cause problems, drop table first, working backward
DROP TABLE IF EXISTS sc_VenueReply;
DROP TABLE IF EXISTS sc_VenueReview;
DROP TABLE IF EXISTS sc_VenuePromotion;
DROP TABLE IF EXISTS sc_VeueAmenity;
DROP TABLE IF EXISTS sc_VenueAmenity;
DROP TABLE IF EXISTS sc_VenueType;
DROP TABLE IF EXISTS sc_Venue;


#all tables must be of type InnoDB to do transactions, foreign key constraints
#foreign key field must match size and type, hence SurveyID is INT UNSIGNED

CREATE TABLE sc_VenueType(
    VenueKey INT UNSIGNED NOT Null AUTO_INCREMENT,
    VenuetypeName VARCHAR(50) DEFAULT '',
    PRIMARY KEY (VenueKey),
    INDEX VenueKey_index(VenueKey)
)ENGINE=INNODB;


CREATE TABLE sc_Venue(
    VenueKey INT UNSIGNED NOT Null AUTO_INCREMENT,
    VenueName VARCHAR(50) DEFAULT '',
    VenueTypeKey INT UNSIGNED DEFAULT 0,
    VenueAddress VARCHAR(255) DEFAULT '',
    VenuePhone VARCHAR(50) DEFAULT '',
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
    wifi VARCHAR(50) DEFAULT '',
    NoiseLevel VARCHAR(50) DEFAULT '',
    FoodAvilability VARCHAR(50) DEFAULT '',
    Electricity VARCHAR(50) DEFAULT '',
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

CREATE TABLE sc_VenueReply(
    VenueReplyKey INT UNSIGNED NOT Null AUTO_INCREMENT,
    VenueReviewKey INT UNSIGNED DEFAULT 0,
    UserKey INT UNSIGNED DEFAULT 0,
    ReplyComment TEXT DEFAULT '',
    ReplyDateAdded DATETIME,
    PRIMARY KEY (VenueReplyKey),
    FOREIGN KEY (VenueReviewKey) REFERENCES sc_VenueReview(VenueReviewKey) ON DELETE CASCADE
)ENGINE=INNODB;

INSERT INTO sc_VenueType values ();

INSERT INTO sc_Venue values ();

INSERT INTO sc_VenueAmenity values ();

INSERT INTO sc_VenuePromotion values ();

INSERT INTO sc_VenueReview values ();

INSERT INTO sc_VenueReply values ();