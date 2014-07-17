<?php

use Illuminate\Database\Migrations\Migration;

class CreateStoreTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_types', function($table) {
			$table->increments('id');	//primary
			$table->string('store_type');
			$table->text('store_desc');
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
		Schema::drop('store_types');
	}

}