/**
* gigs.sql
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
* @todo none
*/


DROP TABLE IF EXISTS Gigs;

CREATE TABLE Gigs(
GigID INT UNSIGNED NOT NULL AUTO_INCREMENT,
CompanyName varchar(100)  DEFAULT '',
CompanyAddress varchar(85)  DEFAULT '',
City varchar(40)  DEFAULT '',
CompanyState varchar(25)  DEFAULT '' DEFAULT "WA",
ZipCode varchar(25)  DEFAULT '',
CompanyPhone varchar(25)  DEFAULT '',
CompanyWebsite varchar(100)  DEFAULT '',
FirstName varchar(30)  DEFAULT '',
LastName varchar(30)  DEFAULT '',
Email varchar(75) DEFAULT '',
Phone varchar(25)  DEFAULT '',
GigQualify varchar(500)  DEFAULT '',
EmploymentType varchar(255)  DEFAULT '',
GigOutline varchar(500)  DEFAULT '',
SpInstructions varchar(350) DEFAULT '',
PayRate varchar(50)  DEFAULT '',
GigPosted DATETIME,
LastUpdated TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (GigID)
)ENGINE=INNODB; #INNODB allows creation tbl w/ same name in another db, tbl names won't collide

