<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['default_controller'] = 'welcome';
$route = array (
    'default_controller' => 'login',
    'login' => 'login/login',
    'logout' => 'login/logout'
);
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
