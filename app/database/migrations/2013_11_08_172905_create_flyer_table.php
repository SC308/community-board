<?php

use Illuminate\Database\Migrations\Migration;

class CreateFlyerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flyer', function($table) {
			$table->increments('id');
			$table->string('flyer');
			$table->timestamp('flyer_date');
			$table->string('featured1');
			$table->string('featured2');			
			$table->string('featured3');
			$table->string('featured4');						
			$table->string('featured5');
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
		Schema::drop('flyer');
	}

}