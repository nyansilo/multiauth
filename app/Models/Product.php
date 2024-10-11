<?php

//Command: php artisan make:model Product

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 
use App\Models\ProductCategory;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use GrahamCampbell\Markdown\Facades\Markdown;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name', 
        'slug', 
        'quantity',
        'unit_id',
        'brand',
        'description', 
        'image', 
        'published_at', 
        'category_id', 
        'view_count',
        'published_at',
        'deleted_at'
    ];
   

    

    protected $casts = [
        'published_at'=>'datetime',
        'deleted_at' => 'datetime'
    ];

    //================== MODEL RELATIONSHIPS STARTS =========================

    /**
     * Set up Product-  Author/Admin Relationship.
     * One Product Belong to One Admin/Author.
     */
    public function author(): BelongsTo{
        return $this->belongsTo(Admin::class, 'author_id');
    }

    
    /**
     * Set up Product - ProductCategory Relationship.
     * One Product Belong to One ProductCategory.
     */
    public function category(): BelongsTo{
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }


   /** Set up Product - ProductCategory Relationship.
    * One Product Belong to One ProductCategory.
    */
   public function unit(): BelongsTo{
       return $this->belongsTo(Unit::class, 'unit_id');
   }

    //===================== SCOPE MODEL START ===============================

    /**
     * Scope Model are functions that will used in the Controller to filetr the 
     * query based on the condition defined: Decleared in the model but used in 
     * the controller when chaining the eloquent query.
     * The function must start with scope keyword and followed by any name:
     * the name used after the scope keyword will be used in the controller:eg
     * public function featuredProperties()
     * {
     *      $featuredProperties  = 
     * Property::with('owner','district','region','category')
     *                ->featured()
     *                ->paginate(3);     
     *   return *view("theme.home.index",compact('$featuredProperties'));   
     * }
     */

     public function scopeLatestFirst($query){ 
        return $query->orderBy('created_at','desc');

    }

    public function scopePopular($query){
        return $query->orderBy('view_count','desc');

    }


    public function scopeRelatedPost($query, $count = 6, $inRandomOrder = true)
    {
        $query = $query->where('category_id', $this->category_id)
                       ->where('slug','!=',$this->slug);

        if ($inRandomOrder) {
            $query->inRandomOrder();
            //$query->orderByRaw('RAND()');
        }

        return $query->take($count);
    }


    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }

    public function scopeScheduled($query)
    {
        return $query->where("published_at", ">", Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }

    public function scopeFilter($query, $term)
    {
        // check if any term entered
        if ($term)
        {
            $query->where(function($q) use ($term) {
                // $q->whereHas('author', function($qr) use ($term) {
                //     $qr->where('name', 'LIKE', "%{$term}%");
                // });
                // $q->orWhereHas('category', function($qr) use ($term) {
                //     $qr->where('title', 'LIKE', "%{$term}%");
                // });
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('excerpt', 'LIKE', "%{$term}%");
            });
        }
    } 




    //===================== MODEL BINDING START =============================

    /**
     * This function is used for route model binding.That is instead of using id in the
     * url, we are using the slug field for SEO friendly,
     * There are two ways where model binding can be created
     * First method is using getRouteKeyName function and return the name of the field
     * public function getRouteKeyName()
     {
        return 'slug';  
     }
     * that will be used eg slug
     * Then inside the controller create a function that will take model as parameter 
     * instead of id:eg
     * public function propertyDetail(Property $property){
            return view('theme.home.property_detail', compact('property')); 
       }
     *Another of doing model binding is by RouteServiceProvider in the Provider file:
     * Then in the root function create the function as below:
     * public function boot()
     {
        Route::bind('post', function($slug) {
            return Post::published()->where('slug', $slug)->first();
        });

        parent::boot();
     }
     * where post will be the parameter passed in the web root
     * Route::get('/product/{post}', [
        'uses' => 'ProductController@productDetail',
        'as'   => 'product.detail'
     ]);
     *   
     */
    public function getRouteKeyName()
    {
        return 'slug';  
    }


    //===================== OTHER FUNCTIONS START =======================
     
  //===================== OTHER FUNCTIONS START =======================
     
  public function dateFormatted($showTimes = false)
  {
      $format = "d/m/Y";
      if ($showTimes) $format = $format . " H:i:s";
      return $this->created_at->format($format);
  }

  public function dateDisplay($showTimes = false)
  {
      $format = "F d, Y";
      if ($showTimes) $format = $format . " H:i:s";
      return $this->created_at->format($format);
  }

  public function publicationLabel()
  {
      if ( ! $this->published_at) {

          return '<span class="badge bg-warning mx-2 ">Draft</span>';
      }
      elseif ($this->published_at && $this->published_at->isFuture()) {
          return '<span class="badge bg-primary mx-2">Schedule</span>';
      }
      else {
          return '<span class="badge bg-success mx-2">Published</span>';
      }
  }




  public function productLabel($label = 'item')
  {
      $productQuantity = $this->quantity;

      if($this->unit->name == "PC"){
         $label = 'Pc';
      }elseif($this->unit->name == "REAM"){
        $label = 'Ream';
      }elseif($this->unit->name == "BOX"){
        $label = 'Box';
      }

      //return $productQuantity. " " . Str::plural($label, $productQuantity);
      return Str::plural($label, $productQuantity);
  }

 




  public function productsView($label = 'View')
  {
      $productsNumber = $this->view_count;

      return $productsNumber. " " . Str::plural($label, $productsNumber);
  }


  


     //===================== ACCESOR ATTRIBUTE FUNCTIONS START =======================


    /**
     * Accessor the way to display content in html/php page
     * you can call the accessor in html/php template by this eg: image_url
     * Then in the model you defined it by starting with get then ImageUrl in camelCase
     * followed by Attribute: eg
     * public function getImageUrl(){}
     */ 
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->image))
        {
            //public_path() is helper function for site public directory
            //{$directory}/ is simple (product_img) folder where image get stored
            //$this->image is the image itself
            //this keyword refer this Model(Property)
            $directory = config('cms.image.directory');
            $imagePath = public_path() . "/{$directory}/" . $this->image;
            //then if imagePath exist in the server we return the imageUrl
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $this->image);
        }

        return $imageUrl;
    }


    public function getDefaultImgAttribute($value){

             $directory = config('cms.image.directory');
             $imageUrl = asset("{$directory}/"."default-placeholder.png");
             return $imageUrl;
    }


    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->image))
        {
            $directory = config('cms.image.directory');
            $ext       = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;
            //then if imagePath exist in the server we return the imageUrl
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $thumbnail);
        }

        return $imageUrl;
    }

    public function getProfileUrlAttribute($value)
    {
    
        $imageUrl = "";

        //Make sure the owner has image
        if ( ! is_null($this->author->profile_picture))
        {
            $directory = config('cms.image.directory');
            //public_path() is helper function for site public directory
            //{$directory}/ is simple (img) folder where image get stored
            //$this->propertyImages[0]->image is the image itself
            //this keyword refer this Model(Property)
            $imagePath = public_path() . "/{$directory}/" . $this->author->profile_picture;
            //then if imagePath exist in the server we return the imageUrl
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $this->author->profile_picture);

        }

        return $imageUrl;
    }

   public function getDefaultProfileAttribute($value){

             $directory = config('cms.image.directory');
             $imageUrl = asset("{$directory}/"."profileImg.png");
             return $imageUrl;
    }


    public function getDateAttribute($value){
        //return $this->created_at->diffForHumans();
         return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

   /*  public function getBodyHtmlAttribute($value){
        return $this->description ? Markdown::convertToHtml(e($this->description)) : NULL; 
    } 

    public function getExcerptHtmlAttribute($value){
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL; 
    }  */

  
     public function getShortDescriptionAttribute($value)
    {
        //return Str::words($this->title, 3, '...');
        return Str::limit($this->description, 10, ' ...');
    }
     public function getSmallDescriptionAttribute($value)
    {
        //return Str::words($this->title, 3, '...');
        return Str::limit($this->description, 40, ' ...');
    }

    public function getMediumDescriptionAttribute($value)
    {
        //return Str::words($this->title, 3, '...');
        return Str::limit($this->description, 200, ' ...');
    }
   

    public function getFullNameAttribute($value)
    {
        $firstName = $this->author->first_name;
        $lastName  = $this->author->last_name;
        $fullName  = $firstName ." ".$lastName;

        return $fullName; 
    }
    public function getShortNameAttribute($value)
    {
        //return Str::words($this->title, 3, '...');
        return Str::limit($this->name, 20, ' ...');
    }


    public function getMediumNameAttribute($value)
    {
        //return Str::words($this->title, 3, '...');
        return Str::limit($this->name, 25, ' ...');
    }



   




    




}