<?php
//views/startups/index.php
$this->load->view($this->config->item('theme') . 'header');
?>
<h2><?php echo $title ?></h2>

<?php foreach ($startups as $startup): ?>

        <h3><?php echo $startup['title'] ?></h3>
        <div class="main">
                <?php echo $startup['text'] ?>
        </div>
<p>
<?php
    echo anchor('startups/' . $startup['slug'],'View Startup');
?>
</p>




<?php endforeach ?>
<?php
$this->load->view($this->config->item('theme') . 'footer');
?>
