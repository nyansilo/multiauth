<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnitStoreRequest;
use App\Http\Requests\UnitUpdateRequest;
use App\Http\Requests\UnitDestroyRequest;

class UnitController extends BackendController 
{
    protected $limit = 5; 

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$units      = Unit::with('products')->orderBy('title')->paginate($this->limit);
        $units      = Unit::latest()->get();
        $unitsCount = Unit::count();

        return view("admin.unit.index", compact('units', 'unitsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $unit = new Unit();
        return view("admin.unit.create", compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(UnitStoreRequest $request)
    {
        Unit::create($request->all());

        $notification = array(
            'message' => 'New unit was created successfully!',
            'alert-type' => 'success'
        );
        return redirect("/admin/unit")->with($notification);


        //return redirect("/admin/unit")->with("message", "New unit was created successfully!");
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
        $unit = Unit::findOrFail($id);

        return view("admin.unit.edit", compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitUpdateRequest $request, $id)
    {
        Unit::findOrFail($id)->update($request->all());

        return redirect("/admin/unit")->with("message", "Unit was updated successfully!");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitDestroyRequest $request, $id)
    {
        Product::withTrashed()
        ->where('unit_id', $id)
        ->update(['unit_id' => config('cms.default_unit_id')]);

        $unit = Unit::findOrFail($id);
        $unit->delete();


        $notification = array(
            'message' => 'Unit Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect("/admin/unit")->with($notification);

        //return redirect("/admin/unit")->with("message", "Unit was deleted successfully!");
    }
}
