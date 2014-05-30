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
	Route::get('/', 'HomeController@index');

	Route::group(array('before' => 'auth.admin', 'prefix' => 'admin'), function() 
	{
		Route::resource('users', 'Admin\UsersController'); 

		Route::resource('offices', 'Admin\OfficesController');

		Route::resource('teams', 'Admin\TeamsController');
	});

	Route::resource('applications', 'Tracker\ApplicationsController');
	Route::resource('applications.comments', 'Tracker\ApplicationCommentsController');

	Route::controller('account','AccountController');
});

Route::get('logout', 'SessionsController@destroy');