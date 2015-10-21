<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use \Carbon\Carbon;
use Validator;

class VacationController extends AdminController
{
	public function index()
	{
		$objUser = \Auth::User();
		View::share('ActiveClass', 'Vacation Request');
		View::share('tVacationRequests', $objUser->Vacations);
		return view('admin.vacations.index');
	}

	public function edit($VacationID)
	{
		$objRequest = $VacationID == 'new' ? new \App\VacationRequest : \App\VacationRequest::findOrFail($VacationID);

		View::share('objRequest', $objRequest);
		return view('admin.vacations.edit');
	}
	public function store()
	{
		$Input = Request::all();

		$objVacation = $Input['VacationID'] ? \App\VacationRequest::findOrFail($Input['VacationID']) : new \App\VacationRequest();
		$VacationID = $Input['VacationID'] ?: 'new';

		$Validator = Validator::make($Input, [
			'From' => 'required|date',
			'To' => 'required|date',
		]);

		if ($Validator->fails())
			return redirect('/admin/vacations/edit/' . $VacationID)->withErrors($Validator);

		$objUser = \Auth::User();
		$objVacation->from = date('Y-m-d H:i:s', strtotime($Input['From']));
		$objVacation->from = date('Y-m-d H:i:s', strtotime($Input['To']));
		$objVacation->comments = $Input['Comments'];
		$objVacation->user_id = $objUser->id;
		$objVacation->save();

		return redirect('/admin/vacations');
	}
}
