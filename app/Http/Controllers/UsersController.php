<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class UsersController extends AdminController
{
    public function edit($ClientID)
	{
		$objClient = \App\User::find($ClientID);
		$tInvoices = \App\Invoice::where('user_id', $ClientID)->get();

		View::share('objClient', $objClient);
		View::share('tInvoices', $tInvoices);

		return view('admin.users.edit');
	}
}
