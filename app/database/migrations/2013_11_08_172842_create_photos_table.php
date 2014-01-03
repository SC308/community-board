<?php

use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function($table) {
			$table->increments('id');
			$table->string('path');
			$table->integer('collection')->references('id')->on('photo_collections');
			$table->string('title');
			$table->string('photographer_name');
			$table->timestamp('taken_on');
			$table->string('location');
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
		Schema::drop('photos');
	}

}