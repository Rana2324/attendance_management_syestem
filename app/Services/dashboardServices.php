<?php
namespace App\Services;
use App\Models\Institution;
use App\Models\Student;
use App\Models\SuperAdmin;
use App\Models\Teacher;
class DashboardServices{
    function dashboardCounts(){
        return [
            "institutions" => Institution::count(),
            "teachers" => Teacher::count(),
            "students" => Student::count(),
            "super_admins" => SuperAdmin::count(),
        ];
    }
}
