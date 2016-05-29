<?php 

/**
 * Navigation.php creates navigation links for header & footer
 *
 * Contains a PHP class called Navigation that contains functions to dynamically     * create naviagation links in the header menu and footer menu based on users       * location in the app and permissions privilege (admin).
 *
 * @package ITC 260 Gig Central CodeIgnitor
 * @author     
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version 2.0 2015/05/20
 * @link
 * @todo none
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
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
            'text'		=> 	'Gigs',
            'link'		=> 	base_url() . 'gig',
            'show_condition'=> 1,
            'parent'	=>	0
        ),
        3 => 	array(
            'text'		=> 	'Find a Gig',
            'link'		=> 	base_url() . 'gig',
            'show_condition'=> 1,
            'parent'	=>	2
        ),
        4 =>	array(
            'text'		=> 	'Post a Gig',
            'link'		=> 	base_url() . 'gig/add',
            'show_condition'=>	1,
            'parent'	=>	2
        ),
        5 =>	array(
            'text'		=> 	'Venues',
            'link'		=> 	base_url() . 'venues',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        6 =>	array(
            'text'		=> 	'Find a Venue',
            'link'		=> 	base_url() . 'venues',
            'show_condition'=>	1,
            'parent'	=>	5
        ),
        7 =>	array(
            'text'		=> 	'Post a Venue',
            'link'		=> 	base_url() . 'venues/add',
            'show_condition'=>	1,
            'parent'	=>	5
        ),
        8 =>	array(
            'text'		=> 	'Profiles',
            'link'		=> 	base_url() . 'profiles',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
		9 =>	array(
			'text'		=> 	'View Profiles',
			'link'		=> 	base_url() . 'profiles',
			'show_condition'=>	1,
			'parent'	=>	8
		),
        10 =>	array(
            'text'		=> 	'Add a Profile',
            'link'		=> 	base_url() . 'profiles/add',
            'show_condition'=>	1,
            'parent'	=>	8
        ),
        11 =>	array(
            'text'		=> 	'Contact Us',
            'link'		=> 	base_url() . 'contact',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
		
    );//end $menuOne
    #Admin menu
   $CI =& get_instance();
   $CI->load->library("session");
   if ($CI->session->logged_in == TRUE){
   $adProfile = array(
            'text'		=> 	'Edit Profile',
            'link'		=> 	base_url() . 'profiles/edit',
            'show_condition'=>	1,
            'parent'	=>	8
        );
    $adVenues = array(
            'text'		=> 	'Edit Venues',
            'link'		=> 	base_url() . 'venues/edit',
            'show_condition'=>	1,
            'parent'	=>	5
        );
   $adGig = array(
            'text'		=> 	'Edit Gig',
            'link'		=> 	base_url() . 'gig/edit',
            'show_condition'=>	1,
            'parent'	=>	2
        );
   array_push($menuOne,$adProfile,$adVenues,$adGig);
   $login = array(
            'text'		=> 	'Logout',
            'link'		=> 	base_url() . 'admin/logout',
            'show_condition'=>	1,
            'parent'	=>	0
        );
   }else{
    $login = array(
            'text'		=> 	'Login',
            'link'		=> 	base_url() . 'admin/login',
            'show_condition'=>	1,
            'parent'	=>	0
        );
   }
    
    
    # FOOTER NAV
    $menuTwo = array
    (
        1 => 	array(
            'text'		=> 	'About',
            'link'		=> 	base_url() . 'pages/about',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        2 => 	array(
            'text'		=> 	'FAQ',
            'link'		=> 	base_url() . 'pages/faq',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        3 =>	array(
            'text'		=> 	'Disclaimer',
            'link'		=> 	base_url() . 'pages/disclaimer',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        4 =>	array(
            'text'		=> 	'Contact Us',
            'link'		=> 	base_url() . 'contact',
            'show_condition'=>	1,
            'parent'	=>	0
        ),
        
    );//end $menuTwo
    array_push($menuTwo,$login);
    
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
