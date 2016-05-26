<?php
//$this->load->view('themes/bootswatch/header');
$this->load->view($this->config->item('theme') . 'header');
?>
<article id="text">
<section class="contact">
<h1>Contact Us</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('contact') ?>

  <label for="name">Name*</label>
  <div class="controls">

    <input name="name" type="text">
</div>
<label for="email">Email*</label>

<div class="controls">
    <input name="email" type="email">
</div>
  <label for="subject">Subject*</label>

<div class="controls">

    <select name="subject">

        <option value="General Inquiry" selected="selected">General Help & Feedback</option>
        <option value="Specific Inquiry">Flag Inappropriate Content</option>
        <option value="Stoopid Inquiry">Employer Support</option>
        <option value="Stoopid Inquiry">Job Posting Support</option>
        <option value="Stoopid Inquiry">Press Inquiry</option>
        <option value="Stoopid Inquiry">Partnership Inquiry</option>
        <option value="Stoopid Inquiry">Advertising</option>
    </select>
</div>
<label for="message">Message*</label>
<div class="controls">
  <textarea name="message" cols="40" rows="5" required></textarea>
</div>
<div class="controls">
  <?php echo $this->recaptcha->render(); ?>
  <input name="submit" class="btn btn-primary" type="submit" value="Submit Message" />
</div>
</form>


<?php
//$this->load->view('themes/bootswatch/footer');
$this->load->view($this->config->item('theme') . 'footer');

?>
