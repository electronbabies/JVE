<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Storage;
use Log;

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
			$PDF = $Parser->parseFile(storage_path('app') . '/' . $File);
			preg_match('/INVOICE\s+NUMBER\s+(\w+)\s+DATE\s+\d{2}\/\d{2}\/\d{2}\s+(\d+)/', $PDF->getText(), $tMatches);
			$InvoiceNumber = trim($tMatches[1]);
			$AccountNumber = trim($tMatches[2]);

			if(!Storage::exists("{$PDFDir}/{$AccountNumber}")) {
				Storage::makeDirectory("{$PDFDir}/{$AccountNumber}");
			}

			$DestPath = "{$PDFDir}/{$AccountNumber}/" . uniqid() . '.pdf';
			$tPaths = explode('/', $DestPath);
			$DestFilename = array_pop($tPaths);
			$FileDir = implode('/', $tPaths);

			$tUsers = \App\User::where('account_number', '=', $AccountNumber)->get();
			if(count($tUsers) == 0) {
				Log::warning("No users with this account number.  Skipping...");
				continue;
			}

			if(count($tUsers) > 1) {
				Log::warning("Multiple users with the same account number.  Skipping...");
				continue;
			}


			$FoundInvoice = false;
			foreach ($tUsers as $objUser) {
				foreach ($objUser->invoices as $objInvoice) {
					if ($objInvoice->minitrac_invoice_number == $InvoiceNumber) {
						$FoundInvoice = true;
						if (Storage::move($File, $DestPath)) {
							$objInvoice->minitrac_filename = $DestFilename;
							$objInvoice->save();
						}
						break;
					}
				}
			}

			if(!$FoundInvoice)
				Log::warning("No invoice tied with invoice minitrac invoice # . $InvoiceNumber");

		}

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
*/

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
