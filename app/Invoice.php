<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	const STATUS_NEW 			= 'New';
	const STATUS_MODIFIED		= 'Modified';
	const STATUS_REVIEWED		= 'Reviewed';
	const STATUS_FINALIZED		= 'Finalized';

	static public $tStatuses = [
		self::STATUS_NEW,
		self::STATUS_MODIFIED,
		self::STATUS_REVIEWED,
		self::STATUS_FINALIZED,
	];

	protected $dates = ['created_at', 'updated_at'];

	protected $table = 'invoices';

	// Relationships
	public function InvoiceItems()
	{
		return $this->hasMany('App\InvoiceItem');
	}

	public function User()
	{
		return $this->belongsTo('App\User');
	}

	public function ReviewedUser()
	{
		return $this->belongsTo('App\User', 'reviewed_by');
	}

	public function AssignedUser()
	{
		return $this->belongsTo('App\User', 'assigned_to');
	}

	// Scopes
	public function scopeUnhandled($query)
	{
		return $query->where('status', '=', static::STATUS_NEW);
	}
}