<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Department;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;

class Admin extends Authenticatable implements LaratrustUser
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRolesAndPermissions;
    //HasRolesAndPermissions;
    use SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'admin';
    protected $fillable = [
        'first_name',
        'last_name',
        'slug',
        'phone_number',
        'email',
        'password',
        'token',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Set up User - Department Relationship.
     * One User Belong to One Department.
     */
    public function department(): BelongsTo{
        return $this->belongsTo(Department::class, 'department_id');
    }




     /**
     * Set up Admin/Author- Blogs  Relationship.
     * One User will have many properties.
     */

     public function products()
     {
         return $this->hasMany(Product::class, 'author_id');
     }
 
     public function getFullNameAttribute($value)
     {
         $firstName = $this->first_name;
         $lastName  = $this->last_name;
         $fullName  = $firstName ." ".$lastName;
 
         return $fullName; 
     }
 
     public function getDefaultProfileAttribute($value){
 
              $directory = config('cms.image.directory');
              $imageUrl = asset("{$directory}/"."profileImg.png");
              return $imageUrl;
     }
 
     public function getProfileUrlAttribute($value)
     {
     
         $imageUrl = "";
 
         //Make sure the owner has image
         if ( ! is_null($this->profile_picture))
         {
             $directory = config('cms.image.directory');
             //public_path() is helper function for site public directory
             //{$directory}/ is simple (img) folder where image get stored
             //$this->propertyImages[0]->image is the image itself
             //this keyword refer this Model(Property)
             $imagePath = public_path() . "/{$directory}/" . $this->profile_picture;
             //then if imagePath exist in the server we return the imageUrl
             if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $this->profile_picture);
 
         }
 
         return $imageUrl;
     }
 }

