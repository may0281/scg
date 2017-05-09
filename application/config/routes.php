<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//$route['default_controller'] = "underconstruction";
$route['default_controller'] = "dashboard";
$route['404_override'] = 'errorpage';

$route['car/brand'] = 'brand/index';
$route['car/list/(:any)'] = 'car/CarList/$1';


