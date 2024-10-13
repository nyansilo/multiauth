<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/user/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth', 'verified'])->name('user.dashboard');

// Route::middleware('auth')->group(function () {
//      Route::get('/user/dashboard', [DashboardController::class, 'dashaboard'])->name('user.dashboard');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::group(

  [ 

  'namespace' => 'App\Http\Controllers\User',
  'middleware' => ['auth'], 
  'prefix' => 'user',
    ], 
  
  function () {
      //Dashborads Admin routes
     
      Route::get('/cart', 'CartController@index')->name('user.cart');
      Route::get('/checkout', 'CheckoutController@index')->name('user.checkout');
      Route::get('/dashboard', 'DashboardController@dashboard')->name('user.dashboard');
      Route::get('/thank-you', 'DashboardController@thankYou')->name('user.thankyou');
      Route::get('/order', 'OrderController@index')->name('user.order');


      //Admin Profile root
      Route::get('/profile', 'ProfileController@profileIndex')->name('user.profile');
      Route::post('/profile/store','ProfileController@profileStore')->name('user.profile.store');

      //propertyDetail
      Route::get('/product/{product}', [
          'uses' => 'DashboardController@productDetail',
          'as'   => 'product.detail'
      ]);

      //orderDetail
      Route::get('/order/{orderId}', [
          'uses' => 'OrderController@orderDetail',
          'as'   => 'user.order.detail'
      ]);

    }



  );


require __DIR__.'/auth.php';

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

/*---------------------End of Theme Front End Routes -----------------------*/


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/



require __DIR__.'/adminauth.php';

Route::group(
    [ 

    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => ['auth:admin'], 
    'prefix' => 'admin',
    ], 
    function () {
        //Dashborads Admin routes
        Route::put('/product/restore/{product}', 'ProductController@restore')->name('admin.product.restore');
        Route::delete('/product/force-destroy/{product}', 'ProductController@forceDestroy')->name('admin.product.force-destroy');
        Route::put('/admin/restore/{admin}', 'AdminController@restore')->name('admin.administrator.restore');
        Route::delete('/admin/force-destroy/{admin}', 'AdminController@forceDestroy')->name('admin.administrator.force-destroy');
        Route::put('/user/restore/{user}', 'UserController@restore')->name('admin.user.restore');
        Route::delete('/user/force-destroy/{user}', 'UserController@forceDestroy')->name('admin.user.force-destroy');

       

        Route::put('/role/{role}/permission', 'RoleController@assignPermissions')->name('admin.role.permission');

        //Admin Dashboard after login
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

        //Admin Profile root
        Route::get('/profile', 'ProfileController@profileIndex')->name('admin.profile');
        Route::post('/profile/store','ProfileController@profileStore')->name('admin.profile.store');



        Route::get('/order', 'OrderController@index')->name('admin.order');

        //orderDetailHOD
        Route::get('/order/hod/{orderId}', [
            'uses' => 'OrderController@orderDetailHOD',
            'as'   => 'admin.order.detail.hod'
        ]);

        //orderDetailPMU
        Route::get('/order/pmu/{orderId}', [
          'uses' => 'OrderController@orderDetailPMU',
          'as'   => 'admin.order.detail.pmu'
        ]);

        //orderUpdateHOD
        Route::put('/order/hod/{orderId}', [
          'uses' => 'OrderController@orderUpdateHOD',
          'as'   => 'admin.order.update.hod'
       ]);

        //orderUpdatePMU
        Route::put('/order/pmu/{orderId}', [
          'uses' => 'OrderController@orderUpdatePMU',
          'as'   => 'admin.order.update.pmu'
       ]);

       //viewInvoice
       Route::get('/invoice/{orderId}/generate', [
        'uses' => 'OrderController@generateInvoice',
        'as'   => 'admin.invoice.generate'
      ]);

        //generateInvoice
      Route::get('/invoice/{orderId}', [
        'uses' => 'OrderController@viewInvoice',
        'as'   => 'admin.view.invoice'
     ]);



     Route::resource('/unit',  'UnitController', 
     ['names' => [
       'index'    => 'admin.unit.index',
       'store'    => 'admin.unit.store',
       'create'   => 'admin.unit.create',
       'update'   => 'admin.unit.update',
       'show'     => 'admin.unit.show',
       'destroy'  => 'admin.unit.destroy',
       'edit'     => 'admin.unit.edit',
      ]]);


        Route::resource('/product',  'ProductController', 
        ['names' => [
          'index'    => 'admin.product.index',
          'store'    => 'admin.product.store',
          'create'   => 'admin.product.create',
          'update'   => 'admin.product.update',
          'show'     => 'admin.product.show',
          'destroy'  => 'admin.product.destroy',
          'edit'     => 'admin.product.edit',
        ]]);
       

        Route::resource('/product_category',  'ProductCategoryController', 
        ['names' => [
          'index'    => 'admin.product_category.index',
          'store'    => 'admin.product_category.store',
          'create'   => 'admin.product_category.create',
          'update'   => 'admin.product_category.update',
          'show'     => 'admin.product_category.show',
          'destroy'  => 'admin.product_category.destroy',
          'edit'     => 'admin.product_category.edit',
         ]]);



         Route::resource('/department',  'DepartmentController', 
        ['names' => [
          'index'    => 'admin.department.index',
          'store'    => 'admin.department.store',
          'create'   => 'admin.department.create',
          'update'   => 'admin.department.update',
          'show'     => 'admin.department.show',
          'destroy'  => 'admin.department.destroy',
          'edit'     => 'admin.department.edit',
        ]]);

        Route::resource('/user',  'UserController', 
        ['names' => [
          'index'    => 'admin.user.index',
          'store'    => 'admin.user.store',
          'create'   => 'admin.user.create',
          'update'   => 'admin.user.update',
          'show'     => 'admin.user.show',
          'destroy'  => 'admin.user.destroy',
          'edit'     => 'admin.user.edit',
        ]]);

        Route::resource('/admin',  'AdminController', 
        ['names' => [
          'index'    => 'admin.administrator.index',
          'store'    => 'admin.administrator.store',
          'create'   => 'admin.administrator.create',
          'update'   => 'admin.administrator.update',
          'show'     => 'admin.administrator.show',
          'destroy'  => 'admin.administrator.destroy',
          'edit'     => 'admin.administrator.edit',
        ]]);


        Route::resource('/role', 'RoleController', 
        ['names' => [
          'index'    => 'admin.role.index',
          'store'    => 'admin.role.store',
          'create'   => 'admin.role.create',
          'update'   => 'admin.role.update',
          'show'     => 'admin.role.show',
          'destroy'  => 'admin.role.destroy',
          'edit'     => 'admin.role.edit',
        ]]);

        Route::resource('/permission', 'PermissionController', 
        ['names' => [
          'index'    => 'admin.permission.index',
          'store'    => 'admin.permission.store',
          'create'   => 'admin.permission.create',
          'update'   => 'admin.permission.update',
          'show'     => 'admin.permission.show',
          'destroy'  => 'admin.permission.destroy',
          'edit'     => 'admin.permission.edit',
        ]]);




        



    }



);

/*--------------------End of Admin routes--------------------------------*/


