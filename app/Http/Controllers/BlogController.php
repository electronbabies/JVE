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
		if(\App\BlogPost::destroy($id)) {
			exit('success');
		}
		exit('error');
	}

	public function edit($id)
	{
		$objPost = $id == 'new' ? new \App\BlogPost : \App\BlogPost::findOrFail($id);

		View::share('objPost', $objPost);
		return view('admin.blog.edit');
	}

	public function create()
	{
		return view('admin.blog.create');
	}

	public function store()
	{
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
		$objPost->x_offset = $Input['x_offset'];
		$objPost->y_offset = $Input['y_offset'];
		$objPost->save();

		return redirect('/admin/blog')->with('FormResponse', ['ResponseType' => static::MESSAGE_SUCCESS, 'Content' => 'Blog saved successfully']);
	}
}
