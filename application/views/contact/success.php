<?php
//$this->load->view('themes/bootswatch/header');
$this->load->view($this->config->item('theme') . 'header');
?>



<h1>Success!</h1>
<p>Your email have been send!</p>
<p><a href="http://mykhabarovsk.com/repo/contact/create"</a>Send new email</p>
<p><a href="http://mykhabarovsk.com/repo/contact"</a>Go back to Contact </p>



<?php
//$this->load->view('themes/bootswatch/footer');
$this->load->view($this->config->item('theme') . 'footer');

?>
