<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Session;
use Storage;

class InvoiceController extends AdminController
{
	const ACTIVE_CLASS = 'Invoices';

	public function store()
	{
		$Input = Request::all();
		$objInvoice = \App\Invoice::findorFail($Input['InvoiceID']);

		if(!$this->objLoggedInUser->HasPermission("Edit/{$objInvoice->type}"))
			abort('404');

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

		$objInvoice->first_name = Request::get('InvoiceFirstName');
		$objInvoice->last_name = Request::get('InvoiceLastName');
		$objInvoice->type = Request::get('InvoiceType');
		$objInvoice->email = Request::get('InvoiceEmail');
		$objInvoice->phone = Request::get('InvoicePhone');
		$objInvoice->company_name = Request::get('InvoiceCompany');
		$objInvoice->minitrac_invoice_number = Request::get('MinitracInvoiceNumber');

		$objInvoice->comments = $Input['Comments'];
		$objInvoice->assigned_to = $Input['AssignTo'];

		if($objInvoice->status != \App\Invoice::STATUS_REVIEWED && $Input['Status'] == \App\Invoice::STATUS_REVIEWED)
			$objInvoice->reviewed_by = $this->objLoggedInUser->id;

		$objInvoice->status = $Input['Status'];
		$objInvoice->save();

		if($tWarnings)
			return redirect('admin/invoices/edit/' . $objInvoice->id)->with('FormResponse', ['ResponseType' => static::MESSAGE_WARNING, 'Content' => implode('<br />', $tWarnings) . ' <br />Contact Administrator']);

		if (Request::get('Submit') == 'Save')
			$Path = $Input['ReturnTo'] == 'Dashboard' ? '' : '/invoices';
		else
			$Path = '/invoices/edit/' . $objInvoice->id;

		return redirect("admin{$Path}")->with('FormResponse', ['ResponseType' => static::MESSAGE_SUCCESS, 'Content' => 'Invoice saved successfully']);
	}

	public function minitrac_view($id)
	{
		$objInvoice = \App\Invoice::findOrFail($id);
		$Filename = $objInvoice->minitrac_filename;
		$AccountID = $objInvoice->user->account_number;
		
		if(!$this->objLoggedInUser->HasPermission("View/{$objInvoice->type}") || !$Filename || !$AccountID)
			abort('404');

		header("Content-type:application/pdf");

		// It will be called downloaded.pdf
		header("Content-Disposition:attachment;filename='{$Filename}'");

		echo Storage::get("minitrac_invoices/{$AccountID}/{$Filename}");
	}

	/**
	 * Ajax delete
	 * @param $id
	 */
	public function delete_item($id)
	{
		$objInvoiceItem = \App\InvoiceItem::find($id);

		if (!$this->objLoggedInUser->HasPermission("Edit/{$objInvoiceItem->Invoice->type}"))
			abort('404');

		$objInvoiceItem->status = \App\InvoiceItem::STATUS_DELETED;
		if ($objInvoiceItem->save()) {
			exit('success');
		}
		exit('error');
	}

	public function edit($InvoiceID, $ReturnTo = '')
	{
		$objInvoice = \App\Invoice::find($InvoiceID);

		if (!$this->objLoggedInUser->HasPermission("View/{$objInvoice->type}"))
			abort('404');

		$tInvoiceItems = $objInvoice->InvoiceItems->filter(function($objItem) {
			return ($objItem->status == \App\InvoiceItem::STATUS_ACTIVE || $objItem->status == \App\InvoiceITem::STATUS_MODIFIED);
		});

		$tNonClientUsers = \App\User::nonclient()->permusers($this->objLoggedInUser)->nonclient()->get();

		View::share('objInvoice', $objInvoice);
		View::share('tInvoiceItems', $tInvoiceItems);
		View::share('tNonClientUsers', $tNonClientUsers);
		View::share('ReturnTo', $ReturnTo);
		return view('admin.invoices.edit');
	}

	public function index($Status = 'All')
	{
		if(!$this->objLoggedInUser->HasPermission('View/Orders'))
			abort('404');

		switch($Status) {
			case \App\Invoice::STATUS_NEW:
				$tInvoices = \App\Invoice::perminvoices($this->objLoggedInUser)->new()->get();
				break;
			case \App\Invoice::STATUS_FINALIZED:
				View::share('ActiveClass', 'Finalized Orders');
				$tInvoices = \App\Invoice::perminvoices($this->objLoggedInUser)->finalized()->get();
				break;
			case \App\Invoice::STATUS_ASSIGNED:
				View::share('ActiveClass', 'Assigned Orders');
				$tInvoices = \App\Invoice::perminvoices($this->objLoggedInUser)->assigned($this->objLoggedInUser)->get();
				break;
			default:
				$tInvoices = \App\Invoice::perminvoices($this->objLoggedInUser)->inprogress()->get();
				break;
		}

		View::share('Status', $Status);
		View::share('tInvoices', $tInvoices);
		return view('admin.invoices.index');
	}
}
