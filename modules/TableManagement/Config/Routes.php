<?php
$routes->group('course', ['namespace' => 'Modules\TableManagement\Controllers'], function($routes)
{
    $routes->get('/', 'Course::index');
    $routes->get('(:num)', 'Course::index/$1');
    $routes->match(['get', 'post'], '/', 'Course::index');
    $routes->match(['get', 'post'], '(:num)', 'Course::index/$1');
    $routes->get('show/(:num)', 'Course::show_course/$1');
    $routes->get('own/(:num)', 'Course::user_own_profile/$1');
    $routes->match(['get', 'post'], 'add', 'Course::add_course');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Course::edit_course/$1');
    $routes->delete('inactive/(:num)', 'Course::inactive/$1');
    $routes->delete('active/(:num)', 'Course::active/$1');
});
$routes->group('schyear', ['namespace' => 'Modules\TableManagement\Controllers'], function($routes)
{
    $routes->get('/', 'Schoolyear::index');
    $routes->get('(:num)', 'Schoolyear::index/$1');
    $routes->match(['get', 'post'], '/', 'Schoolyear::index');
    $routes->match(['get', 'post'], '(:num)', 'Schoolyear::index/$1');
    $routes->get('show/(:num)', 'Schoolyear::show_schyear/$1');
    $routes->get('own/(:num)', 'Schoolyear::user_own_profile/$1');
    $routes->match(['get', 'post'], 'add', 'Schoolyear::add_schyear');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Schoolyear::edit_schyear/$1');
    $routes->delete('inactive/(:num)', 'Schoolyear::inactive/$1');
    $routes->delete('active/(:num)', 'Schoolyear::active/$1');
});
// $routes->group('section', ['namespace' => 'Modules\TableManagement\Controllers'], function($routes)
// {
//     $routes->get('/', 'Section::index');
//     $routes->get('(:num)', 'section::index/$1');
//     $routes->match(['get', 'post'], '/', 'Section::index');
//     $routes->match(['get', 'post'], '(:num)', 'Section::index/$1');
//     $routes->get('show/(:num)', 'Section::show_section/$1');
//     $routes->get('own/(:num)', 'Section::user_own_profile/$1');
//     $routes->match(['get', 'post'], 'add', 'Section::add_section');
//     $routes->match(['get', 'post'], 'edit/(:num)', 'Section::edit_section/$1');
//     $routes->delete('delete/(:num)', 'Section::delete_section/$1');
// });
$routes->group('subject', ['namespace' => 'Modules\TableManagement\Controllers'], function($routes)
{
    $routes->get('/', 'Subject::index');
    $routes->get('(:num)', 'Subject::index/$1');
    $routes->match(['get', 'post'], '/', 'Subject::index');
    $routes->match(['get', 'post'], '(:num)', 'Subject::index/$1');
    $routes->get('show/(:num)', 'Subject::show_subject/$1');
    $routes->get('own/(:num)', 'Subject::user_own_profile/$1');
    $routes->match(['get', 'post'], 'add', 'Subject::add_subject');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Subject::edit_subject/$1');
    $routes->delete('delete/(:num)', 'Subject::delete_subject/$1');
});
