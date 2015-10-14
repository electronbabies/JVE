<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Request;
use Validator;

class FormsController extends Controller
{
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

    // Form options => filename of their option in the graphic
    /*public $tTires = [
        'Indoor'                =>  'indoor_tire.png',
        'Outdoor'               =>  'outdoor_tire.png',
    ];

    public $tEngine = [
        'Electric'              =>  'electric_engine.png',
        'Gas'                   =>  'gas_engine.png',
    ];

    public $tCapacity = [
        '3000 LB'               =>  '3000_capacity.png',
        '5000 LB'               =>  '5000_capacity.png',
        '6000 LB'               =>  '6000_capacity.png',
        '8000 LB'               =>  '8000_capacity.png',
        'Other'                 =>  'other_capacity.png',
    ];

    public $tAttachment = [
        '36"'                   =>  '36_attachment.png',
        '42"'                   =>  '42_attachment.png',
        '48"'                   =>  '48_attachment.png',
    ];

    // Images may not be necessary here.  Might want to indicate on top right of div though.
    public $tOperatingHours = [
        '8 Hours' => '8_hours.png',
        'More' => 'extra_battery.png', // Extra batteries if so
    ];

    public $tAccessories = [
        'Side Shifter'          =>  'side_shifter.png',
        'LP Tank'               =>  'lp_tank.png',
        'Seat Belt'             =>  'seat_belt.png',
        'Strobe Light'          =>  'strobe_light.png',
        'Fire Extinguisher'     =>  'fire_extinguisher.png',
        'Opportunity Charger'   =>  'opportunity_charger.png',
    ];
    */

    public function store()
    {
        $Input = Request::all();
        $Validator = Validator::make($Input, [
            'FirstName'             => 'required',
            'LastName'              => 'required',
            'CompanyName'           => '',
            'PhoneNumber'           => 'required',
            'EmailAddress'          => 'required',
            'Brand'                 => '',
            'Tires'                 => '',
            'Engine'                => '',
            'Capacity'              => '',
            'Attachment'            => '',
            'OperatingHours'        => '',
        ]);

        if($Validator->fails())
            return redirect('/forms/'.str_replace(' ', '', strtolower($Input['RequestType']))->withErrors($Validator));

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
                        $objInvoiceItem->save();
                    }
                }
            } else {
                if($Input[$Item]) {
                    $objInvoiceItem = new \App\InvoiceItem;
                    $objInvoiceItem->invoice_id = $objInvoice->id;
                    $objInvoiceItem->type = $Item;
                    $objInvoiceItem->title = $Input[$Item];
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
