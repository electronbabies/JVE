<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Request;
use Validator;

class FormsController extends StaticController
{
    const REQUEST_TYPE_PARTS = 'Parts';
    const REQUEST_TYPE_RENTAL = 'Rental';
    const REQUEST_TYPE_SALES = 'Sales';
    const REQUEST_TYPE_SERVICE = 'Service';

    public $tBrands = [
        'Crown',
        'UniCarriers',
        'Landoll',
        'Bolzoni',
        'Cascade',
        'PowerBoss'
    ];

    // Form options => css class of their option in the graphic
    public $tTires = [
        'Indoor' => 'IndoorTire',
        'Outdoor' => 'OutdoorTire',
    ];

    public $tEngine = [
        'Electric' => 'ElectricEngine',
        'Gas' => 'GasEngine',
    ];

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
    ];

    // Images may not be necessary here.  Might want to indicate on top right of div though.
    public $tOperatingHours = [
        '8 Hours' => 'EightHours',
        'More' => 'ExtraBattery', // Extra batteries if so
    ];

    public $tAccessories = [
        'Side Shifter' => 'SideShifter',
        'LP Tank' => 'LPTank',
        'Seat Belt' => 'SeatBelt',
        'Strobe Light' => 'StrobeLight',
        'Fire Extinguisher' => 'FireExtinguisher',
        'Opportunity Charger' => 'OpportunityCharger',
    ];

    public function store()
    {
        $Input = Request::all();
        $Validator = Validator::make($Input, [
            'FirstName' => 'required',
            'LastName' => 'required',
            'CompanyName' => '',
            'PhoneNumber' => 'required',
            'EmailAddress' => 'required',
        ]);

        if ($Validator->fails())
            return redirect('/forms/' . str_replace(' ', '', strtolower($Input['RequestType']))->withErrors($Validator));

        switch($Input['RequestType']) {
            case static::REQUEST_TYPE_PARTS:
                return $this->ProcessPartsRequest($Input);

            case static::REQUEST_TYPE_SALES:
                return $this->ProcessSaleRequest($Input);

            case static::REQUEST_TYPE_RENTAL:
                return $this->ProcessRentalRequest($Input);

            case static::REQUEST_TYPE_SERVICE:
                return $this->ProcessServiceRequest($Input);
        }
    }

    public function ProcessServiceRequest($Input) {
        // make & model
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
        $objInvoiceItem->type = 'Service';
        $objInvoiceItem->title = 'Service Request';
        $objInvoiceItem->status = \App\InvoiceItem::STATUS_ACTIVE;
        $objInvoiceItem->save();

        // All this work to make a title pretty!!!
        $tTitleOptions = [];
        if ($Input['Make'])
            $tTitleOptions[] = "Make - " . $Input['Make'];

        if ($Input['Model'])
            $tTitleOptions[] = "Model - " . $Input['Model'];

        if ($tTitleOptions)
            $objInvoiceItem->title .= ": (" . implode(' / ', $tTitleOptions) . ")";

        return redirect('/forms/success');
    }

    public function ProcessPartsRequest($Input) {
        // Same thing at this point
        return $this->ProcessServiceRequest($Input);
        return redirect('/forms/success');
    }

    public function ProcessRentalRequest($Input) {
        // Same thing at this point
        return $this->ProcessSaleRequest($Input);
    }

    public function ProcessSaleRequest($Input) {
        // Get logged user, or register as guest
        $objUser = \Auth::User() ?: \App\User::GetGuestAccount();

        // TODO:  Nice error handling would be nice
        if(!$objUser)
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


        if(!$objInvoice->save())
            App::abort('500', 'Master invoice could not save.  Breaking page.  Not saving invoice items.');

        // Invoice Items
        $tInvoiceItemFields = [
            'Brand',
            'Tires',
            'Engine',
            'Capacity',
            'Attachment',
            'OperatingHours',
            'Accessories' => [
                'Side Shifter',
                'LP Tank',
                'Seat Belt',
                'Strobe Light',
                'Fire Extinguisher',
                'Opportunity Charger',
            ],
        ];

        foreach($tInvoiceItemFields as $Item) {
            if(is_array($Item)) {
                foreach($Item as $Accessory) {
                    if(in_array($Accessory, $Input['Accessories'])) {
                        $objInvoiceItem = new \App\InvoiceItem;
                        $objInvoiceItem->invoice_id = $objInvoice->id;
                        $objInvoiceItem->type = 'Accessory';
                        $objInvoiceItem->title = "{$Accessory}";
                        $objInvoiceItem->status = \App\InvoiceItem::STATUS_ACTIVE;
                        $objInvoiceItem->save();
                    }
                }
            } else {
                if($Input[$Item]) {
                    $objInvoiceItem = new \App\InvoiceItem;
                    $objInvoiceItem->invoice_id = $objInvoice->id;
                    $objInvoiceItem->type = $Item;
                    $objInvoiceItem->title = $Input[$Item];
                    $objInvoiceItem->status = \App\InvoiceItem::STATUS_ACTIVE;
                    $objInvoiceItem->save();
                }
            }
        }

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
        View::share('tEngine', $this->tEngine);
        View::share('tTires', $this->tTires);
		return view('forms.rental');
    }

	public function sales()
	{
	    View::share('tBrands', $this->tBrands);
	    View::share('tAccessories', $this->tAccessories);
        View::share('tOperatingHours', $this->tOperatingHours);
        View::share('tAttachment', $this->tAttachment);
        View::share('tCapacity', $this->tCapacity);
        View::share('tEngine', $this->tEngine);
        View::share('tTires', $this->tTires);

		return view('forms.sales');
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
