<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Navigation {

  var $headerMenu = array();  //The array holding all header navigation elements
  var $footerMenu = array();  //The array holding all footer navigation elements
  var $out; // The HTML string to be returned
		#set up navs:
	function init(){
		$menuOne = array
		(
			1 => 	array(
				'text'		=> 	'Home',	
				'link'		=> 	base_url(),
				'show_condition'=>	1,
				'parent'	=>	0
			),
			2 => 	array(
				'text'		=> 	'Find a Gig',	
				'link'		=> 	base_url() . 'gig_find',
				'show_condition'=>	1,
				'parent'	=>	0
			),
			3 =>	array(
				'text'		=> 	'Post a Gig',	
				'link'		=> 	base_url() . 'gig_post',
				'show_condition'=>	1,
				'parent'	=>	0
			),
			4 =>	array(
				'text'		=> 	'Profiles',	
				'link'		=> 	base_url() . 'gig_profiles',
				'show_condition'=>	1,
				'parent'	=>	0
			),
			5 =>	array(
				'text'		=> 	'FAQ',	
				'link'		=> 	base_url() . 'gig_faq',
				'show_condition'=>	1,
				'parent'	=>	0
			),
		); 
		$menuTwo = array
		(
			1 => 	array(
				'text'		=> 	'Startup Central',	
				'link'		=> 	base_url(),
				'show_condition'=>	1,
				'parent'	=>	0
			),
			2 => 	array(
				'text'		=> 	'About',	
				'link'		=> 	base_url() . 'gig_about',
				'show_condition'=>	1,
				'parent'	=>	0
			),
			3 =>	array(
				'text'		=> 	'Contact',	
				'link'		=> 	base_url() . 'gig_contact',
				'show_condition'=>	1,
				'parent'	=>	0
			),
			4 =>	array(
				'text'		=> 	'Disclaimer',	
				'link'		=> 	base_url() . 'gig_disclaimer',
				'show_condition'=>	1,
				'parent'	=>	0
			),
		);
		$this->setHeaderMenu($menuOne);
		$this->setFooterMenu($menuTwo);
	}
	function __construct(){
		$this->init();
	}

	function setHeaderMenu($myMenu){
		$CI =& get_instance();
		$this->headerMenu = $myMenu;
	}
	function setFooterMenu($myMenu){
		$CI =& get_instance();
		$this->footerMenu = $myMenu;
	}
		
	/*
	 * loadHeader - Return HTML navigation string
	 */
	public function loadHeader($selected = null)
	{	
		$out = '<ul class="nav navbar-nav">';
		foreach ( $this->headerMenu as $i=>$arr )
		{
			if ( is_array ( $this->headerMenu[ $i ] ) ) {//must be by construction but let's keep the errors home
				if ( $this->headerMenu[ $i ] [ 'show_condition' ] && $this->headerMenu [ $i ] [ 'parent' ] == 0 ) //are we allowed to see this menu?
				{
					/*** Set class for current nav item ***/
					(strcasecmp($this->headerMenu[ $i ] [ 'text' ], $selected) == 0 ) ? $class = "active" : $class = ""; //  Binary safe case-insensitive string comparison
					
					if($this->hasChildren($i))
					{
						$class .=" dropdown";
						$out .= "<li class=\"" . $class . "\">";
						$out .= "<a href=\"" . $this->menu [ $i ] [ 'link' ] . "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
						$out .= $this->headerMenu [ $i ] [ 'text' ];
						$out .= '<b class="caret"></b>';
						$out .= '</a>';
						$out .= $this->getChildren ( $i ); //loop through children
						$out .= '</li>' . "\n";
					}else{
						$out .= "<li class=\"" . $class . "\">";
						if($this->headerMenu [ $i ] [ 'link' ]!=null)	{
							$out .= "<a href=\"" . $this->headerMenu [ $i ] [ 'link' ] . "\">";
							$out .= $this->headerMenu [ $i ] [ 'text' ];
							$out .= '</a>';
						} else {
							$out .= "<span>".$this->headerMenu [ $i ] [ 'text' ]."</span>";
						}
						$out .= '</li>' . "\n";
					}
				}
			}
			else 
			{
				die ( sprintf ( 'menu nr %s must be an array', $i ) );
			}
		}

		$out .= '</ul>';
		return $out;
	}
	
	private function hasChildren($menu_id)
	{
		foreach ( $this->headerMenu as $i=>$arr ){
		
			if ( $this->headerMenu [ $i ] [ 'show_condition' ] && $this->headerMenu [ $i ] [ 'parent' ] == $menu_id ) {
				return TRUE;
			}
		}
		
		return FALSE;
	}
	/**
	 *
	 * getChildren - build an html string of the menu children
	 *
	 * @access private
	 *
	 * @return HTML or boolean
	 *
	 */
	private function getChildren ( $el_id )
	{
		$has_subcats = FALSE;
		$out = '';
		$out .= "\n".'	<ul class="dropdown-menu">' . "\n";
		foreach ( $this->headerMenu as $i=>$arr ){
		
			if ( $this->headerMenu [ $i ] [ 'show_condition' ] && $this->headerMenu [ $i ] [ 'parent' ] == $el_id ) {//are we allowed to see this menu?
				$has_subcats = TRUE;
				
				$out .= "<li><a href=\"{$this->headerMenu[ $i ][ 'link' ]}\">{$this->headerMenu [ $i ] [ 'text' ]}</a>" . $this->getChildren ( $this->menu, $i ) . "</li>";
			}
		}
		$out .= '	</ul>'."\n";
		
		
		return ( $has_subcats ) ? $out : FALSE;
	}


	/*
	 * loadFooter - Return HTML navigation string
	 */
	public function loadFooter($selected = null)
	{	
		$out = '<ul class="nav navbar-nav">';
		foreach ( $this->footerMenu as $i=>$arr )
		{
			if ( is_array ( $this->footerMenu[ $i ] ) ) {//must be by construction but let's keep the errors home
				if ( $this->footerMenu[ $i ] [ 'show_condition' ] && $this->footerMenu [ $i ] [ 'parent' ] == 0 ) //are we allowed to see this menu?
				{
					/*** Set class for current nav item ***/
					(strcasecmp($this->footerMenu[ $i ] [ 'text' ], $selected) == 0 ) ? $class = "active" : $class = ""; //  Binary safe case-insensitive string comparison
					
					if($this->hasChildrenFooter($i))
					{
						$class .=" dropdown";
						$out .= "<li class=\"" . $class . "\">";
						$out .= "<a href=\"" . $this->menu [ $i ] [ 'link' ] . "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
						$out .= $this->footerMenu [ $i ] [ 'text' ];
						$out .= '<b class="caret"></b>';
						$out .= '</a>';
						$out .= $this->getChildrenFooter ( $i ); //loop through children
						$out .= '</li>' . "\n";
					}else{
						$out .= "<li class=\"" . $class . "\">";
						if($this->footerMenu [ $i ] [ 'link' ]!=null)	{
							$out .= "<a href=\"" . $this->footerMenu [ $i ] [ 'link' ] . "\">";
							$out .= $this->footerMenu [ $i ] [ 'text' ];
							$out .= '</a>';
						} else {
							$out .= "<span>".$this->footerMenu [ $i ] [ 'text' ]."</span>";
						}
						$out .= '</li>' . "\n";
					}
				}
			}
			else 
			{
				die ( sprintf ( 'menu nr %s must be an array', $i ) );
			}
		}

		$out .= '</ul>';
		return $out;
	}
	
	private function hasChildrenFooter($menu_id)
	{
		foreach ( $this->footerMenu as $i=>$arr ){
		
			if ( $this->footerMenu [ $i ] [ 'show_condition' ] && $this->footerMenu [ $i ] [ 'parent' ] == $menu_id ) {
				return TRUE;
			}
		}
		
		return FALSE;
	}
	/**
	 *
	 * getChildren - build an html string of the menu children
	 *
	 * @access private
	 *
	 * @return HTML or boolean
	 *
	 */
	private function getChildrenFooter ( $el_id )
	{
		$has_subcats = FALSE;
		$out = '';
		$out .= "\n".'	<ul class="dropdown-menu">' . "\n";
		foreach ( $this->footerMenu as $i=>$arr ){
		
			if ( $this->footerMenu [ $i ] [ 'show_condition' ] && $this->footerMenu [ $i ] [ 'parent' ] == $el_id ) {//are we allowed to see this menu?
				$has_subcats = TRUE;
				
				$out .= "<li><a href=\"{$this->footerMenu[ $i ][ 'link' ]}\">{$this->footerMenu [ $i ] [ 'text' ]}</a>" . $this->getChildrenFooter ( $this->menu, $i ) . "</li>";
			}
		}
		$out .= '	</ul>'."\n";
		
		
		return ( $has_subcats ) ? $out : FALSE;
	}



}	