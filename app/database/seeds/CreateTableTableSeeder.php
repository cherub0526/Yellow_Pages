<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CreateTableTableSeeder extends Seeder {

	public function run()
	{
		$array = Config::get('option.table');
		foreach($array as $tablename => $value) {
			Schema::create($tablename,function($table){
				$table->increments('id');
				$table->integer('backend_spry1_id')->unsigned();
				$table->integer('backend_spry2_id')->unsigned();
				$table->string('title');
				$table->string('images1')->default('no-img.jpg')->nullable();
				$table->string('images2')->default('no-img.jpg')->nullable();
				$table->string('images3')->default('no-img.jpg')->nullable();
				$table->string('images4')->default('no-img.jpg')->nullable();
				$table->string('tel')->nullable();
				$table->string('url')->nullable();
				$table->string('address');
				$table->text('description');
				$table->timestamps();

				$table->foreign('backend_spry1_id')->references('id')->on('backend_spry1');
				$table->foreign('backend_spry2_id')->references('id')->on('backend_spry2');
			});
		}
	}

}