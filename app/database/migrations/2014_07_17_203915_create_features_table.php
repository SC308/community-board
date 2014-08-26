<?php

use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('features', function($table) {
			$table->increments('id');
			$table->integer('store_id')->references('id')->on('stores');
			$table->integer('published');			
			$table->string('path');	
			$table->string('title');	
			$table->text('content');				
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
		Schema::drop('features');
	}

}