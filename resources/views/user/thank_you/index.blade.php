@extends('layouts.user.user_layout')

@section('title', 'RMS - Thank you')

@section('user_content')

<div class="page-content">
	

	<div class="card">
        <div class="card-body">
            <div id="invoice">
               
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row text-center">
                                
                                <div class="col-12 company-details text-center">
                                    <div>
                                        <a href="javascript:;">
                                            <img src="http://127.0.0.1:8000/admin/assets/images/logo-icon.png" width="100" alt="">
                                        </a>
                                    </div>
                                        <h2 class="name">
                                            
                                                COLLEGE OF BUSINESS EDUCATION                                       
                                        </h2>
                                        <h5>
                                             <div>MWANZA</div>
                                             <div>STORE REQUISTION</div>
                                        </h5>     
                                    
                                </div>
                            </div>
                        </header>
                        <main>
                                              
                            <div class="row">
                                
                                <div class="to mt-4 mb-3">
                                   
                                        <h4 class="name">
                                            
                                                Thank You!!
                                          
                                        </h4>
                                       
                                </div>
                            </div>
                       


            
                            <div class="notices">
                                <div>NOTICE:</div>
                                <div class="notice">Your Order Request has been sent to your HOD for approval</div>
                            </div>


                            
                           
                                             
                           
                        </main>

                  

                        <div class="col-12">
                            <div class="d-flex align-items-center gap-3">
                                <a href="{{ route('user.dashboard')}}" class="btn btn-primary px-4" ><i class="bx bx-left-arrow-alt me-2"></i>Submit New Request</a>
                                <a href="{{ route('user.order')}}" class="btn btn-success px-4">View Orders</a>
                            </div>
                        </div>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection