@extends('layouts.admin.admin_layout')

@section('title', 'Create New category')

@section('admin_content')

<div class="page-content">
	
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item" aria-current="page">Manage Category</li>
				<li class="breadcrumb-item active" aria-current="page">Create Category</li>
			</ol>
			
		</nav>
		
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			
			<a href="{{ route('admin.product_category.index')}}" class="btn btn-primary d-none d-sm-inline-block" type="button" class="btn btn-primary"> View All Category </a>
			
			
		</div>
	</div>
</div>
<!--end breadcrumb-->
<hr/>


<div class="row">
	<div class="col-xl-12 mx-auto">
		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Add New Category Form</h5>
			</div>
			<div class="card-body p-4">



					{!! 
					
						Form::model($category, [

							'method' => 'POST',
							'route'  => 'admin.product_category.store',
							'files'  => TRUE,
							'id' => 'category-form',
							'class' => 'row g-3 needs-validation was-validated',
						]) 

					!!}

					@include('admin.product_category.form')

					{!! Form::close() !!}


			</div>
		</div>
	</div>
</div>
			
	
</div>

@endsection