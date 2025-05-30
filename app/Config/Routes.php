<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Admin\Dashboard;
use App\Controllers\Admin\Maintenance;
use App\Controllers\Faculty\FacultyDashboard;
use App\Controllers\Faculty\FacultyClasses;
use App\Controllers\Faculty\FacultyGrades;
use App\Controllers\Faculty\FacultyStudents;
use App\Controllers\Faculty\FacultyProfile;
use App\Controllers\Home;
use App\Controllers\Student\StudentHome;
use App\Controllers\Student\StudentClass;
use App\Controllers\Student\StudentGrades;
use App\Controllers\Student\StudentProfile;

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
$routes->get('faculty/students', [FacultyStudents::class, 'students']);
$routes->get('faculty/grades', [FacultyGrades::class, 'grades']);
$routes->get('faculty/profile', [FacultyProfile::class, 'profile']);
$routes->match(['GET', 'POST'], 'faculty/addClass', [FacultyClasses::class, 'addClass'] );


$routes->get('faculty/logout', [FacultyDashboard::class, 'logout']);
// End Faculty Route


// Student Routes
$routes->get('student/', [StudentHome::class, 'home']);
$routes->get('student/class', [StudentClass::class, 'class']);
$routes->get('student/grades', [StudentGrades::class, 'grades']);
$routes->get('student/profile', [StudentProfile::class, 'profile']);





