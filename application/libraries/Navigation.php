<?php 

/**
 * Navigation.php - manages all navs on the pages
 *
 * @package GIG_CENTRAL
 * @subpackage GIG
 * @author Alexandre Daniels <adanie04@seattlecentral.edu>
 * @version 1.0 2016/06/09 
 * @link http://newmanix.com/ 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see application/views/themes/bootswatch/header.php
 * @see application/views/themes/bootswatch/footer.php
 * @todo none
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');//prevents a webpage from accesing this file: DO NOT REMOVE THIS!!!

/**
 * Navigation.php holds all of the data for what goes into the header nav and the footer nav
 *
 * @see application/views/themes/bootswatch/header.php
 * @see application/views/themes/bootswatch/footer.php
 * @todo none
 */
 
class Navigation {

var $headerMenu = array();  //The array holding all header navigation elements
var $footerMenu = array();  //The array holding all footer navigation elements
var $out; // The HTML string to be returned

/**
 * contains the data for the navs but does not create it
 *
 * @param none
 * @return none
 * @todo none
 */
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
		12 =>	array(
            'text'		=> 	'Login',
            'link'		=> 	base_url() . 'admin/login',
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


/**
 * Constructor for Navigation file. 
 *
 * @param none
 * @return void 
 * @todo none
 */
function __construct(){
    $this->init();
}//end construct()

/**
 * I dont know what this is
 *
 * @param none
 * @return void 
 * @todo none
 */
function setHeaderMenu($myMenu){
    $CI =& get_instance();
    $this->headerMenu = $myMenu;
}//end setHeaderMenu()

/**
 * I dont know what this is
 *
 * @param none
 * @return void 
 * @todo none
 */
function setFooterMenu($myMenu){
    $CI =& get_instance();
    $this->footerMenu = $myMenu;
}// end setFooterMenu()

/**
 * this will create the header nav
 *
 * @param none
 * @return all of the html for the header nav 
 * @todo none
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

    
/**
 * this checks to see if one of the header nav items is supposed to have a subnav
 *
 * @param whatever menu item happens to be going through the loop
 * @return boolean 
 * @todo none
 */
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
 * this will create the dropdowns of the header nav
 *
 * @param the id of the nav item that has children
 * @return adds a class of dropdown-menu to the nav item 
 * @todo none
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

/**
 * this will create the footer nav
 *
 * @param none
 * @return all of the html for the footer nav 
 * @todo none
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

/**
 * this checks to see if one of the footer nav items is supposed to have a subnav
 *
 * @param whatever menu item happens to be going through the loop
 * @return boolean 
 * @todo none
 */
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
 * this will create the dropdowns of the footer nav
 *
 * @param the id of the nav item that has children
 * @return adds a class of dropdown-menu to the nav item 
 * @todo none
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
