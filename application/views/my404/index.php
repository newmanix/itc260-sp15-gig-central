<?php
/**
 * @package ITC260
 * @subpackage my404
 * @author ITC260 Summer Class
 * @version 1.0 2015/8/11
 * @link view/my404/index.php
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see controllers/My404.php
 * @see models/My404_model.php
 * @todo none
 */
?>

<?php
$this->load->view($this->config->item('theme') . 'header');
?>
<div class="container">

            <h1>404 Page</h1>
            
            <div class="well bs-component">
                <h3>Oops! We all make mistakes. The page you are looking for does not exist.</h3>
            </div><!-- end well bs-component -->
        </div><!-- end container -->
        
    

<?php
$this->load->view($this->config->item('theme') . 'footer');
?>
