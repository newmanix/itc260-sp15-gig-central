<?php $this->load->view($this->config->item('theme').'header'); ?>
<div class="container well">
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <h1>User profile</h1>
            <img src="<?=base_url()?>img/user-placeholder.jpg" alt="Profile Picture" class="img-circle profile-pic">
            <p>Name: <?= $profile->FirstName . " " . $profile->LastName; ?></p>
            <p>Languages: <?= $profile->Languages; ?></p>
            <p>Email: <a href="mailto:<?= $profile->Email; ?>"><?= $profile->Email; ?></a></p>
        </div>
    </div>
</div>
<?php $this->load->view($this->config->item('theme').'footer'); ?>
