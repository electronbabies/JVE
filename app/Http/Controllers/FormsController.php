<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use Log;
use View;
use Request;
use Input;
use File;
use Validator;

class FormsController extends StaticController
{
    const REQUEST_TYPE_PARTS = 'Parts';
    const REQUEST_TYPE_RENTAL = 'Rental';
    const REQUEST_TYPE_SALES = 'Sales';
    const REQUEST_TYPE_SERVICE = 'Service';
    const REQUEST_TYPE_RESUME = 'Resume';
    const REQUEST_TYPE_CONTACT_US = 'Contact';

    public $tBrands = [
        'Crown',
        'UniCarriers',
        'Landoll',
        'Bolzoni',
        'Cascade',
        'PowerBoss'
    ];

    // Form options => css class of their option in the graphic
    public $tEnvironment = [
        'Indoor / Outdoor' => 'IndoorOutdoorEnv',
        'Indoor' => 'IndoorEnv',
        'Outdoor' => 'OutdoorEnv',
    ];

    public $tMotivePower = [
        'LP' => 'LPEngine',
        'Gasoline' => 'GasolineEngine',
        'Diesel' => 'DieselEngine',
        'Dual Fuel Gasoline & LP' => 'DualEngine',
        'Electric' => 'ElectricEngine',
    ];

    // TODO:  To display capacity, show it lifting boxes of different sizes with the # in lbs on the side.
    public $tCapacity = [
        '3000 LB' => 'ThreeCapacity',
        '5000 LB' => 'FiveCapacity',
        '6000 LB' => 'SixCapacity',
        '8000 LB' => 'EightCapacity',
        'Other' => 'OtherCapacity',
    ];

    public $tAttachment = [
        '36"' => 'ThirtySixAttachment',
        '42"' => 'FortyTwoAttachment',
        '48"' => 'FortyEightAttachment',
        '54"' => 'FiftyFourAttachment',
        '60"' => 'SixtyAttachment',
        '72"' => 'SeventyTwoAttachment',
        'Bale Clamps' => 'BaleClamps',
        'Carton Clamps' => 'CartonClamps',
        'Push/Pulls' => 'PushPulls',
        'Single-Double Pallet Handler' => 'PalletHandler',
    ];

    // Images may not be necessary here.  Might want to indicate on top right of div though.
    public $tOperatingHours = [
        '8 Hours' => 'EightHours',
        'More' => 'ExtraBattery', // Extra batteries if so
    ];

    public $tAccessories = [
        'Seat Belt' => 'SeatBelt',
        'Strobe Light' => 'StrobeLight',
        'Fire Extinguisher' => 'FireExtinguisher',
        'Side Shifter' => 'SideShifter',
        'Opportunity Charger' => 'OpportunityCharger',
        'LP Tank' => 'LPTank',
    ];

    public $tMandatoryItems = [
        'Seat Belt',
        'Strobe Light',
        'Fire Extinguisher',
        'Side Shifter',
    ];

    public function store()
    {
        Log::useFiles(storage_path() . '/logs/laravel.log');
        $Input = Request::all();
        if ($Input['RequestType'] == static::REQUEST_TYPE_SALES || $Input['RequestType'] == static::REQUEST_TYPE_RENTAL) {
            $tValidation = [
                'FirstName' => 'required',
                'LastName' => 'required',
                'CompanyName' => '',
                'PhoneNumber' => 'required',
                'EmailAddress' => 'required',
                'Brand' => 'required',
                'Environment' => 'required',
                'MotivePower' => 'required',
                'Capacity' => 'required',
                'Attachment' => 'required',
                'OperatingHours' => 'required',
            ];

            if ($Input['RequestType'] == static::REQUEST_TYPE_RENTAL)
                unset($tValidation['Brand']);
        } elseif ($Input['RequestType'] == static::REQUEST_TYPE_RESUME) {
            $tValidation = [
                'Resume' => 'required'
            ];
        } else {
            $tValidation = [
                'FirstName' => 'required',
                'LastName' => 'required',
                'CompanyName' => '',
                'PhoneNumber' => 'required',
                'EmailAddress' => 'required',
            ];
        }

        $Validator = Validator::make($Input, $tValidation);

        if ($Validator->fails()) {
            if ($Input['RequestType'] != static::REQUEST_TYPE_RESUME) {
                return redirect('/forms/' . str_replace(' ', '', strtolower($Input['RequestType'])))->withErrors($Validator);
            } else {
                return redirect('/careers/view_career/' . $Input['Id'])->withErrors($Validator);
            }
        }

        switch ($Input['RequestType']) {
            case static::REQUEST_TYPE_PARTS:
                return $this->ProcessPartsRequest($Input);

            case static::REQUEST_TYPE_SALES:
                return $this->ProcessSaleRequest($Input);

            case static::REQUEST_TYPE_RENTAL:
                return $this->ProcessRentalRequest($Input);

            case static::REQUEST_TYPE_SERVICE:
                return $this->ProcessServiceRequest($Input);

            case static::REQUEST_TYPE_CONTACT_US:
                return $this->ProcessContactUsRequest($Input);
            case static::REQUEST_TYPE_RESUME:
                $File = Request::file('Resume');

                return $this->ProcessResumeRequest($Input, $File);
        }

    }

