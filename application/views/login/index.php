<?php
/**
 * view/login/index.php
 *
 * view page for login
 * 
 * @package Startup Central
 * @subpackage Login
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see controllers/Login.php
 * @see models
 * @todo none
 */

$this->load->view($this->config->item('theme').'header'); ?>

<div class=login>
    <h3 class=login-message>Please enter passcode to login</h3>
    <form action="<?php echo $thisPage; ?>" method="post">
    <input type="password" name="password" value=""  class="login-input"/>
    <input type="submit" name="submit" value="Login" />
    </form>
</div>


<?php $this->load->view($this->config->item('theme').'footer'); ?>