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

Route::resource('users', 'UsersController');

Route::resource('reservations', 'ReservationsController');

Route::resource('auth', 'RequestsController');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::get('/', function()
{
	//return View::make('hello');

	//$user = User::find('1');

	//return $user->reservations;

	return User::count();

});
