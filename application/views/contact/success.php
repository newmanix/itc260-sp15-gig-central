<?php

/**
 * views/contact/success.php
 *
 * Contact index for Gig Central
 * 
 * @package ITC260
 * @subpackage Pages
 * @author
 * @version 2.0 2016/06/14
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see
 * @todo
 */

//$this->load->view('themes/bootswatch/header');
$this->load->view($this->config->item('theme') . 'header');
?>



<h1>Thanks for contacting us!</h1>
<p>We'll be sure to get back to your inquiry as soon as possible!</p>
<?php
echo '<p>' . anchor('contact/create', 'Send new email') . '</p>';
echo '<p>' . anchor('contact/', 'Go back') . '</p>';
?>



<?php
//$this->load->view('themes/bootswatch/footer');
$this->load->view($this->config->item('theme') . 'footer');

?>
