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

/*--================================Login-Logout=========================================---*/
Route::group(['middleware' => 'haslogin'], function () {
	Route::get('/', ['as' => 'formLogin', 'uses' => 'UserController@getLogin']);
	Route::post('/', ['as' => 'login', 'uses' => 'UserController@postLogin']);
});
Route::get('logout', ['as' => 'logout', 'uses' => 'UserController@getLogout']);
Route::group(['middleware' => ['disablepreventback', 'roleLogin', 'changepass']], function () {
	Route::group(['middleware' => 'adminrole'], function () {
		Route::group(['prefix' => 'departments'], function () {
			Route::get('/', ['as' => 'departList', 'uses' => 'DepartController@index']);
			Route::get('add', ['as' => 'departAdd', 'uses' => 'DepartController@create']);
			Route::post('add', ['as' => 'depart_Add', 'uses' => 'DepartController@store']);
			Route::get('edit/{id}', ['as' => 'departEdit', 'uses' => 'DepartController@edit']);
			Route::post('edit/{id}', ['as' => 'depart_Edit', 'uses' => 'DepartController@update']);
			Route::get('delete/{id}', ['as' => 'departdelete', 'uses' => 'DepartController@destroy']);
			Route::post('deleteAll', ['as' => 'depart_delete', 'uses' => 'DepartController@deleteAll']);
		});

		Route::group(['prefix' => 'users'], function () {
			Route::get('/', ['as' => 'userList', 'uses' => 'UserController@index']);
			Route::post('/', ['as' => 'user_reset', 'uses' => 'UserController@resetpass']);
			Route::get('import-user', ['as' => 'importUser', 'uses' => 'ImportUserController@getImport']);
			Route::get('excel-upload', ['as' => 'confirmExcel', 'uses' => 'ImportUserController@confirmExcel']);
			Route::post('import-user', ['as' => 'import_user', 'uses' => 'ImportUserController@postImport']);
			Route::get('add', ['as' => 'userAdd', 'uses' => 'UserController@create']);
			Route::post('add', ['as' => 'user_Add', 'uses' => 'UserController@store']);
			Route::get('edit/{id}', ['as' => 'userEdit', 'uses' => 'UserController@edit']);
			Route::post('edit/{id}', ['as' => 'user_Edit', 'uses' => 'UserController@update']);
			Route::get('delete/{id}', ['as' => 'user_delete', 'uses' => 'UserController@destroy']);
			Route::get('changepass', ['as' => 'changepass', 'uses' => 'UserController@showChangePass']);
			Route::post('changepass', ['as' => 'change_pass', 'uses' => 'UserController@ChangePass']);

		});

		Route::group(['prefix' => 'employees'], function () {
			Route::get('/', ['as' => 'employList', 'uses' => 'EmployeeController@index']);
			Route::post('/',['as' => 'EmployeeExcel','uses' =>'EmployImportController@postImport']);
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
	});

	Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

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
});