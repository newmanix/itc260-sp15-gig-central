<?php
//views/startups/view.php
$this->load->view($this->config->item('theme') . 'header');

echo '<h2>'.$contact_item['name'].'</h2>';
echo '<p>'.$contact_item['email'].'</p>';
echo'<p>'.$contact_item['subject'].'</p>';
echo '<p>'.$contact_item['message'].'<p>';
?>
<p><a href="http://mykhabarovsk.com/repo/contact/create"</a>Send new email</p>
<p><a href="http://mykhabarovsk.com/repo/contact"</a>Go back to Contact </p>
