<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Invoice
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('type');     // It's possible this will turn into enum.  Not sure yet.  This will depict rental, sale, etc.
            // Ugh I don't know if these fields are necessary since they are tied to a user account, but it's possible for a guest account so....  I guess we can have people fill out orders for others too!
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('company_name');
            // End Ugh
            $table->enum('status', ['New', 'Modified', 'Reviewed', 'Finalized']);     // It's possible this will turn into enum.  Not sure yet.  This will depict sold, canceled, processing, etc
            $table->timestamps();
        });

        // Invoice items (What belongs on an invoice)
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->string('title');
            $table->string('type');
            $table->enum('status', ['Active', 'Modified', 'Deleted']);
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
        // Invoice items
        Schema::drop('invoice_items');

        // Invoice
        Schema::drop('invoices');
    }
}
