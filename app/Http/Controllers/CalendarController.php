<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalendarController extends AdminController
{
	// Currently determines dashboard menu on left that is selected.
	const ACTIVE_CLASS = 'Calendar';

	public function index()
	{
		return view('admin.calendar');
	}

	public function events()
	{
		$Input = Request::all();

		$tCalendarData = [];
		$tCalendarData['success'] = 1;

		// TODO:  Add from / to restraints
		$tVacations = \App\VacationRequest::all();
		foreach ($tVacations as $objVacation) {
			$tResult = [];
			$tResult['id'] = $objVacation->id;
			$PreText = $objVacation->status == \App\VacationRequest::STATUS_PENDING ? 'PENDING VACATION REQUEST' : 'APPROVED VACATION REQUEST';
			$tResult['title'] = "{$PreText}: {$objVacation->User->name}: {$objVacation->comments}";
			$tResult['url'] = "/admin/vacations/edit/{$objVacation->id}";
			$tResult['class'] = $objVacation->status == \App\VacationRequest::STATUS_PENDING ? 'event-warning' : 'event-success';
			$tResult['start'] = strtotime($objVacation->from) .'000';
			$tResult['end'] = strtotime($objVacation->to) . '000';
			$tCalendarData['result'][] = $tResult;
		}

		//$t

		echo json_encode($tCalendarData);
		die();
		return view('admin.calendar.events');
	}
}