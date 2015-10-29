<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderBlog extends Migration
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
			$table->smallInteger('order_by');
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
			$table->dropColumn('order_by');
		});
    }
}
