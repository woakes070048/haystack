<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$locations = Office::all();
		$title = array('Consultant', 'Senior Consultant', 'Director', 'Senior Director', 'Managing Director', 'Senior Managing Director');
		$team  = Team::all();

		for ($i=0; $i < 25; $i++) { 
			$first = $faker->firstName;
			$last  = $faker->lastName;

			$input = [
	          'first_name' => $first,
	          'last_name'  => $last,
	          'email'      => strtolower($first).".".strtolower($last)."@fticonsulting.com",
	          'password'   => Hash::make('password1234'),
	          'office_id'  => $faker->randomNumber(1,9),
	          'team_id'	   => $faker->randomNumber(1,5),
	          'title'      => $title[array_rand($title)]
			];

			$created = User::create($input);

			DB::table('role_user')->insert(array(
				'user_id' => $created->id,
				'role_id' => $faker->randomNumber(1, 3)
			));			
		}
	}

}