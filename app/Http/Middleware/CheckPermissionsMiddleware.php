<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        

        // current user
        $currentUser = $request->user();

        

       // dd($request->route()->getActionName());
       // current action name
        $currentActionName = $request->route()->getActionName();
        list($controller, $method) = explode('@', $currentActionName);
        $controller = str_replace(["App\\Http\\Controllers\\Admin\\", "Controller"], "", $controller);
        //dd("C: $controller M: $method ");
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
            //if (in_array($method, $methods)) {
            if (in_array($method, $methods) && isset($classesMap[$controller])) {
           
                $className = $classesMap[$controller];
                //dd("{$permission}-{$className}");

                //dd($currentUser->permissions);
                //$perm = "{$permission}-{$className}";

                


                //dd($perm);
                  //dd($currentUser->can($perm));


               //dd($currentUser->can("{$permission}-{$className}"));
    
        
               
                    // if the user has not permission don't allow the next request
                    if (!$currentUser->hasPermission("{$permission}-{$className}")) {
                        //return false;
                        //redirect()->back();
                        abort(403, "Forbidden Access!");
                    }
    
                    break;
            }
        }




        // if ( ! check_user_permissions($request)) {
        //     abort(403, "Forbidden access!");
        // }

        return $next($request);
    }
}
