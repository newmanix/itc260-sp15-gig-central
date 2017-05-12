<?php $this->load->view($this->config->item('theme').'header'); ?>

<div class="container">
    <div class="row col-xs-12 col-md-8 lg-6 offset-lg-3">
        <form role="form" action="loging" method="post">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="Email" name="Email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="Pwd" name="Pwd">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div><!-- end row form -->
</div><!-- end .container -->
<?php $this->load->view($this->config->item('theme').'footer'); ?>