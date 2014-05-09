<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('support_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tickets', function(Blueprint $table) {
            $table->dropForeign('tickets_category_id_foreign');	
            $table->dropForeign('tickets_client_id_foreign');
			$table->dropForeign('tickets_support_id_foreign');			
			$table->dropForeign('tickets_area_id_foreign');			
		});
	}

}
