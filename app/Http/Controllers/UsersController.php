<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class UsersController extends AdminController
{
	const ACTIVE_CLASS = 'Users';

	public function edit($UserID, $ReturnTo = '')
	{
		$objUser = \App\User::find($UserID);
		$tInvoices = \App\Invoice::where('user_id', $UserID)->get();

		View::share('objUser', $objUser);
		View::share('tInvoices', $tInvoices);
		View::share('ReturnTo', $ReturnTo);

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

		$tPermissions = Request::get('Permissions');

		$objUser->permissions()->delete();
		foreach($tPermissions as $Permission => $State) {
			if($State == 'on') {
				$NewPermission = new \App\Permission;
				$NewPermission->user_id = $objUser->id;
				$NewPermission->permission = $Permission;
				$NewPermission->save();
			}
		}
		$objUser->save();

		$Path = $Input['ReturnTo'] == 'Dashboard' ? '' : '/users';

		return redirect("/admin{$Path}")->with('FormResponse', ['ResponseType' => static::MESSAGE_SUCCESS, 'Content' => 'User saved successfully']);

	}
}