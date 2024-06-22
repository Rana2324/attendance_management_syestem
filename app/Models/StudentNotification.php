<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentNotification extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','notification_id'];

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

}
