<?php
$routes->group('years', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Years::index');
    $routes->match(['get', 'post'], 'add', 'Years::add_year');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Years::edit_year/$1');
    $routes->delete('delete/(:num)', 'Years::delete_year/$1');
    $routes->delete('active/(:num)', 'Years::activate_year/$1');
});

$routes->group('sections', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Sections::index');
    $routes->match(['get', 'post'], 'add', 'Sections::add_section');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Sections::edit_section/$1');
    $routes->delete('delete/(:num)', 'Sections::delete_section/$1');
});

$routes->group('genders', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Genders::index');
    $routes->match(['get', 'post'], 'add', 'Genders::add_gender');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Genders::edit_gender/$1');
    $routes->delete('delete/(:num)', 'Genders::delete_gender/$1');
});

$routes->group('subjects', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Subjects::index');
    $routes->match(['get', 'post'], 'add', 'Subjects::add_subject');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Subjects::edit_subject/$1');
    $routes->delete('inactive/(:num)', 'Subjects::inactive/$1');
    $routes->delete('active/(:num)', 'Subjects::active/$1');
});

$routes->group('penalties', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Penalties::index');
    $routes->match(['get', 'post'], 'add', 'Penalties::add_penalty');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Penalties::edit_penalty/$1');
    $routes->delete('inactive/(:num)', 'Penalties::inactive/$1');
    $routes->delete('active/(:num)', 'Penalties::active/$1');
});
