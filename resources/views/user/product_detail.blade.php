<h2>Admin Dashboard </h2>@extends('layouts.user.user_layout')

@section('title', 'RMS - Product Detaiils')

@section('user_content')

<div class="page-content">
	
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">eCommerce</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Products Details</li>
				</ol>
			</nav>
		</div>
		<div class="ms-auto">
			<div class="btn-group">
				<button type="button" class="btn btn-primary">Settings</button>
				<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
				</button>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
					<a class="dropdown-item" href="javascript:;">Another action</a>
					<a class="dropdown-item" href="javascript:;">Something else here</a>
					<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
				</div>
			</div>
		</div>
	</div>
	<!--end breadcrumb-->

	<livewire:user.detail.index :product="$product" />
</div>

@endsection