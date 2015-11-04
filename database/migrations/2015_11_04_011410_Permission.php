<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// Invoice
		Schema::create('permissions', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->string('permission');
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
		// Invoice
		Schema::drop('permissions');
    }
}
