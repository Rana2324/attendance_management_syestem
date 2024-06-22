<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','date'];

    public function institutionNotifications()
    {
        return $this->belongsTo(InstitutionNotification::class);
    }


    public function classNotifications()
    {
        return $this->belongsTo(ClassNotification::class);
    }


    public function studentNotifications()
    {
        return $this->belongsTo(StudentNotification::class);
    }
}
