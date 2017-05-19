<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Custom_config.php
 * Config file for hooking up theme
 */

$config['style'] = 'flatly.css';
$config['banner'] = 'Default Banner';
$config['title'] = 'Default Title';
$config['copyright'] = 'Default Copyright';
$config['theme'] = 'themes/bootswatch/';
$config['banner-href'] = './';
$config['banner-img'] = 'img/Gig-logo.png';
$config['favicon-img'] = 'favicon.ico';
$config['nav-active'] = '';//will change in controller to add active class to navigation


/**
* Follow settings for email
*/
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_user'] = 'mdiediker@gmail.com';
$config['smtp_pass'] = '';
$config['smtp_port'] = '465';


# XXX replace this with the email address to send web-contact form emails to
$config['email_contact_sendto'] = "webcontactform@gigcentral.com";

// When sending automatic emails (eg, scheduled newsletters), use this as the "From" address (eg, to form noreply@gigcentral.com <GigCentral>)
$config['autoemail_from_address'] = "noreply@gigcentral.com";

// When sending automatic emails (eg, scheduled newsletters), use this as the "From" name (eg, to form noreply@gigcentral.com <GigCentral>)
$config['autoemail_from_name'] = "GigCentral";

$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";

/**
 * Recaptcha configuration settings
 * 
 * recaptcha_sitekey: Recaptcha site key to use in the widget
 * recaptcha_secretkey: Recaptcha secret key which is used for communicating between your server to Google's
 * lang: Language code, if blank "en" will be used
 * 
 * recaptcha_sitekey and recaptcha_secretkey can be obtained from https://www.google.com/recaptcha/admin/
 * Language code can be obtained from https://developers.google.com/recaptcha/docs/language
 * 
 * @author Damar Riyadi <damar@tahutek.net>
 */

$config['recaptcha_sitekey'] = "";
$config['recaptcha_secretkey'] = "";
$config['lang'] = "";