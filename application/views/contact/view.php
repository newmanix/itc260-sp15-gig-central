<?php

/**
 * views/contact/view.php
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

//views/startups/view.php
$this->load->view($this->config->item('theme') . 'header');

echo '<h2>'.$contact_item['name'].'</h2>';
echo '<p>'.$contact_item['email'].'</p>';
echo'<p>'.$contact_item['subject'].'</p>';
echo '<p>'.$contact_item['message'].'<p>';

echo '<p>' . anchor('contact/create', 'Send new email') . '</p>';
echo '<p>' . anchor('contact/', 'Go back') . '</p>';
?>
