<?php

////Command: php artisan make:controller 'Admin\AdminController' --resource

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Department;
use Illuminate\Http\Request;
use Laratrust\Models\Permission;
use App\Models\User as UserModel;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\AdminDestroyRequest;
use App\Http\Controllers\Admin\BackendController;
use App\Models\Product;

class AdminController extends BackendController 
{
    protected $limit = 5; 

    //  public function __construct()
    // {
    //     //$this->middleware('auth:admin');
    //     //$this->uploadPath = public_path(config('cms.image.directory'));
    // }

  
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {   

         $onlyTrashed = FALSE;

        if (($status = $request->get('status')) && $status == 'trash')
        {
            //$users       = User::onlyTrashed()->with('department', )->latest()->paginate($this->limit);
            $admins       = Admin::onlyTrashed()->with('department')->get();
            $adminsCount   = Admin::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        else
        {
            //$users       = User::with('department', )->latest()->paginate($this->limit);
            $admins     = Admin::orderBy('first_name')->get();
            $adminsCount = Admin::count();

        }
    

        $statusList = $this->statusList($request);

        //$users = User::with('department',)->latestFirst()->paginate($this->limit);
        return view("admin.administrator.index", compact('admins', 'adminsCount','onlyTrashed','statusList'));
        
    
    }



    private function statusList($request)
    {
        return [
            
            'all'       => Admin::count(),
            'trash'     => Admin::onlyTrashed()->count(),
        ];
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if($request->ajax()){
            $roles = Role::where('id', $request->role_id)->first();
            $permissions = $roles->permissions;

            return $permissions;
        }
        $roles = Role::all();
        $departments = Department::all();
        $admin = new Admin();
        return view("admin.administrator.create", compact('admin','roles','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        //Admin::create($request->all());

         //$data = $request->all();
         //$data['password'] = bcrypt($data['password']);

         $admin = new Admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->slug = $request->slug;
        $admin->email = $request->email;
        $admin->position = $request->position;
        $admin->bio = $request->bio;
        $admin->phone_number = $request->phone_number;
        $admin->department_id = $request->department_id;

        if($request->password != null ){
            $admin->password = Hash::make($request->password);
        }


         //$admin = Admin::create($data);
        //$admin = Admin::create($request->all());
        //$admin->attachRole($request->role);

        $admin->save();

        if($request->role != null){
             $admin->roles()->attach($request->role);
             $admin->save();
        }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                 $admin->permissions()->attach($permission);
                 $admin->save();
            }
        }

        return redirect("/admin/admin")->with("message", "New admin was created successfully!");
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
        $admin = Admin::findOrFail($id);
        $roles = Role::get();
        $departments = Department::all();
        $adminRole = $admin->roles->first();
        if($adminRole != null){
            $rolePermissions = $adminRole->permissions;
        }else{
            $rolePermissions = null;
        }
        $adminPermissions = $admin->permissions;


        return view("admin.administrator.edit", compact('admin','roles','adminRole','rolePermissions','adminPermissions','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        //Admin::findOrFail($id)->update($request->all());

        $admin = Admin::findOrFail($id);
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->slug = $request->slug;
        $admin->email = $request->email;
        $admin->position = $request->position;
        $admin->bio = $request->bio;
        $admin->phone_number = $request->phone_number;
        $admin->department_id = $request->department_id;

        if($request->password != null ){
            $admin->password = Hash::make($request->password);
        }

     

        //$admin->update($request->all());
        $admin->save();

       

         $admin->roles()->detach();
         $admin->permissions()->detach();

        if($request->role != null){
             $admin->roles()->attach($request->role);
             $admin->save();
        }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                 $admin->permissions()->attach($permission);
                 $admin->save();
            }
        }

        return redirect("/admin/admin")->with("message", "Admin was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminDestroyRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $deleteOption  = $request->delete_option;
        $selectedAdmin  = $request->selected_admin;

        if ($deleteOption == "delete") {
            // delete user blogs
            $admin->blogs()->withTrashed()->forceDelete();
        }
        elseif ($deleteOption == "attribute") {
            $admin->blogs()->update(['author_id' => $selectedAdmin]);
        }

        $admin->roles()->detach();
        $admin->permissions()->detach();
        $admin->delete();

        return redirect("/admin/admin")->with("message", "Admin was deleted successfully!");
    }

    public function confirm(AdminDestroyRequest $request, $id)
    {   

        $admin  = Admin::findOrFail($id);
        $admins = Admin::where('id', '!=', $admin->id)->pluck('email', 'id');

        return view("admin.administrator.confirm", compact('admin', 'admins'));
    }


    public function forceDestroy($id)
    {
        $admin = Admin::withTrashed()->findOrFail($id);
        //dd($product->image);
        $admin->forceDelete();


        //$this->removeImage($admin->profile_image);

        return redirect('/admin/admin?status=trash')->with('message', 'Your admin has been deleted successfully');
    }
   


    public function restore($id)
    {
        $admin = Admin::withTrashed()->findOrFail($id);
        $admin->restore();

        return redirect()->back()->with('message', 'You admin has been moved from the Trash');
    }
    private function removeImage($image)
    {
        if ( ! empty($image) )
        {
            $imagePath     = $this->uploadPath . '/' . $image;
           
            $ext           = substr(strrchr($image, '.'), 1);
            $thumbnail     = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if ( file_exists($imagePath) ) unlink($imagePath);
            if ( file_exists($thumbnailPath) ) unlink($thumbnailPath);
        }
    }
}
