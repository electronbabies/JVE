<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Carbon\Carbon;

class AdminController extends Controller
{
	// Currently determines dashboard menu on left that is selected.
	const ACTIVE_CLASS = 'Dashboard';

	public function __construct() {
		$objUser = \Auth::User();
		if(!$objUser || !$objUser->HasPermissions('Admin Panel'))
			Abort('404');

		View::share('objUser', $objUser);

		View::share('ActiveClass', static::ACTIVE_CLASS);

		// No parent constructor.  All is well.
	}
	public function index()
	{
		$tVacations = \App\VacationRequest::where('from', '>', Carbon::now())->get();
		//gPrint($tVacations);
		//die();
		return view('admin.index');
	}

	public function employees()
	{
		// This needs to change to a constant when / if we make an Employees Controller
		View::share('ActiveClass', 'Employees');
		$tEmployees = \App\User::where('role', \App\User::ROLE_EMPLOYEE)->get();
		View::share('tEmployees', $tEmployees);

		return view('admin.employees');
	}
}