<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('RolesTableSeeder');
		$this->call('TeamsTableSeeder');
		$this->call('OfficesTableSeeder');
		$this->call('AdminTableSeeder');

		if ( !isset($_SERVER['DB1_HOST']) )
		{
			$this->call('UsersTableSeeder');
			$this->call('ApplicationsTableSeeder');
		}
	}

}
