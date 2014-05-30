<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PositionsTableSeeder extends Seeder {

	public function run()
	{
		$feda  = [
			'name' 	   => 'Financial & Enterprise Data Analytics', 
			'abbr' 	   => 'FEDA', 
			'practice' => 'Forensic & Litigation Consulting'
		];

		$grip  = [
			'name'     => 'Global Risk & Investigations Practice', 
			'abbr' 	   => 'GRIP', 
			'practice' => 'Forensic & Litigation Consulting'
		];

		$flc   = [
			'name' 	   => 'Forensic & Litigation Consulting', 
			'abbr' 	   => 'FLC', 
			'practice' => 'Forensic & Litigation Consulting'
		];

		$faas  = [
			'name' 	   => 'Forensic Accounting & Advisory Services', 
			'abbr'	   => 'FAAS', 
			'practice' => 'Forensic & Litigation Consulting'
		];

		$trial = [
			'name' 	   => 'Trial Services', 
			'abbr' 	   => 'Trial Services', 
			'practice' => 'Forensic & Litigation Consulting'
		];

		$teams = array($feda, $grip, $flc, $faas, $trial);

		foreach ($teams as $team) 
		{
			Team::create($team);
		}

	}

}