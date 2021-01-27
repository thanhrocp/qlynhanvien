<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Auth\LoginController@login')->name('login');
Route::post('/', 'Auth\LoginController@postLogin');
Route::get('/logout', 'Auth\LoginController@logout');

Route::middleware('auth:web')->get('/index', 'HomeController@index');

Route::middleware('auth:web', 'enable:departments,list')->get('/departments', 'DepartmentController@getList');
Route::middleware('auth:web', 'enable:departments,create')->get('/departments/new', 'DepartmentController@getNew');
Route::middleware('auth:web', 'enable:departments,create')->post('/departments/new', 'DepartmentController@postNew');
Route::middleware('auth:web', 'enable:departments,edit')->get('/departments/edit', 'DepartmentController@getEdit');
Route::middleware('auth:web', 'enable:departments,edit')->post('/departments/edit', 'DepartmentController@postEdit');
Route::middleware('auth:web', 'enable:departments,detail')->post('/departments/detail', 'DepartmentController@postDetail');
Route::middleware('auth:web', 'enable:departments,confirm')->get('/departments/confirm', 'DepartmentController@getConfirm');
Route::middleware('auth:web', 'enable:departments,confirm')->post('/departments/confirm', 'DepartmentController@postConfirm');
Route::middleware('auth:web', 'enable:departments,complete')->get('/departments/complete', 'DepartmentController@getComplete');
Route::middleware('auth:web', 'enable:departments,delete')->get('/departments/delete/{id}', 'DepartmentController@delete');

Route::middleware('auth:web', 'enable:users,list')->get('/users', 'UserController@index');
Route::middleware('auth:web', 'enable:users,create')->get('/users/new', 'UserController@create');
Route::middleware('auth:web', 'enable:users,create')->post('/users/new', 'UserController@store');
Route::middleware('auth:web', 'enable:users,edit')->get('/users/edit/{id}', 'UserController@edit');
Route::middleware('auth:web', 'enable:users,edit')->post('/users/edit/{id}', 'UserController@update');
Route::middleware('auth:web', 'enable:users,delete')->get('/users/delete/{id}','UserController@destroy');

Route::group(['prefix' => 'employees'], function () {
    Route::get('/', ['as' => 'employList', 'uses' => 'EmployeeController@index']);
    Route::post('/', ['as' => 'EmployeeExcel', 'uses' => 'EmployImportController@postImport']);
    Route::get('add', ['as' => 'employAdd', 'uses' => 'EmployeeController@create']);
    Route::post('add', ['as' => 'employ_Add', 'uses' => 'EmployeeController@store']);
    Route::get('edit/{id}', ['as' => 'employEdit', 'uses' => 'EmployeeController@edit']);
    Route::post('edit/{id}', ['as' => 'employ_Edit', 'uses' => 'EmployeeController@update']);
    Route::get('delete/{id}', ['as' => 'employ_delete', 'uses' => 'EmployeeController@destroy']);
    Route::get('edit/{id}/contact', ['as' => 'addContact', 'uses' => 'EmployeeContactController@index']);
    Route::post('edit/{id}/contact', ['as' => 'add_Contact', 'uses' => 'EmployeeContactController@update']);
    Route::get('edit/{id}/work', ['as' => 'addWork', 'uses' => 'EmployeeWorkController@index']);
    Route::post('edit/{id}/work', ['as' => 'add_work', 'uses' => 'EmployeeWorkController@update']);
});
Route::resource('salary', 'SalaryController', ['middleware' => 'adminrole']);

Route::group(['prefix' => 'contacts'], function () {
	Route::get('/', ['as' => 'contactList', 'uses' => 'ContactController@index']);
});

Route::group(['prefix' => 'profile'], function () {
	Route::get('personal', ['as' => 'personal', 'uses' => 'ProfileController@personal']);
	Route::post('personal', ['as' => 'personal_update', 'uses' => 'ProfileController@update']);
	Route::get('work', ['as' => 'work', 'uses' => 'ProfileController@work']);
	Route::get('contact', ['as' => 'contact', 'uses' => 'ProfileController@contact']);
	Route::post('contact', ['as' => 'contact_update', 'uses' => 'ProfileController@contactUpdate']);
});

Route::group(['prefix' => 'infoemploy'], function () {
	Route::get('/', ['as' => 'danhsach', 'uses' => 'InfoEmloyeeController@index']);
	Route::get('export', ['as' => 'export', 'uses' => 'ExportController@export']);
});
