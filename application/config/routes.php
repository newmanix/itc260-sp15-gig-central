<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
/*
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
*/

// $route['news/create'] = 'news/create';
// $route['news/(:any)'] = 'news/view/$1';
// $route['news'] = 'news';

// $route['rss/(:any)'] = 'rss/$1';
// $route['rss'] = 'rss';

//admin routes
$route['admin'] = 'admin/index';
$route['admin/login'] = 'admin/login';
$route['admin/logout'] = 'admin/logout';
//gig routes
$route['gig'] = 'gig/index';
$route['gig/add'] = 'gig/add';
$route['gig/sendnewsletter'] = 'gig/sendnewsletter';
$route['gig/(:any)'] = 'gig/view/$1';

//venues routes
$route['venues'] = 'venues/index';
$route['venues/add'] = 'venues/add';
$route['venues/success'] = 'venues/success';
$route['venues/(:any)'] = 'venues/view/$1';

//other page routes
$route['customer'] = 'customer';
$route['customers'] = 'customer';
$route['startups'] = 'startups';
//profiles route
$route['profile/add'] = 'profile/add';
$route['profiles/add'] = 'profile/add';
$route['profile/edit'] = 'profile/edit';
$route['profiles/edit'] = 'profile/edit';
$route['profiles'] = 'profile';
$route['profile'] = 'profile';
$route['profile/success'] = 'profile/success';
$route['profile/duplicat'] = 'profile/duplicat';

$route['contact/view'] = 'contact/view';
$route['contact/create'] = 'contact/create';
$route['contact/(:any)'] = 'contact/view/$1';
$route['contact'] = 'contact';
$route['contact/success'] = 'contact/success';


//bootswatch example route
$route['example'] = 'customer/example';
$route['profile/(:any)'] = 'profile/view/$1';
$route['404_override'] = 'my404';

//homepage routes
$route['default_controller'] = 'welcome';
