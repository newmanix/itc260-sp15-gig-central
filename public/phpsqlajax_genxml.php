<?php
/**
 * public/phpsqlajax_genxml.php
 *
 * file for generating xml from map data
 *
 * @package GigCentral
 * @subpackage StartupMap
 * @author Kate Lee
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see public/phpsqlajax_dbinfo.php
 * @see header.php
 * 
 * @todo none
*/

require('phpsqlajax_dbinfo.php');

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$connection = mysql_connect ('mysql.kateleeseattle.com', $username, $password);

if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM sc_Markers m, sc_Venue v WHERE m.VenueKey = v.VenueKey";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';
// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'name="' . parseToXML($row['VenueName']) . '" ';
  echo 'address="' . parseToXML($row['VenueAddress']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['VenueTypeKey'] . '" ';
  echo '/>';
}


// End XML file
echo '</markers>';

?>