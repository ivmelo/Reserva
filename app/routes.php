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

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::group(array('before'=>'auth'), function() {   
    Route::resource('users', 'UsersController');

	Route::resource('reservations', 'ReservationsController');

	Route::resource('items', 'ItemsController');
});

Route::resource('sessions', 'SessionsController');


//Route::resource('auth', 'RequestsController');

/*Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');*/

Route::get('/', function()
{

	//return User::count();

	//return View::make('mastertemplate');
	// $start_date = '2015-01-03 00:00:00';
	// $end_date = '2015-01-05 00:00:00';
	// $item_id = 4;

	// $busy = Reservation::whereRaw('((end_date between "' . $start_date . '" and "' . $end_date . '") '
	// 		.'or (start_date between "' . $start_date . '" and "' . $end_date . '") '
	// 		.'or (start_date < "' . $start_date . '" and end_date > "' . $end_date . '"))')->where('item_id', '=', $item_id)->count();

	// return $busy;

	if (Auth::check()) {
		return Redirect::route('reservations.index');
	}

	return View::make('auth.login');

});


Route::get('/sendmail', function()
{

	Mail::send('emails.test', [], function($message){
		$message->to('meloivanilson@gmail.com', 'Ivan Melo')->subject('OUTROEMAIL');
	});

	return 'done!';

});