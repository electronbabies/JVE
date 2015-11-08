<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApprovedByVacation extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vacation_requests', function (Blueprint $table) {
			// Both user_ids in system
			$table->integer('approved_by');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vacation_requests', function (Blueprint $table) {
			$table->dropColumn('approved_by');
		});
	}
}
