<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SupportTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(30, 60) as $index)
		{
			Support::create(array(
                            'user_id'=>$index
			));
		}
	}

}