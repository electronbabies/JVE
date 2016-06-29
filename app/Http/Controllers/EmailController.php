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
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends StaticController
{

    public static function send($subject, $body, $to)
    {

        Mail::raw($body,function($message){
            $message->to("eddiecantu@gmail.com", $name = null);
            $message->subject("testSubject");
        });
    }
}