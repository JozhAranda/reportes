<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('RolesTableSeeder');
		 $this->call('CategoriesTableSeeder');
		 $this->call('AreasTableSeeder');
		 $this->call('UsersTableSeeder');
		 $this->call('ProfilesTableSeeder');		 
		 $this->call('TicketsTableSeeder');
	}

}