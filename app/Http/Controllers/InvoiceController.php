<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class InvoiceController extends AdminController
{
	public function edit($InvoiceID)
	{
		$objInvoice = \App\Invoice::find($InvoiceID);
		$tInvoiceItems = \App\InvoiceItem::where('invoice_id', $InvoiceID)->get();

		View::share('objInvoice', $objInvoice);
		View::share('tInvoiceItems', $tInvoiceItems);
		return view('admin.invoices.edit');
	}
}
