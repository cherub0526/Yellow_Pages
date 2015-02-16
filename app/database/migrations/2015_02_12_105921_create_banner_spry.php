<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerSpry extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bannerSpry1',function($table){
			$table->increments('id');
			$table->string('title');
			$table->string('position');
		});

		Schema::create('bannerSpry2',function($table){
			$table->increments('id');
			$table->string('bannerSpry1_id');
			$table->string('position');
			$table->string('title');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bannerSpry1');
		Schema::drop('bannerSpry2');
	}

}
