<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//common_helper.php

if(!function_exists('startSession'))
{
	 /**
	 * wrapper function for PHP session_start(), to prevent 'session already started' error messages. 
	 *
	 * To view any session data, sessions must be explicitly started in PHP.  
	 * In order to use sessions in a variety of INC files, we'll check to see if a session 
	 * exists first, then start the session only when necessary.
	 * 
	 * @return void
	 * @todo none 
	 */
	function startSession()
	{
		if(isset($_SESSION))
		{
			return true;
		}else{
			@session_start();
		}
		if(isset($_SESSION)){return true;}else{return false;}
	}
}#end startSession()

if(!function_exists('feedback'))
{
	/**
	 * loads a quick user message (flash/heads up) to provide user feedback
	 *
	 * Uses a Session to store the data until the data is displayed via showFeedback() loaded 
	 * inside the bottom of header.php (or elsewhere) 
	 *
	 * <code>
	 * feedback('Flash!  This is an important message!'); #will show up next running of showFeedback()
	 * </code>
	 *
	 * For bootswatch theme, the function called is named bootswatchFeedback()
	 * 
	 * @param string $msg message to show next time showFeedback() is invoked
	 * @return none 
	 * @see showFeedback()
	 * @see bootswatchFeedback()	 
	 * @todo Create showFeedback(), move from nmWDK common_inc.php and integrate into CI
	 */
	function feedback($msg,$level="warning")
	{
		startSession();
		$_SESSION['feedback'] = $msg;
		$_SESSION['feedback-level'] = $level;
	
	}
}#end feedback()

if(!function_exists('bootswatchFeedback'))
{

	/**
	 * shows a quick user message (flash/heads up) to provide user feedback
	 *
	 * Uses a Session to store the data until the data is displayed via bootswatchFeedback()
	 *
	 * Related feedback() function used to store message 
	 *
	 * <code>
	 * echo bootswatchFeedback(); #will show then clear message stored via feedback()
	 * </code>
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

}#end bootswatchFeedback()