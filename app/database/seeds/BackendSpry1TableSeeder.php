<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BackendSpry1TableSeeder extends Seeder {

	public function run()
	{
		$array = Config::get('option.table');

		$insert_array = array();
		foreach($array as $key => $value) {
			$data = array(
				'title' => $value,
				'url' => 'backend/'.$key,
				'table_name' => $key
			);
			array_push($insert_array,$data);
		}

		DB::table('backend_spry1')->insert($insert_array);
	}

}