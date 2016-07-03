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
        Mail::send('emails.rentals', $formData, function($message)
        {
            $message->from('no-reply@jveequipment.com');
            $message->to('eddiecantu@gmail.com')->subject('New Rental Request');
        });
    }

    public static function sendServiceEmail($formData)
    {
        Mail::send('emails.service', $formData, function($message)
        {
            $message->from('no-reply@jveequipment.com');
            $message->to('eddiecantu@gmail.com')->subject('New Service Request');
        });
    }

    public static function sendPartsEmail($formData)
    {
        Mail::send('emails.parts', $formData, function($message)
        {
            $message->from('no-reply@jveequipment.com');
            $message->to('eddiecantu@gmail.com')->subject('New Parts Request');
        });
    }

    public static function sendSalesEmail($formData)
    {
        Mail::send('emails.sales', $formData, function($message)
        {
            $message->from('no-reply@jveequipment.com');
            $message->to('eddiecantu@gmail.com')->subject('New Sales Request');
        });
    }

    public static function sendResumeEmail($formData, $file)
    {
        Mail::send('emails.application', $formData, function($message) use ($formData, $file)
        {
            $message->from('no-reply@jveequipment.com');
            $message->to('eddiecantu@gmail.com')->subject('New Career Application');
            $message->attach($file->getRealPath(), array(
                    'as' => 'resume.' . $file->getClientOriginalExtension(),
                    'mime' => $file->getMimeType())
            );
        });
    }
}