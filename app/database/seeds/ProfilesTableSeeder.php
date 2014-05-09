<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 60) as $index)
		{
			Profile::create(array(
                            'name'=>$faker->firstName,
                            'lastname'=>$faker->lastName,
                            'description'=>$faker->text($maxNbChars = 200),
                            'user_id'=>$index
			));
		}
	}

}