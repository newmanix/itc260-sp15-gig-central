<?php
/**
 * index.php - a view page for generic Customer controller.
 * 
 * Additionaly, it does CRUD within the CI Framework.
 * 
 * views/customer/index.php
 * 
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

		
<?php endforeach ?>