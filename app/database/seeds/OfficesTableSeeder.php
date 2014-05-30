<?php

class OfficesTableSeeder extends Seeder {

	public function run()
	{
		$offices = ['Chicago', 'Washington DC', 'Los Angeles', 'San Francisco', 
					'Boston', 'London', 'Atlanta', 'Denver', 'Hong Kong'];

		foreach ($offices as $office) {
			Office::create(array(
				'location' => $office
			));
		}		
	}

}