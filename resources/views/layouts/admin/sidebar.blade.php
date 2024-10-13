
<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('admin/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">RMS</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
    
        <li>
            <a href="{{ url('/admin/dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @role(['admin'])
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Manage Department</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.department.index')}}"><i class='bx bx-group'></i>All Department</a>
                </li>
                <li> <a href="{{ route('admin.department.create')}}"><i class='bx bx-user-plus'></i>Add New Departments</a>
                </li>
                
            </ul>
        </li>

  
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Manage Permission</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.permission.index')}}"><i class='bx bx-group'></i>All Permission</a>
                </li>
                <li> <a href="{{ route('admin.permission.create')}}"><i class='bx bx-user-plus'></i>Add New Permission</a>
                </li>
                
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Manage Roles</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.role.index')}}"><i class='bx bx-group'></i>All Roles</a>
                </li>
                <li> <a href="{{ route('admin.role.create')}}"><i class='bx bx-user-plus'></i>Add New Role</a>
                </li>
                
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-pin'></i>
                </div>
                <div class="menu-title">Manage Admin</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.administrator.index')}}"><i class='bx bx-group'></i>All Administrators</a>
                </li>
                <li> <a href="{{ route('admin.administrator.create')}}"><i class='bx bx-user-plus'></i>Add New Administrator </a>
                </li>
                
            </ul>
        </li>

        @php
                //if(check_user_permissions(request(), "User@index")) -->

        @endphp
    
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Manage User</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.user.index')}}"><i class='bx bx-group'></i>All Users</a>
                </li>
                <li> <a href="{{ route('admin.user.create')}}"><i class='bx bx-user-plus'></i>Add New User</a>
                </li>
                
            </ul>
        </li>

        @endrole
     
  
        @role(['admin', 'pmu'])

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-customize'></i>
                    </div>
                    <div class="menu-title">Product Unit</div>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.unit.index')}}"><i class='bx bx-list-ul'></i>All Units</a>
                    </li>
                    <li> <a href="{{ route('admin.unit.create')}}"><i class='bx bx-add-to-queue'></i>Add New Unit</a>
                    </li>
                    
                </ul>
            </li>

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-customize'></i>
                    </div>
                    <div class="menu-title">Manage Category</div>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.product_category.index')}}"><i class='bx bx-list-ul'></i>All Categories</a>
                    </li>
                    <li> <a href="{{ route('admin.product_category.create')}}"><i class='bx bx-add-to-queue'></i>Add New Category</a>
                    </li>
                    
                </ul>
            </li>
       

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-shopping-bag'></i>
                    </div>
                    <div class="menu-title">Manage Product</div>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.product.index')}}"><i class='bx bx-list-ul'></i>All  Products</a>
                    </li>
                    <li> <a href="{{ route('admin.product.create')}}"><i class='bx bx-add-to-queue'></i>Add New Product</a>
                    </li>
                    
                </ul>
            </li>
        @endrole


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manage Order</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.order')}}"><i class='bx bx-list-ul'></i>All Orders</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class='bx bx-add-to-queue'></i>Add New Order</a>
                </li>
                
            </ul>
        </li>

        

        <li class="menu-label">User Profile</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Manage Account</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.profile') }}"><i class='bx bx-edit'></i>Edit Profile</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class='bx bx-lock-open'></i>Change Password</a>
                </li>
                
            </ul>
             <li>

                <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                    <a href="{{ route('admin.logout')}}"  
                        onclick="event.preventDefault(); this.closest('form').submit();" aria-expanded="false">

                        <div class="parent-icon"><i class="bx bx-log-out"></i>
                        </div>
                        <div class="menu-title">Log Out</div>
                    </a>
                </form>	
            </li>
        </li>

      
        
    </ul>

   

    <!--end navigation-->
</div>
<!--end sidebar wrapper -->