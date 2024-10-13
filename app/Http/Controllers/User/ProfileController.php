<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    protected $uploadPath;
    public function __construct()
    {  
        $this->uploadPath = public_path(config('cms.image.directory'));
    }

    public function profileIndex(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.profile.index',compact('profileData'));
    }// End Meth


    public function profileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->first_name    = $request->first_name;
        $data->last_name     = $request->last_name;
        $data->position      = $request->position;
        $data->email         = $request->email;
        $data->phone_number  = $request->phone_number;
        $data->bio           = $request->bio;

        if ($request->file('photo')) {
           $file = $request->file('photo');
           $filename = $file->getClientOriginalName();
           $destination = $this->uploadPath;
           $successUploaded = $file->move($destination, $filename);

           if ($successUploaded)
           {
               $width     = config('cms.image.thumbnail.width');
               $height    = config('cms.image.thumbnail.height');
               $extension = $file->getClientOriginalExtension();
               $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $filename);
   
               Image::make($destination . '/' . $filename)
                   ->resize($width, $height)
                   ->save($destination . '/' . $thumbnail);
           }
           $data['profile_picture'] = $filename; 
        }
        $data->save();
        return redirect()->back();

        
    }// End M
}
