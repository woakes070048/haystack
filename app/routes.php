<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/


Route::group(array('before' => 'guest'), function() 
{
	Route::get('login', 'SessionsController@create');
	Route::post('login', 'SessionsController@store');

	Route::controller('password', 'RemindersController');
});

Route::group(array('before' => 'auth'), function() 
{
	Route::group(array('before' => 'auth.admin', 'prefix' => 'admin'), function() 
	{
		Route::resource('users', 'Admin\UsersController'); 

		Route::resource('offices', 'Admin\OfficesController');

		Route::resource('teams', 'Admin\TeamsController');
	});

	Route::get('/', 'HomeController@index');
});

Route::get('logout', 'SessionsController@destroy');