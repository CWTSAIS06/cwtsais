<?php
$routes->group('announcement', ['namespace' => 'Modules\Announcement\Controllers'], function($routes)
{
    $routes->get('/', 'Announcement::index');
    $routes->get('(:num)', 'Announcement::index/$1');
    $routes->match(['get', 'post'], '/', 'Announcement::index');
    $routes->match(['get', 'post'], '(:num)', 'Announcement::index/$1');
    $routes->get('show/(:num)', 'Announcement::show_announcement/$1');
    $routes->get('own/(:num)', 'Announcement::user_own_profile/$1');
    $routes->match(['get', 'post'], 'add', 'Announcement::add_announcement');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Announcement::edit_announcement/$1');
    $routes->delete('inactive/(:num)', 'Announcement::inactive/$1');
    $routes->delete('active/(:num)', 'Announcement::active/$1');
});
