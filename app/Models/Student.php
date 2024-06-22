<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','image','institution_id','class_id','password'];
    public function institution()
    {
        return $this->hasOne(Institution::class);
    }


    public function class(){

        return $this->hasOne(ClassModel::class);
    }


    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }


    public function studentNotifications()
    {
        return $this->hasMany(StudentNotification::class);
    }

}
