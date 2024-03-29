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
		/*
		 * The code below works, but needs to be in a cron job to get minitrac invoices tied with the system.
		$PDFDir = 'minitrac_invoices';

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
		View::share('headline', '');
		View::share('subhead', '');
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

		View::share('headline', '');
		View::share('subhead', '');
		View::share('PageText', '');

		View::share('val1', 'Proud');
		View::share('valSub1', 'Award Winning Service');
		View::share('val2', 'Skill');
		View::share('valSub2', 'Factory Trained and Certified Technicians');
		View::share('val3', 'Fast');
		View::share('valSub3', 'Rapid Response Time');
		View::share('val4', 'Focus');
		View::share('valSub4', 'Focus On Quality Control');
		View::share('val5', 'Concern');
		View::share('valSub5', 'Optimum Efficiency & Safety');
		View::share('val6', 'Loyal');
		View::share('valSub6', 'Dedicated Staff');
		View::share('val7', 'Service');
		View::share('valSub7', 'Emergency After-Hours Service');
		View::share('val8', 'Local');
		View::share('valSub8', 'Three Full Service Locations');

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
		View::share('valSub1', 'We Offer 180 Day Warranty On Nissan &amp; Duralift Parts');
		View::share('val2', 'Inventory');
		View::share('valSub2', 'Vast Inventory Of Parts & Tires');
		View::share('val3', 'Fast');
		View::share('valSub3', 'Most Parts Next Day Available');
		View::share('val4', 'Choice');
		View::share('valSub4', 'OEM &amp; After Market Parts For All Brands');
		View::share('val5', 'Availability');
		View::share('valSub5', 'High Percentage Availability');
		View::share('val6', 'Stock');
		View::share('valSub6', 'Over 1 Million In Available Parts');
		View::share('val7', 'Save');
		View::share('valSub7', 'Competitive Pricing Available');
		View::share('val8', 'Local');
		View::share('valSub8', 'Three Service Locations In South Texas');

		return view('static_template');;
	}

	function sales()
	{
		View::share('PageTitle', 'Sales');
		View::share('PageTitleSlug', 'sales');

		View::share('headline', 'Sales Department');
		View::share('subhead', 'Our Sales Experience Is Unmatched');
		View::share('PageText', 'Owning And Buying A Forklift Is Not Always An Easy Endeavor. Heavy Lifting Equipment Is Highly Specialized And Requires Knowledge To Make The Right Choice. You May Have Particular Needs That Must Be met and to get the right equipment you need a company that has years of equipment sales experience. You need a company that has the knowledge required to put the right equipment in the right spot. With over 34 years of sales experience why look anywhere else? Call us today and tell us what your needs are and we&rsquo;ll make sure you get the right forklift for the job.');

		View::share('val1', 'Availability');
		View::share('valSub1', 'Fleet of Over 400 Units');
		View::share('val2', 'Choice');
		View::share('valSub2', 'Late Model Units Available');
		View::share('val3', 'Options');
		View::share('valSub3', 'Pneumatic, Electric, Gas, Narrow Aisle And Scissor Lifts Available');
		View::share('val4', 'Delivery');
		View::share('valSub4', 'We Offer Fast Delivery');
		View::share('val5', 'Add ons');
		View::share('valSub5', 'Various Attachments Available');
		View::share('val6', 'Transparent');
		View::share('valSub6', 'No Hidden Fees Or Cost');
		View::share('val7', 'Rates');
		View::share('valSub7', 'Daily, Weekly And Monthly Rates Available');
		View::share('val8', 'Brands');
		View::share('valSub8', 'All Major Manufacturers Available');

		return view('static_template');
	}

	function rentals()
	{
		View::share('PageTitle', 'Rentals');
		View::share('PageTitleSlug', 'rental');

		View::share('headline', 'Rental Department');
		View::share('subhead', 'Our Rental Fleet Is Over 400 Units.');
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

	function news_entry($BlogID) {
	    $objPost = \App\BlogPost::findOrFail($BlogID);
	    View::share('objPost', $objPost);

        return view('single_news_entry');
    }

    function all_news() {
	    $tAllPosts = \App\BlogPost::all();
	    View::share('tAllPosts', $tAllPosts);

        return view('all_news_entry');
    }
}
