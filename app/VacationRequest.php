<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class VacationRequest extends Model
{
	protected $table = 'vacation_requests';
	protected $dates = ['created_at', 'updated_at', 'from', 'to'];

	public function __construct($attributes = [])
	{
		$this->setRawAttributes([
			'from' 		=> Carbon::now(),
			'to'		=> Carbon::now()->addDays(1),
		], true);
		return parent::__construct($attributes);
	}

	public function User()
	{
		return $this->belongsTo('\App\User');
	}
}
