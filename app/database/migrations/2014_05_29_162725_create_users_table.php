<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('first_name');
			$table->string('last_name');

			$table->string('email')->unique();
			$table->string('password', 60);

			$table->integer('team_id');
			$table->integer('office_id');

			$table->string('title');

			$table->string('remember_token')->nullable();
			$table->string('last_login')->nullable();

			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
