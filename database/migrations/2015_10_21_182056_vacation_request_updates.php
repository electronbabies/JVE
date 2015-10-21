<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VacationRequestUpdates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	DB::statement('ALTER TABLE vacation_requests CHANGE COLUMN comments comments text NOT NULL');
		Schema::table('vacation_requests', function (Blueprint $table) {
			$table->enum('status', ['Approved', 'Denied', 'Pending', 'Completed'])->default('Pending');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		DB::statement('ALTER TABLE vacation_requests CHANGE COLUMN comments comments varchar(255) NOT NULL');
		Schema::table('vacation_requests', function (Blueprint $table) {
			$table->dropColumn('status');
		});
    }
}
