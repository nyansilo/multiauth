@extends('layouts.admin.admin_layout')

@section('title', 'RMS - Edit Admin')

@section('admin_content')

<div class="page-content">
	
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item" aria-current="page">Manage Admin</li>
				<li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
			</ol>
			
		</nav>
		
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			
			<a href="{{ route('admin.administrator.index')}}" class="btn btn-primary d-none d-sm-inline-block" type="button" class="btn btn-primary"> View All administrator </a>
			
			
		</div>
	</div>
</div>
<!--end breadcrumb-->
<hr/>
	
<div class="row">

	
<form  id="category-form" class="row g-3" novalidate="" method="POST" action="{{ route('admin.administrator.update', $admin->id )}}">
					
	@method('PUT')
	@csrf

	<div class="col-xl-8 mx-auto">
		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Add New administrator Form</h5>
			</div>
			<div class="card-body p-4">


				
					<div class="col-md-12 py-2 {{ $errors->has('first_name') ? 'is-invalid' : '' }}">
						<label for="input1" class="form-label"> First Name</label>
						<input type="text"  name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
						 id="firstName"  placeholder="First Name" value="{{ $admin->first_name }}"  >
					</div>
					@if($errors->has('first_name'))
					<div class="invalid-feedback">{{ $errors->first('first_name') }}
					</div>
					@endif

					<div class="col-md-12 py-2 {{ $errors->has('last_name') ? 'is-invalid' : '' }}">
						<label for="input1" class="form-label"> Last Name</label>
						<input type="text"  name="last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" 
						id="lastName" placeholder="Last Name" value="{{ $admin->last_name }}"  >
					</div>
					@if($errors->has('last_name'))
					<div class="invalid-feedback">{{ $errors->first('last_name') }}
					</div>
					@endif

			
					<div class="col-md-12 py-2 {{ $errors->has('password') ? 'is-invalid' : '' }}">
						<label for="input1" class="form-label"> Password</label>
						<input type="password"  name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"  >
					</div>
					@if($errors->has('password'))
					<div class="invalid-feedback">{{ $errors->first('password') }}
					</div>
					@endif

					<div class="col-md-12 py-2 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
						<label for="input1" class="form-label"> Confirm Password</label>
						<input type="text"  name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="confirmPassword"  >
					</div>
					@if($errors->has('password_confirmation'))
					<div class="invalid-feedback">{{ $errors->first('password_confirmation') }}
					</div>
					@endif

				

					<div class="col-md-12  py-2 {{ $errors->has('email') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label"> Email </label>
						<input type="text"  name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
						id="email" placeholder="Email" value="{{ $admin->email }}" >
					</div>

					@if($errors->has('email'))
					<div class="invalid-feedback">{{ $errors->first('email') }}
					</div>
					@endif
			

					<div class="col-md-12  py-2 {{ $errors->has('slug') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label">Slug</label>
						<input type="text"  name="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" 
						id="slug" placeholder="Slug" value="{{ $admin->slug }}"  >
					</div>

					@if($errors->has('slug'))
					<div class="invalid-feedback">{{ $errors->first('slug') }}
					</div>
					@endif
				

					<div class="col-md-12  py-2 {{ $errors->has('phone_number') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label"> Phone Number </label>
						<input type="text"  name="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" 
						id="phoneNumber" placeholder="Phone NUmber" value="{{ $admin->phone_number }}" >
					</div>

					@if($errors->has('phone_number'))
					<div class="invalid-feedback">{{ $errors->first('phone_number') }}
					</div>
					@endif


					<div class="col-md-12  py-2 {{ $errors->has('position') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label"> Job Title</label>
						<input type="text"  name="position" class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" 
						id="jobTitle" placeholder="Job Title" value="{{ $admin->position }}" >
					</div>

					@if($errors->has('position'))
					<div class="invalid-feedback">{{ $errors->first('position') }}
					</div>
					@endif

					
					

					<div class="col-md-12  py-2 {{ $errors->has('bio') ? 'is-invalid' : '' }}">
						<label for="input2" class="form-label"> Bio</label>
						<textarea  placeholder="Address ..." rows="3" name="bio" class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}" 
						id="bio" placeholder="Bio" value="{{ $admin->bio }}" ></textarea>
		
					</div>

					@if($errors->has('bio'))
					<div class="invalid-feedback">{{ $errors->first('bio') }}
					</div>
					@endif



					<div class="col-md-12 py-2">
						<div class="d-md-flex d-grid align-items-center gap-3">
							
							<a href="{{ route('admin.administrator.index') }}" class="btn btn-light px-4">Cancel</a>
				   
							<button type="submit" class="btn btn-primary px-4">{{ $admin->exists ? 'Update' : 'Save' }}</button>
		
						</div>
					</div>

					
				
			</div>

		
	
	
	
					
			
		</div>
	</div>



	<div class="col-xl-4 mx-auto">


		<div class="card">
			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Department</h5>
			</div>

			<div class="card-body">

				<div class="col-md-12 py-2 {{ $errors->has('department_id') ? 'error' : '' }}">


					<select name="department_id" class="form-control {{ $errors->has('department_id') ? 'error' : '' }} mb-3" aria-label="Default select example">
						<option value="">Select Department...</option>
						@foreach ($departments as $department)

						

							<option value="{{ $department->id }}" {{ $admin->department?->id != null && $admin->department?->id == $department->id ? 'selected':'' }}>{{ $department->name }}</option>

							
						@endforeach
					</select>
				</div>
				@if($errors->has('department_id'))
					<div class="error">{{ $errors->first('department_id') }}
					</div>
				@endif	
				
			</div>

		</div>
		
		<div class="card">

			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Role</h5>
			</div>


			<div class="card-body">

				<div class="col-md-12 py-2 {{ $errors->has('role') ? 'is-invalid' : '' }}">
					

					<select class="role form-control {{ $errors->has('role') ? 'is-invalid' : '' }} mb-3" aria-label="Default select example" name="role" id="role">
						<option value="">Select Role...</option>
						@foreach ($roles as $role)
						<option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" 
							value="{{$role->id}}" {{ $admin->roles->isEmpty() || $role->name != $adminRole->name ? "": "selected"}}>{{$role->name}}
						</option>
						@endforeach
					</select>

					@if($errors->has('role'))
						<span class="is-invalid">{{ $errors->first('role') }}</span>
					@endif
				</div>
			</div>	
		</div>	

		<div class="card">

			<div class="card-header px-4 py-3">
				<h5 class="mb-0">Permissions</h5>
			</div>

			<div class="card-body">
			
				<div id="permissions_box"  class="col-md-12 py-2 {{ $errors->has('permission_id') ? 'is-invalid' : '' }}">
					
					<label class="form-check-label" for="flexCheckDefault">Select Permissions..</label>
					<div id="permissions_ckeckbox_list">
					</div>
				</div> 

				@if($admin->permissions->isNotEmpty())
					<div id="user_permissions_box"  class="col-md-12 py-2">
						<label for="roles">User Permissions</label>
						<div id="user_permissions_ckeckbox_list">
							@foreach($rolePermissions as $permission)
								<div class="custom-control custom-checkbox">
									<input class="form-check-input" 
									type="checkbox" name="permissions[]" 
									id="{{$permission->slug}}"
									value="{{ $permission->id }}"
									{{ in_array( $permission->id, 
									$adminPermissions->pluck('id')->toArray()) ? 'checked="checked"' : ''
									}}
									/>
									<label class="form-check-label" for="{{ $permission->slug}}">
										{{ $permission->name}}
									</label>	

							@endforeach
						</div>
					</div>
				@endif	

			</div>	

		</div>	    

		

	</div>	

	
	


</form>

	
</div>
			
	
</div>

@endsection


@section('script')
    
    @include('admin.administrator.script_edit')
    
@endsection



