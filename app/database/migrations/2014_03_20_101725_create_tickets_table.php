<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('alias', 45)->nullable();
			$table->string('title', 60)->nullable();
			$table->text('description')->nullable();
			$table->string('status', 20)->nullable();
			$table->string('file', 70)->nullable();
			$table->integer('client_id')->index('`fk_tickets_users1_idx`')->nullable();
			$table->integer('support_id')->index('`fk_tickets_users2_idx`')->nullable();
			$table->integer('category_id')->index('`fk_tickets_categories1_idx`');
			$table->integer('area_id')->index('`fk_tickets_areas1_idx`');
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
		Schema::drop('tickets');
	}

}
