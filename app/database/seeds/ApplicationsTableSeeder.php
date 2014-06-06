<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ApplicationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		
		$offices = DB::table('offices')->lists('location');
		$teams   = DB::table('teams')->lists('name');		
		$titles  = ['Consultant', 'Senior Consultant', 'Director'];

		foreach(range(1, 8) as $index)
		{
			$first = $faker->firstName;
			$last  = $faker->lastName;

			$candidate = Tracker\Candidate::create([
				'name'  => $first.' '.$last,
				'email' => lcfirst($first).'.'.lcfirst($last)."@gmail.com"
			]);

			$application = Tracker\Application::create([
				'candidate_id'        => $candidate->id,
				'requisition_number'  => $faker->randomNumber(3000, 3999),
				'preferred_team'      => $teams[array_rand($teams)],
				'preferred_title'     => $titles[array_rand($titles)],
				'referring_employee'  => $faker->name,
				'recruiting_contact'  => $faker->name,
				'preferred_location1' => $offices[array_rand($offices)],
				'preferred_location2' => $offices[array_rand($offices)],
				'preferred_location2' => $offices[array_rand($offices)],
				'network_path'		  => '//us_midwest/chiflc/random_folder/path/to/resume',
				'created_by'		  => $faker->randomNumber(1,6)
			]);

		}
	}
}