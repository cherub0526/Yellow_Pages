<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllStoriesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stories',function($table){
			$table->increments('id');
			$table->integer('store_id');
			$table->integer('backend_spry1_id')->unsigned();
			$table->integer('backend_spry2_id')->unsigned();
			$table->string('title');
			$table->string('url');
			$table->string('images1')->nullable();
			$table->string('images2')->nullable();
			$table->string('images3')->nullable();
			$table->string('images4')->nullable();
			$table->string('tel')->nullable();
			$table->string('address');
			$table->text('description');
			$table->timestamps();

			$table->foreign('backend_spry1_id')->references('id')->on('backend_spry1');
			$table->foreign('backend_spry2_id')->references('id')->on('backend_spry2');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stories');
	}

}
