<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionNotification extends Model
{
    use HasFactory;
    protected $fillable = ['institution_id','notification_id'];

    public function institution()
    {
        return $this->hasMany(Institution::class);
    }


    public function notification()
    {
        return $this->hasOne(Notification::class);
    }
}
