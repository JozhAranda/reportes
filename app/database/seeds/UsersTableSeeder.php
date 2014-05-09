<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 60) as $index)
		{
			User::create(array('email'=>$faker->email,
                            'password'=>  Hash::make('123456'),
                            'status'=>1,
                            'role_id'=> rand(2,3)));
		}
	}

}