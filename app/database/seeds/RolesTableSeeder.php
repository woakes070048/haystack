<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		Role::create(array('name' => 'admin'));
		Role::create(array('name' => 'moderator'));
		Role::create(array('name' => 'user'));
	}

}