<?php
//views/contact/index.php
$this->load->view($this->config->item('theme') . 'header');
?>

<?php foreach ($contact as $contact_item): ?>

        <h3><?php echo $contact_item['name'] ?></h3>
        <div class="main">
                <?php echo $contact_item['message'] ?>
        </div>
        <p><a href="<?php echo ('contact/'.$contact_item['email']); ?>">View email</a></p>
<?php endforeach ?>

<p><a href="http://mykhabarovsk.com/repo/contact/create"</a>Send new email</p>
<p><a href="http://mykhabarovsk.com/repo/contact"</a>Go back to Contact </p>

<?php
$this->load->view($this->config->item('theme') . 'footer');
?>
