<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TicketsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
                $status=array('Abierto','Cerrado','Pendiente');

		foreach(range(1, 30) as $index)
		{
                        $area=Area::find(rand(1, 3));                        
			Ticket::create(array(
                            "alias"=> $area->alias.$index,
                            'title'=>$faker->sentence(2),
                            'description'=>$faker->sentence(6),
                            'status'=>$status[rand(0, 2)],
                            'file'=>'',
                            'client_id'=>rand(1, 10),
                            'support_id'=>rand(1, 30),
                            'category_id'=>rand(1, 3),                            
                            'area_id'=>rand(1, 10)                            
			));
		}
	}

}