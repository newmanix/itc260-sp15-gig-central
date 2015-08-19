<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Navigation {

var $headerMenu = array();  //The array holding all header navigation elements
var $footerMenu = array();  //The array holding all footer navigation elements
var $out; // The HTML string to be returned

#set up navs:
function init(){
    # HEADER NAV
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
            'link'		=> 	base_url() . 'gig',
            'show_condition'=> 1,
            'parent'	=>	0
        ),
        3 =>	array(
            'text'		=> 	'Post a Gig',
            'link'		=> 	base_url() . 'gig/add',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        4 =>	array(
            'text'		=> 	'Find a Venue',
            'link'		=> 	base_url() . 'venues',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        5 =>	array(
            'text'		=> 	'Post a Venue',
            'link'		=> 	base_url() . 'venues/add',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        6 =>	array(
            'text'		=> 	'Profiles',
            'link'		=> 	base_url() . 'profiles',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        7 =>	array(
            'text'		=> 	'FAQ',
            'link'		=> 	base_url() . 'pages/faq',
            'show_condition'=>	1,
            'parent'	=>	1
        ),
        8 =>	array(
            'text'		=> 	'Add a Profile',
            'link'		=> 	base_url() . 'profiles/add',
            'show_condition'=>	1,
            'parent'	=>	6
        ),
        9 =>	array(
            'text'		=> 	'Contact us!',
            'link'		=> 	base_url() . 'contact',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
		10 =>	array(
            'text'		=> 	'View Profiles',
            'link'		=> 	base_url() . 'profiles',
            'show_condition'=>	1,
            'parent'	=>	6
        )
    );//end $menuOne

    # FOOTER NAV
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
            'link'		=> 	base_url() . 'pages/about',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        3 =>	array(
            'text'		=> 	'Contact',
            'link'		=> 	base_url() . 'contact',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        4 =>	array(
            'text'		=> 	'Disclaimer',
            'link'		=> 	base_url() . 'pages/disclaimer',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        5 =>	array(
            'text'		=> 	'RSS',
            'link'		=> 	base_url() . 'rss',
            'show_condition'=>	1,
            'parent'	=>	0
        )
    );//end $menuTwo

    $this->setHeaderMenu($menuOne);
    $this->setFooterMenu($menuTwo);

}// end function init



function __construct(){
    $this->init();
}//end construct()

function setHeaderMenu($myMenu){
    $CI =& get_instance();
    $this->headerMenu = $myMenu;
}//end setHeaderMenu()


function setFooterMenu($myMenu){
    $CI =& get_instance();
    $this->footerMenu = $myMenu;
}// end setFooterMenu()

    

	/*
	 * loadHeader - Return HTML navigation string
	 */
	public function loadHeader($selected = null)
	{
		$out = '<ul class="nav navbar-nav">';
		foreach ( $this->headerMenu as $i=>$arr )
		{
			if ( is_array ( $this->headerMenu[ $i ] ) ) 
            {//must be by construction but let's keep the errors home
                
				if ( $this->headerMenu[ $i ] [ 'show_condition' ] && $this->headerMenu [ $i ] [ 'parent' ] == 0 ) 
				{//are we allowed to see this menu?
                    
					// Set class for current nav item - Binary safe case-insensitive string comparison
					(strcasecmp($this->headerMenu[ $i ] [ 'text' ], $selected) == 0 ) ? $class = "active" : $class = "";

					if($this->hasChildren($i))
					{
						$class .=" dropdown";
						$out .= "<li class=\"" . $class . "\">";
						$out .= "<a href=\"" . $this->headerMenu [ $i ] [ 'link' ] . "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
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
		}//end foreach

		$out .= '</ul>';
		return $out;
	}// end public function loadHeader()

	private function hasChildren($menu_id)
	{
		foreach ( $this->headerMenu as $i=>$arr )
        {

			if ( $this->headerMenu [ $i ] [ 'show_condition' ] && $this->headerMenu [ $i ] [ 'parent' ] == $menu_id ) 
            {
				return TRUE;
			}
		}

		return FALSE;
	}// end public function hasChildren()
    
    
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
        
		foreach ( $this->headerMenu as $i=>$arr )
        {
			if ( $this->headerMenu [ $i ] [ 'show_condition' ] && $this->headerMenu [ $i ] [ 'parent' ] == $el_id ) 
            {//are we allowed to see this menu?
				$has_subcats = TRUE;

				$out .= "<li><a href=\"{$this->headerMenu[ $i ][ 'link' ]}\">{$this->headerMenu [ $i ] [ 'text' ]}</a>" . $this->getChildren ( $this->headerMenu, $i ) . "</li>";
			}
		}//end foreach
        
		$out .= '	</ul>'."\n";

		return ( $has_subcats ) ? $out : FALSE;
	}// end function getChildren()


	/*
	 * loadFooter - Return HTML navigation string
	 */
	public function loadFooter($selected = null)
	{
		$out = '<ul class="nav navbar-nav">';
		foreach ( $this->footerMenu as $i=>$arr )
		{
			if ( is_array ( $this->footerMenu[ $i ] ) ) 
            {//must be by construction but let's keep the errors home
				if ( $this->footerMenu[ $i ] [ 'show_condition' ] && $this->footerMenu [ $i ] [ 'parent' ] == 0 )
				{//are we allowed to see this menu?
                    
					// Set class for current nav item -- Binary safe case-insensitive string comparison
					(strcasecmp($this->footerMenu[ $i ] [ 'text' ], $selected) == 0 ) ? $class = "active" : $class = "";

					if($this->hasChildrenFooter($i))
					{
						$class .=" dropdown";
						$out .= "<li class=\"" . $class . "\">";
						$out .= "<a href=\"" . $this->footerMenu [ $i ] [ 'link' ] . "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
						$out .= $this->footerMenu [ $i ] [ 'text' ];
						$out .= '<b class="caret"></b>';
						$out .= '</a>';
						$out .= $this->getChildrenFooter ( $i ); //loop through children
						$out .= '</li>' . "\n";
					}else
                    {
						$out .= "<li class=\"" . $class . "\">";
						if($this->footerMenu [ $i ] [ 'link' ]!=null)	
                        {
							$out .= "<a href=\"" . $this->footerMenu [ $i ] [ 'link' ] . "\">";
							$out .= $this->footerMenu [ $i ] [ 'text' ];
							$out .= '</a>';
						} else 
                        {
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
		}//end foreach

		$out .= '</ul>';
		return $out;
	}// end function loadFooter()

    
    
	private function hasChildrenFooter($menu_id)
	{
		foreach ( $this->footerMenu as $i=>$arr )
        {

			if ( $this->footerMenu [ $i ] [ 'show_condition' ] && $this->footerMenu [ $i ] [ 'parent' ] == $menu_id ) 
            {
				return TRUE;
			}
		}

		return FALSE;
	}// end function hasChildrenFooter
    
    
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
        
		foreach ( $this->footerMenu as $i=>$arr )
        {

			if ( $this->footerMenu [ $i ] [ 'show_condition' ] && $this->footerMenu [ $i ] [ 'parent' ] == $el_id ) 
            {//are we allowed to see this menu?
				$has_subcats = TRUE;

				$out .= "<li><a href=\"{$this->footerMenu[ $i ][ 'link' ]}\">{$this->footerMenu [ $i ] [ 'text' ]}</a>" . $this->getChildrenFooter ( $this->footerMenu, $i ) . "</li>";
			}
		}// end foreach
        
		$out .= '	</ul>'."\n";

		return ( $has_subcats ) ? $out : FALSE;
	}// end function getChildrenFooter



}// end class Navigation
