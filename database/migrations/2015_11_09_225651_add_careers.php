<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCareers extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('careers', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->string('title');
			$table->string('city');
			$table->string('state');
			$table->text('description');
			$table->text('requirements');
			$table->enum('status', ['Enabled', 'Deleted'])->default('Enabled');
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
		Schema::drop('careers');
	}
}
