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

	<form  id="product-form" class="row g-3 needs-validation" novalidate="" method="POST" action="{{ route('admin.product.store')}}">
		@csrf
	<div class="col-xl-8 mx-auto">
		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Add New product Form</h5>
			</div>
			<div class="card-body p-4">

				
			
					
				
					<div class="col-md-12  py-2 {{ $errors->has('title') ? 'is-invalid' : '' }}">
						<label for="input1" class="form-label"> Title <Title></Title></label>
						<input type="text"  name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title"  >
					</div>
					@if($errors->has('title'))
					<div class="invalid-feedback">{{ $errors->first('title') }}
					</div>
					@endif
								

					<div class="col-md-12  py-2 {{ $errors->has('slug') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label">Slug</label>
						<input type="text"  name="slug" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="slug"  >
					</div>

					@if($errors->has('slug'))
					<div class="invalid-feedback">{{ $errors->first('slug') }}
					</div>
					@endif
				

					<div class="col-md-12  py-2 {{ $errors->has('excerpt') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label"> Excerpt </label>
						<input type="text"  name="excerpt" class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" id="excerpt"  >
					</div>

					@if($errors->has('excerpt'))
					<div class="invalid-feedback">{{ $errors->first('excerpt') }}
					</div>
					@endif


					<div class="col-md-12  py-2 {{ $errors->has('body') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label"> Body</label>
						<input type="text"  name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" id="body"  >
					</div>

					@if($errors->has('body'))
					<div class="invalid-feedback">{{ $errors->first('body') }}
					</div>
					@endif

					
				
			</div>
		</div>
	</div>



	<div class="col-xl-4 mx-auto">
		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Published Date</h5>
			</div>
			<div class="card-body p-4">


					<div class="col-md-12 py-2 {{ $errors->has('published_at') ? 'is-invalid' : '' }}">
						<label class="form-label">Published At</label>
						<input type="text" name="published_at" class="form-control date-time flatpickr-input {{ $errors->has('title') ? 'is-invalid' : '' }}" readonly="readonly">
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
	
		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Product Category</h5>
			</div>

			<div class="card-body">

				<div class="col-md-12 py-2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}">

					<label class="form-label">Category</label>

					<?php $titles=  App\Models\ProductCategory::pluck('title', 'id') ?>

					<select name="category_id" class="form-select mb-3" aria-label="Default select example">
						<option selected="">Select Category</option>
						@foreach($titles as $id => $title)
							<option value="{{ $id }}">{{ $title }}</option>
						@endforeach
					</select>
				</div>
				@if($errors->has('category_id'))
					<div class="invalid-feedback">{{ $errors->first('category_id') }}
					</div>
				@endif	
				
			</div>
		</div>

		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Product Image</h5>
			</div>

			<div class="card-body">

				<div class="col-md-12 py-2 {{ $errors->has('image') ? 'is-invalid' : '' }}">

                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-thumbnail mb-3 " style="width: 200px; height: 150px;">
                             <img src="{{ ($product->image_thumb_url) ? $product->image_thumb_url : '/img/default-image.jpeg' }}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists img-thumbnail" style="width: 200px; height: 150px;">
                            
                        </div>
                        <div style="margin-top: 10px;">
                          <span class="btn btn-outline-secondary btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
    
							<input type="file" name="image">
                          </span>
                          <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>
                   
                    @if($errors->has('image'))
                        <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                    @endif
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



