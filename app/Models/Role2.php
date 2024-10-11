<?php

//Command: php artisan make:model Role 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role2 extends Model
{
    use HasFactory;

    protected $fillable = [
            'name','slug','description'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    // public function allRolePermissions()
    // {
    //     return $this->belongsToMany(Permission::class, 'role_permissions');
    // }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admins_roles');
    }
 }
