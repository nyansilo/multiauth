@extends('layouts.admin.admin_layout')

@section('title', 'RMS - Order detail')

@section('admin_content')

<div class="page-content">
	
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Applications</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
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

    <!--CARD-->
    <div class="card">

        <!--CARD BODY-->
        <div class="card-body">

             <!--INVOICE-->
            <div id="invoice">

                <div class="toolbar hidden-print">
                    <div class="text-end">
                        <a href="{{ route('admin.view.invoice', $orderPMU->id)}}" target="_blank" type="button" class="btn btn-dark"><i class="fa fa-print"></i> View</a>
                        <a href="{{ url('admin/invoice/'.$orderPMU->id.'/generate')}}" target="_blank"    type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i>Download PDF</a>
                    </div>
                    <hr>
                </div>
                 
                <div class="invoice overflow-auto">
 
                     <!--MIN WIDTH-->
                    <div style="min-width: 600px">
                        <header>
                            <div class="row text-center">
                                
                                <div class="col-12 company-details text-center">
                                    <div>
                                        <a href="javascript:;">
                                            <img src="{{ asset('admin/assets/images/logo-icon.png')}}" width="100" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <h2 class="name"> 
                                            COLLEGE OF BUSINESS EDUCATION  
                                        </h2>
                                        <h5>
                                            <div>MWANZA</div>
                                            <div>STORE REQUISTION</div>
                                        </h5>     
                                    
                                    </div>
                                </div>
                            </div>    
                        </header>

                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <h6>
                                        <div class="address">Campus: Mwanza</div>
                                        <div class="email">Department: {{ $orderPMU->user->department->name}}</div>
                                    </h6>   
                                </div>
                                <div class="col invoice-details">
                                    <h6>
                                        <div class="date">No: {{ $orderPMU->id}}</div>
                                        <div class="date">Date: {{ $orderPMU->created_at->format('d-m-Y h:i A')}}  </div>
                                    </h6>    
                                </div>
                            </div>

                            <div></div>

                            <!--start stepper one(STATUS)--> 
                        
                            <h6 class="text-uppercase">ORDER STATUS</h6>
                            <hr>
                            <div class="bs-stepper">

                                @if($orderPMU->status_message == 'In Progress')
                                    @include('admin.order.inprogress')
                                @elseif(($orderPMU->status_message == 'Approved By HOD'))
                                    @include('admin.order.approvedbyhod')            
                                @else
                                    @include('admin.order.approvedbypmu')     
                                @endif

                         
                            </div>

                            <!--end stepper one--> 

                            <div class="text-gray-light mb-3 mt-4">Please issue the following items</div> 

                            @role(['admin', 'pmu'])

                                @include('admin.order.single_order_admin_table') 

                            @endrole


                        </main>     
        
                    </div>
                    <!--END MIN WIDTH-->
            
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
                <!--END INVOICE OVERFLOW-->

            </div>
             <!--END INVOICE-->

        </div>
        <!--END CARD BODY-->
    </div> 
    <!--END CARD-->


</div>

@endsection