<div>
    <div class="card">
		<div class="row g-0">
		  <div class="col-md-4 border-end">

				@if($product->image)

					<img class="img-fluid"
					src="{{ $product->imageUrl }}" 
					alt="{{$product->shortName}}">

				@else 

					<img class="img-fluid"
					src="{{ $product->default_img }}"  
					alt="{{ $product->shortName }}">
					
				@endif
			
			
		  </div>
		  <div class="col-md-8">
			<div class="card-body">
			  <h4 class="card-title">{{$product->name}}</h4>
			 
			  <div class="mb-3"> 
				<span class="price h4">{{$product->quantity}}</span> 
				<span class="text-muted">{{$product->unit->name}}</span> 
			</div>
			  <p class="card-text fs-6"> {{$product->mediumDescription}}</p>
			  <dl class="row">
				<dt class="col-sm-3">Item Available:</dt>
				<dd class="col-sm-9">
					<div class="mb-3"> 
						<span class="price h4">{{$product->quantity}} </span> 
						<span class="text-muted">{{$product->productLabel()}}</span> 
						<div class="badge rounded-pill bg-info text-white text-lowercase px-2">
							in Stock
						</div>

					</div>
				</dd>
			  
				<dt class="col-sm-3">Brand</dt>
				<dd class="col-sm-9">
					@if($product->brand)
					{{$product->brand}} 
					@else
						N/A
					@endif	
				</dd>

			
			  </dl>
			  <hr>
			  <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">
				<div class="col">
					<label class="form-label">Quantity</label>
					<div class="input-group input-spinner">
						<button class="btn btn-white" type="button" id="button-plus" wire:click="incrementQuantity"> + </button>
						 <input type="text" class="form-control" wire:model="quantityCount" value="{{ $this->quantityCount }}">
						<button class="btn btn-white" type="button" id="button-minus" wire:click="decrementQuantity"> − </button>
					</div>
				</div> 
		
				
			</div>
			<div class="d-flex gap-3 mt-3">
				<button type="button" class="btn btn-outline-primary" wire:click="addToCart({{ $product->id }})">
                    <span class="text">Add to cart</span> 
                    <i class='bx bxs-cart-alt'></i>
                </button>
			</div>
			</div>
		  </div>
		</div>
	</div>


</div>
