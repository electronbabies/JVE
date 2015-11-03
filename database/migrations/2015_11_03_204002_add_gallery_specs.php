<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGallerySpecs extends Migration
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
			$table->string('mast_height');
			$table->string('make');
			$table->string('model');
			$table->string('serial');
			$table->string('warranty');
			$table->smallInteger('year');
			$table->double('price');
			$table->boolean('sold');
			$table->double('hours');
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
			// Both user_ids in system
			$table->dropColumn('mast_height');
			$table->dropColumn('make');
			$table->dropColumn('model');
			$table->dropColumn('serial');
			$table->dropColumn('warranty');
			$table->dropColumn('year');
			$table->dropColumn('price');
			$table->dropColumn('sold');
			$table->dropColumn('hours');
		});
    }
}
