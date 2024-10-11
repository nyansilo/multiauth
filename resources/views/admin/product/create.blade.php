@extends('layouts.admin.admin_layout')

@section('title', 'RMS | Create New Product')

@section('admin_content')

<div class="page-content">
	
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item" aria-current="page">Manage Product</li>
				<li class="breadcrumb-item active" aria-current="page">Create Product</li>
			</ol>
			
		</nav>
		
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			
			<a href="{{ route('admin.product.index')}}" class="btn btn-primary d-none d-sm-inline-block" type="button" class="btn btn-primary"> View All Products </a>
			
			
		</div>
	</div>
</div>
<!--end breadcrumb-->
<hr/>
<div class="row">

	<form  id="product-form" class="row g-3 needs-validation" novalidate="" method="POST" action="{{ route('admin.product.store')}}" enctype="multipart/form-data">
		@csrf
	<div class="col-xl-8 mx-auto">
		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Add New product Form</h5>
			</div>
			<div class="card-description p-4">


					<div class="col-md-12  py-2 {{ $errors->has('name') ? 'is-invalid' : '' }}">
						<label for="input1" class="form-label"> Name </label>
						<input type="text"  name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"  >
					</div>
					@if($errors->has('name'))
					<div class="invalid-feedback">{{ $errors->first('name') }}
					</div>
					@endif
								

					<div class="col-md-12  py-2 {{ $errors->has('slug') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label">Slug</label>
						<input type="text"  name="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" id="slug"  >
					</div>

					@if($errors->has('slug'))
						<div class="invalid-feedback">{{ $errors->first('slug') }}
						</div>
					@endif


					<div class="col-md-12  py-2 {{ $errors->has('brand') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label">brand</label>
						<input type="text"  name="brand" class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" id="brand"  >
					</div>

					@if($errors->has('brand'))
						<div class="invalid-feedback">{{ $errors->first('brand') }}
						</div>
					@endif


					<div class="col-md-12 py-2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}">

						<label class="form-label">Product Category</label>
	
						<?php $names=  App\Models\ProductCategory::pluck('name', 'id') ?>
	
						<select name="category_id" class="form-select mb-3 {{ $errors->has('category_id') ? 'is-invalid' : '' }}" aria-label="Default select example">
							<option selected="">Select Category</option>
							@foreach($names as $id => $name)
								<option value="{{ $id }}">{{ $name }}</option>
							@endforeach
						</select>
					</div>
					@if($errors->has('category_id'))
						<div class="invalid-feedback">{{ $errors->first('category_id') }}
						</div>
					@endif	
					

					<div class="row">
						<div class="col-md-6">
							<label for="input8" class="form-label">Quantity</label>
							<input type="text" name="quantity" class="form-control" id="input8" placeholder="quantity">
						</div>

						@if($errors->has('quantity'))
							<div class="invalid-feedback">{{ $errors->first('quantity') }}
							</div>
						@endif	

						<div class="col-md-6 {{ $errors->has('unit_id') ? 'is-invalid' : '' }}">

							<label class="form-label">Product Unit</label>
	
							<?php $names=  App\Models\Unit::pluck('name', 'id') ?>
	
							<select id="input9" name="unit_id" class="form-select mb-3 {{ $errors->has('unit_id') ? 'is-invalid' : '' }}" aria-label="Default select example">
								<option selected="">Select Unit</option>
								@foreach($names as $id => $name)
									<option value="{{ $id }}">{{ $name }}</option>
								@endforeach
							</select>
						</div>
						@if($errors->has('unit_id'))
							<div class="invalid-feedback">{{ $errors->first('unit_id') }}
							</div>
						@endif	
					</div>	

					<div class="col-md-12  py-2 {{ $errors->has('description') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label"> Description</label>
						<textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description"  >
						</textarea>	
					</div>

					@if($errors->has('description'))
					<div class="invalid-feedback">{{ $errors->first('description') }}
					</div>
					@endif
		
				
			</div>
		</div>
	</div>



	<div class="col-xl-4 mx-auto">

		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Product Image</h5>
			</div>

			<div class="card-description">

				<div class="col-md-12 py-2 {{ $errors->has('image') ? 'is-invalid' : '' }}">

						<!-- Upload image input-->
						<div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
							<input id="upload" type="file" name="image" onchange="readURL(this);" class="form-control border-0">
							<label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
							<div class="input-group-append">
								<label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
							</div>
						</div>

						<div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
							
                    @if($errors->has('image'))
                        <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                    @endif
                </div>   
				
			</div>
		</div>

		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Published Date</h5>
			</div>
			<div class="card-description p-4">


					<div class="col-md-12 py-2 {{ $errors->has('published_at') ? 'is-invalid' : '' }}">
						<label class="form-label">Published At</label>
						<input type="text" name="published_at" class="form-control date-time flatpickr-input {{ $errors->has('published_at') ? 'is-invalid' : '' }}" readonly="readonly">
					</div>
					@if($errors->has('published_at'))
					<div class="invalid-feedback">{{ $errors->first('published_at') }}
					</div>
					@endif

					<div class="col-md-12 py-2">
						<div class="d-md-flex d-grid align-items-center gap-3">
							
							<a href="{{ route('admin.product.index') }}" class="btn btn-light px-4">Cancel</a>
                   
							<button type="submit" class="btn btn-primary px-4">{{ $product->exists ? 'Update' : 'Save' }}</button>

						</div>
					</div>
				
			</div>
		</div>	
	
		
	</div>	
	


</form>

	
</div>
			
	
</div>

@endsection


@section('script')
    
    @include('admin.product.script')
    
@endsection



