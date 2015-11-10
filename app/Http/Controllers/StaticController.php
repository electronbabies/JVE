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

		View::share('CareerCount', \App\Career::where('status', \App\Career::STATUS_ENABLED)->count());
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
		View::share('PageTitle', 'Home');
		View::share('PageTitleSlug', 'home');
		// Header Properties
		View::share('headline', 'Welcome to JVEquipment');
		View::share('subhead', 'The forklift dealership without borders');
		return view('index');
	}

	function careers()
	{
		$tCareers = \App\Career::where('status', \App\Career::STATUS_ENABLED)->get();
		View::share('tCareers', $tCareers);
		return view('careers');
	}

	function view_career($id)
	{
		$objCareer = \App\Career::findOrFail($id);
		View::share('objCareer', $objCareer);
		return view('view_career');
	}

	function service()
	{
		View::share('PageTitle', 'Service');
		View::share('PageTitleSlug', 'service');

		View::share('headline', 'We have factory trained technicians');
		View::share('subhead', 'We take pride in what we do and stand behind our work 100%');
		View::share('PageText', 'Factory trained technicians means that your forklift equipment is in good hands. We pride ourselves on being able to quickly and accurately respond to units that are down or not functioning correctly. The goal of our service department is to ensure that your forklift equipment will be quickly and promptly repaired. Your business is important to us because if you succeed then we succeed. We take pride in what we do and stand behind our work 100%. Give us a call today to request a service call for all makes and models of forklifts. Interested in a preventive maintenance program for your fleet of forklifts? Call us today or request a quote.');

		View::share('val1', 'Proud');
		View::share('valSub1', 'award winning service');
		View::share('val2', 'Skill');
		View::share('valSub2', 'Factory trained and certified technicians');
		View::share('val3', 'Fast');
		View::share('valSub3', 'Rapid response time');
		View::share('val4', 'Focus');
		View::share('valSub4', 'Focus on quality controll');
		View::share('val5', 'Concern');
		View::share('valSub5', 'Optimum efficiency & safety');
		View::share('val6', 'Loyal');
		View::share('valSub6', 'Dedicated staff');
		View::share('val7', 'service');
		View::share('valSub7', 'Emergency after-hours service');
		View::share('val8', 'Locale');
		View::share('valSub8', 'Three full service locations');

		return view('static_template');
	}

	function parts()
	{
		View::share('PageTitle', 'Parts');
		View::share('PageTitleSlug', 'parts');

		View::share('headline', 'We provide parts for all makes and models of forklift');
		View::share('subhead', 'as well as OEM for Nissan, Crown and more...');
		View::share('PageText', 'Let&rsquo;s be honest. Forklift equipment repair can be critical for keeping your business running. We have over 1 million dollars in parts available. We provide OEM parts for Unicarriers, Nissan, Crown, Bendi, Drexel, Barret, Manitou, Heli, and just about any other make and model of forklift. We also provide after-market parts. When you need parts we have them. If your interested in quality parts trust our OEM parts on Nissan, Crown, Bendi and many other makes and models of forklift equipment. Get in touch with us today and request a quote for parts on all makes and model of forklifts.');

		View::share('val1', 'Warranty');
		View::share('valSub1', 'We Back 180 day warranty on Nissan &amp; Duralift parts');
		View::share('val2', 'Inventory');
		View::share('valSub2', 'Extensive inventory including tires');
		View::share('val3', 'Fast');
		View::share('valSub3', 'Most parts delivered same day');
		View::share('val4', 'Choice');
		View::share('valSub4', 'OEM &amp; after market parts for all brands');
		View::share('val5', 'Availability');
		View::share('valSub5', 'High percetage availbled');
		View::share('val6', 'Stock');
		View::share('valSub6', '1.25 million parts at our locations');
		View::share('val7', 'Save');
		View::share('valSub7', 'Competative pricing avaliable');
		View::share('val8', 'Locale');
		View::share('valSub8', 'Three full service locations');

		return view('static_template');;
	}

	function sales()
	{
		View::share('PageTitle', 'Sales');
		View::share('PageTitleSlug', 'sales');

		View::share('headline', 'Sales Department');
		View::share('subhead', 'Our sales experience is unmatched');
		View::share('PageText', 'Owning and buying a forklift is not always an easy endeavor. Heavy loading equipment is highly specialized and requires knowledge to make the right choice. You may have particular needs that must be met and to get the right equipment you need a company that has years of equipment sales experience. You need a company that has the knowledge required to put the right equipment in the right spot. With over 34 years of sales experience why look anywhere else? Call us today and tell us what your needs are and we&rsquo;ll make sure you get the right forklift for the job.');

		View::share('val1', 'Avaliability');
		View::share('valSub1', 'Fleet of Over 400 Units');
		View::share('val2', 'Choice');
		View::share('valSub2', 'Late Model Units Available');
		View::share('val3', 'Options');
		View::share('valSub3', 'Pneumatic, electric, gas, narrow aisle and scissor lifts available');
		View::share('val4', 'Delivery');
		View::share('valSub4', 'We offer fast delivery');
		View::share('val5', 'Add ons');
		View::share('valSub5', 'Various attachments available');
		View::share('val6', 'Transparent');
		View::share('valSub6', 'No hidden fees or cost');
		View::share('val7', 'Rates');
		View::share('valSub7', 'Daily, weekly and monthly rates avaliable');
		View::share('val8', 'Brands');
		View::share('valSub8', 'All major manufacturers available');

		return view('static_template');
	}

	function rentals()
	{
		View::share('PageTitle', 'Rentals');
		View::share('PageTitleSlug', 'rental');

		View::share('headline', 'Rental Department');
		View::share('subhead', 'Our rental fleet is over 400 units.');
		View::share('PageText', 'J.V. specializes in forklift - rentals. We have forklifts available for short and long term rental applications. We rent Unicarriers, Nissan, Crown, Bendi, Drexel, Genie, Mec, Manitou, Nilfisk-Advance, and various other makes and model of forklifts. We understand that the expense of a forklift can be great and that&rsquo;s why we have such a large selection of forklifts and other lifting equipment available for rental. We are able to provide rental units in Northern Mexico, Laredo, McAllen, Edinburg, Pharr, Brownsville and in South Texas. Our rental forklifts go through a critical inspection process to ensure a good working unit. If you are concerned about the costs of owning a forklift why not rent from us! We provide short and long term rental solutions.');

		View::share('val1', 'Availability');
		View::share('valSub1', 'Fleet of Over 400 Units');
		View::share('val2', 'Choice');
		View::share('valSub2', 'Late Model Units Available');
		View::share('val3', 'Options');
		View::share('valSub3', 'Pneumatic, electric, gas, narrow aisle and scissor lifts available');
		View::share('val4', 'Delivery');
		View::share('valSub4', 'We offer fast delivery');
		View::share('val5', 'Add ons');
		View::share('valSub5', 'Various attachments available');
		View::share('val6', 'Transparent');
		View::share('valSub6', 'No hidden fees or cost');
		View::share('val7', 'Rates');
		View::share('valSub7', 'Daily, weekly and monthly rates avaliable');
		View::share('val8', 'Brands');
		View::share('valSub8', 'All major manufacturers available');

		return view('static_template');
	}
	function gallery()
	{
		View::share('PageTitle', 'Gallery');
		View::share('PageTitleSlug', 'gallery');

		View::share('headline', 'We have factory trained technicians');
		View::share('subhead', 'We take pride in what we do and stand behind our work 100%');
		View::share('PageText', 'Factory trained technicians means that your forklift equipment is in good hands. We pride ourselves on being able to quickly and accurately respond to units that are down or not functioning correctly. The goal of our service department is to ensure that your forklift equipment will be quickly and promptly repaired. Your business is important to us because if you succeed then we succeed. We take pride in what we do and stand behind our work 100%. Give us a call today to request a service call for all makes and models of forklifts. Interested in a preventive maintenance program for your fleet of forklifts? Call us today or request a quote.');

		$tGalleryImages = \App\GalleryImage::Newandrecentlysold()->get();
		View::share('tGalleryImages', $tGalleryImages);
		return view('gallery');
	}

	function gallery_view($ImageID)
	{
		View::share('PageTitle', 'Gallery');
		View::share('PageTitleSlug', 'gallery');

		$tGalleryImages = \App\GalleryImage::all();
		$objImage = \App\GalleryImage::findorFail($ImageID);

		View::share('tGalleryImages', $tGalleryImages);
		View::share('objImage', $objImage);
		return view('gallery_view');
	}

	function privacy()
	{
		View::share('PageTitle', 'Privacy Policy');
		View::share('PageTitleSlug', 'privacy');

		View::share('headline', 'Privacy Policy');
		View::share('subhead', 'We take pride in what we do and stand behind our work 100%');
		View::share('PageText', 'Factory trained technicians means that your forklift equipment is in good hands. We pride ourselves on being able to quickly and accurately respond to units that are down or not functioning correctly. The goal of our service department is to ensure that your forklift equipment will be quickly and promptly repaired. Your business is important to us because if you succeed then we succeed. We take pride in what we do and stand behind our work 100%. Give us a call today to request a service call for all makes and models of forklifts. Interested in a preventive maintenance program for your fleet of forklifts? Call us today or request a quote.');
		return view('privacy');
	}
}
