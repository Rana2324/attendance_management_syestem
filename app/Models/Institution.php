<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }


    public function institutionAdmins()
    {
        return $this->belongsTo(InstitutionAdmin::class);
    }


    public function institutionNotifications()
    {
        return $this->hasMany(InstitutionNotification::class);
    }
}
