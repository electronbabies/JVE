<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class GalleryImage extends Model
{
    protected $table = 'gallery';

    protected $dates = ['created_at', 'updated_at', 'sold_at'];

    public function scopeNewAndRecentlySold($query)
	{
		return $query->where('sold_at', '>', Carbon::today()->subMonth())->orWhere('sold', 0);
	}
}
