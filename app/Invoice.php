<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	const STATUS_NEW 			= 'New';
	const STATUS_MODIFIED		= 'Modified';
	const STATUS_REVIEWED		= 'Reviewed';
	const STATUS_FINALIZED		= 'Finalized';

	protected $dates = ['created_at', 'updated_at'];

	protected $table = 'invoices';

	public function InvoiceItems()
	{
		return $this->hasMany('App\InvoiceItem');
	}

	public function User()
	{
		return $this->belongsTo('App\User');
	}

	public function scopeUnhandled($query)
	{
		return $query->where('status', '=', static::STATUS_NEW);
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
