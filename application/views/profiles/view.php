<?php
//views/profiles/view.php
$this->load->view($this->config->item('theme') . 'header');

echo '<h2>' . $profile['first_name'] . " " . $profile['last_name'] . '</h2>';
echo $profile['email'];
echo '<p>' . anchor('profile/', 'Back to Profiles List') . '</p>';

$this->load->view($this->config->item('theme') . 'footer');
