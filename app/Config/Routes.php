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
use App\Controllers\Auth\UserAuthentication;
use App\Controllers\Student\ClassDetails;
use App\Controllers\Student\StudentActivity;

// $routes->get('/', [Home::class ,'index']);
$routes->get('/welcome', [Home::class ,'welcome']);
// $routes->get('/faculty', [Home::class, 'faculty']);
// $routes->get('/admin', [Home::class, 'admin']);
$routes->match(['GET', 'POST'], '/', [UserAuthentication::class, 'studentLogin']);
$routes->match(['GET', 'POST'], '/admin', [UserAuthentication::class, 'adminLogin']);
$routes->match(['GET', 'POST'], '/faculty', [UserAuthentication::class, 'facultyLogin']);


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

$routes->get('admin/logout', [Dashboard::class, 'logout']);
// End Admin Routes


// Faculty Routes
$routes->get('faculty/dashboard', [FacultyDashboard::class, 'dashboard']);
$routes->get('faculty/class', [FacultyClasses::class, 'classes']);
$routes->get('faculty/class/activities/(:num)', [FacultyClasses::class, 'classActivities']);
$routes->match(['GET', 'POST'], 'faculty/class/activities/create', [FacultyClasses::class, 'addActivity']);
$routes->get('faculty/students', [FacultyStudents::class, 'students']);

$routes->get('faculty/grades', [FacultyGrades::class, 'grades']);
$routes->post('faculty/class/update-grade', [FacultyGrades::class, 'updateGrade']);
$routes->get('faculty/grades/class/(:num)', [FacultyGrades::class, 'gradesByClass/$1']);

$routes->get('faculty/profile', [FacultyProfile::class, 'profile']);
$routes->post('faculty/profile/update', [FacultyProfile::class, 'update']);
// Faculty Class routes
$routes->match(['GET', 'POST'], 'faculty/addClass', [FacultyClasses::class, 'addClass'] );
$routes->match(['GET', 'POST'], 'faculty/class/update/(:num)', [FacultyClasses::class, 'updateClass']);
$routes->get('faculty/class/delete/(:num)', [FacultyClasses::class, 'deleteClass']);

$routes->get('faculty/logout', [FacultyDashboard::class, 'logout']);
// End Faculty Route


// Student Routes
$routes->get('student/', [StudentHome::class, 'home']);
$routes->get('student/class', [StudentClass::class, 'class']);
$routes->match(['GET', 'POST'], 'student/joinClass', [StudentClass::class, 'joinClass']);
$routes->get('student/class/(:num)', [ClassDetails::class, 'view/$1']);
$routes->get('student/grades', [StudentGrades::class, 'grades']);
$routes->get('student/profile', [StudentProfile::class, 'profile']);
$routes->post('student/profile/update', [StudentProfile::class, 'update']);
$routes->get('student/logout', [StudentHome::class, 'logout']);
$routes->post('student/activity/submit', [StudentActivity::class, 'submit']);





