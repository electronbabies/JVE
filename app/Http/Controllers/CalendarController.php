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
		$tCalendarData = [];
		$tCalendarData['success'] = 1;

		// Calendar has no time zone conversion AND has no concept of daylight savings time. :(
		$Offset = 6 * 60 * 60 * 1000;

		// TODO:  Add from / to restraints
		$tVacations = \App\VacationRequest::all();
		foreach ($tVacations as $objVacation) {
			$tResult = [];
			$tResult['id'] = $objVacation->id;

			if($objVacation->type == \App\VacationRequest::TYPE_HOLIDAY) {
				$tResult['class'] = 'event-special';
				$tResult['url'] = "/admin/vacations/holidays/edit/{$objVacation->id}";
				$tResult['title'] = "HOLIDAY: {$objVacation->comments}";
			}
			else {
				if($objVacation->status == \App\VacationRequest::STATUS_DENIED)
					continue;

				$tResult['class'] = $objVacation->status == \App\VacationRequest::STATUS_PENDING ? 'event-warning' : 'event-success';
				$PreText = $objVacation->status == \App\VacationRequest::STATUS_PENDING ? 'PENDING VACATION REQUEST' : 'APPROVED VACATION REQUEST';
				$tResult['url'] = "/admin/vacations/edit/{$objVacation->id}";
				$tResult['title'] = "{$PreText}: {$objVacation->User->name}: {$objVacation->comments}";
			}

			$tResult['start'] = (int)strtotime($objVacation->from) .'000' + $Offset;
			$tResult['end'] = (int)strtotime($objVacation->to) . '000' + $Offset;

			$tCalendarData['result'][] = $tResult;
		}

		$tClients = \App\User::clients()->get();
		foreach($tClients as $objClient) {
			$tResult = [];
			$tResult['id'] = $objClient->id;
			$tResult['class'] = 'event-info';
			$tResult['url'] = "/admin/users/edit/{$objClient->id}";
			$tResult['title'] = "New Client Signup:  {$objClient->name}";

			$tResult['start'] = (int)strtotime($objClient->created_at) . '000' + $Offset;
			$tResult['end'] = (int)strtotime($objClient->created_at) . '000' + $Offset;

			$tCalendarData['result'][] = $tResult;
		}

		$tBlogPosts = \App\BlogPost::all();
		foreach($tBlogPosts as $objPost) {
			$tResult = [];
			$tResult['id'] = $objPost->id;
			$tResult['class'] = 'event-info';
			$tResult['url'] = "/admin/blog/edit/{$objPost->id}";
			$tResult['title'] = "New Blog Post:  {$objPost->title}";

			$tResult['start'] = (int)strtotime($objPost->created_at) . '000' + $Offset;
			$tResult['end'] = (int)strtotime($objPost->created_at) . '000' + $Offset;

			$tCalendarData['result'][] = $tResult;
		}

		echo json_encode($tCalendarData);
		die();
	}
}