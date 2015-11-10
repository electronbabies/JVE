<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class GalleryImage extends Model
{
	const GALLERY_FRONT_PAGE_SETTINGS = 'GalleryFrontPage';
    protected $table = 'gallery';

    protected $dates = ['created_at', 'updated_at', 'sold_at'];

    public function scopeNewAndRecentlySold($query)
	{
		return $query->where('sold_at', '>', Carbon::today()->subMonth())->orWhere('sold', 0);
	}

	const FIELD_MAST_HEIGHT 		= 'Mast Height';
	const FIELD_MAKE 				= 'Make';
	const FIELD_MODEL				= 'Model';
	const FIELD_SERIAL 				= 'Serial';
	const FIELD_WARRANTY 			= 'Warranty';
	const FIELD_PRICE				= 'Price';
	const FIELD_HOURS				= 'Hours';
	const FIELD_YEAR				= 'Year';
	const FIELD_SOLD				= 'Sold';

	static $tFields = [
		self::FIELD_MAST_HEIGHT,
		self::FIELD_MAKE,
		self::FIELD_MODEL,
		self::FIELD_SERIAL,
		self::FIELD_WARRANTY,
		self::FIELD_PRICE,
		self::FIELD_HOURS,
		self::FIELD_YEAR,
		self::FIELD_SOLD,
	];

	function IsFieldSet($Field)
	{
		$tFields = explode('|', $this->front_page_visibility);

		return in_array($Field, $tFields);
	}
}
