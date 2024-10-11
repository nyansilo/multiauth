<?php


//Command: php artisan make:controller 'Admin\BackendController'
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{

    protected $uploadPath;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('check-permissions');
        $this->uploadPath = public_path(config('cms.image.directory'));
    }
}
