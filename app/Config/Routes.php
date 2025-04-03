<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Admin\Dashboard;
use App\Controllers\Admin\Maintenance;
use App\Controllers\Home;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class ,'index']);
$routes->get('/faculty', [Home::class, 'faculty']);
$routes->get('/admin', [Home::class, 'admin']);


$routes->get('admin/dashboard', [Dashboard::class, 'dashboard']); 
$routes->get('admin/accounts', [Maintenance::class, 'getPersonnelsAccounts']); 

// Maintenance routes
$routes->match(['GET', 'POST'], 'admin/createAccount', [Maintenance::class, 'createPersonnelsAccount']);
$routes->get('admin/deleteAccount/(:num)', [Maintenance::class, 'deletePersonnelsAccount']); 
$routes->match(['GET', 'POST'],'admin/editAccount/(:num)', [Maintenance::class, 'updatePersonnelsAccount']); 


// Students routes
$routes->get('admin/students', [Maintenance::class, 'getStudentsAccounts']);
$routes->get('admin/createStudentAccount', [Maintenance::class, 'createStudentAccount']);