<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN       = 'ADMIN';
    const STUDENT     = 'STUDENT';
    const TEACHER     = 'TEACHER';
    const SUPER_ADMIN = 'SUPER_ADMIN';

    use HasFactory;
    protected $fillable = ['name'];
    public function users()
    {
        return $this->hasMany( User::class, 'role_id', 'id' );
    }

}
