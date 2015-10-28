<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
	const MESSAGE_SUCCESS = 'Success';
	const MESSAGE_ERROR = 'Error';
	const MESSAGE_INFO = 'Info';
	const MESSAGE_WARNING = 'Warning';

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
