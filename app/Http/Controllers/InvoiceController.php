<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Session;

class InvoiceController extends AdminController
{
	const ACTIVE_CLASS = 'Invoices';

	public function store()
	{
		$Input = Request::all();
		$objInvoice = \App\Invoice::findorFail($Input['InvoiceID']);
		$objUser = \Auth::User();

		$tWarnings = [];
		foreach($Input['InvoiceItem'] as $ID => $tItem) {
			if($ID == 'new') {
				foreach($tItem as $tNewItem) {
					if(trim($tNewItem['Title']) || trim($tNewItem['Type'])) {
						$objInvoiceItem = new \App\InvoiceItem;
						$objInvoiceItem->title = trim($tNewItem['Title']);
						$objInvoiceItem->type = trim($tNewItem['Type']);
						$objInvoiceItem->invoice_id = $objInvoice->id;
						$objInvoiceItem->save();
					}
				}
				continue;
			}

			$objInvoiceItem = \App\InvoiceItem::find($ID);
			// Precautionary check to make sure we are not modifying other order items
			if(!$objInvoiceItem || $objInvoiceItem->invoice_id != $objInvoice->id) {
				$tWarnings[] = 'Order Item (id=' . $objInvoiceItem->id .') could not be saved properly.  Did not match parent order id.';
				continue;
			}
			if(trim(strtolower($objInvoiceItem->title)) != trim(strtolower($tItem['Title'])) || trim(strtolower($objInvoiceItem->type)) != trim(strtolower($tItem['Type'])))
				$objInvoiceItem->status = \App\InvoiceItem::STATUS_MODIFIED;

			$objInvoiceItem->title = $tItem['Title'];
			$objInvoiceItem->type = $tItem['Type'];

			$objInvoiceItem->save();
		}

		$objInvoice->comments = $Input['Comments'];
		$objInvoice->assigned_to = $Input['AssignTo'];

		if($objInvoice->status != \App\Invoice::STATUS_REVIEWED && $Input['Status'] == \App\Invoice::STATUS_REVIEWED)
			$objInvoice->reviewed_by = $objInvoice->id;

		$objInvoice->status = $Input['Status'];
		$objInvoice->save();

		if($tWarnings)
			return redirect('admin/invoices/edit/' . $objInvoice->id)->with('FormResponse', ['ResponseType' => static::MESSAGE_WARNING, 'Content' => implode('<br />', $tWarnings) . ' <br />Contact Administrator']);

		return redirect('admin/invoices/edit/'.$objInvoice->id)->with('FormResponse', ['ResponseType' => static::MESSAGE_SUCCESS, 'Content' => 'Invoice saved successfully']);
	}


	/**
	 * Ajax delete
	 * @param $id
	 */
	public function delete_item($id)
	{
		$objInvoiceItem = \App\InvoiceItem::find($id);
		$objInvoiceItem->status = \App\InvoiceItem::STATUS_DELETED;
		if ($objInvoiceItem->save()) {
			exit('success');
		}
		exit('error');
	}

	public function edit($InvoiceID, $ReturnTo = '')
	{
		$objInvoice = \App\Invoice::find($InvoiceID);
		$tInvoiceItems = $objInvoice->InvoiceItems->filter(function($objItem) {
			return ($objItem->status == \App\InvoiceItem::STATUS_ACTIVE || $objItem->status == \App\InvoiceITem::STATUS_MODIFIED);
		});
		$tNonClientUsers = \App\User::nonclient()->get();

		View::share('objInvoice', $objInvoice);
		View::share('tInvoiceItems', $tInvoiceItems);
		View::share('tNonClientUsers', $tNonClientUsers);
		View::share('ReturnTo', $ReturnTo);
		View::share('FormResponse', Session::get('FormResponse'));
		return view('admin.invoices.edit');
	}

	public function index()
	{
		$tInvoices = \App\Invoice::all();

		View::share('tInvoices', $tInvoices);
		return view('admin.invoices.index');
	}
}
