<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include INCLUDE_PATH . 'meta_inc.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Bootstrap themes use style settings to change look and feel -->
    <link rel="stylesheet" href="<?=THEME_PATH;?>css/<?=$config->style;?>" media="screen">
    <link rel="stylesheet" href="<?=THEME_PATH;?>css/bootswatch.min.css">
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
     <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?=VIRTUAL_PATH?>" class="navbar-brand"><?=$config->banner;?></a>
		    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
			<?php 
				echo boostrapLinks($config->nav1,'<li>','</li>','<li class="active">'); #link arrays are created in config_inc.php file
			?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://builtwithbootstrap.com/" target="_blank">Theme by Bootstrap</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
	
<?php

//theme specific menu function: echo bootstrapLinks('<li>','</li>','<li class="current">');
function bootstrapLinks($linkArray,$prefix='',$suffix='',$classPrefix='',$separator="~")
{
	$myReturn = '';
	foreach($linkArray as $url => $text)
	{
		$target = ' target="_blank"'; #will be removed if relative URL
		if(basename($url) == THIS_PAGE){$flexPrefix = $classPrefix;}else{$flexPrefix = $prefix;} #added to create PageID
		$httpCheck = strtolower(substr($url,0,8)); # http:// or https://
		if(!(strrpos($httpCheck,"http://")>-1) && !(strrpos($httpCheck,"https://")>-1))
		{//relative url - add path
			$url = VIRTUAL_PATH . $url;
			$target = "";
		}else if(strrpos($url,ADMIN_PATH . 'admin_')>-1){$target = "";}# clear target="_blank" for admin files
		$pos = strrpos($text, $separator); #tilde as default separator
		if ($pos === false)
		{// note: three equal signs - not found!
			$myReturn .= $flexPrefix . "<a href=\"" . $url . "\"" . $target . ">" . $text . "</a>" . $suffix . "\n";
		}else{//found!  explode into title!
			$aText = explode($separator,$text); #split into an array on separator
			$myReturn .= $flexPrefix . "<a href=\"" . $url . "\" title=\"" . $aText[1] . "\"" . $target . ">" . $aText[0] . "</a>" . $suffix . "\n";	
		}
	}	
	return $myReturn;	
}


?>	
     