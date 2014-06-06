<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrackerApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('candidate_id');

			$table->integer('requisition_number');
			
			$table->string('preferred_title');
			$table->string('preferred_team');

			$table->string('preferred_location1');
			$table->string('preferred_location2');
			$table->string('preferred_location3');

			$table->string('referring_employee');
			$table->string('recruiting_contact');

			$table->string('network_path');

			$table->integer('claimed_by');
			$table->timestamp('claimed_at');

			$table->integer('closed_by');
			$table->timestamp('closed_at');

			$table->integer('created_by');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('applications');
	}

}
