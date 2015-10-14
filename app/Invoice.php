<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	const STATUS_NEW 			= 'New';
	const STATUS_MODIFIED		= 'Modified';
	const STATUS_REVIEWED		= 'Reviewed';
	const STATUS_FINALIZED		= 'Finalized';

	protected $table = 'invoices';

	public function InvoiceItems()
	{
		return $this->hasMany('App\InvoiceItem');
	}
}

class InvoiceItem extends Model
{
	const STATUS_ACTIVE			= 'Active';
	const STATUS_MODIFIED		= 'Modified';
	const STATUS_DELETED		= 'Deleted';

	protected $table = 'invoice_items';

	public function Invoice()
	{
		return $this->belongsTo('App\Invoice');
	}
}
