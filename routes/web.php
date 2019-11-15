<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router->redirect('/','/employees');

/**
 * Employees
 */
$router->get('/employees', 'EmployeeController@all');

$router->get('/employees/{id}', 'EmployeeController@edit')
	->where('id','[\d]+');

$router->post('/employees/save', 'EmployeeController@save');

$router->get('/employees/delete/{id}', 'EmployeeController@delete')
	->where('id','[\d]+');

/**
 * About
 */
$router->get('/about', 'IndexController@about');
