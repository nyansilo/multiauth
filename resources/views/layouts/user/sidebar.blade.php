
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
            <a href="{{ url('/user/dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>



        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manage Order</div>
            </a>
            <ul>
                <li> <a href="{{ route('user.order')}}"><i class='bx bx-list-ul'></i>All Orders</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class='bx bx-add-to-queue'></i>Pending Order</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class='bx bx-add-to-queue'></i>Approved Order</a>
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
                <li> <a href="ecommerce-products.html"><i class='bx bx-edit'></i>Edit Profile</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class='bx bx-lock-open'></i>Change Password</a>
                </li>
                
            </ul>
            <li>
         

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a href="{{ route('logout')}}"  
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