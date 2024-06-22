<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email'];

    // A class has many students
    public function students()
    {
        return $this->belongsTo(Student::class);
    }


    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }


    public function classNotifications()
    {
        return $this->belongsTo(ClassNotification::class);
    }
}
