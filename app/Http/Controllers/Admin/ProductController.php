<?php

 //Command: php artisan make:controller 'Admin\ProductController' --resource

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image;

class ProductController extends BackendController
{
    
    //protected $limit = 5; 
    protected $uploadPath;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //$this->middleware('auth:admin');
    //     $this->uploadPath = public_path(config('cms.image.directory'));
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
            //$products       = Product::onlyTrashed()->with('category', 'author')->latest()->paginate($this->limit);
            $products       = Product::onlyTrashed()->with('category', 'author')->latest()->get();
            $productCount   = Product::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        elseif ($status == 'published')
        {
            //$products       = Product::published()->with('category', 'author')->latest()->paginate($this->limit);
            $products       = Product::published()->with('category', 'author')->latest()->get();
            $productCount   = Product::published()->count();
        }
        elseif ($status == 'scheduled')
        {
            //$products       = Product::scheduled()->with('category', 'author')->latest()->paginate($this->limit);
            $products       = Product::scheduled()->with('category', 'author')->latest()->get();
            $productCount   = Product::scheduled()->count();
        }
        elseif ($status == 'draft')
        {
            //$products       = Product::draft()->with('category', 'author')->latest()->paginate($this->limit);
            $products       = Product::draft()->with('category', 'author')->latest()->get();
            $productCount   = Product::draft()->count();
        }
         elseif ($status == 'own')
        {
            //$products       = $request->user()->products()->with('category', 'author')->latest()->paginate($this->limit);
            $products       = $request->user()->products()->with('category', 'author')->latest()->get();
            $productCount   = $request->user()->products()->count();
        }
        else
        {
            //$products       = Product::with('category', 'author')->latest()->paginate($this->limit);
            $products       = Product::with('category', 'author')->latest()->get();
            $productCount   = Product::count();
        }

        $statusList = $this->statusList($request);

        //$products = Product::with('category','author')->latestFirst()->paginate($this->limit);
        return view('admin.product.index', compact('products','productCount','onlyTrashed','statusList'));
    }



    private function statusList($request)
    {
        return [
            'own'       => $request->user()->products()->count(),
            'all'       => Product::count(),
            'published' => Product::published()->count(),
            'scheduled' => Product::scheduled()->count(),
            'draft'     => Product::draft()->count(),
            'trash'     => Product::onlyTrashed()->count(),
        ];
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
         $product = new Product();
      

         return view('admin.product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

         //below lines of code can be put in the request folder to make controller cleaner
         /*$this->validate($request, [
            'title'        => 'required',
            'slug'         => 'required|unique:products',
            'body'         => 'required',
            'published_at' => 'date_format:Y-m-d H:i:s',
            'category_id'  => 'required'
         ]);*/

         $data = $this->handleRequest($request);
         $request->user()->products()->create($data);
         return redirect('/admin/product')->with('message', 'Your product was created successfully!');
    }

    private function handleRequest($request)
    {
        $data = $request->all();

        if ($request->hasFile('image'))
        {
            $image       = $request->file('image');
            $fileName    = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $successUploaded = $image->move($destination, $fileName);

            if ($successUploaded)
            {
                $width     = config('cms.image.thumbnail.width');
                $height    = config('cms.image.thumbnail.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

                Image::make($destination . '/' . $fileName)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }

            $data['image'] = $fileName;
        }

        return $data;
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
        $product = Product::findOrFail($id);
        return view("admin.product.edit", compact('product'));
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
        $product     = Product::findOrFail($id);
        $oldImage = $product->image;
        $data     = $this->handleRequest($request);
        $product->update($data);

        if ($oldImage !== $product->image) {
            $this->removeImage($oldImage);
        }

        $notification = array(

            'message' => 'Your product was updated successfully!',
            'alert-type'=> 'success'
        );
        //return redirect('/admin/product')->with($notification);
        return redirect('/admin/product')->with('message', 'Your product was updated successfully!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect('/admin/product')->with('trash-message', ['Your product has moved to Trash', $id]);
    }


    public function forceDestroy($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        //dd($product->image);
        $product->forceDelete();


        $this->removeImage($product->image);

        return redirect('/admin/product?status=trash')->with('message', 'Your product has been deleted successfully');
    }
   


    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->back()->with('message', 'You product has been moved from the Trash');
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
