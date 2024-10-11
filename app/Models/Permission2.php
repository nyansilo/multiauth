<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission2 extends Model
{
    use HasFactory;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }


    public function admins()
    {
        return $this->belongsToMany(Admins::class, 'admins_permissions');
    }
}
