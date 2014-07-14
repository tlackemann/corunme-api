<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// User routes
// Route::post('user', 'UserController@indexAction');
// Route::post('user/edit/', 'UserController@indexAction');
// Route::post('user', 'UserController@indexAction');
// Route::post('user', 'UserController@indexAction');

Route::resource('user', 'UserController');

Route::resource('run', 'RunController');

Route::get('login', 'UserController@login');
Route::post('login', 'UserController@login');
Route::post('logout', 'UserController@logout');


Route::get('oauth', 'OauthController@action_index');
Route::post('oauth/login', 'OauthController@login');

/**
 * OAuth Routes
 */
Route::get('oauth', 'OauthController@index');
Route::post('oauth/token', 'OauthController@token');

Event::listen('illuminate.query', function() {
    #print_r(func_get_args());
});