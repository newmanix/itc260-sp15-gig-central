<?php
//views/startups/index.php
$this->load->view($this->config->item('theme') . 'header');
?>
<h2><?php echo $title ?></h2>

<?php foreach ($profiles as $profile): ?>

        <h3><?php echo $profile['title'] ?></h3>
        <div class="main">
                <?php echo $profile['text'] ?>
        </div>
<p>
<?php
    echo anchor('profiles/' . $profile['slug'],'View Startup');
?>
</p>

<?php endforeach ?>
<?php
$this->load->view($this->config->item('theme') . 'footer');
?>
