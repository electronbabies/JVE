<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBlogImageOffset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('blog_posts', function (Blueprint $table) {
			$table->dropColumn('x_offset');
			$table->dropColumn('y_offset');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('blog_posts', function (Blueprint $table) {
			// Both user_ids in system
			$table->smallInteger('x_offset');
			$table->smallInteger('y_offset');
		});
    }
}
