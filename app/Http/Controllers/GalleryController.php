<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Request;
use File;

class GalleryController extends AdminController
{
	// Currently determines dashboard menu on left that is selected.
	const ACTIVE_CLASS = 'Gallery';

	public function index()
	{
		if (!$this->objLoggedInUser->HasPermission('View/Gallery'))
			abort('404');

		$tGalleryImages = \App\GalleryImage::orderBy('updated_at', 'DESC')->get();
		View::share('tGalleryImages', $tGalleryImages);
		return view('admin.gallery.index');
	}

	/**
	 * Ajax delete
	 * @param $id
	 */
	public function delete($id)
	{
		if (!$this->objLoggedInUser->HasPermission("Edit/Gallery"))
			abort('404');

		if (\App\GalleryImage::destroy($id)) {
			exit('success');
		}
		exit('error');
	}

	public function edit($id)
	{
		if (!$this->objLoggedInUser->HasPermission("View/Gallery"))
			abort('404');

		$objImage = $id == 'new' ? new \App\GalleryImage : \App\GalleryImage::findOrFail($id);

		View::share('objImage', $objImage);
		return view('admin.gallery.edit');
	}

	public function create()
	{
		return view('admin.gallery.create');
	}

	public function store()
	{
		if(!$this->objLoggedInUser->HasPermission("Edit/Gallery"))
			abort('404');

		$File = Request::file('Image');

		$objImage = Request::get('PostID') ? \App\GalleryImage::findOrFail(Request::get('PostID')) : new \App\GalleryImage;

		if ($File) {
			$FileExtension = $File->getClientOriginalExtension();
			$FilePath = public_path() . '/img/gallery_images/' . uniqid() . ".{$FileExtension}";

			$tPaths = explode('/', $FilePath);
			$Filename = array_pop($tPaths);
			$FileDir = implode('/', $tPaths);

			if ($File->move($FileDir, $Filename)) {
				if ($objImage->image_filename) {
					// Remove old file
					File::delete(public_path() . '/img/gallery_images/' . $objImage->image_filename);
				}
				$objImage->image_filename = $Filename;
			}
		}

		$objImage->title = Request::get('title');
		$objImage->entry = Request::get('entry');
		$objImage->mast_height = Request::get('mast_height');
		$objImage->make = Request::get('make');
		$objImage->model = Request::get('model');
		$objImage->warranty = Request::get('warranty');
		$objImage->year = str_replace(',', '', Request::get('year'));
		$objImage->price = str_replace('$', '', Request::get('price'));
		$objImage->sold = Request::get('sold') == 'on' ? true : false;
		$objImage->hours = Request::get('hours');
		$objImage->serial = Request::get('serial');
		$objImage->save();

		$Path = Request::get('submit') == 'Save' ? '' : "/edit/{$objImage->id}";


		return redirect("/admin/gallery{$Path}")->with('FormResponse', ['ResponseType' => static::MESSAGE_SUCCESS, 'Content' => 'Gallery saved successfully']);
	}
}
