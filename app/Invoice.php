<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	const STATUS_NEW 			= 'New';
	const STATUS_MODIFIED		= 'Modified';
	const STATUS_REVIEWED		= 'Reviewed';
	const STATUS_FINALIZED		= 'Finalized';

	// Not a db status, so do not include in array below.
	const STATUS_ASSIGNED		= 'Assigned';

	static public $tStatuses = [
		self::STATUS_NEW,
		self::STATUS_MODIFIED,
		self::STATUS_REVIEWED,
		self::STATUS_FINALIZED,
	];

	const TYPE_SERVICE			= 'Service';
	const TYPE_PARTS 			= 'Parts';
	const TYPE_RENTAL 			= 'Rental';
	const TYPE_SALES 			= 'Sales';

	static public $tTypes = [
		self::TYPE_SERVICE,
		self::TYPE_PARTS,
		self::TYPE_RENTAL,
		self::TYPE_SALES,
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
	public function scopeInprogress($query)
	{
		return $query->where('status', '!=', static::STATUS_FINALIZED);
	}

	public function scopeFinalized($query)
	{
		return $query->where('status', '=', static::STATUS_FINALIZED);
	}

	public function scopeNew($query)
	{
		return $query->where('status', '=', static::STATUS_NEW);
	}

	public function scopeAssigned($query, $objUser)
	{
		return $query->where('assigned_to', '=', $objUser->id);
	}


	/**
	 * Invoices (aka Orders) allowed to be viewed by user
	 * @param $query
	 * @param $objUser
	 */
	public function scopePerminvoices($query, $objUser)
	{
		// Something never true, otherwise it returns a full set on 0 permissions matched.
		$query->where('type', '0');

		$query->orWhere(function($query) use ($objUser){
			if ($objUser->HasPermission('View/' . static::TYPE_SERVICE))
				$query->orwhere('type', static::TYPE_SERVICE);

			if ($objUser->HasPermission('View/' . static::TYPE_PARTS))
				$query->orwhere('type', static::TYPE_PARTS);

			if ($objUser->HasPermission('View/' . static::TYPE_RENTAL))
				$query->orwhere('type', static::TYPE_RENTAL);

			if ($objUser->HasPermission('View/' . static::TYPE_SALES)) {
				$query->orwhere('type', static::TYPE_SALES);
			}
		});

		return $query;
	}
}