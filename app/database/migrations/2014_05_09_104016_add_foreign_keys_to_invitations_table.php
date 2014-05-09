<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToInvitationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invitations', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
		Schema::table('invitations', function(Blueprint $table) {
			$table->dropForeign('messages_role_id_foreign');
			$table->dropForeign('messages_area_id_foreign');
		});
	}

}
