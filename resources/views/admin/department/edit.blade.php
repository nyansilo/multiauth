@extends('layouts.admin.admin_layout')

@section('title', 'Edit Department')

@section('admin_content')

<div class="page-content">
	
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item" aria-current="page">Manage Department</li>
				<li class="breadcrumb-item active" aria-current="page">Edit Department</li>
			</ol>
			
		</nav>
		
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			
			<a href="{{ route('admin.department.index')}}" class="btn btn-primary d-none d-sm-inline-block" type="button" class="btn btn-primary"> View All Department </a>
			
			
		</div>
	</div>
</div>
<!--end breadcrumb-->
<hr/>
<div class="row">
	<div class="col-xl-12 mx-auto">
		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Edit Department Form</h5>
			</div>
			<div class="card-body p-4">

				
				<form  id="category-form" class="row g-3" novalidate="" method="POST" action="{{ route('admin.department.update', $department->id )}}">
					
					@method('PUT')
					@csrf


					<div class="col-md-12 {{ $errors->has('name') ? 'has-error' : '' }}">
						<label for="input1" class="form-label">Department Title</label>
						<input type="text"  name="name" class="form-control" id="name" value= "{{ $department->name}}" >
					</div>
					@if($errors->has('name'))
					<div class="invalid-feedback">{{ $errors->first('name') }}
					</div>
					@endif
								

					<div class="col-md-12 {{ $errors->has('slug') ? 'has-error' : '' }}">
						<label for="input2" class="form-label">Department Slug</label>
						<input type="text"  name="slug" class="form-control" id="slug" value= "{{ $department->slug}}" >
					</div>

					@if($errors->has('slug'))
					<div class="invalid-feedback">{{ $errors->first('slug') }}
					</div>
					@endif
				
				
					<div class="col-md-12">
						<div class="d-md-flex d-grid align-items-center gap-3">
							
							<a href="{{ route('admin.department.index') }}" class="btn btn-light px-4">Cancel</a>
                   
							<button type="submit" class="btn btn-primary px-4">{{ $department->exists ? 'Update' : 'Save' }}</button>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
			
	
</div>

@endsection


@section('script')
    
    @include('admin.department.script')
    
@endsection



