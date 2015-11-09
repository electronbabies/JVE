<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	protected $table = 'documents';

	protected $dates = ['created_at', 'updated_at'];

	// Relationships
	public function User()
	{
		return $this->belongsTo('App\User');
	}
}
