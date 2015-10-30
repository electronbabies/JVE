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

	public function edit($VacationID, $ReturnTo = '')
	{
		$objRequest = $VacationID == 'new' ? new \App\VacationRequest : \App\VacationRequest::findOrFail($VacationID);


		View::share('ReturnTo', $ReturnTo);

		View::share('objRequest', $objRequest);
		return view('admin.vacations.edit');
	}
	public function store()
	{
		// TODO:  Add From < To date validation
		// TODO:  Should only be able to save in certain circumstances?
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
		$objVacation->to = date('Y-m-d H:i:s', strtotime($Input['To']));
		$objVacation->comments = $Input['Comments'];

		// Set once from person creating it, and that is the only time it can be edited.
		if(!$objVacation->id)
			$objVacation->user_id = $objUser->id;

		// Only admins can change status
		if($objUser->role == \App\User::ROLE_ADMIN)
			$objVacation->status = $Input['Status'] ?: \App\VacationRequest::STATUS_PENDING;

		$objVacation->save();

		$Path = $Input['ReturnTo'] == 'Dashboard' ? '' : '/vacations';

		return redirect("/admin{$Path}")->with('FormResponse', ['ResponseType' => static::MESSAGE_SUCCESS, 'Content' => 'Vacation saved successfully']);



	}
}
