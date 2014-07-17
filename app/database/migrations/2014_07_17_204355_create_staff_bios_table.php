<?php

use Illuminate\Database\Migrations\Migration;

class CreateStaffBiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff_bios', function($table) {
			$table->increments('id');
			$table->integer('store_id')->references('id')->on('stores');
			$table->string('first');
			$table->string('last');
			$table->string('position');
			$table->string('favorite_sport');			
			$table->string('photo');
			$table->text('bio');
			$table->integer('cash_wall');
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
		Schema::drop('staff_bios');
	}

}