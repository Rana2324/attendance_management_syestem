<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionAdmin extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'institution_id', 'password'];

    public function institution()
    {
        return $this->belongsTo( Institution::class );
    }
}
