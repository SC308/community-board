<?php

use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stores', function($table) {
			$table->increments('id');	//primary
			$table->string('store_number');
			$table->string('store_name');
			$table->integer('store_type')->references('id')->on('store_types');  //flagship, hero, fleet, etc
			$table->string('address');
			$table->string('city');
			$table->string('prov');
			$table->string('pc');			
			$table->string('district');
			$table->string('timezone_offset');
			$table->boolean('active');
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
		Schema::drop('stores');
	}

}