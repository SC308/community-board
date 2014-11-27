<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJumpstartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jumpstart', function($table) {
			$table->increments('id');
			$table->integer('store_id')->references('id')->on('stores');
			$table->string('champ_photo');
			$table->string('champ_name');
			$table->text('champ_bio');

			$table->integer('store_goal');	
			$table->integer('store_raised');	
			
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
		//
	}

}
