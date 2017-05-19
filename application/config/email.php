<?php
# Sets
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_user'] = 'luomopuma@gmail.com';
$config['smtp_pass'] = '';
$config['smtp_port'] = '465';


# XXX replace this with the email address to send web-contact form emails to
$config['email_contact_sendto'] = "luomopuma@gmail.com";

// When sending automatic emails (eg, scheduled newsletters), use this as the "From" address (eg, to form noreply@gigcentral.com <GigCentral>)
$config['autoemail_from_address'] = "noreply@sammchaney.com";

// When sending automatic emails (eg, scheduled newsletters), use this as the "From" name (eg, to form noreply@gigcentral.com <GigCentral>)
$config['autoemail_from_name'] = "GigCentral";

$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
?>
