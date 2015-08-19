<?php
//views/profiles/index.php
$this->load->view($this->config->item('theme') . 'header');
?>
<h2><?php echo $title ?></h2>

<?php foreach ($profiles as $profile): ?>

        <img src="<?=base_url()?>img/user-placeholder.jpg" alt="Profile Picture" class="img-circle profile-pic"><h3><?php echo $profile['first_name']; $profile['last_name'] ?></h3>
        <div class="main">
                <?php echo $profile['email'] ?>
        </div>
<p>
<?php
    echo anchor('index.php/profile/' . $profile['id'],'View Profile');
?>
</p>

<?php endforeach ?>
<?php
$this->load->view($this->config->item('theme') . 'footer');
?>
