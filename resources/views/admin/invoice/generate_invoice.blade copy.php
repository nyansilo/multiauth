@extends('layouts.admin.admin_layout')

@section('title', 'RMS - Order detail')

@section('admin_content')

<div class="page-content">
	


    <!--CARD-->
    <div class="card">

        <!--CARD BODY-->
        <div class="card-body">

             <!--INVOICE-->
            <div id="invoice">

              
                 
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
                                        <div class="email">Department: {{ $order->user->department->name}}</div>
                                    </h6>   
                                </div>
                                <div class="col invoice-details">
                                    <h6>
                                        <div class="date">No: {{ $order->id}}</div>
                                        <div class="date">Date: {{ $order->created_at->format('d-m-Y h:i A')}}  </div>
                                    </h6>    
                                </div>
                            </div>

                            <div></div>

                        
                            <div class="text-gray-light mb-3 mt-4">Please issue the following items</div> 

                            @role(['admin', 'pmu'])

                                @include('admin.invoice.invoice_detail_table') 

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