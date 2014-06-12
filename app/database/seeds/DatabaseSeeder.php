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

		if ( !isset($_SERVER['DB1_HOST']) )
		{
			$this->call('UsersTableSeeder');
			$this->call('ApplicationsTableSeeder');
		}

		$this->call('RolesTableSeeder');
		$this->call('AdminTableSeeder');
		$this->call('TeamsTableSeeder');
		$this->call('OfficesTableSeeder');
	}

}
