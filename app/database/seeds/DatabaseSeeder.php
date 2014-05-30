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
		$this->call('AdminTableSeeder');
		$this->call('TeamsTableSeeder');
		$this->call('OfficesTableSeeder');
		$this->call('UsersTableSeeder');
	}

}
