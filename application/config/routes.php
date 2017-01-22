<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
This makes sure the requests reaches the News controller instead of going directly to the Pages controller.
The first line routes URI’s with a slug to the view() method in the News controller.
*/
// Default Routes
$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Other routes
$route['controls'] = 'controls';

$route['news/post'] = 'news/post';
$route['news/modify/(:any)'] = 'news/modify/$1';
$route['news/page/(:num)'] = 'news/index/$1';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';

$route['email'] = 'email';

$route['login'] = 'member/login';
$route['sign_up'] = 'member/sign_up';
$route['logout'] = 'member/logout';

$route['upload'] = 'upload';
$route['image_upload'] = 'upload/image_upload';

$route['image_manipulate'] = "image_manipulate";

$route['(:any)'] = function($address) {
    return 'pages/view/'.strtolower($address);
};
