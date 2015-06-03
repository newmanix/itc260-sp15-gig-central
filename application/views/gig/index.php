
<?php
/**
* index.php view page for generic cus  Customer controller
*
* Used to show how to do CRUD in CodeIgniter
* views/customer/index.php

* @package ITC260
* @subpackage Customer
* @author Mahilet Hiemeariam <mhalle02@seattlecentral.edu/http:>
* @version 1.0 2015/04/30
* @link http:/mahitletdan.com/itc260/sandbox/contact-mahilet/contact-mahilet.php
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Customer_model.php
* @see customer.php
* @todo none
*/


$this->load->view($this->config->item('theme').'header');
?>

<h2><?php echo $title ?></h2>

<?php foreach ($query as $customer): ?>

<?php

    // echo $customer['firstName'] . "<br />";
    ?>
</p>

<?php endforeach ?>


<?php

$this->load->view($this->config->item('theme').'footer');
?>
