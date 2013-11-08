<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function($table) {
			$table->increments('id');
			$table->string('title');	
			$table->integer('type')->references('id')->on('event_types');
			$table->string('location');
			$table->timestamp('start');
			$table->timestamp('end');
			$table->text('description');
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
		Schema::drop('events');
	}

}