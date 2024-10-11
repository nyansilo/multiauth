@extends('layouts.user.user_layout')

@section('title', 'RMS - My Orders')

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
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
  
    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="col-12 company-details text-center mt-4">
                                       
                    <h5 class="name">
                        
                          All Orders Table                                     
                    </h5>
                        
                
            </div>
              
            </div>
            <div class="table-responsive">
                <table  id="example" class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Order#</th>
                            <th>Tracking#</th>
                            <th>Full Name</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>View Details</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $orderItem )
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                      
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">{{ $orderItem->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                     
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">{{ $orderItem->tracking_no }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $orderItem->user->fullName }}</td>
                                <td>
                                    <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                        <i class="bx bxs-circle me-1"></i>
                                        {{ $orderItem->status_message }}
                                    </div>
                                </td>
                    
                                <td>{{ $orderItem->created_at->format('d-m-Y') }}</td>
                                <td>

                    
                                    <a  href="{{ route('user.order.detail', $orderItem->id) }}" type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</a>
                                </td>
                            
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"> No Order Item Available</td>
                            </tr>    
                        @endforelse
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>


</div>

@endsection