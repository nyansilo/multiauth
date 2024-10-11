<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Department;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $permissionCount            = Permission::count();
        $roleCount                  = Role::count();
        $userCount                  = User::count();
        $adminCount                 = Admin::count();
        $departmentCount            = Department::count();
        $productCount               = Product::count();
        $categoryCount              = ProductCategory::count();

        $orderCountPMU                 = Order::where('status_message', 'Approved By HOD')
                                            ->orWhere('status_message', 'Approved By PMU')
                                             ->count();
        $orderApprovedCountPMU         = Order::where('status_message', 'Approved By PMU')
                                            ->count(); 
        $orderPendingCountPMU         = Order::where('status_message', 'Approved By HOD')
                                            ->count();  
                                            
                                               
        $orderCountHOD                = Order::where('department_id', Auth::user()->department_id)
                                                ->orWhere('status_message', 'In Progress')
                                                ->orWhere('status_message', 'Approved By HOD')
                                                ->count();

        $orderApprovedCountHOD          = Order::where('department_id', Auth::user()->department_id)
                                                ->where('status_message', 'Approved By HOD')
                                                ->count(); 

        $orderPendingCountHOD        = Order::where('department_id', Auth::user()->department_id)
                                             ->where('status_message', 'In Progress') 
                                             ->count(); 

        return view("admin.dashboard.index", compact('permissionCount','roleCount','userCount', 'adminCount', 
                                                    'departmentCount','productCount','categoryCount',
                                                    'orderCountPMU', 'orderApprovedCountPMU','orderPendingCountPMU',
                                                    'orderCountHOD', 'orderApprovedCountHOD','orderPendingCountHOD',
                                                ));
    }

}
