<div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">
    <div class="col">
      <div class="card radius-10 border-start border-0 border-4 border-info">
         <div class="card-body">
             <div class="d-flex align-items-center">
                 <div>
                     <p class="mb-0 text-secondary">Total Administrators</p>
                     <h4 class="my-1 text-info">{{ $adminCount }}</h4>
                     <p class="mb-0 font-13"> 2 HOD, 3 PMU, 3 ADMIS</p>
                 </div>
                 <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
                 </div>
             </div>
         </div>
      </div>
    </div>
    <div class="col">
     <div class="card radius-10 border-start border-0 border-4 border-danger">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0 text-secondary">Total Normal Users</p>
                    <h4 class="my-1 text-danger">{{ $userCount }}</h4>
                    <p class="mb-0 font-13"> Users</p>
                </div>
                <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-wallet'></i>
                </div>
            </div>
        </div>
     </div>
   </div>
   <div class="col">
     <div class="card radius-10 border-start border-0 border-4 border-success">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0 text-secondary">Total Departments </p>
                    <h4 class="my-1 text-success">{{ $departmentCount }}</h4>
                    <p class="mb-0 font-13"> Departments</p>
                </div>
                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
                </div>
            </div>
        </div>
     </div>
   </div>
   <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Roles</p>
                        <h4 class="my-1 text-warning"> {{  $roleCount }}</h4>
                        <p class="mb-0 font-13">Roles</p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
                    </div>
                </div>
            </div>
        </div>
   </div>    



    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-warning">
           <div class="card-body">
               <div class="d-flex align-items-center">
                   <div>
                       <p class="mb-0 text-secondary">Total Permission</p>
                       <h4 class="my-1 text-warning"> {{  $permissionCount  }}</h4>
                       <p class="mb-0 font-13"> Permissions</p>
                   </div>
                   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
                   </div>
               </div>
           </div>
        </div>
    </div>    

 </div><!--end row-->


