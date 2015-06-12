<?php
//$this->load->view('themes/bootswatch/header');
$this->load->view($this->config->item('theme') . 'header');
?>
<article id="text">
<section class="contact">
<h2>Contact Us</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('contact/create') ?>

<label for="name">Name:</label>
<input name="name" type="text">
<label for="email">Email:</label>
<input name="email" type="email">
<label for="subject">Subject:</label>
<select name="subject">
<option value="General Inquiry" selected="selected">General Inquiry</option>
<option value="Specific Inquiry">Specific Inquiry</option>
<option value="Stoopid Inquiry">Stoopid Inquiry</option>
</select>
<label for="message">Message:</label>
<textarea name="message" cols="40" rows="5" required></textarea>
<input name="submit" type="submit" value="Submit Message" />

</form>

<?php
//$this->load->view('themes/bootswatch/footer');
$this->load->view($this->config->item('theme') . 'footer');

?>
