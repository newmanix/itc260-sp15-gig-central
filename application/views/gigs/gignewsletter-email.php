<?php
/**
* gignewsletter-email is used to form the email messages for the daily newsletters.
*
* views/gigs/gignewsletter-email.php
*
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Gig Controller
* @author Turner Tackiit <turner8193@gmail.com>
* @version 1.0 June 2 2016
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Gig_model.php
* @see Gig.php
* @todo none
*
* XXX WARNING! This view will not output data directly to a page! Output is instead captured using PHP Output Buffering (ob_*****) and sent via email.
* XXX DO NOT USE NORMAL THEMING TEMPLATES (eg, theme header/footer) WITH THIS VIEW - they will likely not produce output suitable for an email.
*
*/

foreach($gigs as $gig)
{
	// XXX TODO Add string formatting and more output fields. I just want this working for now so I can finish controller logic.
	echo "<p>Gig #" . $gig['GigID'] . " : " . $gig['GigOutline'] . "</p>";
}

?>
