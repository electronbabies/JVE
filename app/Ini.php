<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ini extends Model
{
    protected $table = 'ini';

    protected $dates = ['created_at', 'updated_at'];
}