    public function ProcessServiceRequest($Input, $SendServiceEmail = true)
    {
        // Get logged user, or register as guest
        $objUser = \Auth::User() ?: \App\User::GetGuestAccount();

        // Create invoice
        $objInvoice = new \App\Invoice;
        $objInvoice->user_id = $objUser->id;
        $objInvoice->type = $Input['RequestType'];
        $objInvoice->company_name = $Input['CompanyName'];
        $objInvoice->first_name = $Input['FirstName'];
        $objInvoice->last_name = $Input['LastName'];
        $objInvoice->email = $Input['EmailAddress'];
        $objInvoice->phone = $Input['PhoneNumber'];
        $objInvoice->status = \App\Invoice::STATUS_NEW;
        $objInvoice->comments = $Input['Comments'];

        if (!$objInvoice->save())
            App::abort('500', 'Master invoice could not save.  Breaking page.  Not saving invoice items.');

        $objInvoiceItem = new \App\InvoiceItem;
        $objInvoiceItem->invoice_id = $objInvoice->id;
        $objInvoiceItem->type = $Input['RequestType'];
        switch ($Input['RequestType']) {
            case static::REQUEST_TYPE_PARTS :
                $objInvoiceItem->title = 'Parts Request';
                break;
            case static::REQUEST_TYPE_SALES :
                $objInvoiceItem->title = 'Service Request';
                break;
            case static::REQUEST_TYPE_CONTACT_US :
                $objInvoiceItem->title = 'Contact Us';
                break;
        }
        $objInvoiceItem->status = \App\InvoiceItem::STATUS_ACTIVE;
        $objInvoiceItem->save();

        if (Request::get('Make')) {
            $objInvoiceItem = new \App\InvoiceItem;
            $objInvoiceItem->invoice_id = $objInvoice->id;
            $objInvoiceItem->type = 'Make';
            $objInvoiceItem->title = Request::get('Make');
            $objInvoiceItem->status = \App\InvoiceItem::STATUS_ACTIVE;
            $objInvoiceItem->save();
        }

        if (Request::get('Model')) {
            $objInvoiceItem = new \App\InvoiceItem;
            $objInvoiceItem->invoice_id = $objInvoice->id;
            $objInvoiceItem->type = 'Model';
            $objInvoiceItem->title = Request::get('Model');
            $objInvoiceItem->status = \App\InvoiceItem::STATUS_ACTIVE;
            $objInvoiceItem->save();
        }

        if (Request::get('SerialNumber')) {
            $objInvoiceItem = new \App\InvoiceItem;
            $objInvoiceItem->invoice_id = $objInvoice->id;
            $objInvoiceItem->type = 'Serial Number';
            $objInvoiceItem->title = Request::get('SerialNumber');
            $objInvoiceItem->status = \App\InvoiceItem::STATUS_ACTIVE;
            $objInvoiceItem->save();
        }
        if ($SendServiceEmail) {
            EmailController::sendServiceEmail($Input);
        }

        return redirect('/forms/success');
    }

    public function ProcessPartsRequest($Input)
    {
        // Same thing at this point
        EmailController::sendPartsEmail($Input);
        return $this->ProcessServiceRequest($Input, false);
    }

    public function ProcessRentalRequest($Input)
    {
        // Same thing at this point
        EmailController::sendRentalsEmail($Input);
        return $this->ProcessSaleRequest($Input);
    }

