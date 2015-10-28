<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssigneeInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('invoices', function (Blueprint $table) {
			// Both user_ids in system
			$table->integer('reviewed_by');
			$table->integer('assigned_to');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('invoices', function (Blueprint $table) {
			$table->dropColumn('reviewed_by');
			$table->dropColumn('assigned_to');
		});
    }
}
