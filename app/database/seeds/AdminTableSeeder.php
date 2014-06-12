<?php

class AdminTableSeeder extends Seeder {

	public function run()
	{
		$team = Team::where('abbrv', ,'=', 'FEDA')->first();

		$input = [
          'first_name' => 'Scott',
          'last_name'  => 'Cruwys',
          'email'      => 'scruwys@gmail.com',
          'password'   => Hash::make('oi81.2'),
          'office_id'  => 1,
          'title'      => 'Consultant',
          'team_id'	   => $team->id
		];
		
		$user = User::create($input);

		$adminRole = Role::where('name', '=', 'admin')->first();

		DB::table('role_user')->insert(array(
           'user_id' => $user->id, 
           'role_id' => $adminRole->id
		));		
	}

}