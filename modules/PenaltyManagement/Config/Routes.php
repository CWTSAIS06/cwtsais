<?php
$routes->group('penalty', ['namespace' => 'Modules\PenaltyManagement\Controllers'], function($routes)
{
    $routes->get('/', 'Penalty::index');
    $routes->match(['get', 'post'], 'add', 'Penalty::add_penalty');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Penalty::edit_penalty/$1');
    $routes->delete('inactive/(:num)', 'Penalty::delete_penalty/$1');
    $routes->delete('active/(:num)', 'Penalty::active/$1');
  
});
