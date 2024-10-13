<?php

 //Command: php artisan make:controller 'Admin\UserController' --resource

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\UserStoreRequest;

class UserController extends BackendController
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
            //$users       = User::onlyTrashed()->with('department', )->latest()->paginate($this->limit);
            $users       = User::onlyTrashed()->with('department')->latest()->get();
            $userCount   = User::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        else
        {
            //$users       = User::with('department', )->latest()->paginate($this->limit);
            $users       = User::with('department')->latest()->get();
            $userCount   = User::count();
        }

        $statusList = $this->statusList($request);

        //$users = User::with('department',)->latestFirst()->paginate($this->limit);
        return view('admin.user.index', compact('users','userCount','onlyTrashed','statusList'));
    }



    private function statusList($request)
    {
        return [
            
            'all'       => User::count(),
            'trash'     => User::onlyTrashed()->count(),
        ];
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
         $user = new User();
         $departments = Department::all();
      

         return view('admin.user.create', compact('user', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

         //below lines of code can be put in the request folder to make controller cleaner
         /*$this->validate($request, [
            'title'        => 'required',
            'slug'         => 'required|unique:users',
            'body'         => 'required',
            'published_at' => 'date_format:Y-m-d H:i:s',
            'department_id'  => 'required'
         ]);*/

         //$data = $request->all();
         //$data['password'] = bcrypt($data['password']);

        //dd($data);
        // $user = User::create($data);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->slug    = Str::slug($request->first_name."-".$request->first_name, "-");
        //$user->slug = $request->slug;
        $user->email = $request->email;
        $user->position = $request->position;
        $user->bio = $request->bio;
        $user->phone_number = $request->phone_number;
        $user->department_id = $request->department_id;

        if($request->password != null ){
            $user->password = Hash::make($request->password);
        }


        $user->save();

         //$data = $this->handleRequest($request);
         //$request->user()->users()->create($data);


         return redirect('/admin/user')->with('message', 'Your user was created successfully!');
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
        $user = User::findOrFail($id);
        $departments = Department::all();
        return view("admin.user.edit", compact('user', 'departments'));
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
        $user     = User::findOrFail($id);
        $oldImage = $user->image;
        
        //$data     = $this->handleRequest($request);
        //$user->update($data);
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->slug    = Str::slug($request->first_name."-".$request->first_name, "-");
        $user->email = $request->email;
        $user->position = $request->position;
        $user->bio = $request->bio;
        $user->phone_number = $request->phone_number;
        $user->department_id = $request->department_id;

        if($request->password != null ){
            $admin->password = Hash::make($request->password);
        }

        // if ($oldImage !== $user->image) {
        //     $this->removeImage($oldImage);
        // }
        $user->save();
        $notification = array(

            'message' => 'Your user was updated successfully!',
            'alert-type'=> 'success'
        );
        //return redirect('/admin/user')->with($notification);
        return redirect('/admin/user')->with('message', 'Your user was updated successfully!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect('/admin/user')->with('trash-message', ['Your user has moved to Trash', $id]);
    }


    public function forceDestroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        //dd($user->image);
        $user->forceDelete();


        $this->removeImage($user->profile_picture);

        return redirect('/admin/user?status=trash')->with('message', 'Your user has been deleted successfully');
    }
   


    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->back()->with('message', 'You user has been moved from the Trash');
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
