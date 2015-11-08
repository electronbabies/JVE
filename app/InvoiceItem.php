<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
	const STATUS_ACTIVE = 'Active';
	const STATUS_DELETED = 'Deleted';
	const STATUS_MODIFIED = 'Modified';

	static $tStatuses = [
		self::STATUS_ACTIVE,
		self::STATUS_DELETED,
		self::STATUS_MODIFIED,
	];

	static $tTypes = [
		// Rental / Sales form
		'Brand',
		'Environment',
		'MotivePower',
		'Capacity',
		'Attachment',
		'OperatingHours',
		'Accessory',

		// Invoice Types
		'Service',
		'Rental',
		'Parts',
		'Sales',

		// Service / Parts form
		'Make',
		'Model',
		'Serial Number',
	];

	protected $table = 'invoice_items';

	public function Invoice()
	{
		return $this->belongsTo('App\Invoice');
	}
}
