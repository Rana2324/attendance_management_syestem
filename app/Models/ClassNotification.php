<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassNotification extends Model
{
    use HasFactory;
    protected $fillable = ['class_id','notification_id'];

    public function classModel()
    {
        return $this->hasMany(ClassModel::class);
    }


    public function notification()
    {
        return $this->hasOne(Notification::class);
    }
}
