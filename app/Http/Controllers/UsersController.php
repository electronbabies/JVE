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

		if(!$this->objLoggedInUser->HasPermission("View/{$objUser->role}"))
			abort('404');


		$tInvoices = \App\Invoice::perminvoices($this->objLoggedInUser)->where('user_id', $UserID)->get();

		View::share('objUser', $objUser);
		View::share('tInvoices', $tInvoices);
		View::share('ReturnTo', $ReturnTo);

		return view('admin.users.edit');
	}

	public function index()
	{
		if(!$this->objLoggedInUser->HasPermission('View/Users'))
			abort('404');

		$tUsers = \App\User::permusers($this->objLoggedInUser)->get();

		View::share('tUsers', $tUsers);
		return view('admin.users.index');
	}

	public function store()
	{
		$Input = Request::all();

		$objUser = \App\User::findOrFail($Input['UserID']);

		if (!$this->objLoggedInUser->HasPermission("Edit/{$objUser->role}"))
			abort('404');

		$objUser->name = Request::get('Name');
		$objUser->email = Request::get('Email');
		$objUser->company_name = Request::get('CompanyName');
		$objUser->role = Request::get('Role');
		$objUser->phone = Request::get('Phone');
		$objUser->account_number = Request::get('AccountNumber');

		$tPermissions = Request::get('Permissions');

		$objUser->permissions()->delete();
		foreach((array)$tPermissions as $Permission => $State) {
			if($State == 'on') {
				$NewPermission = new \App\Permission;
				$NewPermission->user_id = $objUser->id;
				$NewPermission->permission = $Permission;
				$NewPermission->save();
			}
		}
		$objUser->save();

		if(Request::get('Submit') == 'Save')
			$Path = $Input['ReturnTo'] == 'Dashboard' ? '' : '/users';
		else
			$Path = "/users/edit/{$objUser->id}";

		return redirect("/admin{$Path}")->with('FormResponse', ['ResponseType' => static::MESSAGE_SUCCESS, 'Content' => 'User saved successfully']);
	}
}