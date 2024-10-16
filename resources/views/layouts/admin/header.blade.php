<!--start header -->
<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					  <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
						<input class="form-control px-5" disabled type="search" placeholder="Search">
						<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i class='bx bx-search'></i></span>
					  </div>


					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
							
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>

							

							<li class="nav-item dropdown dropdown-large" id="markAsRead">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown">
									<span class="alert-count">
										{{ count(auth()->user()->unreadNotifications)}}
									</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-badge">{{ count(auth()->user()->unreadNotifications)}} New</p>
										</div>
									</a>
									<div class="header-notifications-list">


										@forelse(auth()->user()->unreadNotifications as $notification)
											<a class="dropdown-item" href="{{ route('admin.order.detail.hod', $notification->data['orderNo'])}}" >
												<div class="d-flex align-items-center" onclick="markNotificationAsRead('{{ count(auth()->user()->unreadNotifications)}}')">
													<div class="user-online">
														@php
															$pic = $notification->data['staffPhoto'];
														
														@endphp
														@if(!empty($pic))
															<img src="{{ asset("img/".$pic."")}}" class="msg-avatar" alt="user avatar">
														@else
														<img src="{{ asset("img/profileImg.png")}}" class="msg-avatar" alt="user avatar">
														@endif
														
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">{{ $notification->data['staffFullName'] }} <span class="msg-time float-end"> {{ $notification->data['orderDate'] }} </span></h6>
														<p class="msg-info"> Requested an Order with No {{ ($notification->data['orderNo']) }}</p>
													</div>
												</div>
											</a>
										@empty
										<div class="d-flex align-items-center">
											
											No notification available
										</div>
										@endforelse
										
										
										
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
	

									<div class="header-message-list">
	
									</div>

								</div>



								
							</li>


						</ul>
					</div>
					<div class="user-box dropdown px-3">

						<?php
						$current_user = Auth::user();
						//$current_user = Auth::id();
					    ?>
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							
								
							@if(!empty($current_user->rofileUrl))

								<img class="user-img"
								src="{{ $current_user->profileUrl }}" 
								alt="{{ $current_user->name}}">

							@else 

								<img class="user-img"
								src="{{ $current_user->defaultProfile }}"  
								alt="{{ $current_user->name }}">
									
							@endif
								
							
						
							<div class="user-info">
								<p class="user-name mb-0">{{ $current_user->first_name}} {{ $current_user->last_name}}</p>
								<p class="designattion mb-0">{{ $current_user->position}}({{ $current_user->roles->first()->display_name}}) </p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>
							
							<li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.dashboard') }}"><i class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
							</li>
							
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<form method="POST" action="{{ route('admin.logout') }}">
							    @csrf
								<li>
									<a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout')}}"  
									onclick="event.preventDefault(); this.closest('form').submit();">
									<i class="bx bx-log-out-circle"></i>
									<span>Logout</span>
									</a>
								</li>
							</form>	
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->