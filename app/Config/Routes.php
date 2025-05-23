<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Admin\Dashboard;
use App\Controllers\Admin\Maintenance;
use App\Controllers\Faculty\FacultyDashboard;
use App\Controllers\Faculty\FacultyClasses;
use App\Controllers\Student\HomeFacultyClasses;
use App\Controllers\Home;
use App\Controllers\Student\StudentHome;
use App\Controllers\Student\StudentClass;
use App\Controllers\Student\StudentGrades;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class ,'index']);
$routes->get('/welcome', [Home::class ,'welcome']);
$routes->get('/faculty', [Home::class, 'faculty']);
$routes->get('/admin', [Home::class, 'admin']);

// Admin
$routes->get('admin/dashboard', [Dashboard::class, 'dashboard']); 


// Maintenance routes

// Maintenance: Personnel
// Gets personnel account
$routes->get('admin/accounts', [Maintenance::class, 'getPersonnelsAccounts']); 
// Creates personnel account
$routes->match(['GET', 'POST'], 'admin/createAccount', [Maintenance::class, 'createPersonnelsAccount']);
// Deletes Personnel Account
$routes->get('admin/deleteAccount/(:num)', [Maintenance::class, 'deletePersonnelsAccount']); 
// Edit Personnel Account
$routes->match(['GET', 'POST'],'admin/editAccount/(:num)', [Maintenance::class, 'updatePersonnelsAccount']); 

// Maintenance: Student
$routes->get('admin/students', [Maintenance::class, 'getStudentsAccounts']);
$routes->match(['GET', 'POST'], 'admin/createStudentAccount', [Maintenance::class, 'createStudentAccount']);

// End Admin Routes


// Faculty Routes
$routes->get('faculty/dashboard', [FacultyDashboard::class, 'dashboard']);
$routes->get('faculty/class', [FacultyClasses::class, 'classes']);

// End Faculty Route


// Student Routes
$routes->get('student/', [StudentHome::class, 'home']);
$routes->get('student/class', [StudentClass::class, 'class']);
$routes->get('student/grades', [StudentGrades::class, 'grades']);





