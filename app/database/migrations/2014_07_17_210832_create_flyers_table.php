<?php

use Illuminate\Database\Migrations\Migration;

class CreateFlyersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flyers', function($table) {
			$table->increments('id');
			$table->integer('store_id')->references('id')->on('stores');
			$table->string('path');
			$table->integer('order');
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
		Schema::drop('flyers');
	}


}