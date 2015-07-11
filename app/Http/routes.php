<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'dashboard' => 'DashboardController',
	'department'=>'DepartmentController' ,
	'user'=>'UserController',
	'attendance'=>'AttendanceController',
	'leave'=>'LeaveController',
	'office'=>'OfficeTimeController'
]);
Route::get('company/settings', 'CompanyController@settings');
Route::post('holiday/edit-holiday','HolidayController@holiday');
Route::resource('company', 'CompanyController');
Route::resource('holiday','HolidayController');
Route::resource('transaction', 'TransactionHeadController');


