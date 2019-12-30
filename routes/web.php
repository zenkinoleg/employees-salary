<?php

/**
 * @var \Illuminate\Routing\Router $router
 */

/**
 * Home and About pages
 */
$router->redirect('/','/employees');
$router->get('/about', 'IndexController@about');

/**
 * Employees
 */
$router->get('/employees', 'EmployeeController@all');

$router->get('/employees/{id}', 'EmployeeController@edit')
	->where('id','[\d]+');

$router->post('/employees/save', 'EmployeeController@store');

$router->get('/employees/delete/{id}', 'EmployeeController@destroy')
	->where('id','[\d]+');

