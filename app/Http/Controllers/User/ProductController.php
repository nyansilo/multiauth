<?php

//Command: php artisan make:controller 'User\PropertyController' --resource

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertySubCategory;
use App\Models\PropertyCategory;
use App\Http\Requests\PropertyRequest;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use File;

class PropertyController extends Controller 
{

    protected $limit = 5; 
    protected $uploadPath;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->uploadPath = public_path(config('cms.image.directory'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   


        
    }



    private function statusList($request)
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $property)
    {
         $property = new Product();
        
    }

   
 
  


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    
       
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
        $property = Product::findOrFail($id);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {

        

        
           
            
        
    }
   


    public function restore($id)
    {
        
    }
    private function removeImage($image)
    {
        
    }
}
