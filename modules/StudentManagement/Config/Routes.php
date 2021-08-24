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
  $routes->delete('inactive/(:num)', 'Student::inactive/$1');
  $routes->delete('active/(:num)', 'Student::active/$1');

  $routes->get('profileStudent', 'Student::profile_student');
  $routes->match(['get', 'post'], 'edit_profile/(:num)', 'Student::edit_profile_student/$1');
  $routes->get('getSections', 'Student::get_sections');

});
$routes->group('enroll', ['namespace' => 'Modules\StudentManagement\Controllers'], function($routes)
{
  $routes->match(['get', 'post'],'/', 'Enroll::index');
  $routes->get('add', 'Enroll::add_enroll');
  $routes->post('add', 'Enroll::add_enroll');
  $routes->get('enrollStudent', 'Enroll::enroll_student');
  $routes->post('enrolled', 'Enroll::enroll_student');
});

$routes->group('graduates', ['namespace' => 'Modules\StudentManagement\Controllers'], function($routes)
{
  $routes->match(['get', 'post'],'/', 'Graduates::index');
  $routes->match(['get', 'post'], 'add', 'Graduates::add');
  $routes->match(['get', 'post'], 'insert-graduates', 'Graduates::insert_graduates');
  $routes->match(['get', 'post'], 'edit/(:num)', 'Graduates::edit_graduate/$1');  

});
// $routes->group('current', ['namespace' => 'Modules\StudentManagement\Controllers'], function($routes)
// {
//   $routes->get('/', 'Current::index');
//   $routes->delete('delete/(:num)', 'Current::delete_student/$1');
// });