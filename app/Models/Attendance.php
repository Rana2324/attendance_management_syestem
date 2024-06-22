<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','is_present','is_late','date'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
