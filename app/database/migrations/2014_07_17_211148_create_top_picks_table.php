<?php

use Illuminate\Database\Migrations\Migration;

class CreateTopPicksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('top_picks', function($table) {
			$table->increments('id');
			$table->integer('store_id')->references('id')->on('stores');
			$table->string('path');
			$table->integer('publish');
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
		Schema::drop('top_picks');
	}

}