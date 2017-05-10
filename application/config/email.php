<?php
# Sets
$config['protocol'] = 'smpt';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_user'] = '';
$config['smtp_pass'] = '';
$config['smtp_port'] = '465';


# XXX replace this with the email address to send web-contact form emails to
$config['email_contact_sendto'] = "jgilme01@seattlecentral.edu";

// When sending automatic emails (eg, scheduled newsletters), use this as the "From" address (eg, to form noreply@gigcentral.com <GigCentral>)
$config['autoemail_from_address'] = "noreply@sammchaney.com";

// When sending automatic emails (eg, scheduled newsletters), use this as the "From" name (eg, to form noreply@gigcentral.com <GigCentral>)
$config['autoemail_from_name'] = "GigCentral";

$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
?>
 