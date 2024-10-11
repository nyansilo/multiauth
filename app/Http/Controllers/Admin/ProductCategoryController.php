<?php

 //Command: php artisan make:controller 'Admin\ProductCategoryController' --resource


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Http\Requests\ProductCategoryDestroyRequest ;


class ProductCategoryController extends BackendController 
{
    protected $limit = 5; 

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories      = ProductCategory::with('products')->orderBy('title')->paginate($this->limit);
        $categories      = ProductCategory::latest()->get();
        $categoriesCount = ProductCategory::count();

        return view("admin.product_category.index", compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $category = new ProductCategory();
        return view("admin.product_category.create", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(ProductCategoryStoreRequest $request)
    {
        ProductCategory::create($request->all());

        $notification = array(
            'message' => 'New category was created successfully!',
            'alert-type' => 'success'
        );
        return redirect("/admin/product_category")->with($notification);


        //return redirect("/admin/product_category")->with("message", "New category was created successfully!");
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
        $category = ProductCategory::findOrFail($id);

        return view("admin.product_category.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryUpdateRequest $request, $id)
    {
        ProductCategory::findOrFail($id)->update($request->all());

        return redirect("/admin/product_category")->with("message", "Category was updated successfully!");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategoryDestroyRequest $request, $id)
    {
        Product::withTrashed()
        ->where('category_id', $id)
        ->update(['category_id' => config('cms.default_category_id')]);

        $category = ProductCategory::findOrFail($id);
        $category->delete();


        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect("/admin/product_category")->with($notification);

        //return redirect("/admin/product_category")->with("message", "Category was deleted successfully!");
    }
}
