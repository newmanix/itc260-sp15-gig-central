<?php


$this->load->view($this->config->item('theme') . 'header'); //Loads Bootswatch theme and header
?>


<div class="container">
<?php
echo $error;
?>
</div>


<?php $this->load->view($this->config->item('theme') . 'header'); //Loads Bootswatch theme and footer
?>
