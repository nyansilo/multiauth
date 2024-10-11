@extends('layouts.user.user_layout')

@section('title', 'RMS - Dashboard')

@section('user_content')

<div class="page-content">
	
	
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-lg-3 col-xl-2">
							<a href="ecommerce-add-new-products.html" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>New Product</a>
						</div>
						<div class="col-lg-9 col-xl-10">
							<form class="float-lg-end">
								<div class="row row-cols-lg-2 row-cols-xl-auto g-2">
									<div class="col">
										<div class="position-relative">
											<input type="text" class="form-control ps-5" placeholder="Search Product..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
										</div>
									</div>
									<div class="col">
										<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<button type="button" class="btn btn-white">Sort By</button>
											<div class="btn-group" role="group">
											  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
												<i class='bx bx-chevron-down'></i>
											  </button>
											  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
												<li><a class="dropdown-item" href="#">Dropdown link</a></li>
												<li><a class="dropdown-item" href="#">Dropdown link</a></li>
											  </ul>
											</div>
										  </div>
									</div>
									<div class="col">
										<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<button type="button" class="btn btn-white">Collection Type</button>
											<div class="btn-group" role="group">
											  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
												<i class='bx bxs-category'></i>
											  </button>
											  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
												<li><a class="dropdown-item" href="#">Dropdown link</a></li>
												<li><a class="dropdown-item" href="#">Dropdown link</a></li>
											  </ul>
											</div>
										  </div>
									</div>
									<div class="col">
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-white">Price Range</button>
											<div class="btn-group" role="group">
											  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
												<i class='bx bx-slider'></i>
											  </button>
											  <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="btnGroupDrop1">
												<li><a class="dropdown-item" href="#">Dropdown link</a></li>
												<li><a class="dropdown-item" href="#">Dropdown link</a></li>
											  </ul>
											</div>
										  </div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<livewire:user.dashboard.index :products="$products" />


</div>

@endsection