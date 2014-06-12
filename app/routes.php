<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/create_admin', function()
{
		$input = [
          'first_name' => 'Scott',
          'last_name'  => 'Cruwys',
          'email'      => 'scruwys@gmail.com',
          'password'   => Hash::make('oi81.2'),
          'office_id'  => 1,
          'title'      => 'Consultant',
          'team_id'	   => 4
		];
		
		$user = User::create($input);

		$adminRole = Role::where('name', '=', 'admin')->first();

		DB::table('role_user')->insert(array(
           'user_id' => $user->id, 
           'role_id' => $adminRole->id
		));		
});

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
	Route::post('applications/{id}/reopen', 'Tracker\ApplicationsController@reopen');
	Route::post('applications/{id}/cancel', 'Tracker\ApplicationsController@cancel');

	Route::resource('applications.comments', 'Tracker\ApplicationCommentsController');

	Route::controller('account','AccountController');
	Route::controller('support','SupportController');
});

Route::get('logout', 'SessionsController@destroy');