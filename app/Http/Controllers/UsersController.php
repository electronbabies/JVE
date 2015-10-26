<?php

namespace App\Http\Controllers;

use Request;
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

	public function store()
	{
		$Input = Request::all();
		$objUser = \App\User::findOrFail($Input['UserID']);

		$objUser->name = $Input['Name'];
		$objUser->email = $Input['Email'];
		$objUser->company_name = $Input['CompanyName'];
		$objUser->role = $Input['Role'];
		$objUser->phone = $Input['Phone'];
		$objUser->save();

		return redirect('/admin/users');

	}
}