<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class InvoiceController extends AdminController
{
	const ACTIVE_CLASS = 'Invoices';

	public function edit($InvoiceID, $ReturnTo = '')
	{
		$objInvoice = \App\Invoice::find($InvoiceID);
		$tInvoiceItems = \App\InvoiceItem::where('invoice_id', $InvoiceID)->get();

		View::share('objInvoice', $objInvoice);
		View::share('tInvoiceItems', $tInvoiceItems);
		View::share('ReturnTo', $ReturnTo);
		return view('admin.invoices.edit');
	}

	public function index()
	{
		$tInvoices = \App\Invoice::all();

		View::share('tInvoices', $tInvoices);
		return view('admin.invoices.index');
	}
}
