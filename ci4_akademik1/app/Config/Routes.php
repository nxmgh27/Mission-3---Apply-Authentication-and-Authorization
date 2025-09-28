<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default ke login
$routes->get('/', function() {
    return redirect()->to('/login');
});

// Auth
$routes->get('/login', 'AuthController::loginForm');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

// Dashboard (proteksi login)
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);

// Student only
$routes->group('', ['filter' => 'role:student'], function($routes) {
    $routes->get('courses', 'CoursesController::index');
    $routes->get('courses/enroll/(:num)', 'CoursesController::enroll/$1');
    $routes->get('courses/my-enrollments', 'CoursesController::myEnrollments');
});

// Admin only
// Admin only
$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
    // Courses
    $routes->get('courses', 'Admin\CoursesController::index');
    $routes->get('courses/create', 'Admin\CoursesController::create');
    $routes->post('courses/store', 'Admin\CoursesController::store');
    $routes->get('courses/edit/(:num)', 'Admin\CoursesController::edit/$1');
    $routes->post('courses/update/(:num)', 'Admin\CoursesController::update/$1');
    $routes->get('courses/delete/(:num)', 'Admin\CoursesController::delete/$1');

    // Students
    $routes->get('students', 'Admin\StudentsController::index');
    $routes->get('students/create', 'Admin\StudentsController::create');
    $routes->post('students/store', 'Admin\StudentsController::store');
    $routes->get('students/edit/(:num)', 'Admin\StudentsController::edit/$1');
    $routes->post('students/update/(:num)', 'Admin\StudentsController::update/$1');
    $routes->get('students/delete/(:num)', 'Admin\StudentsController::delete/$1');
});
