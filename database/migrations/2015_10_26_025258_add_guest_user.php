<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGuestUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// Enum is such a pain column to work with.
		DB::statement("ALTER TABLE users CHANGE COLUMN role role ENUM('Admin', 'Employee', 'Client', 'Guest') DEFAULT 'Client'");
		$objGuestUser = \App\User::where('email', '=', 'guest@jvequipment.com')->first();
		$objGuestUser->role = \App\User::ROLE_GUEST;
		$objGuestUser->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		$objGuestUser = \App\User::where('role', '=', 'Guest')->first();
		$objGuestUser->role = \App\User::ROLE_CLIENT;
		$objGuestUser->save();

		DB::statement("ALTER TABLE users CHANGE COLUMN role role ENUM('Admin', 'Employee', 'Client') DEFAULT 'Client'");
    }
}
