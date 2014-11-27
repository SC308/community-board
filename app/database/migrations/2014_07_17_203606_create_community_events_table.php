<?php

use Illuminate\Database\Migrations\Migration;

class CreateCommunityEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('community_events', function($table) {
			$table->increments('id');
			$table->integer('store_id')->references('id')->on('stores');
			$table->string('title');	
			$table->integer('type')->references('id')->on('event_types');
			$table->string('location');
			$table->timestamp('start');
			$table->timestamp('end');
			$table->integer('hilite');
			$table->text('description');
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
		Schema::drop('community_events');
	}


}