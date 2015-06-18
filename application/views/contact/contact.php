<?php
/**
 * view/customer/index.php
 *
 * view page for generic Customer controller
 *
 * Used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Customer
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see controllers/Customer.php
 * @see models/Customer_model.php
 * @todo none
 */

 $this->load->view($this->config->item('theme') . 'header');
 ?>
<article id="text">
<section class="contact">
<h2>Contact Us</h2>
<?php
if ( isset ($_POST['submit']) ) { // if the submit button is clicked...
$mailMesage = ("{$_POST['name']} {$_POST['email']} wrote: \n\n{$_POST['message']}"); // message of the email
$mailSubject = "{$_POST['subject']}"; // subject of the email
$mailRecipient = "moiseenkovika@gmail.com"; // destination email address
$mailSender = "From: {$_POST['email']}"; // the mail sender
mail ($mailRecipient, $mailSubject , $mailMesage, $mailSender); // function to send the email
print ("<p>Thank you for contacting me, <strong>{$_POST['name']}</strong>!</p>\n"); // notice that thanks the user
}
?>
<!-- Begin Contact Form -->
<form action="contact.php" method="post" name="contact">
<label for="name">Name:</label>
<input name="name" type="text" required="required">
<label for="email">Email:</label>
<input name="email" type="email" required="required">
<label for="subject">Subject:</label>
<select name="subject">
<option value="General Inquiry" selected="selected">General Inquiry</option>
<option value="Specific Inquiry">Specific Inquiry</option>
<option value="Stoopid Inquiry">Stoopid Inquiry</option>
</select>
<label for="message">Message:</label>
<textarea name="message" cols="40" rows="5" required></textarea>
<input name="submit" type="submit" value="Submit Message">
</form>
<!-- End Contact Form -->
</section>
</article>



<?php
$this->load->view($this->config->item('theme') . 'footer');
?>
