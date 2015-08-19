<?php
//$this->load->view('themes/bootswatch/header');
$this->load->view($this->config->item('theme') . 'header');
?>
<article id="text">
<section class="contact">
<h2>Contact Us</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('contact/index') ?>

  <label for="name">Name:</label>
  <div class="controls">

    <input name="name" type="text">
</div>
<label for="email">Email:</label>

<div class="controls">
    <input name="email" type="email">
</div>
  <label for="subject">Subject:</label>

<div class="controls">

    <select name="subject">

      <option value="General Inquiry" selected="selected">General Inquiry</option>
      <option value="Specific Inquiry">Specific Inquiry</option>
      <option value="Stoopid Inquiry">Sto0opid Inquiry</option>
    </select>
</div>
<label for="message">Message:</label>
<div class="controls">
  <textarea name="message" cols="40" rows="5" required></textarea>
</div>
<div class="controls">
  <input name="submit" class="btn btn-primary" type="submit" value="Submit Message" />
</div>
</form>


<?php
//$this->load->view('themes/bootswatch/footer');
$this->load->view($this->config->item('theme') . 'footer');

?>
