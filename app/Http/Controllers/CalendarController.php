<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
		// TODO:  Probably final project to determine what goes here.  This is gonna be fun!
		return view('admin.calendar.events');
	}
}