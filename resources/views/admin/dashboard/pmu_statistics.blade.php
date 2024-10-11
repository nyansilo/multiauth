
 <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-info">
           <div class="card-body">
               <div class="d-flex align-items-center">
                   <div>
                       <p class="mb-0 text-secondary">Received Orders</p>
                       <h4 class="my-1 text-info">{{ $orderCountPMU }}</h4>
                       <p class="mb-0 font-13">{{ $orderApprovedCountPMU }} approved orders, {{ $orderPendingCountPMU }} pending orders</p>
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
                    <p class="mb-0 text-secondary">Total Products</p>
                    <h4 class="my-1 text-danger">{{ $productCount }}</h4>
                    <p class="mb-0 font-13"> Products</p>
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
                    <p class="mb-0 text-secondary">Total Categories </p>
                    <h4 class="my-1 text-success">{{ $categoryCount }}</h4>
                    <p class="mb-0 font-13"> Categories</p>
                </div>
                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
                </div>
            </div>
        </div>
     </div>
   </div>

 </div><!--end row-->
