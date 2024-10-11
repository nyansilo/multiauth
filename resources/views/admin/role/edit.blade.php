@extends('layouts.admin.admin_layout')

@section('title', 'Edit Role')

@section('admin_content')

<div class="page-content">
	
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item" aria-current="page">Manage Role</li>
				<li class="breadcrumb-item active" aria-current="page">Edit Role</li>
			</ol>
			
		</nav>
		
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			
			<a href="{{ route('admin.role.index')}}" class="btn btn-primary d-none d-sm-inline-block" type="button" class="btn btn-primary"> View All Role </a>
			
			
		</div>
	</div>
</div>
<!--end breadcrumb-->
<hr/>
<div class="row">
	<div class="col-xl-8 mx-auto">
		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Edit Role Form</h5>
			</div>
			<div class="card-body p-4">

				
				<form  id="category-form" class="row g-3" novalidate="" method="POST" action="{{ route('admin.role.update', $role->id )}}">
					
					@method('PUT')
					@csrf


					<div class="col-md-12 {{ $errors->has('name') ? 'is-invalid' : '' }}">
						<label for="input1" class="form-label">Role Name</label>
						<input type="text"  name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
						placeholder="Role Name" value="{{ $role->name }}" id="name"  >
					</div>
					@if($errors->has('name'))
					<div class="invalid-feedback">{{ $errors->first('name') }}
					</div>
					@endif
						


					<div class="col-md-12 {{ $errors->has('slug') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label">Role Slug</label>
						<input type="text"  name="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" 
						        placeholder="Role Slug" value="{{ $role->slug }}" id="slug"  >
					</div>

					@if($errors->has('slug'))
					<div class="invalid-feedback">{{ $errors->first('slug') }}
					</div>
					@endif


					<div class="col-md-12 {{ $errors->has('display_name') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label">Display Name</label>
						<input type="text"  name="display_name" class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}" 
						        placeholder="Display Name" value="{{ $role->display_name }}" id="displayName"  >
					</div>

					@if($errors->has('display_name'))
					<div class="invalid-feedback">{{ $errors->first('display_name') }}
					</div>
					@endif


					<div class="col-md-12 {{ $errors->has('description') ? 'is-invalid' : '' }}">
						<label for="input11" class="form-label">Description</label>
						<textarea rows="3"  name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" 
						        placeholder="Description" value="{{ $role->description }}" id="description"  >
						</textarea>		
					</div>

					@if($errors->has('description'))
					<div class="invalid-feedback">{{ $errors->first('description') }}
					</div>
					@endif


					<div class="col-md-12">
						<div class="d-md-flex d-grid align-items-center gap-3">
							
							<a href="{{ route('admin.role.index') }}" class="btn btn-light px-4">Cancel</a>
                   
							<button type="submit" class="btn btn-primary px-4">{{ $role->exists ? 'Update' : 'Save' }}</button>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div class="col-xl-4 mx-auto">
		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Assign Permissions</h5>
			</div>
			<div class="card-body p-4">

				<form  id="category-form" class="row g-3" novalidate="" method="POST" action="{{ route('admin.role.permission', $role->id )}}">
					
					@method('PUT')
					@csrf

					<div class="mb-4 {{ $errors->has('permission') ? 'is-invalid' : '' }}">
						<label for="multiple-select-field" class="form-label">Permissions</label>
						<select name="permissions[]"class="form-select" id="multiple-select-field" data-placeholder="Choose anything" multiple>
						
							@foreach($permissions as $permission)
								<option value="{{ $permission->id }}">{{ $permission->name }}</option>
							@endforeach
							
						</select>
					</div>

					@if($errors->has('permission'))
					<div class="invalid-feedback">{{ $errors->first('permission') }}
					</div>
					@endif

					<div class="col-md-12">
						<div class="d-md-flex d-grid align-items-center gap-3">
							
							
                   
							<button type="submit" class="btn btn-success px-4"> Assign Permissions</button>

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
    
    @include('admin.role.script')
    
@endsection



