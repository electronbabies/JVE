<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBlogTitleToBiggerString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('blog_posts', function (Blueprint $table) {
			// Both user_ids in system
			$table->string('title', 35000)->change();
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
			$table->string('title')->change();
		});
    }
}
