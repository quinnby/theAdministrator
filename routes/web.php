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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');
Route::get('/userprofile', 'UserProfileController@index');
Route::get('/manage_users','ManageUsersController@index');
Route::get('/manage_security','ManageSecurityController@index');
Route::get('/manage_departments','ManageDepartmentsController@index');
Route::get('/create_user','ManageUsersController@create');
Route::get('/about','HomeController@about');
