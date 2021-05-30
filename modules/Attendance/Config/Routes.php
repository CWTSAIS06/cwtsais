<?php
$routes->group('attendance', ['namespace' => 'Modules\Attendance\Controllers'], function($routes)
{
    $routes->get('/', 'Attendance::index');
    $routes->get('(:num)', 'Attendance::index/$1');
    $routes->match(['get', 'post'], '/', 'Attendance::index');
    $routes->match(['get', 'post'], '(:num)', 'Attendance::index/$1');
    $routes->get('show/(:num)', 'Attendance::show_attendance/$1');
    $routes->match(['get', 'post'], 'add', 'Attendance::add_attendance');
    $routes->match(['get', 'post'], 'verify', 'Attendance::verify');
});
