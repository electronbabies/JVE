<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class VacationRequest extends Model
{
	const STATUS_APPROVED			= 'Approved';
	const STATUS_COMPLETED 			= 'Completed';
	const STATUS_DENIED				= 'Denied';
	const STATUS_PENDING			= 'Pending';

	protected $table = 'vacation_requests';
	protected $dates = ['created_at', 'updated_at', 'from', 'to'];

	static $tStatusOptions = [self::STATUS_APPROVED, self::STATUS_COMPLETED, self::STATUS_DENIED, self::STATUS_PENDING];

	public function __construct($attributes = [])
	{
		$this->setRawAttributes([
			'from' 		=> Carbon::now()->addDays(1),
			'to'		=> Carbon::now()->addDays(2),
		], true);
		return parent::__construct($attributes);
	}

	public function User()
	{
		return $this->belongsTo('\App\User');
	}

	public function scopeUpcoming($query)
	{
		$StartDate = Carbon::now();
		$EndDate = Carbon::now()->addMonth();
		return $query->where('from', '>', $StartDate)->where('from', '<', $EndDate)->where('status', '=', static::STATUS_APPROVED);
	}

	public function scopeRequests($query)
	{
		return $query->where('status', '=', static::STATUS_PENDING);
	}
}
