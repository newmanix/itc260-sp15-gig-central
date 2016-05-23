<?php
/*
bootswatch_functions.php
Theme specfic functions go here
*/


//theme specific menu function: echo bootstrapLinks('<li>','</li>','<li class="current">');
function bootswatchLinks($linkArray,$prefix='',$suffix='',$classPrefix='',$separator="~")
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

function bootswatchAdmin()
{//add admin link to right if bootswatch
	global $config;
	if(startSession() && isset($_SESSION['AdminID']))
	{#add admin logged in info to sidebar
	
		$nav[$config->adminDashboard] = "Admin~Go to Administrative Page";
		return 
		'<ul class="nav navbar-nav navbar-right">' .
            bootswatchLinks($nav,"<li>","</li>","<li class=\"active\">")
        . '</ul>';
	}else{
		//return ""; if you don't want login to show, uncomment this and comment all below in else block:
		
		$nav[$config->adminLogin] = "Login~Login to site";
		return 
		'<ul class="nav navbar-nav navbar-right">' .
            bootswatchLinks($nav,"<li>","</li>","<li class=\"active\">")
        . '</ul>';

	}
}

/**
 * shows a quick user message (flash/heads up) to provide user feedback
 *
 * Uses a Session to store the data until the data is displayed via showFeedback()
 *
 * Related feedback() function used to store message 
 *
 * <code>
 * echo showFeedback(); #will show then clear message stored via feedback()
 * </code>
 * 
 * changed from showFeedback() version 2.10
 *
 * @param none 
 * @return string html & potentially CSS to style feedback
 * @see feedback() 
 * @todo none
 */
function bootswatchFeedback()
{
	startSession();//startSession() does not return true in INTL APP!
	
	$myReturn = "";  //init
	if(isset($_SESSION['feedback']) && $_SESSION['feedback'] != "")
	{#show message, clear flash
		if(isset($_SESSION['feedback-level'])){$level = $_SESSION['feedback-level'];}else{$level = '';}
		
		switch($level)
		{
			case 'warning';
				$level = 'warning';
				break;
			case 'info';
			case 'notice';
				$level = 'info';
				break;
			case 'success';
				$level = 'success';
				break;	
			case 'error';
			case 'danger';
				$level = 'danger';
				break;
		
		}
		
		
		
		$myReturn .= '
		<div class="alert alert-dismissable alert-' . $level . '" style="margin-top:.5em;">
		<button class="close" data-dismiss="alert" type="button">&times;</button>
		' . $_SESSION['feedback'] . '</div>
		';
		$_SESSION['feedback'] = ""; #cleared
		$_SESSION['feedback-level'] = "";
	}
	return $myReturn; //data passed back for printing
}
?>	
     