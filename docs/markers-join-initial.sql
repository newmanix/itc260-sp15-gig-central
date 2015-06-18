SET foreign_key_checks = 0; #turn off constraints temporarily

DROP TABLE IF EXISTS sc_markers;
DROP TABLE IF EXISTS sc_Markers;

CREATE TABLE sc_Markers(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    VenueKey INT UNSIGNED DEFAULT 0,
    lat FLOAT( 10, 6 ) NOT NULL ,
    lng FLOAT( 10, 6 ) NOT NULL ,
    FOREIGN KEY (VenueKey) REFERENCES sc_Venue(VenueKey) ON DELETE CASCADE
)ENGINE=INNODB;


INSERT INTO `sc_Markers` VALUES (null, '1', '47.608941', '-122.340145');