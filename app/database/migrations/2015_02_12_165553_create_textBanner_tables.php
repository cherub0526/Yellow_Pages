<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextBannerTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('textBanner',function($table){
			$table->increments('id');
			$table->string('title');
			$table->string('company');
			$table->date('startDate')->nullable();
			$table->date('endDate')->nullable();
			$table->integer('countDate')->nullable();
			$table->string('url')->nullable();
			$table->string('address')->nullable();
			$table->text('description')->nullable();
			$table->string('images1')->default('no-img.jpg')->nullable();
			$table->string('images2')->default('no-img.jpg')->nullable();
			$table->string('images3')->default('no-img.jpg')->nullable();
			$table->string('images4')->default('no-img.jpg')->nullable();
			$table->integer('sort')->default(100)->nullable();
			$table->text('tags');
			$table->integer('hits')->default(0)->nullable();
			$table->date('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('textBanner');
	}

}
