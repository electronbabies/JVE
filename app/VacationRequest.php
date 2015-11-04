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

	const TYPE_HOLIDAY				= 'Holiday';
	const TYPE_VACATION				= 'Vacation';

	protected $table = 'vacation_requests';
	protected $dates = ['created_at', 'updated_at', 'from', 'to'];

	static $tStatusOptions = [self::STATUS_APPROVED, self::STATUS_COMPLETED, self::STATUS_DENIED, self::STATUS_PENDING];

	public function __construct($attributes = [])
	{
		$this->setRawAttributes([
			'from' 		=> Carbon::now()->addDays(1),
			'to'		=> Carbon::now()->addDays(1),
		], true);
		return parent::__construct($attributes);
	}

	public function User()
	{
		return $this->belongsTo('\App\User');
	}

	public function scopeUpcomingVacations($query)
	{
		$StartDate = Carbon::now();
		$EndDate = Carbon::now()->addMonth();
		return $query->where('from', '>', $StartDate)->where('from', '<', $EndDate)->where('status', '=', static::STATUS_APPROVED)->where('type', static::TYPE_VACATION);
	}

	public function scopeUpcomingHolidays($query)
	{
		$StartDate = Carbon::now();
		$EndDate = Carbon::now()->addMonth();
		return $query->where('from', '>', $StartDate)->where('from', '<', $EndDate)->where('status', '=', static::STATUS_APPROVED)->where('type', static::TYPE_HOLIDAY);
	}

	public function scopeRequests($query)
	{
		return $query->where('status', '=', static::STATUS_PENDING)->where('type', static::TYPE_VACATION);
	}

	public function scopeVacations($query)
	{
		return $query->where('type', static::TYPE_VACATION);
	}

	public function scopeHolidays($query)
	{
		return $query->where('type', static::TYPE_HOLIDAY);
	}
}
