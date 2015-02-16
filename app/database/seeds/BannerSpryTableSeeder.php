<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BannerSpryTableSeeder extends Seeder {

	public function run()
	{
		$bannerSpry2 = array('1' => '左側版位', '2' => '中上版位', '3' => '右側版位', '4' => '中版位', '5' => '中下版位');
		$array = array(
			'首頁' => array(1,2,3,4,5),
			'分類頁' => array(1,2,3,5),
			'搜尋頁' => array(1,2,3,5),
			'內文頁' => array(1,2,3,4,5),
		);
		$position = range('A','Z');
		$newArray = array();
		$begin = 0;
		foreach($array as $tmpArray => $value) {
			$data = array(
				'title' => $tmpArray,
				'position' => $position[$begin]
			);
			$begin++;
			array_push($newArray,$data);
		}

		DB::table('bannerSpry1')->insert($newArray);

		$begin = 0;
		$Spry2 = array();
		foreach($array as $tmpArray2 => $value) {
			foreach($value as $tmpValue) {
				foreach($bannerSpry2 as $spry2 => $spry2Name) {
					if($tmpValue == $spry2) {
						$data2 = array(
							'bannerSpry1_id' => $position[$begin],
							'title' => $spry2Name,
							'position' => $spry2
						);
						break;
					}
				}
				array_push($Spry2,$data2);
			}
			$begin++;
		}

		DB::table('bannerSpry2')->insert($Spry2);
	}

}