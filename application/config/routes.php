<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';

$route['api/clientes/:any'] = 'api/clientes';
$route['api/veiculos/:any'] = 'api/veiculos';
$route['api/rastreadores/:any'] = 'api/rastreadores';

$route['login/login'] = 'login/login';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


