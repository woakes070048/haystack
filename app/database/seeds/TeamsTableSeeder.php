<?php

use Faker\Factory as Faker;

class TeamsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$feda  = [
			'name' 	     => 'Financial & Enterprise Data Analytics', 
			'abbrv'      => 'FEDA', 
			'practice'   => 'Forensic & Litigation Consulting',
			'created_by' => $faker->numberBetween(1,6)
		];

		$grip  = [
			'name'       => 'Global Risk & Investigations Practice', 
			'abbrv'      => 'GRIP', 
			'practice'   => 'Forensic & Litigation Consulting',
			'created_by' => $faker->numberBetween(1,6)

		];

		$das   = [
			'name' 	     => 'Dispute Advisory Services', 
			'abbrv'      => 'DAS', 
			'practice'   => 'Forensic & Litigation Consulting',
			'created_by' => $faker->numberBetween(1,6)
		];

		$faas  = [
			'name' 	     => 'Forensic Accounting & Advisory Services', 
			'abbrv'	     => 'FAAS', 
			'practice'   => 'Forensic & Litigation Consulting',
			'created_by' => $faker->numberBetween(1,6)
		];

		$trial = [
			'name' 	     => 'Trial Services', 
			'abbrv'      => 'Trial Services', 
			'practice'   => 'Forensic & Litigation Consulting',
			'created_by' => $faker->numberBetween(1,6)
		];

		$unassigned = [
			'name' 	     => 'Unassigned', 
			'abbrv'      => 'Unassigned', 
			'practice'   => 'Unassigned',
			'created_by' => $faker->numberBetween(1,6)

		];

		$teams = array($das, $grip, $faas, $feda, $trial, $unassigned);

		foreach ($teams as $team) 
		{
			Team::create($team);
		}
	}
}