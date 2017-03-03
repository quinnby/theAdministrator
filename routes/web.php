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
Route::get('/about','HomeController@about');


Route::get('/manage_users','UsersController@index');

Route::get('/performance_review/create','ReviewsController@create');
Route::post('/performance_review/create','ReviewsController@add');
Route::get('/performance_review/{noteId}','ReviewsController@update');
Route::get('/performance_review','ReviewsController@index');

Route::get('/time_off/create', 'TimeOffController@create');
Route::get('/time_off', 'TimeOffController@index');

Route::get('/manage_departments','DepartmentsController@index');
Route::get('/manage_security','SecurityController@index');


Route::post('/create_user', 'UsersController@add');
Route::get('/create_user','UsersController@create');
Route::get('/user_profile', 'UsersController@view');
Route::get('/edit_user_profile', 'UsersController@edit');
Route::get('/user_dashboard', 'UsersController@dashboard');