    public function ProcessContactUsRequest($Input)
    {
        return $this->ProcessServiceRequest($Input);
    }

    public function ProcessResumeRequest($Input, $File)
    {
        if ($File) {
            EmailController::sendResumeEmail($Input, $File);
        }

        return redirect('/forms/success');
    }

    public function ProcessSaleRequest($Input)
    {
        // Get logged user, or register as guest
        $objUser = \Auth::User() ?: \App\User::GetGuestAccount();

        // TODO:  Nice error handling would be nice
        if (!$objUser)
            App::abort('500', 'Invalid form request:  Could not determine user account to submit form');

        // Create invoice
        $objInvoice = new \App\Invoice;
        $objInvoice->user_id = $objUser->id;
        $objInvoice->type = $Input['RequestType'];
        $objInvoice->company_name = $Input['CompanyName'];
        $objInvoice->first_name = $Input['FirstName'];
        $objInvoice->last_name = $Input['LastName'];
        $objInvoice->email = $Input['EmailAddress'];
        $objInvoice->phone = $Input['PhoneNumber'];
        $objInvoice->status = \App\Invoice::STATUS_NEW;
        $objInvoice->comments = $Input['Comments'];


        if (!$objInvoice->save())
            App::abort('500', 'Master invoice could not save.  Breaking page.  Not saving invoice items.');

        // Invoice Items
        $tInvoiceItemFields = [
            'Brand',
            'Environment',
            'MotivePower',
            'Capacity',
            'Attachment',
            'OperatingHours',
            'Accessories' => [
                'LP Tank', // Inform this is a 2nd tank.  Fork lifts come with LP Tanks.  Gas only.
                'Opportunity Charger', // Electric only

                // Mandatory Items
                'Seat Belt',
                'Strobe Light',
                'Fire Extinguisher',
                'Side Shifter',
            ],
        ];

        if ($Input['RequestType'] == static::REQUEST_TYPE_RENTAL)
            unset($tInvoiceItemFields[0]); // Brand

        foreach ($tInvoiceItemFields as $Item) {
            if (is_array($Item)) {
                foreach ($Item as $Accessory) {
                    if (in_array($Accessory, $Input['Accessories'])) {
                        $objInvoiceItem = new \App\InvoiceItem;
                        $objInvoiceItem->invoice_id = $objInvoice->id;
                        $objInvoiceItem->type = 'Accessory';
                        $objInvoiceItem->title = "{$Accessory}";
                        $objInvoiceItem->status = \App\InvoiceItem::STATUS_ACTIVE;
                        $objInvoiceItem->save();
                    }
                }
            } else {
                if ($Input[$Item]) {
                    $objInvoiceItem = new \App\InvoiceItem;
                    $objInvoiceItem->invoice_id = $objInvoice->id;
                    $objInvoiceItem->type = $Item;
                    $objInvoiceItem->title = $Input[$Item];
                    $objInvoiceItem->status = \App\InvoiceItem::STATUS_ACTIVE;
                    $objInvoiceItem->save();
                }
            }
        }
        EmailController::sendSalesEmail($Input);
        return redirect('/forms/success');
    }

    public function success()
    {
        return view('forms.success');
    }

    public function rental()
    {
        View::share('tBrands', $this->tBrands);
        View::share('tAccessories', $this->tAccessories);
        View::share('tOperatingHours', $this->tOperatingHours);
        View::share('tAttachment', $this->tAttachment);
        View::share('tCapacity', $this->tCapacity);
        View::share('tMotivePower', $this->tMotivePower);
        View::share('tEnvironment', $this->tEnvironment);
        View::share('tMandatoryItems', $this->tMandatoryItems);

        return view('forms.rental');
    }

    public function sales()
    {
        View::share('tBrands', $this->tBrands);
        View::share('tAccessories', $this->tAccessories);
        View::share('tOperatingHours', $this->tOperatingHours);
        View::share('tAttachment', $this->tAttachment);
        View::share('tCapacity', $this->tCapacity);
        View::share('tMotivePower', $this->tMotivePower);
        View::share('tEnvironment', $this->tEnvironment);
        View::share('tMandatoryItems', $this->tMandatoryItems);

        return view('forms.sales');
    }

    public function contact()
    {
        return view('forms.contact');
    }

    public function parts()
    {
        return view('forms.parts');
    }

    public function service()
    {
        return view('forms.service');
    }
}
