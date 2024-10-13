<div>

    @if($this->cartItems->count() > 0)
        <div class="card">
            <div class="card-body">
                
                <div class="table-responsive">
                    
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>item#</th>
                                <th>Product </th>
                                <th>Information</th>
                                <th>Unit</th> 
                                <th>Quantity</th>
                                <th>Remove</th>
                            </tr>
                        </thead>

                    
                        <tbody>

                             @foreach ($cartItems as $cartItem)

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14"># {{ $cartItem->id}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>

                                        @if(!empty($cartItem->product->imageUrl))

                                            <img  class="product-img-2"
                                            src="{{ $cartItem->product->imageUrl }}" 
                                            alt="{{ $cartItem->product->shortName}}">

                                        @else 

                                            <img  class="product-img-2"
                                            src="{{ $cartItem->product->default_img }}"  
                                            alt="{{ $cartItem->product->shortName }}">
                                            
                                        @endif

                                        
                                    
                                    </td>
                                    <td>
                                        {{ substr($cartItem->product->name, 0, 30)}}...
                                    
                                    </td>
                                    <td><div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3"> {{  $cartItem->product->unit->name }}</div></td>                         
                                    <td> 
                                        <div class="col-md-3">
                                            <div class="input-group input-spinner ">
                                                <button class="btn btn-white" type="button" id="button-plus"  wire:loading.attr="disable" wire:click="decrementQuantity({{ $cartItem->id }})"> - </button>
                                                <input type="text" class="form-control" value="{{ $cartItem->quantity}}">
                                                <button class="btn btn-white" type="button" id="button-minus" wire:loading.attr="disable" wire:click="incrementQuantity({{ $cartItem->id }})"> + </button>
                                            </div>
                                        </div>    

                                    </td>
                                
                                    <td>
                                        <div class="d-flex order-actions">
                                            
                                            <button type="button"  class="btn" wire:loading.attr="disable" wire:click="removeCartItem({{  $cartItem->id }})" >
                                                <i class="bx bxs-trash me-0"></i>

                                            </button>
                                        </div>
                                    </td>
                                </tr>
                 
                              
                            @endforeach
                        
                        
                        </tbody>

                    </table>
                </div>

                @if($this->cartItems->count() > 0)

                <div class="d-lg-flex align-items-center mt-4 gap-3">
                    
                    <div class="ms-auto"><a href="{{ route('user.checkout')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                        <i class="bx bxs-plus-square"></i>Check Out</a>
                    </div>
                </div>
                @endif

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
                                       
                                            <h2 class="name">
                                                
                                                    CART PRODUCTS INFORMATION                                       
                                            </h2>
                                                
                                        
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
                                    <div class="notice">No Product Available in Your Cart</div>
                                </div>
                 
                               
                            </main>

                            <div class="col-12">
                                <div class="d-flex align-items-center gap-3">
                                    <a href="{{ route('user.dashboard')}}" class="btn btn-primary px-4" ><i class="bx bx-left-arrow-alt me-2"></i>Submit New Request</a>
                                    <a href="{{ route('user.order')}}" class="btn btn-success px-4">View Orders</a>
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
