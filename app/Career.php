<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'careers';
    protected $dates = ['created_at', 'updated_at'];

    const STATUS_ENABLED = 'Enabled';
    const STATUS_DELETED = 'Deleted';
}
