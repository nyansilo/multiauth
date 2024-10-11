@extends('layouts.admin.admin_layout')

@section('title', 'RMS | All Products')

@section('admin_content')

<div class="page-content">
	
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

	<div class="breadcrumb-title pe-3">Dashboard</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				
				<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item" aria-current="page">Manage Product</li>
				<li class="breadcrumb-item active" aria-current="page">All Products</li>
			</ol>
			
		</nav>
		
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			
			<a href="{{ route('admin.product.create')}}" class="btn btn-primary d-none d-sm-inline-block" type="button" class="btn btn-primary"> Add New Product </a>
			
			
		</div>
	</div>
</div>
<!--end breadcrumb-->

				<hr/>
				<div class="card">

					<div class="card-header px-4 py-3">
						<h5 class="mb-0">All Products</h5>
					</div>

					<div class="card-body">


						@include('admin.product.message')

						@if (! $products->count())
							<div class="alert alert-danger">
								<strong>No record found</strong>
							</div>
						@else
							


							@if($onlyTrashed)
								@include('admin.product.table-trash')
						    @else
								@include('admin.product.table')
						    @endif
		  
						@endif


					</div>
				</div>

	
</div>

@endsection