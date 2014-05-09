<?php

// Composer: "fzaninotto/faker": "v1.3.0"
#use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		#$faker = Faker::create();

		Category::create(array('title'=>'Duda'));
		Category::create(array('title'=>'Problema'));
		Category::create(array('title'=>'Sugerencia'));
	}

}