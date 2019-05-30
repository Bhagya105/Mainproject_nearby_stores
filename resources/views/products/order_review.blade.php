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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>


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
								<a href="blog.html">Blog</a>
							</li> -->
							<!-- <li>
								<a href="/signup">Are you looking for something?</a>
							</li> -->
							<li>
								<a href="{{ url('/orders') }}">My orders</a>
							</li>
							@if(empty(Auth::check()))
							<li>
								<a href="/signup">Sign up</a>
							</li> 
							<li>
								<a href="/signin">Sign in</a>
							</li>
							@else
							<li>
								<a href="/account">Account</a>
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
    


    <body class="animsition">
   
    <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 30%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
    </div>
    

    <section class="" style="background-image: url(images/cart.jpg);height:50px;">
		<h2 class="l-text2 t-center" >
         
          Order Review
    
		</h2>
     
	</section>
  

    <div style="margin-left:150px;">	
		 
                        <table id="customers">
                        <h4 class="m-text26 p-b-36 p-t-15" style="margin-top:50px;">
                    <th> Bill to Address </th>
                    <th> Details </th>
                        </h4>
                        <tr>
						
                  <td>     <label>Name:</label> </td>
                  <td>   {{ $userDetails->name }}  </td>

                  <tr>   <td>	<label>Address:</label></td>
                        
               <td>	{{ $userDetails->address }}<br></td></tr>
					
				<td>	<label>City:</label> </td>
                     
                <td>	{{ $userDetails->city }}<br></td></tr>
                <tr>     <td> <label>State:</label></td>
                    <td>	{{ $userDetails->state }}<br></td></tr>
						
                       
                    <tr>     <td> <label>Country:</label></td>
                       
                    <td>	{{ $userDetails->country}}<br></td></tr>
					
                        

                    <tr>    <td>	<label>Pincode:</label></td>
					
                    <td>	{{ $userDetails->pincode }}<br></td></tr>
						
                    <tr>       
                    <td><label>Mobile:</label></td>
						
                    <td>	{{ $userDetails->mobile }}<br></td></tr>
</div>		

</table>
			
               
              
      <div style="margin-left:700px;margin-top:-400px;">    
      <table id="customers" style="width:60%;">  	
            <h4 class="m-text26 p-b-36 p-t-15">
                            <th>Ship to Address</th>
                            <th>Details</th>
						</h4>   
<tr><td> <label>Name:</label></td>
						
<td>	{{ $shippingDetails->name }}<br></tr>
					
                            <tr><td>	<label>Address:</label></td>
                       
                            <td> {{ $shippingDetails->address }}<br></td></tr>
						
                        <tr><td>	<label>City:</label></td>
                       
                        <td>  {{ $shippingDetails->city}}<br></td></tr>
					
                        <tr><td>	<label>State:</label></td>
                       
                        <td>  {{ $shippingDetails->state}}<br></td></tr>
                      
                        <tr>  <td>  <label>Country:</label></td>
						
                        <td>    {{ $shippingDetails->country}}<br></td></tr>
					
                        <tr>
						<td>	<label>Pincode:</label></td>
					
                        <td>  {{ $shippingDetails->pincode}}<br></td></tr>
					
                        <tr><td>	<label>Mobile:</label></td>
						
                     <td>   {{ $shippingDetails->mobile}}<br></td></tr>
				

</div>		

						

		<div class="container">
         
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart" style="margin-left:-700px;">
                  
                  <tr class="table-head" >
                    <th style="width:28%;margin-left:10px;">  <h4 class="m-text26 p-b-36 p-t-15" style="color:blue;" >
                    <b>  Review & Payment</b>
                  </h4>   </th>
</table>
                    <table class="table-shopping-cart" style="margin-left:-700px;">
                  
						<tr class="table-head" >
                          
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
                        <?php $total_amount = 0; ?>
						@foreach($userCart as $cart)
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="/upload/{{$cart->image}}" alt="IMG-PRODUCT">
								</div>
							</td>
                            <td class="column-2">{{ $cart->product_name }}
							<p style="font-size:80%";>Size: {{ $cart->highlights }}</p></td>
							<td class="column-3">₹ {{ $cart->price }} </td>
							
							<td class="column-4">
                                <div style="margin-left:100px;">
                            {{ $cart->quantity }}
</div>
							</td>
							<td class="column-5">₹{{ $cart->price*$cart->quantity }}</td>
						</tr>
 <?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?> 
                        @endforeach


					</table>
				</div>
			</div>

			

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Grandtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
					@if(!empty(Session::get('CouponAmount')))
							
							<span>₹ <?php echo $total_amount - Session::get('CouponAmount'); ?></span></li>
						 @else
							 <li> <span>INR <?php echo $total_amount; ?></span></li>
						 @endif
					</span>
				</div>
<!--  -->
				
            </div>
            
            <div style="margin-top:-200px;margin-left:150px;">
            <form name="paymentForm" id="paymentForm" action="{{url('/place-order') }}"
            method="post"> @csrf
            <input type="hidden" name="grand_total" value="{{ $total_amount }}">
            <span>
    <label><strong>Select Payment Method:</strong></label>
</span>&nbsp;&nbsp;
            <span>
    <label><input type="radio" name="payment_method" id="COD" value="COD"> COD</label>
</span>&nbsp;&nbsp;
<span>
    <label><input type="radio" name="payment_method" id="Paypal" value="Paypal"> Paypal</label>
</span>
<span>
<button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" style="width:200px;margin-left:200px;margin-top:10px;"
onclick="return selectPaymentMethod();">
							Place Order
                            </button>
</span>
</div>
				
		</div>
	</section>

			
<!-- 
		<div class="t-center p-l-15 p-r-15" style="margin-left:500px;width:500px;"> 
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20" >
				Copyright Â© 2018 All rights reserved.</a>
			</div>
		</div>
	</footer> -->



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
<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
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
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
