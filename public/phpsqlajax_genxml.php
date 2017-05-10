<?php
/**
 * public/phpsqlajax_genxml.php
 *
 * file for generating xml from map data
 *
 * @package GigCentral
 * @subpackage StartupMap
 * @author Kate Lee, John Gilmer
 * @version 2.0 2017/5/09
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see public/phpsqlajax_dbinfo.php
 * @see header.php
 * 
 * @todo none
*/
 
require('phpsqlajax_dbinfo.php');

//parsing functions from google help page:
//https://developers.google.com/maps/documentation/javascript/mysql-to-maps
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

//mysqli object
$mysqli = new mysqli($host, $username, $password, $database);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

//join tables
$query = "SELECT * FROM sc_Markers m, sc_Venue v WHERE m.VenueKey = v.VenueKey";

/* Select queries return a resultset */
if ($result = $mysqli->query($query)) {
    while($row = $result->fetch_assoc()){
	    
	header("Content-type: text/xml");

	// Start XML file, echo parent node
	echo '<markers>';
	// Iterate through the rows, printing XML nodes for each
	//while ($row = @mysqli_fetch_assoc($result))
	//{
	  // ADD TO XML DOCUMENT NODE
	  echo '<marker ';
	  echo 'name="' . parseToXML($row['VenueName']) . '" ';
	  echo 'address="' . parseToXML($row['VenueAddress']) . '" ';
	  echo 'lat="' . $row['lat'] . '" ';
	  echo 'lng="' . $row['lng'] . '" ';
	  echo 'type="' . $row['VenueTypeKey'] . '" ';
	  echo '/>';
//}


// End XML file
echo '</markers>';
	    
    }

    /* free result set */
    $result->close();

}

else
{
  die('Not connected : ' . mysqli_connect_error() . PHP_EOL);
	exit;
}

?>