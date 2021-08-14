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
    $routes->match(['get', 'post'], 'attendanceTimeOut', 'Attendance::attendance_time_out');
    $routes->match(['get', 'post'], 'penalty', 'Attendance::penalty');
    $routes->match(['get', 'post'], 'nstp1', 'Attendance::nstp1');
    $routes->match(['get', 'post'], 'nstp2', 'Attendance::nstp2');
    $routes->match(['get', 'post'], 'check_if_graduate', 'Attendance::check_if_graduate');
});
