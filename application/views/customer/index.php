<?php
/**
<<<<<<< HEAD
 * index.php - a view page for generic Customer controller.
 * 
 * Additionaly, it does CRUD within the CI Framework.
 * 
 * views/customer/index.php
 * 
=======
 * view/customer/index.php
 *
 * view page for generic Customer controller
 *
 * Used to show how to do CRUD in CodeIgniter
 *
>>>>>>> Mahilet_gigForm_Branch
 * @package ITC260
 * @subpackage Customer
 * @author Aleksandar Petrovic <alpe88.junk@gmail.com>
 * @version 1.0 2015/04/30 
 * @link http://www.thisisablankspace.com/ 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Customer_model.php
 * @see Customer.php
 * @todo none
 */
<<<<<<< HEAD
$this->load->library('passphraseclass');
$this->passphraseclass->passphrase();
=======

$this->load->view($this->config->item('theme').'header'); ?>

<h2><?= $title; ?></h2>
>>>>>>> Mahilet_gigForm_Branch

?>

<?php foreach ($customer as $customer_info): ?>

        <div class="main">
		
                <?php echo '<h2>Full Name:</h2><h3>'.$customer_info['LastName'] ." ". $customer_info['FirstName'].'</h3>';
			echo '<h2>Email:</h2> <h3>'.$customer_info['Email'].'</h3>';
		?>
        </div>
        <!--<p>
		<?php echo anchor($customer_info['slug'], 'View Article'); ?>
	 </p>-->

<<<<<<< HEAD
		
<?php endforeach ?>
=======




<?php $this->load->view($this->config->item('theme').'footer'); ?>
>>>>>>> Mahilet_gigForm_Branch
