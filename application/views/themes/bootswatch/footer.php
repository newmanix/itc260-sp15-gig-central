    <footer>
        <div class="row">
          <div class="col-xs-12">
		      <hr /><!-- this is the little white line that you see on the page -->
                <ul class="list-unstyled">
                <?= $this->navigation->loadFooter(); ?><!-- the actual nav items -->
                <li class="pull-right"><a href="#top">Back to top</a></li>
                </ul>
			 <p><?=$this->config->item('copyright')?>. Theme by <a href="http://bootswatch.com/">Bootswatch</a>, based on <a href="http://getbootstrap.com/css/">Bootstrap</a>.</p>

          </div>
        </div>
    </footer>
</div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?=base_url();?>public/themes/bootswatch/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>public/themes/bootswatch/js/bootswatch.js"></script>
    <script src="http://beneposto.pl/jqueryrotate/js/jQueryRotateCompressed.js"></script>

  </body>
</html>