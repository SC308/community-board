<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');	//primary
			$table->integer('store_id')->references('id')->on('stores');
			$table->string('first');
			$table->string('last');
			$table->string('email');
			$table->string('password');
			$table->integer('role')->references('id')->on('user_roles'); 
			$table->timestamp('last_seen');
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
		Schema::drop('users');
	}

}