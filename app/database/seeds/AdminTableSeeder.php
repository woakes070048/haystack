<?php

class AdminTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Admin::create([

			]);
		}
	}

}