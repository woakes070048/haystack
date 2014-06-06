<?php

class TeamsTableSeeder extends Seeder {

	public function run()
	{
		$feda  = [
			'name' 	   => 'Financial & Enterprise Data Analytics', 
			'abbrv'    => 'FEDA', 
			'practice' => 'Forensic & Litigation Consulting'
		];

		$grip  = [
			'name'     => 'Global Risk & Investigations Practice', 
			'abbrv'    => 'GRIP', 
			'practice' => 'Forensic & Litigation Consulting'
		];

		$das   = [
			'name' 	   => 'Dispute Advisory Services', 
			'abbrv'    => 'DAS', 
			'practice' => 'Forensic & Litigation Consulting'
		];

		$faas  = [
			'name' 	   => 'Forensic Accounting & Advisory Services', 
			'abbrv'	   => 'FAAS', 
			'practice' => 'Forensic & Litigation Consulting'
		];

		$trial = [
			'name' 	   => 'Trial Services', 
			'abbrv'    => 'Trial Services', 
			'practice' => 'Forensic & Litigation Consulting'
		];

		$teams = array($das, $grip, $faas, $feda, $trial);

		foreach ($teams as $team) 
		{
			Team::create($team);
		}
	}
}