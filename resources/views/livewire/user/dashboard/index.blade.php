<div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">


	

		@forelse($products as $product)
		
		
		<div class="col">
			<div class="card">

				@if($product->image)

				<img class="card-img-top"
				src="{{ $product->imageUrl }}" 
				alt="{{$product->shortName}}">

			  @else 

				<img class="card-img-top"
				src="{{ $product->default_img }}"  
				alt="{{ $product->shortName }}">
					  
			  @endif

			
	
					<div class="position-absolute top-0 end-0 m-3 "><span class="badge rounded-pill bg-primary">In Stock</span></div>
				
				<div class="card-body">
					<a href="{{ route('product.detail', $product->slug) }}"><h6 class="card-title cursor-pointer">{{ $product->mediumName }}</h6></a>
					
					<div class="d-flex align-items-center mt-3 fs-6">
						<div class="cursor-pointer">
							<p class="mb-0 float-start"><strong>{{ $product->quantity }}</strong> {{ $product->productLabel() }}</p>
						</div>	
						<p class="mb-0 ms-auto"><a href="{{ route('product.detail', $product->slug) }}" class="btn btn-outline-primary px-3 radius-30">
							<span class="text">Detail</a></p>
					</div>
				</div>
			</div>
		</div>

		@empty

		<div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
			<div class="d-flex align-items-center">
				<div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
				</div>
				<div class="ms-3">
					<h6 class="mb-0 text-dark">Warning Alerts</h6>
					<div class="text-dark"> No Product Available</div>
				</div>
			</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		
		@endforelse
	
	</div><!--end row-->
</div>
