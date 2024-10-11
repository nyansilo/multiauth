<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">



    <title>@yield('title', 'CBE-RMS' )</title>

	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/images/favicon-32x32.png')}}"  type="image/png"/>
	<!--plugins-->
	<link href="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}"  rel="stylesheet"/>
	<link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css')}}"  rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/input-tags/css/tagsinput.css')}}"  rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}"  rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css')}}"  rel="stylesheet"/>
    <link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />

	


	<!-- loader-->
	<link href="{{ asset('admin/assets/css/pace.min.css')}}"  rel="stylesheet"/>
	<script src="{{ asset('admin/assets/js/pace.min.js')}}" ></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin/assets/css/bootstrap.min.css')}}"  rel="stylesheet">
	<link href="{{ asset('admin/assets/css/bootstrap-extended.css')}}"  rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/app.css')}}"  rel="stylesheet">
	<link href="{{ asset('admin/assets/css/icons.css')}}"  rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/header-colors.css')}}" />

	<!-- Tosttr CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

	<!-- flatpickr-->
	<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

	<!-- Custom css -->
	<link href="{{ asset('admin/assets/css/custom.css')}}" rel="stylesheet" />
	
</head>
<body>
	<!--wrapper-->
	<div class="wrapper">
	
	

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
			
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div id="invoice">
					
							
							<div class="invoice overflow-auto">
								<div style="min-width: 600px">
									<header>
										<div class="row">
											<div class="col">
												<a href="javascript:;">
													<img src="assets/images/logo-icon.png" width="80" alt="" />
												</a>
											</div>
											<div class="col company-details">
												<h2 class="name">
									<a target="_blank" href="javascript:;">
									Arboshiki
									</a>
								</h2>
												<div>455 Foggy Heights, AZ 85004, US</div>
												<div>(123) 456-789</div>
												<div>company@example.com</div>
											</div>
										</div>
									</header>
									<main>
										<div class="row contacts">
											<div class="col invoice-to">
												<div class="text-gray-light">INVOICE TO:</div>
												<h2 class="to">John Doe</h2>
												<div class="address">796 Silver Harbour, TX 79273, US</div>
												<div class="email"><a href="mailto:john@example.com">john@example.com</a>
												</div>
											</div>
											<div class="col invoice-details">
												<h1 class="invoice-id">INVOICE 3-2-1</h1>
												<div class="date">Date of Invoice: 01/10/2018</div>
												<div class="date">Due Date: 30/10/2018</div>
											</div>
										</div>
										<table>
											<thead>
												<tr>
													<th>#</th>
													<th class="text-left">DESCRIPTION</th>
													<th class="text-right">HOUR PRICE</th>
													<th class="text-right">HOURS</th>
													<th class="text-right">TOTAL</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="no">04</td>
													<td class="text-left">
														<h3>
										<a target="_blank" href="javascript:;">
										Youtube channel
										</a>
										</h3>
														<a target="_blank" href="javascript:;">
										   Useful videos
									   </a> to improve your Javascript skills. Subscribe and stay tuned :)</td>
													<td class="unit">$0.00</td>
													<td class="qty">100</td>
													<td class="total">$0.00</td>
												</tr>
												<tr>
													<td class="no">01</td>
													<td class="text-left">
														<h3>Website Design</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
													<td class="unit">$40.00</td>
													<td class="qty">30</td>
													<td class="total">$1,200.00</td>
												</tr>
												<tr>
													<td class="no">02</td>
													<td class="text-left">
														<h3>Website Development</h3>Developing a Content Management System-based Website</td>
													<td class="unit">$40.00</td>
													<td class="qty">80</td>
													<td class="total">$3,200.00</td>
												</tr>
												<tr>
													<td class="no">03</td>
													<td class="text-left">
														<h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
													<td class="unit">$40.00</td>
													<td class="qty">20</td>
													<td class="total">$800.00</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td colspan="2">SUBTOTAL</td>
													<td>$5,200.00</td>
												</tr>
												<tr>
													<td colspan="2"></td>
													<td colspan="2">TAX 25%</td>
													<td>$1,300.00</td>
												</tr>
												<tr>
													<td colspan="2"></td>
													<td colspan="2">GRAND TOTAL</td>
													<td>$6,500.00</td>
												</tr>
											</tfoot>
										</table>
										<div class="thanks">Thank you!</div>
										<div class="notices">
											<div>NOTICE:</div>
											<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
										</div>
									</main>
									<footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
								</div>
								<!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
								<div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		
	
	</div>
	<!--end wrapper-->



	
</body>

</html>