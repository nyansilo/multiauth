<?php

 //Command: php artisan make:controller 'Admin\RoleController' --resource


namespace App\Http\Controllers\Admin;


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

        return view("admin.role.index", compact('roles', 'rolesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        return view("admin.role.create", compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          //validate the role fields
        $data = $request->validate([
            'name'          => 'required|max:255',
            'slug'          => 'required|max:255',
            'display_name'  => 'required|max:255'
        ]);

        Role::create($data);

        return to_route('admin.role.index')->with("message", "New role was created successfully!");
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
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view("admin.role.edit", compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //validate the permission fields
        $data = $request->validate([
            'name'          => 'required|max:255',
            'slug'          => 'required|max:255',
            'display_name'  => 'required|max:255',
            'description'   => 'required|max:255'
        ]);

        $role->update($data);
        return to_route('admin.role.index')->with("message", "A role was updated successfully!");
    }

    public function assignPermissions(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        return to_route('admin.role.index')->with('message', 'Permissions added to a role');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        
        $role->delete();
        return to_route('admin.role.index')->with("message", "Role was deleted successfully!");
    }
}
