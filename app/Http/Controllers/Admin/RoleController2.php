<?php

 //Command: php artisan make:controller 'Admin\RoleController' --resource


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Http\Requests\RoleDestroyRequest ;


class RoleController extends BackendController 
{
    protected $limit = 5; 

     //public function __construct()
    //{
        //$this->middleware('auth:admin');
        //$this->uploadPath = public_path(config('cms.image.directory'));
   // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$roles      = Role::with('permissions')->orderBy('name')->paginate($this->limit);

        $roles      = Role::with('permissions')->orderBy('name')->get();
        $rolesCount = Role::count();

        return view("admin.admin_role.index", compact('roles', 'rolesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $role = new Role();
        return view("admin.admin_role.create", compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(RoleStoreRequest $request)
    {

          //validate the role fields
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255'
        ]);

        //$data = $request->all();
        $role = new Role();


        $role->name = $request->name;
        $role->slug = $request->slug;
        $role-> save();

        //$role->create($data);

        $listOfPermissions = explode(',', $request->permissions);//create array from separated/coma permissions
        
        foreach ($listOfPermissions as $permission) {
            $permissions = new Permission();
            $permissions->name = $permission;
            $permissions->slug = strtolower(str_replace(" ", "-", $permission));
            $permissions->save();
            $role->permissions()->attach($permissions->id);
            $role->save();
        }    

        return redirect("/admin/admin_role")->with("message", "New role was created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view("admin.admin_role.edit", compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();

        $role->permissions()->delete();
        $role->permissions()->detach();

        $listOfPermissions = explode(',', $request->permissions);//create array from separated/coma permissions
        
        foreach ($listOfPermissions as $permission) {
            $permissions = new Permission();
            $permissions->name = $permission;
            $permissions->slug = strtolower(str_replace(" ", "-", $permission));
            $permissions->save();
            $role->permissions()->attach($permissions->id);
            $role->save();
        }    

        return redirect("/admin/admin_role")->with("message", "Role was updated successfully!");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $role = Role::findOrFail($id);
     
        $role->permissions()->delete();
        $role->delete();
        $role->permissions()->detach();


        return redirect("/admin/admin_role")->with("message", "Role was deleted successfully!");
    }
}
