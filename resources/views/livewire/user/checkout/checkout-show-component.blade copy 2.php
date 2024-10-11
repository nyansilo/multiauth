<div>

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Applications</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        @if($this->cartCount > 0)
        <div class="card">
            <div class="card-body">
                <div id="invoice">
                   
                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <header>
                                <div class="row text-center">
                                    
                                    <div class="col-12 company-details text-center">
                                        <div>
                                            <a href="javascript:;">
                                                <img src="{{ asset('admin/assets/images/logo-icon.png')}}" width="100" alt="">
                                            </a>
                                        </div>
                                            <h2 class="name">
                                                
                                                    COLLEGE OF BUSINESS EDUCATION
                                              
                                            </h2>
                                            <h5>
                                                 <div>MWANZA</div>
                                                 <div>STORE REQUISTION</div>
                                            </h5>     
                                        
                                    </div>
                                </div>
                            </header>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">
                                         <h6>
                                            <div class="address">Campus: Mwanza</div>
                                            <div class="email">Department: {{ auth()->user()->department->name }}</div>
                                         </h6>   
                                    </div>
                                    <div class="col invoice-details">
                                        <h6>
                                            <div class="date">No: 112</div>
                                            <div class="date">Date:  </div>
                                        </h6>    
                                    </div>
                                </div>

                                <div class="text-gray-light mb-3">Please issue the following items</div>   
                                <table>
                                    <thead>
                                        <tr>
                                            <th>S/No</th>
                                            <th class="text-left">DESCRIPTION OF ITEM(S)</th>
                                            <th class="text-right">UNIT</th>
                                            <th class="text-right">QUANTITY REQUIRED</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($cartItems as $cartItem)
                                       
                                            <tr>
                                                @if($cartItem->id < 9)
                                                    <td class="no">0{{ $cartItem->id}}</td>
                                                @else
                                                    <td class="no">{{ $cartItem->id}}</td>
                                                @endif

                                                <td class="text-left">
                                                    {{ $cartItem->product->title}}
                                                </td>
                                           
                                                <td class="unit">{{ $cartItem->product->unit}}</td>
                                            
                                                <td class="total">{{ $cartItem->quantity}}</td>
                                            </tr>

                                        @endforeach         
                                            
                                    </tbody>
                                    <tfoot>
                                        <tr>    
                                            <td class="text-left">Requested By:</td>
                                            <td class="text-right"></td>
                                        </tr>
 
                                        <tr>
                                            <td class="text-right">Postion:</td>
                                            <td class="text-left">{{ auth()->user()->job_title }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Name:</td>
                                            <td class="text-left">{{ auth()->user()->fullName }}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-right">Signature:</td>
                                            <td class="text-left">{{ substr(auth()->user()->first_name, 0,1) }}.{{ substr(auth()->user()->last_name,0,1) }}</td>
                                          
                                        </tr>
                                    
                                    </tfoot>
                                </table>

                                <form  id="category-form"  method="POST" >
					
                                    @csrf
                                  
                                    <div class="col-md-12 ">
                                     
                                        <input type="hidden"  wire:model="user_id" class="form-control" id="userId"  >
                                    </div>

                                    <div class="col-md-12 ">
                                     
                                        <input type="hidden"  wire:model="tracking_no" class="form-control" id="trackingNo"  >
                                    </div>

                                    <div class="col-md-12 ">
                                     
                                        <input type="hidden"  wire:model="full_name" class="form-control" id="fullName"  >
                                    </div>

                                    <div class="col-md-12 ">
                                     
                                        <input type="hidden"  wire:model="email" class="form-control" id="email"  >
                                    </div>

                                    <div class="col-md-12 ">
                                     
                                        <input type="hidden"  wire:model="phone" class="form-control" id="phone"  >
                                    </div>

                                    <div class="col-md-12 ">
                                     
                                        <input type="hidden"  wire:model="department_id" class="form-control" id="departmentId"  >
                                    </div>


                                    <div class="col-md-12 ">
                                     
                                        <input type="hidden"  wire:model="signature" class="form-control" id="signature"  >
                                    </div>
                                
                                
                                    <div class="toolbar hidden-print">
                                        <div class="text-end">
                                            <button type="button"  wire:click="submitOrder" class="btn btn-dark"><i class="fa fa-print"></i> Submit Request</button>
    
                                        </div>
                               
                                    </div> 
                                </form>

                               
                                                 
                               
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
        @else
      
        <div class="card">
            <div class="card-body">
                <div id="invoice">
                   
                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <header>
                                <div class="row text-center">
                                    
                                    <div class="col-12 company-details text-center">
                                        <div>
                                            <a href="javascript:;">
                                                <img src="http://127.0.0.1:8000/admin/assets/images/logo-icon.png" width="100" alt="">
                                            </a>
                                        </div>
                                            <h2 class="name">
                                                
                                                    COLLEGE OF BUSINESS EDUCATION                                       
                                            </h2>
                                            <h5>
                                                 <div>MWANZA</div>
                                                 <div>STORE REQUISTION</div>
                                            </h5>     
                                        
                                    </div>
                                </div>
                            </header>
                            <main>
                                                  
                                <div class="row">
                                    
                                    <div class="to mt-4 mb-3">
                                       
                                            <h4 class="name">
                                                
                                                    Thank You!!
                                              
                                            </h4>
                                           
                                    </div>
                                </div>
                           
    
    
                
                                <div class="notices">
                                    <div>NOTICE:</div>
                                    <div class="notice"> No Product Available for Check Out</div>
                                </div>
    
    
                                
                               
                                                 
                               
                            </main>
    
                      
    
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-3">
                                    <a href="{{ route('user.dashboard')}}" class="btn btn-primary px-4" ><i class="bx bx-left-arrow-alt me-2"></i>Submit New Request</a>
                                    <a  href="{{ route('user.order')}}" class="btn btn-success px-4">View Orders</a>
                                </div>
                            </div>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    
</div>
