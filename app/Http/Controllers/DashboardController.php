<?php

namespace App\Http\Controllers;

use App\Services\DashboardServices;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class DashboardController
{
    function dashboardCounts(){

       try {
            $dasboardServices = new DashboardServices();
            $dashboardCounts = $dasboardServices->dashboardCounts();
            return sendSuccessResponse("Dashboard Count data Success", $dashboardCounts);

       } catch (\Exception $ex) {
            return sendErrorResponse("Failed to count :" . $ex->getMessage());
        }


    }

}
