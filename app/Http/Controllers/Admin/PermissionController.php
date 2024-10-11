<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends BackendController 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions      = Permission::all();
        return view("admin.permission.index", compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = new Permission();
        return view("admin.permission.create", compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the permission fields
        $data = $request->validate([
            'name'          => 'required|max:255',
            'slug'          => 'required|max:255',
            'display_name'  => 'required|max:255',
            'description'  => 'required|max:255'
        ]);

        Permission::create($data);

        return to_route('admin.permission.index')->with("message", "New permission was created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view("admin.permission.edit", compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //validate the permission fields
        $data = $request->validate([
            'name'          => 'required|max:255',
            'slug'          => 'required|max:255',
            'display_name'  => 'required|max:255',
            'description'   => 'required|max:255'
        ]);

        $permission->update($data);
        return to_route('admin.permission.index')->with("message", "A permission was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
