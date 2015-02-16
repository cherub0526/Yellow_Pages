<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackedSpry2Tables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('backend_spry2',function($table){
			$table->engine = 'InnoDB';

			$table->increments('id')->unique();
			$table->integer('backend_spry1_id')->unsigned();
			$table->string('title');
			$table->string('url');
			$table->string('table_name')->nullable();
			$table->text('option')->nullable();

			$table->foreign('backend_spry1_id')->references('id')->on('backend_spry1');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('backend_spry2');
	}

}
