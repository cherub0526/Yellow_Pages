<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$user = new User;
		$user->username = 'admin';
	        $user->email = 'admin@admin.com';
	        $user->password = 'admin';
	        $user->password_confirmation = 'admin';
	        $user->confirmation_code = md5(uniqid(mt_rand(), true));
	        $user->confirmed = 1;
	        $user->group = 'admin';

	        if(! $user->save()) {
	            Log::info('Unable to create user '.$user->email, (array)$user->errors());
	        }
	        else {
	            Log::info('Created user '.$user->email);
	        }
	}

}