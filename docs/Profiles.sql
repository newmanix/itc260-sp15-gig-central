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


DROP TABLE IF EXISTS Profiles;


CREATE TABLE Profiles (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
 i_am_a TEXT DEFAULT '',
 first_name TEXT DEFAULT '',
 last_name TEXT DEFAULT '',
 email TEXT DEFAULT '',
 languages TEXT DEFAULT '',
 PRIMARY KEY (id)
) ENGINE=INNODB;
