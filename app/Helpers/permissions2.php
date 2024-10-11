<?php

function check_user_permissions($request, $actionName = NULL, $id = NULL)
{
    // current user
    $currentUser = $request->user();

    // current action name
    if ($actionName) {
        $currentActionName = $actionName;
    }
    else {
        $currentActionName = $request->route()->getActionName();
    }
    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

    $crudPermissionsMap = [
        // 'create' => ['create', 'store'],
        // 'update' => ['edit', 'update'],
        // 'delete' => ['destroy', 'restore', 'forceDestroy'],
        // 'read'   => ['index', 'view']
        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
    ];

    $classesMap = [
        'Product'       => 'product',
        'ProductCategory' => 'productcategory',
        'User'      => 'user',
        'Admin' => 'admin',
        'Role' => 'role',
        'Department' => 'department',
        //'Order' => 'order',
        
    ];

    foreach ($crudPermissionsMap as $permission => $methods)
    {
        // if the current method exists in methods list,
        // we'll check the permission
        if (in_array($method, $methods) && isset($classesMap[$controller])) {

            $className = $classesMap[$controller];

           
                // if the user has not permission don't allow the next request
                if ( ! $currentUser->can("{$permission}-{$className}")) {
                    return false;
                    //redirect()->back();
                }

                break;
        }
    }

    return true;
}
