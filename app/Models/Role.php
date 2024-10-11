<?php

namespace App\Models;

use Laratrust\Models\Role as RoleModel;

class Role extends RoleModel
{

    protected $fillable = [
        'name','slug','display_name','description',
    ];
}