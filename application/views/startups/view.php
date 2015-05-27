<?php
//views/startups/view.php
$this->load->view($this->config->item('theme') . 'header');

echo '<h2>' . $startup['title'].'</h2>';
echo $startup['text'];
echo '<p>' . anchor('startups/', 'Back to Startups List') . '</p>';

$this->load->view($this->config->item('theme') . 'footer');
