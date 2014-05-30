<?php

class AdminTableSeeder extends Seeder {

	public function run()
	{
		$input = [
          'first_name' => 'Scott',
          'last_name'  => 'Cruwys',
          'email'      => 'scruwys@gmail.com',
          'password'   => Hash::make('oi81.2'),
          'office_id'  => 1,
          'title'      => 'Consultant',
          'team_id'	   => 1
		];
		
		$user = User::create($input);

		DB::table('role_user')->insert(array(
           'user_id' => $user->id, 
           'role_id' => $adminRole->id
		));		
	}

}