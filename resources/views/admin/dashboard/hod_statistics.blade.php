<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
    <div class="col">
      <div class="card radius-10 border-start border-0 border-4 border-info">
         <div class="card-body">
             <div class="d-flex align-items-center">
                 <div>
                     <p class="mb-0 text-secondary">Received Orders</p>
                     <h4 class="my-1 text-info">{{ $orderCountHOD }}</h4>
                     <p class="mb-0 font-13"> Orders</p>
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
                    <p class="mb-0 text-secondary">Completed Orders</p>
                    <h4 class="my-1 text-danger">{{ $orderApprovedCountHOD }}</h4>
                    <p class="mb-0 font-13"> Orders</p>
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
                    <p class="mb-0 text-secondary"> Pending Orders</p>
                    <h4 class="my-1 text-success">{{ $orderPendingCountHOD }}</h4>
                    <p class="mb-0 font-13"> Orders </p>
                </div>
                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
                </div>
            </div>
        </div>
     </div>
   </div>

 </div><!--end row-->