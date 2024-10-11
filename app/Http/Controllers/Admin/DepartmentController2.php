<?php

 //Command: php artisan make:controller 'Admin\DepartmentController' --resource


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Http\Requests\DepartmentDestroyRequest ;


class DepartmentController extends BackendController 
{
    protected $limit = 5; 

     public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->uploadPath = public_path(config('cms.image.directory'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$departments      = Department::with('products')->orderBy('title')->paginate($this->limit);
        $departments      = Department::latest()->get();
        $departmentsCount = Department::count();

        return view("admin.department.index", compact('departments', 'departmentsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $department = new Department();
        return view("admin.department.create", compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(DepartmentStoreRequest $request)
    {
        Department::create($request->all());

        $notification = array(
            'message' => 'New department was created successfully!',
            'alert-type' => 'success'
        );
        return redirect("/admin/department")->with($notification);


        //return redirect("/admin/department")->with("message", "New department was created successfully!");
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
        $department = Department::findOrFail($id);

        return view("admin.department.edit", compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentUpdateRequest $request, $id)
    {
        Department::findOrFail($id)->update($request->all());

        return redirect("/admin/department")->with("message", "Category was updated successfully!");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartmentDestroyRequest $request, $id)
    {
        User::withTrashed()
        ->where('department_id', $id)
        ->update(['department_id' => config('cms.default_department_id')]);

        $department = Department::findOrFail($id);
        $department->delete();


        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect("/admin/department")->with($notification);

        //return redirect("/admin/department")->with("message", "Category was deleted successfully!");
    }
}
