<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVacationType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('vacation_requests', function (Blueprint $table) {
			$table->enum('type', ['Vacation', 'Holiday'])->default('Vacation');
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
			$table->dropColumn('type');
		});
    }
}
