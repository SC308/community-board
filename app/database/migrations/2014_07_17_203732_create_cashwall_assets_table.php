<?php

use Illuminate\Database\Migrations\Migration;

class CreateCashwallAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cashwall_assets', function($table) {
			$table->increments('id');	//primary
			$table->integer('store_id')->references('id')->on('stores');
			$table->string('path');
			$table->string('size');
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
		Schema::drop('cashwall_assets');
	}
}