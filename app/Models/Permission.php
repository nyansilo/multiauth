<?php

namespace App\Models;

use Laratrust\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{
    protected $fillable = [
        'name','slug','display_name','description',
    ];
}