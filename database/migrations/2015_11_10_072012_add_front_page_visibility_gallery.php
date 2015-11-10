<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFrontPageVisibilityGallery extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gallery', function (Blueprint $table) {
			// Both user_ids in system
			$table->string('front_page_visibility', 35000);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gallery', function (Blueprint $table) {
			$table->dropColumn('front_page_visibility');
		});
	}
}
