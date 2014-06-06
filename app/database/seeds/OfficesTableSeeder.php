<?php

class OfficesTableSeeder extends Seeder {

	public function run()
	{
		$offices = ['Atlanta', 'Boston', 'Chicago', 'Denver', 'Hong Kong',
					'London', 'Los Angeles', 'San Francisco', 'Washington DC'];
					
		foreach ($offices as $office) {
			Office::create(array(
				'location' => $office
			));
		}		
	}

}