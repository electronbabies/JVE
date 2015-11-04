<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Config;

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

		// Calendar has no time zone conversion AND has no concept of daylight savings time. :(
		$Offset = (6) * 60 * 60 * 1000;

		foreach ($tVacations as $objVacation) {
			$tResult = [];
			$tResult['id'] = $objVacation->id;

			if($objVacation->type == \App\VacationRequest::TYPE_HOLIDAY) {
				$tResult['class'] = 'event-special';
				$tResult['url'] = "/admin/vacations/holidays/edit/{$objVacation->id}";
				$tResult['title'] = "HOLIDAY: {$objVacation->comments}";
			}
			else {
				$tResult['class'] = $objVacation->status == \App\VacationRequest::STATUS_PENDING ? 'event-warning' : 'event-success';
				$PreText = $objVacation->status == \App\VacationRequest::STATUS_PENDING ? 'PENDING VACATION REQUEST' : 'APPROVED VACATION REQUEST';
				$tResult['url'] = "/admin/vacations/edit/{$objVacation->id}";
				$tResult['title'] = "{$PreText}: {$objVacation->User->name}: {$objVacation->comments}";
			}

			$tResult['start'] = (int)strtotime($objVacation->from . " UTC") .'000' + $Offset;
			$tResult['end'] = (int)strtotime($objVacation->to . " UTC") . '000' + $Offset;

			$tCalendarData['result'][] = $tResult;
		}

		echo json_encode($tCalendarData);
		die();
		return view('admin.calendar.events');
	}
}