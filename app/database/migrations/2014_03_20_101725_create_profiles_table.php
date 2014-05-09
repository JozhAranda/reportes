<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('name', 50)->nullable();
			$table->string('lastname', 60)->nullable();
			$table->string('image', 45)->nullable();
			$table->string('description', 600)->nullable();
			$table->integer('user_id')->index('`fk_profiles_Users1_idx`');
                        $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
