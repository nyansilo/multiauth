<?php

//Command: php artisan make:model ProductCategory

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];


//================== MODEL RELATIONSHIPS STARTS =========================A

    /**
     * Set up ProductCategory - Product Relationship.
     * One PProductCategory has many Products
     */
    public function users():HasMany {

        return $this->hasMany(User::class,'department_id');
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
     * public function productDetail(product $product){
     *      return view('theme.home.product_detail', compact('product')); 
     *  }
     * Another of doing model binding is by RouteServiceProvider in the Provider file:
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

    //===================== OTHER FUNCTION START =============================

    /**
     * This functions is used to put plural for the case where product > 1
     * It accept the label name to be changed bassed on number of counts  
     * if count>1 plural form otherwise singular form
     * strl_plural() is helper function which check on the count then assign
     * the appropiate display format
     */
    public function usersNumber($label = 'user')
    {
        $usersNumber = $this->users()->count();

        return $usersNumber. " " . Str::plural($label, $usersNumber);
    }

  

}
