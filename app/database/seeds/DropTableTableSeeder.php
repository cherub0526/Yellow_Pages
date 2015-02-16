<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DropTableTableSeeder extends Seeder {

	public function run()
	{
		$array = Config::get('option.table');

		foreach($array as $tablename => $value) {
			Schema::drop($tablename);
		}
	}

}