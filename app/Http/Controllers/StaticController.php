<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Storage;

class StaticController extends Controller
{
	public function __construct() {

		$objUser = \Auth::User() ?: \App\User::GetGuestAccount();

		View::share('PageTitle', 'Welcome');
		View::share('objUser', $objUser);
	}

	function index()
	{
		/*$PDFDir = 'minitrac_invoices';

		$Files = Storage::Files($PDFDir);
		gPrint($Files);

		$Parser = new \Smalot\PdfParser\Parser();
		foreach($Files as $File) {
			$PDF = $Parser->parseFile(storage_path('app') . '/' .$File);
			preg_match('/DATE\s+\d{2}\/\d{2}\/\d{2}\s+(\d+)/', $PDF->getText(), $tMatches);
			$AccountNumber = $tMatches[1];
			if(!Storage::exists("{$PDFDir}/{$AccountNumber}")) {
				Storage::makeDirectory("{$PDFDir}/{$AccountNumber}");
			}
			echo $AccountNumber;
			die();
		}





		echo $AccountNumber;
		die();*/

		// TODO:  Ajax button to change display on front page status.  Right now forcing top power of 2 to top
		$tBlogPosts = \App\BlogPost::where('display_on_front_page', true)->orderBy('order_by', 'ASC')->get();

		View::share('tBlogPosts', $tBlogPosts);
		return view('index');
	}

	function service()
	{
		View::share('PageTitle', 'Service');
		$tGalleryImages = \App\GalleryImage::all();
		View::share('tGalleryImages', $tGalleryImages);
		return view('service');
	}

	function parts()
	{
		View::share('PageTitle', 'Parts');
		$tGalleryImages = \App\GalleryImage::all();
		View::share('tGalleryImages', $tGalleryImages);
		return view('parts');
	}

	function sales()
	{
		View::share('PageTitle', 'Sales');
		$tGalleryImages = \App\GalleryImage::all();
		View::share('tGalleryImages', $tGalleryImages);
		return view('sales');
	}

	function rentals()
	{
		View::share('PageTitle', 'Rentals');
		$tGalleryImages = \App\GalleryImage::all();
		View::share('tGalleryImages', $tGalleryImages);
		return view('rentals');
	}
	function gallery()
	{
		View::share('PageTitle', 'Gallery');
		$tGalleryImages = \App\GalleryImage::all();
		View::share('tGalleryImages', $tGalleryImages);
		return view('gallery');
	}

	function gallery_view($ImageID)
	{
		View::share('PageTitle', 'Gallery');
		$tGalleryImages = \App\GalleryImage::all();
		$objImage = \App\GalleryImage::findorFail($ImageID);

		View::share('tGalleryImages', $tGalleryImages);
		View::share('objImage', $objImage);
		return view('gallery_view');
	}
}
