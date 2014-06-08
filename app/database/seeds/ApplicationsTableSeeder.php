<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ApplicationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		
		$offices = DB::table('offices')->count();
		$teams   = DB::table('teams')->count();		
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
				'requisition_number'  => $faker->numberBetween(3000, 3999),
				'preferred_team'      => $faker->numberBetween(1,$teams),
				'preferred_title'     => $titles[array_rand($titles)],
				'referring_employee'  => $faker->name,
				'recruiting_contact'  => $faker->name,
				'preferred_location1' => $faker->numberBetween(1,$offices),
				'preferred_location2' => $faker->numberBetween(1,$offices),
				'preferred_location2' => $faker->numberBetween(1,$offices),
				'network_path'		  => '//us_midwest/chiflc/random_folder/path/to/resume',
				'created_by'		  => $faker->numberBetween(1,6),
				'claimed_by'		  => $faker->numberBetween(0, 10)
			]);

		}
	}
}