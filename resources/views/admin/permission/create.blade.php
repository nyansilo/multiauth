@extends('layouts.admin.admin_layout')

@section('title', 'RMS - Create New Permission')

@section('admin_content')

<div class="page-content">
	
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item" aria-current="page">Manage Permission</li>
				<li class="breadcrumb-item active" aria-current="page">Create Permission</li>
			</ol>
			
		</nav>
		
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			
			<a href="{{ route('admin.permission.index')}}" class="btn btn-primary d-none d-sm-inline-block" type="button" class="btn btn-primary"> View All Permissions </a>
			
			
		</div>
	</div>
</div>
<!--end breadcrumb-->
<hr/>
<div class="row">
	<div class="col-xl-12 mx-auto">
		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Add New Permission Form</h5>
			</div>
			<div class="card-body p-4">

				
				<form  id="category-form" class="row g-3 needs-validation" novalidate="" method="POST" action="{{ route('admin.permission.store')}}">
					
					@csrf
					<div class="col-md-12 {{ $errors->has('name') ? 'is-invalid' : '' }}">
						<label for="input1" class="form-label">Permission Name</label>
						<input type="text"  name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
						placeholder="Permission Name" value="{{ old('name')}}" id="name"  >
					</div>
					@if($errors->has('name'))
					<div class="invalid-feedback">{{ $errors->first('name') }}
					</div>
					@endif
						

					<div class="col-md-12 {{ $errors->has('slug') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label">Permission Slug</label>
						<input type="text"  name="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" 
						        placeholder="Permission Slug" value="{{ old('slug')}}" id="slug"  >
					</div>

					@if($errors->has('slug'))
					<div class="invalid-feedback">{{ $errors->first('slug') }}
					</div>
					@endif


					<div class="col-md-12 {{ $errors->has('display_name') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label">Display Name</label>
						<input type="text"  name="display_name" class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}" 
						        placeholder="Display Name" value="{{ old('display_name')}}" id="displayName"  >
					</div>

					@if($errors->has('display_name'))
					<div class="invalid-feedback">{{ $errors->first('display_name') }}
					</div>
					@endif


					<div class="col-md-12 {{ $errors->has('description') ? 'is-invalid' : '' }}">
						<label for="input11" class="form-label">Description</label>
						<textarea rows="3"  name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" 
						        placeholder="Description" value="{{ old('description')}}" id="description"  >
						</textarea>		
					</div>

					@if($errors->has('description'))
					<div class="invalid-feedback">{{ $errors->first('description') }}
					</div>
					@endif

					
				
					<div class="col-md-12">
						<div class="d-md-flex d-grid align-items-center gap-3">
							
							<a href="{{ route('admin.permission.index') }}" class="btn btn-light px-4">Cancel</a>
                   
							<button type="submit" class="btn btn-primary px-4">{{ $permission->exists ? 'Update' : 'Save' }}</button>

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
    
    @include('admin.permission.script')
    
@endsection



