<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Request;

class GalleryController extends AdminController
{
	// Currently determines dashboard menu on left that is selected.
	const ACTIVE_CLASS = 'Gallery';

	public function index()
	{
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
		if (\App\GalleryImage::destroy($id)) {
			exit('success');
		}
		exit('error');
	}

	public function edit($id)
	{
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
		$Input = Request::all();
		$File = Request::file('Image');

		$objImage = $Input['PostID'] ? \App\GalleryImage::findOrFail($Input['PostID']) : new \App\GalleryImage;

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

		$objImage->title = $Input['title'];
		$objImage->entry = $Input['entry'];
		$objImage->save();

		return redirect('/admin/gallery');
	}
}
