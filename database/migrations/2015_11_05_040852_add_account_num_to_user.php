<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccountNumToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			// Both user_ids in system
			$table->mediumInteger('account_number');
		});

		Schema::table('invoices', function (Blueprint $table) {
			// Both user_ids in system
			$table->string('minitrac_filename');
			$table->string('minitrac_invoice_number');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('account_number');
		});

		Schema::table('invoices', function (Blueprint $table) {
			// Both user_ids in system
			$table->dropColumn('minitrac_filename');
			$table->dropColumn('minitrac_invoice_number');
		});
	}
}
