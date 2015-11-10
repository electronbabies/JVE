<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class CareerController extends AdminController
{
	const ACTIVE_CLASS = 'Careers';
    public function index()
	{
		$tCareers = \App\Career::where('status', \App\Career::STATUS_ENABLED)->get();

		View::share('tCareers', $tCareers);
		return view('admin.careers.index');
	}

	public function store()
	{
		if (!$this->objLoggedInUser->HasPermission('Edit/Blog'))
			abort('404');

		$objCareer = Request::get('CareerID') ? \App\Career::findOrFail(Request::get('CareerID')) : new \App\Career;

		$objCareer->title = Request::get('title');
		$objCareer->description = Request::get('description');
		$objCareer->requirements = Request::get('requirements');
		$objCareer->city = Request::get('city');
		$objCareer->state = Request::get('state');

		$objCareer->user_id = $this->objLoggedInUser->id;

		$objCareer->save();

		$Path = Request::get('Submit') == 'Save' ? '' : "/edit/{$objCareer->id}";

		return redirect("/admin/careers{$Path}")->with('FormResponse', ['ResponseType' => static::MESSAGE_SUCCESS, 'Content' => 'Career saved successfully']);
	}

	public function edit($id)
	{
		if (!$this->objLoggedInUser->HasPermission('View/Careers') || ($id == 'new' && !$this->objLoggedInUser->HasPermission('Edit/Careers')))
			abort('404');

		$objCareer = $id == 'new' ? new \App\Career : \App\Career::findOrFail($id);

		View::share('objCareer', $objCareer);

		return view('admin.careers.edit');
	}

	public function delete($id)
	{
		$objCareer = \App\Career::findOrFail($id);

		if (!$this->objLoggedInUser->HasPermission("Edit/Careers"))
			abort('404');

		$objCareer->status = \App\Career::STATUS_DELETED;
		if ($objCareer->save()) {
			exit('success');
		}
		exit('error');
	}
}
