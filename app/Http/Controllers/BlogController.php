<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Storage;
use File;

class BlogController extends AdminController
{
	// Currently determines dashboard menu on left that is selected.
	const ACTIVE_CLASS = 'Blog';

	public function index()
	{
		if (!$this->objLoggedInUser->HasPermission('View/Blog'))
			abort('404');

		$tBlogPosts = \App\BlogPost::orderBy('created_at', 'DESC')->get();
		View::share('tBlogPosts', $tBlogPosts);
		return view('admin.blog.index');
	}

	/**
	 * Ajax delete
	 * @param $id
	 */
	public function front_page_order($id, $order_by)
	{
		if (!$this->objLoggedInUser->HasPermission('Edit/Blog'))
			abort('404');

		if(!is_numeric($order_by))
			exit('error');

		$objPost = \App\BlogPost::findOrFail($id);
		$objPost->order_by = $order_by;

		if ($objPost->save()) {
			exit('success');
		}
		exit('error');
	}

	/**
	 * Ajax delete
	 * @param $id
	 */
	public function front_page_check($id)
	{
		if (!$this->objLoggedInUser->HasPermission('Edit/Blog'))
			abort('404');

		$objPost = \App\BlogPost::findOrFail($id);
		$objPost->display_on_front_page = !$objPost->display_on_front_page;

		if ($objPost->save()) {
			exit('success');
		}
		exit('error');
	}

	/**
	 * Ajax delete
	 * @param $id
	 */
	public function delete($id)
	{
		if (!$this->objLoggedInUser->HasPermission('Edit/Blog'))
			abort('404');

		if(\App\BlogPost::destroy($id)) {
			exit('success');
		}
		exit('error');
	}

	public function edit($id)
	{
		if (!$this->objLoggedInUser->HasPermission('View/Blog') || ($id == 'new' && !$this->objLoggedInUser->HasPermission('Edit/Blog')))
			abort('404');

		$objPost = $id == 'new' ? new \App\BlogPost : \App\BlogPost::findOrFail($id);

		View::share('objPost', $objPost);
		return view('admin.blog.edit');
	}

	public function store()
	{
		if (!$this->objLoggedInUser->HasPermission('Edit/Blog'))
			abort('404');

		$Input = Request::all();
		$File = Request::file('Image');

		$objPost = $Input['PostID'] ? \App\BlogPost::findOrFail($Input['PostID']) : new \App\BlogPost;

		if($File) {
			$FileExtension = $File->getClientOriginalExtension();
			$FilePath = public_path().'/img/blog_images/' . uniqid() . ".{$FileExtension}";

			$tPaths = explode('/', $FilePath);
			$Filename = array_pop($tPaths);
			$FileDir = implode('/', $tPaths);

			if($File->move($FileDir, $Filename)) {
				if($objPost->image_filename) {
					// Remove old file
					File::delete(public_path() . '/img/blog_images/' . $objPost->image_filename);
				}
				$objPost->image_filename = $Filename;
			}
		}

		$objPost->title = $Input['title'];
		$objPost->entry = $Input['entry'];
		$objPost->save();

		$Path = Request::get('submit') == 'Save' ? '' : "/edit/{$objPost->id}";

		return redirect("/admin/blog{$Path}")->with('FormResponse', ['ResponseType' => static::MESSAGE_SUCCESS, 'Content' => 'Blog saved successfully']);
	}
}
