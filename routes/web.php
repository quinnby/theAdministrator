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

Route::get('/performance_review/create','ReviewsController@create');
Route::post('/performance_review/create','ReviewsController@add');
Route::get('/performance_review/{noteId}','ReviewsController@update');
Route::patch('/performance_review','ReviewsController@update');
Route::get('/performance_review','ReviewsController@index');

Route::get('/time_off/create', 'TimeOffController@create');
Route::post('/time_off/create', 'TimeOffController@add');
Route::get('/time_off', 'TimeOffController@index');

Route::get('/schedule', 'ScheduleController@view');

Route::get('/departments','DepartmentsController@index');

Route::get('/security','SecurityController@index');

Route::get('/users','UsersController@index');
Route::post('/users/add', 'UsersController@add');
Route::get('/users/create','UsersController@create');
Route::get('/user/profile/{id}', 'UsersController@view');
Route::get('//user/profile/{id}/edit', 'UsersController@edit');
Route::get('/user/dashboard', 'UsersController@dashboard');
Route::delete('/user/{id}/delete', 'UsersController@destroy');
Route::patch('user/{id}/toggleActivation', 'UsersController@toggleActivation');