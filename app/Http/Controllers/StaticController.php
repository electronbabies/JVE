<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class StaticController extends Controller
{
	public function __construct() {

		$objUser = \Auth::User() ?: \App\User::GetGuestAccount();

		View::share('objUser', $objUser);
	}
	function index()
	{
		/*$Parser = new \Smalot\PdfParser\Parser();
		$PDF = $Parser->parseFile(public_path() . "/test_text.pdf");
		$Text = $PDF->getText();
		$Details = $PDF->getDetails();
		gPrint($Details);
		gPrint($PDF->getObjects());

		echo $Text;
	die();*/
		// TODO:  Ajax button to change display on front page status.  Right now forcing top power of 2 to top
		$tBlogPosts = \App\BlogPost::orderBy('updated_at', 'DESC')->get();

		// Not sure if I'm a fan of this, but it works for now
		if(count($tBlogPosts) % 2 != 0)
			$tBlogPosts->pop();

		View::share('tBlogPosts', $tBlogPosts);
		return view('index');
	}

	function service()
	{
		return view('service');
	}

	function parts()
	{
		return view('parts');
	}

	function sales()
	{
		return view('sales');
	}

	function rentals()
	{
		return view('rentals');
	}
	function gallery()
	{
		$tGalleryImages = \App\GalleryImage::all();
		View::share('tGalleryImages', $tGalleryImages);
		return view('gallery');
	}

	function gallery_view($ImageID)
	{
		$objImage = \App\GalleryImage::findorFail($ImageID);
		View::share('objImage', $objImage);
		return view('gallery_view');
	}
}
