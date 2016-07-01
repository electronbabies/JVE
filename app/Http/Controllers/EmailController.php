<?php
/**
 * Created by PhpStorm.
 * User: eddie_000
 * Date: 6/29/2016
 * Time: 2:16 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Mail;
use Log;
use Illuminate\Http\Request;

class EmailController extends StaticController
{

    public static function sendRentalsEmail($formData)
    {
        Log::useFiles(storage_path().'/logs/laravel.log');
        Log::info($formData);
        $sent = Mail::send('emails.rentals', $formData, function($message)
        {
            $message->from('no-reply@jveequipment.com');
            $message->to('eddiecantu@gmail.com')->subject('New Rental Request');
        });
    }
}