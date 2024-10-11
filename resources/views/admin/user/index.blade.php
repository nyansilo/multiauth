@extends('layouts.admin.admin_layout')

@section('title', 'RMS | All Users')

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
				<li class="breadcrumb-item" aria-current="page">Manage User</li>
				<li class="breadcrumb-item active" aria-current="page">All Users</li>
			</ol>
			
		</nav>
		
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			
			<a href="{{ route('admin.user.create')}}" class="btn btn-primary d-none d-sm-inline-block" type="button" class="btn btn-primary"> Add New User </a>
			
			
		</div>
	</div>
</div>
<!--end breadcrumb-->

				<hr/>
				<div class="card">

					<div class="card-header px-4 py-3">

						<div class="d-lg-flex align-items-center mb-0 gap-3">
							<div class="position-relative">
								<h5 class="mb-0">All Users</h5>
							</div>
						  <div class="ms-auto">
							<h5 class="mb-0">
								<?php $links = [] ?>
								@foreach($statusList as $key => $value)
									@if($value)
										<?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
										<?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>" ?>
									@endif
								@endforeach
							{!! implode(' | ', $links) !!}
	
							</h5>
						</div>
						</div>
				

					</div>

					<div class="card-body">


						@include('admin.user.message')

						@if (! $users->count())
							<div class="alert alert-danger">
								<strong>No record found</strong>
							</div>
						@else
							


							@if($onlyTrashed)
								@include('admin.user.table-trash')
						    @else
								@include('admin.user.table')
						    @endif
		  
						@endif


					</div>
				</div>

	
</div>

@endsection