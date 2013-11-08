<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_types', function($table) {
			$table->increments('id');
			$table->string('type');
			$table->timestamps();
		)};
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_types');
	}

}