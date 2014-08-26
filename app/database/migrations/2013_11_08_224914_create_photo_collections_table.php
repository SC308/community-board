<?php

use Illuminate\Database\Migrations\Migration;

class CreatePhotoCollectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photo_collections', function($table) {
			$table->increments('id');
			$table->integer('store_id')->references('id')->on('stores');			
			$table->string('name');
			$table->string('location');
			$table->timestamp('collection_date');
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
		Schema::drop('photo_collections');
	}

}