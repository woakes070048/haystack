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

			$claimed_by = $faker->numberBetween(0, 10);

			if ( $claimed_by != 0 ) {
				$claimed_at = Carbon::now();
			} else {
				$claimed_at = '0000-00-00 00:00:00';
			}

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
				'claimed_by'		  => $claimed_by,
				'claimed_at'		  => $claimed_at
			]);

			Tracker\Comment::create(array(
				'user_id' 		 => 1,
				'application_id' => $application->id,
				'message' 	     => $faker->sentence($nbWords = 20)
			));

			for ($e=0; $e < $faker->numberBetween(3, 7) ; $e++) { 
			 	Tracker\Comment::create(array(
			 		'user_id' 		 => $faker->numberBetween(1,15),
			 		'application_id' => $application->id,
			 		'message' 	     => $faker->sentence($nbWords = 20)
			 	));
			}
		}
	}
}