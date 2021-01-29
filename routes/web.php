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

Route::middleware('auth:web', 'enable:department,list')->get('/department', 'DepartmentController@getList');
Route::middleware('auth:web', 'enable:department,list')->post('/department', 'DepartmentController@postList');
Route::middleware('auth:web', 'enable:department,create')->get('/department/new', 'DepartmentController@getNew');
Route::middleware('auth:web', 'enable:department,create')->post('/department/new', 'DepartmentController@postNew');
Route::middleware('auth:web', 'enable:department,edit')->get('/department/edit', 'DepartmentController@getEdit');
Route::middleware('auth:web', 'enable:department,edit')->post('/department/edit', 'DepartmentController@postEdit');
Route::middleware('auth:web', 'enable:department,detail')->post('/department/detail', 'DepartmentController@postDetail');
Route::middleware('auth:web', 'enable:department,confirm')->get('/department/confirm', 'DepartmentController@getConfirm');
Route::middleware('auth:web', 'enable:department,confirm')->post('/department/confirm', 'DepartmentController@postConfirm');
Route::middleware('auth:web', 'enable:department,complete')->get('/department/complete', 'DepartmentController@getComplete');
Route::middleware('auth:web', 'enable:department,delete')->get('/department/delete/{id}', 'DepartmentController@getDelete');

Route::middleware('auth:web', 'enable:user,list')->get('/user', 'UserController@index');
Route::middleware('auth:web', 'enable:user,create')->get('/user/new', 'UserController@create');
Route::middleware('auth:web', 'enable:user,create')->post('/user/new', 'UserController@store');
Route::middleware('auth:web', 'enable:user,edit')->get('/user/edit/{id}', 'UserController@edit');
Route::middleware('auth:web', 'enable:user,edit')->post('/user/edit/{id}', 'UserController@update');
Route::middleware('auth:web', 'enable:user,delete')->get('/user/delete/{id}','UserController@destroy');

Route::middleware('auth:web', 'enable:employee,admin')->get('/employee', ['as' => 'employList', 'uses' => 'EmployeeController@index']);
Route::middleware('auth:web', 'enable:employee,admin')->post('/employee', ['as' => 'EmployeeExcel', 'uses' => 'EmployImportController@postImport']);
Route::middleware('auth:web', 'enable:employee,admin')->get('/employee/add', ['as' => 'employAdd', 'uses' => 'EmployeeController@create']);
Route::middleware('auth:web', 'enable:employee,admin')->post('/employee/add', ['as' => 'employ_Add', 'uses' => 'EmployeeController@store']);
Route::middleware('auth:web', 'enable:employee,admin')->get('/employee/edit/{id}', ['as' => 'employEdit', 'uses' => 'EmployeeController@edit']);
Route::middleware('auth:web', 'enable:employee,admin')->post('/employee/edit/{id}', ['as' => 'employ_Edit', 'uses' => 'EmployeeController@update']);
Route::middleware('auth:web', 'enable:employee,admin')->get('/employee/delete/{id}', ['as' => 'employ_delete', 'uses' => 'EmployeeController@destroy']);
Route::middleware('auth:web', 'enable:employee,admin')->get('/employee/edit/{id}/contact', ['as' => 'addContact', 'uses' => 'EmployeeContactController@index']);
Route::middleware('auth:web', 'enable:employee,admin')->post('/employee/edit/{id}/contact', ['as' => 'add_Contact', 'uses' => 'EmployeeContactController@update']);
Route::middleware('auth:web', 'enable:employee,admin')->get('/employee/edit/{id}/work', ['as' => 'addWork', 'uses' => 'EmployeeWorkController@index']);
Route::middleware('auth:web', 'enable:employee,admin')->post('/employee/edit/{id}/work', ['as' => 'add_work', 'uses' => 'EmployeeWorkController@update']);

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
