<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Mail;
use Log;
use Illuminate\Http\Request;

class EmailController extends StaticController
{

    static $tEmploymentTranslation = [
       'LastName' => 'Last Name',
       'FirstName' => 'First Name',
       'MiddleInitial' => 'Middle Initial',
       'StreetAddress' => 'Street Address',
       'Apartment' => 'Unit #',
       'City' => 'City',
       'State' => 'State',
       'Zip' => 'Zip',
       'Phone' => 'Phone',
       'EmailAddress' => 'Email Address',
       'DateAvailable' => 'Date Available',
       'TXDL' => "Texas Driver's License",
       'DesiredSalary' => 'Desired Salary',
       'PositionAppliedFor' => 'Position applied for',
       'Citizen' => 'Citizen of the U.S.?',
       'NonCitizenAuthorized' => 'If not citizen, authorized to work?',
       'WorkedCompany' => 'Worked for our company before?',
       'WhenWorkedCompany' => 'When did you work for this company?',
       'Felony' => 'Any felonies?',
       'FelonyReason' => 'Felony explanation:',
       'HighSchool' => 'Highschool name',
       'HighschoolAddress' => 'Highschool address',
       'HighschoolFrom' => 'Highschool start Date',
       'HighschoolTo' => 'Highschool end Date',
       'HighschoolGraduate' => 'Did you graduate highschool?',
       'HighSchoolDegree' => 'Highschool degree in?',
       'College' => 'College name',
       'CollegeAddress' => 'College address',
       'CollegeFrom' => 'College start Date',
       'CollegeTo' => 'College end Date',
       'CollegeGraduate' => 'Did you graduate College?',
       'CollegeDegree' => 'College degree in?',
       'Other' => 'Other education name',
       'OtherAddress' => 'Other education address',
       'OtherFrom' => 'Other education start date',
       'OtherTo' => 'Other education end date',
       'OtherGraduate' => 'Did you graduate (other)?',
       'OtherDegree' => 'With what degree (other)?',
       'Reference1FullName' => 'Reference1 Name',
       'Reference1Relationship' => 'Reference1 Relationship',
       'Reference1Company' => 'Reference1 Companny',
       'Reference1Phone' => 'Reference1 Phone',
       'Reference1Address' => 'Reference1 Address',
       'Reference2FullName' => 'Reference2 Name',
       'Reference2Relationship' => 'Reference2 Relationship',
       'Reference2Company' => 'Reference2 Companny',
       'Reference2Phone' => 'Reference2 Phone',
       'Reference2Address' => 'Reference2 Address',
       'Reference3FullName' => 'Reference3 Name',
       'Reference3Relationship' => 'Reference3 Relationship',
       'Reference3Company' => 'Reference3 Companny',
       'Reference3Phone' => 'Reference3 Phone',
       'Reference3Address' => 'Reference3 Address',
       'MilitaryBranch' => 'Military Branch',
       'MilitaryFrom' => 'Military start date',
       'MilitaryTo' => 'Military end date',
       'MilitaryRankDischarge' => 'Military rank when discharged',
       'MilitaryTypeDischarge' => 'Military type of discharge',
       'MilitaryNonHonorable' => 'Not honorable discharge? Reason:'
    ];

    public static function sendEmploymentApplication($formData) {
        unset($formData['RequestType']);

        Mail::send('emails.employment', ['Keys' => array_keys($formData), 'Values' => array_values($formData), 'Map' => static::$tEmploymentTranslation], function($message) {
            $message->from('no-reply@jveequipment.com');
            $tToEmails = env('EMPLOYMENT_EMAILS_TO') ? array_map('trim', explode(',', env('EMPLOYMENT_EMAILS_TO'))) : 'josh@jvequipment.com';

            $message->to($tToEmails)->subject('New Employment Application');
        });
    }

    public static function sendRentalsEmail($formData)
    {
        Mail::send('emails.rentals', $formData, function($message)
        {
            $message->from('no-reply@jveequipment.com');
            $tToEmails = env('RENTAL_EMAILS_TO') ? array_map('trim', explode(',', env('RENTAL_EMAILS_TO'))) : 'josh@jvequipment.com';

            $message->to($tToEmails)->subject('New Rental Request');
        });
    }

    public static function sendServiceEmail($formData)
    {
        Mail::send('emails.service', $formData, function($message)
        {
            $message->from('no-reply@jveequipment.com');
            $tToEmails = env('SERVICE_EMAILS_TO') ? array_map('trim', explode(',', env('SERVICE_EMAILS_TO'))) : 'josh@jvequipment.com';

            $message->to($tToEmails)->subject('New Service Request');
        });
    }

    public static function sendPartsEmail($formData)
    {
        Mail::send('emails.parts', $formData, function($message)
        {
            $message->from('no-reply@jveequipment.com');
            $tToEmails = env('PARTS_EMAILS_TO') ? array_map('trim', explode(',', env('PARTS_EMAILS_TO'))) : 'josh@jvequipment.com';

            $message->to($tToEmails)->subject('New Parts Request');
        });
    }

    public static function sendSalesEmail($formData)
    {
        Mail::send('emails.sales', $formData, function($message)
        {
            $message->from('no-reply@jveequipment.com');
            $tToEmails = env('SALES_EMAILS_TO') ? array_map('trim', explode(',', env('SALES_EMAILS_TO'))) : 'josh@jvequipment.com';

            $message->to($tToEmails)->subject('New Sales Request');
        });
    }

    public static function sendResumeEmail($formData, $file)
    {
        Mail::send('emails.application', $formData, function($message) use ($formData, $file)
        {
            $message->from('no-reply@jveequipment.com');
            $tToEmails = env('RESUME_EMAILS_TO') ? array_map('trim', explode(',', env('RESUME_EMAILS_TO'))) : 'josh@jvequipment.com';

            $message->to($tToEmails)->subject('New Career Application');
            $message->attach($file->getRealPath(), array(
                    'as' => 'resume.' . $file->getClientOriginalExtension(),
                    'mime' => $file->getMimeType())
            );
        });
    }
}