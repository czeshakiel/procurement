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
|	https://codeigniter.com/userguide3/general/routing.html
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
#
$route['print_issuance/(:any)'] = 'pages/print_issuance/$1';
$route['post_issuance/(:any)/(:any)'] = 'pages/post_issuance/$1/$2';
$route['delete_request_item_issuance/(:any)/(:any)/(:any)'] = 'pages/delete_request_item_issuance/$1/$2/$3';
$route['add_request_item_issuance'] = 'pages/add_request_item_issuance';
$route['search_item_issuance'] = 'pages/search_item_issuance';
$route['manage_issuance/(:any)/(:any)'] = 'pages/manage_issuance/$1/$2';
$route['create_issuance'] = 'pages/create_issuance';
$route['issuance/(:any)'] = 'pages/issuance/$1';
$route['update_other_request/(:any)/(:any)/(:any)'] = 'pages/update_other_request/$1/$2/$3';
$route['create_other_request'] = 'pages/create_other_request';
$route['other_request/(:any)'] = 'pages/other_request/$1';
$route['rr_print/(:any)'] = 'pages/rr_print/$1';
$route['post_receiving'] = 'pages/post_receiving';
$route['manage_receiving/(:any)/(:any)'] = 'pages/manage_receiving/$1/$2';
$route['receiving/(:any)'] = 'pages/receiving/$1';
$route['cancel_request/(:any)/(:any)'] = 'pages/cancel_request/$1/$2';
$route['revert_finalize_request/(:any)/(:any)'] = 'pages/revert_finalize_request/$1/$2';
$route['finalize_purchase_request/(:any)/(:any)'] = 'pages/finalize_purchase_request/$1/$2';
$route['print_purchase_request/(:any)'] = 'pages/print_purchase_request/$1';
$route['delete_request_item/(:any)/(:any)/(:any)'] = 'pages/delete_request_item/$1/$2/$3';
$route['add_request_item'] = 'pages/add_request_item';
$route['search_item'] = 'pages/search_item';
$route['manage_request/(:any)/(:any)'] = 'pages/manage_request/$1/$2';
$route['create_request'] = 'pages/create_request';
$route['purchase_request/(:any)'] = 'pages/purchase_request/$1';
$route['view_project/(:any)'] = 'pages/view_project/$1';
$route['save_projects'] = 'pages/save_projects';
//$route['delete_stocks/(:any)'] = 'pages/delete_stocks/$1';
$route['save_stocks'] = 'pages/save_stocks';
$route['manage_stocks'] = 'pages/manage_stocks';
$route['delete_suppliers/(:any)'] = 'pages/delete_suppliers/$1';
$route['save_suppliers'] = 'pages/save_suppliers';
$route['manage_suppliers'] = 'pages/manage_suppliers';
$route['delete_units/(:any)'] = 'pages/delete_units/$1';
$route['save_units'] = 'pages/save_units';
$route['manage_units'] = 'pages/manage_units';
$route['delete_users/(:any)'] = 'pages/delete_users/$1';
$route['save_users'] = 'pages/save_users';
$route['manage_users'] = 'pages/manage_users';
$route['logout'] = 'pages/logout';
$route['main'] = 'pages/main';
$route['authenticate'] = 'pages/authenticate';
$route['default_controller'] = 'pages/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
