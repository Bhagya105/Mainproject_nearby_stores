<?php
use App\Http\Controllers\Controller;
$mainCategories = Controller::mainCategories();

?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		

				

					

			<div class="wrap_header">
				<!-- Logo -->
				<a href="#" class="logo">
			<h1><b>	Nearby Stores</b></h1>
					<!-- <img src="images/icons/logo.png" alt="IMG-LOGO"> -->
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="/cart">Home</a>
								 <!-- <ul class="sub_menu">
									<li><a href="index.html">Homepage V1</a></li>
									<li><a href="home-02.html">Homepage V2</a></li>
									<li><a href="home-03.html">Homepage V3</a></li>
								</ul>  -->
							</li>

							<li class="sale-noti">
								<a href="#">Shop</a>
							</li>
							<li>
								<a href="#">Categories</a>
								 <ul class="sub_menu">
								 @foreach($mainCategories as $cat)
								 @if($cat->status=="1")
									<li><a href="{{('/products/'.$cat->name)}}">{{ $cat->name }}</a></li>
									@endif
								@endforeach
									
								</ul>  
							</li>
							
							<li>
								
							
								<!-- <a href="/about">About</a>
							</li>

							<li>
								<a href="/contact">Contact</a>
							</li> -->
							
							<!-- <li class="sale-noti">
								<a href="product.html">Sale</a>
							</li> -->

							<!-- <li>
								<a href="cart.html">Features</a>
							</li> -->

							 <!-- <li>
							 <a href="{{ url('/CheckOut') }}">CheckOut</a>
							</li> 
							 <li>
								<a href="{{ url('/cart') }}">Cart</a>
							</li>  -->
							@if(empty(Auth::check()))
							<li>
								<a href="/signup">Sign up</a>
							</li> 
							<li>
								<a href="/signin">Sign in</a>
							</li>
							@else
							<!-- <li>
								<a href="/account">Account</a>
							</li> -->
							<li>
								<a href="{{ url('/orders') }}">My orders</a>
							</li>
							<li>
								<a href="{{ url('/user-logout') }}">Logout</a>
							</li>
@endif
						

							
						</ul>
					</nav>
				</div>

			

						<!-- Header cart noti -->
						

				

		<!-- Menu Mobile -->
	
	</header>
    
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/cart.jpg);height:150px;">
		<h2 class="l-text2 t-center">
		Account
		</h2>
	</section>

	<!-- content page -->
	
    <div class="flash-message alert alert-warning alert-dismissible fade in">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>
        
				<div class="col-md-6 p-b-30" >
				<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-40">
					<div class="p-r- p-r-0-lg">
						<!-- <div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div> -->
					</div>
				</div>

			<div >
						<h4 class="m-text26 p-b-36 p-t-15" style="margin-left:500px;">
							Account Details
						</h4>
<form id="accountForm" name="accountForm" action="{{ url('/account') }}" method="POST" class="leave-comment" style="width:1000px;margin-left:500px;">
@csrf       <label>Name:</label>
						<div class="bo4 of-hidden size15 m-b-20">
						
							<input value="{{ $userDetails->name }}" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" id="name" placeholder="Name">
						</div>
						<label>Address:</label>
                        <div class="bo4 of-hidden size15 m-b-20">
							<input value="{{ $userDetails->address}}" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="address" id="address" placeholder="Address">
						</div>
						<label>City:</label>
                        <div class="bo4 of-hidden size15 m-b-20">
							<input value="{{ $userDetails->city}}" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="city" id="city" placeholder="City">
						</div>
						<label>State:</label>
                        <div class="bo4 of-hidden size15 m-b-20">
							<input value="{{ $userDetails->state}}" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="state" id="state" placeholder="State">
						</div>
                        <!-- <div class="bo4 of-hidden size15 m-b-20">
							<select id="country" name="country">
                            <option value="" name="country">
                            </select>
						</div> -->
						<label>Country:</label>
                        <div class="bo4 of-hidden size15 m-b-20">
								<select class="selection-2" id="country" name="country">
                                <option value="">Select Country</option>
								@foreach($countries as $country)
                                <option value="{{ $country->country_name }}" @if($country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
                                @endforeach
								</select>
							</div>

							<label>Pincode:</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input value="{{ $userDetails->pincode }}" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="pincode" id="pincode" placeholder="Pincode">
						</div>
						<label>Mobile:</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input value="{{ $userDetails->mobile }}" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="mobile" id="mobile" placeholder="Mobile">
						</div>

						<!-- <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea> -->

						<div class="w-size25">
							<!-- Button -->
							<button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Update
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>


<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor/select2/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
