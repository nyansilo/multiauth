

<div class="dropdown-menu dropdown-menu-end">
    <a href="{{ route('user.cart') }}">
        <div class="msg-header">
            <p class="msg-header-title">View Cart</p>
            
                <p class="msg-header-badge">

                    @if($this->cartItems->count() > 0)
                        {{ $this->cartItems->count() }}
                    @else
                        0
                    @endif
                </p>
        </div>
    </a>


    <div class="header-message-list">

            @foreach ($cartItems as $cartItem)
                <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="position-relative">
                            <div class="cart-product rounded-circle bg-light">

                                @if($cartItem->product->image)

                                    <img  class="product-img-2"
                                    src="{{ $cartItem->product->imageUrl }}" 
                                    alt="{{ $cartItem->product->shortName}}">

                                @else 

                                    <img  class="product-img-2"
                                    src="{{ $cartItem->product->default_img }}"  
                                    alt="{{ $cartItem->product->shortName }}">
                                    
                                @endif
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="cart-product-title mb-0"> {{ substr($cartItem->product->name, 0, 15)}}...</h6>
                            <p class="cart-product-price mb-0">{{ $cartItem->quantity}} X {{ $cartItem->product->unit->name}}</p>
                        </div>
                   
                        <div class="cart-product-cancel">

                            <button type="button" class="btn"  wire:loading.attr="disable" wire:click="removeCartItem({{  $cartItem->id }})" >
                                <i class="bx bx-x me-0"></i>

                            </button>
                           
                        </div>
                    </div>
                </a>

                
            @endforeach
    </div>

    <a href="javascript:;">
        <div class="text-center msg-footer">
            <div class="d-flex align-items-center justify-content-between mb-3">
                
                <h5 class="mb-0">
                    <a href="{{ route('user.cart')}}" class="btn btn-outline-primary radius-30 mt-2 mt-lg-0">
                      View Cart
                    </a>
                </h5>
                <h5 class="mb-0 ms-auto">
                    <a href="{{ route('user.checkout')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                        Check Out
                     </a>
                </h5>
            </div>
        </div>
    </a>
</div>




