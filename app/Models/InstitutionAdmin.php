<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionAdmin extends Model
{
    use HasFactory;
    protected $fillable = ['institution_id', 'user_id'];

    public function institution()
    {
        return $this->belongsTo( Institution::class );
    }
    public function user()
    {
        return $this->belongsTo( User::class, );
    }
}
