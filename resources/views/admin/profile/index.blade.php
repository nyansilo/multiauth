@extends('layouts.admin.admin_layout')

@section('title', 'RMS - Admin Profile')

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
                    <li class="breadcrumb-item" aria-current="page">Manage Profile</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit User Profile</li>
                </ol>
                
            </nav>
            
        </div>
        
    </div>
    <!--end breadcrumb-->


    <div class="container-fluid">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                		
                                @if(!empty($profileData->profile_picture))

                                    <img class="rounded-circle p-1 bg-primary" width="110"
                                    src="{{ $profileData->profileUrl }}" 
                                    alt="{{ $profileData->name}}">

                                @else 

                                    <img class="rounded-circle p-1 bg-primary" width="110"
                                    src="{{ $profileData->defaultProfile }}"  
                                    alt="{{ $profileData->name }}">
                                        
                                @endif
                            
                                
                                <div class="mt-3">
                                    <h4>{{ $profileData->fullName }}</h4>
                                    <p class="text-secondary mb-1">{{ $profileData->position }}</p>
                                    <p class="text-muted font-size-sm">{{ $profileData->department->name }}</p>

                                    <button class="btn btn-outline-primary">{{ $profileData->roles->first()->display_name }}</button>
                                  
                                </div>
                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">
                                        <div class="d-flex align-items-center theme-icons p-2 c">
                                            <div class="font-22 text-primary">	<i class="fadeIn animated bx bx-mail-send"></i>
                                            </div>
                                            <div class="ms-2">Email</div>
                                        </div>
                                    </h6>
                                    <span class="text-secondary">{{ $profileData->email }} </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">
                                        <div class="d-flex align-items-center theme-icons p-2 c">
                                            <div class="font-22 text-primary">	<i class="fadeIn animated bx bx-phone"></i>
                                            </div>
                                            <div class="ms-2">Phone</div>
                                        </div>
                                        
                                    </h6>
                                    <span class="text-secondary">{{ $profileData->phone_number }} </span>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                

               
                <div class="col-lg-8">

                    <form method="POST" action="{{ route('admin.profile.store') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="first_name"   value="{{ $profileData->first_name }}"  />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="last_name"   value="{{ $profileData->last_name }}"  />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Position</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="position"   value="{{ $profileData->position }}"  />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email"   value="{{ $profileData->email }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="phone_number"   value="{{ $profileData->phone_number }}" />
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Bio</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea rows="3"  type="text" class="form-control" name="bio"> {{ $profileData->bio  }}</textarea>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Profile Picture</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="photo" class="form-control" id="image"  />
                                    </div>    
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        
                                    </div>

                                    <div class="col-sm-9 text-secondary">

                                        @if(!empty($profileData->profile_picture))

                                            
                                            <img  class="rounded-circle p-1 bg-primary" width="80"
                                            id="showImage"
                                            src="{{ $profileData->profileUrl }}" 
                                            alt="{{ $profileData->name}}">

                                        @else 

                                            <img  class="rounded-circle p-1 bg-primary" width="80"
                                            id="showImage"
                                            src="{{ $profileData->defaultProfile }}"  
                                            alt="{{ $profileData->name }}">
                                                
                                        @endif
                                        
                                    </div>
                                </div>    
                

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input  class="btn btn-primary px-4" type="submit" value="Save changes" />
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

@endsection

@section('script')
    
    @include('admin.profile.script')
    
@endsection