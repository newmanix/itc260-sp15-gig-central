<?php $this->load->view($this->config->item('theme').'header'); ?>

<div class="container">
    <div class="row col-xs-12 col-md-8 lg-6 offset-lg-3">
        
        <form class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label for="Email">Email address:</label>
                <input type="email" class="form-control" id="Email" name="email">
            </div>
            <?php echo $this->recaptcha->render(); ?>
            <?php echo form_error('email'); ?>
            <button type="submit" class="btn btn-default" name="Submit">Submit</button>
        </form>
    </div><!-- end row form -->
</div><!-- end .container -->
<?php $this->load->view($this->config->item('theme').'footer'); ?>