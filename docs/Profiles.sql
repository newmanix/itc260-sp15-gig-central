/**
* Profiles.sql
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


SET foreign_key_checks = 0; #turn off constraints temporarily

DROP TABLE IF EXISTS Profile;
DROP TABLE IF EXISTS Profile_responses;





CREATE TABLE Profile(
ProfileID INT UNSIGNED NOT NULL AUTO_INCREMENT,
User TEXT DEFAULT '',
InputType ENUM('checkbox','radio','select','text') DEFAULT 'select',
FirstName TEXT DEFAULT '',
LastName TEXT DEFAULT '',
Email TEXT DEFAULT '',
Languages TEXT DEFAULT '',
DateAdded DATETIME,
LastUpdated TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (ProfileID)
)ENGINE=INNODB;

INSERT INTO Profile VALUES (NULL,'I am a','select','First Name','Last Name','Email', 'Languages and Skills',NOW(),NOW());


CREATE TABLE Profile_responses(
ProfileResponsesID INT UNSIGNED NOT NULL AUTO_INCREMENT,
ProfileID INT UNSIGNED DEFAULT 0,
UserResponses TEXT DEFAULT '',
FirstNameResponses TEXT DEFAULT '',
LastNameResponses TEXT DEFAULT '',
EmailResponses TEXT DEFAULT '',
LanguagesResponses TEXT DEFAULT '',
DateAdded DATETIME,
LastUpdated TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
Status INT DEFAULT 0,
PRIMARY KEY (ProfileResponsesID),
INDEX Profile_index(ProfileID),
FOREIGN KEY (ProfileID) REFERENCES Profile(ProfileID) ON DELETE CASCADE
)ENGINE=INNODB;

INSERT INTO Profile_responses values (NULL,1,'Student','','','','',NOW(),NOW(),0);
INSERT INTO Profile_responses values (NULL,1,'Alumni','','','','',NOW(),NOW(),0);
INSERT INTO Profile_responses values (NULL,1,'Staff','','','','',NOW(),NOW(),0);
