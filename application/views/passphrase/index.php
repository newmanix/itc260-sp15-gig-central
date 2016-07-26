<?php
/**
 * view/passphrase/index.php
 *
 * view page for passphrase login
 *
 * @package GigCentral
 * @subpackage PassPhrase
 * @author Kate Lee, Casey Choiniere
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see libraries/PhassphraseClass.php
 * @todo none
 */

$this->load->view($this->config->item('theme').'header'); 
?>

<div class=loginform>
    <h3><?= $message;?></h3>
    <form action="<?= $red; ?>" method="post">
        <input type="password" name="password" value="" ><br/>
        <input type="submit" name="submit" value="Login" />
    </form>
</div>

<?php $this->load->view($this->config->item('theme').'footer'); ?>