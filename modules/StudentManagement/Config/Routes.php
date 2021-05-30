<?php
$routes->group('student', ['namespace' => 'Modules\StudentManagement\Controllers'], function($routes)
{
  $routes->get('/', 'Student::index');
  $routes->get('(:num)', 'Student::index/$1');
  $routes->get('pdf/(:num)', 'Student::pdf/$1');
  $routes->match(['get', 'post'], '/', 'Student::index');
  $routes->match(['get', 'post'], '(:num)', 'Student::index/$1');
  $routes->get('show/(:num)', 'Student::show_student/$1');
  $routes->match(['get', 'post'], 'add', 'Student::add_student');
  $routes->match(['get', 'post'], 'edit/(:num)', 'Student::edit_student/$1');
  $routes->delete('delete/(:num)', 'Student::delete_student/$1');
});
$routes->group('enroll', ['namespace' => 'Modules\StudentManagement\Controllers'], function($routes)
{
  $routes->get('/', 'Enroll::index');
  $routes->get('add', 'Enroll::add_enroll');
  $routes->post('add', 'Enroll::add_enroll');
});
// $routes->group('current', ['namespace' => 'Modules\StudentManagement\Controllers'], function($routes)
// {
//   $routes->get('/', 'Current::index');
//   $routes->delete('delete/(:num)', 'Current::delete_student/$1');
// });
