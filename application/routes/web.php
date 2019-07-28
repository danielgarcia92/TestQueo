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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

/* -------------------- */
/*      Companies       */
/* -------------------- */
Route::get('/companies', 'CompanyController@indexAction')
    ->name('companies.index');

Route::get('/companies/{company}', 'CompanyController@showAction')
    ->where('company', '[0-9]+')
    ->name('companies.show');

Route::get('/companies/new', 'CompanyController@createAction')
    ->name('companies.new');
Route::post('companies', 'CompanyController@storeAction')
    ->name('companies.store');

Route::get('/companies/{company}/edit', 'CompanyController@editAction')
    ->where('company', '[0-9]+')
    ->name('companies.edit');
Route::put('/companies/{company}', 'CompanyController@updateAction')
    ->where('company', '[0-9]+')
    ->name('companies.update');

Route::delete('companies/{company}', 'CompanyController@destroyAction')
    ->name('companies.destroy');

/* -------------------- */
/*      Employees       */
/* -------------------- */
Route::get('/employees', 'EmployeeController@indexAction')
    ->name('employees.index');

Route::get('/employees/{employee}', 'EmployeeController@showAction')
    ->where('employee', '[0-9]+')
    ->name('employees.show');

Route::get('/employees/new', 'EmployeeController@createAction')
    ->name('employees.new');
Route::post('employees', 'EmployeeController@storeAction')
    ->name('employees.store');

Route::get('/employees/{employee}/edit', 'EmployeeController@editAction')
    ->where('employee', '[0-9]+')
    ->name('employees.edit');
Route::put('/employees/{employee}', 'EmployeeController@updateAction')
    ->where('employee', '[0-9]+')
    ->name('employees.update');

Route::delete('employees/{employee}', 'EmployeeController@destroyAction')
    ->name('employees.destroy');

/* -------------------- */
/*        Users         */
/* -------------------- */
Route::get('/users', 'UserController@indexAction')
    ->name('users.index');
