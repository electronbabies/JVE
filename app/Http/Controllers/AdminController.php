<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Carbon\Carbon;
use Session;

class AdminController extends Controller
{
	// Currently determines dashboard menu on left that is selected.
	const ACTIVE_CLASS = 'Dashboard';

	public function __construct() {
		$this->objLoggedInUser = \Auth::User();
		if(!$this->objLoggedInUser || !$this->objLoggedInUser->HasPermission('Admin/View'))
			Abort('404');

		View::share('objLoggedInUser', $this->objLoggedInUser);
		View::share('ActiveClass', static::ACTIVE_CLASS);

		$FormResponse = Session::get('FormResponse') ? Session::get('FormResponse') : [];
		View::share('FormResponse', $FormResponse);

		// No parent constructor.  All is well.
	}

	public function index()
	{
		$tUpcomingVacations = \App\VacationRequest::upcomingvacations()->get();
		$tUpcomingHolidays = \App\VacationRequest::upcomingholidays()->get();
		$tVacationRequests = \App\VacationRequest::requests()->get();
		$tNewInvoices = \App\Invoice::unhandled()->get();
		$tActiveGalleryImages = \App\GalleryImage::all();
		$tAllClients = \App\User::clients()->get();
		$BlogCount = \App\BlogPost::count();
		$tNewClients = \App\User::newclients()->get();

		View::share('tUpcomingVacations', $tUpcomingVacations);
		View::share('tUpcomingHolidays', $tUpcomingHolidays);
		View::share('tVacationRequests', $tVacationRequests);
		View::share('tNewInvoices', $tNewInvoices);
		View::share('tActiveGalleryImages', $tActiveGalleryImages);
		View::share('tAllClients', $tAllClients);
		View::share('BlogCount', $BlogCount);
		View::share('tNewClients', $tNewClients);

		return view('admin.index');
	}
}