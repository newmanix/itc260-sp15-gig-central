<?php
//$this->load->view('themes/bootswatch/header');
$this->load->view($this->config->item('theme') . 'header');
?>



<h1>Success!</h1>
<p>Your email have been send!</p>
<?php
echo '<p>' . anchor('contact/create', 'Send new email') . '</p>';
echo '<p>' . anchor('contact/', 'Go back') . '</p>';
?>



<?php
//$this->load->view('themes/bootswatch/footer');
$this->load->view($this->config->item('theme') . 'footer');

?>
