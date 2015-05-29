<?php foreach ($links as $l):?>
    	
<h3>
	<?php echo anchor('rss/view' . $l, $l, array('title' => $l));?>
</h3>

<?php endforeach ?>
