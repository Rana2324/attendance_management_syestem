<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phone','institution_id','class_id','password'];

    public function institution()
    {
        return $this->hasOne(Institution::class);
    }


    public function classModel()
    {
        return $this->hasMany(ClassModel::class);
    }
}
