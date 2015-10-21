<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class UsersController extends AdminController
{
	const ACTIVE_CLASS = 'Users';
    public function edit($UserID)
	{
		$objUser = \App\User::find($UserID);
		$tInvoices = \App\Invoice::where('user_id', $UserID)->get();

		View::share('objUser', $objUser);
		View::share('tInvoices', $tInvoices);

		return view('admin.users.edit');
	}

	public function index()
	{
		$tUsers = \App\User::all();
		View::share('tUsers', $tUsers);
		return view('admin.users.index');
	}
}
