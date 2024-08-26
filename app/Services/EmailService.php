<?php
namespace App\Services;

use App\Jobs\SendAdminCreationMailJob;

class EmailService
{
    public static function sendCreationMailToAdmin( $institutionAdmin, $password )
    {

        SendAdminCreationMailJob::dispatch( $institutionAdmin, $password );
    }

}
